<?php
// Set timezone untuk konsistensi
date_default_timezone_set('Asia/Jakarta');

// Set environment for CLI
if (php_sapi_name() === 'cli') {
    $_SERVER['SERVER_PORT'] = '80';
    $_SERVER['HTTP_HOST'] = 'localhost';
    $_SERVER['SCRIPT_NAME'] = '/cron.php';
}

// Include ORM
require_once __DIR__ . '/orm.php';

// Load .env file untuk CLI
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    $env_lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($env_lines as $line) {
        if (strpos($line, '#') === 0) continue;
        if (strpos($line, '=') === false) continue;
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}

// Database config dari environment
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_DATABASE');
$db_user = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');

// Initialize database connection
ORM::configure("mysql:host=$db_host;dbname=$db_name");
ORM::configure('username', $db_user);
ORM::configure('password', $db_password);

// Check if CLI
if (php_sapi_name() !== 'cli') {
    die("This script must be run from command line\n");
}

ini_set('memory_limit', '512M');
set_time_limit(0);

// Auto create log folder if not exists
$log_dir = __DIR__ . '/uploads/log_acs';
if (!is_dir($log_dir)) {
    mkdir($log_dir, 0755, true);
    @chown($log_dir, 'nginx');
    @chgrp($log_dir, 'nginx');
}

// Auto delete old logs (older than 7 days)
$old_logs = glob($log_dir . '/sync_*.log');
foreach ($old_logs as $old_log) {
    if (filemtime($old_log) < strtotime('-7 days')) {
        unlink($old_log);
    }
}

// Create/open log file
$log_file = $log_dir . '/sync_' . date('Y-m-d') . '.log';

// Check file size - rotate if > 10MB
if (file_exists($log_file) && filesize($log_file) > 10485760) {
    rename($log_file, $log_file . '.' . date('His') . '.bak');
}

$log_handle = fopen($log_file, 'a');
@chmod($log_file, 0644);
@chown($log_file, 'nginx');
@chgrp($log_file, 'nginx');

// Function to write log
function write_log($message)
{
    global $log_handle;
    $timestamp = date('H:i:s');
    fwrite($log_handle, "[{$timestamp}] {$message}\n");
    echo $message . "\n";
}

// ============================================================
// Helper: fetch satu halaman devices dari GenieACS
// ============================================================
function fetch_devices_page($base_url, $server, $projection_str, $limit, $skip)
{
    $url = $base_url . '?projection=' . urlencode($projection_str) . '&limit=' . $limit . '&skip=' . $skip;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response  = curl_exec($ch);
    $curl_err  = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'response'  => $response,
        'curl_err'  => $curl_err,
        'http_code' => $http_code,
    ];
}

// ============================================================

write_log("=== Starting ACS Device Sync ===");
write_log("Time: " . date('Y-m-d H:i:s'));

// Check if specific server_id passed as argument
$target_server_id = null;
if (isset($argv[1]) && is_numeric($argv[1])) {
    $target_server_id = intval($argv[1]);
    write_log("Target Server ID: {$target_server_id} (Force Sync Mode)");
}

// Get all active servers OR specific server if passed
$servers_query = ORM::for_table('tbl_acs_servers')->where('status', 'active');
if ($target_server_id !== null) {
    $servers_query->where('id', $target_server_id);
}
$servers = $servers_query->find_many();

if ($target_server_id !== null) {
    write_log("Found " . count($servers) . " server (Force Sync Mode)");
} else {
    write_log("Found " . count($servers) . " active servers (Auto Cron Mode)");
}

// Get parameters
$parameters = ORM::for_table('tbl_acs_parameters')
    ->where_raw('(param_type = ? OR param_type = ?)', ['display', 'both'])
    ->where('param_category', 'basic')
    ->find_many();

write_log("Found " . count($parameters) . " parameters");

// ============================================================
// Build projection field list dari parameters yang aktif
// Ini yang mencegah GenieACS mengembalikan semua field TR-069
// ============================================================
$projection_fields = ['_id', '_lastInform', '_tags', 'VirtualParameters'];

foreach ($parameters as $param) {
    $path = $param->param_path;
    $paths_to_check = (strpos($path, ',') !== false)
        ? array_map('trim', explode(',', $path))
        : [$path];

    foreach ($paths_to_check as $p) {
        // Skip built-in fields yang sudah ada
        if (in_array($p, ['_id', '_lastInform', '_tags'])) continue;
        // Skip VirtualParameters - sudah include semua
        if (strpos($p, 'VirtualParameters.') === 0) continue;
        // Ambil top-level key saja (misal: "InternetGatewayDevice.WANDevice" → "InternetGatewayDevice")
        $top = explode('.', $p)[0];
        if ($top && !in_array($top, $projection_fields)) {
            $projection_fields[] = $top;
        }
    }
}

$projection_str = implode(',', $projection_fields);
write_log("Projection fields: " . $projection_str);

// ============================================================
// Process each server dengan PAGINATION
// Page size 500 = aman untuk memory, cukup cepat untuk 2000 device
// ============================================================
$page_size = 500;

foreach ($servers as $server) {
    write_log("Processing server: {$server->name}");

    // Build base URL
    if (filter_var($server->host, FILTER_VALIDATE_IP)) {
        $base_url = "http://{$server->host}:{$server->port}/devices";
    } else {
        $base_url = "https://{$server->host}/devices";
    }

    // Fetch semua device via pagination
    $all_devices  = [];
    $skip         = 0;
    $page_num     = 1;
    $fetch_failed = false;

    write_log("Fetching devices (page_size={$page_size}) ...");

    do {
        write_log("  Page {$page_num}: skip={$skip}");

        $result = fetch_devices_page($base_url, $server, $projection_str, $page_size, $skip);

        if (!$result['response']) {
            write_log("  Failed to fetch page {$page_num} from {$server->name}");
            write_log("  Error: " . ($result['curl_err'] ?: 'Unknown'));
            write_log("  HTTP: " . $result['http_code']);
            $fetch_failed = true;
            break;
        }

        $page_devices = json_decode($result['response'], true);
        unset($result['response']); // Bebaskan memory segera

        if (!is_array($page_devices)) {
            write_log("  Invalid JSON response on page {$page_num}");
            $fetch_failed = true;
            break;
        }

        $count = count($page_devices);
        write_log("  Page {$page_num}: got {$count} devices");

        $all_devices = array_merge($all_devices, $page_devices);
        unset($page_devices); // Bebaskan memory

        $skip += $page_size;
        $page_num++;

    } while ($count === $page_size); // Kalau dapat kurang dari page_size = halaman terakhir

    if ($fetch_failed) {
        write_log("Skipping server {$server->name} due to fetch error.");
        continue;
    }

    $total_fetched = count($all_devices);
    write_log("Fetched {$total_fetched} devices total");

    $processed    = [];
    $update_count = 0;
    $batch_data   = [];

    // Process each device
    foreach ($all_devices as $device) {
        $device_id  = $device['_id'] ?? 'unknown';
        $processed[] = $device_id;

        // Determine status
        $status = 'offline';
        if (isset($device['_lastInform'])) {
            $diff_minutes = (time() - strtotime($device['_lastInform'])) / 60;
            if ($diff_minutes <= 5) {
                $status = 'online';
            }
        }

        // Get last inform
        $last_inform = null;
        if (isset($device['_lastInform'])) {
            $last_inform = date('Y-m-d H:i:s', strtotime($device['_lastInform']));
        }

        // Build device data
        $device_data = [
            'device_id' => $device_id,
            'id_raw'    => $device_id,
        ];

        // Extract basic info dari tags
        if (isset($device['_tags']) && is_array($device['_tags'])) {
            $device_data['tags']   = $device['_tags'][0] ?? '';
            $device_data['lokasi'] = $device['_tags'][1] ?? '';
        }

        // Process parameters
        foreach ($parameters as $param) {
            $path  = $param->param_path;
            $value = 'N/A';

            if (strpos($path, ',') !== false) {
                // Multiple paths - try each one
                foreach (array_map('trim', explode(',', $path)) as $single_path) {
                    if (strpos($single_path, 'VirtualParameters.') === 0) {
                        $vp_name = str_replace('VirtualParameters.', '', $single_path);
                        if (isset($device['VirtualParameters'][$vp_name]['_value'])) {
                            $value = $device['VirtualParameters'][$vp_name]['_value'];
                            break;
                        }
                    }
                }
            } else {
                // Single path
                if ($path === '_id') {
                    $value = $device['_id'] ?? 'N/A';
                } elseif ($path === '_lastInform') {
                    $value = $device['_lastInform'] ?? 'N/A';
                } elseif (strpos($path, 'VirtualParameters.') === 0) {
                    $vp_name = str_replace('VirtualParameters.', '', $path);
                    if (isset($device['VirtualParameters'][$vp_name]['_value'])) {
                        $value = $device['VirtualParameters'][$vp_name]['_value'];
                    }
                } elseif (strpos($path, '.') !== false) {
                    $parts = explode('.', $path);
                    $temp  = $device;
                    foreach ($parts as $part) {
                        if (isset($temp[$part])) {
                            $temp = $temp[$part];
                        } else {
                            $temp = null;
                            break;
                        }
                    }
                    if ($temp !== null) {
                        $value = isset($temp['_value']) ? $temp['_value'] : $temp;
                    }
                }
            }

            $device_data[$param->param_key] = $value;
        }

        $batch_data[] = [
            'server_id'   => $server->id,
            'device_id'   => $device_id,
            'status'      => $status,
            'last_inform' => $last_inform,
            'tags'        => json_encode($device['_tags'] ?? []),
            'device_data' => json_encode($device_data),
        ];
    }

    // Tidak perlu lagi simpan $all_devices
    unset($all_devices);

    // ============================================================
    // Batch INSERT/UPDATE - 100 device per query
    // ============================================================
    if (!empty($batch_data)) {
        $batch_size = 100;
        $chunks     = array_chunk($batch_data, $batch_size);

        foreach ($chunks as $chunk) {
            $values = [];
            $params = [];

            foreach ($chunk as $data) {
                $values[] = "(?, ?, ?, ?, ?, ?, NOW())";
                $params[] = $data['server_id'];
                $params[] = $data['device_id'];
                $params[] = $data['status'];
                $params[] = $data['last_inform'];
                $params[] = $data['tags'];
                $params[] = $data['device_data'];
            }

            $sql = "INSERT INTO tbl_acs_devices 
                        (server_id, device_id, status, last_inform, tags, device_data, last_sync) 
                    VALUES " . implode(", ", $values) . "
                    ON DUPLICATE KEY UPDATE 
                        status      = VALUES(status),
                        last_inform = VALUES(last_inform),
                        tags        = VALUES(tags),
                        device_data = VALUES(device_data),
                        last_sync   = NOW()";

            try {
                $pdo  = ORM::get_db();
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                $update_count += $stmt->rowCount();
            } catch (Exception $e) {
                write_log("Batch error: " . $e->getMessage());
            }
        }
    }

    unset($batch_data);

    write_log("Processed " . count($processed) . " devices via batch (Affected rows: {$update_count})");

    // Clean old devices yang tidak ada di response terbaru
    if (!empty($processed)) {
        $deleted = ORM::for_table('tbl_acs_devices')
            ->where('server_id', $server->id)
            ->where_not_in('device_id', $processed)
            ->delete_many();

        if ($deleted > 0) {
            write_log("Cleaned up {$deleted} old devices");
        }
    }

    unset($processed);

    // ============================================================
    // Summon offline devices
    // ============================================================
    write_log("--- Checking offline devices to summon ---");

    $offline_to_summon = ORM::for_table('tbl_acs_devices')
        ->where('server_id', $server->id)
        ->where('status', 'offline')
        ->where_raw('(last_summon IS NULL OR last_summon < DATE_SUB(NOW(), INTERVAL 15 MINUTE))')
        ->limit(3)
        ->find_many();

    if (count($offline_to_summon) > 0) {
        write_log("Found " . count($offline_to_summon) . " offline devices to summon");

        $success_count = 0;
        $failed_count  = 0;

        foreach ($offline_to_summon as $device_record) {
            $device_id         = $device_record->device_id;
            $device_id_encoded = urlencode($device_id);

            if (filter_var($server->host, FILTER_VALIDATE_IP)) {
                $summon_url = "http://{$server->host}:{$server->port}/devices/{$device_id_encoded}/tasks?connection_request";
            } else {
                $summon_url = "https://{$server->host}/devices/{$device_id_encoded}/tasks?connection_request";
            }

            $ch = curl_init($summon_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '[]');
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            curl_exec($ch);
            $http_code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curl_error = curl_error($ch);
            curl_close($ch);

            if ($http_code == 200 || $http_code == 202) {
                write_log("  Summoning: {$device_id} [OK]");
                $success_count++;
                $device_record->set('last_summon', date('Y-m-d H:i:s'));
                $device_record->save();
            } else {
                write_log("  Summoning: {$device_id} [FAILED: HTTP {$http_code}]");
                $failed_count++;
                write_log("    URL: {$summon_url}");
                if ($curl_error) {
                    write_log("    Error: {$curl_error}");
                    error_log("Summon failed for {$device_id}: {$curl_error}");
                }
            }

            sleep(3);
        }

        write_log("Summon Summary: {$success_count} success, {$failed_count} failed");
    } else {
        write_log("No offline devices need summoning");
    }
}

// Final summary
$start_time     = defined('SCRIPT_START') ? SCRIPT_START : microtime(true);
$execution_time = round(microtime(true) - $start_time, 2);
write_log("=== Sync Completed in {$execution_time} seconds ===");

if (isset($log_handle)) {
    fclose($log_handle);
}

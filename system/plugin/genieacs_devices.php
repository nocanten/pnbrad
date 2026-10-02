<?php
// File: system/plugin/genieacs_devices.php

// Check admin user type before registering menu - only Agent allowed
$admin = Admin::_info();
if ($admin['user_type'] === 'Agent') {
    register_menu("GenieACS Devices", true, "genieacs_devices", 'AFTER_PLANS', 'ion ion-android-list');
}

function genieacs_devices()
{
    global $ui, $routes;
    _admin();
    $ui->assign('_title', 'GenieACS Devices');
    $ui->assign('_system_menu', 'genieacs_devices');
    $admin = Admin::_info();
    $ui->assign('_admin', $admin);

    // Routing: support 2 pattern
    // Pattern A: /plugin/genieacs_devices/{action}              → routes[2] = action
    // Pattern B: /plugin/genieacs_devices/{device_id}/{action}  → routes[2] = device_id, routes[3] = action
    $known_actions = ['refresh', 'summon', 'reboot', 'find-by-tag', 'force-sync', 'ajax-search', 'set-server'];
    $segment2 = $routes['2'] ?? '';
    $segment3 = $routes['3'] ?? '';

    if (in_array($segment2, $known_actions, true)) {
        $action = $segment2;
        $device_id_from_route = '';
    } elseif ($segment2 !== '' && in_array($segment3, $known_actions, true)) {
        $action = $segment3;
        $device_id_from_route = $segment2;
    } else {
        $action = $segment2;
        $device_id_from_route = '';
    }

    switch ($action) {
        case 'refresh':
            genieacs_refresh_device();
            break;
        case 'summon':
            genieacs_summon_device($device_id_from_route);
            break;
        case 'reboot':
            genieacs_reboot_device();
            break;
        case 'find-by-tag':
            genieacs_find_by_tag();
            break;
        case 'force-sync':
            genieacs_force_sync();
            break;
        case 'ajax-search':
            genieacs_ajax_search();
            break;
        case 'set-server':
            // Handle AJAX request to set server
            if (isset($_POST['server_id'])) {
                $_SESSION['selected_acs_server'] = intval($_POST['server_id']);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            exit;
            break;
        case '':
        default:
            genieacs_device_list();
            break;
    }
}

function genieacs_device_list()
{
    global $ui, $routes;

    // Get all available servers
    $servers = ORM::for_table('tbl_acs_servers')
        ->where('status', 'active')
        ->order_by_asc('name')
        ->find_many();

    if (count($servers) == 0) {
        r2(U . 'plugin/genieacs_manager', 'e', 'Please configure at least one ACS server first!');
        return;
    }

    // Get selected server - check session first, then use first server
    $selected_server_id = $_SESSION['selected_acs_server'] ?? $servers[0]->id;

    // Validate selected server exists
    $server_exists = false;
    $current_server = null;
    foreach ($servers as $server) {
        if ($server->id == $selected_server_id) {
            $server_exists = true;
            $current_server = $server;
            break;
        }
    }

    // If selected server doesn't exist, use first server
    if (!$server_exists) {
        $selected_server_id = $servers[0]->id;
        $current_server = $servers[0];
    }

    // Save to session
    $_SESSION['selected_acs_server'] = $selected_server_id;

    // Get page number from URL route OR GET parameter
    if (isset($routes['3']) && is_numeric($routes['3'])) {
        $page = intval($routes['3']);
    } else {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    }
    if ($page < 1) $page = 1;

    // Items per page - CHANGED TO 10
    $per_page = 10;
    $offset = ($page - 1) * $per_page;

    // Get search and filter parameters
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $status_filter = isset($_GET['status']) ? trim($_GET['status']) : '';
    $rx_power_filter = isset($_GET['rx_power']) ? trim($_GET['rx_power']) : '';
    $location_filter = isset($_GET['location']) ? trim($_GET['location']) : '';

    // Get unique locations for filter dropdown (before applying filters)
    $locations_query = ORM::for_table('tbl_acs_devices')
        ->select_expr('DISTINCT JSON_UNQUOTE(JSON_EXTRACT(device_data, "$.lokasi")) as lokasi')
        ->where('server_id', $selected_server_id)
        ->where_raw('JSON_EXTRACT(device_data, "$.lokasi") IS NOT NULL')
        ->where_raw('JSON_EXTRACT(device_data, "$.lokasi") != ""')
        ->where_raw('JSON_EXTRACT(device_data, "$.lokasi") != "null"');

    $locations_result = $locations_query->find_array();
    $available_locations = [];
    foreach ($locations_result as $loc) {
        if (!empty($loc['lokasi']) && $loc['lokasi'] != 'null') {
            $available_locations[] = $loc['lokasi'];
        }
    }
    sort($available_locations);

    // BUILD QUERY FROM LOCAL DATABASE
    $query = ORM::for_table('tbl_acs_devices')
        ->where('server_id', $selected_server_id);

    // Apply search if provided
    if (!empty($search)) {
        $search_term = '%' . $search . '%';
        $query->where_raw(
            '(device_id LIKE ? OR 
         JSON_EXTRACT(device_data, "$.pppoe_ip") LIKE ? OR 
         JSON_EXTRACT(device_data, "$.tr069_ip") LIKE ? OR 
         JSON_EXTRACT(device_data, "$.ppp_username") LIKE ? OR 
         JSON_EXTRACT(device_data, "$.pppoe_username") LIKE ? OR 
         JSON_EXTRACT(device_data, "$.tags") LIKE ? OR 
         JSON_EXTRACT(device_data, "$.lokasi") LIKE ?)',
            [$search_term, $search_term, $search_term, $search_term, $search_term, $search_term, $search_term]
        );
    }

    // Apply status filter if provided
    if (!empty($status_filter)) {
        $query->where('status', $status_filter);
    }

    // Apply RX Power filter if provided
    if (!empty($rx_power_filter)) {
        if ($rx_power_filter == 'good') {
            // -20 atau lebih besar (termasuk -20.00)
            $query->where_raw("CAST(JSON_UNQUOTE(JSON_EXTRACT(device_data, '$.rx_power')) AS DOUBLE) >= -20");
        } elseif ($rx_power_filter == 'fair') {
            // -20.01 sampai -25.00
            $query->where_raw("CAST(JSON_UNQUOTE(JSON_EXTRACT(device_data, '$.rx_power')) AS DOUBLE) < -20");
            $query->where_raw("CAST(JSON_UNQUOTE(JSON_EXTRACT(device_data, '$.rx_power')) AS DOUBLE) >= -25");
        } elseif ($rx_power_filter == 'poor') {
            // Kurang dari -25.00 (termasuk -25.01, -25.22, dst)
            $query->where_raw("CAST(JSON_UNQUOTE(JSON_EXTRACT(device_data, '$.rx_power')) AS DOUBLE) < -25");
        }
    }

    // Apply location filter if provided
    if (!empty($location_filter)) {
        $query->where_raw('JSON_UNQUOTE(JSON_EXTRACT(device_data, "$.lokasi")) = ?', [$location_filter]);
    }

    // Get total count for pagination
    $total_devices = $query->count();

    // Get devices with pagination
    $db_devices = $query
        ->limit($per_page)
        ->offset($offset)
        ->order_by_desc('last_inform')
        ->find_many();

    // Process devices from database
    $devices = [];
    $display_params = ORM::for_table('tbl_acs_parameters')
        ->where_raw('(param_type = ? OR param_type = ?)', ['display', 'both'])
        ->where('param_category', 'basic')
        ->order_by_asc('display_order')
        ->find_many();

    foreach ($db_devices as $db_device) {
        $device_data = json_decode($db_device->device_data, true);

        // Build device array
        $device = [];
        foreach ($display_params as $param) {
            $device[$param->param_key] = $device_data[$param->param_key] ?? 'N/A';
        }

        // Add fixed fields
        $device['id_raw'] = $db_device->device_id;
        $device['device_id'] = $db_device->device_id;
        $device['status'] = $db_device->status;
        $device['tags'] = $device_data['tags'] ?? '';
        $device['lokasi'] = $device_data['lokasi'] ?? '';

        // Format last inform
        if ($db_device->last_inform) {
            $time = strtotime($db_device->last_inform);
            $diff = time() - $time;

            if ($diff < 60) {
                $device['last_inform'] = 'Just now';
            } elseif ($diff < 3600) {
                $minutes = floor($diff / 60);
                $device['last_inform'] = "{$minutes}m ago";
            } elseif ($diff < 86400) {
                $hours = floor($diff / 3600);
                $device['last_inform'] = "{$hours}h ago";
            } else {
                $days = floor($diff / 86400);
                $device['last_inform'] = "{$days}d ago";
            }
        } else {
            $device['last_inform'] = 'Never';
        }

        $devices[] = $device;
    }

    // Calculate statistics from ALL devices (not just current page)
    $stats_query = ORM::for_table('tbl_acs_devices')
        ->where('server_id', $selected_server_id);

    $online_count = clone $stats_query;
    $online_count = $online_count->where('status', 'online')->count();

    $offline_count = clone $stats_query;
    $offline_count = $offline_count->where('status', 'offline')->count();

    $total = $online_count + $offline_count;

    // Location query already done above, remove this duplicate

    // Calculate warning count from ALL devices in database (RX < -25)
    $warning_query = ORM::for_table('tbl_acs_devices')
        ->where('server_id', $selected_server_id)
        ->where_raw("CAST(JSON_UNQUOTE(JSON_EXTRACT(device_data, '$.rx_power')) AS DOUBLE) < -25")
        ->count();

    $warning_count = $warning_query;

    // Check last sync time
    $last_sync = ORM::for_table('tbl_acs_devices')
        ->where('server_id', $selected_server_id)
        ->max('last_sync');

    if ($last_sync) {
        $sync_age = time() - strtotime($last_sync);
        if ($sync_age > 600) { // More than 10 minutes
            $minutes_ago = floor($sync_age / 60);
            $ui->assign('sync_warning', "Data is {$minutes_ago} minutes old. Last sync: " . date('H:i:s', strtotime($last_sync)));
        }
    }

    // Pagination info
    $total_pages = ceil($total_devices / $per_page);

    $ui->assign('current_page', $page);
    $ui->assign('total_pages', $total_pages);
    $ui->assign('per_page', $per_page);
    $ui->assign('total_devices', $total_devices);
    $ui->assign('search_term', $search);
    $ui->assign('status_filter', $status_filter);
    $ui->assign('rx_power_filter', $rx_power_filter);
    $ui->assign('location_filter', $location_filter);

    // Assign to template
    $ui->assign('available_locations', $available_locations);
    $ui->assign('devices', $devices);
    $ui->assign('device_count', $total_devices);
    $ui->assign('online_count', $online_count);
    $ui->assign('offline_count', $offline_count);
    $ui->assign('warning_count', $warning_count);

    // Calculate percentages
    $ui->assign('online_percentage', $total > 0 ? round(($online_count / $total) * 100, 1) : 0);
    $ui->assign('offline_percentage', $total > 0 ? round(($offline_count / $total) * 100, 1) : 0);
    $ui->assign('warning_percentage', $total > 0 ? round(($warning_count / $total) * 100, 1) : 0);

    // Load display parameters for template
    $ui->assign('display_params', $display_params);
    $ui->assign('servers', $servers);
    $ui->assign('selected_server_id', $selected_server_id);
    $ui->assign('current_server', $current_server);
    $ui->display('genieacs_devices.tpl');
}

function genieacs_get_devices()
{
    // Get all devices without projection first to see full data structure
    return genieacs_api_call('devices', 'GET');
}

function process_device_data($devices)
{
    $processed = [];

    // Load dynamic parameters from database - ONLY basic category untuk device info
    $parameters = ORM::for_table('tbl_acs_parameters')
        ->where_raw('(param_type = ? OR param_type = ?)', ['display', 'both'])
        ->where('param_category', 'basic')  // Only basic parameters for device info
        ->order_by_asc('display_order')
        ->find_many();

    foreach ($devices as $device) {
        $processed_device = [];

        // Process each parameter dynamically
        foreach ($parameters as $param) {
            $value = get_dynamic_parameter_value($device, $param->param_path);

            // Special formatting for certain parameters
            switch ($param->param_key) {
                case 'rx_power':
                    if ($value !== 'N/A' && is_numeric($value)) {
                        $value = $value . ' dBm';
                    }
                    break;
                case 'uptime':
                    if ($value !== 'N/A') {
                        $value = format_uptime($value);
                    }
                    break;
                case 'last_inform':
                    if ($value !== 'N/A') {
                        $value = format_last_inform($value);
                    }
                    break;
                case 'pon_type':
                    $value = strtoupper($value);
                    break;
                case 'temperature':
                    if ($value !== 'N/A' && is_numeric($value)) {
                        $value = $value . '°C';
                    }
                    break;
            }

            $processed_device[$param->param_key] = $value;
        }

        // Add raw device ID for links
        $processed_device['id_raw'] = $processed_device['device_id'] ?? $device['_id'] ?? 'Unknown';

        // Get Tags separately (not from parameters)
        $processed_device['tags'] = '';
        $processed_device['lokasi'] = '';
        if (isset($device['_tags']) && is_array($device['_tags'])) {
            if (isset($device['_tags'][0])) {
                $processed_device['tags'] = $device['_tags'][0];
            }
            if (isset($device['_tags'][1])) {
                $processed_device['lokasi'] = $device['_tags'][1];
            }
        }

        // Determine Status (special logic)
        $processed_device['status'] = determine_device_status($device, $processed_device);

        // Add last inform if not in parameters
        if (!isset($processed_device['last_inform'])) {
            $processed_device['last_inform'] = isset($device['_lastInform']) ? format_last_inform($device['_lastInform']) : 'Never';
        }

        $processed[] = $processed_device;
    }

    return $processed;
}

function get_dynamic_parameter_value($device_data, $param_path)
{
    // Check if multiple paths (comma separated) - PINDAH KE ATAS
    if (strpos($param_path, ',') !== false) {
        $paths = explode(',', $param_path);
        foreach ($paths as $path) {
            $path = trim($path);

            // Try each path with the full logic
            $value = get_dynamic_parameter_value($device_data, $path); // Recursive call

            // Return first valid value found
            if ($value !== null && $value !== 'N/A' && $value !== '' && $value !== false) {
                return $value;
            }
        }
        return 'N/A';
    }

    // Special case untuk model - pakai fallback dari hardcode lama
    if (
        $param_path === 'VirtualParameters.getModel' ||
        $param_path === 'VirtualParameters.deviceModel' ||
        $param_path === '_deviceId._ProductClass'
    ) {
        // ... model handling code tetap sama ...
        if (isset($device_data['_deviceId']['_ProductClass'])) {
            return $device_data['_deviceId']['_ProductClass'];
        }
        if (isset($device_data['InternetGatewayDevice']['DeviceInfo']['ModelName']['_value'])) {
            return $device_data['InternetGatewayDevice']['DeviceInfo']['ModelName']['_value'];
        }
        if (isset($device_data['Device']['DeviceInfo']['ModelName']['_value'])) {
            return $device_data['Device']['DeviceInfo']['ModelName']['_value'];
        }
        return 'N/A';
    }

    // Handle different path types (existing code)
    if (strpos($param_path, 'VirtualParameters.') === 0) {
        // Virtual parameter
        $vp_name = str_replace('VirtualParameters.', '', $param_path);
        return $device_data['VirtualParameters'][$vp_name]['_value'] ?? 'N/A';
    } elseif ($param_path === '_id') {
        // Device ID
        return $device_data['_id'] ?? 'N/A';
    } elseif ($param_path === '_lastInform') {
        // Last Inform
        return $device_data['_lastInform'] ?? 'N/A';
    } elseif (strpos($param_path, '_deviceId.') === 0) {
        // Device ID properties
        $property = str_replace('_deviceId.', '', $param_path);
        return $device_data['_deviceId'][$property] ?? 'N/A';
    } else {
        // Single standard path
        return get_single_path_value($device_data, $param_path);
    }
}
function get_single_path_value($device_data, $path)
{
    $path_parts = explode('.', $path);
    $value = $device_data;

    foreach ($path_parts as $part) {
        if (isset($value[$part])) {
            $value = $value[$part];
        } else {
            return 'N/A';
        }
    }

    return isset($value['_value']) ? $value['_value'] : ($value ?? 'N/A');
}

// New helper function for determining device status
function determine_device_status($device, $processed_device)
{
    $status = 'offline';

    // Check berbagai kemungkinan nama key untuk IP
    $ip = $processed_device['tr069_ip'] ?? $processed_device['pppoe_ip'] ?? $processed_device['ip'] ?? 'N/A';

    // Primary check: last inform time (paling akurat)
    if (isset($device['_lastInform'])) {
        $last_inform_time = strtotime($device['_lastInform']);
        $current_time = time();
        $diff_minutes = ($current_time - $last_inform_time) / 60;

        if ($diff_minutes <= 5) {
            return 'online';
        }

        // Jika lebih dari 5 menit, device offline
        if ($diff_minutes > 5) {
            return 'offline';
        }
    }

    // Secondary check: active IP (tidak reliable, hapus saja)
    // Karena IP bisa ada tapi device offline

    // Check Events.Inform
    if (isset($device['Events']) && isset($device['Events']['Inform'])) {
        $inform_time = strtotime($device['Events']['Inform']);
        $current_time = time();
        $diff_minutes = ($current_time - $inform_time) / 60;

        if ($diff_minutes <= 5) {
            return 'online';
        }
    }

    return 'offline'; // Default offline
}
// Remove these unused functions as we're handling it directly in process_device_data
// They were causing issues with the data extraction

function format_uptime($uptime)
{
    if (!$uptime || $uptime === 'N/A') {
        return 'N/A';
    }

    // Jika uptime sudah dalam format string (dari virtual parameter)
    if (strpos($uptime, 'd ') !== false || strpos($uptime, ':') !== false) {
        return $uptime;
    }

    // Jika uptime dalam seconds
    $seconds = intval($uptime);
    if ($seconds == 0) {
        return 'N/A';
    }

    $days = floor($seconds / 86400);
    $rem = $seconds % 86400;
    $hours = floor($rem / 3600);
    $rem = $rem % 3600;
    $minutes = floor($rem / 60);
    $secs = $rem % 60;

    // Format dengan leading zeros
    $hours = str_pad($hours, 2, '0', STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
    $secs = str_pad($secs, 2, '0', STR_PAD_LEFT);

    return "{$days}d {$hours}:{$minutes}:{$secs}";
}

function format_last_inform($timestamp)
{
    if (!$timestamp) {
        return 'Never';
    }

    $time = strtotime($timestamp);
    $diff = time() - $time;

    if ($diff < 60) {
        return 'Just now';
    } elseif ($diff < 3600) {
        $minutes = floor($diff / 60);
        return "{$minutes}m ago";
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return "{$hours}h ago";
    } else {
        $days = floor($diff / 86400);
        return "{$days}d ago";
    }
}

function genieacs_refresh_device()
{
    $device_id = $_GET['device_id'] ?? '';

    if (empty($device_id)) {
        echo json_encode(['success' => false, 'error' => 'Device ID required']);
        exit;
    }

    // URL encode device ID untuk API call
    $encoded_device_id = urlencode($device_id);

    // Create task array untuk refresh
    $tasks = [
        [
            'name' => 'refreshObject',
            'objectName' => 'InternetGatewayDevice'
        ]
    ];

    $result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $tasks);

    if ($result['success']) {
        echo json_encode(['success' => true, 'message' => 'Refresh command sent successfully']);
    } else {
        $error_msg = 'Failed to refresh device';
        if (isset($result['raw_response'])) {
            $error_msg .= ': ' . $result['raw_response'];
        }
        echo json_encode(['success' => false, 'error' => $error_msg]);
    }
    exit;
}

function genieacs_summon_device($device_id_from_route = '')
{
    header('Content-Type: application/json');

    // Device ID: dari route (pattern B) atau fallback ke query param (legacy)
    $device_id = !empty($device_id_from_route) ? $device_id_from_route : ($_GET['device_id'] ?? '');

    if (empty($device_id)) {
        echo json_encode(['success' => false, 'error' => 'Device ID required']);
        exit;
    }

    try {
        // Resolve raw device ID dari GenieACS
        $raw_device_id = get_raw_device_id($device_id);
        if (!$raw_device_id) {
            echo json_encode(['success' => false, 'error' => 'Device not found in GenieACS']);
            exit;
        }

        // URL encode device ID untuk API call
        $encoded_device_id = rawurlencode($raw_device_id);

        // getParameterValues + connection_request
        // Ambil semua path dari tbl_acs_parameters, fallback auto-discover VP
        $all_paths = genieacs_build_summon_param_list($encoded_device_id);

        if (empty($all_paths)) {
            $result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);
        } else {
            $gpv_task = [
                'name'           => 'getParameterValues',
                'parameterNames' => $all_paths
            ];
            $result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $gpv_task);
        }

        if ($result['success']) {
            // Strategi: cek _lastInform sebelum dan sesudah summon
            // Kalau _lastInform tidak update dalam 4 detik → device tidak merespons
            sleep(4);

            // Query device untuk cek _lastInform terbaru
            $filter = json_encode(['_id' => $raw_device_id]);
            $check_result = genieacs_api_call('devices?query=' . urlencode($filter) . '&projection=_lastInform', 'GET');

            $device_responded = false;
            if ($check_result['success'] && !empty($check_result['data']) && is_array($check_result['data'])) {
                $device_check = $check_result['data'][0] ?? null;
                if ($device_check && isset($device_check['_lastInform'])) {
                    $last_inform_time = strtotime($device_check['_lastInform']);
                    $inform_age = time() - $last_inform_time;
                    // Kalau _lastInform dalam 20 detik terakhir, device merespons
                    $device_responded = ($inform_age <= 20);
                }
            }

            if ($device_responded) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Device summoned successfully. ' . count($all_paths) . ' parameters updated.'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'error' => 'Device is offline or unreachable. Connection request sent but device did not respond.'
                ]);
            }
        } else {
            $error_msg = 'Failed to send connection request';
            if (isset($result['raw_response']) && $result['raw_response'] !== '') {
                $error_msg .= ': ' . $result['raw_response'];
            } elseif (isset($result['error'])) {
                $error_msg .= ': ' . $result['error'];
            }
            echo json_encode(['success' => false, 'error' => $error_msg]);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => 'Exception: ' . $e->getMessage()]);
    }

    exit;
}

/**
 * Build list parameter untuk dikirim saat summon.
 */
function genieacs_build_summon_param_list($encoded_device_id)
{
    $all_paths = [];

    // Primary source: tbl_acs_parameters
    try {
        $params = ORM::for_table('tbl_acs_parameters')
            ->where_in('param_type', ['display', 'update', 'both'])
            ->where_in('param_category', ['basic', 'wifi', 'webadmin'])
            ->find_many();

        foreach ($params as $p) {
            foreach (explode(',', $p->param_path) as $path) {
                $path = trim($path);
                if (!genieacs_is_summon_path_valid($path)) continue;
                if (!in_array($path, $all_paths, true)) {
                    $all_paths[] = $path;
                }
            }
        }
    } catch (Exception $e) {
        error_log('Summon param list from DB failed: ' . $e->getMessage());
    }

    // Fallback: kalau DB kosong, coba auto-discover dari device
    if (empty($all_paths)) {
        $all_paths = genieacs_discover_device_virtual_params($encoded_device_id);
    }

    return $all_paths;
}

/**
 * Validasi apakah sebuah path aman dikirim ke getParameterValues.
 */
function genieacs_is_summon_path_valid($path)
{
    if ($path === '') return false;
    if (strpos($path, '_') === 0) return false;
    if ($path === 'InternetGatewayDevice' || $path === 'Device') return false;
    return true;
}

/**
 * Auto-discover daftar VirtualParameters dari device di MongoDB GenieACS.
 */
function genieacs_discover_device_virtual_params($encoded_device_id)
{
    $paths = [];
    $query = '{"_id":"' . urldecode($encoded_device_id) . '"}';
    $endpoint = 'devices/?query=' . urlencode($query) . '&projection=VirtualParameters';

    $result = genieacs_api_call($endpoint, 'GET');
    if (!$result['success'] || empty($result['data']) || !is_array($result['data'])) {
        return $paths;
    }

    $device = $result['data'][0] ?? null;
    if (!$device || !isset($device['VirtualParameters']) || !is_array($device['VirtualParameters'])) {
        return $paths;
    }

    foreach ($device['VirtualParameters'] as $vp_name => $_val) {
        if (strpos($vp_name, '_') === 0) continue;
        $paths[] = 'VirtualParameters.' . $vp_name;
    }

    return $paths;
}

function genieacs_reboot_device()
{
    $device_id = $_GET['device_id'] ?? '';

    if (empty($device_id)) {
        echo json_encode(['success' => false, 'error' => 'Device ID required']);
        exit;
    }

    // Resolve raw device ID untuk verifikasi nanti
    $raw_device_id = get_raw_device_id($device_id);

    // URL encode device ID
    $encoded_device_id = urlencode($device_id);

    // GenieACS v1.2+ format - single object
    $reboot_task = ['name' => 'reboot'];

    // Send task without connection_request parameter first
    $result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $reboot_task);

    if ($result['success']) {
        // Now trigger connection request to execute the task
        $empty_array = [];
        $conn_result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $empty_array);

        if ($conn_result['success']) {
            // Verifikasi device merespons via _lastInform
            sleep(4);

            $device_responded = false;
            $check_id = $raw_device_id ?: $device_id;
            $filter = json_encode(['_id' => $check_id]);
            $check_result = genieacs_api_call('devices?query=' . urlencode($filter) . '&projection=_lastInform', 'GET');

            if ($check_result['success'] && !empty($check_result['data']) && is_array($check_result['data'])) {
                $device_check = $check_result['data'][0] ?? null;
                if ($device_check && isset($device_check['_lastInform'])) {
                    $last_inform_time = strtotime($device_check['_lastInform']);
                    $inform_age = time() - $last_inform_time;
                    $device_responded = ($inform_age <= 20);
                }
            }

            if ($device_responded) {
                echo json_encode(['success' => true, 'message' => 'Reboot command sent successfully.']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Device is offline or unreachable. Connection request sent but device did not respond.']);
            }
        } else {
            $error_msg = 'Reboot command queued but connection request failed';
            if (isset($conn_result['raw_response'])) {
                $error_msg = $conn_result['raw_response'];
            }
            echo json_encode(['success' => false, 'error' => $error_msg]);
        }
    } else {
        // Try with connection_request directly
        $result2 = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $reboot_task);

        if ($result2['success']) {
            // Verifikasi device merespons
            sleep(4);

            $device_responded = false;
            $check_id = $raw_device_id ?: $device_id;
            $filter = json_encode(['_id' => $check_id]);
            $check_result = genieacs_api_call('devices?query=' . urlencode($filter) . '&projection=_lastInform', 'GET');

            if ($check_result['success'] && !empty($check_result['data']) && is_array($check_result['data'])) {
                $device_check = $check_result['data'][0] ?? null;
                if ($device_check && isset($device_check['_lastInform'])) {
                    $last_inform_time = strtotime($device_check['_lastInform']);
                    $inform_age = time() - $last_inform_time;
                    $device_responded = ($inform_age <= 20);
                }
            }

            if ($device_responded) {
                echo json_encode(['success' => true, 'message' => 'Reboot command sent successfully.']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Device is offline or unreachable. Connection request sent but device did not respond.']);
            }
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'Device is offline or unreachable. Connection request sent but device did not respond.'
            ]);
        }
    }
    exit;
}
function genieacs_find_by_tag()
{
    $tag = $_GET['tag'] ?? '';

    if (empty($tag)) {
        echo json_encode(['success' => false, 'error' => 'Tag parameter required']);
        exit;
    }

    // Check if GenieACS is configured
    $config = load_genieacs_config();
    if (!$config || empty($config['host'])) {
        echo json_encode(['success' => false, 'error' => 'GenieACS not configured']);
        exit;
    }

    // STEP 1: Cari di database lokal dulu (paling cepat)
    $db_device = ORM::for_table('tbl_acs_devices')
        ->where_raw('JSON_UNQUOTE(JSON_EXTRACT(device_data, "$.tags")) = ?', [$tag])
        ->find_one();
    
    if ($db_device) {
        // Verifikasi ke GenieACS API bahwa device masih ada
        $filter = json_encode(['_id' => $db_device->device_id]);
        $verify_result = genieacs_api_call('devices?query=' . urlencode($filter), 'GET');
        
        if ($verify_result['success'] && !empty($verify_result['data'])) {
            $device = $verify_result['data'][0];
            echo json_encode([
                'success' => true,
                'device_id' => $device['_id'],
                'device_tags' => $device['_tags'] ?? [$tag],
                'message' => 'Device found'
            ]);
            exit;
        }
    }
    
    // STEP 2: Query GenieACS dengan filter tag (lebih efisien dari ambil semua)
    // GenieACS mendukung query berdasarkan tag: {"_tags": "tagname"}
    $filter = json_encode(['_tags' => $tag]);
    $devices_result = genieacs_api_call('devices?query=' . urlencode($filter), 'GET');
    
    if ($devices_result['success'] && !empty($devices_result['data'])) {
        $device = $devices_result['data'][0];
        echo json_encode([
            'success' => true,
            'device_id' => $device['_id'],
            'device_tags' => $device['_tags'] ?? [],
            'message' => 'Device found'
        ]);
        exit;
    }
    
    // Device not found
    echo json_encode([
        'success' => false,
        'error' => 'Perangkat tidak ditemukan untuk akun: ' . $tag,
        'searched_tag' => $tag
    ]);
    exit;
}

function genieacs_force_sync()
{
    // Check if admin
    _admin();

    $server_id = $_SESSION['selected_acs_server'] ?? 0;

    if (!$server_id) {
        echo json_encode(['success' => false, 'error' => 'No server selected']);
        exit;
    }

    // AUTO-DETECT base path
    // File ini ada di: /path/to/system/plugin/genieacs_devices.php
    // Kita naik 1 level ke /path/to/system
    $system_path = dirname(__DIR__);
    
    // Verify file exists
    $cron_file = $system_path . '/cron_acs_sync.php';
    if (!file_exists($cron_file)) {
        echo json_encode([
            'success' => false, 
            'error' => 'Cron file not found at: ' . $cron_file
        ]);
        exit;
    }

    // AUTO-DETECT PHP binary
    $php_candidates = ['php82', 'php81', 'php80', 'php8.2', 'php8.1', 'php8.0', 'php'];
    $php_binary = 'php'; // Default fallback
    
    foreach ($php_candidates as $candidate) {
        $which = shell_exec("which " . escapeshellarg($candidate) . " 2>/dev/null");
        if (!empty(trim($which))) {
            $php_binary = $candidate;
            break;
        }
    }

    // Build command - RUN IN BACKGROUND untuk avoid timeout
    $command = sprintf(
        'cd %s && %s cron_acs_sync.php %s > /dev/null 2>&1 &',
        escapeshellarg($system_path),
        escapeshellarg($php_binary),
        escapeshellarg($server_id)
    );
    
    // Execute in background - immediately return
    exec($command);
    
    // Give immediate response without waiting
    echo json_encode([
        'success' => true,
        'message' => 'Sync started in background for selected server. Check the device list in a few moments.',
        'server_id' => $server_id,
        'info' => 'Process running in background - no timeout limit'
    ]);
    exit;
}


function genieacs_ajax_search()
{
    header('Content-Type: application/json');
    
    $server_id = $_SESSION['selected_acs_server'] ?? 0;
    $search = isset($_GET['q']) ? trim($_GET['q']) : '';
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    
    if (!$server_id) {
        echo json_encode(['success' => false, 'error' => 'No server selected']);
        exit;
    }
    
    // GET DISPLAY PARAMETERS - GUNAKAN QUERY YANG SAMA DENGAN MAIN FUNCTION
    $display_params = ORM::for_table('tbl_acs_parameters')
        ->where_raw('(param_type = ? OR param_type = ?)', ['display', 'both'])
        ->where('param_category', 'basic')
        ->order_by_asc('display_order')
        ->find_many();
    
    $per_page = 10;
    $offset = ($page - 1) * $per_page;
    
    // Build query
    $query = ORM::for_table('tbl_acs_devices')
        ->where('server_id', $server_id);
    
    // Apply search if provided
    if (!empty($search)) {
        $search_term = '%' . $search . '%';
        $query->where_raw(
            '(device_id LIKE ? OR 
             JSON_EXTRACT(device_data, "$.pppoe_ip") LIKE ? OR 
             JSON_EXTRACT(device_data, "$.ppp_username") LIKE ? OR 
             JSON_EXTRACT(device_data, "$.tags") LIKE ? OR 
             JSON_EXTRACT(device_data, "$.lokasi") LIKE ?)',
            [$search_term, $search_term, $search_term, $search_term, $search_term]
        );
    }
    
    // Get total for pagination
    $total = $query->count();
    
    // Get devices
    $devices_raw = $query
        ->limit($per_page)
        ->offset($offset)
        ->order_by_desc('last_inform')
        ->find_array();
    
    // Process devices - FULL DYNAMIC
    $result_devices = [];
    foreach ($devices_raw as $device) {
        $data = json_decode($device['device_data'], true) ?: [];
        
        // Base device info
        $processed_device = [
            'device_id' => $device['device_id'],
            'status' => $device['status'],
            'last_inform' => $device['last_inform'] ?? 'Never'
        ];
        
        // Process each display parameter dynamically
        foreach ($display_params as $param) {
            $param_key = $param->param_key;
            $paths = explode(',', $param->param_path);
            $value = '';
            
            // Special handling untuk common variations
            if ($param_key === 'pppoe_username' && isset($data['ppp_username'])) {
                $value = $data['ppp_username'];
            } elseif ($param_key === 'pppoe_ip' && isset($data['pppoe_ip'])) {
                $value = $data['pppoe_ip'];
            } elseif ($param_key === 'mac_address' && isset($data['ppp_mac'])) {
                $value = $data['ppp_mac'];
            } else {
                // Try each path until we find a value
                foreach ($paths as $path) {
                    $path = trim($path);
                    $clean_path = str_replace('VirtualParameters.', '', $path);
                    
                    if (isset($data[$clean_path]) && !empty($data[$clean_path])) {
                        $value = $data[$clean_path];
                        break;
                    } elseif (isset($data[$param_key]) && !empty($data[$param_key])) {
                        $value = $data[$param_key];
                        break;
                    }
                }
            }
            
            $processed_device[$param_key] = $value ?: '';
        }
        
        // Add special fields
        $processed_device['tags'] = $data['tags'] ?? '';
        $processed_device['lokasi'] = $data['lokasi'] ?? '';
        
        // Special handling for router
        if (isset($processed_device['router']) && empty($processed_device['router']) && !empty($data['model'])) {
            $processed_device['router'] = $data['model'];
        }
        
        $result_devices[] = $processed_device;
    }
    
    // Pass display params for JavaScript
    $display_params_array = [];
    foreach ($display_params as $param) {
        $display_params_array[] = [
            'key' => $param->param_key,
            'label' => $param->param_label
        ];
    }
    
    echo json_encode([
        'success' => true,
        'devices' => $result_devices,
        'display_params' => $display_params_array,
        'total' => $total,
        'page' => $page,
        'total_pages' => ceil($total / $per_page)
    ]);
    exit;
}

/**
 * Check if GenieACS Manager plugin exists and has active servers
 * Used for conditional WiFi Management display
 */
function genieacs_has_active_servers() {
    if (!file_exists(__DIR__ . '/genieacs_manager.php')) {
        return false;
    }
    
    $active_servers = ORM::for_table('tbl_acs_servers')
        ->where('status', 'active')
        ->count();
    
    return $active_servers > 0;
}

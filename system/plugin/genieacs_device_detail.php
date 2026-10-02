<?php
// File: system/plugin/genieacs_device_detail.php


register_menu("GenieACS Device Detail", true, "genieacs_device_detail", 'AFTER_genieacs_devices', 'ion ion-information-circled');

/**
 * Get SSID Prefix from database
 * @param string $band - '2g' or '5g'
 * @return string - prefix or empty string if not set
 */
function genieacs_get_ssid_prefix($band = '2g')
{
    $param_key = ($band == '5g') ? 'ssid_prefix_5g' : 'ssid_prefix_2g';
    
    $prefix_param = ORM::for_table('tbl_acs_parameters')
        ->where('param_key', $param_key)
        ->where('param_type', 'config')
        ->find_one();
    
    if ($prefix_param && !empty(trim($prefix_param->param_path))) {
        return trim($prefix_param->param_path);
    }
    
    return '';
}

/**
 * Apply SSID Prefix
 * @param string $ssid - original SSID input
 * @param string $band - '2g' or '5g'
 * @return string - SSID with prefix (if set) or original SSID
 */
function genieacs_apply_ssid_prefix($ssid, $band = '2g')
{
    $prefix = genieacs_get_ssid_prefix($band);
    
    if (!empty($prefix)) {
        // Cek apakah SSID sudah ada prefix (hindari double prefix)
        if (strpos($ssid, $prefix) === 0) {
            // Prefix sudah ada, return SSID tanpa perubahan
            return $ssid;
        }
        
        // Cek juga prefix band lain (misal user copy dari 5G ke 2G)
        $other_band = ($band == '2g') ? '5g' : '2g';
        $other_prefix = genieacs_get_ssid_prefix($other_band);
        
        if (!empty($other_prefix) && strpos($ssid, $other_prefix) === 0) {
            // Hapus prefix lama, ganti dengan prefix baru
            $ssid_without_prefix = substr($ssid, strlen($other_prefix));
            return $prefix . $ssid_without_prefix;
        }
        
        return $prefix . $ssid;
    }
    
    return $ssid;
}

function genieacs_device_detail()
{
    global $ui, $routes;
    _admin();
    $ui->assign('_title', 'GenieACS Device Detail');
    $ui->assign('_system_menu', 'genieacs_device_detail');
    $admin = Admin::_info();
    // Get selected server from session or parameter
    $server_id = $_GET['server_id'] ?? $_SESSION['selected_acs_server'] ?? null;

    if ($server_id) {
        $_SESSION['selected_acs_server'] = $server_id;
    }
    $ui->assign('_admin', $admin);

    $device_id = $routes['2'] ?? '';
    $action = $routes['3'] ?? '';

    if (empty($device_id)) {
        r2(U . 'plugin/genieacs_devices', 'e', 'Device ID is required!');
        return;
    }
    // Debug untuk melihat apa yang terjadi
    if ($_POST && $action == 'update-wifi') {
        error_log("Update WiFi called with device_id: " . $device_id);
        error_log("POST data: " . print_r($_POST, true));
    }

    switch ($action) {
        case 'update-wifi':
            genieacs_update_wifi_settings($device_id);
            break;
        case 'get-users':
            genieacs_get_connected_users($device_id);
            break;
        case 'get-wifi-info':
            genieacs_get_wifi_info_only($device_id);
            break;
        case 'get-device-info':
            genieacs_get_device_info_complete($device_id);
            break;
        case 'update-admin':
            genieacs_update_admin_credentials($device_id);
            break;
        case 'update-tags':
            genieacs_update_device_tags($device_id);
            break;
        case 'summon':
            genieacs_summon_single_device($device_id);
            break;
        case 'refresh':
            genieacs_refresh_single_device($device_id);
            break;
        case 'refresh-webadmin':
            genieacs_refresh_webadmin_params($device_id);
            break;
        case 'refresh-users':
            genieacs_refresh_connected_users($device_id);
            break;
        default:
            genieacs_show_device_detail($device_id);
            break;
    }
}

function genieacs_show_device_detail($device_id)
{
    global $ui;

    // Store device_id in session for later use
    $_SESSION['current_device_id'] = $device_id;

    //debug_genieacs_api($device_id);

    // Check if GenieACS is configured (guard jika helper belum ter-load)
    if (!function_exists('load_genieacs_config')) {
        r2(U . 'plugin/genieacs_manager', 'e', 'Please open GenieACS Manager page first to initialize the plugin!');
        return;
    }
    $config = load_genieacs_config();
    if (!$config || empty($config['host'])) {
        r2(U . 'plugin/genieacs_manager', 'e', 'Please configure GenieACS connection first!');
        return;
    }

    // Get device details
    $device_result = genieacs_get_single_device($device_id);

    if (!$device_result['success']) {
        r2(U . 'plugin/genieacs_devices', 'e', 'Failed to get device details: ' . $device_result['error']);
        return;
    }

    // Process device data
    $device = process_single_device_data($device_result['data']);

    if (!$device) {
        r2(U . 'plugin/genieacs_devices', 'e', 'Device not found!');
        return;
    }

    // Get WiFi information
    // Get username from device tags for fallback
    $device_username = get_username_from_device_tags($device_result['data']);

    // Get WiFi information with enhanced fallback
    $wifi_info = get_device_wifi_info_with_fallback($device_result['data'], $device_username);

    // Get connected users
    $connected_users = get_device_connected_users($device_result['data']);

    // Get Web Admin info
    $web_admin = get_web_admin_info($device_result['data']);

    $ui->assign('device', $device);
    $ui->assign('wifi_info', $wifi_info);
    $ui->assign('connected_users', $connected_users);
    $ui->assign('web_admin', $web_admin);
    $ui->assign('device_id', $device_id);
    $ui->assign('device_id_raw', $device_result['data']['_id']);

    $ui->display('genieacs_device_detail.tpl');
}

function genieacs_get_single_device($device_id)
{
    // Custom log function - tulis ke /data/html/genieacs_debug.log
    $log_file = '/data/html/genieacs_debug.log';
    $write_log = function($message) use ($log_file) {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($log_file, "[{$timestamp}] {$message}\n", FILE_APPEND);
    };
    
    $write_log("=== GENIEACS DEBUG START ===");
    $write_log("Original device_id from URL: " . $device_id);
    
    // Decode bertingkat
    $fully_decoded = $device_id;
    $max_iterations = 5;
    $iteration = 0;
    
    while ($iteration < $max_iterations) {
        $decoded = urldecode($fully_decoded);
        if ($decoded === $fully_decoded) {
            break;
        }
        $fully_decoded = $decoded;
        $iteration++;
    }
    
    $write_log("Fully decoded device_id: " . $fully_decoded);
    
    // STEP 1: Cari di database lokal dulu untuk dapat Device ID yang benar
    $db_device = ORM::for_table('tbl_acs_devices')
        ->where_raw('(device_id = ? OR device_id LIKE ?)', [$fully_decoded, '%' . $fully_decoded . '%'])
        ->find_one();
    
    $device_id_variants = [$fully_decoded];
    
    if ($db_device) {
        // Gunakan device_id dari database sebagai referensi utama
        $device_id_variants[] = $db_device->device_id;
        $write_log("Found in DB: " . $db_device->device_id);
    }
    
    // Tambah variasi lain
    $device_id_variants[] = $device_id;
    $device_id_variants[] = urldecode($device_id);
    
    // Hapus duplikat
    $device_id_variants = array_unique($device_id_variants);
    $write_log("Device ID variants to try: " . json_encode($device_id_variants));
    
    // STEP 2: Coba query ke GenieACS dengan filter (lebih reliable)
    foreach ($device_id_variants as $index => $variant) {
        if (empty($variant)) continue;
        
        // Method A: Query dengan filter exact match
        $filter = json_encode(['_id' => $variant]);
        $query_url = 'devices?query=' . urlencode($filter);
        $write_log("Attempt {$index}A - Filter exact: {$query_url}");
        
        $result = genieacs_api_call($query_url, 'GET');
        $write_log("Attempt {$index}A - HTTP: " . ($result['http_code'] ?? 'N/A') . ", Count: " . (is_array($result['data']) ? count($result['data']) : 0));
        
        if ($result['success'] && !empty($result['data'])) {
            if (is_array($result['data']) && isset($result['data'][0])) {
                $result['data'] = $result['data'][0];
            }
            $write_log("SUCCESS with filter exact match");
            $write_log("=== GENIEACS DEBUG END ===");
            return $result;
        }
        
        // Method B: Query dengan filter LIKE/regex (untuk partial match)
        // Escape special regex characters
        $escaped_variant = preg_quote($variant, '/');
        $filter_regex = json_encode(['_id' => ['$regex' => $escaped_variant]]);
        $query_url_regex = 'devices?query=' . urlencode($filter_regex);
        $write_log("Attempt {$index}B - Filter regex: {$query_url_regex}");
        
        $result = genieacs_api_call($query_url_regex, 'GET');
        $write_log("Attempt {$index}B - HTTP: " . ($result['http_code'] ?? 'N/A') . ", Count: " . (is_array($result['data']) ? count($result['data']) : 0));
        
        if ($result['success'] && !empty($result['data'])) {
            if (is_array($result['data']) && isset($result['data'][0])) {
                $result['data'] = $result['data'][0];
            }
            $write_log("SUCCESS with filter regex match");
            $write_log("=== GENIEACS DEBUG END ===");
            return $result;
        }
    }
    
    // STEP 3: Coba cari dengan Serial Number (bagian terakhir dari device ID)
    // Device ID format: OUI-ProductClass-SerialNumber
    $parts = explode('-', $fully_decoded);
    if (count($parts) >= 3) {
        $serial_number = end($parts); // Ambil bagian terakhir (Serial Number)
        $write_log("Trying with Serial Number: " . $serial_number);
        
        $filter_sn = json_encode(['_id' => ['$regex' => $serial_number]]);
        $query_url_sn = 'devices?query=' . urlencode($filter_sn);
        
        $result = genieacs_api_call($query_url_sn, 'GET');
        $write_log("Serial search - HTTP: " . ($result['http_code'] ?? 'N/A') . ", Count: " . (is_array($result['data']) ? count($result['data']) : 0));
        
        if ($result['success'] && !empty($result['data'])) {
            // Jika dapat lebih dari 1, cari yang paling cocok
            if (is_array($result['data'])) {
                foreach ($result['data'] as $device) {
                    if (isset($device['_id']) && strpos($device['_id'], $serial_number) !== false) {
                        $result['data'] = $device;
                        $write_log("SUCCESS with Serial Number match: " . $device['_id']);
                        $write_log("=== GENIEACS DEBUG END ===");
                        return $result;
                    }
                }
                // Jika tidak ada yang exact match, ambil yang pertama
                if (isset($result['data'][0])) {
                    $result['data'] = $result['data'][0];
                    $write_log("SUCCESS with Serial Number (first result)");
                    $write_log("=== GENIEACS DEBUG END ===");
                    return $result;
                }
            }
        }
    }
    
    // STEP 4: Fallback - Load dari database lokal jika ada
    if ($db_device) {
        $write_log("FALLBACK - Loading from local database");
        
        $device_data = json_decode($db_device->device_data, true) ?: [];
        
        // Bangun struktur mirip GenieACS response
        $cached_device = [
            '_id' => $db_device->device_id,
            '_lastInform' => $db_device->last_inform,
            '_tags' => [],
            '_source' => 'database',
            '_cached' => true,
        ];
        
        if (!empty($device_data['tags'])) {
            $cached_device['_tags'][] = $device_data['tags'];
        }
        if (!empty($device_data['lokasi'])) {
            $cached_device['_tags'][] = $device_data['lokasi'];
        }
        
        foreach ($device_data as $key => $value) {
            $cached_device['_cached_' . $key] = $value;
        }
        
        $write_log("SUCCESS - Loaded from database cache");
        $write_log("=== GENIEACS DEBUG END ===");
        
        return [
            'success' => true,
            'http_code' => 200,
            'data' => $cached_device,
            'raw_response' => 'Loaded from local database',
            'from_cache' => true
        ];
    }
    
    $write_log("FAILED - Device not found anywhere");
    $write_log("=== GENIEACS DEBUG END ===");
    
    return [
        'success' => false,
        'http_code' => 404,
        'data' => null,
        'raw_response' => 'Device not found: ' . $fully_decoded
    ];
}

function process_single_device_data($device_data)
{
    if (!$device_data) {
        return null;
    }

    // Panggil function process_device_data yang sudah ada
    // Function ini sudah ada di memory karena file genieacs_devices.php sudah loaded
    $devices = process_device_data([$device_data]);
    return isset($devices[0]) ? $devices[0] : null;
}

function get_device_wifi_info($device_data)
{
    // Load WiFi parameters from database
    $wifi_params = ORM::for_table('tbl_acs_parameters')
        ->where('param_category', 'wifi')
        ->where_raw('(param_type = ? OR param_type = ?)', ['display', 'both'])
        ->find_many();

    $wifi_info = [];

    foreach ($wifi_params as $param) {
        $value = get_dynamic_parameter_value($device_data, $param->param_path);

        // Special handling for certain WiFi parameters
        switch ($param->param_key) {
            case 'wifi_ssid_2g':
                $wifi_info['ssid_2g'] = $value;
                $wifi_info['wifi_2g_enabled'] = ($value !== 'N/A' && !empty($value));
                break;
            case 'wifi_ssid_5g':
                $wifi_info['ssid_5g'] = $value;
                $wifi_info['wifi_5g_enabled'] = ($value !== 'N/A' && !empty($value));
                break;
            case 'wifi_password':
                $wifi_info['password'] = $value;
                break;
            case 'connected_devices':
                // Parse connected devices if it's a JSON or comma-separated value
                if ($value !== 'N/A') {
                    $wifi_info['connected_count'] = $value;
                }
                break;
            default:
                $wifi_info[$param->param_key] = $value;
                break;
        }
    }

    // Ensure default values for backward compatibility
    $wifi_info['ssid_2g'] = $wifi_info['wifi_ssid_2g'] ?? $wifi_info['ssid_2g'] ?? 'N/A';
    $wifi_info['ssid_5g'] = $wifi_info['wifi_ssid_5g'] ?? $wifi_info['ssid_5g'] ?? 'N/A';
    $wifi_info['password'] = $wifi_info['wifi_password'] ?? $wifi_info['password'] ?? 'N/A';
    // Hapus total_2g dan total_5g - sudah ada wifi_connected_2g dan wifi_connected_5g
    $wifi_info['wifi_2g_enabled'] = $wifi_info['wifi_2g_enabled'] ?? false;
    $wifi_info['wifi_5g_enabled'] = $wifi_info['wifi_5g_enabled'] ?? false;

    return $wifi_info;
}

function get_band_by_mac($mac, $device_data)
{
    // Normalize MAC untuk perbandingan (lowercase, hapus spasi)
    $mac_clean = strtolower(trim($mac));

    $wlan_configs = isset($device_data['InternetGatewayDevice']['LANDevice']['1']['WLANConfiguration'])
        ? $device_data['InternetGatewayDevice']['LANDevice']['1']['WLANConfiguration']
        : [];

    foreach ($wlan_configs as $wlan_index => $wlan_data) {
        if (!is_array($wlan_data) || !isset($wlan_data['AssociatedDevice'])) {
            continue;
        }

        // Tentukan band berdasarkan index WLANConfiguration
        // Index 1,2,3,4 = 2.4GHz | Index 5,6,7,8 = 5GHz
        // Sesuai screenshot GenieACS: SSID1 channel 1 = 2.4G, SSID5 channel 36 = 5G
        $wlan_index_int = intval($wlan_index);
        $band = ($wlan_index_int >= 5) ? 'WiFi 5GHz' : 'WiFi 2.4GHz';

        foreach ($wlan_data['AssociatedDevice'] as $assoc_id => $assoc_data) {
            if (!is_array($assoc_data)) {
                continue;
            }
            $assoc_mac = isset($assoc_data['AssociatedDeviceMACAddress']['_value'])
                ? strtolower(trim($assoc_data['AssociatedDeviceMACAddress']['_value']))
                : '';

            if ($assoc_mac === $mac_clean) {
                return $band;
            }
        }
    }

    // Tidak ditemukan di AssociatedDevice manapun
    return null;
}

function get_device_connected_users($device_data)
{
    $users = [];

    // STEP 1: Bangun LAN HOST lookup table (MAC => [hostname, ip, interface])
    $lan_host_lookup = [];
    if (isset($device_data['InternetGatewayDevice']['LANDevice']['1']['Hosts']['Host'])) {
        $hosts = $device_data['InternetGatewayDevice']['LANDevice']['1']['Hosts']['Host'];
        foreach ($hosts as $host_id => $host_data) {
            if (!is_array($host_data)) {
                continue;
            }
            $mac_key = strtolower(trim(
                isset($host_data['MACAddress']['_value']) ? $host_data['MACAddress']['_value'] : ''
            ));
            if (empty($mac_key)) {
                continue;
            }
            $lan_host_lookup[$mac_key] = [
                'hostname'  => (isset($host_data['HostName']['_value']) && !empty(trim($host_data['HostName']['_value'])))
                                ? $host_data['HostName']['_value']
                                : 'Unknown Device',
                'ip'        => isset($host_data['IPAddress']['_value'])     ? $host_data['IPAddress']['_value']     : 'N/A',
                'interface' => isset($host_data['InterfaceType']['_value']) ? $host_data['InterfaceType']['_value'] : '802.11',
            ];
        }
    }

    // STEP 2: Ambil device aktif dari AssociatedDevice per WLANConfiguration
    // Index 1,2,3,4 = 2.4GHz | Index 5,6,7,8 = 5GHz
    $wlan_configs = isset($device_data['InternetGatewayDevice']['LANDevice']['1']['WLANConfiguration'])
        ? $device_data['InternetGatewayDevice']['LANDevice']['1']['WLANConfiguration']
        : [];

    $seen_macs = []; // Tracking MAC yang sudah diproses untuk hindari duplikat

    foreach ($wlan_configs as $wlan_index => $wlan_data) {
        if (!is_array($wlan_data) || !isset($wlan_data['AssociatedDevice'])) {
            continue;
        }

        // Tentukan band berdasarkan index
        $band = (intval($wlan_index) >= 5) ? 'WiFi 5GHz' : 'WiFi 2.4GHz';

        foreach ($wlan_data['AssociatedDevice'] as $assoc_id => $assoc_data) {
            if (!is_array($assoc_data)) {
                continue;
            }

            $mac_raw = isset($assoc_data['AssociatedDeviceMACAddress']['_value'])
                ? $assoc_data['AssociatedDeviceMACAddress']['_value']
                : '';

            if (empty($mac_raw)) {
                continue;
            }

            $mac_clean = strtolower(trim($mac_raw));

            // Skip jika MAC sudah pernah diproses (duplikat)
            if (isset($seen_macs[$mac_clean])) {
                continue;
            }
            $seen_macs[$mac_clean] = true;

            // STEP 3: Lookup hostname & IP dari LAN HOST berdasarkan MAC
            $hostname  = 'Unknown Device';
            $ip        = 'N/A';
            $interface = '802.11';

            if (isset($lan_host_lookup[$mac_clean])) {
                $hostname  = $lan_host_lookup[$mac_clean]['hostname'];
                $ip        = $lan_host_lookup[$mac_clean]['ip'];
                $interface = $lan_host_lookup[$mac_clean]['interface'];
            }

            $users[] = [
                'hostname'        => $hostname,
                'ip'              => $ip,
                'mac'             => $mac_raw,
                'interface'       => $interface,
                'connection_type' => $band
            ];
        }
    }

    return $users;
}
function get_web_admin_info($device_data)
{
    // Get device ID for database lookup
    $device_id = $device_data['_id'] ?? '';
    $server_id = $_SESSION['selected_acs_server'] ?? 1;

    // Load from database first
    $db_credentials = ORM::for_table('tbl_acs_webadmin_history')
        ->where('server_id', $server_id)
        ->where('device_id', $device_id)
        ->order_by_desc('changed_at')
        ->find_one();

    // Set database values as defaults
    $web_admin = [
        'super_username' => $db_credentials ? $db_credentials->super_username : '',
        'super_password' => $db_credentials ? $db_credentials->super_password : '',
        'user_username' => $db_credentials ? $db_credentials->user_username : '',
        'user_password' => $db_credentials ? $db_credentials->user_password : ''
    ];

    // Load webadmin parameters from database
    $webadmin_params = ORM::for_table('tbl_acs_parameters')
        ->where('param_category', 'webadmin')
        ->where_raw('(param_type = ? OR param_type = ?)', ['display', 'both'])
        ->find_many();

    // Try to get values from device (both username and password)
    foreach ($webadmin_params as $param) {
        $value = '';
        $paths = explode(',', $param->param_path);

        foreach ($paths as $path) {
            $path = trim($path);
            $temp_value = get_dynamic_parameter_value($device_data, $path);

            if ($temp_value !== 'N/A' && !empty($temp_value)) {
                $value = $temp_value;
                break;
            }
        }

        // Override database values if device has actual values
        switch ($param->param_key) {
            case 'webadmin_super_user':
                if (!empty($value)) {
                    $web_admin['super_username'] = $value;
                }
                break;
            case 'webadmin_super_pass':
                // Check password from device first, use database as fallback
                if (!empty($value) && $value !== 'N/A') {
                    $web_admin['super_password'] = $value;
                }
                break;
            case 'webadmin_user_user':
                if (!empty($value)) {
                    $web_admin['user_username'] = $value;
                }
                break;
            case 'webadmin_user_pass':
                // Check password from device first, use database as fallback
                if (!empty($value) && $value !== 'N/A') {
                    $web_admin['user_password'] = $value;
                }
                break;
        }
    }

    return $web_admin;
}


function genieacs_update_admin_credentials($device_id)
{
    header('Content-Type: application/json');

    if (!$_POST) {
        echo json_encode(['success' => false, 'error' => 'No data received']);
        exit;
    }

    $super_username = isset($_POST['super_username']) ? trim($_POST['super_username']) : null;
    $super_password = isset($_POST['super_password']) ? $_POST['super_password'] : null;
    $user_username = isset($_POST['user_username']) ? trim($_POST['user_username']) : null;
    $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : null;

    // Get raw device ID
    $raw_device_id = get_raw_device_id($device_id);
    if (!$raw_device_id) {
        echo json_encode(['success' => false, 'error' => 'Device not found']);
        exit;
    }

    $encoded_device_id = rawurlencode($raw_device_id);

    // Load webadmin parameters from database
    $webadmin_params = ORM::for_table('tbl_acs_parameters')
        ->where('param_category', 'webadmin')
        ->where_raw('(param_type = ? OR param_type = ?)', ['update', 'both'])
        ->find_many();

    if (count($webadmin_params) == 0) {
        echo json_encode(['success' => false, 'error' => 'WebAdmin parameters not configured']);
        exit;
    }

    $parameter_values = [];
    $fields_to_update = [];

    foreach ($webadmin_params as $param) {
        $paths = explode(',', $param->param_path);

        switch ($param->param_key) {
            case 'webadmin_super_user':
                // Only update if not empty
                if (!empty($super_username)) {
                    foreach ($paths as $path) {
                        $parameter_values[] = [trim($path), $super_username];
                    }
                    $fields_to_update[] = 'Super Admin Username';
                }
                break;

            case 'webadmin_super_pass':
                // Only update if password provided (not empty)
                if ($super_password !== null && $super_password !== '') {
                    foreach ($paths as $path) {
                        $parameter_values[] = [trim($path), $super_password];
                    }
                    $fields_to_update[] = 'Super Admin Password';
                }
                break;

            case 'webadmin_user_user':
                // Only update if not empty
                if (!empty($user_username)) {
                    foreach ($paths as $path) {
                        $parameter_values[] = [trim($path), $user_username];
                    }
                    $fields_to_update[] = 'User Admin Username';
                }
                break;

            case 'webadmin_user_pass':
                // Only update if password provided (not empty)
                if ($user_password !== null && $user_password !== '') {
                    foreach ($paths as $path) {
                        $parameter_values[] = [trim($path), $user_password];
                    }
                    $fields_to_update[] = 'User Admin Password';
                }
                break;
        }
    }

    if (empty($parameter_values)) {
        echo json_encode(['success' => false, 'error' => 'No changes to update']);
        exit;
    }

    // Send update task
    $task = [
        'name' => 'setParameterValues',
        'parameterValues' => $parameter_values
    ];

    $result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $task);

    if ($result['success']) {
        // Trigger connection request
        genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);

        // Save to database
        $server_id = $_SESSION['selected_acs_server'] ?? 1;

        // Check if record exists
        $existing = ORM::for_table('tbl_acs_webadmin_history')
            ->where('server_id', $server_id)
            ->where('device_id', $raw_device_id)
            ->find_one();

        if ($existing) {
            // Update only changed fields
            if (!empty($super_username)) {
                $existing->super_username = $super_username;
            }
            if ($super_password !== null && $super_password !== '') {
                $existing->super_password = $super_password;
            }
            if (!empty($user_username)) {
                $existing->user_username = $user_username;
            }
            if ($user_password !== null && $user_password !== '') {
                $existing->user_password = $user_password;
            }
            $existing->changed_by = $_SESSION['admin_username'] ?? 'system';
            $existing->changed_at = date('Y-m-d H:i:s');
            $existing->save();
        } else {
            // Create new record
            $history = ORM::for_table('tbl_acs_webadmin_history')->create();
            $history->server_id = $server_id;
            $history->device_id = $raw_device_id;
            $history->super_username = $super_username ?: '';
            $history->super_password = $super_password ?: '';
            $history->user_username = $user_username ?: '';
            $history->user_password = $user_password ?: '';
            $history->changed_by = $_SESSION['admin_username'] ?? 'system';
            $history->save();
        }

        echo json_encode([
            'success' => true,
            'message' => 'Updated: ' . implode(', ', $fields_to_update)
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Failed to update credentials: ' . ($result['error'] ?? 'Unknown error')
        ]);
    }
    exit;
}
function genieacs_refresh_webadmin_params($device_id)
{
    header('Content-Type: application/json');

    // Get raw device ID
    $raw_device_id = get_raw_device_id($device_id);
    if (!$raw_device_id) {
        echo json_encode(['success' => false, 'error' => 'Device not found']);
        exit;
    }

    $encoded_device_id = rawurlencode($raw_device_id);

    // Load webadmin parameters from database
    $webadmin_params = ORM::for_table('tbl_acs_parameters')
        ->where('param_category', 'webadmin')
        ->find_many();

    if (count($webadmin_params) == 0) {
        echo json_encode(['success' => false, 'error' => 'No webadmin parameters configured']);
        exit;
    }

    // First summon device
    $summon_result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);

    if (!$summon_result['success']) {
        echo json_encode(['success' => false, 'error' => 'Failed to connect to device']);
        exit;
    }

    // Wait for connection
    sleep(2);

    // Refresh each webadmin parameter path
    $refresh_tasks = [];
    $processed_paths = []; // Track to avoid duplicates

    foreach ($webadmin_params as $param) {
        $paths = explode(',', $param->param_path);
        foreach ($paths as $path) {
            $path = trim($path);
            if (!in_array($path, $processed_paths)) {
                $refresh_tasks[] = [
                    'name' => 'getParameterValues',
                    'parameterNames' => [$path]
                ];
                $processed_paths[] = $path;
            }
        }
    }

    // Execute refresh tasks
    foreach ($refresh_tasks as $task) {
        genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $task);
        usleep(200000); // 0.2 second delay between tasks
    }

    echo json_encode(['success' => true, 'message' => 'WebAdmin parameters refreshed']);
    exit;
}

/**
 * Refresh Connected Users data from device (hardcoded paths for Huawei/generic TR-069).
 *
 * Flow:
 *  1. Summon device (connection_request) — supaya ONT siap merespons
 *  2. Kirim refreshObject untuk tiap path terkait Connected Users
 *  3. Response sukses → UI tinggal reload untuk tampilkan data baru
 *
 * Path hardcoded:
 *   - InternetGatewayDevice.LANDevice.1.Hosts          (daftar host yang pernah connect)
 *   - InternetGatewayDevice.LANDevice.1.WLANConfiguration (termasuk AssociatedDevice per WLAN)
 */
function genieacs_refresh_connected_users($device_id)
{
    header('Content-Type: application/json');

    $raw_device_id = get_raw_device_id($device_id);
    if (!$raw_device_id) {
        echo json_encode(['success' => false, 'error' => 'Device not found']);
        exit;
    }
    $encoded_device_id = rawurlencode($raw_device_id);

    // Step 1: Summon the device first so it's awake and will respond
    $summon_result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);
    if (!$summon_result['success']) {
        echo json_encode([
            'success' => false,
            'error'   => 'Device is offline or unreachable. Connection request sent but device did not respond.',
        ]);
        exit;
    }

    // Short delay so the session is established
    sleep(1);

    // Step 2: Build refreshObject tasks (hardcoded — cover Huawei & generic TR-069)
    $refresh_paths = [
        'InternetGatewayDevice.LANDevice.1.Hosts',
        'InternetGatewayDevice.LANDevice.1.WLANConfiguration',
    ];

    $ok_count = 0;
    foreach ($refresh_paths as $path) {
        $task = [
            'name'       => 'refreshObject',
            'objectName' => $path,
        ];
        $r = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $task);
        if ($r['success']) {
            $ok_count++;
        }
        usleep(300000); // 0.3 detik jeda antar task biar ONT tidak overload
    }

    if ($ok_count === 0) {
        echo json_encode([
            'success' => false,
            'error'   => 'Failed to send refresh tasks. Device may be offline.',
        ]);
        exit;
    }

    // Step 3: small delay supaya GenieACS sempat pull data baru sebelum UI reload
    sleep(2);

    echo json_encode([
        'success' => true,
        'message' => 'Connected users refreshed',
    ]);
    exit;
}

function genieacs_update_wifi_settings($device_id)
{
    header('Content-Type: application/json');

    if (!$_POST) {
        echo json_encode(['success' => false, 'error' => 'No data received']);
        exit;
    }

    $new_ssid = trim($_POST['ssid'] ?? '');
    $new_password = trim($_POST['password'] ?? '');
    $force_security = isset($_POST['force_security']) && $_POST['force_security'] == '1';

    // Validate inputs
    if (empty($new_ssid)) {
        echo json_encode(['success' => false, 'error' => 'SSID is required']);
        exit;
    }

    // Get raw device ID
    $raw_device_id = get_raw_device_id($device_id);

    if (!$raw_device_id) {
        echo json_encode(['success' => false, 'error' => 'Device not found in GenieACS']);
        exit;
    }

    // Encode raw device ID untuk API call
    $encoded_device_id = rawurlencode($raw_device_id);

    // If force security is enabled, update security mode first
    if ($force_security) {
        // Set BeaconType to WPA/WPA2 for both 2.4G and 5G
        // Note: Some devices use "WPA/WPA2", others use "WPAand11i" or "11i"
        // Using exact string as shown in GenieACS interface
        $security_params = [
            ['InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.BeaconType', 'WPA/WPA2'],
            ['InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.BeaconType', 'WPA/WPA2']
        ];

        $security_task = [
            'name' => 'setParameterValues',
            'parameterValues' => $security_params
        ];

        $security_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $security_task);

        if (!$security_result['success']) {
            echo json_encode(['success' => false, 'error' => 'Failed to update security mode: ' . ($security_result['error'] ?? 'Unknown error')]);
            exit;
        }

        // Send connection request to apply security changes
        genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);

        // Wait for security change to apply before setting password
        sleep(2);
    }

    // Get device data first to check capabilities
    $device_result = genieacs_get_single_device($device_id);

    if (!$device_result['success']) {
        echo json_encode(['success' => false, 'error' => 'Failed to get device info: ' . $device_result['error']]);
        exit;
    }

    $device_data = $device_result['data'];

    // Load WiFi update parameters from database
    $wifi_params = ORM::for_table('tbl_acs_parameters')
        ->where('param_category', 'wifi')
        ->where_raw('(param_type = ? OR param_type = ?)', ['update', 'both'])
        ->find_many();

    $success_count = 0;
    $error_messages = [];
    $parameter_values = [];
    $virtual_parameters = [];

    // Build SSID parameter values from dynamic configuration - MULTIPATH SUPPORT
    foreach ($wifi_params as $param) {
        switch ($param->param_key) {
            case 'wifi_ssid_2g':
                // Apply prefix for 2.4G (if set in config)
                $final_ssid_2g = genieacs_apply_ssid_prefix($new_ssid, '2g');
                
                // Split multiple paths by comma for SSID 2G
                $ssid_2g_paths = explode(',', $param->param_path);
                foreach ($ssid_2g_paths as $path) {
                    $path = trim($path);
                    if (!empty($path)) {
                        $parameter_values[] = [$path, $final_ssid_2g];
                    }
                }
                break;
            case 'wifi_ssid_5g':
                // Apply prefix for 5G (if set in config)
                $final_ssid_5g = genieacs_apply_ssid_prefix($new_ssid, '5g');
                
                // Split multiple paths by comma for SSID 5G
                $ssid_5g_paths = explode(',', $param->param_path);
                foreach ($ssid_5g_paths as $path) {
                    $path = trim($path);
                    if (!empty($path)) {
                        $parameter_values[] = [$path, $final_ssid_5g];
                    }
                }
                break;
        }
    }

    // DEBUG: Log SSID multipath processing
    error_log("=== GENIEACS SSID MULTIPATH DEBUG ===");
    foreach ($wifi_params as $param) {
        if ($param->param_key == 'wifi_ssid_2g' || $param->param_key == 'wifi_ssid_5g') {
            error_log("Parameter key: " . $param->param_key);
            error_log("Parameter paths: " . $param->param_path);
            $paths = explode(',', $param->param_path);
            error_log("Split paths: " . json_encode($paths));
        }
    }

    // Password update using dynamic parameters from database
    if (!empty($new_password)) {
        if (strlen($new_password) < 8) {
            echo json_encode(['success' => false, 'error' => 'Password must be at least 8 characters']);
            exit;
        }

        // Get password parameter from database
        $password_param = ORM::for_table('tbl_acs_parameters')
            ->where('param_key', 'wifi_password')
            ->where('param_category', 'wifi')
            ->find_one();

        if ($password_param) {
            // Split multiple paths by comma
            $password_paths = explode(',', $password_param->param_path);

            foreach ($password_paths as $path) {
                $path = trim($path);

                // Separate virtual parameters from standard parameters
                if (strpos($path, 'VirtualParameters') === 0) {
                    $virtual_parameters[] = [$path, $new_password];
                } else {
                    // If force security enabled, only use PreSharedKey paths
                    if ($force_security) {
                        if (strpos($path, 'PreSharedKey') !== false) {
                            $parameter_values[] = [$path, $new_password];
                        }
                    } else {
                        // Use all standard TR-069 paths
                        $parameter_values[] = [$path, $new_password];
                    }
                }
            }
        } else {
            // Dynamic fallback based on database parameters
            $fallback_params = ORM::for_table('tbl_acs_parameters')
                ->where('param_category', 'wifi')
                ->where('param_key', 'wifi_password')
                ->find_many();

            if (!empty($fallback_params)) {
                foreach ($fallback_params as $param) {
                    $paths = explode(',', $param->param_path);

                    // Separate virtual and standard parameters
                    $virtual_paths = array();
                    $standard_paths = array();

                    foreach ($paths as $path) {
                        $path = trim($path);
                        if (!empty($path)) {
                            if (strpos($path, 'VirtualParameters') === 0) {
                                $virtual_paths[] = $path;
                            } else {
                                $standard_paths[] = $path;
                            }
                        }
                    }

                    // Add standard paths to parameter_values
                    foreach ($standard_paths as $path) {
                        $parameter_values[] = [$path, $new_password];
                    }

                    // Handle virtual paths if any
                    if (!empty($virtual_paths)) {
                        foreach ($virtual_paths as $virtual_path) {
                            $virtual_task = [
                                'name' => 'setParameterValues',
                                'parameterValues' => [[$virtual_path, $new_password]]
                            ];

                            $virtual_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $virtual_task);
                            if (!$virtual_result['success']) {
                                error_log("Fallback virtual parameter failed: " . $virtual_path);
                            }
                        }
                    }
                }
            } else {
                // Ultimate fallback jika database parameter kosong
                $parameter_values[] = ['InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.KeyPassphrase', $new_password];
            }
        }
    }

    // Update virtual parameters first if any
    if (!empty($virtual_parameters)) {
        $virtual_result = update_virtual_parameters($encoded_device_id, $virtual_parameters);
        if ($virtual_result['success']) {
            $success_count++;
        } else {
            $error_messages[] = $virtual_result['error'];
        }
    }

    // Send update task for standard parameters if we have any
    if (!empty($parameter_values)) {
        $task = [
            'name' => 'setParameterValues',
            'parameterValues' => $parameter_values
        ];

        $result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $task);

        if ($result['success']) {
            $success_count++;
        } else {
            $error_detail = $result['error'] ?? $result['raw_response'] ?? 'Unknown error';
            $error_messages[] = "Failed to update WiFi settings: " . $error_detail;
        }
    }

    // Check if we have at least some parameters to update
    if (empty($parameter_values) && empty($virtual_parameters)) {
        echo json_encode(['success' => false, 'error' => 'No update parameters configured']);
        exit;
    }

    // Send connection request to apply changes
    if ($success_count > 0) {
        genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);
        // ===== SAVE PASSWORD TO DATABASE =====
        if (!empty($new_password)) {
            // Get username from device for saving password
            $device_result = genieacs_get_single_device($device_id);
            if ($device_result['success']) {
                $device_username = get_username_from_device_tags($device_result['data']);
                if ($device_username) {
                    // Pass the actual device_id untuk konsistensi
                    save_password_to_database($device_username, $new_password, $raw_device_id);
                }
            }
        }
        // ===== END SAVE PASSWORD =====

        $message = 'WiFi settings updated successfully.';
        if (empty($new_password)) {
            $message .= ' (Password unchanged)';
        }
        $message .= ' Changes will be applied shortly.';

        echo json_encode([
            'success' => true,
            'message' => $message
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Failed to update WiFi settings: ' . implode(', ', $error_messages)
        ]);
    }
    exit;
}

function update_virtual_parameters($encoded_device_id, $virtual_parameters)
{
    try {
        // Step 1: Refresh virtual parameters first
        $refresh_task = [
            'name' => 'refreshObject',
            'objectName' => 'VirtualParameters'
        ];

        $refresh_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $refresh_task);

        if (!$refresh_result['success']) {
            return ['success' => false, 'error' => 'Failed to refresh virtual parameters'];
        }

        // Step 2: Send connection request to refresh
        genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);

        // Step 3: Wait for refresh to complete
        sleep(2);

        // Step 4: Update virtual parameters with explicit type
        $formatted_params = [];
        foreach ($virtual_parameters as $param) {
            // Format: [parameter_path, value, type]
            $formatted_params[] = [$param[0], $param[1], 'xsd:string'];
        }

        $update_task = [
            'name' => 'setParameterValues',
            'parameterValues' => $formatted_params
        ];

        $update_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $update_task);

        if ($update_result['success']) {
            // Step 5: Send final connection request to apply changes
            genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);
            return ['success' => true, 'message' => 'Virtual parameters updated successfully'];
        } else {
            return ['success' => false, 'error' => 'Failed to update virtual parameters: ' . ($update_result['error'] ?? 'Unknown error')];
        }
    } catch (Exception $e) {
        return ['success' => false, 'error' => 'Exception in virtual parameter update: ' . $e->getMessage()];
    }
}

function genieacs_get_connected_users($device_id)
{
    $device_result = genieacs_get_single_device($device_id);

    if (!$device_result['success']) {
        echo json_encode(['success' => false, 'error' => $device_result['error']]);
        exit;
    }

    $users = get_device_connected_users($device_result['data']);
    echo json_encode(['success' => true, 'users' => $users]);
    exit;
}



function genieacs_get_wifi_info_only($device_id)
{
    $device_result = genieacs_get_single_device($device_id);

    if (!$device_result['success']) {
        echo json_encode(['success' => false, 'error' => $device_result['error']]);
        exit;
    }

    // Get username from device tags
    $device_username = get_username_from_device_tags($device_result['data']);

    // Get WiFi info with fallback
    $wifi_info = get_device_wifi_info_with_fallback($device_result['data'], $device_username);

    echo json_encode([
        'success' => true,
        'wifi_info' => $wifi_info
    ]);
    exit;
}


function genieacs_get_device_info_complete($device_id)
{
    $device_result = genieacs_get_single_device($device_id);

    if (!$device_result['success']) {
        echo json_encode(['success' => false, 'error' => $device_result['error']]);
        exit;
    }

    // Process device data for device info
    $devices = process_device_data([$device_result['data']]);
    $device_info = isset($devices[0]) ? $devices[0] : null;

    if (!$device_info) {
        echo json_encode(['success' => false, 'error' => 'Failed to process device data']);
        exit;
    }

    // Get WiFi information
    // Get username from device tags
    $device_username = get_username_from_device_tags($device_result['data']);

    // Get WiFi information with fallback
    $wifi_info = get_device_wifi_info_with_fallback($device_result['data'], $device_username);

    echo json_encode([
        'success' => true,
        'device_info' => [
            'model' => $device_info['model'],
            'vendor' => $device_info['vendor'],  // Tambah ini
            'Vendor' => $device_info['vendor'],  // Ganti ke vendor
            'pon_type' => $device_info['pon_type'],
            'rx_power' => $device_info['rx_power']
        ],
        'wifi_info' => $wifi_info
    ]);
    exit;
}




function get_raw_device_id($device_id)
{
    // Decode bertingkat untuk handle double/triple encoding
    $fully_decoded = $device_id;
    $max_iterations = 5;
    $iteration = 0;
    
    while ($iteration < $max_iterations) {
        $decoded = urldecode($fully_decoded);
        if ($decoded === $fully_decoded) {
            break;
        }
        $fully_decoded = $decoded;
        $iteration++;
    }
    
    // Daftar variasi device ID
    $device_id_variants = [
        $fully_decoded,
        $device_id,
        urldecode($device_id),
    ];
    $device_id_variants = array_unique($device_id_variants);
    
    // STEP 1: Coba query exact match
    foreach ($device_id_variants as $variant) {
        if (empty($variant)) continue;
        
        $filter = json_encode(['_id' => $variant]);
        $query_url = 'devices?query=' . urlencode($filter);
        
        $result = genieacs_api_call($query_url, 'GET');
        
        if ($result['success'] && !empty($result['data']) && isset($result['data'][0]['_id'])) {
            return $result['data'][0]['_id']; // Return raw ID dari GenieACS
        }
    }
    
    // STEP 2: Coba dengan Serial Number (bagian terakhir device ID)
    $parts = explode('-', $fully_decoded);
    if (count($parts) >= 3) {
        $serial_number = end($parts);
        
        $filter_sn = json_encode(['_id' => ['$regex' => $serial_number]]);
        $query_url_sn = 'devices?query=' . urlencode($filter_sn);
        
        $result = genieacs_api_call($query_url_sn, 'GET');
        
        if ($result['success'] && !empty($result['data'])) {
            // Cari yang cocok dengan serial number
            foreach ($result['data'] as $device) {
                if (isset($device['_id']) && strpos($device['_id'], $serial_number) !== false) {
                    return $device['_id']; // Return raw ID dari GenieACS
                }
            }
            // Fallback: ambil yang pertama
            if (isset($result['data'][0]['_id'])) {
                return $result['data'][0]['_id'];
            }
        }
    }
    
    // STEP 3: Cek di database lokal
    $db_device = ORM::for_table('tbl_acs_devices')
        ->where_raw('(device_id = ? OR device_id LIKE ?)', [$fully_decoded, '%' . $fully_decoded . '%'])
        ->find_one();
    
    if ($db_device) {
        // Coba query lagi dengan device_id dari database
        $filter = json_encode(['_id' => $db_device->device_id]);
        $result = genieacs_api_call('devices?query=' . urlencode($filter), 'GET');
        
        if ($result['success'] && !empty($result['data']) && isset($result['data'][0]['_id'])) {
            return $result['data'][0]['_id'];
        }
        
        // Return device_id dari database sebagai fallback
        return $db_device->device_id;
    }
    
    return false;
}

// ===== FALLBACK PASSWORD FUNCTIONS - ZERO RISK =====

function get_device_wifi_info_with_fallback($device_data, $username)
{
    // Dapatkan info WiFi normal dulu
    $wifi_info = get_device_wifi_info($device_data);

    // Enhanced fallback condition - check multiple conditions like router
    $should_use_fallback = (
        $wifi_info['password'] === 'N/A' ||
        $wifi_info['password'] === null ||
        $wifi_info['password'] === '' ||
        empty(trim($wifi_info['password']))
    );

    if ($should_use_fallback && !empty($username)) {
        $saved_password = load_saved_password_from_database($username);
        if ($saved_password !== null && $saved_password !== '') {
            $wifi_info['password'] = $saved_password;
        }
    }

    return $wifi_info;
}

function load_saved_password_from_database($username)
{
    try {
        // Get server ID from session
        $server_id = $_SESSION['selected_acs_server'] ?? 1;

        // Load from database only
        $password_record = ORM::for_table('tbl_acs_password_history')
            ->where('server_id', $server_id)
            ->where('username', $username)
            ->order_by_desc('changed_at')
            ->find_one();

        if ($password_record) {
            return $password_record->wifi_password;
        }

        return null;
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Save password to database only
 */
function save_password_to_database($username, $password, $device_id = null)
{
    global $admin;

    try {
        // Get server ID from session
        $server_id = $_SESSION['selected_acs_server'] ?? 1;

        // Get device ID - prioritas dari parameter, lalu dari context
        if (!$device_id) {
            // Get dari URL path atau session
            global $routes;
            $device_id = $routes['2'] ?? $_SESSION['current_device_id'] ?? $username;
        }

        // Check if record exists for this user and server
        $existing = ORM::for_table('tbl_acs_password_history')
            ->where('server_id', $server_id)
            ->where('username', $username)
            ->find_one();

        if ($existing) {
            // Update existing record
            $existing->wifi_password = $password;
            $existing->device_id = $device_id;
            $existing->changed_by = $admin['username'] ?? 'system';
            $existing->changed_at = date('Y-m-d H:i:s');
            $existing->save();
        } else {
            // Create new record only if not exists
            $history = ORM::for_table('tbl_acs_password_history')->create();
            $history->server_id = $server_id;
            $history->device_id = $device_id;
            $history->username = $username;
            $history->wifi_password = $password;
            $history->changed_by = $admin['username'] ?? 'system';
            $history->save();
        }

        return true;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Get username from device tags (first tag is username)
 */
function get_username_from_device_tags($device_data)
{
    if (!isset($device_data['_tags']) || !is_array($device_data['_tags'])) {
        return null;
    }

    // Tag pertama adalah username
    if (isset($device_data['_tags'][0]) && !empty($device_data['_tags'][0])) {
        return trim($device_data['_tags'][0]);
    }

    return null;
}


function genieacs_summon_single_device($device_id)
{
    header('Content-Type: application/json');

    try {
        // Get raw device ID
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
            // Verifikasi device merespons via _lastInform
            sleep(4);

            $filter = json_encode(['_id' => $raw_device_id]);
            $check_result = genieacs_api_call('devices?query=' . urlencode($filter) . '&projection=_lastInform', 'GET');

            $device_responded = false;
            if ($check_result['success'] && !empty($check_result['data']) && is_array($check_result['data'])) {
                $device_check = $check_result['data'][0] ?? null;
                if ($device_check && isset($device_check['_lastInform'])) {
                    $last_inform_time = strtotime($device_check['_lastInform']);
                    $inform_age = time() - $last_inform_time;
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
 * Refresh single device
 */
function genieacs_refresh_single_device($device_id)
{
    header('Content-Type: application/json');

    try {
        // Get raw device ID
        $raw_device_id = get_raw_device_id($device_id);
        if (!$raw_device_id) {
            echo json_encode(['success' => false, 'error' => 'Device not found in GenieACS']);
            exit;
        }

        // URL encode device ID untuk API call
        $encoded_device_id = rawurlencode($raw_device_id);

        // Create task array untuk refresh
        $tasks = array(
            array(
                'name' => 'refreshObject',
                'objectName' => 'InternetGatewayDevice'
            )
        );

        $result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $tasks);

        if ($result['success']) {
            // Verifikasi device merespons via _lastInform
            sleep(4);

            $filter = json_encode(['_id' => $raw_device_id]);
            $check_result = genieacs_api_call('devices?query=' . urlencode($filter) . '&projection=_lastInform', 'GET');

            $device_responded = false;
            if ($check_result['success'] && !empty($check_result['data']) && is_array($check_result['data'])) {
                $device_check = $check_result['data'][0] ?? null;
                if ($device_check && isset($device_check['_lastInform'])) {
                    $last_inform_time = strtotime($device_check['_lastInform']);
                    $inform_age = time() - $last_inform_time;
                    $device_responded = ($inform_age <= 20);
                }
            }

            if ($device_responded) {
                echo json_encode(['success' => true, 'message' => 'Device refreshed successfully.']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Device is offline or unreachable. Connection request sent but device did not respond.']);
            }
        } else {
            $error_msg = 'Failed to refresh device';
            if (isset($result['raw_response'])) {
                $error_msg .= ': ' . $result['raw_response'];
            }
            echo json_encode(['success' => false, 'error' => $error_msg]);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => 'Exception: ' . $e->getMessage()]);
    }

    exit;
}

/**
 * Update device tags in GenieACS
 */
function genieacs_update_device_tags($device_id)
{
    header('Content-Type: application/json');

    if (!$_POST) {
        echo json_encode(['success' => false, 'error' => 'No data received']);
        exit;
    }

    // Get tags from POST
    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

    if (empty($tags)) {
        echo json_encode(['success' => false, 'error' => 'No tags provided']);
        exit;
    }

    // Ensure tags is an array
    if (!is_array($tags)) {
        $tags = [$tags];
    }

    // Clean and validate tags
    $clean_tags = [];
    foreach ($tags as $tag) {
        $tag = trim($tag);
        if (!empty($tag)) {
            $clean_tags[] = $tag;
        }
    }

    if (empty($clean_tags)) {
        echo json_encode(['success' => false, 'error' => 'Invalid tags provided']);
        exit;
    }

    // Get raw device ID
    $raw_device_id = get_raw_device_id($device_id);
    if (!$raw_device_id) {
        echo json_encode(['success' => false, 'error' => 'Device not found']);
        exit;
    }

    $encoded_device_id = rawurlencode($raw_device_id);

    try {
        error_log("=== Starting tag update for device {$raw_device_id} ===");
        error_log("New tags to set: " . json_encode($clean_tags));

        // STEP 1: Get current tags from device
        $device_result = genieacs_get_single_device($device_id);
        if (!$device_result['success']) {
            echo json_encode(['success' => false, 'error' => 'Failed to get device data']);
            exit;
        }

        $existing_tags = isset($device_result['data']['_tags']) ? $device_result['data']['_tags'] : [];
        error_log("Current tags: " . json_encode($existing_tags));

        // STEP 2: Set ALL existing tags to false using setParameterValues
        if (!empty($existing_tags)) {
            error_log("Setting existing tags to false");

            $parameters_to_disable = [];
            foreach ($existing_tags as $old_tag) {
                // Format: Tags.tagname = false
                $parameters_to_disable[] = ["Tags.{$old_tag}", false];
            }

            // Send task to set tags to false
            $disable_task = [
                'name' => 'setParameterValues',
                'parameterValues' => $parameters_to_disable
            ];

            $disable_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $disable_task);

            if ($disable_result['success'] || $disable_result['http_code'] == 200 || $disable_result['http_code'] == 202) {
                error_log("Successfully set existing tags to false");
            } else {
                error_log("Failed to disable existing tags: " . json_encode($disable_result));
            }

            // Trigger connection request to apply changes
            genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);

            // Wait for changes to apply
            sleep(2);
        }

        // STEP 3: Set new tags to true
        error_log("Setting new tags to true");

        $parameters_to_enable = [];
        foreach ($clean_tags as $new_tag) {
            // Format: Tags.tagname = true
            $parameters_to_enable[] = ["Tags.{$new_tag}", true];
        }

        // Send task to set new tags to true
        $enable_task = [
            'name' => 'setParameterValues',
            'parameterValues' => $parameters_to_enable
        ];

        $enable_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $enable_task);

        if ($enable_result['success'] || $enable_result['http_code'] == 200 || $enable_result['http_code'] == 202) {
            error_log("Successfully set new tags to true");

            // Trigger connection request to apply changes
            genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', []);

            echo json_encode([
                'success' => true,
                'message' => 'Tags updated successfully',
                'tags' => $clean_tags
            ]);
        } else {
            error_log("Failed to enable new tags: " . json_encode($enable_result));

            // Fallback to old method if setParameterValues doesn't work
            error_log("Falling back to DELETE/POST method");

            // Delete old tags
            foreach ($existing_tags as $old_tag) {
                $remove_url = "devices/{$encoded_device_id}/tags/" . urlencode($old_tag);
                genieacs_api_call($remove_url, 'DELETE');
                usleep(200000);
            }

            sleep(1);

            // Add new tags
            $success_count = 0;
            foreach ($clean_tags as $new_tag) {
                $add_url = "devices/{$encoded_device_id}/tags/" . urlencode($new_tag);
                $add_result = genieacs_api_call($add_url, 'POST', null);

                if ($add_result['success'] || $add_result['http_code'] == 200 || $add_result['http_code'] == 204) {
                    $success_count++;
                }
                usleep(200000);
            }

            if ($success_count > 0) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Tags updated successfully (fallback method)',
                    'tags' => $clean_tags
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'error' => 'Failed to update tags'
                ]);
            }
        }

        error_log("=== Tag update completed ===");
    } catch (Exception $e) {
        error_log("Exception in genieacs_update_device_tags: " . $e->getMessage());
        echo json_encode(['success' => false, 'error' => 'Exception: ' . $e->getMessage()]);
    }

    exit;
}

<?php
/**
 * Plugin: Router/Modem Menu for Customer Dashboard
 * Description: Menambahkan menu Modem ke sidebar customer dashboard original PHPNuxBill
 * Location: /system/plugin/ui_router_menu.php
 * 
 * FULL DYNAMIC PARAMETERS - NO HARDCODE
 * - Support multiple paths (comma separated)
 * - Support VirtualParameters
 * - Support force security mode
 * - All parameters from tbl_acs_parameters
 */

// Register menu untuk customer (bukan admin)
register_menu("Modem", false, "modemSettings", 'AFTER_INBOX', 'ion ion-wifi', '', "");

/**
 * Get SSID Prefix from database
 * @param string $band - '2g' or '5g'
 * @return string - prefix or empty string if not set
 */
function modem_get_ssid_prefix($band = '2g')
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
function modem_apply_ssid_prefix($ssid, $band = '2g')
{
    $prefix = modem_get_ssid_prefix($band);
    
    if (!empty($prefix)) {
        // Cek apakah SSID sudah ada prefix (hindari double prefix)
        if (strpos($ssid, $prefix) === 0) {
            // Prefix sudah ada, return SSID tanpa perubahan
            return $ssid;
        }
        
        // Cek juga prefix band lain (misal user copy dari 5G ke 2G)
        $other_band = ($band == '2g') ? '5g' : '2g';
        $other_prefix = modem_get_ssid_prefix($other_band);
        
        if (!empty($other_prefix) && strpos($ssid, $other_prefix) === 0) {
            // Hapus prefix lama, ganti dengan prefix baru
            $ssid_without_prefix = substr($ssid, strlen($other_prefix));
            return $prefix . $ssid_without_prefix;
        }
        
        return $prefix . $ssid;
    }
    
    return $ssid;
}

/**
 * Fungsi utama untuk halaman Modem Settings
 */
function modemSettings()
{
    global $ui, $routes, $root_path;
    
    _auth();
    
    $ui->assign('_title', 'Router Management');
    $ui->assign('_system_menu', 'modemSettings');
    
    require_once 'system/orm.php';
    
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $ui->assign('_user', $user);
    $ui->assign('username', $user['username']);
    
    $ui->display('customer/router.tpl');
}

/**
 * API: Get Device Info
 */
function modemSettings_getDeviceInfo()
{
    global $root_path;
    
    _auth();
    
    require_once 'system/orm.php';
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    try {
        if (!function_exists('genieacs_api_call')) {
            echo json_encode(array('success' => false, 'error' => 'GenieACS functions not loaded'));
            exit;
        }
        
        if (!function_exists('load_genieacs_config')) {
            echo json_encode(array('success' => false, 'error' => 'GenieACS config function not found'));
            exit;
        }
        
        // Find device by tag
        $result = modem_find_device_by_tag($username);
        
        if (!$result['success']) {
            echo json_encode(array('success' => false, 'error' => $result['error']));
            exit;
        }
        
        if (!function_exists('genieacs_get_single_device')) {
            echo json_encode(array('success' => false, 'error' => 'genieacs_get_single_device function not found'));
            exit;
        }
        
        if (!function_exists('process_single_device_data')) {
            echo json_encode(array('success' => false, 'error' => 'process_single_device_data function not found'));
            exit;
        }
        
        if (!function_exists('get_device_wifi_info')) {
            echo json_encode(array('success' => false, 'error' => 'get_device_wifi_info function not found'));
            exit;
        }
        
        // Get device details
        $device_result = genieacs_get_single_device($result['device_id']);
        
        if (!$device_result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Failed to get device details: ' . $device_result['error']));
            exit;
        }
        
        // Process device data
        $device = process_single_device_data($device_result['data']);
        $wifi_info = get_device_wifi_info($device_result['data']);
        
        // Get connected devices dari parameter wifi_connected_2g dan wifi_connected_5g
        if (!isset($wifi_info['total_2g'])) {
            if (isset($wifi_info['wifi_connected_2g'])) {
                $wifi_info['total_2g'] = intval($wifi_info['wifi_connected_2g']);
            } else {
                $total_2g = get_nested_value(
                    $device_result['data'],
                    'InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.TotalAssociations._value'
                );
                $wifi_info['total_2g'] = intval($total_2g);
            }
        }
        
        if (!isset($wifi_info['total_5g'])) {
            if (isset($wifi_info['wifi_connected_5g'])) {
                $wifi_info['total_5g'] = intval($wifi_info['wifi_connected_5g']);
            } else {
                $total_5g = get_nested_value(
                    $device_result['data'],
                    'InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.TotalAssociations._value'
                );
                $wifi_info['total_5g'] = intval($total_5g);
            }
        }
        
        // Load password from database if not available from device
        $should_use_fallback = (
            !isset($wifi_info['password']) ||
            $wifi_info['password'] === 'N/A' ||
            $wifi_info['password'] === null ||
            $wifi_info['password'] === ''
        );
        
        if ($should_use_fallback) {
            try {
                $device_id = $device_result['data']['_id'] ?? $result['device_id'];
                
                $stored = ORM::for_table('tbl_acs_password_history')
                    ->where('device_id', $device_id)
                    ->find_one();
                
                if ($stored && !empty($stored->wifi_password)) {
                    $wifi_info['password'] = $stored->wifi_password;
                } else {
                    $saved_password = modem_load_saved_user_password($username);
                    if ($saved_password !== null && $saved_password !== '') {
                        $wifi_info['password'] = $saved_password;
                    }
                }
            } catch (Exception $e) {
                error_log("Error loading password: " . $e->getMessage());
            }
        }
        
        echo json_encode(array(
            'success' => true,
            'device_info' => $device,
            'wifi_info' => $wifi_info,
            'device_id' => $result['device_id'],
            'device_status' => $device['status'] ?? 'offline'
        ));
        
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'error' => 'Exception: ' . $e->getMessage()));
    } catch (Error $e) {
        echo json_encode(array('success' => false, 'error' => 'Fatal Error: ' . $e->getMessage()));
    }
    
    exit;
}

/**
 * API: Update WiFi Settings - FULL DYNAMIC PARAMETERS
 */
function modemSettings_updateWifi()
{
    global $root_path;
    
    _auth();
    
    require_once 'system/orm.php';
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    try {
        if (!$_POST) {
            echo json_encode(array('success' => false, 'error' => 'No data received'));
            exit;
        }
        
        $new_ssid = trim(isset($_POST['ssid']) ? $_POST['ssid'] : '');
        $new_password = trim(isset($_POST['password']) ? $_POST['password'] : '');
        $force_security = isset($_POST['force_security']) && $_POST['force_security'] == '1';
        
        if (empty($new_ssid)) {
            echo json_encode(array('success' => false, 'error' => 'SSID is required'));
            exit;
        }
        
        if (!empty($new_password) && strlen($new_password) < 8) {
            echo json_encode(array('success' => false, 'error' => 'Password must be at least 8 characters'));
            exit;
        }
        
        // Find device
        $result = modem_find_device_by_tag($username);
        if (!$result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Device not found'));
            exit;
        }
        
        // Update WiFi with FULL DYNAMIC PARAMETERS
        $update_result = modem_update_device_wifi($result['device_id'], $new_ssid, $new_password, $force_security);
        
        // Save password if successful
        if ($update_result['success'] && !empty($new_password)) {
            modem_save_user_password($username, $new_password, $result['device_id']);
        }
        
        echo json_encode($update_result);
        
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'error' => 'Exception: ' . $e->getMessage()));
    } catch (Error $e) {
        echo json_encode(array('success' => false, 'error' => 'Fatal Error: ' . $e->getMessage()));
    }
    
    exit;
}

/**
 * API: Refresh Device
 */
function modemSettings_refresh()
{
    global $root_path;
    
    _auth();
    
    require_once 'system/orm.php';
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    try {
        $result = modem_find_device_by_tag($username);
        if (!$result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Device not found'));
            exit;
        }
        
        $device_id = $result['device_id'];
        $raw_device_id = get_raw_device_id($device_id);
        
        if (!$raw_device_id) {
            echo json_encode(array('success' => false, 'error' => 'Device not found in GenieACS'));
            exit;
        }
        
        $encoded_device_id = rawurlencode($raw_device_id);
        
        $tasks = array(
            array(
                'name' => 'refreshObject',
                'objectName' => 'InternetGatewayDevice'
            )
        );
        
        $result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $tasks);
        
        if ($result['success']) {
            echo json_encode(array('success' => true, 'message' => 'Refresh command sent successfully'));
        } else {
            $error_msg = 'Failed to refresh device';
            if (isset($result['raw_response'])) {
                $error_msg .= ': ' . $result['raw_response'];
            }
            echo json_encode(array('success' => false, 'error' => $error_msg));
        }
        
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'error' => 'Exception: ' . $e->getMessage()));
    }
    
    exit;
}

/**
 * API: Summon Device (Connection Request)
 */
function modemSettings_summon()
{
    global $root_path;
    
    _auth();
    
    require_once 'system/orm.php';
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    try {
        $result = modem_find_device_by_tag($username);
        if (!$result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Device not found'));
            exit;
        }
        
        $device_id = $result['device_id'];
        $raw_device_id = get_raw_device_id($device_id);
        
        if (!$raw_device_id) {
            echo json_encode(array('success' => false, 'error' => 'Device not found in GenieACS'));
            exit;
        }
        
        $encoded_device_id = rawurlencode($raw_device_id);
        $empty_tasks = array();
        
        $result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $empty_tasks);
        
        if ($result['success']) {
            echo json_encode(array('success' => true, 'message' => 'Connection request sent successfully'));
        } else {
            $error_msg = 'Failed to send connection request';
            if (isset($result['raw_response'])) {
                $error_msg .= ': ' . $result['raw_response'];
            }
            echo json_encode(array('success' => false, 'error' => $error_msg));
        }
        
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'error' => 'Exception: ' . $e->getMessage()));
    }
    
    exit;
}

/**
 * API: Reboot Device
 */
function modemSettings_reboot()
{
    global $root_path;
    
    _auth();
    
    require_once 'system/orm.php';
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    try {
        $result = modem_find_device_by_tag($username);
        if (!$result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Device not found'));
            exit;
        }
        
        $device_id = $result['device_id'];
        $raw_device_id = get_raw_device_id($device_id);
        
        if (!$raw_device_id) {
            echo json_encode(array('success' => false, 'error' => 'Device not found in GenieACS'));
            exit;
        }
        
        $encoded_device_id = rawurlencode($raw_device_id);
        $reboot_task = array('name' => 'reboot');
        
        $result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $reboot_task);
        
        if ($result['success']) {
            $empty_array = array();
            $conn_result = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $empty_array);
            if ($conn_result['success']) {
                echo json_encode(array('success' => true, 'message' => 'Reboot command sent successfully. Device will restart shortly.'));
            } else {
                $error_msg = 'Reboot command queued but connection request failed';
                if (isset($conn_result['raw_response'])) {
                    $error_msg = $conn_result['raw_response'];
                }
                echo json_encode(array('success' => false, 'error' => $error_msg));
            }
        } else {
            $result2 = genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', $reboot_task);
            if ($result2['success']) {
                echo json_encode(array('success' => true, 'message' => 'Reboot command sent successfully'));
            } else {
                echo json_encode(array('success' => false, 'error' => 'Reboot failed. Device may not support remote reboot.'));
            }
        }
        
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'error' => 'Exception: ' . $e->getMessage()));
    }
    
    exit;
}

/**
 * API: Clear Cache
 */
function modemSettings_clearCache()
{
    _auth();
    
    require_once 'system/orm.php';
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    $result = modem_clear_device_mapping($username);
    
    echo json_encode(array(
        'success' => $result,
        'message' => $result ? 'Cache cleared successfully' : 'Failed to clear cache'
    ));
    exit;
}

/**
 * API: Get Connected Devices
 */
function modemSettings_getConnectedDevices()
{
    global $root_path;
    
    _auth();
    
    require_once 'system/orm.php';
    $plugin_genieacs_detail = $root_path . '/system/plugin/genieacs_device_detail.php';
    if (file_exists($plugin_genieacs_detail)) {
        include_once($plugin_genieacs_detail);
    }
    
    $user = User::_info();
    $username = $user['username'];
    
    ob_clean();
    header('Content-Type: application/json');
    
    try {
        $result = modem_find_device_by_tag($username);
        if (!$result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Device not found'));
            exit;
        }
        
        $device_result = genieacs_get_single_device($result['device_id']);
        
        if (!$device_result['success']) {
            echo json_encode(array('success' => false, 'error' => 'Failed to get device details'));
            exit;
        }
        
        $connected_users = get_device_connected_users($device_result['data']);
        
        echo json_encode(array(
            'success' => true,
            'devices' => $connected_users
        ));
        
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'error' => 'Exception: ' . $e->getMessage()));
    }
    
    exit;
}

// ============================================
// HELPER FUNCTIONS - FULL DYNAMIC
// ============================================

/**
 * Find device by tag (username) - with cache support
 */
function modem_find_device_by_tag($tag)
{
    try {
        // Step 1: Check cache first
        $cached = ORM::for_table('tbl_device_mapping')
            ->where('username', $tag)
            ->find_one();
        
        if ($cached) {
            $_SESSION['selected_acs_server'] = $cached->server_id;
            
            // Verifikasi dengan filter query (bukan direct device call)
            $filter = json_encode(['_id' => $cached->device_id]);
            $verify_result = genieacs_api_call('devices?query=' . urlencode($filter), 'GET', null, $cached->server_id);
            
            if ($verify_result['success'] && !empty($verify_result['data'])) {
                $cached->last_updated = date('Y-m-d H:i:s');
                $cached->save();
                
                return array(
                    'success' => true,
                    'device_id' => $cached->device_id,
                    'server_id' => $cached->server_id
                );
            } else {
                $cached->delete();
            }
        }
        
        // Step 2: Cek di database lokal dulu (paling cepat)
        $db_device = ORM::for_table('tbl_acs_devices')
            ->where_raw('JSON_UNQUOTE(JSON_EXTRACT(device_data, "$.tags")) = ?', [$tag])
            ->find_one();
        
        if ($db_device) {
            $_SESSION['selected_acs_server'] = $db_device->server_id;
            
            // Verifikasi ke GenieACS API
            $filter = json_encode(['_id' => $db_device->device_id]);
            $verify_result = genieacs_api_call('devices?query=' . urlencode($filter), 'GET', null, $db_device->server_id);
            
            if ($verify_result['success'] && !empty($verify_result['data'])) {
                // Simpan ke cache
                modem_save_device_mapping($tag, $db_device->device_id, $db_device->server_id);
                
                return array(
                    'success' => true,
                    'device_id' => $verify_result['data'][0]['_id'],
                    'server_id' => $db_device->server_id
                );
            }
        }
        
        // Step 3: Search di GenieACS dengan filter tag (TIDAK ambil semua device)
        $servers = ORM::for_table('tbl_acs_servers')
            ->where('status', 'active')
            ->order_by_desc('is_priority')
            ->find_many();
        
        foreach ($servers as $server) {
            $_SESSION['selected_acs_server'] = $server->id;
            
            // Query dengan filter tag - JAUH LEBIH CEPAT
            $filter = json_encode(['_tags' => $tag]);
            $devices_result = genieacs_api_call('devices?query=' . urlencode($filter), 'GET', null, $server->id);
            
            if ($devices_result['success'] && !empty($devices_result['data'])) {
                $device = $devices_result['data'][0];
                modem_save_device_mapping($tag, $device['_id'], $server->id);
                
                return array(
                    'success' => true,
                    'device_id' => $device['_id'],
                    'server_id' => $server->id
                );
            }
            
            // Fallback: Coba dengan regex untuk case insensitive
            $filter_regex = json_encode(['_tags' => ['$regex' => $tag, '$options' => 'i']]);
            $devices_result = genieacs_api_call('devices?query=' . urlencode($filter_regex), 'GET', null, $server->id);
            
            if ($devices_result['success'] && !empty($devices_result['data'])) {
                // Cari exact match (case insensitive)
                foreach ($devices_result['data'] as $device) {
                    if (isset($device['_tags']) && is_array($device['_tags'])) {
                        foreach ($device['_tags'] as $device_tag) {
                            if (strtolower(trim($device_tag)) === strtolower(trim($tag))) {
                                modem_save_device_mapping($tag, $device['_id'], $server->id);
                                
                                return array(
                                    'success' => true,
                                    'device_id' => $device['_id'],
                                    'server_id' => $server->id
                                );
                            }
                        }
                    }
                }
            }
        }
        
        return array('success' => false, 'error' => 'No device found with tag: ' . $tag . ' in any server');
        
    } catch (Exception $e) {
        return array('success' => false, 'error' => 'Exception in find device: ' . $e->getMessage());
    }
}

/**
 * Save device mapping to cache
 */
function modem_save_device_mapping($username, $device_id, $server_id)
{
    try {
        $mapping = ORM::for_table('tbl_device_mapping')
            ->where('username', $username)
            ->find_one();
        
        if ($mapping) {
            $mapping->device_id = $device_id;
            $mapping->server_id = $server_id;
            $mapping->last_updated = date('Y-m-d H:i:s');
            $mapping->save();
        } else {
            $mapping = ORM::for_table('tbl_device_mapping')->create();
            $mapping->username = $username;
            $mapping->device_id = $device_id;
            $mapping->server_id = $server_id;
            $mapping->save();
        }
        
        return true;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Clear device mapping cache
 */
function modem_clear_device_mapping($username)
{
    try {
        ORM::for_table('tbl_device_mapping')
            ->where('username', $username)
            ->delete_many();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Load saved user password from JSON file
 */
function modem_load_saved_user_password($username)
{
    try {
        $json_file = $_SERVER['DOCUMENT_ROOT'] . '/system/plugin/data/user_saved_passwords.json';
        
        if (!file_exists($json_file)) {
            return null;
        }
        
        $json_content = file_get_contents($json_file);
        if ($json_content === false) {
            return null;
        }
        
        $data = json_decode($json_content, true);
        if (!is_array($data) || !isset($data[$username])) {
            return null;
        }
        
        return $data[$username]['saved_password'];
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Save user password to database and JSON
 */
function modem_save_user_password($username, $password, $device_id = null)
{
    try {
        $server_id = $_SESSION['selected_acs_server'] ?? 1;
        
        if (!$device_id) {
            $device_id = $username;
        }
        
        // Save to database
        $existing = ORM::for_table('tbl_acs_password_history')
            ->where('server_id', $server_id)
            ->where('username', $username)
            ->find_one();
        
        if ($existing) {
            $existing->wifi_password = $password;
            $existing->device_id = $device_id;
            $existing->changed_by = $username;
            $existing->changed_at = date('Y-m-d H:i:s');
            $existing->save();
        } else {
            $history = ORM::for_table('tbl_acs_password_history')->create();
            $history->server_id = $server_id;
            $history->device_id = $device_id;
            $history->username = $username;
            $history->wifi_password = $password;
            $history->changed_by = $username;
            $history->save();
        }
        
        // Save to JSON for backward compatibility
        $data_dir = $_SERVER['DOCUMENT_ROOT'] . '/system/plugin/data';
        $json_file = $data_dir . '/user_saved_passwords.json';
        
        if (!file_exists($data_dir)) {
            mkdir($data_dir, 0755, true);
        }
        
        $data = array();
        if (file_exists($json_file)) {
            $json_content = file_get_contents($json_file);
            if ($json_content !== false) {
                $existing_data = json_decode($json_content, true);
                if (is_array($existing_data)) {
                    $data = $existing_data;
                }
            }
        }
        
        $data[$username] = array(
            'saved_password' => $password,
            'last_updated' => date('Y-m-d H:i:s')
        );
        
        file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT), LOCK_EX);
        
        return true;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Update device WiFi - FULL DYNAMIC PARAMETERS FROM DATABASE
 * Support: Multi-path, VirtualParameters, Force Security
 */
function modem_update_device_wifi($device_id, $ssid, $password, $force_security = false)
{
    try {
        if (!function_exists('get_raw_device_id')) {
            return array('success' => false, 'error' => 'get_raw_device_id function not found');
        }
        
        $raw_device_id = get_raw_device_id($device_id);
        if (!$raw_device_id) {
            return array('success' => false, 'error' => 'Device not found in GenieACS');
        }
        
        $encoded_device_id = rawurlencode($raw_device_id);
        
        // Get device capabilities
        $device_result = genieacs_get_single_device($device_id);
        if (!$device_result['success']) {
            return array('success' => false, 'error' => 'Failed to get device info');
        }
        
        $device_data = $device_result['data'];
        
        // ============================================
        // FORCE SECURITY MODE - DYNAMIC FROM DATABASE
        // ============================================
        if ($force_security) {
            $security_params_db = ORM::for_table('tbl_acs_parameters')
                ->where('param_category', 'wifi')
                ->where_in('param_key', ['wifi_security_2g', 'wifi_security_5g'])
                ->find_many();
            
            if (count($security_params_db) > 0) {
                $security_values = array();
                
                foreach ($security_params_db as $param) {
                    if ($param->param_key == 'wifi_security_2g') {
                        $security_values[] = array($param->param_path, 'WPA/WPA2');
                    } elseif ($param->param_key == 'wifi_security_5g') {
                        $security_values[] = array($param->param_path, 'WPA/WPA2');
                    }
                }
                
                if (!empty($security_values)) {
                    $security_task = array(
                        'name' => 'setParameterValues',
                        'parameterValues' => $security_values
                    );
                    
                    $security_result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $security_task);
                    
                    if (!$security_result['success']) {
                        return array('success' => false, 'error' => 'Failed to update security mode');
                    }
                    
                    genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', array());
                    sleep(2);
                }
            }
        }
        
        $parameter_values = array();
        
        // ============================================
        // LOAD WIFI PARAMETERS FROM DATABASE - FULL DYNAMIC
        // ============================================
        $wifi_params = ORM::for_table('tbl_acs_parameters')
            ->where('param_category', 'wifi')
            ->where_raw('(param_type = ? OR param_type = ?)', array('update', 'both'))
            ->find_many();
        
        // ============================================
        // BUILD SSID PARAMETERS - MULTIPATH SUPPORT
        // ============================================
        foreach ($wifi_params as $param) {
            switch ($param->param_key) {
                case 'wifi_ssid_2g':
                    // Apply prefix for 2.4G (if set in config)
                    $final_ssid_2g = modem_apply_ssid_prefix($ssid, '2g');
                    
                    // Split multiple paths by comma for SSID 2G
                    $ssid_2g_paths = explode(',', $param->param_path);
                    foreach ($ssid_2g_paths as $path) {
                        $path = trim($path);
                        if (!empty($path)) {
                            $parameter_values[] = array($path, $final_ssid_2g);
                        }
                    }
                    break;
                    
                case 'wifi_ssid_5g':
                    // Apply prefix for 5G (if set in config)
                    $final_ssid_5g = modem_apply_ssid_prefix($ssid, '5g');
                    
                    // Split multiple paths by comma for SSID 5G
                    $ssid_5g_paths = explode(',', $param->param_path);
                    foreach ($ssid_5g_paths as $path) {
                        $path = trim($path);
                        if (!empty($path)) {
                            $parameter_values[] = array($path, $final_ssid_5g);
                        }
                    }
                    break;
            }
        }
        
        // DEBUG: Log SSID multipath processing
        error_log("=== SSID MULTIPATH DEBUG ===");
        foreach ($wifi_params as $param) {
            if ($param->param_key == 'wifi_ssid_2g' || $param->param_key == 'wifi_ssid_5g') {
                error_log("Parameter key: " . $param->param_key);
                error_log("Parameter paths: " . $param->param_path);
                $paths = explode(',', $param->param_path);
                error_log("Split paths: " . json_encode($paths));
            }
        }
        
        // ============================================
        // UPDATE PASSWORD - SUPPORT VIRTUALPARAMETERS
        // ============================================
        if (!empty($password)) {
            if (strlen($password) < 8) {
                return array('success' => false, 'error' => 'Password must be at least 8 characters');
            }
            
            // Get password parameter from database
            $password_param = ORM::for_table('tbl_acs_parameters')
                ->where('param_key', 'wifi_password')
                ->where('param_category', 'wifi')
                ->find_one();
            
            if ($password_param) {
                // Split multiple paths by comma
                $password_paths = explode(',', $password_param->param_path);
                
                // Separate virtual and standard parameters
                $virtual_params = array();
                $standard_params = array();
                
                foreach ($password_paths as $path) {
                    $path = trim($path);
                    
                    if (strpos($path, 'VirtualParameters') === 0) {
                        // This is a virtual parameter
                        $virtual_params[] = $path;
                    } else {
                        // This is a standard parameter
                        // If force security enabled, only use PreSharedKey paths
                        if ($force_security) {
                            if (strpos($path, 'PreSharedKey') !== false) {
                                $standard_params[] = $path;
                            }
                        } else {
                            $standard_params[] = $path;
                        }
                    }
                }
                
                // Add standard parameters to parameter_values
                foreach ($standard_params as $path) {
                    $parameter_values[] = array($path, $password);
                }
                
                // Handle virtual parameters separately if any exist
                if (!empty($virtual_params)) {
                    $virtual_result = modem_update_virtual_parameters($encoded_device_id, $virtual_params, $password);
                    if (!$virtual_result['success']) {
                        return array('success' => false, 'error' => 'Failed to update virtual parameters: ' . $virtual_result['error']);
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
                            $parameter_values[] = array($path, $password);
                        }
                        
                        // Handle virtual paths if any
                        if (!empty($virtual_paths)) {
                            $virtual_result = modem_update_virtual_parameters($encoded_device_id, $virtual_paths, $password);
                            if (!$virtual_result['success']) {
                                error_log("Fallback virtual parameter failed: " . json_encode($virtual_paths));
                            }
                        }
                    }
                } else {
                    // Ultimate fallback - should not reach here if database is configured
                    error_log("WARNING: No wifi_password parameter found in database, using hardcoded fallback");
                    $parameter_values[] = array('InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.KeyPassphrase', $password);
                }
            }
        }
        
        // DEBUG: Log all data before API call
        error_log("=== DEBUG ROUTER WIFI PASSWORD UPDATE WITH VIRTUAL PARAMS ===");
        error_log("Device ID received: " . $device_id);
        error_log("Raw device ID: " . $raw_device_id);
        error_log("Encoded device ID: " . $encoded_device_id);
        error_log("New SSID: " . $ssid);
        error_log("New password: " . (!empty($password) ? '[PROVIDED]' : '[EMPTY]'));
        error_log("Force security: " . ($force_security ? 'true' : 'false'));
        if (isset($virtual_params)) {
            error_log("Virtual parameters found: " . json_encode($virtual_params));
        }
        if (isset($standard_params)) {
            error_log("Standard parameters found: " . json_encode($standard_params));
        }
        error_log("Standard parameter values array: " . json_encode($parameter_values));
        
        // ============================================
        // SEND UPDATE TASK TO GENIEACS
        // ============================================
        if (!empty($parameter_values)) {
            $task = array(
                'name' => 'setParameterValues',
                'parameterValues' => $parameter_values
            );
            
            error_log("Standard task to send: " . json_encode($task));
            error_log("API URL: devices/{$encoded_device_id}/tasks");
            
            $result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $task);
            
            error_log("Standard API Result: " . json_encode($result));
            
            if ($result['success']) {
                // Send connection request to apply changes
                genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', array());
                
                $message = 'WiFi settings updated successfully.';
                if (empty($password)) {
                    $message .= ' (Password unchanged)';
                } else {
                    if (isset($virtual_params) && !empty($virtual_params)) {
                        $message .= ' (Including virtual parameters)';
                    }
                }
                $message .= ' Changes will be applied shortly.';
                
                return array('success' => true, 'message' => $message);
            } else {
                $error_detail = isset($result['error']) ? $result['error'] : (isset($result['raw_response']) ? $result['raw_response'] : 'Unknown error');
                return array('success' => false, 'error' => 'Failed to update standard WiFi parameters: ' . $error_detail);
            }
        } else {
            // Check if we only have virtual parameters
            if (isset($virtual_params) && !empty($virtual_params)) {
                // Send connection request for virtual parameters only
                genieacs_api_call("devices/{$encoded_device_id}/tasks?connection_request", 'POST', array());
                
                return array('success' => true, 'message' => 'Virtual WiFi parameters updated successfully. Changes will be applied shortly.');
            } else {
                error_log("ERROR: No parameters to update - neither standard nor virtual!");
                return array('success' => false, 'error' => 'No parameters to update');
            }
        }
        
    } catch (Exception $e) {
        return array('success' => false, 'error' => 'Exception in update wifi: ' . $e->getMessage());
    }
}

/**
 * Update virtual parameters - SUPPORT VIRTUALPARAMETERS
 * Format value dengan benar untuk GenieACS VirtualParameters
 */
function modem_update_virtual_parameters($encoded_device_id, $virtual_paths, $value)
{
    try {
        foreach ($virtual_paths as $virtual_path) {
            // Extract virtual parameter name (remove VirtualParameters. prefix)
            $vp_name = str_replace('VirtualParameters.', '', $virtual_path);
            
            // Create virtual parameter update task
            // Format: [path, value] - tanpa type untuk standard path
            $virtual_task = array(
                'name' => 'setParameterValues',
                'parameterValues' => array(
                    array($virtual_path, $value)
                )
            );
            
            error_log("=== VIRTUAL PARAMETER UPDATE ===");
            error_log("Path: " . $virtual_path);
            error_log("Value: " . $value);
            error_log("Task: " . json_encode($virtual_task));
            
            $result = genieacs_api_call("devices/{$encoded_device_id}/tasks", 'POST', $virtual_task);
            
            error_log("Virtual Parameter Result: " . json_encode($result));
            
            if (!$result['success']) {
                return array(
                    'success' => false,
                    'error' => 'Failed to update virtual parameter ' . $vp_name . ': ' . ($result['error'] ?? 'Unknown error')
                );
            }
            
            // Small delay between virtual parameter updates
            usleep(500000); // 0.5 seconds - increased delay for virtual params
        }
        
        return array('success' => true, 'message' => 'Virtual parameters updated successfully');
    } catch (Exception $e) {
        return array('success' => false, 'error' => 'Exception in virtual parameter update: ' . $e->getMessage());
    }
}
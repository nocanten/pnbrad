<?php

ini_set('log_errors',1);
ini_set('error_log','/tmp/tgbot_error.log');

error_reporting(E_ALL);
ini_set('display_errors',1);

$DB_HOST = "localhost";
$DB_NAME = "pnbrad";
$DB_USER = "pnb";
$DB_PASS = "Antennet2024*#";

$BOT_TOKEN = "8820705115:AAEvN5RDjIoQJSgHGE4gWl5sPGPRE6yQpkE";

try {
    $pdo = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",
        $DB_USER,
        $DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    exit;
}

function sendMessage($chatId, $text)
{
    global $BOT_TOKEN;

    file_get_contents(
        "https://api.telegram.org/bot".$BOT_TOKEN."/sendMessage?".
        http_build_query([
            'chat_id' => $chatId,
            'text' => $text
        ])
    );
}

function sendKeyboard($chatId, $text, $keyboard)
{
    global $BOT_TOKEN;

    file_get_contents(
        "https://api.telegram.org/bot".$BOT_TOKEN."/sendMessage?".
        http_build_query([
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => json_encode([
                'keyboard' => $keyboard,
                'resize_keyboard' => true
            ])
        ])
    );
}

$update = json_decode(file_get_contents("php://input"), true);

if (!isset($update['message'])) {
    exit;
}

$chatId = $update['message']['chat']['id'];
$userId = $update['message']['from']['id'] ?? 0;

// Grup yang boleh
$allowed_groups = [
    -5438694646, // GRUP SMART ANTEN
];

// User yang boleh
$allowed_users = [
    2066909720, // ASRUL ROJI
    5300274635, // AJIS
    7736252800, // HERMAN
    7217497411, // AHMAD
    7369895889, // WAWAN DANIEL
    5455162449, // NOC / CS
    8829665421, // GILANG DA
    6314968263, // SYARIF KETUA GENG
    8249456639, // MAULANA YUSUF
    8191535577 // EGI FIRMANSYAH
];

if (!in_array($chatId, $allowed_groups)) {
    exit;
}

if (!in_array($userId, $allowed_users)) {

    sendMessage(
        $chatId,
        "⛔ Akses ditolak"
    );

    exit;
}

$text = '';

if (isset($update['message']['text'])) {
    $text = trim($update['message']['text']);
}

error_log(
    "TEXT=[".$text."] STEP_CHECK"
);

if (isset($update['message']['location'])) {

    $chatId = $update['message']['chat']['id'];

    $stmt = $pdo->prepare(
        "SELECT step FROM tg_sessions WHERE chat_id=?"
    );

    $stmt->execute([$chatId]);

    $sess = $stmt->fetch(PDO::FETCH_ASSOC);

if ($sess && $sess['step'] == 'coordinates') {


  $lat = $update['message']['location']['latitude'];
  $lon = $update['message']['location']['longitude'];

// Password otomatis
  $password = 'jawarawifi';

  $pdo->prepare("
    UPDATE tg_sessions
    SET coordinates=?,
        pppoe_password=?,
        step='ont_sn'
    WHERE chat_id=?
  ")->execute([
    $lat . ',' . $lon,
    $password,
    $chatId
]);

  sendMessage(
    $chatId,
    "📍 Lokasi diterima\n\nMasukkan Serial Number ONT"
);

     exit;

 }

}

// =======================
// START
// =======================

if ($text == "anten ganteng") {

    $pdo->prepare(
        "DELETE FROM tg_sessions WHERE chat_id=?"
    )->execute([$chatId]);

    sendKeyboard(
        $chatId,
        "🤖 BOT ANTEN NET\n\nSilakan pilih menu",
        [
            [
                "📋 Registrasi Pelanggan"
            ],
            [
                "📶 Ubah WiFi"
            ],
            [
                "📡 Approval OLT"
            ],
            [
                "🎫 Tiket Gangguan",
                "📡 Tiket Pemasangan"
            ],
            [
                "📊 Dashboard Tiket"
            ]
        ]
    );

    exit;
}

//========================
// TIKET GANGGUAN
//========================

if ($text == "🎫 Tiket Gangguan") {

    $stmt = $pdo->query("
        SELECT ticket_no,subject,status,technician_name
        FROM tbl_tickets
        WHERE type='trouble'
          AND status <> 'closed'
        ORDER BY id DESC
        LIMIT 20
    ");

    $msg = "🚨 DAFTAR TIKET GANGGUAN\n\n";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        $msg .=
            "🎫 ".$row['ticket_no']."\n".
            "📌 ".$row['subject']."\n".
            "📊 ".$row['status']."\n".
            "👷 Teknisi : ".(!empty($row['technician_name']) ? $row['technician_name'] : "Belum Ditugaskan")."\n";
    
        if ($row['status'] != 'open') {
            $msg .=
                "🔍 /detailggn".$row['ticket_no']."\n";
        }
    
        $msg .= "\n";
    }

    sendMessage($chatId,$msg);

    exit;
}

//========================
// TIKET PEMASANGAN
//========================

if ($text == "📡 Tiket Pemasangan") {

    $stmt = $pdo->query("
        SELECT ticket_no,subject,status,technician_name
        FROM tbl_tickets
        WHERE type='installation'
          AND status <> 'closed'
        ORDER BY id DESC
        LIMIT 20
    ");

    $msg = "📡 DAFTAR TIKET PEMASANGAN\n\n";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
        $msg .=
            "🎫 ".$row['ticket_no']."\n".
            "📌 ".$row['subject']."\n".
            "📊 ".$row['status']."\n".
            "👷 Teknisi : ".(!empty($row['technician_name']) ? $row['technician_name'] : "Belum Ditugaskan")."\n";
    
        if ($row['status'] != 'open') {
            $msg .=
                "🔍 /detailpsb".$row['ticket_no']."\n";
        }
    
        $msg .= "\n";
    }

    sendMessage($chatId,$msg);

    exit;
}

//========================
//DASHBOARD TIKET
//========================

if ($text == "📊 Dashboard Tiket") {

    $open = $pdo->query("
        SELECT COUNT(*)
        FROM tbl_tickets
        WHERE status='open'
        AND YEAR(created_at)=YEAR(NOW())
        AND MONTH(created_at)=MONTH(NOW())
    ")->fetchColumn();

    $assigned = $pdo->query("
        SELECT COUNT(*)
        FROM tbl_tickets
        WHERE status='assigned'
        AND YEAR(created_at)=YEAR(NOW())
        AND MONTH(created_at)=MONTH(NOW())
    ")->fetchColumn();

    $progress = $pdo->query("
        SELECT COUNT(*)
        FROM tbl_tickets
        WHERE status='progress'
        AND YEAR(created_at)=YEAR(NOW())
        AND MONTH(created_at)=MONTH(NOW())
    ")->fetchColumn();

    $closed = $pdo->query("
        SELECT COUNT(*)
        FROM tbl_tickets
        WHERE status='closed'
        AND YEAR(created_at)=YEAR(NOW())
        AND MONTH(created_at)=MONTH(NOW())
    ")->fetchColumn();

    $installation = $pdo->query("
        SELECT COUNT(*)
        FROM tbl_tickets
        WHERE type='installation'
        AND YEAR(created_at)=YEAR(NOW())
        AND MONTH(created_at)=MONTH(NOW())
    ")->fetchColumn();

    $trouble = $pdo->query("
        SELECT COUNT(*)
        FROM tbl_tickets
        WHERE type='trouble'
        AND YEAR(created_at)=YEAR(NOW())
        AND MONTH(created_at)=MONTH(NOW())
    ")->fetchColumn();

    sendMessage(
        $chatId,
        "📊 DASHBOARD TIKET BULAN INI\n\n".
        "🔴 Open      : ".$open."\n".
        "🟡 Assigned  : ".$assigned."\n".
        "🔵 Progress  : ".$progress."\n".
        "🟢 Closed    : ".$closed."\n\n".
        "📡 Pemasangan : ".$installation."\n".
        "🚨 Gangguan   : ".$trouble
    );

    exit;
}

//========================
// DETAIL TIKET GANGGUAN
//========================

if (preg_match('/^\/detailggn(.+)$/i', $text, $m)) {

    $ticketNo = trim($m[1]);

    $stmt = $pdo->prepare("
        SELECT
            t.*,
            c.fullname,
            c.pppoe_username,
            c.address,
            c.city,
            c.district,
            c.state,
            c.phonenumber
        FROM tbl_tickets t
        LEFT JOIN tbl_customers c
            ON c.id = t.customer_id
        WHERE t.ticket_no=?
        LIMIT 1
    ");

    $stmt->execute([$ticketNo]);

    $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ticket) {

        sendMessage(
            $chatId,
            "❌ Tiket tidak ditemukan"
        );

        exit;
    }

    $msg =
        "🎫 DETAIL TIKET GANGGUAN\n\n".
        "No Ticket : ".$ticket['ticket_no']."\n".
        "👤 Pelanggan : ".$ticket['fullname']."\n".
        "🌐 Id Pelanggan : ".$ticket['pppoe_username']."\n".
        "📞 Telepon : ".$ticket['phonenumber']."\n\n".
        "📍 Alamat\n".
        $ticket['address']."\n".
        $ticket['district'].", ".
        $ticket['city'].", ".
        $ticket['state']."\n\n".
        "📌 Subject : ".$ticket['subject']."\n".
        "📝 Deskripsi : ".$ticket['description']."\n".
        "📊 Status : ".$ticket['status']."\n".
        "👷 Teknisi : ".$ticket['technician_name']."\n".
        "🕒 Assigned : ".$ticket['assigned_at']."\n".
        "📅 Dibuat : ".$ticket['created_at']."\n".
        "📋 Catatan : ".($ticket['technician_note'] ?: '-');

    sendMessage($chatId, $msg);

    exit;
}

//========================
// DETAIL TIKET PEMASANGAN
//========================

if (preg_match('/^\/detailpsb(.+)$/i', $text, $m)) {

    $ticketNo = trim($m[1]);

    $stmt = $pdo->prepare("
        SELECT
            t.*,
            i.fullname,
            i.nik,
            i.phone,
            i.address,
            i.city,
            i.district,
            i.state,
            i.zip,
            i.email,
            i.coordinates,
            i.ont_sn,
            i.pppoe_username,
            i.pppoe_password,
            i.wifi_ssid,
            i.wifi_password
        FROM tbl_tickets t
        LEFT JOIN tbl_installation_requests i
            ON i.id = t.installation_request_id
        WHERE t.ticket_no=?
        LIMIT 1
    ");

    $stmt->execute([$ticketNo]);

    $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ticket) {

        sendMessage(
            $chatId,
            "❌ Tiket tidak ditemukan"
        );

        exit;
    }

    $maps = '-';

    if (!empty($ticket['coordinates'])) {
        $maps =
            "https://maps.google.com/?q=" .
            $ticket['coordinates'];
    }

    $msg =
        "📡 DETAIL TIKET PEMASANGAN\n\n".
        "🎫 Ticket : ".$ticket['ticket_no']."\n".
        "📊 Status : ".$ticket['status']."\n".
        "👷 Teknisi : ".$ticket['technician_name']."\n\n".

        "👤 Nama : ".$ticket['fullname']."\n".
        "🪪 NIK : ".$ticket['nik']."\n".
        "📞 HP : ".$ticket['phone']."\n\n".
        "📍 Alamat\n".
        $ticket['address']."\n".
        $ticket['district'].", ".
        $ticket['city'].", ".
        $ticket['state']."\n\n".

        "🗺 Maps\n".$maps."\n\n".

        "📌 Subject : ".$ticket['subject']."\n".
        "📝 Deskripsi : ".$ticket['description']."\n\n".

        "🕒 Assigned : ".$ticket['assigned_at']."\n".
        "📅 Dibuat : ".$ticket['created_at'];

    sendMessage($chatId, $msg);

    exit;
}

// =======================
// ALIAS MENU BUTTON
// =======================

if ($text == "📋 Registrasi Pelanggan") {
    $text = "/registrasi";
}

if ($text == "📶 Ubah WiFi") {
    $text = "/ubahwifi";
}

// =======================
// MENU APPROVAL OLT
// =======================

if ($text == "📡 Approval OLT") {

    $stmt = $pdo->query("
        SELECT olt_name
        FROM olt_devices
        WHERE active=1
        ORDER BY id
    ");

    $keyboard = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $keyboard[] = [
            "📡 ".$row['olt_name']
        ];
    }

    sendKeyboard(
        $chatId,
        "Pilih OLT",
        $keyboard
    );

    exit;
}

// =======================
// PILIH OLT
// =======================

if (strpos($text, "📡 OLT") === 0) {

    $olt = preg_replace(
        '/^📡\s*/u',
        '',
        $text
    );

    $pdo->prepare("
        REPLACE INTO tg_sessions
        (chat_id,step,username)
        VALUES
        (?, 'approve_pon', ?)
    ")->execute([
        $chatId,
        $olt
    ]);

    sendKeyboard(
        $chatId,
        "Pilih PON untuk ".$olt,
        [
            ["PON 1/1"],
            ["PON 1/2"]
        ]
    );

    exit;
}

// =======================
// APPROVE OLT
// =======================

if (
    preg_match(
        '/^\/approve\s+(.+?)\s+(1\/[12])$/i',
        $text,
        $m
    )
) {

    $olt = trim($m[1]);
    $pon = trim($m[2]);

    sendMessage(
        $chatId,
        "⏳ Menjalankan approve...\n\n".
        "OLT : ".$olt."\n".
        "PON : ".$pon
    );

    $cmd =
        "php82 /data/html/hioso/approve.php ".
        escapeshellarg($olt)." ".
        escapeshellarg($pon)." 2>&1";

    $result = trim(shell_exec($cmd));

    if ($result == "SUCCESS") {

        sendMessage(
            $chatId,
            "✅ APPROVE BERHASIL\n\n".
            "OLT : ".$olt."\n".
            "PON : ".$pon."\n".
            "STATUS : CONFIG SAVED"
        );

    } else {

        sendMessage(
            $chatId,
            "❌ APPROVE GAGAL\n\n".
            $result
        );

    }

    exit;
}

// =======================
// REGISTRASI
// =======================

if ($text == "/registrasi") {

    $stmt = $pdo->query("
        SELECT MAX(id) as lastid
        FROM tbl_customers
    ");

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $username = date('mdHis');

    $pdo->prepare("
        REPLACE INTO tg_sessions
        (chat_id, step, username)
        VALUES (?, 'fullname', ?)
    ")->execute([
        $chatId,
        $username
    ]);

    sendMessage(
        $chatId,
        "Username otomatis: ".$username."\n\n".
        "Masukkan nama sesuai KTP:"
    );

    exit;
}

// =======================
// UBAH WIFI
// =======================

if ($text == "/ubahwifi") {

    $pdo->prepare("
        REPLACE INTO tg_sessions
        (chat_id, step)
        VALUES (?, 'wifi_username')
    ")->execute([$chatId]);

    sendMessage(
        $chatId,
        "Masukkan username pelanggan:"
    );

    exit;
}

// =======================
// CEK SESSION
// =======================

$stmt = $pdo->prepare(
    "SELECT * FROM tg_sessions WHERE chat_id=?"
);

$stmt->execute([$chatId]);

$session = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$session) {
    exit;
}

// =======================
// APPROVE DARI MENU
// =======================

if (
    $session &&
    $session['step'] == 'approve_pon' &&
    ($text == 'PON 1/1' || $text == 'PON 1/2')
) {

    $pon = str_replace('PON ','',$text);
    $olt = $session['username'];

    sendMessage(
        $chatId,
        "⏳ Menjalankan approve...\n\n".
        "OLT : ".$olt."\n".
        "PON : ".$pon
    );

    $cmd =
        "php82 /data/html/hioso/approve.php ".
        escapeshellarg($olt)." ".
        escapeshellarg($pon)." 2>&1";

    $result = trim(shell_exec($cmd));

    if ($result == "SUCCESS") {

        sendMessage(
            $chatId,
            "✅ APPROVE BERHASIL\n\n".
            "OLT : ".$olt."\n".
            "PON : ".$pon."\n".
            "STATUS : CONFIG SAVED"
        );

    } else {

        sendMessage(
            $chatId,
            "❌ APPROVE GAGAL\n\n".$result
        );
    }

    $pdo->prepare(
        "DELETE FROM tg_sessions WHERE chat_id=?"
    )->execute([$chatId]);

    exit;
}

// =======================
// USERNAME
// =======================

if ($session['step'] == 'username') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET username=?,
            step='fullname'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan nama lengkap:"
    );

    exit;
}


// =======================
// FULLNAME
// =======================

if ($session && $session['step'] == 'fullname') {

    try {

        $stmt = $pdo->prepare("
            UPDATE tg_sessions
            SET fullname=?,
                step='nik'
            WHERE chat_id=?
        ");

        $stmt->execute([
            $text,
            $chatId
        ]);

        sendMessage(
            $chatId,
            "Masukkan NIK pelanggan:"
        );

    } catch (Exception $e) {

        sendMessage(
            $chatId,
            "ERROR: ".$e->getMessage()
        );

    }

    exit;
}


// =======================
// NIK
// =======================

if ($session['step'] == 'nik') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET nik=?,
            step='phone'
        WHERE chat_id=?
    ")->execute([
        trim($text),
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan nomor WA dengan awalan 62:"
    );

    exit;
}


// =======================
// PHONE
// =======================

if ($session['step'] == 'phone') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET phone=?,
            step='address'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan alamat lengkap pelanggan:"
    );

    exit;
}


// =======================
// ADDRESS
// =======================

if ($session['step'] == 'address') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET address=?,
            step='city'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan kota:"
    );

    exit;
}

// =======================
// CITY
// =======================

if ($session['step'] == 'city') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET city=?,
            step='district'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan kecamatan:"
    );

    exit;
}

// =======================
// DISTRICT
// =======================

if ($session['step'] == 'district') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET district=?,
            step='state'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan provinsi:"
    );

    exit;
}

// =======================
// STATE
// =======================

if ($session['step'] == 'state') {

    try {

        $pdo->prepare("
            UPDATE tg_sessions
            SET state=?,
                step='zip'
            WHERE chat_id=?
        ")->execute([
            $text,
            $chatId
        ]);

        sendMessage(
            $chatId,
            "Masukkan kode pos:"
        );

    } catch (Exception $e) {

        sendMessage(
            $chatId,
            "ERROR STATE: ".$e->getMessage()
        );
    }

    exit;
}


// =======================
// ZIP
// =======================

if ($session['step'] == 'zip') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET zip=?,
            step='email'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan email:"
    );

    exit;
}


// =======================
// EMAIL
// =======================

if ($session['step'] == 'email') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET email=?,
            step='coordinates'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Silakan kirim lokasi menggunakan fitur Share Location Telegram"
    );

    exit;
}

// =======================
// ONT SERIAL NUMBER
// =======================

if ($session['step'] == 'ont_sn') {

    $sn = strtoupper(trim($text));

    $acsHost = "http://45.123.142.5:7557";

    $json = @file_get_contents(
        $acsHost .
        "/devices/?query=" .
        urlencode(
            '{"VirtualParameters.getSerialNumber._value":"' .
            $sn .
            '"}'
        )
    );

    if ($json === false) {

        sendMessage(
            $chatId,
            "❌ Gagal terhubung ke GenieACS"
        );

        exit;
    }

    $devices = json_decode($json, true);

    if (!isset($devices[0])) {

        sendMessage(
            $chatId,
            "❌ Serial Number ONT tidak ditemukan di GenieACS"
        );

        exit;
    }

    $device = $devices[0];

    // Debug sementara
    error_log("SN: ".$sn);
    error_log("GenieACS Result: ".$json);

    $vendor =
	$device['VirtualParameters.getponmode']['_value']
        ?? '-';

    $model =
        $device['DeviceID.ProductClass']['_value']
        ?? '-';

    $firmware =
        $device['InternetGatewayDevice.DeviceInfo.SoftwareVersion']['_value']
        ?? '-';

    $lastInform =
        $device['_lastInform']
        ?? '';

    $tags =
        $device['_tags']
        ?? [];

    $status = 'Offline';

    if (
        !empty($lastInform) &&
        strtotime($lastInform) > (time() - 1800)
    ) {
        $status = 'Online';
    }

    // Jika sudah ada tag pelanggan
    if (!empty($tags)) {

        sendMessage(
            $chatId,
            "❌ ONT sudah digunakan\n\n" .
            "SN : ".$sn."\n" .
            "Vendor : ".$vendor."\n" .
            "Model : ".$model."\n" .
            "Firmware : ".$firmware."\n" .
            "Status : ".$status."\n" .
            "Tag : ".implode(',', $tags)
        );

        exit;
    }

    // Simpan SN ke session

    $pdo->prepare("
        UPDATE tg_sessions
        SET ont_sn=?,
             step='plan'
        WHERE chat_id=?
    ")->execute([
        $sn,
        $chatId
    ]);

// Simpan SN ke session

$pdo->prepare("
    UPDATE tg_sessions
    SET ont_sn=?,
        step='plan'
    WHERE chat_id=?
")->execute([
    $sn,
    $chatId
]);

$stmt = $pdo->query("
    SELECT id,name_plan
    FROM tbl_plans
    WHERE enabled=1
    ORDER BY id
");

$keyboard = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $keyboard[] = [
        "📦 ".$row['name_plan']
    ];
}

sendKeyboard(
    $chatId,
    "✅ ONT siap digunakan\n\n".
    "SN : ".$sn."\n".
    "Status : ".$status."\n\n".
    "Silakan pilih paket internet",
    $keyboard
);

exit;

}

// =======================
// PILIH PAKET INTERNET
// =======================

if ($session['step'] == 'plan') {

    $planName = str_replace('📦 ','',$text);

    $stmt = $pdo->prepare("
        SELECT id,name_plan
        FROM tbl_plans
        WHERE name_plan=?
          AND enabled=1
    ");

    $stmt->execute([
        $planName
    ]);

    $plan = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$plan) {

        sendMessage(
            $chatId,
            "Silakan pilih paket menggunakan tombol"
        );

        exit;
    }

    $pdo->prepare("
        UPDATE tg_sessions
        SET plan_id=?,
            plan_name=?,
            step='router'
        WHERE chat_id=?
    ")->execute([
        $plan['id'],
        $plan['name_plan'],
        $chatId
    ]);

    $stmt = $pdo->query("
        SELECT name
        FROM tbl_routers
        WHERE enabled=1
        ORDER BY name
    ");

    $keyboard = [];

    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $keyboard[] = [
            '🌐 '.$r['name']
        ];
    }

    sendKeyboard(
        $chatId,
        "✅ Paket dipilih\n\n".
        "Paket : ".$plan['name_plan']."\n\n".
        "Silakan pilih Router / POP",
        $keyboard
    );

    exit;
}

// =======================
// PILIH ROUTER
// =======================

if ($session['step'] == 'router') {

    $routerName = str_replace('🌐 ','',$text);

    $stmt = $pdo->prepare("
        SELECT name
        FROM tbl_routers
        WHERE name=?
    ");

    $stmt->execute([
        $routerName
    ]);

    $router = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$router) {

        sendMessage(
            $chatId,
            "Silakan pilih router menggunakan tombol"
        );

        exit;
    }

    $pdo->prepare("
        UPDATE tg_sessions
        SET router_name=?,
            step='confirm'
        WHERE chat_id=?
    ")->execute([
        $routerName,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "✅ Router dipilih\n\n".
        "Router : ".$routerName."\n\n".
        "Ketik YA untuk menyimpan pelanggan"
    );

    exit;
}

// =======================
// WIFI USERNAME
// =======================

if ($session['step'] == 'wifi_username') {

    $username = trim($text);

    $pdo->prepare("
        UPDATE tg_sessions
        SET username=?,
            step='wifi_ssid'
        WHERE chat_id=?
    ")->execute([
        $username,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan SSID WiFi baru:"
    );

    exit;
}

// =======================
// WIFI SSID
// =======================

if ($session['step'] == 'wifi_ssid') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET wifi_ssid=?,
           step='wifi_password'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Masukkan Password WiFi baru:"
    );

    exit;
}

// =======================
// WIFI PASSWORD
// =======================

if ($session['step'] == 'wifi_password') {

    $pdo->prepare("
        UPDATE tg_sessions
        SET wifi_password=?,
            step='wifi_confirm'
        WHERE chat_id=?
    ")->execute([
        $text,
        $chatId
    ]);

    sendMessage(
        $chatId,
        "Ketik YA untuk mengubah WiFi"
    );

    exit;
}



// =======================
// CONFIRM WIFI
// =======================

if (
$session['step'] == 'wifi_confirm' &&
strtoupper($text) == 'YA'
) {

$acsHost = "http://45.123.142.5:7557";

$json = @file_get_contents(
    $acsHost .
    "/devices/?query=" .
    urlencode(
        '{"_tags":"' . $session['username'] . '"}'
    )
);

$devices = json_decode($json, true);

if (empty($devices[0]['_id'])) {

    sendMessage(
        $chatId,
        "❌ Pelanggan tidak ditemukan di GenieACS\n\n" .
        "Tag : " . $session['username']
    );

    exit;
}

$deviceId = $devices[0]['_id'];

$taskWifi = [
    "name" => "setParameterValues",
    "parameterValues" => [
        [
            "InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.SSID",
            $session['wifi_ssid'],
            "xsd:string"
        ],
        [
            "InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.PreSharedKey.1.KeyPassphrase",
            $session['wifi_password'],
            "xsd:string"
        ],
        [
            "InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.KeyPassphrase",
            $session['wifi_password'],
            "xsd:string"
        ],
        [
            "InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.PreSharedKey.1.PreSharedKey",
            $session['wifi_password'],
            "xsd:string"
        ]
    ]
];

file_get_contents(
    $acsHost .
    "/devices/" .
    rawurlencode($deviceId) .
    "/tasks",
    false,
    stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json\r\n",
            'content' => json_encode($taskWifi)
        ]
    ])
);

sendMessage(
    $chatId,
    "✅ WiFi berhasil diubah\n\n" .
    "SSID : " . $session['wifi_ssid'] . "\n" .
    "Password : " . $session['wifi_password']
);

$pdo->prepare(
    "DELETE FROM tg_sessions WHERE chat_id=?"
)->execute([$chatId]);

exit;

}

//=======================
//  CONFIRM REGISTRASI
//=======================

if (
    $session['step'] == 'confirm' &&
    strtoupper($text) == 'YA'
) {

    $stmt = $pdo->prepare("
    INSERT INTO tbl_customers
    (
        username,
        password,
        photo,
        pppoe_username,
        pppoe_password,
        fullname,
        nik,
        address,
        city,
        district,
        state,
        zip,
        phonenumber,
        email,
        coordinates,
	ont_sn,
        balance,
        service_type,
        account_type,
        auto_renewal,
        status,
        created_by
    )
    VALUES
    (
        ?,?,?,?,?,?,?,?,?,?,
        ?,?,?,?,?,?,?,?,?,?,?,?
    )
    ");

    $stmt->execute([
        $session['username'],
        $session['pppoe_password'],
        '/user.default.jpg',
        $session['username'],
        $session['pppoe_password'],
        $session['fullname'],
        $session['nik'],
        $session['address'],
        $session['city'],
        $session['district'],
        $session['state'],
        $session['zip'],
        $session['phone'],
        $session['email'],
        $session['coordinates'],
	$session['ont_sn'],
        0,
        'PPPoE',
        'Personal',
        1,
        'Active',
        1
    ]);
$customerId = $pdo->lastInsertId();

if (!empty($session['plan_id'])) {

    $plan = $pdo->prepare("
        SELECT *
        FROM tbl_plans
        WHERE id=?
    ");

    $plan->execute([
        $session['plan_id']
    ]);

    $p = $plan->fetch(PDO::FETCH_ASSOC);

    if ($p) {

        $today = date('Y-m-d');
        $now   = date('H:i:s');

        $pdo->prepare("
            INSERT INTO tbl_user_recharges
            (
                customer_id,
                username,
                plan_id,
                namebp,
                recharged_on,
                recharged_time,
                expiration,
                time,
                status,
                method,
                routers,
                type,
                admin_id
            )
            VALUES
            (
                ?,?,?,?,?,?,?,?,?,?,?,?,?
            )
        ")->execute([
            $customerId,
            $session['username'],
            $p['id'],
            $p['name_plan'],
            $today,
            $now,
            $today,
            $now,
            'off',
            'Pending Payment',
            $session['router_name'],
            $p['type'],
            1
        ]);
    }
}

// =======================
// SEND WELCOME WHATSAPP
// =======================

$waText =
    "Selamat datang di ANTEN NET terimakasih telah jadi pelanggan kami\n\n".
    "Berikut data anda :\n\n".
    "Nama : ".$session['fullname']."\n".
    "Username : ".$session['username']."\n".
    "Password : ".$session['pppoe_password']."\n".
    "Login: https://billing.antennet.co.id/login\n\n".
    "Untuk layanan Customer service harap hubungi Whatsapp : 085158104430\n\n".
    "Hormat Kami\n".
    "PT. Anten Sarana Teknologi\n".
    "Ruko RLDV Blok B No 29";

$waUrl =
    "https://billing.antennet.co.id/?".
    "_route=plugin/whatsappGateway_send".
    "&to=".urlencode($session['phone']).
    "&msg=".urlencode($waText).
    "&secret=dec7d0fa549f3aacee128eaed33eee7c";

@file_get_contents($waUrl);


// Cari Device ID GenieACS dari Serial Number ONT

$acsHost = "http://45.123.142.5:7557";

$sn = $session['ont_sn'];

$json = @file_get_contents(
    $acsHost . "/devices/?query=" .
    urlencode('{"VirtualParameters.getSerialNumber._value":"'.$sn.'"}')
);

$devices = json_decode($json, true);

error_log("SN: ".$sn);
error_log("GenieACS Result: ".$json);

if (!empty($devices[0]['_id'])) {

    $deviceId = $devices[0]['_id'];

error_log("Device Found: ".$deviceId);

    // PPPoE Username

    $task1 = [
        "name" => "setParameterValues",
        "parameterValues" => [
            [
                "VirtualParameters.pppoeUsername",
                $session['username'],
                "xsd:string"
            ],
            [
                "VirtualParameters.pppoePassword",
                $session['pppoe_password'],
                "xsd:string"
            ]
        ]
    ];

    $opts = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json\r\n",
            'content' => json_encode($task1)
        ]
    ];

    file_get_contents(
        $acsHost . "/devices/" . rawurlencode($deviceId) . "/tasks",
        false,
        stream_context_create($opts)
    );

// Tambahkan Tag = Username

$tagUrl =
    $acsHost .
    "/devices/" .
    rawurlencode($deviceId) .
    "/tags/" .
    rawurlencode($session['username']);

@file_get_contents(
    $tagUrl,
    false,
    stream_context_create([
        'http' => [
            'method' => 'POST'
        ]
    ])
);

}

    sendMessage(
        $chatId,
      "✅ Pelanggan berhasil dibuat\n\n".
        "Nama : ".$session['fullname']."\n".
        "Login : https://billing.antennet.co.id/login\n".
        "Username : ".$session['username']."\n".
        "Password : ".$session['pppoe_password']."\n\n".
        "⏳ STATUS : MENUNGGU PEMBAYARAN\n\n".
        "Internet belum aktif sampai pembayaran diterima."
    );

    $pdo->prepare(
        "DELETE FROM tg_sessions WHERE chat_id=?"
    )->execute([$chatId]);

    exit;
}


<?php

if ($argc < 3) {
    exit("FAILED");
}

$oltName = $argv[1];
$pon = $argv[2];

$pdo = new PDO(
    "mysql:host=localhost;dbname=pnbrad;charset=utf8mb4",
    "pnb",
    "Antennet2024*#"
);

$stmt = $pdo->prepare("
    SELECT *
    FROM olt_devices
    WHERE olt_name = ?
    AND active = 1
");

$stmt->execute([$oltName]);

$olt = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$olt) {
    exit("OLT tidak ditemukan");
}

$cmd =
    "expect /data/html/hioso/approve_olt_multi.exp ".
    escapeshellarg($olt['ip_address'])." ".
    escapeshellarg($olt['username'])." ".
    escapeshellarg($olt['password'])." ".
    escapeshellarg($olt['enable_password'])." ".
    escapeshellarg($pon);

$output = shell_exec($cmd);

if (
    strpos($output, "Configuration file saved ok!") !== false
) {
    echo "SUCCESS";
} else {
    echo $output;
}

<?php

$fp = fsockopen("10.0.0.14", 23, $errno, $errstr, 10);

if (!$fp) {
    die("ERROR: $errstr\n");
}

stream_set_timeout($fp, 5);

sleep(2);

$data = fread($fp, 8192);

echo "===== RAW HEX =====\n";
echo bin2hex($data);
echo "\n\n===== RAW TEXT =====\n";
echo $data;

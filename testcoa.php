<?php

$username = "20260618153524";
$ip = "172.16.0.2";

$cmd = "printf 'User-Name = \"$username\"\nFramed-IP-Address = $ip\n' | radclient -x 10.0.1.2:3799 disconnect pnb123 2>&1";

echo shell_exec($cmd);

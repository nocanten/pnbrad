<?php

require_once 'system/autoload.php';

$onlineUsers = [];

/*
 * Ambil user PPPoE aktif dari Mikrotik
 */

$routers = ORM::for_table('tbl_routers')
    ->where('enabled', '1')
    ->find_many();

foreach ($routers as $router) {

    try {

        $mikrotik = new Mikrotik();

        $mikrotik->connect(
            $router['ip_address'],
            $router['username'],
            $router['password']
        );

        $active = $mikrotik->comm('/ppp/active/print');

        foreach ($active as $row) {

            if (!empty($row['name'])) {
                $onlineUsers[] = $row['name'];
            }
        }

    } catch (Exception $e) {

        echo "Router gagal: ".$router['name']."\n";
    }
}

/*
 * Kosongkan status lama
 */

ORM::raw_execute("TRUNCATE TABLE pppoe_status");

/*
 * Simpan status ONLINE
 */

foreach ($onlineUsers as $username) {

    $status = ORM::for_table('pppoe_status')->create();

    $status->username = $username;
    $status->status = 'ONLINE';
    $status->last_update = date('Y-m-d H:i:s');

    $status->save();
}

/*
 * Cari pelanggan yang OFFLINE
 */

$customers = ORM::for_table('tbl_customers')->find_many();

foreach ($customers as $customer) {

    if (
        !empty($customer['pppoe_username']) &&
        !in_array($customer['pppoe_username'], $onlineUsers)
    ) {

        $status = ORM::for_table('pppoe_status')->create();

        $status->username = $customer['pppoe_username'];
        $status->status = 'OFFLINE';
        $status->last_update = date('Y-m-d H:i:s');

        $status->save();
    }
}

echo "Selesai\n";

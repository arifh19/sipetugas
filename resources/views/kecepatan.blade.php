<?php

require("phpMQTT.php");

$server = "broker.shiftr.io";     // change if necessary
$port = 1883;                     // change if necessary
$username = "f4fa07d5";                   // set your username
$password = "89d8ea01dd465f2f";                   // set your password
$client_id = "sipetugas"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("sipetugas/lintas/kecepatan", $speed, 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}

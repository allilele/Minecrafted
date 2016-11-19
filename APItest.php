<?php
include_once('Minecrafted.class.php');

$serveur1 = new Minecrafted('127.0.0.1');
$serveur1->connect();
$host = $serveur1->getIp();
$port = $serveur1->getPort();
$motd = $serveur1->getMotd();
$ping = $serveur1->getPing();
$playersOnline = $serveur1->getOnPlyrs();
$playersMax = $serveur1->getMaxPlyrs();
echo(  "Motd: $motd<br/>
		Address: $host Port: $port<br/>
        Players Online: <span style=\"color:#FF9900\">$playersOnline</span>/$playersMax<br/>
        Ping: $ping ms<br/>
        Status: ");
        if (($ping > '1000') || ($ping < '0')) {
        echo "<span style=\"color:#FF0000\">Offline</span>";
        }
        else {
        echo "<span style=\"color:#00FF00\">Online</span></br>";
        }
?>
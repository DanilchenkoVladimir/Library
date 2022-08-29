<?php

$dbHost = "localhost";
$dbName = "library";
$dbUsername = "root";
$dbPassword = "root";
$db = new PDO("mysql:dbhost=$dbHost;dbName=$dbName",$dbUsername,$dbPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


// print_r($db[1]);
// $db = new mysqli("localhost", "root", "root", "library");

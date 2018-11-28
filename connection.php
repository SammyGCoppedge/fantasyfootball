<?php

$dbServername = "35.229.115.37";
$dbUsername = "root";
$dbPassword = "football";
$dbName = "footballdb";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$userconn = mysqli_connect($dbServername, $dbUsername, $dbPassword, "users");

?>

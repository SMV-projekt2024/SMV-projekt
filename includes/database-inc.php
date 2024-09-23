<?php

$server = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "smv_spletna_ucilnica";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
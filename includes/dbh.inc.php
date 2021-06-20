<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "phploginsystem";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_errpr());
}
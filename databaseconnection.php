<?php
$servername = "localhost";
$username = "root";
$password = "Admin123!";
$databasename = "opdrachtdatabase";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
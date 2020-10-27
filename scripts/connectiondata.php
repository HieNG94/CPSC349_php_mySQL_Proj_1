<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petscarecenter";
$port = "3306";
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    echo '<script>alert("Connection failed")</script>';
    die();
}
?>
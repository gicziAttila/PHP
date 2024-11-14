<?php
session_start();

$servername = "localhost";
$username = "php_teszter";
$password = "lX_.3WBvq1Bx-T*P";
$dbname = "php_teszt";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
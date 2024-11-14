<?php
session_start();

$servername = "localhost";
$username = "php_teszter";
//$password = "lX_.3WBvq1Bx-T*P";
$password = "Iay_TS-YE)E]k-0/";
$dbname = "php_teszt";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
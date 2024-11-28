<?php
session_start();

$servername = "localhost";
$username = "php_teszter";
//$password = "lX_.3WBvq1Bx-T*P";
$password = "Iay_TS-YE)E]k-0/";
$dbname = "php_teszt";


// Create connection
try{
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
}
catch (Exception $e) {
    echo "Hiba: " .  $e->getMessage();
    exit;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
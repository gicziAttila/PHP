<?php
$servername = "127.0.0.1";
$username = "c31gicziA";
//$password = "lX_.3WBvq1Bx-T*P";
$password = "67pp@ggGKUX";
$dbname = "c31gicziA_db";

define('DB_PREFIX', 'x23da', false);

// Create connection
try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
}
catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
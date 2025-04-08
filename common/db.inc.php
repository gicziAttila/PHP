<?php
$servername = "127.0.0.1";
$username = "c31gicziA";
//$password = "lX_.3WBvq1Bx-T*P";
$password = "67pp@ggGKUX";
$dbname = "c31gicziA_db";

define('DB_PREFIX', 'x23da', false);

// Create connection
try{
    $pdo = new PDO("mysql:host=" . $servername .  ";dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Adatbázis csatlakozási hiba");
    }
}
catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
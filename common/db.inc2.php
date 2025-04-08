<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "restapi1";

try{
    $pdo = new PDO("mysql:host=". $servername.";dbname=$dbname", $username, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        throw new Exception("Adatbázis csatlakozási hiba");
    }
}catch(PDOException $e){
    die("Connenction error: " . $e->getMessage());
}
?>
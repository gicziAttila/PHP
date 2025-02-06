<?php

$name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["keresett_nev"]) < 2) {
        $nameErr = "Legalább legyen 2 karakter";
    } else {
        $name = $_POST["keresett_nev"];
    }
}

//Adatbázis alapú adatok lekérdezése és továbbítása a nézetnek
require 'models/index.php';
// létezik a $resp tömb
require 'views/index.php';

?>
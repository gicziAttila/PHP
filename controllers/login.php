<?php
$name = '';

if (isset($_POST["felhasznalonev"]) and isset($_POST["jelszo"])) {
    
    require_once 'models/login.php';

    if ($row) {
        // elkódolt jelszó összevetés
        $row = $result->fetch_assoc();
        if ($row["jelszo"] === hash('sha256', $_POST["jelszo"])) {
            // belépett felhasználó
            $valasz = "Üdv ".$row["nev"]."!";
            $_SESSION["id"] = $row["id"];
            $_SESSION["nev"] = $row["nev"];
            $_SESSION["isAdmin"] = $row["isAdmin"];
        } else {
            // rossz jelszó
            $valasz = "Hibás jelszó";
        }
    } else {
        //nincs ilyen felhasználónév
        $valasz = "Nem létezik a felhasználó";
    }
}
elseif(isset($_SESSION["id"])){
    unset($_SESSION["id"]);
    unset($_SESSION["nev"]);
    $valasz = "Sikeres kijelentkezés";
}

require 'views/login.php';
?>
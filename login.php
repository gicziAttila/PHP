<?php

require './common/db.inc.php';


$name = '';

if (isset($_POST["felhasznalonev"]) and isset($_POST["jelszo"])) {
    $sql = "SELECT id, nev, jelszo, isAdmin FROM osztaly WHERE felhasznalonev = \"" . $_POST["felhasznalonev"] . "\"";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
    <?php
    include './common/navbar.inc.php';
    ?>
    <div class="d-flex flex-column align-items-center">
    <form method="post" action="login.php" class="form-inline my-2 my-lg-0">
        <div class="mb-3">
            <input type="text" name="felhasznalonev" placeholder="Felhasználónév" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" name="jelszo" placeholder="Jelszó" class="form-control">
        </div>
        <button class="btn btn-primary">Belépés</button>
    </form>
    <?php
    if (isset($valasz)) {
        echo "<h1 class='mt-5'>" . $valasz . "</h1>";
    }
    ?>
</div>
<?php
include "./common/style.inc.php";
?>
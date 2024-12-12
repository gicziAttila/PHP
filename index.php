<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ulesrend</title>
</head>

<?php

$fejlec = array("#", "1. oszlop", "2. oszlop", "Folyosó", "3. oszlop", "4. oszlop", "Folyosó", "5.oszlop");

require './common/db.inc.php';

$name = '';

//print_r($_REQUEST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (strlen($_POST["keresett_nev"]) < 2) {
            $nameErr = "Legalább legyen 2 karakter";
        } else {
            $name = $_POST["keresett_nev"];
        }
    }
/*echo "Connected successfully;*/

/*
foreach ($ulesrend as $kulcs => $sor) {

    foreach ($sor as $oszlop => $nev) {
        $sql = "INSERT INTO Osztaly (nev, sor, oszlop) VALUES ('".$nev."', $kulcs, $oszlop)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
}
*/

include './common/navbar.inc.php'
?>

    
    <table class="table caption-top table-striped table-bordered">
        <thead>
            <tr>
                <?php
                foreach ($fejlec as $sor) {
                    echo "<td>" . $sor . "</td>";
                }
                ?>
            </tr>
        </thead>
        <caption>13.i Ülésrend</caption>
        <tbody class="table-group-divider">
            <tr>
                <?php
                /*foreach ($ulesrend as $kulcs => $sor) {
                    echo "<tr>";
                    echo $kulcs + 1;
                    foreach ($sor as $oszlop => $nev) {
                        echo "<td>" . $nev . "</td>";
                    }
                    echo "</tr>";
                }
                */


                $sql = "SELECT id, nev, sor, oszlop, isAdmin FROM Osztaly ORDER BY sor, oszlop";
                $result = $conn->query($sql);

                $sor = NULL;

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        if ($sor !== $row["sor"]) {
                            if ($sor !== NULL)
                                echo "</tr>"
                                    ?>
                            <tr style="background-color: <?php echo $cellBgColor; ?>;">
                            <th scope="row"><?php echo $row["sor"] + 1; ?></th>
                            <?php
                            $sor = $row["sor"];

                        }
                        $class = "";
                        if ($name != '') {
                            if (stripos($row["nev"], $name) !== FALSE) { // Change strpos to stripos
                                $class = " class=\"bg-danger\"";
                            }
                        }
                        //profilkép
                        $profilePicture = "";
                        if(file_exists("uploads/".$row["id"].".jpg")){
                            $profilePicture = "<img src=\"uploads/".$row["id"].".jpg\" class='profilePic'>";
                        }
                        elseif(strpos($row["nev"], "-")){
                            $profilePicture = "";
                        }
                        else{
                            $profilePicture = "<img src='uploads/default.jpg' class='profilePic'>";
                        }
                        //admin
                        $nev = $row["nev"];
                        $id = $_SESSION["id"] ?? NULL;
                        $isAdmin = $_SESSION["isAdmin"] ?? NULL;
                        if (isset($isAdmin) && $isAdmin == 1) {
                            if ($row["oszlop"] == 2 or $row["oszlop"] == 4) {
                                echo "<td></td>";
                            }
                            if(strpos($row["nev"], "-")){
                                echo "<td " . $class . ">". $profilePicture . "<br>" . $nev. "</td>";  
                            }else{
                                echo "<td " . $class . "><a href='profile.php?id=" . $row["id"] . "'>" . $profilePicture . "<br>" . $nev . "</a></td>";
                            }
                        }else{
                            if($row["id"] == $id) {
                                echo "<td " . $class . "><a href='profile.php'>" . $profilePicture . "<br>" . $nev . "</a></td>";
                            }else{
                                echo "<td " . $class . ">". $profilePicture . "<br>" . $nev. "</td>";
                            }
                            if ($row["oszlop"] == 1 or $row["oszlop"] == 3) {
                                echo "<td></td>";
                            }
                        }
                        //echo $row["id"] . $row["nev"] . " " . $row["sor"] . " " . $row["oszlop"] . "<br>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
<?php
include "./common/style.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <script>
        function showHint(str) {
        if (str.length > 1) {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const obj = JSON.parse(this.responseText);
                let text = "";
                for(let x in obj.nevek){
                    text += "<div>" + obj.nevek[x].nev + "</div>";
                };
                document.getElementById("txtHint").innerHTML = text;
            }
          };
          xmlhttp.open("GET", "gethint.php?q=" + str, true);
          xmlhttp.send();
        }
        else{
            document.getElementById("txtHint").innerHTML = "";
        }
      }
    </script>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Ülésrend</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["id"])) {
                        echo '<a class="nav-link" href="index.php?page=login">Kilépés</a>';
                    } else {
                        echo '<a class="nav-link" href="index.php?page=login">Belépés</a>';
                    }
                    ?>
                </li>
            </ul>
            <?php
            if (isset($nameErr)) {
                echo "<script type='text/javascript'>alert('$nameErr');</script>";
            }
            ?>
            <form class="d-flex" role="search" action="index.php" method="post">
                <input onkeyup="showHint(this.value)" class="form-control me-2" name="keresett_nev" type="text" placeholder="Keresés"
                    value="<?php echo $name ?>" aria-label="Kereses">
                <button class="btn btn-outline-success" value="KERESES" type="submit">Search</button>
            </form>
            <div id="txtHint"></div>
        </div>
    </div>
</nav>

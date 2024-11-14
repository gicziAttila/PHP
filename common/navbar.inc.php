<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
                        echo '<a class="nav-link" href="login.php">Kilépés</a>';
                    } else {
                        echo '<a class="nav-link" href="login.php">Belépés</a>';
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
                <input class="form-control me-2" name="keresett_nev" type="text" placeholder="Keresés"
                    value="<?php echo $name ?>" aria-label="Kereses">
                <button class="btn btn-outline-success" value="KERESES" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

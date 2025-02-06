<?php
include './common/navbar.inc.php';
if (isset($valasz)) {
    echo "<h1 class='mt-5'>" . $valasz . "</h1>";
}
if (!isset($_SESSION["id"])) {
    ?>
    <div class="d-flex flex-column align-items-center">
        <form method="post" action="index.php" class="form-inline my-2 my-lg-0">
            
            <div class="mb-3">
                <input type="text" name="felhasznalonev" placeholder="Felhasználónév" class="form-control">
            </div>
            <div class="mb-3">
                <input type="password" name="jelszo" placeholder="Jelszó" class="form-control">
            </div>
            <button class="btn btn-primary">Belépés</button>
        </form>
    </div>
    <?php
}
include "./common/style.inc.php";
?>
<?php

require './common/db.inc.php';


$name = '';
$jpegExt = array('jpg', 'jpeg', 'JPG', 'JPEG');
include './common/navbar.inc.php';
?>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow">
        <h2 class="text-center">Fájl feltöltése</h2>
        <?php
        $target_dir = "uploads/";
        // van-e feltöltött fájl
        if (isset($_FILES["fileToUpload"]["tmp_name"])) {
            // Hová mentjük és milyen néven
            $filename = basename($_FILES["fileToUpload"]["name"]);
            $filenameArr = preg_split("/\./", $filename);
            if (in_array($filenameArr[1], $jpegExt)) {
                $target_file = $target_dir . $_SESSION["id"] . "." . $filenameArr[1];

                //áthelyezzük az ideiglenes fájlt a végleges nevén a helyére
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "<div class='alert alert-success'>A fájl " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " sikeresen feltöltve.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Hiba történt</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Csak JPG fájlt lehet feltölteni</div";
            }
        }
             elseif (isset($_REQUEST['action'])) {
                if ($_REQUEST['action'] == 'deleteimg') {
                    if (file_exists($target_dir . $_SESSION["id"] . ".jpg")) {
                        if (unlink($target_dir . $_SESSION["id"] . ".jpg")) {
                            echo "<div class='alert alert-danger'>A fájl törlésre került.</div>";
                        }
                    }
                }
            }
        ?>
        <?php
        if (file_exists($target_dir . $_SESSION["id"] . ".jpg")) {
            $profileImage = "<img src=\"uploads/" . $_SESSION["id"] . ".jpg\" alt=\"profilKép\" class=\"mb-3\">";
        } else {
            $profileImage = "<img src='uploads/default.jpg' class=\"mb-3\">";
        }
        echo $profileImage
            ?>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="form-group ms-5">
                <label for="fileToUpload">A kép cseréjéhez válaszd ki a feltöntendő képet:</label>
                <input type="file" class="form-control-file " name="fileToUpload" id="fileToUpload" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3" name="submit">Fájl feltöltés</button>
            <?php
            if (file_exists($target_dir . $_SESSION["id"] . ".jpg")) {
                echo "<a href=\"profile.php?action=deleteimg\" class=\"btn btn-primary btn-block mt-3\">Kép törlése</a>";
            }
            ?>
        </form>
    </div>
</div>
<?php
include "./common/style.inc.php";
?>
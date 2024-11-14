<?php

require './common/db.inc.php';


$name = '';

?>
    <?php
    include './common/navbar.inc.php';
    ?>
    <?php
?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow">
            <h2 class="text-center">Fájl feltöltése</h2>
            <?php
            // van-e feltöltött fájl
            if(isset($_FILES["fileToUpload"]["tmp_name"])){
                // Hová mentjük és milyen néven
                $target_dir = "uploads/";
                $filename = basename($_FILES["fileToUpload"]["name"]);
                $filenameArr = preg_split("/\./", $filename);
                
                $target_file = $target_dir . $_SESSION["id"].".". $filenameArr[1];

                //áthelyezzük az ideiglenes fájlt a végleges nevén a helyére
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "<div class='alert alert-success'>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                }
            }
            ?>
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group ms-5">
                    <label for="fileToUpload">Válaszd ki a feltölendő képet:</label>
                    <input type="file" class="form-control-file " name="fileToUpload" id="fileToUpload" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3" name="submit">Fájl feltöltés</button>
            </form>
        </div>
    </div>
<?php
include "./common/style.inc.php";
?>


echo "<div class='alert alert-success'>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</div>";

echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
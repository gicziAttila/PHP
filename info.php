<?php


// van-e feltöltött fájl
if(isset($_FILES["fileToUpload"]["tmp_name"])){
    // Hová mentjük és milyen néven
    $target_dir = getcwd() . "/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    print_r($_FILES);
    //áthelyezzük az ideiglenes fájlt a végleges nevén a helyére
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>

<body>

    <form action="info.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Fájl feltöltés" name="submit">
    </form>

</body>

</html>
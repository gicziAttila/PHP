<?php
$stmt = $conn->prepare("SELECT id, nev, jelszo, isAdmin FROM " . DB_PREFIX . "_osztaly WHERE felhasznalonev = ?");
$stmt->bind_param("s", $_POST["felhasznalonev"]);


$result = $stmt->execute();
$result = $stmt->get_result();

$row = NULL;

if ($result->num_rows > 0) {
    // elkódolt jelszó összevetés
    $row = $result->fetch_assoc();

}
?>
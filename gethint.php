<?php
include './common/db.inc.php';

$q = $_REQUEST["q"];
$resp = array();
if(strlen($q) >1 and preg_match('/[A-za-z-áéíóöőúüűÁÉÍÓÖŐÚÜŰ]/', $q)){
    $param = "%" . $q . "%";
    $stmt = $conn->prepare("SELECT id, nev FROM ".DB_PREFIX."_osztaly WHERE nev LIKE ? ORDER BY nev");
    $stmt->bind_param("s", $param);


    $result = $stmt->execute();
    $result = $stmt->get_result();


    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
           //echo "<div>".$row["nev"]."</div>";
           $resp[] = array("id" => $row["id"], "nev" => $row["nev"]);
        }
    }
}

echo json_encode(array("nevek" => $resp));
?>
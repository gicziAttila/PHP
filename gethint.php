<?php
include './common/db.inc.php';

$q = $_REQUEST["q"];
if(strlen($q) >1){
    $sql = "SELECT nev, id FROM osztaly WHERE nev LIKE '%".$q."%' ORDER BY nev";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
           //echo "<div>".$row["nev"]."</div>";
           $resp[] = array("id" => $row["id"], "nev" => $row["nev"]);
        }
    }
}

echo json_encode(array("nevek" => $resp));
?>
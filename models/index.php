<?php
$resp = array();
require_once './common/db.inc.php';


$sql = "SELECT id, nev, sor, oszlop, isAdmin FROM " . DB_PREFIX . "_osztaly ORDER BY sor, oszlop";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resp[] = array("id" => $row["id"], "nev" => $row["nev"], "sor" => $row["sor"], "oszlop" => $row["oszlop"], "isAdmin" => $row["isAdmin"]);
    }
}


?>
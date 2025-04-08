<?php
require "../common/db.inc2.php";
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch($method) {
    case "GET":
        $nap = isset($_GET['nap']) ? $_GET['nap'] : null;
        handleGetDate($pdo, $nap);
        break;
}

function handleGetDate($pdo, $nap){
    $dateSplit = explode("-", $nap);
    $months = array("honapok", "Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December");
    $ho = "SELECT ho FROM nevnap";
    $sql = "SELECT nev1, nev2, ho, nap FROM nevnap WHERE nap" == $dateSplit[1];
    $currentMonth = "";
    foreach($months as $month){
        $currentMonth = $month[$ho];
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($result));
}
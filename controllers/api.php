<?php 
include '../common/db.inc.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);

switch($method) {
    case 'GET': handelGet($pdo); break;
    case 'POST': handlePost($pdo, $input); break;
    case 'PUT': handlePut($pdo, $input); break;
    case 'DELETE': handleDelete($pdo, $input); break;
    default:
        echo json_encode(['message' => "Érvénytelen metódus"]);
        break;

}

function handelGet($pdo){
    $sql = "SELECT * FROM " .DB_PREFIX. "_osztaly";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
function handlePost($pdo, $input){
    $sql = "INSERT INTO " .DB_PREFIX. "_osztaly (nev, sor, oszlop, isAdmin) VALUES (:nev, :sor, :oszlop, :isAdmin)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nev' => $input['nev'], 'sor' => $input['sor'], 'oszlop' => $input['oszlop'], 'isAdmin' => $input['isAdmin']]);
    echo json_encode(['message' => 'Sikeresen hozzáadva']);
}
function handlePut($pdo, $input){
    $sql = "UPDATE " .DB_PREFIX. "_osztaly SET nev = :nev, sor = :sor, oszlop = :oszlop, felhasznalonev = :felhasznalonev isAdmin = :isAdmin WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nev' => $input['nev'], 'sor' => $input['sor'], 'oszlop' => $input['oszlop'], 'felhasznalonev' => $input['felhasznalonev'],  'isAdmin' => $input['isAdmin'], 'id' => $input['id']]);
    echo json_encode(['message' => 'Sikeresen módosítva']);
}
function handleDelete($pdo, $input){
    $sql = "DELETE FROM " .DB_PREFIX. "_osztaly WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $input['id']]);
    echo json_encode(['message' => 'Sikeresen törölve']);
}
?>
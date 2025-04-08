<?php
include '../common/db.inc.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        $sor = $_GET['sor'] ?? null;
        $oszlop = $_GET['oszlop'] ?? null;
        getStudentCount($pdo);
        break;
    case 'POST':
        postNewStudent($pdo, $input);
        break;
    case 'PUT':
        handlePut($pdo, $input);
        break;
    case 'DELETE':
        handleDelete($pdo, $input);
        break;
    default:
        echo json_encode(['message' => "Érvénytelen metódus"]);
        break;

}

function getAllStundents($pdo)
{
    $sql = "SELECT * FROM " . DB_PREFIX . "_osztaly";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
function getStudentCount($pdo)
{
    $sql = "SELECT nev FROM " . DB_PREFIX . "_osztaly";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
        $count = 0;
        foreach ($result as $diakok) {
            if (!strpos($diakok['nev'], '-') && !empty($diakok['nev'])) {
                $count += 1;
            }
        }
        echo json_encode(['count' => $count]);
    } catch (Exception $e) {
        echo json_encode(['message' => 'Nincs diák az osztályban']);
    }
}
function getStudent($pdo, $sor = null, $oszlop = null)
{
    if ($sor != null && $oszlop != null) {
        $sql = "SELECT nev, sor, oszlop FROM " . DB_PREFIX . "_osztaly";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        try {
            foreach ($result as $diakok) {
                if ($diakok['sor'] == $sor && $diakok['oszlop'] == $oszlop) {
                    $result = $diakok;
                }
            }
            echo json_encode($result);
        } catch (Exception $e) {
            echo json_encode(['message' => 'Nem ül ott diák']);
        }
    } else {
        echo json_encode(['message' => 'Nem írtál be sor és oszlopot']);
    }
}
function postNewStudent($pdo, $input)
{
    $request = $_REQUEST ?? null;
    if (is_null($request)) return json_encode(['message' => 'Nem adtál meg sor és oszlopot']);
    $sql = "SELECT nev FROM " . DB_PREFIX . "_osztaly WHERE sor = :sor AND oszlop = :oszlop";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':sor' => $request['sor'], ':oszlop' => $request['oszlop']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['nev'] == ' - '){
        $sql = "INSERT INTO " . DB_PREFIX . "_osztaly (nev, sor, oszlop) VALUES (:nev, :sor, :oszlop)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nev' => $request['nev'], 'sor' => $request['sor'], 'oszlop' => $request['oszlop']]);
        echo json_encode(['message' => 'Sikeresen hozzáadva']);
    } else {
        echo json_encode(['message' => 'Már ül ott diák']);
    }
}
function handlePost($pdo, $input)
{
    $sql = "INSERT INTO " . DB_PREFIX . "_osztaly (nev, sor, oszlop, isAdmin) VALUES (:nev, :sor, :oszlop, :isAdmin)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nev' => $input['nev'], 'sor' => $input['sor'], 'oszlop' => $input['oszlop'], 'isAdmin' => $input['isAdmin']]);
    echo json_encode(['message' => 'Sikeresen hozzáadva']);
}
function handlePut($pdo, $input)
{
    $sql = "UPDATE " . DB_PREFIX . "_osztaly SET nev = :nev, sor = :sor, oszlop = :oszlop, felhasznalonev = :felhasznalonev isAdmin = :isAdmin WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nev' => $input['nev'], 'sor' => $input['sor'], 'oszlop' => $input['oszlop'], 'felhasznalonev' => $input['felhasznalonev'], 'isAdmin' => $input['isAdmin'], 'id' => $input['id']]);
    echo json_encode(['message' => 'Sikeresen módosítva']);
}
function handleDelete($pdo, $input)
{
    $sql = "DELETE FROM " . DB_PREFIX . "_osztaly WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $input['id']]);
    echo json_encode(['message' => 'Sikeresen törölve']);
}
?>
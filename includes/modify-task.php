<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Catch ANY fatal error and return it as JSON
set_exception_handler(function($e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    exit;
});

register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        echo json_encode(['success' => false, 'message' => $error['message'] . ' in ' . $error['file'] . ':' . $error['line']]);
    }
});

include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Données invalides']);
    exit;
}

$id = $data['id'];
$nom = $data['nom'];
$commentaire = $data['commentaire'];
$priorite = $data['priorite'];
$due_date = $data['due_date'];

$stmt = $pdo->prepare("UPDATE todo SET nom = ?, commentaire = ?, priorite = ?, due_date = ? WHERE id = ?");
$success = $stmt->execute([$nom, $commentaire, $priorite, $due_date, $id]);

echo json_encode(['success' => $success]);
?>
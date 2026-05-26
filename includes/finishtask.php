<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

$stmt = $pdo->prepare("UPDATE todo SET en_cours = 0 WHERE id = ?;");
$stmt->execute([$id]);
$stmt2 = $pdo->prepare("UPDATE todo SET etat_d_avancement = 100 WHERE id = ?;");
$stmt2->execute([$id]);

echo json_encode(['success' => true]);
?>
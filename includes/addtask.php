<?php
include "db.php";

$data = json_decode(file_get_contents('php://input'), true);

$nom = $data['nom'];
$commentaire = $data['commentaire'];
$priorite = $data['priorite'];
$due_date = $data['due_date'];

$stmt = $pdo->prepare("INSERT INTO todo (nom, commentaire, priorite, due_date) VALUES (?, ?, ?, ?)");
$stmt->execute([$nom, $commentaire, $priorite, $due_date]);

echo json_encode(['success' => true]);
?>
<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT id, nom, commentaire, priorite, cree_le, due_date, en_cours, etat_d_avancement FROM todo WHERE id = :id");
$stmt->execute([':id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($task);
?>
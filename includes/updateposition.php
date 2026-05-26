<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->prepare("UPDATE todo SET etat_d_avancement = ? WHERE id = ?");
$stmt->execute([$data['avancement'], $data['id']]);

echo json_encode(['success' => true]);
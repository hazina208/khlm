<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;

    $oldImage = $pdo->query("SELECT image FROM amani WHERE id = $id")->fetchColumn();
    if ($oldImage) {
        unlink('../uploads/amani' . $oldImage);
    }

    $stmt = $pdo->prepare("DELETE FROM amani WHERE id = ?");
    $success = $stmt->execute([$id]);

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
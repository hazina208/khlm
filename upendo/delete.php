<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;

    $oldImage = $pdo->query("SELECT image FROM upendo WHERE id = $id")->fetchColumn();
    if ($oldImage) {
        unlink('../uploads/upendo' . $oldImage);
    }

    $stmt = $pdo->prepare("DELETE FROM upendo WHERE id = ?");
    $success = $stmt->execute([$id]);

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
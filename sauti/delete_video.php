<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;

    $oldVideo = $pdo->query("SELECT video FROM sauti WHERE id = $id")->fetchColumn();
    if ($oldVideo) {
        unlink('../videos/sauti/' . $oldVideo);
    }

    $stmt = $pdo->prepare("DELETE FROM sauti WHERE id = ?");
    $success = $stmt->execute([$id]);

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
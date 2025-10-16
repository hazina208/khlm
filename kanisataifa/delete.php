<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;

    $oldImage = $conn->query("SELECT image FROM kanisataifa WHERE id = $id")->fetchColumn();
    if ($oldImage) {
        unlink('../uploads/kanisataifa' . $oldImage);
    }

    $stmt = $conn->prepare("DELETE FROM kanisataifa WHERE id = ?");
    $success = $stmt->execute([$id]);

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
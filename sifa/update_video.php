<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $pdo->prepare("UPDATE sifa SET title = ?, description = ? WHERE id = ?");
    $success = $stmt->execute([$title, $description, $id]);

    // Handle video update if provided
    if (isset($_FILES['video']) && $_FILES['video']['error'] === 0) {
        $uploadDir = '../videos/sifa/';
        $oldVideo = $pdo->query("SELECT video FROM sifa WHERE id = $id")->fetchColumn();
        if ($oldVideo) unlink($uploadDir . $oldVideo); // Delete old

        $fileName = time() . '_' . basename($_FILES['video']['name']);
        $uploadPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath)) {
            $pdo->prepare("UPDATE sifa SET video = ? WHERE id = ?")->execute([$fileName, $id]);
        }
    }

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
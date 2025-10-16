<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? 0;
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $pdo->prepare("UPDATE kanisataifa SET title = ?, description = ? WHERE id = ?");
    $success = $stmt->execute([$title, $description, $id]);

    // Handle image update if provided
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = '../uploads/kanisataifa/';
        $oldImage = $pdo->query("SELECT image FROM kanisataifa WHERE id = $id")->fetchColumn();
        if ($oldImage) unlink($uploadDir . $oldImage); // Delete old

        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $uploadPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            $pdo->prepare("UPDATE kanisataifa SET image = ? WHERE id = ?")->execute([$fileName, $id]);
        }
    }

    echo json_encode(['success' => $success]);
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
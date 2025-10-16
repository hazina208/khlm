<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // For Flutter CORS
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDir = '../uploads/uzalishaji/';
        if (!file_exists($uploadDir)) mkdir($uploadDir, 0755, true);
        
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $uploadPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            $stmt = $pdo->prepare("INSERT INTO uzalishaji (title, description, image) VALUES (?, ?, ?)");
            if ($stmt->execute([$title, $description, $fileName])) {
                echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
            } else {
                echo json_encode(['error' => 'Failed to save to DB']);
            }
        } else {
            echo json_encode(['error' => 'Upload failed']);
        }
    } else {
        echo json_encode(['error' => 'No image uploaded']);
    }
} else {
    echo json_encode(['error' => 'Invalid method']);
}
?>
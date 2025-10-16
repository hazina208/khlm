<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require '../config.php';

$stmt = $conn->query("SELECT * FROM matukio ORDER BY id DESC");
$pictures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$baseUrl = $_ENV['API_BASE_URL'] ?? 'https://khlm-1.onrender.com/matukio'; // Set in .env or environment

// Derive image base from API base (replaces '/api' with '/uploads/upendo')
$imageBase = str_replace('/matukio', '/uploads/matukio/', $baseUrl);

foreach ($pictures as &$pic) {
    $pic['image_url'] = $imageBase . $pic['image'];
}

echo json_encode($pictures);
?>
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require '../config.php';

$stmt = $pdo->query("SELECT * FROM amani ORDER BY id DESC");
$pictures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$baseUrl = $_ENV['API_BASE_URL'] ?? 'http://127.0.0.1:80/kanisahalisi/amani'; // Set in .env or environment

// Derive image base from API base (replaces '/api' with '/uploads/upendo')
$imageBase = str_replace('/amani', '/uploads/amani/', $baseUrl);

foreach ($pictures as &$pic) {
    $pic['image_url'] = $imageBase . $pic['image'];
}

echo json_encode($pictures);
?>
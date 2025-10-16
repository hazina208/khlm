<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require '../config.php';

$stmt = $conn->query("SELECT * FROM uzalishaji ORDER BY id DESC");
$pictures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$baseUrl = $_ENV['API_BASE_URL'] ?? 'https://khlm-1.onrender.com/uzalishaji'; // Set in .env or environment

// Derive image base from API base (replaces '/api' with '/uploads/upendo')
$imageBase = str_replace('/uzalishaji', '/uploads/uzalishaji/', $baseUrl);

foreach ($pictures as &$pic) {
    $pic['image_url'] = $imageBase . $pic['image'];
}

echo json_encode($pictures);
?>
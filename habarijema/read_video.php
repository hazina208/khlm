<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require '../config.php';

$stmt = $pdo->query("SELECT * FROM habarijema ORDER BY id DESC");
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$baseUrl = $_ENV['API_BASE_URL'] ?? 'http://127.0.0.1:80/kanisahalisi/habarijema'; // Set in .env or environment

// Derive video base from API base (replaces '/api' with '/uploads/videos')
$videoBase = str_replace('/habarijema', '/videos/habarijema/', $baseUrl);

foreach ($videos as &$vid) {
    $vid['video_url'] = $videoBase . $vid['video'];
}

echo json_encode($videos);
?>
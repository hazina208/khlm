<?php
// Use Clever Cloud env vars (set in Render later)
$host = $_ENV['POSTGRESQL_ADDON_HOST'] ?? 'localhost';
$port = $_ENV['POSTGRESQL_ADDON_PORT'] ?? 5432;
$dbname = $_ENV['POSTGRESQL_ADDON_DATABASE'] ?? 'yourdb';
$username = $_ENV['POSTGRESQL_ADDON_USERNAME'] ?? 'user';
$password = $_ENV['POSTGRESQL_ADDON_PASSWORD'] ?? 'pass';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Connection failed: ' . $e->getMessage()]));
}
?>
<?php
$url = getenv("DATABASE_URL");
$parts = parse_url($url);

$dsn = "pgsql:host={$parts['host']};port=5432;dbname=" . ltrim($parts["path"], "/");
$username = $parts['user'];
$password = $parts['pass'];

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
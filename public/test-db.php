<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Db\Database;

try {
    $pdo = Database::getInstance()->getPDO();
    $stmt = $pdo->query('SELECT current_database()');
    echo 'DB OK: ' . $stmt->fetchColumn();
} catch (\Throwable $e) {
    echo 'Erreur DB: ' . $e->getMessage();
}

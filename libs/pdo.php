<?php

try {
    $config = parse_ini_file(__DIR__ . "/../.env.local");
    $pdo = new PDO("pgsql:host={$config['db_host']};port=5433;dbname={$config['db_name']}", $config['db_user'], $config['db_password']);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
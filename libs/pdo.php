<?php

$dsn = 'pgsql:host=127.0.0.1;port=5433;dbname=ecoride';
$username = 'ecoride_php';
$password = 'D-m1m2ppuPEs';

try {
    $pdo = new PDO($dsn, $username, $password);
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

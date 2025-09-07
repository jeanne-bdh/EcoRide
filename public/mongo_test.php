<?php
require_once __DIR__ . "/../vendor/autoload.php";

try {
    $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
    $db = $client->listDatabases();
    echo "<pre>";
    print_r($db);
} catch (\Throwable $e) {
    echo "Erreur : " . $e->getMessage();
}
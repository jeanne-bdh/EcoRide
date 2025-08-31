<?php
require_once __DIR__ . "/../vendor/autoload.php";

use MongoDB\Client;

try {
    $client = new Client("mongodb://127.0.0.1:27017");
    $collection = $client->ecoride->contact;

    $result = $collection->insertOne([
        "title" => "Test",
        "email" => "test@example.com",
        "message" => "Ceci est un test"
    ]);

    echo "Insertion OK, ID : " . $result->getInsertedId();
} catch (\Throwable $e) {
    echo "Erreur Mongo : " . $e->getMessage();
}

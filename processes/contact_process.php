<?php

require_once __DIR__ . "/../vendor/autoload.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $data = json_decode($inputJSON, true);

    if (!$data || !isset($data['titre'], $data['email'], $data['message'])) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Données invalides']);
        exit;
    }

    try {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->ecoride->contact;

        $collection->insertOne([
            'titre' => $data['titre'],
            'email' => $data['email'],
            'date_contact' => new MongoDB\BSON\UTCDateTime(),
            'message' => $data['message']
        ]);

        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée']);
}

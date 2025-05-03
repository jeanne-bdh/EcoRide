<?php

require_once __DIR__ . "/../vendor/autoload.php";

$errorsContact = [];
$successContact = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $data = json_decode($inputJSON, true);

    if (!$data || !isset($data['title'], $data['email'], $data['message'])) {
        http_response_code(400);
        echo json_encode(["Les données sont invalides"]);
    }
    
    try {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->ecoride->contact;

        $result = $collection->insertOne([
            'title' => $data['title'],
            'email' => $data['email'],
            'date_contact' => 'date test',
            'message' => $data['message']
        ]);

        echo json_encode(["Votre message a bien été envoyé"]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["Une erreur inattendue s’est produite sur le serveur"]);
    }
}

/*
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
            'date_contact' => new MongoDB\BSON\UTCDateTime,
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
}*/
<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use MongoDB\Client;

class ContactController extends Controller
{
    public function contact(): void
    {
        $this->render("pages/contact/contact", [
            "successContact" => [],
            "errors" => [],
        ]);
    }

    public function show(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["Méthode non autorisée"]);
            exit;
        }

        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);

        if (!is_array($data) || !isset($data['title'], $data['email'], $data['message'])) {
            http_response_code(400);
            echo json_encode(["Les données sont invalides"]);
            exit;
        }

        try {
            $client = new Client($_ENV['MONGODB_URI']);
            $contactRepository = new ContactRepository($client);

            $contactRepository->insertContact($data['title'], $data['email'], $data['message']);

            echo json_encode(["Votre message a bien été envoyé"]);
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode(["Une erreur inattendue s’est produite sur le serveur"]);
        }
    }
}

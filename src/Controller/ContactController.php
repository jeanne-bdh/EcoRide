<?php

namespace App\Controller;

use App\Exception\ExceptionPath;
use App\Repository\ContactRepository;

class ContactController extends Controller
{
    public function contact(): void
    {
        $this->render("pages/contact/contact", [
            "successContact" => [],
            "errorsContact" => [],
        ]);
    }

    public function show(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["Erreur : méthode non autorisée"]);
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || !isset($data['title'], $data['email'], $data['message'])) {
            http_response_code(400);
            echo json_encode(["Erreur : données invalides"]);
            exit;
        }

        try {
            $repo = new ContactRepository();
            $repo->insert($data['title'], $data['email'], $data['message']);

            header('Content-Type: application/json');
            echo json_encode(["success" => "Votre message a bien été envoyé"]);
        } catch (ExceptionPath $e) {
            http_response_code(500);
            echo json_encode(["Erreur serveur", $e->getMessage()]);
        }
    }
}

<?php

namespace App\Controller;

use App\Exception\ExceptionPath;
use App\Repository\ContactRepository;

class ContactController extends Controller
{
    public function contact(): void
    {
        $contactRepository = new ContactRepository();

        $contact = $contactRepository->findAll();

        $this->render("page/contact/contact", [
            "contact" => $contact,
        ]);
    }

    public function show(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputJSON = file_get_contents('php://input');
            $data = json_decode($inputJSON, true);

            if (!$data || !isset($data['title'], $data['email'], $data['message'])) {
                http_response_code(400);
                echo json_encode(["Les données sont invalides"]);
                exit;
            }

            try {
                $client = new MongoDB\Client(getenv('MONGODB_URI'));
                $collection = $client->ecoride->contact;

                $result = $collection->insertOne([
                    'title' => $data['title'],
                    'email' => $data['email'],
                    'date_contact' => new MongoDB\BSON\UTCDateTime,
                    'message' => $data['message']
                ]);

                echo json_encode(["Votre message a bien été envoyé"]);
            } catch (ExceptionPath $e) {
                http_response_code(500);
                echo json_encode(["Une erreur inattendue s’est produite sur le serveur"]);
            }
        }
    }
}

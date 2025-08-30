<?php

namespace App\Controller;

use App\Repository\ContactRepository;

class ContactController extends Controller
{
    public function contact(): void
    {
        $contactRepository = new ContactRepository();

        $contact = $contactRepository->findAll();
        
        $this->render("page/contact", [
            "contact" => $contact,
        ]);
    }
}
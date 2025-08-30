<?php

namespace App\Repository;

use App\Entity\Contact;

class ContactRepository extends Repository
{
    public function findAll(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM contact");
        $query->execute();

        $contact = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $contactArray = [];
        if ($contact) {
            foreach ($contact as $contactArray) {
                $contactArray[] = Contact::createAndHydrate($contactArray);
            }
        }

        return $contactArray;
    }
}

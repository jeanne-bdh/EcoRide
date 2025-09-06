<?php

namespace App\Repository;

use MongoDB\Client;

class ContactRepository
{
    private $collection;

    public function __construct(Client $client)
    {
        $this->collection = $client->ecoride->contact;
    }

    public function insertContact(string $title, string $email, string $message): void
    {
        $this->collection->insertOne([
            "title" => $title,
            "email" => $email,
            "message" => $message,
            "date_contact" => new \MongoDB\BSON\UTCDateTime()
        ]);
    }
}

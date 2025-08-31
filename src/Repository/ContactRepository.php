<?php

namespace App\Repository;

use MongoDB\Client;

class ContactRepository
{
    private $collection;

    public function __construct()
    {
        $client = new Client(getenv('MONGODB_URI'));
        $this->collection = $client->ecoride->contact;
    }

    public function findAll(): array
    {
        return $this->collection->find()->toArray();
    }

    public function insert(string $title, string $email, string $message): void
    {
        $this->collection->insertOne([
            "title" => $title,
            "email" => $email,
            "message" => $message,
            "date_contact" => new \MongoDB\BSON\UTCDateTime()
        ]);
    }
}

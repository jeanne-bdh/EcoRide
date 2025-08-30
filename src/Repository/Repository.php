<?php

namespace App\Repository;
use App\Db\Database;

class Repository
{
    protected \PDO $pdo;

    public function __construct()
    {
        $pgsql = Database::getInstance();
        $this->pdo = $pgsql->getPDO();
    }
}
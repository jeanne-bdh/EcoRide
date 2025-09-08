<?php

namespace App\Db;

use PDO;
use PDOException;

class Database
{
    private string $dbName;
    private string $dbUser;
    private string $dbPassword;
    private string $dbPort;
    private string $dbHost;
    private static ?PDO $pdo = null;

    private static ?self $instance = null;

    private function __construct()
    {
        $this->dbHost = getenv('DB_HOST');
        $this->dbUser = getenv('DB_USER');
        $this->dbPassword = getenv('DB_PASSWORD');
        $this->dbPort = (int)getenv('DB_PORT');
        $this->dbName = getenv('DB_NAME');
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getPDO(): \PDO
    {
        if (is_null(self::$pdo)) {

            try {
                self::$pdo = new \PDO("pgsql:dbname={$this->dbName};host={$this->dbHost};port={$this->dbPort}", $this->dbUser, $this->dbPassword);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base : ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}

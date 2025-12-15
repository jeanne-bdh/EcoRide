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
        $this->dbHost = $_ENV['DB_HOST'] ?? getenv('DB_HOST');
        $this->dbUser = $_ENV['DB_USER'] ?? getenv('DB_USER');
        $this->dbPassword = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD');
        $this->dbPort = $_ENV['DB_PORT'] ?? getenv('DB_PORT');
        $this->dbName = $_ENV['DB_NAME'] ?? getenv('DB_NAME');

        if (
            !$this->dbHost ||
            !$this->dbUser ||
            !$this->dbPassword ||
            !$this->dbPort ||
            !$this->dbName
        ) {
            throw new \RuntimeException('Variables de connexion à la base de données manquantes');
        }
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

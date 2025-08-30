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
        $config = parse_ini_file(APP_ROOT ."/". APP_ENV);

        $this->dbHost = $config["db_host"];
        $this->dbUser = $config["db_user"];
        $this->dbPassword = $config["db_password"];
        $this->dbPort = $config["db_port"];
        $this->dbName = $config["db_name"];
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
        if (is_null($this->pdo)) {

            try {
                $this->pdo = new \PDO("pgsql:dbname={$this->dbName};host={$this->dbHost};port={$this->dbPort}", $this->dbUser, $this->dbPassword);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base : ' . $e->getMessage());
            }
        }

        return $this->pdo;
    }
}

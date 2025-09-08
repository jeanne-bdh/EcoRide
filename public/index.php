<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Routing\Router;

define('APP_ROOT', dirname(__DIR__));

// SESSION
session_save_path('/home/bouchendhomme/tmp');
session_start();

// Récupération des variables d'environnement Alwaysdata
$dbName = getenv('DB_NAME');
$dbHost = getenv('DB_HOST');
$dbPort = getenv('DB_PORT');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$mongoUri = getenv('MONGODB_URI');
$pepper = getenv('PEPPER');

// Tu peux définir APP_ENV si besoin
define('APP_ENV', getenv('APP_ENV') ?: 'prod');

// Instanciation du router
$router = new Router();
$router->handleRequest($_SERVER["REQUEST_URI"]);

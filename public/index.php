<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use App\Routing\Router;

define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', $_ENV['DB_NAME']);

session_start();

$dotenv = Dotenv::createImmutable(__DIR__ . "/..", APP_ENV);
$dotenv->load();

$router = new Router();
$router->handleRequest($_SERVER["REQUEST_URI"]);
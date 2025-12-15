<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use App\Routing\Router;

define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', ".env.local");

session_start();

$envFile = ($_SERVER['APP_ENV'] ?? 'prod') === 'prod' ? '.env' : '.env.local';
$dotenv = Dotenv::createImmutable(__DIR__ . "/..", $envFile);
$dotenv->load();

$router = new Router();
$router->handleRequest($_SERVER["REQUEST_URI"]);
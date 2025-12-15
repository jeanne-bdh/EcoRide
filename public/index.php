<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Dotenv\Dotenv;
use App\Routing\Router;

define('APP_ROOT', dirname(__DIR__));

session_start();

if (file_exists(APP_ROOT . '/.env.local')) {
    $dotenv = Dotenv::createImmutable(APP_ROOT, '.env.local');
    $dotenv->load();
}

$router = new Router();
$router->handleRequest($_SERVER["REQUEST_URI"]);
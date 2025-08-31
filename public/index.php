<?php

require_once __DIR__ . "/../vendor/autoload.php";

define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', ".env.local");

use App\Routing\Router;

$router = new Router();
$router->handleRequest($_SERVER["REQUEST_URI"]);
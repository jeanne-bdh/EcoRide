<?php

use App\Controller\PageController;

require_once __DIR__ . "/../vendor/autoload.php";

define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', ".env.local");

$pageController = new PageController();
$pageController->home();
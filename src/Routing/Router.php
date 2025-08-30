<?php

namespace App\Routing;

use App\Controller\ErrorController;
use App\Exception\ExceptionPath;

class Router
{
    private $routes;
    public function __construct()
    {
        $this->routes = require_once APP_ROOT."/config/routes.php";
    }

    public function handleRequest(string $uri)
    {
        try {
            $path = $this->normalizePath($uri);
            if (!isset($this->routes[$path])) {
                throw new ExceptionPath("La route n'existe pas");
            }
            $route = $this->routes[$path];
            
            $controllerPath = $route["controller"];
            $action = $route["action"];

            if (!class_exists($controllerPath)) {
                throw new ExceptionPath("La classe n'existe pas");
            }
            $controller = new $controllerPath();
            if (!method_exists($controller, $action)) {
                throw new ExceptionPath("L'action n'existe pas");
            }
            $controller->$action();
        } catch(ExceptionPath $e) {
            $errorController = new ErrorController();
            $errorController->show($e->getMessage());
        }
        
    }

    public static function normalizePath(string $uri):string
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = rtrim($path, "/") . "/";
        return $path;
    }

    public static function isActiveRoute(string $path): bool
    {
        return self::normalizePath($_SERVER["REQUEST_URI"]) === $path;
    }


}
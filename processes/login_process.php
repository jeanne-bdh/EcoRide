<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/auth_controller.php";
require_once __DIR__ . "/../libs/session.php";

$errorsLogin = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(empty($_SESSION['csrf_token']) || empty($_POST['_token']) || $_SESSION['csrf_token'] !== $_POST['_token']) {
        die('Token invalide');
    }

    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    if ($user) {
        $_SESSION['users'] = $user;

        header('Location: ' . getUserSessionLink());
        exit;

    } else {
        $errorsLogin[] = "Identifiants incorrects";
        http_response_code(401);
    }
} else {
    http_response_code(200);
}

$token = bin2hex((random_bytes(32)));
$_SESSION['csrf_token'] = $token;
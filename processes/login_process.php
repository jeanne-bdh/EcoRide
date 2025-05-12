<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/auth_controller.php";
require_once __DIR__ . "/../libs/session.php";

$errorsLogin = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    if ($user) {
        $_SESSION['users'] = $user;
header('location: /pages/users/user_session.php');
        exit();
    } else {
        $errorsLogin[] = "Identifiants incorrects";
    }
}
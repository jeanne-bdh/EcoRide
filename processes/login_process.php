<?php

require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";

$errorsLogin = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    if ($user) {
        $_SESSION['users'] = $user;
        header('location: /pages/users/user_session.php');
    } else {
        $errorsLogin[] = "Identifiants incorrects";
    }
}
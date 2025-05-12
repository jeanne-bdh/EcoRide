<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";
require_once __DIR__ . "/../libs/validation_form.php";
require_once __DIR__ . "/../libs/auth_controller.php";
require_once __DIR__ . "/../libs/session.php";

$errorsRegister = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $uniquePseudo = verifyUniquePseudoRegister($pdo, $_POST["pseudo"]);
    if ($uniquePseudo !== true) {
        $errorsRegister["pseudo"] = $uniquePseudo;
    }

    $uniqueEmail = verifyUniqueEmailRegister($pdo, $_POST["email"]);
    if ($uniqueEmail !== true) {
        $errorsRegister["email"] = $uniqueEmail;
    }

    $verifyPseudo = verifyPseudoRegister($_POST);
    if ($verifyPseudo !== true) {
        $errorsRegister["pseudo"] = $verifyPseudo["pseudo"];
    }

    $verifyEmail = verifyEmailRegister($_POST);
    if ($verifyEmail !== true) {
        $errorsRegister["email"] = $verifyEmail["email"];
    }

    $verifyPassword = verifyPasswordRegister($_POST);
    if ($verifyPassword !== true) {
        $errorsRegister["password"] = $verifyPassword["password"];
    }

    if (empty($errorsRegister)) {
        $resultAdd = addUser($pdo, $_POST["pseudo"], $_POST["email"], $_POST["password"]);

        if ($resultAdd) {
            $_SESSION['register_success'] = "Inscription réussie ! Vous pouvez vous connecter";
            header("Location: login_form.php");
            exit();
        } else {
            $errorsRegister[] = "Une erreur est survenue lors de l'inscription";
        }
    }
}
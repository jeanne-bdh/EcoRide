<?php

namespace App\Controller;

class LoginController extends Controller
{
    public function login(): void
    {
        $this->render("pages/auth/login_form");
    }

    /*
    public function show(): void
    {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (empty($_SESSION['csrf_token']) || empty($_POST['_token']) || $_SESSION['csrf_token'] !== $_POST['_token']) {
                die('Token invalide');
            }

            $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
            if ($user) {
                $_SESSION['users'] = $user;

                header('Location: ' . getUserSessionLink());
                exit;
            } else {
                $errors[] = "Identifiants incorrects";
            }
        }

        $token = bin2hex((random_bytes(32)));
        $_SESSION['csrf_token'] = $token;
    }
        */
}

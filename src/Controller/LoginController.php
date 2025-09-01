<?php

namespace App\Controller;

use App\Repository\UsersRepository;

class LoginController extends Controller
{
    public function login(): void
    {
        $token = bin2hex((random_bytes(32)));
        $_SESSION['csrf_token'] = $token;

        $this->render("pages/auth/login_form", [
            "token" => $token,
            "errors" => []
        ]);
    }

    public function show(): void
    {
        $errors = [];
        $userRepository = new UsersRepository();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (empty($_SESSION['csrf_token']) || empty($_POST['_token']) || $_SESSION['csrf_token'] !== $_POST['_token']) {
                $errors[] = "Token invalide";
            } else {

                $user = $userRepository->verifyUserLoginPassword($_POST['email'], $_POST['password']);
                if ($user) {
                    $_SESSION['users'] = $user;
                } else {
                    $errors[] = "Identifiants incorrects";
                }
            }
        }

        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;

        $this->render("pages/auth/login_form", [
            "token" => $token,
            "errors" => $errors
        ]);
    }

    public function admin(): void
    {
        $this->render("pages/admin/admin_session");
    }

    public function user(): void
    {
        $this->render("pages/users/user_session");
    }

    public function employee(): void
    {
        $this->render("pages/employees/employee_session");
    }
}

<?php

namespace App\Controller;

use App\Repository\UsersRepository;

class RegisterController extends Controller
{
    public function register(): void
    {
        $this->render("pages/auth/register_form");
    }

    public function form(): void
    {
        $errors = [];
        $userRepository = new UsersRepository();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $uniquePseudo = $userRepository->verifyUniquePseudoRegister($_POST["pseudo"]);
            if ($uniquePseudo !== true) {
                $errors["pseudo"] = $uniquePseudo;
            }

            $uniqueEmail = $userRepository->verifyUniqueEmailRegister($_POST["email"]);
            if ($uniqueEmail !== true) {
                $errors["email"] = $uniqueEmail;
            }

            $verifyPseudo = $userRepository->verifyPseudoRegister($_POST);
            if ($verifyPseudo !== true) {
                $errors["pseudo"] = $verifyPseudo["pseudo"];
            }

            $verifyEmail = $userRepository->verifyEmailRegister($_POST);
            if ($verifyEmail !== true) {
                $errors["email"] = $verifyEmail["email"];
            }

            $verifyPassword = $userRepository->verifyPasswordRegister($_POST);
            if ($verifyPassword !== true) {
                $errors["password"] = $verifyPassword["password"];
            }

            if (empty($errors)) {
                $resultAdd = $userRepository->addUser($_POST["pseudo"], $_POST["email"], $_POST["password"]);

                if ($resultAdd) {
                    $_SESSION['register_success'] = "Inscription réussie ! Vous pouvez vous connecter";
                    $this->render("pages/auth/login_form");
                    return;
                } else {
                    $errors[] = "Une erreur est survenue lors de l'inscription";
                }
            }
        }
        $this->render("pages/auth/register_form", [
            "errors" => $errors,
        ]);
    }
}

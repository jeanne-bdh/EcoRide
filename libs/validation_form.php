<?php

function verifyPseudoRegister($user): bool|array
{
    $errorsRegister = [];

    if (isset($user["pseudo"])) {
        if ($user["pseudo"] === "") {
            $errorsRegister["pseudo"] = "Le champ email est requis";
        } else {
            if (strlen(trim($user["pseudo"]))  < 1) {
                $errorsRegister["pseudo"] = "Le pseudo doit avoir au moins 2 caractères";
            }
        }
    } else {
        $errorsRegister["email"] = "Le champ email n'a pas été envoyé";
    }

    if (count($errorsRegister)) {
        return $errorsRegister;
    } else {
        return true;
    }
}

function verifyEmailRegister($user): bool|array
{
    $errorsRegister = [];

    if (isset($user["email"])) {
        if ($user["email"] === "") {
            $errorsRegister["email"] = "Le champ email est requis";
        } else {
            if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
                $errorsRegister["email"] = "L'email n'est pas valide";
            }
        }
    } else {
        $errorsRegister["email"] = "Le champ email n'a pas été envoyé";
    }

    if (count($errorsRegister)) {
        return $errorsRegister;
    } else {
        return true;
    }
}

function verifyPasswordRegister($user): bool|array
{
    $errorsRegister = [];

    if (isset($user["password"])) {
        if (strlen(trim($user["password"])) < 8) {
            $errorsRegister["password"] = "Le mot de passe doit avoir au moins 8 caractères";
        }
        if (!preg_match('/[A-Z]/', $user["password"])) {
            $errorsRegister["password"] = "Le mot de passe doit contenir au moins une majuscule";
        }
        if (!preg_match('/[a-z]/', $user["password"])) {
            $errorsRegister["password"] = "Le mot de passe doit contenir au moins une minuscule";
        }
        if (!preg_match('/\d/', $user["password"])) {
            $errorsRegister["password"] = "Le mot de passe doit contenir au moins un chiffre";
        }
        if (!preg_match('/[\W_]/', $user["password"])) {
            $errorsRegister["password"] = "Le mot de passe doit contenir au moins un caractère spécial";
        }
    } else {
        $errorsRegister["password"] = "Le champ password n'a pas été envoyé";
    }

    if (count($errorsRegister)) {
        return $errorsRegister;
    } else {
        return true;
    }
}

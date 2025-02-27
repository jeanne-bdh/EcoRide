<?php

function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array
{
    $query = "SELECT id_users, pseudo, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

function verifyUniqueEmailRegister(PDO $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return "Cette adresse email est déjà utilisée";
    }

    return true;
}

function verifyUniquePseudoRegister(PDO $pdo, string $pseudo)
{
    $query = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return "Ce pseudo est déjà utilisé";
    }

    return true;
}

function addUser(PDO $pdo, string $pseudo, string $email, string $password): bool
{
    $query = "SELECT id_status_session FROM status_session WHERE label_status_session = 'Actif'";
    $stmt = $pdo->query($query);
    $statusId = $stmt->fetchColumn();

    if (!$statusId) {
        return false;
    }

    $insertQuery = "INSERT INTO users (pseudo, email, password, id_status_session, credit) VALUES (:pseudo, :email, :password, :statusId, 20)";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $hashedPassword);
    $stmt->bindValue(':statusId', $statusId, PDO::PARAM_INT);

    return $stmt->execute();
}

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

function getUserCredit(PDO $pdo, $userId)
{
    $query = "SELECT credit FROM users WHERE id_users = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return $user['credit'];
    } else {
        return 0;
    }
}
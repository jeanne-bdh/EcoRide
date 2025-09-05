<?php

namespace App\Repository;

use App\Entity\StatusSession;
use App\Entity\Users;
use PDO;

class UsersRepository extends Repository
{
    public function verifyPseudoRegister($user): bool|array
    {
        $errors = [];

        if (isset($user["pseudo"])) {
            if ($user["pseudo"] === "") {
                $errors["pseudo"] = "Le champ pseudo est requis";
            } else {
                if (strlen(trim($user["pseudo"]))  < 1) {
                    $errors["pseudo"] = "Le pseudo doit avoir au moins 2 caractères";
                }
            }
        } else {
            $errors["pseudo"] = "Le champ pseudo n'a pas été envoyé";
        }

        if (count($errors)) {
            return $errors;
        } else {
            return true;
        }
    }

    public function verifyEmailRegister($user): bool|array
    {
        $errors = [];

        if (isset($user["email"])) {
            if ($user["email"] === "") {
                $errors["email"] = "Le champ email est requis";
            } else {
                if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
                    $errors["email"] = "L'email n'est pas valide";
                }
            }
        } else {
            $errors["email"] = "Le champ email n'a pas été envoyé";
        }

        if (count($errors)) {
            return $errors;
        } else {
            return true;
        }
    }

    public function verifyPasswordRegister($user): bool|array
    {
        $errors = [];

        if (isset($user["password"])) {
            if (strlen(trim($user["password"])) < 8) {
                $errors["password"] = "Le mot de passe doit avoir au moins 8 caractères";
            }
            if (!preg_match('/[A-Z]/', $user["password"])) {
                $errors["password"] = "Le mot de passe doit contenir au moins une majuscule";
            }
            if (!preg_match('/[a-z]/', $user["password"])) {
                $errors["password"] = "Le mot de passe doit contenir au moins une minuscule";
            }
            if (!preg_match('/\d/', $user["password"])) {
                $errors["password"] = "Le mot de passe doit contenir au moins un chiffre";
            }
            if (!preg_match('/[\W_]/', $user["password"])) {
                $errors["password"] = "Le mot de passe doit contenir au moins un caractère spécial";
            }
        } else {
            $errors["password"] = "Le champ password n'a pas été envoyé";
        }

        if (count($errors)) {
            return $errors;
        } else {
            return true;
        }
    }

    public function verifyUniqueEmailRegister(string $email)
    {
        $query = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "Cette adresse email est déjà utilisée";
        }

        return true;
    }

    public function verifyUniquePseudoRegister(string $pseudo)
    {
        $query = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "Ce pseudo est déjà utilisé";
        }

        return true;
    }

    public function addUser(string $pseudo, string $email, string $password): bool|array
    {
        $query = "SELECT id_status_session FROM status_session WHERE label_status_session = 'Actif'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $statusId = $stmt->fetchColumn();

        if (!$statusId) {
            return false;
        }

        $query = "SELECT id_role FROM roles WHERE label_role = 'user'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $roleId = $stmt->fetchColumn();

        if (!$roleId) {
            return false;
        }

        $insertQuery = "INSERT INTO users (pseudo, email, password, id_status_session, id_role, credit)
                    VALUES (:pseudo, :email, :password, :statusId, :roleId, 20)";

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare($insertQuery);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $hashedPassword);
        $stmt->bindValue(':statusId', $statusId, PDO::PARAM_INT);
        $stmt->bindValue(':roleId', $roleId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function verifyUserLoginPassword(string $email, string $password): bool|array
    {
        $query = "SELECT * FROM users WHERE email = :email AND id_status_session = 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function getUserForAdmin(): bool|array
    {
        $query = "SELECT u.id_users, u.pseudo, u.email, u.lastname, u.firstName, s.label_status_session
            FROM users u
            JOIN status_session s ON s.id_status_session = u.id_status_session
            WHERE u.id_role = 2
            ORDER BY id_users ASC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($lists as $list) {
            $statusSession = (new StatusSession())
                    ->setLabelStatusSession($list['label_status_session']);

                $user = (new Users())
                    ->setIdUsers($list['id_users'])
                    ->setPseudo($list['pseudo'])
                    ->setEmail($list['email'])
                    ->setLastname($list['lastname'])
                    ->setFirstname($list['firstname'])
                    ->setStatusSession($statusSession);

            $users[] = $user;
        }
        return $users;
    }

    public function getStatusSession(int $userId): int
    {
        $query = "SELECT id_status_session FROM users WHERE id_users = :id_users";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function userSuspension(int $userId): bool
    {
        $query = "UPDATE users SET id_status_session = 2 WHERE id_users = :id_users";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function userRestart(int $userId): bool
    {
        $query = "UPDATE users SET id_status_session = 1 WHERE id_users = :id_users";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getProfile(int $userId): array
    {
        $query = $this->pdo->prepare("SELECT id_role, id_profil FROM users WHERE id_users = :id_users");
        $query->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserCredit($userId): int
    {
        $query = "SELECT credit FROM users WHERE id_users = :id_users";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_users', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user['credit'];
        } else {
            return 0;
        }
    }
}

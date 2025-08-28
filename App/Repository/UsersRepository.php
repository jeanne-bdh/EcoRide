<?php

namespace App\Repository;

use App\Entity\Users;
use App\Entity\Roles;
use App\Entity\Profiles;
use App\Entity\StatusSession;
use PDO;

class UsersRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById(int $idUsers): ?Users
    {
        $query = "SELECT u.*, r.*, p.*, s.*
                FROM users u
                JOIN roles r ON u.id_role = r.id_role
                LEFT JOIN profiles p ON u.id_profil = p.id_profil
                JOIN status_session s ON u.id_status = s.id_status
                WHERE u.id_users = :id_users";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_users', $idUsers, PDO::PARAM_INT);
        $stmt->execute();

        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$users) {
            return null;
        }

        $role = (new Roles())
            ->setIdRole($users['id_role'])
            ->setLabelRole($users['label_role']);

        $profile = null;
        if ($users['id_profile']) {
            $profile = (new Profiles())
                ->setIdProfile($users['id_profile'])
                ->setLabelProfile($users['label_profile']);
        }

        $statusSession = (new StatusSession())
            ->setIdStatusSession($users['id_status'])
            ->setLabelStatusSession($users['label_status']);

        return (new Users())
            ->setIdUsers($users['id_users'])
            ->setPseudo($users['pseudo'])
            ->setEmail($users['email'])
            ->setPassword($users['password'])
            ->setPhoto($users['photo'])
            ->setTelephone($users['telephone'])
            ->setAddress($users['address'])
            ->setLastname($users['lastname'])
            ->setFirstname($users['firstname'])
            ->setCredit($users['credit'])
            ->setRole($role)
            ->setProfile($profile)
            ->setStatusSession($statusSession);
    }
}

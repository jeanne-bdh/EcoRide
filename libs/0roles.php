<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/user.php";

class User
{
    private string $id;
    private array $roles = [];

    public function getId(): string
    {
        return $this->id;
    }

    public function addRole(string $role): void
    {
        $this->roles[] = $role;
    }
}

$query = "SELECT id_users, pseudo, email, password FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetchObject('User');

if ($user && password_verify($password, $user['password'])) {
    $query = "SELECT * FROM roles WHERE id_role = :id_role";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_role', $user->getId());

    if ($stmt->execute()) {
        while ($role = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user->addRole($role['label_role']);
        }
    }
    
    return $user;
} else {
    return false;
}
<?php

function saveSelectProfil(PDO $pdo, int $usersId, int $profilType): bool
{
    $query = $pdo->prepare("UPDATE users SET id_profil = :id_profil WHERE id_users = :id_users");
    $query->bindValue(':id_profil', $profilType, PDO::PARAM_INT);
    $query->bindValue(':id_users', $usersId, PDO::PARAM_INT);

    return $query->execute();
}


function saveProfilForm(PDO $pdo, string $lastname, string $firstname, string $address, string $telephone, int $usersId): int|bool
{
    $stmt = $pdo->prepare("UPDATE users SET lastname = :lastname, firstname = :firstname, address = :address, telephone = :telephone WHERE id_users = :id_users");
    $stmt->bindValue(':id_users', $usersId, PDO::PARAM_INT);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);

    return $stmt->execute();
}

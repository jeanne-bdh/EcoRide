<?php

function saveProfilForm(PDO $pdo, string $lastname, string $firstname, string $address, string $telephone, int $id = null): int|bool
{
    if ($id) {
        //UPDATE
    } else {
        $query = $pdo->prepare(
            "INSERT INTO users (lastname, firstname, address, telephone) VALUES (:lastname, :firstname, :address, :telephone)"
        );
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);

    $res = $stmt->execute();
    if ($res) {
        if ($id) {
            return $id;
        } else {
            return $pdo->lastInsertId();
        }
    } else {
        return false;
    }
}

<?php
require_once dirname(__DIR__) . "/libs/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_carpool'])) {
    $idCarpool = intval($_POST['id_carpool']);

    $stmt = $pdo->prepare("UPDATE carpools SET id_status_carpool = 4 WHERE id_carpool = :id_carpool");
    $stmt->bindValue(':id_carpool', $idCarpool, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        http_response_code(200);
        echo "Arrivés à destination";
    } else {
        http_response_code(500);
        echo "Erreur serveur";
    }
}
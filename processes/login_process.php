<?php
require_once __DIR__ . "/../libs/pdo.php";
require_once __DIR__ . "/../libs/auth_controller.php";
require_once __DIR__ . "/../libs/session.php";

$errorsLogin = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    if ($user) {
        $_SESSION['users'] = $user;

        if ($user['id_role'] == 1) {
            header('Location: /pages/admin/admin_session.php');
        } elseif ($user['id_role'] == 3) {
            header('Location: /pages/employees/employee_session.php');
        } else {
            header('Location: /pages/users/user_session.php');
        }
        exit();
    } else {
        $errorsLogin[] = "Identifiants incorrects";
        http_response_code(401);
    }
} else {
    http_response_code(200);
}

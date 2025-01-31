<?php

require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/user.php";

$errors = [];

if (isset($_POST['loginUser'])) {
    $user = verifyUserLoginPassword($pdo, $_POST['id'], $_POST['password']);

    if ($user) {
        //on va se connecter => session
    } else {
        //Afficher une erreur
        $errors[] = "Email ou mot de passe incorrect";
    }
}

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/templates/hero-section.php";
    heroSection("Espace de connexion");

    foreach ($errors as $error) {
        $error;
    }
    ?>

    <!-- FORMULAIRE -->
    <div class="container-form" id="container-form-login">
        <form action="" method="POST">
            <div class="inputForm">
                <label for="inputIdLogin">Pseudo ou Email :</label>
                <input type="text" name="id" id="inputIdLogin" required>
            </div>
            <div class="inputForm">
                <label for="inputPwdLogin">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdLogin" required>
            </div>
            <button type="submit" class="btn-search" name="loginUser" id="btn-valid-login">Se connecter</button>
        </form>
        <div class="link-account">
            <p>Vous n’avez pas de compte ?</p>
            <a href="/register">Inscrivez-vous ici !</a>
        </div>
    </div>
    </div>

</section>
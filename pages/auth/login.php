<?php

require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../templates/header.php";

$errors = [];

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Espace de connexion");

    foreach ($errors as $error) { ?>
        <div class="alert">
            <?= $error; ?>
        </div>
    <?php } ?>

    <!-- FORMULAIRE -->
    <div class="container-form" id="container-form-login">
        <form action="/pages/auth/loginPost.php" method="POST">
            <div class="inputForm">
                <label for="inputPseudoEmailLogin">Pseudo ou Email :</label>
                <input type="text" name="pseudoEmail" id="inputPseudoEmailLogin" required>
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

<?php
require_once __DIR__ . "/../templates/footer.php";

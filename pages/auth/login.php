<?php

require_once __DIR__ . "/../../templates/header.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../libs/user.php";

$errorLogin = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST['pseudoEmail'], $_POST['password']);
    if ($user) {
        $_SESSION['users'] = $user;
        header('location: /pages/users/userSession.php');
    } else {
        $errorLogin[] = "Identifiants incorrects";
    }
}

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero-section.php";
    heroSection("Espace de connexion");

    foreach ($errorLogin as $error) { ?>
        <div class="alert">
            <?= $error; ?>
        </div>
    <?php } ?>

    <!-- FORMULAIRE -->
    <div class="container-form" id="container-form-login">
        <form action="" method="POST">
            <div class="inputForm">
                <label for="inputPseudoEmailLogin">Pseudo ou Email :</label>
                <input type="text" name="pseudoEmail" id="inputPseudoEmailLogin" required>
            </div>
            <div class="inputForm">
                <label for="inputPwdLogin">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdLogin" required>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-search" name="loginUser" id="btn-valid-login">Se connecter</button>
            </div>
            <?php if ($errorLogin): ?>
                <div class="alert">
                    <?= $errorLogin ?>
                </div>
            <?php endif; ?>
            <div class="link-account">
                <p>Vous n’avez pas de compte ?</p>
                <a href="/pages/auth/register.php">Inscrivez-vous ici !</a>
            </div>
        </form>
    </div>
    </div>

</section>

<?php
require_once __DIR__ . "/../../templates/footer.php";

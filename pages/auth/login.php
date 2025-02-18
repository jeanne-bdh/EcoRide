<?php

require_once __DIR__ . "/../../templates/header.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../libs/user.php";

$errorsLogin = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    if ($user) {
        $_SESSION['users'] = $user;
        header('location: /pages/users/user_session.php');
    } else {
        $errorsLogin[] = "Identifiants incorrects";
    }
}

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Espace de connexion");

    foreach ($errorsLogin as $error) { ?>
        <div class="alert">
            <?= $error; ?>
        </div>
    <?php } ?>

    <!-- FORMULAIRE -->
    <section class="container-form" id="container-form-login">
        <form class="form-login" action="" method="POST">
            <div class="inputForm">
                <label for="inputEmailLogin">Email :</label>
                <input type="email" name="email" id="inputEmailLogin" required>
                <div class="valid-feedback">
                    L'email est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez entrer une adresse e-mail valide
                </div>
            </div>
            <div class="inputForm">
                <label for="inputPwdLogin">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdLogin" required>
                <div class="valid-feedback">
                    Le mot de passe est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez saisir un mot de passe contenant au moins 8 caractères, une majuscule, une
                    minuscule, un chiffre et un caractère spécial
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-search" name="loginUser" id="btn-valid-login">Se connecter</button>
            </div>
            <div class="link-account">
                <p>Vous n’avez pas de compte ?</p>
                <a href="/pages/auth/register.php">Inscrivez-vous ici !</a>
            </div>
        </form>
    </section>

</main>

<?php
require_once __DIR__ . "/../../templates/footer.php";

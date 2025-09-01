<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Espace de connexion");
    ?>

    <!-- FORMULAIRE -->
    <?php $errors = $errors ?? []; ?>

    <section class="container-form" id="container-form-login">
        <form class="form-login" action="/login/show" method="POST">

            <?php foreach ($errors as $errorMessage) { ?>
                <div class="alert-container">
                    <?= $errorMessage; ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['register_success'])) { ?>
                <div class="success">
                    <p><?= $_SESSION['register_success']; ?></p>
                </div>
            <?php unset($_SESSION['register_success']);
            } ?>

            <div class="inputForm">
                <label for="inputEmailLogin">Email :</label>
                <input type="email" name="email" id="inputEmailLogin" required autocomplete="email">
                <input type="hidden" name="_token" value="<?= $token ?>">
                <div class="valid-feedback">
                    L'email est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez entrer une adresse e-mail valide
                </div>
            </div>
            <div class="inputForm">
                <label for="inputPwdLogin">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdLogin" required autocomplete="off">
                <div class="valid-feedback">
                    Le mot de passe est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez saisir un mot de passe contenant au moins 8 caractères, une majuscule, une
                    minuscule, un chiffre et un caractère spécial
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-blue btn-green" name="loginUser" id="btn-valid-login">Se connecter</button>
            </div>
            <div class="link-account">
                <p>Vous n’avez pas de compte ?</p>
                <a href="/register">Inscrivez-vous ici !</a>
            </div>
        </form>
    </section>

</main>

<?php
require_once APP_ROOT . "/templates/partials/footer.php";

<?php

require_once dirname(__DIR__, 2) . "/processes/login_process.php";
require_once dirname(__DIR__, 2) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 2) . "/templates/hero_section.php";
    heroSection("Espace de connexion");
    ?>

    <!-- FORMULAIRE -->

    <section class="container-form" id="container-form-login">
        <form class="form-login" action="" method="POST">

            <?php foreach ($errorsLogin as $error) { ?>
                <div class="alert-container">
                    <?= $error; ?>
                </div>
            <?php } ?>

            <?php if (isset($_SESSION['register_success'])) { ?>
                <div class="success">
                    <p><?= $_SESSION['register_success'] ;?></p>
                </div>
                <?php unset($_SESSION['register_success']);
            } ?>

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
                <button type="submit" class="btn-blue btn-blue btn-green" name="loginUser" id="btn-valid-login">Se connecter</button>
            </div>
            <div class="link-account">
                <p>Vous n’avez pas de compte ?</p>
                <a href="/pages/auth/register_form.php">Inscrivez-vous ici !</a>
            </div>
        </form>
    </section>

</main>

<?php
require_once dirname(__DIR__, 2) . "/templates/footer.php";

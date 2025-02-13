<?php

require_once __DIR__ . "/../../templates/header.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../libs/user.php";

$errors = [];

?>

<section class="container-black" id="container-black-register">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero-section.php";
    heroSection("Créer un compte");
    ?>

    <!-- FORMULAIRE -->
    <div class="container-form" id="container-form-register">
        <form action="/pages/auth/registerPost.php" method="POST">
            <div class="inputForm">
                <label for="inputPseudoRegister">Pseudo :</label>
                <input type="text" name="pseudo" id="inputPseudoRegister" required>
            </div>
            <div class="inputForm">
                <label for="inputEmailRegister">Email :</label>
                <input type="email" name="email" id="inputEmailRegister" required>
            </div>
            <div class="inputForm">
                <label for="inputEmailRegister">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdRegister" required>
            </div>
            <div class="inputForm">
                <label for="inputValidPwdReg">Confirmez le mot de passe :</label>
                <input type="password" name="pwdConfirm" id="inputValidPwdReg" required>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-search" id="btn-valid-register">S'inscrire</button>
            </div>
            <div class="link-account">
            <p>Vous avez déjà un compte ?</p>
            <a href="/pages/auth/login.php">Connectez-vous ici !</a>
        </div>
        </form>
    </div>
    </div>

</section>

<?php
require_once __DIR__ . "/../../templates/footer.php";

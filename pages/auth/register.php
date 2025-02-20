<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/libs/pdo.php";
require_once dirname(__DIR__, 2) . "/libs/user.php";

$errorsRegister = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $verif = verifyUser($_POST);
    if ($verif === true) {
        $resultAdd = addUser($pdo, $_POST["pseudo"], $_POST["email"], $_POST["password"]);
        header("Location: login.php");
    } else {
        $errorsRegister = $verif;
    }
}

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 2) . "/templates/hero_section.php";
    heroSection("Créer un compte");
    ?>

    <!-- FORMULAIRE -->
    <section class="container-form" id="container-form-register">
        <form action="" method="POST">
            <div class="inputForm">
                <label for="inputPseudoRegister">Pseudo :</label>
                <input type="text" name="pseudo" id="inputPseudoRegister" required>
                <div class="valid-feedback">
                    Le pseudo est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez entrer un pseudo ayant au moins 2 caractères
                </div>
                <?php if (isset($errors["pseudo"])) { ?>
                    <div class="alert">
                        <?= $errors["pseudo"] ?>
                    </div>
                <?php } ?>
            </div>
            <div class="inputForm">
                <label for="inputEmailRegister">Email :</label>
                <input type="email" name="email" id="inputEmailRegister" required>
                <div class="valid-feedback">
                    L'email est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez entrer une adresse e-mail valide
                </div>
                <?php if (isset($errors["email"])) { ?>
                    <div class="alert">
                        <?= $errors["email"] ?>
                    </div>
                <?php } ?>
            </div>
            <div class="inputForm">
                <label for="inputEmailRegister">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdRegister" required>
                <div class="valid-feedback">
                    Le mot de passe est valide
                </div>
                <div class="invalid-feedback">
                    Veuillez saisir un mot de passe contenant au moins 8 caractères, une majuscule, une
                    minuscule, un chiffre et un caractère spécial
                </div>
                <?php if (isset($errors["password"])) { ?>
                    <div class="alert">
                        <?= $errors["password"] ?>
                    </div>
                <?php } ?>
            </div>
            <div class="inputForm">
                <label for="inputValidPwdReg">Confirmez le mot de passe :</label>
                <input type="password" name="pwdConfirm" id="inputValidPwdReg" required>
                <div class="invalid-feedback">
                    La confirmation du mot de passe est incorrecte
                </div>
                <div class="valid-feedback">
                    Le mot de passe est validé
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-search" id="btn-valid-register" name="add-user">S'inscrire</button>
            </div>
            <div class="link-account">
                <p>Vous avez déjà un compte ?</p>
                <a href="/pages/auth/login.php">Connectez-vous ici !</a>
            </div>
        </form>
    </section>

</main>

<?php
require_once dirname(__DIR__, 2) . "/templates/footer.php";

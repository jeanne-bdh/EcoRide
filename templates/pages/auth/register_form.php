<?php

//require_once dirname(__DIR__, 2) . "/processes/register_process.php";
require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Créer un compte");
    ?>

    <!-- FORMULAIRE -->
    <section class="container-form" id="container-form-register">
        <form action="" method="POST">

            <?php if (!empty($errors)) { ?>
                <div class="alert-container">
                    <?php foreach ($errors as $errorMessage) { ?>
                        <div class="alert">
                            <?= $errorMessage ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="inputForm">
                <label for="inputPseudoRegister">Pseudo :</label>
                <input type="text" name="pseudo" id="inputPseudoRegister" required autocomplete="off">
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
                <input type="email" name="email" id="inputEmailRegister" required autocomplete="off">
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
                <label for="inputPwdRegister">Mot de passe :</label>
                <input type="password" name="password" id="inputPwdRegister" required autocomplete="off">
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
                <input type="password" name="pwdConfirm" id="inputValidPwdReg" required autocomplete="off">
                <div class="invalid-feedback">
                    La confirmation du mot de passe est incorrecte
                </div>
                <div class="valid-feedback">
                    Le mot de passe est validé
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-blue btn-green" id="btn-valid-register" name="add-user">S'inscrire</button>
            </div>
            <div class="link-account">
                <p>Vous avez déjà un compte ?</p>
                <a href="/login">Connectez-vous ici !</a>
            </div>
        </form>
    </section>

</main>

<?php
require_once APP_ROOT . "/templates/partials/footer.php";

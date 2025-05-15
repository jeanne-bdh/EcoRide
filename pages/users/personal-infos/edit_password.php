<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";
require_once dirname(__DIR__, 3) . "/libs/pdo.php";
require_once dirname(__DIR__, 3) . "/libs/personal.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Changer de mot de passe");
    ?>

    <!-- FORMULAIRE -->
    <section class="container-form" id="container-form-register">
        <form action="" method="POST">

            <?php if (!empty($errorsRegister)) { ?>
                <div class="alert-container">
                    <?php foreach ($errorsRegister as $error) { ?>
                        <div class="alert">
                            <?= $error ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

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
                <?php if (isset($errorsRegister["password"])) { ?>
                    <div class="alert">
                        <?= $errorsRegister["password"] ?>
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
                <button type="submit" class="btn-blue btn-blue btn-green" id="btn-valid-register" name="add-user">Changer mon mot de passe</button>
            </div>
            <div class="link-account">
                <a href="/pages/users/personal-infos/personal_infos.php">Modifier mon profil</a>
            </div>
        </form>
    </section>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>
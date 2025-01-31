<section class="container-black" id="container-black-register">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/templates/hero-section.php";
    heroSection("Créer un compte");
    ?>

        <!-- FORMULAIRE -->
        <div class="container-form" id="container-form-register">
            <form action="registerPost.php" method="POST">
                <div class="inputForm">
                    <label for="inputPseudoRegister">Pseudo :</label>
                    <input type="text" name="pseudo" id="inputPseudoRegister" required>
                    <div class="invalid-feedback">
                        Veuillez entrer un pseudo ayant entre 3 à 50 caractères
                    </div>
                </div>
                <div class="inputForm">
                    <label for="inputEmailRegister">Email :</label>
                    <input type="email" name="email" id="inputEmailRegister" required>
                    <div class="invalid-feedback">
                        Veuillez entrer une adresse e-mail valide
                    </div>
                </div>
                <div class="inputForm">
                    <label for="inputNomRegister">Nom :</label>
                    <input type="text" name="nom" id="inputNomRegister">
                    <div class="invalid-feedback">
                        Le nom est invalide
                    </div>
                </div>
                <div class="inputForm">
                    <label for="inputPrenomRegister">Prénom :</label>
                    <input type="text" name="prenom" id="inputPrenomRegister">
                    <div class="invalid-feedback">
                        Le prénom est invalide
                    </div>
                </div>
                <div class="inputForm">
                    <label for="inputEmailRegister">Mot de passe :</label>
                    <input type="password" name="password" id="inputPwdRegister" required>
                    <div class="invalid-feedback">
                        Le mot de passe doit contenir au moins 8 caractères comprenant une lettre majuscule, une
                        minuscule, un chiffre et un caractère
                        spécial
                    </div>
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
                <button type="submit" class="btn-search" id="btn-valid-register">S'inscrire</button>
            </form>
            <div class="link-account">
                <p>Vous avez déjà un compte ?</p>
                <a href="/login">Connectez-vous ici !</a>
            </div>
        </div>
    </div>

</section>
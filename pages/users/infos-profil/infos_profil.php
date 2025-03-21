<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";
require_once dirname(__DIR__, 3) . "/libs/pdo.php";
require_once dirname(__DIR__, 3) . "/libs/profil.php";

if (isset($_POST['saveProfilForm'])) {
    saveProfilForm($pdo, $_POST['lastname'], $_POST['firstname'], $_POST['address'], $_POST['telephone'], (int)$_SESSION['users']['id_users']);
} else {
    //erreur
}

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Modifications du profil");
    ?>

    <section class="container-profil">

        <select class="form-select" aria-label="Sélectionner des filtres" required>
            <option selected disabled>Êtes-vous passager ou chauffeur ?</option>
            <option value="1">Passager</option>
            <option value="2">Chauffeur</option>
            <option value="3">Passager chauffeur</option>
        </select>

        <section class="container-form" id="container-form-profil">

            <form action="">
                <div class="container-form-inner">
                    <div class="profil-infos-container">
                        <div class="inputForm">
                            <label for="">Nom</label>
                            <input type="text">
                        </div>
                        <div class="inputForm">
                            <label for="">Prénom</label>
                            <input type="text">
                        </div>
                        <div class="inputForm">
                            <label for="">Adresse</label>
                            <input type="text">
                        </div>
                        <div class="inputForm">
                            <label for="">Téléphone</label>
                            <input type="text">
                        </div>
                        <div class="photo-upload">
                            <input type="file" class="inputForm">
                            <div id="preview-container">
                                <img id="photo-preview" src="/uploads/carpools/smiley-woman.jpg" alt="Choisir une photo">
                            </div>
                        </div>
                        <div class="inputForm" id="password-input">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17l0 80c0 13.3 10.7 24 24 24l80 0c13.3 0 24-10.7 24-24l0-40 40 0c13.3 0 24-10.7 24-24l0-40 40 0c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
                            </svg>
                            <a class="password-change" href="/pages/users/infos-profil/edit_password.php">Changer votre mot de passe</a>
                        </div>

                    </div>
                    <div class="car-infos-container">
                        <div class="inputForm">
                            <label for="">Marque</label>
                            <input type="text">
                        </div>
                        <div class="inputForm">
                            <label for="">Modèle</label>
                            <input type="text">
                        </div>
                        <div class="inputForm">
                            <label for="">Immatriculation</label>
                            <input type="text">
                        </div>
                        <div class="inputForm">
                            <label for="">Date de la 1ère immatriculation</label>
                            <input type="date">
                        </div>
                        <div class="inputForm">
                            <label for="">Nombre de places</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="inputForm">
                        <label for="">Préférences</label>
                        <textarea type="text" name="" id=""></textarea>
                    </div>
                </div>
                <div class="inputBtn">
                    <button type="submit" class="btn-blue" id="btn-profil">Enregistrer</button>
                </div>
            </form>

        </section>

    </section>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>
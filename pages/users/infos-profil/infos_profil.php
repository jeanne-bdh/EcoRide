<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";
require_once dirname(__DIR__, 3) . "/libs/pdo.php";
require_once dirname(__DIR__, 3) . "/libs/profil.php";

$errorForm = [];
$messageForm = [];

if (isset($_POST['saveProfilForm'])) {
    $res = saveProfilForm($pdo, $_POST['lastname'], $_POST['firstname'], $_POST['address'], $_POST['telephone'], (int)$_SESSION['users']['id_users']);
    if ($res) {
        $messageForm[] = "Votre profil a été mis à jour avec succès";
    } else {
        $errorForm[] = "Erreur lors de l'enregistrement du profil";
    }
}

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Modifications du profil");
    ?>

    <section class="container-form" id="container-form-profil">

        <form method="POST" id="form-profil">

            <select class="form-select" name="profilType" aria-label="Sélectionner des filtres" required>
                <option selected disabled>Êtes-vous passager ou chauffeur ?</option>
                <option value="1">Passager</option>
                <option value="2">Chauffeur</option>
                <option value="3">Passager chauffeur</option>
            </select>

            <div class="container-form-inner">
                <div class="profil-infos-container">
                    <div class="inputForm">
                        <label for="lastname">Nom</label>
                        <input type="text" id="lastname" name="lastname" autocomplete="family-name">
                    </div>
                    <div class="inputForm">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" autocomplete="given-name">
                    </div>
                    <div class="inputForm">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" autocomplete="address-line1">
                    </div>
                    <div class="inputForm">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" autocomplete="tel">
                    </div>
                    <div class="photo-upload">
                        <input type="file" class="inputForm" id="photo" name="photo">
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
                        <label for="brand">Marque</label>
                        <input type="text" id="brand" name="brand">
                    </div>
                    <div class="inputForm">
                        <label for="model">Modèle</label>
                        <input type="text" id="model" name="model">
                    </div>
                    <div class="inputForm">
                        <label for="plate">Immatriculation</label>
                        <input type="text" id="plate" name="plate" autocomplete="off">
                    </div>
                    <div class="inputForm">
                        <label for="dateRegister">Date de la 1ère immatriculation</label>
                        <input type="date" id="dateRegister" name="dateRegister">
                    </div>
                    <div class="inputForm">
                        <label for="seat">Nombre de places</label>
                        <input type="text" id="seat" name="seat">
                    </div>
                </div>
                <div class="inputForm" id="preferences-container">
                    <label for="preferences">Préférences</label>
                    <textarea type="text" name="preferences" id="preferences"></textarea>
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" name="saveProfilForm" class="btn-blue" id="btn-profil">Enregistrer</button>
            </div>
        </form>

    </section>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>
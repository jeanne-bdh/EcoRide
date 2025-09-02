<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Modifications du profil");
    ?>

    <section class="container-form" id="container-personal-form">

        <form method="POST" id="personal-form">

            <select class="form-select" name="profilType" aria-label="Sélectionner des filtres" required>
                <option selected disabled>Êtes-vous passager ou chauffeur ?</option>
                <option value="1" <?= $profilType == 1 ? 'selected' : '' ?>>Passager</option>
                <option value="2" <?= $profilType == 2 ? 'selected' : '' ?>>Chauffeur</option>
                <option value="3" <?= $profilType == 3 ? 'selected' : '' ?>>Passager chauffeur</option>
            </select>

            <div class="container-form-inner">
                <div class="personal-infos-container">
                    <div class="inputForm">
                        <label for="lastname">Nom</label>
                        <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($lastname) ?>" autocomplete="family-name">
                    </div>
                    <div class="inputForm">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" value="<?= htmlspecialchars($firstname) ?>" autocomplete="given-name">
                    </div>
                    <div class="inputForm">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" value="<?= htmlspecialchars($address) ?>" autocomplete="address-line1">
                    </div>
                    <div class="inputForm">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($telephone) ?>" autocomplete="tel">
                    </div>
                    <div class="photo-upload">
                        <input type="file" class="inputForm" id="photo" name="photo">
                        <div id="preview-container">
                            <img id="photo-preview" src="/assets/images/personal/person-circle.svg" alt="Choisir une photo">
                        </div>
                    </div>
                    <div class="inputForm" id="password-input">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17l0 80c0 13.3 10.7 24 24 24l80 0c13.3 0 24-10.7 24-24l0-40 40 0c13.3 0 24-10.7 24-24l0-40 40 0c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
                        </svg>
                        <a class="password-change" href="/pages/users/personal-infos/edit_password.php">Changer votre mot de passe</a>
                    </div>
                </div>
                <div class="car-infos-container">
                    <div class="inputForm">
                        <label for="brand">Marque</label>
                        <input type="text" id="brand" name="brand" value="<?= htmlspecialchars($carBrand) ?>">
                    </div>
                    <div class="inputForm">
                        <label for="model">Modèle</label>
                        <input type="text" id="model" name="model" value="<?= htmlspecialchars($carModel) ?>">
                    </div>
                    <div class="inputForm">
                        <label for="color">Couleur</label>
                        <input type="text" id="color" name="color" value="<?= htmlspecialchars($carColor) ?>">
                    </div>
                    <div class="inputForm">
                        <label for="energy">Energie</label>
                        <select class="select-energy" name="energy" id="energy" aria-label="Energie">
                            <option selected disabled>Sélectionnez le type d'énergie de votre véhicule</option>
                            <option value="1" <?= $energyId == 1 ? 'selected' : '' ?>>Electrique</option>
                            <option value="2" <?= $energyId == 2 ? 'selected' : '' ?>>Hybride</option>
                            <option value="3" <?= $energyId == 3 ? 'selected' : '' ?>>Diesel</option>
                            <option value="4" <?= $energyId == 4 ? 'selected' : '' ?>>Essence</option>
                            <option value="5" <?= $energyId == 5 ? 'selected' : '' ?>>GPL</option>
                        </select>
                    </div>
                    <div class="inputForm">
                        <label for="seat">Place(s) libre(s)</label>
                        <input type="number" id="seat" name="seat" value="<?= htmlspecialchars($carSeats) ?>" min="0">
                    </div>
                </div>
                <div class="car-infos-container2">
                    <div class="inputForm">
                        <label for="plate">Immatriculation</label>
                        <input type="text" id="plate" name="plate" value="<?= htmlspecialchars($carPlate) ?>" autocomplete="off">
                    </div>
                    <div class="inputForm">
                        <label for="dateRegister">Date de la 1ère immatriculation</label>
                        <input type="date" id="dateRegister" name="dateRegister" value="<?= htmlspecialchars($carFirstRegist) ?>">
                    </div>
                    <div class="checkbox-block">
                        <label for="smoker"><input type="checkbox" name="smoker" id="smoker" <?= ($carSmoker === 'Oui') ? 'checked' : '' ?>>Fumeurs acceptés</label>
                    </div>
                    <div class="checkbox-block">
                        <label for="animal"><input type="checkbox" name="animal" id="animal" <?= ($carAnimal === 'Oui') ? 'checked' : '' ?>>Animaux acceptés</label>
                    </div>
                    <div class="inputForm">
                        <label for="preferences">Préférences</label>
                        <textarea type="text" name="preferences" id="preferences"><?= htmlspecialchars($carPreferences) ?></textarea>
                    </div>
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" name="savePersonalForm" class="btn-blue btn-form" id="btn-form">Enregistrer</button>
            </div>
            <?php foreach ($messagesForm as $message) { ?>
                <div class="success">
                    <?= $message; ?>
                </div>
            <?php } ?>
            <?php foreach ($errors as $errorMessage) { ?>
                <div class="alert-container">
                    <?= $errorMessage; ?>
                </div>
            <?php } ?>
        </form>

    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>
<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Saisir un voyage");
    ?>

    <section class="container-form" id="container-form-travel">
        <form method="POST" id="form-travel">

            <select class="form-select" name="car-select" aria-label="Sélectionner des filtres" required>
                <option selected disabled>Sélectionner un véhicule</option>
                <?php foreach ($cars as $car): ?>
                    <option value="<?= $car->getIdCar(); ?>"><?= htmlspecialchars($car->getBrand() . " " . $car->getModel()); ?></option>
                <?php endforeach; ?>
            </select>

            <div class="container-form-inner">
                <div class="travel-infos-container">
                    <div class="inputForm">
                        <label for="localDepart">Ville de départ</label>
                        <input type="text" id="localDepart" name="localDepart" required>
                    </div>
                    <div class="invalid-feedback">
                        La ville de départ est requise
                    </div>
                    <div class="inputForm">
                        <label for="localArrival">Ville d'arrivée</label>
                        <input type="text" id="localArrival" name="localArrival" required>
                    </div>
                    <div class="invalid-feedback">
                        La ville d'arrivée est requise
                    </div>
                    <div class="inputForm">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="invalid-feedback">
                        La date de départ est requise
                    </div>
                    <div class="inputForm">
                        <label for="price">Prix</label>
                        <input type="number" id="price" name="price" min="0" required>
                        <p class="info-credit">À noter : 2 crédits seront déduits pour la plateforme</p>
                    </div>
                    <div class="invalid-feedback">
                        Le prix est requis
                    </div>
                </div>
                <div class="travel-infos-container">
                    <div class="inputForm">
                        <label for="timeDepart">Heure de départ</label>
                        <input type="time" id="timeDepart" name="timeDepart" required>
                    </div>
                    <div class="invalid-feedback">
                        L'heure de départ est requise
                    </div>
                    <div class="inputForm">
                        <label for="timeArrival">Heure d'arrivée</label>
                        <input type="time" id="timeArrival" name="timeArrival" required>
                    </div>
                    <div class="invalid-feedback">
                        L'heure d'arrivée est requise
                    </div>
                    <div class="inputForm">
                        <label for="duration">Durée</label>
                        <input type="text" id="duration" name="duration" readonly>
                    </div>
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" name="saveNewCarpool" class="btn-blue btn-green btn-form" id="btn-valid-new-carpool">Soumettre</button>
            </div>
            <a class="link-future-carpool" href="/carpools/future?view=future">> Accéder aux covoiturages à venir</a>
            <?php foreach ($messagesForm as $message) { ?>
                <div class="success">
                    <?= $message; ?>
                </div>
            <?php } ?>
            <?php foreach ($errorsForm as $error) { ?>
                <div class="alert-container">
                    <?= $error; ?>
                </div>
            <?php } ?>
        </form>

    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>
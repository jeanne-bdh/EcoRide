<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";
require_once dirname(__DIR__, 3) . "/processes/new_carpool_process.php";
?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Saisir un voyage");
    ?>

    <section class="container-form" id="container-form-travel">

        <form method="POST" id="form-travel">

            <select class="form-select" aria-label="Sélectionner des filtres" required>
                <option selected disabled>Sélectionner un véhicule</option>
                <option value="1">Véhicule 1</option>
                <option value="2">Véhicule 2</option>
                <option value="3">Ajouter un autre véhicule</option>
            </select>

            <div class="container-form-inner">
                <div class="travel-infos-container">
                    <div class="inputForm">
                        <label for="localDepart">Ville de départ</label>
                        <input type="text" id="localDepart" name="localDepart">
                    </div>
                    <div class="inputForm">
                        <label for="localArrival">Ville d'arrivée</label>
                        <input type="text" id="localArrival" name="localArrival">
                    </div>
                    <div class="inputForm">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date">
                    </div>
                    <div class="inputForm">
                        <label for="price">Prix</label>
                        <input type="number" id="price" name="price">
                        <p class="info-credit">À noter : 2 crédits sont déduits pour la plateforme</p>
                    </div>
                </div>
                <div class="travel-infos-container">
                    <div class="inputForm">
                        <label for="timeDepart">Heure de départ</label>
                        <input type="time" id="timeDepart" name="timeDepart">
                    </div>
                    <div class="inputForm">
                        <label for="timeArrival">Heure d'arrivée</label>
                        <input type="time" id="timeArrival" name="timeArrival">
                    </div>
                    <div class="inputForm">
                        <label for="duration">Durée</label>
                        <input type="text" id="duration" name="duration" readonly>
                    </div>
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" name="saveNewCarpool" class="btn-blue" id="btn-form">Soumettre</button>
            </div>
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

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>
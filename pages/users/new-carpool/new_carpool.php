<?php

require_once dirname(__DIR__, 3) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 3) . "/templates/hero_section.php";
    heroSection("Saisir un voyage");
    ?>

    <section class="container-form" id="container-form-travel">

        <form method="get" id="form-travel">

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
                        <label for="timeDepart">Heure de départ</label>
                        <input type="time" id="timeDepart" name="timeDepart">
                    </div>
                    <div class="inputForm">
                        <label for="timeArrival">Heure d'arrivée</label>
                        <input type="time" id="timeArrival" name="timeArrival">
                    </div>
                    <div class="inputForm">
                        <label for="duration">Durée</label>
                        <input type="number" id="duration" name="duration">
                    </div>
                    <div class="inputForm">
                        <label for="price">Prix</label>
                        <input type="number" id="price" name="price">
                        <p>Veuillez prendre en compte que 2 crédits seront retirés pour la plateforme</p>
                    </div>
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue" id="btn-profil">Soumettre</button>
            </div>
        </form>

    </section>

</main>

<?php require_once dirname(__DIR__, 3) . "/templates/footer.php" ?>
<?php

require_once __DIR__ . "/../../templates/header.php";
require_once __DIR__ . "/../../libs/pdo.php";
require_once __DIR__ . "/../../libs/carpool.php";
require_once __DIR__ . "/../../libs/format_time.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("La mobilité partagée au <br> service de la planète");
    ?>

    <!-- FORMULAIRE -->
    <section class="container-form" id="container-form-home">
        <form>
            <div class="inputForm">
                <label for="inputDepartCity">Départ :</label>
                <input type="text" id="inputDepartCity" placeholder="Ville de départ">
            </div>
            <div class="inputForm">
                <label for="inputArrivalCity">Destination :</label>
                <input type="text" id="inputArrivalCity" placeholder="Ville d'arrivée">
            </div>
            <div class="inputForm">
                <label for="inputDateHome">Date de départ :</label>
                <input type="date" id="inputDateHome" name="dateDepartHome" required>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-search">Rechercher</button>
            </div>
        </form>
    </section>

    <!-- MAIN SECTION -->
    <section class="main-section">
        <div class="img-main-section">
            <img class="illust-home" src="/assets/images/home/illustration-accueil.svg" alt="Illustration de covoiturage pour page d'accueil">
        </div>
        <div class="text-access-carpool">
            <h2>❌ Aucun covoiturage n'est disponible</h2>
            <p class="text-alter-carpool">🗓️ Cependant, un itinéraire est disponible le </p>
            <div class="green-tag">
                <p>Ven 20 nov.</p>
            </div>
        </div>
        <p class="text-alter-carpool">Souhaitez-vous modifier votre recherche pour cette date ?</p>

        <?php $carpoolsSearch = getCarpoolBySearch($pdo);
        require __DIR__ . '/../../templates/carpool_card_visitor.php'; ?>

    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>
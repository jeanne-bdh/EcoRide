<?php require_once dirname(__DIR__,2) . "/templates/header.php" ?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
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
            <h2>Trouvez le covoiturage près de chez vous</h2>
        </div>

    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>
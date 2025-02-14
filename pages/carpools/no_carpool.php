<?php require_once __DIR__ . "/../../templates/header.php" ?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("La mobilité partagée au <br> service de la planète");
    ?>

    <!-- FORMULAIRE -->
    <div class="container-form" id="container-form-home">
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
    </div>

    </div>


    <!-- MAIN SECTION -->
    <div class="main-section">
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
    </div>
    </div>
</section>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>
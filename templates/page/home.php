<?php

require_once APP_ROOT . "/templates/partials/header.php";
//require_once APP_ROOT . "/processes/search_carpool_process.php";

?>

<main class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("La mobilité partagée au
    service de la planète");
    ?>

    <!-- FORMULAIRE -->
    <?php
    require_once APP_ROOT . "/templates/partials/form_home.php";
    ?>

    <!-- MAIN SECTION -->
    <section class="main-section">
        <div class="img-main-section">
            <img class="illust-home" src="/assets/images/home/illustration-accueil.svg" alt="Illustration de covoiturage pour page d'accueil">
        </div>
        <div class="home-prez">
            <div class="home-item text-content">
                <h5>Réduire l’impact environnemental</h5>
                <p>Chez EcoRide, nous croyons qu’un avenir plus vert passe par des choix de déplacement responsables et
                    collaboratifs. <br> Grâce à notre plateforme dédiée, nous facilitons les connexions entre voyageurs
                    engagés dans
                    une démarche écologique et ceux qui souhaitent également réduire leurs frais de déplacement.</p>
            </div>
            <div class="home-item">
                <img src="/assets/images/home/img-accueil-electric-car.jpeg"
                    alt="accueil voiture électrique">
            </div>
            <div class="home-item text-content">
                <h5>Référence en covoiturage écologique</h5>
                <p>Nous nous adressons exclusivement aux trajets en voiture, pour optimiser l’impact de chaque déplacement. <br> Nous
                    sommes fiers de nous positionner comme des acteurs du changement et invitons chacun à rouler vers un futur plus respectueux de l’environnement.</p>
                <p>Rejoignez la communauté EcoRide dès aujourd’hui et ensemble, roulons pour la planète ! 🚗 🌍</p>
            </div>
            <div class="home-item">
                <img src="/assets/images/home/img-accueil-friends.jpg" alt="accueil friends">
            </div>
        </div>
        <div class="text-content">
            <h5>Application web éco-conçue</h5>
            <p>EcoRide se distingue notamment par une application web éco-conçue, pensée pour refléter les valeurs de
                l’écologie.</p>
        </div>
    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>
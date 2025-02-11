<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("La mobilité partagée au <br> service de la planète");
    ?>

    <!-- FORMULAIRE -->
    <div class="form-home" id="container-form-home">
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
                <label for="date">Date de départ :</label>
                <input type="date" id="date" name="date" placeholder="Date" required>
            </div>
            <button type="submit" class="btn-blue btn-search">Rechercher</button>
        </form>
    </div>

    </div>


    <!-- MAIN SECTION -->
    <div class="img-main-section">
        <img class="illust-home" src="/assets/images/home/illustration-accueil.svg" alt="">
    </div>
    <div class="home-prez">
        <div class="item text-content">
            <h5>Réduire l’impact environnemental</h5>
            <p>Chez EcoRide, nous croyons qu’un avenir plus vert passe par des choix de déplacement responsables et
                collaboratifs. <br> Grâce à notre plateforme dédiée, nous facilitons les connexions entre voyageurs
                engagés dans
                une démarche écologique et ceux qui souhaitent également réduire leurs frais de déplacement.</p>
        </div>
        <div class="item img-electric-container">
            <img class="img-electric" src="/assets/images/home/img-accueil-electric-car.jpeg"
                alt="accueil voiture électrique">
        </div>
        <div class="item text-content">
            <h5>Référence en covoiturage écologique</h5>
            <p>Nous nous adressons exclusivement aux trajets en voiture, pour optimiser l’impact de chaque déplacement.
                Nous
                sommes fiers de nous positionner comme des acteurs du changement et invitons chacun à rouler vers un
                futur
                plus respectueux de l’environnement.</p>
            <p>Rejoignez la communauté EcoRide dès aujourd’hui et ensemble, roulons pour la planète ! 🚗 🌍</p>
        </div>
        <div class="item img-friends-container">
            <img class="img-friends" src="/assets/images/home/img-accueil-friends.jpg" alt="accueil friends">
        </div>
        <div class="item text-content text-ecoweb">
            <h5>Application web éco-conçue</h5>
            <p>EcoRide se distingue notamment par une application web éco-conçue, <br> pensée pour refléter les valeurs de
                l’écologie.</p>
        </div>
    </div>
    </div>
</section>
<?php

require_once dirname(__DIR__,2) . "/templates/header.php";
require_once dirname(__DIR__,2) . "/libs/pdo.php";
require_once dirname(__DIR__,2) . "/libs/carpool.php";
require_once dirname(__DIR__,2) . "/libs/format_time.php";

if (isset($_GET["id_carpool"])) {
    $carpoolId = (int)$_GET["id_carpool"];
    $detailsCarpool = getCarpoolById($pdo, $carpoolId);
}

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Détails du covoiturage");
    ?>

    <section>
        <div class="carpool-card" id="carpool-details">
            <div class="carpool-card-top" id="seat-credit-items">
                <div class="blue-tag">
                    <p><?=$detailsCarpool['date_depart'];?></p>
                </div>
                <div>
                    <p class="p-credit">15 crédit(s)</p>
                    <p class="p-place">2 place(s)</p>
                </div>
            </div>
            <div class="travel">
                <div class="container-depart">
                    <p>6h00</p>
                    <p>Paris</p>
                </div>
                <div class="travel-circle"></div>
                <hr class="travel-line">
                <p class="duree">3h</p>
                <hr class="travel-line">
                <div class="travel-circle"></div>
                <div class="container-arrivee">
                    <p>9h30</p>
                    <p>Orléans</p>
                </div>
            </div>
            <hr>
            <div class="carpool-card-bottom">
                <div class="card-driver">
                    <div class="container-profil">
                        <img src="/uploads/carpools/person-circle.svg" class="profil-icon" alt="profil user">
                        <p>Pseudo</p>
                    </div>
                    <div class="star">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#757575" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <p class="p-notes">4,5</p>
                    </div>
                    <div class="green-tag">
                        <p>Ecolo</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="carpool-card carpool-card-details-items" id="car-infos">
            <h6>Informations du véhicule</h6>
            <ul>
                <li>Marque : Renault</li>
                <li>Modèle : Captur</li>
                <li>Couleur : gris foncé</li>
                <li>Energie : thermique</li>
            </ul>
        </div>

        <div class="carpool-card carpool-card-details-items" id="driver-preferences">
            <h6>Préférences du conducteur</h6>
            <ul>
                <li>Non fumeur</li>
                <li>Animaux en cage seulement</li>
                <li>Aime discuter de tout et de rien</li>
            </ul>
        </div>

        <div class="comments-container">
            <h5>Avis (3)</h5>
            <div class="carousel">
                <div class="carousel-slide">
                    <div class="slide active">
                        <h6>Trajet parfait avec un conducteur très sympa !</h6>
                        <p class="notes">5 étoiles</p>
                        <p>Super expérience de covoiturage ! Paul est arrivé à l’heure et la voiture était impeccable. Il a proposé plusieurs pauses pendant le trajet, et la conversation était fluide et agréable. Je recommande vivement de voyager avec lui !</p>
                    </div>
                    <div class="slide">
                        <h6>Très bon trajet, petit retard au départ</h6>
                        <p class="notes">4 étoiles</p>
                        <p>Le trajet s'est bien déroulé, et le conducteur était très agréable. Petit bémol : 10 minutes de retard au départ, mais il a pris la peine de prévenir à l'avance, ce que j'ai apprécié. Voiture confortable et bonne ambiance à bord !</p>
                    </div>
                    <div class="slide">
                        <h6>Correct, mais peut s'améliorer</h6>
                        <p class="notes">3 étoiles</p>
                        <p>Conducteur sympa, mais la musique était un peu forte pendant tout le trajet malgré mes suggestions. Aussi, pas de pause sur une longue distance, ce qui était un peu inconfortable. Mais la conduite était sécurisante et ponctuelle.</p>
                    </div>
                </div>
                <button class="btn" id="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                    </svg>
                </button>
                <button class="btn" id="next">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z" />
                    </svg>
                </button>
            </div>
        </div>

        <a href="#">
            <button type="submit" class="btn-blue btn-participate">Participer</button>
        </a>
    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>
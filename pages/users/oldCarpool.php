<?php

require_once __DIR__ . "/../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Covoiturages passés");
    ?>

    <div class="carpool-card">
        <div class="card-bottom">
            <div class="tag-date">
                <p>ven. 29 nov.</p>
            </div>
            <div>
                <p class="p-credit">7 crédits</p>
                <p class="p-place">3 places</p>
            </div>
        </div>
        <div class="travel">
            <p class="heure-depart">16:00</p>
            <div class="travel-circle"></div>
            <hr class="travel-line">
            <p class="duree">1h30</p>
            <hr class="travel-line">
            <div class="travel-circle"></div>
            <p class="heure-arrivee">17:30</p>
        </div>
        <div class="cities">
            <p class="city-depart">Paris</p>
            <p class="city-arrivee">Amiens</p>
        </div>
        <hr>
        <div class="carpool-card-bottom">
            <svg class="profil-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
            </svg>
            <p>Pseudo</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#757575" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
            </svg>
            <p class="p-rating">4</p>
            <div class="tag-voyage">
                <p>Ecolo</p>
            </div>
            <div class="details-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#528DB9" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
                <p>Voir détails</p>
            </div>
        </div>
    </div>

</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>
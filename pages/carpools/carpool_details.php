<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/libs/pdo.php";
require_once dirname(__DIR__, 2) . "/libs/carpool.php";
require_once dirname(__DIR__, 2) . "/libs/format_time.php";
require_once dirname(__DIR__, 2) . "/libs/duration.php";
require_once dirname(__DIR__, 2) . "/libs/review.php";
require_once dirname(__DIR__, 2) . "/processes/details_carpool_process.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__, 2) . "/templates/hero_section.php";
    heroSection("Détails du covoiturage");
    ?>

    <?php foreach ($errorsDetails as $error) { ?>
        <div class="alert-container">
            <?= $error; ?>
        </div>
    <?php } ?>

    <section>
        <?php require_once dirname(__DIR__, 2) . "/templates/carpool_card.php"; ?>

        <div class="carpool-card carpool-card-details-items" id="car-infos">
            <h6>Informations du véhicule</h6>
            <ul>
                <li>Marque : <?= $carpool['brand']; ?></li>
                <li>Modèle : <?= $carpool['model']; ?></li>
                <li>Couleur : <?= $carpool['color']; ?></li>
                <li>Energie : <?= $carpool['label_energy']; ?></li>
            </ul>
        </div>

        <div class="carpool-card carpool-card-details-items" id="driver-preferences">
            <h6>Préférences du conducteur</h6>
            <ul>
                <li>Non fumeur</li>
                <li>Animaux acceptés</li>
                <li><?= $carpool['preferences']; ?></li>
            </ul>
        </div>

        <div class="comments-container">
            <h5>Avis (<?= count($reviews); ?>)</h5>
            <div class="carousel">
                <div class="carousel-slide">

                    <?php foreach ($reviews as $index => $review): ?>
                        <div class="slide <?= $index === 0 ? 'active' : ''; ?>">
                            <h6><?= $review['title']; ?></h6>
                            <p class="notes"><?= $review['notes']; ?></p>
                            <p><?= $review['comment']; ?></p>
                        </div>
                    <?php endforeach; ?>

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

        <div class="inputBtn">
            <button type="submit" class="btn-blue">Participer</button>
        </div>
    </section>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/footer.php" ?>
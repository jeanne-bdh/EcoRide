<?php

require_once dirname(__DIR__, 2) . "/templates/partials/header.php";
require_once dirname(__DIR__, 2) . "/libs/pdo.php";
require_once dirname(__DIR__, 2) . "/libs/carpool.php";
require_once dirname(__DIR__, 2) . "/libs/format_time.php";
require_once dirname(__DIR__, 2) . "/libs/duration.php";
require_once dirname(__DIR__, 2) . "/libs/review.php";
require_once dirname(__DIR__, 2) . "/processes/details_carpool_process.php";
require_once dirname(__DIR__, 2) . "/processes/participate_carpool_process.php";

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
        <?php
        $hideDetailsLink = true;
        require_once dirname(__DIR__, 2) . "/templates/carpool_card.php";
        ?>

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

        <div class="inputBtn">
            <?php if (!isUserConnected()): ?>
                <a href="/pages/auth/login_form.php" class="btn-blue" id="btn-participate">Participer</a>
            <?php else: ?>
                <form method="POST">
                    <input type="hidden" name="id_carpool" value="<?= $carpool['id_carpool']; ?>">
                    <button type="submit" class="btn-blue">Participer</button>
                    <?php foreach ($errorsForm as $error) { ?>
                        <div class="alert-container">
                            <?= $error; ?>
                        </div>
                    <?php } ?>
                </form>
            <?php endif; ?>
        </div>

    </section>

</main>

<?php require_once dirname(__DIR__, 2) . "/templates/partials/footer.php" ?>
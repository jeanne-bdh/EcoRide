<?php

require_once APP_ROOT . "/templates/partials/header.php";

use App\Service\SessionManager;

$session = new SessionManager();

$errors = $errors ?? [];

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
    heroSection("Détails du covoiturage");
    ?>

    <section>
        <?php
        $hideDetailsLink = true;
        require_once APP_ROOT . "/templates/partials/carpool_card.php";
        ?>

        <div class="carpool-card carpool-card-details-items" id="car-infos">
            <h6>Informations du véhicule</h6>
            <ul>
                <li>Marque : <?= $carpool->getCar()->getBrand(); ?></li>
                <li>Modèle : <?= $carpool->getCar()->getModel(); ?></li>
                <li>Couleur : <?= $carpool->getCar()->getColor(); ?></li>
                <li>Energie : <?= $carpool->getCar()->getEnergy()->getLabelEnergy(); ?></li>
            </ul>
        </div>

        <div class="carpool-card carpool-card-details-items" id="driver-preferences">
            <h6>Préférences du conducteur</h6>
            <ul>
                <li>Fumeurs acceptés : <?= $carpool->getCar()->getSmoker(); ?></li>
                <li>Animaux acceptés : <?= $carpool->getCar()->getAnimal(); ?></li>
                <li><?= $carpool->getCar()->getPreferences(); ?></li>
            </ul>
        </div>

        <div class="inputBtn">
            <?php if (!$session->isUserConnected()): ?>
                <a href="/login" class="btn-blue" id="btn-participate">Participer</a>
            <?php else: ?>
                    <form method="POST" action="/participate">
                        <input type="hidden" name="id_carpool" value="<?= $carpool->getIdCarpool(); ?>">
                        <button type="submit" class="btn-blue">Participer</button>
                        
                        <?php include_once APP_ROOT . "/templates/errors/default.php"; ?>
                    </form>
                <?php endif; ?>
        </div>

    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>
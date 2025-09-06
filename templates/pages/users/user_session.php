<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->

    <section class="wave-top">
        <svg viewBox="0 0 1442 355" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1441 1H1V199.998C1 199.998 244.436 327.657 415.075 349.247C662.108 380.501 810.624 248.255 1040.44 225.37C1270.26 202.486 1441 317.904 1441 317.904V1Z"
                fill="#0EE6B1" stroke="#0EE6B1" />
        </svg>
        <h1>Espace utilisateur</h1>
        <h6><?= htmlspecialchars($credit); ?> Crédit(s)</h6>
    </section>

    <!-- MENU SESSION -->

    <section class="menu-session">
        <?php if ($getNewCarpoolForm): ?>
            <a href="/newCarpool" class="card-session">
                <h3>Saisir un voyage</h3>
            </a>
        <?php endif; ?>
        <a href="/carpools/future" class="card-session">
            <h3>Covoiturages à venir</h3>
        </a>
        <a href="/carpools/history" class="card-session">
            <h3>Historique <br> des covoiturages</h3>
        </a>
        <a href="/personal" class="card-session">
            <h3>Modifications <br> du profil</h3>
        </a>
    </section>

</main>

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>
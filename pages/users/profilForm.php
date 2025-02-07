<?php

require_once __DIR__ . "/../templates/header.php";

?>

<section class="container-black">

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../templates/hero-section.php";
    heroSection("Choississez votre profil");
    ?>

<div class="menu-session">
        <a href="/pages/users/passager.php" class="card-session">
            <h3>Passager</h3>
        </a>
        <a href="/pages/users/chauffeur.php" class="card-session">
            <h3>Chauffeur</h3>
        </a>
        <a href="/pages/users/chauffeur.php" class="card-session">
            <h3>Passager et chauffeur</h3>
        </a>
    </div>

</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>
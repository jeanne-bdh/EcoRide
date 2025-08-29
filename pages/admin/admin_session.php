<?php

require_once dirname(__DIR__,2) . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Espace Administrateur");
    ?>

    <section class="menu-session">
        <a href="/pages/admin/account_suspension.php" class="card-session">
            <h3>Suspension <br> de comptes</h3>
        </a>
    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/partials/footer.php" ?>
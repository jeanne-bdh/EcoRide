<?php

require_once dirname(__DIR__, 2) . "/templates/header.php";
require_once dirname(__DIR__, 2) . "/processes/contact_process.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once __DIR__ . "/../../templates/hero_section.php";
    heroSection("Formulaire de contact");
    ?>

    <!-- FORMULAIRE -->
    <section class="container-form" id="container-form-contact">
        <form method="POST" id="contactForm">
            <div class="inputForm">
                <label for="inputTitle">Titre</label>
                <input type="text" name="title" id="inputTitle">
            </div>
            <div class="inputForm">
                <label for="inputEmailContact">Email</label>
                <input type="text" name="email" id="inputEmailContact">
            </div>
            <div class="inputForm">
                <label for="inputMsgContact">Message</label>
                <textarea type="text" name="message" id="inputMsgContact" placeholder="Bonjour..."></textarea>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue">Soumettre</button>
            </div>
        </form>
    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>
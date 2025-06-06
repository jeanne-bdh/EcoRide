<?php

require_once dirname(__DIR__, 2) . "/processes/contact_process.php";
require_once dirname(__DIR__, 2) . "/templates/header.php";

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

            <?php foreach ($successContact as $message) { ?>
                <div class="success">
                    <?= $message; ?>
                </div>
            <?php } ?>
            <?php foreach ($errorsContact as $error) { ?>
                <div class="alert-container">
                    <?= $error; ?>
                </div>
            <?php } ?>

            <div class="inputForm">
                <label for="inputTitle">Titre</label>
                <input type="text" name="title" id="inputTitle" required>
                <div class="invalid-feedback">
                    Veuillez entrer un titre ayant au moins 5 caractères
                </div>
            </div>
            <div class="inputForm">
                <label for="inputEmailContact">Email</label>
                <input type="text" name="email" id="inputEmailContact" required>
                <div class="invalid-feedback">
                    Veuillez entrer une adresse e-mail valide
                </div>
            </div>
            <div class="inputForm">
                <label for="inputMsgContact">Message</label>
                <textarea type="text" name="message" id="inputMsgContact" placeholder="Bonjour..." required></textarea>
                <div class="invalid-feedback">
                    Veuillez entrer un message ayant au moins 20 caractères
                </div>
            </div>
            <div class="inputBtn">
                <button type="submit" class="btn-blue btn-green" id="btn-valid-contact">Soumettre</button>
            </div>
        </form>
    </section>

</main>

<?php require_once __DIR__ . "/../../templates/footer.php" ?>
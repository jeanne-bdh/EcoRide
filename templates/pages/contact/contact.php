<?php

require_once APP_ROOT . "/templates/partials/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once APP_ROOT . "/templates/partials/hero_section.php";
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
            <?php foreach ($errors as $errorMessage) { ?>
                <div class="alert-container">
                    <?= $errorMessage; ?>
                </div>
            <?php } ?>

            <div class="inputForm">
                <label for="inputTitle">Titre</label>
                <input type="text" name="title" id="inputTitle" required autocomplete="off">
                <div class="invalid-feedback">
                    Veuillez entrer un titre ayant au moins 5 caractères
                </div>
            </div>
            <div class="inputForm">
                <label for="inputEmailContact">Email</label>
                <input type="text" name="email" id="inputEmailContact" required autocomplete="email">
                <div class="invalid-feedback">
                    Veuillez entrer une adresse e-mail valide
                </div>
            </div>
            <div class="inputForm">
                <label for="inputMsgContact">Message</label>
                <textarea type="text" name="message" id="inputMsgContact" placeholder="Bonjour..." required autocomplete="off"></textarea>
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

<?php require_once APP_ROOT . "/templates/partials/footer.php" ?>
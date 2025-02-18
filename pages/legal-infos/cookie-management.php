<?php

require_once dirname(__DIR__,2) . "/templates/header.php";

?>

<main>

    <!-- HERO SECTION -->
    <?php
    include_once dirname(__DIR__,2) . "/templates/hero_section.php";
    heroSection("Gestion des cookies");
    ?>

    <!-- MAIN -->
    <section class="main-legal-infos">

        <p>
            Dernière mise à jour : 17/02/2025
        </p>

        <h5>1. Introduction</h5>
        <p>
            Bienvenue sur EcoRide, votre plateforme de covoiturage écologique. Afin d’améliorer votre expérience utilisateur, nous utilisons des cookies et autres traceurs sur notre site web. Cette page a pour but de vous informer sur leur utilisation et de vous expliquer comment vous pouvez les gérer.
        </p>

        <h5>2. Qu'est-ce qu'un cookie ?</h5>
        <p>
            Un cookie est un petit fichier texte déposé sur votre appareil (ordinateur, tablette, smartphone) lorsque vous naviguez sur notre site. Il permet de stocker des informations temporaires afin d'améliorer les fonctionnalités du site et de personnaliser votre expérience.
        </p>

        <h5>3. Quels types de cookies utilisons-nous ?</h5>
        <p>Nous utilisons plusieurs types de cookies sur EcoRide :</p>
        <ul>
            <li>
                Cookies essentiels : Ces cookies sont indispensables au bon fonctionnement du site (exemple : gestion des connexions, sécurité). Sans eux, certaines fonctionnalités ne seraient pas disponibles.
            </li>
            <li>
                Cookies de performance et d’analyse : Ils nous permettent de collecter des données anonymes sur l'utilisation du site afin d'améliorer nos services (exemple : nombre de visites, pages consultées).
            </li>
            <li>
                Cookies fonctionnels : Ils facilitent votre navigation en enregistrant vos préférences (exemple : choix de langue, préférences d’affichage).
            </li>
            <li>
                Cookies publicitaires et de personnalisation : Ces cookies permettent d’afficher des contenus adaptés à vos centres d’intérêt et de mesurer l’efficacité de nos campagnes.
            </li>
        </ul>

        <h5>4. Gestion et paramétrage des cookies</h5>
        <p>
            Lors de votre première visite sur EcoRide, un bandeau vous informe de l’utilisation des cookies et vous permet d’accepter ou de refuser certains d’entre eux. Vous pouvez également gérer vos préférences à tout moment en accédant aux paramètres des cookies depuis le bas de la page.
            La plupart des navigateurs vous permettent de bloquer ou de supprimer les cookies via leurs paramètres. Toutefois, le blocage de certains cookies peut affecter votre expérience utilisateur sur notre site.
        </p>

        <h5>5. Contact</h5>
        <p>
            Pour toute question relative à l'utilisation des cookies sur EcoRide, vous pouvez nous contacter à l’adresse suivante : contact@ecoride.com.
        </p>

    </section>

</main>

<?php require_once dirname(__DIR__,2) . "/templates/footer.php" ?>
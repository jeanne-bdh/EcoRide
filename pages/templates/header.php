<?php
require_once __DIR__ . "/../lib/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>EcoRide</title>
</head>

<body>

    <header>
        <nav>
            <div class="container-logo">
                <div class="logo-ecoride">
                    <a href="/"><img src="/assets/images/navbar/logo_ecoride.png" alt="Logo EcoRide"></a>
                </div>
                <div class="name-ecoride">
                    <a href="/">EcoRide</a>
                </div>
            </div>
            <button class="menu-burger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/covoit">Accès aux covoiturages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <?php if (isUserConnected()) { ?>
                        <a href="/pages/auth/logout.php"><button class="btn-login" type="button">Déconnexion</button></a>
                    <?php } else { ?>
                        <a href="/pages/auth/login.php"><button class="btn-login" type="button">Connexion</button></a>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </header>
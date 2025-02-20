# EcoRide

Une application web de covoiturage ciblée sur des voyages écologiques


# Fonctionnalités

- Consultation des covoiturages
- Inscription sur la plateforme
- Connexion à un compte utilisateur
- Saisir un voyage si l'utilisateur est un chauffeur
- Consultation de l'historiques des covoiturages passés
- Participer à un covoiturage pour un passager, avec possibilité de payer sur la plateforme et d'annuler le trajet le cas échéant
- Poster un avis sur le déroulement du covoiturage
- Création de comptes pour employés, qui gérent les avis et les litiges
- Un compte administrateur a la possibilité de suspendre des comptes utilisateur ou employés et suivre les statistiques de la plateforme


# Installation

Serveur Apache/Nginx avec PHP 8.2.4-0
MySQLMySQL – MariaDB - 9.2.0


# Etapes d'installation

1. Cloner le projet

git clone https://github.com/jeanne-bdh/EcoRide.git

2. Configurer la base de données

- Importer le fichier ecoride.sql dans MySQL
- Modifier pdo.php avec vos identifiants de base de données

3. Lancer le serveur

php -S localhost:8000

4. Accéder à l'application

Ouvrir http://localhost:8000 dans un navigateur


# Structure du projet

/ecoride
|__ /assets
|__ /libs
|__ /templates
|__ /js
|__ /pages
|__ /sass
|__ index.php
|__ ecoride.sql
|__ README.md


# Technologies utilisées

Front-end : HTML, SCSS, Javascript (Vanilla)
Back-end : PHP natif
Base de donnée : MySQL


# Auteur

BOUCHEND'HOMME Jeanne

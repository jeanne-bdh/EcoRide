CREATE TABLE `users` (
  `id_users` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `photo` BLOB,
  `telephone` varchar(20),
  `address` varchar(255),
  `lastname` varchar(50),
  `firstname` varchar(50),
  `credit` int,
  `id_role` int NOT NULL,
  `id_profil` int NOT NULL,
  `id_status_session` int NOT NULL
);

CREATE TABLE `car` (
  `id_car` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `model` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `nb_plate` varchar(50) NOT NULL,
  `energy` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `first_regist` date NOT NULL,
  `seats_nb` int NOT NULL,
  `preferences` varchar(255),
  `id_users` int NOT NULL,
  `id_travel_type` int NOT NULL  
);

CREATE TABLE `carpool` (
  `id_carpool` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `date_depart` date NOT NULL,
  `date_arrival` date NOT NULL,
  `time_depart` time NOT NULL,
  `time_arrival` time NOT NULL,
  `localisation_depart` varchar(255) NOT NULL,
  `localisation_arrival` varchar(255) NOT NULL,
  `remaining_seat` int NOT NULL,
  `price` int NOT NULL,
  `duration` time NOT NULL,
  `id_users` int NOT NULL,
  `id_status_carpool` int NOT NULL,
);

CREATE TABLE `contact` (
  `id_contact` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_contact` date NOT NULL
);

CREATE TABLE `role` (
  `id_role` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `label_role` varchar(50) NOT NULL
);

CREATE TABLE `status_carpool` (
  `id_status_carpool` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `label_status_carpool` varchar(50) NOT NULL
);

CREATE TABLE `travel_type` (
  `id_travel_type` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `label_travel_type` varchar(50) NOT NULL
);

CREATE TABLE `review` (
  `id_review` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `notes` FLOAT NOT NULL,
  `comment` varchar(255) NOT NULL,
  `id_status_review` int NOT NULL,
  `id_carpool` int NOT NULL
);

CREATE TABLE `profil` (
  `id_profil` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `label_profil` varchar(50) NOT NULL
);

CREATE TABLE `status_session` (
  `id_status_session` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `label_status_session` varchar(50) NOT NULL
);

CREATE TABLE `status_review` (
  `id_status_review` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `label_status_review` varchar(50) NOT NULL
);

ALTER TABLE `users` ADD FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`);

ALTER TABLE `users` ADD FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

ALTER TABLE `users` ADD FOREIGN KEY (`id_status_session`) REFERENCES `status_session` (`id_status_session`);

ALTER TABLE `review` ADD FOREIGN KEY (`id_carpool`) REFERENCES `carpool` (`id_carpool`);

ALTER TABLE `review` ADD FOREIGN KEY (`id_status_review`) REFERENCES `status_review` (`id_status_review`);

ALTER TABLE `car` ADD FOREIGN KEY (`id_travel_type`) REFERENCES `travel_type` (`id_travel_type`);

ALTER TABLE `carpool` ADD FOREIGN KEY (`id_status_carpool`) REFERENCES `status_carpool` (`id_status_carpool`);

ALTER TABLE `car` ADD FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

ALTER TABLE `carpool` ADD FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

INSERT INTO profil (id_profil, label_profil)
VALUES (1, 'Passager'), (2, 'Chauffeur'), (3, 'Passager chauffeur');

INSERT INTO status_review (label_status_review)
VALUES ('Validé'), ('Refusé') ('En attente');

INSERT INTO status_carpool (label_status_carpool)
VALUES ('Confirmé'), ('Annulé');

INSERT INTO status_session (label_status_session)
VALUES ('Actif'), ('Suspendu');

INSERT INTO travel_type (label_travel_type)
VALUES ('Ecolo'), ('Non écolo');

INSERT INTO users (pseudo, email, password, id_role, id_profil, id_status_session) 
VALUES ('TestRegister', 'test.register@ecoride.com', 'P@pa2029', 2, 1, 1);

INSERT INTO car (model, brand, nb_plate, energy, color, first_regist, seats_nb, id_users, id_travel_type)
VALUES ('Model 3', 'Tesla', 'AB-123-CD', 'Electrique', 'Rouge', '2021-05-12', 4, 2, 1),
('Golf 8', 'Volkswagen', 'CD-456-EF', 'Essence', 'Bleu', '2019-08-22', 4, 5, 2),
('Zoe', 'Renault', 'EF-789-GH', 'Electrique', 'Blanc', '2020-03-15', 3, 9, 1),
('C-Class', 'Mercedes', 'GH-101-IJ', 'Essence', 'Noir', '2018-12-05', 4, 10, 2);

INSERT INTO carpool (date_depart, date_arrival, time_depart, time_arrival, localisation_depart, localisation_arrival, remaining_seat, price, duration, id_users, id_status_carpool)
VALUES
('2025-02-15', '2025-02-15', '08:00:00', '10:00:00', 'Paris', 'Lyon', 0, 25, '02:00:00', 2, 1),
('2025-03-10', '2025-03-10', '14:30:00', '16:30:00', 'Marseille', 'Nice', 3, 20, '02:00:00', 5, 2),
('2025-02-05', '2025-02-05', '07:30:00', '09:00:00', 'Bordeaux', 'Toulouse', 0, 30, '01:30:00', 9, 2),
('2025-04-01', '2025-04-01', '12:00:00', '13:30:00', 'Lille', 'Paris', 1, 15, '01:30:00', 8, 1),
('2025-02-10', '2025-02-10', '09:00:00', '11:00:00', 'Paris', 'Marseille', 0, 40, '02:00:00', 2, 1),
('2025-05-05', '2025-05-05', '10:00:00', '12:00:00', 'Lyon', 'Nice', 2, 18, '02:00:00', 1, 1),
('2025-06-12', '2025-06-12', '16:00:00', '18:00:00', 'Paris', 'Lyon', 0, 28, '02:00:00', 10, 2),
('2025-01-20', '2025-01-20', '13:00:00', '14:30:00', 'Lyon', 'Marseille', 2, 22, '01:30:00', 5, 1),
('2025-03-15', '2025-03-15', '18:00:00', '20:00:00', 'Toulouse', 'Paris', 1, 30, '02:00:00', 9, 1),
('2025-01-30', '2025-01-30', '17:00:00', '19:00:00', 'Marseille', 'Lyon', 0, 35, '02:00:00', 8, 2);

INSERT INTO review (notes, comment, id_status_review, id_carpool)
VALUES
(5, 'Trajet parfait, conducteur ponctuel et agréable.', 1, 1),
(2, 'Chauffeur pas très sympathique et retard de 45 min.', 2, 3),
(3.5, 'Bien dans l’ensemble, mais la voiture était un peu sale.', 3, 5),
(4.8, 'Très bon voyage, je recommande ce conducteur.', 1, 8),
(1.5, 'Mauvaise expérience, conduite brusque et inconfort.', 2, 10);

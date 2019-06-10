-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mar 11 Juin 2019 à 01:31
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mi06`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Chaussures'),
(2, 'Chaussure');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `last_name`, `password`, `mail`, `adress`, `first_name`, `user_name`) VALUES
(1, 'Legras', 'kevinlegras', 'kevinlegras@outlook.com', '18 rue Edouard Vaillant', 'KevinL', 'kevinlegras'),
(2, 'Jouandon', 'pauljouandon', 'pauljouandon@outlook.com', '17 rue Edouard Vaillant', 'Paul', 'pauljouandond'),
(3, 'test', 'test', 'test@test.fr', 'test', 'test', 'test'),
(4, 'ok', 'dz', 'ok@ok.fr', 'ok', 'oktedqsdqd', 'ok'),
(5, 'd', 's', 'ss', 's', 'd', 's'),
(7, 'cjbdc', 'celia', 'hb@bbhx', 'nhxbj', 'celia', 'celia'),
(8, 'test', 'test', 'test@cd', 'test', 'test', 'testd');

-- --------------------------------------------------------

--
-- Structure de la table `orderc`
--

CREATE TABLE `orderc` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `orderc`
--

INSERT INTO `orderc` (`id`, `client_id`, `date`, `validate`) VALUES
(2, 4, '2019-04-21', 1),
(3, 4, '2019-04-21', 1),
(4, 4, '2019-04-21', 1),
(5, 4, '2019-04-21', 1),
(6, 1, '2019-04-21', 1),
(7, 1, '2019-04-21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ordersline`
--

CREATE TABLE `ordersline` (
  `product_id` int(11) NOT NULL,
  `orderc_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ordersline`
--

INSERT INTO `ordersline` (`product_id`, `orderc_id`, `price`, `quantity`) VALUES
(6, 5, '100.00', 1),
(7, 5, '180.00', 1),
(8, 2, '170.00', 1),
(8, 3, '170.00', 1),
(10, 4, '90.00', 1),
(10, 6, '90.00', 2),
(11, 7, '190.00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `description`, `stock`, `image_url`) VALUES
(6, 1, 'Nike Air Force 107', '100.00', 'La légende perdure grâce à la Nike Air Force 1 \'07, \'une version basse de l\'emblématique chaussure AF1 qui associe un style sportif classique à de flamboyantes couleurs contrastées.', 3, 'Chaussures/NikeAirForce107.png'),
(7, 1, 'Nike Air Max Deluxe', '180.00', 'La chaussure Nike Air Max Deluxe pour Homme présente un amorti Max Air léger pour un confort longue durée, tandis qu\'une combinaison de matières assure un maintien confortable.', 5, 'Chaussures/NikeAirMaxDeluxe.png'),
(8, 1, 'Nike Air Max Plus Tn', '170.00', 'La chaussure Nike Air Max Plus SE pour Homme revisite l\'amorti légendaire « Tuned » Air et les lignes dynamiques du modèle d\'origine de 1998. Elle arbore des couleurs adaptées à la saison et un motif appliqué par sublimation sur l\'empeigne tissée.', 7, 'Chaussures/NikeAirMaxPlusTn.png'),
(9, 1, 'Nike Epic React Flyknit 2', '130.00', 'Entrez dans une zone de confort avec la Nike Epic React Flyknit 2. La conception Flyknit enveloppe le pied d\'un maintien respirant. La technologie Nike React offre une foulée souple et dynamique mais aussi durable et légère.', 1, 'Chaussures/NikeFlyknit.png'),
(10, 1, 'Nike SB Zoom Janoski Prenium', '90.00', 'La Nike SB Zoom Janoski Prenium associe un look épuré à une silhouette tendance. Elle a été revisitée avec une nouvelle semelle de propreté confortable et une semelle extérieure souple pour une meilleure adhérence à la planche dès sa première utilisation.', 1, 'Chaussures/NikeJanoski.png'),
(11, 1, 'Nike Air VaporMax', '190.00', 'La chaussure de running Nike Air VaporMax pour Homme présente un amorti Air VaporMax révolutionnaire et une conception offrant un bon maintien pour un confort durable.', 9, 'Chaussures/NikeVaporMax.png'),
(12, 2, 'Casquette Ralph Lauren', '34.95', 'CLASSIC SPORT - Casquette Ralph Lauren', 5, 'Casquettes/CasquetteRalph.png'),
(13, 2, 'Casquette The North Face', '21.95', 'CLASSIC HAT - Casquette The North Face', 3, 'Casquettes/CasquetteNorthFace.png'),
(14, 2, 'Casquette Tommy Hilfiger', '37.95', 'BIG FLAG - Casquette Tommy Hilfiger', 8, 'Casquettes/CasquettteTommy.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderc`
--
ALTER TABLE `orderc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F898ED8A19EB6921` (`client_id`);

--
-- Index pour la table `ordersline`
--
ALTER TABLE `ordersline`
  ADD PRIMARY KEY (`product_id`,`orderc_id`),
  ADD KEY `IDX_98D44CE44584665A` (`product_id`),
  ADD KEY `IDX_98D44CE49FE7CD49` (`orderc_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `orderc`
--
ALTER TABLE `orderc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `orderc`
--
ALTER TABLE `orderc`
  ADD CONSTRAINT `FK_F898ED8A19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `ordersline`
--
ALTER TABLE `ordersline`
  ADD CONSTRAINT `FK_98D44CE44584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_98D44CE49FE7CD49` FOREIGN KEY (`orderc_id`) REFERENCES `orderc` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

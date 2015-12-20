-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 12 Novembre 2015 à 01:52
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `golfbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Premiere annee'),
(2, 'Deuxieme annee'),
(3, 'Troisieme annee');

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year_established` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `year_established`, `address`, `details`, `user_id`) VALUES
(1, 'Terrebonne Supreme', '2015-09-18', '1229 richard', 'Club de golf Ã  Terrebonne', 0),
(3, 'Terrebonne Plaza', '2015-10-07', '1234 des lolipop', 'asdssdgsdfs', 1),
(4, 'Terrebonne Villa', '2015-10-07', '1234 des lolipop', 'asdasdasd', 3);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Absolute Zero', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(2, 'Acid green', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(3, 'Aero', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(4, 'Alabama crimson', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(5, 'Alloy orange', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(6, 'Amaranth deep purple', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(7, 'Android green', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(8, 'Asparagus', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(9, 'Baby blue', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(10, 'Baby pink', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(11, 'Banana yellow', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(12, 'Bangladesh green', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(13, 'Battleship grey', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(14, 'Big dip o’ruby', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(15, 'Bistre brown', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(16, 'Bittersweet shimmer', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(17, 'Cadmium yellow', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(18, 'Catalina blue', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(19, 'Charcoal', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(20, 'Dark blue-gray', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(21, 'Dark orange', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(22, 'Eerie black', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(23, 'Electric purple', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(24, 'Emerald', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(25, 'Falu red', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(26, 'Fandango pink', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(27, 'Firebrick', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(28, 'Slate gray', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(29, 'Thulian pink', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(30, 'Raspberry', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(31, 'Ruby', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(32, 'Mahogany', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(33, 'Isabelline', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(34, 'Pumpkin', '2015-11-10 18:09:40', '2015-11-10 18:09:40'),
(35, 'Pistachio', '2015-11-10 18:09:40', '2015-11-10 18:09:40');

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lessons`
--

INSERT INTO `lessons` (`id`, `member_id`, `name`, `date`, `fee_amount`, `subcategory_id`) VALUES
(2, 1, 'Premiere lesson', '2015-09-24', 5, 8),
(3, 1, 'asfsdfsdfs', '2015-11-11', 43, 3);

-- --------------------------------------------------------

--
-- Structure de la table `lockers`
--

CREATE TABLE `lockers` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `rental_amount` int(11) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lockers`
--

INSERT INTO `lockers` (`id`, `club_id`, `location`, `rental_amount`, `details`) VALUES
(1, 1, '3eme etage', 5, 'Bleu'),
(2, 1, '2ieme etage', 10, 'Jaune');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `member_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `club_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `member_image`) VALUES
(1, 1, 'Trista', 'Santerre', '438-429-6052', 'tristan.santerre@live.ca', '2037 cote terrebonne', 'uploads/1941c27f54ca5a0d96e6e195254793a6.jpg'),
(4, 1, 'Malik', 'Mottawi', '450-434-54345', 'lhskdlfksjdf@ghotmail.com', '2341 des vents', '');

-- --------------------------------------------------------

--
-- Structure de la table `members_lockers`
--

CREATE TABLE `members_lockers` (
  `id` int(11) NOT NULL,
  `locker_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rented_from_date` date NOT NULL,
  `rented_to_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members_lockers`
--

INSERT INTO `members_lockers` (`id`, `locker_id`, `member_id`, `rented_from_date`, `rented_to_date`) VALUES
(1, 1, 1, '2015-09-18', '2015-09-20'),
(3, 2, 1, '0000-00-00', '0000-00-00'),
(6, 1, 4, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`) VALUES
(1, 1, 'Expliquation des regles'),
(2, 1, 'Expliquation des batons'),
(3, 1, 'Premier examen'),
(4, 2, 'Technique de départ'),
(5, 2, 'Technique de poter'),
(6, 2, 'Deuxieme examen'),
(7, 3, 'Entretien des batons'),
(8, 3, 'Examination des terrains'),
(9, 3, 'Dernier examen');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`, `active`) VALUES
(1, 'admin', '$2a$10$gyHbAs8tcLls9avuA1vAk.mJqcu5PywM3c28sCqN1SasQdDSTJIkC', 'admin', 'admin@admin.com', '2015-09-24', '2015-11-11', 1),
(21, 'user', '$2a$10$5Hw5ZbYhzswGrXddQrFSvO/WepfTPPb1IvirP7z5jerg83twIS.We', 'visiteur', 'tristan.santerre@live.ca', '2015-11-11', '2015-11-11', 1),
(22, 'user1', '$2a$10$Hbxf6m6J3vMUS3YMrPtwHOxwSzwOYM1kO6wyxRTz6u5QpJG8PqjGe', 'visiteur', 'tristan.santerre@live.ca', '2015-11-11', '2015-11-11', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members_lockers`
--
ALTER TABLE `members_lockers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `lockers`
--
ALTER TABLE `lockers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `members_lockers`
--
ALTER TABLE `members_lockers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `categories` (
  `id` INTEGER PRIMARY KEY ASC,
  `name` TEXT
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `name` TEXT,
  `year_established` TEXT,
  `address` TEXT,
  `details` TEXT,
  `user_id` INTEGER
);

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `year_established`, `address`, `details`, `user_id`) VALUES
(1, 'Terrebonne Supreme', '2015-09-18', '1229 richard', 'Club de golf Ã  Terrebonne', 1),
(3, 'Terrebonne Plaza', '2015-10-07', '1234 des lolipop', 'asdssdgsdfs', 1),
(4, 'Terrebonne Villa', '2015-10-07', '1234 des lolipop', 'asdasdasd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `id` INTEGER PRIMARY KEY ASC,
  `name` TEXT,
  `created` TEXT,
  `modified` TEXT
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `member_id` INTEGER,
  `name` TEXT,
  `date` TEXT,
  `fee_amount` INTEGER,
  `subcategory_id` INTEGER
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `club_id` INTEGER,
  `location` TEXT,
  `rental_amount` INTEGER,
  `details` TEXT
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `club_id` INTEGER,
  `first_name` TEXT,
  `last_name` TEXT,
  `phone` TEXT,
  `email` TEXT,
  `address` TEXT,
  `member_image` TEXT
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `locker_id` INTEGER,
  `member_id` INTEGER,
  `rented_from_date` TEXT,
  `rented_to_date` TEXT
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `category_id` INTEGER,
  `name` TEXT
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `username` TEXT,
  `password` TEXT,
  `role` TEXT,
  `email` TEXT,
  `created` TEXT,
  `modified` TEXT,
  `active` INTEGER
);

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
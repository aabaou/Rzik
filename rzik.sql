-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Septembre 2017 à 08:33
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rzik`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text,
  `Musics_id` int(11) NOT NULL,
  `Users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musics`
--

CREATE TABLE `musics` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `artiste` varchar(45) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `ecoute` int(11) DEFAULT NULL,
  `lentgth` int(11) DEFAULT NULL,
  `cover` varchar(150) DEFAULT NULL,
  `compositeur` varchar(45) DEFAULT NULL,
  `download` tinyint(4) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description` text,
  `file` varchar(150) DEFAULT NULL,
  `explicit` tinyint(4) DEFAULT NULL,
  `genres` varchar(255) DEFAULT NULL,
  `Users_id` int(11) NOT NULL,
  `track` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `description` text,
  `Users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `playlists_musics`
--

CREATE TABLE `playlists_musics` (
  `Playlists_id` int(11) NOT NULL,
  `Musics_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `r_genres`
--

CREATE TABLE `r_genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `r_genres`
--

INSERT INTO `r_genres` (`id`, `genre`) VALUES
(1, 'Hip/Hop'),
(2, 'RnB'),
(3, 'Rap'),
(4, 'Metal'),
(5, 'Trap'),
(6, 'Dubstep'),
(7, 'House'),
(8, 'Jazz'),
(9, 'Pop'),
(10, 'EDM'),
(11, 'Zouk'),
(12, 'Rock');

-- --------------------------------------------------------

--
-- Structure de la table `r_roles`
--

CREATE TABLE `r_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `r_roles`
--

INSERT INTO `r_roles` (`id`, `role`) VALUES
(1, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `r_roles_id` int(11) NOT NULL,
  `trackm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `username`, `r_roles_id`, `trackm`) VALUES
(1, 'cyril@gmail.com', 'azerty', 'azerty', 1, 'dfhjhsgfedzss'),
(3, 'cyrilbaril@gmail.com', 'fa6unbu4', 'freebox', 1, '84d2c09491e835e6b2260b16b07e413a31fe0360'),
(4, 'cyrilbaril@gmail.com', 'NeQki', 'freebox', 1, 'e42ca1eecc69194485629eeb6d8e7f3b0fdedd42'),
(5, 'cyrilbaril@gmail.com', 'iunQ6o8', 'freebox', 1, '0b4f68002794198a7f350839f8fe6658228e2f00'),
(6, 'cyrilbaril@gmail.com', 'FbcV8GZVhW', 'freebox', 1, 'bc91d1a98b9e6e667a3a58872c05208c9ba0824d'),
(7, 'cyrilbaril@gmail.com', '8e5DsHRT', 'freebox', 1, '401455bb2e8cbfeae631b44504e82aa5d6fcf3a9'),
(8, 'cyrilbaril@gmail.com', '7C2MH', 'freebox', 1, '73916014d312cc268220e125a114e83c758df229'),
(9, 'cyrilbaril@gmail.com', 'NNBvRaBzUn', 'freebox', 1, '64073521739b9411967a901f515ad17cd96f1e7f'),
(10, 'cyrilbaril@gmail.com', 'jboiDFGAY', 'freebox', 1, 'ce5bc8b59cac2f67006f313b4129e1ae723b0068'),
(11, 'cyrilbaeril@gmail.com', 'G8rrLgkY', 'freebox', 1, '83949302f64168684f0d81f94e79b4b133b008c0'),
(12, 'cyrilbaezril@gmail.com', '2FfHBGyRQ', 'freebox', 1, '4c3cf180e9ae00089a00a8992c67e84452868f2b'),
(13, 'cyrilbaezrrtil@gmail.com', 'LJkKPjZ3', 'freebox', 1, 'd5a2d3f894adf1b83c44d1b976eeace0a8462119'),
(14, 'cyrilbeaezrrtil@gmail.com', 'iYzbB', 'freebox', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(15, 'cyrilbeaeezrrtil@gmail.com', '7NCYXkkLox', 'freebox', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(16, 'cyrille7@yopmail.com', 'Htm3aHC', 'azert', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(17, 'cyrille@yopmail.com', 'kgPG4', 'az', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(18, 'cyrillez@yopmail.com', 'sHgjcc', 'az', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(19, 'cyrilleza@yopmail.com', 'pTQWf18', 'az', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(20, 'cyrille7az@yopmail.com', 'HXue7T1k', 'cyrille', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(21, 'cyrille7azA@yopmail.com', 'bn8CqPJ9C', 'cyrille', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(22, 'cyrilleaze@yopmail.com', 'WzPuyo', 'azerty', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(23, 'cyrilbarilazert@gmail.com', 'NNamstve1Y', 'q', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4'),
(24, 'azerty@hotmail.com', 'MNz9FKH', 'azerty', 1, 'dd5ad8ddaa4398268a4bca13ac0268c142181cd4');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Comments_Musics1_idx` (`Musics_id`),
  ADD KEY `fk_Comments_Users1_idx` (`Users_id`);

--
-- Index pour la table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Musics_Users1_idx` (`Users_id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Playlists_Users1_idx` (`Users_id`);

--
-- Index pour la table `playlists_musics`
--
ALTER TABLE `playlists_musics`
  ADD PRIMARY KEY (`Playlists_id`,`Musics_id`),
  ADD KEY `fk_Playlists_has_Musics_Musics1_idx` (`Musics_id`),
  ADD KEY `fk_Playlists_has_Musics_Playlists1_idx` (`Playlists_id`);

--
-- Index pour la table `r_genres`
--
ALTER TABLE `r_genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `r_roles`
--
ALTER TABLE `r_roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Users_r_roles1_idx` (`r_roles_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `r_genres`
--
ALTER TABLE `r_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `r_roles`
--
ALTER TABLE `r_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_Comments_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `musics`
--
ALTER TABLE `musics`
  ADD CONSTRAINT `fk_Musics_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `fk_Playlists_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_r_roles1` FOREIGN KEY (`r_roles_id`) REFERENCES `r_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 15 nov. 2022 à 12:54
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `puissance4`
--

-- --------------------------------------------------------

--
-- Structure de la table `difficulty`
--

CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `difficulty`
--

INSERT INTO `difficulty` (`id`, `level`) VALUES
(1, 'Facile'),
(2, 'Intermédiaire'),
(3, 'Expert'),
(4, 'Impossible');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `game_name`) VALUES
(1, 'The Power Of Memory');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_game`, `id_user`, `message`, `date_message`) VALUES
(1, 1, 3, 'J\'ai envoyé un message', '2022-11-13 20:36:07'),
(2, 1, 5, 'Moi aussi', '2022-11-11 19:36:40'),
(3, 1, 3, 'Ce message a été envoyé le 12 novembre 2022', '2022-11-12 09:11:49'),
(4, 1, 4, 'Hello', '2022-11-14 19:55:29'),
(5, 1, 3, 'Ce message est plus vieux que l\'autre', '2022-11-14 16:46:32');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_difficulty` int(11) NOT NULL,
  `score` float NOT NULL,
  `date_game` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `id_user`, `id_game`, `id_difficulty`, `score`, `date_game`) VALUES
(1, 3, 1, 1, 30, '2022-11-03 15:41:23'),
(2, 3, 1, 3, 56, '2022-11-04 08:08:55'),
(3, 5, 1, 1, 18, '2022-11-04 08:15:40'),
(4, 5, 1, 4, 127, '2022-11-04 08:15:53'),
(5, 4, 1, 2, 34, '2022-11-04 08:16:05'),
(6, 4, 1, 1, 3, '2022-11-04 08:16:28'),
(7, 5, 1, 2, 22, '2022-11-10 08:25:25'),
(8, 3, 1, 4, 355, '2022-11-10 08:25:25'),
(9, 4, 1, 3, 87, '2022-11-10 08:26:07'),
(10, 5, 1, 1, 2, '2022-11-10 08:26:07'),
(12, 5, 1, 3, 45, '2022-11-10 08:28:54');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date_last_connexion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `date_inscription`, `date_last_connexion`) VALUES
(3, 'bvitour2004@gmail.com', 'p4s5W0rD', 'Basvit', '2022-11-03 15:28:26', '2022-11-14 09:16:03'),
(4, 'sylvian@gmail.com', '\"\'!ryhdp0', 'SylvOr', '2022-11-04 08:13:59', '2022-11-04 08:13:59'),
(5, 'florian@gmail.com', '\"!rèfyh\'t54', 'Florianrcht', '2022-11-04 08:14:33', '2022-11-04 08:14:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game` (`id_game`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_game` (`id_game`),
  ADD KEY `id_difficulty` (`id_difficulty`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `score_ibfk_3` FOREIGN KEY (`id_difficulty`) REFERENCES `difficulty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

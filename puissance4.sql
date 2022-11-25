-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 25 nov. 2022 à 13:32
-- Version du serveur : 5.7.34
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
(1, 'Power of Memory');

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
(173, 1, 61, 'test', '2022-11-25 12:47:46'),
(174, 1, 3, 'BONJOUR', '2022-11-25 12:54:40'),
(175, 1, 62, 'fqefef', '2022-11-25 13:17:41'),
(176, 1, 61, 'azazd', '2022-11-25 13:19:23'),
(177, 1, 61, 'azdazd', '2022-11-25 13:19:43'),
(178, 1, 61, 'azdazdazd', '2022-11-25 13:20:46');

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
(129, 43, 1, 1, 999, '2022-11-24 20:52:15'),
(130, 61, 1, 3, 61, '2022-11-25 09:24:11'),
(131, 61, 1, 1, 44, '2022-11-25 09:29:44'),
(132, 61, 1, 1, 77, '2022-11-25 10:04:31'),
(133, 61, 1, 1, 10, '2022-11-25 10:10:04'),
(134, 61, 1, 1, 25, '2022-11-25 10:14:55'),
(135, 61, 1, 1, 24, '2022-11-25 10:25:51'),
(136, 61, 1, 1, 53, '2022-11-25 13:27:41'),
(137, 62, 1, 1, 65, '2022-11-25 14:16:22'),
(138, 62, 1, 1, 33, '2022-11-25 14:30:03');

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
(3, 'bvitour2004@gmail.com', 'p4s5W0rD', 'Basvit', '2022-11-03 15:28:26', '2022-11-03 16:28:26'),
(4, 'sylvian.vidal95@gmail.com', 'A1aaaaaaaa@', 'SylvOr', '2022-11-04 08:13:59', '2022-11-11 18:21:27'),
(43, 'aaa@gmail.com', '96c812ce0df00c578f05f3029085165f194ae2c7ee99174b3afaab8935411221', 'lzefnlzkn', '2022-11-16 09:55:20', '2022-11-16 09:55:20'),
(57, 'sylvian.zefzfzvidal95@gmail.com', '2f54e2ca52b8109372f7de594164ed15418c27df7f7f9f403541839a9e4ee175', 'aaaaa', '2022-11-16 15:21:34', '2022-11-16 15:21:34'),
(59, 'sylvian.vidal95@gmail.com', '69065eb716831d15a31157e688c2bdf83b386fd7ae7515b18f350f90edfa9116', 'abcd', '2022-11-16 20:28:27', '2022-11-16 21:28:36'),
(60, 'sylvi95@gmail.com', '4685aa187b573198e3175d1f6fa7e8c9ac8340c8f2fb25901ba4be6a430c9de0', 'phppro', '2022-11-24 09:52:32', '2022-11-24 19:21:28'),
(61, 'abcd@gmail.com', '96c812ce0df00c578f05f3029085165f194ae2c7ee99174b3afaab8935411221', 'abcdefg', '2022-11-24 19:36:14', '2022-11-25 14:19:13'),
(62, 'test@gmail.com', 'b6a6fa2364ce1d37898a06c32f092da1a3b63dcf8331fdbf3c03e8f079e16ee5', 'test', '2022-11-25 13:10:44', '2022-11-25 14:22:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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

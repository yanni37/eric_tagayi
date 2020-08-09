-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 16 juil. 2020 à 19:49
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `erictagayi`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`) VALUES
(1, 'soins'),
(2, 'machines');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `contenue` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `sujet`, `contenue`, `date`) VALUES
(4, 'yanni914@hotmail.com', 'entorse cheville', 'bonjour, j\'ai une ordonnance pour 10 séances j\'aimerais savoir si vous avez des disponibilités.', '2020-07-16 12:39:13'),
(12, 'aaa@aaa', 'aaaaaaa', 'aaaaaaaaaaaaaaaa', '2020-07-16 17:07:06');

-- --------------------------------------------------------

--
-- Structure de la table `soin`
--

CREATE TABLE `soin` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `soin`
--

INSERT INTO `soin` (`id`, `titre`, `contenu`, `image`, `category`) VALUES
(26, 'Concept Sohier', 'Kinésithérapie Analytique cherchant à agir sur la cause même du problème par des manipulations articulaires pour rétablir une cinématique normale.', 'soins_1.jpg', 1),
(27, 'Concept Maitland', 'Concept de Thérapie Manuelle Australien visant à traiter des dysfonctions articulaires, musculaire ou nerveuses par des techniques de mobilisations et de manipulations du rachis et des membres', 'soins_2.jpg', 1),
(28, 'TRX: Total Resistance eXercice', 'Entrainement en suspension grâce à deux sangles non élastiques et au poids de son propre corps. Permet un renforcement musculaire global et un travail sur votre équilibre', 'machine_1.jpg', 2),
(29, 'Rééducation Périnéo-Spinctérienne', 'Rééducation manuelle ou avec une sonde permettant de tonifier son périnée en post-partum, prévenir les incontinences, ou encore intervenir suite à une opération de la prostate chez l’homme.', 'machine_2.jpg', 2),
(30, 'Pressothérapie', 'Appareillage de drainage que l’on peut utiliser en complément lors d’un drainage lymphatique manuel.', 'machine_3.jpg', 2),
(31, 'R.P.G.', 'La Reprogrammation Posturale Globale est une approche de la kinésithérapie qui s’intéresse aux conséquences des troubles mécaniques  par une correction des postures et de\r\n\r\nl’équilibrage des chaînes musculaires', 'soins_3.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activated` tinyint(4) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `activated`, `role`) VALUES
(1, 'admin@admin', '$2y$10$qTmIw15DRODqMS9yW6yUv.bAFmVYLss8f8Q2ik0E2Mo7KI3qPVohu', 1, '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `soin`
--
ALTER TABLE `soin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `soin`
--
ALTER TABLE `soin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `soin`
--
ALTER TABLE `soin`
  ADD CONSTRAINT `soin_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

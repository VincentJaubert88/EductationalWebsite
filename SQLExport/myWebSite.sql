-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 nov. 2020 à 16:31
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myWebSite`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dateComment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `author`, `comment`, `dateComment`) VALUES
(1, 1, 'VincentJ', 'Ceci est un commentaire.', '2020-11-04 17:38:34'),
(2, 1, 'VincentJ', 'Ceci est un deuxième commentaire.', '2020-11-06 16:34:53'),
(3, 1, 'VincentJ', 'Ceci est un troisième commentaire.', '2020-11-06 16:40:40');

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `groupe_id` int(11) NOT NULL,
  `type_compte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`groupe_id`, `type_compte`) VALUES
(1, 'membre'),
(2, 'administrateur'),
(3, 'moderateur');

-- --------------------------------------------------------

--
-- Structure de la table `guestBook`
--

CREATE TABLE `guestBook` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `dateMessage` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `guestBook`
--

INSERT INTO `guestBook` (`Id`, `Name`, `Message`, `dateMessage`) VALUES
(1, 'Vincent', 'Le site marche', '2020-10-25 00:00:00'),
(2, 'Vincentj', 'Super, mon site marche!', '2020-10-25 00:00:00'),
(3, 'Vincentj', 'Ca marche toujours!', '2020-10-25 00:00:00'),
(4, 'Vincentj', 'Ca marche toujours!', '2020-10-25 00:00:00'),
(5, 'Vincentj', 'Ca marche complètement', '2020-10-25 00:00:00'),
(6, 'VincentJ', 'Un petit dernier', '2020-10-25 00:00:00'),
(7, 'VincentJ', 'Un petit dernier', '2020-10-25 00:00:00'),
(8, 'VincentJ', 'Vraiment le dernier!', '2020-10-25 00:00:00'),
(10, 'prout', '', '2020-10-25 00:00:00'),
(11, 'Vincentj', 'nouveau message à la bonne date', '2020-10-25 00:00:00'),
(12, 'VIncentJ', 'nouveau message à la bonne date 2', '2020-10-25 00:00:00'),
(13, 'Vincentj', 'nouveau message à la bonne date', '2020-10-25 11:33:16'),
(14, 'VincentJ', 'Test', '2020-11-02 15:46:15'),
(15, 'vincentj', 'test', '2020-11-02 15:46:39');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `groupe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`, `groupe_id`) VALUES
(1, 'john', 'john', 'john@gmail.com', '2020-10-27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateMessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `dateMessage`) VALUES
(1, 'Ma première news!', 'Vous avez le privilège de lire ma première news!', '0000-00-00 00:00:00'),
(4, 'Ma deuxième news!', 'Toujours un privilège!', '0000-00-00 00:00:00'),
(5, 'Ma troisième news!', 'Ceci est ma troisième news!', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`groupe_id`);

--
-- Index pour la table `guestBook`
--
ALTER TABLE `guestBook`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `groupe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `guestBook`
--
ALTER TABLE `guestBook`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

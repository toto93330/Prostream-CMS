-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 06 déc. 2021 à 11:28
-- Version du serveur : 5.7.33
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prostream`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `subjectid` int(11) NOT NULL,
  `actived` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact_subject`
--

CREATE TABLE `contact_subject` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'LetsPlayMatsu.fr',
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'contact@letsplaymatsu.fr',
  `logo` varchar(255) NOT NULL DEFAULT '/asset/img/logo.png',
  `googleapi` varchar(255) NOT NULL,
  `maintenance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `general`
--

INSERT INTO `general` (`id`, `title`, `description`, `email`, `logo`, `googleapi`, `maintenance`) VALUES
(1, 'LetsPlayMatsu.fr', 'Créateur de contenu vidéo / French Streamer and Videomaker', 'contact@letsplaymatsu.fr', '/upload/img/c523f845208c831a2f9f9d5496278e59.png', 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `modul_calendar`
--

CREATE TABLE `modul_calendar` (
  `id` int(11) NOT NULL,
  `dayID` int(11) NOT NULL,
  `starteventat` time NOT NULL,
  `endeventat` time NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `week` int(11) NOT NULL,
  `isfullday` int(11) NOT NULL DEFAULT '0',
  `actived` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modul_calendar_day`
--

CREATE TABLE `modul_calendar_day` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modul_calendar_day`
--

INSERT INTO `modul_calendar_day` (`id`, `name`) VALUES
(3, 'Lundi'),
(4, 'Mardi'),
(5, 'Mercredi'),
(6, 'Jeudi'),
(7, 'Vendredi'),
(8, 'Samedi'),
(9, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `modul_commands`
--

CREATE TABLE `modul_commands` (
  `id` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL DEFAULT '0',
  `command` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cost` varchar(255) NOT NULL,
  `actived` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modul_commands_category`
--

CREATE TABLE `modul_commands_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modul_donation`
--

CREATE TABLE `modul_donation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Donation',
  `content` text NOT NULL,
  `linkdonationpaypal` varchar(255) NOT NULL DEFAULT 'https://www.paypal.com/biz/fund?id=JWGZHLSXJMTFY',
  `linkdonationstreamlab` varchar(255) NOT NULL DEFAULT 'https://streamlabs.com/letsplaymatsu/tip',
  `actived` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modul_donation`
--

INSERT INTO `modul_donation` (`id`, `title`, `content`, `linkdonationpaypal`, `linkdonationstreamlab`, `actived`) VALUES
(1, 'Donation', '<p>Votre envie de me faire un don doit venir de vous et de vous seul, ce n&#39;est pas obligatoire ! Petit ou gros montant, c&#39;est l&#39;intention qui compte &ccedil;a me permettra de me payer un caf&eacute;.</p>\r\n', 'https://www.paypal.com/biz/fund?id=JWGZHLSXJMTFY', 'https://streamlabs.com/letsplaymatsu/tip', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modul_extension`
--

CREATE TABLE `modul_extension` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Ne ratez plus aucun live',
  `content` text NOT NULL,
  `linkextensionfirefox` varchar(255) NOT NULL DEFAULT '#',
  `linkextensionchrome` varchar(255) NOT NULL DEFAULT '#',
  `actived` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modul_extension`
--

INSERT INTO `modul_extension` (`id`, `title`, `content`, `linkextensionfirefox`, `linkextensionchrome`, `actived`) VALUES
(1, 'Ne ratez plus aucun live', '<p>Si vous souhaitez ne rater aucun live et &ecirc;tre au courant d&egrave;s que je commence &agrave; streamer, t&eacute;l&eacute;chargez l&rsquo;extension de votre choix ! L&rsquo;ic&ocirc;ne de l&rsquo;extension passe au vert quand je suis est en live. Cliquez dessus lorsqu&rsquo;elle est verte pour acc&eacute;der au stream. !</p>\r\n', '#', '#', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modul_page`
--

CREATE TABLE `modul_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'PROJETS / BIO',
  `content` text NOT NULL,
  `actived` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modul_page`
--

INSERT INTO `modul_page` (`id`, `title`, `content`, `actived`) VALUES
(1, 'PROJETS / BIO', '<p>test</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modul_twitch`
--

CREATE TABLE `modul_twitch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'letsplaymatsu',
  `linksubcribe` varchar(255) NOT NULL DEFAULT '#',
  `linkbits` varchar(255) NOT NULL DEFAULT '#',
  `linkreplay` varchar(255) NOT NULL DEFAULT '#',
  `linkshop` varchar(255) NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modul_twitch`
--

INSERT INTO `modul_twitch` (`id`, `name`, `linksubcribe`, `linkbits`, `linkreplay`, `linkshop`) VALUES
(1, 'letsplaymatsu', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `social`
--

INSERT INTO `social` (`id`, `name`, `icon`, `link`) VALUES
(6, 'Facebook', '<i class=\"fab fa-facebook-f\"></i>', '#');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `rank` int(11) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `avatar`, `password`, `rank`, `banned`) VALUES
(22, 'root@root.fr', '/upload/img/b87d2f386c01b55282288207e213fb96.jpg', '$2y$10$lxWIgLb2F0wHFlnnzoFHcutPyj/uFzWYuOiskI2kkllELP7FPeJda', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_rank`
--

CREATE TABLE `user_rank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_rank`
--

INSERT INTO `user_rank` (`id`, `name`) VALUES
(1, 'USER'),
(2, 'ADMIN'),
(3, 'VIP');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subjectid`);

--
-- Index pour la table `contact_subject`
--
ALTER TABLE `contact_subject`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modul_calendar`
--
ALTER TABLE `modul_calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day` (`dayID`),
  ADD KEY `day_2` (`dayID`);

--
-- Index pour la table `modul_calendar_day`
--
ALTER TABLE `modul_calendar_day`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modul_commands`
--
ALTER TABLE `modul_commands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`categoryID`);

--
-- Index pour la table `modul_commands_category`
--
ALTER TABLE `modul_commands_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modul_donation`
--
ALTER TABLE `modul_donation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modul_extension`
--
ALTER TABLE `modul_extension`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modul_page`
--
ALTER TABLE `modul_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modul_twitch`
--
ALTER TABLE `modul_twitch`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rank` (`rank`);

--
-- Index pour la table `user_rank`
--
ALTER TABLE `user_rank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact_subject`
--
ALTER TABLE `contact_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `modul_calendar`
--
ALTER TABLE `modul_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `modul_calendar_day`
--
ALTER TABLE `modul_calendar_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `modul_commands`
--
ALTER TABLE `modul_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `modul_commands_category`
--
ALTER TABLE `modul_commands_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `modul_donation`
--
ALTER TABLE `modul_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `modul_extension`
--
ALTER TABLE `modul_extension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `modul_page`
--
ALTER TABLE `modul_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `modul_twitch`
--
ALTER TABLE `modul_twitch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `user_rank`
--
ALTER TABLE `user_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `contact_subject` (`id`);

--
-- Contraintes pour la table `modul_calendar`
--
ALTER TABLE `modul_calendar`
  ADD CONSTRAINT `modul_calendar_ibfk_1` FOREIGN KEY (`dayID`) REFERENCES `modul_calendar_day` (`id`);

--
-- Contraintes pour la table `modul_commands`
--
ALTER TABLE `modul_commands`
  ADD CONSTRAINT `modul_commands_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `modul_commands_category` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rank`) REFERENCES `user_rank` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

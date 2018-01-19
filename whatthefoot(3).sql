-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 19 jan. 2018 à 08:39
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `whatthefoot`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

DROP TABLE IF EXISTS `amis`;
CREATE TABLE IF NOT EXISTS `amis` (
  `idAmi1` int(11) NOT NULL,
  `idAmi2` int(11) NOT NULL,
  KEY `idAmi1` (`idAmi1`),
  KEY `idAmi2` (`idAmi2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `Nom` varchar(45) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `Birth` date DEFAULT NULL,
  `Ville` varchar(45) DEFAULT NULL,
  `Rue` varchar(45) DEFAULT NULL,
  `Numero` int(45) DEFAULT NULL,
  `Avatar` varchar(45) DEFAULT NULL,
  `Poste` varchar(45) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `Pseudo`, `mdp`, `mail`, `Nom`, `Prenom`, `Birth`, `Ville`, `Rue`, `Numero`, `Avatar`, `Poste`, `Description`) VALUES
(7, 'nemboy', 'ez', 'nicolas@mail', 'Dang', 'Nicolas', '1996-01-24', 'Bailly', 'Rue de la sellotte', 25, '7', 'Tout', 'bonjour'),
(8, 'adsy', 'h1z1', 'sama@mail', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `Destinataire` int(11) NOT NULL,
  `commentaireAssocié` varchar(45) NOT NULL,
  `Expediteur` int(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `Destinataire` (`Destinataire`),
  KEY `Expediteur` (`Expediteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `Stade` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `NomEvent` varchar(45) NOT NULL,
  `Stadecol` varchar(45) NOT NULL,
  `nbParticipant` int(11) NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `Stade` (`Stade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`idEvent`, `Stade`, `Date`, `NomEvent`, `Stadecol`, `nbParticipant`) VALUES
(1, 1, '2017-12-28 08:09:12', 'Foot Des Bros', '', 5);

-- --------------------------------------------------------

--
-- Structure de la table `markers`
--

DROP TABLE IF EXISTS `markers`;
CREATE TABLE IF NOT EXISTS `markers` (
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  UNIQUE KEY `PRIMARY KEY` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `markers`
--

INSERT INTO `markers` (`name`, `address`, `lat`, `lng`, `type`) VALUES
('Vélodrome', '5 rue des allouettes', 43.270000, 5.395000, 'Football'),
('Parc des Princes', '5 rue des tanches', 48.830002, 2.253000, 'Football'),
('La Meinau', '5 Rue Tunnel Inc', 48.556000, 7.752900, 'Football'),
('Jounaid Stadium', '5 Rue Tunnel Inc', 48.841000, 2.599100, 'Football');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `IdEvent` int(11) NOT NULL,
  `IdParticipant` int(11) NOT NULL,
  KEY `participant_ibfk_1` (`IdEvent`),
  KEY `IdParticipant` (`IdParticipant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stade`
--

DROP TABLE IF EXISTS `stade`;
CREATE TABLE IF NOT EXISTS `stade` (
  `idStade` int(11) NOT NULL AUTO_INCREMENT,
  `disponibilité` tinyint(1) NOT NULL DEFAULT '0',
  `ville` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `stadecol` varchar(45) NOT NULL,
  PRIMARY KEY (`idStade`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stade`
--

INSERT INTO `stade` (`idStade`, `disponibilité`, `ville`, `adresse`, `nom`, `stadecol`) VALUES
(1, 0, 'Noisy Champs', '11 Rue Parc Des Princes', 'Jounaid Stadium', ''),
(2, 0, 'Marseille', '13 Rue des Sardines', 'Velodrome ', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amis_ibfk_1` FOREIGN KEY (`idAmi1`) REFERENCES `client` (`idClient`) ON DELETE CASCADE,
  ADD CONSTRAINT `amis_ibfk_2` FOREIGN KEY (`idAmi2`) REFERENCES `client` (`idClient`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`Destinataire`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`Expediteur`) REFERENCES `event` (`idEvent`);

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`Stade`) REFERENCES `stade` (`idStade`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`IdEvent`) REFERENCES `event` (`idEvent`) ON DELETE CASCADE,
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`IdParticipant`) REFERENCES `client` (`idClient`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

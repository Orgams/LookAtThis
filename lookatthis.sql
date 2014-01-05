-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 05 Janvier 2014 à 14:06
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lookatthis`
--
CREATE DATABASE IF NOT EXISTS `lookatthis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lookatthis`;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `couleur` varchar(7) NOT NULL,
  `typePersonne` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`ID`, `nom`, `couleur`, `typePersonne`) VALUES
(1, '&Eacute;milie', '#BA55DD', 1),
(2, 'No&eacute;mie', '#1E90FF', 1),
(3, 'colocation', '#FF0000', 0);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE IF NOT EXISTS `lien` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `ID_site` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`ID`, `url`, `titre`, `ID_site`) VALUES
(1, 'https://hall.com/rooms/523d0feb9b7360a4359fd579', 'Hall', 1),
(2, 'https://habitrpg.com/#/tasks', 'HabitRPG | Your Life The Role Playing Game', 2);

-- --------------------------------------------------------

--
-- Structure de la table `lien_groupe`
--

CREATE TABLE IF NOT EXISTS `lien_groupe` (
  `ID_lien` int(11) NOT NULL,
  `ID_groupe` int(11) NOT NULL,
  `vue` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_lien`,`ID_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lien_groupe`
--

INSERT INTO `lien_groupe` (`ID_lien`, `ID_groupe`, `vue`) VALUES
(1, 1, 0),
(2, 1, 1),
(2, 2, 1),
(2, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `favicone` varchar(255) NOT NULL,
  `couleur` varchar(7) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`ID`, `url`, `favicone`, `couleur`) VALUES
(1, 'https://hall.com/', 'http://www.google.com/s2/favicons?domain=https://hall.com/', '#20b3e2'),
(2, 'https://habitrpg.com/', 'http://www.google.com/s2/favicons?domain=https://habitrpg.com/', '#735b3e');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `pseudonyme` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `mail`, `pseudonyme`, `Pass`) VALUES
(1, 'orgams.7@gmail.com', 'Orgams', '026541');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_groupe`
--

CREATE TABLE IF NOT EXISTS `utilisateur_groupe` (
  `ID_utilisateur` int(11) NOT NULL,
  `ID_groupe` int(11) NOT NULL,
  PRIMARY KEY (`ID_utilisateur`,`ID_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur_groupe`
--

INSERT INTO `utilisateur_groupe` (`ID_utilisateur`, `ID_groupe`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_lien`
--

CREATE TABLE IF NOT EXISTS `utilisateur_lien` (
  `ID_utilisateur` int(11) NOT NULL,
  `ID_lien` int(11) NOT NULL,
  `dateCrea` datetime NOT NULL,
  PRIMARY KEY (`ID_utilisateur`,`ID_lien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur_lien`
--

INSERT INTO `utilisateur_lien` (`ID_utilisateur`, `ID_lien`, `dateCrea`) VALUES
(1, 1, '2014-01-04 04:30:32'),
(1, 2, '2014-01-03 09:32:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

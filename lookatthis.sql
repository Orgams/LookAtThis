-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 20 Mars 2014 à 11:50
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`ID`, `nom`, `couleur`, `typePersonne`) VALUES
(1, '&Eacute;milie', '#BA55DD', 1),
(2, 'No&eacute;mie', '#1E90FF', 1),
(3, 'colocation', '#FF0000', 0),
(4, 'Alain', '#ff8080', 1),
(5, 'geek', '#008000', 0),
(6, 'Mihai', '#ffff00', 1),
(7, 'Fred G', '#ff8040', 1),
(9, 'parent', '#8080ff', 0),
(10, 'Claire', '#ff0080', 1),
(11, 'Sylvie', '#0080ff', 1),
(12, 'Mael', '#000000', 1),
(13, 'boulot', '#ff0080', 0),
(14, 'Minion', '#ff80ff', 0),
(15, 'RUSSE', '#ff0000', 0),
(20, 'TEST', '#000000', 0),
(21, 'WTF', '#ff0000', 0);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_groupe`
--

CREATE TABLE IF NOT EXISTS `groupe_groupe` (
  `groupePere` int(11) NOT NULL,
  `groupeFils` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`ID`, `url`, `titre`, `ID_site`) VALUES
(1, 'https://hall.com/rooms/523d0feb9b7360a4359fd579', 'Hall', 1),
(2, 'https://habitrpg.com/#/tasks', 'HabitRPG | Your Life The Role Playing Game', 2),
(3, 'http://fr.openclassrooms.com/informatique/cours/concevez-votre-site-web-avec-php-et-mysql/les-fonctions-de-gestion-des-dates', ' Les fonctions de gestion des dates\n', 3),
(4, 'http://dailygeekshow.com/2014/01/05/embarquez-pour-un-voyage-givre-dans-une-camionnette-taillee-integralement-dans-la-glace/', 'Embarquez pour un voyage givr&eacute; dans une camionnette taill&eacute;e int&eacute;gralement dans la glace | Daily Geek Show', 4),
(5, 'http://dailygeekshow.com/2013/12/17/ces-incroyables-meubles-suspendus-tiennent-seulement-grace-a-la-tension-exercee-par-des-cables-tendus/', 'Ces incroyables meubles suspendus tiennent seulement gr&acirc;ce &agrave; la tension exerc&eacute;e par des c&acirc;bles tendus | Daily Geek Show', 4),
(6, 'http://dailygeekshow.com/2013/12/16/bob-traverse-les-etats-unis-en-tutu-pour-faire-rire-sa-femme-atteinte-dun-cancer/', 'Bob traverse les Etats-Unis en tutu pour faire rire sa femme atteinte d&rsquo;un cancer | Daily Geek Show', 4),
(7, 'http://www.koreus.com/video/tronicaltune-accorder-guitare.html', 'TronicalTune accorde automatiquement votre guitare', 5),
(8, 'http://dailygeekshow.com/2013/12/20/comment-clouer-le-bec-aux-racistes-cette-infographie-vous-apprendra-a-combattre-les-prejuges/', 'Comment clouer le bec aux racistes : cette infographie vous apprendra &agrave; combattre les pr&eacute;jug&eacute;s | Daily Geek Show', 4),
(9, 'http://dailygeekshow.com/2013/05/23/par-accident-deux-scientifiques-californiens-decouvrent-la-pile-du-futur/?utm_source=feedly&utm_medium=feed&utm_campaign=Feed: DailyGeekShow (Daily Geek Show)', 'Par accident, deux scientifiques californiens d&eacute;couvrent la pile du futur | Daily Geek Show', 4),
(10, 'http://geoguessr.com/', 'GeoGuessr - Let&#039;s explore the world!', 6),
(11, 'https://www.youtube.com/watch?v=Ff95TIO_b2Q', '', 7),
(13, 'https://www.youtube.com/watch?v=WyLFKMtU47w', '', 7),
(14, 'http://www.gamaniak.com/video-9316-aiguilles-glace-vent-rivage.html?utm_source=feedly', 'Des aiguilles de glace pouss&eacute;es par le vent sur le rivage', 9),
(15, 'http://dailygeekshow.com/wp-content/uploads/2013/02/les-gadgets-geek-du-vendredi-chargeur-solaire-pour-ipad-cles-usb-dark-vador3.jpg', '', 4),
(16, 'http://dailygeekshow.com/wp-content/uploads/2013/02/les-gadgets-geek-du-vendredi-chargeur-solaire-pour-ipad-cles-usb-dark-vador4.jpg', '', 4),
(17, 'http://www.ufunk.net/wp-content/uploads/2013/02/ufunk-selection-du-weekend-23-51.jpg', '', 10),
(18, 'http://www.ufunk.net/photos/cubicles-hong-kong/', 'Cubicles &ndash; Les micro-appartements de Hong Kong | Ufunk.net', 10),
(19, 'http://www.kissmygeek.com/57-divers/des-cartes-de-st-valentin-game-of-thrones', 'Des cartes de St Valentin Game of Thrones | Kiss My Geek', 11),
(20, 'http://www.w3sh.com/2013/02/22/het-arresthuis-une-prison-rehabilite-en-hotel-luxe/', 'Het Arresthuis, une prison r&eacute;habilit&eacute; en h&ocirc;tel luxe | w3sh.com', 12),
(24, 'http://www.fubiz.net/2013/02/04/google-tel-aviv-office/', 'Google Tel-Aviv Office &ndash; Fubiz&trade;', 13),
(25, 'https://www.youtube.com/watch?v=BZmqqgCojOg&feature=youtube_gdata', '', 7),
(26, 'https://www.youtube.com/watch?v=PqdX7pXTfO0&feature=youtube_gdata', '', 7),
(27, 'http://getpocket.com/a/read/282676813', '', 14),
(29, 'http://dailygeekshow.com/2013/04/27/19-maquillages-magnifiques-pour-les-geekettes-super-coquettes/', '19 maquillages magnifiques pour les geekettes super coquettes | Daily Geek Show', 4),
(31, 'http://www.koreus.com/video/belle-action-basket.html', 'Belle action de basket', 5),
(32, 'http://www.gamaniak.com/image/coincidences-24', 'Coincidences - 24', 9),
(33, 'http://www.gamaniak.com/image/images-vrac-115-16', 'Images Vrac 115 - 16', 9),
(35, 'http://www.koreus.com/video/tronconneuse-v8.html', 'Tron&ccedil;onneuse avec moteur V8', 5),
(36, 'http://youtu.be/BtV9Sl1KJk8', '', 15),
(37, 'http://www.koreus.com/modules/newbb/topic108657.html', 'Comment r&eacute;veiller un Russe * Pendant ce temps en Russie * Une descente en VTT dans un canyon - La chambre des Liens', 5),
(38, 'http://www.koreus.com/modules/newbb/topic108911.html', 'Un &eacute;l&eacute;phanteau veut prendre un bain - La chambre des Liens', 5),
(39, 'http://www.koreus.com/image/73-insolite-06.html', 'Flocon de neige en macro', 5),
(40, 'http://www.koreus.com/image/73-insolite-12.html', 'Les lutins du P&egrave;re No&euml;l sont fatigu&eacute;s', 5),
(41, 'http://www.koreus.com/image/73-insolite-13.html', 'Chaton au chaud', 5),
(42, 'http://www.koreus.com/image/73-insolite-21.html', 'Chiot &agrave; l&#039;attaque', 5),
(44, 'http://www.koreus.com/video/smash-surrealiste-federer.html', 'Incroyable smash de Federer', 5),
(45, 'http://www.fubiz.net/2014/01/24/the-street-store/', 'The Street Store &ndash; Fubiz&trade;', 13),
(46, 'http://www.fubiz.net/2014/01/23/cities-from-the-sky/', 'Cities From The Sky &ndash; Fubiz&trade;', 13),
(47, 'http://www.fubiz.net/2014/01/23/amazing-3d-pencils-drawings/', 'Amazing 3D Pencils Drawings &ndash; Fubiz&trade;', 13),
(48, 'http://www.fubiz.net/2014/01/22/bioluminescent-beach-in-maldives/', 'Bioluminescent Beach in Maldives &ndash; Fubiz&trade;', 13),
(49, 'http://www.fubiz.net/2014/01/21/what-200-calories-looks-like/', 'What 200 Calories Looks Like &ndash; Fubiz&trade;', 13),
(50, 'http://www.fubiz.net/2014/01/21/tiny-landscape-in-coffee-cup/', 'Tiny Landscape in a Coffee Cup &ndash; Fubiz&trade;', 13),
(51, 'http://www.fubiz.net/2014/01/17/think-invisible-posters/', 'Think Invisible Posters &ndash; Fubiz&trade;', 13),
(57, 'http://www.fubiz.net/2014/01/17/break-up-kit/', 'Break Up Kit  &ndash; Fubiz&trade;', 13),
(58, 'http://fubiz.net/2014/01/17/break-up-kit/', '301 Moved Permanently', 18),
(59, 'http://www.koreus.com/video/road-rage-pelle-couteau.html', ' Pelle vs Couteau (Road Rage)', 5),
(60, 'http://fr.ulule.com/ryuutama/', 'Ryuutama - Ulule', 19),
(61, 'http://www.koreus.com/video/fillette-train.html', 'Une fillette attend le train', 5),
(62, 'failblog.fr/fail/fail-sacadoslicorne.jpg', '', 8),
(63, 'http://www.kissmygeek.com/52-cinema/shopping-les-robes-star-wars', '[Shopping] Les robes Star Wars | Kiss My Geek', 11),
(64, 'http://www.dailygeekshow.com/wp-content/uploads/2014/01/samsung11.jpg', '301 Moved Permanently', 20),
(65, 'http://dailygeekshow.com/2014/01/29/penetrez-a-linterieur-dincroyables-monuments-funebres-eriges-avec-des-ossements-humains/', 'P&eacute;n&eacute;trez &agrave; l&rsquo;int&eacute;rieur d&rsquo;incroyables monuments fun&egrave;bres &eacute;rig&eacute;s avec des ossements humains | Daily Geek Show', 4),
(66, 'http://dailygeekshow.com/2014/01/27/les-drogues-sous-un-autre-regard-decouvrez-leurs-etonnants-motifs-au-microscope/', 'Les drogues sous un autre regard : d&eacute;couvrez leurs &eacute;tonnants motifs au microscope | Daily Geek Show', 4),
(67, 'http://dailygeekshow.com/2014/01/26/retrospective-disney-decouvrez-toutes-les-affiches-de-vos-dessins-animes-preferes-de-1937-jusqua-aujourdhui/', 'R&eacute;trospective Disney : d&eacute;couvrez toutes les affiches de vos dessins anim&eacute;s pr&eacute;f&eacute;r&eacute;s de 1937 jusqu&rsquo;&agrave; aujourd&rsquo;hui | Daily Geek Show', 4),
(68, 'http://dailygeekshow.com/2014/01/24/amoureux-de-la-musique-vous-pourrez-bientot-imprimer-vos-fichiers-mp3-sur-des-vinyles/', 'Amoureux de la musique, vous pourrez bient&ocirc;t imprimer vos fichiers mp3 sur des vinyles | Daily Geek Show', 4),
(69, 'http://dailygeekshow.com/2014/01/21/11-mots-qui-nont-aucun-equivalent-dans-les-autres-langues/', '11 mots qui n&rsquo;ont aucun &eacute;quivalent dans les autres langues | Daily Geek Show', 4),
(70, 'http://dailygeekshow.com/2014/01/19/decouvrez-une-magnifique-reprise-de-get-lucky-des-daft-punk-a-la-harpe/', 'D&eacute;couvrez une magnifique reprise de Get Lucky des Daft Punk&hellip; &agrave; la harpe ! | Daily Geek Show', 4),
(71, 'http://dailygeekshow.com/2014/01/18/31-idees-innovantes-pour-une-maison-completement-metamorphosee/', '31 id&eacute;es innovantes pour une maison compl&egrave;tement m&eacute;tamorphos&eacute;e | Daily Geek Show', 4),
(72, 'http://dailygeekshow.com/2014/01/17/20-enfants-hilarants-qui-sont-totalement-gagnants-au-jeu-de-cache-cache-enfin-presque/', '20 enfants hilarants qui sont totalement gagnants au jeu de cache-cache&hellip; Enfin presque ! | Daily Geek Show', 4),
(73, 'http://dailygeekshow.com/2014/01/17/28-fruits-et-legumes-qui-poussent-dune-facon-dont-vous-naviez-peut-etre-aucune-idee/', '28 fruits et l&eacute;gumes qui poussent d&rsquo;une fa&ccedil;on dont vous n&rsquo;aviez peut-&ecirc;tre aucune id&eacute;e | Daily Geek Show', 4),
(74, 'http://www.github.com', '', 21),
(75, 'http://lesjoiesducode.fr/post/75592814132/quand-les-specs-changent-quelques-jours-avant-la', 'Les joies du code  - quand les specs changent quelques jours avant la deadline', 22),
(76, 'http://ljdchost.com/daaIBwi.gif', '', 23),
(77, 'http://www.ljdchost.com/Wc69HeC.gif', '', 24),
(78, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-10/', 'selection-du-weekend-74-10', 10),
(79, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-21/', 'selection-du-weekend-74-21', 10),
(80, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-25/', 'selection-du-weekend-74-25', 10),
(81, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-28/', 'selection-du-weekend-74-28', 10),
(82, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-30/', 'selection-du-weekend-74-30', 10),
(83, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-33/', 'selection-du-weekend-74-33', 10),
(84, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-37/', 'selection-du-weekend-74-37', 10),
(85, 'http://www.ufunk.net/vrac/selection-du-weekend-74/attachment/selection-du-weekend-74-39/', 'selection-du-weekend-74-39', 10),
(86, 'http://www.dailygeekshow.com/2014/01/31/les-gadgets-geek-du-vendredi-une-lampe-chapeau-melon-un-autocollant-de-pluie-coloree-des-lego-tortues-ninja/', '301 Moved Permanently', 20),
(87, 'http://dailygeekshow.com/2014/02/04/decouvrez-comment-les-produits-du-quotidien-sont-fabriques/?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed: DailyGeekShow (Daily Geek Show)', 'D&eacute;couvrez comment les produits du quotidien sont fabriqu&eacute;s | Daily Geek Show', 4),
(88, 'http://dailygeekshow.com/2014/02/04/decouvrez-comment-les-produits-du-quotidien-sont-fabriques/?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed: DailyGeekShow (Daily Geek Show)', 'D&eacute;couvrez comment les produits du quotidien sont fabriqu&eacute;s | Daily Geek Show', 4),
(89, 'http://dailygeekshow.com/2014/02/04/decouvrez-comment-les-produits-du-quotidien-sont-fabriques/?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed: DailyGeekShow (Daily Geek Show)', 'D&eacute;couvrez comment les produits du quotidien sont fabriqu&eacute;s | Daily Geek Show', 4);

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
(2, 3, 0),
(3, 2, 0),
(4, 3, 0),
(5, 2, 0),
(6, 3, 0),
(7, 4, 0),
(8, 1, 0),
(9, 2, 0),
(9, 4, 0),
(10, 2, 0),
(11, 5, 0),
(13, 2, 0),
(13, 5, 0),
(13, 6, 0),
(13, 7, 0),
(14, 3, 0),
(15, 3, 0),
(16, 3, 0),
(17, 3, 0),
(17, 9, 0),
(18, 2, 0),
(19, 3, 0),
(19, 10, 0),
(20, 3, 0),
(20, 10, 0),
(24, 5, 0),
(25, 12, 0),
(26, 6, 0),
(26, 7, 0),
(26, 12, 0),
(27, 6, 0),
(27, 7, 0),
(27, 12, 0),
(29, 3, 0),
(29, 11, 0),
(31, 11, 0),
(32, 5, 0),
(33, 2, 0),
(35, 4, 0),
(36, 13, 0),
(37, 13, 0),
(38, 3, 0),
(39, 3, 0),
(40, 14, 0),
(41, 14, 0),
(42, 14, 0),
(43, 15, 0),
(44, 9, 0),
(45, 3, 0),
(45, 9, 0),
(46, 3, 0),
(47, 3, 0),
(47, 9, 0),
(48, 3, 0),
(48, 9, 0),
(49, 3, 0),
(50, 3, 0),
(50, 5, 0),
(50, 9, 0),
(50, 13, 0),
(51, 3, 0),
(59, 3, 0),
(59, 13, 0),
(60, 3, 0),
(61, 14, 0),
(62, 3, 0),
(63, 3, 0),
(63, 5, 0),
(63, 13, 0),
(64, 13, 0),
(65, 12, 0),
(66, 4, 0),
(67, 2, 0),
(68, 4, 0),
(69, 3, 0),
(69, 9, 0),
(69, 13, 0),
(70, 3, 0),
(71, 2, 0),
(72, 14, 0),
(73, 3, 0),
(73, 9, 0),
(74, 16, 0),
(75, 13, 0),
(76, 14, 0),
(77, 14, 0),
(78, 2, 0),
(79, 14, 0),
(80, 3, 0),
(81, 2, 0),
(82, 21, 0),
(83, 21, 0),
(84, 3, 0),
(85, 21, 0),
(86, 3, 0),
(87, 3, 0),
(87, 9, 0),
(87, 13, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`ID`, `url`, `favicone`, `couleur`) VALUES
(1, 'https://hall.com/', 'http://www.google.com/s2/favicons?domain=https://hall.com/', '#20b3e2'),
(2, 'https://habitrpg.com/', 'http://www.google.com/s2/favicons?domain=https://habitrpg.com/', '#735b3e'),
(3, 'http://fr.openclassrooms.com', 'http://www.google.com/s2/favicons?domain=http://fr.openclassrooms.com', '#ca866f'),
(4, 'http://dailygeekshow.com', 'http://www.google.com/s2/favicons?domain=http://dailygeekshow.com', '#b6ba9c'),
(5, 'http://www.koreus.com', 'http://www.google.com/s2/favicons?domain=http://www.koreus.com', '#b8aea8'),
(6, 'http://geoguessr.com', 'http://www.google.com/s2/favicons?domain=http://geoguessr.com', '#4c302e'),
(7, 'https://www.youtube.com', 'http://www.google.com/s2/favicons?domain=https://www.youtube.com', '#821814'),
(8, '://', 'http://www.google.com/s2/favicons?domain=://', '#b9bed9'),
(9, 'http://www.gamaniak.com', 'http://www.google.com/s2/favicons?domain=http://www.gamaniak.com', '#b49f8b'),
(10, 'http://www.ufunk.net', 'http://www.google.com/s2/favicons?domain=http://www.ufunk.net', '#ea7474'),
(11, 'http://www.kissmygeek.com', 'http://www.google.com/s2/favicons?domain=http://www.kissmygeek.com', '#f2a2a6'),
(12, 'http://www.w3sh.com', 'http://www.google.com/s2/favicons?domain=http://www.w3sh.com', '#c5af76'),
(13, 'http://www.fubiz.net', 'http://www.google.com/s2/favicons?domain=http://www.fubiz.net', '#d75269'),
(14, 'http://getpocket.com', 'http://www.google.com/s2/favicons?domain=http://getpocket.com', '#c83749'),
(15, 'http://youtu.be', 'http://www.google.com/s2/favicons?domain=http://youtu.be', '#821814'),
(17, 'www.fubiz.net', 'http://www.google.com/s2/favicons?domain=www.fubiz.net', '#d75269'),
(18, 'http://fubiz.net', 'http://www.google.com/s2/favicons?domain=http://fubiz.net', '#d75269'),
(19, 'http://fr.ulule.com', 'http://www.google.com/s2/favicons?domain=http://fr.ulule.com', '#493d4a'),
(20, 'http://www.dailygeekshow.com', 'http://www.google.com/s2/favicons?domain=http://www.dailygeekshow.com', '#b6ba9c'),
(21, 'http://www.github.com', 'http://www.google.com/s2/favicons?domain=http://www.github.com', '#202121'),
(22, 'http://lesjoiesducode.fr', 'http://www.google.com/s2/favicons?domain=http://lesjoiesducode.fr', '#b1aaaa'),
(23, 'http://ljdchost.com', 'http://www.google.com/s2/favicons?domain=http://ljdchost.com', '#b9bed9'),
(24, 'http://www.ljdchost.com', 'http://www.google.com/s2/favicons?domain=http://www.ljdchost.com', '#b9bed9');

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
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 20),
(1, 21);

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
(1, 2, '2014-01-03 09:32:00'),
(1, 3, '2014-01-05 15:19:15'),
(1, 4, '2014-01-05 17:16:32'),
(1, 5, '2014-01-05 17:19:44'),
(1, 6, '2014-01-05 17:20:38'),
(1, 7, '2014-01-05 17:41:27'),
(1, 8, '2014-01-05 17:54:16'),
(1, 9, '2014-01-05 18:35:46'),
(1, 10, '2014-01-05 18:59:14'),
(1, 11, '2014-01-05 19:01:13'),
(1, 13, '2014-01-05 19:11:41'),
(1, 14, '2014-01-05 19:36:42'),
(1, 15, '2014-01-05 19:45:33'),
(1, 16, '2014-01-05 19:45:44'),
(1, 17, '2014-01-05 20:02:06'),
(1, 18, '2014-01-05 20:48:35'),
(1, 19, '2014-01-05 20:50:53'),
(1, 20, '2014-01-05 20:52:54'),
(1, 24, '2014-01-05 21:26:27'),
(1, 25, '2014-01-05 21:55:58'),
(1, 26, '2014-01-05 21:59:12'),
(1, 27, '2014-01-05 22:00:58'),
(1, 29, '2014-01-05 22:51:25'),
(1, 31, '2014-01-15 19:33:37'),
(1, 32, '2014-01-15 19:34:57'),
(1, 33, '2014-01-15 19:35:51'),
(1, 35, '2014-01-15 19:59:05'),
(1, 36, '2014-01-15 21:04:07'),
(1, 37, '2014-01-15 21:08:46'),
(1, 38, '2014-01-15 21:14:35'),
(1, 39, '2014-01-16 19:04:49'),
(1, 40, '2014-01-16 19:06:13'),
(1, 41, '2014-01-16 19:06:19'),
(1, 42, '2014-01-16 19:06:48'),
(1, 44, '2014-01-16 19:24:03'),
(1, 45, '2014-01-26 12:08:02'),
(1, 46, '2014-01-26 12:09:18'),
(1, 47, '2014-01-26 12:10:33'),
(1, 48, '2014-01-26 12:12:12'),
(1, 49, '2014-01-26 12:13:22'),
(1, 50, '2014-01-26 12:13:52'),
(1, 51, '2014-01-26 12:16:30'),
(1, 57, '2014-01-26 13:11:12'),
(1, 58, '2014-01-26 13:13:48'),
(1, 59, '2014-01-26 14:19:46'),
(1, 60, '2014-01-26 15:16:50'),
(1, 61, '2014-01-30 20:22:25'),
(1, 62, '2014-01-30 20:33:10'),
(1, 63, '2014-01-30 20:34:26'),
(1, 64, '2014-01-30 20:48:07'),
(1, 65, '2014-01-30 20:52:02'),
(1, 66, '2014-01-30 21:08:13'),
(1, 67, '2014-01-30 21:09:54'),
(1, 68, '2014-01-30 21:20:19'),
(1, 69, '2014-01-30 21:29:55'),
(1, 70, '2014-01-30 21:41:01'),
(1, 71, '2014-01-31 18:11:42'),
(1, 72, '2014-01-31 18:19:41'),
(1, 73, '2014-01-31 19:45:46'),
(1, 74, '2014-01-31 21:21:19'),
(1, 75, '2014-02-09 12:54:52'),
(1, 76, '2014-02-09 12:55:07'),
(1, 77, '2014-02-09 12:55:20'),
(1, 78, '2014-02-09 12:55:49'),
(1, 79, '2014-02-09 12:56:25'),
(1, 80, '2014-02-09 12:56:33'),
(1, 81, '2014-02-09 12:56:47'),
(1, 82, '2014-02-09 12:57:31'),
(1, 83, '2014-02-09 12:57:44'),
(1, 84, '2014-02-09 12:58:04'),
(1, 85, '2014-02-09 12:58:15'),
(1, 86, '2014-02-09 13:00:38'),
(1, 87, '2014-02-09 13:05:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

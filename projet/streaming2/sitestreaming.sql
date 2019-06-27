-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 avr. 2018 à 23:46
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
-- Base de données :  `sitestreaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `id_ab` int(11) NOT NULL AUTO_INCREMENT,
  `date_deb` int(11) NOT NULL DEFAULT '0',
  `date_fin` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_ab`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`id_ab`, `date_deb`, `date_fin`, `type`, `id_u`) VALUES
(8, 1524330684, 1524503484, 1, 14),
(9, 1524331009, 1524763009, 3, 14),
(10, 431906, 863906, 3, 14),
(11, 431902, 863902, 3, 14),
(12, 431787, 863787, 3, 14),
(13, 1524763009, 1525195009, 3, 14),
(14, 1525195009, 1525367809, 1, 14),
(15, 1525367809, 1525799809, 3, 14),
(16, 1524405900, 1524578700, 1, 2),
(17, 1524578700, 1524751500, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

DROP TABLE IF EXISTS `episode`;
CREATE TABLE IF NOT EXISTS `episode` (
  `id_ep` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ep` int(11) NOT NULL DEFAULT '0',
  `titre_ep` varchar(255) NOT NULL,
  `desc_ep` varchar(255) NOT NULL,
  `lien_ep` varchar(255) NOT NULL,
  `id_se` int(11) NOT NULL,
  PRIMARY KEY (`id_ep`),
  UNIQUE KEY `numero_ep` (`numero_ep`,`id_se`) USING BTREE,
  KEY `id_se` (`id_se`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`id_ep`, `numero_ep`, `titre_ep`, `desc_ep`, `lien_ep`, `id_se`) VALUES
(23, 2, 'episode 2', '', 'https://openload.co/embed/eNZYStFIbuQ/', 56),
(22, 1, 'episode 1', '', 'https://openload.co/embed/KTLbza-je5I/', 56),
(21, 3, 'episode 3', '', 'https://openload.co/embed/A8oWRjXoZpc/', 55),
(20, 2, 'episode 2', '', 'https://openload.co/embed/iQEITMVt_wI/', 55),
(19, 1, 'Episode 1', '', 'https://openload.co/embed/vSY8jpTWD8E/', 55),
(24, 3, 'episode 3', '', 'https://openload.co/embed/VFglJdAZfHc/', 56),
(25, 1, 'episode 1', '', 'https://openload.co/embed/ak0ntK2qAJE/', 57),
(26, 2, 'episode 2', '', 'https://openload.co/embed/0n9oxkv03mg/', 57),
(27, 3, 'episode 3', '', 'https://openload.co/embed/Y8szkqW88jA/', 57),
(28, 1, 'episode 1', '', 'https://openload.co/embed/xEkWAvjbPYM/', 58),
(29, 2, 'episode 2', '', 'https://openload.co/embed/LgzR5DMZS-M/', 58),
(30, 3, 'episode 3', '', 'https://openload.co/embed/si6cQ-SCZcw/', 58),
(31, 1, 'episode 1', '', 'https://openload.co/embed/F0oUwPLMX9I/', 59),
(32, 2, 'episode 2', '', 'https://openload.co/embed/WIR-GGwEuKE/', 59),
(33, 3, 'episode 3', '', 'https://openload.co/embed/hENaLIOATe8/', 59);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_f` int(11) NOT NULL AUTO_INCREMENT,
  `titre_f` varchar(255) NOT NULL,
  `desc_f` varchar(2000) NOT NULL,
  `lien_f` varchar(255) NOT NULL,
  `genre_f` int(11) NOT NULL,
  `annee` int(11) NOT NULL DEFAULT '0',
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id_f`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_f`, `titre_f`, `desc_f`, `lien_f`, `genre_f`, `annee`, `pays`) VALUES
(13, 'Black Panther', 'Synopsis : AprÃ¨s les Ã©vÃ©nements qui se sont dÃ©roulÃ©s dans Captain America : Civil War, Tâ€™Challa revient chez lui prendre sa place sur le trÃ´ne du Wakanda, une nation africaine technologiquement trÃ¨s avancÃ©e. Mais lorsquâ€™un vieil ennemi resurgit, le courage de Tâ€™Challa est mis Ã  rude Ã©preuve, aussi bien en tant que souverain quâ€™en tant que Black Panther. Il se retrouve entraÃ®nÃ© dans un conflit qui menace non seulement le destin du Wakanda, mais celui du monde entierâ€¦\r\n', 'https://openload.co/embed/eucRe6KuO9g/', 1, 2018, 'Etats-unis'),
(14, 'Avengers', 'Synopsis : Lorsque Nick Fury, le directeur du S.H.I.E.L.D., l\'organisation qui prÃ©serve la paix au plan mondial, cherche Ã  former une Ã©quipe de choc pour empÃªcher la destruction du monde, Iron Man, Hulk, Thor, Captain America, Hawkeye et Black Widow rÃ©pondent prÃ©sents.\r\nLes Avengers ont beau constituer la plus fantastique des Ã©quipes, il leur reste encore Ã  apprendre Ã  travailler ensemble, et non les uns contre les autres, d\'autant que le redoutable Loki a rÃ©ussi Ã  accÃ©der au Cube Cosmique et Ã  son pouvoir illimitÃ©...', 'https://openload.co/embed/eucRe6KuO9g/', 1, 2012, 'Etats-unis'),
(16, 'Doctor Strange', 'Synopsis : Doctor Strange suit l\'histoire du Docteur Stephen Strange, talentueux neurochirurgien qui, aprÃ¨s un tragique accident de voiture, doit mettre son Ã©go de cÃ´tÃ© et apprendre les secrets d\'un monde cachÃ© de mysticisme et de dimensions alternatives. BasÃ© Ã  New York, dans le quartier de Greenwich Village, Doctor Strange doit jouer les intermÃ©diaires entre le monde rÃ©el et ce qui se trouve au-delÃ , en utlisant un vaste Ã©ventail d\'aptitudes mÃ©taphysiques et d\'artefacts pour protÃ©ger le Marvel Cinematic Universe.\r\n', 'https://openload.co/embed/JJVFMFVBkbk/', 4, 2016, 'Etats-unis'),
(17, 'Interstellar', 'Synopsis : Le film raconte les aventures dâ€™un groupe dâ€™explorateurs qui utilisent une faille rÃ©cemment dÃ©couverte dans lâ€™espace-temps afin de repousser les limites humaines et partir Ã  la conquÃªte des distances astronomiques dans un voyage interstellaire. ', 'https://openload.co/embed/g8bz8RnUSzE/', 4, 2014, 'Etats-unis'),
(18, 'Le Labyrinthe 3: le remÃ¨de mortel', 'Synopsis : Dans ce dernier volet de lâ€™Ã©popÃ©e LE LABYRINTHE, Thomas et les Blocards sâ€™engagent dans une ultime mission, plus dangereuse que jamais. Afin de sauver leurs amis, ils devront pÃ©nÃ©trer dans la lÃ©gendaire et sinueuse DerniÃ¨re Ville contrÃ´lÃ©e par la terrible organisation WICKED. Une citÃ© qui pourrait sâ€™avÃ©rer Ãªtre le plus redoutable des labyrinthes. Seuls les Blocards qui parviendront Ã  en sortir vivants auront une chance dâ€™obtenir les rÃ©ponses tant recherchÃ©es depuis leur rÃ©veil au cÅ“ur du Labyrinthe.', 'https://openload.co/embed/gVecOM6MFyA/', 1, 2018, 'Etats-unis'),
(19, 'Zootopia', 'Synopsis : Zootopia est une ville qui ne ressemble Ã  aucune autre : seuls les animaux y habitent ! On y trouve des quartiers rÃ©sidentiels Ã©lÃ©gants comme le trÃ¨s chic Sahara Square, et dâ€™autres moins hospitaliers comme le glacial Tundratown. Dans cette incroyable mÃ©tropole, chaque espÃ¨ce animale cohabite avec les autres. Quâ€™on soit un immense Ã©lÃ©phant ou une minuscule souris, tout le monde a sa place Ã  Zootopia !\r\nLorsque Judy Hopps fait son entrÃ©e dans la police, elle dÃ©couvre quâ€™il est bien difficile de sâ€™imposer chez les gros durs en uniforme, surtout quand on est une adorable lapine. Bien dÃ©cidÃ©e Ã  faire ses preuves, Judy sâ€™attaque Ã  une Ã©pineuse affaire, mÃªme si cela lâ€™oblige Ã  faire Ã©quipe avec Nick Wilde, un renard Ã  la langue bien pendue et vÃ©ritable virtuose de lâ€™arnaque â€¦', 'https://openload.co/embed/Zg5auJDmPmY/', 3, 2016, 'Etats-unis');

-- --------------------------------------------------------

--
-- Structure de la table `ip_ban`
--

DROP TABLE IF EXISTS `ip_ban`;
CREATE TABLE IF NOT EXISTS `ip_ban` (
  `id_ban` int(11) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_ban`),
  UNIQUE KEY `un_ip_idu` (`id_u`,`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

DROP TABLE IF EXISTS `manga`;
CREATE TABLE IF NOT EXISTS `manga` (
  `id_m` int(11) NOT NULL,
  `titre_m` varchar(20) NOT NULL,
  `desc_m` varchar(255) NOT NULL,
  `duree_m` int(11) NOT NULL,
  `lien_ba` varchar(255) NOT NULL,
  `chemin_m` varchar(255) NOT NULL,
  `genre_m` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notefilm`
--

DROP TABLE IF EXISTS `notefilm`;
CREATE TABLE IF NOT EXISTS `notefilm` (
  `id_n` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `id_f` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_n`),
  KEY `id_f` (`id_f`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `noteserie`
--

DROP TABLE IF EXISTS `noteserie`;
CREATE TABLE IF NOT EXISTS `noteserie` (
  `id_n` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `id_se` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_n`),
  KEY `id_u` (`id_u`),
  KEY `id_se` (`id_se`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `id_se` int(11) NOT NULL AUTO_INCREMENT,
  `titre_se` varchar(255) NOT NULL,
  `nomb_ep` int(11) NOT NULL DEFAULT '0',
  `desc_se` varchar(2000) NOT NULL,
  `lien_se` varchar(255) NOT NULL,
  `genre_se` int(11) NOT NULL,
  `annee` int(11) NOT NULL DEFAULT '0',
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id_se`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id_se`, `titre_se`, `nomb_ep`, `desc_se`, `lien_se`, `genre_se`, `annee`, `pays`) VALUES
(55, 'Beowulf : Return to the Shieldlands', 3, 'Synopsis : Une adaptation du poÃ¨me Ã©pique Â« Beowulf Â», contant les aventures d\'un guerrier venu dÃ©barrasser le royaume du roi Hrothgar du terrible monstre Grendel.\r\n', '', 1, 0, 'Etats-unis'),
(56, ' Iron Fist', 3, '\r\nSynopsis : AprÃ¨s avoir disparu quelques annÃ©es, Danny Rand revient Ã  New York pour combattre les criminels qui en ont fait une ville corrompue, grÃ¢ce Ã  ses connaissances en kung-fu et la puissance destructrice de son poing.\r\n', '', 1, 0, 'Etats-unis'),
(57, 'Krypton', 3, '\r\nSynopsis : Des annÃ©es avant les aventures de Superman... Sur Krypton, la maison El est en disgrÃ¢ce et isolÃ©e. C\'est dans ce contexte dÃ©licat que le grand-pÃ¨re de Kal-El tente d\'instaurer paix et Ã©galitÃ© sur une planÃ¨te en dÃ©sespÃ©rance, futur lieu de naissance du plus grand super-hÃ©ros de l\'Histoire.\r\n', '', 4, 2018, 'Etats-unis'),
(58, 'Legion', 3, 'Synopsis : L\'histoire de David Haller, le fils schizophrÃ¨ne du professeur Xavier, un homme sujet depuis l\'adolescence Ã  une maladie mentale. Au cours d\'un de ses nombreux sÃ©jours en hÃ´pital psychiatrique, une Ã©trange rencontre avec un patient lui fait rÃ©aliser que les voix qu\'il entend et les visions auxquelles il est confrontÃ© pourraient se rÃ©vÃ©ler vraies.\r\n', '', 4, 2017, 'Etats-unis'),
(59, 'Suits', 3, 'Synopsis : Avocat trÃ¨s ambitieux d\'une grosse firme de Manhattan, Harvey Specter a besoin de quelqu\'un pour l\'Ã©pauler. Son choix se porte sur Mike Ross, un jeune homme trÃ¨s brillant mais sans diplÃ´me, dotÃ© d\'un talent certain et d\'une mÃ©moire photographique trÃ¨s prÃ©cieuse. Ensemble, ils forment une Ã©quipe gagnante, prÃªte Ã  relever tous les dÃ©fis. Mike devra cependant user de toutes les ruses pour maintenir sa place sans que personne ne dÃ©couvre qu\'il n\'a jamais passÃ© l\'examen du barreau.', '', 6, 0, 'Etats-unis');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `lvl`) VALUES
(1, 'test', 'test', 'test', 'test@test.com', '28f7fde4c0ae8badc391b5c71819ff59f8444724', 0),
(2, 'test1', 'test1', 'test1', 'test1@test.com', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 0),
(3, 'test2', 'test2', 'test2', 'test2@test2.com', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 0),
(5, 'test3', 'test3', 'test3', 'test3@test.com', '', 0),
(6, 'test4', 'test4', 'test4', 'test4@test.com', '', 0),
(7, 'test5', 'test4', 'test4', 'test4@test.com', '911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23', 0),
(8, 'test6', 'test6', 'test6', 'test6@test.com', 'a66df261120b6c2311c6ef0b1bab4e583afcbcc0', 0),
(9, 'test7', 'test7', 'test7', 'test7@test.com', 'ea3243132d653b39025a944e70f3ecdf70ee3994', 0),
(10, 'test8', 'test8', 'test8', 'test8@test.', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 0),
(11, 'test8', 'test8', 'test8', 'test8@test.com', 'd03f9d34194393019e6d12d7c942827ebd694443', 0),
(12, 'test8', 'test8', 'test8', 'test9@test.com', 'd03f9d34194393019e6d12d7c942827ebd694443', 0),
(13, 'test8', 'test8', 'test8', 'test8@test.com', '5451f2c74cdc2da49b8c4151bfee33477759c8c4', 0),
(14, 'admin', 'admin2', 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3),
(15, 'test19', 'test19', 'test19', 'test19@test.com', 'bba019890aec72f6dd6b4e98513055cae61df098', 0);

-- --------------------------------------------------------

--
-- Structure de la table `visionner`
--

DROP TABLE IF EXISTS `visionner`;
CREATE TABLE IF NOT EXISTS `visionner` (
  `id_u` smallint(5) UNSIGNED NOT NULL,
  `id_f` smallint(5) UNSIGNED NOT NULL,
  `id_se` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  PRIMARY KEY (`id_u`,`id_f`),
  KEY `id_f` (`id_f`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `id_u` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

--
-- Contraintes pour la table `ip_ban`
--
ALTER TABLE `ip_ban`
  ADD CONSTRAINT `ip_ban_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

--
-- Contraintes pour la table `notefilm`
--
ALTER TABLE `notefilm`
  ADD CONSTRAINT `notefilm_ibfk_1` FOREIGN KEY (`id_f`) REFERENCES `film` (`id_f`),
  ADD CONSTRAINT `notefilm_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

--
-- Contraintes pour la table `noteserie`
--
ALTER TABLE `noteserie`
  ADD CONSTRAINT `id_se` FOREIGN KEY (`id_se`) REFERENCES `serie` (`id_se`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 15 jan. 2018 à 12:58
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
-- Base de données :  `immobi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adr` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id_adr`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adr`, `numero`, `rue`, `cp`, `ville`) VALUES
(1, 3, 'rue du bernard', '75000', 'Paris'),
(2, 45, 'fqds sdqf ', '45788', 'dsdqf'),
(3, 3, 'fqds sdqf', '75000', 'Paris'),
(4, 3, 'allÃ©e des nations', '78210', 'St Cyr L Ecole'),
(5, 3, 'rue du bernard', '78210', 'St Cyr L Ecole'),
(6, 3, 'rue de normandie', '75000', 'paris'),
(7, 5, 'rue de normandie', '75000', 'Paris'),
(8, 18, 'rue de normandie', '75000', 'paris'),
(9, 8, 'rue de normandie', '75000', 'paris');

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

DROP TABLE IF EXISTS `biens`;
CREATE TABLE IF NOT EXISTS `biens` (
  `id_b` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `nb_pieces` int(11) DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_adr` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_b`),
  KEY `id_adr` (`id_adr`),
  KEY `id_cat` (`id_cat`),
  KEY `id_u` (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id_b`, `description`, `nb_pieces`, `surface`, `prix`, `date`, `id_adr`, `id_cat`, `id_u`) VALUES
(1, 'Résidence Vendôme, à deux pas des écoles, commerces et 10 mn gare à pieds, découvrez ce bel appartement 2 pièces lumineux d\'environ 48 m², en étage avec ascenseur, composé d\'une entrée avec placard, un grand séjour parqueté lumineux donnant sur un balcon, une cuisine indépendante équipée aménagée (poss.US), une chambre parqueté avec accès sur balcon une salle de douche avec WC. Une cave et une place de parking privée complètent ce bien. Une exclusivité Stéphane Plaza Immobilier Copropriété de 289 lots Charges annuelles: 2352 e.', 2, 48, 149000, '2018-01-11', 1, 2, 6),
(14, 'test', 5, 40, 200000, '2018-01-12', 6, 1, 6),
(15, 'Ã©lÃ©menbt', 5, 40, 150000, '2018-01-12', 7, 1, 6),
(16, '', 5, 25, 120000, '2018-01-26', 7, 1, 6),
(17, 'RÃ©sidence VendÃ´me, Ã  deux pas des Ã©coles, commerces et 10 mn gare Ã  pieds, dÃ©couvrez ce bel appartement 2 piÃ¨ces lumineux d\'environ 48 mÂ², en Ã©tage avec ascenseur, composÃ© d\'une entrÃ©e avec placard, un grand sÃ©jour parquetÃ© lumineux donnant sur un balcon, une cuisine indÃ©pendante Ã©quipÃ©e amÃ©nagÃ©e (poss.US), une chambre parquetÃ© avec accÃ¨s sur balcon une salle de douche avec WC. Une cave et une place de parking privÃ©e complÃ¨tent ce bien. Une exclusivitÃ© StÃ©phane Plaza Immobilier CopropriÃ©tÃ© de 289 lots Charges annuelles: 2352 e.', 5, 26, 120000, '2018-01-11', 7, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `libelle`) VALUES
(1, 'Maison'),
(2, 'Appartement');

-- --------------------------------------------------------

--
-- Structure de la table `envoyer`
--

DROP TABLE IF EXISTS `envoyer`;
CREATE TABLE IF NOT EXISTS `envoyer` (
  `mp_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_exp` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `time` int(11) NOT NULL,
  `mp_lu` enum('0','1') NOT NULL,
  PRIMARY KEY (`mp_id`),
  KEY `etrangere` (`id_dest`,`id_exp`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `numtel` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `login`, `mdp`, `lvl`, `email`, `numtel`) VALUES
(6, 'vendeur', 'a40e485246474ffb958415f886e5a5bfba3e0086', 2, 'vendeur@vendeur.com', '0597811567'),
(4, 'acheteur', '0f4afee534073f59ae535c41005d20831daab355', 3, 'acheteur@acheteur.com', ''),
(5, 'acheteur2', 'e0ee1bf8dfe6325b3f2f0d5dcab63c6d59ce3edd', 3, 'acheteur2@acheteur.com', ''),
(7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'admin@admin.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 17 nov. 2018 à 23:37
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetmmo`
--
CREATE DATABASE IF NOT EXISTS `projetmmo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetmmo`;

-- --------------------------------------------------------

--
-- Structure de la table `active_logins`
--

DROP TABLE IF EXISTS `active_logins`;
CREATE TABLE IF NOT EXISTS `active_logins` (
  `user_id` int(11) NOT NULL,
  `session_key` varchar(20) NOT NULL,
  `character_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `active_logins`
--

INSERT INTO `active_logins` (`user_id`, `session_key`, `character_id`) VALUES
(1, '4112de862b', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `mana` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `clan` int(11) NOT NULL,
  `posx` int(11) DEFAULT NULL,
  `posy` int(11) DEFAULT NULL,
  `posz` int(11) DEFAULT NULL,
  `rotation_yaw` float NOT NULL,
  `equip_head` varchar(100) DEFAULT NULL,
  `equip_chest` varchar(100) DEFAULT NULL,
  `equip_hands` varchar(100) DEFAULT NULL,
  `equip_legs` varchar(100) DEFAULT NULL,
  `equip_feet` varchar(100) DEFAULT NULL,
  `hotbar0` varchar(100) DEFAULT NULL,
  `hotbar1` varchar(100) DEFAULT NULL,
  `hotbar2` varchar(100) DEFAULT NULL,
  `hotbar3` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `characters`
--

INSERT INTO `characters` (`id`, `user_id`, `name`, `class`, `gender`, `health`, `mana`, `level`, `experience`, `clan`, `posx`, `posy`, `posz`, `rotation_yaw`, `equip_head`, `equip_chest`, `equip_hands`, `equip_legs`, `equip_feet`, `hotbar0`, `hotbar1`, `hotbar2`, `hotbar3`) VALUES
(0, 1, 'Admintest1', 0, 0, 200, 200, 0, 0, 0, 5947, -3891, 20190, -156, '', 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueArmor.RogueArmor\'', '', 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueBreeches.RogueBreeches\'', 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueBoots.RogueBoots\'', 'Ability\'/Game/MMO/Abilities/Heal.Heal\'', 'Ability\'/Game/MMO/Abilities/FireBlast.FireBlast\'', 'None', 'None');

-- --------------------------------------------------------

--
-- Structure de la table `clans`
--

DROP TABLE IF EXISTS `clans`;
CREATE TABLE IF NOT EXISTS `clans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `leader_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character_id` int(11) NOT NULL,
  `slot` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inventory`
--

INSERT INTO `inventory` (`id`, `character_id`, `slot`, `item`, `amount`) VALUES
(15, 0, 0, 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueArmor.RogueArmor\'', 1),
(14, 0, 1, 'Item Data\'/Game/MMO/Blueprints/Inventory/StrangePotion.StrangePotion\'', 4),
(13, 0, 4, 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueBoots.RogueBoots\'', 1),
(12, 0, 3, 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueBoots.RogueBoots\'', 1),
(11, 0, 2, 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueBreeches.RogueBreeches\'', 1),
(16, 0, 5, 'Equipment\'/Game/MMO/Blueprints/Inventory/RogueBreeches.RogueBreeches\'', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quests`
--

DROP TABLE IF EXISTS `quests`;
CREATE TABLE IF NOT EXISTS `quests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character_id` int(11) NOT NULL,
  `quest` varchar(70) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `task1` int(11) NOT NULL,
  `task2` int(11) NOT NULL,
  `task3` int(11) NOT NULL,
  `task4` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quests`
--

INSERT INTO `quests` (`id`, `character_id`, `quest`, `completed`, `task1`, `task2`, `task3`, `task4`) VALUES
(7, 0, 'Quest\'/Game/MMO/Quests/CollectStrangePotions.CollectStrangePotions\'', 0, 2, 0, 0, 0),
(8, 0, 'Quest\'/Game/MMO/Quests/SpeakToVeteran.SpeakToVeteran\'', 1, 0, 0, 0, 0),
(9, 0, 'Quest\'/Game/MMO/Quests/DefendTheVillage.DefendTheVillage\'', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(32) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL DEFAULT '2018-11-14',
  `lvl` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `name`, `lastname`, `birthdate`, `lvl`) VALUES
(1, 'Admin1', '$2y$10$STpSWFN7TbbaLJUZainCqeDxSbI33AzEH.QpsQ0BNOL19qVVogmoG', 'admin@admin.com', NULL, '', '', '2018-11-14', 0),
(3, 'test258', '$2y$10$STpSWFN7TbbaLJUZainCqeDxSbI33AzEH.QpsQ0BNOL19qVVogmoG', 'test258@test.com', NULL, 'test258', 'test258', '2018-11-14', 0),
(4, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.com', NULL, 'test', 'test', '2018-11-01', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 juin 2019 à 15:35
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
-- Base de données :  `fluxrss`
--
DROP DATABASE IF EXISTS `fluxrss`;
CREATE DATABASE IF NOT EXISTS `fluxrss` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fluxrss`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `daterecuperation` datetime DEFAULT NULL,
  `titrearticle` varchar(255) DEFAULT NULL,
  `urlarticle` varchar(255) DEFAULT NULL,
  `datepublication` varchar(200) DEFAULT NULL,
  `imagedescription` varchar(255) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  `nomclub` varchar(255) NOT NULL,
  `titreclub` varchar(255) NOT NULL,
  `urlclub` varchar(255) NOT NULL,
  `logoclub` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  PRIMARY KEY (`id_c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `lvl` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `login`, `password`, `email`, `nom`, `prenom`, `lvl`) VALUES
(1, 'Admin', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'admin1@admin.com', 'Adminname1', 'adminlastname1', 3);
--
-- Base de données :  `forum`
--
DROP DATABASE IF EXISTS `forum`;
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `titre`) VALUES
(1, 'Forum Manga'),
(2, 'Forum Jeux Video');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_p` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `t_id` smallint(5) UNSIGNED DEFAULT NULL,
  `u_id` smallint(5) UNSIGNED DEFAULT NULL,
  `titre` varchar(4000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_p`),
  KEY `t_id` (`t_id`),
  KEY `u_id` (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_p`, `contenu`, `t_id`, `u_id`, `titre`, `date`) VALUES
(38, 'Lâ€™histoire nous entraÃ®ne dans la vie quotidienne de Yukihira Soma, un adolescent qui rÃªve de devenir chef cuisinier dans le restaurant familial et surpasser les talents culinaires de son pÃ¨re.\r\nA la fin du collÃ¨ge, Yukihira Jouichiro, le pÃ¨re de Soma, ferme son restaurant pour travailler en Europe.\r\nCâ€™est ainsi que Soma est mis au dÃ©fi dâ€™intÃ©grer une Ã©cole dâ€™Ã©lite culinaire, oÃ¹ seuls 10% des Ã©lÃ¨ves sont diplÃ´mÃ©s. Lâ€™occasion pour le jeune garÃ§on dâ€™aiguiser son talent Ã  travers les duels culinaires hors norme.\r\nhttps://www.adkami.com/anime/1406\r\n', 1, 2, 'Shokugeki no Soma', '2017-12-07 05:14:22'),
(35, 'Kamishiro Taku aime prendre soin des plantes du lycÃ©e et son amie Mika aime le taquine sur le sujet. Elle ignore tout des sentiments de son ami. Mais sa vie bascule le jour oÃ¹ il tente dâ€™intervenir lors dâ€™une agression dans la rue. Un curieux virus va ainsi le contaminer. DÃ¨s lors, de terribles envies de meurtre lâ€™envahissent en prÃ©sence de Mika. Chaque moment passÃ© Ã  ses cÃ´tÃ©s est lâ€™objet de visions de meurtres dâ€™une rare cruautÃ©. Pourtant, il va devoir affronter ses instincts et trouver un remÃ¨de au plus vite !\r\n&lt;a href=&quot;http://www.scan-manga.com/4332/Konya-wa-Tsuki-ga-Kirei-Desu-ga-Toriaezu-Shine.html&quot;&gt;http://www.scan-manga.com/4332/Konya-wa-Tsuki-ga-Kirei-Desu-ga-Toriaezu-Shine.html&lt;/a&gt;\r\n', 3, 2, 'Konya wa Tsuki ga Kirei Desu ga, Toriaezu Shine', '2017-12-06 10:56:10'),
(36, 'Keare, en raison de son statut de magicien guÃ©risseur, ne peut se battre seul et fut constamment exploitÃ© par les autres. Mais un jour il remarque ce qui se trouvait au-delÃ  de la magie curative et fut convaincu qu\'un magicien guÃ©risseur Ã©tait la classe la plus forte. Cependant, au moment oÃ¹ il rÃ©alisa ce potentiel, il Ã©tait privÃ© de tout. Ainsi il utilisa la magie de guÃ©rison sur le monde lui-mÃªme afin de revenir 4 ans en arriÃ¨re, dÃ©cidant de tout refaire.\r\nVoici l\'histoire d\'un magicien guÃ©risseur qui devint le plus fort en utilisant le savoir de sa vie passÃ©e et sa magie curative.\r\nhttp://www.scan-manga.com/4331/Kaifuku-Jutsushi-no-Yarinaoshi.html\r\n', 3, 2, 'Kaifuku Jutsushi no Yarinaoshi', '2017-12-07 05:10:20'),
(37, 'Takagi passent ses journÃ©es Ã  embÃªter le pauvre Nishikata. Pour essayer de regagner sa fiertÃ©, Nishikata va essayer, jour aprÃ¨s jour, de mettre dans l\'embarras Takagi.\r\nhttp://www.scan-manga.com/4200/Karakai-Jouzu-no-Takagi-san.html\r\n', 3, 2, 'Karakai Jouzu no Takagi-san', '2017-12-07 05:11:01'),
(40, 'Dans un monde rÃ©gi par la magie, Yuno et Asta ont grandi ensemble avec un seul but en tÃªte : devenir le prochain Empereur-Mage du royaume de Clover. Mais si le premier est naturellement douÃ©, le deuxiÃ¨me, quant Ã  lui, ne sait pas manipuler la magie. C\'est ainsi que lors de la cÃ©rÃ©monie d\'attribution de leur grimoire, Yuno reÃ§oit le lÃ©gendaire grimoire au trÃ¨fle Ã  quatre feuilles tandis qu\'Asta, lui, repart bredouille. Or, plus tard, un ancien et mystÃ©rieux ouvrage noir dÃ©corÃ© d\'un trÃ¨fle Ã  cinq feuilles surgit devant lui ! Un grimoire dâ€™anti-magieâ€¦\r\nhttps://www.adkami.com/anime/2279\r\n', 1, 2, 'Black Clover', '2017-12-07 05:15:20'),
(41, 'Kakeru Satsuki et Yuka Minase, deux amis d\'enfance, mÃ¨nent paisiblement leurs Ã©tudes au lycÃ©e. Kakeru prÃ©sente tout de mÃªme deux particularitÃ©s : il a perdu sa sÅ“ur Ã  7 ans, et son Å“il droit est dorÃ©. Un jour, en compagnie de quelques-uns de leurs camarades, ils basculent soudainement dans un univers parallÃ¨le : la Nuit Pourpre, car le ciel est alors de cette couleur, et le soleil est noir. LÃ , le groupe est attaquÃ© par des Chevaliers Noirs qui les appellent Fragments, et veulent les Ã©liminer Â« pour sauver la Terre Â». Heureusement, les camarades de Kakeru et de Yuka s\'avÃ¨rent disposer de certains pouvoirsâ€¦\r\nhttps://www.adkami.com/anime/174\r\nv', 1, 2, '11 eyes', '2017-12-07 05:15:55'),
(42, 'Vous Ãªtes ici pour parler de tout et de rien a propos des mangas !', 2, 2, 'Discutons des manga', '2017-12-07 05:16:35'),
(43, 'Vous Ãªtes ici pour parler de tout et de rien a propos des scans !', 4, 2, 'Discutons des Scans', '2017-12-07 05:25:46'),
(44, 'Pour ajouter un nouveau manga ou scan a la liste c\'est ici !', 5, 2, 'Ajout Manga/Scan', '2017-12-07 05:18:09'),
(45, 'World of Warcraft est un jeu vidÃ©o de type MMORPG dÃ©veloppÃ© par la sociÃ©tÃ© Blizzard Entertainment. C\'est le 4áµ‰ jeu de l\'univers mÃ©diÃ©val-fantastique Warcraft, introduit par Warcraft: Orcs and Humans en 1994', 6, 2, 'World of Warcraft', '2017-12-07 05:19:35'),
(46, 'Destiny 2 est un jeu vidÃ©o de tir en vue Ã  la premiÃ¨re personne dÃ©veloppÃ© par Bungie Studios et Ã©ditÃ© par Activision, sorti le 6 septembre 2017 sur PlayStation 4 et Xbox One et le 24 octobre sur Microsoft Windows', 7, 2, 'Destiny 2', '2017-12-07 05:20:10'),
(47, 'League of Legends est un jeu vidÃ©o de type arÃ¨ne de bataille en ligne gratuit dÃ©veloppÃ© et Ã©ditÃ© par Riot Games sur Windows et Mac OS X. Fin janvier 2013, un nouveau client bÃªta pour Mac a Ã©tÃ© distribuÃ© par Riot Games.', 8, 2, 'League of Legend', '2017-12-07 05:21:01'),
(48, 'Bioshock Infinite sur PC est un jeu d\'action Ã  la premiÃ¨re personne. Le titre entraÃ®ne le joueur en 1912 et le glisse dans la peau de Booker DeWitt, homme de main et dÃ©tective endettÃ©. Sa mission consiste Ã  ramener Ã  New York une jeune femme manifestement retenue dans Columbia, une mystÃ©rieuse ville flottante. On utilisera pour cela un arsenal variÃ© ainsi qu\'une palette de pouvoirs baptisÃ©s Toniques.', 9, 2, 'Bioshock Infinite', '2017-12-07 05:22:46'),
(49, 'C\'est ici pour parler de tout et de rien ou pour rajouter des nouveau jeux a la liste !', 10, 2, 'Discussion sur les jeux', '2017-12-07 05:23:26');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_post` int(11) NOT NULL,
  `id_u` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id_reponse`, `contenu`, `heure`, `id_post`, `id_u`) VALUES
(1, 'content_rep1', '2017-12-04 20:18:20', 1, 1),
(2, 'content_rep2', '2017-12-04 19:57:15', 1, NULL),
(3, 'azerazer', '2017-12-04 20:53:53', 1, 2),
(4, 'zertzretzert', '2017-12-04 20:54:07', 1, 2),
(5, 'zertzretzert', '2017-12-04 20:58:58', 1, 2),
(6, 'Votre rÃ©ponedqfsdgfsdgqfhqwdhfqse ici ...', '2017-12-05 10:23:39', 5, 2),
(7, 'dksfnvqsldhglsdjfm nidgf sfdjghqfsuojhgqsod igqosdiuhgqosidhg ', '2017-12-05 10:47:30', 5, 2),
(8, 'yukygkyg', '2017-12-05 10:49:16', 2, 2),
(9, 'Votre rÃ©ponse ictdhyttkiutrjytdjyt\r\ni ...', '2017-12-05 12:24:56', 1, 7),
(10, 'ta race', '2017-12-06 09:34:56', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id_t` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_t_pere` smallint(5) UNSIGNED DEFAULT NULL,
  `titre` varchar(30) DEFAULT NULL,
  `description` text,
  `cat_id` smallint(5) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_t`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id_t`, `id_t_pere`, `titre`, `description`, `cat_id`) VALUES
(1, NULL, 'Liste Manga', '', 1),
(6, NULL, 'MMORPG/RPG', NULL, 2),
(3, NULL, 'Liste Scan', NULL, 1),
(2, NULL, 'Discussion Manga', NULL, 1),
(4, NULL, 'Discussion Scan', NULL, 1),
(5, NULL, 'Ajout Manga', NULL, 1),
(7, NULL, 'FPS', NULL, 2),
(8, NULL, 'Moba', NULL, 2),
(9, NULL, 'Action/Aventure', NULL, 2),
(10, NULL, 'Discussion General', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `inscription` datetime DEFAULT NULL,
  `lastAction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `login`, `mdp`, `email`, `lvl`, `avatar`, `ip`, `inscription`, `lastAction`) VALUES
(1, 'elhombre', 'Ò', 'elhombre@hotmail.fr', 1, NULL, '127.0.0.1', '2017-11-09 00:00:00', '2017-12-06 20:20:54'),
(2, 'walky', '28f7fde4c0ae8badc391b5c71819ff59f8444724', 'test@test.com', NULL, NULL, NULL, NULL, '2017-12-07 05:26:31'),
(3, 'test', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 'test@test.com', NULL, NULL, NULL, NULL, '2017-12-06 20:20:54'),
(4, 'forum_admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'toto@tata.fr', NULL, NULL, NULL, NULL, '2017-12-06 20:20:54'),
(5, 'forum', '732d18e71a6837417bb852aed581cf2f89d58dbe', 'toto@tata.fr', NULL, NULL, NULL, NULL, '2017-12-06 20:20:54'),
(6, 'test2', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'azerty@azerty.com', NULL, NULL, NULL, NULL, '2017-12-06 20:20:54'),
(7, 'guillaume', '28f7fde4c0ae8badc391b5c71819ff59f8444724', 'g.rossinot@gmail.com', 3, NULL, NULL, NULL, '2017-12-06 20:20:54');
--
-- Base de données :  `immobi`
--
DROP DATABASE IF EXISTS `immobi`;
CREATE DATABASE IF NOT EXISTS `immobi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `immobi`;

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
--
-- Base de données :  `parking`
--
DROP DATABASE IF EXISTS `parking`;
CREATE DATABASE IF NOT EXISTS `parking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `parking`;

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `numeroplace` int(11) NOT NULL,
  UNIQUE KEY `primarykey` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id_p`, `numeroplace`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `datefin` date NOT NULL,
  KEY `id_u` (`id_u`),
  KEY `id_p` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_u`, `id_p`, `datefin`) VALUES
(1, 1, '2018-11-24'),
(2, 2, '2018-11-24'),
(3, 3, '2018-11-24'),
(5, 4, '2018-11-24'),
(6, 5, '2018-11-24'),
(7, 6, '2018-11-24'),
(8, 7, '2018-11-24'),
(9, 8, '2018-11-24'),
(10, 9, '2018-11-24'),
(11, 10, '2018-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '0',
  `placefileattente` int(11) NOT NULL DEFAULT '0',
  `historique` varchar(255) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `nom`, `prenom`, `email`, `password`, `lvl`, `placefileattente`, `historique`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3, 0, '1,'),
(2, 'admin1', 'admin1', 'admin1@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 0, '2,'),
(3, 'admin2', 'admin2', 'admin2@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '3,'),
(5, 'admin3', 'admin3', 'admin3@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '4,'),
(6, 'admin4', 'admin4', 'admin4@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '5,'),
(7, 'admin5', 'admin5', 'admin5@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '6,'),
(8, 'admin6', 'admin6', 'admin6@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '7,'),
(9, 'admin7', 'admin7', 'admin7@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '8,'),
(10, 'admin8', 'admin8', 'admin8@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '9,'),
(11, 'admin9', 'admin9', 'admin9@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '10,'),
(12, 'admin10', 'admin10', 'admin10@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1, ''),
(13, 'admin11', 'admin11', 'admin11@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 0, '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `id_p` FOREIGN KEY (`id_p`) REFERENCES `place` (`id_p`),
  ADD CONSTRAINT `id_u` FOREIGN KEY (`id_u`) REFERENCES `user` (`id_u`);
--
-- Base de données :  `portfolio`
--
DROP DATABASE IF EXISTS `portfolio`;
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `portfolio`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `libelle`) VALUES
(1, 'Developpement Web'),
(2, 'Programmation'),
(3, 'Réseau'),
(4, 'Système'),
(5, 'Projet Personnel');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id_comp` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `pourcentage` int(11) NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_comp`, `ref`, `libelle`, `pourcentage`) VALUES
(1, NULL, 'PHP', 50),
(2, NULL, 'HTML', 50),
(3, NULL, 'CSS', 50),
(4, NULL, 'JS', 50),
(5, NULL, 'JAVA', 50),
(11, NULL, 'ruby', 25);

-- --------------------------------------------------------

--
-- Structure de la table `englober`
--

DROP TABLE IF EXISTS `englober`;
CREATE TABLE IF NOT EXISTS `englober` (
  `id_p` smallint(5) UNSIGNED NOT NULL,
  `id_comp` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_p`,`id_comp`),
  KEY `id_comp` (`id_comp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id_img` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `id_p` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_img`),
  KEY `id_p` (`id_p`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_img`, `chemin`, `active`, `id_p`) VALUES
(1, 'images/thumbs/01.png', 1, 1),
(2, 'images/thumbs/02.png', 0, 2),
(3, 'images/thumbs/03.png', 0, 3),
(4, 'images/thumbs/04.png', 0, 4),
(5, 'images/thumbs/RPG2.png 	', 0, 8),
(7, 'images/thumbs/05.PNG', 1, 10),
(8, 'images/thumbs/06.PNG', 1, 11),
(6, 'images/thumbs/07.png', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id_p` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `id_cat` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_p`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id_p`, `libelle`, `date_deb`, `date_fin`, `url`, `description`, `id_cat`) VALUES
(1, 'Site de language', NULL, '2017-10-09', './projet/siteHTML/index.html', 'Site sur les différents langage du web réaliser en 1ere année.', 1),
(2, 'CV en ligne', NULL, '2017-10-18', './projet/CV/cv.html', 'CV Coder en hmtl/css réaliser en 1ere année.', 1),
(3, 'Forum en PHP', NULL, '2017-12-07', './projet/forum/index.php', 'Forum en PHP réaliser en 1ere année.', 1),
(4, 'Site immobilier', NULL, '2018-01-15', './projet/immo/index.php', 'Site immobilier en PHP réaliser en 1ere année.', 1),
(8, 'Projet jeux PC', NULL, NULL, './projet/siterpg/index.php', 'Création d\'un jeux 3D sur PC/Console via Unreal Engine 4.', 5),
(10, 'Projet Parking', NULL, '2019-01-01', '/projet/Parking/site/index.php', 'Projet parking réaliser en 2eme année.', 1),
(11, 'Projet Fluxrss', NULL, '2019-04-20', '/projet/fluxrss/fluxrss/index.php', 'Projet Flux RSS réaliser en 2eme année.', 1),
(9, 'Projet Streaming', NULL, '2018-04-23', '/projet/streaming2/index.php', 'Projet Streaming réaliser en 1ere année.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `login`, `mdp`, `lvl`) VALUES
(3, 'walky', '28f7fde4c0ae8badc391b5c71819ff59f8444724', 3);
--
-- Base de données :  `projetrpg`
--
DROP DATABASE IF EXISTS `projetrpg`;
CREATE DATABASE IF NOT EXISTS `projetrpg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetrpg`;

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
--
-- Base de données :  `sitestreaming`
--
DROP DATABASE IF EXISTS `sitestreaming`;
CREATE DATABASE IF NOT EXISTS `sitestreaming` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sitestreaming`;

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

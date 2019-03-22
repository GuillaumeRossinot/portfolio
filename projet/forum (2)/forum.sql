-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 déc. 2017 à 05:27
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
-- Base de données :  `forum`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

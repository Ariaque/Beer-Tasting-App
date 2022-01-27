
CREATE SCHEMA IF NOT EXISTS `beer_tasting_app` DEFAULT CHARACTER SET latin1 ;
USE `beer_tasting_app` ;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 déc. 2021 à 09:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beer_tasting_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `beer_style`
--

DROP TABLE IF EXISTS `beer_style`;
CREATE TABLE IF NOT EXISTS `beer_style` (
  `beer_style_id` int(11) NOT NULL AUTO_INCREMENT,
  `style` varchar(255) NOT NULL,
  `aroma` text,
  `appearance` text,
  `flavor` text,
  `body` text,
  `comments` text,
  `story` text,
  `ingredients` text,
  `styles_comparison` text,
  `commercial_examples` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`beer_style_id`),
  UNIQUE KEY `idbiere_UNIQUE` (`beer_style_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `beer_style`
--

INSERT INTO `beer_style` (`beer_style_id`, `style`, `aroma`, `appearance`, `flavor`, `body`, `comments`, `story`, `ingredients`, `styles_comparison`, `commercial_examples`, `created_at`, `updated_at`) VALUES
(1, 'Lager Américaine Légère', 'Peu ou pas d\'arômes maltés. S\'ils existent, ils peuvent être perçus comme des arômes de céréales, doux ou similaires à ceux du maïs. L\'arôme des houblons peut être absent ou léger, épicé ou floral s\'il est décelable. Si l\'absence d\'arôme lié aux levures est souhaitable, un faible taux (en particulier un léger arôme fruité de pomme verte) n\'est pas un défaut. Un faible taux de DMS (diméthylsulfure) est également acceptable.', 'Couleur blond paille très claire à jaune pâle. Col de mousse blanche, rarement persistante. Limpide.', 'Palais relativement neutre avec une saveur en fin de bouche fraîche et sèche, de faibles saveurs de malts ou de maïs qui peuvent être perçues comme un goût sucré du fait de la faible amertume. Les saveurs de houblons sont soit absentes, soit de faible intensité et peuvent être florales, épicées ou présenter des notes végétales (bien que rarement assez fortes pour être détectées). L\'amertume est faible à très faible. L\'équilibre peut varier de légèrement malté à légèrement amer, mais doit être relativement proche de l\'équilibre. De hauts niveaux de carbonatation peuvent accentuer la sensation de fraîcheur et de sécheresse en fin de bouche.', 'Corps très léger lié à l\'utilisation d\'un pourcentage important de céréales additionnelles comme le riz ou le maïs. Forte carbonatation avec une légère sensation de piquant sur la langue. Le corps peut sembler aqueux.', 'Une bière dont la densité initiale et la teneur en calories sont inférieures à celles des bières lager \"internationales\". Des saveurs fortes sont un défaut pour ce type de bières. Elles sont conçues pour plaire au plus grand nombre.', 'La Brasserie Coors a brièvement brassé une lager légère au début des années 1940. Les versions modernes ont été en premier lieu produites par la brasserie Rheingold en 1967 pour satisfaire les consommateurs soucieux de leur régime alimentaire. Elles ne sont devenues populaires qu\'à partir de 1973, après que la compagnie Miller Brewing ait acquis la recette et ait fortement promu la bière aux fans de sport via une campagne publicitaire dont le slogan était \"tastes great, less filling\" soit \"pleine de goût, plus légère\". Les bières de ce genre sont devenues les plus vendues aux États-Unis dans les années 1990.', '\r\nMalt d\'orge 2 rangs ou 6 rangs avec un important pourcentage de riz ou de maïs comme compléments (jusqu\'à 40%).', 'Une version plus fine en bouche, légère en alcool et en calories que la Lager Américaine, avec moins d\'arôme et d\'amertume des houblons qu\'une Leichtbier.\r\n\r\n', 'Bud Light, Coors Light, Keystone Light, Michelob Light, Miller Lite, Old Milwaukee Light\r\n\r\n', '2021-12-03 09:32:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tasting`
--

DROP TABLE IF EXISTS `tasting`;
CREATE TABLE IF NOT EXISTS `tasting` (
  `tasting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `bs_id` int(11) NOT NULL,
  `beer_name` varchar(250) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `aroma_comment` varchar(2000) DEFAULT NULL,
  `aroma_score` decimal(2,1) NOT NULL,
  `appearance_comment` varchar(2000) DEFAULT NULL,
  `appearance_score` decimal(2,1) NOT NULL,
  `flavor_comment` varchar(2000) DEFAULT NULL,
  `flavor_score` decimal(2,1) NOT NULL,
  `mouthfeel_comment` varchar(2000) DEFAULT NULL,
  `mouthfeel_score` decimal(2,1) NOT NULL,
  `overall_comment` varchar(2000) DEFAULT NULL,
  `bottle_inspection_comment` varchar(2000) DEFAULT NULL,
  `overall_score` decimal(2,1) NOT NULL,
  `total` decimal(3,1) DEFAULT NULL,
  `is_acetaldehyde` tinyint(4) DEFAULT '0',
  `is_alcoholic` tinyint(4) DEFAULT '0',
  `is_astringent` tinyint(4) DEFAULT '0',
  `is_diacetyl` tinyint(4) DEFAULT '0',
  `is_dms` tinyint(4) DEFAULT '0',
  `is_estery` tinyint(4) DEFAULT '0',
  `is_grassy` tinyint(4) DEFAULT '0',
  `is_light_struck` tinyint(4) DEFAULT '0',
  `is_metallic` tinyint(4) DEFAULT '0',
  `is_musty` tinyint(4) DEFAULT '0',
  `is_oxidized` tinyint(4) DEFAULT '0',
  `is_phenolic` tinyint(4) DEFAULT '0',
  `is_solvent` tinyint(4) DEFAULT '0',
  `is_acidic` tinyint(4) DEFAULT '0',
  `is_sulfur` tinyint(4) DEFAULT '0',
  `is_vegetal` tinyint(4) DEFAULT '0',
  `is_bottle_ok` tinyint(4) DEFAULT '0',
  `is_yeasty` tinyint(4) DEFAULT '0',
  `stylistic_accuracy` enum('0','1','2','3','4','5') DEFAULT '0',
  `intangibles` enum('0','1','2','3','4','5') DEFAULT '0',
  `technical_merit` enum('0','1','2','3','4','5') DEFAULT '0',
  `t_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tasting_id`),
  UNIQUE KEY `idtasting_UNIQUE` (`tasting_id`),
  KEY `fk_user_has_beer_beer1_idx` (`bs_id`),
  KEY `fk_user_has_beer_user_idx` (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasting`
--

INSERT INTO `tasting` (`tasting_id`, `title`, `bs_id`, `beer_name`, `u_id`, `aroma_comment`, `aroma_score`, `appearance_comment`, `appearance_score`, `flavor_comment`, `flavor_score`, `mouthfeel_comment`, `mouthfeel_score`, `overall_comment`, `bottle_inspection_comment`, `overall_score`, `total`, `is_acetaldehyde`, `is_alcoholic`, `is_astringent`, `is_diacetyl`, `is_dms`, `is_estery`, `is_grassy`, `is_light_struck`, `is_metallic`, `is_musty`, `is_oxidized`, `is_phenolic`, `is_solvent`, `is_acidic`, `is_sulfur`, `is_vegetal`, `is_bottle_ok`, `is_yeasty`, `stylistic_accuracy`, `intangibles`, `technical_merit`, `t_created_at`, `updated_at`) VALUES
(1, 'Ace', 1, 'MyBeer', 0, 'nice', '5.0', 'nice', '3.0', 'genial', '5.0', 'super', '5.0', 'genial', NULL, '5.0', '23.0', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '0', '0', '0', '2021-12-03 09:35:29', NULL),
(2, 'ace2', 1, 'MyBeer2', 1, '', '3.0', '', '3.0', '', '7.0', '', '4.0', '', NULL, '7.0', '24.0', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, '0', '0', '0', '2021-12-03 09:40:11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login_ip` int(11) UNSIGNED DEFAULT NULL,
  `remember_me` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `is_verified`, `updated_at`, `last_login_at`, `last_login_ip`, `remember_me`) VALUES
(1, 'Arnauld', 'cyriaque', 'ace@gmail.com', '$2y$10$Kq.NgO8HPPnvuT28n77Eh.VlI13IlKTY6cYT8lt7NTn/RC/SZq6gS', '2021-12-03 09:39:12', 0, NULL, '2021-12-03 09:39:12', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

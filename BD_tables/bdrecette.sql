-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 16 juin 2023 à 14:44
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `title`, `quantity`, `image`) VALUES
(1, 'farine', '1Kg', 'farine.webp\r'),
(2, 'oeuf', '3 oeufs moellé', 'oeuf.webp\r'),
(3, 'oignon', '5 morceau rapée', 'oignon.webp\r'),
(4, 'carotte', '3 morceau rapéé', 'carotte.webp\r'),
(5, 'gausse', '50g rapée', 'gausse.webp\r'),
(6, 'gingimbre', '6 coupé en morceau', 'gingimbre.webp\r'),
(7, 'gruyere', '3', 'gruyere.webp\r'),
(8, 'huile', '1L', 'huile.webp\r'),
(9, 'huile Olive', '1.5L', 'huile_olive.webp\r'),
(10, 'jambon', '2 morceau hachée', 'jambon.webp\r'),
(11, 'lait', '1L', 'lait.webp\r'),
(12, 'levure chimique', '3cuierre de', 'levure_chimique.webp\r'),
(13, 'poireau', '3', 'poireau.webp\r'),
(14, 'poivre', '7 Morceau', 'poivre.webp\r'),
(15, 'pomme de terre', '3 à la fritte', 'pomme_terre.webp\r'),
(16, 'sel', '100g', 'sel.webp\r'),
(17, 'viande hachée', '2 morceau', 'viande_hacher.webp\r'),
(18, 'fritte', '1mini-box', 'fritte.jpg\r');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_recette`
--

DROP TABLE IF EXISTS `ingredient_recette`;
CREATE TABLE IF NOT EXISTS `ingredient_recette` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ingredient_id` int NOT NULL,
  `recette_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recette_ingredient` (`recette_id`),
  KEY `fk_ingredient` (`ingredient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient_recette`
--

INSERT INTO `ingredient_recette` (`id`, `ingredient_id`, `recette_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 8, 3),
(7, 14, 3),
(8, 2, 3),
(9, 16, 3),
(10, 5, 3),
(11, 6, 3),
(12, 1, 4),
(13, 17, 4),
(14, 4, 4),
(15, 3, 4),
(16, 18, 4),
(17, 3, 5),
(18, 8, 5),
(19, 14, 5),
(20, 16, 5),
(21, 2, 5),
(22, 15, 5),
(23, 2, 6),
(24, 16, 6),
(25, 14, 6);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `title`, `description`, `photo`) VALUES
(1, 'Omelette nature', 'Un délicieux gâteau au chocolat, parfait pour les occasions spéciales.', 'omellete.jpg\r'),
(2, 'Poireau à la vinaigre', 'Une salade légère et saine à base de quinoa et de légumes frais.', 'poireau.jpg\r'),
(3, 'salade pate au thon', 'Une tarte classique aux pommes avec une croûte feuilletée croustillante.', 'salade.jpg\r'),
(4, 'Tacos Comorienne', 'Un taco est un antojito de la cuisine mexicaine qui se compose d\'une tortilla de maïs repliée ou enroulée sur elle-même contenant presque toujours une garniture le plus souvent à base de viande, \r\nde sauce, d\'oignon et de coriandre fraiche hachée. Les tacos se mangent généralement sans couverts, avec les doigts.', 'tacos.jpg\r'),
(5, 'tortila facile(Comorien)', 'La tortilla de patatas est une variante d\'omelette, épaisse, cuite des deux côtés et garnie de pommes de terre typiquement espagnole.', 'tortila.jpg\r'),
(6, 'Oeufs Cocotte', 'Les œufs cocotte ou œufs en cocotte sont des œufs cuit au bain-marie préchauffé avec de la crème fraiche et en ramequin individuel.', 'oeuf.jpg\r');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `htag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `htag`) VALUES
(1, '#banane jaune\r'),
(2, '#beurre\r'),
(3, '#crepe à la hiver\r'),
(4, '#gateau aux oranges\r'),
(5, '#gateau à la tartine\r'),
(6, '#gateau au four\r'),
(7, '#glace hivernale\r'),
(8, '#mandarine dessert\r'),
(9, '#mangue\r'),
(10, '#multi-fruit hivernale\r'),
(11, '#orange\r'),
(12, '#pain au moelle\r'),
(13, '#poisseau au four\r'),
(14, '#gateau au pomme\r'),
(15, '#raisin blanc\r'),
(16, '#raisin noir\r'),
(17, '#raisin hiver\r'),
(18, '#tarta à la banane\r'),
(19, '#winter hivernale\r'),
(20, '#gateau chocolat au four\r'),
(21, '');

-- --------------------------------------------------------

--
-- Structure de la table `tag_recette`
--

DROP TABLE IF EXISTS `tag_recette`;
CREATE TABLE IF NOT EXISTS `tag_recette` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag_id` int NOT NULL,
  `recette_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recette_tag` (`recette_id`),
  KEY `fk_tag` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag_recette`
--

INSERT INTO `tag_recette` (`id`, `tag_id`, `recette_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 1, 3),
(5, 14, 4),
(6, 10, 4),
(7, 10, 5),
(8, 6, 5),
(9, 9, 6),
(10, 10, 6),
(11, 3, 1),
(12, 10, 1),
(13, 9, 2),
(14, 20, 3),
(15, 18, 4),
(16, 13, 5),
(17, 11, 6),
(18, 17, 3),
(19, 19, 1),
(20, 7, 2),
(21, 5, 3),
(22, 3, 4),
(23, 1, 5),
(24, 2, 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

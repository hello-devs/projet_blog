-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 avr. 2018 à 14:54
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_coms_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valid` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Le commentaire a-t-il été validé par le modérateur',
  `signall` tinyint(1) DEFAULT '0' COMMENT 'signalé par les visiteurs',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `valid`, `signall`) VALUES
(10, 4, 'Maestro', 'Ou la il ne reste presque plus rien a modéré dans le backOffice', '2018-03-21 13:41:04', 0, 0),
(2, 1, 'dev2', 'Commentaire numéro 2.', '2017-10-01 23:35:09', 1, 0),
(5, 1, 'OK', 'OKI\r\n', '2017-10-05 16:55:36', 1, 0),
(6, 1, 'mvc', 'Ts est op', '2017-12-07 15:37:12', 0, 0),
(7, 1, 'MasterAdmin', 'modifier sur activité !!!', '2017-12-13 15:59:44', 0, 0),
(9, 4, 'Devellopeur mvc POO', 'ça avance ?', '2018-03-17 10:41:33', 1, 0),
(11, 2, 'mvc', 'gogogo', '2018-03-21 17:24:07', 0, 1),
(12, 4, 'Devs', 'Test git', '2018-03-31 15:26:34', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` enum('brouillon','publié') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'brouillon',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `etat`) VALUES
(1, 'Teste de code', 'Cet article sert à tester mon code.\r\nLe retour à la ligne fonctionne?', '2017-10-01 17:47:51', 'publié'),
(2, 'Teste de code 2', 'Cet article sert à tester mon code.\r\nLe retour à la ligne fonctionne?\r\nEt la répétition?', '2017-10-03 22:53:16', 'publié'),
(4, 'Modif admin', 'Article del\'admin\r\nmodifier\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur porro excepturi cumque facere doloribus corporis soluta officiis quae. Optio magni, amet at qui ipsum voluptate? Consequatur deleniti sapiente rerum ducimus!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eum facilis, suscipit aspernatur expedita aperiam pariatur, fugiat ab et eaque placeat reiciendis, quis, est mollitia quam tenetur ut officiis optio corporis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis nulla, non ipsum, doloribus minima a similique in exercitationem corporis deserunt eaque obcaecati quae explicabo ducimus blanditiis consectetur fuga. Modi, corporis! ipsum dolor sit amet, consectetur adipisicing elit. Natus consequuntur, libero error ipsum tempora voluptatum quo dolorum hic esse ut reprehenderit magnam, eveniet dolores unde, odit neque excepturi autem explicabo.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe in fuga dicta voluptas! Odio, cumque. Excepturi similique reprehenderit, dicta blanditiis iure nam nesciunt eaque nobis dignissimos corporis praesentium error doloribus. ipsum dolor sit amet, consectetur adipisicing elit. Soluta optio, vitae, alias asperiores dicta reiciendis ipsam eaque voluptatum hic labore illo est esse iste ullam illum minima dignissimos. Quos, voluptatem.', '2017-10-23 22:39:29', 'publié'),
(5, 'Brouillon admin', 'Article del\'admin\r\nles brouillon ne s\'affiche pas en front !!!', '2017-10-23 22:39:29', 'brouillon'),
(12, 'Article édité', '<p>lorem &eacute;dit&eacute; lorem</p>', '2018-04-02 23:04:31', 'brouillon'),
(11, 'test ajout back', '<p>git</p>', '2018-04-02 22:04:43', 'publié');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 juil. 2023 à 13:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tropicalfarm`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `monthexpiration` varchar(50) NOT NULL,
  `yearexpiration` varchar(50) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(1, 'admin', '1234', 'Dendrobates auratus, super blue.jpg', '#245033', 'Admin', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `id_auction` int NOT NULL AUTO_INCREMENT,
  `id_seller` int NOT NULL,
  `id_buyer` int NOT NULL,
  `id_admin` int NOT NULL,
  `id_item` int NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id_auction`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `auction`
--

INSERT INTO `auction` (`id_auction`, `id_seller`, `id_buyer`, `id_admin`, `id_item`, `price`) VALUES
(1, 0, 0, 0, 0, 104),
(2, 0, 0, 0, 0, 104),
(3, 0, 0, 0, 0, 17);

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `idbasket` int NOT NULL AUTO_INCREMENT,
  `id_seller` int NOT NULL,
  `id_buyer` int NOT NULL,
  `id_admin` int NOT NULL,
  `id_item` int NOT NULL,
  PRIMARY KEY (`idbasket`),
  KEY `fk_nouvelle_table_seller` (`id_seller`),
  KEY `fk_nouvelle_table_buyer` (`id_buyer`),
  KEY `fk_nouvelle_table_admin` (`id_admin`),
  KEY `fk_nouvelle_table_item` (`id_item`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`idbasket`, `id_seller`, `id_buyer`, `id_admin`, `id_item`) VALUES
(1, 0, 0, 0, 10),
(2, 0, 0, 0, 10),
(3, 0, 0, 0, 9),
(4, 0, 0, 0, 9),
(5, 0, 0, 0, 9),
(6, 0, 0, 0, 9),
(7, 0, 0, 0, 9),
(8, 0, 0, 0, 9),
(9, 0, 0, 0, 9),
(10, 0, 0, 0, 9),
(11, 0, 0, 0, 9),
(12, 0, 0, 0, 9),
(13, 0, 0, 0, 9),
(14, 0, 0, 0, 9),
(15, 0, 0, 0, 13),
(16, 0, 0, 0, 13),
(17, 0, 0, 0, 9);

-- --------------------------------------------------------

--
-- Structure de la table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `idbuyer` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `monthexpiration` varchar(50) NOT NULL,
  `yearexpiration` varchar(50) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  PRIMARY KEY (`idbuyer`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `buyer`
--

INSERT INTO `buyer` (`idbuyer`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(5, 'heloise.maiche@free.fr', '1234', 'visa.png', 'black', 'Héloise M', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'hh', 'hh', 'visa.png', 'red', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'j', 'hh', 'visa.png', 'blue', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `second_category` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `stock` varchar(50) NOT NULL,
  `sell` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `auction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `trade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `name`, `category`, `second_category`, `description`, `photo`, `price`, `stock`, `sell`, `auction`, `trade`) VALUES
(10, 'TEST', 'reptiles', 'chameleons', 'njkilhsi', 'accroche2.jpg', 150, '3', 'sell', NULL, NULL),
(6, 'cameleon', 'reptiles', 'chameleons', 'un cameleon', 'accroche1.jpg', 50, '2', 'sell', 'auction', NULL),
(7, 'Turtles', 'reptiles', 'turtles', 'a turtles ', 'accroche4.jpg', 60, '6', 'sell', 'auction', NULL),
(8, 'cameleon', 'reptiles', 'amphibians', 'gqebz', 'amphibiens.png', 50, '2', NULL, 'auction', NULL),
(9, 'serpent ', 'reptiles', 'snakes', 'bgsg', 'snake.jpg', 50, '2', 'sell', 'auction', NULL),
(11, 'test4', 'reptiles', 'chameleons', 'njkl', 'Chamaeleo calyptratus, juvénile.jpg', 76, '7', 'sell', NULL, NULL),
(12, 'test_best', 'reptiles', 'amphibians', 'test', 'Ceratophrys cranwelli, albinos.jpg', 46, '1', NULL, NULL, 'trade'),
(13, 'test_lizard', 'reptiles', 'lizards', 't', 'Anolis carolinensis.jpg', 67, '4', NULL, NULL, 'trade');

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `idseller` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `monthexpiration` varchar(50) NOT NULL,
  `yearexpiration` varchar(50) NOT NULL,
  `cvc` varchar(50) NOT NULL,
  PRIMARY KEY (`idseller`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`idseller`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(1, 'marin.dudouet@gmail.com', '123', 'visa.png', '', 'Marin Dudouet', 'steet', '56', 'london', 'england', '94400', '0787689378', 'master', '34EI9832948094823', '04', '2023', '454'),
(2, 'marin.dudouet@gmail.com', '12345', 'visa.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'marin.dudouet@gmail.com', '12345', 'visa.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'marin.dudouet@gmail.com', '123456', 'visa.png', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'marin.dudouet@gmail.com', '12345667', 'visa.png', '', '', '', '', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

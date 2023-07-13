-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 juil. 2023 à 10:18
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `buyer`
--

INSERT INTO `buyer` (`idbuyer`, `username`, `password`, `photo`, `background`, `name`, `street`, `flat`, `city`, `state`, `postcode`, `phone`, `card`, `cardnumber`, `monthexpiration`, `yearexpiration`, `cvc`) VALUES
(1, 'heloise.maiche@free.fr', '1234', '', '', 'Heloise Maiche', 'eugene', '20', 'vitry', 'france', '94400', '0782786454', 'visa', '234454543', '03', '2026', '245'),
(2, 'test4', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'hh', 'hh', 'accroche1.jpg', 'red', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'j', 'hh', 'Boaedon (Lamprophis) fuliginosus, albinos.jpg', 'blue', '', '', '', '', '', '', '', '', '', '', '', '');

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
  `price` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `sell` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `auction` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `trade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `name`, `category`, `second_category`, `description`, `photo`, `price`, `stock`, `sell`, `auction`, `trade`) VALUES
(5, 'cameleon', 'reptiles', '', 'bgsg', 'accroche.jpg', '50', '2', 'sell', NULL, NULL),
(4, 'asticots', 'food', '', 'un oiseau', '', '50', '2', 'sell', 'auction', NULL),
(6, 'cameleon', 'reptiles', 'chameleons', 'un cameleon', 'accroche1.jpg', '50', '2', 'sell', 'auction', NULL),
(7, 'Turtles', 'reptiles', 'turtles', 'a turtles ', 'accroche4.jpg', '60', '6', 'sell', 'auction', NULL),
(8, 'cameleon', 'reptiles', 'amphibians', 'gqebz', 'amphibiens.png', '50', '2', NULL, 'auction', NULL),
(9, 'serpent ', 'reptiles', 'snakes', 'bgsg', 'snake.jpg', '50', '2', 'sell', 'auction', NULL);

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
(1, 'marin.dudouet@gmail.com', '123', '', '', 'Marin Dudouet', 'steet', '56', 'london', 'england', '94400', '0787689378', 'master', '34EI9832948094823', '04', '2023', '454'),
(2, 'marin.dudouet@gmail.com', '12345', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'marin.dudouet@gmail.com', '12345', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'marin.dudouet@gmail.com', '123456', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'marin.dudouet@gmail.com', '12345667', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'test', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

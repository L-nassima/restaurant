-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 juil. 2019 à 15:22
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BookingDate` date NOT NULL,
  `BookingTime` time NOT NULL,
  `NumberOfSeats` tinyint(4) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`Id`, `BookingDate`, `BookingTime`, `NumberOfSeats`, `User_Id`, `CreationTimestamp`) VALUES
(27, '2019-01-04', '12:00:00', 4, 21, '2019-03-15 17:05:43'),
(28, '2020-03-05', '20:00:00', 1, 22, '2019-03-18 10:59:51');

-- --------------------------------------------------------

--
-- Structure de la table `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `QuantityInStock` tinyint(4) NOT NULL,
  `BuyPrice` double NOT NULL,
  `SalePrice` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `meal`
--

INSERT INTO `meal` (`Id`, `Name`, `Photo`, `Description`, `QuantityInStock`, `BuyPrice`, `SalePrice`) VALUES
(12, 'Muffin', 'muffin.jpg', 'Un de nos best. Toujours en quantité limité. Réserver en cas de gros Bug !!', 5, 1.2, 5.1),
(13, 'Salade César', 'saladeCesar.jpg', 'A savourer sans modération !', 0, 1.3, 5.8),
(14, 'Sandwich', 'sandwich.jpg', 'Sandwich fait à la demande pour garder toute sa fraicheur!', 0, 0, 0),
(15, 'PopCorn ', 'popcorn.jpg', 'A consommer sans modération source d\'énergie rapide et efficace !', 22, 1.3, 5.2),
(16, 'Club Sandwich', 'bagel_thon.jpg', 'Sandwich fait à la demande pour garder toute sa fraicheur !!', 20, 0.9, 4.8),
(45, 'Tarte au citron', 'tarte_au_citron.jpg', 'Une tarte au citron fait maison juste sublime !!', 3, 4.12, 5),
(46, 'Gâteau au chocolat', 'gateau_au_chocolat.jpg', 'Gâteau au chocolat avec un goût incomparable !!', 3, 4.12, 5),
(47, 'Cheessburger', 'bacon_cheeseburger.jpg', 'Recette original, fromage affiné, viande bovine de qualité et légumes frais le top des top ! !', 13, 4.7, 6.45),
(48, 'Hotdog', 'hotdog.jpg', 'Pour le repas parfait rapide et efficace', 23, 3.87, 5.43),
(49, 'Jus d\'orange', 'jusDorange.jpg', 'Jus d\'orange pressé à la demande ! Idéal pour faire le plein de vitamines C !', 15, 2.56, 3.85);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `TotalAmount` double DEFAULT NULL,
  `TaxRate` float DEFAULT NULL,
  `TaxAmount` double DEFAULT NULL,
  `CreationTimestamp` datetime DEFAULT NULL,
  `CompleteTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`Id`, `User_Id`, `TotalAmount`, `TaxRate`, `TaxAmount`, `CreationTimestamp`, `CompleteTimestamp`) VALUES
(7, 21, 21.2, 20, 4.24, '2019-03-15 17:05:26', '2019-03-15 17:05:26'),
(8, 21, 21.2, 20, 4.24, '2019-03-15 17:09:18', '2019-03-15 17:09:18'),
(9, 22, 99.7, 20, 19.94, '2019-03-18 10:59:27', '2019-03-18 10:59:27');

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `QuantityOrdered` int(4) NOT NULL,
  `Meal_Id` int(11) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `PriceEach` double NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UniciteMealOrder` (`Meal_Id`,`Order_Id`),
  KEY `Meal_Id` (`Meal_Id`),
  KEY `Order_Id` (`Order_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orderline`
--

INSERT INTO `orderline` (`Id`, `QuantityOrdered`, `Meal_Id`, `Order_Id`, `PriceEach`) VALUES
(23, 2, 12, 9, 5.1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `BirthDate` date NOT NULL,
  `Address` varchar(250) NOT NULL,
  `City` varchar(40) NOT NULL,
  `ZipCode` char(5) NOT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Phone` char(10) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `LastLoginTimestamp` datetime DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `BirthDate`, `Address`, `City`, `ZipCode`, `Country`, `Phone`, `CreationTimestamp`, `LastLoginTimestamp`, `Admin`) VALUES
(21, 'yayou', 'yayou', 'yayou@gmail.com', '$2y$11$5f0416cbdf4f87581281cOdOR8dUmS50xU0RSAv6sCwjvW3aSRVtG', '1940-01-01', '', '', '', '', '', '2019-03-15 17:04:36', '2019-03-15 17:04:59', 1),
(22, 'yazz', 'yazz', 'yazz@gmail.com', '$2y$11$f6bfe56691ca6310a8fcfulIw3AFhrayvjV/MJZH0pDLfpEdk.aqK', '1940-01-01', '', '', '', '', '', '2019-03-18 10:58:55', '2019-03-18 10:59:15', NULL),
(23, 'test', 'test', 'test@test.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2019-05-24', 'test', 'test', 'test', 'test', '0000000000', '2019-05-31 12:00:44', '2019-05-31 12:00:44', NULL),
(32, 'ragon', 'Caro', 'caro@gmail.com', '$2y$10$CVgDcib2F7e4yC7xfOsIB.vk3jmQ5h5WSLkJFqRmVTEJzQloiAslq', '1976-06-25', '4 avenue de paris', 'Clamart', '92300', 'France', '0734214567', '2019-06-02 14:43:05', '2019-06-02 14:43:05', NULL),
(33, 'Lounis', 'Lisa', 'lisa@gmail.com', '$2y$10$vMz5LLooBqZtSxk5pQJj5OEbUQEI.224hOEUUp/qIfESBs59XRJXm', '2010-06-26', '50 Avenue de la paix', 'Chatillon', '92320', 'France', '0943215678', '2019-06-02 14:47:50', '2019-06-02 14:47:50', NULL),
(35, 'lounis', 'Nassima', 'nassima@gmail.com', '$2y$10$31D6lOt5JnHWYVc8wIUhEu4s6K54/c4SGOHqMJ3Lci4EEmSBXnlgC', '1994-06-04', '30 avenue de paris', 'clamart', '92320', 'france', '0734214567', '2019-06-23 16:02:01', '2019-06-23 16:02:01', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Order_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `OrderLine_ibfk_1` FOREIGN KEY (`Meal_Id`) REFERENCES `meal` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderLine_ibfk_2` FOREIGN KEY (`Order_Id`) REFERENCES `order` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
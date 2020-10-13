-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 mars 2020 à 22:05
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iot_manage`
--

-- --------------------------------------------------------

--
-- Structure de la table `iot_modules`
--

DROP TABLE IF EXISTS `iot_modules`;
CREATE TABLE IF NOT EXISTS `iot_modules` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Temperature` int(11) DEFAULT NULL,
  `Duree` int(11) DEFAULT NULL,
  `nbrDonnees` int(11) DEFAULT NULL,
  `Etat` int(11) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `iot_modules`
--

INSERT INTO `iot_modules` (`ID`, `Nom`, `Temperature`, `Duree`, `nbrDonnees`, `Etat`, `dateCreation`) VALUES
(2, 'Fridge', 78, 21, 0, 1, '2020-03-24 20:26:45'),
(3, 'TV', 69, 29, 0, 1, '2020-03-24 20:44:04'),
(6, 'Washing machine', 69, 2, 0, 1, '2020-03-24 21:52:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

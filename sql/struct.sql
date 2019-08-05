-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 15 mai 2019 à 09:28
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aprotect`
--
CREATE DATABASE IF NOT EXISTS `aprotect` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aprotect`;

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `idAchat` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `dateAchat` date DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  `idPaypal` int(11) NOT NULL,
  `idAlloPass` int(11) NOT NULL,
  `codeLicence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `allopass`
--

CREATE TABLE `allopass` (
  `idAlloPass` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT  ,
  `nomClient` varchar(45) DEFAULT NULL,
  `prenomClient` varchar(45) DEFAULT NULL,
  `mailClient` varchar(45) DEFAULT NULL,
  `mdpClient` varchar(45) DEFAULT NULL,
  `dateInscriptionClient` date DEFAULT NULL,
  `dateModificationClient` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `licence`
--

CREATE TABLE `licence` (
  `codeLicence` int(11) PRIMARY KEY NOT NULL,
  `dateAchat` date DEFAULT NULL,
  `dateExpiration` date DEFAULT NULL,
  `status` bool
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paypal`
--

CREATE TABLE `paypal` (
  `idPaypal` int(11) PRIMARY KEY NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_achatAlloPass` FOREIGN KEY (`idAlloPass`) REFERENCES `allopass` (`idAlloPass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AchatClient` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AchatLicence` FOREIGN KEY (`codeLicence`) REFERENCES `licence` (`codeLicence`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AchatPaypal` FOREIGN KEY (`idPaypal`) REFERENCES `paypal` (`idPaypal`) ON DELETE NO ACTION ON UPDATE NO ACTION;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
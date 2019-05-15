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
  `idAchat` int(11) NOT NULL,
  `dateAchat` date DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  `idPaypal` int(11) NOT NULL,
  `idAlloPass` int(11) NOT NULL,
  `codeLicence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `activation`
--

CREATE TABLE `activation` (
  `idActivation` int(11) NOT NULL,
  `statut` tinyint(4) DEFAULT NULL,
  `biosNumber` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `allopass`
--

CREATE TABLE `allopass` (
  `idAlloPass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
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
  `codeLicence` int(11) NOT NULL,
  `dateAchat` date DEFAULT NULL,
  `dateExpiration` date DEFAULT NULL,
  `idActivation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paypal`
--

CREATE TABLE `paypal` (
  `idPaypal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`idAchat`),
  ADD KEY `fk_ACHAT_CLIENT1_idx` (`idClient`),
  ADD KEY `fk_ACHAT_PAYPAL1_idx` (`idPaypal`),
  ADD KEY `fk_ACHAT_ALLOPASS1_idx` (`idAlloPass`),
  ADD KEY `fk_ACHAT_LICENCE1_idx` (`codeLicence`);

--
-- Index pour la table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`idActivation`);

--
-- Index pour la table `allopass`
--
ALTER TABLE `allopass`
  ADD PRIMARY KEY (`idAlloPass`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `idCLIENT_UNIQUE` (`idClient`);

--
-- Index pour la table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`codeLicence`),
  ADD KEY `fk_LICENCE_ACTIVATION1_idx` (`idActivation`);

--
-- Index pour la table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`idPaypal`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fk_ACHAT_ALLOPASS1` FOREIGN KEY (`idAlloPass`) REFERENCES `allopass` (`idAlloPass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ACHAT_CLIENT1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ACHAT_LICENCE1` FOREIGN KEY (`codeLicence`) REFERENCES `licence` (`codeLicence`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ACHAT_PAYPAL1` FOREIGN KEY (`idPaypal`) REFERENCES `paypal` (`idPaypal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `licence`
--
ALTER TABLE `licence`
  ADD CONSTRAINT `fk_LICENCE_ACTIVATION1` FOREIGN KEY (`idActivation`) REFERENCES `activation` (`idActivation`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

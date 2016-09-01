-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 31 Août 2016 à 21:14
-- Version du serveur :  5.5.49-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db624165429`
--

-- --------------------------------------------------------

--
-- Structure de la table `WebAppBaby`
--

CREATE TABLE `db624165429`.`WebAppBaby` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `IsGirl` tinyint(1) NOT NULL,
  `BirthDay` datetime NOT NULL,
  `Actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `WebAppInOutLog`
--

CREATE TABLE `db624165429`.`WebAppInOutLog` (
  `Id` bigint(20) NOT NULL,
  `BabyId` int(11) NOT NULL,
  `Entree` time NOT NULL,
  `Sortie` time NOT NULL,
  `Jour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `WebAppBaby`
--
ALTER TABLE `db624165429`.`WebAppBaby`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `WebAppInOutLog`
--
ALTER TABLE `db624165429`.`WebAppInOutLog`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `WebAppBaby`
--
ALTER TABLE `db624165429`.`WebAppBaby`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `WebAppInOutLog`
--
ALTER TABLE `db624165429`.`WebAppInOutLog`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Avril 2020 à 10:01
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--
CREATE DATABASE hotel_reservation;
use hotel_reservation;

CREATE TABLE `chambre` (
  `ID_chambre` int(11) NOT NULL,
  `description_chambre` text NOT NULL,
  `prix_chambre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`ID_chambre`, `description_chambre`, `prix_chambre`) VALUES
(1, 'Chambre avec vue sur mer. Lit double', 120),
(2, 'Suite présidentielle. Baignoire et balcon. Vue sur mer ', 400),
(3, 'Clapier et lapin. 4m2. Pas de fenêtre. Sanitaire dans le cour. ', 10);

-- --------------------------------------------------------

--
-- Structure de la table `client_res`
--

CREATE TABLE `client_res` (
  `ID` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(50) NOT NULL,
  `ID_chambre` int(11) NOT NULL,
  `date_arrivee` date NOT NULL,
  `nb_nuit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client_res`
--

INSERT INTO `client_res` (`ID`, `nom_client`, `prenom_client`, `ID_chambre`, `date_arrivee`, `nb_nuit`) VALUES
(5, 'Merkel', 'Angela', 2, '2020-01-05', 5),
(4, 'Macron', 'Emmanuel ', 1, '2020-01-01', 10),
(7, 'Xi', 'Jinping', 4, '2020-01-01', 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`ID_chambre`);

--
-- Index pour la table `client_res`
--
ALTER TABLE `client_res`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `ID_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `client_res`
--
ALTER TABLE `client_res`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

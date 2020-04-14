-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 13:20
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ebayece`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID-Categorie` int(10) NOT NULL,
  `Nom-Categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`ID-Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID-Categorie`, `Nom-Categorie`) VALUES
(1, 'Ferraille ou Trésor'),
(2, 'Bon pour le Musée'),
(3, 'Accessoire VIP');

-- --------------------------------------------------------

--
-- Structure de la table `comptebancaire`
--

DROP TABLE IF EXISTS `comptebancaire`;
CREATE TABLE IF NOT EXISTS `comptebancaire` (
  `ID-Util` varchar(255) NOT NULL,
  `NumBancaire` varchar(255) NOT NULL,
  `Cryptogramme` int(25) NOT NULL,
  `NomCarte` varchar(255) NOT NULL,
  `TypeCarte` varchar(255) NOT NULL,
  `DateExpiration` date NOT NULL,
  `Fond` int(255) NOT NULL,
  PRIMARY KEY (`NumBancaire`),
  KEY `ID-Util` (`ID-Util`),
  KEY `NomCarte` (`NomCarte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comptebancaire`
--

INSERT INTO `comptebancaire` (`ID-Util`, `NumBancaire`, `Cryptogramme`, `NomCarte`, `TypeCarte`, `DateExpiration`, `Fond`) VALUES
('pablomontels', '1423-8034-7618-1803', 983, 'Montels', 'MasterCard', '2023-02-01', 100000);

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `ID-Enchère` int(100) NOT NULL,
  `ID-Item-E` int(100) NOT NULL,
  `ID-Acheteur-E` varchar(255) NOT NULL,
  `PrixMax` int(100) NOT NULL,
  PRIMARY KEY (`ID-Enchère`),
  KEY `ID-Item-E` (`ID-Item-E`),
  KEY `ID-Acheteur-E` (`ID-Acheteur-E`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `ID-Item` int(100) NOT NULL,
  `ID-Owner` varchar(255) NOT NULL,
  `DateDébut` date NOT NULL,
  `DateFin` date NOT NULL,
  `Prix` int(255) NOT NULL,
  `Catégorie` int(10) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Enchère` tinyint(1) NOT NULL,
  `MeilleurOffre` tinyint(1) NOT NULL,
  `AchatDirect` tinyint(1) NOT NULL,
  `Statut` tinyint(1) NOT NULL,
  `urlPhoto` varchar(255) NOT NULL,
  `urlVideo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID-Item`),
  UNIQUE KEY `Catégorie` (`Catégorie`),
  KEY `ID-Owner` (`ID-Owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`ID-Item`, `ID-Owner`, `DateDébut`, `DateFin`, `Prix`, `Catégorie`, `Nom`, `Enchère`, `MeilleurOffre`, `AchatDirect`, `Statut`, `urlPhoto`, `urlVideo`) VALUES
(1, 'robinlabrot', '2020-04-13', '2020-05-09', 10, 1, 'Statut d\'un Homme', 1, 1, 1, 0, 'statuthomme.jpg', ''),
(2, 'timotheebois', '2020-04-22', '2020-05-16', 1000, 3, 'Bague en Or', 1, 0, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `ID-Utilisateur` varchar(255) NOT NULL,
  `Adresse1` varchar(255) NOT NULL,
  `Adresse2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CodePostal` int(5) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numéro` int(10) NOT NULL,
  `ID-Livraison` int(11) NOT NULL,
  PRIMARY KEY (`Numéro`,`ID-Livraison`),
  KEY `ID-Utilisateur` (`ID-Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`ID-Utilisateur`, `Adresse1`, `Adresse2`, `Ville`, `CodePostal`, `Pays`, `Numéro`, `ID-Livraison`) VALUES
('pablomontels', '30 Rue Sibuet ', '.', 'Paris', 75012, 'France', 651352236, 1);

-- --------------------------------------------------------

--
-- Structure de la table `meilleuroffre`
--

DROP TABLE IF EXISTS `meilleuroffre`;
CREATE TABLE IF NOT EXISTS `meilleuroffre` (
  `ID-MeilleurVente` int(100) NOT NULL,
  `ID-Item-M` int(100) NOT NULL,
  `ID-Acheteur-M` varchar(255) NOT NULL,
  `Acceptation` tinyint(1) NOT NULL,
  `Compteur` int(100) NOT NULL,
  `MeilleurOffre` int(255) NOT NULL,
  `Sur-Enchere` int(255) NOT NULL,
  PRIMARY KEY (`ID-MeilleurVente`),
  KEY `ID-Item-M` (`ID-Item-M`),
  KEY `ID-Acheteur-M` (`ID-Acheteur-M`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID-Acheteur` varchar(255) NOT NULL,
  `ID-Item` int(100) NOT NULL,
  `ID-Vente` int(255) NOT NULL,
  `Prix` int(255) NOT NULL,
  PRIMARY KEY (`ID-Vente`),
  KEY `ID-Item` (`ID-Item`),
  KEY `ID-Acheteur` (`ID-Acheteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Pseudo` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Clause` tinyint(1) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `Vendeur` tinyint(1) NOT NULL,
  `Acheteur` tinyint(1) NOT NULL,
  PRIMARY KEY (`Pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Pseudo`, `Nom`, `Prénom`, `Email`, `Password`, `Clause`, `Admin`, `Vendeur`, `Acheteur`) VALUES
('clementjanot', 'Janot', 'Clément', 'clement.janot@edu.ece.fr', 'Acheteur123', 1, 0, 0, 1),
('jeanneroques', 'Roques', 'Jeanne', 'jeanne.roques@edu.ece.fr', 'Admin456', 1, 1, 1, 1),
('pablomontels', 'Montels', 'Pablo', 'pablo.montels@edu.ece.fr', 'Admin123', 1, 1, 1, 1),
('robinlabrot', 'Labrot', 'Robin', 'robin.labrot@edu.ece.fr', 'Vendeur123', 1, 0, 1, 1),
('timotheebois', 'Bois', 'Timothée', 'timothe.bois@edu.ece.fr', 'Vendeur456', 1, 0, 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comptebancaire`
--
ALTER TABLE `comptebancaire`
  ADD CONSTRAINT `comptebancaire_ibfk_1` FOREIGN KEY (`ID-Util`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`ID-Acheteur-E`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enchere_ibfk_2` FOREIGN KEY (`ID-Item-E`) REFERENCES `item` (`ID-Item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ID-Owner`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`Catégorie`) REFERENCES `categorie` (`ID-Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`ID-Utilisateur`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `meilleuroffre`
--
ALTER TABLE `meilleuroffre`
  ADD CONSTRAINT `meilleuroffre_ibfk_1` FOREIGN KEY (`ID-Item-M`) REFERENCES `item` (`ID-Item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meilleuroffre_ibfk_2` FOREIGN KEY (`ID-Acheteur-M`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`ID-Acheteur`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`ID-Item`) REFERENCES `item` (`ID-Item`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

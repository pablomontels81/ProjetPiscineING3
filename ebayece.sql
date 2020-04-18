-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 09:40
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
  `IDEnchere` int(255) NOT NULL AUTO_INCREMENT,
  `IDItemE` int(100) NOT NULL,
  `IDAcheteurE` varchar(255) NOT NULL,
  `PrixMax` int(255) NOT NULL,
  PRIMARY KEY (`IDEnchere`),
  KEY `IDItemE` (`IDItemE`),
  KEY `IDAcheteurE` (`IDAcheteurE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enchere`
--

INSERT INTO `enchere` (`IDEnchere`, `IDItemE`, `IDAcheteurE`, `PrixMax`) VALUES
(1, 1, 'jeanmarcmontels', 20),
(2, 1, 'pablomontels', 150);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `IDItem` int(255) NOT NULL AUTO_INCREMENT,
  `IDOwner` varchar(255) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Enchere` tinyint(1) NOT NULL,
  `Achatdirect` tinyint(1) NOT NULL,
  `Meilleuroffre` tinyint(1) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `Prix` int(255) NOT NULL,
  `urlPhoto` varchar(255) NOT NULL,
  `urlVideo` varchar(255) NOT NULL,
  PRIMARY KEY (`IDItem`),
  KEY `IDOwner` (`IDOwner`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`IDItem`, `IDOwner`, `DateDebut`, `DateFin`, `Categorie`, `Nom`, `Enchere`, `Achatdirect`, `Meilleuroffre`, `statut`, `Prix`, `urlPhoto`, `urlVideo`) VALUES
(1, 'robinlabrot', '2020-04-15', '2020-04-30', 'Feraille_Tresor', 'Statut Homme', 1, 1, 1, 0, 70, 'StatutHomme.jpg', ''),
(2, 'robinlabrot', '2020-04-17', '2020-05-30', 'VIP', 'Bague Love ', 1, 1, 0, 0, 300, 'BagueLove.jpg', ''),
(3, 'timotheebois', '2020-04-15', '2020-04-30', 'VIP', 'Bague Or', 1, 1, 0, 0, 200, 'BagueOr.jpg', ''),
(4, 'timotheebois', '2020-04-17', '2020-05-29', 'VIP', 'Collier Moncler', 1, 1, 1, 0, 270, 'CollierMoncler.png', ''),
(5, 'pablomontels', '2020-04-19', '2020-05-09', 'Feraille_Tresor', 'Fauteuil Louis XVI', 0, 1, 1, 0, 100, 'FauteuilLouisXVI.jpg', ''),
(6, 'pablomontels', '2020-04-23', '2020-05-09', 'Feraille_Tresor', 'Meuble Louis XV', 1, 1, 0, 0, 200, 'MeubleLouisXV.jpg', ''),
(7, 'robinlabrot', '2020-04-17', '2020-05-16', 'Feraille_Tresor', 'Mirroir Louis XVI', 1, 1, 1, 0, 35, 'MirroirLouisXVI.jpg', ''),
(8, 'timotheebois', '2020-04-17', '2020-05-16', 'Musee', 'Pièce datant de l\'époque de Napoléon', 1, 0, 1, 0, 100, 'PieceNapoleon.jpg', ''),
(9, 'jeanneroques', '2020-04-17', '2020-05-22', 'Musee', 'Tableau représentant la Campagne', 1, 1, 0, 0, 20, 'TableauCampagne.jpg', ''),
(10, 'pablomontels', '2020-04-17', '2020-05-29', 'Musee', 'Timbre Ancien', 0, 1, 1, 0, 50, 'TimbreAncien.jpg', ''),
(11, 'jeanmarcmontels', '2020-04-18', '2020-05-30', 'VIP', 'Bracelet Fred Edition Limité', 1, 1, 0, 0, 1200, 'BraceletFredEdiLimite.jpg', ''),
(12, 'pablomontels', '2020-04-18', '2020-05-08', 'VIP', 'Lunette de Soleil Edition Limité Hermes', 0, 1, 1, 0, 400, 'LunetteHermes.jpg', ''),
(13, 'robinlabrot', '2020-04-18', '2020-05-15', 'VIP', 'Collier Bulgari Serpenti', 1, 1, 0, 0, 300, 'CollierBulgari.jpg', ''),
(14, 'timotheebois', '2020-04-17', '2020-05-09', 'VIP', 'Montre Rolex', 0, 1, 0, 0, 1800, 'MontreRolex.jpg', ''),
(15, 'jeanneroques', '2020-04-18', '2020-05-23', 'VIP', 'Sac Timeless Matelassé Noir Iconic Chanel', 0, 1, 1, 0, 4000, 'SacChanel.jpg', ''),
(21, 'robinlabrot', '2020-04-18', '2020-04-30', 'Feraille_Tresor', 'Meuble XVIII Siècle', 1, 1, 0, 0, 75, 'MeubleXVIII.jpg', ''),
(22, 'robinlabrot', '2020-04-18', '2020-05-23', 'Feraille_Tresor', 'Malles Style grandes découverte du XIX Siècle', 0, 1, 1, 0, 400, 'MallesXIX.jpg', ''),
(23, 'timotheebois', '2020-04-11', '2020-05-23', 'Feraille_Tresor', 'Casserole en Ferraille ', 0, 1, 1, 0, 75, 'Casserole.jpg', ''),
(24, 'timotheebois', '2020-04-11', '2020-05-23', 'Feraille_Tresor', 'Pièce 5 Francs Napoléon III', 1, 0, 1, 0, 220, 'PieceNapoIII.jpg', ''),
(27, 'pablomontels', '2020-04-18', '2020-05-23', 'Feraille_Tresor', 'Pièce Napoléon 1er', 1, 1, 1, 0, 760, 'PieceNapoI.jpg', ''),
(28, 'pablomontels', '2020-04-18', '2020-05-30', 'Musee', 'Fauteuil Style Mondrian', 0, 1, 0, 0, 360, 'FauteuilMondrian.jpg', ''),
(29, 'jeanmarcmontels', '2020-04-18', '2020-05-23', 'Musee', 'Fauteuil Style Campana', 1, 1, 0, 0, 350, 'FauteuilCampana.png', ''),
(30, 'jeanmarcmontels', '2020-04-18', '2020-05-23', 'Musee', 'Chaise Longue Le Corbusier ', 1, 1, 1, 0, 590, 'ChaiseLeCorbusier.jpg', ''),
(31, 'jeanneroques', '2020-04-18', '2020-05-23', 'Musee', 'Bibliothèque Style C.Perriand', 0, 1, 1, 0, 670, 'BibliothequePerriand.jpg', ''),
(32, 'jeanneroques', '2020-04-18', '2020-05-16', 'Musee', 'Meuble Design J.Prouvé', 1, 1, 0, 0, 730, 'MeubleProuve.jpg', ''),
(33, 'pablomontels', '2020-04-18', '2020-05-16', 'Musee', 'Fauteuil C.Perriand', 1, 1, 1, 0, 780, 'FauteuilPerriand.jpg', ''),
(39, 'martinmontels', '2020-04-18', '2020-05-17', 'Feraille_Tresor', 'Moto Ancienne', 1, 1, 0, 0, 200, 'MotoAncienne.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `IDLivraison` int(255) NOT NULL AUTO_INCREMENT,
  `IDPersonne` varchar(255) NOT NULL,
  `Adresse1` varchar(255) NOT NULL,
  `Adresse2` varchar(255) NOT NULL,
  `CodePostal` int(5) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numéro` int(20) NOT NULL,
  PRIMARY KEY (`IDLivraison`),
  KEY `IDPersonne` (`IDPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `meilleuroffre`
--

DROP TABLE IF EXISTS `meilleuroffre`;
CREATE TABLE IF NOT EXISTS `meilleuroffre` (
  `IDMeilleurOffre` int(255) NOT NULL AUTO_INCREMENT,
  `IDItemM` int(255) NOT NULL,
  `IDAcheteurM` varchar(255) NOT NULL,
  `Acceptation` tinyint(1) NOT NULL,
  `Compteur` int(100) NOT NULL,
  `SurEnchere` int(255) NOT NULL,
  PRIMARY KEY (`IDMeilleurOffre`),
  KEY `IDItemM` (`IDItemM`),
  KEY `IDAcheteurM` (`IDAcheteurM`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meilleuroffre`
--

INSERT INTO `meilleuroffre` (`IDMeilleurOffre`, `IDItemM`, `IDAcheteurM`, `Acceptation`, `Compteur`, `SurEnchere`) VALUES
(1, 4, 'jeanmarcmontels', 0, 1, 150);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IDVente` int(255) NOT NULL AUTO_INCREMENT,
  `IDItemP` int(255) NOT NULL,
  `IDAcheteurP` varchar(255) NOT NULL,
  `PrixFinal` int(255) NOT NULL,
  PRIMARY KEY (`IDVente`),
  KEY `IDItemP` (`IDItemP`),
  KEY `IDAcheteurP` (`IDAcheteurP`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`IDVente`, `IDItemP`, `IDAcheteurP`, `PrixFinal`) VALUES
(2, 3, 'pablomontels', 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Pseudo` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
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

INSERT INTO `utilisateur` (`Pseudo`, `Nom`, `Prenom`, `Email`, `Password`, `Clause`, `Admin`, `Vendeur`, `Acheteur`) VALUES
('clementjanot', 'Janot', 'Clément', 'clement.janot@edu.ece.fr', 'Acheteur123', 1, 0, 0, 1),
('jeanmarcmontels', 'Montels', 'Jean-Marc', 'jean-marc.montels@edu.ece.fr', 'Jaeger1963', 1, 0, 1, 1),
('jeanneroques', 'Roques', 'Jeanne', 'jeanne.roques@edu.ece.fr', 'Admin456', 1, 1, 1, 1),
('martinmontels', 'Montels', 'Martin', 'martin.montels@edu.ece.fr', 'Jaeger2001', 1, 0, 1, 1),
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
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`IDAcheteurE`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enchere_ibfk_2` FOREIGN KEY (`IDItemE`) REFERENCES `item` (`IDItem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`IDOwner`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`IDPersonne`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `meilleuroffre`
--
ALTER TABLE `meilleuroffre`
  ADD CONSTRAINT `meilleuroffre_ibfk_1` FOREIGN KEY (`IDAcheteurM`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meilleuroffre_ibfk_2` FOREIGN KEY (`IDItemM`) REFERENCES `item` (`IDItem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`IDAcheteurP`) REFERENCES `utilisateur` (`Pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`IDItemP`) REFERENCES `item` (`IDItem`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

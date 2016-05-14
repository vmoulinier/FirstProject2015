-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Mai 2016 à 19:50
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `zesteetpoomenu`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id_categorie`, `libelle`) VALUES
(1, 'Vin blanc'),
(2, 'Vin rouge'),
(3, 'Vin rosé'),
(4, 'Vin vert');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` decimal(5,2) DEFAULT NULL,
  `paye` tinyint(1) NOT NULL DEFAULT '0',
  `id_membres` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_membres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date`, `montant`, `paye`, `id_membres`) VALUES
(1, '2016-03-09 16:48:02', '9.20', 1, 9),
(2, '2016-03-16 14:49:16', '10.00', 0, 1),
(3, '2016-03-18 09:27:55', '18.40', 1, 1),
(4, '2016-03-24 14:19:40', '37.60', 1, 1),
(5, '2016-03-24 14:22:50', '30.00', 1, 13),
(6, '2016-03-24 16:07:19', '31.40', 1, 1),
(7, '2016-03-30 10:16:19', '25.50', 1, 1),
(8, '2016-03-30 13:32:29', '9.00', 0, 1),
(11, '2016-03-30 14:04:06', '0.00', 0, 0),
(12, '2016-03-30 14:05:55', '5.00', 1, 1),
(13, '2016-03-30 14:06:35', '5.00', 1, 1),
(14, '2016-03-30 14:07:24', '2.99', 0, 1),
(15, '2016-03-30 14:20:08', '5.98', 0, 1),
(16, '2016-03-30 14:43:13', '10.00', 0, 1),
(17, '2016-03-30 14:44:51', '15.00', 0, 2),
(18, '2016-04-06 10:18:31', '5.01', 1, 1),
(19, '2016-04-20 14:03:00', '15.00', 1, 1),
(20, '2016-04-20 15:08:30', '9.05', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id_ligne` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `montant_unitaire` decimal(5,2) NOT NULL,
  `montant_total` decimal(5,2) NOT NULL,
  `quantite` int(11) NOT NULL,
  `paye` tinyint(1) NOT NULL DEFAULT '0',
  `id_produit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ligne`),
  UNIQUE KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_ligne`, `id_commande`, `libelle`, `montant_unitaire`, `montant_total`, `quantite`, `paye`, `id_produit`) VALUES
(1, 1, 'Vin blanc moelleux du Medoc', '9.20', '9.20', 1, 0, NULL),
(2, 2, ' Vin blanc Doux', '5.00', '10.00', 2, 0, NULL),
(3, 3, 'Vin blanc moelleux du Medoc', '9.20', '18.40', 2, 0, NULL),
(4, 4, ' Vin blanc Doux', '5.00', '10.00', 2, 0, NULL),
(5, 4, 'Vin blanc moelleux du Medoc', '9.20', '27.60', 3, 0, NULL),
(6, 5, ' Vin blanc Doux', '5.00', '30.00', 6, 0, NULL),
(7, 6, 'Vin blanc moelleux du Medoc', '9.20', '18.40', 2, 0, NULL),
(8, 6, 'vin rosé 2', '6.50', '13.00', 2, 0, NULL),
(9, 7, 'Vinc blanc de Dordogne ', '9.00', '9.00', 1, 0, NULL),
(10, 7, ' vin rouge 3', '5.50', '16.50', 3, 0, NULL),
(11, 8, 'Vinc blanc de Dordogne ', '9.00', '9.00', 1, 0, NULL),
(14, 11, ' Vin blanc Doux', '5.00', '5.00', 1, 0, NULL),
(15, 12, ' Vin blanc Doux', '5.00', '5.00', 1, 0, NULL),
(16, 13, ' Vin blanc Doux', '5.00', '5.00', 1, 0, NULL),
(17, 14, ' dsfdsf', '2.99', '2.99', 1, 0, NULL),
(18, 0, ' dsfdsf', '2.99', '5.98', 2, 0, NULL),
(19, 15, ' dsfdsf', '2.99', '5.98', 2, 0, NULL),
(20, 16, ' Vin vert bizarre', '5.00', '10.00', 2, 0, NULL),
(21, 17, ' Vin vert bizarre', '5.00', '15.00', 3, 0, NULL),
(22, 18, ' Vin blanc Doux', '5.01', '5.01', 1, 0, NULL),
(23, 19, ' Vin vert bizarre', '5.00', '15.00', 3, 0, NULL),
(24, 20, 'Vinc blanc de Dordogne ', '9.05', '9.05', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `cp` int(6) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse_1` varchar(255) NOT NULL,
  `adresse_2` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `mail`, `motdepasse`, `nom`, `prenom`, `entreprise`, `cp`, `ville`, `adresse_1`, `adresse_2`, `telephone`) VALUES
(1, 'vmoulinier33@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', 'Moulinier', 'Bernardolol', 'J2M-ELEC SARL', 33130, 'Begles', '98 rue louis rochemond', '', '08884'),
(2, 'vmoulinier333@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', 'Gerard', 'Moulinier', 'BWMC', 33000, 'Bordeaux', '3 chemin de Marticot', '', '556491904'),
(3, 'morgan.mprgan@morgab.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Ma', 'Coucou', '', 22333, 'Peee', 'Coicukdk', '', '614965438'),
(4, 'coucoi@lol.fr', '403926033d001b5279df37cbbe5287b7c7c267fa', '', '', '', 0, '', '', '', ''),
(5, '', '', 'toto', 'Valentin', '', 33000, 'Cestas', '3 chemin de marticot', 'rien', '0666157454'),
(6, '', '', 'moulinier', 'Valentin', '', 33000, 'Cestas', '3 chemin de marticot', 'rien', '0666157454'),
(7, '', '', 'toto', 'Valentin', '', 33000, 'Cestas', '3 chemin de marticot', 'rien', '0666157454'),
(8, '', '', 'toto', 'Valentin', '', 33000, 'Cestas', '3 chemin de marticot', 'rien', '0666157454'),
(9, 'test@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', 'Mouli', 'Valou', 'tamere', 33000, 'Bordeaux', '114 Lucien Faure', '', '0555555555'),
(10, 'vmoulinier331@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', '', '', '', 0, '', '', '', ''),
(11, 'vmoulinier331@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', '', '', '', 0, '', '', '', ''),
(12, 'vmoulinier3@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', '', '', '', 0, '', '', '', ''),
(13, 'pute@gmail.com', '', 'Tamere', 'lagrosse ', 'coucou', 33000, 'BODEO', 'LKqjsdjsq ', 'dsfoso', '0556655222'),
(14, 'valerie@gmail.com', '', 'Veaux', 'Valerie', '', 33130, 'Begles', '98 rue louis rochemond', '', '0666157454'),
(15, 'vmoulinier@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', 'valentin', '', '', 0, '', '', '', ''),
(16, 'blabla1@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', '', '', '', 0, '', '', '', ''),
(17, 'blabla2@gmail.com', 'be2b494ded4d42d4678939c3aa578a55dfcdb2a2', '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `prix` decimal(4,2) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `description`, `prix`, `id_categorie`) VALUES
(20, 'Vin blanc moelleux du Medoc', '                                                                                                                                                                                                                                                                        Vin Blanc moelleu lol\r\n                                                                                                                                                                                                                                                                        ', '9.24', 1),
(21, 'Vinc blanc de Dordogne ', '                                                                                                                                                                                                                                                                        Vin demi-sec                 mdr                                                                                                                                                                                                                                                       ', '9.05', 1),
(22, 'vin rouge 1', 'vin rouge 1', '5.90', 2),
(23, 'vin rouge 2', 'vin rouge 2', '4.90', 2),
(24, 'vin rosé 1', 'vin rosé 1', '5.50', 3),
(25, 'vin rosé 2', 'vin rosé 2', '6.50', 3),
(27, ' vin rouge 3', ' lib vin rouge 3', '5.50', 2),
(37, ' Vin vert bizarre', 'miam', '5.00', 4);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_produit` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

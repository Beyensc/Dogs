-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 25 Mars 2016 à 08:48
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dogs`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `matricule` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `mdp` varchar(25) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_agent_id_type` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `chien`
--

CREATE TABLE IF NOT EXISTS `chien` (
  `id_chien` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `num_puce` varchar(200) DEFAULT NULL,
  `sexe` varchar(200) NOT NULL,
  `date_naissance` varchar(200) NOT NULL,
  `puce_dogs` varchar(200) NOT NULL,
  `tatoo_dogs` varchar(200) NOT NULL,
  `detention` varchar(250) NOT NULL,
  `club` varchar(200) NOT NULL,
  `club_adresse` varchar(250) NOT NULL,
  `mordant` varchar(3) NOT NULL,
  `veto` varchar(200) NOT NULL,
  `vetotel` varchar(200) NOT NULL,
  `actif` varchar(1) NOT NULL DEFAULT 'O',
  `id_race` int(11) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_chien`),
  KEY `FK_chien_id_race` (`id_race`),
  KEY `FK_chien_id_proprietaire` (`id_proprietaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Contenu de la table `chien`
--

INSERT INTO `chien` (`id_chien`, `nom`, `num_puce`, `sexe`, `date_naissance`, `puce_dogs`, `tatoo_dogs`, `detention`, `club`, `club_adresse`, `mordant`, `veto`, `vetotel`, `actif`, `id_race`, `id_proprietaire`) VALUES
(88, 'm', NULL, '', '', '', '', '', '', '', '', '', '', 'O', NULL, 67),
(90, 'loulou', '12367', 'male', '30/07/1991', '27537', '37783', '/', '/', '/', 'oui', '/', '/', 'O', 9, 67);

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE IF NOT EXISTS `effectuer` (
  `id_user` int(11) NOT NULL,
  `id_verification` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_verification`),
  KEY `FK_effectuer_id_verification` (`id_verification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE IF NOT EXISTS `proprietaire` (
  `id_proprietaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `date_naissance` varchar(200) NOT NULL,
  `lieu_naissance` varchar(200) NOT NULL,
  `rue` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `CP` varchar(25) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `gsm` varchar(100) DEFAULT NULL,
  `periode_dispo` varchar(200) NOT NULL,
  `autre_dispo` varchar(200) NOT NULL,
  `nom_contact` varchar(200) NOT NULL,
  `prenom_contact` varchar(200) NOT NULL,
  `num_contact` varchar(200) NOT NULL,
  `actif` varchar(1) DEFAULT 'O',
  PRIMARY KEY (`id_proprietaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `rue`, `numero`, `CP`, `ville`, `pays`, `mail`, `telephone`, `gsm`, `periode_dispo`, `autre_dispo`, `nom_contact`, `prenom_contact`, `num_contact`, `actif`) VALUES
(67, 'Beyens', 'ClÃ©ment', '', 'Mouscron', 'Du dragon', '113', '7700', 'Mouscron', 'Belgique', 'beyens.c@gmail.com', '056336720', '0474667069', 'matin', 'vers 17h', 'test', 'test', 'test', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id_race` int(11) NOT NULL AUTO_INCREMENT,
  `race` varchar(200) DEFAULT NULL,
  `id_chien` int(11) DEFAULT NULL,
  `actif` varchar(1) NOT NULL DEFAULT 'O',
  PRIMARY KEY (`id_race`),
  KEY `FK_race_id_chien` (`id_chien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `race`
--

INSERT INTO `race` (`id_race`, `race`, `id_chien`, `actif`) VALUES
(1, 'Akita inu', NULL, 'O'),
(2, 'American staffordhire terrier', NULL, 'O'),
(3, 'Band dog', NULL, 'O'),
(4, 'Bull terrier', NULL, 'O'),
(5, 'Dogo Argentino', NULL, 'O'),
(6, 'Dogue de Bordeaux', NULL, 'O'),
(7, 'English terrier', NULL, 'O'),
(8, 'Fila Braziliero', NULL, 'O'),
(9, 'Mastiff (toutes origines)', NULL, 'O'),
(10, 'Pit bull terrier', NULL, 'O'),
(11, 'Rodhesian Ridgeback', NULL, 'O'),
(12, 'Rottweiler', NULL, 'O'),
(13, 'Tosa Inu', NULL, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_type`),
  KEY `FK_type_id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `type`, `id_user`) VALUES
(1, 'Ma&#238;tre chien', NULL),
(2, 'agent', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `verification`
--

CREATE TABLE IF NOT EXISTS `verification` (
  `id_verification` int(11) NOT NULL AUTO_INCREMENT,
  `verification` varchar(100) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `date_verification` date DEFAULT NULL,
  PRIMARY KEY (`id_verification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `verification`
--

INSERT INTO `verification` (`id_verification`, `verification`, `etat`, `date_verification`) VALUES
(1, 'test', 0, NULL),
(2, 'test2', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `verifier`
--

CREATE TABLE IF NOT EXISTS `verifier` (
  `id_proprietaire` int(11) NOT NULL,
  `id_verification` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_proprietaire`,`id_verification`),
  KEY `FK_verifier_id_verification` (`id_verification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `FK_agent_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `chien`
--
ALTER TABLE `chien`
  ADD CONSTRAINT `FK_chien_id_proprietaire` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`),
  ADD CONSTRAINT `FK_chien_id_race` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`);

--
-- Contraintes pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `FK_effectuer_id_user` FOREIGN KEY (`id_user`) REFERENCES `agent` (`id_user`),
  ADD CONSTRAINT `FK_effectuer_id_verification` FOREIGN KEY (`id_verification`) REFERENCES `verification` (`id_verification`);

--
-- Contraintes pour la table `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `FK_race_id_chien` FOREIGN KEY (`id_chien`) REFERENCES `chien` (`id_chien`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `FK_type_id_user` FOREIGN KEY (`id_user`) REFERENCES `agent` (`id_user`);

--
-- Contraintes pour la table `verifier`
--
ALTER TABLE `verifier`
  ADD CONSTRAINT `FK_verifier_id_proprietaire` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`),
  ADD CONSTRAINT `FK_verifier_id_verification` FOREIGN KEY (`id_verification`) REFERENCES `verification` (`id_verification`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

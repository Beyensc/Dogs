-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 15 Mars 2017 à 21:06
-- Version du serveur :  5.7.13-0ubuntu0.16.04.2
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dogs`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `matricule` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `nom`, `prenom`, `matricule`, `login`, `mdp`, `id_type`) VALUES
(2, 'Beyens', 'Clément', 123456, 'beyensc', 'clembey1991', 1),
(3, 'beyens', 'pascal', 12345689, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(4, 'beyens', 'clement', 123456789, 'Beyensc', 'cdff807c8f4e0b078045b454b3575af4', 1),
(5, 'jacques', 'albert', 132456, 'AlJ', 'cfa970af1c7913d4410b3c6975cf5c40', 2),
(6, 'agent', 'jacque', 458976, 'agent', 'agent', 2),
(7, 'dupont', 'jacque', 123546, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `chien`
--

CREATE TABLE `chien` (
  `id_chien` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `date_naissance` varchar(25) DEFAULT NULL,
  `num_puce` varchar(10) DEFAULT NULL,
  `sexe` char(7) DEFAULT NULL,
  `puce_dogs` varchar(25) DEFAULT NULL,
  `tatoo_dogs` varchar(25) DEFAULT NULL,
  `detention` varchar(50) DEFAULT NULL,
  `mordant` varchar(3) DEFAULT NULL,
  `actif` char(1) DEFAULT 'O',
  `remarque` text,
  `dangereux` char(3) DEFAULT NULL,
  `id_race` int(11) DEFAULT NULL,
  `id_veterinaire` int(11) DEFAULT NULL,
  `id_proprietaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chien`
--

INSERT INTO `chien` (`id_chien`, `nom`, `date_naissance`, `num_puce`, `sexe`, `puce_dogs`, `tatoo_dogs`, `detention`, `mordant`, `actif`, `remarque`, `dangereux`, `id_race`, `id_veterinaire`, `id_proprietaire`) VALUES
(2, 'doug', '25/12/2016', '123654', 'male', '123584', '12569', 'jardin', 'non', 'O', 'ras', 'non', 10, 3, 1),
(3, 'brutus', '05/07/2014', '1256487', 'femelle', '123564789', '123456', 'cave', 'oui', 'O', NULL, 'non', 8, 2, 2),
(4, 'basile', '20/09/2001', '12598', 'male', '45896', '41259', 'cuisine', 'non', 'O', NULL, 'non', 3, 2, 1),
(5, 'junior', '06/08/2011', '7459', 'male', '/', '/', 'salon', 'non', 'O', NULL, 'non', 8, 4, 1),
(6, 'yuna', '02/08/2012', '/', 'femelle', '/', '/', 'salle de bain', 'non', 'O', NULL, 'non', 6, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `nom_club` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `numero` varchar(25) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`id_club`, `nom_club`, `rue`, `numero`, `cp`, `ville`, `pays`, `telephone`) VALUES
(1, 'Union canine Mouscronnoise ', ' Rue du Labyrinthe', '225', 7700, 'Mouscron', 'BE', NULL),
(2, 'Le pisteur', 'Rue du plavitout ', NULL, 7700, 'Mouscron', 'BE', '0479 76 16 98'),
(3, 'K9', 'Rua Albert premier', '56', 7700, 'Mouscron', 'BE', '056881549');

-- --------------------------------------------------------

--
-- Structure de la table `personne_de_contacte`
--

CREATE TABLE `personne_de_contacte` (
  `id_pdc` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `gsm` varchar(40) DEFAULT NULL,
  `rue` varchar(100) DEFAULT NULL,
  `numero` varchar(25) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne_de_contacte`
--

INSERT INTO `personne_de_contacte` (`id_pdc`, `nom`, `prenom`, `telephone`, `gsm`, `rue`, `numero`, `cp`, `ville`, `pays`, `id_proprietaire`) VALUES
(3, 'beyens', 'clement', '056998877', '0474885566', 'dragon', '56', 7700, 'mouqcron', 'bel', 2),
(5, 'dupond', 'sarah', '056994478', '0474558972', 'du beauvoisinage', '45', 7700, 'mouscron', 'be', 1),
(6, 'laurence', 'martens', '056884422', '0474996634', 'chene', '33', 7700, 'Mouscron', 'BE', 3);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id_proprietaire` int(11) NOT NULL,
  `id_chien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_proprietaire` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `date_naissance` varchar(20) NOT NULL,
  `lieu_naissance` varchar(100) DEFAULT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `gsm` varchar(40) DEFAULT NULL,
  `actif` char(1) NOT NULL DEFAULT 'O',
  `mail` varchar(100) DEFAULT NULL,
  `rue` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL,
  `periode_dispo` varchar(100) DEFAULT NULL,
  `autre_dispo` varchar(25) DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `id_club` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `telephone`, `gsm`, `actif`, `mail`, `rue`, `numero`, `cp`, `ville`, `pays`, `periode_dispo`, `autre_dispo`, `id_agent`, `id_club`) VALUES
(1, 'Beyens', 'Clement', '2017-03-09', 'Mouscron', '/', '0474667069', 'O', 'beyens.c@gmail.com', 'dragon', '113', 7700, 'Mouscron', 'BE', '/', '/', 2, NULL),
(2, 'Beyens', 'Emilien', '2017-03-22', 'Mouscron', '', '', 'O', '/', 'du dragon', '113', 7700, 'Mouscron', 'BE', '', '', NULL, NULL),
(3, 'tibo', 'redoute', '30/12/1944', 'mouscron', '056998844', '0474112233', 'O', 'mou@gmail.com', 'chene', '33', 7700, 'Mouscron', 'BE', 'matin', '/', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `race` varchar(50) DEFAULT NULL,
  `actif` char(1) DEFAULT 'O'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `race`
--

INSERT INTO `race` (`id_race`, `race`, `actif`) VALUES
(1, 'Akita inu', 'O'),
(2, 'American staffordhire terrier', 'O'),
(3, 'Band dog', 'O'),
(4, 'Bull terrier', 'O'),
(5, 'Dogo Argentino', 'O'),
(6, 'Dog de Bordeaux', 'O'),
(7, 'English terrier (staffordshire bull-terrier)', 'O'),
(8, 'Fila Braziliero', 'O'),
(9, 'Mastiff (toutes origines)', 'O'),
(10, 'Pit bull terrier', 'O'),
(11, 'Rodhesian Ridgeback', 'O'),
(12, 'Rottweiler', 'O'),
(13, 'Tosa Inu', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'admin'),
(2, 'agent');

-- --------------------------------------------------------

--
-- Structure de la table `veterinaire`
--

CREATE TABLE `veterinaire` (
  `id_veterinaire` int(11) NOT NULL,
  `nom_veto` varchar(40) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `gsm` varchar(25) DEFAULT NULL,
  `rue` varchar(100) DEFAULT NULL,
  `numero` varchar(25) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `veterinaire`
--

INSERT INTO `veterinaire` (`id_veterinaire`, `nom_veto`, `telephone`, `gsm`, `rue`, `numero`, `cp`, `ville`, `pays`) VALUES
(1, 'Centre Vétérinaire Vetofora', '056 33 39 85', NULL, ' Boulevard des Alliés', '228', 7700, 'Mouscron', 'BE'),
(2, 'Mahieu Mélanie', '056 34 53 23', NULL, 'Rue de la Station', '27', 7700, 'Mouscron', 'BE'),
(3, 'Daniel Radoux', '056 34 72 63', NULL, 'Rue du Nouveau Monde', '110', 7700, 'Mouscron', 'BE'),
(4, 'Brabant Xavier', '056 84 09 72', NULL, 'Rue de Roubaix ', '384', 7700, 'Mouscron', 'BE'),
(5, 'Arnould-Stevens', '056 34 85 65', NULL, 'Rue de la Station', '126', 7700, 'Mouscron', 'BE'),
(6, 'Breyne  Christian', '056 34 48 54', NULL, 'Carrière Ma Campagne', '3', 7712, 'Mouscron', 'BE');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`),
  ADD KEY `FK_agent_id_type` (`id_type`);

--
-- Index pour la table `chien`
--
ALTER TABLE `chien`
  ADD PRIMARY KEY (`id_chien`),
  ADD KEY `FK_chien_id_race` (`id_race`),
  ADD KEY `FK_chien_id_veterinaire` (`id_veterinaire`),
  ADD KEY `id_proprietaire` (`id_proprietaire`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`);

--
-- Index pour la table `personne_de_contacte`
--
ALTER TABLE `personne_de_contacte`
  ADD PRIMARY KEY (`id_pdc`),
  ADD KEY `FK_personne_de_contacte_id_proprietaire` (`id_proprietaire`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`id_proprietaire`,`id_chien`),
  ADD KEY `FK_posseder_id_chien` (`id_chien`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_proprietaire`),
  ADD KEY `FK_proprietaire_id_agent` (`id_agent`),
  ADD KEY `FK_proprietaire_id_club` (`id_club`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`id_veterinaire`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `chien`
--
ALTER TABLE `chien`
  MODIFY `id_chien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `personne_de_contacte`
--
ALTER TABLE `personne_de_contacte`
  MODIFY `id_pdc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_proprietaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `id_veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `FK_chien_id_race` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`),
  ADD CONSTRAINT `FK_chien_id_veterinaire` FOREIGN KEY (`id_veterinaire`) REFERENCES `veterinaire` (`id_veterinaire`);

--
-- Contraintes pour la table `personne_de_contacte`
--
ALTER TABLE `personne_de_contacte`
  ADD CONSTRAINT `FK_personne_de_contacte_id_proprietaire` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_posseder_id_chien` FOREIGN KEY (`id_chien`) REFERENCES `chien` (`id_chien`),
  ADD CONSTRAINT `FK_posseder_id_proprietaire` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`);

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `FK_proprietaire_id_agent` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`),
  ADD CONSTRAINT `FK_proprietaire_id_club` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

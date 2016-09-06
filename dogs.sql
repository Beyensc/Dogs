-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 06 Septembre 2016 à 09:50
-- Version du serveur :  5.7.13-0ubuntu0.16.04.2
-- Version de PHP :  7.0.8-0ubuntu0.16.04.2

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
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `matricule` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `mdp` varchar(25) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id_user`, `nom`, `prenom`, `matricule`, `login`, `mdp`, `id_type`) VALUES
(4, NULL, NULL, NULL, 'admin', 'admin', 1),
(5, NULL, NULL, NULL, 'agent', 'agent', 2);

-- --------------------------------------------------------

--
-- Structure de la table `chien`
--

CREATE TABLE `chien` (
  `id_chien` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `num_puce` varchar(200) DEFAULT NULL,
  `sexe` varchar(200) DEFAULT NULL,
  `date_naissance` varchar(200) DEFAULT NULL,
  `puce_dogs` varchar(200) DEFAULT NULL,
  `tatoo_dogs` varchar(200) DEFAULT NULL,
  `detention` varchar(250) DEFAULT NULL,
  `club` varchar(200) DEFAULT NULL,
  `club_adresse` varchar(250) DEFAULT NULL,
  `mordant` varchar(3) DEFAULT NULL,
  `veto` varchar(200) DEFAULT NULL,
  `vetotel` varchar(200) DEFAULT NULL,
  `remarques` varchar(1000) DEFAULT NULL,
  `actif` varchar(1) DEFAULT 'O',
  `id_race` int(11) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chien`
--

INSERT INTO `chien` (`id_chien`, `nom`, `num_puce`, `sexe`, `date_naissance`, `puce_dogs`, `tatoo_dogs`, `detention`, `club`, `club_adresse`, `mordant`, `veto`, `vetotel`, `remarques`, `actif`, `id_race`, `id_proprietaire`) VALUES
(154, 'Test pdf', '1651', 'mÃ¢le', '51165', '156', '566', 'jardin', 'canigou', 'rue de congo 145', 'non', 'Radoux', '056/745189', '                                      ', 'O', 4, 80),
(155, 'test', '231654897', 'mÃ¢le', '5565', '35', '655', '/', '/', '/', 'non', '/', '', '                                      ', 'O', 2, 80);

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE `effectuer` (
  `id_user` int(11) NOT NULL,
  `id_verification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_proprietaire` int(11) NOT NULL,
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
  `autre_dispo` varchar(200) DEFAULT NULL,
  `nom_contact` varchar(200) DEFAULT NULL,
  `prenom_contact` varchar(200) DEFAULT NULL,
  `num_contact` varchar(200) DEFAULT NULL,
  `datesave` varchar(200) NOT NULL,
  `actif` varchar(1) DEFAULT 'O'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `rue`, `numero`, `CP`, `ville`, `pays`, `mail`, `telephone`, `gsm`, `periode_dispo`, `autre_dispo`, `nom_contact`, `prenom_contact`, `num_contact`, `datesave`, `actif`) VALUES
(80, 'Beyens', 'ClÃ©ment', '30/07/1991', 'Mouscron', 'Dragon', '113', '7700', 'Mouscron', 'Belgique', 'beyens.c@gmail.com', '056/841364', '0474/667069', 'matin', '', '', '', '', '', 'O'),
(81, 'beyens', 'pascal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'O'),
(85, 'Lagae', 'cathy', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `race` varchar(200) DEFAULT NULL,
  `id_chien` int(11) DEFAULT NULL,
  `actif` varchar(1) NOT NULL DEFAULT 'O'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `verification` (
  `id_verification` int(11) NOT NULL,
  `verification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `verification`
--

INSERT INTO `verification` (`id_verification`, `verification`) VALUES
(1, 'clÃ´ture'),
(2, 'Carnet de vaccin Ã  jour');

-- --------------------------------------------------------

--
-- Structure de la table `verifier`
--

CREATE TABLE `verifier` (
  `id_proprietaire` int(11) NOT NULL,
  `id_verification` int(11) NOT NULL,
  `etat` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_agent_id_type` (`id_type`);

--
-- Index pour la table `chien`
--
ALTER TABLE `chien`
  ADD PRIMARY KEY (`id_chien`),
  ADD KEY `FK_chien_id_race` (`id_race`),
  ADD KEY `FK_chien_id_proprietaire` (`id_proprietaire`);

--
-- Index pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD PRIMARY KEY (`id_user`,`id_verification`),
  ADD KEY `FK_effectuer_id_verification` (`id_verification`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_proprietaire`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`),
  ADD KEY `FK_race_id_chien` (`id_chien`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `FK_type_id_user` (`id_user`);

--
-- Index pour la table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id_verification`);

--
-- Index pour la table `verifier`
--
ALTER TABLE `verifier`
  ADD PRIMARY KEY (`id_proprietaire`,`id_verification`),
  ADD KEY `FK_verifier_id_verification` (`id_verification`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `chien`
--
ALTER TABLE `chien`
  MODIFY `id_chien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_proprietaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
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
-- AUTO_INCREMENT pour la table `verification`
--
ALTER TABLE `verification`
  MODIFY `id_verification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

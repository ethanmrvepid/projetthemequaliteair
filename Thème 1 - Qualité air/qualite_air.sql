-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 fév. 2026 à 09:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qualite_air`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `id_batiments` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `GPS_LAT` double DEFAULT NULL,
  `GPS_LON` double DEFAULT NULL,
  `id_sites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`id_batiments`, `nom`, `GPS_LAT`, `GPS_LON`, `id_sites`) VALUES
(13, 'T', 2.5966, 2.5518, 8);

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `id_mesures` int(11) NOT NULL,
  `date_heure` datetime DEFAULT NULL,
  `temperature` double DEFAULT NULL,
  `humidite` double DEFAULT NULL,
  `co2` double DEFAULT NULL,
  `id_salles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id_salles` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `id_batiments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id_salles`, `nom`, `id_batiments`) VALUES
(6, 'T21', 13);

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id_sites` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `GPS_LAT` double DEFAULT NULL,
  `GPS_LON` double DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`id_sites`, `nom`, `GPS_LAT`, `GPS_LON`, `adresse`) VALUES
(8, 'Epid', 2.58598, 1.2222, '9 Rue de lille, Dunkerque');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `identifiant` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `password`, `identifiant`, `role`) VALUES
(2, 'etudiant1', 'etudiant1', 'etudiant@epid-vauban.fr', '$2y$10$3uCmPqG1fwByflHwLVh5KOx0e59Avc2./4WkYK.WmOZt/VrVgKKUu', 'etudiant1', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id_batiments`),
  ADD KEY `id_sites` (`id_sites`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`id_mesures`),
  ADD KEY `id_salles` (`id_salles`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id_salles`),
  ADD KEY `id_batiments` (`id_batiments`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id_sites`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id_batiments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `id_mesures` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id_salles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id_sites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD CONSTRAINT `batiment_ibfk_1` FOREIGN KEY (`id_sites`) REFERENCES `sites` (`id_sites`);

--
-- Contraintes pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD CONSTRAINT `mesures_ibfk_1` FOREIGN KEY (`id_salles`) REFERENCES `salles` (`id_salles`);

--
-- Contraintes pour la table `salles`
--
ALTER TABLE `salles`
  ADD CONSTRAINT `salles_ibfk_1` FOREIGN KEY (`id_batiments`) REFERENCES `batiment` (`id_batiments`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

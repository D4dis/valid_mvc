-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 oct. 2024 à 17:03
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
-- Base de données : `odoj`
--

-- --------------------------------------------------------

--
-- Structure de la table `apply`
--

CREATE TABLE `apply` (
  `use_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `has`
--

CREATE TABLE `has` (
  `rol_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `joboffer`
--

CREATE TABLE `joboffer` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `job_describe` varchar(250) DEFAULT NULL,
  `job_salary` decimal(5,2) DEFAULT NULL,
  `job_status` tinyint(1) DEFAULT NULL,
  `job_requirement` varchar(50) DEFAULT NULL,
  `use_id_fk` int(11) DEFAULT NULL,
  `job_city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `rol_id` int(11) NOT NULL,
  `rol_label` varchar(50) DEFAULT NULL,
  `rol_power` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`rol_id`, `rol_label`, `rol_power`) VALUES
(1, 'admin', 1),
(2, 'etudiant', 2),
(3, 'entreprise', 3);

-- --------------------------------------------------------

--
-- Structure de la table `_authorization`
--

CREATE TABLE `_authorization` (
  `aut_id` int(11) NOT NULL,
  `aut_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `_user`
--

CREATE TABLE `_user` (
  `use_id` int(11) NOT NULL,
  `use_name` varchar(50) DEFAULT NULL,
  `use_login` varchar(50) DEFAULT NULL,
  `use_password` varchar(200) DEFAULT NULL,
  `use_city` varchar(50) DEFAULT NULL,
  `use_zipcode` int(11) DEFAULT NULL,
  `use_siret` int(11) DEFAULT NULL,
  `use_company` varchar(50) DEFAULT NULL,
  `use_skills` varchar(50) DEFAULT NULL,
  `rol_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `_user`
--

INSERT INTO `_user` (`use_id`, `use_name`, `use_login`, `use_password`, `use_city`, `use_zipcode`, `use_siret`, `use_company`, `use_skills`, `rol_id_fk`) VALUES
(5, 'daris', 'daris@email.com', '$2y$10$PguA/lUnYiojWvNEI2V9KuLZ0ZCC9Omi0F5GuualuM8VZqcVJqOSC', NULL, NULL, NULL, NULL, NULL, 2),
(6, 'tesla', 'tesla@contact.com', '$2y$10$sLdT4w4BorLg2Bu0r60yvO02Z2C9D1JD027BDrEuU7M3OiUedNTo2', NULL, NULL, NULL, NULL, NULL, 3),
(8, 'jsp', 'jsp@email.com', '$2y$10$N35ncVjsoSoXCWO647KBVuIvVDM29azPHWD3SnJ9LveSu5e13G9Ge', 'Montpellier', NULL, NULL, NULL, NULL, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`use_id`,`job_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Index pour la table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`rol_id`,`aut_id`),
  ADD KEY `aut_id` (`aut_id`);

--
-- Index pour la table `joboffer`
--
ALTER TABLE `joboffer`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `use_id` (`use_id_fk`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rol_id`);

--
-- Index pour la table `_authorization`
--
ALTER TABLE `_authorization`
  ADD PRIMARY KEY (`aut_id`);

--
-- Index pour la table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`use_id`),
  ADD KEY `rol_id` (`rol_id_fk`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `joboffer`
--
ALTER TABLE `joboffer`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `_user`
--
ALTER TABLE `_user`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`use_id`) REFERENCES `_user` (`use_id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `joboffer` (`job_id`);

--
-- Contraintes pour la table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `role` (`rol_id`),
  ADD CONSTRAINT `has_ibfk_2` FOREIGN KEY (`aut_id`) REFERENCES `_authorization` (`aut_id`);

--
-- Contraintes pour la table `joboffer`
--
ALTER TABLE `joboffer`
  ADD CONSTRAINT `joboffer_ibfk_1` FOREIGN KEY (`use_id_fk`) REFERENCES `_user` (`use_id`);

--
-- Contraintes pour la table `_user`
--
ALTER TABLE `_user`
  ADD CONSTRAINT `_user_ibfk_1` FOREIGN KEY (`rol_id_fk`) REFERENCES `role` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

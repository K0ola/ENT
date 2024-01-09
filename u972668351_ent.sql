-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 jan. 2024 à 09:24
-- Version du serveur : 10.6.15-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u972668351_ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `nom`) VALUES
(1, 'MMI-1 tp-A'),
(2, 'MMI-1 tp-B'),
(3, 'MMI-1 tp-C'),
(4, 'MMI-1 tp-D'),
(5, 'MMI-2 tp-A'),
(6, 'MMI-2 tp-B'),
(7, 'MMI-2 tp-C'),
(8, 'MMI-2 tp-D');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(120) NOT NULL,
  `nom_utilisateur` varchar(120) NOT NULL,
  `login` varchar(241) NOT NULL,
  `role_utilisateur` varchar(120) DEFAULT NULL,
  `mail_utilisateur` varchar(120) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `mot_de_passe`, `prenom_utilisateur`, `nom_utilisateur`, `login`, `role_utilisateur`, `mail_utilisateur`, `reset_token`, `token_expiry`, `classe_id`) VALUES
(1, '$2y$10$KEalLquk1rdojRc/gWMcjOF94Z0DI7SQZ5.c0GeR0vTGhbPqHq1Si', 'Arthur', 'Zachary', 'arthur.zachary', 'student', 'arthur.zachary.2@gmail.com', 'ffc3fc8e0aad3e93e7e5', '2023-12-27 18:54:05', 2),
(2, '$2y$10$wJd5aedE7imcbwRQJ44H3eCcOiwUAeKxDomU3/kTTiRPRb2eC1pv6', 'Administrateur', 'Administrateur', 'admin', 'admin', 'K0la.arthurzachary@gmail.com', NULL, NULL, NULL),
(3, '$2y$10$EjpIE9WPOfvoioPX/qCZS.QBUJhYWZzHMnynsKRn/DuJZD82RGLEK', 'Waldi', 'Fiaga', 'waldi.fiaga', 'student', 'waldifiaga80@gmail.com', NULL, NULL, 2),
(4, '$2y$10$W/EblI31X46kYYTyuwwE3e0Wx4B85atst7I3bIe0MmxnQcQrDzBTK', 'Caroline', 'Doung', 'caroline.doung', 'student', 'dou.ca4@gmail.com', NULL, NULL, NULL),
(6, '$2y$10$pPyxhdPQvgcz0hrLJleeceYpAOgejrWb8AnpKig.uiZgJJA13Gmwm', 'Pauline', 'Gazengel', 'pauline.gazengel', 'student', 'pauline.gazengel@gmail.com', NULL, NULL, NULL),
(7, '$2y$10$W.nX/IY1NAdN19I/DQK20u1SlXFo9tZG8QVxo8VGArmFRpXBL7dZy', 'Thomas', 'Bansront', 'thomas.bansront', 'student', 'electrex.178@gmail.com', NULL, NULL, NULL),
(8, '$2y$10$1bY/PEtHNm5fsDnjkGqVf.6F91D4IQmKvkORv/OYM.Ex.sYuTCSOu', 'Robin', 'Vigier', 'robin.vigier', 'student', 'rob.vigier@gmail.com', NULL, NULL, NULL),
(9, '$2y$10$4QwIrhQDF2h/Bk/5qzlx9eHCbdhH3kmR3IM0.jgHMM6gadPJ/ZU8G', 'Morgan', 'Zarka', 'morgan.zarka', 'student', 'mor9an77@gmail.com', NULL, NULL, NULL),
(10, '$2y$10$MBKt9GWirM4l4Ehw/qyuxeznxnkNE3AGFEX0yDDuMSOJjhhdkHuwi', 'Helena', 'Chevalier', 'helena.chevalier', 'student', 'lna.chevalier@gmail.com', NULL, NULL, NULL),
(14, '$2y$10$cDX8SQTiTmoaT2N/G.zHpeL8WPJJPxLQhf7jejWZStkBx6IteML8y', 'Mariane', 'Chen', 'mariane.chen', 'student', 'marianechen3@gmail.com', NULL, NULL, NULL),
(15, '$2y$10$ZSoN0xNf8g9G5PiR4Y1RUuKpX.DfSwV8Pw/WqW87c8MX8z95CpTp2', 'Frederic', 'Poisson', 'frederic.poisson', 'prof', 'fpoisson@gmail.com', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `classe_id` (`classe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

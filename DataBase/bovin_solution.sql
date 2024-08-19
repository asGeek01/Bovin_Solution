-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 02 août 2024 à 17:04
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bovin_solution`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajout_investissement`
--

CREATE TABLE `ajout_investissement` (
  `id` int(11) NOT NULL,
  `titre_achat` varchar(500) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ajout_investissement`
--

INSERT INTO `ajout_investissement` (`id`, `titre_achat`, `prix`) VALUES
(33, 'Paiement de Boeuf', 12000);

-- --------------------------------------------------------

--
-- Structure de la table `nos_produits`
--

CREATE TABLE `nos_produits` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `nom_produit` varchar(500) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nos_produits`
--

INSERT INTO `nos_produits` (`id`, `image`, `nom_produit`, `prix`) VALUES
(1, 'lait-vache.png', 'Lait de vache', 5000),
(2, 'fromage.png', 'Fromage', 3000),
(3, 'oeuf.png', 'Oeuf', 1000),
(4, 'poisson.png', 'Poisson', 7000);

-- --------------------------------------------------------

--
-- Structure de la table `panier_15`
--

CREATE TABLE `panier_15` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `nom_produit` varchar(500) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `post_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `quanti4e` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier_15`
--

INSERT INTO `panier_15` (`id`, `image`, `nom_produit`, `first_name`, `last_name`, `mail`, `tel`, `addresse`, `post_code`, `country`, `type`, `quanti4e`, `prix`) VALUES
(228, 'oeuf.png', 'Oeuf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000),
(232, 'fromage.jpeg', 'Fromage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3000),
(233, 'lait-vache.jpg', 'Lait de vache', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5000),
(234, 'foin.jpeg', 'Foin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `panier_16`
--

CREATE TABLE `panier_16` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `post_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `quanti4e` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier_17`
--

CREATE TABLE `panier_17` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `post_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `quanti4e` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier_18`
--

CREATE TABLE `panier_18` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `addresse` varchar(200) DEFAULT NULL,
  `post_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `quanti4e` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publication_15`
--

CREATE TABLE `publication_15` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `nom_prenoms` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publication_16`
--

CREATE TABLE `publication_16` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `nom_prenoms` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publication_17`
--

CREATE TABLE `publication_17` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `nom_prenoms` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publication_17`
--

INSERT INTO `publication_17` (`id`, `titre`, `nom_prenoms`, `image`, `description`) VALUES
(1, 'Le mariage', 'S. Salomon', 'logo_up.png', '1235'),
(2, 'Le mariage', 'S. Salomon', 'turing.png', '3265');

-- --------------------------------------------------------

--
-- Structure de la table `publication_18`
--

CREATE TABLE `publication_18` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `nom_prenoms` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `signalement`
--

CREATE TABLE `signalement` (
  `id` int(11) NOT NULL,
  `nom_prenoms` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `signalement`
--

INSERT INTO `signalement` (`id`, `nom_prenoms`, `mail`, `message`) VALUES
(1, 'Jean Pierre', 'jean@gmail.com', 'Ceci est également un test');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom_prenoms` varchar(500) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `mot_passe` varchar(200) NOT NULL,
  `access` varchar(5) NOT NULL,
  `inscrit` varchar(5) NOT NULL,
  `connect` varchar(5) NOT NULL,
  `profession` varchar(500) NOT NULL,
  `profil` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom_prenoms`, `ville`, `tel`, `mail`, `mot_passe`, `access`, `inscrit`, `connect`, `profession`, `profil`) VALUES
(15, 'Dodo Jean-Pierre HOUNDEALO', 'Parakou', '+22953992605', 'jeanpierrehoundealo03@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'on', 'on', '', 'Développeur fullstack', 'onepiece.jpg'),
(16, 'Solomon', 'Lokossa', '+22998120540', 'solomonagounmalo@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'on', 'on', '', 'Informaticien', 'solomon.png'),
(17, 'Fortune N\'KOUNOU', 'Lokossa', '+22952026396', 'fortune.nkoue@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'on', 'on', '', 'Etudiante', 'fortune1.jpg'),
(18, 'Charles VIDOGNONLONHOUE', 'Akpro-Missérété', '+22954265696', 'charles.vido@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'on', 'on', '', 'Intellectuel', 'MA_MAIN1.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajout_investissement`
--
ALTER TABLE `ajout_investissement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nos_produits`
--
ALTER TABLE `nos_produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier_15`
--
ALTER TABLE `panier_15`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier_16`
--
ALTER TABLE `panier_16`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier_17`
--
ALTER TABLE `panier_17`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier_18`
--
ALTER TABLE `panier_18`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publication_15`
--
ALTER TABLE `publication_15`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publication_16`
--
ALTER TABLE `publication_16`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publication_17`
--
ALTER TABLE `publication_17`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publication_18`
--
ALTER TABLE `publication_18`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ajout_investissement`
--
ALTER TABLE `ajout_investissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `nos_produits`
--
ALTER TABLE `nos_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `panier_15`
--
ALTER TABLE `panier_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT pour la table `panier_16`
--
ALTER TABLE `panier_16`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier_17`
--
ALTER TABLE `panier_17`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier_18`
--
ALTER TABLE `panier_18`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication_15`
--
ALTER TABLE `publication_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication_16`
--
ALTER TABLE `publication_16`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication_17`
--
ALTER TABLE `publication_17`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `publication_18`
--
ALTER TABLE `publication_18`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `signalement`
--
ALTER TABLE `signalement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

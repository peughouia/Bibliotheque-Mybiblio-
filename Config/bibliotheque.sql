-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 nov. 2023 à 11:01
-- Version du serveur : 10.4.28-MariaDB-log
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numeroTel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `email`, `password`, `numeroTel`) VALUES
(1, 'peughouia fred', 'peughouia.44@gmail.com', '123456', 692302383),
(3, 'tanekeu', 'tanekeu@gmail.com', '546854', 685745214),
(4, 'kaze', 'kaze@gmail.com', '123456', 688457445),
(5, 'Administrateur', 'admin@gmail.com', 'Admin', 675360278),
(6, 'toto', 'toto@gmail.com', '123456', 654857456),
(7, 'tefokou', 'tefokou@gmail.com', '123456', 685744123),
(8, 'Tanko', 'tankoleila.123@gmail.com', 'Lazilid', 655443044);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_client` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `dateEmprunt` date NOT NULL,
  `dateRetour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_client`, `id_livre`, `dateEmprunt`, `dateRetour`) VALUES
(1, 4, '2023-11-21', '2023-11-24'),
(1, 9, '2023-11-21', '2023-11-21'),
(1, 10, '0000-00-00', '0000-00-00'),
(4, 13, '2023-11-21', '2023-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `auteurs` varchar(100) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `annee_publication` int(11) NOT NULL,
  `nb_exemplaire` int(5) NOT NULL,
  `url_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `auteurs`, `categorie`, `description`, `annee_publication`, `nb_exemplaire`, `url_image`) VALUES
(4, '48 lois du pouvoir', 'Robert Green', 'science', 'les 48 lois du pouvoir présente comment vivre en société et manipuler la société', 2020, 10, 'power.png'),
(5, 'Titeuf', 'Zep Gregore', 'Bande Dessiné', 'La série raconte la vie quotidienne de Titeuf, un enfant semblerait-il âgé de huit1 ou dix ans2, à la mèche blonde caractéristique, de ses amis et de leur vision du monde des adultes. ', 2010, 5, 'Titeuf.jpg'),
(6, 'Debuter sous LINUX', 'Carton Daniel', 'science', 'ce livre présente les bases de de linux et la bonne manipulation ', 2009, 2, 'Linux.jpg'),
(7, 'L\'avanturier', 'Peughouia', 'Drame', 'c\'est l\'histoire d\'un jeune hero de la ville de douala nommé ......', 2023, 1, 'fred.jpg'),
(8, 'Dom Juan', 'Moliere Andi', 'Roman', 'Le Festin de pierre est une comédie de Molière en cinq actes et en prose dont la « Troupe de Monsieur frère unique du roi » donna quinze représentations triomphales en février et mars 1665 sur le théâ', 1952, 3, 'Dom_juan.jpg'),
(9, 'One Piece', 'Oda', 'Manga', 'One Piece relate les aventures d\'un équipage de pirates ayant pour capitaine Monkey D. Luffy dont le rêve est d\'obtenir le One Piece, fameux trésor inestimable qui appartenait au seigneur des pirates ', 2014, 6, 'One_piece.jpg'),
(10, 'Naruto', 'Kishimoto Masashi', 'Manga', 'L\'histoire commence pendant l\'adolescence de Naruto, vers ses douze ans. Orphelin cancre et grand farceur, il fait toutes les bêtises possibles pour se faire remarquer. Son rêve : devenir Hokage afin ', 2005, 11, 'Naruto.jpg'),
(11, 'Bleach 13', 'Kubo Tite', 'Manga', 'Le récit commence en 2001 au Japon dans la ville fictive de Karakura. Ichigo Kurosaki, lycéen de 15 ans, arrive à voir, entendre et toucher les âmes des morts depuis qu\'il est tout petit. Un soir, sa ', 2005, 4, 'Bleach.jpg'),
(12, 'Ainsi parlait Zarathoustra', 'Nietzsche Friedrich', 'Roman', 'Le nom Zarathoustra signifie « celui qui a de vieux chameaux » et non comme on l\'a cru jusqu\'aux années 1980 « celui à la lumière brillante » ; c\'est le nom avestique de Zoroastre, prophète et fondate', 1911, 7, 'Ainsi_parlait_zarathoustra.jpg'),
(13, 'Apologie de Socrate', 'Platon Tom', 'science', 'Dans l’Apologie de Socrate, Platon rapporte les plaidoyers de Socrate lors de son procès en -399 à Athènes qui déboucha sur sa condamnation à mort. La défense se déroule en trois parties, toutes en li', 1810, 2, 'Apologie_de_socrate.jpg'),
(14, 'Comprendre l\'économie', 'Charmettant Hervé', 'science', 'comment fonctionne l\'economie  la force de l\'economie peut pousser loin vers des sommets', 2000, 1, 'Comprendre_l\'economie.jpg'),
(15, 'Le dernier jour d\'un condamné', 'victor Hugo', 'Roman', 'Le roman se présente comme le journal qu\'un condamné à mort écrit durant les vingt-quatre dernières heures de son existence dans lequel il relate ce qu\'il a vécu depuis le début de son procès jusqu\'au', 1955, 12, 'Le_dernier_jour_d\'un_condamne.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_client`,`id_livre`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

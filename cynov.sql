-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 nov. 2020 à 10:20
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cynov`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `film` text NOT NULL,
  `realisateur` varchar(20) NOT NULL,
  `date_sortie` date NOT NULL,
  `categorie` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `contenu` varchar(800) NOT NULL,
  `auteur` int(11) NOT NULL,
  `affiche` varchar(1000) DEFAULT NULL,
  `date_publication` datetime DEFAULT current_timestamp(),
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `film`, `realisateur`, `date_sortie`, `categorie`, `note`, `contenu`, `auteur`, `affiche`, `date_publication`, `statut`) VALUES
(0, 'Spider-Man: Homecoming', 'Jon Watts', '2017-02-23', 0, 3, ' Ce film est vraiment sympa si on ne connait rien de spiderman. Par contre si on &eacute;tait fan de spiderman pendant son enfance comme moi le film risque de vous agacer par certains moments. La on est dans le teen movie (ecole, amourette, bal de promo... La totale), puisque que spiderman &agrave; 15 ans, qui est ici le possible nouveau avenger. Qui ne maitrise gu&egrave;re ses pouvoirs et son nouveau costume beaucoup trop sophistiqu&eacute; selon moi. Spiderman n\'a jamais eut besoin de la technologie de Starks pour &ecirc;tre un super h&eacute;ro. Mais voila, la c\'est un peu trop le cas... et Iron-man est en quelque sorte son mentor. Ok... Du coup ils ont fait de spiderman (dans un &eacute;ni&egrave;me reboot) un adolescent geek, certes marrant, mais ce n\'est pas l\'image que j\'ai de spid', 0, 'assets/affiche_film/spiderman.jpg', '2020-11-23 10:11:44', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `user` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `inscription` datetime DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `login`, `mdp`, `inscription`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2020-11-11 17:12:54', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD KEY `fk_commentaire_user` (`user`),
  ADD KEY `fk_commentaire_article` (`article`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

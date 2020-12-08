-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 25 Novembre 2020 à 01:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cynov`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `film` text NOT NULL,
  `realisateur` varchar(20) NOT NULL,
  `date_sortie` date NOT NULL,
  `categorie` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `contenu` varchar(800) NOT NULL,
  `auteur` int(11) NOT NULL,
  `affiche` varchar(1000) DEFAULT NULL,
  `date_publication` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `fk_article_auteur` (`auteur`),
  KEY `fk_article_categorie` (`categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `film`, `realisateur`, `date_sortie`, `categorie`, `note`, `contenu`, `auteur`, `affiche`, `date_publication`, `statut`) VALUES
(1, 'harry potter a l\'ecole des sorciers', 'Chris Columbus', '2001-12-05', 2, 10, 'Ce n\'est pas un film mais un reve dans lequel on se glisse dès le début du film pour esperer qu\'il ne finisse jamais. Que l\'on soit petit ou grand tout nous émerveille, tous les personnages sont magiques et attachants. C\'est le petit sorcier qui sommeille en chacun de nous à  tout âge et qui nous fait parvenir le plus merveilleux des messages : rien n\'est impossible dans la vie il suffit de le vouloir très fort pour que ça se réalise !', 4, 'assets/affiche_film/3643090.jpg', '2020-11-24 15:52:00', 1),
(2, 'scary movie', 'Keenen Ivory Wayans', '2000-10-25', 1, 6, 'Scary Movie est une bonne satire des film d\'horreur américains, qui parodie tous les pires clichés de ce genre particulier (la survie incroyable des protagoniste, les scènes de nudités sans raison, le retournement de situation ultra prévisible...), bourré de références cinématographiques et qui, grâce à  un humour décalé, un peu salace et absurde, nous fais bien rire, et nous donne envie de le revoir encore et encore.           ', 5, 'assets/affiche_film/049717_af.jpg', '2020-11-24 23:09:13', 1),
(3, 'Le Seigneur des anneaux : La Communautée; de l\'anneau', 'Peter Jackson', '2001-12-19', 2, 10, 'Un film qui restera gravé à jamais comme l\'un des chefs d\'oeuvre du septième art . On plonge dans l\'univers de Tolkien avec déléctation , Peter Jackson a mis le paquet pour ce film et la future trilogie à venir ! Les décors sont tout simplement magnifique , les costumes sont tout aussi sublimes , avec des acteurs qui tiennent leurs rôle à la perfection . Des scène de batailles de légende , des personnages attachants , des graphisme et des orques , goblins , troll des montagne vraiment bien fait ! Des films qui durent trois heures et qui ne nous lassent pas en plein milieu ca ne courent pas les rues .  ', 4, 'assets/affiche_film/image.jpg', '2020-11-25 01:21:56', 0),
(4, 'La reine des neiges', 'Chris Buck', '2013-11-20', 10, 7, 'Autant vous prévenir, tous ceux qui n\'aiment pas les films musicaux risqueront de détester la première partie du film, qui est absolument jalonnée de chansons à la sauce Disney (huit chansons au total!). Il ne se passe pas 5 minutes sans qu\'Anna ou sa soeur Elsa ne fredonne une chansonnette. L\'avalanche de chansons risque donc d\'en décourager plus d\'un et on a un peu de mal à comprendre pourquoi ils n\'ont pas simplement mieux réparti les chansons tout au long du film. Il est néanmoins nécessaire de souligner l\'excellent travail de Kristen Anderson-Lopez et Robert Lopez, des habitués de Broadway, qui ont offert au film une jolie bande orig', 5, 'assets/affiche_film/affiche-du-film-anime-la-reine-des-neiges-dimensi.jpg', '2020-11-25 01:29:36', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(20) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'horreur'),
(2, 'fantastique'),
(3, 'aventure'),
(4, 'comedie'),
(5, 'tragedie'),
(6, 'romantique'),
(7, 'action'),
(8, 'thriller'),
(9, 'policier'),
(10, 'animation');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `user` int(11) NOT NULL,
  `user_nom` varchar(100) NOT NULL,
  `article` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `date_publication` date NOT NULL,
  KEY `fk_commentaire_user` (`user`),
  KEY `fk_commentaire_article` (`article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `login`, `mdp`, `inscription`, `admin`) VALUES
(4, 'denis', 'denis', 'denis', '79aef731091472c4395b63b32b2c00c919b9d9538dc1c990381cc8c4609fe9f8', '2020-11-24 20:02:22', 0),
(5, 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2020-11-24 20:22:33', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_auteur` FOREIGN KEY (`auteur`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_article_categorie` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id_categorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

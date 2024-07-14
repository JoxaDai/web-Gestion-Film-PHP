-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 14 juil. 2024 à 21:29
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `film2023_d3`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int DEFAULT NULL,
  `titre_film` varchar(100) NOT NULL,
  `type_film` varchar(50) DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `resume` text,
  `image_affiche` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`titre_film`),
  KEY `type_film` (`type_film`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre_film`, `type_film`, `date_sortie`, `resume`, `image_affiche`) VALUES
(1, 'Megamind', 'comédie, animation', '2010-03-09', '\"Megamind\" est un film d animation sorti en 2010. Il raconte l histoire de Megamind, un super-méchant extraterrestre qui a passé sa vie à combattre son ennemi juré, le super-héros Metro Man. Cependant, lorsque Megamind réussit enfin à vaincre Metro Man, il se retrouve sans but dans la vie.', 'webroot2/img/megamind.jpg'),
(2, 'Terminator 1', 'action, science-fic', '1984-10-26', 'Terminator est un film de science-fiction réalisé par James Cameron, sorti en 1984. L histoire se déroule dans un futur apocalyptique où une intelligence artificielle appelée Skynet a déclenché une guerre contre l humanité', 'webroot2/img/terminator1.jpg'),
(3, 'Terminator 2 : le jugement dernier', 'action; science-fic', '1991-08-29', 'Afin de pouvoir sauver le jeune \"Jonh Connor, le T 800 est renvoyer dans le passé afin d eliminer une potentiel menance pour le futur.', 'webroot2/img/terminator2.jpg'),
(5, 'Le seigneur des anneaux : la communauté de l anneau', 'fantasy', '2001-12-19', 'Frodon est choisi pour être le porteur de l Anneau et est accompagné par une communauté hétérogène composée d humains, d elfes, de nains et de hobbits. Ils entreprennent un voyage périlleux pour atteindre la Montagne du Destin, le seul endroit où l Anneau peut être détruit.', ''),
(6, 'L\'aile ou la cuisse', 'comédie', '1976-10-27', 'Le grand cuisinier Charles Duchemin, l\'auteur d\'un guide gastronomique qui vient d\'être élu à l\'Académie française, se trouve un adversaire de taille en la personne de Jacques Tricatel, le PDG d\'une chaîne de restaurants. Ce dernier, qui prépare de la cuisine industrielle, souhaite faire disparaître Duchemin et son guide, véritable institution du monde culinaire.', ''),
(7, 'Joker (2019)', 'drame, thriller', '2019-10-04', 'Dans les années 1980, à Gotham City, Arthur Fleck, un humoriste de stand-up raté, bascule peu à peu dans la folie et devient le Joker, un criminel psychopathe.', 'webroot2/img/JokerFilm.jpg'),
(8, 'Tenet', 'action, science-fiction', '2020-08-26', 'Un agent de la CIA, nommé le Protagoniste, est recruté pour participer à une mission secrète visant à sauver le monde. Pour ce faire, il doit maîtriser l\'inversion du temps.', 'webroot2/img/tenet2.jpg'),
(9, 'Wonka', 'comédie, musical', '2023-03-15', 'Cette préquelle de Charlie et la Chocolaterie retrace la jeunesse du célèbre chocolatier Willy Wonka, et les aventures qui l\'ont conduit à ouvrir la plus grande chocolaterie du monde.', 'webroot2/img/wonka.jpg'),
(10, 'Ça', 'horreur', '2017-09-08', 'Dans la petite ville de Derry, les enfants disparaissent mystérieusement. Un groupe d\'enfants va faire face à leurs plus grandes peurs en affrontant le terrifiant clown Pennywise, qui réapparaît tous les 27 ans.', 'webroot2/img/ca.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`nom_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`nom_type`) VALUES
('action'),
('animation'),
('Aventure'),
('comédie'),
('drame'),
('fantasy'),
('Horreur'),
('policier'),
('Science-fic');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'visiteur',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'Toto', 'd9bb4a8aad7b5e737beeee4813577d1f', 'visiteur'),
(2, 'Fizzarolli', '65d680c733bd43457cef85b99228acc0', 'visiteur'),
(3, 'Jrome', 'e965dd0e93dc662d061f123b957cfe2d', 'admin'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

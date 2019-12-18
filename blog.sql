-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 22 Novembre 2019 à 15:15
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `les_articles`
--

CREATE TABLE `les_articles` (
  `id` int(255) NOT NULL,
  `date_article` datetime NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `les_articles`
--

INSERT INTO `les_articles` (`id`, `date_article`, `titre`, `contenu`, `image`) VALUES
(1, '2019-11-14 00:00:00', 'Article test', 'Le contenu de mon article test, il n\'y a pas grande chose pour l\'instant.', ''),
(2, '2019-11-15 00:00:00', 'Article test 2', 'Un autre article.', NULL),
(3, '2015-11-22 00:00:00', 'Titre ajoutÃ© par PHP', 'Contenu ajoutÃ© par PHP', ''),
(4, '2019-11-22 14:57:03', 'titre presque vide', '', NULL),
(5, '2019-11-22 14:59:56', 'Article 999', 'Ce contenu a vraiment Ã©tÃ© tapÃ© dans un champ ! Incroyable...', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `les_articles`
--
ALTER TABLE `les_articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `les_articles`
--
ALTER TABLE `les_articles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

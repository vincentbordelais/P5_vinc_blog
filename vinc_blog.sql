-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 19 sep. 2022 à 15:47
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vinc_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `validation` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `creation_date`, `validation`) VALUES
(10, 1, 7, 'Merci pour ce premier blog', '2022-08-19 11:27:29', 'Yes'),
(14, 1, 9, 'Salut Vinc, cool ce blog', '2022-08-27 18:56:46', 'Yes'),
(16, 2, 9, 'Ah bon, c\'est officiel !', '2022-08-28 12:08:30', 'No'),
(17, 2, 9, 'Pour l\'instant on est entre nous, non?', '2022-08-28 12:11:08', 'No'),
(37, 11, 9, '€``ù%/.;?@#©', '2022-09-10 13:04:29', 'No'),
(39, 1, 10, 'De rien les cocos', '2022-09-11 17:37:59', 'Yes'),
(40, 6, 9, 'Ben alors, allez, au boulot!', '2022-09-16 16:16:25', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `last_name`, `first_name`, `email`, `message`, `created_date`) VALUES
(1, 'Inconu', 'Linconu', 'inconu@gmail.com', 'Bonjour,\r\nBlabla\r\nCordialement,\r\nLinconu', '2022-09-17 03:01:48'),
(2, 'Matt', 'Davette', 'matthieu@free.fr', 'hkfkhkhlhjvhjv;hv', '2022-09-17 22:35:49'),
(3, 'ghg', 'khgfk', 'ffggg@gfre.jj', ',hv;hv', '2022-09-18 00:12:19');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `wording` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `wording`, `content`, `creation_date`, `update_date`) VALUES
(1, 'Bienvenue sur le blog de Vinc !', 'Ce n\'est qu\'une première version.', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de ce dont vous avez envie !', '2022-02-17 16:28:41', '2022-02-17 16:28:41'),
(2, 'Vinc à la conquête du monde !', 'No limit !', 'C\'est officiel, ...', '2022-02-17 16:28:42', '2022-02-17 16:28:42'),
(6, 'Voilà mon troisième article', 'Ca dépote quand même', 'Pour autant j\'avoue que je manque d\'inspiration pour vous raconter quelque chose d\'intéressant.', '2022-09-09 10:52:52', '2022-09-09 10:52:52'),
(11, 'test5', 'test5', '   test5', '2022-09-09 18:02:54', '2022-09-16 12:39:12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `role` enum('User','Admin') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `last_name`, `first_name`, `email`, `password`, `created_date`, `role`) VALUES
(7, 'Kar', 'Karine', 'Bakala', 'karine@gmail.com', '9adfb0a6d03beb7141d8ec2708d6d9fef9259d12cd230d50f70fb221ae6cabd5', '2022-09-03 12:35:27', 'User'),
(9, 'Jer', 'Jérôme', 'Gastineau', 'jerome@free.fr', '9adfb0a6d03beb7141d8ec2708d6d9fef9259d12cd230d50f70fb221ae6cabd5', '2022-09-04 17:49:56', 'User'),
(10, 'Vinc', 'Vincent', 'Bordelais', 'vincent@free.fr', '9adfb0a6d03beb7141d8ec2708d6d9fef9259d12cd230d50f70fb221ae6cabd5', '2022-09-04 18:13:46', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

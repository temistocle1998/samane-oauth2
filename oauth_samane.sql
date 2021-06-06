-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 06 Juin 2021 à 15:50
-- Version du serveur :  5.7.34-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oauth_samane`
--

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `token`, `expires`, `scope`, `client_id`, `user_id`) VALUES
(102, '2c9db4ed7b6c009bedd49d6641948c387c572238', '2021-06-02 20:19:29', NULL, 1, 1),
(103, '2e3a486cba01bb9dcafc91165fae0f0806971b49', '2021-06-02 20:24:18', NULL, 1, 1),
(104, '80a18067024837523e6b1cb9befbc619a730bfad', '2021-06-02 20:24:34', NULL, 1, 2),
(105, '4f0efeff74b949d98b652a05eaccbf5589c16939', '2021-06-02 23:48:37', NULL, 1, 1),
(106, '2eb03e8ece6431ae5b12dcb4c679ac335c36d189', '2021-06-02 23:50:28', NULL, 1, 1),
(107, '0ebe644544dcd52892ad34851cc099053b927efb', '2021-06-03 00:42:52', NULL, 1, 1),
(108, '5b8f3406fbd6ddce10bb12166dffd3fbdbfb0fc7', '2021-06-03 00:43:00', NULL, 1, 1),
(109, '97d3c6c63e822813648a1e519e42fce7b4e59952', '2021-06-03 00:43:32', NULL, 1, 1),
(110, '88eb7514416870c4fd187a980702c7835c563561', '2021-06-03 00:43:54', NULL, 1, 1),
(111, '517c9a0b304e49bff29d3a895ad4757c5fa512b8', '2021-06-03 01:39:55', NULL, 1, 2),
(112, '5caf8f4c45085594f2773829e22f76b34f271285', '2021-06-05 10:00:46', NULL, 1, 2),
(113, '307c8f826c75e0dc46e59d2dfc94f3afe1dfd49c', '2021-06-06 16:16:31', NULL, 1, 2),
(114, 'd1e9c29e29040d7e30f14639080567a14cad5f9e', '2021-06-06 16:17:21', NULL, 1, 2),
(115, 'ad46aa7c9740503c8075258c3c7fd4e06ae790f7', '2021-06-06 16:36:54', NULL, 1, NULL),
(116, '03366ba0e40ad1bd49643de4a22e9681b230a8a6', '2021-06-06 16:37:34', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_authorization_codes`
--

CREATE TABLE `oauth_authorization_codes` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires` datetime NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(11) NOT NULL,
  `client_identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `client_identifier`, `client_secret`, `redirect_uri`) VALUES
(1, 'testclient', '$2y$10$0lcppVLiLQdIhVC3phbRWOgZ7p2iGa2ubO6ipIJXqq9C4OZ0NsipC', 'http://fake/');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` int(11) NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `refresh_token`, `client_id`, `user_id`, `expires`, `scope`) VALUES
(95, 'fed12b733ad20c23f90e25a4090b655e4158f66c', 1, 1, '2021-06-02 19:24:48', NULL),
(96, 'c7b3e844ee640843d9fde0439d0f3799f66f0957', 1, 2, '2021-06-02 19:25:05', NULL),
(97, '1cc4ba8f5c73ad57bc7d2b26178716d98973d7ef', 1, 1, '2021-06-02 22:49:07', NULL),
(98, 'fbc8263c21f54858ce5cffa879ca3d7636bc18e9', 1, 1, '2021-06-02 22:50:58', NULL),
(99, '4f52147733acf15c9da718845bcd2a92df9f0af8', 1, 1, '2021-06-02 23:43:22', NULL),
(100, 'ba5fd39e50e2cca6642d599af1e31b66753a1f1e', 1, 1, '2021-06-02 23:43:30', NULL),
(101, 'e7dab831ee10af14383ad450470911c4a076fa26', 1, 1, '2021-06-02 23:44:02', NULL),
(102, '7dbcd8cd8c70c4463f23ac42fd19773c2ecc5a28', 1, 1, '2021-06-02 23:44:24', NULL),
(103, '30bb5cc0b19e2c2d6ff038b561c908fc682a8c6e', 1, 2, '2021-06-03 00:40:26', NULL),
(104, '32b12f7f0eebb62f9dc435fe5df51d9cf2b6d55a', 1, 2, '2021-06-05 09:01:16', NULL),
(105, '39ba404fb931059cdf07f955657f55908a3a24e9', NULL, 2, '2021-06-19 14:59:47', NULL),
(106, 'ffbd8858a1f95b22fdb0d541dfb2e698d862ae2c', NULL, 2, '2021-06-19 15:02:12', NULL),
(107, '3fa37bf0dd56f8ac5121513dcac777fc8666287d', NULL, 1, '2021-06-19 15:25:16', NULL),
(108, '2823c1ccc95d82b810927333676de44754897f50', NULL, 2, '2021-06-19 17:35:54', NULL),
(109, '12cec0399b5e8177adf57e46e378dc91f464b261', NULL, 2, '2021-06-19 18:29:00', NULL),
(110, 'dc4ba03e86f0f241a3132e62eeecfed3b671f589', NULL, 2, '2021-06-19 18:37:47', NULL),
(111, 'c5dfd99db331cb0414d4ed2a07905ccc1e78dd67', NULL, 2, '2021-06-19 18:46:31', NULL),
(112, '9dfce8b6c3f9b3ffe70fe8224e922390035854e7', NULL, 2, '2021-06-20 14:15:43', NULL),
(113, 'c8532301663c49371120b79b3ee2de27ac19908c', 1, 2, '2021-06-20 14:19:49', NULL),
(114, '35e392adc1a97d19927a67e3886d11b16d8e1323', 1, 2, '2021-06-20 15:16:22', NULL),
(115, '70fe647085fa5bde59d7a37260354e92255b37e9', 1, 2, '2021-06-06 15:17:01', NULL),
(116, '3f2757335ac853b6a8fe2ac398c27a132f110f32', 1, 2, '2021-06-06 15:17:51', NULL),
(117, '3014151aa536cdae48ad741c6d760b5d6c3ecd2a', 1, 2, '2021-06-20 15:17:26', NULL),
(118, '919ce039d63bb0a47ce0cb1fcdf979eeb17a6f1f', 1, 2, '2021-06-20 15:39:02', NULL),
(119, '2e1ff2388eda27d0375951dbe3553bd2c82a5260', 1, 2, '2021-06-20 15:39:09', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_users`
--

CREATE TABLE `oauth_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `oauth_users`
--

INSERT INTO `oauth_users` (`id`, `email`, `password`, `username`) VALUES
(1, 'laminebeye007@gmail.com', '$2y$11$LDyDdklBDi7VaeN.oD40SONa8rpP3lFrYXv03Exc1QgqL9Lm8a/2.', 'yorobo'),
(2, 'temistocle@gmail.sn', '$2y$11$LDyDdklBDi7VaeN.oD40SONa8rpP3lFrYXv03Exc1QgqL9Lm8a/2.', 'ngor');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CA42527C19EB6921` (`client_id`),
  ADD KEY `IDX_CA42527CA76ED395` (`user_id`);

--
-- Index pour la table `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_98A471C419EB6921` (`client_id`);

--
-- Index pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5AB68719EB6921` (`client_id`),
  ADD KEY `IDX_5AB687A76ED395` (`user_id`);

--
-- Index pour la table `oauth_users`
--
ALTER TABLE `oauth_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT pour la table `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT pour la table `oauth_users`
--
ALTER TABLE `oauth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD CONSTRAINT `FK_CA42527C19EB6921` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`),
  ADD CONSTRAINT `FK_CA42527CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `oauth_users` (`id`);

--
-- Contraintes pour la table `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  ADD CONSTRAINT `FK_98A471C419EB6921` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`);

--
-- Contraintes pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD CONSTRAINT `FK_5AB68719EB6921` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`),
  ADD CONSTRAINT `FK_5AB687A76ED395` FOREIGN KEY (`user_id`) REFERENCES `oauth_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

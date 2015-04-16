-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Avril 2015 à 17:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ovt_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipements` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `groupID` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `clientservicegroup`
--

CREATE TABLE IF NOT EXISTS `clientservicegroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moneyLimit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `clientservicegroup_organisation`
--

CREATE TABLE IF NOT EXISTS `clientservicegroup_organisation` (
  `clientservicegroup_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  PRIMARY KEY (`clientservicegroup_id`,`organisation_id`),
  KEY `IDX_9DF3B76EB82275A6` (`clientservicegroup_id`),
  KEY `IDX_9DF3B76E9E6B1585` (`organisation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sessionID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sessionID` (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifierID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifierID` (`notifierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notification_user`
--

CREATE TABLE IF NOT EXISTS `notification_user` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_id`,`user_id`),
  KEY `IDX_35AF9D73EF1A9D84` (`notification_id`),
  KEY `IDX_35AF9D73A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hashLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `phoneNumber`, `address`, `type`, `hashLink`) VALUES
(1, 'Orange SUPERADMIN', '0606060677', '42 rue des coutures', 'client', 'c4df6c830cb23990db539bc99a64ed2c639300c1'),
(2, 'La Poste', '+33753092012', '33 allée chantegrillet ', 'client', '9081ceef141113176e39b881e6fec99b5f7d480a'),
(3, 'RISP 1', '0606060606', '1 avenue des courageux', 'provider', 'f8d6a7a1f0882b7ed3514f00c25a81affeb25738'),
(4, 'SenTecH', '+221', '5 rue carnot', 'provider', 'e918d6a21a4e3296c5411a0216fde8aa4d1242d2'),
(6, 'Orange Client', '0606060606', '1 rue michelin , caen', 'client', '8e94a2de4a187b437887a3e41faed7e90d0a90e4');

-- --------------------------------------------------------

--
-- Structure de la table `organisation_service`
--

CREATE TABLE IF NOT EXISTS `organisation_service` (
  `organisation_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`organisation_id`,`service_id`),
  KEY `IDX_8219EDD19E6B1585` (`organisation_id`),
  KEY `IDX_8219EDD1ED5CA9E6` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `providerservicegroup`
--

CREATE TABLE IF NOT EXISTS `providerservicegroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serviceID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serviceID` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceID` int(11) DEFAULT NULL,
  `clientID` int(11) DEFAULT NULL,
  `organisationID` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resquestDate` date NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organisationID` (`organisationID`),
  KEY `clientID` (`clientID`),
  KEY `serviceID` (`serviceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `name`, `description`) VALUES
(1, 'Vélotypie', 'Service de transcription'),
(2, 'Vélotypie', 'Service de transcription'),
(3, 'PostSync', ' ..... '),
(4, 'PostSync', ' ..... '),
(5, 'PostSync2', ' ..... '),
(6, 'PostSync201', ' ..... '),
(7, 'LFS', 'visio'),
(8, 'dzdzda', ' ..... dad'),
(9, 'PostSync eee', 'zaarazraz ');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservationID` int(11) DEFAULT NULL,
  `duration` time NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `workerID` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resquestDate` date NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservationID` (`reservationID`),
  KEY `workerID` (`workerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `session_user`
--

CREATE TABLE IF NOT EXISTS `session_user` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`,`user_id`),
  KEY `IDX_4BE2D663613FECDF` (`session_id`),
  KEY `IDX_4BE2D663A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  KEY `IDX_8D93D649E6E132B4` (`organisation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `organisation`, `firstname`, `lastname`, `username`, `username_canonical`, `email`, `email_canonical`, `password`, `type`, `state`, `phone_number`, `address`, `enabled`, `salt`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 1, 'AD', 'Min', 'admin', 'admin', 'admin@admin.ad', 'admin@admin.ad', 'u1avaOH9CAecWYuzZsRz7K/WiYlAY/ACmU2pU/eq9NfgwkfUS+Sp5eUgL34J98WVnj0ZKCX9dtREx6Wp/4NFtw==', '', '', '', '', 1, 'g1ujnrudqrcw4g84c000soksog48sc8', '2015-04-15 10:28:38', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL),
(2, 1, 'aa', 'aa', 'aaaa', 'aaaa', 'a2dmin@admin.ad', 'a2dmin@admin.ad', 'KmzYzbZZnVvBkSOu9NcUO+TLWq46Qd7LE5teWtBIDFPXq+KTK8M9DKQpCGXukY4tCvuvl2d4/7eJ2mkb4SrUfg==', '', '', '', '', 1, '', '2015-04-01 16:12:11', 0, 0, NULL, NULL, NULL, 'N;', 0, NULL),
(3, 2, 'doe', 'john', 'john@doe.com', 'john@doe.com', 'john@doe.com', 'john@doe.com', 'h8h5zCapbLaz4BHLlK2M4J3UBn9JiHas1/luhaZ6mN4mn0eK5RTBc4v49A+tXY4awdpx5IWQ2S+AF5H6DfKvGQ==', 'Administrateur Client', 'actif', '0606060606', '1 rue michelin , caen', 1, '7l2i3kq8edoosk4c4k0skcwccw084wc', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`),
  KEY `groupID` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `clientservicegroup` (`id`);

--
-- Contraintes pour la table `clientservicegroup_organisation`
--
ALTER TABLE `clientservicegroup_organisation`
  ADD CONSTRAINT `FK_9DF3B76E9E6B1585` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `FK_9DF3B76EB82275A6` FOREIGN KEY (`clientservicegroup_id`) REFERENCES `clientservicegroup` (`id`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`sessionID`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`notifierID`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `notification_user`
--
ALTER TABLE `notification_user`
  ADD CONSTRAINT `FK_35AF9D73A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_35AF9D73EF1A9D84` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`);

--
-- Contraintes pour la table `organisation_service`
--
ALTER TABLE `organisation_service`
  ADD CONSTRAINT `FK_8219EDD19E6B1585` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `FK_8219EDD1ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `providerservicegroup`
--
ALTER TABLE `providerservicegroup`
  ADD CONSTRAINT `providerservicegroup_ibfk_1` FOREIGN KEY (`serviceID`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`organisationID`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`clientID`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation` (`id`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`workerID`) REFERENCES `worker` (`id`);

--
-- Contraintes pour la table `session_user`
--
ALTER TABLE `session_user`
  ADD CONSTRAINT `FK_4BE2D663613FECDF` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`),
  ADD CONSTRAINT `FK_4BE2D663A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649E6E132B4` FOREIGN KEY (`organisation`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `worker_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `providerservicegroup` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

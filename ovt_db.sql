-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Avril 2015 à 16:50
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
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipements` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) DEFAULT NULL,
  `clientGroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C744045520B8D8B8` (`clientGroup`),
  KEY `IDX_C74404558D93D649` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `language`, `equipements`, `user`, `clientGroup`) VALUES
(2, 'fr', 'none', 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `clientservicegroup`
--

INSERT INTO `clientservicegroup` (`id`, `name`, `description`, `moneyLimit`) VALUES
(1, 'V_O', 'velotypie_only', 1000);

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
(2, 'La Poste 2', '+33753092012', '33 allée chantegrillet ', 'client', '9081ceef141113176e39b881e6fec99b5f7d480a'),
(3, 'RISP 3', '0606060606', '1 avenue des courageux', 'provider', 'f8d6a7a1f0882b7ed3514f00c25a81affeb25738'),
(4, 'SenTecH 1', '+221', '5 rue carnot', 'provider', 'e918d6a21a4e3296c5411a0216fde8aa4d1242d2'),
(6, 'Orange Client 2', '0606060606', '1 rue michelin , caen', 'client', '8e94a2de4a187b437887a3e41faed7e90d0a90e4');

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

--
-- Contenu de la table `organisation_service`
--

INSERT INTO `organisation_service` (`organisation_id`, `service_id`) VALUES
(1, 1),
(1, 7),
(3, 3),
(3, 5),
(3, 8),
(6, 1),
(6, 3),
(6, 5),
(6, 7),
(6, 9);

-- --------------------------------------------------------

--
-- Structure de la table `providerservicegroup`
--

CREATE TABLE IF NOT EXISTS `providerservicegroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serviceID` int(11) DEFAULT NULL,
  `organisation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serviceID` (`serviceID`),
  KEY `IDX_6584BF3EE6E132B4` (`organisation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `providerservicegroup`
--

INSERT INTO `providerservicegroup` (`id`, `name`, `description`, `serviceID`, `organisation`) VALUES
(1, 'Groupe Standard', 'pas de description spécifique', 6, 4),
(3, 'rectifier', 'here is the description ', 5, 4),
(4, 'Groupe Spéciale', 'dadazfzafazfazf', 5, 4);

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
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` time NOT NULL,
  `Client` int(11) DEFAULT NULL,
  `Service` int(11) DEFAULT NULL,
  `Worker` int(11) DEFAULT NULL,
  `Organisation` int(11) DEFAULT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `requestDate` date NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D044D5D4981EBA54` (`Worker`),
  KEY `IDX_D044D5D42E20A34E` (`Service`),
  KEY `IDX_D044D5D4FED0E94C` (`Organisation`),
  KEY `IDX_D044D5D4C0E80163` (`Client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`id`, `title`, `state`, `type`, `description`, `duration`, `Client`, `Service`, `Worker`, `Organisation`, `startTime`, `endTime`, `requestDate`, `link`, `password`) VALUES
(3, 'Réunion doe john', 'REFUSED', 'simple', '"rr"ré" é"r é"r"é "é', '00:00:00', 2, 4, 7, 1, '2015-04-16', '2015-04-25', '2015-04-01', '', ''),
(4, 'Reunion speciale', 'TO_CONFIRM', 'simple', 'bla bla', '00:00:00', 2, 5, 7, 1, '2015-04-16', '2015-04-25', '2015-04-01', '', ''),
(5, 'meet1', 'DELETED', 'simple', 'dadadfazfza', '00:00:00', 2, 5, 7, 1, '2015-04-14', '2015-04-09', '2015-04-01', 'dddddd', 'a'),
(6, 'meet2', 'DELETED', 'simple', 'dadadfazfza', '00:00:00', 2, 5, 7, 1, '2015-04-14', '2015-04-09', '2015-04-01', 'dddddd', 'a'),
(7, 'meet3', 'CANCELED', 'simple', 'dadadfazfza', '00:00:00', 2, 5, 7, 1, '2015-04-14', '2015-04-09', '2015-04-01', 'dddddd', 'a');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `organisation`, `firstname`, `lastname`, `username`, `username_canonical`, `email`, `email_canonical`, `password`, `type`, `state`, `phone_number`, `address`, `enabled`, `salt`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 4, 'AD', 'Min', 'admin', 'admin', 'admin@admin.ad', 'admin@admin.ad', 'u1avaOH9CAecWYuzZsRz7K/WiYlAY/ACmU2pU/eq9NfgwkfUS+Sp5eUgL34J98WVnj0ZKCX9dtREx6Wp/4NFtw==', '', '', '0606060606', 'aaaaa2', 1, 'g1ujnrudqrcw4g84c000soksog48sc8', '2015-04-29 09:51:11', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL),
(2, 1, 'aa', 'aa', 'aaaa', 'aaaa', 'a2dmin@admin.ad', 'a2dmin@admin.ad', 'KmzYzbZZnVvBkSOu9NcUO+TLWq46Qd7LE5teWtBIDFPXq+KTK8M9DKQpCGXukY4tCvuvl2d4/7eJ2mkb4SrUfg==', '', '', '', '', 1, '', '2015-04-01 16:12:11', 0, 0, NULL, NULL, NULL, 'N;', 0, NULL),
(4, NULL, 'khadim', 'ndiaye', 'khadim.ndiaye@etu.emse.fr', 'khadim.ndiaye@etu.emse.fr', 'khadim.ndiaye@etu.emse.fr', 'khadim.ndiaye@etu.emse.fr', 'DD/9hliTy59p2sXSZQNoO8Nm+dzbyH/Kf6z3rkckhBswsyprJsRPMQRbJ7IslxaJT3Z1QErcURu/Ofj8rtJifQ==', 'Administrateur Prestataire', 'actif', '+33753092012', '33 allée chantegrillet, Residence CARR ETUDE', 1, 'f0hyqwdqo3cwc0gcco8s8s8g848goc4', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:19:"ROLE_PROVIDER_ADMIN";}', 0, NULL),
(5, 6, 'doe', 'john', 'john@doe.com', 'john@doe.com', 'john@doe.com', 'john@doe.com', 'o9hkPcd1cWrOdF78trC0E/T8is/RfpsBB6dSBvd2SQ5EYvOHJvn53qfk6Bu59rQ/SJlfJmW7aHCq8/2qkIPUVA==', 'Administrateur Client', 'actif', '0606060607', '1 rue michelin , caen', 1, 'mmq5kdclpf4swsog4osgwkgkkk84ogw', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(6, NULL, 'koumpeu', 'alakhame', 'ala@khame.kou', 'ala@khame.kou', 'ala@khame.kou', 'ala@khame.kou', 'i40Diph/DUFaMyFjf87c+KOasLu6idwk/ft2icUJSAFZhoW5YGqyHUtbAVK8mXEbmbjFBkCMy4OhVHM/F6pWHQ==', 'Administrateur Client', 'actif', '2030552', '15 rue des marnes', 1, 'lu19pcr3c8go804gkwssgsggoso8oo4', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(7, 6, 'koumpeu 2', 'alakhame 2', 'a2@aa.aa', 'a2@aa.aa', 'a2@aa.aa', 'a2@aa.aa', 'rpXTTb/FPPJnkU04YtYqbGH2rPfqu0eogbv9rp4rbth8TOE8hlb+OsBW683L7SIORsoDQdmRhY36OUQwbsZSww==', 'Administrateur Client', 'actif', '+33753092012', 'aaaaa', 1, '5ej671l2fhk4sgsgkwoo888wgg80k0w', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(9, NULL, 'ddd', 'ddd', 'ddd@aa.aa', 'ddd@aa.aa', 'ddd@aa.aa', 'ddd@aa.aa', 'dD183bIruwUJSmwRO0HTOlUX0MliNGcK0LCwvrg+cILPM+9cCo9+jO563P+Y2oOl38Z6dVq9/yupyH29BZHy0A==', 'Administrateur Client', 'actif', '0606060606', 'aaaaa', 1, 'ep74h9qy5eogosc4gkk4ccsg4g0wkk8', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(12, 2, 'zzz', 'zzz', 'zzz@aa.aa', 'zzz@aa.aa', 'zzz@aa.aa', 'zzz@aa.aa', 'oo4kMZcU7GykcdT6Vfy9ACR0OzUFH0oUra0CueBUKTV3HqR570LjzJdBMeea6epFW1AkN2IiT75JYgleW+rC4A==', 'Administrateur Client', 'actif', '0606060606', 'zzz', 1, 'lqi0jjk0mcgggwwkookwc04cs0k000c', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(14, NULL, 'rr', 'rr', 'rr@aa.aa', 'rr@aa.aa', 'rr@aa.aa', 'rr@aa.aa', '7e2JBy1cTXURyQS9cP9/0QdjLG/UkXV5GcpxSMyTahqW9mnKbNjS/cdEw8FfAinG/Cq3pg4LgHbjOlCEbKZCJw==', 'Administrateur Client', 'actif', '0606060606', 'rr', 1, '27vznmeq89xcw8c8o00kwwkco408wck', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(15, NULL, 'qqq', 'qqq', 'qqq@aa.aa', 'qqq@aa.aa', 'qqq@aa.aa', 'qqq@aa.aa', 'oi8tqajW19AuYXr3Iswv0EIJGAPb+2nN4GXM/K35Ur5J1LLd2Bw7/DWaHu01R6z6QnepvNkXEnvTcuj2i3ldlw==', 'Administrateur Client', 'actif', 'qqq', 'qqq', 1, 'f0y6i3w5e3kkgc0ssg0kcso48ko8048', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_COM_CLIENT";}', 0, NULL),
(16, 3, 'presta ', 'presta 1', 'presta@aa.aa', 'presta@aa.aa', 'presta@aa.aa', 'presta@aa.aa', 'nCPcTTpdGSO/+3hPbM5MvO3hM/uAK4gj5+UqZ8Pibqb07cKQKkU76dRP5bmG24MfGC51FvGAFoaOD++sXScfKg==', 'Administrateur Prestataire', 'actif', 'aaaaa', 'aaaa', 1, 'jg2dtniix7kgw48oowo8c4cskwogogc', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:19:"ROLE_PROVIDER_ADMIN";}', 0, NULL),
(19, 4, 'dim', 'kha', 'khadim.ndiaye@orange.com', 'khadim.ndiaye@orange.com', 'khadim.ndiaye@orange.com', 'khadim.ndiaye@orange.com', 'jaLrZc/VoNSkvEN3xrLDw3oUt2exlvS/Poya111HmgjOkJQHtjOs5UROACx3p7Rd5Tin4ky7aXLMOd91D/6kRw==', 'Administrateur Prestataire', 'actif', '+33753092012', 'aza ETUDE', 1, 'lgcrmbkmbi84kc4ogogwcgw8ow8sc8c', '2015-04-24 10:39:34', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:19:"ROLE_PROVIDER_ADMIN";}', 0, NULL),
(28, 4, 'name', 'Fine', 'arrrp2oo@aa.aa', 'arrrp2oo@aa.aa', 'arrrp2oo@aa.aa', 'arrrp2oo@aa.aa', '3SsdurZlycOk3DieVd1dvFsYttYKARQFNXBhEjtSeMQ9ukbhH1etARqXflrgfaLOj+WmsuQsn3gMoYGPyA5sHA==', 'Employé Prestataire', 'actif', '060a060606', 'rr', 1, '6hlpxawbtbgo48w4cwo08owgw8cwwcc', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_WORKER";}', 0, NULL),
(29, 4, 'arrr', 'azz2', 'arrrp21o@aa.aa', 'arrrp21o@aa.aa', 'arrrp21o@aa.aa', 'arrrp21o@aa.aa', 'tYo971ZOxh3YklTvvBpNqeSPmOes48jg3bj8p/PJGmw3g/jiQ3dEzpds1+Mm7QLWASyDezRnIzopweUfW3A1BQ==', 'Employé Prestataire', 'actif', '060a060606', 'rr', 1, 'irdxzzbj0gg84c080000cg0gwcs8co0', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_WORKER";}', 0, NULL),
(33, 4, 'kow2', 'kow2', 'kow2@kow.kow', 'kow2@kow.kow', 'kow2@kow.kow', 'kow2@kow.kow', 'EeStZvjRZK85OecfhAvNXQRo3Y7FSuhuqufs5bJe2LqX8uyjL6+sZpSU0PKsT9YBbDjREWiLKMrGnWyVdc4DkA==', 'Employé Prestataire', 'actif', 'dzdzdz', 'aeefe ', 1, '9mf80x5k8ao000oggo0ok44swc8sck4', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_WORKER";}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) DEFAULT NULL,
  `providerGroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9FB2BF628D93D649` (`user`),
  KEY `IDX_9FB2BF6214AC78A6` (`providerGroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `worker`
--

INSERT INTO `worker` (`id`, `language`, `user`, `providerGroup`) VALUES
(1, 'en', 28, NULL),
(2, 'en', 29, NULL),
(5, 'en', 33, NULL),
(7, 'wo', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C744045520B8D8B8` FOREIGN KEY (`clientGroup`) REFERENCES `clientservicegroup` (`id`),
  ADD CONSTRAINT `FK_C74404558D93D649` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

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
  ADD CONSTRAINT `FK_6584BF3EE6E132B4` FOREIGN KEY (`organisation`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `providerservicegroup_ibfk_1` FOREIGN KEY (`serviceID`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `FK_D044D5D42E20A34E` FOREIGN KEY (`Service`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `FK_D044D5D4981EBA54` FOREIGN KEY (`Worker`) REFERENCES `worker` (`id`),
  ADD CONSTRAINT `FK_D044D5D4C0E80163` FOREIGN KEY (`Client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_D044D5D4FED0E94C` FOREIGN KEY (`Organisation`) REFERENCES `organisation` (`id`);

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
  ADD CONSTRAINT `FK_8D93D649E6E132B4` FOREIGN KEY (`organisation`) REFERENCES `organisation` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `FK_9FB2BF6214AC78A6` FOREIGN KEY (`providerGroup`) REFERENCES `providerservicegroup` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_9FB2BF628D93D649` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

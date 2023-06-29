-- Adminer 4.8.1 MySQL 10.6.12-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE `Articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(50) NOT NULL,
  `article_text` varchar(150) NOT NULL,
  `article_start_date` datetime NOT NULL,
  `article_end_date` datetime NOT NULL,
  `article_importance` int(11) NOT NULL DEFAULT 0,
  `Authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Articles_Authors1_idx` (`Authors_id`),
  CONSTRAINT `fk_Articles_Authors1` FOREIGN KEY (`Authors_id`) REFERENCES `Authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Articles` (`id`, `article_title`, `article_text`, `article_start_date`, `article_end_date`, `article_importance`, `Authors_id`) VALUES
(1,	'Sports de la semaine',	'dolor sit amet, consectetur adipis Nunc efficitur turpis sit amet neque ia',	'2023-06-28 00:00:00',	'2023-07-05 00:00:00',	1,	1),
(2,	'Des forains écrasés par un autotemponeuse',	'dolor sit amet, consectetur adipis Nunc efficitur turpis sit amet neque ia',	'2023-06-28 00:00:00',	'2023-06-30 00:00:00',	5,	4),
(3,	'Linux rachété par microsoft',	'dolor sit amet, consectetur adipis Nunc efficitur turpis sit amet neque ia',	'2023-06-28 00:00:00',	'2023-06-30 00:00:00',	1,	2),
(4,	'Un cimetiere profanée ',	'dolor sit amet, consectetur adipis Nunc efficitur turpis sit amet neque ia',	'2023-06-28 00:00:00',	'2023-06-30 00:00:00',	2,	3);

DROP TABLE IF EXISTS `Articles_has_Categories`;
CREATE TABLE `Articles_has_Categories` (
  `Articles_id` int(11) NOT NULL,
  `Categories_id` int(11) NOT NULL,
  PRIMARY KEY (`Articles_id`,`Categories_id`),
  KEY `fk_Articles_has_Categories_Categories1_idx` (`Categories_id`),
  KEY `fk_Articles_has_Categories_Articles1_idx` (`Articles_id`),
  CONSTRAINT `fk_Articles_has_Categories_Articles1` FOREIGN KEY (`Articles_id`) REFERENCES `Articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Articles_has_Categories_Categories1` FOREIGN KEY (`Categories_id`) REFERENCES `Categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Articles_has_Categories` (`Articles_id`, `Categories_id`) VALUES
(1,	1),
(1,	3),
(3,	2),
(4,	2);

DROP TABLE IF EXISTS `Authors`;
CREATE TABLE `Authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_pseudo` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `author_firstname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `author_pseudo_UNIQUE` (`author_pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Authors` (`id`, `author_pseudo`, `author_name`, `author_firstname`) VALUES
(1,	'Matéo',	'Tevts',	NULL),
(2,	'Valentine',	'Ok',	NULL),
(3,	'NullsurLOL',	'Boillot',	'Marc'),
(4,	'DaibloCestCool',	'Wilson',	'Andrews'),
(5,	'Twitch ',	'Luigos',	NULL);

DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Categories` (`id`, `category_name`) VALUES
(1,	'Loisir'),
(2,	'Actualités'),
(3,	'Sport');

DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(150) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Articles_id` int(11) NOT NULL,
  `Authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comment_UNIQUE` (`comment`),
  KEY `fk_Comments_Articles_idx` (`Articles_id`),
  KEY `fk_Comments_Authors1_idx` (`Authors_id`),
  CONSTRAINT `fk_Comments_Articles` FOREIGN KEY (`Articles_id`) REFERENCES `Articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_Authors1` FOREIGN KEY (`Authors_id`) REFERENCES `Authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Comments` (`id`, `comment`, `comment_date`, `Articles_id`, `Authors_id`) VALUES
(1,	'Genial !',	'2023-06-28 13:27:32',	2,	1),
(2,	'Yes !',	'2023-06-28 13:28:35',	2,	3),
(3,	'Trop bien',	'2023-06-28 13:28:49',	1,	1),
(4,	'Les sous !!',	'2023-06-28 13:29:27',	3,	5),
(5,	'Sans avis',	'2023-06-28 13:30:42',	1,	2);

-- 2023-06-28 11:33:55

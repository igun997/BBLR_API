# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.13-MariaDB)
# Database: bblr
# Generation Time: 2020-07-10 08:55:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `featured_image` varchar(100) DEFAULT NULL,
  `featured_video` varchar(100) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_categories` (`parent_id`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `token` text DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `level`, `status`, `token`, `created_at`, `updated_at`)
VALUES
	(3,'Indra Gunanda','igun997','indra290997','indra.gunanda@gmail.com','081214267695',1,1,'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpZCI6MywibGV2ZWwiOjEsImV4cGlyZWQiOjE1OTQzODIzNDF9.lhzj6hqq8LOL-wMdqnzsd5XicVBPq9g4HcUYoJPqkVri8H_YToc9-88Cz35u0SwUFjYsZQvJCrOwmQJahyUOk5AXLC1hWOBlkExEp1fin7Gu_LkAqTzLMtJdbFlouCSBsmqt1OAu-KOs4SSv92RnWTJiUacYgxxUgfvAsbQdyrvDSWJVca5NjSFDgayU6dZO_8iFBOEBU1fe0E17xwUt4d3NRdBJe5EIWTGxtym3X-ym1iQw4hPGNwnkGVP5qpvFKV2UVoJQBNmGXaTjNHkIQjH9Hj8Jkvzn0uGffxgxTh7uU8jALRCPyRrOR24pGsiHrRik37OTKBfcPZgStvXSJFA4wLO4q4uviIHg628lgGhqHU95qpmd-Eb8MIl8kXzqqM-3OsrAJZcG88H0TmRU9Lxh8Ikvn0Ro6u8-z9fztBwJZDn9-lnAuopYtOdtWakRQV6oKL0hJpCARo8NMPXU-_dSHp4dCpQ1B5JOILv3sgmH0Suo3mxhcJFDzqz0z758SzlG3SCEGjtxDTdMTxZntxz5YhEEgvHH1rmeSsp8T3hbthQZBSOjkIqsrVRSFOuOwf-vJwYR2Okm_vaaODnVmot6JYzAZPNT1SyH6RokSqJl3YdERFQ2wXDyPj6re3We68UFfxi9ZDwim1djmGLKgv9KRo6hAzmqRqkIjbJzvB0','2020-07-10','2020-07-10');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

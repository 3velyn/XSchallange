-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bookstore
CREATE DATABASE IF NOT EXISTS `bookstore` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `bookstore`;

-- Dumping structure for table bookstore.books
CREATE TABLE IF NOT EXISTS `books`
(
    `id`          int(11)                              NOT NULL AUTO_INCREMENT,
    `name`        varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `isbn`        varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `description` text COLLATE utf8_unicode_ci         NOT NULL,
    `image`       text COLLATE utf8_unicode_ci,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table bookstore.roles
CREATE TABLE IF NOT EXISTS `roles`
(
    `id`   int(11)                             NOT NULL AUTO_INCREMENT,
    `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table bookstore.users
CREATE TABLE IF NOT EXISTS `users`
(
    `id`         int(11)                              NOT NULL AUTO_INCREMENT,
    `email`      varchar(50) COLLATE utf8_unicode_ci  NOT NULL,
    `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `last_name`  varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `password`   varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table bookstore.users_books
CREATE TABLE IF NOT EXISTS `users_books`
(
    `user_id` int(11) NOT NULL,
    `book_id` int(11) NOT NULL,
    KEY `FK__users_id__users_books_user_id` (`user_id`),
    KEY `FK__books_id__users_books_book_id` (`book_id`),
    CONSTRAINT `FK__books_id__users_books_book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
    CONSTRAINT `FK__users_id__users_books_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table bookstore.users_roles
CREATE TABLE IF NOT EXISTS `users_roles`
(
    `user_id` int(11) NOT NULL,
    `role_id` int(11) NOT NULL,
    KEY `FK__users_id__users_roles_user_id` (`user_id`),
    KEY `FK__roles_id__users_roles_role_id` (`role_id`),
    CONSTRAINT `FK__roles_id__users_roles_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
    CONSTRAINT `FK__users_id__users_roles_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE = IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS = IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;

INSERT INTO `bookstore`.`roles` (`role`) VALUES ('ROLE_ADMIN');
INSERT INTO `bookstore`.`roles` (`role`) VALUES ('ROLE_USER');
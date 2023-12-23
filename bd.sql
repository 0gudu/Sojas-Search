-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2023 at 08:20 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `dados`
--

DROP TABLE IF EXISTS `dados`;
CREATE TABLE IF NOT EXISTS `dados` (
  `id_dados` int NOT NULL AUTO_INCREMENT,
  `fds` varchar(85) NOT NULL,
  `urls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` longtext NOT NULL,
  `senha` longtext NOT NULL,
  PRIMARY KEY (`id_dados`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dados`
--

INSERT INTO `dados` (`id_dados`, `fds`, `urls`, `email`, `senha`) VALUES
(1, '', 'siteexemplo.com', 'emailexemplo@ex.com', 'senhaex123'),
(2, '', 'url1', 'email1', 'senha1'),
(3, '', 'url2', 'email2', 'senha2'),
(4, '', 'url3', 'email3', 'senha3'),
(5, 'url1', 'email1', 'senha1', 'ui\r'),
(6, 'url2', 'email2', 'senha2', 'ui\r'),
(7, 'url3', 'email3', 'senha3', 'ui\r'),
(8, 'url1', 'email1', 'senha1', 'ui\r'),
(9, 'url2', 'email2', 'senha2', 'ui\r'),
(10, 'url3', 'email3', 'senha3', 'ui\r');

-- --------------------------------------------------------

--
-- Table structure for table `databasess`
--

DROP TABLE IF EXISTS `databasess`;
CREATE TABLE IF NOT EXISTS `databasess` (
  `id_database` int NOT NULL AUTO_INCREMENT,
  `names` varchar(85) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_database`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `databasess`
--

INSERT INTO `databasess` (`id_database`, `names`) VALUES
(2, 'a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2021 at 06:29 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pametni_paketnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `nabiralnik`
--

DROP TABLE IF EXISTS `nabiralnik`;
CREATE TABLE IF NOT EXISTS `nabiralnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_uporabnik` int(11) NOT NULL,
  `ime` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `najem`
--

DROP TABLE IF EXISTS `najem`;
CREATE TABLE IF NOT EXISTS `najem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_uporabnik` int(11) NOT NULL,
  `id_nabiralnik` int(11) NOT NULL,
  `najem_od` datetime DEFAULT NULL,
  `najem_do` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `odpiranje`
--

DROP TABLE IF EXISTS `odpiranje`;
CREATE TABLE IF NOT EXISTS `odpiranje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nabiralnik` int(11) NOT NULL,
  `cas_odpiranja` date DEFAULT NULL,
  `id_uporabnik` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uporabnik`
--

DROP TABLE IF EXISTS `uporabnik`;
CREATE TABLE IF NOT EXISTS `uporabnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uporabnisko_ime` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
   `vloga` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

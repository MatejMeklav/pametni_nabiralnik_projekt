-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2021 at 10:09 AM
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
-- Database: `vaja2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oglas_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `oglas_id`, `email`, `nickname`, `comment`, `date_added`, `user_id`) VALUES
(1, 1, 'dsfgdsf@dsfgf.si', 'fdsgdfsg', 'dfgfgsdf', '2021-04-11 07:33:55', 0),
(2, 1, '123@gg.si', 'dsfds', '123131', '2021-04-12 11:07:02', 0),
(3, 1, '123@gg.si', 'dsfds', '123131', '2021-04-12 11:07:05', 0),
(4, 1, 'matej.meklav@gmail.com', 'dsfds', '32424', '2021-04-12 11:10:42', 0),
(5, 1, 'matej.meklav@gmail.com', 'dsfds', '32424', '2021-04-12 11:10:46', 0),
(6, 1, 'matej.meklav@gmail.com', 'dsfds', '13231', '2021-04-12 11:30:23', 0),
(7, 2, '4343@gmail.com', '4553', '43353', '2021-04-12 11:32:11', 0),
(8, 1, 'matej.meklav@gmail.com', 'Matej', 'SDSDSSDS', '2021-04-24 20:36:59', 0),
(9, 1, 'matej.meklav@gmail.com', 'Matej', 'SDSDSSDS', '2021-04-24 20:37:00', 0),
(11, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:02', 0),
(12, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:05', 0),
(13, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:08', 0),
(14, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:08', 0),
(15, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:09', 0),
(16, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:11', 0),
(17, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:12', 0),
(18, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:12', 0),
(19, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:12', 0),
(20, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:37:13', 0),
(21, 1, 'matej.meklav@gmail.com', '3eq34234', '3242423', '2021-04-25 12:38:23', 0),
(22, 1, 'matej.meklav@gmail.com', 'mjkgfkg', 'gfogkfgfg', '2021-04-25 12:38:39', 0),
(23, 1, 'matej.meklav@gmail.com', 'mjkgfkg', 'gfogkfgfg', '2021-04-25 12:38:51', 0),
(24, 1, 'matej.meklav@gmail.com', 'asds', 'test', '2021-04-25 19:45:08', 0),
(41, 9, 'matej.meklav@student.um.si', 'dsfds', 'ghfhfghgf', '2021-05-22 16:30:39', 0),
(26, 6, 'matej.meklav@gmail.com', 'dfdfdf', 'dfdsfdfs', '2021-05-20 22:09:20', 0),
(28, 2, 'ssd@gg.si', 'sdfsdff', 'ali dela', '2021-05-20 22:13:36', 0),
(29, 6, 'matej.meklav@gmail.com', 'sadsdas', 'ali dela?', '2021-05-20 22:13:50', 0),
(50, 9, 'matej.meklav@gmail.com', 'Matej', '213231321', '2021-05-22 17:32:02', 0),
(51, 10, 'matej.meklav@gmail.com', 'Matej', 'ererwerewrwer', '2021-05-22 17:33:23', 0),
(54, 10, 'matej.meklav@gmail.com', 'Matej', 'TestingKonec', '2021-05-22 22:10:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
CREATE TABLE IF NOT EXISTS `oglas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naslov` longtext NOT NULL,
  `Vsebina` longtext NOT NULL,
  `DatumObjave` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` (`ID`, `Naslov`, `Vsebina`, `DatumObjave`, `user_id`) VALUES
(1, 'Moj oglas', 'Moja vsebina', '2016-03-02 09:25:19', 0),
(2, 'moj nov bootstrap naslov', 'EDIT BOOTSTRAP234', '2016-03-23 12:35:54', 0),
(3, '23313', '2313', '2021-04-02 16:33:31', 0),
(4, 'blabla', '1231212321321', '2021-04-10 22:09:39', 0),
(5, 'oglas', 'vsebina oglasa', '2021-04-25 13:20:01', 0),
(6, 'Testing1EDIT22111', '123123EDIT22', '2021-05-20 20:58:30', 8),
(7, 'Testing2', 'wweasdaddasd', '2021-05-21 21:18:43', 0),
(8, 'Moj oglas', '123123', '2021-05-22 17:01:27', 0),
(13, 'TestBadge,Logout', 'sdasdsada', '2021-05-24 11:56:15', 0),
(10, 'Matej Lastnik22', 'dfdsfdfs22222222', '2021-05-22 19:32:59', 1),
(12, 'TestBadge', 'dfsdsfdsfsdfs', '2021-05-24 11:55:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_slovenian_ci NOT NULL,
  `password` text COLLATE utf8_slovenian_ci NOT NULL,
  `gender` text COLLATE utf8_slovenian_ci,
  `phone` text COLLATE utf8_slovenian_ci,
  `post` int(11) DEFAULT NULL,
  `email` text COLLATE utf8_slovenian_ci,
  `address` text COLLATE utf8_slovenian_ci,
  `admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `gender`, `phone`, `post`, `email`, `address`, `admin`) VALUES
(1, 'Matej', '601f1889667efaebb33b8c12572835da3f027f78', 'male', '0312280501', 2000, 'matej.meklav@gmail.com', 'dobric 105', 1),
(11, 'matej.meklav@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'male', '031228050', 3313, 'matej.meklav@com', 'DobriÄ 105', 0),
(10, 'Matej3', '601f1889667efaebb33b8c12572835da3f027f78', 'male', '031228050', 3313, 'matej.meklav@gmail.com', 'DobriÄ 105', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2015 at 10:31 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.36-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blindeten`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permisson`
--

CREATE TABLE IF NOT EXISTS `permisson` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permisson`
--

INSERT INTO `permisson` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `lat` varchar(256) DEFAULT NULL,
  `lon` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `lat`, `lon`, `url`) VALUES
(1, 'Cafe-Restaurant de Plantage', ' 4.911926', '4.9119', 'http://caferestaurantdeplantage.nl'),
(2, 'De Biertuin', '52.362337', ' 4.924231', 'http://www.debiertuin.nl'),
(3, 'Monte Verde', '52.354742', '4.887257', 'http://www.restaurantmonteverde.nl'),
(4, 'Mossel & Gin', '52.386470', ' 4.868014', 'http://www.mosselengin.nl'),
(5, 'Dragon I', ' 52.353702', '4.855635', 'http://www.dragoni-restaurant.nl'),
(6, 'Hard Rock Cafe', '52.362022', '4.882908', 'http://www.hardrock.com/cafes/amsterdam/'),
(8, 'Chez Georges', '52.376998 ', ' 4.889273', 'http://www.chez-georges.nl');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rest_id` int(11) DEFAULT NULL,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `rest_id`, `user1`, `user2`, `start_time`) VALUES
(1, 1, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL),
(4, 2, NULL, NULL, NULL),
(5, 2, NULL, NULL, NULL),
(6, 3, NULL, NULL, NULL),
(7, 3, NULL, NULL, NULL),
(8, 3, NULL, NULL, NULL),
(9, 3, NULL, NULL, NULL),
(10, 4, NULL, NULL, NULL),
(11, 4, NULL, NULL, NULL),
(12, 5, NULL, NULL, NULL),
(13, 6, NULL, NULL, NULL),
(15, 8, NULL, NULL, NULL),
(16, 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `e-mail` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `sex`, `birthdate`, `city`, `e-mail`, `password`) VALUES
(2, 'Rens Mester', 0, '1996-09-30', 'Hoorn', 'rens.mester@hotmail.com', 'rens_1996'),
(3, 'Fleur Koentjes', 1, '1994-12-22', 'Amsterdam', 'fleurkoentjes@gmail.com', '22121994'),
(4, 'Jim Lemmers', 0, '1990-08-03', 'Amsterdam', 'jim.lemmers@gmail.com', 'JimLamsterdam'),
(5, 'Laura Langeveld', 1, '1995-09-18', 'Haarlem', 'laura_langeveld@hotmail.com', 'lauwalittlepony');

-- --------------------------------------------------------

--
-- Table structure for table `user_perm`
--

CREATE TABLE IF NOT EXISTS `user_perm` (
  `perm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_perm`
--

INSERT INTO `user_perm` (`perm_id`, `user_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

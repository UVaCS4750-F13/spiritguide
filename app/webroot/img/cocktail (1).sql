-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2013 at 11:03 AM
-- Server version: 5.5.34-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs4750baw4ux`
--

-- --------------------------------------------------------

--
-- Table structure for table `cocktail`
--

CREATE TABLE IF NOT EXISTS `cocktail` (
  `cocktail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `recipe` text NOT NULL,
  `rating` double(3,1) DEFAULT NULL,
  PRIMARY KEY (`cocktail_id`),
  UNIQUE KEY `name` (`name`),
  KEY `index_cocktail_cocktail_id` (`cocktail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `cocktail`
--

INSERT INTO `cocktail` (`cocktail_id`, `name`, `recipe`, `rating`) VALUES
(68, '', 'Mix', NULL),
(70, 'mix', 'mix', NULL),
(71, 'Drinkasaurus', 'Mix', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

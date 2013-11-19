-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2013 at 01:57 AM
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
-- Table structure for table `contains`
--

CREATE TABLE IF NOT EXISTS `contains` (
  `cocktail_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  `unit` varchar(20) NOT NULL,
  `amount` decimal(6,2) unsigned NOT NULL,
  PRIMARY KEY (`cocktail_id`,`ingredient_id`),
  KEY `fk_takes_ingredient_ingredient_id` (`ingredient_id`),
  KEY `fk_takes_conversion_unit` (`unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `fk_takes_cocktail_cocktail_id` FOREIGN KEY (`cocktail_id`) REFERENCES `cocktail` (`cocktail_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_takes_conversion_unit` FOREIGN KEY (`unit`) REFERENCES `conversion` (`unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_takes_ingredient_ingredient_id` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`ingredient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 01:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zillion_penny`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_opened` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `country_code` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `exchange_method` varchar(255) NOT NULL,
  `withdrawal_details` varchar(255) NOT NULL,
  `referral_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `date_opened`, `status`, `country_code`, `phone_number`, `id_type`, `id_number`, `package`, `exchange_method`, `withdrawal_details`, `referral_email`) VALUES
(1, 'Ebimobowei', 'Okpongu', 'ebi.okpongu@gmail.com', '$2y$10$iXjI7/DWdZdrExdWCeyGyu2WIWXilfvgZY2ePJ5Sx.X2K8XsoxjXm', '2018-03-21 14:42:11', 0, '674', '02341234123', '3', 'dsf23432', '2', '2', 'dsfasdf', 'realbenten@gmail.com'),
(2, 'Benedict', 'Onabe', 'realbenten@gmail.com', '$2y$10$5RKwIKRlKVxQkYv0VLSN3.jrPN8Yr4ZHnt0G1gQC1oZB4cb3XSuBW', '2018-03-22 08:24:34', 0, '234', '07035484893', '4', 'AA23889', '4', '1', 'Diamond Bank\r\nAguda Surulere', 'ebi.okpongu@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

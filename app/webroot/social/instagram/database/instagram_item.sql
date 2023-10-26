-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 01:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `instagram_item`
--

CREATE TABLE IF NOT EXISTS `instagram_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` text,
  `post_url` text,
  `published` varchar(50) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  `profile_id` varchar(30) DEFAULT NULL,
  `screen_name` varchar(50) DEFAULT NULL,
  `profile_url` text,
  `profile_img` text,
  `instagram_post_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instagram_item`
--

INSERT INTO `instagram_item` (`id`, `post_title`, `post_url`, `published`, `updated`, `profile_id`, `screen_name`, `profile_url`, `profile_img`, `instagram_post_id`) VALUES
(1, 'Gh', 'https://www.instagram.com/p/BCKt1YmljEh/', '1456313517', NULL, '2952866419', 'mas_ashok', NULL, 'https://igcdn-photos-b-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/s150x150/925202_1681914635401713_496029995_a.jpg', '1191966632035365153_2952866419');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

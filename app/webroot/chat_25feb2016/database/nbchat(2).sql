-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 10:51 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nbchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locationid` int(11) DEFAULT NULL,
  `serviceid` varchar(200) DEFAULT NULL,
  `patientid` int(11) DEFAULT NULL,
  `doctorid` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_availbility` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `join_status` int(11) DEFAULT '0' COMMENT '''0'' for not joined, ''1'' for create joined, ''2'' for joined, ''3'' for end joined',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `locationid`, `serviceid`, `patientid`, `doctorid`, `appointment_date`, `appointment_availbility`, `status`, `join_status`, `created`, `modified`) VALUES
(1, 11, '4', 7, 28, '2015-12-18', NULL, 1, 0, NULL, NULL),
(2, 7, '4,1', 7, 28, '2015-12-22', 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 11, '4,1', 7, 28, '2015-12-22', 3, 1, 0, '2015-12-21 13:20:29', '2015-12-21 13:50:34'),
(4, 1, '1', 7, 13, '2015-12-22', 5, 0, 0, '2015-12-22 08:37:03', '2015-12-22 08:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `chat_message` text,
  `read_status` tinyint(1) NOT NULL COMMENT '0 = No, 1 = Yes',
  `is_attachment` smallint(1) DEFAULT '0' COMMENT '0=No, 1=Yes',
  `attachment_path` text,
  `clear_by_from` int(11) NOT NULL DEFAULT '0',
  `clear_by_to` int(11) NOT NULL,
  `chat_date` datetime DEFAULT NULL,
  `clear_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`cid`, `from_id`, `to_id`, `chat_message`, `read_status`, `is_attachment`, `attachment_path`, `clear_by_from`, `clear_by_to`, `chat_date`, `clear_status`) VALUES
(1, 87, 71, 'hio', 1, 0, NULL, 87, 0, '2015-04-30 10:28:50', '1'),
(2, 71, 87, 'hlo<div><br></div>', 1, 0, NULL, 87, 0, '2015-04-30 10:29:03', '1'),
(3, 71, 87, '', 1, 0, NULL, 87, 0, '2015-04-30 10:29:04', '1'),
(4, 113, 116, 'hiiii', 1, 0, NULL, 0, 0, '2015-12-16 18:54:05', '0'),
(5, 116, 113, 'hello', 1, 0, NULL, 0, 0, '2015-12-16 18:55:04', '0'),
(6, 113, 116, '<br><img alt="" src="http://192.168.1.148/NBChat/t_file/1450272336-291001449063262_53004b3045451.jpg" height="32" width="32">', 1, 0, NULL, 0, 0, '2015-12-16 18:55:41', '0'),
(7, 113, 116, 'got it<br>', 1, 0, NULL, 0, 0, '2015-12-16 18:55:50', '0'),
(8, 116, 113, 'gfdgdg', 1, 0, NULL, 0, 0, '2015-12-16 18:56:22', '0'),
(9, 116, 113, 'hgfhfh<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-16 18:57:19', '0'),
(10, 94, 113, 'fdgfdg', 1, 0, NULL, 0, 0, '2015-12-16 18:59:59', '0'),
(11, 94, 116, 'rdesfgdgdfg', 1, 0, NULL, 94, 0, '2015-12-16 19:00:39', '1'),
(12, 113, 94, 'htyhtgfyu', 1, 0, NULL, 0, 0, '2015-12-16 19:01:07', '0'),
(13, 116, 113, 'hfghgfhfhs', 1, 0, NULL, 0, 0, '2015-12-16 19:01:22', '0'),
(14, 116, 0, 'gdfg', 1, 0, NULL, 0, 0, '2015-12-16 19:07:44', '0'),
(15, 116, 94, 'cxvxvxv', 1, 0, NULL, 94, 0, '2015-12-16 19:08:00', '1'),
(16, 91, 116, 'gdfgdgdfg', 1, 0, NULL, 0, 0, '2015-12-16 19:10:09', '0'),
(17, 91, 94, 'gfdgfdgdfg', 1, 0, NULL, 0, 0, '2015-12-16 19:10:21', '0'),
(18, 116, 91, '<div><br></div><img width="32" height="32" alt="" src="http://192.168.1.148/NBChat/t_file/1450273268-211851449063262_53004b3045451.jpg">', 1, 0, NULL, 0, 0, '2015-12-16 19:11:15', '0'),
(19, 91, 116, '<span style="color:rgb(180,167,214);">gdgfdgdgdg</span>', 1, 0, NULL, 0, 0, '2015-12-16 19:13:01', '0'),
(20, 94, 91, '<span style="color:rgb(204,0,0);">&nbsp;hgfhfhfh</span>', 1, 0, NULL, 0, 0, '2015-12-16 19:13:37', '0'),
(21, 113, 112, 'hi<br><br>', 1, 0, NULL, 0, 0, '2015-12-19 14:04:15', '0'),
(22, 112, 113, 'hi<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-19 15:09:07', '0'),
(23, 113, 112, 'hey<br><br>', 1, 0, NULL, 0, 0, '2015-12-21 14:55:11', '0'),
(24, 112, 113, 'hello<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-21 14:55:21', '0'),
(25, 113, 112, 'hi how are you?<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-21 16:14:03', '0'),
(26, 112, 113, 'fine<br><br>', 1, 0, NULL, 0, 0, '2015-12-21 16:19:50', '0'),
(27, 113, 112, 'hi<br><br>', 0, 0, NULL, 0, 0, '2015-12-22 11:43:29', '0'),
(28, 113, 112, 'hello', 0, 0, NULL, 0, 0, '2015-12-22 11:43:47', '0'),
(29, 112, 113, 'hello<div><br></div>', 0, 0, NULL, 0, 0, '2015-12-22 11:44:05', '0'),
(30, 113, 112, 'cvncvnvcnvcn', 0, 0, NULL, 0, 0, '2015-12-22 11:44:38', '0'),
(31, 112, 113, 'kjbj.jb', 0, 0, NULL, 0, 0, '2015-12-22 11:45:03', '0'),
(32, 112, 113, 'dfdsfdsfds<div><br></div>', 0, 0, NULL, 0, 0, '2015-12-22 11:47:24', '0'),
(33, 112, 113, 'xdfgdfsg<div><br></div>', 0, 0, NULL, 0, 0, '2015-12-22 11:47:32', '0'),
(34, 16, 0, 'cnbvcnbcv<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-22 12:08:23', '0'),
(35, 16, 0, 'xvbcxbxcbx<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-22 12:28:09', '0'),
(36, 13, 0, 'fgncnhfgnhg', 1, 0, NULL, 0, 0, '2015-12-22 12:28:23', '0'),
(37, 13, 0, 'cvxvxcv', 1, 0, NULL, 0, 0, '2015-12-22 12:32:44', '0'),
(38, 13, 0, 'vbxvbvbvx', 1, 0, NULL, 0, 0, '2015-12-22 12:34:09', '0'),
(39, 13, 0, 'cxvcxvcxv', 1, 0, NULL, 0, 0, '2015-12-22 12:35:23', '0'),
(40, 13, 0, 'nhncn', 1, 0, NULL, 0, 0, '2015-12-22 12:35:42', '0'),
(41, 16, 0, 'xxbvxbvcxbx<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-22 12:38:26', '0'),
(42, 13, 0, 'cvnvn', 1, 0, NULL, 0, 0, '2015-12-22 12:38:46', '0'),
(43, 13, 0, 'dfbhdfbghdfg', 1, 0, NULL, 0, 0, '2015-12-22 12:40:40', '0'),
(44, 13, 0, 'dfgdfg', 1, 0, NULL, 0, 0, '2015-12-22 12:40:50', '0'),
(45, 13, 16, 'dfsdsgdsg', 1, 0, NULL, 0, 0, '2015-12-22 12:52:13', '0'),
(46, 13, 16, 'fghgdh', 1, 0, NULL, 0, 0, '2015-12-22 12:52:21', '0'),
(47, 16, 13, 'hey how are you?<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 12:54:53', '0'),
(48, 28, 16, 'hi ashok<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 13:05:53', '0'),
(49, 28, 16, 'how are you?<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 13:06:03', '0'),
(50, 28, 13, 'hello ayush...!<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 13:06:16', '0'),
(51, 13, 28, 'hi rajesh<br>', 1, 0, NULL, 0, 0, '2015-12-22 13:07:44', '0'),
(52, 13, 28, 'how are you?<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 13:07:49', '0'),
(53, 13, 16, 'are you free now?<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 13:10:42', '0'),
(54, 16, 13, 'yes sure<div><br></div>', 1, 0, NULL, 0, 0, '2015-12-22 13:11:01', '0'),
(55, 28, 13, 'what''s up?<br><br>', 1, 0, NULL, 0, 0, '2015-12-22 13:11:22', '0');

-- --------------------------------------------------------

--
-- Table structure for table `chat_status`
--

CREATE TABLE IF NOT EXISTS `chat_status` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status_type` int(11) DEFAULT '0' COMMENT '0=Online,1=Idele,2=Offline',
  `status_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE IF NOT EXISTS `doctor_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `app_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `doctor_availability`
--

INSERT INTO `doctor_availability` (`id`, `doctor_id`, `app_date`, `start_time`, `end_time`, `status`, `created`, `modified`) VALUES
(1, 28, '2015-12-22', '12:45:00', '13:30:00', 1, '2015-12-21 08:20:54', '2015-12-21 10:31:45'),
(3, 28, '2015-12-22', '13:45:00', '14:45:00', 1, '2015-12-21 08:29:49', '2015-12-21 10:21:42'),
(5, 13, '2015-12-22', '13:45:00', '16:15:00', 1, '2015-12-21 10:34:43', '2015-12-21 10:39:35'),
(22, 13, '2015-12-22', '17:45:00', '18:45:00', 0, '2015-12-21 13:19:22', '2015-12-21 13:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `master_users`
--

CREATE TABLE IF NOT EXISTS `master_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(30) NOT NULL,
  `ref_id` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '1' COMMENT '0 for "female" and 1 for "male"',
  `login_tytpe` varchar(3) NOT NULL COMMENT 'D for doctor and P for Patient',
  `mobile_no` varchar(30) NOT NULL,
  `emrg_no` varchar(30) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `last_session_date` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_online` int(11) NOT NULL,
  `avatar_image` varchar(255) NOT NULL,
  `is_conv` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `master_users`
--

INSERT INTO `master_users` (`id`, `patient_id`, `ref_id`, `fname`, `lname`, `email_id`, `user_name`, `user_pass`, `dob`, `gender`, `login_tytpe`, `mobile_no`, `emrg_no`, `zipcode`, `status`, `marital_status`, `last_session_date`, `created`, `modified`, `is_online`, `avatar_image`, `is_conv`) VALUES
(6, 'INH123', 'PA10003', 'Jabhar', 'mishra', '', 'chitta1', 'MTIzNDU=', '1986-06-03', 1, 'P', '(324) 235-3453', '234535353', '345', 0, 'single', 0, '2015-12-05 07:49:11', '2015-12-07 07:22:01', 0, '', 0),
(7, 'dSA12', 'PA10004', 'chitta', 'sahoo', '', 'chitta', 'MTIzNDU2', '1989-12-12', 1, 'P', '(981) 325-3453', '254353', '751013', 1, 'single', 0, '2015-12-07 07:13:29', '2015-12-07 07:23:36', 0, '', 0),
(13, '', 'DR10001', 'Chittaranjan', 'Sahoo', 'chittas970@gmail.com', 'ayush', 'Y2hpdHRhQDEyMw==', '1989-06-12', 1, 'D', '(435) 465-7687', '', '751013', 1, '', 2015, '2015-12-07 11:14:43', '2015-12-18 08:22:22', 1, '', 0),
(16, 'abcd@123', 'PA10005', 'Ashok', 'Samal', 'ashok@gmail.com', 'Ashok', 'YXNob2tAMTIz', '1991-02-19', 1, 'P', '1242342', '', '2112', 1, 'single', 2015, '2015-12-15 11:53:18', '2015-12-15 11:53:18', 1, '', 0),
(17, 'PT12QA', 'PA10006', 'pragyaa', 'jain', '', 'pragyaa', 'cHJhZ3lhYUAxMjM=', '1991-06-30', 0, 'P', '23423234', '', '32432', 0, 'single', 0, '2015-12-15 11:56:45', '2015-12-15 11:56:45', 0, '', 0),
(28, '', 'DR10002', 'Rajesh', 'Sahoo', 'maasrajesh2@gmail.com', 'rajesh', 'MTIzNDU2', '1991-02-28', 1, 'D', '(875) 686-5234', '', '453535', 1, '', 2015, '2015-12-18 13:36:53', '2015-12-18 13:40:53', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_users1`
--

CREATE TABLE IF NOT EXISTS `master_users1` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) DEFAULT NULL,
  `chat_name` varchar(150) DEFAULT NULL,
  `avatar_image` text,
  `tag_line` text,
  `mail_id` varchar(250) DEFAULT NULL,
  `mo_number` varchar(255) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL COMMENT 'Password',
  `created` datetime DEFAULT NULL,
  `is_active` smallint(1) DEFAULT '1' COMMENT '0=No, 1= Yes',
  `is_online` enum('0','1') NOT NULL,
  `is_admin` smallint(1) DEFAULT '0' COMMENT '0=No, 1=Yes',
  `is_conv` tinyint(1) NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `mail_id` (`mail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `master_users1`
--

INSERT INTO `master_users1` (`user_id`, `full_name`, `chat_name`, `avatar_image`, `tag_line`, `mail_id`, `mo_number`, `pass`, `created`, `is_active`, `is_online`, `is_admin`, `is_conv`, `last_login_time`) VALUES
(71, 'admin1234', 'admin1234', '1427184607avtimg-fsdf.jpg', 'Superadmin', 'admin@log.in', '999999999111', 'YWRtaW4xMjM=', '2015-01-14 20:16:22', 1, '0', 1, 0, '2015-12-16 19:21:40'),
(84, 'mmi', 'mmi', '../images/user-thumb1.png', 'mmi', 'mmi@gmail.com', NULL, 'MTIz', '2015-02-20 12:48:33', 1, '0', 0, 0, '2015-04-29 12:31:25'),
(87, 'Santosh Manik123', 'maniksanto', '1427188688avtimg-1416565649_image1_adam-thomson.png', 'Manik Smart Boy', 'maas_santosh@yahoo.in', '43534543', 'bWFuaWs=', '2015-03-24 14:43:54', 1, '0', 0, 0, '2015-04-30 10:28:44'),
(90, 'ashis', 'mr ashis123', '../images/user-thumb1.png', NULL, 'ashis_maas@yahoo.in', NULL, 'YXNoaXMxMjM=', '2015-03-25 20:12:22', 1, '0', 0, 0, NULL),
(91, 'Debasish', 'deb', '../images/user-thumb1.png', 'm cool', 'deb882003@gmail.com', NULL, 'MTExMQ==', '2015-03-26 10:46:59', 1, '0', 0, 0, '2015-12-16 19:09:59'),
(92, 'Priya ranjan Jena', 'Priya', '../images/user-thumb1.png', NULL, 'priya_maas@gmial.com', NULL, 'cHJpeWExMjM=', '2015-03-26 15:51:10', 1, '0', 0, 0, NULL),
(93, 'Bikas das', 'biku', '1427367666avtimg-Hydrangeas.jpg', NULL, 'maas_biku@gmail.com', NULL, 'YmlrdTEyMw==', '2015-03-26 16:31:06', 1, '0', 0, 0, NULL),
(94, 'madhusmita ', 'madhu', '1427367733avtimg-01.jpg', NULL, 'maas_madhu123@gmail.com', NULL, 'bWFkaHUxMjM=', '2015-03-26 16:32:13', 1, '0', 0, 0, '2015-12-16 18:59:38'),
(97, 'user7', 'user7', '../images/user-thumb1.png', NULL, 'user7@gmail.com', NULL, 'MTIzNDU2', '2015-03-26 17:57:30', 1, '0', 0, 0, '2015-03-31 11:53:06'),
(101, 'np', 'niharika         ', '1427701908avtimg-delightful-royal-blue-rani-pink-georgette-saree-216x291.jpg', NULL, 'niharika@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 11:49:20', 1, '0', 0, 0, '2015-04-29 16:08:15'),
(102, 'LorealL', 'Lorym', '1427439767avtimg-cookie-monster-fruit$$$$___fhfhf76767_______AAAgf.jpg', NULL, 'lory@gmail.com', NULL, 'MTIzNDU2Nw==', '2015-03-27 11:50:01', 1, '0', 0, 0, NULL),
(103, 'user6', 'user6', '1427441367avtimg-test_243.jpg', NULL, 'user6@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 11:56:49', 1, '0', 0, 0, '2015-03-31 13:00:11'),
(104, 'user5', 'user5', '1427437728avtimg-images.jpg', NULL, 'user5@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 11:58:48', 1, '0', 0, 0, NULL),
(105, 'user4', 'user4', '1427438638avtimg-Penguins.jpg', NULL, 'user4@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 12:13:58', 0, '0', 0, 0, NULL),
(108, 'user3', 'user3', '../images/user-thumb1.png', NULL, 'user3@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 12:20:48', 1, '0', 0, 0, NULL),
(109, 'user2', 'user2', '../images/user-thumb1.png', NULL, 'user2@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 12:22:10', 1, '0', 0, 0, NULL),
(110, 'maas', 'mausumi', '1427891094avtimg-mimipunk-tux-cartoon-1820.png', NULL, 'mausumipp@gmail.com', NULL, 'MTIzNA==', '2015-03-27 12:44:15', 1, '0', 0, 0, '2015-04-01 18:04:02'),
(111, '1', 'nokia', '../images/user-thumb1.png', NULL, '1@1.com', NULL, 'MQ==', '2015-03-27 15:35:20', 1, '0', 0, 0, '2015-04-07 12:44:54'),
(112, '2', 'Deb', '../images/user-thumb1.png', NULL, '2@2.com', NULL, 'Mg==', '2015-03-27 15:35:32', 1, '0', 0, 1, '2015-12-21 16:13:43'),
(113, 'mausumi', 'mausi', '../images/user-thumb1.png', NULL, '3@3.com', NULL, 'MTIzNDU=', '2015-03-27 15:35:53', 1, '0', 0, 0, '2015-12-21 16:13:55'),
(114, 'Narnia', 'Narnia', '1427892018avtimg-Test_577.jpg', NULL, 'narnia@gmail.com', NULL, 'MTIzNDU2', '2015-04-01 18:10:18', 1, '0', 0, 0, '2015-04-01 18:11:11'),
(116, 'Mausumi', 'Mausumi', '1427892135avtimg-mimipunk-tux-cartoon-1820.png', NULL, 'mausumii@gmail.com', NULL, 'MTIz', '2015-04-01 18:12:15', 1, '0', 0, 0, '2015-12-16 18:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `temp_file`
--

CREATE TABLE IF NOT EXISTS `temp_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `filepath` text NOT NULL,
  `file_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data for table `temp_file`
--

INSERT INTO `temp_file` (`id`, `userid`, `filepath`, `file_url`) VALUES
(124, '71', '1421755473-11572720(3).GIF', 't_file/1421755473-11572720(3).GIF'),
(125, '71', '1421755473-11572720(2).GIF', 't_file/1421755473-11572720(2).GIF'),
(126, '71', '1421755473-11572720(1).GIF', 't_file/1421755473-11572720(1).GIF'),
(127, '71', '1421755473-11572720.GIF', 't_file/1421755473-11572720.GIF'),
(128, '71', '1421755569-18269720(2).GIF', 't_file/1421755569-18269720(2).GIF'),
(129, '71', '1421755569-18269720(1).GIF', 't_file/1421755569-18269720(1).GIF'),
(130, '71', '1421755569-18269720.GIF', 't_file/1421755569-18269720.GIF'),
(131, '61', '1421756976-24155key.txt', 't_file/1421756976-24155key.txt'),
(132, '71', '1424408059-9874stpeping1.jpg', 't_file/1424408059-9874stpeping1.jpg'),
(133, '71', '1424426859-50251391059575_56575.jpg', 't_file/1424426859-50251391059575_56575.jpg'),
(134, '71', '1424438401-24017Koala.jpg', 't_file/1424438401-24017Koala.jpg'),
(135, '71', '1427086630-26212stpeping1.jpg', 't_file/1427086630-26212stpeping1.jpg'),
(136, '84', '1427086731-16589Ideal_Rooms_HMO_CRM.pdf', 't_file/1427086731-16589Ideal_Rooms_HMO_CRM.pdf'),
(137, '71', '1427209172-28311dasd.jpg', 't_file/1427209172-28311dasd.jpg'),
(138, '88', '1427285743-20932212f262d85035f8db47c317cc6ee36b6_ft_xl.jpg', 't_file/1427285743-20932212f262d85035f8db47c317cc6ee36b6_ft_xl.jpg'),
(139, '88', '1427285783-14509TESTING_BOOKS_2.pdf', 't_file/1427285783-14509TESTING_BOOKS_2.pdf'),
(140, '71', '1427288927-30964octa_soft_portrait.jpg', 't_file/1427288927-30964octa_soft_portrait.jpg'),
(141, '71', '1427289467-1350701.jpg', 't_file/1427289467-1350701.jpg'),
(142, '71', '1427289492-2077Ideal_Rooms_HMO_CRM.pdf', 't_file/1427289492-2077Ideal_Rooms_HMO_CRM.pdf'),
(143, '87', '1427292791-18198FaultReporting.docx', 't_file/1427292791-18198FaultReporting.docx'),
(144, '71', '1427437478-621291800704_1.jpg', 't_file/1427437478-621291800704_1.jpg'),
(145, '71', '1427437497-31724Document_for_testing_1.docx', 't_file/1427437497-31724Document_for_testing_1.docx'),
(146, '71', '1427437523-23477CSV_Test.csv', 't_file/1427437523-23477CSV_Test.csv'),
(147, '71', '1427437537-25162Document_for_testing.pdf', 't_file/1427437537-25162Document_for_testing.pdf'),
(148, '102', '1427437942-5563Document_for_testing_1.docx', 't_file/1427437942-5563Document_for_testing_1.docx'),
(149, '102', '1427438556-6013icon5.png', 't_file/1427438556-6013icon5.png'),
(150, '101', '1427438934-1988503-VS3.jpg', 't_file/1427438934-1988503-VS3.jpg'),
(151, '103', '1427442192-326401291800996_guzaarish02(www.songs.pk).mp3', 't_file/1427442192-326401291800996_guzaarish02(www.songs.pk).mp3'),
(152, '103', '1427442274-300591291859988_Amazing_Dance-So_Romantic.mp4', 't_file/1427442274-300591291859988_Amazing_Dance-So_Romantic.mp4'),
(153, '91', '1427450238-12691Tulips.jpg', 't_file/1427450238-12691Tulips.jpg'),
(154, '91', '1427450271-5584cxzccxzc.txt', 't_file/1427450271-5584cxzccxzc.txt'),
(155, '110', '1427450319-25086Boost-Web-Traffic-50.jpg', 't_file/1427450319-25086Boost-Web-Traffic-50.jpg'),
(156, '110', '1427450332-19807Document_for_testing_1.docx', 't_file/1427450332-19807Document_for_testing_1.docx'),
(157, '110', '1427450347-5036Document_for_testing.pdf', 't_file/1427450347-5036Document_for_testing.pdf'),
(158, '101', '1427450367-31708alluring-hot-pink-stones-studded-georgette-saree.jpg', 't_file/1427450367-31708alluring-hot-pink-stones-studded-georgette-saree.jpg'),
(159, '110', '1427450385-8202Test_Account.txt', 't_file/1427450385-8202Test_Account.txt'),
(160, '110', '1427453629-18632503-VS3.jpg', 't_file/1427453629-18632503-VS3.jpg'),
(161, '71', '1427696362-1932octa_soft_portrait.jpg', 't_file/1427696362-1932octa_soft_portrait.jpg'),
(162, '71', '1427696396-23367booking_confirmation.php', 't_file/1427696396-23367booking_confirmation.php'),
(163, '104', '1427707994-30484Document_for_testing_1.docx', 't_file/1427707994-30484Document_for_testing_1.docx'),
(164, '71', '1427711977-22493Desert.jpg', 't_file/1427711977-22493Desert.jpg'),
(165, '101', '1427782335-8493alluring-hot-pink-stones-studded-georgette-saree.jpg', 't_file/1427782335-8493alluring-hot-pink-stones-studded-georgette-saree.jpg'),
(166, '113', '1450272336-291001449063262_53004b3045451.jpg', 't_file/1450272336-291001449063262_53004b3045451.jpg'),
(167, '116', '1450273268-211851449063262_53004b3045451.jpg', 't_file/1450273268-211851449063262_53004b3045451.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

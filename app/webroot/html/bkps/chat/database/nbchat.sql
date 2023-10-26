-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 06:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

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
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
`cid` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `chat_message` text,
  `read_status` tinyint(1) NOT NULL COMMENT '0 = No, 1 = Yes',
  `is_attachment` smallint(1) DEFAULT '0' COMMENT '0=No, 1=Yes',
  `attachment_path` text,
  `clear_by_from` int(11) NOT NULL DEFAULT '0',
  `clear_by_to` int(11) NOT NULL,
  `chat_date` datetime DEFAULT NULL,
  `clear_status` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`cid`, `from_id`, `to_id`, `chat_message`, `read_status`, `is_attachment`, `attachment_path`, `clear_by_from`, `clear_by_to`, `chat_date`, `clear_status`) VALUES
(1, 87, 71, 'hio', 1, 0, NULL, 87, 0, '2015-04-30 10:28:50', '1'),
(2, 71, 87, 'hlo<div><br></div>', 1, 0, NULL, 87, 0, '2015-04-30 10:29:03', '1'),
(3, 71, 87, '', 1, 0, NULL, 87, 0, '2015-04-30 10:29:04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chat_status`
--

CREATE TABLE IF NOT EXISTS `chat_status` (
`sid` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_type` int(11) DEFAULT '0' COMMENT '0=Online,1=Idele,2=Offline',
  `status_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_users`
--

CREATE TABLE IF NOT EXISTS `master_users` (
`user_id` int(11) NOT NULL,
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
  `last_login_time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_users`
--

INSERT INTO `master_users` (`user_id`, `full_name`, `chat_name`, `avatar_image`, `tag_line`, `mail_id`, `mo_number`, `pass`, `created`, `is_active`, `is_online`, `is_admin`, `is_conv`, `last_login_time`) VALUES
(71, 'admin1234', 'admin1234', '1427184607avtimg-fsdf.jpg', 'Superadmin', 'admin@log.in', '999999999111', 'YWRtaW4xMjM=', '2015-01-14 20:16:22', 1, '0', 1, 1, '2015-04-30 10:28:28'),
(84, 'mmi', 'mmi', '../images/user-thumb1.png', 'mmi', 'mmi@gmail.com', NULL, 'MTIz', '2015-02-20 12:48:33', 1, '0', 0, 1, '2015-04-29 12:31:25'),
(87, 'Santosh Manik123', 'maniksanto', '1427188688avtimg-1416565649_image1_adam-thomson.png', 'Manik Smart Boy', 'maas_santosh@yahoo.in', '43534543', 'bWFuaWs=', '2015-03-24 14:43:54', 1, '0', 0, 0, '2015-04-30 10:28:44'),
(90, 'ashis', 'mr ashis123', '../images/user-thumb1.png', NULL, 'ashis_maas@yahoo.in', NULL, 'YXNoaXMxMjM=', '2015-03-25 20:12:22', 1, '0', 0, 0, NULL),
(91, 'Debasish', 'deb', '../images/user-thumb1.png', 'm cool', 'deb882003@gmail.com', NULL, 'MTExMQ==', '2015-03-26 10:46:59', 1, '0', 0, 1, '2015-03-31 15:04:50'),
(92, 'Priya ranjan Jena', 'Priya', '../images/user-thumb1.png', NULL, 'priya_maas@gmial.com', NULL, 'cHJpeWExMjM=', '2015-03-26 15:51:10', 1, '0', 0, 0, NULL),
(93, 'Bikas das', 'biku', '1427367666avtimg-Hydrangeas.jpg', NULL, 'maas_biku@gmail.com', NULL, 'YmlrdTEyMw==', '2015-03-26 16:31:06', 1, '0', 0, 0, NULL),
(94, 'madhusmita ', 'madhu', '1427367733avtimg-01.jpg', NULL, 'maas_madhu123@gmail.com', NULL, 'bWFkaHUxMjM=', '2015-03-26 16:32:13', 1, '0', 0, 0, NULL),
(97, 'user7', 'user7', '../images/user-thumb1.png', NULL, 'user7@gmail.com', NULL, 'MTIzNDU2', '2015-03-26 17:57:30', 1, '0', 0, 1, '2015-03-31 11:53:06'),
(101, 'np', 'niharika         ', '1427701908avtimg-delightful-royal-blue-rani-pink-georgette-saree-216x291.jpg', NULL, 'niharika@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 11:49:20', 1, '0', 0, 0, '2015-04-29 16:08:15'),
(102, 'LorealL', 'Lorym', '1427439767avtimg-cookie-monster-fruit$$$$___fhfhf76767_______AAAgf.jpg', NULL, 'lory@gmail.com', NULL, 'MTIzNDU2Nw==', '2015-03-27 11:50:01', 1, '0', 0, 0, NULL),
(103, 'user6', 'user6', '1427441367avtimg-test_243.jpg', NULL, 'user6@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 11:56:49', 1, '0', 0, 1, '2015-03-31 13:00:11'),
(104, 'user5', 'user5', '1427437728avtimg-images.jpg', NULL, 'user5@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 11:58:48', 1, '0', 0, 1, NULL),
(105, 'user4', 'user4', '1427438638avtimg-Penguins.jpg', NULL, 'user4@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 12:13:58', 0, '0', 0, 0, NULL),
(108, 'user3', 'user3', '../images/user-thumb1.png', NULL, 'user3@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 12:20:48', 1, '0', 0, 0, NULL),
(109, 'user2', 'user2', '../images/user-thumb1.png', NULL, 'user2@gmail.com', NULL, 'MTIzNDU2', '2015-03-27 12:22:10', 1, '0', 0, 0, NULL),
(110, 'maas', 'mausumi', '1427891094avtimg-mimipunk-tux-cartoon-1820.png', NULL, 'mausumipp@gmail.com', NULL, 'MTIzNA==', '2015-03-27 12:44:15', 1, '0', 0, 1, '2015-04-01 18:04:02'),
(111, '1', 'nokia', '../images/user-thumb1.png', NULL, '1@1.com', NULL, 'MQ==', '2015-03-27 15:35:20', 1, '0', 0, 0, '2015-04-07 12:44:54'),
(112, '2', 'Deb', '../images/user-thumb1.png', NULL, '2@2.com', NULL, 'Mg==', '2015-03-27 15:35:32', 1, '0', 0, 0, '2015-03-31 11:00:31'),
(113, 'mausumi', 'mausumi', '../images/user-thumb1.png', NULL, '3@3.com', NULL, 'MTIzNDU=', '2015-03-27 15:35:53', 1, '0', 0, 0, '2015-04-29 15:44:59'),
(114, 'Narnia', 'Narnia', '1427892018avtimg-Test_577.jpg', NULL, 'narnia@gmail.com', NULL, 'MTIzNDU2', '2015-04-01 18:10:18', 1, '0', 0, 0, '2015-04-01 18:11:11'),
(116, 'Mausumi', 'Mausumi', '1427892135avtimg-mimipunk-tux-cartoon-1820.png', NULL, 'mausumii@gmail.com', NULL, 'MTIz', '2015-04-01 18:12:15', 1, '0', 0, 0, '2015-04-16 18:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `temp_file`
--

CREATE TABLE IF NOT EXISTS `temp_file` (
`id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `filepath` text NOT NULL,
  `file_url` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

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
(165, '101', '1427782335-8493alluring-hot-pink-stones-studded-georgette-saree.jpg', 't_file/1427782335-8493alluring-hot-pink-stones-studded-georgette-saree.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `chat_status`
--
ALTER TABLE `chat_status`
 ADD PRIMARY KEY (`sid`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `master_users`
--
ALTER TABLE `master_users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_id` (`user_id`), ADD UNIQUE KEY `mail_id` (`mail_id`);

--
-- Indexes for table `temp_file`
--
ALTER TABLE `temp_file`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chat_status`
--
ALTER TABLE `chat_status`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_users`
--
ALTER TABLE `master_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `temp_file`
--
ALTER TABLE `temp_file`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=166;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_status`
--
ALTER TABLE `chat_status`
ADD CONSTRAINT `chat_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `master_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

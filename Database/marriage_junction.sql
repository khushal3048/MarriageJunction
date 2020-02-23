-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 02:38 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marriage_junction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_user_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_user_name`, `admin_password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `chat_user`
--

CREATE TABLE `chat_user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` char(64) NOT NULL,
  `password` char(255) NOT NULL,
  `image` char(128) DEFAULT NULL,
  `info` text,
  `roles` char(128) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_user`
--

INSERT INTO `chat_user` (`id`, `name`, `mail`, `password`, `image`, `info`, `roles`, `last_activity`) VALUES
(7, 'vishal patel', 'vishal@gmail.com', 'd47175b2b9d2a39180ee2b362429186c6edabefc', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(13, 'ravi gajera', 'ravigajera12@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(16, 'Dazzy Gupta', 'dazzy12gupta@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, NULL, 'OPERATOR', '2017-05-01 01:57:26'),
(17, 'Rinkal Patel', 'rinkal@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(18, 'dip lala', 'rinkeshchopada1222@gmail.com', 'f3cb23f95572b37250bce5547e5fbf5e6c105a60', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(19, 'krushita Gangani', 'kru@gmail.com', 'd6d9eab0366f69a4c53e2f9419e788ef28c3adbb', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(20, 'rinkal kunjadiya', 'rinkalk@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(21, 'Pari Patel', 'Pari@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00'),
(22, 'khush patel', 'khushal3048@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 'OPERATOR', '2017-05-01 03:36:26'),
(23, 'Arpit Patel', 'arpitpatel@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 'OPERATOR', '2017-04-30 02:46:00'),
(24, 'Keval Patel', 'keval1@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, NULL, 'OPERATOR', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

CREATE TABLE `membership_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(50) NOT NULL,
  `plan_display_name` varchar(50) NOT NULL,
  `plan_details` varchar(50) NOT NULL,
  `no_of_contacts` int(11) NOT NULL,
  `plan_duration` int(11) NOT NULL,
  `plan_amount` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`plan_id`, `plan_name`, `plan_display_name`, `plan_details`, `no_of_contacts`, `plan_duration`, `plan_amount`, `status`) VALUES
(3, '3 month', 'golden', 'for new user', 2225, 225, 800, 'block'),
(4, '4 month', 'silver', 'for new user', 254, 452, 256, 'block'),
(7, 'sdf', 'golden', 'sfd', 215, 215, 121, 'active'),
(8, 'rin', 'golden', 'for popular user', 225, 125, 700, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `send_proposal`
--

CREATE TABLE `send_proposal` (
  `proposal_id` int(11) NOT NULL,
  `to_profile_id` int(11) NOT NULL,
  `from_profile_id` int(11) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_basic_infor`
--

CREATE TABLE `user_basic_infor` (
  `profile_id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `no_of_child` varchar(50) NOT NULL,
  `community` varchar(50) NOT NULL,
  `sub-community` varchar(50) NOT NULL,
  `regional_site` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_basic_infor`
--

INSERT INTO `user_basic_infor` (`profile_id`, `state`, `city`, `marital_status`, `no_of_child`, `community`, `sub-community`, `regional_site`) VALUES
(68, '2', '2', 'Devorced', '2', '1', '1', 'shaadi.com'),
(69, '1', '1', 'Devorced', '3', '1', '1', 'gujaratishaadi.com'),
(70, '2', '2', 'Widowed', '2', '2', '3', 'shaadi.com'),
(71, '2', '2', 'Devorced', '3', '2', '3', 'jivansaathi.com'),
(72, '1', '1', 'Never Married', 'undefined', '1', '1', 'Gujaratishaadi.com'),
(87, '1', '1', 'Widowed', '0', '1', '1', 'shaadi.com'),
(91, '1', '1', 'Never Married', 'undefined', '1', '1', 'shaadi'),
(92, '2', '2', 'Never Married', 'undefined', '1', '1', 'happymarriage.com'),
(93, '1', '1', 'Annulled', '1', '1', '1', 'happymarriage.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_caste`
--

CREATE TABLE `user_caste` (
  `caste_id` int(11) NOT NULL,
  `caste_name` varchar(50) NOT NULL,
  `religion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_caste`
--

INSERT INTO `user_caste` (`caste_id`, `caste_name`, `religion_id`) VALUES
(1, 'Patel', 1),
(2, 'Jain', 2),
(3, 'Siya', 4),
(4, 'sttt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_chat_message`
--

CREATE TABLE `user_chat_message` (
  `id` bigint(20) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `talk_id` bigint(20) NOT NULL,
  `is_new` char(1) NOT NULL DEFAULT 'y',
  `from_user_info` text NOT NULL,
  `to_user_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_chat_message`
--

INSERT INTO `user_chat_message` (`id`, `from_id`, `to_id`, `body`, `datetime`, `talk_id`, `is_new`, `from_user_info`, `to_user_info`) VALUES
(1, 1, 1, 'hiiii', '2017-04-05 08:06:14', 1, 'n', '{"id":"1","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 10:06:14","7":"2017-04-05 10:06:14"}', '{"id":"1","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 10:06:14","7":"2017-04-05 10:06:14"}'),
(2, 1, 3, 'hiiiiiiiiii', '2017-04-05 08:40:00', 2, 'n', '{"id":"1","profile_id":"69","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 10:39:59","8":"2017-04-05 10:39:59"}', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 10:39:56","8":"2017-04-05 10:39:56"}'),
(3, 3, 3, 'helloooooooooooo', '2017-04-05 08:40:40', 3, 'n', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 10:40:36","8":"2017-04-05 10:40:36"}', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 10:40:36","8":"2017-04-05 10:40:36"}'),
(4, 3, 1, 'hiiiiii', '2017-04-05 08:41:17', 4, 'n', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 10:41:16","8":"2017-04-05 10:41:16"}', '{"id":"1","profile_id":"69","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 10:41:14","8":"2017-04-05 10:41:14"}'),
(5, 3, 1, ' =)  =) ', '2017-04-05 08:44:47', 5, 'n', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 10:44:46","8":"2017-04-05 10:44:46"}', '{"id":"1","profile_id":"69","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 10:44:44","8":"2017-04-05 10:44:44"}'),
(6, 1, 3, 'kk', '2017-04-05 08:45:10', 6, 'n', '{"id":"1","profile_id":"69","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 10:45:09","8":"2017-04-05 10:45:09"}', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 10:45:06","8":"2017-04-05 10:45:06"}'),
(7, 3, 3, 'bro', '2017-04-05 09:29:52', 7, 'n', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 11:29:50","8":"2017-04-05 11:29:50"}', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 11:29:50","8":"2017-04-05 11:29:50"}'),
(8, 3, 1, 'broo', '2017-04-05 09:30:14', 8, 'n', '{"id":"3","name":"akh","mail":"akh@gmail.com","roles":["OPERATOR"],"7":"OPERATOR","last_activity":"2017-04-05 11:30:10","8":"2017-04-05 11:30:10"}', '{"id":"1","profile_id":"69","name":"khush","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-05 11:30:13","8":"2017-04-05 11:30:13"}'),
(9, 3, 3, 'hiii', '2017-04-10 05:53:18', 9, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 07:53:15","7":"2017-04-10 07:53:15"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 07:53:15","7":"2017-04-10 07:53:15"}'),
(10, 3, 3, 'hii', '2017-04-10 06:33:53', 10, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:33:51","7":"2017-04-10 08:33:51"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:33:51","7":"2017-04-10 08:33:51"}'),
(11, 3, 3, 'hi', '2017-04-10 06:43:22', 11, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:43:17","7":"2017-04-10 08:43:17"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:43:17","7":"2017-04-10 08:43:17"}'),
(12, 3, 3, 'hi''', '2017-04-10 06:43:57', 12, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:43:52","7":"2017-04-10 08:43:52"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:43:52","7":"2017-04-10 08:43:52"}'),
(13, 3, 3, 'hhhiih', '2017-04-10 06:44:03', 13, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:44:02","7":"2017-04-10 08:44:02"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 08:44:02","7":"2017-04-10 08:44:02"}'),
(14, 10, 3, 'hiiiiiii', '2017-04-10 09:27:14', 14, 'n', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:27:11","7":"2017-04-10 11:27:11"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:27:10","7":"2017-04-10 11:27:10"}'),
(15, 3, 10, 'hello', '2017-04-10 09:27:26', 15, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:27:25","7":"2017-04-10 11:27:25"}', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:27:26","7":"2017-04-10 11:27:26"}'),
(16, 11, 11, 'hiiiiiiiii', '2017-04-10 09:53:22', 16, 'n', '{"id":"11","name":"piyush shukla","mail":"pankaj9898singh@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:53:21","7":"2017-04-10 11:53:21"}', '{"id":"11","name":"piyush shukla","mail":"pankaj9898singh@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:53:21","7":"2017-04-10 11:53:21"}'),
(17, 11, 11, 'bfbbfbyyf', '2017-04-10 09:53:37', 17, 'n', '{"id":"11","name":"piyush shukla","mail":"pankaj9898singh@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:53:36","7":"2017-04-10 11:53:36"}', '{"id":"11","name":"piyush shukla","mail":"pankaj9898singh@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-10 11:53:36","7":"2017-04-10 11:53:36"}'),
(18, 3, 3, 'hi', '2017-04-11 05:25:27', 18, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:25:26","7":"2017-04-11 07:25:26"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:25:26","7":"2017-04-11 07:25:26"}'),
(19, 10, 3, 'hello', '2017-04-11 05:31:02', 19, 'n', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:30:59","7":"2017-04-11 07:30:59"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:30:58","7":"2017-04-11 07:30:58"}'),
(20, 10, 3, 'i wanna talk wid u', '2017-04-11 05:31:12', 20, 'n', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:31:09","7":"2017-04-11 07:31:09"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:31:07","7":"2017-04-11 07:31:07"}'),
(21, 3, 10, 'hello', '2017-04-11 05:31:25', 21, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:31:22","7":"2017-04-11 07:31:22"}', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:31:24","7":"2017-04-11 07:31:24"}'),
(22, 3, 10, ':)', '2017-04-11 05:33:27', 22, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:33:27","7":"2017-04-11 07:33:27"}', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-11 07:33:24","7":"2017-04-11 07:33:24"}'),
(23, 3, 3, 'hiiiiiiii', '2017-04-13 06:42:48', 23, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-13 08:42:44","7":"2017-04-13 08:42:44"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-13 08:42:44","7":"2017-04-13 08:42:44"}'),
(24, 3, 3, ' :D ', '2017-04-13 06:43:04', 24, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-13 08:43:04","7":"2017-04-13 08:43:04"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-13 08:43:04","7":"2017-04-13 08:43:04"}'),
(25, 10, 3, 'hiiii', '2017-04-13 08:50:11', 25, 'n', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-13 10:50:07","7":"2017-04-13 10:50:07"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-13 10:50:06","7":"2017-04-13 10:50:06"}'),
(26, 3, 3, 'hiiii', '2017-04-17 23:27:52', 26, 'n', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-18 01:27:50","7":"2017-04-18 01:27:50"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-18 01:27:50","7":"2017-04-18 01:27:50"}'),
(27, 3, 10, 'hii', '2017-04-18 08:25:11', 27, 'y', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-18 10:25:09","7":"2017-04-18 10:25:09"}', '{"id":"10","name":"vipul  patel","mail":"Vipul@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-18 10:25:10","7":"2017-04-18 10:25:10"}'),
(28, 3, 3, 'hiiii', '2017-04-20 07:43:54', 28, 'y', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-20 09:43:53","7":"2017-04-20 09:43:53"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-20 09:43:53","7":"2017-04-20 09:43:53"}'),
(29, 3, 3, 'hellloooo', '2017-04-20 07:43:57', 29, 'y', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-20 09:43:53","7":"2017-04-20 09:43:53"}', '{"id":"3","name":"khushal","mail":"khush@gmail.com","roles":["OPERATOR"],"last_activity":"2017-04-20 09:43:53","7":"2017-04-20 09:43:53"}'),
(30, 16, 22, 'hiiiiii', '2017-05-01 05:26:52', 30, 'n', '{"id":"16","name":"Dazzy Gupta","mail":"dazzy12gupta@gmail.com","roles":["OPERATOR"],"last_activity":"2017-05-01 07:26:51","7":"2017-05-01 07:26:51"}', '{"id":"22","name":"khush patel","mail":"khushal3048@gmail.com","roles":["OPERATOR"],"last_activity":"2017-05-01 07:26:52","7":"2017-05-01 07:26:52"}'),
(31, 22, 16, 'hiiii', '2017-05-01 05:27:09', 31, 'n', '{"id":"22","name":"khush patel","mail":"khushal3048@gmail.com","roles":["OPERATOR"],"last_activity":"2017-05-01 07:27:07","7":"2017-05-01 07:27:07"}', '{"id":"16","name":"Dazzy Gupta","mail":"dazzy12gupta@gmail.com","roles":["OPERATOR"],"last_activity":"2017-05-01 07:27:06","7":"2017-05-01 07:27:06"}');

-- --------------------------------------------------------

--
-- Table structure for table `user_city`
--

CREATE TABLE `user_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_city`
--

INSERT INTO `user_city` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'surat', 1),
(2, 'Baroda', 2),
(3, 'kadodara', 3),
(4, 'Nunu', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_country`
--

CREATE TABLE `user_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_country`
--

INSERT INTO `user_country` (`country_id`, `country_name`) VALUES
(1, 'india'),
(2, 'U.S.'),
(3, 'U.K.'),
(4, 'Japan'),
(5, 'meci');

-- --------------------------------------------------------

--
-- Table structure for table `user_discription`
--

CREATE TABLE `user_discription` (
  `profile_id` int(11) NOT NULL,
  `about_user` text NOT NULL,
  `disability` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_discription`
--

INSERT INTO `user_discription` (`profile_id`, `about_user`, `disability`) VALUES
(68, 'helloooooooooooooooooooooooooooo', '0'),
(69, 'kdfgjjbgjbdihjbvbfb', '0'),
(70, 'heloooooooooooooooooooo\nhow r u_???', '0'),
(71, 'hellooooooooooooo\nthank u for visit my profile', '0'),
(72, 'hiiii thnks for visit my profile', '0'),
(87, 'helllo............................................', '0'),
(91, 'Hi, Thanks For visiting My profile', '0'),
(92, 'vsdbvjbsjvbj', '0'),
(93, 'Hi,thnks', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_education_info`
--

CREATE TABLE `user_education_info` (
  `profile_id` int(11) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `education_field` varchar(50) NOT NULL,
  `employee_in` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `annual_income` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_education_info`
--

INSERT INTO `user_education_info` (`profile_id`, `education_level`, `education_field`, `employee_in`, `post`, `annual_income`) VALUES
(68, 'Diploma', 'Fashion Design', 'Government / Public Sector', 'Journalist', 'INR 10 Lakh to 15 Lakh'),
(69, 'Undergraduate', 'Arts', 'Not Working', 'Finance Professional', 'INR 7 Lakh to 10 Lakh'),
(70, 'Honours Degree', 'Commerces', 'Business / Self Employed', 'Public Relations Professional', 'INR 4 Lakh to 7 Lakh'),
(71, 'Undergraduate', 'Advertising/Marketing', 'Not Working', 'Company Secretary', 'INR 1 Lakh to 2 Lakh'),
(72, 'Diploma', 'Nursing', 'Government / Public Sector', 'Horticulturist', 'Upto INR 1 Lakh'),
(87, 'Bachelors', 'Administrative servies', 'Government / Public Sector', 'Event Manager', 'INR 50 Lakh to 75 Lakh'),
(91, 'Master', 'Advertising/Marketing', 'Private Company', 'Not working', 'Upto INR 1 Lakh'),
(92, 'Bachelors', 'Administrative servies', 'Private Company', 'Not working', 'Upto INR 1 Lakh'),
(93, 'Bechlar', 'Advertising/Marketing', 'Private Company', 'Not working', 'INR 1 Lakh to 2 Lakh');

-- --------------------------------------------------------

--
-- Table structure for table `user_family_detail`
--

CREATE TABLE `user_family_detail` (
  `profile_id` int(11) NOT NULL,
  `father_status` varchar(50) NOT NULL,
  `mother_status` varchar(50) NOT NULL,
  `no_of_brothers` int(11) NOT NULL,
  `no_of_merried_brother` int(11) NOT NULL,
  `no_of_sister` int(11) NOT NULL,
  `no_of_merried_sister` int(11) NOT NULL,
  `affluence_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_family_detail`
--

INSERT INTO `user_family_detail` (`profile_id`, `father_status`, `mother_status`, `no_of_brothers`, `no_of_merried_brother`, `no_of_sister`, `no_of_merried_sister`, `affluence_level`) VALUES
(68, 'Employed', 'Homemaker', 2, 0, 0, 0, 'Middle Class'),
(69, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class'),
(70, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class'),
(71, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class'),
(72, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class'),
(87, 'Employed', 'Homemaker', 1, 0, 0, 0, 'Middle Class'),
(91, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class'),
(92, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class'),
(93, 'Employed', 'Homemaker', 0, 0, 0, 0, 'Middle Class');

-- --------------------------------------------------------

--
-- Table structure for table `user_lifestyle`
--

CREATE TABLE `user_lifestyle` (
  `profile_id` int(11) NOT NULL,
  `diet` varchar(50) NOT NULL,
  `smoke` varchar(10) NOT NULL,
  `drink` varchar(11) NOT NULL,
  `height` varchar(50) NOT NULL,
  `body_type` varchar(11) NOT NULL,
  `body_tone` varchar(11) NOT NULL,
  `mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_lifestyle`
--

INSERT INTO `user_lifestyle` (`profile_id`, `diet`, `smoke`, `drink`, `height`, `body_type`, `body_tone`, `mobile`) VALUES
(68, 'Occasionally Non-Veg', 'no', 'no', '6ft - 182cm', 'Slim', 'very_fair', 7567971707),
(69, 'Eggetarian', 'no', 'no', '5ft 6in - 167cm', 'Slim', 'very_fair', 8238508200),
(70, 'Non-Veg', 'no', 'no', '5ft 11in - 180cm', 'Slim', 'very_fair', 9924491266),
(71, 'Eggetarian', 'no', 'no', '4ft 5in - 134cm', 'Slim', 'very_fair', 8690187086),
(72, 'Veg', 'no', 'no', '5ft 3in - 160cm', 'Slim', 'very_fair', 9924491266),
(87, 'Veg', 'no', 'no', '5ft 5in - 165cm', 'Slim', 'very_fair', 9924491266),
(91, 'Veg', 'no', 'no', '4ft 5in - 134cm', 'Slim', 'very_fair', 9924491266),
(92, 'Veg', 'no', 'no', '4ft 5in - 134cm', 'Slim', 'very_fair', 8690187086),
(93, 'Veg', 'no', 'no', '4ft 5in - 134cm', 'Slim', 'very_fair', 9924491266);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `profile_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `create_profile_for` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `mother_tongue` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `tmp_password` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`profile_id`, `user_name`, `user_password`, `create_profile_for`, `gender`, `name`, `date_of_birth`, `religion`, `mother_tongue`, `country`, `tmp_password`, `status`, `date`) VALUES
(68, 'raju@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Brother', 'Male', 'Raju narola', '1966-7-21', '1', 'Gujarati', '2', 'NULL', 'active', '2017-04-11 06:20:15'),
(69, 'dazzy12gupta@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Sister', 'Female', 'Ramila patil', '1980-10-11', '1', 'Gujarati', '1', 'RftowiGqhX', 'active', '2017-04-11 06:20:15'),
(70, 'keval@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Sister', 'Male', 'Keval patel', '1972-11-18', '2', 'Gujarati', '2', 'NULL', 'active', '2017-04-11 06:20:15'),
(71, 'ravi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Self', 'Male', 'Ravi patel', '1966-9-31', '2', 'Marathi', '2', NULL, 'block', '2017-04-11 06:20:15'),
(72, 'riya12savaliya@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Self', 'Female', 'Riya Savaliya', '1977-9-16', '1', 'English', '1', 'NULL', 'active', '2017-04-11 06:20:15'),
(78, 'khush@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Self', 'Male', 'khush Kakadiya', '1996-2-3', '1', 'Gujarati', '1', 'NULL', 'block', '2017-04-11 06:20:15'),
(87, 'rinkeshchopada1222@gmail.com', '74b87337454200d4d33f80c4663dc5e5', 'Self', 'Male', 'Rin Chopada', '1982-1-13', '1', 'Hindi', '1', NULL, 'active', '2017-04-18 07:13:41'),
(91, 'khushal3048@gmail.com', '202cb962ac59075b964b07152d234b70', 'Self', 'Male', 'Khush patel', '1996-1-1', '1', 'Gujarati', '1', NULL, 'active', '2017-04-20 06:52:42'),
(92, 'arpitpatel@gmail.com', '202cb962ac59075b964b07152d234b70', 'Self', 'Male', 'Arpit Patel', '1990-11-13', '1', 'English', '2', NULL, 'active', '2017-04-30 03:53:13'),
(93, 'keval1@gmail.com', '202cb962ac59075b964b07152d234b70', 'Self', 'Male', 'Keval Patel', '1996-1-1', '1', 'Gujarati', '1', NULL, 'active', '2017-05-01 05:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_religion`
--

CREATE TABLE `user_religion` (
  `religion_id` int(11) NOT NULL,
  `religion_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_religion`
--

INSERT INTO `user_religion` (`religion_id`, `religion_name`) VALUES
(1, 'Hindu'),
(2, 'Sikh'),
(3, 'Jain'),
(4, 'Muslim'),
(5, 'ghhh');

-- --------------------------------------------------------

--
-- Table structure for table `user_state`
--

CREATE TABLE `user_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_state`
--

INSERT INTO `user_state` (`state_id`, `state_name`, `country_id`) VALUES
(1, 'gujarat', 1),
(2, 'L.A.', 2),
(3, 'M.P.', 1),
(4, 'U.P.', 1),
(5, 'New Jursy', 2),
(6, 'LasVegas', 2),
(7, 'Chimono', 4),
(8, 'vvv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_caste`
--

CREATE TABLE `user_sub_caste` (
  `sub_caste_id` int(11) NOT NULL,
  `sub_caste_name` varchar(50) NOT NULL,
  `caste_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_caste`
--

INSERT INTO `user_sub_caste` (`sub_caste_id`, `sub_caste_name`, `caste_id`) VALUES
(1, 'Leva', 1),
(2, 'Kadva', 1),
(3, 'Siya-1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_upload`
--

CREATE TABLE `user_upload` (
  `upload_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `upload_type` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_upload`
--

INSERT INTO `user_upload` (`upload_id`, `profile_id`, `upload_type`, `file_name`) VALUES
(3, 68, 0, 'a3.jpg'),
(4, 69, 0, 'p2.jpg'),
(5, 70, 0, 'a5.jpg'),
(6, 71, 0, 'a7.jpg'),
(8, 72, 0, 'a2.jpg'),
(10, 78, 0, 'IMG-20170222-WA00051.jpg'),
(12, 87, 0, 'download5.jpg'),
(14, 91, 0, 'download.jpg'),
(16, 92, 0, 'images4.jpg'),
(17, 93, 0, 'IMG-20170222-WA0005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitor_id`, `ip_address`, `os`, `browser`, `date`, `time`, `country`, `state`, `city`, `zipcode`, `latitude`, `longitude`) VALUES
(5, '139.5.20.92', 'Windows 10', 'Chrome', '2017-03-07', '11:56:39', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(6, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-08', '10:14:46', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(7, '139.5.20.92', 'Windows 10', 'Chrome', '2017-03-09', '06:33:35', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(8, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-10', '07:52:35', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(9, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-10', '07:52:36', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(10, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-11', '07:23:40', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(11, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-12', '06:58:24', '', '', '', 0, '', ''),
(12, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-13', '08:36:26', '', '', '', 0, '', ''),
(13, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-14', '06:02:55', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(15, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-17', '13:52:17', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(16, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-18', '01:09:47', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(17, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-19', '06:45:51', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(18, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-20', '06:55:25', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(19, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-21', '10:51:11', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(20, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-22', '18:44:13', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(21, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-25', '18:13:02', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(22, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-26', '06:25:01', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333'),
(23, '139.5.20.92', 'Windows 10', 'Chrome', '2017-04-30', '05:40:26', 'India', 'Gujarat', 'Surat', 395005, '21.1667', '72.8333');

-- --------------------------------------------------------

--
-- Table structure for table `who_view_profile`
--

CREATE TABLE `who_view_profile` (
  `profile_id` int(11) NOT NULL,
  `who_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `who_view_profile`
--

INSERT INTO `who_view_profile` (`profile_id`, `who_view`) VALUES
(69, 60),
(69, 68),
(69, 70),
(68, 69),
(69, 71),
(70, 69),
(71, 69),
(68, 60),
(68, 72),
(70, 72),
(71, 72),
(72, 60),
(69, 87),
(69, 69),
(87, 69),
(91, 69),
(91, 92),
(69, 93);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_user_name`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_plan`
--
ALTER TABLE `membership_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `send_proposal`
--
ALTER TABLE `send_proposal`
  ADD PRIMARY KEY (`proposal_id`),
  ADD KEY `from_profile_id` (`from_profile_id`);

--
-- Indexes for table `user_basic_infor`
--
ALTER TABLE `user_basic_infor`
  ADD KEY `Index` (`profile_id`);

--
-- Indexes for table `user_caste`
--
ALTER TABLE `user_caste`
  ADD PRIMARY KEY (`caste_id`),
  ADD KEY `INDEX` (`religion_id`);

--
-- Indexes for table `user_chat_message`
--
ALTER TABLE `user_chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_city`
--
ALTER TABLE `user_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `user_country`
--
ALTER TABLE `user_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `user_discription`
--
ALTER TABLE `user_discription`
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_education_info`
--
ALTER TABLE `user_education_info`
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_family_detail`
--
ALTER TABLE `user_family_detail`
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_lifestyle`
--
ALTER TABLE `user_lifestyle`
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `user_religion`
--
ALTER TABLE `user_religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `user_state`
--
ALTER TABLE `user_state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `user_sub_caste`
--
ALTER TABLE `user_sub_caste`
  ADD PRIMARY KEY (`sub_caste_id`),
  ADD KEY `INDEX` (`caste_id`);

--
-- Indexes for table `user_upload`
--
ALTER TABLE `user_upload`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `Index` (`profile_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- Indexes for table `who_view_profile`
--
ALTER TABLE `who_view_profile`
  ADD KEY `Index` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `membership_plan`
--
ALTER TABLE `membership_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `send_proposal`
--
ALTER TABLE `send_proposal`
  MODIFY `proposal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_caste`
--
ALTER TABLE `user_caste`
  MODIFY `caste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_chat_message`
--
ALTER TABLE `user_chat_message`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_city`
--
ALTER TABLE `user_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_country`
--
ALTER TABLE `user_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `user_religion`
--
ALTER TABLE `user_religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_state`
--
ALTER TABLE `user_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_sub_caste`
--
ALTER TABLE `user_sub_caste`
  MODIFY `sub_caste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_upload`
--
ALTER TABLE `user_upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `send_proposal`
--
ALTER TABLE `send_proposal`
  ADD CONSTRAINT `fk_profile_id` FOREIGN KEY (`from_profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_basic_infor`
--
ALTER TABLE `user_basic_infor`
  ADD CONSTRAINT `fk_user_basic` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_caste`
--
ALTER TABLE `user_caste`
  ADD CONSTRAINT `fk_caste` FOREIGN KEY (`religion_id`) REFERENCES `user_religion` (`religion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_city`
--
ALTER TABLE `user_city`
  ADD CONSTRAINT `fk_city_id` FOREIGN KEY (`state_id`) REFERENCES `user_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_discription`
--
ALTER TABLE `user_discription`
  ADD CONSTRAINT `fk_user_desc` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_education_info`
--
ALTER TABLE `user_education_info`
  ADD CONSTRAINT `fk_user_edu` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_family_detail`
--
ALTER TABLE `user_family_detail`
  ADD CONSTRAINT `fk_family_detail` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_lifestyle`
--
ALTER TABLE `user_lifestyle`
  ADD CONSTRAINT `fk_user_lifestyle` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_state`
--
ALTER TABLE `user_state`
  ADD CONSTRAINT `fk_state_id` FOREIGN KEY (`country_id`) REFERENCES `user_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_caste`
--
ALTER TABLE `user_sub_caste`
  ADD CONSTRAINT `fk_sub_caste` FOREIGN KEY (`caste_id`) REFERENCES `user_caste` (`caste_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_upload`
--
ALTER TABLE `user_upload`
  ADD CONSTRAINT `fk_upload` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `who_view_profile`
--
ALTER TABLE `who_view_profile`
  ADD CONSTRAINT `fk_who` FOREIGN KEY (`profile_id`) REFERENCES `user_registration` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

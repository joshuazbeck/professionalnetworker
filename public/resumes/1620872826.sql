-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 09:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cst256temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `affinity_groups`
--

DROP TABLE IF EXISTS `affinity_groups`;
CREATE TABLE IF NOT EXISTS `affinity_groups` (
  `AFFINITY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GROUP_NAME` varchar(100) NOT NULL,
  `GROUP_DESC` varchar(100) NOT NULL,
  PRIMARY KEY (`AFFINITY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `affinity_group_members`
--

DROP TABLE IF EXISTS `affinity_group_members`;
CREATE TABLE IF NOT EXISTS `affinity_group_members` (
  `AFFINITY_GRP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AFFINITY_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`AFFINITY_GRP_ID`),
  KEY `affinity_group_members_ibfk_1` (`AFFINITY_ID`),
  KEY `affinity_group_members_ibfk_2` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_history`
--

DROP TABLE IF EXISTS `education_history`;
CREATE TABLE IF NOT EXISTS `education_history` (
  `EDU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `SCHOOL_NAME` varchar(200) NOT NULL,
  `FIELD_STUDY` varchar(100) NOT NULL,
  `DATE_GRAD` date NOT NULL,
  `DEGREE` varchar(20) NOT NULL,
  PRIMARY KEY (`EDU_ID`),
  KEY `education_history_ibfk_1` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `JOB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `COMPANY` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `STATE` varchar(100) NOT NULL,
  `PAY` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DESIRED_SKILL` varchar(100) NOT NULL,
  PRIMARY KEY (`JOB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

DROP TABLE IF EXISTS `job_history`;
CREATE TABLE IF NOT EXISTS `job_history` (
  `JOB_HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JOB_TITLE` varchar(50) NOT NULL,
  `COMPANY_NAME` varchar(50) NOT NULL,
  `JOB_DESC` text NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_STOP` date DEFAULT NULL,
  `FK_USERID` int(11) NOT NULL,
  PRIMARY KEY (`JOB_HISTORY_ID`),
  KEY `job_history_ibfk_1` (`FK_USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `PROFILE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `AGE` int(11) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `STATE` varchar(2) NOT NULL,
  `PHOTO_FILENAME` varchar(50) NOT NULL DEFAULT 'nophoto.jpg',
  `BIO` longtext NOT NULL,
  `IS_MALE` tinyint(4) NOT NULL,
  `OCCUPATION` varchar(100) NOT NULL,
  PRIMARY KEY (`PROFILE_ID`),
  KEY `profiles_ibfk_1` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`PROFILE_ID`, `USER_ID`, `PHONE`, `AGE`, `CITY`, `STATE`, `PHOTO_FILENAME`, `BIO`, `IS_MALE`, `OCCUPATION`) VALUES
(13, 9, '111-222-3578', 31, 'West Liberty City', 'Or', 'nophoto.jpg', 'This is a bio for the GCU administrator account that has been updated.', 1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ROLE_ID`, `ROLE_NAME`) VALUES
(1, 'CUSTOMER'),
(2, 'BUSINESS'),
(3, 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `SKILL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKILL_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`SKILL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`SKILL_ID`, `SKILL_NAME`) VALUES
(1, 'Programming'),
(2, 'Excel'),
(3, 'Word'),
(4, 'Access'),
(5, 'Team Management'),
(6, 'Ninja Skills'),
(7, 'C# Programming'),
(8, 'Front-end Development'),
(9, 'Back-end Development'),
(10, 'Logistics'),
(11, 'Big Data Analysis'),
(12, 'JavaScript'),
(13, 'Mechanical Engineering'),
(14, 'Civil Engineering'),
(15, 'Electrical Engineering'),
(16, 'Java'),
(17, 'BootStrap'),
(18, 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `ROLE_ID` int(11) NOT NULL DEFAULT '1',
  `SUSPENDED` tinyint(1) NOT NULL DEFAULT '0',
  `PROFILE_COMPLETE` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`USER_ID`),
  KEY `ROLE_ID` (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `ROLE_ID`, `SUSPENDED`, `PROFILE_COMPLETE`) VALUES
(9, 'GCU', 'Admin', 'gcuadmin@gcu.edu', '$2y$10$Q6a1eCEPhPRnZP0MxlFrXe39fCL6W/vAutdLHJJ5lE6qLjYisgLdq', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_skill`
--

DROP TABLE IF EXISTS `user_skill`;
CREATE TABLE IF NOT EXISTS `user_skill` (
  `USER_SKILL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SKILL_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  PRIMARY KEY (`USER_SKILL_ID`),
  KEY `SKILL_ID` (`SKILL_ID`),
  KEY `user_skill_ibfk_1` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_skill`
--

INSERT INTO `user_skill` (`USER_SKILL_ID`, `SKILL_ID`, `USER_ID`) VALUES
(25, 6, 9);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affinity_group_members`
--
ALTER TABLE `affinity_group_members`
  ADD CONSTRAINT `affinity_group_members_ibfk_1` FOREIGN KEY (`AFFINITY_ID`) REFERENCES `affinity_groups` (`AFFINITY_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `affinity_group_members_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `education_history`
--
ALTER TABLE `education_history`
  ADD CONSTRAINT `education_history_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `job_history_ibfk_1` FOREIGN KEY (`FK_USERID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `roles` (`ROLE_ID`);

--
-- Constraints for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `user_skill_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_2` FOREIGN KEY (`SKILL_ID`) REFERENCES `skills` (`SKILL_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

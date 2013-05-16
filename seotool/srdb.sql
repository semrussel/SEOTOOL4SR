-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2013 at 08:04 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `save_upload`(_file_id INT(11), _file_name VARCHAR(64), _file_size INT(64), _date_uploaded TIMESTAMP, _author_id INT(11))
BEGIN
	INSERT INTO file VALUES(_file_id, _file_name, _file_size, _date_uploaded, _author_id);
	SELECT last_insert_id();
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `CommentId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) DEFAULT NULL,
  `ReportId` int(11) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  `Content` text NOT NULL,
  PRIMARY KEY (`CommentId`),
  KEY `UserId` (`UserId`),
  KEY `ReportId` (`ReportId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `FileId` int(11) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(64) NOT NULL,
  `FileSize` int(64) NOT NULL,
  `DateUploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AuthorId` int(11) NOT NULL,
  PRIMARY KEY (`FileId`),
  KEY `AuthorId` (`AuthorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`FileId`, `FileName`, `FileSize`, `DateUploaded`, `AuthorId`) VALUES
(1, '2', 56710, '2013-05-15 21:16:11', 1),
(2, '2', 56710, '2013-05-15 21:16:44', 1),
(3, '2', 56710, '2013-05-15 21:17:26', 1),
(4, 'sds', 44202, '2013-05-15 21:20:32', 1),
(5, 'title', 44202, '2013-05-15 21:21:29', 1),
(6, 'titlenanamans', 52607, '2013-05-15 21:36:17', 1),
(7, 'titlenanamans', 52607, '2013-05-15 21:36:21', 1),
(8, 'titlenanamans', 52607, '2013-05-15 21:36:21', 1),
(9, 'dsfsfs', 56710, '2013-05-15 21:38:26', 1),
(10, 'dsfsfs', 56710, '2013-05-15 21:38:27', 1),
(11, 'dsfsfs', 56710, '2013-05-15 21:38:28', 1),
(12, 'dsfsfs', 56710, '2013-05-15 21:38:28', 1),
(13, 'dsfsfs', 56710, '2013-05-15 21:38:28', 1),
(14, 'saskjdlask', 56710, '2013-05-15 21:39:12', 1),
(15, 'saskjdlask', 56710, '2013-05-15 21:39:13', 1),
(16, 'saskjdlask', 56710, '2013-05-15 21:39:14', 1),
(17, 'saskjdlask', 56710, '2013-05-15 21:39:14', 1),
(18, 'saskjdlask', 56710, '2013-05-15 21:39:14', 1),
(19, 'dgdsf', 44202, '2013-05-15 22:08:29', 1),
(20, 'dgdsf', 44202, '2013-05-15 22:08:32', 1),
(21, 'dgdsf', 44202, '2013-05-15 22:08:33', 1),
(22, 'dgdsf', 44202, '2013-05-15 22:08:33', 1),
(23, 'dgdsf', 44202, '2013-05-15 22:08:33', 1),
(24, 'dgdsf', 44202, '2013-05-15 22:08:33', 1),
(25, 'dgdsf', 44202, '2013-05-15 22:08:33', 1),
(26, 'dgdsf', 44202, '2013-05-15 22:08:33', 1),
(27, 'dgdsf', 44202, '2013-05-15 22:08:34', 1),
(28, 'dfsdds', 52607, '2013-05-15 22:14:19', 1),
(29, 'dfsddsfd', 52607, '2013-05-15 22:18:22', 1),
(30, 'dfsdsdfds', 44202, '2013-05-15 22:20:55', 1),
(31, 'ewrwerdsfsdf', 52607, '2013-05-15 22:21:34', 1),
(32, 'fdsfsdf', 44202, '2013-05-15 22:23:06', 1),
(33, 'mhkjh', 66382, '2013-05-15 22:24:07', 1),
(34, 'dsdfdsfds', 66382, '2013-05-15 22:24:29', 1),
(35, 'dsdds', 56710, '2013-05-15 22:26:00', 1),
(36, 'asdmasds', 66382, '2013-05-15 22:30:29', 1),
(37, 'fsdfd', 56710, '2013-05-15 22:31:41', 1),
(38, 'dsddsfsd', 66382, '2013-05-15 22:32:56', 1),
(39, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(40, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(41, 'dsddsfsd', 66382, '2013-05-15 22:35:18', 1),
(42, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(43, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(44, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(45, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(46, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(47, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(48, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(49, 'dsddsfsd', 66382, '2013-05-15 22:33:31', 1),
(50, 'dsddsfsd', 66382, '2013-05-15 22:36:36', 1),
(51, 'dsdfsdf', 56710, '2013-05-15 22:38:17', 1),
(52, 'sdjskdjhsdukgksjdugdsjufhsduif', 52607, '2013-05-15 22:40:03', 1),
(53, 'dfsdfds', 44202, '2013-05-15 22:41:38', 1),
(54, 'dsds', 44202, '2013-05-15 22:42:32', 1),
(55, 'ddsfds', 56710, '2013-05-15 22:47:04', 1),
(56, 'dsdds', 44202, '2013-05-15 22:54:38', 1),
(57, 'jhkjhk', 56710, '2013-05-15 22:55:48', 1),
(58, 'dsdfsd', 52607, '2013-05-15 22:56:04', 1),
(59, 'sdsd', 66382, '2013-05-15 22:56:23', 1),
(60, 'sdasdasd', 56710, '2013-05-15 22:57:58', 1),
(61, 'csdas', 44202, '2013-05-15 22:58:58', 1),
(62, 'ddsfsd', 69145, '2013-05-15 23:20:43', 1),
(63, 'title', 66382, '2013-05-15 23:22:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectId` int(11) NOT NULL AUTO_INCREMENT,
  `AuthorId` int(11) DEFAULT NULL,
  `ClientId` int(11) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  `Description` text,
  `TigerVinci` smallint(6) NOT NULL,
  PRIMARY KEY (`ProjectId`),
  KEY `AuthorId` (`AuthorId`),
  KEY `ClientId` (`ClientId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `ReportId` int(11) NOT NULL AUTO_INCREMENT,
  `WebsiteId` int(11) DEFAULT NULL,
  `ClientId` int(11) DEFAULT NULL,
  `SeoId` int(11) DEFAULT NULL,
  `DateCreated` date NOT NULL,
  `File` varchar(200) NOT NULL,
  `TigerVinci` smallint(6) NOT NULL,
  PRIMARY KEY (`ReportId`),
  KEY `WebsiteId` (`WebsiteId`),
  KEY `ClientId` (`ClientId`),
  KEY `SeoId` (`SeoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` enum('Administrator','SEO Specialist','Client','Tigervinci') NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Password`, `UserType`, `Email`, `FirstName`, `LastName`, `CompanyName`) VALUES
(1, 'reecenil', 'fd887dd866937f489ca1b16ec52b30a7', 'SEO Specialist', 'reecenil.valencia0908@gmail.com', 'Reecenil', 'Valencia', 'Solutions Resource'),
(2, 'client', '62608e08adc29a8d6dbc9754e659f125', 'Client', 'client@company.com', 'Juan', 'de la Cruz', 'CompanyOne'),
(4, 'client2', '62608e08adc29a8d6dbc9754e659f125', 'Client', 'client@company1.com', 'Jean', 'Manas', 'Company'),
(5, '<h1>sdksd</h1>', 'dasdasd', 'Client', 'skjhlK@JMddd.cojd', '<h1>aaaaaaa</h1>', 'bbbbbbb', 'bbbb');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ReportId`) REFERENCES `report` (`ReportId`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`AuthorId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`AuthorId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`ClientId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`WebsiteId`) REFERENCES `project` (`ProjectId`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`ClientId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`SeoId`) REFERENCES `user` (`UserId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

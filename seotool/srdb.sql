-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2013 at 12:29 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_report`(_report_id INT(11), _website_id INT(11), _client_id INT(11), _seo_id INT(11), _date_created DATE, _file VARCHAR(200), _tigervinci SMALLINT(6), _report_title VARCHAR(64), _month_year DATE)
BEGIN
	INSERT INTO report VALUES(_report_id, _website_id, _client_id, _seo_id, _date_created, _file, _tigervinci, _report_title, _month_year);
       SELECT last_insert_id();
END$$

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
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`FileId`, `FileName`, `FileSize`, `DateUploaded`, `AuthorId`) VALUES
(109, 'fiveeee', 617913, '2013-05-19 23:32:59', 1),
(110, 'Chapter 1 Slides CMSC 128', 434334, '2013-05-20 00:14:03', 1),
(111, 'dfsdfsd', 512324, '2013-05-20 00:31:31', 1),
(112, 'kjljlk', 79814, '2013-05-22 19:34:10', 1),
(113, 'sdsdasd', 56770, '2013-05-22 19:48:03', 1),
(118, 'drfsddsfsd', 139249, '0000-00-00 00:00:00', 1),
(119, 'dfsfsdfsdfds', 139249, '2013-05-22 23:01:55', 1),
(120, 'SPEECH PLAN FOR NARMIS', 186598, '2013-05-22 23:03:09', 1),
(121, 'DEMO SPEECH OR OPLAN NARMIS', 354927, '2013-05-22 23:27:20', 1),
(122, 'METHODS OF PERSUATION', 72786, '2013-05-22 23:29:06', 1),
(123, 'REPORT FOR MAY 2011', 0, '2013-05-25 00:11:03', 1),
(124, 'sdasdsads', 254792, '2013-05-25 02:16:33', 1),
(125, 'Para sa oplan Narmis Ulit', 0, '2013-05-25 02:27:04', 1),
(126, 'Para sa oplan Narmis Ulit?', 254792, '2013-05-25 02:27:47', 1),
(127, 'Sa oplan SEO TOOL naman', 210318, '2013-05-25 02:28:08', 1),
(128, 'This is a report title for December (SEO TOOL)', 0, '2013-05-25 02:47:28', 1),
(129, 'REPORT FOR DEC 2012 FOR NARMIS', 0, '2013-05-25 03:12:14', 1),
(130, 'FOR JAN 2012 NARMIS', 0, '2013-05-25 03:13:19', 1),
(131, 'FOR JUL 2012', 73877, '2013-05-25 03:14:59', 1),
(132, 'FOR JUL 2012', 73877, '2013-05-25 03:15:07', 1),
(133, 'JAN 2013 Another', 0, '2013-05-25 03:16:48', 1),
(134, 'REPORT FOR AUG 2014 OPLAN NARMIS', 485474, '2013-05-25 03:27:37', 1),
(135, 'AUG 2015 ANOTHER', 73877, '2013-05-25 03:29:39', 1),
(136, 'JUNE REPORT 2013 FOR NARMIS ONLY', 0, '2013-05-25 03:38:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ProjectId` int(11) NOT NULL AUTO_INCREMENT,
  `AuthorId` int(11) DEFAULT NULL,
  `ClientId` int(11) DEFAULT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Description` text,
  `TigerVinci` smallint(6) NOT NULL,
  `ProjectTitle` varchar(64) NOT NULL,
  PRIMARY KEY (`ProjectId`),
  KEY `AuthorId` (`AuthorId`),
  KEY `ClientId` (`ClientId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectId`, `AuthorId`, `ClientId`, `DateCreated`, `Description`, `TigerVinci`, `ProjectTitle`) VALUES
(22, 1, 2, '2013-05-23 07:06:47', 'Upload, Edit, Create, Delete Reports\nEdit, Create, Delete Projects\nEtc..', 0, 'OPLAN SEO Tool'),
(34, 1, 2, '2013-05-22 12:49:09', 'Description', 0, 'Second title'),
(36, 1, 2, '2013-05-20 21:39:18', 'SEO TOOL Description', 0, 'SEO TOOL'),
(45, 1, 2, '2013-05-25 09:13:33', 'Lorem ipsum chorva', 0, 'EVERYBODY'),
(47, 1, 1, '2013-05-21 15:39:25', 'PROJECT', 0, 'Oplan NARMIS'),
(53, 1, 4, '2013-05-20 22:08:40', 'Description', 0, 'NARMIS'),
(58, 1, 4, '2013-05-21 00:12:28', 'Description of another project', 0, 'Title of another project'),
(61, 1, 4, '2013-05-22 12:50:30', 'Description', 0, 'This is a title'),
(67, 1, 4, '2013-05-22 12:46:47', 'And this is the description', 0, 'This is the new title');

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
  `ReportTitle` varchar(64) NOT NULL,
  `MonthYear` date NOT NULL,
  PRIMARY KEY (`ReportId`),
  KEY `WebsiteId` (`WebsiteId`),
  KEY `ClientId` (`ClientId`),
  KEY `SeoId` (`SeoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportId`, `WebsiteId`, `ClientId`, `SeoId`, `DateCreated`, `File`, `TigerVinci`, `ReportTitle`, `MonthYear`) VALUES
(2, 34, 1, 1, '2013-05-20', '109', 0, 'fiveeee', '0000-00-00'),
(3, 22, 6, 1, '2013-05-20', '110', 0, 'Chapter 1 Slides CMSC 128', '0000-00-00'),
(4, 22, 6, 1, '2013-05-20', '111', 0, 'dfsdfsd', '0000-00-00'),
(5, 58, 4, 1, '2013-05-23', '112', 0, 'kjljlk', '0000-00-00'),
(6, 34, 2, 1, '2013-05-23', '113', 0, 'sdsdasd', '0000-00-00'),
(7, 47, 1, 1, '2013-05-23', '118', 0, 'drfsddsfsd', '0000-00-00'),
(8, 22, 2, 1, '2013-05-23', '119', 0, 'dfsfsdfsdfds', '0000-00-00'),
(9, 47, 1, 1, '2013-05-23', '120', 0, 'SPEECH PLAN FOR NARMIS', '0000-00-00'),
(10, 22, 1, 1, '2013-05-23', '120', 0, 'TITLE', '0000-00-00'),
(11, 22, 1, 1, '2013-05-23', '120', 0, 'TITLE', '2013-05-05'),
(12, 47, 1, 1, '2013-05-23', '121', 0, 'DEMO SPEECH OR OPLAN NARMIS', '0000-00-00'),
(13, 22, 2, 1, '2013-05-23', '122', 0, 'METHODS OF PERSUATION', '2013-04-01'),
(14, 47, 1, 1, '2013-05-25', '123', 0, 'REPORT FOR MAY 2011', '2012-05-01'),
(15, 22, 2, 1, '2013-05-25', '124', 0, 'sdasdsads', '2013-06-01'),
(16, 47, 1, 1, '2013-05-25', '125', 0, 'Para sa oplan Narmis Ulit', '2013-07-01'),
(17, 47, 1, 1, '2013-05-25', '126', 0, 'Para sa oplan Narmis Ulit?', '2013-08-01'),
(18, 22, 2, 1, '2013-05-25', '127', 0, 'Sa oplan SEO TOOL naman', '2013-03-01'),
(19, 22, 2, 1, '2013-05-25', '128', 0, 'This is a report title for December (SEO TOOL)', '2013-12-01'),
(20, 47, 1, 1, '2013-05-25', '129', 0, 'REPORT FOR DEC 2012 FOR NARMIS', '2012-12-01'),
(21, 47, 1, 1, '2013-05-25', '130', 0, 'FOR JAN 2012 NARMIS', '2012-03-01'),
(22, 47, 1, 1, '2013-05-25', '131', 0, 'FOR JUL 2012', '2012-07-01'),
(23, 47, 1, 1, '2013-05-25', '132', 0, 'FOR JUL 2012', '2012-07-01'),
(24, 58, 4, 1, '2013-05-25', '133', 0, 'JAN 2013 Another', '2013-01-01'),
(25, 47, 1, 1, '2013-05-25', '134', 0, 'REPORT FOR AUG 2014 OPLAN NARMIS', '2014-08-01'),
(26, 58, 4, 1, '2013-05-25', '135', 0, 'AUG 2015 ANOTHER', '2015-08-01'),
(27, 53, 4, 1, '2013-05-25', '136', 0, 'JUNE REPORT 2013 FOR NARMIS ONLY', '2013-06-01');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Password`, `UserType`, `Email`, `FirstName`, `LastName`, `CompanyName`) VALUES
(1, 'reecenil', 'fd887dd866937f489ca1b16ec52b30a7', 'SEO Specialist', 'reecenil.valencia0908@gmail.com', 'Reecenil', 'Valencia', 'Solutions Resource'),
(2, 'client', '62608e08adc29a8d6dbc9754e659f125', 'Client', 'client@company.com', 'Juan', 'de la Cruz', 'CompanyOne'),
(4, 'client2', '62608e08adc29a8d6dbc9754e659f125', 'Client', 'client@company1.com', 'Jean', 'Manas', 'Company'),
(5, '<h1>sdksd</h1>', 'dasdasd', 'Client', 'skjhlK@JMddd.cojd', '<h1>aaaaaaa</h1>', 'bbbbbbb', 'bbbb'),
(6, 'usernamw', '5f4dcc3b5aa765d61d8327deb882cf99', 'Client', 'jdhfsdkjgkj@jgksd.fsd', 'jakjgkjg', 'kjhgkjhgkjhg', 'jdhkjsdhfdf');

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

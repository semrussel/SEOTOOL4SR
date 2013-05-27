-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2013 at 02:39 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

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
(136, 'JUNE REPORT 2013 FOR NARMIS ONLY', 0, '2013-05-25 03:38:49', 1),
(143, 'May 2013 Everybody project', 445060, '2013-05-26 02:23:05', 1),
(144, 'September report for OPLAN SEO Tool', 907072, '2013-05-26 02:29:39', 1),
(145, 'SEO TOOL APR 2013', 251541, '2013-05-26 02:34:26', 1),
(146, 'Everybody Sept 2013', 907072, '2013-05-26 02:41:35', 1),
(147, 'sdasdsads', 298807, '2013-05-26 02:47:42', 1),
(148, 'Tigervinci Report For Project kjfhsdklgjsldifugnli MAY 2013', 397301, '2013-05-26 05:39:02', 8),
(149, 'report for test test test jan 2013', 445060, '2013-05-26 05:51:57', 8),
(150, 'for tigervinci tes test feb 2013', 752503, '2013-05-26 06:20:44', 1),
(151, '<h1>testing again</h1>', 346337, '2013-05-26 07:20:49', 1),
(152, 'test test test test sjfdsklfjs', 598606, '2013-05-26 08:14:05', 1),
(153, 'normal', 502344, '2013-05-26 08:18:15', 1),
(154, 'testing', 911380, '2013-05-26 08:19:01', 1),
(155, 'kjdfkdhsfikhsdliu', 226304, '2013-05-26 08:21:57', 1),
(157, 'tijriothlzduinliubli', 598606, '2013-05-26 08:25:08', 1),
(158, 'normal', 598606, '2013-05-26 08:28:05', 1),
(159, '<marquee>dfjslkjM</marquee>', 69300, '2013-05-26 08:30:35', 1),
(160, 'May 2013 ', 376961, '2013-05-26 12:26:01', 1),
(161, 'Isa pang may 2013', 376961, '2013-05-26 12:27:02', 1),
(162, 'hehe', 754723, '2013-05-26 12:29:40', 1),
(164, 'may 2013 mdsjff', 246168, '2013-05-26 13:58:52', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectId`, `AuthorId`, `ClientId`, `DateCreated`, `Description`, `TigerVinci`, `ProjectTitle`) VALUES
(53, 1, 4, '2013-05-20 22:08:40', 'Description', 0, 'NARMIS'),
(58, 1, 4, '2013-05-21 00:12:28', 'Description of another project', 0, 'Title of another project'),
(70, 8, 6, '2013-05-26 05:30:19', 'Desc of tigervinci project', 0, 'Title of  Tigervinci project'),
(77, 8, 2, '2013-05-26 05:32:31', 'Desc of a tigervinci project', 1, 'Title of a Tigervinci Project'),
(80, 8, 2, '2013-05-26 13:51:37', 'test test test ', 1, 'test test test '),
(81, 8, 2, '2013-05-26 15:07:29', 'jfksjfljhlij', 1, '<h1>test</h1>'),
(82, 8, 6, '2013-05-26 07:02:15', 'shshl', 1, '''"'''),
(83, 8, 7, '2013-05-26 07:02:53', 'skndalkn;kas;', 1, '''"''''''""'''),
(85, 8, 4, '2013-05-26 07:11:04', 'cskjfkldnflkjn', 1, '<script>while(1){}</script>'),
(86, 1, 4, '2013-05-26 07:19:30', 'dhflksdhjliugl', 0, '<h1>testing</h1>'),
(87, 1, 2, '2013-05-26 16:01:56', '<script>alert(''bazinga'');</script>', 0, '"; SELECT * FROM PROJECT; "''''K ioa(*^&#(@*$^(@#^$#$(:" "" "" \\S:'),
(88, 1, 6, '2013-05-26 07:40:53', 'fdsdfd', 0, '"; SELECT * FROM REPORT;'),
(89, 1, 4, '2013-05-26 07:59:55', '''; SELECT * FROM REPORT; "''""''''?''"."%"?"D', 0, '<a href="ksfjlsdf">jlskjdl</a>');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportId`, `WebsiteId`, `ClientId`, `SeoId`, `DateCreated`, `File`, `TigerVinci`, `ReportTitle`, `MonthYear`) VALUES
(5, 58, 4, 1, '2013-05-23', '112', 0, 'kjljlk', '0000-00-00'),
(24, 58, 4, 1, '2013-05-25', '133', 0, 'JAN 2013 Another', '2013-01-01'),
(26, 58, 4, 1, '2013-05-25', '135', 0, 'AUG 2015 ANOTHER', '2015-08-01'),
(27, 53, 4, 1, '2013-05-25', '136', 0, 'JUNE REPORT 2013 FOR NARMIS ONLY', '2013-06-01'),
(40, 80, 2, 8, '2013-05-26', '149', 1, 'report for test test test jan 2013', '2013-01-01'),
(41, 80, 2, 1, '2013-05-26', '150', 0, 'for tigervinci tes test feb 2013', '2013-02-01'),
(42, 58, 4, 1, '2013-05-26', '151', 0, '<h1>testing again</h1>', '2011-08-01'),
(43, 87, 2, 1, '2013-05-26', '157', 0, 'tijriothlzduinliubli', '2010-05-01'),
(44, 87, 2, 1, '2013-05-26', '158', 0, 'normal', '2100-03-01'),
(45, 87, 2, 1, '2013-05-26', '159', 0, '<marquee>dfjslkjM</marquee>', '2012-11-01'),
(46, 70, 6, 1, '2013-05-26', '160', 0, 'May 2013 ', '2013-05-01'),
(47, 58, 4, 1, '2013-05-26', '161', 0, 'Isa pang may 2013', '2013-11-01'),
(48, 88, 6, 1, '2013-05-26', '162', 0, 'hehe', '2013-05-01'),
(50, 58, 4, 1, '2013-05-26', '164', 0, 'may 2013 mdsjff', '2013-04-01');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Password`, `UserType`, `Email`, `FirstName`, `LastName`, `CompanyName`) VALUES
(1, 'reecenil', 'fd887dd866937f489ca1b16ec52b30a7', 'SEO Specialist', 'reecenil.valencia0908@gmail.com', 'Reecenil', 'Valencia', 'Solutions Resource'),
(2, 'client', '62608e08adc29a8d6dbc9754e659f125', 'Client', 'client@company.com', 'Juan', 'de la Cruz', 'CompanyOne'),
(4, 'client2', '62608e08adc29a8d6dbc9754e659f125', 'Client', 'client@company1.com', 'Jean', 'Manas', 'Company'),
(5, '<h1>sdksd</h1>', 'dasdasd', 'Client', 'skjhlK@JMddd.cojd', '<h1>aaaaaaa</h1>', 'bbbbbbb', 'bbbb'),
(6, 'usernamw', '5f4dcc3b5aa765d61d8327deb882cf99', 'Client', 'jdhfsdkjgkj@jgksd.fsd', 'jakjgkjg', 'kjhgkjhgkjhg', 'jdhkjsdhfdf'),
(7, 'sdfsdfsdf', 'dfdsgdfgsf', 'Client', 'fsdfnlkj@kjdrg.spodjfspd', 'dfsdf', 'fsdfds', 'CompanyOne'),
(8, 'tigervinci', 'a55a8c7f9e736cec0796103a92a8e27b', 'Tigervinci', 'tigervonci@tigervinci.com', 'Tigervinci', 'Account', 'Tigervinci'),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@admin.com', 'admin', 'admin', 'adminadmin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`ReportId`) REFERENCES `report` (`ReportId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_3` FOREIGN KEY (`AuthorId`) REFERENCES `user` (`UserId`);

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
  ADD CONSTRAINT `report_ibfk_8` FOREIGN KEY (`SeoId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `report_ibfk_4` FOREIGN KEY (`WebsiteId`) REFERENCES `project` (`ProjectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_ibfk_7` FOREIGN KEY (`ClientId`) REFERENCES `user` (`UserId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

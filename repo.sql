-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2016 at 07:36 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `repo`
--

-- --------------------------------------------------------

--
-- Table structure for table `fr_course`
--

CREATE TABLE IF NOT EXISTS `fr_course` (
  `id` int(11) NOT NULL auto_increment,
  `CCode` varchar(50) NOT NULL,
  `CDesc` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fr_course`
--

INSERT INTO `fr_course` (`id`, `CCode`, `CDesc`) VALUES
(1, 'BSIT', 'Bachelor of Science in Inforamtion Technology'),
(2, 'BSCS', 'Bachelor of Science in Computer Science'),
(3, 'ACT', 'Associate in Computer Technology'),
(4, 'BSCOE', 'Bachelor of Science in Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `fr_folder_owner`
--

CREATE TABLE IF NOT EXISTS `fr_folder_owner` (
  `id` int(11) NOT NULL auto_increment,
  `path_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fr_folder_owner`
--

INSERT INTO `fr_folder_owner` (`id`, `path_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fr_ins_subject`
--

CREATE TABLE IF NOT EXISTS `fr_ins_subject` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `SubPath` varchar(1000) NOT NULL,
  `Date_Created` date NOT NULL,
  `Time_Created` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fr_ins_subject`
--

INSERT INTO `fr_ins_subject` (`id`, `user_id`, `Subject`, `SubPath`, `Date_Created`, `Time_Created`) VALUES
(1, 2, 'IT7', './Data/Dean/Dean, Dean/2016-2017/1st Semester/IT7', '2016-01-16', '18:25:19'),
(2, 2, 'IT8', './Data/Dean/Dean, Dean/2016-2017/1st Semester/IT8', '2016-01-16', '18:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `fr_path`
--

CREATE TABLE IF NOT EXISTS `fr_path` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(30000) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fr_path`
--

INSERT INTO `fr_path` (`id`, `url`, `user_id`) VALUES
(1, './Data', 1),
(2, './Data/Dean/Dean, Dean', 2),
(3, './Data/Instructor/instructor, instructor', 3),
(4, './Data/Student/BSIT/student-1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `fr_semester`
--

CREATE TABLE IF NOT EXISTS `fr_semester` (
  `SemID` int(11) NOT NULL auto_increment,
  `Semester` varchar(100) NOT NULL,
  `SYID` int(11) NOT NULL,
  PRIMARY KEY  (`SemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fr_semester`
--

INSERT INTO `fr_semester` (`SemID`, `Semester`, `SYID`) VALUES
(1, '1st Semester', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fr_share_folder`
--

CREATE TABLE IF NOT EXISTS `fr_share_folder` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `path_id` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fr_share_folder`
--


-- --------------------------------------------------------

--
-- Table structure for table `fr_staff`
--

CREATE TABLE IF NOT EXISTS `fr_staff` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `FirstN` varchar(50) NOT NULL,
  `LastN` varchar(50) NOT NULL,
  `midN` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fr_staff`
--

INSERT INTO `fr_staff` (`id`, `user_id`, `FirstN`, `LastN`, `midN`) VALUES
(1, 1, 'admin', 'admin', 'admin'),
(2, 2, 'Dean', 'Dean', 'Dean'),
(3, 3, 'instructor', 'instructor', '');

-- --------------------------------------------------------

--
-- Table structure for table `fr_stud`
--

CREATE TABLE IF NOT EXISTS `fr_stud` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `ControlNo` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Year` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ControlNo` (`ControlNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fr_stud`
--

INSERT INTO `fr_stud` (`id`, `user_id`, `ControlNo`, `FName`, `LName`, `Mname`, `Course`, `Year`, `size`) VALUES
(1, 2, 552, 'Leo', 'Marapoc', '', 'BSIT', '4th Year', 0),
(3, 14, 443, 'Romalyn', 'Bertudazo', '', 'BSIT', '4th Year', 0),
(4, 15, 445, 'Sheila', 'Mancera', '', 'BSIT', '4th Year', 0),
(5, 16, 123, 'Trina', 'Larazzabal', '', 'BSBA', '3rd Year', 0),
(6, 4, 1, 'student', 'student', '', 'BSIT', '4th Year', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fr_stud_subject`
--

CREATE TABLE IF NOT EXISTS `fr_stud_subject` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `Date_Created` date NOT NULL,
  `Time_Created` time NOT NULL,
  `status` enum('APPROVED','DISAPPROVED') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fr_stud_subject`
--

INSERT INTO `fr_stud_subject` (`id`, `user_id`, `subject`, `url`, `subject_id`, `Date_Created`, `Time_Created`, `status`) VALUES
(5, 4, 'IT7', './Data/Dean/Dean, Dean/2016-2017/1st Semester/IT7/1-student-IT7', 1, '2016-01-17', '02:45:09', 'APPROVED'),
(6, 4, 'IT8', './Data/Dean/Dean, Dean/2016-2017/1st Semester/IT8/1-student-IT8', 2, '2016-01-17', '02:45:09', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `fr_subject`
--

CREATE TABLE IF NOT EXISTS `fr_subject` (
  `subID` int(11) NOT NULL auto_increment,
  `SubCode` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `status` enum('ASSIGNED','NOT ASSIGNED') NOT NULL default 'NOT ASSIGNED',
  `SemID` int(11) NOT NULL,
  PRIMARY KEY  (`subID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fr_subject`
--

INSERT INTO `fr_subject` (`subID`, `SubCode`, `Description`, `status`, `SemID`) VALUES
(1, 'IT7', 'Computer Programming', 'ASSIGNED', 1),
(2, 'IT8', 'Operating System', 'ASSIGNED', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fr_sy`
--

CREATE TABLE IF NOT EXISTS `fr_sy` (
  `SYID` int(11) NOT NULL auto_increment,
  `SYstart` int(11) NOT NULL,
  `SYend` int(11) NOT NULL,
  PRIMARY KEY  (`SYID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fr_sy`
--

INSERT INTO `fr_sy` (`SYID`, `SYstart`, `SYend`) VALUES
(1, 2016, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `fr_user`
--

CREATE TABLE IF NOT EXISTS `fr_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `UserLvl` int(11) NOT NULL,
  `status` enum('online','pending','offline') NOT NULL default 'pending',
  `last_login_date` datetime NOT NULL,
  `last_logout_date` datetime NOT NULL,
  `activate` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fr_user`
--

INSERT INTO `fr_user` (`id`, `username`, `password`, `UserLvl`, `status`, `last_login_date`, `last_logout_date`, `activate`) VALUES
(1, 'admin', 'admin', 5, 'offline', '2016-01-17 03:31:16', '2016-01-17 03:31:51', 1),
(2, 'dean', '12345', 4, 'online', '2016-01-17 01:38:50', '2016-01-17 12:38:51', 1),
(3, 'instructor', '12345', 3, 'offline', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'student', '12345', 1, 'online', '2016-01-17 03:31:58', '2016-01-17 03:29:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fr_user_permissions`
--

CREATE TABLE IF NOT EXISTS `fr_user_permissions` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `upload` int(11) NOT NULL,
  `download` int(11) NOT NULL,
  `download_folders` int(11) NOT NULL,
  `create_folders` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `change_pass` int(11) NOT NULL,
  `rename_F` int(11) NOT NULL,
  `delete_F` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fr_user_permissions`
--

INSERT INTO `fr_user_permissions` (`id`, `user_id`, `upload`, `download`, `download_folders`, `create_folders`, `share`, `change_pass`, `rename_F`, `delete_F`) VALUES
(1, 2, 1, 1, 1, 0, 0, 1, 0, 0),
(2, 3, 1, 1, 1, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `ID` int(11) NOT NULL auto_increment,
  `Position` varchar(50) NOT NULL,
  `UserLvl` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`ID`, `Position`, `UserLvl`) VALUES
(1, 'admin', 5),
(2, 'Dean', 4),
(3, 'Instructor', 3),
(4, 'Working', 2),
(5, 'Student', 1);

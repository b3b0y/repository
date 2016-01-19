-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2016 at 05:12 AM
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
-- Table structure for table `fr_archive`
--

CREATE TABLE IF NOT EXISTS `fr_archive` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `url` varchar(3000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fr_archive`
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
-- Table structure for table `fr_deadline`
--

CREATE TABLE IF NOT EXISTS `fr_deadline` (
  `id` int(11) NOT NULL auto_increment,
  `folder_id` varchar(200) NOT NULL,
  `date_deadline` date NOT NULL,
  `time_deadline` time NOT NULL,
  `status` enum('open','closed') NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fr_deadline`
--

INSERT INTO `fr_deadline` (`id`, `folder_id`, `date_deadline`, `time_deadline`, `status`) VALUES
(1, '1', '2016-02-01', '14:30:00', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `fr_folder_owner`
--

CREATE TABLE IF NOT EXISTS `fr_folder_owner` (
  `id` int(11) NOT NULL auto_increment,
  `path_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fr_folder_owner`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fr_ins_subject`
--

INSERT INTO `fr_ins_subject` (`id`, `user_id`, `Subject`, `SubPath`, `Date_Created`, `Time_Created`) VALUES
(1, 4, 'IT8', './Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT8', '2018-01-16', '05:37:36'),
(2, 4, 'English 4', './Data/Instructor/instructor, instructor/2016-2017/1st Semester/English 4', '2018-01-16', '05:37:36'),
(3, 2, 'IT7', './Data/Dean/dean, dean/2016-2017/1st Semester/IT7', '2018-01-16', '05:38:43'),
(4, 2, 'IT4', './Data/Dean/dean, dean/2016-2017/1st Semester/IT4', '2018-01-16', '05:38:43'),
(5, 4, 'IT3', './Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT3', '2019-01-16', '03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `fr_notification`
--

CREATE TABLE IF NOT EXISTS `fr_notification` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` enum('unread','read') NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fr_notification`
--

INSERT INTO `fr_notification` (`id`, `user_id`, `link`, `message`, `status`, `Date`) VALUES
(1, 3, 'index.php?share=1', 'IT8_Activityis set a Deadline on 2016-02-01 14:30:00', 'read', '2016-01-19 04:50:30'),
(2, 4, './index.php?folder=MjAxNi0yMDE3LzFzdCBTZW1lc3Rlci9JVDgvQWN0aXZpdHk=', 'student student download a file aa.png in IT8', 'read', '2016-01-19 08:20:41'),
(3, 4, './index.php?folder=MjAxNi0yMDE3LzFzdCBTZW1lc3Rlci9JVDgvQWN0aXZpdHk=', 'student student upload a file 12204141_1229265283765926_1458044435_o.jpg in IT8', 'read', '2016-01-19 08:23:36');

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
(2, './Data/Dean/dean, dean', 2),
(3, './Data/Instructor/instructor, instructor', 4),
(4, './Data/Student/BSIT/student-1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fr_semester`
--

CREATE TABLE IF NOT EXISTS `fr_semester` (
  `SemID` int(11) NOT NULL auto_increment,
  `Semester` varchar(100) NOT NULL,
  `SYID` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY  (`SemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fr_semester`
--

INSERT INTO `fr_semester` (`SemID`, `Semester`, `SYID`, `status`) VALUES
(1, '1st Semester', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fr_share_folder`
--

CREATE TABLE IF NOT EXISTS `fr_share_folder` (
  `id` int(11) NOT NULL auto_increment,
  `folder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `shared_name` varchar(100) NOT NULL,
  `download` int(11) NOT NULL,
  `upload` int(11) NOT NULL,
  `date_shared` date NOT NULL,
  `time_shared` time NOT NULL,
  `status` enum('set','unset') NOT NULL default 'unset',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fr_share_folder`
--

INSERT INTO `fr_share_folder` (`id`, `folder_id`, `user_id`, `url`, `shared_name`, `download`, `upload`, `date_shared`, `time_shared`, `status`) VALUES
(1, 1, 3, './Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT8/Activity', 'IT8_Activity', 0, 1, '2016-01-19', '03:47:41', 'set');

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
(2, 2, 'dean', 'dean', 'dean'),
(3, 4, 'instructor', 'instructor', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fr_stud`
--

INSERT INTO `fr_stud` (`id`, `user_id`, `ControlNo`, `FName`, `LName`, `Mname`, `Course`, `Year`, `size`) VALUES
(1, 3, 1, 'student', 'student', '', 'BSIT', '4th Year', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fr_stud_subject`
--

INSERT INTO `fr_stud_subject` (`id`, `user_id`, `subject`, `url`, `subject_id`, `Date_Created`, `Time_Created`, `status`) VALUES
(1, 3, 'IT8', './Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT8/1-student-IT8', 1, '2016-01-18', '05:41:32', 'APPROVED'),
(2, 3, 'English 4', './Data/Instructor/instructor, instructor/2016-2017/1st Semester/English 4/1-student-English 4', 2, '2016-01-18', '05:41:32', 'APPROVED'),
(3, 3, 'IT7', './Data/Dean/dean, dean/2016-2017/1st Semester/IT7/1-student-IT7', 3, '2016-01-18', '05:39:26', 'APPROVED'),
(4, 3, 'IT4', './Data/Dean/dean, dean/2016-2017/1st Semester/IT4/1-student-IT4', 4, '2016-01-18', '05:40:44', 'APPROVED'),
(5, 3, 'IT3', './Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT3/1-student-IT3', 5, '2016-01-19', '03:25:43', 'APPROVED');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fr_subject`
--

INSERT INTO `fr_subject` (`subID`, `SubCode`, `Description`, `status`, `SemID`) VALUES
(1, 'IT7', 'Computer Programming', 'ASSIGNED', 1),
(2, 'IT8', 'Operating System', 'ASSIGNED', 1),
(3, 'IT4', 'Presentation Skills', 'ASSIGNED', 1),
(4, 'English 4', 'Business Communication', 'ASSIGNED', 1),
(5, 'IT3', 'computer programming', 'ASSIGNED', 1);

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
(1, 'admin', 'admin', 5, 'online', '2016-01-19 09:18:39', '2016-01-19 08:09:24', 1),
(2, 'dean', '12345', 4, 'offline', '2016-01-19 09:18:24', '2016-01-19 09:18:33', 1),
(3, 'student', '12345', 1, 'online', '2016-01-19 07:57:46', '2016-01-19 04:36:22', 1),
(4, 'instructor', '12345', 3, 'offline', '2016-01-19 09:17:46', '2016-01-19 09:18:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fr_user_permissions`
--

CREATE TABLE IF NOT EXISTS `fr_user_permissions` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `upload` int(11) NOT NULL,
  `download` int(11) NOT NULL,
  `create_folders` int(11) NOT NULL,
  `rename_F` int(11) NOT NULL,
  `delete_F` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fr_user_permissions`
--

INSERT INTO `fr_user_permissions` (`id`, `user_id`, `upload`, `download`, `create_folders`, `rename_F`, `delete_F`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1, 1);

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

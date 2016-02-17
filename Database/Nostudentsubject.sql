# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------


#
# Delete any existing table `fr_archive`
#

DROP TABLE IF EXISTS `fr_archive`;


#
# Table structure of table `fr_archive`
#

CREATE TABLE `fr_archive` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `old_url` varchar(3000) NOT NULL,
  `current_url` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_archive (0 records)
#

#
# End of data contents of table fr_archive
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------


#
# Delete any existing table `fr_course`
#

DROP TABLE IF EXISTS `fr_course`;


#
# Table structure of table `fr_course`
#

CREATE TABLE `fr_course` (
  `id` int(11) NOT NULL auto_increment,
  `CCode` varchar(50) NOT NULL,
  `CDesc` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_course (4 records)
#
 
INSERT INTO `fr_course` VALUES (1, 'BSIT', 'Bachelor of Science in Inforamtion Technology') ; 
INSERT INTO `fr_course` VALUES (2, 'BSCS', 'Bachelor of Science in Computer Science') ; 
INSERT INTO `fr_course` VALUES (3, 'ACT', 'Associate in Computer Technology') ; 
INSERT INTO `fr_course` VALUES (4, 'BSCOE', 'Bachelor of Science in Computer Engineering') ;
#
# End of data contents of table fr_course
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------


#
# Delete any existing table `fr_deadline`
#

DROP TABLE IF EXISTS `fr_deadline`;


#
# Table structure of table `fr_deadline`
#

CREATE TABLE `fr_deadline` (
  `id` int(11) NOT NULL auto_increment,
  `folder_id` varchar(200) NOT NULL,
  `date_deadline` date NOT NULL,
  `time_deadline` time NOT NULL,
  `status` enum('open','closed') NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_deadline (0 records)
#

#
# End of data contents of table fr_deadline
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------


#
# Delete any existing table `fr_folder_owner`
#

DROP TABLE IF EXISTS `fr_folder_owner`;


#
# Table structure of table `fr_folder_owner`
#

CREATE TABLE `fr_folder_owner` (
  `id` int(11) NOT NULL auto_increment,
  `path_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_folder_owner (0 records)
#

#
# End of data contents of table fr_folder_owner
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------


#
# Delete any existing table `fr_ins_subject`
#

DROP TABLE IF EXISTS `fr_ins_subject`;


#
# Table structure of table `fr_ins_subject`
#

CREATE TABLE `fr_ins_subject` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `SubPath` varchar(1000) NOT NULL,
  `Date_Created` date NOT NULL,
  `Time_Created` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_ins_subject (20 records)
#
 
INSERT INTO `fr_ins_subject` VALUES (1, 6, 'IT2-A', './Data/Instructor/Joscoro, Cantero/2016-2017/1st Semester/IT2-A', '2008-02-16', '18:48:21') ; 
INSERT INTO `fr_ins_subject` VALUES (2, 6, 'IT2-B', './Data/Instructor/Joscoro, Cantero/2016-2017/1st Semester/IT2-B', '2008-02-16', '18:48:22') ; 
INSERT INTO `fr_ins_subject` VALUES (3, 6, 'IT7', './Data/Instructor/Joscoro, Cantero/2016-2017/1st Semester/IT7', '2008-02-16', '18:48:22') ; 
INSERT INTO `fr_ins_subject` VALUES (4, 6, 'IT17', './Data/Instructor/Joscoro, Cantero/2016-2017/1st Semester/IT17', '2008-02-16', '18:48:22') ; 
INSERT INTO `fr_ins_subject` VALUES (5, 6, 'IT 8', './Data/Instructor/Joscoro, Cantero/2016-2017/1st Semester/IT 8', '2008-02-16', '18:48:22') ; 
INSERT INTO `fr_ins_subject` VALUES (6, 7, 'Free-Ele1', './Data/Instructor/Bertulfo, Edward/2016-2017/1st Semester/Free-Ele1', '2008-02-16', '18:49:02') ; 
INSERT INTO `fr_ins_subject` VALUES (7, 7, 'IT11', './Data/Instructor/Bertulfo, Edward/2016-2017/1st Semester/IT11', '2008-02-16', '18:49:02') ; 
INSERT INTO `fr_ins_subject` VALUES (8, 7, 'IT 9', './Data/Instructor/Bertulfo, Edward/2016-2017/1st Semester/IT 9', '2008-02-16', '18:49:02') ; 
INSERT INTO `fr_ins_subject` VALUES (9, 7, 'Free-Ele4', './Data/Instructor/Bertulfo, Edward/2016-2017/1st Semester/Free-Ele4', '2008-02-16', '18:49:02') ; 
INSERT INTO `fr_ins_subject` VALUES (10, 7, 'CpE 17', './Data/Instructor/Bertulfo, Edward/2016-2017/1st Semester/CpE 17', '2008-02-16', '18:49:02') ; 
INSERT INTO `fr_ins_subject` VALUES (11, 8, 'IT 12', './Data/Instructor/Bernardo, Mark Angelo/2016-2017/1st Semester/IT 12', '2008-02-16', '18:50:04') ; 
INSERT INTO `fr_ins_subject` VALUES (12, 8, 'IT 2', './Data/Instructor/Bernardo, Mark Angelo/2016-2017/1st Semester/IT 2', '2008-02-16', '18:50:04') ; 
INSERT INTO `fr_ins_subject` VALUES (13, 8, 'IT8-A', './Data/Instructor/Bernardo, Mark Angelo/2016-2017/1st Semester/IT8-A', '2008-02-16', '18:50:04') ; 
INSERT INTO `fr_ins_subject` VALUES (14, 8, 'IT8-B', './Data/Instructor/Bernardo, Mark Angelo/2016-2017/1st Semester/IT8-B', '2008-02-16', '18:50:04') ; 
INSERT INTO `fr_ins_subject` VALUES (15, 8, 'CPE2', './Data/Instructor/Bernardo, Mark Angelo/2016-2017/1st Semester/CPE2', '2008-02-16', '18:50:05') ; 
INSERT INTO `fr_ins_subject` VALUES (16, 9, 'MATH3-A', './Data/Instructor/Bughao, Ryan/2016-2017/1st Semester/MATH3-A', '2008-02-16', '18:50:18') ; 
INSERT INTO `fr_ins_subject` VALUES (17, 9, 'MATH3-B', './Data/Instructor/Bughao, Ryan/2016-2017/1st Semester/MATH3-B', '2008-02-16', '18:50:18') ; 
INSERT INTO `fr_ins_subject` VALUES (18, 9, 'MATH6', './Data/Instructor/Bughao, Ryan/2016-2017/1st Semester/MATH6', '2008-02-16', '18:50:18') ; 
INSERT INTO `fr_ins_subject` VALUES (19, 9, 'IT6', './Data/Instructor/Bughao, Ryan/2016-2017/1st Semester/IT6', '2008-02-16', '18:50:18') ; 
INSERT INTO `fr_ins_subject` VALUES (20, 10, 'Thesis', './Data/Dean/Tarre, Cheryl/2016-2017/1st Semester/Thesis', '2017-02-16', '11:54:00') ;
#
# End of data contents of table fr_ins_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------


#
# Delete any existing table `fr_news`
#

DROP TABLE IF EXISTS `fr_news`;


#
# Table structure of table `fr_news`
#

CREATE TABLE `fr_news` (
  `id` int(11) NOT NULL auto_increment,
  `subject_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_news (0 records)
#

#
# End of data contents of table fr_news
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------


#
# Delete any existing table `fr_notification`
#

DROP TABLE IF EXISTS `fr_notification`;


#
# Table structure of table `fr_notification`
#

CREATE TABLE `fr_notification` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` enum('unread','read') NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_notification (0 records)
#

#
# End of data contents of table fr_notification
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------


#
# Delete any existing table `fr_path`
#

DROP TABLE IF EXISTS `fr_path`;


#
# Table structure of table `fr_path`
#

CREATE TABLE `fr_path` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(30000) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_path (13 records)
#
 
INSERT INTO `fr_path` VALUES (1, './Data', 1) ; 
INSERT INTO `fr_path` VALUES (2, './Data/Instructor/Joscoro, Cantero', 6) ; 
INSERT INTO `fr_path` VALUES (3, './Data/Instructor/Bertulfo, Edward', 7) ; 
INSERT INTO `fr_path` VALUES (4, './Data/Instructor/Bernardo, Mark Angelo', 8) ; 
INSERT INTO `fr_path` VALUES (5, './Data/Instructor/Bughao, Ryan', 9) ; 
INSERT INTO `fr_path` VALUES (6, './Data/Student/BSIT/Marapoc-552', 2) ; 
INSERT INTO `fr_path` VALUES (7, './Data/Dean/Tarre, Cheryl', 10) ; 
INSERT INTO `fr_path` VALUES (8, './Data/Student/BSIT/Mancera-445', 3) ; 
INSERT INTO `fr_path` VALUES (9, './Data/Student/BSBA/Larazzabal-123', 5) ; 
INSERT INTO `fr_path` VALUES (10, './Data/Student/BSIT/Bertudazo-443', 4) ; 
INSERT INTO `fr_path` VALUES (11, './Data/Student/BSIT/Tizon-441', 11) ; 
INSERT INTO `fr_path` VALUES (12, './Data/Instructor/qq, qq', 12) ; 
INSERT INTO `fr_path` VALUES (13, './Data/Instructor/qq, qqq', 13) ;
#
# End of data contents of table fr_path
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------


#
# Delete any existing table `fr_semester`
#

DROP TABLE IF EXISTS `fr_semester`;


#
# Table structure of table `fr_semester`
#

CREATE TABLE `fr_semester` (
  `SemID` int(11) NOT NULL auto_increment,
  `Semester` varchar(100) NOT NULL,
  `SYID` int(11) NOT NULL,
  `sem_status` enum('Active','Inactive') NOT NULL default 'Inactive',
  PRIMARY KEY  (`SemID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_semester (2 records)
#
 
INSERT INTO `fr_semester` VALUES (1, '1st Semester', 1, 'Active') ; 
INSERT INTO `fr_semester` VALUES (2, '2nd Semester', 1, 'Inactive') ;
#
# End of data contents of table fr_semester
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------


#
# Delete any existing table `fr_share_folder`
#

DROP TABLE IF EXISTS `fr_share_folder`;


#
# Table structure of table `fr_share_folder`
#

CREATE TABLE `fr_share_folder` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_share_folder (0 records)
#

#
# End of data contents of table fr_share_folder
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------


#
# Delete any existing table `fr_staff`
#

DROP TABLE IF EXISTS `fr_staff`;


#
# Table structure of table `fr_staff`
#

CREATE TABLE `fr_staff` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `FirstN` varchar(50) NOT NULL,
  `LastN` varchar(50) NOT NULL,
  `midN` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_staff (6 records)
#
 
INSERT INTO `fr_staff` VALUES (1, 1, 'admin', 'admin', 'admin') ; 
INSERT INTO `fr_staff` VALUES (2, 6, 'Cantero', 'Joscoro', '') ; 
INSERT INTO `fr_staff` VALUES (3, 7, 'Edward', 'Bertulfo', '') ; 
INSERT INTO `fr_staff` VALUES (4, 8, 'Mark Angelo', 'Bernardo', '') ; 
INSERT INTO `fr_staff` VALUES (5, 9, 'Ryan', 'Bughao', '') ; 
INSERT INTO `fr_staff` VALUES (6, 10, 'Cheryl', 'Tarre', '') ;
#
# End of data contents of table fr_staff
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------


#
# Delete any existing table `fr_stud`
#

DROP TABLE IF EXISTS `fr_stud`;


#
# Table structure of table `fr_stud`
#

CREATE TABLE `fr_stud` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_stud (5 records)
#
 
INSERT INTO `fr_stud` VALUES (1, 2, 552, 'Leo', 'Marapoc', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (2, 3, 445, 'Sheila', 'Mancera', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (3, 4, 443, 'Romalyn', 'Bertudazo', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (4, 5, 123, 'Trina', 'Larazzabal', '', 'BSBA', '3rd Year', 0) ; 
INSERT INTO `fr_stud` VALUES (5, 11, 442, 'Mitzi hazel', 'Tizon', '', 'BSIT', '4th Year', 0) ;
#
# End of data contents of table fr_stud
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------


#
# Delete any existing table `fr_stud_subject`
#

DROP TABLE IF EXISTS `fr_stud_subject`;


#
# Table structure of table `fr_stud_subject`
#

CREATE TABLE `fr_stud_subject` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `Date_Created` date NOT NULL,
  `Time_Created` time NOT NULL,
  `status` enum('APPROVED','DISAPPROVED','Dropped') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_stud_subject (0 records)
#

#
# End of data contents of table fr_stud_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_subject`
# --------------------------------------------------------


#
# Delete any existing table `fr_subject`
#

DROP TABLE IF EXISTS `fr_subject`;


#
# Table structure of table `fr_subject`
#

CREATE TABLE `fr_subject` (
  `subID` int(11) NOT NULL auto_increment,
  `SubCode` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `status` enum('ASSIGNED','NOT ASSIGNED') NOT NULL default 'NOT ASSIGNED',
  `SemID` int(11) NOT NULL,
  PRIMARY KEY  (`subID`),
  UNIQUE KEY `SubCode` (`SubCode`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_subject (20 records)
#
 
INSERT INTO `fr_subject` VALUES (1, 'Free-Ele1', 'DBMS1', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (2, 'IT11', 'DBMS2', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (3, 'IT 9', 'Software Engineering', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (4, 'Free-Ele4', 'Digital Design', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (5, 'CpE 17', 'Control Systems', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (6, 'IT 12', 'Modeling & Simulation', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (7, 'IT 2', 'Computer Programming 1', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (8, 'IT8-A', 'OS', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (9, 'IT8-B', 'OS', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (10, 'CPE2', 'Computer Fundamentals & Prog', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (11, 'MATH3-A', 'Discrete Structures', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (12, 'MATH3-B', 'Discrete Structures', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (13, 'MATH6', 'Discrete Math', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (14, 'IT6', 'Computer & File Org', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (15, 'IT2-A', 'Computer Progrgamming 2', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (16, 'IT2-B', 'Computer Programming 2', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (17, 'IT7', 'Object Oriented Prog', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (18, 'IT17', 'ISS', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (19, 'IT 8', 'OOP', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (20, 'Thesis', 'Thesis Proposal', 'ASSIGNED', 1) ;
#
# End of data contents of table fr_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_sy`
# --------------------------------------------------------


#
# Delete any existing table `fr_sy`
#

DROP TABLE IF EXISTS `fr_sy`;


#
# Table structure of table `fr_sy`
#

CREATE TABLE `fr_sy` (
  `SYID` int(11) NOT NULL auto_increment,
  `SYstart` int(11) NOT NULL,
  `SYend` int(11) NOT NULL,
  PRIMARY KEY  (`SYID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_sy (1 records)
#
 
INSERT INTO `fr_sy` VALUES (1, 2016, 2017) ;
#
# End of data contents of table fr_sy
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_sy`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user`
# --------------------------------------------------------


#
# Delete any existing table `fr_user`
#

DROP TABLE IF EXISTS `fr_user`;


#
# Table structure of table `fr_user`
#

CREATE TABLE `fr_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `UserLvl` int(11) NOT NULL,
  `status` enum('online','pending','offline') NOT NULL default 'pending',
  `last_login_date` datetime NOT NULL,
  `last_logout_date` datetime NOT NULL,
  `activate` int(11) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_user (11 records)
#
 
INSERT INTO `fr_user` VALUES (1, 'admin', 'admin', 5, 'online', '2016-02-17 01:31:57', '2016-02-17 01:31:27', 1) ; 
INSERT INTO `fr_user` VALUES (2, 'marapoc', '12345', 1, 'offline', '2016-02-17 11:42:07', '2016-02-17 11:42:11', 1) ; 
INSERT INTO `fr_user` VALUES (3, 'mancera', '12345', 1, 'offline', '2016-02-08 10:02:19', '2016-02-08 10:03:59', 1) ; 
INSERT INTO `fr_user` VALUES (4, 'bertudazo', '123', 1, 'online', '2016-02-18 02:29:20', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (5, 'trina', '12345', 1, 'offline', '2016-02-08 10:03:42', '2016-02-08 10:05:59', 1) ; 
INSERT INTO `fr_user` VALUES (6, 'cantero', '12345', 3, 'offline', '2016-02-18 12:35:33', '2016-02-18 03:07:41', 1) ; 
INSERT INTO `fr_user` VALUES (7, 'bertulfo', '12345', 3, 'offline', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (8, 'bernardo', '12345', 3, 'offline', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (9, 'bughao', '12345', 3, 'offline', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (10, 'tarre', '12345', 4, 'online', '2016-02-18 03:07:57', '2016-02-17 11:43:21', 1) ; 
INSERT INTO `fr_user` VALUES (11, 'mikay', '12345', 1, 'offline', '2016-02-08 10:06:14', '0000-00-00 00:00:00', 1) ;
#
# End of data contents of table fr_user
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_sy`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user_permissions`
# --------------------------------------------------------


#
# Delete any existing table `fr_user_permissions`
#

DROP TABLE IF EXISTS `fr_user_permissions`;


#
# Table structure of table `fr_user_permissions`
#

CREATE TABLE `fr_user_permissions` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `upload` int(11) NOT NULL,
  `download` int(11) NOT NULL,
  `create_folders` int(11) NOT NULL,
  `rename_F` int(11) NOT NULL,
  `delete_F` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_user_permissions (13 records)
#
 
INSERT INTO `fr_user_permissions` VALUES (1, 1, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (2, 6, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (3, 7, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (4, 8, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (5, 9, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (6, 2, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (7, 10, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (8, 3, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (9, 5, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (10, 4, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (11, 11, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (12, 12, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (13, 13, 1, 1, 1, 1, 1) ;
#
# End of data contents of table fr_user_permissions
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_sy`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user_permissions`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `position`
# --------------------------------------------------------


#
# Delete any existing table `position`
#

DROP TABLE IF EXISTS `position`;


#
# Table structure of table `position`
#

CREATE TABLE `position` (
  `ID` int(11) NOT NULL auto_increment,
  `Position` varchar(50) NOT NULL,
  `UserLvl` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

#
# Data contents of table position (5 records)
#
 
INSERT INTO `position` VALUES (1, 'admin', 5) ; 
INSERT INTO `position` VALUES (2, 'Dean', 4) ; 
INSERT INTO `position` VALUES (3, 'Instructor', 3) ; 
INSERT INTO `position` VALUES (4, 'Working', 2) ; 
INSERT INTO `position` VALUES (5, 'Student', 1) ;
#
# End of data contents of table position
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Thursday 18. February 2016 03:14 HKT
# Hostname: localhost
# Database: `repo`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_archive`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_course`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_deadline`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_folder_owner`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_ins_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_news`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_notification`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_path`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_semester`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_share_folder`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_staff`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_stud_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_subject`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_sy`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `fr_user_permissions`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `position`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `project_notif`
# --------------------------------------------------------


#
# Delete any existing table `project_notif`
#

DROP TABLE IF EXISTS `project_notif`;


#
# Table structure of table `project_notif`
#

CREATE TABLE `project_notif` (
  `id` int(11) NOT NULL auto_increment,
  `inst_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `project_name` varchar(500) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

#
# Data contents of table project_notif (0 records)
#

#
# End of data contents of table project_notif
# --------------------------------------------------------


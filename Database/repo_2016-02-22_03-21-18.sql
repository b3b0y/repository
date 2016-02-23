# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
  `size_limit` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_ins_subject (2 records)
#
 
INSERT INTO `fr_ins_subject` VALUES (1, 2, 'IT11', './Data/Subject/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT11', '2022-02-16', '01:10:24', '100') ; 
INSERT INTO `fr_ins_subject` VALUES (2, 2, 'IT8-A', './Data/Subject/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT8-A', '2022-02-16', '01:10:24', '2') ;
#
# End of data contents of table fr_ins_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_notification (12 records)
#
 
INSERT INTO `fr_notification` VALUES (1, 2, 'subjectmanagement.php?subject=approve', 'Leo Marapoc enroll IT11', 'read', '2016-02-22 02:45:18') ; 
INSERT INTO `fr_notification` VALUES (2, 3, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT11', 'read', '2016-02-22 02:45:29') ; 
INSERT INTO `fr_notification` VALUES (3, 2, 'subjectmanagement.php?subject=approve', 'Sheila Mancera enroll IT11', 'read', '2016-02-22 02:58:52') ; 
INSERT INTO `fr_notification` VALUES (4, 5, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT11', 'read', '2016-02-22 02:59:20') ; 
INSERT INTO `fr_notification` VALUES (5, 2, 'subjectmanagement.php?subject=approve', 'Trina Larazzabal enroll IT11', 'read', '2016-02-22 03:03:45') ; 
INSERT INTO `fr_notification` VALUES (6, 7, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT11', 'read', '2016-02-22 03:04:05') ; 
INSERT INTO `fr_notification` VALUES (7, 2, 'subjectmanagement.php?subject=approve', 'Trina Larazzabal enroll IT11', 'read', '2016-02-22 03:04:58') ; 
INSERT INTO `fr_notification` VALUES (8, 7, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT11', 'read', '2016-02-22 03:05:09') ; 
INSERT INTO `fr_notification` VALUES (9, 2, 'subjectmanagement.php?subject=approve', 'Trina Larazzabal enroll IT11', 'read', '2016-02-22 03:09:06') ; 
INSERT INTO `fr_notification` VALUES (10, 7, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT11', 'read', '2016-02-22 03:09:15') ; 
INSERT INTO `fr_notification` VALUES (11, 2, 'subjectmanagement.php?subject=approve', 'Trina Larazzabal enroll IT11', 'read', '2016-02-22 03:10:43') ; 
INSERT INTO `fr_notification` VALUES (12, 7, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT11', 'read', '2016-02-22 03:11:01') ;
#
# End of data contents of table fr_notification
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_path (6 records)
#
 
INSERT INTO `fr_path` VALUES (1, './Data', 1) ; 
INSERT INTO `fr_path` VALUES (2, './Data/Instructor/Cantero, Joscoro', 2) ; 
INSERT INTO `fr_path` VALUES (3, './Data/Student/BSIT/Marapoc-552', 3) ; 
INSERT INTO `fr_path` VALUES (4, './Data/Dean/Tarre, Cheryl', 4) ; 
INSERT INTO `fr_path` VALUES (5, './Data/Student/BSIT/Mancera-445', 5) ; 
INSERT INTO `fr_path` VALUES (6, './Data/Student/BSBA/Larazzabal-123', 7) ;
#
# End of data contents of table fr_path
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
  `size_limit` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_staff (3 records)
#
 
INSERT INTO `fr_staff` VALUES (1, 1, 'admin', 'admin', 'admin', 100) ; 
INSERT INTO `fr_staff` VALUES (2, 2, 'Joscoro', 'Cantero', '', 5) ; 
INSERT INTO `fr_staff` VALUES (3, 4, 'Cheryl', 'Tarre', '', 5) ;
#
# End of data contents of table fr_staff
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
  `size_limit` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ControlNo` (`ControlNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_stud (4 records)
#
 
INSERT INTO `fr_stud` VALUES (1, 3, 552, 'Leo', 'Marapoc', '', 'BSIT', '4th Year', 1) ; 
INSERT INTO `fr_stud` VALUES (2, 5, 445, 'Sheila', 'Mancera', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (3, 6, 443, 'Romalyn', 'Bertudazo', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (4, 7, 123, 'Trina', 'Larazzabal', '', 'BSBA', '3rd Year', 0) ;
#
# End of data contents of table fr_stud
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
  `size_limit` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_stud_subject (3 records)
#
 
INSERT INTO `fr_stud_subject` VALUES (1, 3, 'IT11', './Data/Subject/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT11/Student/552-Marapoc', 1, '2016-02-22', '02:45:29', 'APPROVED', '33.3333333333') ; 
INSERT INTO `fr_stud_subject` VALUES (2, 5, 'IT11', './Data/Subject/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT11/Student/445-Mancera', 1, '2016-02-22', '02:59:20', 'APPROVED', '33.3333333333') ; 
INSERT INTO `fr_stud_subject` VALUES (6, 7, 'IT11', './Data/Subject/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT11/Student/123-Larazzabal', 1, '2016-02-22', '03:11:01', 'APPROVED', '33.3333333333') ;
#
# End of data contents of table fr_stud_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
 
INSERT INTO `fr_subject` VALUES (1, 'Free-Ele1', 'DBMS1', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (2, 'IT11', 'DBMS2', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (3, 'IT 9', 'Software Engineering', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (4, 'Free-Ele4', 'Digital Design', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (5, 'CpE 17', 'Control Systems', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (6, 'IT 12', 'Modeling & Simulation', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (7, 'IT 2', 'Computer Programming 1', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (8, 'IT8-A', 'OS', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (9, 'IT8-B', 'OS', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (10, 'CPE2', 'Computer Fundamentals & Prog', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (11, 'MATH3-A', 'Discrete Structures', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (12, 'MATH3-B', 'Discrete Structures', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (13, 'MATH6', 'Discrete Math', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (14, 'IT6', 'Computer & File Org', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (15, 'IT2-A', 'Computer Progrgamming 2', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (16, 'IT2-B', 'Computer Programming 2', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (17, 'IT7', 'Object Oriented Prog', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (18, 'IT17', 'ISS', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (19, 'IT 8', 'OOP', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (20, 'Thesis', 'Thesis Proposal', 'NOT ASSIGNED', 1) ;
#
# End of data contents of table fr_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_user (7 records)
#
 
INSERT INTO `fr_user` VALUES (1, 'admin', 'admin', 5, 'online', '2016-02-22 03:21:09', '2016-02-22 12:40:16', 1) ; 
INSERT INTO `fr_user` VALUES (2, 'cantero', '12345', 3, 'offline', '2016-02-22 03:03:58', '2016-02-22 03:20:00', 1) ; 
INSERT INTO `fr_user` VALUES (3, 'marapoc', '12345', 1, 'offline', '2016-02-22 03:00:46', '2016-02-22 03:03:50', 1) ; 
INSERT INTO `fr_user` VALUES (4, 'tarre', '12345', 4, 'offline', '2016-02-22 02:56:37', '2016-02-22 02:58:09', 1) ; 
INSERT INTO `fr_user` VALUES (5, 'mancera', '12345', 1, 'offline', '2016-02-22 02:58:30', '2016-02-22 03:03:19', 1) ; 
INSERT INTO `fr_user` VALUES (6, '443', '123', 1, 'pending', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (7, 'trina', '12345', 1, 'offline', '2016-02-22 03:03:36', '2016-02-22 03:21:04', 1) ;
#
# End of data contents of table fr_user
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_user_permissions (6 records)
#
 
INSERT INTO `fr_user_permissions` VALUES (1, 1, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (2, 2, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (3, 3, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (4, 4, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (5, 5, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (6, 7, 1, 1, 1, 1, 1) ;
#
# End of data contents of table fr_user_permissions
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Monday 22. February 2016 03:21 HKT
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
# Generated: Monday 22. February 2016 03:21 HKT
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


# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_archive (0 records)
#

#
# End of data contents of table fr_archive
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
# Generated: Saturday 20. February 2016 17:25 HKT
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
# Generated: Saturday 20. February 2016 17:25 HKT
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_ins_subject (4 records)
#
 
INSERT INTO `fr_ins_subject` VALUES (1, 4, 'IT17', './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT17', '2020-02-16', '16:20:21') ; 
INSERT INTO `fr_ins_subject` VALUES (2, 4, 'IT8', './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT8', '2020-02-16', '16:20:21') ; 
INSERT INTO `fr_ins_subject` VALUES (3, 4, 'IT2-A', './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT2-A', '2020-02-16', '16:20:21') ; 
INSERT INTO `fr_ins_subject` VALUES (4, 4, 'IT2-B', './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT2-B', '2020-02-16', '16:20:21') ;
#
# End of data contents of table fr_ins_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_news (1 records)
#
 
INSERT INTO `fr_news` VALUES (1, 1, 4, 'We have no Class in Monday.', '2016-02-20 17:20:34') ;
#
# End of data contents of table fr_news
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_notification (5 records)
#
 
INSERT INTO `fr_notification` VALUES (1, 4, 'subjectmanagement.php?subject=approve', 'Leo Marapoc enroll IT17', 'read', '2016-02-20 16:28:50') ; 
INSERT INTO `fr_notification` VALUES (2, 4, 'subjectmanagement.php?subject=approve', 'Leo Marapoc enroll IT2-A', 'read', '2016-02-20 16:28:50') ; 
INSERT INTO `fr_notification` VALUES (6, 3, 'newsfeed.php?', 'Joscoro Cantero is set a New Announcement ', 'read', '2016-02-20 17:20:34') ; 
INSERT INTO `fr_notification` VALUES (4, 3, 'enroll_subject.php?subject=subject', 'You are now enrolled in IT2-A', 'read', '2016-02-20 16:29:34') ; 
INSERT INTO `fr_notification` VALUES (5, 3, 'index.php?share=1', 'New folder shared IT17_Activity 1', 'read', '2016-02-20 16:34:14') ;
#
# End of data contents of table fr_notification
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_path (4 records)
#
 
INSERT INTO `fr_path` VALUES (1, './Data', 1) ; 
INSERT INTO `fr_path` VALUES (2, './Data/Dean/Tarre, Cheryl', 2) ; 
INSERT INTO `fr_path` VALUES (3, './Data/Instructor/Cantero, Joscoro', 4) ; 
INSERT INTO `fr_path` VALUES (4, './Data/Student/BSIT/Marapoc-552', 3) ;
#
# End of data contents of table fr_path
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_semester (1 records)
#
 
INSERT INTO `fr_semester` VALUES (1, '1st Semester', 1, 'Active') ;
#
# End of data contents of table fr_semester
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_share_folder (1 records)
#
 
INSERT INTO `fr_share_folder` VALUES (1, 1, 3, './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT17/Activity 1', 'IT17_Activity 1', 0, 1, '2016-02-20', '16:34:14', 'unset') ;
#
# End of data contents of table fr_share_folder
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_staff (3 records)
#
 
INSERT INTO `fr_staff` VALUES (1, 1, 'admin', 'admin', 'admin') ; 
INSERT INTO `fr_staff` VALUES (2, 2, 'Cheryl', 'Tarre', '') ; 
INSERT INTO `fr_staff` VALUES (3, 4, 'Joscoro', 'Cantero', '') ;
#
# End of data contents of table fr_staff
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
  `size` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ControlNo` (`ControlNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_stud (4 records)
#
 
INSERT INTO `fr_stud` VALUES (1, 3, 552, 'Leo', 'Marapoc', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (2, 5, 445, 'Sheila', 'Mancera', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (3, 6, 443, 'Romalyn', 'Bertudazo', '', 'BSIT', '4th Year', 0) ; 
INSERT INTO `fr_stud` VALUES (4, 7, 123, 'Trina', 'Larazzabal', '', 'BSBA', '3rd Year', 0) ;
#
# End of data contents of table fr_stud
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_stud_subject (2 records)
#
 
INSERT INTO `fr_stud_subject` VALUES (1, 3, 'IT17', './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT17/Student/552-Marapoc', 1, '2016-02-20', '16:29:34', 'APPROVED') ; 
INSERT INTO `fr_stud_subject` VALUES (2, 3, 'IT2-A', './Data/Instructor/Cantero, Joscoro/2016-2017/1st Semester/IT2-A/Student/552-Marapoc', 3, '2016-02-20', '16:29:34', 'APPROVED') ;
#
# End of data contents of table fr_stud_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_subject (6 records)
#
 
INSERT INTO `fr_subject` VALUES (1, 'IT17', 'Information Security System', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (2, 'IT8', 'OS', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (3, 'IT4', 'Presentation Skills', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (4, 'English 4', 'Business Communication', 'NOT ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (5, 'IT2-A', 'Computer Programming', 'ASSIGNED', 1) ; 
INSERT INTO `fr_subject` VALUES (6, 'IT2-B', 'Computer Programming', 'ASSIGNED', 1) ;
#
# End of data contents of table fr_subject
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
# Generated: Saturday 20. February 2016 17:25 HKT
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
 
INSERT INTO `fr_user` VALUES (1, 'admin', 'admin', 5, 'offline', '2016-02-20 04:27:37', '2016-02-20 04:27:47', 1) ; 
INSERT INTO `fr_user` VALUES (2, 'tarre', '12345', 4, 'online', '2016-02-20 05:25:00', '2016-02-20 05:24:46', 1) ; 
INSERT INTO `fr_user` VALUES (3, 'marapoc', '12345', 1, 'offline', '2016-02-20 04:28:24', '2016-02-20 05:24:19', 1) ; 
INSERT INTO `fr_user` VALUES (4, 'cantero', '12345', 3, 'offline', '2016-02-20 04:22:09', '2016-02-20 05:24:50', 1) ; 
INSERT INTO `fr_user` VALUES (5, '445', '123', 1, 'pending', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (6, '443', '123', 1, 'pending', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ; 
INSERT INTO `fr_user` VALUES (7, '123', '123', 1, 'pending', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1) ;
#
# End of data contents of table fr_user
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table fr_user_permissions (4 records)
#
 
INSERT INTO `fr_user_permissions` VALUES (1, 1, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (2, 2, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (3, 4, 1, 1, 1, 1, 1) ; 
INSERT INTO `fr_user_permissions` VALUES (4, 3, 1, 1, 1, 1, 1) ;
#
# End of data contents of table fr_user_permissions
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 20. February 2016 17:25 HKT
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
# Generated: Saturday 20. February 2016 17:25 HKT
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


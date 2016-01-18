CREATE DATABASE IF NOT EXISTS repo;

USE repo;

DROP TABLE IF EXISTS fr_archive;

CREATE TABLE `fr_archive` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `url` varchar(3000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS fr_course;

CREATE TABLE `fr_course` (
  `id` int(11) NOT NULL auto_increment,
  `CCode` varchar(50) NOT NULL,
  `CDesc` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO fr_course VALUES("1","BSIT","Bachelor of Science in Inforamtion Technology");
INSERT INTO fr_course VALUES("2","BSCS","Bachelor of Science in Computer Science");
INSERT INTO fr_course VALUES("3","ACT","Associate in Computer Technology");
INSERT INTO fr_course VALUES("4","BSCOE","Bachelor of Science in Computer Engineering");



DROP TABLE IF EXISTS fr_deadline;

CREATE TABLE `fr_deadline` (
  `id` int(11) NOT NULL auto_increment,
  `folder_id` varchar(200) NOT NULL,
  `date_deadline` date NOT NULL,
  `time_deadline` time NOT NULL,
  `status` enum('open','closed') NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `folder_id` (`folder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fr_deadline VALUES("1","1","2016-02-01","14:30:00","open");



DROP TABLE IF EXISTS fr_folder_owner;

CREATE TABLE `fr_folder_owner` (
  `id` int(11) NOT NULL auto_increment,
  `path_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS fr_ins_subject;

CREATE TABLE `fr_ins_subject` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `SubPath` varchar(1000) NOT NULL,
  `Date_Created` date NOT NULL,
  `Time_Created` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO fr_ins_subject VALUES("1","4","IT8","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT8","2018-01-16","05:37:36");
INSERT INTO fr_ins_subject VALUES("2","4","English 4","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/English 4","2018-01-16","05:37:36");
INSERT INTO fr_ins_subject VALUES("3","2","IT7","./Data/Dean/dean, dean/2016-2017/1st Semester/IT7","2018-01-16","05:38:43");
INSERT INTO fr_ins_subject VALUES("4","2","IT4","./Data/Dean/dean, dean/2016-2017/1st Semester/IT4","2018-01-16","05:38:43");
INSERT INTO fr_ins_subject VALUES("5","4","IT3","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT3","2019-01-16","03:22:43");



DROP TABLE IF EXISTS fr_notification;

CREATE TABLE `fr_notification` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` enum('unread','read') NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fr_notification VALUES("1","3","index.php?share=1","IT8_Activityis set a Deadline on 2016-02-01 14:30:00","read","2016-01-19 04:50:30");



DROP TABLE IF EXISTS fr_path;

CREATE TABLE `fr_path` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(30000) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO fr_path VALUES("1","./Data","1");
INSERT INTO fr_path VALUES("2","./Data/Dean/dean, dean","2");
INSERT INTO fr_path VALUES("3","./Data/Instructor/instructor, instructor","4");
INSERT INTO fr_path VALUES("4","./Data/Student/BSIT/student-1","3");



DROP TABLE IF EXISTS fr_semester;

CREATE TABLE `fr_semester` (
  `SemID` int(11) NOT NULL auto_increment,
  `Semester` varchar(100) NOT NULL,
  `SYID` int(11) NOT NULL,
  PRIMARY KEY  (`SemID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fr_semester VALUES("1","1st Semester","1");



DROP TABLE IF EXISTS fr_share_folder;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fr_share_folder VALUES("1","1","3","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT8/Activity","IT8_Activity","1","0","2016-01-19","03:47:41","set");



DROP TABLE IF EXISTS fr_staff;

CREATE TABLE `fr_staff` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `FirstN` varchar(50) NOT NULL,
  `LastN` varchar(50) NOT NULL,
  `midN` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO fr_staff VALUES("1","1","admin","admin","admin");
INSERT INTO fr_staff VALUES("2","2","dean","dean","dean");
INSERT INTO fr_staff VALUES("3","4","instructor","instructor","");



DROP TABLE IF EXISTS fr_stud;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fr_stud VALUES("1","3","1","student","student","","BSIT","4th Year","0");



DROP TABLE IF EXISTS fr_stud_subject;

CREATE TABLE `fr_stud_subject` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `Date_Created` date NOT NULL,
  `Time_Created` time NOT NULL,
  `status` enum('APPROVED','DISAPPROVED') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO fr_stud_subject VALUES("1","3","IT8","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT8/1-student-IT8","1","2016-01-18","05:41:32","APPROVED");
INSERT INTO fr_stud_subject VALUES("2","3","English 4","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/English 4/1-student-English 4","2","2016-01-18","05:41:32","APPROVED");
INSERT INTO fr_stud_subject VALUES("3","3","IT7","./Data/Dean/dean, dean/2016-2017/1st Semester/IT7/1-student-IT7","3","2016-01-18","05:39:26","APPROVED");
INSERT INTO fr_stud_subject VALUES("4","3","IT4","./Data/Dean/dean, dean/2016-2017/1st Semester/IT4/1-student-IT4","4","2016-01-18","05:40:44","APPROVED");
INSERT INTO fr_stud_subject VALUES("5","3","IT3","./Data/Instructor/instructor, instructor/2016-2017/1st Semester/IT3/1-student-IT3","5","2016-01-19","03:25:43","APPROVED");



DROP TABLE IF EXISTS fr_subject;

CREATE TABLE `fr_subject` (
  `subID` int(11) NOT NULL auto_increment,
  `SubCode` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `status` enum('ASSIGNED','NOT ASSIGNED') NOT NULL default 'NOT ASSIGNED',
  `SemID` int(11) NOT NULL,
  PRIMARY KEY  (`subID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO fr_subject VALUES("1","IT7","Computer Programming","ASSIGNED","1");
INSERT INTO fr_subject VALUES("2","IT8","Operating System","ASSIGNED","1");
INSERT INTO fr_subject VALUES("3","IT4","Presentation Skills","ASSIGNED","1");
INSERT INTO fr_subject VALUES("4","English 4","Business Communication","ASSIGNED","1");
INSERT INTO fr_subject VALUES("5","IT3","computer programming","ASSIGNED","1");



DROP TABLE IF EXISTS fr_sy;

CREATE TABLE `fr_sy` (
  `SYID` int(11) NOT NULL auto_increment,
  `SYstart` int(11) NOT NULL,
  `SYend` int(11) NOT NULL,
  PRIMARY KEY  (`SYID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fr_sy VALUES("1","2016","2017");



DROP TABLE IF EXISTS fr_user;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO fr_user VALUES("1","admin","admin","5","offline","2016-01-19 12:49:17","2016-01-19 03:24:30","1");
INSERT INTO fr_user VALUES("2","dean","12345","4","online","2016-01-19 05:10:05","2016-01-19 05:09:46","1");
INSERT INTO fr_user VALUES("3","student","12345","1","online","2016-01-19 04:36:27","2016-01-19 04:36:22","1");
INSERT INTO fr_user VALUES("4","instructor","12345","3","offline","2016-01-19 03:24:37","2016-01-19 05:08:46","1");



DROP TABLE IF EXISTS fr_user_permissions;

CREATE TABLE `fr_user_permissions` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `upload` int(11) NOT NULL,
  `download` int(11) NOT NULL,
  `create_folders` int(11) NOT NULL,
  `rename_F` int(11) NOT NULL,
  `delete_F` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO fr_user_permissions VALUES("1","1","1","1","1","1","1");
INSERT INTO fr_user_permissions VALUES("2","2","1","1","1","1","1");
INSERT INTO fr_user_permissions VALUES("3","3","1","1","1","1","1");
INSERT INTO fr_user_permissions VALUES("4","4","1","1","1","1","1");



DROP TABLE IF EXISTS position;

CREATE TABLE `position` (
  `ID` int(11) NOT NULL auto_increment,
  `Position` varchar(50) NOT NULL,
  `UserLvl` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO position VALUES("1","admin","5");
INSERT INTO position VALUES("2","Dean","4");
INSERT INTO position VALUES("3","Instructor","3");
INSERT INTO position VALUES("4","Working","2");
INSERT INTO position VALUES("5","Student","1");




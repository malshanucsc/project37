-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2016 at 07:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignment_id` varchar(767) NOT NULL,
  `assignment_title` varchar(200) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `guide` text NOT NULL,
  `course` int(4) NOT NULL,
  `lecturer` varchar(11) NOT NULL,
  PRIMARY KEY (`assignment_id`),
  UNIQUE KEY `assignment_id` (`assignment_id`),
  KEY `course` (`course`),
  KEY `lecturer` (`lecturer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_title`, `link`, `guide`, `course`, `lecturer`) VALUES
('2016-09-15 03:28:12 2145', 'Greedy assignment', '../Assignments/web design/lecture-2.pdf', 'greedy assignment 1', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batch_No` int(11) NOT NULL,
  `branch_Id` int(11) NOT NULL,
  `NO_students` int(11) NOT NULL,
  `done` int(1) NOT NULL,
  PRIMARY KEY (`batch_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_No`, `branch_Id`, `NO_students`, `done`) VALUES
(45, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_Id` varchar(11) NOT NULL,
  `branch_Name` text NOT NULL,
  `branch_head` text NOT NULL,
  `address` varchar(2000) NOT NULL,
  PRIMARY KEY (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_Id`, `branch_Name`, `branch_head`, `address`) VALUES
('1', 'Panagoda', 'S.Kaushalya', '202,Panagoda'),
('2', 'Kokavil', 'N.C.Dilum', '22b, kokavil');

-- --------------------------------------------------------

--
-- Table structure for table `branch_course`
--

CREATE TABLE IF NOT EXISTS `branch_course` (
  `branch_Id` varchar(11) NOT NULL,
  `course_Id` int(4) NOT NULL,
  PRIMARY KEY (`branch_Id`,`course_Id`),
  KEY `course_Id` (`course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_course`
--

INSERT INTO `branch_course` (`branch_Id`, `course_Id`) VALUES
('B1001', 1001),
('B1002', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_Id` int(11) NOT NULL,
  `Course_name` text NOT NULL,
  `duration` varchar(200) NOT NULL,
  PRIMARY KEY (`course_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_Id`, `Course_name`, `duration`) VALUES
(1, 'web design', '3 months'),
(2, 'SLCDLC', '3 Months'),
(3, 'Hardware', '4 months'),
(4, 'Graphic Design', '4 Months'),
(5, 'Kids Courses', '4 Months');

-- --------------------------------------------------------

--
-- Table structure for table `course_conduct`
--

CREATE TABLE IF NOT EXISTS `course_conduct` (
  `user_Id` varchar(20) NOT NULL,
  `course_Id` varchar(250) NOT NULL,
  `batch_No` int(11) NOT NULL,
  PRIMARY KEY (`user_Id`,`course_Id`,`batch_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_conduct`
--

INSERT INTO `course_conduct` (`user_Id`, `course_Id`, `batch_No`) VALUES
('2', '1', 45),
('2', '2', 46),
('2', '3', 47);

-- --------------------------------------------------------

--
-- Table structure for table `course_follow`
--

CREATE TABLE IF NOT EXISTS `course_follow` (
  `user_Id` varchar(11) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `batch_No` varchar(11) NOT NULL,
  `final_Mcq` int(11) NOT NULL,
  `final_Practical` int(11) NOT NULL,
  PRIMARY KEY (`user_Id`,`course_Id`,`batch_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_follow`
--

INSERT INTO `course_follow` (`user_Id`, `course_Id`, `batch_No`, `final_Mcq`, `final_Practical`) VALUES
('1', 1, '45', 90, 78),
('1', 2, '46', 0, 0),
('1', 3, '47', 0, 0),
('4', 1, '45', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `do_assignment`
--

CREATE TABLE IF NOT EXISTS `do_assignment` (
  `assignment_Id` varchar(767) NOT NULL,
  `user_Id` varchar(11) NOT NULL,
  `batch_No` varchar(11) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `marks` float NOT NULL,
  `link` varchar(1000) NOT NULL,
  `deadline` datetime NOT NULL,
  `submitteddate` datetime NOT NULL,
  `pubmark` tinyint(1) NOT NULL,
  PRIMARY KEY (`assignment_Id`,`user_Id`,`batch_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_assignment`
--

INSERT INTO `do_assignment` (`assignment_Id`, `user_Id`, `batch_No`, `course_Id`, `marks`, `link`, `deadline`, `submitteddate`, `pubmark`) VALUES
('2016-09-15 03:28:12 2145', '1', '45', 1, 0, '', '2016-09-20 12:00:00', '0000-00-00 00:00:00', 0),
('2016-09-15 03:28:12 2145', '4', '45', 1, 0, '', '2016-09-20 12:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `do_quiz`
--

CREATE TABLE IF NOT EXISTS `do_quiz` (
  `user_Id` varchar(11) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `quiz_Id` int(11) NOT NULL,
  `marks` float NOT NULL,
  PRIMARY KEY (`user_Id`,`quiz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_quiz`
--

INSERT INTO `do_quiz` (`user_Id`, `course_Id`, `quiz_Id`, `marks`) VALUES
('1', 1, 1, 70),
('1', 1, 2, 89),
('1', 2, 3, 45);

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE IF NOT EXISTS `family_member` (
  `stdnt_Id` varchar(11) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `title` varchar(5) NOT NULL,
  `service_start` date NOT NULL,
  `service_end` date NOT NULL,
  PRIMARY KEY (`stdnt_Id`,`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow_module`
--

CREATE TABLE IF NOT EXISTS `follow_module` (
  `module_Id` int(11) NOT NULL AUTO_INCREMENT,
  `course_Id` int(11) NOT NULL,
  `batch_No` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`module_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `follow_module`
--

INSERT INTO `follow_module` (`module_Id`, `course_Id`, `batch_No`, `user_Id`, `published`) VALUES
(51, 1, 45, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `give_assignment`
--

CREATE TABLE IF NOT EXISTS `give_assignment` (
  `assignment_Id` varchar(767) NOT NULL,
  `user_Id` varchar(11) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `batch_No` varchar(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`assignment_Id`,`user_Id`,`course_Id`,`batch_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `give_assignment`
--

INSERT INTO `give_assignment` (`assignment_Id`, `user_Id`, `course_Id`, `batch_No`, `published`, `deadline`) VALUES
('2016-09-15 03:28:12 2145', '2', 1, '45', 1, '2016-09-20 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `give_quiz`
--

CREATE TABLE IF NOT EXISTS `give_quiz` (
  `user_Id` varchar(11) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `quiz_Id` int(11) NOT NULL,
  `batch_No` varchar(11) NOT NULL,
  PRIMARY KEY (`user_Id`,`course_Id`,`quiz_Id`,`batch_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `give_quiz`
--

INSERT INTO `give_quiz` (`user_Id`, `course_Id`, `quiz_Id`, `batch_No`) VALUES
('2', 1, 1, '45'),
('2', 1, 2, '45');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `lec_Id` varchar(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `contact_No` varchar(12) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` int(11) NOT NULL,
  `date_Joined` date NOT NULL,
  PRIMARY KEY (`lec_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lec_Id`, `title`, `name`, `dob`, `contact_No`, `gender`, `address`, `date_Joined`) VALUES
('2', 'Dr', 'namal', '2014-11-11', '56546546', 'male', 46, '1993-10-10'),
('L1001', 'officer', 'N.Kumara', '1987-09-08', '712435674', 'Male', 0, '2000-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `msg_Title` varchar(250) NOT NULL,
  `message` text,
  `date_Received` date NOT NULL,
  PRIMARY KEY (`msg_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_Id`, `user_Id`, `new`, `msg_Title`, `message`, `date_Received`) VALUES
(1, 1, 0, 'Class cancellation', 'Class Cancellation on 12th of October 2016', '2016-08-02'),
(2, 1, 1, 'Exam Postponed', 'Exam has been postponed which was planned to held on 12th Dec 2016', '2016-08-23'),
(3, 2, 0, 'Exam Postponed', 'Exam has been postponed which was planned to held on 12th Dec 2016', '2016-08-29'),
(8, 2, 1, 'Lecturer Meeting', 'All lectures are required to attend to the meeting on 12th December 2016', '2016-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `module_Id` int(11) NOT NULL AUTO_INCREMENT,
  `module_Title` varchar(250) NOT NULL,
  `link` varchar(500) NOT NULL,
  `body` varchar(2000) NOT NULL,
  `course_Id` int(11) NOT NULL,
  UNIQUE KEY `module_Id` (`module_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_Id`, `module_Title`, `link`, `body`, `course_Id`) VALUES
(51, 'lesson 1', '../Modules/web design/lecture-1.pdf', 'lesson 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `quiz_Id` int(11) NOT NULL,
  `question_Id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_No` int(11) NOT NULL,
  `answer1` varchar(2000) NOT NULL,
  `answer2` varchar(2000) NOT NULL,
  `answer3` varchar(2000) NOT NULL,
  `answer4` varchar(2000) NOT NULL,
  PRIMARY KEY (`quiz_Id`,`question_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quiz_Id`, `question_Id`, `question`, `answer_No`, `answer1`, `answer2`, `answer3`, `answer4`) VALUES
(1, 1, 'what is capital of sri lanka', 3, 'Galle', 'Matara', 'Japura', 'Anuradhapura'),
(1, 2, 'what is our country ?', 1, 'Sri lanka', 'Australia', 'USA', 'Russia'),
(2, 1, 'who is the mammal ?', 4, 'Parrot', 'Gold Fish', 'Fly', 'Man'),
(2, 2, 'Which has the highest percentage in atmosphere ?', 2, 'CO2', 'N2', 'O2', 'H2');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_Id` int(11) NOT NULL,
  `module` varchar(200) NOT NULL,
  `No_quiz` int(11) NOT NULL,
  `upload_date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `instructions` text NOT NULL,
  `deadline` datetime NOT NULL,
  `course` int(11) NOT NULL,
  `lecturer` varchar(11) NOT NULL,
  PRIMARY KEY (`quiz_Id`),
  KEY `lecturer` (`lecturer`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_Id`, `module`, `No_quiz`, `upload_date`, `duration`, `instructions`, `deadline`, `course`, `lecturer`) VALUES
(1, 'General Knowledge', 0, '2016-08-03 13:00:00', 60, 'answer all questions', '2016-08-03 14:00:00', 1, 'L1001'),
(2, 'Science', 0, '2016-08-07 08:00:00', 60, 'Do all the questions', '2016-08-07 09:00:00', 1, 'L1001'),
(3, 'Computer science', 0, '2016-08-16 00:00:00', 60, 'do it', '2016-08-31 00:00:00', 2, 'L1001');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stdnt_Id` varchar(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `contact_No` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`stdnt_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdnt_Id`, `name`, `dob`, `contact_No`, `gender`, `address`) VALUES
('ST01', 'Malshan Wanigasekara', '1993-08-11', 717648576, 'Male', 'No 4/b, kotta road, Borella');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `NIC` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `contact_No` int(10) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `branch_Id` int(11) NOT NULL,
  `Type` int(1) NOT NULL,
  `registeredby` int(11) NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `NIC`, `password`, `name`, `dob`, `contact_No`, `address`, `branch_Id`, `Type`, `registeredby`) VALUES
(1, '', 'group37', 'R.M.R Wanigasekara', '2015-02-06', 714873714, 'Colombo', 1, 1, 0),
(2, '', 'group37', 'Dr. Perera', '1980-12-01', 711111111, 'UCSC,Reid avenue,Colombo 07,', 1, 2, 0),
(3, '', 'group37', 'admin', '1980-01-02', 5464654, 'Colombo', 1, 3, 0),
(4, '932216546V', 'ritti', 'Gevindu', '1993-08-10', 71234567, 'colombo ucs', 1, 1, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `course_assignment_fk` FOREIGN KEY (`course`) REFERENCES `course` (`course_Id`),
  ADD CONSTRAINT `lecturer_assignment_fk` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`lec_Id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `course_quiz_fk` FOREIGN KEY (`course`) REFERENCES `course` (`course_Id`),
  ADD CONSTRAINT `lecturer_quiz_fk` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`lec_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

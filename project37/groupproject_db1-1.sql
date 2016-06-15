-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 05:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `groupproject_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignment_id` varchar(11) NOT NULL,
  `assignment_title` varchar(200) NOT NULL,
  `publish_time` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `link` varchar(1000) NOT NULL,
  `guide` text NOT NULL,
  `course` int(4) NOT NULL,
  `lecturer` varchar(11) NOT NULL,
  KEY `course` (`course`),
  KEY `lecturer` (`lecturer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_Id` varchar(11) NOT NULL,
  `branch_Name` text NOT NULL,
  `branch_head` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_Id`, `branch_Name`, `branch_head`, `address`) VALUES
('B1001', 'Panagoda', 'S.Kaushalya', '202,Panagoda'),
('B1002', 'Kokavil', 'N.C.Dilum', '22b, kokavil');

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
(1, 'web design', '3 months');

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
('ST01', 1, '45', 80, 75);

-- --------------------------------------------------------

--
-- Table structure for table `do_assignment`
--

CREATE TABLE IF NOT EXISTS `do_assignment` (
  `assignment_Id` int(4) NOT NULL,
  `stdnt_Id` varchar(11) NOT NULL,
  `marks` float NOT NULL,
  PRIMARY KEY (`assignment_Id`,`stdnt_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_assignment`
--

INSERT INTO `do_assignment` (`assignment_Id`, `stdnt_Id`, `marks`) VALUES
(1, 'ST01', 80);

-- --------------------------------------------------------

--
-- Table structure for table `do_quiz`
--

CREATE TABLE IF NOT EXISTS `do_quiz` (
  `stdnt_Id` varchar(11) NOT NULL,
  `quiz_Id` int(11) NOT NULL,
  `marks` float NOT NULL,
  PRIMARY KEY (`stdnt_Id`,`quiz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_quiz`
--

INSERT INTO `do_quiz` (`stdnt_Id`, `quiz_Id`, `marks`) VALUES
('ST01', 201, 70);

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
('L1001', 'officer', 'N.Kumara', '1987-09-08', '712435674', 'Male', 0, '2000-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `message` text,
  `date_Received` date NOT NULL,
  PRIMARY KEY (`msg_Id`,`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `quiz_Id` int(11) NOT NULL,
  `question_Id` int(11) NOT NULL,
  `question_No` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer_No` int(11) NOT NULL,
  `answer_Set_ID` int(11) NOT NULL,
  PRIMARY KEY (`quiz_Id`,`question_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_Id` int(11) NOT NULL,
  `module` varchar(200) NOT NULL,
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
  `user_Id` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `contact_No` int(10) NOT NULL,
  `address` varchar(11) NOT NULL,
  `branch-Id` int(11) NOT NULL,
  `course_Id` int(11) NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `password`, `name`, `dob`, `contact_No`, `address`, `branch-Id`, `course_Id`) VALUES
('1', 'group37', 'Group project', '2015-02-06', 711234567, 'ucsc Colomb', 1, 1);

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
  ADD CONSTRAINT `lecturer_quiz_fk` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`lec_Id`),
  ADD CONSTRAINT `course_quiz_fk` FOREIGN KEY (`course`) REFERENCES `course` (`course_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 11:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tstp`
--
DROP DATABASE `tstp`;
CREATE DATABASE `tstp`; 
-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE IF NOT EXISTS `tstp`.`attends` (
  `s_id` char(10) NOT NULL,
  `p_id` char(10) NOT NULL,
  `P_fees_paid` decimal(10,2) DEFAULT NULL,
  `p_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attends`
--

INSERT INTO `tstp`.`attends` (`s_id`, `p_id`, `P_fees_paid`, `p_discount`) VALUES
('S001', 'P001', '2000.00', 100),
('S002', 'P002', '3000.00', 100),
('S003', 'P003', '2000.00', 100),
('S004', 'P002', '3000.00', 100),
('S005', 'P001', '2000.00', 100),
('S005', 'P002', '2000.00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `center_dim`
--

CREATE TABLE IF NOT EXISTS `tstp`.`center_dim` (
  `centerID` char(20) NOT NULL,
  `city` text,
  `county` text,
  `state` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_dim`
--

INSERT INTO `tstp`.`center_dim` (`centerID`, `city`, `county`, `state`) VALUES
('Center1', 'Palo Alto', 'Santa Clara', 'CA'),
('Center2', 'Mountain View', 'Santa Clara', 'CA'),
('Center20', 'Redmond', 'King', 'WA'),
('Center3', 'Menlo Park', 'San Mateo', 'CA'),
('Center4', 'Belmont', 'San Mateo', 'CA'),
('Center5', 'Seattle', 'King', 'WA');

-- --------------------------------------------------------

--
-- Table structure for table `conducts`
--

CREATE TABLE IF NOT EXISTS `tstp`.`conducts` (
  `m_id` char(10) NOT NULL,
  `p_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conducts`
--

INSERT INTO `tstp`.`conducts` (`m_id`, `p_id`) VALUES
('M001', 'P001'),
('M002', 'P002'),
('M003', 'P003');

-- --------------------------------------------------------

--
-- Table structure for table `cube`
--

CREATE TABLE IF NOT EXISTS `tstp`.`cube` (
  `centerID` char(20) DEFAULT NULL,
  `progID` char(20) DEFAULT NULL,
  `studID` char(20) DEFAULT NULL,
  `Total_Profit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cube`
--

INSERT INTO `tstp`.`cube` (`centerID`, `progID`, `studID`, `Total_Profit`) VALUES
('Center1', 'Program1', 'cust1', 100),
('Center1', 'Program1', 'cust2', 150),
('Center1', 'Program1', 'cust3', 450),
('Center1', 'Program1', NULL, 700),
('Center1', 'Program2', 'cust1', 300),
('Center1', 'Program2', 'cust2', 800),
('Center1', 'Program2', 'cust3', 400),
('Center1', 'Program2', NULL, 1500),
('Center1', 'Program3', 'cust1', 1050),
('Center1', 'Program3', NULL, 1050),
('Center1', NULL, NULL, 3250),
('Center2', 'Program1', 'cust2', 205),
('Center2', 'Program1', NULL, 205),
('Center2', 'Program2', 'cust1', 2800),
('Center2', 'Program2', 'cust2', 900),
('Center2', 'Program2', 'cust3', 1450),
('Center2', 'Program2', 'cust4', 1650),
('Center2', 'Program2', NULL, 6800),
('Center2', 'Program3', 'cust2', 200),
('Center2', 'Program3', NULL, 200),
('Center2', NULL, NULL, 7205),
('Center20', 'Program2', 'cust3', 950),
('Center20', 'Program2', 'cust4', 900),
('Center20', 'Program2', NULL, 1850),
('Center20', 'Program3', 'cust4', 1650),
('Center20', 'Program3', NULL, 1650),
('Center20', 'Program4', 'cust4', 1450),
('Center20', 'Program4', NULL, 1450),
('Center20', 'Program5', 'cust3', 1750),
('Center20', 'Program5', 'cust4', 450),
('Center20', 'Program5', NULL, 2200),
('Center20', NULL, NULL, 7150),
('Center3', 'Program2', 'cust2', 1650),
('Center3', 'Program2', 'cust3', 1450),
('Center3', 'Program2', NULL, 3100),
('Center3', 'Program3', 'cust2', 1450),
('Center3', 'Program3', 'cust3', 1050),
('Center3', 'Program3', NULL, 2500),
('Center3', NULL, NULL, 5600),
('Center4', 'Program3', 'cust1', 650),
('Center4', 'Program3', 'cust2', 700),
('Center4', 'Program3', NULL, 1350),
('Center4', 'Program4', 'cust3', 900),
('Center4', 'Program4', NULL, 900),
('Center4', NULL, NULL, 2250),
('Center5', 'Program4', 'cust1', 1000),
('Center5', 'Program4', 'cust2', 700),
('Center5', 'Program4', 'cust4', 1700),
('Center5', 'Program4', NULL, 3400),
('Center5', 'Program5', 'cust2', 1550),
('Center5', 'Program5', NULL, 1550),
('Center5', NULL, NULL, 4950),
(NULL, NULL, NULL, 30405);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `tstp`.`days` (
  `dateID` char(20) NOT NULL,
  `day` text,
  `month` text,
  `year` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `tstp`.`days` (`dateID`, `day`, `month`, `year`) VALUES
('day1', 'Monday', 'April', '2014'),
('day2', 'Sunday', 'December', '2014'),
('day3', 'Saturday', 'January', '2014'),
('day4', 'Sunday', 'March', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE IF NOT EXISTS `tstp`.`director` (
  `d_id` char(10) NOT NULL,
  `d_name` char(30) DEFAULT NULL,
  `d_email` char(30) DEFAULT NULL,
  `d_cellno` char(10) DEFAULT NULL,
  `d_gender` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `tstp`.`director` (`d_id`, `d_name`, `d_email`, `d_cellno`, `d_gender`) VALUES
('U001', 'DINESH SAXENA', 'dinesh@wright.edu', '9985917126', 'male'),
('U002', 'VISHNU VADRA', 'vishnu@wright.edu', '9985917126', 'male'),
('U003', 'KALAA RANI', 'rani@wright.edu', '9985917126', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_fact`
--

CREATE TABLE IF NOT EXISTS `tstp`.`enroll_fact` (
  `centerID` char(20) DEFAULT NULL,
  `progID` char(20) DEFAULT NULL,
  `studID` char(20) DEFAULT NULL,
  `dateID` char(20) DEFAULT NULL,
  `fees` text,
  `profit` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_fact`
--

INSERT INTO `tstp`.`enroll_fact` (`centerID`, `progID`, `studID`, `dateID`, `fees`, `profit`) VALUES
('Center1', 'Program1', 'cust1', 'day1', '1000', '100'),
('Center1', 'Program1', 'cust2', 'day2', '1500', '150'),
('Center1', 'Program1', 'cust3', 'day3', '3500', '200'),
('Center1', 'Program1', 'cust3', 'day4', '2500', '250'),
('Center1', 'Program2', 'cust1', 'day1', '2000', '300'),
('Center1', 'Program2', 'cust2', 'day2', '3400', '350'),
('Center1', 'Program2', 'cust3', 'day3', '4000', '400'),
('Center1', 'Program2', 'cust2', 'day4', '4000', '450'),
('Center1', 'Program3', 'cust1', 'day1', '1500', '500'),
('Center1', 'Program3', 'cust1', 'day2', '4300', '550'),
('Center2', 'Program3', 'cust2', 'day3', '1300', '200'),
('Center2', 'Program1', 'cust2', 'day4', '1500', '205'),
('Center2', 'Program2', 'cust3', 'day1', '1300', '700'),
('Center2', 'Program2', 'cust3', 'day2', '1400', '750'),
('Center2', 'Program2', 'cust4', 'day3', '1545', '800'),
('Center2', 'Program2', 'cust4', 'day4', '1560', '850'),
('Center2', 'Program2', 'cust1', 'day1', '1678', '900'),
('Center2', 'Program2', 'cust1', 'day2', '1450', '950'),
('Center2', 'Program2', 'cust1', 'day3', '1556', '950'),
('Center2', 'Program2', 'cust2', 'day4', '1330', '900'),
('Center3', 'Program2', 'cust2', 'day1', '1310', '850'),
('Center3', 'Program2', 'cust2', 'day2', '1540', '800'),
('Center3', 'Program2', 'cust3', 'day3', '1500', '750'),
('Center3', 'Program2', 'cust3', 'day4', '1220', '700'),
('Center3', 'Program3', 'cust3', 'day1', '3500', '200'),
('Center3', 'Program3', 'cust2', 'day2', '1200', '400'),
('Center3', 'Program3', 'cust2', 'day3', '1540', '550'),
('Center3', 'Program3', 'cust2', 'day4', '1560', '500'),
('Center3', 'Program3', 'cust3', 'day1', '2340', '450'),
('Center3', 'Program3', 'cust3', 'day2', '3000', '400'),
('Center4', 'Program3', 'cust1', 'day3', '4300', '350'),
('Center4', 'Program3', 'cust1', 'day4', '1100', '300'),
('Center4', 'Program3', 'cust2', 'day1', '2340', '250'),
('Center4', 'Program3', 'cust2', 'day2', '5400', '200'),
('Center4', 'Program3', 'cust2', 'day3', '4550', '150'),
('Center4', 'Program3', 'cust2', 'day4', '1100', '100'),
('Center4', 'Program4', 'cust3', 'day1', '1006', '150'),
('Center4', 'Program4', 'cust3', 'day2', '1501', '200'),
('Center4', 'Program4', 'cust3', 'day3', '1450', '250'),
('Center4', 'Program4', 'cust3', 'day4', '3000', '300'),
('Center5', 'Program4', 'cust4', 'day4', '4500', '350'),
('Center5', 'Program4', 'cust4', 'day1', '5500', '400'),
('Center5', 'Program4', 'cust4', 'day2', '1545', '450'),
('Center5', 'Program4', 'cust4', 'day3', '5500', '500'),
('Center5', 'Program4', 'cust1', 'day4', '6500', '550'),
('Center5', 'Program4', 'cust1', 'day1', '4400', '200'),
('Center5', 'Program4', 'cust1', 'day2', '3330', '250'),
('Center5', 'Program4', 'cust2', 'day3', '7500', '700'),
('Center5', 'Program5', 'cust2', 'day4', '8500', '750'),
('Center5', 'Program5', 'cust2', 'day2', '4400', '800'),
('Center20', 'Program5', 'cust3', 'day3', '9900', '850'),
('Center20', 'Program5', 'cust3', 'day3', '2240', '900'),
('Center20', 'Program2', 'cust3', 'day3', '1234', '950'),
('Center20', 'Program2', 'cust4', 'day4', '5640', '900'),
('Center20', 'Program3', 'cust4', 'day1', '4567', '850'),
('Center20', 'Program3', 'cust4', 'day2', '8500', '800'),
('Center20', 'Program4', 'cust4', 'day3', '6540', '750'),
('Center20', 'Program4', 'cust4', 'day4', '7650', '700'),
('Center20', 'Program5', 'cust4', 'day1', '3300', '250'),
('Center20', 'Program5', 'cust4', 'day2', '5430', '200');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `tstp`.`mentor` (
  `m_id` char(10) NOT NULL,
  `m_name` char(30) DEFAULT NULL,
  `m_email` char(30) DEFAULT NULL,
  `m_cellno` char(10) DEFAULT NULL,
  `m_gender` char(10) DEFAULT NULL,
  `m_salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `tstp`.`mentor` (`m_id`, `m_name`, `m_email`, `m_cellno`, `m_gender`, `m_salary`) VALUES
('M001', 'DINESH REDDY', 'reddy@wright.edu', '9985917126', 'male', '35000.00'),
('M002', 'VISHNU PAMMI', 'pammi@wright.edu', '9985917126', 'Male', '45000.00'),
('M003', 'SILK SMITHA', 'smitha@wright.edu', '9985917126', 'Female', '39000.00'),
('M004', 'MARYANA', 'MARYAN@gmail.com', '99884', 'Male', '34000.00');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_history`
--

CREATE TABLE IF NOT EXISTS `tstp`.`mentor_history` (
`m_ind` int(11) NOT NULL,
  `m_id` char(10) NOT NULL,
  `m_name` char(30) DEFAULT NULL,
  `m_email` char(30) DEFAULT NULL,
  `m_cellno` char(10) DEFAULT NULL,
  `m_gender` char(10) DEFAULT NULL,
  `m_salary` decimal(10,2) DEFAULT NULL,
  `m_vst` date DEFAULT NULL,
  `m_vet` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_history`
--

INSERT INTO `tstp`.`mentor_history` (`m_ind`, `m_id`, `m_name`, `m_email`, `m_cellno`, `m_gender`, `m_salary`, `m_vst`, `m_vet`) VALUES
(1, 'M001', 'DINESH REDDY', 'reddy@wright.edu', '9985917126', 'male', '35000.00', '2015-04-15', '2015-04-21'),
(2, 'M002', 'VISHNU PAMMI', 'pammi@wright.edu', '9985917126', 'male', '45000.00', '2015-04-17', '9999-12-31'),
(3, 'M003', 'SILK SMITHA', 'smitha@wright.edu', '9985917126', 'female', '39000.00', '2015-04-18', '9999-12-31'),
(4, 'M004', 'MARYANA', 'MARYAN@gmail.com', '99884', 'Male', '34000.00', '2015-04-21', '9999-12-31'),
(10, 'M001', 'DINESH REDDY', 'reddy@wright.edu', '9985917126', 'male', '35000.00', '2015-04-21', '2015-04-21'),
(11, 'M002', 'VISHNU PAMMI', 'pammi@wright.edu', '9985917126', 'Male', '45000.00', '2015-04-21', '2015-04-21'),
(12, 'M002', 'VISHNU PAMMI', 'pammi@wright.edu', '9985917126', 'Male', '45000.00', '2015-04-21', '9999-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `tstp`.`program` (
  `p_id` char(10) NOT NULL,
  `p_name` char(30) DEFAULT NULL,
  `p_city` char(30) DEFAULT NULL,
  `p_state` char(2) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `p_status` char(10) DEFAULT NULL,
  `p_fees` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `tstp`.`program` (`p_id`, `p_name`, `p_city`, `p_state`, `p_date`, `p_status`, `p_fees`) VALUES
('P001', 'JAVA', 'CINNCINATI', 'OH', '2015-05-19', 'Active', '2000.00'),
('P002', 'PHP', 'CHICAGO', 'IL', '2015-05-01', 'active', '3000.00'),
('P003', 'IOS', 'DALLAS', 'TX', '2015-05-01', 'active', '2500.00');

-- --------------------------------------------------------

--
-- Table structure for table `program_dim`
--

CREATE TABLE IF NOT EXISTS `tstp`.`program_dim` (
  `progID` char(20) NOT NULL,
  `category` text,
  `progname` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_dim`
--

INSERT INTO `tstp`.`program_dim` (`progID`, `category`, `progname`) VALUES
('Program1', 'FrontEnd', 'Java'),
('Program2', 'BackEnd', 'Java'),
('Program3', 'FrontEnd', 'Oracle'),
('Program4', 'BackEnd', 'Java'),
('Program5', 'BackEnd', 'Oracle');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `tstp`.`question` (
  `q_id` char(10) NOT NULL,
  `p_id` char(10) DEFAULT NULL,
  `s_id` char(10) DEFAULT NULL,
  `m_id` char(10) DEFAULT NULL,
  `q_query` char(30) DEFAULT NULL,
  `q_ans` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `tstp`.`question` (`q_id`, `p_id`, `s_id`, `m_id`, `q_query`, `q_ans`) VALUES
('q001', 'P001', 'S001', 'M001', 'PLEASE TELL ME THE STEPS TO IN', 'I WILL DISCUSS ABOUT THE SAME IN NEXT CLASS');

-- --------------------------------------------------------

--
-- Table structure for table `setsup`
--

CREATE TABLE IF NOT EXISTS `tstp`.`setsup` (
  `d_id` char(10) NOT NULL,
  `p_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setsup`
--

INSERT INTO `tstp`.`setsup` (`d_id`, `p_id`) VALUES
('U001', 'P001'),
('U001', 'P002'),
('U001', 'P003');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `tstp`.`student` (
  `s_id` char(10) NOT NULL,
  `s_name` char(30) DEFAULT NULL,
  `s_email` char(30) DEFAULT NULL,
  `s_cellno` char(10) DEFAULT NULL,
  `s_gender` char(10) DEFAULT NULL,
  `s_address` char(50) DEFAULT NULL,
  `s_age` int(11) DEFAULT NULL,
  `ADDED_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `tstp`.`student` (`s_id`, `s_name`, `s_email`, `s_cellno`, `s_gender`, `s_address`, `s_age`, `ADDED_DATE`) VALUES
('S001', 'SHRAVAN KUMAR', 'shravan@wright.edu', '9985917126', 'male', 'APT 11,FAIRBORB,OH', 23, '2015-04-20'),
('S002', 'MOHAN MALYA', 'mohan@wright.edu', '9985917126', 'male', 'LSPRINGS,FAIRBORB,OH', 24, '2015-04-20'),
('S003', 'NANDINI KASU', 'nandini@wright.edu', '9985917126', 'female', 'LSPRINGS,FAIRBORB,OH', 45, '2015-04-20'),
('S004', 'JAYA PAMMI', 'jaya@wright.edu', '9985917126', 'female', 'PKR PARK,FAIRBORB,OH', 34, '2015-04-20');

--
-- Triggers `student`
--
DELIMITER //
CREATE TRIGGER `tstp`.`BEFORE_INSERT_STUDENT` BEFORE INSERT ON `tstp`.`student`
 FOR EACH ROW SET NEW.ADDED_DATE = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_dim`
--

CREATE TABLE IF NOT EXISTS `tstp`.`student_dim` (
  `studID` char(20) NOT NULL,
  `sName` text,
  `gender` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_dim`
--

INSERT INTO `tstp`.`student_dim` (`studID`, `sName`, `gender`, `age`) VALUES
('cust1', 'Amy', 'F', 20),
('cust2', 'Bob', 'M', 21),
('cust3', 'Craig', 'M', 25),
('cust4', 'Doris', 'F', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attends`
--
ALTER TABLE `tstp`.`attends`
 ADD PRIMARY KEY (`s_id`,`p_id`);

--
-- Indexes for table `center_dim`
--
ALTER TABLE `tstp`.`center_dim`
 ADD PRIMARY KEY (`centerID`);

--
-- Indexes for table `conducts`
--
ALTER TABLE `tstp`.`conducts`
 ADD PRIMARY KEY (`m_id`,`p_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `tstp`.`days`
 ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `director`
--
ALTER TABLE `tstp`.`director`
 ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `tstp`.`mentor`
 ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `mentor_history`
--
ALTER TABLE `tstp`.`mentor_history`
 ADD PRIMARY KEY (`m_ind`);

--
-- Indexes for table `program`
--
ALTER TABLE `tstp`.`program`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `program_dim`
--
ALTER TABLE `tstp`.`program_dim`
 ADD PRIMARY KEY (`progID`);

--
-- Indexes for table `question`
--
ALTER TABLE `tstp`.`question`
 ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `setsup`
--
ALTER TABLE `tstp`.`setsup`
 ADD PRIMARY KEY (`d_id`,`p_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `tstp`.`student`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_dim`
--
ALTER TABLE `tstp`.`student_dim`
 ADD PRIMARY KEY (`studID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mentor_history`
--
ALTER TABLE `tstp`.`mentor_history`
MODIFY `m_ind` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

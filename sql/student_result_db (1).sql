-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 07:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_result_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Username`, `password`) VALUES
(1, 'Abir', '@birAbir032');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_code` varchar(40) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `credit_p_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_code`, `course_name`, `credit_p_course`) VALUES
('CHE109', 'Engineering Chemistry-1', 4),
('CSE105', 'Structured Programming', 4),
('CSE107', 'Object Oriented Programming', 4),
('CSE109', 'Electrical Circuits', 4),
('CSE205', 'Discrete Mathematics', 3),
('CSE207', 'Data Structures', 4),
('ENG101', 'Basic English', 3),
('MAT101', 'Differential & integral Calculas', 3),
('MAT102', 'Differential Equations & Special Functio', 3),
('MAT104', 'Co-ordinate Geometry & Vector Analysis', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mark_distribution`
--

CREATE TABLE `mark_distribution` (
  `Course_code` varchar(50) NOT NULL,
  `quiz` double NOT NULL,
  `classwork` double NOT NULL,
  `mid1` double NOT NULL,
  `mid2` double NOT NULL,
  `final` double NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark_distribution`
--

INSERT INTO `mark_distribution` (`Course_code`, `quiz`, `classwork`, `mid1`, `mid2`, `final`, `semester`) VALUES
('CSE105', 10, 30, 20, 20, 20, 'Spring2022'),
('CHE109', 10, 25, 20, 20, 25, 'Spring2022'),
('MAT101', 10, 20, 20, 20, 30, 'Spring2022'),
('ENG101', 10, 20, 20, 20, 30, 'Summer2022'),
('MAT102', 10, 20, 20, 20, 30, 'Summer2022'),
('MAT104', 10, 20, 20, 25, 25, 'Fall2022'),
('CSE107', 10, 40, 15, 15, 20, 'Summer2022'),
('CSE109', 10, 40, 15, 15, 20, 'Fall2022'),
('CSE205', 10, 20, 20, 25, 25, 'Fall2022'),
('CHE109', 10, 30, 20, 20, 20, 'Spring2021');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `student_f_id` varchar(50) NOT NULL,
  `Course_code` varchar(50) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `semesterinno` int(11) NOT NULL,
  `quiz` double NOT NULL,
  `classwork` double NOT NULL,
  `mid1` double NOT NULL,
  `mid2` double NOT NULL,
  `final` double NOT NULL,
  `gpa` double NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `student_f_id`, `Course_code`, `semester`, `semesterinno`, `quiz`, `classwork`, `mid1`, `mid2`, `final`, `gpa`, `grade`) VALUES
(5, '2022-1-60-2', 'CSE105', 'Spring2022', 1, 10, 25, 18, 18, 17, 3.7, 'A-'),
(6, '2022-1-60-2', 'CHE109', 'Spring2022', 1, 10, 30, 20, 20, 15, 4, 'A'),
(7, '2022-1-60-2', 'MAT101', 'Spring2022', 1, 10, 18, 18, 17, 25, 3.7, 'A-'),
(8, '2022-1-60-2', 'CSE107', 'Summer2022', 2, 9, 34, 14, 13, 18, 3.7, 'A-'),
(9, '2022-1-60-2', 'ENG101', 'Summer2022', 2, 8, 18, 18, 17, 15, 2.3, 'C+'),
(10, '2022-1-60-2', 'MAT102', 'Summer2022', 2, 8, 18, 17, 12, 23, 2.7, 'B-'),
(11, '2022-1-60-2', 'CSE109', 'Fall2022', 3, 8, 35, 13, 13, 17, 3.3, 'B+'),
(12, '2022-1-60-2', 'CSE205', 'Fall2022', 3, 9, 18, 18, 22, 22, 3.7, 'A-'),
(13, '2022-1-60-3', 'CHE109', 'Spring2022', 1, 10, 20, 18, 18, 22, 3.7, 'A-'),
(15, '2021-1-60-4', 'CHE109', 'Spring2022', 1, 10, 20, 18, 18, 18, 3.3, 'B+'),
(16, '2021-1-60-4', 'CSE107', 'Summer2022', 2, 8, 35, 13, 12, 18, 3.3, 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_f_id` varchar(50) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `dept_name` varchar(70) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `admited_semester` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_f_id`, `Name`, `email`, `password`, `dept_name`, `gender`, `dob`, `phone_no`, `address`, `admited_semester`) VALUES
(4, '2021-1-60-4', 'Sm arafat rahman', 'smarafat@std.ewubd.edu', '@birAbir032', 'CSE', 'Male', '2001-11-11', '+8801795424587', 'dhaka, bangladesh', 'Spring2021'),
(2, '2022-1-60-2', 'Sumit Hassan Eshan', 'sumit@std.ewubd.edu', '@birAbir032', 'CSE', 'Male', '2000-11-11', '+8801795424587', 'dhaka, bangladesh', 'Spring2022'),
(3, '2022-1-60-3', 'Md Fahim Faez Abir ', '2018-1-60-032@std.ewubd.edu', '@birAbir034', 'CSE', 'Male', '2000-02-22', '01795424587', 'dhaka, bangladesh', 'Spring2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_code`);

--
-- Indexes for table `mark_distribution`
--
ALTER TABLE `mark_distribution`
  ADD KEY `Course_code` (`Course_code`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_f_id` (`student_f_id`),
  ADD KEY `result_ibfk_1` (`Course_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mark_distribution`
--
ALTER TABLE `mark_distribution`
  ADD CONSTRAINT `mark_distribution_ibfk_1` FOREIGN KEY (`Course_code`) REFERENCES `course` (`Course_code`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`Course_code`) REFERENCES `course` (`Course_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

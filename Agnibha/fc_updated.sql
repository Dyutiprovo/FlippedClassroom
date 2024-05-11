-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 07:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fc_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_student`
--

CREATE TABLE `login_student` (
  `s_uid` varchar(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_student`
--

INSERT INTO `login_student` (`s_uid`, `s_name`, `password`) VALUES
('100', 'AGNIBHA', 'abc'),
('101', 'DYUTIPROVO', '123'),
('102', 'SAMANTA', 'good'),
('103', 'AKASH', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `login_teacher`
--

CREATE TABLE `login_teacher` (
  `t_uid` int(10) NOT NULL,
  `t_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_teacher`
--

INSERT INTO `login_teacher` (`t_uid`, `t_name`, `password`) VALUES
(1000, 'RANIT', 'good'),
(1001, 'RITESH', '4123'),
(1002, 'SAYANI', '1234'),
(1003, 'SUPARNA', 'bye'),
(1004, 'SAMRAT', 'helo'),
(1005, 'SWAPNA', 'good123'),
(1006, 'SOUMITA', 'world'),
(1007, 'SHARABH', '9872');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `sub_uid` varchar(20) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `material_size` int(20) NOT NULL,
  `material_type` varchar(100) NOT NULL,
  `material_path` varchar(100) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`sub_uid`, `material_name`, `material_size`, `material_type`, `material_path`, `upload_date`) VALUES
('PEC-IT602B', 'chpass.png', 724, 'image/png', 'uploads/chpass.png', '2024-04-30 14:13:34'),
('PEC-IT602B', 'admin_login.png', 14443, 'image/png', 'uploads/admin_login.png', '2024-05-10 15:55:34'),
('PCC-CS602', 'up-arrow.png', 8440, 'image/png', 'uploads/up-arrow.png', '2024-05-11 03:44:39'),
('OEC-IT601B', 'profile.png', 853, 'image/png', 'uploads/profile.png', '2024-05-11 03:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `sub_uid` varchar(10) NOT NULL,
  `course_content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `sub_uid`, `course_content`) VALUES
('100', 'OEC-IT601B', ''),
('100', 'PCC-CS601', ''),
('100', 'PCC-CS602', ''),
('100', 'PEC-IT601D', ''),
('100', 'PEC-IT602D', ''),
('101', 'OEC-IT601A', ''),
('101', 'PCC-CS601', ''),
('101', 'PCC-CS602', ''),
('101', 'PEC-IT601B', ''),
('101', 'PEC-IT602B', ''),
('102', 'OEC-IT601A', ''),
('102', 'PCC-CS601', ''),
('102', 'PCC-CS602', ''),
('102', 'PEC-IT601B', ''),
('102', 'PEC-IT602B', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `s_name` varchar(40) NOT NULL,
  `s_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`s_name`, `s_id`) VALUES
('Numerical Methods', 'OEC-IT601A'),
('Human Resource Development', 'OEC-IT601B'),
('Database Management Systems', 'PCC-CS601'),
('Computer Networks', 'PCC-CS602'),
('Distributed DBMS', 'PEC-IT601B'),
('Image Processing', 'PEC-IT601D'),
('Data Warehousing and Data Mining', 'PEC-IT602B'),
('Pattern Recognition', 'PEC-IT602D');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_uid` int(10) NOT NULL,
  `sub_uid` varchar(10) NOT NULL,
  `course_content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_uid`, `sub_uid`, `course_content`) VALUES
(1000, 'PEC-IT602B', ''),
(1001, 'PEC-IT602D', ''),
(1002, 'PEC-IT601D', ''),
(1003, 'PEC-IT601B', ''),
(1004, 'PCC-CS601', ''),
(1005, 'PCC-CS602', ''),
(1006, 'OEC-IT601B', ''),
(1007, 'OEC-IT601A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_student`
--
ALTER TABLE `login_student`
  ADD PRIMARY KEY (`s_uid`);

--
-- Indexes for table `login_teacher`
--
ALTER TABLE `login_teacher`
  ADD PRIMARY KEY (`t_uid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`,`sub_uid`),
  ADD KEY `student_subject` (`sub_uid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_uid`,`sub_uid`),
  ADD KEY `teacher_subject` (`sub_uid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `login_student` (`s_uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subject` FOREIGN KEY (`sub_uid`) REFERENCES `subjects` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`t_uid`) REFERENCES `login_teacher` (`t_uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_subject` FOREIGN KEY (`sub_uid`) REFERENCES `subjects` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

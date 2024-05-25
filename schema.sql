-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 06:01 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_list`
--

CREATE TABLE `attendance_list` (
  `id` int(20) NOT NULL,
  `StudentID` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL,
  `today` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_list`
--

INSERT INTO `attendance_list` (`id`, `StudentID`, `name`, `course`, `section`, `time_in`, `day`, `today`) VALUES
(32, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '09:48:53 PM | December 08, 2021 Wednesday', 'Wednesday', 'December 08, 2021'),
(33, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '09:49:22 PM | December 08, 2021 Wednesday', 'Wednesday', 'December 08, 2021'),
(34, '18-0COL-002015', 'Rolinda Sarmiento Gaynor', 'BSIS', 'IS-4', '09:49:44 PM | December 08, 2021 Wednesday', 'Wednesday', 'December 08, 2021'),
(35, '19-0COL-003365', 'John Paul Lizo Labatete', 'BSIS', 'IS-4', '09:49:55 PM | December 08, 2021 Wednesday', 'Wednesday', 'December 08, 2021'),
(39, '19-0COL-003365', 'John Paul Lizo Labatete', 'BSIS', 'IS-4', '02:04:17 PM | December 09, 2021 Thursday', 'Thursday', 'December 09, 2021'),
(40, '18-0COL-002022', 'Jennifer Magno Ulgasan', 'BSIS', 'IS-4', '02:04:32 PM | December 09, 2021 Thursday', 'Thursday', 'December 09, 2021'),
(41, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '09:38:13 AM | December 14, 2021 Tuesday', 'Tuesday', 'December 14, 2021'),
(56, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '10:53:16 PM | December 15, 2021 Wednesday', 'Wednesday', 'December 15, 2021'),
(65, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '06:49:35 PM | December 23, 2021 Thursday', 'Thursday', 'December 23, 2021'),
(66, '18-0ocol-003072', 'Wally Doroja Gaynor', 'BSIS', 'BSBA', '12:28:03 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(67, '19-0COL-003167', 'Laurence Bandiola Lamprea', 'BSIS', 'IS-4', '12:28:07 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(68, '18-0ocol-003072', 'Wally Doroja Gaynor', 'BSIS', 'BSBA', '12:28:20 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(69, '19-0COL-003167', 'Laurence Bandiola Lamprea', 'BSIS', 'IS-4', '12:28:22 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(70, '19-0COL-003365', 'John Paul Lizo Labatete', 'BSIS', 'IS-4', '12:29:39 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(71, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '12:29:46 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(72, '19-0COL-003365', 'John Paul Lizo Labatete', 'BSIS', 'IS-4', '12:29:58 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(73, '18-0COL-002022', 'Jennifer Magno Ulgasan', 'BSIS', 'IS-4', '12:30:03 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(74, '18-0COL-002015', 'Rolinda Sarmiento Gaynor', 'BSIS', 'IS-4', '12:30:08 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022'),
(75, '18-0COL-002031', 'Angelika Esperanzate Castillo', 'BSIS', 'IS-4', '12:30:13 AM | October 31, 2022 Monday', 'Monday', 'October 31, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_today`
--

CREATE TABLE `attendance_today` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` varchar(15) NOT NULL,
  `time_in` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(20) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `time` varchar(30) NOT NULL,
  `day` varchar(20) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `start_time`, `time`, `day`, `teacher`, `subject`, `section`, `room`) VALUES
(1, '10:30 am', '10:30 - 12:00', 'Tuesday', 'Ms. Hazel San Patilano', 'Capstone Project 2', 'IS-4', '302'),
(2, '10:30 am', '10:30 - 12:00', 'Wednesday', 'Ms. Hazel San Patilano', 'IS Innovation and New Technologies', 'IS-4', '403'),
(3, '1:00 pm', '1:00 - 2:30', 'Wednesday', 'Ms. Hazel San Patilano', 'IS Electives 3 business Intellegence', 'IS-4', '204'),
(4, '2:30 pm', '2:30 - 4:00', 'Tuesday', 'Ms. Nonelia Tasis', 'IS Electives 4 Enterprice Resources Planning', 'IS-4', '504');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Id` int(20) NOT NULL,
  `StudentId` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Id`, `StudentId`, `firstname`, `middlename`, `lastname`, `section`, `course`, `email`) VALUES
(3, '18-0COL-002031', 'Angelika', 'Esperanzate', 'Castillo', 'IS-4', 'BSIS', ''),
(7, '18-0COL-002015', 'Rolinda', 'Sarmiento', 'Gaynor', 'IS-4', 'BSIS', ''),
(8, '19-0COL-003370', 'Red Christian', 'Eusevio', 'Guinto', 'IS-4', 'BSIS', ''),
(9, '19-0COL-003365', 'John Paul', 'Lizo', 'Labatete', 'IS-4', 'BSIS', ''),
(10, '19-0COL-003167', 'Laurence', 'Bandiola', 'Lamprea', 'IS-4', 'BSIS', ''),
(14, '19-0COL-003365', 'John Paul', 'Mallari', 'Siervo', 'IS-4', 'BSIS', ''),
(15, '18-0COL-003069', 'Rigor Marco', 'Moseros', 'Tating', 'IS-4', 'BSIS', ''),
(18, '18-0COL-002022', 'Jennifer', 'Magno', 'Ulgasan', 'IS-4', 'BSIS', ''),
(62, '18-0OCOL-003072', 'Wally', 'Doroja', 'Gaynor', 'BSBA', 'BSIS', 'walliegaynor@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sec1` varchar(20) NOT NULL,
  `sec2` varchar(20) NOT NULL,
  `sec3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `password`, `name`, `sec1`, `sec2`, `sec3`) VALUES
(1, 'teacher1', 'teacher1', 'Hazel San Patilano', 'IS-4', 'IS-3', 'IS-2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_list`
--
ALTER TABLE `attendance_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_today`
--
ALTER TABLE `attendance_today`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_list`
--
ALTER TABLE `attendance_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `attendance_today`
--
ALTER TABLE `attendance_today`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

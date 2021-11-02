-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 05:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mm`
--

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetingID` int(11) NOT NULL,
  `meetingDate` datetime NOT NULL,
  `meetingPairingID` int(11) NOT NULL,
  `meetingObjectives` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meetingTargets` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meetingID`, `meetingDate`, `meetingPairingID`, `meetingObjectives`, `meetingTargets`) VALUES
(1, '2021-09-08 18:36:15', 1, 'First Meeting discussed objectives', 'Have objectives decided');

-- --------------------------------------------------------

--
-- Table structure for table `pairing`
--

CREATE TABLE `pairing` (
  `pairingID` int(11) NOT NULL,
  `pairingMentorID` int(11) NOT NULL,
  `pairingMenteeID` int(11) NOT NULL,
  `pairingTeacherID` int(11) NOT NULL,
  `pairingSubjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pairing`
--

INSERT INTO `pairing` (`pairingID`, `pairingMentorID`, `pairingMenteeID`, `pairingTeacherID`, `pairingSubjectID`) VALUES
(1, 1, 2, 5, 1),
(2, 4, 5, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `studentForename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentSurname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentUsername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentCreatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentForename`, `studentSurname`, `studentUsername`, `studentPassword`, `studentCreatedAt`) VALUES
(1, 'Laila', 'Wood', 'LailaWood123', 'LailaWood123', '2021-09-08 20:28:49'),
(2, 'Miley', 'Wood', 'MileyWood123', 'MileyWood123', '2021-09-08 20:28:49'),
(4, 'Molly', 'Read', 'Phoebe123', '$2y$10$uTd6fgpS1SacfeijYNYjOeEC/U0sgTPIuPpCp795Dcq0ekKfctlJa', '2021-09-22 18:34:50'),
(5, 'Phoebe', 'Read', 'Molly123', '$2y$10$JNMyP1g6rI.LtlFuTIAaA.BAn709DiG8wbx49M/xOyV7frS7kkP5m', '2021-09-22 18:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) NOT NULL,
  `subjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`) VALUES
(1, 'Computer Science'),
(2, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherForename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacherSurname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacherUsername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacherPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacherCreatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherForename`, `teacherSurname`, `teacherUsername`, `teacherPassword`, `teacherCreatedAt`) VALUES
(5, 'Mark', 'Wood', 'MarkWood123', 'MarkWood123', '2021-09-08 20:33:08'),
(7, 'Katy', 'Wood', 'KatyWood123', 'KatyWood123', '2021-09-08 20:33:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetingID`),
  ADD KEY `FKmeetingPairingID` (`meetingPairingID`);

--
-- Indexes for table `pairing`
--
ALTER TABLE `pairing`
  ADD PRIMARY KEY (`pairingID`),
  ADD KEY `FKpairingMentorID` (`pairingMentorID`),
  ADD KEY `FKpairingMenteeID` (`pairingMenteeID`),
  ADD KEY `FKpairingTeacherID` (`pairingTeacherID`),
  ADD KEY `FKpairingSubjectID` (`pairingSubjectID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `studentID` (`studentUsername`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD UNIQUE KEY `teacherID` (`teacherUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pairing`
--
ALTER TABLE `pairing`
  MODIFY `pairingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `FKmeetingPairingID` FOREIGN KEY (`meetingPairingID`) REFERENCES `pairing` (`pairingID`) ON UPDATE CASCADE;

--
-- Constraints for table `pairing`
--
ALTER TABLE `pairing`
  ADD CONSTRAINT `FKpairingMenteeID` FOREIGN KEY (`pairingMenteeID`) REFERENCES `student` (`studentID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FKpairingMentorID` FOREIGN KEY (`pairingMentorID`) REFERENCES `student` (`studentID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FKpairingSubjectID` FOREIGN KEY (`pairingSubjectID`) REFERENCES `subject` (`subjectID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FKpairingTeacherID` FOREIGN KEY (`pairingTeacherID`) REFERENCES `teacher` (`teacherID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

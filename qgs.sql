-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8383
-- Generation Time: Aug 03, 2022 at 09:14 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `c_code` varchar(10) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `teacher_uid` int(5) DEFAULT NULL,
  PRIMARY KEY (`c_code`),
  KEY `fk_foreign_key_name` (`teacher_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_code`, `c_name`, `branch`, `teacher_uid`) VALUES
('cs1', 'ada', 'cse', 123),
('cs2', 'dbms', 'cse', 123),
('cse3', 'la', 'cse', 123),
('20cse41', 'dbms', 'cse', 143),
('20cs42', 'ada', 'cse', 143);

-- --------------------------------------------------------

--
-- Table structure for table `gq`
--

DROP TABLE IF EXISTS `gq`;
CREATE TABLE IF NOT EXISTS `gq` (
  `c_code` varchar(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `prepared_by` varchar(10) NOT NULL,
  `ukey` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gq`
--

INSERT INTO `gq` (`c_code`, `question`, `prepared_by`, `ukey`) VALUES
('20cs42', 'what is an algorithm ?', '143', '143'),
('20cs42', 'write an algorithmfor selection sort ?', '143', '143'),
('20cs42', 'write an algorithmfor bubble sort ?', '143', '143'),
('20cs42', 'write an algorithmfor merge sort ?', '143', '143');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `c_code` varchar(10) NOT NULL,
  `question` varchar(50) NOT NULL,
  `marks` int(5) NOT NULL,
  `prepared_by_tuid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`c_code`, `question`, `marks`, `prepared_by_tuid`) VALUES
('cs1', 'what is dba?', 5, 123),
('cs1', 'what is sql ?', 5, 123),
('cs1', 'what is 1 nf ?', 5, 123),
('cs1', 'what is 2nf ?', 5, 123),
('cs1', 'what is entity?', 5, 123),
('cs1', 'what is er diagram?', 5, 123),
('20cs42', 'what is an algorithm ?', 5, 143),
('20cs42', 'write an algorithmfor selection sort ?', 5, 143),
('20cs42', 'write an algorithmfor bubble sort ?', 5, 143),
('20cs42', 'write an algorithmfor insertion sort ?', 5, 143),
('20cs42', 'write an algorithmfor merge sort ?', 5, 143),
('cs1', 'write an algorithmfor quick sort ?', 5, 143),
('20cs42', 'write an algorithmfor binary search  ?', 5, 143),
('20cs42', 'write an algorithmfor GCD of 2 numbers ?', 5, 143);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `fname` varchar(20) NOT NULL,
  `ph_no` varchar(11) DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `pass`, `fname`, `ph_no`, `email`) VALUES
(143, 'sanaa', 'sana', 'shabeena', '9591072027', 'santhubgsp@gmail.com'),
(123, 'sana', 'sana', 'santhosh', '9591072027', 'santhu@shabbu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

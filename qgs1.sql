-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 26, 2022 at 04:53 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `gq`
--

DROP TABLE IF EXISTS `gq`;
CREATE TABLE IF NOT EXISTS `gq` (
  `c_code` varchar(10) NOT NULL,
  `sec` varchar(5) NOT NULL,
  `question` varchar(100) NOT NULL,
  `marks` int(10) NOT NULL,
  `prepared_by` varchar(10) NOT NULL,
  `ukey` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `c_code` varchar(10) DEFAULT NULL,
  `question` varchar(50) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `prepared_by_tuid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

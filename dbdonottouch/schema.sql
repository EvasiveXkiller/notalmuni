-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:10365
-- Generation Time: Mar 05, 2021 at 07:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almuni`
--
CREATE DATABASE IF NOT EXISTS `almuni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `almuni`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(45) DEFAULT NULL,
  `admin_email` varchar(45) DEFAULT NULL,
  `admin_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Carlson', 'notcarlson@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE `annoucements` (
  `annouce_id` int(11) NOT NULL,
  `annouce_title` varchar(45) NOT NULL,
  `annouce_content` varchar(1000) NOT NULL,
  `annouce_author` varchar(45) NOT NULL,
  `timestamp_` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annoucements`
--

INSERT INTO `annoucements` (`annouce_id`, `annouce_title`, `annouce_content`, `annouce_author`, `timestamp_`) VALUES
(9, 'a this is annoyinh', 'What the hell is this test i hope it work', 'Carlson', '2021-02-02 14:31:04'),
(10, 'boi this is something that works', 'i hope the sorting system works', 'Carlson', '2021-02-02 14:45:13'),
(11, 'RRRRRR', 'this should work', 'Carlson', '2021-02-02 15:17:43'),
(14, 'This is somebody', 'Yaya', 'Carlson', '2021-02-05 20:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_identity` varchar(22) DEFAULT NULL,
  `user_address` varchar(45) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_DOB` date DEFAULT NULL,
  `main_contact` varchar(20) DEFAULT NULL,
  `home_contact` varchar(20) DEFAULT NULL,
  `office_contact` varchar(20) DEFAULT NULL,
  `user_notes` varchar(1000) DEFAULT NULL,
  `status_` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `user_email`, `user_identity`, `user_address`, `user_gender`, `user_password`, `user_DOB`, `main_contact`, `home_contact`, `office_contact`, `user_notes`, `status_`) VALUES
(2, 'test', 'evasivexkiller@gmail.com', '023659856322', 'Hong Kong', 'female', '$2y$10$x6IiF1kmcwaLvb5xkJNgnOehHnQFag1FOsk9YMCJLlfYS41i1BU3q', '2019-06-02', '012-369-2012', '023-698-4569', '03-96547851', 'This is sometest that we should take care of', 'ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_password_UNIQUE` (`admin_password`),
  ADD UNIQUE KEY `admin_id_UNIQUE` (`admin_id`);

--
-- Indexes for table `annoucements`
--
ALTER TABLE `annoucements`
  ADD PRIMARY KEY (`annouce_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annoucements`
--
ALTER TABLE `annoucements`
  MODIFY `annouce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

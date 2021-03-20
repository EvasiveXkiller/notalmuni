-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:10365
-- Generation Time: Mar 20, 2021 at 08:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
DROP DATABASE IF EXISTS `almuni`;
CREATE DATABASE IF NOT EXISTS `almuni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `almuni`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(45) DEFAULT NULL,
  `admin_email` varchar(45) DEFAULT NULL,
  `admin_password` varchar(1000) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_id_UNIQUE` (`admin_id`),
  UNIQUE KEY `admin_password_UNIQUE` (`admin_password`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Carlson', 'notcarlson@gmail.com', '$2y$10$rfCleVOn0wmYbhCPUPOFbe7YdVon4VU4dbeICyFHkAYpVUkY6Okyi');

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE IF NOT EXISTS `annoucements` (
  `annouce_id` int(11) NOT NULL AUTO_INCREMENT,
  `annouce_title` varchar(45) NOT NULL,
  `annouce_content` varchar(1000) NOT NULL,
  `annouce_author` varchar(45) NOT NULL,
  `timestamp_` datetime NOT NULL,
  PRIMARY KEY (`annouce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annoucements`
--

INSERT INTO `annoucements` (`annouce_id`, `annouce_title`, `annouce_content`, `annouce_author`, `timestamp_`) VALUES
(16, 'Welcome To Almuni!', 'We hope that you enjoy your stay here! Feel free to look around for the things that you can do here', 'Carlson', '2021-03-20 15:22:42'),
(17, 'All contacts are securely stored!', 'Your contacts are stored with the latest technology that are all secured. Your password is also hashed too! This means in case of a data breach, your passwords are all still encrypted and non readable. Have fun!', 'Carlson', '2021-03-20 15:24:14'),
(18, 'Lorem ipsum dolor sit amet', 'Yep, that is the announcement that we have to make. We just like you to know that all of us are still human beings and not robots. Have fun!!', 'Carlson', '2021-03-20 15:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `imagepath` varchar(1000) DEFAULT NULL,
  `user_identity` varchar(22) DEFAULT NULL,
  `user_address` varchar(45) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_DOB` date DEFAULT NULL,
  `main_contact` varchar(20) DEFAULT NULL,
  `home_contact` varchar(20) DEFAULT NULL,
  `office_contact` varchar(20) DEFAULT NULL,
  `user_notes` varchar(1000) DEFAULT NULL,
  `status_` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `user_email`, `imagepath`, `user_identity`, `user_address`, `user_gender`, `user_password`, `user_DOB`, `main_contact`, `home_contact`, `office_contact`, `user_notes`, `status_`) VALUES
(113, 'Jack Tok', 'jack@gmail.com', 'userimages/113.jpg', '', '', 'male', '$2y$10$M/5pPhGEp/DDC49LuWqFEewAfyCZ7tbypsJVzG3WHLKlfzLwKWdQu', '0000-00-00', '+60123456789', '03-12345678', '03-12345678,126', '    ', 'ok'),
(114, 'Shelia', 'shelia@gmail.com', NULL, '', '', 'female', '$2y$10$0lK0cOLRpbxNX0WEVI8MFeIvzTaFFmqMi9j.YTLiomhBVa6uIg1Di', NULL, NULL, NULL, NULL, NULL, 'pending'),
(115, 'Carlson', 'carlson@gmail.com', NULL, '', '', 'male', '$2y$10$0uJTLMPJATADjl/Wpn83he4B2aB/k7.eIyIqQsCLuLEukwO.yuTFi', NULL, NULL, NULL, NULL, NULL, 'pending');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

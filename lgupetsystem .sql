-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2024 at 10:15 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lgupetsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

DROP TABLE IF EXISTS `adoptions`;
CREATE TABLE IF NOT EXISTS `adoptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `pet_name` varchar(50) DEFAULT NULL,
  `pet_type` varchar(50) DEFAULT NULL,
  `reason` text,
  `experience` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `name`, `email`, `phone`, `address`, `pet_name`, `pet_type`, `reason`, `experience`) VALUES
(1, 'acee', 'macefelixerp@gmail.com', '39482694823', 'saranay', 'wendhil', 'Dog', 'dsadasdas', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `lgu_system`
--

DROP TABLE IF EXISTS `lgu_system`;
CREATE TABLE IF NOT EXISTS `lgu_system` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lgu_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lgu_system`
--

INSERT INTO `lgu_system` (`id`, `lgu_name`) VALUES
(1, 'Barangay Animal Welfare');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(100) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_age` int DEFAULT NULL,
  `pet_breed` varchar(50) DEFAULT NULL,
  `address` text,
  `pet_image` blob,
  `vaccine_record` blob,
  `additional_info` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `owner_name`, `pet_name`, `pet_age`, `pet_breed`, `address`, `pet_image`, `vaccine_record`, `additional_info`) VALUES
(1, 'honey', 'merry', 1, 'chuahua', 'green', 0x7065745f696d6167652f757365722e706e67, 0x69636f6e73382d7365617263682d33302e706e67, 'merry chubby'),
(2, 'honey', 'merry', 1, 'chuahua', 'green', 0x7065745f696d6167652f616e696d616c5f77656c666172652e6a7067, 0x64617368626f617264732e706e67, 'merry merry happy happy');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `report_party` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `species` varchar(50) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `number` int DEFAULT NULL,
  `abuse_nature` text,
  `description` text,
  `evidence` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_party`, `phone`, `email`, `species`, `breed`, `age`, `number`, `abuse_nature`, `description`, `evidence`) VALUES
(1, 'ace', '09064075290', 'macefelixerp@gmail.com', 'dog', 'pitbull', 1, 1, 'physical abuse', 'attack', 0x7265706f727445766964656e63652f6c6f676f2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` longtext NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pwd`, `role`) VALUES
(7, 'userace', 'userace@mail.com', '$2y$10$x1emc2FfdzBJpkU3LMYHuugKtWJchxxAmk0jhZoyYEZrIzE9Wxrzi', 'user'),
(6, 'admin1', 'admin1@mail.com', '$2y$10$kMvqxP50Q8P6EfaeCKjnxu97wFKe58hwOQnMX942O7Mdk0ijTKBfW', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 05:24 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

-- CREATE TABLE `forgot_password` (
--   `user_email` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --
-- -- Dumping data for table `forgot_password`
-- --

-- INSERT INTO `forgot_password` (`user_email`) VALUES
-- ('hi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `query_details`
--

CREATE TABLE `query_details` (
  `user_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_query` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `query_details`
--

INSERT INTO `query_details` (`user_id`, `user_email`, `user_query`) VALUES
(38, 'hans@gmail.com', ' What are the 7 blood types?'),
(38, 'hans@gmail.com', ' How often can I donate blood ?'),
(35, 'hi@gmail.com', 'mare blood donate karvu che'),
(35, 'hi@gmail.com', 'mare blood donate karvu che'),
(35, 'hi@gmail.com', '    '),
(35, 'hi@gmail.com', '    '),
(46, 'shivam123@gmail.com', 'my age is 14 . i wants to donate the blood . is it possible to donate ?');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_bg` varchar(3) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_bd` date NOT NULL,
  `user_major` varchar(10) NOT NULL,
  `user_minor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `user_bg`, `user_gender`, `user_address`, `user_city`, `user_bd`, `user_major`, `user_minor`) VALUES
(35, 'hi hello how', 'A+', 'male', 'A-402 ,TAPI VIEW RESIDENCY, NEAR MADHUVAN CIRCLE,ADAJAN GAM , SURAT', 'Surat', '2024-04-25', '7359022997', '1234567890'),
(36, 'kalani karteekkumar', 'B+', 'male', 'A-402 ,TAPI VIEW RESIDENCY, NEAR MADHUVAN CIRCLE,ADAJAN GAM , SURAT', 'Surat', '2004-01-07', '7359022990', '8140023590'),
(38, 'hans', 'B+', 'male', '274-tapi appartement , near pal', 'Ahmedabad', '2007-01-11', '8956758243', '5698234712'),
(40, 'bhavin', 'AB+', 'male', '274-tapi appartement , near pal', 'Surat', '2000-04-12', '8140023590', '5698237898'),
(41, 'cazy xyz', 'O-', 'female', '23-ravipark ,near gota', 'Ahmedabad', '2013-02-05', '1234567890', '1123456789'),
(42, 'mohit', 'AB+', 'male', '345 - naranpura society', 'Ahmedabad', '2005-01-05', '8974567890', '7896985645'),
(43, 'manav', 'A+', 'male', '345 - naranpura society', 'Vadodara (Baroda)', '2005-01-06', '8475789348', ''),
(44, 'prince nasit', 'B+', 'male', '274-tapi appartement , near pal', 'Surat', '2024-04-03', '1234567890', ''),
(44, 'kartik', '', '', '', 'Select One', '2024-04-04', '', ''),
(46, 'shivam', 'AB+', 'male', '123 - ram nagar', 'Surat', '2015-01-27', '1234897890', '7895612302');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`name`, `email`, `password`, `user`, `id`) VALUES
('parth', 'kartik123@gmail.com', 'c8d39cdb56a46ad807969ee04c4e660b', 'user', 33),
('parth', 'kartik@kartik.com', 'c8d39cdb56a46ad807969ee04c4e660b', 'user', 34),
('hi', 'hi@gmail.com', '49f68a5c8493ec2c0bf489821c21fc3b', 'user', 35),
('karteek', 'karteek@gmail.com', '61c47d7bbb74671308bd2de7ac383732', 'user', 36),
('hans', 'hans1233@gmail.com', 'f2a0ffe83ec8d44f2be4b624b0f47dde', 'user', 37),
('hans', 'hans@gmail.com', 'f2a0ffe83ec8d44f2be4b624b0f47dde', 'user', 38),
('kartik', 'kartik@gmail.com', 'c8d39cdb56a46ad807969ee04c4e660b', 'user', 39),
('bhavin', 'bhavin123@gmail.com', 'de6b0c87d96dffad0b8b4deb59060d07', 'user', 40),
('cazy', 'cazy@gmail.com', 'c6649603efe229e7273ed7cfd8bea2bb', 'user', 41),
('mohit', 'mohit@gmail.com', 'd8052f9e09a17e6907629e76bbd261cc', 'user', 42),
('manav', 'manav@gmail.com', 'ab311d308738b3145c34998285b5f247', 'user', 43),
('prince', 'prince@gmail.com', '2077e4a6bafa9b4e7b55e1fff16818af', 'user', 44),
('ajaysir', 'ajay@gmail.com', '29e457082db729fa1059d4294ede3909', 'user', 45),
('shivam', 'shivam123@gmail.com', '3ae9d8799d1bb5e201e5704293bb54ef', 'user', 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD UNIQUE KEY `email` (`email`(10));

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

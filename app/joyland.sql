-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 07:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joyland`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

USE joyland;

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `lname`, `email`, `phone`, `message`) VALUES
(1, 'Victor', 'Muasya', 'vicmwe184@gmail.com', '0795083960', 'test message'),
(2, 'Victor', 'Muasya', 'vicmwe184@gmail.com', '0795083960', 'test message'),
(3, 'Victor', 'Muasya', 'vicmwe184@gmail.com', '0795083960', 'test message'),
(4, 'Victor', 'Muasya', 'vicmwe184@gmail.com', '0795083960', 'test message'),
(5, 'Victor', 'Muasya', 'vicmwe184@gmail.com', '0795083960', 'test 3');

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE IF NOT EXISTS `landlord` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlord`
--

INSERT INTO `landlord` (`id`, `fname`, `lname`, `email`, `properties`) VALUES
(1, 'Victor', 'Muasya', 'vicmwe184@gmail.com', NULL),
(2, 'Jennings', 'Mwendwa', 'jennings@gmail.com', NULL),
(3, 'Old ', 'Trafford', 'old@gmail.com', NULL),
(4, 'Kevin', 'Heart', 'kevin.com', NULL),
(5, 'Joseph', 'Muasya', 'joseph@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) NOT NULL,
  `house_type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `rented` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `house_type`, `price`, `location`, `avatar`, `rented`) VALUES
(37, 'single_room', 1500, 'Behind St Pauls Opposite Jumuia', 'rental1.jpg', 0),
(38, 'single_room', 5000, 'Sample Location 3', 'rental1.jpg', 0),
(39, 'single_room', 6000, 'Next to Marieta centre', 'rental3.jpg', 0),
(40, 'single_room', 3200, 'Tigoni area behind Equity Bank next to the bus stop', 'rental4.jpg', 0),
(41, 'single_room', 4500, 'Sample Location 5', 'rental6.jpg', 0),
(42, 'single_room', 100, '\r\n            New Location', 'rental1.jpg', 1),
(43, 'single_room', 4000, '\r\n            behind the school', 'Screenshot (1).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE IF NOT EXISTS `tenants` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `fname`, `lname`, `email`) VALUES
(1, 'victor', 'muasya', 'vicmwe184@gmail.com'),
(2, 'mwendwa', 'muasya', 'victormuasya@gmail.com'),
(3, 'Victor', 'Muasya', 'vicmwe184@gmail.com'),
(4, 'Victor', 'Muasya', 'vicmwe184@gmail.com'),
(5, 'Victor', 'Muasya', 'vicmwe184@gmail.com'),
(6, 'Victor 1', 'Muasya', 'vicmwe184@gmail.com'),
(7, 'Victor 1', 'Muasya', 'vicmwe184@gmail.com'),
(8, 'Danny', 'Kioko', 'vicmwe184@gmail.com'),
(9, 'Danny', 'Kioko', 'vicmwe184@gmail.com'),
(10, 'Danny', 'Kioko', 'vicmwe184@gmail.com'),
(11, 'Danny', 'Kioko', 'vicmwe184@gmail.com'),
(12, 'Danny', 'Kioko', 'vicmwe184@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `user_type`, `email`, `password`, `username`) VALUES
(14, 'Victor', 'Muasya', 'landlord', 'vicmwe184@gmail.com', '123456', 'tron'),
(15, 'admin', 'profile', 'admin', 'admin@gmail.com', '123456', 'admin'),
(16, 'Vijimmy', 'Muasya', 'tenant', 'jim@gmail.com', '1234', 'tenat001'),
(17, 'mark', 'kim', 'landlord', 'markkim@gmail.com', '1234', 'maki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `landlord`
--
ALTER TABLE `landlord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

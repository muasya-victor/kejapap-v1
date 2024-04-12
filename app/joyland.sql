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
  `feedback_id` int(11) NOT NULL DEFAULT 1,
  `feedback_first_name` varchar(50) NOT NULL,
  `feedback_last_name` varchar(50) NOT NULL,
  `feedback_email` varchar(50) NOT NULL,
  `feedback_phone` varchar(50) NOT NULL,
  `feedback_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_first_name`, `feedback_last_name`, `feedback_email`, `feedback_phone`, `feedback_message`) VALUES
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
  `landlord_id` int(11) NOT NULL,
  `landlord_first_name` varchar(50) NOT NULL,
  `landlord_last_name` varchar(50) NOT NULL,
  `landlord_email` varchar(50) NOT NULL,
  `landlord_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(11) NOT NULL,
  `property_house_type` varchar(50) NOT NULL,
  `property_price` int(11) NOT NULL,
  `property_location` varchar(255) NOT NULL,
  `property_avatar` varchar(200) NOT NULL,
  `property_rented` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_house_type`, `property_price`, `property_location`, `property_avatar`, `property_rented`) VALUES
(37, 'single_room', 1500, 'Behind St Pauls Opposite Jumuia', 'rental1.jpg', 0),
(38, 'single_room', 5000, 'Sample Location 3', 'rental1.jpg', 0),
(39, 'single_room', 6000, 'Next to Marieta centre', 'rental3.jpg', 0),
(40, 'single_room', 3200, 'Tigoni area behind Equity Bank next to the bus stop', 'rental4.jpg', 0),
(41, 'single_room', 4500, 'Sample Location 5', 'rental6.jpg', 0),
(42, 'single_room', 100, '\r\n            New Location', 'rental1.jpg', 1),
(43, 'single_room', 4000, '\r\n            behind the school', 'Screenshot (1).png', 0);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `tenants` (
  `tenant_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tenant_first_name` varchar(50) NOT NULL,
  `tenant_last_name` varchar(50) NOT NULL,
  `tenant_email` varchar(50) NOT NULL,
  PRIMARY KEY (`tenant_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE IF NOT EXISTS `landlord` (
  `landlord_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `landlord_first_name` varchar(50) NOT NULL,
  `landlord_last_name` varchar(50) NOT NULL,
  `landlord_email` varchar(50) NOT NULL,
  `landlord_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  PRIMARY KEY (`landlord_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DELIMITER //

CREATE TRIGGER after_user_insert
AFTER INSERT ON `user`
FOR EACH ROW
BEGIN
    -- Check if the inserted user is of type 'tenant'
    IF NEW.user_type = 'tenant' THEN
        -- Insert a corresponding record into the tenants table
        INSERT INTO tenants (user_id, tenant_first_name, tenant_last_name, tenant_email)
        VALUES (NEW.user_id, NEW.user_first_name, NEW.user_last_name, NEW.user_email);
    
    -- Check if the inserted user is of type 'landlord'
    ELSEIF NEW.user_type = 'landlord' THEN
        -- Insert a corresponding record into the landlord table
        INSERT INTO landlord (user_id, landlord_first_name, landlord_last_name, landlord_email)
        VALUES (NEW.user_id, NEW.user_first_name, NEW.user_last_name, NEW.user_email);
    END IF;
END;
//

DELIMITER ;


INSERT INTO `user` (`user_first_name`, `user_last_name`, `user_type`, `user_email`, `user_password`, `username`) VALUES
('Victor', 'Muasya', 'landlord', 'vicmwe184@gmail.com', '123456', 'tron'),
('admin', 'profile', 'admin', 'admin@gmail.com', '123456', 'admin'),
('Vijimmy', 'Muasya', 'tenant', 'jim@gmail.com', '1234', 'tenant001'),
('mark', 'kim', 'landlord', 'markkim@gmail.com', '1234', 'maki'),
('Dave', 'Were', 'tenant', 'dev@gmail.com', '1234', 'dave');


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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
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
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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

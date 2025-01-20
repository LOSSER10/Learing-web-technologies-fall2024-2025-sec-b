-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2025 at 04:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `type` enum('sent','received') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `text`, `type`, `created_at`) VALUES
(1, 'hi', 'sent', '2025-01-18 19:08:45'),
(2, 'hlw', 'sent', '2025-01-18 19:08:55'),
(3, 'Hi A', 'sent', '2025-01-18 19:21:04'),
(4, 'HI B', 'sent', '2025-01-18 19:21:13'),
(5, 'hlww', 'sent', '2025-01-19 13:18:46'),
(6, '..', 'sent', '2025-01-19 13:20:56'),
(7, 'AIUB', 'sent', '2025-01-19 13:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `billing_address` text NOT NULL,
  `save_info` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `card_number`, `name_on_card`, `expiry_date`, `cvv`, `billing_address`, `save_info`) VALUES
(1, '1234567891234567', 'MD LEON', '0000-00-00', '222', 'fdgbhnghtgb', 1),
(2, '4657798034757890', 'jkhgfhjg', '0000-00-00', '4568', 'fgrtyefgvgkty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration_pro`
--

CREATE TABLE `registration_pro` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` enum('Admin','User') NOT NULL,
  `number` varchar(20) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_pro`
--

INSERT INTO `registration_pro` (`id`, `Name`, `Email`, `Password`, `Type`, `number`, `gender`, `dob`, `profile_picture`) VALUES
(111, 'Leon', 'mdarafatalamleon10@gmail.com', '123456', 'Admin', '01627687476', 'Male', '2025-01-06', '../uploads/Leon.jpg'),
(112, 'aaa', 'aaa10@gmail.com', 'aaaaaa', 'User', '12345678900', 'Male', '2000-01-13', NULL),
(113, 'jkh', 'khj10@gmail.com', '111111', 'Admin', '09876543213', 'Male', '2002-01-18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_pro`
--
ALTER TABLE `registration_pro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration_pro`
--
ALTER TABLE `registration_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

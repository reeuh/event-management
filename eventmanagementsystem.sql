-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 11:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `firstname`, `lastname`, `type`, `username`, `password`) VALUES
(1, 'Roselyn', 'Tarroza', 'admin', 'roselyn_tarroza', 'thepretty'),
(2, 'Ma. Recca Faye', 'Lacsi', 'admin', 'faye', 'faye'),
(3, 'Jasrha', 'Musa', 'admin', 'jasrha', 'jasrha'),
(4, 'Gian', 'Garcia', 'admin', 'gian', 'gian');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `schedule` datetime NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-Public\r\n2-Private',
  `audience_capacity` int(11) NOT NULL,
  `payment_type` tinyint(4) NOT NULL COMMENT '1-Free\r\n2-Payable',
  `amount` double NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `client`, `address`, `phone_no`, `event`, `schedule`, `type`, `audience_capacity`, `payment_type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rose', 'Lunzuran', '09563784736', 'Birthday', '2022-11-09 07:00:00', 1, 234, 2, 2345, '', '2022-11-27 12:40:05', '2022-11-27 12:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `event category`
--

CREATE TABLE `event category` (
  `ID` varchar(11) NOT NULL,
  `Classification` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Action` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event category`
--

INSERT INTO `event category` (`ID`, `Classification`, `Created_at`, `Updated_at`, `Action`) VALUES
('#1111', 'Birthday', '2022-11-22 12:51:12', '2022-11-22 20:51:12', ''),
('#222', 'Wedding', '2022-11-22 12:51:58', '2022-11-22 20:51:58', ''),
('#333', 'Anniversary', '2022-11-22 12:52:51', '2022-11-22 20:52:51', ''),
('#444', 'Christening', '2022-11-22 12:53:11', '2022-11-22 20:53:11', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event category`
--
ALTER TABLE `event category`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Classification`),
  ADD UNIQUE KEY `Classification` (`Classification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

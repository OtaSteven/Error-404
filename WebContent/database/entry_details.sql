-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 03:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectaccount`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry_details`
--

CREATE TABLE `entry_details` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(4) NOT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Set1` varchar(255) DEFAULT NULL,
  `Set2` varchar(255) DEFAULT NULL,
  `Set3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_details`
--

INSERT INTO `entry_details` (`id`, `email`, `username`, `password`, `Type`, `Set1`, `Set2`, `Set3`) VALUES
(1, 'sho8517@gmail.com', 'StevenWHo', '1234', 'Admin', NULL, NULL, NULL),
(2, 'abc@gmail.com', 'abc', '1111', 'Parent', NULL, NULL, NULL),
(3, '123@gmail.com', '123Test', '1111', 'Parent', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry_details`
--
ALTER TABLE `entry_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry_details`
--
ALTER TABLE `entry_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

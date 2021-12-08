-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 12:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
-- Table structure for table `sets_list`
--

CREATE TABLE `sets_list` (
  `ID` int(11) NOT NULL,
  `setName` varchar(255) NOT NULL,
  `link1` varchar(255) NOT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `link3` varchar(255) DEFAULT NULL,
  `link4` varchar(255) DEFAULT NULL,
  `link5` varchar(255) DEFAULT NULL,
  `link6` varchar(255) DEFAULT NULL,
  `link7` varchar(255) DEFAULT NULL,
  `link8` varchar(255) DEFAULT NULL,
  `link9` varchar(255) DEFAULT NULL,
  `link10` varchar(255) DEFAULT NULL,
  `link11` varchar(255) DEFAULT NULL,
  `link12` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sets_list`
--

INSERT INTO `sets_list` (`ID`, `setName`, `link1`, `link2`, `link3`, `link4`, `link5`, `link6`, `link7`, `link8`, `link9`, `link10`, `link11`, `link12`) VALUES
(1, 'Test 1', 'https://gray-wmctv-prod.cdn.arcpublishing.com/resizer/nsgGaJW2V-VSsC4fl6Xu6vYVTC8=/800x600/smart/filters:quality(70)/cloudfront-us-east-1.images.arcpublishing.com/gray/5V62QS6ZHNF6DBA7656F3RS4UY.jpg', 'https://0201.nccdn.net/4_2/000/000/00d/f43/ankle---foot-specialists-of-conroe--the-woodlands_causes-and-sol.jpeg', 'https://images.heb.com/is/image/HEBGrocery/000466634', 'https://www.kindpng.com/picc/m/165-1658328_fist-thumb-arm-clip-art-upper-arm-clipart.png', 'https://thumbs.dreamstime.com/b/bread-cut-14027607.jpg', 'https://www.sacmag.com/wp-content/uploads/sites/50/2021/04/bagel-bunch.jpg', 'https://m.media-amazon.com/images/I/81UbNUfvstL._AC_UY445_.jpg', '', 'https://m.media-amazon.com/images/I/81S+7h513XL._AC_SL1500_.jpg', 'https://cdn.mos.cms.futurecdn.net/42E9as7NaTaAi4A6JcuFwG-1200-80.jpg', 'https://nypost.com/wp-content/uploads/sites/2/2020/06/band-aid.jpg?quality=80&strip=all', 'https://i.guim.co.uk/img/media/9d481a988ce145ac381261ea4eb47094ab3ac2b0/0_1209_2136_1282/master/2136.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=5004755d749d1f12745dea55016c57cd'),
(2, 'Test 2', 'https://gray-wmctv-prod.cdn.arcpublishing.com/resizer/nsgGaJW2V-VSsC4fl6Xu6vYVTC8=/800x600/smart/filters:quality(70)/cloudfront-us-east-1.images.arcpublishing.com/gray/5V62QS6ZHNF6DBA7656F3RS4UY.jpg', 'https://0201.nccdn.net/4_2/000/000/00d/f43/ankle---foot-specialists-of-conroe--the-woodlands_causes-and-sol.jpeg', 'https://images.heb.com/is/image/HEBGrocery/000466634', 'https://www.kindpng.com/picc/m/165-1658328_fist-thumb-arm-clip-art-upper-arm-clipart.png', 'https://thumbs.dreamstime.com/b/bread-cut-14027607.jpg', 'https://www.sacmag.com/wp-content/uploads/sites/50/2021/04/bagel-bunch.jpg', 'https://m.media-amazon.com/images/I/81UbNUfvstL._AC_UY445_.jpg', '', 'https://m.media-amazon.com/images/I/81S+7h513XL._AC_SL1500_.jpg', 'https://cdn.mos.cms.futurecdn.net/42E9as7NaTaAi4A6JcuFwG-1200-80.jpg', 'https://nypost.com/wp-content/uploads/sites/2/2020/06/band-aid.jpg?quality=80&strip=all', 'https://i.guim.co.uk/img/media/9d481a988ce145ac381261ea4eb47094ab3ac2b0/0_1209_2136_1282/master/2136.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=5004755d749d1f12745dea55016c57cd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sets_list`
--
ALTER TABLE `sets_list`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sets_list`
--
ALTER TABLE `sets_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 02:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `admin_num` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`admin_num`, `firstname`, `middlename`, `lastname`, `uname`, `pword`, `email`) VALUES
(18, 'lyka', 'segundo', 'bulaon', 'lai', 'lyka', 'lyka1218@gmail.com'),
(19, 'angel', 'ibay', 'ducut', 'mae', 'kashmir', 'angeldux@gmail.com'),
(20, 'shem', 'bondoc', 'susi', 'bundok', 'shem1', 'shemsusi@gmail.com'),
(21, 'scott', 'porto', 'serrano', 'pemverton', 'bading2', 'scottsrrn@gmail.com'),
(22, 'jojo', 'zabala', 'de mesa', 'junior', 'jojo3', 'jojo@gmail.com'),
(23, 'eden', 'sampang', 'lingad', 'cheese', 'eden4', 'edenl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `guard_data`
--

CREATE TABLE `guard_data` (
  `guardnumber` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guard_data`
--

INSERT INTO `guard_data` (`guardnumber`, `firstname`, `middlename`, `lastname`, `uname`, `pword`) VALUES
(6, 'angel', 'ibay', 'ducut', 'gel', 'gelgel'),
(10, 'scott', 'porto', 'serrano', 'bading', 'bading2');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `id` int(11) NOT NULL,
  `slot` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`id`, `slot`) VALUES
(10, 'abc'),
(12, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slotid` int(11) NOT NULL,
  `platenumber` varchar(50) NOT NULL,
  `selectdate` varchar(50) NOT NULL,
  `starttime` varchar(50) NOT NULL,
  `selecthour` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slotid`, `platenumber`, `selectdate`, `starttime`, `selecthour`) VALUES
(4, '12333', '2023-10-19', '20:38', '11 hour'),
(5, '1234444', '2023-10-12', '17:44', '7 hour'),
(7, 'CAW 2439', '2023-10-28', '11:00', '5 hour'),
(8, '1234444', '2023-10-31', '20:11', '11 hour'),
(9, '123', '2023-11-09', '22:08', '9 hour'),
(10, '1234444', '2023-11-15', '07:55', '12 hour'),
(11, '1234567', '2023-12-07', '14:39', '8 hour');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`admin_num`);

--
-- Indexes for table `guard_data`
--
ALTER TABLE `guard_data`
  ADD PRIMARY KEY (`guardnumber`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slotid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `admin_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `guard_data`
--
ALTER TABLE `guard_data`
  MODIFY `guardnumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slotid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

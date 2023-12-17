-- phpMyAdmin SQL Dump
-- version 5.2.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2023 at 09:31 AM
-- Server version: 10.11.5-MariaDB-3
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PHP_Myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `Fullname` text NOT NULL,
  `Email` text NOT NULL,
  `Phone` text NOT NULL,
  `Role` text NOT NULL DEFAULT 'User',
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Time_create` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `Fullname`, `Email`, `Phone`, `Role`, `Username`, `Password`, `Time_create`) VALUES
(1, 'ADMIN', 'baovv.22ns@vku.udn.vn', '0382182443', 'Admin', 'ADMIN', 'ADMIN', '2023-11-17 18:04:11'),
(2, 'TESTER', 'tester@tester.com', '0382182410', 'User', 'test', 'test', '2023-11-18 08:46:08'),
(3, 'Vo Van Bao', 'vovanbao.10a1.nh1@gmail.com', '0382182410', 'User', 'baovv', 'baovv', '2023-11-19 16:07:37'),
(4, 'Vo Van Bao', 'vovanbao.10a1.nh1@gmail.com', '0382182410', 'User', 'tester2', 'tester2', '2023-11-19 16:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

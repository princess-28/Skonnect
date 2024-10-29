-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 05:49 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `apply_id` int(10) NOT NULL,
  `apply_position` varchar(100) DEFAULT NULL,
  `apply_barangay` varchar(100) DEFAULT NULL,
  `apply_municipality` varchar(100) DEFAULT NULL,
  `apply_province` varchar(100) DEFAULT NULL,
  `apply_lname` varchar(100) DEFAULT NULL,
  `apply_fname` varchar(100) DEFAULT NULL,
  `apply_mname` varchar(100) DEFAULT NULL,
  `apply_nname` varchar(100) DEFAULT NULL,
  `apply_age` varchar(100) DEFAULT NULL,
  `apply_birthday` date DEFAULT NULL,
  `apply_bcity` varchar(100) DEFAULT NULL,
  `apply_bprovince` varchar(100) DEFAULT NULL,
  `apply_spouse` varchar(100) DEFAULT NULL,
  `apply_add_province` varchar(100) DEFAULT NULL,
  `apply_add_municipality` varchar(100) DEFAULT NULL,
  `apply_add_barangay` varchar(100) DEFAULT NULL,
  `apply_add_street` varchar(100) DEFAULT NULL,
  `apply_occupation` varchar(100) DEFAULT NULL,
  `apply_post_office` varchar(100) DEFAULT NULL,
  `apply_res_months` varchar(100) DEFAULT NULL,
  `apply_res_year` varchar(100) DEFAULT NULL,
  `apply_sk_precint` varchar(100) DEFAULT NULL,
  `apply_sk_barangay` varchar(100) DEFAULT NULL,
  `apply_sk_city` varchar(100) DEFAULT NULL,
  `apply_sk_province` varchar(100) DEFAULT NULL,
  `apply_gender` varchar(100) DEFAULT NULL,
  `apply_civil_status` varchar(100) DEFAULT NULL,
  `apply_image` varchar(100) DEFAULT NULL,
  `apply_status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`apply_id`, `apply_position`, `apply_barangay`, `apply_municipality`, `apply_province`, `apply_lname`, `apply_fname`, `apply_mname`, `apply_nname`, `apply_age`, `apply_birthday`, `apply_bcity`, `apply_bprovince`, `apply_spouse`, `apply_add_province`, `apply_add_municipality`, `apply_add_barangay`, `apply_add_street`, `apply_occupation`, `apply_post_office`, `apply_res_months`, `apply_res_year`, `apply_sk_precint`, `apply_sk_barangay`, `apply_sk_city`, `apply_sk_province`, `apply_gender`, `apply_civil_status`, `apply_image`, `apply_status`) VALUES
(1, 'chairman', 'Upper Jasaan', 'Jasaan', 'Misamis Oriental', 'LAST', 'FIRST', 'M', '', '', '2024-06-01', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '', '', 'male', 'single', 'download.png', 1),
(3, 'kagawad', '', '', '', 'LAST', 'FIRST', '', '', '', '2024-06-13', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '', '', '', '', NULL, 1),
(4, 'chairman', '', '', '', 'LASTA', 'FIRSTA', 'ASF', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '', '', '', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `block_id` int(10) NOT NULL,
  `block_fname` varchar(100) DEFAULT NULL,
  `block_lname` varchar(100) DEFAULT NULL,
  `block_mname` varchar(100) DEFAULT NULL,
  `block_violation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `block_fname`, `block_lname`, `block_mname`, `block_violation`) VALUES
(1, 'blname', 'bfname', 'bmname', 'Criminals'),
(4, 'bfname', 'blname', '', 'asdf'),
(5, 'FNAME', 'LNAME', '', 'ASDF'),
(6, 'FIRST', 'LAST', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `user_name`, `user_password`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `block_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

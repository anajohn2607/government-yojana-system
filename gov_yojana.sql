-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 06:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gov_yojana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applied_yojana`
--

CREATE TABLE `applied_yojana` (
  `yojana_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `yojana_name` varchar(100) NOT NULL,
  `yojana_requirements` varchar(100) NOT NULL,
  `yojana_status` varchar(100) NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_yojana`
--

INSERT INTO `applied_yojana` (`yojana_id`, `email`, `yojana_name`, `yojana_requirements`, `yojana_status`, `date`) VALUES
(1, 'varsha@gmail.com', 'sakshar bharat', '5c6924d9ebc7c0download (2).jpg', 'succeed', '2019-02-17 14:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `pan_card_no` varchar(20) NOT NULL,
  `documents` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL DEFAULT 'not_approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `address`, `phone`, `aadhar_no`, `pan_card_no`, `documents`, `user_status`) VALUES
(1, '', 'vasant@gmail.com', 'vasant', '', '', '', '', '', 'not_approved'),
(2, '', 'varsha@gmail.com', 'varsha', '', '', '', '', '', 'approved'),
(3, '', 'mitali@gmail.com', 'mitali', '', '', '', '', '', 'not_approved');

-- --------------------------------------------------------

--
-- Table structure for table `yojana`
--

CREATE TABLE `yojana` (
  `yojana_id` int(11) NOT NULL,
  `yojana_name` varchar(50) NOT NULL,
  `yojana_description` varchar(500) NOT NULL,
  `yojana_image` varchar(500) NOT NULL,
  `yojana_requirement` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yojana`
--

INSERT INTO `yojana` (`yojana_id`, `yojana_name`, `yojana_description`, `yojana_image`, `yojana_requirement`) VALUES
(1, 'sakshar bharat', 'test', '301a6ee0e460d5eef51bdbb7f937f3f91212.jpg', '1.lc'),
(2, 'eret', 'dsasd', 'b4b8a97cd754b4d8db846ee724d2b3e7hover.jpg', 'pan card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_yojana`
--
ALTER TABLE `applied_yojana`
  ADD PRIMARY KEY (`yojana_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `yojana`
--
ALTER TABLE `yojana`
  ADD PRIMARY KEY (`yojana_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_yojana`
--
ALTER TABLE `applied_yojana`
  MODIFY `yojana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yojana`
--
ALTER TABLE `yojana`
  MODIFY `yojana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

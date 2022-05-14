-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2022 at 06:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apccampaign2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(40) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'omolewu', 'd3cdc870c3511c054e84b7099bf8a6ee', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `lg` varchar(40) NOT NULL,
  `ward` varchar(40) NOT NULL,
  `poll_unit` varchar(40) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `vote` varchar(40) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `comment` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `phone`, `lg`, `ward`, `poll_unit`, `card_no`, `vote`, `reason`, `comment`, `reg_date`, `slug`) VALUES
(1, 'Omolewu Sunday Opeyemi', '+2348102519926', 'Olorunda', '12', '434', '4242424', 'Yes', 'wwww', 'nnnnnnnn', '2022-05-13 11:59:54', 'Omolewu-Sunday-Opeyemi-+2348102519926-Olorunda'),
(2, 'Omolewu Sunday Opeyemi', '+2348102519926', 'Olorunda', '12', '434', '4242', 'Yes', 'wwww', 'mmsms', '2022-05-13 12:43:52', 'Omolewu-Sunday-Opeyemi-+2348102519926-Olorunda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

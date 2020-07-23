-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 06:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(20) NOT NULL,
  `roll` int(15) NOT NULL,
  `pnumber` varchar(16) NOT NULL,
  `city` varchar(120) NOT NULL,
  `gpa` varchar(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `advisor` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`id`, `name`, `class`, `roll`, `pnumber`, `city`, `gpa`, `date`, `advisor`, `image`) VALUES
(27, 'Asik Newaz Sabbir', 'five', 516, '+880159666552', 'Pabna', '4.88', '2020-07-21 14:00:38', 'ij', '1068asik.jpg'),
(28, 'Kaberi Sultana Jamuna', 'five', 502, '+8801475423', 'Barishal', '5.00', '2020-07-21 14:01:52', 'sbb', '214jamuna.jpg'),
(29, 'Zihad Bin Jahangir', 'Four', 401, '+88012369854', 'Barishal', '4.50', '2020-07-21 14:02:48', 'amrk', '1026zihad.jpg'),
(30, 'Tanzim Hasan', 'four', 402, '+88012345685', 'Sylhet', '4.33', '2020-07-21 14:03:32', 'ar', '1392tanzim.jpg'),
(31, 'Farhana Habib Tamanna ', 'three', 301, '+880123698569', 'Narayngonj', '5.00', '2020-07-21 14:04:47', 'samd', '5012tom.png'),
(33, 'Abdullah Md Jisan', 'two', 202, '+8801258933', 'Kisorgonj', '4.56', '2020-07-21 14:07:22', 'mmjr', '792jisan.jpg'),
(34, 'Asikur Rahman', 'one', 101, '+8803256985', 'Cumilla', '2.5', '2020-07-21 14:09:55', 'ap', '5116111385_194.jpg'),
(35, 'Anisur Rahman', 'five', 510, '+8801754100439', 'Chandpur', '4.56', '2020-07-21 14:11:32', 'amrk', '1209shahin-formal.png'),
(37, 'Sabbir Hasan omor', 'five', 555, '+88014555', 'Bogra', '4.88', '2020-07-21 14:43:39', 'ars', '599omor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `image`, `date`, `status`) VALUES
(13, 'Anisur Rahman Shahin', 'ars', 'mdshahinmije96@gmail.com', '698d51a19d8a121ce581499d7b701668', 'ars32343.png', '2020-07-21 04:28:27', 'yes'),
(15, 'Asik Newaz Sabbir', 'asik', 'asik@gmail.com', '202cb962ac59075b964b07152d234b70', 'asik753890.jpg', '2020-07-21 14:42:09', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

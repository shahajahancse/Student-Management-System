-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 07:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` varchar(15) NOT NULL,
  `city` varchar(30) NOT NULL,
  `p_contact` varchar(15) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `p_contact`, `photo`, `date_time`) VALUES
(1, 'mahim', 231546, '1st', 'feni', '01502456020', '231546.jpg', '2019-01-14 14:38:07'),
(2, 'mahi', 230140, '2nd', 'feni', '01502456024', '230145.jpg', '2019-01-14 14:38:25'),
(3, 'tutun', 125547, '5th', 'dg', '01521487032', '125547.jpg', '2019-01-15 08:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'tohida', 'tohidacse@gmail.com', 'tohidacse', '2e29ceb0d9a488a9777f50a0615ec3b3', 'tohidacse.jpg', 'active', '2019-01-17 17:11:19'),
(2, 'Md. Shahajahan Ali', 'shahajahan@gmail.com', 'shahajahancse', '25d55ad283aa400af464c76d713c07ad', 'shahajahancse.jpg', 'active', '2019-12-13 05:58:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

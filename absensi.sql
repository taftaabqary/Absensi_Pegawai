-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 12:25 PM
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
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `employee_id` int(8) NOT NULL,
  `tgl` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) DEFAULT NULL,
  `clock_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `tgl`, `clock_in`, `clock_out`) VALUES
(1, 101, '2023-01-15', '14:56:29', NULL),
(2, 101, '2023-01-16', '14:57:14', NULL),
(35, 101, '2023-01-17', '17:59:26', '19:53:18'),
(36, 102, '2023-01-17', '19:54:42', '19:54:47'),
(37, 105, '2023-01-18', '21:01:46', NULL),
(38, 106, '2023-01-20', '17:52:43', NULL),
(39, 102, '2023-01-22', '14:36:41', '14:36:45'),
(40, 104, '2023-01-22', '15:10:12', '15:13:29'),
(41, 105, '2023-01-22', '15:15:53', '15:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` int(8) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `fullname`, `role`, `password`) VALUES
(1, 101, 'Altap', 'admin', '$2y$10$alm5wQPKmazD76Pbe8KVAuIt7b3cyVeIqKMkIUPaj0AGELG4pMwHG'),
(2, 102, 'Ani Hanifah', 'packaging', '$2y$10$03mwoSbp83Nrd3BCRcQpVOj8HRDfrK1Bqd7jiCGOF1nO7RvNnNPdK'),
(3, 103, 'Sigit Raharjo', 'admin', '$2y$10$sT5u.xTYqIA0b/AuQbCYp.ix.VL3uHWkBYrRck6PK/n8csm5PpIf.'),
(4, 104, 'Rania Alia Nefta', 'operator', '$2y$10$xTbBVr1Szal7Re70JL9gK.jAH2dlON8nbfelR6tXNzCrKOQ/.IiPO'),
(5, 105, 'Tafta ganteng', 'operator', '$2y$10$ZZZLuC98a3io0V92TertYe8zk1ph2vu5npD8IpCuFHmfFrJnJGoGy'),
(7, 106, 'Tafta Junior', 'admin', '$2y$10$1wj5a6cs2L733X2uerwh8eGgecbHPpZZrUBdbi/lJcJpIbG.xc4IW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

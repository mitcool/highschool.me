-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduate`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_service_actions`
--

CREATE TABLE `ambassador_service_actions` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_service_actions`
--

INSERT INTO `ambassador_service_actions` (`id`, `service_id`, `name`, `value`) VALUES
(1, 1, 'Subscribe', '2'),
(2, 1, 'Comment on video', '3(max 9 per week)'),
(3, 1, 'Upload school-related video', '25'),
(4, 1, 'Join school challenge video', '15'),
(5, 1, 'Create reaction video', '20'),
(6, 1, 'Add scool link to description', '5'),
(7, 2, 'Subscribe', '2'),
(8, 2, 'Comment on video', '3(max 9 per week)'),
(9, 2, 'Upload school-related video', '25'),
(10, 2, 'Join school challenge video', '15'),
(11, 2, 'Create reaction video', '20'),
(12, 2, 'Add scool link to description', '5'),
(13, 3, 'Subscribe', '2'),
(14, 3, 'Comment on video', '3(max 9 per week)'),
(15, 3, 'Upload school-related video', '25'),
(16, 3, 'Join school challenge video', '15'),
(17, 3, 'Create reaction video', '20'),
(18, 3, 'Add scool link to description', '5'),
(19, 4, 'Subscribe', '2'),
(20, 4, 'Comment on video', '3(max 9 per week)'),
(21, 4, 'Upload school-related video', '25'),
(22, 4, 'Join school challenge video', '15'),
(23, 4, 'Create reaction video', '20'),
(24, 4, 'Add scool link to description', '5'),
(25, 5, 'Subscribe', '2'),
(26, 5, 'Comment on video', '3(max 9 per week)'),
(27, 5, 'Upload school-related video', '25'),
(28, 5, 'Join school challenge video', '15'),
(29, 5, 'Create reaction video', '20'),
(30, 5, 'Add scool link to description', '5'),
(31, 6, 'Subscribe', '2'),
(32, 6, 'Comment on video', '3(max 9 per week)'),
(33, 6, 'Upload school-related video', '25'),
(34, 6, 'Join school challenge video', '15'),
(35, 6, 'Create reaction video', '20'),
(36, 6, 'Add scool link to description', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassador_service_actions`
--
ALTER TABLE `ambassador_service_actions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassador_service_actions`
--
ALTER TABLE `ambassador_service_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

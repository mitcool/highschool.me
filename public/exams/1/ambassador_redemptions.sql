-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2026 at 10:01 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_redemptions`
--

CREATE TABLE `ambassador_redemptions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_id` int NOT NULL,
  `reward_id` int NOT NULL,
  `points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_redemptions`
--

INSERT INTO `ambassador_redemptions` (`id`, `user_id`, `order_id`, `reward_id`, `points`) VALUES
(7, 3, 0, 17, 250),
(8, 3, 0, 16, 200),
(9, 3, 0, 13, 250),
(10, 3, 0, 1, 100),
(11, 3, 0, 11, 200),
(12, 3, 0, 5, 100),
(13, 3, 0, 9, 300),
(14, 3, 0, 8, 150),
(15, 3, 0, 15, 150),
(16, 3, 0, 14, 200),
(17, 3, 0, 13, 250),
(18, 3, 0, 17, 250),
(19, 3, 0, 16, 200),
(20, 3, 0, 16, 200),
(21, 3, 0, 12, 250),
(22, 3, 0, 15, 150),
(23, 3, 1, 8, 150),
(24, 3, 1, 7, 100),
(25, 3, 1, 6, 200),
(26, 3, 1, 5, 100),
(27, 3, 1, 4, 300),
(28, 3, 2, 17, 250),
(29, 3, 2, 16, 200),
(30, 3, 2, 15, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassador_redemptions`
--
ALTER TABLE `ambassador_redemptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassador_redemptions`
--
ALTER TABLE `ambassador_redemptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

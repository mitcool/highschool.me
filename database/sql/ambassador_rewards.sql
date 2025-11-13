-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 03:08 PM
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
-- Table structure for table `ambassador_rewards`
--

CREATE TABLE `ambassador_rewards` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_rewards`
--

INSERT INTO `ambassador_rewards` (`id`, `name`, `points`) VALUES
(1, 'Pen & pencil set', 100),
(2, '20-in-1 multitool', 1500),
(3, 'Cable earphones', 100),
(4, 'RFID wallet protection', 300),
(5, 'Charging pad', 100),
(6, 'T-shirt', 200),
(7, 'Lunchbox', 100),
(8, '16-in-1 multitool', 150),
(9, 'Bamboo cup', 300),
(10, 'Laptop bag', 250),
(11, '3-in-1 backpack set', 200),
(12, 'Flash drive', 250),
(13, 'Scarf', 250),
(14, 'Wireless earbuds', 200),
(15, 'Smart backpack', 150),
(16, 'Leather writing case', 200),
(17, 'Premium wireless earbuds', 250),
(18, 'Portable AI translation device', 1500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassador_rewards`
--
ALTER TABLE `ambassador_rewards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassador_rewards`
--
ALTER TABLE `ambassador_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

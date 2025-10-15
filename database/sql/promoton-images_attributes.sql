-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 10:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onsites-graduate-school`
--

-- --------------------------------------------------------

--
-- Table structure for table `images_attributes`
--

CREATE TABLE `images_attributes` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `alt` text NOT NULL,
  `title` text NOT NULL,
  `locale` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images_attributes`
--

INSERT INTO `images_attributes` (`id`, `image_id`, `alt`, `title`, `locale`) VALUES
(458, 224, '', '', 'de'),
(457, 223, '', '', 'de'),
(456, 222, '', '', 'de'),
(455, 221, '', '', 'de'),
(454, 220, '', '', 'de'),
(453, 219, '', '', 'de'),
(452, 218, '', '', 'de'),
(451, 217, '', '', 'de'),
(450, 224, '', '', 'en'),
(449, 223, '', '', 'en'),
(448, 222, '', '', 'en'),
(447, 221, '', '', 'en'),
(446, 220, '', '', 'en'),
(445, 219, '', '', 'en'),
(444, 218, '', '', 'en'),
(443, 217, '', '', 'en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images_attributes`
--
ALTER TABLE `images_attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images_attributes`
--
ALTER TABLE `images_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

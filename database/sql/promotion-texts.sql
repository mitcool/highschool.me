-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 10:15 AM
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
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `text_en` text DEFAULT NULL,
  `text_de` text DEFAULT NULL,
  `text_bg` text DEFAULT NULL,
  `text_es` text DEFAULT NULL,
  `text_ru` text DEFAULT NULL,
  `editor` tinyint(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(4199, '-', '-', '-', '-', '-', 0, 'heading', 'promotion'),
(4200, '-', '-', '-', '-', '-', 1, 'starting-text', 'promotion'),
(4201, '-', '-', '-', '-', '-', 1, 'text-one', 'promotion'),
(4202, '-', '-', '-', '-', '-', 1, 'text-two', 'promotion'),
(4203, '-', '-', '-', '-', '-', 1, 'text-three', 'promotion'),
(4204, '-', '-', '-', '-', '-', 1, 'text-four', 'promotion'),
(4205, '-', '-', '-', '-', '-', 1, 'text-five', 'promotion'),
(4206, '-', '-', '-', '-', '-', 1, 'text-six', 'promotion'),
(4207, '-', '-', '-', '-', '-', 1, 'text-seven', 'promotion'),
(4208, '-', '-', '-', '-', '-', 0, 'meta-title', 'promotion'),
(4209, '-', '-', '-', '-', '-', 0, 'meta-description', 'promotion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4210;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

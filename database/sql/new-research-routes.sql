-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 08:20 AM
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
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `route_en` varchar(191) NOT NULL,
  `route_es` varchar(191) NOT NULL,
  `route_bg` varchar(191) NOT NULL,
  `route_de` varchar(191) NOT NULL,
  `route_ru` varchar(191) NOT NULL,
  `action` varchar(191) NOT NULL,
  `sitemap` tinyint(4) NOT NULL,
  `sitemap_name_en` text NOT NULL,
  `sitemap_name_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `slug`, `route_en`, `route_es`, `route_bg`, `route_de`, `route_ru`, `action`, `sitemap`, `sitemap_name_en`, `sitemap_name_de`) VALUES
(38, 'artificial-inteligence', 'artificial-inteligence', 'artificial-inteligence', 'artificial-inteligence', 'artificial-inteligence-de', 'examination-rules_ru', 'MainController@showArtificialInteligence', 1, 'Artificial Inteligence', 'Artificial Inteligence'),
(39, 'cyber-security', 'cyber-security', 'cyber-security', 'cyber-security', 'cyber-security-de', 'cyber-security', 'MainController@showcyberSecurity', 1, 'Cyber Security', 'Cyber Security'),
(40, 'green-energetics', 'green-energetics', 'green-energetics', 'green-energetics', 'green-energetics-de', 'green-energetics', 'MainController@showGreenEnergetics', 1, 'Green Energetics', 'Green Energetics');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

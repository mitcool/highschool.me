-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2026 at 01:53 PM
-- Server version: 10.11.14-MariaDB-0ubuntu0.24.04.1-log
-- PHP Version: 7.4.33-nmm8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d04614ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category_id`, `meta_title`, `meta_description`) VALUES
(116, '', '', 1, '', ''),
(122, '', '', 1, '', ''),
(123, '', '', 1, '', ''),
(124, '', '', 1, '', ''),
(125, '', '', 1, '', ''),
(131, '', '', 2, '', ''),
(132, '', '', 2, '', ''),
(133, '', '', 2, '', ''),
(134, '', '', 2, '', ''),
(135, '', '', 2, '', ''),
(136, '', '', 2, '', ''),
(137, '', '', 2, '', ''),
(138, '', '', 2, '', ''),
(139, '', '', 2, '', ''),
(140, '', '', 2, '', ''),
(141, '', '', 2, '', ''),
(142, '', '', 2, '', ''),
(143, '', '', 2, '', ''),
(144, '', '', 2, '', ''),
(145, '', '', 2, '', ''),
(146, '', '', 2, '', ''),
(147, '', '', 2, '', ''),
(148, '', '', 2, '', ''),
(149, '', '', 2, '', ''),
(150, '', '', 2, '', ''),
(151, '', '', 2, '', ''),
(153, '', '', 2, '', ''),
(164, '', '', 4, '', ''),
(165, '', '', 4, '', ''),
(166, '', '', 4, '', ''),
(167, '', '', 4, '', ''),
(168, '', '', 4, '', ''),
(169, '', '', 4, '', ''),
(170, '', '', 4, '', ''),
(171, '', '', 4, '', ''),
(172, '', '', 4, '', ''),
(173, '', '', 4, '', ''),
(174, '', '', 4, '', ''),
(175, '', '', 4, '', ''),
(176, '', '', 4, '', ''),
(177, '', '', 4, '', ''),
(178, '', '', 3, '', ''),
(179, '', '', 5, '', ''),
(180, '', '', 5, '', ''),
(181, '', '', 5, '', ''),
(182, '', '', 5, '', ''),
(183, '', '', 5, '', ''),
(184, '', '', 5, '', ''),
(185, '', '', 5, '', ''),
(186, '', '', 6, '', ''),
(187, '', '', 6, '', ''),
(188, '', '', 6, '', ''),
(189, '', '', 3, '', ''),
(190, '', '', 3, '', ''),
(191, '', '', 3, '', ''),
(192, '', '', 3, '', ''),
(193, '', '', 3, '', ''),
(194, '', '', 3, '', ''),
(195, '', '', 3, '', ''),
(196, '', '', 3, '', ''),
(197, '', '', 3, '', ''),
(198, '', '', 3, '', ''),
(199, '', '', 3, '', ''),
(200, '', '', 3, '', ''),
(201, '', '', 3, '', ''),
(202, '', '', 3, '', ''),
(203, '', '', 3, '', ''),
(204, '', '', 3, '', ''),
(205, '', '', 3, '', ''),
(206, '', '', 3, '', ''),
(207, '', '', 3, '', ''),
(208, '', '', 3, '', ''),
(209, '', '', 3, '', ''),
(210, '', '', 3, '', ''),
(211, '', '', 3, '', ''),
(212, '', '', 3, '', ''),
(213, '', '', 3, '', ''),
(214, '', '', 3, '', ''),
(215, '', '', 3, '', ''),
(216, '', '', 3, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

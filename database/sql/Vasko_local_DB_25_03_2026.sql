-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2026 at 11:00 AM
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
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `name`, `description`, `slug`) VALUES
(50, 'Prof. Dr. Mathias Kunze', 'Coming soon', '1'),
(51, 'Dr. Adil Yücel, PhD', 'Coming soon', '1'),
(52, 'Prof. Dr. mult. Stefan Reith, Prof. h. c., Dr. h. c.', 'Coming soon', '1'),
(53, 'Dr. Julia Becker', 'Coming soon', '1'),
(54, 'Prof. Dr. Kveng Hong Kao', 'Coming soon', '1'),
(55, 'Prof. Kunal Saigal, DBA', 'Coming soon', '1'),
(56, 'Prof. Dr. Artur Kubacki', 'Coming soon', '0'),
(57, 'Benjamin Dunker', 'Coming soon', '1'),
(58, 'Stefan Gerstner, DBA', 'Coming soon', '1'),
(59, 'Dr. Benjamin von Block-Schlesier', 'Coming soon', '1'),
(60, 'Dr. Dr. med. dent. Klaus Kocher', 'Coming soon', '0'),
(61, 'Conrad Buchholz', 'Coming soon', '0'),
(62, 'Prof. Dr. Sebastian Lamm', 'Coming soon', '1'),
(63, 'Patrick van Geldern', 'Coming soon', '1'),
(64, 'Ilhami Aben', 'Coming soon', '1'),
(65, 'Prof. Dr. George Reiff', 'Coming soon', '0');

-- --------------------------------------------------------

--
-- Table structure for table `additional_courses`
--

CREATE TABLE `additional_courses` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_type` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_courses`
--

INSERT INTO `additional_courses` (`id`, `student_id`, `course_type`, `status`) VALUES
(1, 79, 2, 0),
(2, 79, 3, 0),
(3, 79, 2, 0),
(4, 79, 2, 0),
(5, 79, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_activities`
--

CREATE TABLE `ambassador_activities` (
  `id` int NOT NULL,
  `service_id` int DEFAULT NULL,
  `action_id` int DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `redeem_points` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_activities`
--

INSERT INTO `ambassador_activities` (`id`, `service_id`, `action_id`, `link`, `status`, `redeem_points`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, 43, 'https://www.google.com/search?sca_esv=ec250e86f905554c&sxsrf=AE3TifMBX3qYDb_FYJZWqPZMLnUVVwpFBA:1764370639882&q=egg&spell=1&sa=X&ved=2ahUKEwip9vfp-JWRAxXrcfEDHf5zOQIQBSgAegQIERAB&biw=1920&bih=919&dpr=1', 'Denied', 0, 3, '2025-11-29 00:02:26', '2026-01-09 12:28:16'),
(2, 5, 26, 'https://www.google.com/search?sca_esv=ec250e86f905554c&sxsrf=AE3TifMBX3qYDb_FYJZWqPZMLnUVVwpFBA:1764370639882&q=egg&spell=1&sa=X&ved=2ahUKEwip9vfp-JWRAxXrcfEDHf5zOQIQBSgAegQIERAB&biw=1920&bih=919&dpr=1', 'Pending', 0, 3, '2025-11-29 08:19:16', '2026-01-09 12:28:21'),
(3, 2, 11, 'https://www.google.com/search?q=get+id+of+cuurent+log+user+laravel&oq=get+id+of+cuurent+log+user+laravel&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIICAEQABgWGB4yCggCEAAYgAQYogQyCggDEAAYgAQYogQyBwgEEAAY7wUyBwgFEAAY7wUyCggGEAAYgAQYogTSAQg5MjIyajBqN6gCALACAA&sourceid=chrome&ie=UTF-8', 'Approved', 0, 3, '2025-11-29 08:31:59', '2026-01-09 12:28:19'),
(4, 1, 1, 'https://www.google.com/search?q=url&oq=url&gs_lcrp=EgZjaHJvbWUyDwgAEEUYORiDARixAxiABDIHCAEQABiABDIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIHCAcQABiABDIHCAgQABiABDIHCAkQABiPAtIBBzM4OWowajeoAgCwAgA&sourceid=chrome&ie=UTF-8', 'Pending', 0, 3, '2026-01-13 22:33:29', '2026-01-13 22:33:29'),
(5, 2, 9, 'https://github.com/mitcool/highschool.me/blob/main/app/Http/Controllers/StudentController.php', 'Pending', 0, 3, '2026-01-13 23:12:41', '2026-01-13 23:12:41'),
(6, NULL, NULL, NULL, NULL, 0, 3, '2026-01-13 23:14:08', '2026-01-13 23:14:08'),
(7, NULL, NULL, NULL, NULL, NULL, 3, '2026-01-13 23:16:03', '2026-01-13 23:16:03'),
(8, NULL, NULL, NULL, NULL, NULL, 3, '2026-01-13 23:18:28', '2026-01-13 23:18:28'),
(9, NULL, NULL, NULL, NULL, NULL, 3, '2026-01-13 23:20:07', '2026-01-13 23:20:07'),
(10, NULL, NULL, NULL, NULL, -100, 3, '2026-01-13 23:21:53', '2026-01-13 23:21:53'),
(11, NULL, NULL, NULL, NULL, -450, 3, '2026-01-13 23:30:24', '2026-01-13 23:30:24'),
(12, NULL, NULL, NULL, NULL, -600, 3, '2026-01-14 07:30:08', '2026-01-14 07:30:08'),
(13, NULL, NULL, NULL, NULL, -450, 3, '2026-01-14 09:01:37', '2026-01-14 09:01:37'),
(14, NULL, NULL, NULL, NULL, -600, 3, '2026-01-14 10:20:13', '2026-01-14 10:20:13'),
(15, NULL, NULL, NULL, NULL, -850, 3, '2026-01-14 14:49:20', '2026-01-14 14:49:20'),
(16, NULL, NULL, 'Redeem Rewards', NULL, -600, 3, '2026-01-15 21:57:47', '2026-01-15 21:57:47'),
(17, 2, 8, 'http://localhost/phpmyadmin/index.php?route=/sql&db=highschool&table=users&pos=0', 'Approved', NULL, 12, '2026-01-15 22:12:13', '2026-01-15 22:19:12'),
(18, 1, 1, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=highschool&table=ambassador_activities', 'Pending', NULL, 12, '2026-01-15 22:17:15', '2026-01-15 22:17:15'),
(19, 6, 43, 'http://localhost/admin/ambassador-links', 'Denied', NULL, 12, '2026-01-15 22:21:59', '2026-01-15 22:22:10'),
(20, 6, 43, 'https://colab.research.google.com/drive/1v_qoh7eQnFOwZQWTNQiukjzpSYzHPeJA#scrollTo=oEP2-AiQhWL3', 'Approved', NULL, 12, '2026-01-20 22:22:54', '2026-01-20 22:23:39');

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

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_redemption_orders`
--

CREATE TABLE `ambassador_redemption_orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `country` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `total_points` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_redemption_orders`
--

INSERT INTO `ambassador_redemption_orders` (`id`, `user_id`, `country`, `city`, `address`, `zip_code`, `phone`, `total_points`) VALUES
(1, 3, 'Bulgaria', 'Varna', 'Beli Lilii, 22-24', '9000', '+359883437439', 850),
(2, 3, 'Bulgaria', 'Varna', 'Beli Lilii, 22-24', '9000', '+359883437439', 600);

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_rewards`
--

CREATE TABLE `ambassador_rewards` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `points` int NOT NULL
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
(18, 'Portable AI translation device', 1500),
(19, 'laino1', 5005);

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_services`
--

CREATE TABLE `ambassador_services` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_services`
--

INSERT INTO `ambassador_services` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Instagram'),
(3, 'YouTube'),
(4, 'TikTok'),
(5, 'Twitter (X)'),
(6, 'LinkedIn');

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_service_actions`
--

CREATE TABLE `ambassador_service_actions` (
  `id` int NOT NULL,
  `service_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `additional_information` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambassador_service_actions`
--

INSERT INTO `ambassador_service_actions` (`id`, `service_id`, `name`, `value`, `additional_information`) VALUES
(1, 1, 'Subscribe', '5000', NULL),
(2, 1, 'Comment on video', '3', '(max 9 per week)'),
(3, 1, 'Upload school-related video', '25', NULL),
(4, 1, 'Join school challenge video', '15', NULL),
(5, 1, 'Create reaction video', '20', NULL),
(6, 1, 'Add scool link to description', '5', NULL),
(7, 2, 'Subscribe', '2', NULL),
(8, 2, 'Comment on video', '3', '(max 9 per week)'),
(9, 2, 'Upload school-related video', '25', NULL),
(10, 2, 'Join school challenge video', '15', NULL),
(11, 2, 'Create reaction video', '20', NULL),
(12, 2, 'Add scool link to description', '5', NULL),
(13, 3, 'Subscribe', '2', NULL),
(14, 3, 'Comment on video', '3', '(max 9 per week)'),
(15, 3, 'Upload school-related video', '25', NULL),
(16, 3, 'Join school challenge video', '15', NULL),
(17, 3, 'Create reaction video', '20', NULL),
(18, 3, 'Add scool link to description', '5', NULL),
(19, 4, 'Subscribe', '2', NULL),
(20, 4, 'Comment on video', '3', '(max 9 per week)'),
(21, 4, 'Upload school-related video', '25', NULL),
(22, 4, 'Join school challenge video', '15', NULL),
(23, 4, 'Create reaction video', '20', NULL),
(24, 4, 'Add scool link to description', '5', NULL),
(25, 5, 'Subscribe', '2', NULL),
(26, 5, 'Comment on video', '3', '(max 9 per week)'),
(27, 5, 'Upload school-related video', '25', NULL),
(28, 5, 'Join school challenge video', '15', NULL),
(29, 5, 'Create reaction video', '20', NULL),
(30, 5, 'Add scool link to description', '5', NULL),
(31, 6, 'Subscribe', '2', NULL),
(32, 6, 'Comment on video', '3', '(max 9 per week)'),
(33, 6, 'Upload school-related video', '25', NULL),
(34, 6, 'Join school challenge video', '15', NULL),
(35, 6, 'Create reaction video', '20', NULL),
(36, 6, 'Add scool link to description', '5', NULL),
(43, 6, 'shundi', '50', NULL),
(44, 5, 'fuck Elon', '650', NULL),
(45, 4, 'fewf', '480', 'ewfefwf'),
(46, 5, 'fuck Elon', '500', 'ewfefwf');

-- --------------------------------------------------------

--
-- Table structure for table `ap_details`
--

CREATE TABLE `ap_details` (
  `course_id` int UNSIGNED NOT NULL,
  `ap_subject_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_exam_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ap_details`
--

INSERT INTO `ap_details` (`course_id`, `ap_subject_code`, `ap_exam_code`) VALUES
(5, 'ENGLANG', '1'),
(6, 'ENGLIT', '5'),
(20, 'CALCAB', '27'),
(21, 'CSP', '29'),
(23, 'CALCBC', '28'),
(26, 'SEMINAR', '31'),
(27, 'RESEARCH', '32'),
(29, 'BIO', '20'),
(32, 'ENVS', '9'),
(33, 'CSA', '30'),
(35, 'STAT', '19'),
(36, 'PHYS1', '25'),
(39, 'CHEM', '21'),
(40, 'PHYS2', '26'),
(46, 'USHIST', '15'),
(51, 'MICRO', '4'),
(52, 'MACRO', '3'),
(53, 'HUGEO', '11'),
(57, 'USGOV', '23'),
(58, 'COMPGOV', '24'),
(63, 'PSYCH', '7'),
(66, 'EUHIST', '14'),
(67, 'WHISTMOD', '16'),
(85, 'BIO', '69');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_courses`
--

CREATE TABLE `catalog_courses` (
  `id` int UNSIGNED NOT NULL,
  `fldoe_course_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_credits` decimal(3,1) DEFAULT NULL,
  `source_cte_course_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalog_courses`
--

INSERT INTO `catalog_courses` (`id`, `fldoe_course_code`, `course_number`, `title`, `default_credits`, `source_cte_course_id`) VALUES
(1, '1001310', NULL, 'English 1 - Literature & Composition', 1.0, NULL),
(2, '1001340', NULL, 'English 2 - Reading & Rhetorik', 1.0, NULL),
(3, '1001370', NULL, 'English 3 - American & World History', 1.0, NULL),
(4, '1001400', NULL, 'English 4 - Advanced Writing & Communication', 1.0, NULL),
(5, '1001420', NULL, 'English Language & Composition', 1.0, NULL),
(6, '1001430', NULL, 'English Literature & Composition', 1.0, NULL),
(7, '1002300', NULL, 'English 1 through ESOL', 1.0, NULL),
(8, '1002310', NULL, 'English 2 through ESOL', 1.0, NULL),
(9, '1002320', NULL, 'English 3 through ESOL', 1.0, NULL),
(10, '1002380', NULL, 'Development Language Arts through ESOL', 1.0, NULL),
(11, '1002381', NULL, 'Development Language Arts through ESOL - Reading', 1.0, NULL),
(12, '1002520', NULL, 'English 4 through ESOL', 1.0, NULL),
(13, '1007300', NULL, 'Speech 1', 1.0, NULL),
(14, '1007330', NULL, 'Debate 1', 1.0, NULL),
(15, '1009320', NULL, 'Creative Writing 1', 0.5, NULL),
(16, '1009330', NULL, 'Creative Writing 2', 0.5, NULL),
(17, '1200310', NULL, 'Algebra 1', 1.0, NULL),
(18, '1200330', NULL, 'Algebra 2', 1.0, NULL),
(19, '1200384', NULL, 'Mathematics for Data & Financial Literacy', 1.0, NULL),
(20, '1202310', NULL, 'Calculus AB', 1.0, NULL),
(21, '1202330', NULL, 'Calculus BC', 1.0, NULL),
(22, '1206310', NULL, 'Geometry', 1.0, NULL),
(23, '1210320', NULL, 'Statistics', 1.0, NULL),
(24, '1501300', NULL, 'Individual Sports 1', 0.5, NULL),
(25, '1501310', NULL, 'Individual Sports 2', 0.5, NULL),
(26, '1700500', NULL, 'AP Seminar', 1.0, NULL),
(27, '1700510', NULL, 'AP Research', 1.0, NULL),
(28, '2000310', NULL, 'Biology 1', 1.0, NULL),
(29, '2000340', NULL, 'Biology', 1.0, NULL),
(30, '2000342', NULL, 'Anatomy & Physiology', 1.0, NULL),
(31, '2000350', NULL, 'Anatomy & Physiology', 1.0, NULL),
(32, '2001380', NULL, 'Environmental Science', 1.0, NULL),
(33, '2001390', NULL, 'AP Environmental Science', 1.0, NULL),
(34, '2001340', NULL, 'Environmental Science', 1.0, NULL),
(35, '2002340', NULL, 'Statistics', 1.0, NULL),
(36, '2003370', NULL, 'Physics 1', 1.0, NULL),
(37, '2003380', NULL, 'Physics 1', 1.0, NULL),
(38, '200339', NULL, 'CLEP Information Systems', 1.0, NULL),
(39, '2003340', NULL, 'Chemistry 1', 1.0, NULL),
(40, '2003422', NULL, 'Physics 2', 1.0, NULL),
(41, '2003810', NULL, 'Robotics 1', 1.0, NULL),
(42, '2003820', NULL, 'Robotics 2', 1.0, NULL),
(43, '2100310', NULL, 'U.S. History', 1.0, NULL),
(44, '2100325', NULL, 'CLEP History of the United States I', 0.5, NULL),
(45, '2100326', NULL, 'CLEP History of the United States II', 0.5, NULL),
(46, '2100330', NULL, 'United States History', 1.0, NULL),
(47, '2102310', NULL, 'Economics', 0.5, NULL),
(48, '2102320', NULL, 'Economics (Honors)', 0.5, NULL),
(49, '2102355', NULL, 'CLEP Principles of Macroeconomics', 0.5, NULL),
(50, '2102356', NULL, 'CLEP Principles of Microeconomics', 0.5, NULL),
(51, '2102360', NULL, 'Microeconomics', 0.5, NULL),
(52, '2102370', NULL, 'Macroeconomics', 0.5, NULL),
(53, '2103400', NULL, 'Human Geography', 1.0, NULL),
(54, '2106310', NULL, 'U.S. Government', 0.5, NULL),
(55, '2106325', NULL, 'CLEP American Government', 0.5, NULL),
(56, '2106350', NULL, 'Law Studies', 0.5, NULL),
(57, '2106420', NULL, 'United States Government & Politics', 0.5, NULL),
(58, '2106430', NULL, 'Comparative Government and Politics', 0.5, NULL),
(59, '2106440', NULL, 'International Relations', 0.5, NULL),
(60, '2106460', NULL, 'Comparative Political Systems', 0.5, NULL),
(61, '2107300', NULL, 'Psychology 1', 0.5, NULL),
(62, '2107310', NULL, 'Psychology 2', 0.5, NULL),
(63, '2107350', NULL, 'Psychology', 1.0, NULL),
(64, '21077380', NULL, 'CLEP Introductory Psychology', 1.0, NULL),
(65, '2109310', NULL, 'World History', 1.0, NULL),
(66, '2109380', NULL, 'European History', 1.0, NULL),
(67, '2109420', NULL, 'World History: Modern', 1.0, NULL),
(68, '3026010', NULL, 'Health Opportunities through Physical Education (HOPE)', 1.0, NULL),
(69, '500531', NULL, 'CLEP Introductory Business Law', 1.0, NULL),
(70, '500532', NULL, 'CLEP Financial Accounting', 1.0, NULL),
(71, '500533', NULL, 'CLEP Principles of Management', 1.0, NULL),
(72, '500534', NULL, 'CLEP Principles of Marketing', 1.0, NULL),
(73, '820731', NULL, 'Digital Design 1', 1.0, NULL),
(74, '820732', NULL, 'Digital Design 2', 1.0, NULL),
(75, '820733', NULL, 'Digital Design 3', 1.0, NULL),
(76, '8207310', NULL, 'Digital Design 4', 1.0, NULL),
(79, '1515815', NULL, 'Vasko test course', 1.5, NULL),
(80, '159753852', NULL, 'English for cigani', 1.5, NULL),
(81, '151581558', NULL, 'Test lohg', 1.0, NULL),
(83, '987654321', NULL, 'Test files', 0.5, NULL),
(85, '4593217', NULL, 'Advance course test', 1.5, NULL),
(86, '0200383', NULL, 'Principles of Computer Science', 1.0, NULL),
(87, '9000010', NULL, 'PSAT Prep-Course', 1.0, NULL),
(89, '903460', NULL, 'Web Development Technologies', 1.0, NULL),
(90, '1001340', NULL, 'English 2 - Reading & Rhetorik', 1.0, NULL),
(91, '8812000', '8812000', 'Business Ownership', 1.0, 1),
(92, '8827110', '8827110', 'Marketing Essentials', 1.0, 2),
(93, '8207310', '8207310', 'Digital Information Technology', 1.0, 3),
(94, '8827120', '8827120', 'Marketing Applications', 1.0, 4),
(95, '8203310', '8203310', 'Accounting Applications 1', 1.0, 5),
(96, '8203320', '8203320', 'Accounting Applications 2', 1.0, 6),
(97, '8827210', '8827210', 'E-Commerce Marketing', 1.0, 7),
(98, '8203330', '8203330', 'Accounting Applications 3', 1.0, 8),
(99, '8812110', '8812110', 'Principles of Entrepreneurship', 1.0, 9),
(100, '8207310', '8207310', 'Digital Information Technology', 1.0, 10),
(101, '8812120', '8812120', 'Business Management and Law', 1.0, 11),
(102, '8812000', '8812000', 'Business Ownership', 1.0, 12),
(103, '8215120', '8215120', 'Business and Entrepreneurial Principles', 1.0, 13),
(104, '8203310', '8203310', 'Accounting Applications I', 1.0, 14),
(105, '8827110', '8827110', 'Marketing Essentials', 1.0, 15),
(106, '8301110', '8301110', 'Management and Human Resources', 1.0, 16),
(107, '8301100', '8301100', 'Business Analysis', 1.0, 17),
(108, '8839110', '8839110', 'International Marketing 1', 1.0, 18),
(109, '8215130', '8215130', 'Legal Aspects of Business', 1.0, 19),
(110, '8839120', '8839120', 'International Marketing 2', 1.0, 20),
(111, '8839130', '8839130', 'International Marketing 3', 1.0, 21),
(112, '8207310', '8207310', 'Digital Information Technology', 1.0, 22),
(113, '8827110', '8827110', 'Marketing Essentials', 1.0, 23),
(114, '8216110', '8216110', 'International Business Systems', 1.0, 24),
(115, '8827120', '8827120', 'Marketing Applications', 1.0, 25),
(116, '8216120', '8216120', 'International Finance and Law', 1.0, 26),
(117, '8827130', '8827130', 'Marketing Management', 1.0, 27),
(118, '8216130', '8216130', 'Business Internship', 1.0, 28),
(119, '8812000', '8812000', 'Business Ownership', 1.0, 29),
(120, '8207310', '8207310', 'Digital Information Technology', 1.0, 30),
(121, '8215130', '8215130', 'Legal Aspects of Business', 1.0, 31),
(122, '8306210', '8306210', 'Legal Studies 1', 1.0, 32),
(123, '8306220', '8306220', 'Legal Studies 2', 1.0, 33),
(124, '8306230', '8306230', 'Legal Studies 3', 1.0, 34),
(125, '8207310', '8207310', 'Digital Information Technology', 1.0, 35),
(126, '8417110', '8417110', 'Health Science Foundations', 1.0, 36),
(127, '8212110', '8212110', 'Administrative Office Technology 1', 1.0, 37),
(128, '8417131', '8417131', 'Allied Health Assisting 3', 1.0, 38),
(129, '8212201', '8212201', 'Medical Office Technology 1', 1.0, 39),
(130, '8212202', '8212202', 'Medical Office Technology 2', 1.0, 40),
(131, '8708140', '8708140', 'Biomedical Innovation', 1.0, 41),
(132, '8207310', '8207310', 'Digital Information Technology', 1.0, 42),
(133, '8417110', '8417110', 'Health Science Foundations', 1.0, 43),
(134, '8815150', '8815150', 'Business Communication and Technology', 1.0, 44),
(135, '8427130', '8427130', 'Electrocardiograph Technician 3', 1.0, 45),
(136, '8203310', '8203310', 'Accounting Applications 1', 1.0, 46),
(137, '8417110', '8417110', 'Health Science Foundations', 1.0, 47),
(138, '8815110', '8815110', 'Economics and Financial Services', 1.0, 48),
(139, '8417171', '8417171', 'Emergency Medical Responder 3', 1.0, 49),
(140, '8815130', '8815130', 'Financial Internship', 1.0, 50),
(141, '8417110', '8417110', 'Health Science Foundations', 1.0, 51),
(142, '8501420', '8501420', 'Finance Cooperation Education - OJT', 1.0, 52),
(143, '8417191', '8417191', 'Home Health Aide 3', 0.5, 53),
(144, '8207310', '8207310', 'Digital Information Technology', 1.0, 54),
(145, '8815150', '8815150', 'Business Communication and Technology', 1.0, 55),
(146, '8203310', '8203310', 'Accounting Applications 1', 1.0, 56),
(147, '8815130', '8815130', 'Financial Internship', 1.0, 57),
(148, '8417110', '8417110', 'Health Science Foundations', 1.0, 58),
(149, '8501420', '8501420', 'Finance Cooperation Education - OJT', 1.0, 59),
(150, '8417201', '8417201', 'Medical Laboratory Assisting 3', 1.0, 60),
(151, '8815160', '8815160', 'Managerial Accounting', 1.0, 61),
(152, '8417202', '8417202', 'Medical Laboratory Assisting 4', 1.0, 62),
(153, '8815170', '8815170', 'Business in a Global Economy', 1.0, 63),
(154, '8400320', '8400320', 'Medical Skills and Services', 1.0, 64),
(155, '8207310', '8207310', 'Digital Information Technology', 1.0, 65),
(156, '8417110', '8417110', 'Health Science Foundations', 1.0, 66),
(157, '9001310', '9001310', 'IT Fundamentals', 1.0, 67),
(158, '8417211', '8417211', 'Nursing Assistant 3', 1.0, 68),
(159, '9001320', '9001320', 'Computer and Network Security Fundamentals', 1.0, 69),
(160, '8418210', '8418210', 'Pharmacy Technician 1', 1.0, 70),
(161, '8418220', '8418220', 'Pharmacy Technician 2', 1.0, 71),
(162, '9001330', '9001330', 'Cybersecurity Essentials', 1.0, 72),
(163, '8418230', '8418230', 'Pharmacy Technician 3', 1.0, 73),
(164, '9001340', '9001340', 'Operational Cybersecurity', 1.0, 74),
(165, '8418240', '8418240', 'Pharmacy Technician 4', 1.0, 75),
(166, '9001350', '9001350', 'Cybersecurity Planning & Analysis', 1.0, 76),
(167, '8418250', '8418250', 'Pharmacy Technician 5', 1.0, 77),
(168, '9001360', '9001360', 'Database Security', 1.0, 78),
(169, '8418260', '8418260', 'Pharmacy Technician 6', 1.0, 79),
(170, '9001370', '9001370', 'Software & Application Security', 1.0, 80),
(171, '8418270', '8418270', 'Pharmacy Technician 7', 1.0, 81),
(172, '9001380', '9001380', 'Web Security', 1.0, 82),
(173, '9001390', '9001390', 'Applied Cybersecurity Applications', 1.0, 83),
(174, '8207310', '8207310', 'Digital Information Technology', 1.0, 84),
(175, '9003410', '9003410', 'Computer Fundamentals', 1.0, 85),
(176, '9003420', '9003420', 'Web Technologies', 1.0, 86),
(177, '8418410', '8418410', 'Practical Nursing Foundations 1A', 1.0, 87),
(178, '9003440', '9003440', 'Database Essentials', 1.0, 88),
(179, '9003450', '9003450', 'Programming Essentials', 1.0, 89),
(180, '8418420', '8418420', 'Practical Nursing Foundations 1B', 1.0, 90),
(181, '8418430', '8418430', 'Practical Nursing Foundations 2A', 1.0, 91),
(182, '0903460', '0903460', 'Web Development Techonlogies', 1.0, 92),
(183, '8418440', '8418440', 'Practical Nursing Foundations 2B', 1.0, 93),
(184, '9003470', '9003470', 'Multimedia Technologies', 1.0, 94),
(185, '8418450', '8418450', 'Medical Surgical Nursing 1A', 1.0, 95),
(186, '9003480', '9003480', 'Computer Networking Fundamentals', 1.0, 96),
(187, '8418460', '8418460', 'Medical Surgical Nursing 1B', 1.0, 97),
(188, '8418470', '8418470', 'Medical Surgical Nursing 2A', 1.0, 98),
(189, '8418480', '8418480', 'Medical Surgical Nursing 2B', 1.0, 99),
(190, '8418490', '8418490', 'Comprehensive Nursing and Transitional Skills', 1.0, 100),
(191, '9003490', '9003490', 'Cybersecurity Fundamentals', 1.0, 101),
(192, '9401010', '9401010', 'Artificial Intelligence in the World', 0.5, 102),
(193, '9401020', '9401020', 'Applications of Artificial Intelligence', 0.5, 103),
(194, '9007220', '9007220', 'Procedural Programming', 1.0, 104),
(195, '9401040', '9401040', 'Foundations of Machine Learning', 1.0, 105),
(196, '8207310', '8207310', 'Digital Information Technology', 1.0, 106),
(197, '9001510', '9001510', 'Computer Engineering & Support', 1.0, 107),
(198, '9001520', '9001520', 'Network Engineering & Support', 1.0, 108),
(199, '9001530', '9001530', 'Essentials of Cloud Technology', 1.0, 109),
(200, '9001540', '9001540', 'Basics of Cloud Computing & Virtualization', 1.0, 110),
(201, '9001550', '9001550', 'Advanced Cloud Computing & Virtualization', 1.0, 111),
(202, '9007610', '9007610', 'Advanced Information Technology', 1.0, 112),
(203, '9007210', '9007210', 'Foundations of Programming', 1.0, 113),
(204, '9007220', '9007220', 'Procedural Programming', 1.0, 114),
(205, '9007230', '9007230', 'Object-Oriented programming Fundamentals', 1.0, 115),
(206, '8207310', '8207310', 'Digital Information Technology', 1.0, 116),
(207, '9001210', '9001210', 'CSIT Foundations', 1.0, 117),
(208, '9001220', '9001220', 'CSIT System Essentials', 1.0, 118),
(209, '9001230', '9001230', 'CSIT Network Systems Configuration', 1.0, 119),
(210, '9001240', '9001240', 'CSIT Network Systems Design & Administration', 1.0, 120),
(211, '9001250', '9001250', 'CSIT Cyber Security Essentials', 1.0, 121),
(212, '9001260', '9001260', 'CSIT Cyber Security - Psysical', 1.0, 122),
(213, '9007710', '9007710', 'Foundations of Programming for Data Science and Artificial Intelligence', 1.0, 123),
(214, '9007220', '9007220', 'Procedural Programming', 1.0, 124),
(215, '9007720', '9007720', 'Data Analytics and Database Design', 1.0, 125),
(216, '9007730', '9007730', 'Machine Learning with Applications', 1.0, 126),
(217, '9007740', '9007740', 'Capstone Project with Industry Partners', 1.0, 127),
(218, '8206410', '8206410', 'Database Fundamentals', 0.5, 128),
(219, '8206420', '8206420', 'Data Control and Functions', 0.5, 129),
(220, '8206430', '8206430', 'Specialized Database Programming', 1.0, 130),
(221, '8206440', '8206440', 'Specialized Database Applications', 1.0, 131),
(222, '8207310', '8207310', 'Digital Information Technology', 1.0, 132),
(223, '9007210', '9007210', 'Foundations of Programming', 1.0, 133),
(224, '9007220', '9007220', 'Procedural Programming', 1.0, 134),
(225, '9007230', '9007230', 'Object-Oriented Programming Fundamentals', 1.0, 135),
(226, '9007310', '9007310', 'Database Design and SQL Programming', 1.0, 136),
(227, '9007320', '9007320', 'SQL Extension Languages', 1.0, 137),
(228, '9007330', '9007330', 'SQL Extension Languages II', 1.0, 138),
(229, '9007340', '9007340', 'Custom Database Programming', 1.0, 139),
(230, '8207310', '8207310', 'Digital Information Technology', 1.0, 140),
(231, '9007210', '9007210', 'Foundations of Programming', 1.0, 141),
(232, '9007220', '9007220', 'Procedural Programming', 1.0, 142),
(233, '9007230', '9007230', 'Object-Oriented Programming Fundamentals', 1.0, 143),
(234, '9007240', '9007240', 'Java Programming Essentials', 1.0, 144),
(235, '9007260', '9007260', 'Applied Object-Oriented Java Programming', 1.0, 145),
(236, '9007260', '9007260', 'Java Database Programming', 1.0, 146),
(237, '9007270', '9007270', 'Java Programming Capstone', 1.0, 147),
(238, '8207310', '8207310', 'Digital Information Technology', 1.0, 148),
(239, '8207020', '8207020', 'Networking 1', 1.0, 149),
(240, '8207030', '8207030', 'Networking 2, Infrastructure', 1.0, 150),
(241, '8207040', '8207040', 'Networking 3, Infrastructure', 1.0, 151),
(242, '8207050', '8207050', 'Networking 4, Infrastructure', 1.0, 152),
(243, '8207060', '8207060', 'Networking 5', 1.0, 153),
(244, '8207070', '8207070', 'Networking 6', 1.0, 154),
(245, '8207310', '8207310', 'Digital Information Technology', 1.0, 155),
(246, '8207020', '8207020', 'Networking 1', 1.0, 156),
(247, '8207441', '8207441', 'Networking 2, Administration', 1.0, 157),
(248, '8207442', '8207442', 'Networking 3, Administration', 1.0, 158),
(249, '8207443', '8207443', 'Networking 4, Administration', 1.0, 159),
(250, '8207060', '8207060', 'Networking 5', 1.0, 160),
(251, '8207070', '8207070', 'Networking 6', 1.0, 161),
(252, '8207310', '8207310', 'Digital Information Technology', 1.0, 162),
(253, '9007210', '9007210', 'Foundations of Programming', 1.0, 163),
(254, '9007220', '9007220', 'Procedural Programming', 1.0, 164),
(255, '9007230', '9007230', 'Object-Oriented Programming Fundamentals', 1.0, 165),
(256, '9007510', '9007510', 'Web Programming', 1.0, 166),
(257, '9007520', '9007520', 'JavaScript Programming', 1.0, 167),
(258, '9007530', '9007530', 'PHP Programming', 1.0, 168),
(259, '9001110', '9001110', 'Foundations of Web Design', 1.0, 169),
(260, '9001120', '9001120', 'User Interface Design', 1.0, 170),
(261, '9001130', '9001130', 'Web Scripting Fundamentals', 1.0, 171),
(262, '9001140', '9001140', 'Media Integration Essentials', 1.0, 172),
(263, '9001150', '9001150', 'E-commerce & Marketing Essentials', 1.0, 173),
(264, '9001160', '9001160', 'Interactivity Essentials', 1.0, 174);

-- --------------------------------------------------------

--
-- Table structure for table `clep_details`
--

CREATE TABLE `clep_details` (
  `course_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clep_details`
--

INSERT INTO `clep_details` (`course_id`) VALUES
(38),
(44),
(45),
(49),
(50),
(55),
(64),
(73),
(74),
(75),
(76);

-- --------------------------------------------------------

--
-- Table structure for table `coaching_sessions`
--

CREATE TABLE `coaching_sessions` (
  `id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educator_id` int NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int NOT NULL,
  `icon` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `topic` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `icon`, `topic`, `description`) VALUES
(1, 'earth.webp', 'Enrollment & Admissions Support', 'Support for applications, enrollment procedures, document review, and all admission steps.'),
(2, 'book.webp', 'Program & Course Support', 'Help with course access, course selection, add-ons, exams, and dashboard use.'),
(3, 'education.webp', 'Credit Transfer & Transcript Evaluation', 'Review of external credits, recognition of prior studies, and transcript evaluation.'),
(4, 'chat.webp', 'Student Help Desk', 'Support for students regarding access, progress, exams, and system navigation.'),
(5, 'question-hand.webp', 'Parent Help Desk', 'Support for parents on student progress, access issues, and administrative matters.'),
(6, 'desk.webp', 'Mentoring, Coaching & Group Session Support', 'Coordination of mentoring, coaching, learning sessions, and individual guidance.'),
(7, 'diploma.webp', 'Diploma & Reference Letter Requests', 'Processing of diploma documents, transcripts, and official reference letters.'),
(8, 'money.webp', 'Billing & Payment Support', 'Clarification of payments, fees, installment plans, and all billing-related matters.'),
(9, 'settings.webp', 'Technical Support', 'Assistance with login issues, technical errors, system access, and dashboard functions.'),
(10, 'gift.webp', 'Freshman Kit & Ambassador Program Support', 'Information on the Freshman Kit and assistance with the Ambassador Program.'),
(11, 'cup.webp', 'Awards Program Support', 'Information on award eligibility, achievement recognition, and submission criteria.'),
(12, 'handshake.webp', 'Partnership & Cooperation Requests', 'Handling cooperation requests from universities, schools, agencies, and institutions.'),
(13, 'mic.webp', 'Press & Media Inquiries', 'Contact point for press requests, media information, and official statements.'),
(14, 'case.webp', 'Career Inquiries', 'Information about open positions, application procedures, and career opportunities.'),
(15, 'light.webp', 'General Inquiries', 'Support for all general requests not covered by other categories.');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `iso` varchar(191) NOT NULL DEFAULT '',
  `name` varchar(191) NOT NULL DEFAULT '',
  `nicename` varchar(191) NOT NULL DEFAULT '',
  `nicename_de` varchar(191) DEFAULT NULL,
  `iso3` varchar(191) DEFAULT NULL,
  `numcode` tinyint(1) DEFAULT NULL,
  `phonecode` int DEFAULT NULL,
  `flag` varchar(191) NOT NULL DEFAULT '',
  `vat_rate` decimal(8,2) NOT NULL,
  `group` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `nicename_de`, `iso3`, `numcode`, `phonecode`, `flag`, `vat_rate`, `group`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'Afghanistan', 'AFG', 4, 93, 'af', 0.00, 0),
(2, 'AL', 'ALBANIA', 'Albania', 'Albanien', 'ALB', 8, 355, 'al', 0.00, 0),
(3, 'DZ', 'ALGERIA', 'Algeria', 'Algerien', 'DZA', 12, 213, 'dz', 0.00, 0),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'Amerikanisch-Samoa', 'ASM', 16, 1684, 'as', 0.00, 0),
(5, 'AD', 'ANDORRA', 'Andorra', 'Andorra', 'AND', 20, 376, 'ad', 0.00, 0),
(6, 'AO', 'ANGOLA', 'Angola', 'Angola', 'AGO', 24, 244, 'ao', 0.00, 0),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'Anguilla', 'AIA', 127, 1264, 'ai', 0.00, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'Antigua und Barbuda', 'ATG', 28, 1268, 'ag', 0.00, 0),
(10, 'AR', 'ARGENTINA', 'Argentina', 'Argentinien', 'ARG', 32, 54, 'ar', 0.00, 0),
(11, 'AM', 'ARMENIA', 'Armenia', 'Armenien', 'ARM', 51, 374, 'am', 0.00, 0),
(12, 'AW', 'ARUBA', 'Aruba', 'Aruba', 'ABW', 127, 297, 'aw', 0.00, 0),
(13, 'AU', 'AUSTRALIA', 'Australia', 'Australien', 'AUS', 36, 61, 'au', 0.00, 0),
(14, 'AT', 'AUSTRIA', 'Austria', 'Österreich', 'AUT', 40, 43, 'at', 10.00, 0),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'Aserbaidschan', 'AZE', 31, 994, 'az', 0.00, 0),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'Bahamas', 'BHS', 44, 1242, 'bs', 0.00, 0),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'Bahrain', 'BHR', 48, 973, 'bh', 0.00, 0),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'Bangladesch', 'BGD', 50, 880, 'bd', 0.00, 0),
(19, 'BB', 'BARBADOS', 'Barbados', 'Barbados', 'BRB', 52, 1246, 'bb', 0.00, 0),
(20, 'BY', 'BELARUS', 'Belarus', 'Belarus', 'BLR', 112, 375, 'by', 0.00, 0),
(21, 'BE', 'BELGIUM', 'Belgium', 'Belgien', 'BEL', 56, 32, 'be', 0.00, 0),
(22, 'BZ', 'BELIZE', 'Belize', 'Belize', 'BLZ', 84, 501, 'bz', 0.00, 0),
(23, 'BJ', 'BENIN', 'Benin', 'Benin', 'BEN', 127, 229, 'bj', 0.00, 0),
(24, 'BM', 'BERMUDA', 'Bermuda', 'Bermuda', 'BMU', 60, 1441, 'bm', 0.00, 0),
(25, 'BT', 'BHUTAN', 'Bhutan', 'Bhutan', 'BTN', 64, 975, 'bt', 0.00, 0),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'Bolivien', 'BOL', 68, 591, 'bo', 0.00, 0),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'Bosnien und Herzegowina', 'BIH', 70, 387, 'ba', 0.00, 0),
(28, 'BW', 'BOTSWANA', 'Botswana', 'Botsuana', 'BWA', 72, 267, 'bw', 0.00, 0),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', 'Bouvetinsel', 'BVT', 74, 0, 'bv', 0.00, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'Brasilien', 'BRA', 76, 55, 'br', 0.00, 0),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', 'Britisches Territorium im Indischen Ozean', 'IOT', 86, 246, 'io', 0.00, 0),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', 96, 673, 'bn', 0.00, 0),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'Bulgarien', 'BGR', 100, 359, 'bg', 0.00, 0),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'Burkina Faso', 'BFA', 127, 226, 'bf', 0.00, 0),
(35, 'BI', 'BURUNDI', 'Burundi', 'Burundi', 'BDI', 108, 257, 'bi', 0.00, 0),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'Kambodscha', 'KHM', 116, 855, 'kh', 0.00, 0),
(37, 'CM', 'CAMEROON', 'Cameroon', 'Kamerun', 'CMR', 120, 237, 'cm', 0.00, 0),
(38, 'CA', 'CANADA', 'Canada', 'Kanada', 'CAN', 124, 1, 'ca', 0.00, 0),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'Kap Verde', 'CPV', 127, 238, 'cv', 0.00, 0),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'Kaimaninseln', 'CYM', 127, 1345, 'ky', 0.00, 0),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'Zentralafrikanische Republik', 'CAF', 127, 236, 'cf', 0.00, 0),
(42, 'TD', 'CHAD', 'Chad', 'Tschad', 'TCD', 127, 235, 'td', 0.00, 0),
(43, 'CL', 'CHILE', 'Chile', 'Chile', 'CHL', 127, 56, 'cl', 0.00, 0),
(44, 'CN', 'CHINA', 'China', 'China', 'CHN', 127, 86, 'cn', 0.00, 0),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', 'Weihnachtsinsel', 'CXR', 127, 61, 'cx', 0.00, 0),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', 'Kokosinsel (Keeling)', 'CCK', NULL, 672, 'cc', 0.00, 0),
(47, 'CO', 'COLOMBIA', 'Colombia', 'Kolumbien', 'COL', 127, 57, 'co', 0.00, 0),
(48, 'KM', 'COMOROS', 'Comoros', 'Komoren', 'COM', 127, 269, 'km', 0.00, 0),
(49, 'CG', 'CONGO', 'Congo', 'Republik Kongo', 'COG', 127, 242, 'cg', 0.00, 0),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'Demokratische Republik Kongo', 'COD', 127, 242, 'cd', 0.00, 0),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'Cookinseln', 'COK', 127, 682, 'ck', 0.00, 0),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'Costa Rica', 'CRI', 127, 506, 'cr', 0.00, 0),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'Elfenbeinküste', 'CIV', 127, 225, 'ci', 0.00, 0),
(54, 'HR', 'CROATIA', 'Croatia', 'Kroatien', 'HRV', 127, 385, 'hr', 0.00, 0),
(55, 'CU', 'CUBA', 'Cuba', 'Kuba', 'CUB', 127, 53, 'cu', 0.00, 0),
(56, 'CY', 'CYPRUS', 'Cyprus', 'Zypern', 'CYP', 127, 357, 'cy', 0.00, 0),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'Tschechische Republik', 'CZE', 127, 420, 'cz', 0.00, 0),
(58, 'DK', 'DENMARK', 'Denmark', 'Dänemark', 'DNK', 127, 45, 'dk', 0.00, 0),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'Dschibuti', 'DJI', 127, 253, 'dj', 0.00, 0),
(60, 'DM', 'DOMINICA', 'Dominica', 'Dominica', 'DMA', 127, 1767, 'dm', 0.00, 0),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'Dominikanische Republik', 'DOM', 127, 1809, 'do', 0.00, 0),
(62, 'EC', 'ECUADOR', 'Ecuador', 'Ecuador', 'ECU', 127, 593, 'ec', 0.00, 0),
(63, 'EG', 'EGYPT', 'Egypt', 'Ägypten', 'EGY', 127, 20, 'eg', 0.00, 0),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'El Salvador', 'SLV', 127, 503, 'sv', 0.00, 0),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'Äquatorialguinea', 'GNQ', 127, 240, 'gq', 0.00, 0),
(66, 'ER', 'ERITREA', 'Eritrea', 'Eritrea', 'ERI', 127, 291, 'er', 0.00, 0),
(67, 'EE', 'ESTONIA', 'Estonia', 'Estland ', 'EST', 127, 372, 'ee', 0.00, 0),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'Äthiopien', 'ETH', 127, 251, 'et', 0.00, 0),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'Falklandinseln (Malwinen)', 'FLK', 127, 500, 'fk', 0.00, 0),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'Färöer', 'FRO', 127, 298, 'fo', 0.00, 0),
(71, 'FJ', 'FIJI', 'Fiji', 'Fidschi', 'FJI', 127, 679, 'fj', 0.00, 0),
(72, 'FI', 'FINLAND', 'Finland', 'Finnland', 'FIN', 127, 358, 'fi', 0.00, 0),
(73, 'FR', 'FRANCE', 'France', 'Frankreich', 'FRA', 127, 33, 'fr', 0.00, 0),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'Französisch-Guyana', 'GUF', 127, 594, 'gf', 0.00, 0),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'Französisch-Polynesien', 'PYF', 127, 689, 'pf', 0.00, 0),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', 'Französische Süd- und Antarktisgebiete', 'ATF', NULL, 0, 'tf', 0.00, 0),
(77, 'GA', 'GABON', 'Gabon', 'Gabun', 'GAB', 127, 241, 'ga', 0.00, 0),
(78, 'GM', 'GAMBIA', 'Gambia', 'Gambia', 'GMB', 127, 220, 'gm', 0.00, 0),
(79, 'GE', 'GEORGIA', 'Georgia', 'Georgien', 'GEO', 127, 995, 'ge', 0.00, 0),
(80, 'DE', 'GERMANY', 'Germany', 'Deutschland', 'DEU', 127, 49, 'de', 7.00, 0),
(81, 'GH', 'GHANA', 'Ghana', 'Ghana', 'GHA', 127, 233, 'gh', 0.00, 0),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'Gibraltar', 'GIB', 127, 350, 'gi', 0.00, 0),
(83, 'GR', 'GREECE', 'Greece', 'Griechenland', 'GRC', 127, 30, 'gr', 0.00, 0),
(84, 'GL', 'GREENLAND', 'Greenland', 'Grönland', 'GRL', 127, 299, 'gl', 0.00, 0),
(85, 'GD', 'GRENADA', 'Grenada', 'Grenada', 'GRD', 127, 1473, 'gd', 0.00, 0),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'Guadeloupe', 'GLP', 127, 590, 'gp', 0.00, 0),
(87, 'GU', 'GUAM', 'Guam', 'Guam', 'GUM', 127, 1671, 'gu', 0.00, 0),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'Guatemala', 'GTM', 127, 502, 'gt', 0.00, 0),
(89, 'GN', 'GUINEA', 'Guinea', 'Guinea', 'GIN', 127, 224, 'gn', 0.00, 0),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'Guinea-Bissau', 'GNB', 127, 245, 'gw', 0.00, 0),
(91, 'GY', 'GUYANA', 'Guyana', 'Guyana', 'GUY', 127, 592, 'gy', 0.00, 0),
(92, 'HT', 'HAITI', 'Haiti', 'Haiti', 'HTI', 127, 509, 'ht', 0.00, 0),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', 'Heard und die McDonaldinseln', 'HMD', NULL, 0, 'hm', 0.00, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'Vatikanstadt', 'VAT', 127, 39, 'va', 0.00, 0),
(95, 'HN', 'HONDURAS', 'Honduras', 'Honduras', 'HND', 127, 504, 'hn', 0.00, 0),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'Hongkong', 'HKG', 127, 852, 'hk', 0.00, 0),
(97, 'HU', 'HUNGARY', 'Hungary', 'Ungarn', 'HUN', 127, 36, 'hu', 0.00, 0),
(98, 'IS', 'ICELAND', 'Iceland', 'Island', 'ISL', 127, 354, 'is', 0.00, 0),
(99, 'IN', 'INDIA', 'India', 'Indien', 'IND', 127, 91, 'in', 0.00, 0),
(100, 'ID', 'INDONESIA', 'Indonesia', 'Indonesien', 'IDN', 127, 62, 'id', 0.00, 0),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'Iran', 'IRN', 127, 98, 'ir', 0.00, 0),
(102, 'IQ', 'IRAQ', 'Iraq', 'Irak', 'IRQ', 127, 964, 'iq', 0.00, 0),
(103, 'IE', 'IRELAND', 'Ireland', 'Irland', 'IRL', 127, 353, 'ie', 0.00, 0),
(104, 'IL', 'ISRAEL', 'Israel', 'Israel', 'ISR', 127, 972, 'il', 0.00, 0),
(105, 'IT', 'ITALY', 'Italy', 'Italien', 'ITA', 127, 39, 'it', 0.00, 0),
(106, 'JM', 'JAMAICA', 'Jamaica', 'Jamaika', 'JAM', 127, 1876, 'jm', 0.00, 0),
(107, 'JP', 'JAPAN', 'Japan', 'Japan', 'JPN', 127, 81, 'jp', 0.00, 0),
(108, 'JO', 'JORDAN', 'Jordan', 'Jordanien', 'JOR', 127, 962, 'jo', 0.00, 0),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'Kasachstan', 'KAZ', 127, 7, 'kz', 0.00, 0),
(110, 'KE', 'KENYA', 'Kenya', 'Kenia', 'KEN', 127, 254, 'ke', 0.00, 0),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'Kiribari', 'KIR', 127, 686, 'ki', 0.00, 0),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'Nordkorea', 'PRK', 127, 850, 'kp', 0.00, 0),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'Südkorea', 'KOR', 127, 82, 'kr', 0.00, 0),
(114, 'KW', 'KUWAIT', 'Kuwait', 'Kuwait', 'KWT', 127, 965, 'kw', 0.00, 0),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'Kirgisistan', 'KGZ', 127, 996, 'kg', 0.00, 0),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'Laos', 'LAO', 127, 856, 'la', 0.00, 0),
(117, 'LV', 'LATVIA', 'Latvia', 'Lettland', 'LVA', 127, 371, 'lv', 0.00, 0),
(118, 'LB', 'LEBANON', 'Lebanon', 'Libanon', 'LBN', 127, 961, 'lb', 0.00, 0),
(119, 'LS', 'LESOTHO', 'Lesotho', 'Lesotho', 'LSO', 127, 266, 'ls', 0.00, 0),
(120, 'LR', 'LIBERIA', 'Liberia', 'Liberia', 'LBR', 127, 231, 'lr', 0.00, 0),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'Libyen', 'LBY', 127, 218, 'ly', 0.00, 0),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'Liechtenstein', 'LIE', 127, 423, 'li', 0.00, 0),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'Litauen', 'LTU', 127, 370, 'lt', 0.00, 0),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'Luxemburg', 'LUX', 127, 352, 'lu', 0.00, 0),
(125, 'MO', 'MACAO', 'Macao', 'Macau', 'MAC', 127, 853, 'mo', 0.00, 0),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'Mazedonien', 'MKD', 127, 389, 'mk', 0.00, 0),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'Madagaskar', 'MDG', 127, 261, 'mg', 0.00, 0),
(128, 'MW', 'MALAWI', 'Malawi', 'Malawi', 'MWI', 127, 265, 'mw', 0.00, 0),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'Malaysia', 'MYS', 127, 60, 'my', 0.00, 0),
(130, 'MV', 'MALDIVES', 'Maldives', 'Malediven', 'MDV', 127, 960, 'mv', 0.00, 0),
(131, 'ML', 'MALI', 'Mali', 'Mali', 'MLI', 127, 223, 'ml', 0.00, 0),
(132, 'MT', 'MALTA', 'Malta', 'Malta', 'MLT', 127, 356, 'mt', 0.00, 0),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'Marshallinseln', 'MHL', 127, 692, 'mh', 0.00, 0),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'Martinique ', 'MTQ', 127, 596, 'mq', 0.00, 0),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'Mauretanien', 'MRT', 127, 222, 'mr', 0.00, 0),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'Mauritius', 'MUS', 127, 230, 'mu', 0.00, 0),
(137, 'YT', 'MAYOTTE', 'Mayotte', 'Mayotte', 'MYT', NULL, 269, 'yt', 0.00, 0),
(138, 'MX', 'MEXICO', 'Mexico', 'Mexiko', 'MEX', 127, 52, 'mx', 0.00, 0),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'Föderierte Staaten von Mikronesien', 'FSM', 127, 691, 'fm', 0.00, 0),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'Moldawien', 'MDA', 127, 373, 'md', 0.00, 0),
(141, 'MC', 'MONACO', 'Monaco', 'Monaco', 'MCO', 127, 377, 'mc', 0.00, 0),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'Mongolei', 'MNG', 127, 976, 'mn', 0.00, 0),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'Montserrat', 'MSR', 127, 1664, 'ms', 0.00, 0),
(144, 'MA', 'MOROCCO', 'Morocco', 'Marokko', 'MAR', 127, 212, 'ma', 0.00, 0),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'Mosambik', 'MOZ', 127, 258, 'mz', 0.00, 0),
(146, 'MM', 'MYANMAR', 'Myanmar', 'Myanmar', 'MMR', 104, 95, 'mm', 0.00, 0),
(147, 'NA', 'NAMIBIA', 'Namibia', 'Namibia', 'NAM', 127, 264, 'na', 0.00, 0),
(148, 'NR', 'NAURU', 'Nauru', 'Nauru', 'NRU', 127, 674, 'nr', 0.00, 0),
(149, 'NP', 'NEPAL', 'Nepal', 'Nepal', 'NPL', 127, 977, 'np', 0.00, 0),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'Niederlande', 'NLD', 127, 31, 'nl', 0.00, 0),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'Niederländische Antillen', 'ANT', 127, 599, 'an', 0.00, 0),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'Neukaledonien', 'NCL', 127, 687, 'nc', 0.00, 0),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'Neuseeland', 'NZL', 127, 64, 'nz', 0.00, 0),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'Nicaragua', 'NIC', 127, 505, 'ni', 0.00, 0),
(155, 'NE', 'NIGER', 'Niger', 'Niger', 'NER', 127, 227, 'ne', 0.00, 0),
(156, 'NG', 'NIGERIA', 'Nigeria', 'Nigeria', 'NGA', 127, 234, 'ng', 0.00, 0),
(157, 'NU', 'NIUE', 'Niue', 'Niue', 'NIU', 127, 683, 'nu', 0.00, 0),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'Norfolkinsel', 'NFK', 127, 672, 'nf', 0.00, 0),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'Nördliche Marianen', 'MNP', 127, 1670, 'mp', 0.00, 0),
(160, 'NO', 'NORWAY', 'Norway', 'Norwegen', 'NOR', 127, 47, 'no', 0.00, 0),
(161, 'OM', 'OMAN', 'Oman', 'Oman', 'OMN', 127, 968, 'om', 0.00, 0),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'Pakistan', 'PAK', 127, 92, 'pk', 0.00, 0),
(163, 'PW', 'PALAU', 'Palau', 'Palau', 'PLW', 127, 680, 'pw', 0.00, 0),
(165, 'PA', 'PANAMA', 'Panama', 'Panama', 'PAN', 127, 507, 'pa', 0.00, 0),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'Papua-Neuguinea', 'PNG', 127, 675, 'pg', 0.00, 0),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'Paraguay', 'PRY', 127, 595, 'py', 0.00, 0),
(168, 'PE', 'PERU', 'Peru', 'Peru', 'PER', 127, 51, 'pe', 0.00, 0),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'Philippinen', 'PHL', 127, 63, 'ph', 0.00, 0),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'Pitcairninseln', 'PCN', 127, 0, 'pn', 0.00, 0),
(171, 'PL', 'POLAND', 'Poland', 'Polen', 'POL', 127, 48, 'pl', 0.00, 0),
(172, 'PT', 'PORTUGAL', 'Portugal', 'Portugal', 'PRT', 127, 351, 'pt', 0.00, 0),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'Puerto Rico', 'PRI', 127, 1787, 'pr', 0.00, 0),
(174, 'QA', 'QATAR', 'Qatar', 'Katar', 'QAT', 127, 974, 'qa', 0.00, 0),
(175, 'RE', 'REUNION', 'Reunion', 'Réunion', 'REU', 127, 262, 're', 0.00, 0),
(176, 'RO', 'ROMANIA', 'Romania', 'Rumänien', 'ROM', 127, 40, 'ro', 0.00, 0),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'Russland', 'RUS', 127, 70, 'ru', 0.00, 0),
(178, 'RW', 'RWANDA', 'Rwanda', 'Ruanda', 'RWA', 127, 250, 'rw', 0.00, 0),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'St. Helena', 'SHN', 127, 290, 'sh', 0.00, 0),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'St. Kitts und Nevis', 'KNA', 127, 1869, 'kn', 0.00, 0),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'St. Lucia', 'LCA', 127, 1758, 'lc', 0.00, 0),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'Saint-Pierre und Miquelon', 'SPM', 127, 508, 'pm', 0.00, 0),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'St. Vincent und die Grenadinen', 'VCT', 127, 1784, 'vc', 0.00, 0),
(184, 'WS', 'SAMOA', 'Samoa', 'Samoa', 'WSM', 127, 684, 'ws', 0.00, 0),
(185, 'SM', 'SAN MARINO', 'San Marino', 'San Marino', 'SMR', 127, 378, 'sm', 0.00, 0),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'São Tomé und Príncipe', 'STP', 127, 239, 'st', 0.00, 0),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'Saudi-Arabien', 'SAU', 127, 966, 'sa', 0.00, 0),
(188, 'SN', 'SENEGAL', 'Senegal', 'Senegal', 'SEN', 127, 221, 'sn', 0.00, 0),
(189, 'RS', 'SERBIA ', 'Serbia ', 'Serbien', 'SRB', NULL, 381, 'rs', 0.00, 0),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'Seychellen', 'SYC', 127, 248, 'sc', 0.00, 0),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'Sierra Leone', 'SLE', 127, 232, 'sl', 0.00, 0),
(192, 'SG', 'SINGAPORE', 'Singapore', 'Singapur', 'SGP', 127, 65, 'sg', 0.00, 0),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'Slowakei', 'SVK', 127, 421, 'sk', 0.00, 0),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'Slovenia', 'SVN', 127, 386, 'si', 0.00, 0),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'Salomonen', 'SLB', 90, 677, 'sb', 0.00, 0),
(196, 'SO', 'SOMALIA', 'Somalia', 'Somalia', 'SOM', 127, 252, 'so', 0.00, 0),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'Südafrika', 'ZAF', 127, 27, 'za', 0.00, 0),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 'Südgeorgien und die Südlichen Sandwichinseln', 'SGS', NULL, 0, 'gs', 0.00, 0),
(199, 'ES', 'SPAIN', 'Spain', 'Spanien', 'ESP', 127, 34, 'es', 0.00, 0),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'Sri Lanka', 'LKA', 127, 94, 'lk', 0.00, 0),
(201, 'SD', 'SUDAN', 'Sudan', 'Sudan ', 'SDN', 127, 249, 'sd', 0.00, 0),
(202, 'SR', 'SURINAME', 'Suriname', 'Suriname', 'SUR', 127, 597, 'sr', 0.00, 0),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'Svalbard und Jan Mayen', 'SJM', 127, 47, 'sj', 0.00, 0),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'Swasiland', 'SWZ', 127, 268, 'sz', 0.00, 0),
(205, 'SE', 'SWEDEN', 'Sweden', 'Schweden', 'SWE', 127, 46, 'se', 0.00, 0),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'Schweiz', 'CHE', 127, 41, 'ch', 0.00, 0),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'Syrien', 'SYR', 127, 963, 'sy', 0.00, 0),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'Taiwan', 'TWN', 127, 886, 'tw', 0.00, 0),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'Tadschikistan', 'TJK', 127, 992, 'tj', 0.00, 0),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'Tansania', 'TZA', 127, 255, 'tz', 0.00, 0),
(211, 'TH', 'THAILAND', 'Thailand', 'Thailand', 'THA', 127, 66, 'th', 0.00, 0),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', 'Osttimor', 'TLS', NULL, 670, 'tl', 0.00, 0),
(213, 'TG', 'TOGO', 'Togo', 'Togo', 'TGO', 127, 228, 'tg', 0.00, 0),
(214, 'TK', 'TOKELAU', 'Tokelau', 'Tokelau', 'TKL', 127, 690, 'tk', 0.00, 0),
(215, 'TO', 'TONGA', 'Tonga', 'Tonga', 'TON', 127, 676, 'to', 0.00, 0),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'Trinidad und Tobago', 'TTO', 127, 1868, 'tt', 0.00, 0),
(217, 'TN', 'TUNISIA', 'Tunisia', 'Tunesien', 'TUN', 127, 216, 'tn', 0.00, 0),
(218, 'TR', 'TURKEY', 'Turkey', 'Türkei', 'TUR', 127, 90, 'tr', 0.00, 0),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'Turkmenistan', 'TKM', 127, 7370, 'tm', 0.00, 0),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'Turks- und Caicosinseln', 'TCA', 127, 1649, 'tc', 0.00, 0),
(221, 'TV', 'TUVALU', 'Tuvalu', 'Tuvalu', 'TUV', 127, 688, 'tv', 0.00, 0),
(222, 'UG', 'UGANDA', 'Uganda', 'Uganda', 'UGA', 127, 256, 'ug', 0.00, 0),
(223, 'UA', 'UKRAINE', 'Ukraine', 'Ukraine', 'UKR', 127, 380, 'ua', 0.00, 0),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'Vereinigte Arabische Emirate', 'ARE', 127, 971, 'ae', 0.00, 0),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'Vereinigtes Königreich', 'GBR', 127, 44, 'gb', 0.00, 0),
(226, 'US', 'UNITED STATES', 'United States', 'Vereinigte Staaten', 'USA', 127, 1, 'us', 0.00, 0),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', NULL, 1, 'um', 0.00, 0),
(228, 'UY', 'URUGUAY', 'Uruguay', 'Uruguay', 'URY', 127, 598, 'uy', 0.00, 0),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'Usbekistan', 'UZB', 127, 998, 'uz', 0.00, 0),
(230, 'VU', 'VANUATU', 'Vanuatu', 'Vanuatu', 'VUT', 127, 678, 'vu', 0.00, 0),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'Venezuela', 'VEN', 127, 58, 've', 0.00, 0),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'Vietnam', 'VNM', 127, 84, 'vn', 0.00, 0),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'Britische Jungferninseln', 'VGB', 92, 1284, 'vg', 0.00, 0),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'Amerikanische Jungferninseln', 'VIR', 127, 1340, 'vi', 0.00, 0),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'Wallis und Futuna', 'WLF', 127, 681, 'wf', 0.00, 0),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'Westsahara', 'ESH', 127, 212, 'eh', 0.00, 0),
(237, 'YE', 'YEMEN', 'Yemen', 'Jemen', 'YEM', 127, 967, 'ye', 0.00, 0),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'Sambia', 'ZMB', 127, 260, 'zm', 0.00, 0),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'Simbabwe', 'ZWE', 127, 263, 'zw', 0.00, 0),
(240, 'ME', 'MONTENEGRO', 'Montenegro', 'Montenegro', 'MNE', NULL, 382, 'me', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` smallint UNSIGNED NOT NULL,
  `curriculum_type_id` tinyint UNSIGNED NOT NULL,
  `subject_area_id` smallint UNSIGNED DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `curriculum_type_id`, `subject_area_id`, `name`) VALUES
(1, 1, 4, 'English Language Arts (4 Credits)'),
(2, 1, 8, 'Mathematics (4 Credits)'),
(3, 1, 11, 'Science (3 Credits)'),
(4, 1, 14, 'Social Studies (3 Credits)'),
(5, 1, 5, 'Fine & Practical Arts (1 credit)'),
(6, 1, 10, 'Physical Education (1 credit)'),
(7, 2, 3, 'English & Communication'),
(8, 2, 7, 'Leadership & Career Development'),
(9, 2, 13, 'Social Science & Humanities'),
(10, 2, 15, 'Technology/Computer Education'),
(11, 3, 1, 'Capstone (Special Programs)'),
(12, 3, 2, 'English'),
(13, 3, 6, 'History & Social Sciences'),
(14, 3, 9, 'Mathematics & Computer Science'),
(15, 3, 12, 'Sciences'),
(16, 4, NULL, 'Health Science'),
(17, 4, NULL, 'Business Management and Administration'),
(18, 4, NULL, 'Finance'),
(19, 4, NULL, 'Information Technology'),
(20, 4, NULL, 'Marketing, Sales & Service');

-- --------------------------------------------------------

--
-- Table structure for table `course_files`
--

CREATE TABLE `course_files` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` int UNSIGNED NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'use as a name',
  `stored_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'link to file',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_files`
--

INSERT INTO `course_files` (`id`, `course_id`, `label`, `stored_path`, `created_at`, `updated_at`) VALUES
(12, 89, 'How to1', 'https://docs.google.com/spreadsheets/d/1YcHvvQI8rTWNESIPjd7wyeNqVixUg78ONm2b0hzOkwk/edit?usp=sharing', '2026-02-12 07:28:58', '2026-02-12 07:28:58'),
(13, 89, 'test update', 'https://mailtrap.io/inboxes/598219/messages/5334926282', '2026-02-12 07:28:58', '2026-02-12 07:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `type` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`id`, `name`, `description`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 'International U.S. High School Diploma Transfer Program', '<p><span style=\"color:#000000\"><strong>Earn a fully recognized U.S. High School Diploma (Florida) by transferring your completed credits from your local high school and pursuing six additional U.S.-specific courses. Conducted entirely online and accessible worldwide.</strong></span></p>\n\n<div class=\"d-flex flex-column flex-md-row justify-content-between\">\n<div>\n<p><span style=\"color:#000000\"><strong>10 Strong Program Features:</strong></span></p>\n\n<ul>\n	<li>Rolling enrollment with 12-month year-round schooling</li>\n	<li>Self-paced learning with flexible course progression</li>\n	<li>Full access to all course materials and learning resources</li>\n	<li>24/7 access to the AI-StudyMentor</li>\n	<li>Unlimited tutor support from professional subject teachers</li>\n	<li>Structured online study materials for all six courses</li>\n	<li>Access to all assessments and final exams</li>\n	<li>Digital transcript available in the dashboards</li>\n	<li>Exclusive Freshman Kit with stylish gear</li>\n	<li>Participation in the school&rsquo;s Awards and Ambassador Program</li>\n	<li>Online parent consultation included</li>\n</ul>\n</div>\n\n<div>\n<p><span style=\"color:#000000\"><strong>Included courses:</strong></span></p>\n\n<ul>\n	<li>U.S. English Language Arts</li>\n	<li>U.S. History</li>\n	<li>U. S. Government &amp; Economics</li>\n	<li>U.S. Fundamental &amp; Comprehensive Law Studies</li>\n	<li>U.S. International Relations</li>\n	<li>U.S. Psychology &amp; Sociology</li>\n</ul>\n</div>\n</div>', 1900, 1, '2025-11-03 11:30:09', '2025-11-03 11:30:09'),
(2, 'Single Module Courses with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Boost your high school diploma with individual online courses with:</strong></span></p>\n\n<ul>\n	<li>Comprehensive digital course materials</li>\n	<li>24/7 AI-StudyMentor access</li>\n	<li>Unlimited professional teacher support</li>\n	<li>Two personal 30-minute mentoring sessions</li>\n	<li>Self-assessments &amp; final exam</li>\n</ul>\n\n<p>that highlight your strengths and accomplishments. Ideal for students who need to complete specific subjects for credit transfer, improvement, or personal enrichment. Conducted entirely online and accessible worldwide.</p>', 490, 2, '2025-11-03 11:30:36', '2025-11-03 11:30:36'),
(3, 'Single Honors Courses with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Challenge yourself with honors courses that deepen understanding, strengthen performance, and highlight personal achievement with:</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; final exam</li>\r\n</ul>\r\n\r\n<p>that reflect motivation, curiosity, and strong results. Ideal for students seeking honors credit, skill development, or preparation for Advanced Placement courses. Conducted entirely online and accessible worldwide.</p>', 590, 2, '2025-11-03 11:30:56', '2025-11-03 11:30:56'),
(4, 'English Courses (ESOL) with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Improve English skills for future studies and career development through structured online courses for non-native speakers with:</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; final proficiency exam</li>\r\n</ul>\r\n\r\n<p>Covers listening, speaking, reading, and writing according to state-approved U.S. English Language Development proficiency levels (Entering to Bridging). Conducted entirely online and accessible worldwide.</p>', 590, 2, '2025-11-03 11:33:41', '2025-11-03 11:33:41'),
(5, 'PSAT Prep-Course with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Sharpen your PSAT performance through a structured online prep course with:</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; full simulated pre-exam</li>\r\n</ul>\r\n\r\n<p>Strengthen test-taking strategies, critical reading, writing, and math skills in alignment with official PSAT standards. Conducted entirely online and accessible worldwide.</p>', 690, 2, '2025-11-03 11:34:00', '2025-11-03 11:34:00'),
(6, 'SAT Prep-Course with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Get ready for the SAT exam through a structured online prep course including :</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; full simulated pre-exam</li>\r\n</ul>\r\n\r\n<p>Focused on enhancing reading, writing, language, and math competencies according to official SAT standards. Conducted entirely online and accessible worldwide.</p>', 990, 2, '2025-11-03 11:34:16', '2025-11-03 11:34:16'),
(7, 'ACT Prep-Course with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Build essential skills for the ACT with a comprehensive online prep course including:</strong></span></p>\n\n<ul>\n	<li>Comprehensive digital course materials</li>\n	<li>24/7 AI-StudyMentor access</li>\n	<li>Unlimited professional teacher support</li>\n	<li>Two personal 30-minute mentoring sessions</li>\n	<li>Self-assessments &amp; full simulated pre-exam</li>\n</ul>\n\n<p>Designed to improve English, reading, math, and science reasoning skills in accordance with official ACT standards. Conducted entirely online and accessible worldwide.</p>', 990, 2, '2025-11-03 11:34:36', '2025-11-03 11:34:36'),
(8, 'AP Prep-Courses with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Advance AP performance through subject-specific online courses that deepen mastery, and maximize scoring potential with:</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; full simulated pre-exam</li>\r\n</ul>\r\n\r\n<p>Enhances subject mastery, exam strategies, and readiness for official AP exams. Conducted entirely online and accessible worldwide.</p>', 790, 2, '2025-11-03 11:34:57', '2025-11-03 11:34:57'),
(9, 'CLEP Prep-Course with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Prepare for official CLEP exams and earn college credit through focused online courses with:</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; full simulated pre-exam</li>\r\n</ul>\r\n\r\n<p>Enables credit-by-exam achievement and accelerates progress toward future college degrees. Conducted entirely online and accessible worldwide.</p>', 790, 2, '2025-11-03 11:35:18', '2025-11-03 11:35:18'),
(10, 'CTE Prep-Courses with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Develop CTE readiness for Career and Technical Education exams through specialized online courses with:</strong></span></p>\r\n\r\n<ul>\r\n	<li>Comprehensive digital course materials</li>\r\n	<li>24/7 AI-StudyMentor access</li>\r\n	<li>Unlimited professional teacher support</li>\r\n	<li>Two personal 30-minute mentoring sessions</li>\r\n	<li>Self-assessments &amp; full simulated pre-exam</li>\r\n</ul>\r\n\r\n<p>Advances technical skills and exam performance in chosen career fields. Conducted entirely online and accessible worldwide.</p>', 790, 2, '2025-11-03 11:35:18', '2025-11-03 11:35:18'),
(11, 'Group Learning Sessions', '<p>Join group learning sessions led by professional subject teachers, focused on collaborative progress review, shared identification of learning gaps, collective time management strategies, task coordination, short-term goal planning, and study technique exchange. Conducted online and accessible worldwide (45-minute session).</p>', 60, 3, '2025-11-03 11:35:18', '2025-11-03 11:35:18'),
(12, 'Personal Mentoring Sessions', '<p>Experience personal mentoring sessions conducted by professional subject teachers, offering individual problem solving, clarification of complex subjects, assessment preparation, and improvement of learning structure and performance in selected subjects. Conducted online and accessible worldwide (45-minute session).</p>', 150, 3, '2025-11-03 11:35:18', '2025-11-03 11:35:18'),
(13, 'College & Career Coaching', '<p>Master your college and career strategy through structured coaching conducted by professional counselors, covering college selection, application planning, test strategy, essay and document review, scholarship and financial-aid guidance, interview preparation, and progress monitoring. Conducted online and accessible worldwide (45-minute session).</p>', 250, 3, '2025-11-03 11:35:18', '2025-11-03 11:35:18'),
(14, 'PreACT Prep-Course with AI & Personal Mentoring', '<p><span style=\"color:#000000\"><strong>Build essential skills for the ACT with a comprehensive online prep course including:</strong></span></p>  <ul> 	<li>Comprehensive digital course materials</li> 	<li>24/7 AI-StudyMentor access</li> 	<li>Unlimited professional teacher support</li> 	<li>Two personal 30-minute mentoring sessions</li> 	<li>Self-assessments &amp; full simulated pre-exam</li> </ul>  <p>Designed to improve English, reading, math, and science reasoning skills in accordance with official ACT standards. Conducted entirely online and accessible worldwide.</p>', 690, 0, '2025-11-24 08:47:32', '2025-11-24 08:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_videos`
--

CREATE TABLE `course_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_videos`
--

INSERT INTO `course_videos` (`id`, `course_id`, `title`, `url`, `position`, `created_at`, `updated_at`) VALUES
(1, 89, 'Online studieren & promovieren mit KI-Turbo - ONSITES Graduate School', 'https://www.youtube.com/embed/a6xoxlBionk?si=qROsi95s6wgiXVtL', 0, '2025-11-26 11:24:23', '2025-11-26 11:24:23'),
(2, 81, 'Online studieren & promovieren mit KI-Turbo - ONSITES Graduate School', 'https://www.youtube.com/embed/a6xoxlBionk?si=qROsi95s6wgiXVtL', 0, '2025-11-26 13:07:48', '2025-11-26 13:07:48'),
(3, 83, 'Online studieren & promovieren mit KI-Turbo - ONSITES Graduate School', 'https://www.youtube.com/embed/a6xoxlBionk?si=qROsi95s6wgiXVtL', 0, '2025-11-26 13:17:49', '2025-11-26 13:17:49'),
(4, 85, 'Online studieren & promovieren mit KI-Turbo - ONSITES Graduate School', 'https://www.youtube.com/embed/a6xoxlBionk?si=qROsi95s6wgiXVtL', 0, '2025-11-26 13:42:39', '2025-11-26 13:42:39'),
(5, 89, 'video 1', 'http://localhost/phpmyadmin/index.php?route=/sql&db=highschool&table=course_files&pos=0', 0, '2026-02-12 07:28:58', '2026-02-12 07:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `cte_clusters`
--

CREATE TABLE `cte_clusters` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cte_clusters`
--

INSERT INTO `cte_clusters` (`id`, `name`) VALUES
(1, 'Health Science'),
(2, 'Business Management and Administration'),
(3, 'Finance'),
(4, 'Information Technology'),
(5, 'Marketing, Sales & Service');

-- --------------------------------------------------------

--
-- Table structure for table `cte_courses`
--

CREATE TABLE `cte_courses` (
  `id` int NOT NULL,
  `course_number` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `course_title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `program_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `credits` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `job_code` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cte_courses`
--

INSERT INTO `cte_courses` (`id`, `course_number`, `course_title`, `program_id`, `credits`, `job_code`) VALUES
(1, '8812000', 'Business Ownership', '9', '1', '11-1021'),
(2, '8827110', 'Marketing Essentials', '10', '1', '41-2031'),
(3, '8207310', 'Digital Information Technology', '4', '1', '15-1151'),
(4, '8827120', 'Marketing Applications', '10', '1', '41-2031'),
(5, '8203310', 'Accounting Applications 1', '4', '1', '43-3031'),
(6, '8203320', 'Accounting Applications 2', '4', '1', '43-3031'),
(7, '8827210', 'E-Commerce Marketing', '10', '1', '15-1199'),
(8, '8203330', 'Accounting Applications 3', '4', '1', '43-3031'),
(9, '8812110', 'Principles of Entrepreneurship', '11', '1', '11-2021'),
(10, '8207310', 'Digital Information Technology', '5', '1', '15-1151'),
(11, '8812120', 'Business Management and Law', '11', '1', '11-2021'),
(12, '8812000', 'Business Ownership', '11', '1', '11-1021'),
(13, '8215120', 'Business and Entrepreneurial Principles', '5', '1', '11-1021'),
(14, '8203310', 'Accounting Applications I', '5', '1', '11-1021'),
(15, '8827110', 'Marketing Essentials', '12', '1', '43-3021'),
(16, '8301110', 'Management and Human Resources', '5', '1', '11-3121'),
(17, '8301100', 'Business Analysis', '5', '1', '13-1111'),
(18, '8839110', 'International Marketing 1', '12', '1', '43-3021'),
(19, '8215130', 'Legal Aspects of Business', '5', '1', '11-1021'),
(20, '8839120', 'International Marketing 2', '12', '1', '43-5011'),
(21, '8839130', 'International Marketing 3', '12', '1', '11-2022'),
(22, '8207310', 'Digital Information Technology', '6', '1', '15-1151'),
(23, '8827110', 'Marketing Essentials', '13', '1', '41-2031'),
(24, '8216110', 'International Business Systems', '6', '1', '11-1021'),
(25, '8827120', 'Marketing Applications', '13', '1', '41-2031'),
(26, '8216120', 'International Finance and Law', '6', '1', '11-1021'),
(27, '8827130', 'Marketing Management', '13', '1', '11-2021'),
(28, '8216130', 'Business Internship', '6', '1', '11-1021'),
(29, '8812000', 'Business Ownership', '13', '1', '11-1021'),
(30, '8207310', 'Digital Information Technology', '7', '1', '15-1151'),
(31, '8215130', 'Legal Aspects of Business', '7', '1', '43-6011'),
(32, '8306210', 'Legal Studies 1', '7', '1', '43-6012'),
(33, '8306220', 'Legal Studies 2', '7', '1', '43-6012'),
(34, '8306230', 'Legal Studies 3', '7', '1', '43-6012'),
(35, '8207310', 'Digital Information Technology', '8', '1', '15-1151'),
(36, '8417110', 'Health Science Foundations', '14', '1', '31-9099'),
(37, '8212110', 'Administrative Office Technology 1', '8', '1', '43-4171'),
(38, '8417131', 'Allied Health Assisting 3', '14', '1', '31-9099'),
(39, '8212201', 'Medical Office Technology 1', '8', '1', '43-6013'),
(40, '8212202', 'Medical Office Technology 2', '8', '1', '43-6013'),
(41, '8708140', 'Biomedical Innovation', '16', '1', '-'),
(42, '8207310', 'Digital Information Technology', '1', '1', '15-1151'),
(43, '8417110', 'Health Science Foundations', '18', '1', '31-9099'),
(44, '8815150', 'Business Communication and Technology', '1', '1', '43-3021'),
(45, '8427130', 'Electrocardiograph Technician 3', '18', '1', '29-2031'),
(46, '8203310', 'Accounting Applications 1', '1', '1', '43-3031'),
(47, '8417110', 'Health Science Foundations', '20', '1', '31-9099'),
(48, '8815110', 'Economics and Financial Services', '1', '1', '43-4041'),
(49, '8417171', 'Emergency Medical Responder 3', '20', '1', '53-3011'),
(50, '8815130', 'Financial Internship', '1', '1', '43-4041'),
(51, '8417110', 'Health Science Foundations', '22', '1', '31-9099'),
(52, '8501420', 'Finance Cooperation Education - OJT', '1', '1', '43-4041'),
(53, '8417191', 'Home Health Aide 3', '22', '0.5', '31-1011'),
(54, '8207310', 'Digital Information Technology', '2', '1', '15-1151'),
(55, '8815150', 'Business Communication and Technology', '2', '1', '43-3021'),
(56, '8203310', 'Accounting Applications 1', '2', '1', '43-3031'),
(57, '8815130', 'Financial Internship', '2', '1', '43-4041'),
(58, '8417110', 'Health Science Foundations', '24', '1', '31-9099'),
(59, '8501420', 'Finance Cooperation Education - OJT', '2', '1', '43-4041'),
(60, '8417201', 'Medical Laboratory Assisting 3', '24', '1', '29-2012'),
(61, '8815160', 'Managerial Accounting', '2', '1', '43-4041'),
(62, '8417202', 'Medical Laboratory Assisting 4', '24', '1', '29-2012'),
(63, '8815170', 'Business in a Global Economy', '2', '1', '13-1160'),
(64, '8400320', 'Medical Skills and Services', '26', '1', '-'),
(65, '8207310', 'Digital Information Technology', '15', '1', '15-1212'),
(66, '8417110', 'Health Science Foundations', '28', '1', '31-9099'),
(67, '9001310', 'IT Fundamentals', '15', '1', '15-1212'),
(68, '8417211', 'Nursing Assistant 3', '28', '1', '31-1014'),
(69, '9001320', 'Computer and Network Security Fundamentals', '15', '1', '15-1212'),
(70, '8418210', 'Pharmacy Technician 1', '31', '1', '31-9095'),
(71, '8418220', 'Pharmacy Technician 2', '31', '1', '29-2052'),
(72, '9001330', 'Cybersecurity Essentials', '15', '1', '15-1212'),
(73, '8418230', 'Pharmacy Technician 3', '31', '1', '29-2052'),
(74, '9001340', 'Operational Cybersecurity', '15', '1', '15-1212'),
(75, '8418240', 'Pharmacy Technician 4', '31', '1', '29-2052'),
(76, '9001350', 'Cybersecurity Planning & Analysis', '15', '1', '15-1212'),
(77, '8418250', 'Pharmacy Technician 5', '31', '1', '29-2052'),
(78, '9001360', 'Database Security', '15', '1', '15-1212'),
(79, '8418260', 'Pharmacy Technician 6', '31', '1', '29-2052'),
(80, '9001370', 'Software & Application Security', '15', '1', '15-1212'),
(81, '8418270', 'Pharmacy Technician 7', '31', '1', '29-2052'),
(82, '9001380', 'Web Security', '15', '1', '15-1212'),
(83, '9001390', 'Applied Cybersecurity Applications', '15', '1', '15-1212'),
(84, '8207310', 'Digital Information Technology', '17', '1', '15-1151'),
(85, '9003410', 'Computer Fundamentals', '17', '1', '15-1151'),
(86, '9003420', 'Web Technologies', '17', '1', '15-1151'),
(87, '8418410', 'Practical Nursing Foundations 1A', '32', '1', '31-1014'),
(88, '9003440', 'Database Essentials', '17', '1', '15-1151'),
(89, '9003450', 'Programming Essentials', '17', '1', '15-1151'),
(90, '8418420', 'Practical Nursing Foundations 1B', '32', '1', '31-1014'),
(91, '8418430', 'Practical Nursing Foundations 2A', '32', '1', '29-2061'),
(92, '0903460', 'Web Development Techonlogies', '17', '1', '15-1151'),
(93, '8418440', 'Practical Nursing Foundations 2B', '32', '1', '29-2061'),
(94, '9003470', 'Multimedia Technologies', '17', '1', '15-1151'),
(95, '8418450', 'Medical Surgical Nursing 1A', '32', '1', '29-2061'),
(96, '9003480', 'Computer Networking Fundamentals', '17', '1', '15-1151'),
(97, '8418460', 'Medical Surgical Nursing 1B', '32', '1', '29-2061'),
(98, '8418470', 'Medical Surgical Nursing 2A', '32', '1', '29-2061'),
(99, '8418480', 'Medical Surgical Nursing 2B', '32', '1', '29-2061'),
(100, '8418490', 'Comprehensive Nursing and Transitional Skills', '32', '1', '29-2061'),
(101, '9003490', 'Cybersecurity Fundamentals', '17', '1', '15-1151'),
(102, '9401010', 'Artificial Intelligence in the World', '19', '0.5', '-'),
(103, '9401020', 'Applications of Artificial Intelligence', '19', '0.5', '-'),
(104, '9007220', 'Procedural Programming', '19', '1', '-'),
(105, '9401040', 'Foundations of Machine Learning', '19', '1', '-'),
(106, '8207310', 'Digital Information Technology', '21', '1', '15-1232'),
(107, '9001510', 'Computer Engineering & Support', '21', '1', '15-1232'),
(108, '9001520', 'Network Engineering & Support', '21', '1', '15-1244'),
(109, '9001530', 'Essentials of Cloud Technology', '21', '1', '15-1244'),
(110, '9001540', 'Basics of Cloud Computing & Virtualization', '21', '1', '15-1244'),
(111, '9001550', 'Advanced Cloud Computing & Virtualization', '21', '1', '15-1244'),
(112, '9007610', 'Advanced Information Technology', '23', '1', '15-1151'),
(113, '9007210', 'Foundations of Programming', '23', '1', '15-1131'),
(114, '9007220', 'Procedural Programming', '23', '1', '15-1131'),
(115, '9007230', 'Object-Oriented programming Fundamentals', '23', '1', '15-1131'),
(116, '8207310', 'Digital Information Technology', '25', '1', '15-1151'),
(117, '9001210', 'CSIT Foundations', '25', '1', '15-1151'),
(118, '9001220', 'CSIT System Essentials', '25', '1', '15-1151'),
(119, '9001230', 'CSIT Network Systems Configuration', '25', '1', '15-1142'),
(120, '9001240', 'CSIT Network Systems Design & Administration', '25', '1', '15-1142'),
(121, '9001250', 'CSIT Cyber Security Essentials', '25', '1', '15-1212'),
(122, '9001260', 'CSIT Cyber Security - Psysical', '25', '1', '15-1212'),
(123, '9007710', 'Foundations of Programming for Data Science and Artificial Intelligence', '27', '1', '-'),
(124, '9007220', 'Procedural Programming', '27', '1', '-'),
(125, '9007720', 'Data Analytics and Database Design', '27', '1', '-'),
(126, '9007730', 'Machine Learning with Applications', '27', '1', '-'),
(127, '9007740', 'Capstone Project with Industry Partners', '27', '1', '-'),
(128, '8206410', 'Database Fundamentals', '29', '0.5', '15-1151'),
(129, '8206420', 'Data Control and Functions', '29', '0.5', '15-1151'),
(130, '8206430', 'Specialized Database Programming', '29', '1', '15-1151'),
(131, '8206440', 'Specialized Database Applications', '29', '1', '15-1151'),
(132, '8207310', 'Digital Information Technology', '30', '1', '15-1151'),
(133, '9007210', 'Foundations of Programming', '30', '1', '15-1131'),
(134, '9007220', 'Procedural Programming', '30', '1', '15-1131'),
(135, '9007230', 'Object-Oriented Programming Fundamentals', '30', '1', '15-1131'),
(136, '9007310', 'Database Design and SQL Programming', '30', '1', '15-1131'),
(137, '9007320', 'SQL Extension Languages', '30', '1', '15-1131'),
(138, '9007330', 'SQL Extension Languages II', '30', '1', '15-1131'),
(139, '9007340', 'Custom Database Programming', '30', '1', '15-1131'),
(140, '8207310', 'Digital Information Technology', '33', '1', '15-1151'),
(141, '9007210', 'Foundations of Programming', '33', '1', '15-1131'),
(142, '9007220', 'Procedural Programming', '33', '1', '15-1131'),
(143, '9007230', 'Object-Oriented Programming Fundamentals', '33', '1', '15-1131'),
(144, '9007240', 'Java Programming Essentials', '33', '1', '15-1131'),
(145, '9007260', 'Applied Object-Oriented Java Programming', '33', '1', '15-1131'),
(146, '9007260', 'Java Database Programming', '33', '1', '15-1131'),
(147, '9007270', 'Java Programming Capstone', '33', '1', '15-1131'),
(148, '8207310', 'Digital Information Technology', '34', '1', '15-1151'),
(149, '8207020', 'Networking 1', '34', '1', '15-1151'),
(150, '8207030', 'Networking 2, Infrastructure', '34', '1', '15-1142'),
(151, '8207040', 'Networking 3, Infrastructure', '34', '1', '15-1142'),
(152, '8207050', 'Networking 4, Infrastructure', '34', '1', '15-1143'),
(153, '8207060', 'Networking 5', '34', '1', '15-1143'),
(154, '8207070', 'Networking 6', '34', '1', '15-1143'),
(155, '8207310', 'Digital Information Technology', '35', '1', '15-1151'),
(156, '8207020', 'Networking 1', '35', '1', '15-1151'),
(157, '8207441', 'Networking 2, Administration', '35', '1', '15-1142'),
(158, '8207442', 'Networking 3, Administration', '35', '1', '15-1142'),
(159, '8207443', 'Networking 4, Administration', '35', '1', '15-1143'),
(160, '8207060', 'Networking 5', '35', '1', '15-1143'),
(161, '8207070', 'Networking 6', '35', '1', '15-1143'),
(162, '8207310', 'Digital Information Technology', '36', '1', '15-1151'),
(163, '9007210', 'Foundations of Programming', '36', '1', '15-1131'),
(164, '9007220', 'Procedural Programming', '36', '1', '15-1131'),
(165, '9007230', 'Object-Oriented Programming Fundamentals', '36', '1', '15-1131'),
(166, '9007510', 'Web Programming', '36', '1', '15-1131'),
(167, '9007520', 'JavaScript Programming', '36', '1', '15-1131'),
(168, '9007530', 'PHP Programming', '36', '1', '15-1131'),
(169, '9001110', 'Foundations of Web Design', '37', '1', '15-1199'),
(170, '9001120', 'User Interface Design', '37', '1', '15-1199'),
(171, '9001130', 'Web Scripting Fundamentals', '37', '1', '15-1199'),
(172, '9001140', 'Media Integration Essentials', '37', '1', '15-1199'),
(173, '9001150', 'E-commerce & Marketing Essentials', '37', '1', '15-1199'),
(174, '9001160', 'Interactivity Essentials', '37', '1', '15-1199');

-- --------------------------------------------------------

--
-- Table structure for table `cte_jobs`
--

CREATE TABLE `cte_jobs` (
  `id` int NOT NULL,
  `code` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cte_jobs`
--

INSERT INTO `cte_jobs` (`id`, `code`, `name`) VALUES
(1, '11-1021', 'General and Operations Managers'),
(2, '41-2031', 'Retail Salespersons'),
(3, '15-1199', 'Computer Occupations, All Other'),
(4, '11-2021', 'Marketing Managers'),
(5, '43-3021', 'Billing and Posting Clerks'),
(6, '43-5011', 'Cargo and Freight Agents'),
(7, '11-2022', 'Sales Managers'),
(8, '31-9099', 'Healthcare Support Workers, All Other'),
(9, '29-2031', 'Cardiovascular Technologists and Technicians'),
(10, '53-3011', 'Ambulance Drivers and Attendants, Except Emergency Medical Technicians'),
(11, '31-1011', 'Home Health Aides'),
(12, '29-2012', 'Medical and Clinical Laboratory Technicians'),
(13, '31-1014', 'Nursing Assistants'),
(14, '31-9095', 'Pharmacy Aides'),
(15, '29-2052', 'Pharmacy Technicians'),
(16, '29-2061', 'Licensed Practical and Licensed Vocational Nurses'),
(17, '43-3031', 'Bookkeeping, Accounting, and Auditing Clerks'),
(18, '43-4041', 'Credit Authorizers, Checkers and Clerks'),
(19, '43-4011', 'Brokerage Clerks'),
(20, '13-1161', 'Market Research Analysts and Marketing Specialists'),
(21, '15-1151', 'Computer User Support Specialist'),
(22, '11-3121', 'Human Resources Manager'),
(23, '13-1111', 'Management Analysts'),
(24, '43-4171', 'Receptionists and Information Clerks'),
(25, '43-6011', 'Executive Secretaries and Administrative Assistants'),
(26, '43-6012', 'Legal Secretaries'),
(27, '43-6013', 'Medical Secretaries'),
(28, '15-1212', 'Information Security Analysts'),
(29, '15-1244', 'Network and Computer Systems Administrators'),
(30, '15-1232', 'Computer User Support Specialists'),
(31, '15-1131', 'Computer Programmers'),
(32, '15-1152', 'Computer Network Support Specialists'),
(33, '15-1142', 'Network and Computer Systems Administrators'),
(34, '15-1141', 'Database Administrators'),
(35, '15-1142', 'Network and Computer Systems Administrators'),
(36, '15-1143', 'Computer Network Architects'),
(37, '15-1143', 'Telecommunications Engineering Specialists');

-- --------------------------------------------------------

--
-- Table structure for table `cte_programs`
--

CREATE TABLE `cte_programs` (
  `id` int NOT NULL,
  `cluster_id` int NOT NULL,
  `category_id` smallint UNSIGNED DEFAULT NULL COMMENT 'for the new CTE logic',
  `program_number` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `program_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cte_programs`
--

INSERT INTO `cte_programs` (`id`, `cluster_id`, `category_id`, `program_number`, `program_title`) VALUES
(1, 3, 18, '8815100', 'Finance'),
(2, 3, 18, '8515300', 'Global Finance'),
(3, 3, 18, '8500120', 'Personal Financial Literacy'),
(4, 2, 17, '8302100', 'Accounting Applications'),
(5, 2, 17, '8301100', 'Business Management and Analysis'),
(6, 2, 17, '8303100', 'International Business'),
(7, 2, 17, '8306200', 'Legal Administrative Specialist'),
(8, 2, 17, '8306400', 'Medical Administrative Specialist'),
(9, 5, 20, '8812000', 'Business Ownership'),
(10, 5, 20, '8827200', 'E-Commerce Marketing'),
(11, 5, 20, '8812100', 'Entrepreneurship'),
(12, 5, 20, '8839100', 'International Marketing'),
(13, 5, 20, '9200500', 'Marketing, Management and Entrepreneurial Principles'),
(14, 1, 16, '8417130', 'Allied Health Assisting'),
(15, 4, 19, '9001300', 'Applied Cybersecurity'),
(16, 1, 16, '8708100', 'Biomedical Sciences'),
(17, 4, 19, '9003400', 'Applied Information Technology'),
(18, 1, 16, '8427100', 'Electrocardiograph Technician'),
(19, 4, 19, '9401100', 'Artificial Intelligence (AI) Foundations'),
(20, 1, 16, '8417170', 'Emergency Medical Responder'),
(21, 4, 19, '9001500', 'Cloud Computing & Virtualization'),
(22, 1, 16, '8417190', 'Home Health Aide'),
(23, 4, 19, '9007600', 'Computer Science Principles'),
(24, 1, 16, '8417200', 'Medical Laboratory Assisting'),
(25, 4, 19, '9001200', 'Computer Systems & Information Technology (CSIT)'),
(26, 1, 16, '8400320', 'Medical Skills and Services'),
(27, 4, 19, '9007700', 'Data Science and Machine Learning'),
(28, 1, 16, '8417210', 'Nursing Assistant (Acute and Long Term Care)'),
(29, 4, 19, '8206400', 'Database and Programming Essentials'),
(30, 4, 19, '9007300', 'Database Application Development & Programming'),
(31, 1, 16, '8418200', 'Pharmacy Technician'),
(32, 1, 16, '8418400', 'Practical Nursing'),
(33, 4, 19, '9007200', 'Java Development and Programming'),
(34, 4, 19, '8208000', 'Network Support Services'),
(35, 4, 19, '8207440', 'Network System Administration'),
(36, 4, 19, '9007500', 'Web Application Development & Programming'),
(37, 4, 19, '9001100', 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_courses`
--

CREATE TABLE `curriculum_courses` (
  `id` int UNSIGNED NOT NULL,
  `curriculum_type_id` tinyint UNSIGNED NOT NULL,
  `course_id` int UNSIGNED NOT NULL,
  `category_id` smallint UNSIGNED DEFAULT NULL,
  `required_flag` tinyint(1) NOT NULL DEFAULT '0',
  `requirement_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `program_id` int DEFAULT NULL COMMENT 'for CTE courses',
  `job_id` int DEFAULT NULL COMMENT 'for CTE courses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curriculum_courses`
--

INSERT INTO `curriculum_courses` (`id`, `curriculum_type_id`, `course_id`, `category_id`, `required_flag`, `requirement_text`, `notes`, `program_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 1, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, 1, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 4, 1, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 17, 2, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 18, 2, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 19, 2, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 22, 2, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 28, 3, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 34, 3, 1, 'Required subject – alternative 2003380 (choice of one)', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 37, 3, 1, 'Required subject – alternative 2003340 (choice of one)', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 30, 3, 1, 'Required subject - alternative 2001340 (choice of one)', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 31, 3, 1, 'Required subject - alternative 2000350 (choice of one)', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 43, 4, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 65, 4, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 54, 4, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 47, 4, 1, 'Required subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 13, 5, 1, 'Required subject – alternative 1007330 (choice of one)', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 14, 5, 1, 'Required subject – alternative 1007300 (choice of one)', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 68, 6, 1, 'Required Subject', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, 41, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 2, 42, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 2, 73, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 2, 74, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 2, 75, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 2, 76, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 2, 61, 9, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 2, 62, 9, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 2, 56, 9, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 2, 59, 9, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 2, 60, 9, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 2, 48, 9, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 2, 15, 7, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 2, 16, 7, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 2, 24, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 2, 25, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 2, 69, 8, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 2, 70, 8, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 2, 71, 8, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 2, 72, 8, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 3, 5, 12, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 3, 6, 12, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 3, 46, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 3, 67, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 3, 57, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 3, 63, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 3, 53, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 3, 52, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 3, 51, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 3, 66, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 3, 58, 13, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 3, 29, 15, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 3, 32, 15, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 3, 39, 15, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 3, 36, 15, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 3, 40, 15, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 3, 20, 14, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 3, 23, 14, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 3, 35, 14, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 3, 21, 14, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 3, 33, 14, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 3, 26, 11, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 3, 27, 11, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 5, 38, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 5, 73, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 5, 74, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 5, 75, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 5, 76, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 5, 44, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 5, 45, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 5, 49, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 5, 50, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 5, 55, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 5, 64, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 6, 7, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 6, 8, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 6, 9, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 6, 12, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 6, 10, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 6, 11, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 1, 79, 8, 1, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 6, 80, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 4, 81, 7, 0, 'efrewgf', 'rgrgrgreg', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 2, 83, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 3, 85, 11, 1, 'some desc', 'some note for myself', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 2, 86, 10, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 7, 87, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 4, 89, NULL, 0, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 1, 90, 1, 1, 'Required subject', NULL, NULL, NULL, NULL, NULL),
(220, 4, 91, 20, 0, NULL, NULL, 9, 1, NULL, NULL),
(221, 4, 92, 20, 0, NULL, NULL, 10, 2, NULL, NULL),
(222, 4, 93, 17, 0, NULL, NULL, 4, 21, NULL, NULL),
(223, 4, 94, 20, 0, NULL, NULL, 10, 2, NULL, NULL),
(224, 4, 95, 17, 0, NULL, NULL, 4, 17, NULL, NULL),
(225, 4, 96, 17, 0, NULL, NULL, 4, 17, NULL, NULL),
(226, 4, 97, 20, 0, NULL, NULL, 10, 3, NULL, NULL),
(227, 4, 98, 17, 0, NULL, NULL, 4, 17, NULL, NULL),
(228, 4, 99, 20, 0, NULL, NULL, 11, 4, NULL, NULL),
(229, 4, 100, 17, 0, NULL, NULL, 5, 21, NULL, NULL),
(230, 4, 101, 20, 0, NULL, NULL, 11, 4, NULL, NULL),
(231, 4, 102, 20, 0, NULL, NULL, 11, 1, NULL, NULL),
(232, 4, 103, 17, 0, NULL, NULL, 5, 1, NULL, NULL),
(233, 4, 104, 17, 0, NULL, NULL, 5, 1, NULL, NULL),
(234, 4, 105, 20, 0, NULL, NULL, 12, 5, NULL, NULL),
(235, 4, 106, 17, 0, NULL, NULL, 5, 22, NULL, NULL),
(236, 4, 107, 17, 0, NULL, NULL, 5, 23, NULL, NULL),
(237, 4, 108, 20, 0, NULL, NULL, 12, 5, NULL, NULL),
(238, 4, 109, 17, 0, NULL, NULL, 5, 1, NULL, NULL),
(239, 4, 110, 20, 0, NULL, NULL, 12, 6, NULL, NULL),
(240, 4, 111, 20, 0, NULL, NULL, 12, 7, NULL, NULL),
(241, 4, 112, 17, 0, NULL, NULL, 6, 21, NULL, NULL),
(242, 4, 113, 20, 0, NULL, NULL, 13, 2, NULL, NULL),
(243, 4, 114, 17, 0, NULL, NULL, 6, 1, NULL, NULL),
(244, 4, 115, 20, 0, NULL, NULL, 13, 2, NULL, NULL),
(245, 4, 116, 17, 0, NULL, NULL, 6, 1, NULL, NULL),
(246, 4, 117, 20, 0, NULL, NULL, 13, 4, NULL, NULL),
(247, 4, 118, 17, 0, NULL, NULL, 6, 1, NULL, NULL),
(248, 4, 119, 20, 0, NULL, NULL, 13, 1, NULL, NULL),
(249, 4, 120, 17, 0, NULL, NULL, 7, 21, NULL, NULL),
(250, 4, 121, 17, 0, NULL, NULL, 7, 25, NULL, NULL),
(251, 4, 122, 17, 0, NULL, NULL, 7, 26, NULL, NULL),
(252, 4, 123, 17, 0, NULL, NULL, 7, 26, NULL, NULL),
(253, 4, 124, 17, 0, NULL, NULL, 7, 26, NULL, NULL),
(254, 4, 125, 17, 0, NULL, NULL, 8, 21, NULL, NULL),
(255, 4, 126, 16, 0, NULL, NULL, 14, 8, NULL, NULL),
(256, 4, 127, 17, 0, NULL, NULL, 8, 24, NULL, NULL),
(257, 4, 128, 16, 0, NULL, NULL, 14, 8, NULL, NULL),
(258, 4, 129, 17, 0, NULL, NULL, 8, 27, NULL, NULL),
(259, 4, 130, 17, 0, NULL, NULL, 8, 27, NULL, NULL),
(260, 4, 131, 16, 0, NULL, NULL, 16, NULL, NULL, NULL),
(261, 4, 132, 18, 0, NULL, NULL, 1, 21, NULL, NULL),
(262, 4, 133, 16, 0, NULL, NULL, 18, 8, NULL, NULL),
(263, 4, 134, 18, 0, NULL, NULL, 1, 5, NULL, NULL),
(264, 4, 135, 16, 0, NULL, NULL, 18, 9, NULL, NULL),
(265, 4, 136, 18, 0, NULL, NULL, 1, 17, NULL, NULL),
(266, 4, 137, 16, 0, NULL, NULL, 20, 8, NULL, NULL),
(267, 4, 138, 18, 0, NULL, NULL, 1, 18, NULL, NULL),
(268, 4, 139, 16, 0, NULL, NULL, 20, 10, NULL, NULL),
(269, 4, 140, 18, 0, NULL, NULL, 1, 18, NULL, NULL),
(270, 4, 141, 16, 0, NULL, NULL, 22, 8, NULL, NULL),
(271, 4, 142, 18, 0, NULL, NULL, 1, 18, NULL, NULL),
(272, 4, 143, 16, 0, NULL, NULL, 22, 11, NULL, NULL),
(273, 4, 144, 18, 0, NULL, NULL, 2, 21, NULL, NULL),
(274, 4, 145, 18, 0, NULL, NULL, 2, 5, NULL, NULL),
(275, 4, 146, 18, 0, NULL, NULL, 2, 17, NULL, NULL),
(276, 4, 147, 18, 0, NULL, NULL, 2, 18, NULL, NULL),
(277, 4, 148, 16, 0, NULL, NULL, 24, 8, NULL, NULL),
(278, 4, 149, 18, 0, NULL, NULL, 2, 18, NULL, NULL),
(279, 4, 150, 16, 0, NULL, NULL, 24, 12, NULL, NULL),
(280, 4, 151, 18, 0, NULL, NULL, 2, 18, NULL, NULL),
(281, 4, 152, 16, 0, NULL, NULL, 24, 12, NULL, NULL),
(282, 4, 153, 18, 0, NULL, NULL, 2, NULL, NULL, NULL),
(283, 4, 154, 16, 0, NULL, NULL, 26, NULL, NULL, NULL),
(284, 4, 155, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(285, 4, 156, 16, 0, NULL, NULL, 28, 8, NULL, NULL),
(286, 4, 157, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(287, 4, 158, 16, 0, NULL, NULL, 28, 13, NULL, NULL),
(288, 4, 159, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(289, 4, 160, 16, 0, NULL, NULL, 31, 14, NULL, NULL),
(290, 4, 161, 16, 0, NULL, NULL, 31, 15, NULL, NULL),
(291, 4, 162, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(292, 4, 163, 16, 0, NULL, NULL, 31, 15, NULL, NULL),
(293, 4, 164, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(294, 4, 165, 16, 0, NULL, NULL, 31, 15, NULL, NULL),
(295, 4, 166, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(296, 4, 167, 16, 0, NULL, NULL, 31, 15, NULL, NULL),
(297, 4, 168, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(298, 4, 169, 16, 0, NULL, NULL, 31, 15, NULL, NULL),
(299, 4, 170, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(300, 4, 171, 16, 0, NULL, NULL, 31, 15, NULL, NULL),
(301, 4, 172, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(302, 4, 173, 19, 0, NULL, NULL, 15, 28, NULL, NULL),
(303, 4, 174, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(304, 4, 175, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(305, 4, 176, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(306, 4, 177, 16, 0, NULL, NULL, 32, 13, NULL, NULL),
(307, 4, 178, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(308, 4, 179, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(309, 4, 180, 16, 0, NULL, NULL, 32, 13, NULL, NULL),
(310, 4, 181, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(311, 4, 182, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(312, 4, 183, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(313, 4, 184, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(314, 4, 185, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(315, 4, 186, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(316, 4, 187, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(317, 4, 188, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(318, 4, 189, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(319, 4, 190, 16, 0, NULL, NULL, 32, 16, NULL, NULL),
(320, 4, 191, 19, 0, NULL, NULL, 17, 21, NULL, NULL),
(321, 4, 192, 19, 0, NULL, NULL, 19, NULL, NULL, NULL),
(322, 4, 193, 19, 0, NULL, NULL, 19, NULL, NULL, NULL),
(323, 4, 194, 19, 0, NULL, NULL, 19, NULL, NULL, NULL),
(324, 4, 195, 19, 0, NULL, NULL, 19, NULL, NULL, NULL),
(325, 4, 196, 19, 0, NULL, NULL, 21, 30, NULL, NULL),
(326, 4, 197, 19, 0, NULL, NULL, 21, 30, NULL, NULL),
(327, 4, 198, 19, 0, NULL, NULL, 21, 29, NULL, NULL),
(328, 4, 199, 19, 0, NULL, NULL, 21, 29, NULL, NULL),
(329, 4, 200, 19, 0, NULL, NULL, 21, 29, NULL, NULL),
(330, 4, 201, 19, 0, NULL, NULL, 21, 29, NULL, NULL),
(331, 4, 202, 19, 0, NULL, NULL, 23, 21, NULL, NULL),
(332, 4, 203, 19, 0, NULL, NULL, 23, 31, NULL, NULL),
(333, 4, 204, 19, 0, NULL, NULL, 23, 31, NULL, NULL),
(334, 4, 205, 19, 0, NULL, NULL, 23, 31, NULL, NULL),
(335, 4, 206, 19, 0, NULL, NULL, 25, 21, NULL, NULL),
(336, 4, 207, 19, 0, NULL, NULL, 25, 21, NULL, NULL),
(337, 4, 208, 19, 0, NULL, NULL, 25, 21, NULL, NULL),
(338, 4, 209, 19, 0, NULL, NULL, 25, 33, NULL, NULL),
(339, 4, 210, 19, 0, NULL, NULL, 25, 33, NULL, NULL),
(340, 4, 211, 19, 0, NULL, NULL, 25, 28, NULL, NULL),
(341, 4, 212, 19, 0, NULL, NULL, 25, 28, NULL, NULL),
(342, 4, 213, 19, 0, NULL, NULL, 27, NULL, NULL, NULL),
(343, 4, 214, 19, 0, NULL, NULL, 27, NULL, NULL, NULL),
(344, 4, 215, 19, 0, NULL, NULL, 27, NULL, NULL, NULL),
(345, 4, 216, 19, 0, NULL, NULL, 27, NULL, NULL, NULL),
(346, 4, 217, 19, 0, NULL, NULL, 27, NULL, NULL, NULL),
(347, 4, 218, 19, 0, NULL, NULL, 29, 21, NULL, NULL),
(348, 4, 219, 19, 0, NULL, NULL, 29, 21, NULL, NULL),
(349, 4, 220, 19, 0, NULL, NULL, 29, 21, NULL, NULL),
(350, 4, 221, 19, 0, NULL, NULL, 29, 21, NULL, NULL),
(351, 4, 222, 19, 0, NULL, NULL, 30, 21, NULL, NULL),
(352, 4, 223, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(353, 4, 224, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(354, 4, 225, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(355, 4, 226, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(356, 4, 227, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(357, 4, 228, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(358, 4, 229, 19, 0, NULL, NULL, 30, 31, NULL, NULL),
(359, 4, 230, 19, 0, NULL, NULL, 33, 21, NULL, NULL),
(360, 4, 231, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(361, 4, 232, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(362, 4, 233, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(363, 4, 234, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(364, 4, 235, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(365, 4, 236, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(366, 4, 237, 19, 0, NULL, NULL, 33, 31, NULL, NULL),
(367, 4, 238, 19, 0, NULL, NULL, 34, 21, NULL, NULL),
(368, 4, 239, 19, 0, NULL, NULL, 34, 21, NULL, NULL),
(369, 4, 240, 19, 0, NULL, NULL, 34, 33, NULL, NULL),
(370, 4, 241, 19, 0, NULL, NULL, 34, 33, NULL, NULL),
(371, 4, 242, 19, 0, NULL, NULL, 34, 36, NULL, NULL),
(372, 4, 243, 19, 0, NULL, NULL, 34, 36, NULL, NULL),
(373, 4, 244, 19, 0, NULL, NULL, 34, 36, NULL, NULL),
(374, 4, 245, 19, 0, NULL, NULL, 35, 21, NULL, NULL),
(375, 4, 246, 19, 0, NULL, NULL, 35, 21, NULL, NULL),
(376, 4, 247, 19, 0, NULL, NULL, 35, 33, NULL, NULL),
(377, 4, 248, 19, 0, NULL, NULL, 35, 33, NULL, NULL),
(378, 4, 249, 19, 0, NULL, NULL, 35, 36, NULL, NULL),
(379, 4, 250, 19, 0, NULL, NULL, 35, 36, NULL, NULL),
(380, 4, 251, 19, 0, NULL, NULL, 35, 36, NULL, NULL),
(381, 4, 252, 19, 0, NULL, NULL, 36, 21, NULL, NULL),
(382, 4, 253, 19, 0, NULL, NULL, 36, 31, NULL, NULL),
(383, 4, 254, 19, 0, NULL, NULL, 36, 31, NULL, NULL),
(384, 4, 255, 19, 0, NULL, NULL, 36, 31, NULL, NULL),
(385, 4, 256, 19, 0, NULL, NULL, 36, 31, NULL, NULL),
(386, 4, 257, 19, 0, NULL, NULL, 36, 31, NULL, NULL),
(387, 4, 258, 19, 0, NULL, NULL, 36, 31, NULL, NULL),
(388, 4, 259, 19, 0, NULL, NULL, 37, 3, NULL, NULL),
(389, 4, 260, 19, 0, NULL, NULL, 37, 3, NULL, NULL),
(390, 4, 261, 19, 0, NULL, NULL, 37, 3, NULL, NULL),
(391, 4, 262, 19, 0, NULL, NULL, 37, 3, NULL, NULL),
(392, 4, 263, 19, 0, NULL, NULL, 37, 3, NULL, NULL),
(393, 4, 264, 19, 0, NULL, NULL, 37, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_types`
--

CREATE TABLE `curriculum_types` (
  `id` tinyint UNSIGNED NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curriculum_types`
--

INSERT INTO `curriculum_types` (`id`, `code`, `name`, `price`) VALUES
(1, 'CORE', 'Core High School Curriculum', 0),
(2, 'ELECTIVE', 'Elective High School Courses', 0),
(3, 'AP', 'Advanced Placement (AP)', 0),
(4, 'CTE', 'Career & Technical Education (CTE)', 0),
(5, 'CLEP', 'College-Level Examination Program (CLEP)', 0),
(6, 'ESOL', 'English for Speakers of Other Languages (ESOL)', 0),
(7, 'PSAT', 'PSAT Preparation', 0),
(8, 'SAT', 'SAT Preparation', 0),
(9, 'PREACT', 'PreACT Preparation', 0),
(10, 'ACT', 'ACT Preparation', 0),
(11, 'TP', 'Transfer Program', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diploma_printing_requests`
--

CREATE TABLE `diploma_printing_requests` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diploma_printing_requests`
--

INSERT INTO `diploma_printing_requests` (`id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 78, 0, '2026-02-10 16:46:16', '2026-02-10 16:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`) VALUES
(1, 'Parents IDs'),
(2, 'Custody Document'),
(3, 'Proof of Residence\r\n'),
(4, 'Student ID'),
(5, 'Student Birth Certificate\r\n'),
(6, 'Latest School Transcript / Report Card\r\n'),
(7, 'Withdrawal Confirmation from Previous School\r\n'),
(8, 'IEP / 504 Plan with Medical Documentation');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_news`
--

CREATE TABLE `dynamic_news` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `minutes` int NOT NULL,
  `slug` varchar(191) NOT NULL,
  `key_facts` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `dynamic_news`
--

INSERT INTO `dynamic_news` (`id`, `author_id`, `minutes`, `slug`, `key_facts`, `created_at`, `updated_at`, `deleted_at`, `image`, `meta_title`, `meta_description`) VALUES
(1, 1, 62, 'Et est itaque unde', '<p>asdfdasfdashdhtbhnd</p>', '2026-02-09 07:31:26', '2026-03-13 07:14:03', NULL, 'coaching.webp', 'Nesciunt nisi place', 'Duis beatae in duis'),
(2, 2, 11, 'Quidem ipsam lorem v', '<p>sdafdsafdas</p>', '2026-02-09 07:47:59', '2026-02-09 07:47:59', NULL, 'coaching.webp', 'Corrupti dolorem co', 'Esse laudantium na'),
(3, 2, 57, 'Proident sint a aut', '<p>sdfdsafs</p>', '2026-02-09 08:17:21', '2026-02-09 08:17:21', NULL, 'help_desk.webp', 'Consequatur delectus', 'Blanditiis mollit om'),
(4, 1, 98, 'Dolor cumque et vita', '<p>adsfdasfdsfas</p>', '2026-02-09 08:23:17', '2026-02-09 08:23:17', NULL, 'aboutUS.webp', 'Laudantium repellen', 'Dolores sed maiores'),
(5, 2, 17, 'Nam in irure autem a', '<p>dasfdasfasdfsfas</p>', '2026-02-09 08:24:44', '2026-02-09 08:24:44', NULL, 'digital_studies.webp', 'Enim minima quis vit', 'Et doloribus Nam nih'),
(6, 1, 30, 'Aute fugiat proiden', '<p>asdfdasfsdfdasf</p>', '2026-02-09 08:28:41', '2026-02-09 08:28:41', NULL, 'imprint.webp', 'Amet natus et nesci', 'In voluptatibus temp'),
(7, 3, 20, 'Nesciunt qui quis d', '<p>sdafadsf</p>', '2026-02-09 08:29:14', '2026-02-09 08:29:14', NULL, 'student_advisory_service.webp', 'Commodo dolor et vit', 'Labore mollit aut ra'),
(10, 1, 12, 'Slug', '<p>Key Facts</p>', '2026-02-09 08:43:48', '2026-02-09 08:53:27', NULL, 'student_advisory_service.webp', 'Meta title', 'Meta description'),
(11, 3, 53, 'Quae dolores soluta', '<p>sdfdasfasf</p>', '2026-02-09 11:06:30', '2026-02-09 11:06:30', NULL, 'image.png', 'At et laborum eligen', 'Tempore voluptatem');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_news_authors`
--

CREATE TABLE `dynamic_news_authors` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `dynamic_news_authors`
--

INSERT INTO `dynamic_news_authors` (`id`, `name`, `description`, `avatar`, `slug`, `updated_at`, `deleted_at`) VALUES
(1, 'Elitsa Grigorova', '-', '', '', NULL, NULL),
(2, 'Kalina Georgieva', '-', '', '', NULL, NULL),
(3, 'Mathias Kunze', '-', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_news_sections`
--

CREATE TABLE `dynamic_news_sections` (
  `id` int NOT NULL,
  `news_id` int NOT NULL,
  `type` int NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `dynamic_news_sections`
--

INSERT INTO `dynamic_news_sections` (`id`, `news_id`, `type`, `content`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Dolore commodo iusto', NULL, NULL),
(2, 1, 1, '<p>asdfdasfsdafs</p>', NULL, NULL),
(3, 1, 1, '<p>2</p>', '2026-03-13 07:14:03', NULL),
(4, 1, 2, '<p>sdafasdfdsafdasdasf</p>', NULL, NULL),
(5, 2, 1, 'Perspiciatis neque', NULL, NULL),
(6, 2, 1, '<p>sdafsdfsdaf</p>', NULL, NULL),
(7, 2, 1, '<p>sadfdasfsdafdsfdasfdsfsdafa</p>', NULL, NULL),
(8, 3, 1, 'D:\\xampp\\tmp\\phpEE2A.tmp', NULL, NULL),
(9, 3, 1, '<p>asdfdasfdsa</p>', NULL, NULL),
(10, 4, 1, 'D:\\xampp\\tmp\\php5F45.tmp', NULL, NULL),
(11, 4, 1, '<p>teaser</p>', NULL, NULL),
(12, 4, 1, '<p>text 1</p>', NULL, NULL),
(13, 5, 1, 'D:\\xampp\\tmp\\phpB244.tmp', NULL, NULL),
(14, 5, 1, '<p>Teaser</p>', NULL, NULL),
(15, 5, 1, '<p>text 1</p>', NULL, NULL),
(16, 6, 1, 'Modi quis eius est e', NULL, NULL),
(17, 6, 1, '<p>asdfdasfadsfdasfdasfs</p>', NULL, NULL),
(18, 6, 1, '<p>asdfdasfdasfdasfasdfsdadsf</p>', NULL, NULL),
(19, 7, 1, 'Autem in Nam quia ut 1111', NULL, NULL),
(20, 7, 1, '<p>asfadsfasdf</p>', NULL, NULL),
(21, 7, 1, '<p>asfasdfasdfdsfa</p>', NULL, NULL),
(22, 10, 1, 'Heading', '2026-02-09 09:03:44', NULL),
(23, 10, 1, '<p>Teaser</p>', '2026-02-09 09:03:44', NULL),
(24, 10, 1, '<p>text update</p>', '2026-02-09 09:03:55', NULL),
(25, 10, 2, 'teaching-staff.webp', '2026-02-09 09:07:41', NULL),
(26, 11, 1, 'Quia magni voluptate', NULL, NULL),
(27, 11, 1, '<p>asdfadsfasdf</p>', NULL, NULL),
(28, 11, 1, '<p>asdfasdfasdf</p>', NULL, NULL),
(29, 11, 2, 'image (1).png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_news_sections_details`
--

CREATE TABLE `dynamic_news_sections_details` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `educator_categories`
--

CREATE TABLE `educator_categories` (
  `id` int NOT NULL,
  `educator_id` int NOT NULL,
  `category_id` tinyint NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educator_categories`
--

INSERT INTO `educator_categories` (`id`, `educator_id`, `category_id`, `status`) VALUES
(1, 86, 1, 0),
(2, 86, 2, 0),
(3, 86, 5, 0),
(4, 86, 8, 0),
(5, 86, 10, 0),
(6, 86, 11, 0),
(7, 86, 12, 0),
(8, 88, 1, 0),
(9, 88, 3, 0),
(10, 88, 4, 0),
(11, 88, 5, 0),
(12, 88, 7, 0),
(13, 88, 10, 0),
(14, 88, 11, 0),
(15, 88, 12, 0),
(16, 88, 13, 0),
(17, 88, 15, 0),
(18, 89, 3, 0),
(19, 89, 4, 0),
(20, 89, 5, 0),
(21, 89, 6, 0),
(22, 89, 7, 0),
(23, 89, 9, 0),
(24, 89, 10, 0),
(25, 89, 15, 0),
(26, 90, 1, 0),
(27, 90, 4, 0),
(28, 90, 6, 0),
(29, 90, 8, 0),
(30, 90, 9, 0),
(31, 90, 10, 0),
(32, 90, 13, 0),
(33, 90, 14, 0),
(34, 8, 1, 0),
(35, 8, 2, 0),
(36, 8, 4, 0),
(37, 8, 5, 0),
(38, 8, 7, 0),
(39, 8, 8, 0),
(40, 8, 12, 0),
(41, 8, 13, 0),
(42, 8, 15, 0),
(43, 65, 1, 0),
(44, 65, 2, 0),
(45, 65, 5, 0),
(46, 65, 6, 0),
(47, 65, 8, 0),
(48, 65, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `elective_courses`
--

CREATE TABLE `elective_courses` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `fldoe_course_code` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `course_title` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `credits` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `esol_details`
--

CREATE TABLE `esol_details` (
  `course_id` int UNSIGNED NOT NULL,
  `lld_level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cefr_level` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `esol_details`
--

INSERT INTO `esol_details` (`course_id`, `lld_level`, `cefr_level`) VALUES
(7, 'Entering', 'A1'),
(8, 'Emerging', 'A2'),
(9, 'Developing', 'B1'),
(10, 'Bridging', 'C1'),
(11, 'Bridging', 'C1'),
(12, 'Expanding', 'B2'),
(80, 'za zigani', 'C1');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_id` int NOT NULL,
  `student_id` int NOT NULL,
  `educator_id` int NOT NULL,
  `type` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `grade` double DEFAULT NULL,
  `comment` text COLLATE utf8mb4_general_ci,
  `pre_exam` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passed_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `datetime`, `course_id`, `student_id`, `educator_id`, `type`, `status`, `grade`, `comment`, `pre_exam`, `created_at`, `updated_at`, `passed_at`, `deleted_at`) VALUES
(1, '1993-02-25 22:00:00', 39, 68, 8, 2, 2, 0, NULL, 0, '2026-01-12 12:33:08', '2026-01-19 06:43:22', NULL, NULL),
(2, '2026-01-21 22:00:00', 1, 68, 8, 1, 2, 0, 'Perferendis praesent', 0, '2026-01-12 12:33:52', '2026-01-19 06:43:19', NULL, NULL),
(3, '1972-03-25 22:00:00', 10, 68, 8, 2, 2, 0, NULL, 0, '2026-01-16 13:59:05', '2026-01-16 19:07:20', NULL, NULL),
(4, '2021-12-22 22:00:00', 59, 68, 65, 1, 2, 0, NULL, 0, '2026-01-19 06:41:33', '2026-01-19 06:44:27', NULL, NULL),
(5, '1985-03-23 22:00:00', 1, 68, 8, 1, 2, 0, 'asdfdsafdsfasdf', 0, '2026-01-19 06:47:42', '2026-01-19 06:52:03', NULL, NULL),
(6, '2015-09-17 21:00:00', 1, 10, 5, 1, 1, 0, NULL, 0, '2026-01-19 11:28:13', '2026-01-19 12:44:44', NULL, NULL),
(7, '2026-01-23 22:00:00', 4, 12, 8, 1, 0, NULL, NULL, 1, '2026-01-20 22:20:15', '2026-02-13 14:57:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int NOT NULL,
  `subject_id` int NOT NULL,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `type` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `subject_id`, `question`, `type`) VALUES
(3, 6, 'cervrev', 0),
(4, 41, 'rfevervrevrev', 0),
(5, 15, 'dcvrverfbvberfv11', 0),
(6, 18, 'vfrvrevrcvever', 0),
(7, 1, 'fefw4eff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_students`
--

CREATE TABLE `exam_students` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact_hubs`
--

CREATE TABLE `fact_hubs` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `minutes` int NOT NULL,
  `key_facts` text NOT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fact_hubs`
--

INSERT INTO `fact_hubs` (`id`, `author_id`, `minutes`, `key_facts`, `slug`, `image`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 76, '<p>sdafasdfdas</p>', 'fact-hub-1', 'courses-cover.png', 'Et eaque odio cupidi', 'Rerum est animi per', '2026-02-09 12:27:54', '2026-02-09 12:37:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fact_hub_sections`
--

CREATE TABLE `fact_hub_sections` (
  `id` int NOT NULL,
  `news_id` int NOT NULL,
  `type` int NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fact_hub_sections`
--

INSERT INTO `fact_hub_sections` (`id`, `news_id`, `type`, `content`, `updated_at`, `deleted_at`) VALUES
(4, 2, 1, 'Veniam atque natus', NULL, NULL),
(5, 2, 1, '<p>sdfasdfasdf</p>', NULL, NULL),
(6, 2, 1, '<p>asdfsdafsd</p>', NULL, NULL),
(7, 2, 2, 'psat.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `family_consultations`
--

CREATE TABLE `family_consultations` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `educator_id` int DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `request_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_consultations`
--

INSERT INTO `family_consultations` (`id`, `parent_id`, `educator_id`, `date`, `start`, `end`, `link`, `request_id`) VALUES
(1, 9, 2, '2000-03-04 22:00:00', '2025-12-01 09:19:00', '2025-12-01 06:59:00', '20-Mar-2003', 2),
(2, 9, 231, '1970-12-25 22:00:00', '2025-12-05 15:51:00', '2025-12-05 01:43:00', '19-Feb-2012', 1),
(3, 9, 231, '2012-06-16 21:00:00', '2025-12-05 14:50:00', '2025-12-04 23:32:00', '15-May-2002', 1),
(4, 9, 231, '2012-06-16 21:00:00', '2025-12-05 14:50:00', '2025-12-04 23:32:00', '15-May-2002', 1),
(5, 9, 231, '2021-01-13 22:00:00', '2025-12-05 15:26:00', '2025-12-05 13:25:00', '22-Mar-2024', 2),
(6, 9, 231, '1990-11-28 22:00:00', '2025-12-05 21:47:00', '2025-12-05 11:35:00', '19-Nov-2004', 2),
(7, 9, 231, '1981-03-25 22:00:00', '2025-12-05 09:56:00', '2025-12-05 18:24:00', '05-Oct-2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `family_consultation_requests`
--

CREATE TABLE `family_consultation_requests` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_consultation_requests`
--

INSERT INTO `family_consultation_requests` (`id`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 2, '2025-12-05 07:41:07', '2025-12-05 08:03:49'),
(2, 9, 0, '2025-12-05 09:35:19', '2025-12-05 09:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category_id`) VALUES
(116, 'Dummy question #116', '<p>This is a dummy answer for question #116</p>', 3),
(122, 'Dummy question #122', 'This is a dummy answer for question #122', 1),
(123, 'Dummy question #123', 'This is a dummy answer for question #123', 1),
(124, 'Dummy question #124', 'This is a dummy answer for question #124', 1),
(125, 'Dummy question #125', 'This is a dummy answer for question #125', 1),
(126, 'Dummy question #126', 'This is a dummy answer for question #126', 2),
(127, 'Dummy question #127', 'This is a dummy answer for question #127', 2),
(128, 'Dummy question #128', 'This is a dummy answer for question #128', 2),
(129, 'Dummy question #129', 'This is a dummy answer for question #129', 2),
(130, 'Dummy question #130', 'This is a dummy answer for question #130', 2),
(131, 'Dummy question #131', 'This is a dummy answer for question #131', 2),
(132, 'Dummy question #132', 'This is a dummy answer for question #132', 2),
(133, 'Dummy question #133', 'This is a dummy answer for question #133', 2),
(134, 'Dummy question #134', 'This is a dummy answer for question #134', 2),
(135, 'Dummy question #135', 'This is a dummy answer for question #135', 2),
(136, 'Dummy question #136', 'This is a dummy answer for question #136', 2),
(137, 'Dummy question #137', 'This is a dummy answer for question #137', 2),
(138, 'Dummy question #138', 'This is a dummy answer for question #138', 2),
(139, 'Dummy question #139', 'This is a dummy answer for question #139', 2),
(140, 'Dummy question #140', 'This is a dummy answer for question #140', 2),
(141, 'Dummy question #141', 'This is a dummy answer for question #141', 2),
(142, 'Dummy question #142', 'This is a dummy answer for question #142', 2),
(143, 'Dummy question #143', 'This is a dummy answer for question #143', 2),
(144, 'Dummy question #144', 'This is a dummy answer for question #144', 2),
(145, 'Dummy question #145', 'This is a dummy answer for question #145', 2),
(146, 'Dummy question #146', 'This is a dummy answer for question #146', 2),
(147, 'Dummy question #147', 'This is a dummy answer for question #147', 2),
(148, 'Dummy question #148', 'This is a dummy answer for question #148', 2),
(149, 'Dummy question #149', 'This is a dummy answer for question #149', 2),
(150, 'Dummy question #150', 'This is a dummy answer for question #150', 2),
(151, 'Dummy question #151', 'This is a dummy answer for question #151', 2),
(152, 'Dummy question #152', 'This is a dummy answer for question #152', 2),
(153, 'Dummy question #153', 'This is a dummy answer for question #153', 2),
(164, 'Dummy question #164', 'This is a dummy answer for question #164', 4),
(165, 'Dummy question #165', 'This is a dummy answer for question #165', 4),
(166, 'Dummy question #166', 'This is a dummy answer for question #166', 4),
(167, 'Dummy question #167', 'This is a dummy answer for question #167', 4),
(168, 'Dummy question #168', 'This is a dummy answer for question #168', 4),
(169, 'Dummy question #169', 'This is a dummy answer for question #169', 4),
(170, 'Dummy question #170', 'This is a dummy answer for question #170', 4),
(171, 'Dummy question #171', 'This is a dummy answer for question #171', 4),
(172, 'Dummy question #172', 'This is a dummy answer for question #172', 4),
(173, 'Dummy question #173', 'This is a dummy answer for question #173', 4),
(174, 'Dummy question #174', 'This is a dummy answer for question #174', 4),
(175, 'Dummy question #175', 'This is a dummy answer for question #175', 4),
(176, 'Dummy question #176', 'This is a dummy answer for question #176', 4),
(177, 'Dummy question #177', 'This is a dummy answer for question #177', 4),
(178, 'Dummy question #178', 'This is a dummy answer for question #178', 3),
(179, 'Dummy question #179', 'This is a dummy answer for question #179', 5),
(180, 'Dummy question #180', 'This is a dummy answer for question #180', 5),
(181, 'Dummy question #181', 'This is a dummy answer for question #181', 5),
(182, 'Dummy question #182', 'This is a dummy answer for question #182', 5),
(183, 'Dummy question #183', 'This is a dummy answer for question #183', 5),
(184, 'Dummy question #184', 'This is a dummy answer for question #184', 5),
(185, 'Dummy question #185', 'This is a dummy answer for question #185', 5),
(186, 'Dummy question #186', 'This is a dummy answer for question #186', 6),
(187, 'Dummy question #187', 'This is a dummy answer for question #187', 6),
(188, 'Dummy question #188', 'This is a dummy answer for question #188', 6),
(189, 'Dummy question #189', 'This is a dummy answer for question #189', 3),
(190, 'Dummy question #190', 'This is a dummy answer for question #190', 3),
(191, 'Dummy question #191', 'This is a dummy answer for question #191', 3),
(192, 'Dummy question #192', 'This is a dummy answer for question #192', 3),
(193, 'Dummy question #193', 'This is a dummy answer for question #193', 3),
(194, 'Dummy question #194', 'This is a dummy answer for question #194', 3),
(195, 'Dummy question #195', 'This is a dummy answer for question #195', 3),
(196, 'Dummy question #196', 'This is a dummy answer for question #196', 3),
(197, 'Dummy question #197', 'This is a dummy answer for question #197', 3),
(198, 'Dummy question #198', 'This is a dummy answer for question #198', 3),
(199, 'Dummy question #199', 'This is a dummy answer for question #199', 3),
(200, 'Dummy question #200', 'This is a dummy answer for question #200', 3),
(201, 'Dummy question #201', 'This is a dummy answer for question #201', 3),
(202, 'Dummy question #202', 'This is a dummy answer for question #202', 3),
(203, 'Dummy question #203', 'This is a dummy answer for question #203', 3),
(204, 'Dummy question #204', 'This is a dummy answer for question #204', 3),
(205, 'Dummy question #205', 'This is a dummy answer for question #205', 3),
(206, 'Dummy question #206', 'This is a dummy answer for question #206', 3),
(207, 'Dummy question #207', 'This is a dummy answer for question #207', 3),
(208, 'Dummy question #208', 'This is a dummy answer for question #208', 3),
(209, 'Dummy question #209', 'This is a dummy answer for question #209', 3),
(210, 'Dummy question #210', 'This is a dummy answer for question #210', 3),
(211, 'Dummy question #211', 'This is a dummy answer for question #211', 3),
(212, 'Dummy question #212', 'This is a dummy answer for question #212', 3),
(213, 'Dummy question #213', 'This is a dummy answer for question #213', 3),
(214, 'Dummy question #214', 'This is a dummy answer for question #214', 3),
(215, 'Dummy question #215', 'This is a dummy answer for question #215', 3),
(216, 'Dummy question #216', 'This is a dummy answer for question #216', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `key`, `meta_title`, `meta_description`, `name`, `slug`) VALUES
(1, 'About highschool.me', '', '', '', ''),
(2, 'Studies', '', '', '', ''),
(3, 'Doctorate', '', '', '', ''),
(4, 'Conferences & Workshops                ', '', '', '', ''),
(5, 'Publication', '', '', '', ''),
(6, 'Coaching', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int NOT NULL,
  `feature` text COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `pro` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `core` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `elite` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `core_tooltip` text COLLATE utf8mb4_general_ci,
  `pro_tooltip` text COLLATE utf8mb4_general_ci,
  `elite_tooltip` text COLLATE utf8mb4_general_ci,
  `_order` int NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`, `category_id`, `pro`, `core`, `elite`, `core_tooltip`, `pro_tooltip`, `elite_tooltip`, `_order`, `slug`) VALUES
(1, '24-Credit-Graduation Standard Track', '1', 'Yes', 'Yes', 'Yes', 'Standard program with the full course requirements for a Florida high school diploma. Generally preferred for national or international students planning to pursue higher education at colleges or universities.', 'Standard program with the full course requirements for a Florida high school diploma. Generally preferred for national or international students planning to pursue higher education at colleges or universities.', 'Standard program with the full course requirements for a Florida high school diploma. Generally preferred for national or international students planning to pursue higher education at colleges or universities.', 1, ''),
(2, '24-Credit-Graduation Honors Track', '1', 'Yes', 'Yes', 'Yes', 'Honors program based on the full 24-credit graduation requirements for a Florida high school diploma, awarded to national and international students with a GPA of 3.5 or higher. Demonstrates advanced academic achievement and stronger preparation for higher education.', 'Honors program based on the full 24-credit graduation requirements for a Florida high school diploma, awarded to national and international students with a GPA of 3.5 or higher. Demonstrates advanced academic achievement and stronger preparation for higher education.', 'Honors program based on the full 24-credit graduation requirements for a Florida high school diploma, awarded to national and international students with a GPA of 3.5 or higher. Demonstrates advanced academic achievement and stronger preparation for higher education.', 2, ''),
(3, '18-Credit-ACCEL Graduation Track', '1', 'Yes', 'Yes', 'Yes', 'Accelerated program with fewer courses that meets the minimum Florida diploma requirements. May limit options for admission to certain colleges or universities, depending on institutional or country-specific criteria.', 'Accelerated program with fewer courses that meets the minimum Florida diploma requirements. May limit options for admission to certain colleges or universities, depending on institutional or country-specific criteria.', 'Accelerated program with fewer courses that meets the minimum Florida diploma requirements. May limit options for admission to certain colleges or universities, depending on institutional or country-specific criteria.', 3, ''),
(4, 'Credit Transfer Track', '1', 'Yes', 'Yes', 'Yes', 'Up to 75% of previously earned credits from state-recognized or accredited schools may be transferred after transcript evaluation. At least 25% of all credits must be completed at our school to qualify for graduation.', 'Up to 75% of previously earned credits from state-recognized or accredited schools may be transferred after transcript evaluation. At least 25% of all credits must be completed at our school to qualify for graduation.', 'Up to 75% of previously earned credits from state-recognized or accredited schools may be transferred after transcript evaluation. At least 25% of all credits must be completed at our school to qualify for graduation.', 4, ''),
(5, 'Rolling Enrollment', '1', 'Yes', 'Yes', 'Yes', 'Rolling enrollment allows students to start their studies at any time during the year without waiting for a specific semester or term.', 'Rolling enrollment allows students to start their studies at any time during the year without waiting for a specific semester or term.', 'Rolling enrollment allows students to start their studies at any time during the year without waiting for a specific semester or term.', 5, 'rolling-enrollment'),
(6, '12-month Round Schooling', '1', 'Yes', 'Yes', 'Yes', 'Provides full-year learning and examination opportunities, allowing students to progress and complete their studies continuously without fixed academic terms.', 'Provides full-year learning and examination opportunities, allowing students to progress and complete their studies continuously without fixed academic terms.', 'Provides full-year learning and examination opportunities, allowing students to progress and complete their studies continuously without fixed academic terms.', 6, ''),
(8, 'Cross-Grade Learning', '1', 'Yes', 'Yes', 'Yes', 'Allows students to take courses across different grade levels, enabling flexible scheduling based on individual strengths, interests, and personal timelines while fulfilling all required core and elective courses.', 'Allows students to take courses across different grade levels, enabling flexible scheduling based on individual strengths, interests, and personal timelines while fulfilling all required core and elective courses.', 'Allows students to take courses across different grade levels, enabling flexible scheduling based on individual strengths, interests, and personal timelines while fulfilling all required core and elective courses.', 7, ''),
(11, 'Full Access to all Graduation Courses anytime', '2', 'Yes', 'Yes', 'Yes', 'Provides unrestricted access to all graduation courses at any time, allowing students to complete all subjects required for the 24-credit graduation track without yearly course limits.', 'Provides unrestricted access to all graduation courses at any time, allowing students to complete all subjects required for the 24-credit graduation track without yearly course limits.', 'Provides unrestricted access to all graduation courses at any time, allowing students to complete all subjects required for the 24-credit graduation track without yearly course limits.', 0, ''),
(12, 'Full Access to the course library', '2', 'Yes', 'Yes', 'Yes', 'Provides unrestricted access to the full course library at any time, allowing students to complete all subjects required for the 24-credit graduation track without yearly course limits.', 'Provides unrestricted access to the full course library at any time, allowing students to complete all subjects required for the 24-credit graduation track without yearly course limits.', 'Provides unrestricted access to the full course library at any time, allowing students to complete all subjects required for the 24-credit graduation track without yearly course limits.', 0, ''),
(15, 'Real-Time Performance Monitoring', '2', 'Yes', 'Yes', 'Yes', 'Provides real-time insights into academic performance for both students and parents, allowing continuous monitoring of progress and early response to any performance deviations.', 'Provides real-time insights into academic performance for both students and parents, allowing continuous monitoring of progress and early response to any performance deviations.', 'Provides real-time insights into academic performance for both students and parents, allowing continuous monitoring of progress and early response to any performance deviations.', 0, ''),
(16, 'AI-StudyMentors 24/7 related to subject', '2', 'Fair Use Access (Smart)', 'Fair Use Access (Lite)', 'Fair Use Access (Smart)', '<p>Each subject is supported by its own AI Study Mentor, available 24/7 to assist with questions, explanations, and learning guidance directly related to that specific subject. Fair Use Access (Lite) plan includes up to 500 questions per month.</p>', '<p>Each subject is supported by its own AI Study Mentor, available 24/7 to assist with questions, explanations, and learning guidance directly related to that specific subject. Fair Use Access (Smart) plan includes up to 1,200 questions per month.</p>', '<p>Each subject is supported by its own AI Study Mentor, available 24/7 to assist with questions, explanations, and learning guidance directly related to that specific subject. Fair Use Access (Smart) plan includes up to 1,200 questions per month.</p>', 0, ''),
(18, 'PSAT Prep-Course with Pre-Exam', '3', 'Full Access', 'Add-on (extra charge)', 'Full Access', '<p>PSAT preparation course with a simulated exam available as an optional add-on for an additional fee.</p>', '<p>PSAT preparation course with a simulated exam included in the plan.</p>', '<p>PSAT preparation course with a simulated exam included in the plan.</p>', 1, 'psat-prep-course'),
(19, 'SAT/ACT Prep-Course with Pre-Exam', '3', 'Full Access', 'Add-on (extra charge)', 'Full Access', 'SAT or ACT preparation course with a simulated exam available as an optional add-on for an additional fee.', 'SAT or ACT preparation course with a simulated exam included in the plan.', 'SAT or ACT preparation course with a simulated exam included in the plan.', 2, ''),
(20, 'Advanced Placement Prep-Courses with Pre-Exams', '3', '1 per year', 'Add-on (extra charge)', '2 per year', 'Advanced Placement preparation courses with a simulated exam available as an optional add-on for an additional fee.', 'Advanced Placement preparation courses with a simulated exam included in the plan (1 courses of choice within 12 months).', 'Advanced Placement preparation courses with a simulated exam included in the plan (2 courses of choice within 12 months).', 3, ''),
(21, 'Career & Technical Education (CTE) Prep-Courses with Pre-Exams', '3', '2 per year', 'Add-on (extra charge)', '4 per year', 'Career & Technical Education preparation courses with a simulated exam available as an optional add-on for an additional fee.', 'Career & Technical Education preparation courses with a simulated exam included in the plan (2 courses of choice within 12 months).', 'Career & Technical Education preparation courses with a simulated exam included in the plan (4 courses of choice within 12 months).', 5, ''),
(28, 'Ambassador Program', '4', 'Yes', 'Yes', 'Yes', 'Allows students to share their school experience, refer others, and receive special benefits through a dynamic reward system.', 'Allows students to share their school experience, refer others, and receive special benefits through a dynamic reward system.', '1Allows students to share their school experience, refer others, and receive special benefits through a dynamic reward system.', 1, ''),
(29, 'Freshman Kit', '4', 'Yes', 'Yes', 'Yes', 'Welcome Kit filled with trendy and practical gear designed to match your vibe and kick off your high school experience in style.', 'Welcome Kit filled with trendy and practical gear designed to match your vibe and kick off your high school experience in style.', 'Welcome Kit filled with trendy and practical gear designed to match your vibe and kick off your high school experience in style.', 1, ''),
(30, 'Access to Awards Programs', '4', 'Yes', 'Yes', 'Yes', 'Includes recognition through the President’s Education Awards Program (PEAP), the American Citizenship Award, and additional institutional recognitions for outstanding performance.', 'Includes recognition through the President’s Education Awards Program (PEAP), the American Citizenship Award, and additional institutional recognitions for outstanding performance.', 'Includes recognition through the President’s Education Awards Program (PEAP), the American Citizenship Award, and additional institutional recognitions for outstanding performance.', 1, ''),
(31, 'Group Learning Sessions', '4', 'Yes', 'Add-on (extra charge)', 'Yes', 'Facilitates collaborative progress review, shared identification of learning gaps, collective time management strategies, task coordination, short-term goal planning, and study technique exchange to enhance group performance available as an optional add-on for an additional fee.', 'Facilitates collaborative progress review, shared identification of learning gaps, collective time management strategies, task coordination, short-term goal planning, and study technique exchange to enhance group performance (every two weeks, 45 minutes).', 'Facilitates collaborative progress review, shared identification of learning gaps, collective time management strategies, task coordination, short-term goal planning, and study technique exchange to enhance group performance (every two weeks, 45 minutes).', 1, ''),
(32, 'Personal Mentoring Sessions', '4', 'Add-on (extra charge)', 'Add-on (extra charge)', 'Yes', 'Provides individual problem solving, in-depth clarification of complex subjects, analysis of personal error patterns, preparation for assessments, identification of specific competence gaps, optimization of time management and learning structure, or enhancement of individual performance in selected subjects (available as an optional add-on for an additional fee).', 'Provides individual problem solving, in-depth clarification of complex subjects, analysis of personal error patterns, preparation for assessments, identification of specific competence gaps, optimization of time management and learning structure, or enhancement of individual performance in selected subjects (available as an optional add-on for an additional fee).', 'Provides individual problem solving, in-depth clarification of complex subjects, analysis of personal error patterns, preparation for assessments, identification of specific competence gaps, optimization of time management and learning structure, or enhancement of individual performance in selected subjects (every two weeks, 45 minutes).', 1, ''),
(33, 'College & Career Coaching', '4', 'Add-on (extra charge)', 'Add-on (extra charge)', 'Yes', 'Provides structured college and career coaching covering college selection, application timeline planning, guidance on standardized test strategy such as PSAT/SAT/ACT/AP, essay and document review, scholarship and financial-aid guidance, interview training, course alignment with college requirements, and progress monitoring (available as an optional add-on for an additional fee).', 'Provides structured college and career coaching covering college selection, application timeline planning, guidance on standardized test strategy such as PSAT/SAT/ACT/AP, essay and document review, scholarship and financial-aid guidance, interview training, course alignment with college requirements, and progress monitoring (available as an optional add-on for an additional fee).', 'Provides structured college and career coaching covering college selection, application timeline planning, guidance on standardized test strategy such as PSAT/SAT/ACT/AP, essay and document review, scholarship and financial-aid guidance, interview training, course alignment with college requirements, and progress monitoring (3 sessions in Grade 11 and 3 sessions in Grade 12; 45 minutes each).', 1, ''),
(34, 'Digital Transcript', '5', 'Yes', 'Yes', 'Yes', 'Provides an automatically updated digital transcript accessible in both student and parent dashboards, displaying completed subjects and corresponding grades immediately after each exam, ensuring continuous and transparent performance tracking throughout the entire study period.', 'Provides an automatically updated digital transcript accessible in both student and parent dashboards, displaying completed subjects and corresponding grades immediately after each exam, ensuring continuous and transparent performance tracking throughout the entire study period.', 'Provides an automatically updated digital transcript accessible in both student and parent dashboards, displaying completed subjects and corresponding grades immediately after each exam, ensuring continuous and transparent performance tracking throughout the entire study period.', 1, ''),
(35, 'High School President’s Reference Letter', '5', 'Yes', 'Add-on (extra charge)', 'Yes', 'Provides a personalized reference letter from the High School President, issued upon request to support college applications, scholarship considerations, or professional career opportunities (subject to a handling and shipping fee for preparation and processing).', 'Provides a personalized reference letter from the High School President, issued upon request to support college applications, scholarship considerations, or professional career opportunities.', 'Provides a personalized reference letter from the High School President, issued upon request to support college applications, scholarship considerations, or professional career opportunities.', 1, ''),
(36, 'Diploma Package', '5', 'Add-on (extra charge)', 'Add-on (extra charge)', 'Yes', 'Provides a physical High School Diploma together with the official transcript, presented in a premium leather folder and delivered securely to the student or parents by courier service after graduation (subject to a handling and shipping fee).', 'Provides a physical High School Diploma together with the official transcript, presented in a premium leather folder and delivered securely to the student or parents by courier service after graduation (subject to a handling and shipping fee).', 'Provides a physical High School Diploma together with the official transcript, presented in a premium leather folder and delivered securely to the student or parents by courier service after graduation.', 1, ''),
(37, 'Student Educational Help Desk', '5', 'Priority', 'Standard', 'High Priority', 'Provides a dedicated parent Help Desk for inquiries related to student progress, exam schedules, access issues, or administrative questions, handled through a ticket system and answered by the responsible mentor or staff member. Standard processing time applies.Provides a structured educational Help Desk for subject-related questions and exam preparation support, where students can submit inquiries through a ticket system and receive responses from the responsible mentor. Standard processing time applies.Provides a structured educational Help Desk for subject-related questions and exam preparation support, where students can submit inquiries through a ticket system and receive responses from the responsible mentor. Standard processing time applies.', 'Provides a structured educational Help Desk for subject-related questions and exam preparation support, where students can submit inquiries through a ticket system and receive responses from the responsible mentor. Priority processing time applies.', 'Provides a structured educational Help Desk for subject-related questions and exam preparation support, where students can submit inquiries through a ticket system and receive responses from the responsible mentor. High-priority processing time applies.', 1, ''),
(38, 'Parent Help Desk', '5', 'Priority', 'Standard', 'High Priority', 'Provides a dedicated parent Help Desk for inquiries related to student progress, exam schedules, access issues, or administrative questions, handled through a ticket system and answered by the responsible mentor or staff member. Standard processing time applies.', 'Provides a dedicated parent Help Desk for inquiries related to student progress, exam schedules, access issues, or administrative questions, handled through a ticket system and answered by the responsible mentor or staff member. Priority processing time applies.', 'Provides a dedicated parent Help Desk for inquiries related to student progress, exam schedules, access issues, or administrative questions, handled through a ticket system and answered by the responsible mentor or staff member. High-priority processing time applies.', 1, ''),
(39, 'Family Consultation', '5', '1 per year', 'Parent Help Desk', '2 per year', 'Family consultation is provided through the Parent Help Desk, allowing parents to address all concerns and receive guidance via the ticket system.', 'Includes one annual face-to-face family consultation with the assigned mentor to discuss student progress, learning goals, and individual development.', 'Includes two annual face-to-face family consultations with the assigned mentor to discuss student progress, learning goals, and individual development.', 1, ''),
(40, 'College-Level Examination Program (CLEP) Prep-Courses with Pre-Exams', '3', '1 per year', 'Add-on (extra charge)', '2 per year', 'College-Level Examination Program (CLEP) preparation courses with a simulated exam available as an optional add-on for an additional fee.', 'College-Level Examination Program (CLEP) preparation courses with a simulated exam included in the plan (1 course of choice within 12 months).', 'College-Level Examination Program (CLEP) preparation courses with a simulated exam included in the plan (2 courses of choice within 12 months).', 4, 'college-level-examination'),
(41, 'English Courses for Speakers of other Languages (ESOL) with Exam', '3', 'Add-on (extra charge)', 'Add-on (extra charge)', '1 per year', 'U.S. state-approved English language development courses with a final exam available as an optional add-on for an additional fee.', 'U.S. state-approved English language development courses with a final exam available as an optional add-on for an additional fee.', 'U.S. state-approved English language development courses with a final exam included in the plan (1 course per year).', 6, 'english-courses-for-speakers');

-- --------------------------------------------------------

--
-- Table structure for table `feature_categories`
--

CREATE TABLE `feature_categories` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feature_categories`
--

INSERT INTO `feature_categories` (`id`, `name`) VALUES
(1, 'Enrollment & Graduation '),
(2, 'Learning Access & Resources '),
(3, 'Preparation & Specialized Courses '),
(4, 'Student Services & Engagement '),
(5, 'Administrative & Family Support ');

-- --------------------------------------------------------

--
-- Table structure for table `frauds`
--

CREATE TABLE `frauds` (
  `id` int NOT NULL,
  `exam_id` int NOT NULL,
  `student_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_sessions`
--

CREATE TABLE `group_sessions` (
  `id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educator_id` int NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_sessions`
--

INSERT INTO `group_sessions` (`id`, `date`, `start`, `end`, `educator_id`, `link`) VALUES
(1, '1978-11-29 22:00:00', '2025-11-29 15:23:00', '2025-11-29 07:01:00', 231, 'dsfadsf'),
(2, '2017-07-31 21:00:00', '2025-11-29 03:00:00', '2025-11-29 17:18:00', 231, '29-Oct-1978'),
(3, '1972-03-05 22:00:00', '2025-11-29 06:22:00', '2025-11-29 06:51:00', 231, '26-Sep-2001');

-- --------------------------------------------------------

--
-- Table structure for table `help_desks`
--

CREATE TABLE `help_desks` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `is_new` int NOT NULL,
  `is_admin` int NOT NULL,
  `related_to` int DEFAULT NULL,
  `is_parent` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help_desks`
--

INSERT INTO `help_desks` (`id`, `user_id`, `title`, `message`, `slug`, `is_new`, `is_admin`, `related_to`, `is_parent`, `created_at`, `updated_at`) VALUES
(1, 44, 'Praesentium illum e', 'Enim non ut aliquam', '000001', 1, 0, NULL, 0, '2026-01-12 11:20:25', '2026-01-12 11:20:25'),
(2, 44, 'Sed excepteur praese', 'Sunt illum ut incid', '000002', 1, 0, NULL, 0, '2026-01-12 11:22:24', '2026-01-12 11:22:24'),
(3, 44, 'Quis quis ab alias e', 'Commodi obcaecati do', '000003', 1, 0, NULL, 0, '2026-01-12 11:22:38', '2026-01-12 11:22:38'),
(4, 44, 'Eaque beatae labore', 'Alias aperiam iure a', '000004', 1, 0, NULL, 0, '2026-01-12 11:23:14', '2026-01-12 11:23:14'),
(5, 44, 'Ut itaque fugit dol', 'Porro totam consequa', '000005', 1, 0, NULL, 0, '2026-01-12 11:26:03', '2026-01-12 11:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src`, `nickname`, `alt`, `title`) VALUES
(1, '/images/large-conference-table.webp', 'main-image', '', ''),
(2, '/images/main-image-mobile.webp', 'main-image-mobile', '', ''),
(3, '/images/logo-header-image.png', 'logo', '', ''),
(4, '/images/image.webp', 'benefit-1', '', ''),
(5, '/images/handshake.webp', 'benefit-2', '', ''),
(6, '/images/roman-building.webp', 'benefit-3', '', ''),
(11, '/images/student-blog.webp', 'blog-cover', '', ''),
(12, '/images/graduating-students.webp', 'study-1', '', ''),
(13, '/images/pages-cover-images/master_programs.webp', 'study-2', '', ''),
(14, '/images/businessman-works-on-a-terrace.webp', 'study-3', '', ''),
(15, '/images/phd-degree.webp', 'study-4', '', ''),
(16, '/images/phone-conversation.webp', 'study-5', '', ''),
(26, '/images/partnership.webp', 'about-cover', '', ''),
(27, '/images/Black-man-and-dipoma.webp', 'program-321321', '', ''),
(28, '/images/businessman-in-dark-blue-suit.webp', 'program-1', '', ''),
(29, '/images/businesswoman-and-tablet.webp', 'program-3', '', ''),
(30, '/images/woman-hold-clipboard.webp', 'program-4', '', ''),
(31, '/images/female-doctor.webp', 'program-6', '', ''),
(32, '/images/emba-online.webp', 'program-7', '', ''),
(33, '/images/women-conversation.webp', 'program-10123123', '', ''),
(34, '/images/colleagues-working-side-by-side.webp', 'program-1112321', '', ''),
(35, '/images/work-discussion.webp', 'program-12', '', ''),
(37, '/images/man-typing-on-computer-keyboard.webp', 'program-8', '', ''),
(38, '/images/two-men-and-smartphone.webp', 'program-17', '', ''),
(39, '/images/businessman-in-blue-suit.webp', 'program-18', '', ''),
(40, '/images/professional-black-woman.webp', 'program-19', '', ''),
(41, '/images/female-works-on-laptop.webp', 'program-20', '', ''),
(42, '/images/businesswomen-with-crossed-arms.webp', 'program-21', '', ''),
(43, '/images/modern-office-environment.webp', 'program-22', '', ''),
(44, '/images/woman-presents-work-plan.webp', 'program-23', '', ''),
(45, '/images/focused-asian-man.webp', 'program-24', '', ''),
(46, '/images/cheerful-doctor-with-stethoscope.webp', 'program-25', '', ''),
(47, '/images/smiling-man-on-the-phone.webp', 'program-9', '', ''),
(48, '/images/portrait-of-a-doctor.webp', 'program-12', '', ''),
(49, '/images/man-hands-with-book-and-pen.webp', 'program-11', '', ''),
(56, '/images/hieroglyph-and-letter-a.webp', 'language-icon', '', ''),
(57, '/images/calendar.webp', 'calendar-icon', '', ''),
(58, '/images/map-point.webp', 'location-icon', '', ''),
(59, '/images/teaching-staff.png', 'academics-cover', '', ''),
(60, '/images/mathias-kunze.webp', 'academic-50', '', ''),
(61, '/images/dr-adil-yuecel-lecturer-profile.webp', 'academic-51', '', ''),
(62, '/images/prof-dr-stefan-reith-lecturer-profile.webp', 'academic-52', '', ''),
(63, '/images/julia-becker.webp', 'academic-53', '', ''),
(64, '/images/prof-dr-kveng-hong-kao-lecturer-profile.webp', 'academic-54', '', ''),
(65, '/images/prof-kunal-saigal-lecturer-profile.webp', 'academic-55', '', ''),
(66, '/images/Group 2202.webp', 'academic-56', '', ''),
(67, '/images/benjamin-dunker.webp', 'academic-57', '', ''),
(68, '/images/stefan-gerstner-lecturer-profile.webp', 'academic-58', '', ''),
(69, '/images/dr-benjamin-von-block-schlesier-lecturer-profile.webp', 'academic-59', '', ''),
(70, '/images/IMG_0530.png', 'academic-60', '', ''),
(71, '/images/Group 2202.webp', 'academic-61', '', ''),
(72, '/images/sebastian-lamm.webp', 'academic-62', '', ''),
(73, '/images/patrick-van-geldern.jpg', 'academic-63', '', ''),
(74, '/images/ilhami-aben.webp', 'academic-64', '', ''),
(75, '/images/Group 2202.webp', 'academic-65', '', ''),
(77, '/images/logo-iic-university-of-technology.webp', 'partner-3', '', ''),
(78, '/images/logo-universitaet-com.webp', 'partner-4', '', ''),
(79, '/images/logo-thesis-me.webp', 'partner-5', '', ''),
(81, '/images/female-graduate-and-diploma.webp', 'accreditation-cover', '', ''),
(103, '/images/onsites-graduate-school-logo.png', 'logo-header', '', ''),
(105, '/images/coaching.webp', 'coaching', '', ''),
(106, '/images/monograph.webp', 'publishing', '', ''),
(107, '/images/professional-work-on-a-couch.webp', 'digital_studies', '', ''),
(108, '/images/clenching-fists-triumphing.webp', 'recognition_of_previous_achievemnts', '', ''),
(109, '/images/data-analysis-on-a-tablet.webp', 'study_financing', '', ''),
(110, '/images/student-assistance-team.webp', 'student_advisory_service', '', ''),
(111, '/images/credit-recovery.webp', 'study_registration', '', ''),
(112, '/images/certificate.webp', 'accreditation', '', ''),
(113, '/images/two-monitors.webp', 'help_desk', '', ''),
(114, '/images/student-faq.webp', 'faqs', '', ''),
(115, '/images/padlocks.webp', 'gdpr', '', ''),
(116, '/images/panoramic-windows.webp', 'imprint', '', ''),
(117, '/images/diploma-certificate.webp', 'recognition_of_previous_achievemnts_one', '', ''),
(118, '/images/barbie-graduate.webp', 'recognition_of_previous_achievemnts_two', '', ''),
(119, '/images/envelope-and-paper-clip.webp', 'recognition_of_previous_achievemnts_three', '', ''),
(120, '/images/recognition_of_previous_achievemnts_four-images.png', 'recognition_of_previous_achievemnts_four', '', ''),
(121, '/images/working-desk.webp', 'term_and_conditions', '', ''),
(126, '/images/sun-check-mark.webp', 'recognition_of_previous_achievemnts_five', '', ''),
(150, '/images/logo-imc.webp', 'partner-9', '', ''),
(152, '/images/conference.webp', 'conferences', '', ''),
(156, '/images/contact-page-background.png', 'contact-form-background', '', ''),
(157, '/images/student-rating.webp', 'stars-5', '', ''),
(158, '/images/phone-icon.webp', 'phone-icon', '', ''),
(159, '/images/coaching-session.webp', 'coaching-session', '', ''),
(160, '/images/coaching-seminar.webp', 'board-presentation', '', ''),
(161, '/images/colleagues-celebrate-success.webp', 'colleagues-celebrate-success', '', ''),
(162, '/images/professional-graduate.webp', 'professional-graduates', '', ''),
(163, '/images/master-graduates.webp', 'master-graduates', '', ''),
(164, '/images/bachelor-graduate.webp', 'bachelor-graduates-professionals', '', ''),
(165, '/images/prof-dr-mathias-kunze-lecturer-profile.webp', 'about-image-president', '', ''),
(166, '/images/employer-branding-award.webp', 'award', '', ''),
(167, '/images/high-quality-study-materials.webp', '1', '', ''),
(168, '/images/online-events.webp', '2', '', ''),
(169, '/images/online-exam.webp', '3', '', ''),
(170, '/images/student-support.webp', '4', '', ''),
(171, '/images/print-book.webp', 'book', '', ''),
(172, '/images/online-publication.webp', 'ebook', '', ''),
(174, '/images/barbie-lifelong-learning.webp', 'news-8', '', ''),
(175, '/news_images/graduation-gift.webp', 'news-12', '', ''),
(176, '/images/music-for-studying.webp', 'news-13', '', ''),
(177, '/images/up-icon.webp', 'up-icon', '', ''),
(178, '/news_images/student-discounts.webp', 'news-14', '', ''),
(179, '/news_images/ai-in-education.webp', 'news-15', '', ''),
(180, '/news_images/ai-in-education.webp', 'conference-1', '', ''),
(181, '/news_images/moocs.webp', 'news-16', '', ''),
(182, '/news_images/gamification.webp', 'news-17', '', ''),
(183, '/news_images/exam-stress.webp', 'news-18', '', ''),
(184, '/images/publishing-service.webp', 'book-publishing-services', '', ''),
(185, '/images/books.webp', 'publishing-services', '', ''),
(186, '/images/examination-rules.webp', 'examination-rules', '', ''),
(187, '/images/code-of-ethics.webp', 'code-of-ethics', '', ''),
(188, '/images/graduation-cap.webp', 'contact-us-first-icon', '', ''),
(189, '/images/webpage.webp', 'contact-us-two-icon', '', ''),
(190, '/images/public-speech.webp', 'contact-us-three-icon', '', ''),
(191, '/images/climb-stairs.webp', 'contact-us-four-icon', '', ''),
(192, '/images/open-book.webp', 'contact-us-five-icon', '', ''),
(193, '/images/business-handshake.webp', 'contact-us-six-icon', '', ''),
(194, '/images/newspaper.webp', 'contact-us-seven-icon', '', ''),
(195, '/images/weighing-scale.webp', 'contact-us-eight-icon', '', ''),
(196, '/images/gear.webp', 'contact-us-nine-icon', '', ''),
(197, '/images/contact-us-tech-support.webp', 'contact-us-tech-support', '', ''),
(198, '/news_images/studying-to-music.webp', 'news-19', '', ''),
(199, '/news_images/moocs.webp', 'news-20', '', ''),
(200, '/news_images/student-discounts.webp', 'news-21', '', ''),
(201, '/news_images/ai-in-education.webp', 'news-22', '', ''),
(202, '/news_images/gamification.webp', 'news-23', '', ''),
(203, '/news_images/pencil-in-mouth.webp', 'news-24', '', ''),
(206, '/images/bubble-message-boxes.webp', 'bubble-message-boxes', '', ''),
(207, '/images/rupp.webp', 'partner-10', '', ''),
(208, '/images/author-1.webp', 'author-1', '', ''),
(209, '/images/author-2.webp', 'author-2', '', ''),
(210, '/images/mathias-kunze.webp', 'author-3', '', ''),
(211, '/images/graduation-caps-in-the-air.webp', 'program-2', '', ''),
(212, '/images/law-office.webp', 'program-5', '', ''),
(213, '/images/stock-brokers.webp', 'program-10', '', ''),
(214, '/images/industrial-engineer.webp', 'program-13', '', ''),
(215, '/images/it-engineer.webp', 'program-14', '', ''),
(217, '/images/starter-kit.png', 'promotion-cover', '', ''),
(218, '/images/apple-ipad.webp', 'promotion-1', '', ''),
(219, '/images/ai-translator.webp', 'promotion-2', '', ''),
(220, '/images/leather-notebook.webp', 'promotion-3', '', ''),
(221, '/images/earbuds.webp', 'promotion-4', '', ''),
(222, '/images/hardcover-binding.webp', 'promotion-5', '', ''),
(223, '/images/peer-review-journal.webp', 'promotion-6', '', ''),
(224, '/images/career-coaching-for-graduates.webp', 'promotion-7', '', ''),
(225, '/images/a-calvar-QMUGK_bQB08-unsplash.jpg', 'all_programs', '', ''),
(226, '/images/unsubscribtion-from-newsletter.webp', 'unsubscribe', '', ''),
(227, '/images/stev.jpg', 'program-15', '', ''),
(228, '/images/bachelor-professional-in-business-680b9619078be.webp', 'program-cover-1', '', ''),
(229, '/images/sq.png', 'iso-cover', '', ''),
(230, '/images/panoramic-windows.webp', 'accessibility', '', ''),
(231, '/images/flag.png', 'us-flag', '', ''),
(232, '/images/mission.png', 'mission', '', ''),
(235, '/images/courses/high-school-diploma.png', 'course-1', '-', '-'),
(236, '/images/courses/psat.png', 'course-2', '-', '-'),
(237, '/images/courses/ap-course.png', 'course-3', '-', '-'),
(238, '/images/courses/baccalaureate.png', 'course-4', '-', '-'),
(239, '/images/courses-cover.png', 'courses-cover', '-', '-'),
(240, '/images/courses/baccalaureate.png', 'course-5', '-', '-'),
(241, '/images/courses/psat.png', 'course-1', '-', '-'),
(242, '/images/courses/high-school-diploma.png', 'course-2', '-', '-'),
(243, '/images/courses/high-school-diploma.png', 'course-3', '-', '-'),
(244, '/images/courses/psat.png', 'course-4', '-', '-'),
(245, '/images/courses/psat.png', 'course-5', '-', '-'),
(246, '/images/courses/courses-cover.png', 'course-6', '-', '-'),
(247, '/images/courses/psat.png', 'course-7', '-', '-'),
(248, '/images/courses/courses-cover.png', 'course-8', '-', '-'),
(249, '/images/courses/courses-cover.png', 'course-9', '-', '-'),
(250, '/images/freshman-kit/freshman-kit.png', 'freshman-kit-cover', '-', '-'),
(251, '/images/student-spotlight/classmates-standing-with-textbooks.png', 'student-spotlight', '-', '-'),
(252, '/images/courses/AboutController.php', 'course-15', '-', '-'),
(253, '/images/courses/BRWD46A6A25B7BC_011044.pdf', 'course-16', '-', '-'),
(254, '/images/credit-transfer.webp', 'credit_transfer', '-', '-'),
(255, '/images/old-newspaper-background-top-view.png', 'press_releases', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int UNSIGNED NOT NULL,
  `invoice_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `VAT_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ZIPcode` int DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `user_email`, `description`, `price`, `VAT_number`, `created_at`, `name`, `surname`, `street`, `street_number`, `city`, `ZIPcode`, `company_name`, `country_id`) VALUES
(1, 'C200000001', 'vasilis@stavros.bggg', '', 17.00, NULL, '2025-07-31 08:04:26', 'Vassilisss', 'Stavrosss2', 'Beli lilii', '25', 'Varna', 9000, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `street_number` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `country_id` int NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_code` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `city`, `street`, `street_number`, `zip`, `user_id`, `country_id`, `phone`, `phone_code`) VALUES
(1, 'Varna', 'Beli lilii', '22', '9000', 3, 33, '', ''),
(2, 'Varna', 'Beli Lilii', '22-24', '9000', 13, 33, '+359883437439', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `type` int NOT NULL COMMENT '1-medical; 2-personal',
  `file` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `status` int NOT NULL COMMENT '0 => ''Pending'', 1 => ''Approved'', 2 => ''Denied'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `student_id`, `type`, `file`, `message`, `created_at`, `start_date`, `end_date`, `status`) VALUES
(1, 12, 2, 'american-flag-background-independence-day.png', 'efeggwgrgrwe', '2026-02-10 09:38:10', '2026-02-16 22:00:00', '2026-02-24 22:00:00', 2),
(2, 12, 1, 'magazines.webp', 'test mest', '2026-02-11 09:17:57', '2026-02-17 22:00:00', '2026-02-26 22:00:00', 1),
(3, 12, 1, 'award-2.png', 'deggerherhe', '2026-02-17 14:49:46', '2026-02-17 22:00:00', '2026-02-24 22:00:00', 0),
(4, 12, 2, 'asian-woman-with-mask.webp', 'evgfreghthtrmnjy', '2026-02-17 14:55:49', '2026-02-24 22:00:00', '2026-02-27 22:00:00', 0),
(5, 12, 1, 'business-handshake.webp', 'regegegrgrgregrgreg rg reg regrgrgergre regre rg rg', '2026-02-18 06:45:11', '2026-02-24 22:00:00', '2026-02-26 22:00:00', 0),
(6, 12, 2, 'ai-translator.webp', 'ghvgiunj', '2026-02-18 07:47:19', '2026-02-18 22:00:00', '2026-02-24 22:00:00', 0),
(7, 12, 2, 'awards.png', 'htdrththrhrth', '2026-02-18 07:49:41', '2026-02-18 22:00:00', '2026-02-25 22:00:00', 0),
(8, 12, 2, 'businesswomen-with-crossed-arms.webp', 'rfghtrt th trhrth rth t h', '2026-02-18 07:50:26', '2026-02-25 22:00:00', '2026-02-27 22:00:00', 0),
(9, 12, 2, 'business-handshake.webp', 'gjgfjjtyjtyyj', '2026-02-18 07:54:42', '2026-02-17 22:00:00', '2026-02-26 22:00:00', 0),
(10, 12, 2, 'Black-man-and-dipoma.webp', 'ergyhhthte htehte teh h tht htht', '2026-02-18 07:58:57', '2026-02-18 22:00:00', '2026-02-24 22:00:00', 0),
(11, 12, 2, 'barbie-doll.webp', 'fegrew grgreg rgreg ge', '2026-02-18 08:01:28', '2026-02-18 22:00:00', '2026-02-24 22:00:00', 0),
(12, 12, 2, 'apple-ipad.webp', 'gryh rthrtrhrthrt', '2026-02-18 08:07:33', '2026-02-17 22:00:00', '2026-02-25 22:00:00', 0),
(13, 12, 2, 'benjamin-dunker.webp', 'ght hrth hth rth th th rthhrth', '2026-02-18 08:09:30', '2026-02-17 22:00:00', '2026-02-25 22:00:00', 0),
(14, 12, 2, 'bloomberg.webp', 'rgeg regre ggre greg reg r', '2026-02-18 08:11:16', '2026-02-18 22:00:00', '2026-02-24 22:00:00', 0),
(15, 12, 1, 'ap-background.png', 'rghe hreh  hh trh hrthrthrt hrthrt h', '2026-02-18 08:15:33', '2026-02-19 22:00:00', '2026-02-24 22:00:00', 0),
(16, 12, 2, 'award-1.png', 'regre er greg regregreg re g', '2026-02-18 08:21:59', '2026-02-18 22:00:00', '2026-03-01 22:00:00', 0),
(17, 12, 2, 'apple-ipad.webp', 'rgh rhrth rth rthtrh', '2026-02-18 08:34:05', '2026-02-25 22:00:00', '2026-03-03 22:00:00', 0),
(18, 12, 1, 'cheerful-doctor-with-stethoscope.webp', 'reg reghg reggregerg', '2026-02-18 08:35:07', '2026-02-17 22:00:00', '2026-02-25 22:00:00', 0),
(19, 12, 1, 'bachelor-professional-in-business-680b9619078be.webp', 'dsgre gh reghre reghet e', '2026-02-18 08:36:39', '2026-02-25 22:00:00', '2026-03-05 22:00:00', 0),
(20, 12, 1, 'benefit4.png', 'гр4г р4тг4 г5г г5г г', '2026-02-18 08:46:38', '2026-02-18 22:00:00', '2026-02-24 22:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentoring_sessions`
--

CREATE TABLE `mentoring_sessions` (
  `id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `educator_id` int NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentoring_sessions`
--

INSERT INTO `mentoring_sessions` (`id`, `date`, `start`, `end`, `educator_id`, `link`) VALUES
(1, '2001-01-23 22:00:00', '2025-12-09 03:10:00', '2025-12-09 06:03:00', 231, '31-Aug-1992');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_01_10_071046_custom_routes_table', 2),
(4, '2023_01_10_073549_add_slug_column_to_custom_routes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `created_at`, `updated_at`, `sender`, `subject`, `subject_de`, `cover_image`) VALUES
(2, '2025-02-03 10:57:52', '2025-02-03 10:57:52', 'graduate.me', 'test newsletter', 'test newsletter de', '20201224_133540 - Copy.jpg'),
(3, '2025-02-03 12:52:55', '2025-02-03 12:52:55', 'Dimitar OGS', 'Second test', 'Second test de', 'tax-consultancy-services.webp'),
(4, '2025-03-10 10:34:57', '2025-03-10 10:34:57', 'test.graduate.me', 'SUBJECT IN ENGLISH', 'SUBJECT IN GERMAN', 'employer-branding-award.webp');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_sections`
--

CREATE TABLE `newsletter_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_de` text COLLATE utf8mb4_unicode_ci,
  `newsletter_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_sections`
--

INSERT INTO `newsletter_sections` (`id`, `image`, `link`, `content`, `content_de`, `newsletter_id`, `created_at`, `updated_at`) VALUES
(1, 'clenching-fists-triumphing.webp', 'https://onsites.com/', '<p>english</p>', '<p>german</p>', 2, '2025-02-03 10:57:52', '2025-02-03 10:57:52'),
(2, 'tax-consultancy-services.webp', 'https://graduate.me/', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 3, '2025-02-03 12:52:55', '2025-02-03 12:52:55'),
(3, '512x250.png', 'https://graduate.me/de/empowerment-kit', '<p>HERE CONTENT IN ENGLISH</p>', '<p>HERE CONTENT IN GERMAN</p>', 4, '2025-03-10 10:34:57', '2025-03-10 10:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `newsletter_id` int NOT NULL,
  `subscriber_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `read_at`, `created_at`, `updated_at`) VALUES
(7, 1, 'New leave request submitted.', NULL, '2026-02-17 14:55:49', '2026-02-17 14:55:49'),
(8, 2, 'New leave request submitted.', NULL, '2026-02-17 14:55:49', '2026-02-17 14:55:49'),
(10, 4, 'New leave request submitted.', NULL, '2026-02-17 14:55:49', '2026-02-17 14:55:49'),
(11, 5, 'New leave request submitted.', NULL, '2026-02-17 14:55:49', '2026-02-17 14:55:49'),
(12, 6, 'New leave request submitted.', NULL, '2026-02-17 14:55:49', '2026-02-17 14:55:49'),
(13, 7, 'New leave request submitted.', NULL, '2026-02-17 14:55:49', '2026-02-17 14:55:49'),
(15, 1, 'New leave request submitted.', NULL, '2026-02-18 06:45:11', '2026-02-18 06:45:11'),
(16, 2, 'New leave request submitted.', NULL, '2026-02-18 06:45:11', '2026-02-18 06:45:11'),
(18, 4, 'New leave request submitted.', NULL, '2026-02-18 06:45:11', '2026-02-18 06:45:11'),
(19, 5, 'New leave request submitted.', NULL, '2026-02-18 06:45:11', '2026-02-18 06:45:11'),
(20, 6, 'New leave request submitted.', NULL, '2026-02-18 06:45:11', '2026-02-18 06:45:11'),
(21, 7, 'New leave request submitted.', NULL, '2026-02-18 06:45:11', '2026-02-18 06:45:11'),
(23, 1, 'New leave request submitted.', NULL, '2026-02-18 07:47:19', '2026-02-18 07:47:19'),
(24, 2, 'New leave request submitted.', NULL, '2026-02-18 07:47:19', '2026-02-18 07:47:19'),
(26, 4, 'New leave request submitted.', NULL, '2026-02-18 07:47:19', '2026-02-18 07:47:19'),
(27, 5, 'New leave request submitted.', NULL, '2026-02-18 07:47:19', '2026-02-18 07:47:19'),
(28, 12, 'New leave request submitted.', '2026-02-18 09:05:05', '2026-02-18 07:47:19', '2026-02-18 09:05:05'),
(29, 7, 'New leave request submitted.', NULL, '2026-02-18 07:47:19', '2026-02-18 07:47:19'),
(31, 16, 'New leave request submitted.', '2026-02-18 09:27:29', '2026-02-18 07:49:41', '2026-02-18 09:27:29'),
(32, 16, 'New leave request submitted.', '2026-02-18 09:17:33', '2026-02-18 07:49:41', '2026-02-18 09:17:33'),
(34, 16, 'New leave request submitted.', '2026-02-18 09:27:29', '2026-02-18 07:49:41', '2026-02-18 09:27:29'),
(35, 16, 'New leave request submitted.', '2026-02-18 09:27:29', '2026-02-18 07:49:41', '2026-02-18 09:27:29'),
(36, 6, 'New leave request submitted.', NULL, '2026-02-18 07:49:41', '2026-02-18 07:49:41'),
(37, 7, 'New leave request submitted.', NULL, '2026-02-18 07:49:41', '2026-02-18 07:49:41'),
(39, 12, 'New leave request submitted.', '2026-02-18 09:05:05', '2026-02-18 07:50:26', '2026-02-18 09:05:05'),
(40, 2, 'New leave request submitted.', NULL, '2026-02-18 07:50:26', '2026-02-18 07:50:26'),
(42, 4, 'New leave request submitted.', NULL, '2026-02-18 07:50:26', '2026-02-18 07:50:26'),
(43, 5, 'New leave request submitted.', NULL, '2026-02-18 07:50:26', '2026-02-18 07:50:26'),
(44, 6, 'New leave request submitted.', NULL, '2026-02-18 07:50:26', '2026-02-18 07:50:26'),
(45, 7, 'New leave request submitted.', NULL, '2026-02-18 07:50:26', '2026-02-18 07:50:26'),
(47, 1, 'New leave request submitted.', NULL, '2026-02-18 07:54:42', '2026-02-18 07:54:42'),
(48, 2, 'New leave request submitted.', NULL, '2026-02-18 07:54:42', '2026-02-18 07:54:42'),
(50, 4, 'New leave request submitted.', NULL, '2026-02-18 07:54:42', '2026-02-18 07:54:42'),
(51, 5, 'New leave request submitted.', NULL, '2026-02-18 07:54:42', '2026-02-18 07:54:42'),
(52, 6, 'New leave request submitted.', NULL, '2026-02-18 07:54:42', '2026-02-18 07:54:42'),
(53, 7, 'New leave request submitted.', NULL, '2026-02-18 07:54:42', '2026-02-18 07:54:42'),
(55, 1, 'New leave request submitted.', NULL, '2026-02-18 07:58:57', '2026-02-18 07:58:57'),
(56, 2, 'New leave request submitted.', NULL, '2026-02-18 07:58:57', '2026-02-18 07:58:57'),
(58, 4, 'New leave request submitted.', NULL, '2026-02-18 07:58:57', '2026-02-18 07:58:57'),
(59, 5, 'New leave request submitted.', NULL, '2026-02-18 07:58:57', '2026-02-18 07:58:57'),
(60, 6, 'New leave request submitted.', NULL, '2026-02-18 07:58:57', '2026-02-18 07:58:57'),
(61, 7, 'New leave request submitted.', NULL, '2026-02-18 07:58:57', '2026-02-18 07:58:57'),
(63, 1, 'New leave request submitted.', NULL, '2026-02-18 08:01:28', '2026-02-18 08:01:28'),
(64, 2, 'New leave request submitted.', NULL, '2026-02-18 08:01:28', '2026-02-18 08:01:28'),
(66, 4, 'New leave request submitted.', NULL, '2026-02-18 08:01:28', '2026-02-18 08:01:28'),
(67, 5, 'New leave request submitted.', NULL, '2026-02-18 08:01:28', '2026-02-18 08:01:28'),
(68, 6, 'New leave request submitted.', NULL, '2026-02-18 08:01:28', '2026-02-18 08:01:28'),
(69, 7, 'New leave request submitted.', NULL, '2026-02-18 08:01:28', '2026-02-18 08:01:28'),
(71, 1, 'New leave request submitted.', NULL, '2026-02-18 08:07:33', '2026-02-18 08:07:33'),
(72, 2, 'New leave request submitted.', NULL, '2026-02-18 08:07:33', '2026-02-18 08:07:33'),
(74, 4, 'New leave request submitted.', NULL, '2026-02-18 08:07:33', '2026-02-18 08:07:33'),
(75, 5, 'New leave request submitted.', NULL, '2026-02-18 08:07:33', '2026-02-18 08:07:33'),
(76, 6, 'New leave request submitted.', NULL, '2026-02-18 08:07:33', '2026-02-18 08:07:33'),
(77, 7, 'New leave request submitted.', NULL, '2026-02-18 08:07:33', '2026-02-18 08:07:33'),
(79, 1, 'New leave request submitted.', NULL, '2026-02-18 08:09:30', '2026-02-18 08:09:30'),
(80, 2, 'New leave request submitted.', NULL, '2026-02-18 08:09:30', '2026-02-18 08:09:30'),
(82, 4, 'New leave request submitted.', NULL, '2026-02-18 08:09:30', '2026-02-18 08:09:30'),
(83, 5, 'New leave request submitted.', NULL, '2026-02-18 08:09:30', '2026-02-18 08:09:30'),
(84, 6, 'New leave request submitted.', NULL, '2026-02-18 08:09:30', '2026-02-18 08:09:30'),
(85, 7, 'New leave request submitted.', NULL, '2026-02-18 08:09:30', '2026-02-18 08:09:30'),
(87, 1, 'New leave request submitted.', NULL, '2026-02-18 08:11:16', '2026-02-18 08:11:16'),
(88, 2, 'New leave request submitted.', NULL, '2026-02-18 08:11:16', '2026-02-18 08:11:16'),
(90, 4, 'New leave request submitted.', NULL, '2026-02-18 08:11:16', '2026-02-18 08:11:16'),
(91, 5, 'New leave request submitted.', NULL, '2026-02-18 08:11:16', '2026-02-18 08:11:16'),
(92, 6, 'New leave request submitted.', NULL, '2026-02-18 08:11:16', '2026-02-18 08:11:16'),
(93, 7, 'New leave request submitted.', NULL, '2026-02-18 08:11:16', '2026-02-18 08:11:16'),
(95, 1, 'New leave request submitted.', NULL, '2026-02-18 08:15:33', '2026-02-18 08:15:33'),
(96, 2, 'New leave request submitted.', NULL, '2026-02-18 08:15:33', '2026-02-18 08:15:33'),
(98, 4, 'New leave request submitted.', NULL, '2026-02-18 08:15:33', '2026-02-18 08:15:33'),
(99, 5, 'New leave request submitted.', NULL, '2026-02-18 08:15:33', '2026-02-18 08:15:33'),
(100, 6, 'New leave request submitted.', NULL, '2026-02-18 08:15:33', '2026-02-18 08:15:33'),
(101, 7, 'New leave request submitted.', NULL, '2026-02-18 08:15:33', '2026-02-18 08:15:33'),
(103, 1, 'New leave request submitted.', NULL, '2026-02-18 08:21:59', '2026-02-18 08:21:59'),
(104, 2, 'New leave request submitted.', NULL, '2026-02-18 08:21:59', '2026-02-18 08:21:59'),
(106, 4, 'New leave request submitted.', NULL, '2026-02-18 08:21:59', '2026-02-18 08:21:59'),
(107, 5, 'New leave request submitted.', NULL, '2026-02-18 08:21:59', '2026-02-18 08:21:59'),
(108, 6, 'New leave request submitted.', NULL, '2026-02-18 08:21:59', '2026-02-18 08:21:59'),
(109, 7, 'New leave request submitted.', NULL, '2026-02-18 08:21:59', '2026-02-18 08:21:59'),
(111, 1, 'New leave request submitted.', NULL, '2026-02-18 08:34:05', '2026-02-18 08:34:05'),
(112, 2, 'New leave request submitted.', NULL, '2026-02-18 08:34:05', '2026-02-18 08:34:05'),
(114, 4, 'New leave request submitted.', NULL, '2026-02-18 08:34:05', '2026-02-18 08:34:05'),
(115, 5, 'New leave request submitted.', NULL, '2026-02-18 08:34:05', '2026-02-18 08:34:05'),
(116, 6, 'New leave request submitted.', NULL, '2026-02-18 08:34:05', '2026-02-18 08:34:05'),
(117, 7, 'New leave request submitted.', NULL, '2026-02-18 08:34:05', '2026-02-18 08:34:05'),
(119, 1, 'New leave request submitted.', NULL, '2026-02-18 08:35:07', '2026-02-18 08:35:07'),
(120, 2, 'New leave request submitted.', NULL, '2026-02-18 08:35:07', '2026-02-18 08:35:07'),
(122, 4, 'New leave request submitted.', NULL, '2026-02-18 08:35:07', '2026-02-18 08:35:07'),
(123, 5, 'New leave request submitted.', NULL, '2026-02-18 08:35:07', '2026-02-18 08:35:07'),
(124, 6, 'New leave request submitted.', NULL, '2026-02-18 08:35:07', '2026-02-18 08:35:07'),
(125, 7, 'New leave request submitted.', NULL, '2026-02-18 08:35:07', '2026-02-18 08:35:07'),
(126, 13, 'Leave request submitted successfully!', '2026-02-18 08:39:10', '2026-02-18 08:36:39', '2026-02-18 08:39:10'),
(127, 1, 'New leave request submitted.', NULL, '2026-02-18 08:36:39', '2026-02-18 08:36:39'),
(128, 2, 'New leave request submitted.', NULL, '2026-02-18 08:36:39', '2026-02-18 08:36:39'),
(129, 3, 'New leave request submitted.', '2026-02-18 09:29:14', '2026-02-18 08:36:39', '2026-02-18 09:29:14'),
(130, 4, 'New leave request submitted.', NULL, '2026-02-18 08:36:39', '2026-02-18 08:36:39'),
(131, 5, 'New leave request submitted.', NULL, '2026-02-18 08:36:39', '2026-02-18 08:36:39'),
(132, 6, 'New leave request submitted.', NULL, '2026-02-18 08:36:39', '2026-02-18 08:36:39'),
(133, 7, 'New leave request submitted.', NULL, '2026-02-18 08:36:39', '2026-02-18 08:36:39'),
(134, 13, 'Leave request submitted successfully!', '2026-02-18 08:56:29', '2026-02-18 08:46:38', '2026-02-18 08:56:29'),
(135, 1, 'New leave request submitted.', NULL, '2026-02-18 08:46:38', '2026-02-18 08:46:38'),
(136, 2, 'New leave request submitted.', NULL, '2026-02-18 08:46:38', '2026-02-18 08:46:38'),
(137, 3, 'New leave request submitted.', '2026-02-18 09:29:14', '2026-02-18 08:46:38', '2026-02-18 09:29:14'),
(138, 4, 'New leave request submitted.', NULL, '2026-02-18 08:46:38', '2026-02-18 08:46:38'),
(139, 5, 'New leave request submitted.', NULL, '2026-02-18 08:46:38', '2026-02-18 08:46:38'),
(140, 6, 'New leave request submitted.', NULL, '2026-02-18 08:46:38', '2026-02-18 08:46:38'),
(141, 7, 'New leave request submitted.', NULL, '2026-02-18 08:46:38', '2026-02-18 08:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `parent_students`
--

CREATE TABLE `parent_students` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `student_id` int NOT NULL,
  `status` int NOT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `is_disabled` tinyint NOT NULL DEFAULT '0',
  `grade` int DEFAULT NULL,
  `track` tinyint NOT NULL COMMENT '24-track,18-track,transfer-program,single course, sessions',
  `feedback` text COLLATE utf8mb4_general_ci,
  `tokens` bigint DEFAULT NULL COMMENT 'Tokens == questions (because of change during development)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_students`
--

INSERT INTO `parent_students` (`id`, `parent_id`, `student_id`, `status`, `expired_at`, `is_disabled`, `grade`, `track`, `feedback`, `tokens`) VALUES
(1, 13, 12, 2, NULL, 0, 9, 0, NULL, NULL),
(3, 13, 7, 2, NULL, 0, 9, 0, NULL, NULL),
(4, 13, 20, 3, NULL, 0, NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `created_at`) VALUES
(3, NULL),
(4, '0000-00-00 00:00:00'),
(5, '0000-00-00 00:00:00'),
(9, '2023-08-03 07:41:22'),
(10, '2024-03-06 13:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_month` int NOT NULL,
  `price_per_year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price_per_month`, `price_per_year`) VALUES
(1, 'Core', 190, 1990),
(2, 'Pro', 590, 5900),
(3, 'Elite', 1190, 11900);

-- --------------------------------------------------------

--
-- Table structure for table `press_releases`
--

CREATE TABLE `press_releases` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `minutes` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `press_releases`
--

INSERT INTO `press_releases` (`id`, `author_id`, `minutes`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(33, 3, 981, '2025-11-29 10:54:56', '2025-11-29 10:59:36', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `press_release_sections`
--

CREATE TABLE `press_release_sections` (
  `id` int NOT NULL,
  `news_id` int NOT NULL,
  `type` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `press_release_section_translations`
--

CREATE TABLE `press_release_section_translations` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `press_release_translations`
--

CREATE TABLE `press_release_translations` (
  `id` int NOT NULL,
  `news_id` int NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `key_facts` text COLLATE utf8mb4_general_ci,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_courses`
--

CREATE TABLE `related_courses` (
  `id` int NOT NULL,
  `main_id` int NOT NULL,
  `related_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `related_courses`
--

INSERT INTO `related_courses` (`id`, `main_id`, `related_id`) VALUES
(1, 43, 46),
(2, 54, 57),
(3, 65, 67),
(4, 28, 29),
(5, 34, 32),
(6, 39, 36);

-- --------------------------------------------------------

--
-- Table structure for table `self_assessment_answers`
--

CREATE TABLE `self_assessment_answers` (
  `id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `self_assessment_answers`
--

INSERT INTO `self_assessment_answers` (`id`, `question_id`, `answer`, `is_correct`) VALUES
(5, 3, 'ggrgerg', 0),
(6, 3, 'regregreg', 0),
(7, 3, 'reger', 1),
(8, 3, 'gregrege', 0),
(9, 4, 'rgreg', 1),
(10, 4, 'gegerg', 0),
(11, 4, 'regregr', 0),
(12, 4, 'grereg', 0),
(13, 5, 'mrgwfertyu,im', 0),
(14, 5, 'ynbteynm,m', 0),
(15, 5, 'nbvcfetgyhjkli', 0),
(16, 5, '.o,m345y6u78lio. ,mnb', 1),
(17, 6, 'jhgfdsa', 0),
(18, 6, 'sdfvgbhnjm.', 1),
(19, 6, 'cxc', 0),
(20, 6, 'vbnm,./.,mnbvc', 0),
(21, 7, '1', 1),
(22, 7, '2', 0),
(23, 7, '3', 0),
(24, 7, '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `self_assessment_attempts`
--

CREATE TABLE `self_assessment_attempts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `material_id` int NOT NULL,
  `started_at` timestamp NOT NULL,
  `ends_at` timestamp NOT NULL,
  `score` int DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `self_assessment_attempts`
--

INSERT INTO `self_assessment_attempts` (`id`, `user_id`, `material_id`, `started_at`, `ends_at`, `score`, `completed`) VALUES
(1, 12, 1, '2026-01-23 13:18:06', '2026-01-23 14:18:06', 3, 1),
(2, 12, 12, '2026-02-13 15:00:03', '2026-02-13 16:00:03', 0, 1),
(3, 12, 13, '2026-02-13 15:00:18', '2026-02-13 16:00:18', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `self_assessment_attempt_questions`
--

CREATE TABLE `self_assessment_attempt_questions` (
  `id` int NOT NULL,
  `attempt_id` int NOT NULL,
  `question_id` int NOT NULL,
  `selected_answer_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `self_assessment_attempt_questions`
--

INSERT INTO `self_assessment_attempt_questions` (`id`, `attempt_id`, `question_id`, `selected_answer_id`) VALUES
(1, 1, 4, 12),
(2, 1, 6, 18),
(3, 1, 3, 7),
(4, 1, 5, 14),
(5, 1, 7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `self_assessment_questions`
--

CREATE TABLE `self_assessment_questions` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `material_id` int DEFAULT NULL,
  `question` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `self_assessment_questions`
--

INSERT INTO `self_assessment_questions` (`id`, `course_id`, `material_id`, `question`) VALUES
(3, 89, 1, 'egwggr'),
(4, 89, 1, 'f3ewff'),
(5, 89, 1, 'reghtjkktjyrhgerfe'),
(6, 89, 1, '12345678'),
(7, 89, 1, 'qazxwdcvrf');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer` text COLLATE utf8mb4_general_ci,
  `exam_id` int NOT NULL COMMENT 'who answer',
  `comment` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `question_id`, `answer`, `exam_id`, `comment`) VALUES
(1, 0, 'HIGHSCHOOL_PLAN 2 2.odt', 1, NULL),
(4, 1, 'adsfdasfadsfasdfasd', 2, 'Eiusmod proident ei'),
(5, 1, 'asdfdsafdasf', 2, 'Autem odio earum lab'),
(6, 1, 'asdfasdfdasfsd', 5, 'asdfasdfasdf'),
(7, 1, 'asdassafasdf', 5, 'adfasfasdfasdf'),
(8, 1, 'dsafsdafsdafas', 6, NULL),
(9, 1, NULL, 6, NULL),
(10, 1, NULL, 6, NULL),
(11, 1, NULL, 6, NULL),
(12, 1, NULL, 6, NULL),
(13, 1, NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_documents`
--

CREATE TABLE `student_documents` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL,
  `is_approved` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_enrolled_courses`
--

CREATE TABLE `student_enrolled_courses` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `catalog_course_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_enrolled_courses`
--

INSERT INTO `student_enrolled_courses` (`id`, `user_id`, `catalog_course_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 12, 1, '2026-01-21 07:26:21', NULL, 0),
(2, 12, 4, '2026-01-21 07:34:51', NULL, 0),
(3, 12, 89, '2026-01-21 07:34:51', NULL, 0),
(4, 20, 1, '2026-03-05 13:49:13', '2026-03-05 13:49:13', 1),
(5, 20, 2, '2026-03-23 21:51:40', '2026-03-23 21:51:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_plans`
--

CREATE TABLE `student_plans` (
  `id` int NOT NULL,
  `student_id` int NOT NULL COMMENT 'It is related to ParentStudent model',
  `plan_id` int NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_plans`
--

INSERT INTO `student_plans` (`id`, `student_id`, `plan_id`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 46, 2, '2025-11-09 12:50:06', '2025-12-01 11:48:19', NULL),
(2, 46, 1, '2026-01-01 10:53:04', '2025-12-01 11:48:19', NULL),
(3, 46, 1, '2026-02-01 10:53:04', '2025-12-01 11:48:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_spotlights`
--

CREATE TABLE `student_spotlights` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_spotlights`
--

INSERT INTO `student_spotlights` (`id`, `category_id`, `name`, `description`, `image`) VALUES
(1, 2, 'Dragan Petkov1', 'eferbhttbhbhhthr123', 'award-3.png'),
(2, 2, 'laino', 'efewfewffwe', 'ai-translator.webp');

-- --------------------------------------------------------

--
-- Table structure for table `student_spotlights_categories`
--

CREATE TABLE `student_spotlights_categories` (
  `id` int NOT NULL,
  `category` varchar(225) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_spotlights_categories`
--

INSERT INTO `student_spotlights_categories` (`id`, `category`) VALUES
(1, 'Excellent grades'),
(2, 'Ambassadors and Social Media');

-- --------------------------------------------------------

--
-- Table structure for table `study_mentors`
--

CREATE TABLE `study_mentors` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `video` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_mentors`
--

INSERT INTO `study_mentors` (`id`, `name`, `category_id`, `description`, `slug`, `video`) VALUES
(1, 'Vili Vucov', 1, 'Vili Vucov is a well-known Bulgarian football coach and media personality, famous for coaching several clubs and for his outspoken opinions about Bulgarian football', 'vucata', 'https://www.youtube.com/embed/qqGuKhWH5Eo?si=D0NwO6ZFMxM7_-lx'),
(2, 'Emil Velev Kokala', 8, 'Emil Velev is a well-known figure in Bulgarian football, first as a player for Levski Sofia and later as a coach for several Bulgarian clubs.', 'kokala', 'https://www.youtube.com/embed/xB-Wp9BDiBw?si=Q2EiM7o8YvT3IzNg');

-- --------------------------------------------------------

--
-- Table structure for table `subject_areas`
--

CREATE TABLE `subject_areas` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_areas`
--

INSERT INTO `subject_areas` (`id`, `name`) VALUES
(1, 'Capstone (Special Programs)'),
(2, 'English'),
(3, 'English & Communication'),
(4, 'English Language Arts'),
(5, 'Fine & Practical Arts'),
(6, 'History & Social Sciences'),
(7, 'Leadership & Career Development'),
(8, 'Mathematics'),
(9, 'Mathematics & Computer Science'),
(10, 'Physical Education'),
(11, 'Science'),
(12, 'Sciences'),
(13, 'Social Science & Humanities'),
(14, 'Social Studies'),
(15, 'Technology/ComputerEducation');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `lang` int NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `lang`, `code`) VALUES
(1, 'Ivan Georgiev', 'ivan.georgiev@onsites.com', '2024-07-29 08:42:54', '2025-07-03 06:39:33', NULL, 0, 1, 'Ac5X9fThQQ'),
(5, 'Vasil Stavrev ', 'vasil.stavrev@onsites.com', NULL, '2025-07-03 06:37:45', NULL, 0, 1, 'YKEYvqJe9z'),
(6, 'Mathias Kunze', 'mathias.kunze@onsites.com', '2025-02-27 10:33:39', '2025-07-03 06:38:51', NULL, 0, 0, 'wnUbngWKaJ'),
(65, 'Daniel ', 'danielnagel640@gmail.com', '2025-03-01 13:32:35', '2025-07-03 06:41:31', NULL, 0, 0, 'oIBgJFDXfZ'),
(66, 'Sebastian ', 'sebastian.boeller@gmail.com', '2025-03-01 20:54:18', '2025-07-03 06:39:06', NULL, 0, 0, 'kLjfOewkj3'),
(67, 'Georg ', 'webergeorg17@yahoo.de', '2025-03-03 11:16:45', '2025-07-03 06:42:03', NULL, 0, 0, '3ye9T8QutJ'),
(69, 'Schödlbauer', 'a.schoedlbauer@gmx.de', '2025-03-12 04:38:58', '2025-03-12 04:38:58', NULL, 1, 0, 'JRbdaUOjO4'),
(70, 'Christian ', 'ddneustadt@gmail.com', '2025-03-13 23:01:01', '2025-03-13 23:01:01', NULL, 1, 0, 'htlDxUGdJO'),
(71, 'Kannika ', 'kannikaprasad.1@gmail.com', '2025-03-14 07:19:42', '2025-03-14 07:19:42', NULL, 1, 1, '1OV5isI485'),
(73, 'Karim', 'karim.bandasch@gmail.com,', '2025-03-20 11:57:14', NULL, NULL, 1, 1, '1df03334dfsavsdfffffadfsddascasdfdasfasdf'),
(74, 'Dimitar Aleksiev', 'dimitar.aleksiev@onsites.com', '2025-03-20 10:05:14', '2025-03-20 10:05:14', NULL, 1, 0, 'H2aF5t390g6igzYutX1svSNr8TfOY2'),
(77, 'Mathias Kunze', 'kunze.phd@gmail.com', '2025-03-20 10:06:44', '2025-03-20 10:06:44', NULL, 1, 1, 'mm0Xj2jZi2gx0yc020s07thAIaz3Kl'),
(78, 'Christian ', 'chrstnreimann@gmail.com', '2025-03-20 10:11:31', '2025-03-20 10:11:31', NULL, 1, 0, 'vYlqtmkSRp0mQqZZxlUoAfzU4EGsoU'),
(79, 'MAx ', 'mathias.kunze@gmx.com', '2025-03-20 10:12:30', '2025-03-20 10:12:30', NULL, 1, 0, 'NyWTrtz6VeMr6byGA75XQ1cYdlk5wZ'),
(84, 'Omar ', 'Omar.Ladurner@gmx.net', '2025-03-23 19:36:22', '2025-03-23 19:36:22', NULL, 1, 0, 'TEJJwe33GlAPXgaP2txqZSQlYoy8d9'),
(85, 'Dominic', 'dominic.a.raju@gmail.com', '2025-03-27 03:35:11', '2025-03-27 03:35:11', NULL, 1, 1, 'c8z7GNpGodr3HeVydqUz5LnSCnJbQA'),
(86, 'Martin ', 'martinbenedickt@gmx.de', '2025-03-27 05:41:59', '2025-03-27 05:41:59', NULL, 1, 0, 'AZZN42VxeRH7pt76SihDCSijeMyg66'),
(87, 'AFRIDHA BANU', 'afridabanu78623@gmail.com', '2025-03-28 04:43:51', '2025-07-03 06:42:13', NULL, 0, 1, 'UhnoWQWUvflMF7XxUBqSmr1WD2i2Dv'),
(88, 'Verena ', 'vkreutzmann@gmx.de', '2025-03-29 07:27:05', '2025-03-29 07:27:05', NULL, 1, 0, 'TQLiTCbWYeV4h5vafCBir13vi8eUoo'),
(89, 'Markus ', 'arltmarkus@ok.de', '2025-03-29 07:54:28', '2025-03-29 07:54:28', NULL, 1, 0, '12fDntUuBbLvqBBCFetxnOBuZfXT55'),
(90, 'Enrico ', 'enrico14klein@gmail.com', '2025-04-02 10:14:30', '2025-04-02 10:14:30', NULL, 1, 0, 'rGB3bsMZ3l894WJfUmwrBB7AhAbVP4'),
(91, 'Berislav Kekic', 'kekic.berislav@gmail.com', '2025-04-03 05:06:13', '2025-04-03 05:06:13', NULL, 1, 0, 'Tcp2I1WQLhpUXh6TeemqoHyDt9ZPS5'),
(92, 'Michael ', 'klarenaar@t-online.de', '2025-04-06 12:47:00', '2025-04-06 12:47:00', NULL, 1, 0, 'K8nLBxn7zP1EGPmCkPOylYESrFW8FD'),
(93, 'Majid', 'majidbashar5@gmail.com', '2025-04-09 10:50:15', '2025-04-09 10:50:15', NULL, 1, 1, 'iaw3rJHFp7ixJhfoGNVyfEX9khdWxB'),
(94, 'Dimitar Aleksiev', 'dimitaraleksiev4@gmail.com', '2025-04-10 03:33:35', '2025-04-10 03:33:35', NULL, 1, 0, 'l68Qb7a4ehPypoqMiIjciSBVwovHI9'),
(95, 'Anju ', 'anjujames014@gmail.com', '2025-04-10 05:49:04', '2025-04-10 05:49:04', NULL, 1, 1, 'g11kS3dSSl1etNyVgxiegRSaC51WtX'),
(96, 'Nilesh ', 'nilsurya@gmail.com', '2025-04-13 02:24:04', '2025-04-13 02:24:04', NULL, 1, 1, '5CZRDHwEhYhH9sBPePrc1t9D20HT9Q'),
(97, 'Humphrey Mathalo', 'humphreymathalo25@gmail.com', '2025-04-13 10:51:36', '2025-04-13 10:51:36', NULL, 1, 1, 'GXdXfrgVrQYXge6ljxjZmOI5ZY3GTi'),
(98, 'Stefan ', 'st.jonas@web.de', '2025-04-22 17:06:18', '2025-04-22 17:06:18', NULL, 1, 0, 'QmZqgu3MkZeQ0iWiIfzqTPEEODvt2u'),
(99, 'Michael ', 'klarenaar@r-online.de', '2025-04-23 07:26:23', '2025-04-23 07:26:23', NULL, 1, 0, 'hyxuiAqYKCc40NxnHcAXdbxRnyrsuu'),
(100, 'Tim Schiller', 'schillertim+onsites@gmail.com', '2025-04-30 10:56:10', '2025-04-30 10:56:10', NULL, 1, 0, 'bmHNFzj7kufidVsRvnIqoqJayBKW8X'),
(101, 'Michael ', 'mikgruebnau@gmx.de', '2025-05-04 11:14:58', '2025-05-04 11:14:58', NULL, 1, 0, 'l1RhmBMvF2FVbKh3iJhB2KbNKAIT5i'),
(102, 'Thabo Msomi', 'soniamsomi.tm@gmail.com', NULL, NULL, NULL, 1, 0, 'dzX7Fl9NJ4hItz055VMq1LUH74S5GK'),
(103, 'dasfdasf', 'asdfdasf@asdfdasfasf.bg', '2025-05-07 10:55:07', '2025-05-07 10:55:07', NULL, 1, 0, '6ZEHD69YzY6zlmfO19zr2E843Xgnh4'),
(104, 'adsfasdfasdfdasfsda', 'asdfasdfdas@adsfdasfsd.bg', '2025-05-07 10:56:39', '2025-05-07 10:56:39', NULL, 1, 0, 'z1HUnZYH9HDy6vHbwyxBwGv0Hu970r'),
(105, 'Derek Leigh Reed', 'rijacy@mailinator.com', NULL, NULL, NULL, 1, 0, 'FAImgjgDp7GwgRe9BxMgWAoR2IQpys'),
(106, 'Lyle Merritt', 'cijiju@mailinator.com', NULL, NULL, NULL, 1, 0, 'Jm22JA8xFSfRCxVPjfdnIOZxjbDJjF');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` int NOT NULL,
  `text_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text_de` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `text_bg` text,
  `text_es` text,
  `text_ru` text,
  `editor` tinyint NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(8, 'GET ADVICE NOW', 'GET ADVICE NOW', '', '', '', 0, 'advice', 'header'),
(9, 'Dashboard', 'Dashboard', '', '', '', 0, 'Dashboard Header Button', 'header'),
(10, '© 2025 ONSITES Graduate School. All Rights Reserved.', '© 2025 ONSITES Graduate School. Alle Rechte vorbehalten.', 'fff', 'fff', 'ff', 0, 'copyright', 'footer'),
(11, 'COURSES', 'COURSES', '', '', '', 0, 'study-programs-link', 'header-nav'),
(12, 'CONFERENCES & WORKSHOPS', 'KONFERENZEN & WORKSHOPS', '', '', '', 0, 'conferences-and-workshops-link', 'header-nav'),
(13, 'RESEARCH & CAREER', 'FORSCHUNG & KARRIERE', '', '', '', 0, 'research-link', 'header-nav'),
(14, 'COACHING', 'COACHING', '', '', '', 0, 'coaching-link', 'header-nav'),
(15, 'BOOK PUBLISHING', 'BUCH VERÖFFENTLICHEN', '', '', '', 0, 'publishing-link', 'header-nav'),
(16, 'SMART STUDIES', 'ONLINE-STUDIUM', '', '', '', 0, 'digital-study-link', 'header-nav'),
(17, 'RECOGNITION OF PRIOR LEARNING', 'STUDIUM VERKÜRZEN', '', '', '', 0, 'recognition', 'header-nav'),
(18, 'STUDENT FINANCE', 'STUDIUM FINANZIEREN', '', '', '', 0, 'study-financing', 'header-nav'),
(19, 'ONLINE LEARNING', 'ONLINE STUDIEREN', '', '', '', 0, 'digital-studies', 'header-nav'),
(20, 'STUDENT ASSISTANCE TEAM', 'STUDIENBERATUNG', '', '', '', 0, 'student-advisory-service', 'header-nav'),
(21, 'Apply Now', 'Jetzt bewerben', '', '', '', 0, 'study-registration', 'header-nav'),
(22, 'ABOUT', 'ÜBER UNS', '', '', '', 0, 'about', 'header-nav'),
(23, 'OUR LECTURERS', 'UNSERE DOZENTEN', '', '', '', 0, 'academics', 'header-nav'),
(24, 'ACCREDITATION & PARTNERS', 'AKKREDITIERUNG & PARTNER', '', '', '', 0, 'accreditation', 'header-nav'),
(25, 'Partners Service', 'Partners Service', '', '', '', 0, 'partners', 'header-nav'),
(26, 'NEWS EXPLORER', 'NEWS EXPLORER', '', '', '', 0, 'blog', 'header-nav'),
(27, 'Ask Us About Our Programs & Services', 'Auf jede Frage eine Antwort', '1', '1', '1', 0, 'heading', 'faq'),
(28, 'Recent Publications', '', '', '', '', 0, 'heading', 'recent-publications'),
(29, 'Author', '', '', '', '', 0, 'author', 'recent-publications'),
(30, 'Pages', '', '', '', '', 0, 'pages', 'recent-publications'),
(31, 'Our Coaching Services Unlock Your True Potential', 'Coaching befreit Dein wahres Potenzial', '', '', '', 0, 'heading', 'coaching'),
(32, '<p>&nbsp;</p>\r\n\r\n<p>Do you feel stuck, although you would like to develop yourself further? Then embark on your personal coaching journey now.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School offers reflection-based coaching services&nbsp;at eye level -<strong> 100% tailored &amp; flexible</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whether<strong> <a href=\"https://graduate.me/en/coaching-services#individual-coaching\">individual coaching</a></strong> or <a href=\"https://graduate.me/en/coaching-services#group-coaching\"><strong>group coaching</strong></a>, <strong>online</strong> or <strong>on-site</strong> &ndash; we give your inner compass the optimal direction.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Explore your undeveloped potential &amp; reach new heights!&nbsp;Because you&#39;re much greater than you think<strong>!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Here&rsquo;s Why Coaching Is Your Game-Changer</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>Self-reflection &amp; Change of Course</strong></span>: Coaching puts your inner life in order: You reflect on your behavior, identify strengths and weaknesses. Together with your coach, you break away from the old and define clear, realistic goals for a successful future.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>New Self-confidence</strong></span>: Coaching strengthens your self-image and removes inner blocks. &ndash; Inhibiting beliefs, fears and self-doubt disappear. You gain maximum courage and the mental power to face your challenges with utmost confidence.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>Increased Productivity &amp; Performance</strong></span>: With enhanced self-awareness and boosted self-confidence, you can finally unleash your potential. The result: the effectiveness and value of your performance grows exponentially.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>Crisis Resistance</strong></span>: Coaching opens up more differentiated perspectives and promotes flexible action. This paves the way for you to deal calmly with crises and conflicts. You will also be able to cope with major crises in a level-headed and productive manner.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:justify\">Hast Du auch das Gef&uuml;hl festzusitzen, obwohl Du Dich gerne weiterentwickeln m&ouml;chtest? Dann buche jetzt Deine ganz pers&ouml;nliche&nbsp;Coaching-Reise.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Die ONSITES Graduate School bietet reflexionsorientierte Coaching-Sitzungen auf Augenh&ouml;he &ndash; <strong>100% individuell&nbsp;&amp; flexibel</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ob<strong> <a href=\"https://graduate.me/de/coaching#individual-coaching\">Einzelcoaching</a></strong><a href=\"https://graduate.me/de/coaching#individual-coaching\"> </a>oder <a href=\"https://graduate.me/de/coaching#group-coaching\"><strong>Gruppencoaching</strong></a>, <strong>online</strong> oder <strong>in Pr&auml;senz</strong>&nbsp;&ndash; wir geben Deinem inneren Kompass die optimale Richtung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Erforsche Dein tief verborgenes Potenzial &amp; &uuml;berschreite die Grenzen Deiner M&ouml;glichkeiten!&nbsp;Weil Du viel gr&ouml;&szlig;er bist als Du denkst!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id=\"test\">\r\n<h2><span style=\"color:#2980b9\"><strong>Darum ist Coaching (D)ein Gamechanger</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Selbstreflexion &amp; Kurswechsel</strong></span>: Coaching ordnet Dein Innenleben: Du reflektierst Deine Verhaltensweisen, identifizierst St&auml;rken und Schw&auml;chen. Gemeinsam mit Deinem Coach l&ouml;st Du Dich von Altem und definierst klare, realistische Ziele f&uuml;r eine erfolgreiche Zukunft.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Neues Selbstbewusstsein</strong></span>: Coaching st&auml;rkt Dein Selbstbild und beseitigt innere Blockaden. &ndash; Hemmende Glaubenss&auml;tze, &Auml;ngste und Selbstzweifel verschwinden. Du sch&ouml;pfst maximalen Mut und die mentale Power, um Dich Deinen Herausforderungen selbstsicher zu stellen.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Erh&ouml;hte Produktivit&auml;t &amp; Leistungsf&auml;higkeit</strong></span>: Mit erh&ouml;hter Selbstkenntnis und geboostetem Selbstvertrauen kannst Du Dein Potenzial endlich frei entfalten. Das Resultat: die Effektivit&auml;t und der Wert Deiner Leistungen steigen exponentiell.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Krisenresistenz</strong></span>: Coaching er&ouml;ffnet differenziertere Sichtweisen und f&ouml;rdert flexibles Handeln. Das ebnet Dir den Weg f&uuml;r einen gelassenen Umgang mit Krisen und Konflikten. Auch gro&szlig;e Krisen bew&auml;ltigst Du besonnen und produktiv.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'starting-text', 'coaching'),
(33, 'Request Now For Free', 'Jetzt kostenlos anfragen', '', '', '', 0, 'button', 'coaching'),
(34, 'Book Publishing Transforms You Into An Expert', 'Buch veröffentlichen & Experte werden', '', '', '', 0, 'heading', 'publishing'),
(35, '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">You want to position yourself as a specialist? Join the the elite club of academic authors! &ndash; With a renowned <a href=\"https://graduate.me/en/book-publishing/services\"><strong>publishing house publication</strong></a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We publish your research work as a monograph &ndash; in <strong>print</strong> or <strong>online</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Discover the world of academic book publishing and secure <strong>exclusive benefits</strong>!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Your Benefits As Academic Author</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Expert Status</strong></span>: With a publication you prove your expertise and draw attention to yourself in scientific circles.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Career Boost</strong></span>: A publication boosts your resume and lays the foundation for your successful academic and professional career.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Prestige</strong></span>: Academic authors enjoy great reputation and prestige in society.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Passive Income</span></strong>: You will receive an author&#39;s fee for each copy sold.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Prize Money</strong></span>: Enter science competitions and win coveted research prizes.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Du m&ouml;chtest Dich als Spezialist positionieren? Wir &ouml;ffnen Dir die T&uuml;ren zum elit&auml;ren Club der Wissenschaftsautoren! &ndash; Mit einer renommierten <a href=\"https://graduate.me/de/buch-veroeffentlichen/verlagsservice\"><strong>Verlagspublikation</strong></a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir publizieren Deine Forschungsarbeit als <strong>Monographie</strong> &ndash; im <strong>Print </strong>oder <strong>online</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Jetzt wissenschaftliches Buch&nbsp;ver&ouml;ffentlichen&nbsp;und <strong>exklusive Vorteile</strong>&nbsp;sichern!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Wissenschaftlicher Autor werden &ndash; Deine Benefits</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Expertenstatus</strong></span>: Mit einer Publikation beweist&nbsp;Du Deine Fachkompetenz&nbsp;und machst in Fachkreisen auf Dich aufmerksam.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Karriereschub</strong></span>: Eine Ver&ouml;ffentlichung boostet Deinen Lebenslauf und legt den Grundstein f&uuml;r Deine erfolgreiche akademische und berufliche Laufbahn.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Prestige</strong></span>: Wissenschaftsautoren genie&szlig;en gro&szlig;es Ansehen und Renommee in der Gesellschaft.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Passives Einkommen</strong></span>: Du erh&auml;ltst ein Autorenhonorar f&uuml;r jedes verkaufte Exemplar.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Preisgeld</strong></span>: Nimm an Wissenschaftswettbewerben teil und gewinne begehrte Forschungspreise.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'publishing'),
(36, 'Request For Free Now', 'Jetzt kostenfrei anfragen', '', '', '', 0, 'button', 'publishing'),
(37, 'Conferences & Workshops Guarantee Effective Networking', 'Konferenzen & Workshops garantieren effektives Networking', '', '', '', 0, 'heading', 'conferences-and-workshops'),
(38, '<p>&nbsp;</p>\r\n\r\n<p>You want to grow your expertise and expand your network? ONSITES Graduate School organizes independently or in collaboration with its <a href=\"https://graduate.me/en/accreditation-partners#start\">partners</a> scientific conferences and workshops - <strong>online &amp; on-site</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Discover our exciting events and secure your place now before it&#39;s too late!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Why You Should Definitely Attend Conferences &amp; Workshops</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Attending an ONSITES Graduate School conference or workshop offers you a wealth of fiery&nbsp;benefits:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Contact Exchange&nbsp;&amp; Networking Hub</strong></span>: You&#39;ll make rewarding contacts with true experts and become part of a community of like-minded people.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>New Perspectives</strong></span>: The wide variety of topics and/or collaborative work allows you to think outside the box to open up new horizons.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Hotbed of Research &amp;&nbsp;Business Ideas</strong></span>: The powerful expertise and direct exchange of ideas with specialists guarantee flashes of inspiration as well as quick results that you can put into effect immediately.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Free&nbsp;Feedback</strong></span>: Conferences&nbsp;&amp; workshops provide the perfect platform for constructive criticism, fruitful technical discussions and getting competent answers to burning questions.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Motivation Boost</strong></span>: The&nbsp;inspiring&nbsp;face-to-face conversations&nbsp;and exciting content break through your daily routine and provide new drive.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>What are you waiting for? Choose an event, register, and participate... <strong>Now</strong>!</p>', '<p>&nbsp;</p>\r\n\r\n<p>Du m&ouml;chtest fachlich &uuml;ber Dich hinauswachsen und Dein Netzwerk expandieren? Die ONSITES Graduate School organisiert eigenst&auml;ndig oder in Zusammenarbeit mit ihren <a href=\"https://graduate.me/de/akkreditierung-und-partner#start\">Partnern </a>wissenschaftliche Konferenzen und Workshops - <strong>online &amp; in Pr&auml;senz</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Entdecke unsere&nbsp;spannenden Events und sichere Dir <strong>jetzt</strong> Deinen Platz, bevor es zu sp&auml;t ist!&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Darum solltest Du an Konferenzen &amp; Workshops teilnehmen</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Teilnahme an einer wissenschaftlichen Konferenz oder einem Workshop der ONSITES Graduate School bietet Dir eine F&uuml;lle an feurigen&nbsp;Vorteilen:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Kontaktb&ouml;rse &amp; Networking-Zentrum</strong></span>: Du kn&uuml;pfst lukrative Kontakte zu Fachkoryph&auml;en und wirst Teil einer Gemeinschaft von Gleichgesinnten.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Neue Perspektiven</strong></span>: Die gro&szlig;e Themenvielfalt sowie das kollaborative Arbeiten erm&ouml;glichen&nbsp;den Blick &uuml;ber den Tellerrand hinaus und er&ouml;ffnen&nbsp;neue Horizonte.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Ideenschmiede f&uuml;r Forschung &amp; Business</strong></span>: Das geballte Fachwissen und der direkte Ideenaustausch mit Experten garantieren geniale Geistesblitze sowie schnelle Ergebnisse, die Du sofort in die Tat umsetzen kannst.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Kostenloses Feedback</strong></span>: Konferenzen &amp; Workshops sind die perfekte Plattform f&uuml;r konstruktive Kritik, fruchtbare Fachdiskussionen und kompetente Antworten auf brennende Fragen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Motivationsboost</strong></span>: Die inspirierenden Face-to-Face-Gespr&auml;che und spannenden Inhalte durchbrechen Deine Alltagsroutine und sorgen f&uuml;r neuen Antrieb.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Worauf wartest Du noch? Jetzt Event ausw&auml;hlen, anmelden &amp; teilnehmen!</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'conferences-and-workshops'),
(39, 'Discover Exciting Events', 'Entdecke spannende Events', '', '', '', 0, 'button', 'conferences-and-workshops'),
(40, 'Discover Exciting Top-Events', 'Entdecke spannende Top-Events', '', '', '', 0, 'heading', 'conference-calendar'),
(41, 'Register', 'Anmelden', '', '', '', 0, 'apply', 'conference-calendar'),
(42, 'Share', 'Teilen', '', '', '', 0, 'share', 'conference-calendar'),
(43, 'I hereby register bindingly for the following conference:', '', '', '', '', 1, 'heading', 'apply-conference'),
(44, 'Firstname', '', '', '', '', 1, 'firstname', 'apply-conference'),
(45, 'Lastname', '', '', '', '', 1, 'lastname', 'apply-conference'),
(46, 'Street', '', '', '', '', 1, 'street', 'apply-conference'),
(47, 'Address', '', '', '', '', 1, 'address', 'apply-conference'),
(48, 'Phone', '', '', '', '', 1, 'phone', 'apply-conference'),
(49, 'E-Mail', '', '', '', '', 1, 'email', 'apply-conference'),
(50, 'Herewith I agree with the general terms and conditions.', '', '', '', '', 1, 'agree', 'apply-conference'),
(51, 'Submit', '', '', '', '', 0, 'save-button', 'apply-conference'),
(52, 'Study Online 100%: Here&rsquo;s How Your Smart Studies Work', '100% online studieren: So läuft Dein Studium ab', '', '', '', 0, 'heading', 'digital-studies'),
(53, '<p>&nbsp;</p>\r\n\r\n<p>Study how, where and when you want: Dive into smart studies with a <strong>3-fold benefit factor</strong>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Free time management</span></strong></li>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Study in your home environment </span></strong></li>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Individual support</span></strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Online learning &ndash; that&#39;s studying in harmony with your job, family and free time. For complete comfort.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>You&rsquo;re Calling The Shots</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pretty smart, ey? Your studies adapt <strong>flexibly </strong>to your schedule. The <strong>modular structure</strong> of our programs gives you the freedom to set your own working and exam times.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Learn at your own pace &ndash; day or night, on vacation, on the road, on weekends or holidays.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Need more study time? No problem. <strong>Extend</strong> your studies by <strong>half a year</strong> &ndash; <strong>100% free of charge</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Smart Studies Without Compromise</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is what awaits you in your smart studies:</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Studiere wie, wo und wann Du willst: Tauche ein in ein Online-Studium mit <strong>3-fach-Vorteilsfaktor</strong>:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Freie Zeiteinteilung</span></strong></li>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Studieren&nbsp;im heimischen Umfeld</span></strong></li>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Individuelle Betreuung</span></strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Online studieren &ndash; das ist Studieren im Einklang mit Beruf, Familie &amp; Freizeit. Damit Du Dich rundum wohlf&uuml;hlst.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Du entscheidest, wo&rsquo;s langgeht</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ganz sch&ouml;n selbstbestimmt: das Studium passt sich <strong>flexibel</strong> Deinem Zeitplan an. Die <strong>modulare Struktur</strong> unserer Programme gibt Dir die Freiheit, Arbeits- und Pr&uuml;fungszeiten in Eigenregie festzulegen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lerne nach Lust und Laune &ndash; Tag oder Nacht, im Urlaub, unterwegs, an Wochenenden oder Feiertagen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du brauchst mehr Studienzeit? Kein Problem. <strong>Verl&auml;ngere</strong> Dein Studium um ein <strong>halbes Jahr</strong> &ndash; <strong>100% kostenlos</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Online studieren ohne Kompromisse</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Das erwartet Dich in Deinem Online-Studium:</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'digital-studies'),
(54, 'Degree Shortcut: Recognition Of Prior Learning', 'Studium verkürzen: Anrechnung von Vorleistungen', 'dd', 'dd', 'dd', 0, 'heading', 'recognition'),
(55, '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Do you have any prior learning achievements from previous studies or further education? Excellent. Take a degree shortcut.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Discover your personal recognition of prior learning options!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Your Recognition Benefits</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Reduce your learning effort</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Save study time</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>No need to make up module exams</strong></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Blanket Recognition &amp; Individual Recognition &ndash; What&rsquo;s Eligible?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our Recognition of Prior Learning transpires in two ways: blanket and individual. Learn the difference below:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Blanket</strong></span>: apply to <em><u>non-academic prior learning</u></em> such as vocational training, advanced training and continuing education (state-certified business economist, business administrator, Chamber of Industry and Commerce degrees, etc.). Secure recognition of up to <strong>90</strong>&nbsp;<strong>credits</strong>!</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Individual</span></strong>: Individual recognition refers to <u><em>academic prior learning</em></u>, provided that you have achieved this at state or state-recognized institutions of higher education. Benefit from <strong>unlimited</strong> recognition.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>Recognition of Prior Learning In 3 Steps</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Here&rsquo;s how simply it works:</p>', '<p>&nbsp;</p>\r\n\r\n<p>Du hast bereits Leistungen in einem fr&uuml;heren Studium erbracht oder eine Weiterbildung absolviert? Dann kannst Du jetzt Dein Studium verk&uuml;rzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Entdecke Deine pers&ouml;nlichen Anrechnungsm&ouml;glichkeiten!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Deine Vorteile unserer Anrechnung</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Du reduzierst Deinen&nbsp;Lernaufwand</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Du sparst Studienzeit</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Du brauchst keine Modulpr&uuml;fungen nachholen</strong></span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Pauschale &amp; individuelle Anrechnung &ndash; was kommt in Frage?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir rechnen Vorleistungen auf zwei Arten an: pauschal und individuell. Hier erf&auml;hrst Du den Unterschied:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Pauschal</strong></span>: Pauschale Anrechnungen betreffen <em><u>nicht-akademische Vorleistungen</u></em> wie Berufsausbildungen, Fortbildungen und Weiterbildungen (Staatlich gepr&uuml;fter Betriebswirt, Fachwirt, IHK-Abschl&uuml;sse etc.). Sichere Dir eine Anerkennung von bis zu <strong>90 Credits</strong>!</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Individuell</strong></span>: Individuelle Anrechnungen beziehen sich auf <u><em>akademische Vorleistungen</em></u>, sofern Du diese an staatlichen oder staatlich anerkannten Hochschulen erbracht hast. Profitiere von einer <strong>unbegrenzten</strong> Anerkennung.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>Studium verk&uuml;rzen in nur 3 Schritten</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So einfach geht&rsquo;s:</p>', '<p>dd</p>', '<p>dd</p>', '<p>dd</p>', 1, 'text', 'recognition'),
(56, '<p>1. Submit previous diplomas and transcripts by e-mail without obligation</p>', '<p>dd</p>', 'dd', 'dd', 'dd', 1, 'first-image-heading', 'recognition'),
(57, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus porta quam, ac faucibus velit sodales ut.</p>', '<p>dd</p>', 'dd', 'dd', 'dd', 1, 'first-image-text', 'recognition'),
(58, '<p><span style=\"color:#d35400\"><span style=\"font-size:22px\"><strong>1.</strong></span></span><span style=\"color:#2980b9\"><span style=\"font-size:22px\"><strong> Request Free Advice</strong></span></span></p>', '<p><span style=\"color:#d35400\"><span style=\"font-size:22px\"><strong>1.</strong></span></span><span style=\"color:#2980b9\"><span style=\"font-size:22px\"><strong> Beratung anfordern</strong></span></span></p>', 'dd', 'dd', 'd', 1, 'second-image-heading', 'recognition'),
(59, '<p>Hit the <a href=\"https://graduate.me/en/student-assistance-team\">&quot;Get Free Advice Now&quot;</a> button below and get personalized advice by email or telephone.</p>', '<p>Klicke unten auf <a href=\"https://graduate.me/de/studienberatung\">&bdquo;Jetzt kostenlos beraten lassen&rdquo;</a> und sichere Dir eine individuelle schriftliche oder telefonische Beratung.</p>', 'dd', 'dd', 'dd', 1, 'second-image-text', 'recognition'),
(60, '<p><span style=\"font-size:22px\"><strong><span style=\"color:#d35400\">2.</span> <span style=\"color:#2980b9\">Send Documents</span></strong></span></p>', '<p><span style=\"font-size:22px\"><strong><span style=\"color:#d35400\">2.</span> <span style=\"color:#2980b9\">Dokumente zusenden</span></strong></span></p>', 'dd', 'dd', 'dd', 1, 'third-image-heading', 'recognition'),
(61, '<p>Please email us your transcripts or graduation certificate and diploma as a PDF scan.</p>', '<p>Bitte sende uns Deine Transkripte bzw. Abschlussurkunde und Dein Zeugnis als PDF-Scan per E-Mail zu.</p>', 'dd', 'dd', 'dd', 1, 'third-image-text', 'recognition'),
(62, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus porta quam, ac faucibus velit sodales ut.</p>', '<p>dd</p>', 'dd', 'dd', 'dd', 1, 'fourth-image-heading', 'recognition'),
(63, '<p>1. Submit previous diplomas and transcripts by e-mail without obligation</p>', '<p>dd</p>', 'ddd', 'dd', 'dd', 1, 'fourth-image-text', 'recognition'),
(64, 'Your Reliable Partner For A Career-fit Future', 'Dein verlässlicher Partner für eine sichere Karrierezukunft', '', '', '', 0, 'heading', 'about'),
(65, '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Unfasten your future skills with us: ONSITES Graduate School expands your professional potential with future-oriented study and further education programs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is guaranteed by our quality features:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Practice-focused education</span></strong></li>\r\n	<li><strong><span style=\"color:#2980b9\">In-depth personal support</span></strong></li>\r\n	<li><strong><span style=\"color:#2980b9\">Comprehensive career services</span></strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We form self-reliant, self-thinking individuals in harmony with our educational mission.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Our Mission: Thinking Ahead For The Future</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As a socially responsible educational institution, we see our mission as effectively <strong>countering</strong> the ongoing <strong>shortage of qualified specialists</strong> with innovative, application-oriented study content.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>That&#39;s why we equip our students with a broad arsenal of <strong>cross-industry skills</strong> to systematically prepare them for the diverse challenges of global social and technological change.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our <strong>diverse range of programs</strong> specifically covers areas in which the demand for highly qualified employees remains high:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Security</strong></span>: We educate IT security experts to confidently defend against devastating cyber attacks on Critical Infrastructure.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Digitization</span></strong>: We provide a solid academic foundation for in-demand digitization professions that continue to drive the industry&#39;s digital transformation &ndash; from SEO specialists to digital product managers.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Health</span></strong>: We are responding to the increased professional demands in the health sector with contemporary continuing education programs for health managers and public health experts.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This way, we reach two goals at once: On the one hand, our modern study program portfolio enables your professional and personal development.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>On the other hand, we are also making our own sociopolitical contribution to successful social change and social participation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Who Can Study At ONSITES Graduate School?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Professional graduates, working professionals, first-degree and second-degree graduates: welcome are all those who want to maximize their professional potential &ndash; at their own pace, alongside their job &amp; in harmony with family, work and me time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We empower career-minded professionals and executives to maximize their professional opportunities through <strong>100% digital</strong> academic education or training.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Mit uns entfesselst Du Deine Future Skills: Die ONSITES Graduate School expandiert Dein berufliches Potential mit zukunftsorientierten Studien- und Weiterbildungsangeboten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Das garantieren unsere Qualit&auml;tsmerkmale:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Praxisfokussierte Lehre</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Intensiver pers&ouml;nlicher Support</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Umfassender Karriere-Service</strong></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir formen eigenverantwortliche, selbstdenkende Pers&ouml;nlichkeiten im harmonischen Einklang mit unserem Bildungsauftrag.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Unsere Mission: Zukunftssicher vorausdenken</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Als gesellschaftlich verantwortliche Bildungseinrichtung sehen wir unsere Mission darin, dem anhaltenden <strong>Mangel an qualifizierten Fachkr&auml;ften</strong> mit innovativen, anwendungsorientierten Studieninhalten wirkungsvoll <strong>entgegenzutreten</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Darum r&uuml;sten wir unsere Studierenden mit einem breiten Arsenal an <strong>branchen&uuml;bergreifenden F&auml;higkeiten</strong>, um sie auf die diversen Herausforderungen der globalen gesellschaftlichen und technologischen Ver&auml;nderungen systematisch vorzubereiten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unser <strong>vielf&auml;ltiges Studienangebot</strong> deckt gezielt Bereiche ab, in denen der Bedarf an hochqualifizierten Mitarbeitern ungebrochen hoch ist:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Sicherheit</span></strong>: Wir bilden IT-Sicherheitsexperten aus, die verheerende Cyber-Angriffe auf die Kritische Infrastruktur souver&auml;n abwehren k&ouml;nnen.</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Digitalisierung</strong></span>: Wir vermitteln eine solide akademische Basis f&uuml;r gefragte Digitalisierungsberufe, welche die digitale Transformation der Industrie weiter vorantreiben &ndash; vom SEO-Spezialisten bis zum digitalen Produktmanager.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Gesundheit</span></strong>: Wir reagieren auf die erh&ouml;hten beruflichen Anforderungen im Gesundheitssektor mit zeitgem&auml;&szlig;en Weiterbildungsprogrammen f&uuml;r Gesundheitsmanager und Public-Health-Experten.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So schlagen wir zwei Fliegen mit einer Klappe: Mit unserem modernen Studiengangportfolio erm&ouml;glichen wir einerseits Deine berufliche und pers&ouml;nliche Weiterentwicklung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Andererseits leisten wir damit zugleich unseren eigenen sozialpolitischen Beitrag zu einem gelungenen gesellschaftlichen Wandel und erfolgreicher gesellschaftlicher Teilhabe.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Wer kann an der ONSITES Graduate School studieren?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berufsabsolventen, Berufst&auml;tige, Absolventen eines Erst- oder Zweitstudiums: Willkommen sind alle, die ihr berufliches Potential maximal aussch&ouml;pfen wollen &ndash; im eigenen Tempo, neben dem Job &amp; im Einklang mit Familie, Beruf und Freizeit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir f&ouml;rdern karrierebewusste Fach- und F&uuml;hrungskr&auml;fte bei der Aussch&ouml;pfung ihrer beruflichen M&ouml;glichkeiten durch eine <strong>100% digitale</strong> akademische Aus- oder Weiterbildung.</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'about'),
(66, 'Discover Top Tips & Trends About Your Studies & Career', 'Entdecke Top Tipps & Trends zu Studium & Karriere', '', '', '', 0, 'heading', 'blog'),
(67, 'Page Heading', '', '', '', '', 0, 'heading', 'partners'),
(68, 'Page Content', '', '', '', '', 0, 'text', 'partners'),
(69, 'Meet Our Distinguished Lecturers', 'Unsere dynamischen Dozenten stellen sich Dir vor', '', '', '', 0, 'heading', 'academics'),
(70, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>The Right Team For Your Career</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Experience combined expertise power from academia and business: the lecturers at ONSITES Graduate School are at the cutting edge of their field.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks to their close ties to the business sector, they provide you with the latest knowledge and insights. For only someone who has already put theory successfully into practice is qualified to teach you not only technical <strong><em>know-how</em></strong> but also practical <strong><em>do-how</em></strong> properly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Equipped with proper methodological and didactic skills, our strong team of lecturers guarantees a practical exchange of experience and knowledge transfer at a <em><strong>high-quality level of&nbsp;teaching</strong></em>. Together they work towards a common goal &ndash; to unlock your academic and professional potential.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>This Is What Distinguishes Our Lecturers</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\">Well-grounded qualification</span></li>\r\n	<li><span style=\"color:#2980b9\">Many years of practical experience</span></li>\r\n	<li><span style=\"color:#2980b9\">Reliability</span></li>\r\n	<li><span style=\"color:#2980b9\">Friendly interaction with students</span></li>\r\n	<li><span style=\"color:#2980b9\">Sense of responsibility</span></li>\r\n	<li><span style=\"color:#2980b9\">Teaching with desire &amp; passion</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Curious yet? Get to know our lecturers with just one click.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Das richtige Team f&uuml;r Deine Karriere</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Erlebe geballte&nbsp;Expertisepower aus Wissenschaft und Wirtschaft: die Dozierenden der ONSITES Graduate School sind fachlich auf dem neuesten Stand.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dank des engen Bezugs zur Wirtschaft versorgen sie Dich mit aktuellsten Kenntnissen und Einsichten aus der Praxis. Denn nur, wer die Theorie auch schon in der Praxis erfolgreich angewandt hat, kann Dir neben technischem <strong><em>Know-how</em></strong> auch das praktische <strong><em>Do-how</em></strong> qualifiziert vermitteln.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ausgestattet mit methodisch-didaktischen Kompetenzen, garantiert unser starkes Dozenten-Team praxisrelevanten Erfahrungsaustausch und Wissenstransfer auf <strong><em>hochwertigem Lehrniveau</em></strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Das zeichnet unsere Dozenten aus</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\">Fundierte Qualifikation</span></li>\r\n	<li><span style=\"color:#2980b9\">Langj&auml;hrige Praxiserfahrung</span></li>\r\n	<li><span style=\"color:#2980b9\">Zuverl&auml;ssigkeit</span></li>\r\n	<li><span style=\"color:#2980b9\">Freundlicher Umgang mit Studierenden</span></li>\r\n	<li><span style=\"color:#2980b9\">Verantwortungsbewusstsein</span></li>\r\n	<li><span style=\"color:#2980b9\">Lehren mit Lust &amp; Leidenschaft</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Neugierig geworden? Mit nur einem Klick lernst Du unsere Dozenten n&auml;her kennen.</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'content', 'academics'),
(71, 'Your Flexible Student Finance Options', 'Studium finanzieren auf flexible Art', '', '', '', 0, 'heading', 'study-financing');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(72, '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Studying pays off. Your benefits are numerous: diverse career prospects, better salary opportunities, a broad qualification &amp; much more. But investing in higher education is also a monetary matter.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Are you looking for ways to finance your studies? Discover your flexible student finance options!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Tuition tax deduction</strong></span>: Are you subject to income tax? Then you can deduct a portion of your tuition costs for tax purposes &ndash; as special expenses (first education) or income-related expenses (second education).</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Stretch financing with installments</span></strong>: Finding yourself in dire straits? ONSITES Graduate School can help you out. Benefit from adjusted installment payments in justified exceptional cases.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Take semester off for free</strong></span>: In case of emergency, you can apply for 1-2 semesters of leave and suspend your tuition &ndash; 100% free of charge.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Need an additional financial boost? Alleviate your financial burden with an individual promotion.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Leve</strong><strong>raging Your Education: Which Funding Fits You?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuition fees, rent, living expenses, learning materials &ndash; studying can be expensive, especially for students with little or no income.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With the right financing concept, your education will be on a secure footing! We show you the most popular funding options.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">1.</span> <span style=\"color:#2980b9\">Scholarships: Debt-Free Student Finance</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The good news in advance: scholarships are <strong>not only awarded to highly gifted students</strong>! Social commitment, denomination, the subject of study, your economic situation and your personal career are further possible selection criteria. The decisive factor is the respective scholarship program.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whether as a <strong>one-time payment</strong> or as a <strong>monthly grant</strong>: a scholarship is always a welcome financial injection. The best thing about it: You <strong>don&#39;t have to pay back</strong> your scholarship! Depending on the program, the funding ranges from <strong>100 to over 1000 euros</strong> per month.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From foundations and funding organizations to companies &ndash; with <strong>2300+ scholarship providers</strong> in Germany, you are sure to find what you are looking for.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And your <strong>chances</strong> are not bad: Most students have never applied for a scholarship. As a result, some scholarships are <strong>often not awarded</strong> due to a lack of applicants!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So, try your luck and find your suitable scholarship now on relevant <strong>platforms </strong>such as <em>Deutschlandstipendium</em>, <em>DAAD</em> and <em>myStipendium</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">2.</span> <span style=\"color:#2980b9\">Loans &amp; Credits Create More Flexibility</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Experiencing financial bottlenecks in the final phase of your studies? A loan or student credit can save you from dropping out.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Caution</strong> is advised, though: Keep in mind that you have to <strong>repay</strong> loans and credits <strong>in full </strong>later. Smart advance planning is therefore everything.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Special tip</strong>: Use loans &amp; credits as a last option among other financing options.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your options:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Private Loans</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Credit institutions such as banks or savings banks as well as associations offer private student loans or credits. The loans vary in terms of their conditions. Watch out for unfavorable clauses in the contract and check carefully whether state subsidies can help you better.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Government Loans </strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>KfW student loan</em></span>: <em>KfW</em> finances the entire study program with <strong>100 to 650 euros</strong> per month. The interest costs are offset directly against the disbursement amount. Excluded are: Study abroad programs &amp; study programs at educational academies.</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>Education loan from the German government</em></span>: The most popular bridging loan: <strong>After 2 years</strong> of study, you receive <strong>up to 300 euros</strong> per month for a maximum of <strong>2 years</strong> at a variable interest rate.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Interest-free Loans</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As the name suggests, interest-free loans are not linked to an interest rate. The special feature: the number of recipients per year is limited to <strong>hardship cases</strong> (particularly needy).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>E.W. Kuhlmann Foundation</em></span>: Supports needy students in the graduation phase with <strong>up to 2000 euros</strong> for 5 years.</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>Hildegardis Association</em></span>: Single mothers and refugee women of Christian denomination can receive funding of <strong>up to 10,000 euros</strong> in the final phase.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Very important</strong>: Check and compare the conditions of your offers (interest, loan amount, repayment period, individual criteria). Be sure to get advice from an independent person!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">3.</span> <span style=\"color:#2980b9\">Education Fund: Repayment After Graduation</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Education funds are special loans for students. Students selected via a selection process are funded with investor money.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The advantage: a <strong>monthly income-dependent repayment </strong>of <strong>2-10%</strong> after completion. For low-income earners, repayment may be paused or even eliminated.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The disadvantage: as a top earner, you may pay more than with other student loans.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Particularly interesting for <strong><a href=\"https://graduate.me/en/master-degree/llm\">LL.M</a> students </strong>from the euro region: <strong><em>BrainCapital</em>&#39;s education fund finances</strong> the major part of your <strong>tuition fees </strong>&ndash; also for programs abroad.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">4.</span> <span style=\"color:#2980b9\">Financial Support From Employer</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>More and more employers are co-funding part-time study or distance learning for their employees.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Convince Your Employer With These Benefits</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Combating the shortage of skilled workers through specialized know-how</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Motivation &amp; reputation boost</strong></span></li>\r\n	<li><span style=\"color:#2980b9\"><strong>Increased productivity</strong></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>There are different <strong>approaches</strong> to financial support:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Your employer <strong>pays</strong> a percentage of your <strong>tuition fees</strong></li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Your employer contributes to the <strong>cost of learning materials</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Your employer will pay you a <strong>success bonus</strong> for each year of study if you successfully pass the final exam</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">You <strong>give up</strong> part of your <strong>(gross) salary</strong> and receive an <strong>allowance</strong> from your employer.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Potential conditions:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Commitment to the company for another 2-3 years after graduation</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Repayment of the grant in the event of discontinuation of studies</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Fast and successful completion of studies</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Questions about student finance? We will be happy to advise you personally.</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Studieren lohnt sich. Deine Vorteile sind zahlreich: vielf&auml;ltige Karriereaussichten, bessere Gehaltschancen, eine breite Qualifikation &amp; vieles mehr. Doch eine Investition in Hochschulbildung ist auch eine Geldfrage.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du suchst nach Mitteln und Wegen, um Dir Dein Studium finanzieren zu k&ouml;nnen? Entdecke Deine flexiblen Finanzierungsoptionen!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Studiengeb&uuml;hren steuerlich absetzen</strong></span>: Du bist einkommenssteuerpflichtig? Dann kannst Du einen Teil Deiner Studienkosten steuerlich absetzen &ndash; als Sonderausgaben (Erstausbildung) oder Werbungskosten (Zweitausbildung).</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Finanzierung strecken mit Raten</span></strong>: Du befindest Dich in einer finanziellen Notlage? Die ONSITES Graduate School hilft Dir heraus. Profitiere von individuell angepassten Ratenzahlungen in begr&uuml;ndeten Ausnahmef&auml;llen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Semester kostenlos aussetzen</span></strong>: In Notf&auml;llen kannst Du 1-2 Urlaubssemester beantragen und die Studiengeb&uuml;hren aussetzen &ndash; 100% kostenfrei.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Zus&auml;tzlicher Finanzboost ben&ouml;tigt? Lindere Deine Finanzlast mit einer individuellen F&ouml;rderung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><br />\r\n<span style=\"color:#2980b9\"><strong>Bildung mit Hebelwirkung: Welche F&ouml;rderung passt zu Dir?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studiengeb&uuml;hren, Miete, Lebenshaltung, Lernmaterialien &ndash; besonders Studierenden ohne oder mit geringem Einkommen kann ein Studium buchst&auml;blich teuer zu stehen kommen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mit dem richtigen Finanzierungskonzept steht Deine Bildung auf sicheren Beinen! Wir zeigen Dir die beliebtesten F&ouml;rderungsoptionen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#d35400\"><strong>1.</strong></span> <span style=\"color:#2980b9\"><strong>Stipendien: Studium finanzieren ohne Schulden</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die gute Nachricht vorab: Stipendien werden <strong>nicht nur an Hochbegabte</strong> vergeben! Soziales Engagement, Konfession, das Studienfach, Deine wirtschaftliche Situation und Dein pers&ouml;nlicher Werdegang sind weitere m&ouml;gliche Auswahlkriterien. Entscheidend ist das jeweilige Stipendienprogramm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ob als <strong>Einmalzahlung</strong> oder als <strong>monatlicher Zuschuss</strong>: ein Stipendium ist immer eine willkommene Finanzspritze. Denn das Beste daran: Du musst Dein Stipendium <strong>nicht zur&uuml;ckzahlen</strong>! Je nach Programm reicht die F&ouml;rderung von <strong>100 bis &uuml;ber 1000 Euro</strong> im Monat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Von Stiftungen und F&ouml;rderwerken bis zu Unternehmen &ndash; mit &uuml;ber <strong>2300 Stipendiengebern</strong> in Deutschland wirst Du sicher f&uuml;ndig.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Und Deine <strong>Chancen</strong> stehen nicht schlecht: Die meisten Studierenden haben noch nie ein Stipendium beantragt. Die Folge: Einige Stipendien werden aus Bewerbermangel <strong>oft nicht vergeben</strong>!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Also, versuche Dein Gl&uuml;ck und finde jetzt Dein passendes Stipendium auf einschl&auml;gigen <strong>Plattformen</strong> wie <em>Deutschlandstipendium</em>, <em>DAAD</em> und <em>myStipendium</em>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">2.</span> <span style=\"color:#2980b9\">Darlehen &amp; Kredite schaffen mehr Flexibilit&auml;t</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Finanzielle Engp&auml;sse in der Abschlussphase? Ein Darlehen oder Studentenkredit kann Dich vor einem Studienabbruch bewahren.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Doch <strong>Vorsicht</strong>: Du musst Darlehen und Kredite sp&auml;ter <strong>vollst&auml;ndig zur&uuml;ckzahlen</strong>. Kluge Vorab-Planung ist daher alles.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Spezialtipp</strong>: Nutze Darlehen &amp; Kredite als letzte Option neben anderen Finanzierungsoptionen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Deine Optionen:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Private Kredite</strong></span></p>\r\n\r\n<p>Sowohl Kreditinstitute wie Banken oder Sparkassen als auch Vereine bieten privatwirtschaftliche Studienkredite bzw. Darlehen an. Die Kredite variieren hinsichtlich ihrer Konditionen. Achte auf ung&uuml;nstige Vertragsklauseln und pr&uuml;fe genau, ob Dir staatliche F&ouml;rderungen nicht besser weiterhelfen k&ouml;nnen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Staatliche Kredite</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>KfW-Studienkredit</em></span>: die KfW finanziert das <strong>gesamte Studium</strong> mit monatlich <strong>100 bis 650 Euro</strong>. Die Zinskosten werden direkt mit dem Auszahlungsbetrag verrechnet. Ausgenommen sind: Auslandsstudieng&auml;nge &amp; Studieng&auml;nge an Bildungsakademien.</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>Bildungskredit der Bundesregierung</em></span>: Der popul&auml;rste &Uuml;berbr&uuml;ckungskredit: <strong>Nach 2 Jahren</strong> Studium erh&auml;ltst Du monatlich <strong>bis zu 300 Euro f&uuml;r maximal 2 Jahre </strong>bei variablem Zinssatz.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Zinslose Darlehen</strong></span></p>\r\n\r\n<p>Wie der Name schon sagt, sind zinslose Darlehen nicht an einen Zins gekoppelt. Die Besonderheit: die <strong>Anzahl </strong>der Empf&auml;nger ist pro Jahr<strong> begrenzt</strong>, und zwar auf <strong>H&auml;rtef&auml;lle</strong> (besonders Bed&uuml;rftige).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>E.W. Kuhlmann-Stiftung</em></span>: Unterst&uuml;tzt werden bed&uuml;rftige Studierende in der Abschlussphase mit <strong>bis zu 2000 Euro</strong> f&uuml;r 5 Jahre.</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><em>Hildegardis-Verein</em></span>: Alleinerziehende M&uuml;tter und gefl&uuml;chtete Frauen mit christlicher Konfession k&ouml;nnen in der Abschlussphase eine F&ouml;rderung von <strong>bis zu 10.000 Euro</strong> erhalten.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ganz wichtig</strong>: Pr&uuml;fe und vergleiche die Konditionen Deiner Angebote (Zinsen, Kreditbetrag, R&uuml;ckzahlungsdauer, Einzelkriterien). Lass Dich unbedingt von einer unabh&auml;ngigen Person beraten!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">3.</span> <span style=\"color:#2980b9\">Bildungsfonds: R&uuml;ckzahlung nach Abschluss</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bildungsfonds sind spezielle Kredite f&uuml;r Studierende. Gef&ouml;rdert werden per Auswahlverfahren selektierte Studierende mit Investorengeldern.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der Vorteil: eine monatliche <strong>einkommensabh&auml;ngige R&uuml;ckzahlung</strong> in H&ouml;he von <strong>2-10%</strong> nach Abschluss. Bei Geringverdienern kann die R&uuml;ckzahlung pausieren oder sogar ganz entfallen.</p>\r\n\r\n<p>Der Nachteil: Als Top-Verdiener zahlst Du unter Umst&auml;nden mehr als bei anderen Studienkrediten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Besonders interessant f&uuml;r <strong><a href=\"https://graduate.me/de/master/llm\">LL.M</a>-Studierende</strong> aus dem Euro-Raum: Der Bildungsfonds von <strong><em>BrainCapital</em> finanziert </strong>den wesentlichen Teil Deiner <strong>Studiengeb&uuml;hren</strong> &ndash; auch f&uuml;r Programme im Ausland.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong><span style=\"color:#d35400\">4.</span> <span style=\"color:#2980b9\">Finanzielle F&ouml;rderung durch den Arbeitgeber</span></strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Immer mehr Arbeitgeber f&ouml;rdern ein berufsbegleitendes Studium bzw. Fernstudium ihrer Mitarbeiter.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Uuml;berzeuge Deinen Arbeitgeber mit diesen&nbsp;Vorteilen:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Bek&auml;mpfung des Fachkr&auml;ftemangels durch spezialisiertes Know-how</strong></span></li>\r\n	<li><strong><span style=\"color:#2980b9\">Motivations- &amp; Reputationsboost</span></strong></li>\r\n	<li><strong><span style=\"color:#2980b9\">Erh&ouml;hte Produktivit&auml;t</span></strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Es gibt verschiedene <strong>Ans&auml;tze</strong> der finanziellen F&ouml;rderung:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Dein&nbsp;Arbeitgeber <strong>&uuml;bernimmt</strong> einen prozentualen <strong>Teil Deiner Studiengeb&uuml;hren</strong></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Dein&nbsp;Arbeitgeber beteiligt sich an den <strong>Kosten f&uuml;r Lernmaterialien</strong></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Dein&nbsp;Arbeitgeber zahlt Dir bei erfolgreicher Abschlusspr&uuml;fung eine <strong>Erfolgspr&auml;mie</strong> f&uuml;r jedes Studienjahr</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Du <strong>verzichtest</strong> auf einen Teil Deines <strong>(Brutto-)Gehalts</strong> und erh&auml;ltst einen <strong>Zuschuss </strong>durch Deinen Arbeitgeber.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>M&ouml;gliche Bedingungen:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Bindung an das Unternehmen f&uuml;r weitere 2-3 Jahre nach Abschluss</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">R&uuml;ckzahlung des Zuschusses bei Studienabbruch</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Schneller und erfolgreicher Studienabschluss</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fragen zur Finanzierung Deines Studiums? Wir beraten Dich gerne pers&ouml;nlich.</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'study-financing'),
(73, '<p>By clicking on the button, you agree to the use of cookies described here by the platform graduate.me. At this point you can also object to the use of cookies or revoke your consent. Cookies are used to analyze your use of our websites and to personalize our services. Web cookies from third-party providers also give you personalized advertising, even if you no longer access our website. The storage period for cookies is 90 days.</p>', '<p>Durch Anklicken des Buttons stimmen Sie der hier beschriebenen Verwendung von Cookies durch die Plattform graduate.me&nbsp;zu. Sie k&ouml;nnen an dieser Stelle auch der Verwendung von Cookies widersprechen oder Ihre Einwilligung widerrufen. Cookies werden verwendet, um Ihre Nutzung unserer Webseiten zu analysieren und um unsere Dienste zu personalisieren. Web-Cookies von Drittanbietern erm&ouml;glichen Ihnen zudem personalisierte Werbung, auch wenn Sie unsere Website nicht mehr aufrufen. Die Speicherdauer f&uuml;r Cookies betr&auml;gt 90 Tage.</p>', '', '', '', 1, 'cookies-description', 'modals'),
(74, '<p>Accept and Continue</p>', '<p>Akzeptieren und weiter</p>', '', '', '', 1, 'cookies-accept-button', 'modals'),
(75, '<p>Cookie Settings</p>', '<p>Cookie-Einstellungen</p>', '', '', '', 1, 'cookies-custom-button', 'modals'),
(76, '<p>In order to provide various features on our website, better evaluate activities on our website, and always present to you suitable offers, we use cookies. Decide for yourself which cookies you would like to allow. By moving the respective cookie bar to blue and clicking on &ldquo;Save settings&ldquo;, you activate the corresponding cookie and agree that the cookie in question may be placed. You can reverse this on this page at any time.</p>', '<p>Um Ihnen verschiedene Funktionen auf unserer Website zur Verf&uuml;gung zu stellen, Aktivit&auml;ten auf unserer Website besser auszuwerten und Ihnen stets passende Angebote zu pr&auml;sentieren, verwenden wir Cookies. Entscheiden Sie selbst, welche Cookies Sie zulassen m&ouml;chten. Indem Sie den jeweiligen Cookie-Balken auf blau stellen und auf <span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">&bdquo;</span></span>Einstellungen speichern&quot; klicken, aktivieren Sie das entsprechende Cookie und stimmen zu, dass das betreffende Cookie gesetzt werden darf. Sie k&ouml;nnen dies auf dieser Seite jederzeit r&uuml;ckg&auml;ngig machen.</p>', '', '', '', 1, 'settings-heading', 'modals'),
(77, '<p>Required Cookies</p>', '<p>Erforderliche Cookies</p>', '', '', '', 1, 'required-cookies', 'modals'),
(78, '<p>Language Conversion</p>', '<p>Sprachumstellung</p>', '', '', '', 1, 'lang-conversion', 'modals'),
(79, '<p>To ensure that you can use our website in other languages as well.</p>', '<p>Um sicherzustellen, dass Sie unsere Website auch in anderen Sprachen nutzen k&ouml;nnen.</p>', '', '', '', 1, 'required-cookies-info', 'modals'),
(80, '<p>Functional Cookies</p>', '<p>Funktionale Cookies</p>', '', '', '', 1, 'functional-cookies', 'modals'),
(81, '<p>YouTube</p>', '<p>YouTube</p>', '', '', '', 1, 'youtube', 'modals'),
(82, '<p>In order to show you videos on our portal, we use YouTube.</p>', '<p>Um Ihnen Videos auf unserem Portal zeigen zu k&ouml;nnen, nutzen wir YouTube.</p>', '', '', '', 1, 'youtube-info', 'modals'),
(83, '<p>Landbot</p>', '<p>Landbot</p>', '', '', '', 1, 'landbot', 'modals'),
(84, '<p>To improve the user experience, we make use of the tool Landbot.</p>', '<p>Um die Nutzererfahrung zu verbessern, verwenden wir das Tool Landbot.</p>', '', '', '', 1, 'landbot-info', 'modals'),
(85, 'Google Maps', '<p>Google Maps', '', '', '', 1, 'google-maps', 'modals'),
(86, 'In order for us to display the locations of stakeholders appearing on our portal, we use Google Maps.', 'Damit wir die Standorte der auf unserem Portal erscheinenden Stakeholder anzeigen k&ouml;nnen, verwenden wir Google Maps.', '', '', '', 1, 'google-maps-info', 'modals'),
(87, '<p>Tracking &amp;&nbsp;Marketing Cookies</p>', '<p>Tracking- &amp; Marketing-Cookies</p>', '', '', '', 1, 'tracking', 'modals'),
(88, '<p>Google Ads</p>', '<p>Google Ads</p>', '', '', '', 1, 'google-ads', 'modals'),
(89, '<p>Facebook</p>', '<p>Facebook</p>', '', '', '', 1, 'facebook', 'modals'),
(90, '<p>Google Analytics</p>', '<p>Google Analytics</p>', '', '', '', 1, 'google-analitics', 'modals'),
(91, '<p>Anonymized data relating to the use of the website is analyzed in order to further improve the offer on the website.</p>', '<p>Anonymisierte Daten &uuml;ber die Nutzung der Website werden ausgewertet, um das Angebot auf der Website weiter zu verbessern.</p>', '', '', '', 1, 'tracking-cookies-info', 'modals'),
(92, '<p>Back To Description</p>', '<p>Zur&uuml;ck zur Beschreibung</p>', '', '', '', 1, 'back-to-description', 'modals'),
(93, '<p>Save Custom Settings</p>', '<p>Benutzerdefinierte Einstellungen speichern</p>', '', '', '', 1, 'save-all', 'modals'),
(94, '<p>Accept All Cookies</p>', '<p>Alle Cookies akzeptieren</p>', '', '', '', 1, 'accept-all', 'modals'),
(95, '<p>Get In Touch</p>', '<p>Kontakt</p>', '', '', '', 1, 'get-in-touch', 'modals'),
(96, '<p>123 Mockup St., Varna</p>', '<p>ffff</p>', '', '', '', 1, 'address', 'modals'),
(97, '<p>(+1) 123 456 7890</p>', '<p>(+1) 123 456 7890</p>', '', '', '', 1, 'phone', 'modals'),
(98, '<p>hello@collegiumexcellentia.com</p>', '<p>hello@collegiumexcellentia.com</p>', '', '', '', 1, 'email', 'modals'),
(99, '<p>Name...</p>', '<p>Name...</p>', '', '', '', 1, 'name-placeholder', 'modals'),
(100, '<p>Email...</p>', '<p>E-Mail...</p>', '', '', '', 1, 'email-placeholder', 'modals'),
(101, '<p>Please write your message here...</p>', '<p>Nachricht hier eingeben...</p>', '', '', '', 1, 'message-placeholder', 'modals'),
(102, '<p>Send</p>', '<p>Senden</p>', '', '', '', 1, 'send-button', 'modals'),
(103, 'Programs', 'Programme', 'ff', 'ff', 'ff', 0, 'study-programs', 'footer'),
(109, 'Conferences & Workshops', 'Konferenzen & Workshops', 'ff', 'ff', 'f', 0, 'conferences-and-workshops', 'footer'),
(110, 'Coaching', 'Coaching', 'ff', 'ff', 'ff', 0, 'coaching', 'footer'),
(111, 'Book Publishing', 'Buch veröffentlichen', 'ff', 'fff', 'ff', 0, 'publishing', 'footer'),
(112, 'Research & Career', 'Forschung & Karriere', 'ff', 'ff', 'ff', 0, 'research', 'footer'),
(113, 'Smart Studies', 'Online-Studium', 'ff', 'ff', 'ff', 0, 'digital-studying', 'footer'),
(114, 'Online Learning', 'Online studieren', 'ff', 'ff', 'fff', 0, 'digital-studies', 'footer'),
(115, 'Recognition of Prior Learning', 'Studium verkürzen', 'ff', 'ff', 'ff', 0, 'recognition', 'footer'),
(116, 'Student Finance', 'Studium finanzieren', 'ff', 'ff', 'ff', 0, 'study-financing', 'footer'),
(117, 'Student Assistance Team', 'Studienberatung', 'fff', 'ff', 'ff', 0, 'student-advisory-service', 'footer'),
(118, 'Student Portal', 'Bewerbung Studium', 'ff', 'ff', 'fff', 0, 'study-registration', 'footer'),
(119, 'ONSITES Graduate School', 'ONSITES Graduate School', 'ff', 'ff', 'fff', 0, 'collegium-excellentia', 'footer'),
(120, 'About', 'Über uns', 'ff', 'ff', 'ff', 0, 'about', 'footer'),
(121, 'Our Lecturers', 'Unsere Dozenten', 'ff', 'ff', 'ff', 0, 'academics', 'footer'),
(122, 'Accreditation & Partners', 'Akkreditierung & Partner', 'ff', 'ff', 'ff', 0, 'accreditation', 'footer'),
(123, 'Partners', 'Partner', 'ff', 'ff', 'ff', 0, 'partners', 'footer'),
(124, 'News Explorer', 'News-Explorer', 'ff', 'ff', 'ff', 0, 'blog', 'footer'),
(125, 'Resources', 'Sonstiges', 'ff', 'ff', 'ff', 0, 'resources', 'footer'),
(126, 'Help Desk', 'Help-Desk', 'ff', 'ff', 'f', 0, 'help-desk', 'footer'),
(127, 'FAQ', 'FAQ', 'f', 'f', 'f', 0, 'faq', 'footer'),
(128, 'Privacy Policy', 'Datenschutz', 'f', 'f', 'f', 0, 'gdpr', 'footer'),
(129, 'Cookies', 'Cookies', 'f', 'f', 'f', 0, 'cookies', 'footer'),
(130, 'Contact', 'Kontakt', 'f', 'f', 'f', 0, 'contact', 'footer'),
(131, 'Imprint', 'Impressum', 'f', 'f', 'f', 0, 'imprint', 'footer'),
(132, 'Our Student Assistance Team Helps You Out', 'Unsere Studienberatung hilft Dir weiter', '', '', '', 0, 'heading', 'student-advisory-service'),
(133, '<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Always There For You</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In need of advice? Our student assistance team will advise you on all aspects of your studies &ndash; guaranteed <strong>free of charge</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>How would you like to contact us? You decide: <strong>Call us directly</strong>, request&nbsp;a <strong>phone appointment </strong>or send us a <strong>message</strong> &ndash; simple as that.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our friendly student assistance team anwers all your questions about:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Application</strong></span>: We guide you through the entire <a href=\"https://graduate.me/en/student-portal\">application</a> process.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Student Finance</strong></span>: We help you find the right form of <a href=\"https://graduate.me/en/student-portal\">financing</a>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Recognition of Prior Learning</strong></span>: Together we will discuss which of your previous achievements are eligible for <a href=\"https://graduate.me/en/recognition-of-prior-learning\">recognition</a>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Enrollment</strong></span>: We show you which steps you have to follow.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Study Selection</strong></span>: We help you find the best course of study for your life situation.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Study Process</strong></span>: We explain the entire process step by step.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>And More</strong></span>: We are also at your side for other questions and requests.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Jederzeit an Deiner Seite</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Beratungsbedarf? Unsere Studienberatung ber&auml;t Dich rund um Dein Wunschstudium &ndash;<strong> garantiert kostenlos.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wie m&ouml;chtest Du uns kontaktieren? Du entscheidest: <strong>Rufe uns direkt an</strong>, vereinbare einen <strong>R&uuml;ckruftermin</strong> oder sende uns eine <strong>Nachricht</strong> &ndash; bequem &amp; einfach.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unsere Studienberatung beantwortet alle Deine Fragen zu:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Bewerbung</span></strong>:&nbsp;Wir begleiten Dich durch den gesamten <a href=\"https://graduate.me/de/bewerbung-studium\">Bewerbungsvorgang</a>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Studienfinanzierung</span></strong>:&nbsp;Wir helfen Dir, die passende <a href=\"https://graduate.me/de/bewerbung-studium\">Finanzierungsform</a> zu finden.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Anerkennung von Vorleistungen</strong>:&nbsp;</span>Gemeinsam besprechen wir, welche Deiner Vorleistungen zur <a href=\"https://graduate.me/de/studium-verkuerzen\">Anrechnung</a> in Frage kommen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Einschreibung</span></strong>:&nbsp;Wir zeigen Dir, welche Schritte Du befolgen musst.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Studienauswahl</strong></span>:&nbsp;Wir helfen Dir dabei, den f&uuml;r Deine Lebenssituation optimalen Studiengang zu finden.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Studienablauf</span></strong>:&nbsp;Wir erkl&auml;ren Dir den gesamten Prozess Schritt f&uuml;r Schritt.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong><span style=\"color:#2980b9\">Und mehr</span></strong>:&nbsp;Auch bei sonstigen Fragen und Anliegen sind wir an Deiner Seite.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'student-advisory-service'),
(134, 'Send Us A Message', 'Schreibe uns eine Nachricht', '', '', '', 0, 'form-heading', 'student-advisory-service'),
(135, 'First name', 'Vorname', '', '', '', 0, 'firstname', 'student-advisory-service'),
(136, 'Surname', 'Nachname', '', '', '', 0, 'surname', 'student-advisory-service'),
(137, 'Phone', 'Telefon', '', '', '', 0, 'phone', 'student-advisory-service'),
(138, 'Email', 'E-Mail', '', '', '', 0, 'email', 'student-advisory-service'),
(139, 'Subject', 'Betreff', '', '', '', 0, 'subject', 'student-advisory-service'),
(140, 'Message', 'Nachricht', '', '', '', 0, 'message', 'student-advisory-service'),
(141, 'Send Now', 'Jetzt senden', '', '', '', 0, 'button', 'student-advisory-service'),
(142, '08:00 – 17:00 (CET) Monday through Friday', '08:00 – 17:00 (MEZ) Montag bis Freitag', '', '', '', 0, 'working-time-one', 'student-advisory-service'),
(143, '08:00 – 17:00 (CET) Monday through Friday', '08:00 – 17:00 (MEZ) Montag bis Freitag', '', '', '', 0, 'working-time-two', 'student-advisory-service'),
(144, '+359 87 645 58 59', '+359 87 645 58 59', '', '', '', 0, 'phone_two', 'student-advisory-service'),
(145, '+49 176 32 48 00 11', '+49 176 32 48 00 11', '', '', '', 0, 'phone_one', 'student-advisory-service'),
(146, 'Support in German', 'Support in Deutsch', '', '', '', 0, 'support-english', 'student-advisory-service'),
(147, 'Support in English', 'Support in Englisch', '', '', '', 0, 'support-german', 'student-advisory-service'),
(148, 'How To Reach Us Directly', 'So erreichst Du uns direkt', '', '', '', 0, 'by-phone', 'student-advisory-service'),
(159, 'Watch Video', 'Video ansehen', '-', '-', '-', 0, 'apply', 'study-program'),
(160, 'LEARN MORE', 'MEHR ERFAHREN', '-', '-', '-', 0, 'learn-more', 'study-program'),
(161, 'English, German or Russian', 'Deutsch, Englisch oder Russisch', '-', '-', '-', 0, 'languages', 'study-program'),
(162, 'Semesters', 'Semester', '-', '-', '-', 0, 'semesters', 'study-program'),
(163, 'Taught in:', 'Sprache', '-', '-', '-', 0, 'taught-in', 'study-program'),
(164, 'Duration', 'Dauer', '-', '-', '-', 0, 'duration', 'study-program'),
(165, 'Location', 'Ort', '-', '-', '-', 0, 'location', 'study-program'),
(166, 'Online', 'Online', '-', '-', '-', 0, 'online', 'study-program'),
(167, 'Previous', 'Vorherige', '-', '-', '-', 0, 'prev-button', 'study-program'),
(168, 'Next', 'Nächste', '-', '-', '-', 0, 'next-button', 'study-program'),
(169, 'Request Free Information', 'Kostenlose Infos anfordern', '-', '-', '-', 0, 'request', 'study-program'),
(170, 'First Name', 'Vorname', '-', '-', '-', 0, 'name', 'study-program'),
(171, 'Email Address', 'E-Mail-Adresse', '-', '-', '-', 0, 'email', 'study-program'),
(172, 'Phone Number', 'Telefonnummer', '-', '-', '-', 0, 'phone', 'study-program'),
(173, 'Submit Now', 'Jetzt anfordern', '-', '-', '-', 0, 'send', 'study-program'),
(174, 'Latest News', '', '', '', '', 0, '', 'single-article'),
(175, 'View All', '', '', '', '', 0, '', 'single-article'),
(177, 'Your Privacy Is Our Priority', 'Deine Privatsphäre ist unsere Priorität', '', '', '', 0, 'heading', 'privacy-policy');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(178, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>I. Introduction</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Welcome to the ONSITES Graduate School Privacy Policy. This Privacy Policy has been created to provide you with a clear and comprehensive overview of how we handle your personal data. ONSITES Graduate School is committed to respecting your privacy rights and protecting your data. This statement sets out the basis on which your personal data will be collected, used, stored and protected.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Purpose of the privacy policy</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This privacy policy has several main objectives:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Transparency and understanding</strong>: We want to make sure that you fully understand how we use and protect your personal data. We respect your privacy and are committed to transparency.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Information and clarification</strong>: This statement gives you a clear understanding of the types of personal data we collect, the purposes for which we use it and the rights and options you have in relation to your data.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Compliance with data protection laws</strong>: We recognize that privacy laws and data regulations are important to protect your privacy. This privacy policy ensures that we comply with the requirements of these laws.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Definitions</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Before discussing our privacy practices, it is helpful to clarify some basic terms. In this Privacy Policy, we use certain terms that are important in the context of data protection. Here are some important definitions:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Personal data</strong>: This is information that relates to you as an identifiable natural person. This includes your name, address, e-mail address, telephone number and other data that can be used to identify you.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Processing</strong>: This refers to any activity carried out with personal data, including collection, storage, use, transfer and deletion.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Legal bases</strong>: These are the legal bases on which we process your personal data. This may include performance of a contract, consent or other legal basis.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Data subject</strong>: This is you - the person to whom the personal data relates.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School recognizes the importance of these terms and will use them clearly and consistently in this Privacy Policy to protect and respect your privacy rights.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We encourage you to read this Privacy Policy carefully as it provides you with information about how we use and protect your personal data. You have certain rights in relation to your data and we want to make sure that you can exercise these rights. If you have any questions or require further information, please do not hesitate to contact us. The contact information can be found at the end of this statement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>II. Responsible body</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School (hereinafter referred to as &quot;We&quot;, &quot;Us&quot; or &quot;The Educational Institution&quot;) is the data controller for the processing of your personal data. We are aware of our responsibility and take the protection of your personal data very seriously. In this section, we would like to provide you with detailed information about us and our contact details.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Name of the responsible body</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The name of the responsible body is <strong>ONSITES Graduate School LLC</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Address of the responsible body</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our head office is located at <strong>7901 4TH ST. N #20418, St. PETERSBURG, FL 33702, USA</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Contact information of the responsible body</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To contact us and receive information on data protection or the processing of your personal data, you can use the following communication options:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>E-mail address</strong>: gdpr@graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telephone number</strong>: +1 850 298 80 50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Data protection officer</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School has appointed a Data Protection Officer (DPO) to ensure that we comply with our legal obligations regarding data protection. The DPO can be contacted as follows:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Name of the data protection officer</strong>: Dr. Mathias Kunze</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>E-mail address of the data protection officer</strong>: gdpr@graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telephone number of the data protection officer</strong>: +1 850 298 80 50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Why is this information important?</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is very important to specify the controller and its contact details to ensure that you can contact us easily if you have any questions or concerns regarding data protection. As the controller, we are obliged to process and protect your personal data in accordance with the applicable data protection laws. You can contact us if you require information about the processing of your data, wish to exercise your data protection rights or have questions about data protection.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our commitment to transparency and providing contact information is designed to help you trust our privacy practices. We value your privacy and are committed to protecting it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>III. Types of personal data</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We would like to give you a comprehensive overview of the different types of personal data that we may collect. Personal data is information that relates to you as an identifiable natural person. This data is an essential part of our educational activities and enables us to provide our educational services effectively and efficiently.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Contact details</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We collect the following personal contact data:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Name</strong>: Your full name (first name and surname)</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Address</strong>: Your home address or another contact address</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Gender</strong>: Your personal gender to identify the salutation</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Email address</strong>: Your primary e-mail address for communication</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Phone number</strong>: A phone number where you can be reached</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Date and place of birth</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your date and place of birth are required information for the administration of your studies and for the fulfillment of legal requirements.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Personal documents for the study application</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We collect and process personal documents that identify you as a student applicant and prove your current educational achievements. These include</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>ID card</strong>: Your identification document as a natural person</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Curriculum vitae</strong>: Your educational background to date</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Previous educational qualifications</strong>: Your proof of previous educational qualifications</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Letter of reference</strong>: To evaluate the suitability of the chosen field of study</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Academic information</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We collect and process academic information to effectively manage your studies and academic support. This includes:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Degree program</strong>: Information about the degree program you are enrolled in</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Duration of studies</strong>: The planned or actual duration of your studies</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Assessments</strong>: Information about your academic performance and grades</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Financial information</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In order to enable payment processing and the administration of any scholarships, the following financial information may be recorded:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Payment information</strong>: Information about payment methods and payment histories</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Scholarships</strong>: Information on scholarships and financial support awarded</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>6. Photos and videos</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We may collect photos and videos of you, in particular for student ID cards and at various events at the university. The use of such media serves to verify your identity and to participate in educational activities.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>7. Other information</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In addition to the above categories, we may also collect other information that you voluntarily provide to us or that is relevant in connection with your studies and our educational services.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>IV. Purpose of data collection and processing</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School uses your data carefully and lawfully to ensure the quality of our educational services and to enable you to succeed in your studies. Below you will find a comprehensive list of the main purposes for which we use your data.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Administration of your study application and enrollment</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Application process</strong>: We use your personal data in the application process to ensure that your application is processed properly and to check admission to your chosen degree program.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Enrollment</strong>: After successful completion of the application process, your data will be used for enrollment in our educational institution.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Administration of your studies and academic support</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Course management</strong>: We use your data to ensure the smooth running of your studies, such as course planning and implementation, access to teaching materials and the tracking of your academic achievements.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Academic support</strong>: Your data will be used to provide you with academic support and advice to help you achieve your goals in your studies.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Communication with you and provision of information</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Communication</strong>: We use your contact details to get in touch with you and provide information about educational operations, events, updates and other relevant matters.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Provision of information</strong>: We use your personal data to provide relevant information relevant to your studies and participation in educational activities. This may include the following: Announcement of study plans, teaching events, conferences, workshops, seminars and the like.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Improving our educational offerings and services</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your data may be used for internal assessments and quality assurance measures in order to continuously improve our educational offerings and services.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Fulfillment of legal obligations</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We process your data to comply with our legal obligations, including to fulfill reporting obligations to regulatory authorities and to comply with education laws and regulations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>V. Legal bases for the processing</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Understanding the legal basis for processing your data is essential to ensure that your data protection rights are respected and protected.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Fulfillment of a contract</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School processes your personal data if this is necessary for the fulfillment of a contract. This includes the processing of data in the context of your study request, your study application, the study contracts and other agreements concluded with you. The processing is carried out in accordance with the contractual agreements between you and the university.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Consent</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In some cases, ONSITES Graduate School may process your personal data on the basis of your voluntary consent. Consent is obtained transparently and clearly and can be withdrawn by you at any time. We respect your right to withdraw your consent without affecting the lawfulness of processing based on consent before its withdrawal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Fulfillment of legal obligations</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School is subject to various legal obligations and statutory regulations. Therefore, we may process your personal data in order to comply with these obligations. This may include:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Fulfillment of reporting obligations to supervisory authorities</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Compliance with education laws and regulations</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Implementation of study and examination administration processes in accordance with applicable law.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Legitimate interest of the ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School may process your personal data on the basis of a legitimate interest. This is done to ensure the quality of our educational services, to meet the interests and needs of our students and to improve our educational offerings. In doing so, your data protection rights and data protection interests are carefully weighed up.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VI. Recipients of your data</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School will treat your data confidentially and will only share it with third parties in certain circumstances where this is necessary to provide our educational services efficiently.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Teachers and lecturers</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your personal data may be shared with ONSITES Graduate School faculty and lecturers in order to conduct educational operations. This includes the provision of information necessary for teaching and academic support. These recipients are obliged to comply with data protection regulations and to keep your data secure.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. External service providers</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We may use external service providers to support our educational services. These service providers may be IT service providers, payment processors or other service providers who support us in the administration and provision of our services. In such cases, your data will only be passed on to trustworthy service providers who are contractually obliged to comply with data protection regulations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Authorities</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School may be required to disclose certain information to government or regulatory agencies in order to comply with legal requirements. This may include reporting to education regulators or other governmental agencies.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VII. Data security</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School attaches great importance to the security of your personal data. We have taken measures and precautions to protect your data from unauthorized access, loss, misuse or alteration.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Technical and organizational measures</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We have implemented technical and organizational measures to ensure the security of your data. These include</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Access control</strong>: The assignment of access rights is restricted to authorized persons in order to prevent unauthorized access.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Encryption</strong>: Data is communicated and stored in encrypted form to ensure confidentiality.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Regular security checks</strong>: We conduct regular security reviews and audits to identify and address potential security risks.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Training and awareness</strong>: Our employees are trained in data protection and security procedures to ensure that they understand the best practices for handling personal data.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Data access restrictions</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Access to your personal data is restricted to employees and third parties who need this data for legitimate purposes. Access is in accordance with the principles of data minimization and the minimum principle.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Data security with third parties</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If we use third parties to process your data, we ensure that they take the necessary security measures to adequately protect your data.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Data protection impact assessment</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School conducts data protection impact assessments to evaluate risks to your data protection rights and take appropriate measures to minimize these risks.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VIII. Storage period</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School will only store your personal data for as long as is necessary for the purposes for which it was collected. Below we explain how long we keep your data. We also discuss the criteria that are taken into account when determining the storage period.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Storage duration for different data types</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The storage period may vary depending on the type of data. In general:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Application data</strong>: Data of applicants who are not accepted will generally be deleted after a reasonable period of time.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Student data</strong>: Student data is generally stored for as long as you are an active student and beyond in accordance with applicable legal requirements.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Financial data</strong>: Financial data can be stored for a certain period of time in accordance with tax and legal requirements.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Criteria for the storage period</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>When determining the storage duration of your data, we take various criteria into account, including</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Fulfillment of the purposes</strong>: We only store your data for as long as it is necessary to fulfill the original processing purposes.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Legal requirements</strong>: We comply with the legal requirements that prescribe the retention of certain data.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Contracts and agreements</strong>: The storage period can be influenced by contracts and agreements that exist between you and the university.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>3. Data minimization</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We only store the data that is required for the respective purposes and focus on data economy in order to limit the storage period.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Deletion and anonymization</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As soon as the storage period has expired or there is no longer a legitimate purpose for keeping your data, it will be deleted or anonymized to ensure that you can no longer be identified.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>IX. Your data protection rights</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School respects your data protection rights and is committed to ensuring that you have full control over your personal data. We would like to explain to you in detail which data protection rights you can exercise.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Right of access</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You have the right to request a copy of your personal data processed by ONSITES Graduate School. We will provide you with this information on request - along with information about how your data is used.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Right to rectification</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You have the right to ask us to correct any inaccurate or incomplete personal data that we hold about you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Right to erasure (&quot;right to be forgotten&quot;)</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Under certain circumstances, you have the right to request the deletion of your personal data. However, this right is not unlimited and depends on the applicable data protection laws and data regulations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Right to restriction of processing</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Under certain circumstances, you have the right to request the restriction of the processing of your personal data. This means that we will only process your data to a limited extent.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Right to data portability</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You have the right to receive your personal data in a structured, commonly used and machine-readable format and to request the transfer of this data to another controller.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>6. Right of objection</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You have the right to object, on grounds relating to your particular situation, to the processing of your personal data where such processing is based on our legitimate interest.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>7. Right to withdraw consent</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If we process your personal data on the basis of your consent, you can withdraw your consent at any time. The withdrawal does not affect the lawfulness of processing before the withdrawal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>8. Right to lodge a complaint with a supervisory authority</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You have the right to lodge a complaint with a data protection supervisory authority in your country if you believe that your data protection rights have been violated.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>X. Concluding remarks</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Amendment of the privacy policy</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School reserves the right to update and amend this Privacy Statement from time to time to reflect changes in legal requirements, technological developments and organizational needs. We will highlight any material changes in this Privacy Statement and indicate the date of the last update at the end of the statement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If significant changes are made that affect the processing of your personal data, we will inform you in an appropriate manner, for example by e-mail or a notification on our website, before the changes take effect. We recommend that you check this privacy policy regularly to stay up to date.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you do not agree with the changes to the privacy policy, you have the right to object to the processing of your personal data in accordance with the amended terms. In this case, you can contact us for further information or instructions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Contact</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you have any questions or concerns regarding this privacy policy or data protection in general, please do not hesitate to contact us. You will find the contact details in section II of this privacy policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Last update</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This privacy policy was last updated on 23.10.2023. Please check the privacy policy regularly to ensure that you have up-to-date information regarding data protection at ONSITES Graduate School.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>I. Einleitung</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Willkommen zur Datenschutzerkl&auml;rung der ONSITES Graduate School. Diese Datenschutzerkl&auml;rung wurde erstellt, um Dir eine klare und umfassende &Uuml;bersicht dar&uuml;ber zu bieten, wie wir mit Deinen personenbezogenen Daten umgehen. Die ONSITES Graduate School ist bestrebt, Deine Datenschutzrechte zu respektieren und Deine Daten zu sch&uuml;tzen. Diese Erkl&auml;rung legt die Grundlagen fest, auf denen Deine personenbezogenen Daten erfasst, verwendet, gespeichert und gesch&uuml;tzt werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Zweck der Datenschutzerkl&auml;rung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diese Datenschutzerkl&auml;rung hat mehrere Hauptziele:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Transparenz und Verst&auml;ndnis</strong>: Wir m&ouml;chten sicherstellen, dass Du vollst&auml;ndig verstehst, wie wir Deine personenbezogenen Daten nutzen und sch&uuml;tzen. Wir respektieren Deine Privatsph&auml;re und setzen auf Transparenz.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Information und Aufkl&auml;rung</strong>: Diese Erkl&auml;rung gibt Dir eine klare Vorstellung davon, welche Arten von personenbezogenen Daten wir erfassen, zu welchen Zwecken wir sie verwenden und welche Rechte und Optionen du in Bezug auf Deine Daten hast.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Einhaltung der Datenschutzgesetze</strong>: Wir sind uns bewusst, dass Datenschutzgesetze und Datenvorschriften einen hohen Stellenwert einnehmen, um Deine Privatsph&auml;re zu sch&uuml;tzen. Diese Datenschutzerkl&auml;rung stellt sicher, dass wir die Anforderungen dieser Gesetze erf&uuml;llen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Definitionen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vor der Er&ouml;rterung unserer Datenschutzpraktiken ist es hilfreich, einige grundlegende Begriffe zu kl&auml;ren. In dieser Datenschutzerkl&auml;rung verwenden wir bestimmte Begriffe, die im Kontext des Datenschutzes von Bedeutung sind. Hier sind einige wichtige Definitionen:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Personenbezogene Daten</strong>: Dies sind Informationen, die sich auf Dich als identifizierbare nat&uuml;rliche Person beziehen. Dazu geh&ouml;ren Name, Adresse, E-Mail-Adresse, Telefonnummer und andere Daten, die dazu verwendet werden k&ouml;nnen, Dich zu identifizieren.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Verarbeitung</strong>: Dies bezieht sich auf jede Aktivit&auml;t, die mit personenbezogenen Daten durchgef&uuml;hrt wird, einschlie&szlig;lich Erfassung, Speicherung, Nutzung, &Uuml;bertragung und L&ouml;schung.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Rechtsgrundlagen</strong>: Dies sind die gesetzlichen Grundlagen, auf denen wir die Verarbeitung Deiner personenbezogenen Daten durchf&uuml;hren. Dies kann eine Vertragserf&uuml;llung, Einwilligung oder andere gesetzliche Grundlagen umfassen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Betroffene Person</strong>: Das bist Du &ndash; jene Person, auf die sich die personenbezogenen Daten beziehen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School erkennt die Wichtigkeit dieser Begriffe und wird sie in dieser Datenschutzerkl&auml;rung klar und koh&auml;rent verwenden, um Deine Datenschutzrechte zu sch&uuml;tzen und zu respektieren.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir ermutigen Dich, diese Datenschutzerkl&auml;rung sorgf&auml;ltig zu lesen, da sie Dir Informationen dar&uuml;ber bietet, wie wir Deine personenbezogenen Daten nutzen und sch&uuml;tzen. Du hast bestimmte Rechte in Bezug auf Deine Daten und wir m&ouml;chten sicherzustellen, dass Du diese Rechte aus&uuml;ben kannst. Wenn Du Fragen hast oder weitere Informationen ben&ouml;tigst, z&ouml;gere nicht, Dich an uns zu wenden. Die Kontaktinformationen findest du am Ende dieser Erkl&auml;rung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>II. Verantwortliche Stelle</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School (im Folgenden als &quot;Wir&quot;, &quot;Uns&quot; oder &quot;Die Bildungsinstitution&quot; bezeichnet) ist die verantwortliche Stelle f&uuml;r die Verarbeitung Deiner personenbezogenen Daten. Wir sind uns unserer Verantwortung bewusst und nehmen den Schutz Deiner personenbezogenen Daten sehr ernst. In diesem Abschnitt m&ouml;chten wir dir detaillierte Informationen &uuml;ber uns und unsere Kontaktdaten geben.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Name der verantwortlichen Stelle</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der Name der verantwortlichen Stelle ist die <strong>ONSITES Graduate School LLC</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Adresse der verantwortlichen Stelle</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unser Hauptsitz befindet sich in <strong>7901 4TH ST. N #20418, St. PETERSBURG, FL 33702, USA</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Kontaktinformation der verantwortlichen Stelle</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Um mit uns in Kontakt zu treten und Informationen zum Datenschutz oder zur Verarbeitung deiner personenbezogenen Daten zu erhalten, stehen dir folgende Kommunikationsm&ouml;glichkeiten zur Verf&uuml;gung:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>E-Mail-Adresse</strong>: gdpr@graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telefonnummer</strong>: +1 850 298 80 50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Datenschutzbeauftragter</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School hat einen Datenschutzbeauftragten (DSB) ernannt, um sicherzustellen, dass wir unseren rechtlichen Verpflichtungen im Datenschutz nachkommen. Der Datenschutzbeauftragte kann wie folgt erreicht werden:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Name des Datenschutzbeauftragten</strong>: Dr. Mathias Kunze</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>E-Mail-Adresse des Datenschutzbeauftragten</strong>: gdpr@graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telefonnummer des Datenschutzbeauftragten</strong>: +1 850 298 80 50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Warum ist diese Information wichtig?</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Angabe der verantwortlichen Stelle und ihrer Kontaktdaten ist von gro&szlig;er Bedeutung, um sicherzustellen, dass Du uns bei Fragen oder Anliegen in Bezug auf den Datenschutz problemlos erreichen kannst. Als verantwortliche Stelle sind wir verpflichtet, Deine personenbezogenen Daten gem&auml;&szlig; den geltenden Datenschutzgesetzen zu verarbeiten und zu sch&uuml;tzen. Du kannst Dich an uns wenden, wenn Du Informationen &uuml;ber die Verarbeitung Deiner Daten ben&ouml;tigst, Deine Datenschutzrechte aus&uuml;ben m&ouml;chtest oder Fragen zum Datenschutz hast.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unsere Verpflichtung zur Transparenz und zur Bereitstellung von Kontaktdaten soll Dir das Vertrauen in unsere Datenschutzpraktiken erleichtern. Wir sch&auml;tzen Deine Privatsph&auml;re und sind bestrebt, sie zu sch&uuml;tzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>III. Arten von personenbezogenen Daten</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir m&ouml;chten Dir einen umfassenden &Uuml;berblick &uuml;ber die verschiedenen Arten von personenbezogenen Daten geben, die wir erfassen k&ouml;nnen. Personenbezogene Daten sind Informationen, die sich auf Dich als identifizierbare nat&uuml;rliche Person beziehen. Diese Daten sind ein wesentlicher Bestandteil unserer Bildungst&auml;tigkeit und erm&ouml;glichen es uns, unsere Bildungsdienstleistungen effektiv und effizient anzubieten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Kontaktdaten</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir erfassen die nachstehenden pers&ouml;nlichen Kontaktdaten:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Name</strong>: Dein vollst&auml;ndiger Name (Vornamen und Nachname)</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Adresse</strong>: Deine Wohnadresse oder eine andere Kontaktadresse</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Geschlecht</strong>: Dein pers&ouml;nliches Geschlecht zur Identifizierung der Anrede</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>E-Mail-Adresse</strong>: Deine prim&auml;re E-Mail-Adresse f&uuml;r die Kommunikation</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Telefonnummer</strong>: Eine Telefonnummer, unter der Du erreichbar bist</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Geburtsdatum und Geburtsort</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dein Geburtsdatum und Geburtsort sind erforderliche Angaben f&uuml;r die Verwaltung Deines Studiums und f&uuml;r die Erf&uuml;llung rechtlicher Anforderungen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Pers&ouml;nliche Dokumente zur Studienbewerbung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir erfassen und verarbeiten pers&ouml;nliche Dokumente, welche Dich als Antragsteller eines Studiums identifizieren und Deine gegenw&auml;rtigen Bildungsleistungen nachweisen. Dazu geh&ouml;ren:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Personalausweis</strong>: Dein Identifizierungsdokument als nat&uuml;rliche Person</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Lebenslauf</strong>: Dein bisheriger Bildungsweg</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Bisherige Bildungsabschl&uuml;sse</strong>: Dein Nachweis &uuml;ber bisherige Bildungsabschl&uuml;sse</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Referenzschreiben</strong>: Zur Evaluierung der Eignung des gew&auml;hlten Studienfaches</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Akademische Informationen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir erfassen und verarbeiten akademische Informationen, um Dein Studium und Deine akademische Unterst&uuml;tzung effektiv zu verwalten. Dazu geh&ouml;ren:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Studiengang</strong>: Informationen &uuml;ber den Studiengang, den Du belegst</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Studiendauer</strong>: Die geplante oder tats&auml;chliche Dauer Deines Studiums</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Bewertungen</strong>: Informationen &uuml;ber Deine akademische Leistung und Noten</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Finanzinformationen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Um die Zahlungsabwicklung und die Verwaltung von eventuellen Stipendien zu erm&ouml;glichen, k&ouml;nnen folgende Finanzinformationen erfasst werden:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Zahlungsinformationen</strong>: Informationen &uuml;ber Zahlungsmethoden und Zahlungshistorien</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Stipendien</strong>: Informationen &uuml;ber gew&auml;hrte Stipendien und finanzielle Unterst&uuml;tzungen</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>6. Fotos und Videos</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir k&ouml;nnen Fotos und Videos von Dir erfassen, insbesondere f&uuml;r studentische Ausweise und bei verschiedenen Veranstaltungen an der Hochschule. Die Nutzung solcher Medien dient dazu, Deine Identit&auml;t zu verifizieren und an Bildungsaktivit&auml;ten teilzunehmen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>7. Sonstige Informationen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Zus&auml;tzlich zu den oben genannten Kategorien k&ouml;nnen auch andere Informationen erfasst werden, die Du uns freiwillig zur Verf&uuml;gung stellst oder die im Zusammenhang mit Deinem Studium und unseren Bildungsdienstleistungen relevant sind.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>IV. Zweck der Datenerfassung und Verarbeitung</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School verwendet Deine Daten sorgf&auml;ltig und rechtm&auml;&szlig;ig, um die Qualit&auml;t unserer Bildungsdienstleistungen sicherzustellen und Dir ein erfolgreiches Studium zu erm&ouml;glichen. Im Folgenden findest Du eine umfassende Liste der Hauptzwecke, f&uuml;r die wir Deine Daten verwenden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Verwaltung Deiner Studienbewerbung und Einschreibung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Bewerbungsprozess</strong>: Wir verwenden Deine personenbezogenen Daten im Bewerbungsprozess, um sicherzustellen, dass Deine Bewerbung ordnungsgem&auml;&szlig; bearbeitet wird und um die Zulassung zu Deinem gew&auml;hlten Studiengang zu pr&uuml;fen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Immatrikulation</strong>: Nach erfolgreichem Abschluss des Bewerbungsprozesses werden Deine Daten zur Einschreibung in unserer Bildungseinrichtung verwendet.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Verwaltung Deines Studiums und akademische Unterst&uuml;tzung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Studiengangmanagement</strong>: Wir nutzen Deine Daten, um den reibungslosen Ablauf Deines Studiums zu gew&auml;hrleisten wie die Kursplanungen und Kursdurchf&uuml;hrungen, den Zugang zu Lehrmaterialien sowie die Verfolgung Deiner Studienleistungen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Akademische Unterst&uuml;tzung</strong>: Deine Daten werden verwendet, um Dir akademische Unterst&uuml;tzung und Beratung zur Verf&uuml;gung zu stellen, damit Du Deine Ziele im Studium erreichen kannst.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Kommunikation mit Dir und Bereitstellung von Informationen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Kommunikation</strong>: Wir nutzen Deine Kontaktdaten, um mit Dir in Kontakt zu treten und Informationen &uuml;ber den Bildungsbetrieb, Veranstaltungen, Aktualisierungen und andere relevante Angelegenheiten bereitzustellen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Bereitstellung von Informationen</strong>: Wir nutzen Deine personenbezogenen Daten, um relevante Informationen bereitzustellen, die f&uuml;r Dein Studium und Deine Teilnahme an Bildungsaktivit&auml;ten von Bedeutung sind. Diese k&ouml;nnen sich wie folgt zusammensetzen: Ank&uuml;ndigung von Studienpl&auml;nen, Lehrveranstaltungen, Konferenzen, Workshops, Seminare und &auml;hnlichem.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Verbesserung unserer Bildungsangebote und Dienstleistungen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Deine Daten k&ouml;nnen f&uuml;r interne Bewertungen und Qualit&auml;tssicherungsma&szlig;nahmen genutzt werden, um unsere Bildungsangebote und Dienstleistungen kontinuierlich zu verbessern.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Erf&uuml;llung rechtlicher Verpflichtungen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir verarbeiten Deine Daten, um unseren gesetzlichen Verpflichtungen nachzukommen, einschlie&szlig;lich der Erf&uuml;llung von Berichtspflichten gegen&uuml;ber Aufsichtsbeh&ouml;rden und der Einhaltung von Bildungsgesetzen und Bildungsvorschriften.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>V. Rechtsgrundlagen f&uuml;r die Verarbeitung</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Das Verst&auml;ndnis f&uuml;r die Rechtsgrundlagen der Verarbeitung Deiner Daten ist von entscheidender Bedeutung, um sicherzustellen, dass Deine Datenschutzrechte respektiert und gesch&uuml;tzt werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Erf&uuml;llung eines Vertrages</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School verarbeitet Deine personenbezogenen Daten, wenn dies zur Erf&uuml;llung eines Vertrages erforderlich ist. Dies umfasst die Verarbeitung von Daten im Rahmen Deiner Studienanfrage, Deiner Studienbewerbung, der Studienvertr&auml;ge und anderer mit Dir geschlossener Vereinbarungen. Die Verarbeitung erfolgt in &Uuml;bereinstimmung mit den vertraglichen Vereinbarungen zwischen Dir und der Hochschule.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Einwilligung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In einigen F&auml;llen kann die ONSITES Graduate School Deine personenbezogenen Daten auf der Grundlage Deiner freiwilligen Einwilligung verarbeiten. Die Einwilligung wird transparent und deutlich eingeholt und kann jederzeit von Dir widerrufen werden. Wir respektieren Dein Recht, Deine Einwilligung zur&uuml;ckzuziehen, ohne dass dies Auswirkungen auf die Rechtm&auml;&szlig;igkeit der vor dem Widerruf erfolgten Verarbeitung hat.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Erf&uuml;llung rechtlicher Verpflichtungen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School unterliegt verschiedenen rechtlichen Verpflichtungen und gesetzlichen Vorschriften. Daher k&ouml;nnen wir Deine personenbezogenen Daten verarbeiten, um diesen Verpflichtungen nachzukommen. Dies kann beinhalten:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Erf&uuml;llung von Berichtspflichten gegen&uuml;ber Aufsichtsbeh&ouml;rden</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Einhaltung von Bildungsgesetzen und -vorschriften</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Durchf&uuml;hrung von Studien- und Pr&uuml;fungsverwaltungsprozessen in &Uuml;bereinstimmung mit geltendem Recht.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Berechtigtes Interesse der ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School kann Deine personenbezogenen Daten auf der Grundlage eines berechtigten Interesses verarbeiten. Dies geschieht, um die Qualit&auml;t unserer Bildungsdienstleistungen sicherzustellen, die Interessen und Bed&uuml;rfnisse unserer Studierenden zu erf&uuml;llen und unsere Bildungsangebote zu verbessern. Dabei werden Deine Datenschutzrechte und Datenschutzinteressen sorgf&auml;ltig abgewogen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VI. Empf&auml;nger Deiner Daten</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School behandelt Deine Daten vertraulich und gibt sie nur unter bestimmten Umst&auml;nden an Dritte weiter, wenn dies notwendig ist, um unsere Bildungsdienstleistungen effizient bereitzustellen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Lehrkr&auml;fte und Dozenten</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Deine personenbezogenen Daten k&ouml;nnen an Lehrkr&auml;fte und Dozenten der ONSITES Graduate School weitergegeben werden, um den Bildungsbetrieb durchzuf&uuml;hren. Dies umfasst die Bereitstellung von Informationen, die f&uuml;r die Lehre und die akademische Betreuung erforderlich sind. Diese Empf&auml;nger sind verpflichtet, die Datenschutzbestimmungen einzuhalten und Deine Daten sicher zu verwahren.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Externe Dienstleister</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Zur Unterst&uuml;tzung unserer Bildungsdienstleistungen k&ouml;nnen wir externe Dienstleister in Anspruch nehmen. Diese Dienstleister k&ouml;nnen IT-Dienstleister, Zahlungsabwickler oder andere Dienstleister sein, die uns bei der Verwaltung und Bereitstellung unserer Dienste unterst&uuml;tzen. In solchen F&auml;llen erfolgt die Weitergabe Deiner Daten nur an vertrauensw&uuml;rdige Dienstleister, die vertraglich zur Einhaltung der Datenschutzbestimmungen verpflichtet sind.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Beh&ouml;rden</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School kann verpflichtet sein, bestimmte Informationen an staatliche oder beh&ouml;rdliche Stellen weiterzugeben, um gesetzliche Anforderungen zu erf&uuml;llen. Dies kann die Berichterstattung gegen&uuml;ber Bildungsaufsichtsbeh&ouml;rden oder anderen Regierungsstellen umfassen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VII. Datensicherheit</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School legt gro&szlig;en Wert auf die Sicherheit Deiner personenbezogenen Daten. Wir haben Ma&szlig;nahmen und Vorkehrungen getroffen, um Deine Daten vor unbefugtem Zugriff, Verlust, Missbrauch oder &Auml;nderung zu sch&uuml;tzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Technische und organisatorische Ma&szlig;nahmen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir haben technische und organisatorische Ma&szlig;nahmen implementiert, um die Sicherheit Deiner Daten zu gew&auml;hrleisten. Dazu geh&ouml;ren:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Zugriffskontrolle</strong>: Die Vergabe von Zugriffsrechten ist auf autorisierte Personen beschr&auml;nkt, um unbefugten Zugriff zu verhindern.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Verschl&uuml;sselung</strong>: Die Kommunikation und Speicherung von Daten erfolgen in verschl&uuml;sselter Form, um die Vertraulichkeit zu gew&auml;hrleisten.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Regelm&auml;&szlig;ige Sicherheits&uuml;berpr&uuml;fungen</strong>: Wir f&uuml;hren regelm&auml;&szlig;ige Sicherheits&uuml;berpr&uuml;fungen und Audits durch, um m&ouml;gliche Sicherheitsrisiken zu identifizieren und zu beheben.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Schulung und Sensibilisierung</strong>: Unsere Mitarbeiter werden in Datenschutz- und Sicherheitsverfahren geschult, um sicherzustellen, dass sie die besten Praktiken im Umgang mit personenbezogenen Daten verstehen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Datenzugriffsbeschr&auml;nkungen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der Zugriff auf Deine personenbezogenen Daten ist auf Mitarbeiter und Dritte beschr&auml;nkt, die diese Daten f&uuml;r legitime Zwecke ben&ouml;tigen. Der Zugriff erfolgt gem&auml;&szlig; den Prinzipien der Datensparsamkeit und des Minimalprinzips.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Datensicherheit bei Dritten</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wenn wir Dritte zur Verarbeitung Deiner Daten hinzuziehen, stellen wir sicher, dass diese die erforderlichen Sicherheitsma&szlig;nahmen ergreifen, um Deine Daten angemessen zu sch&uuml;tzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Datenschutz-Folgenabsch&auml;tzung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School f&uuml;hrt Datenschutz-Folgenabsch&auml;tzungen durch, um Risiken f&uuml;r Deine Datenschutzrechte zu bewerten und geeignete Ma&szlig;nahmen zur Minimierung dieser Risiken zu ergreifen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VIII. Speicherdauer</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School speichert Deine personenbezogenen Daten nur so lange, wie es f&uuml;r die Zwecke, f&uuml;r die sie erfasst wurden, erforderlich ist. Nachstehend erl&auml;utern wir, wie lange wir Deine Daten aufbewahren. Ebenso er&ouml;rtern wir jene Kriterien, die bei der Festlegung der Speicherdauer ber&uuml;cksichtigt werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Speicherdauer f&uuml;r verschiedene Datentypen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Speicherdauer kann je nach Art der Daten variieren. Im Allgemeinen gilt:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Bewerbungsdaten</strong>: Daten von Bewerbern, die nicht angenommen werden, werden in der Regel nach einer angemessenen Frist gel&ouml;scht.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Studiendaten</strong>: Studiendaten werden in der Regel so lange aufbewahrt, wie Du ein aktiver Studierender bist und dar&uuml;ber hinaus gem&auml;&szlig; geltenden gesetzlichen Anforderungen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Finanzdaten</strong>: Finanzdaten k&ouml;nnen gem&auml;&szlig; steuerlichen und rechtlichen Anforderungen f&uuml;r eine bestimmte Zeitspanne aufbewahrt werden.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Kriterien f&uuml;r die Speicherdauer</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bei der Festlegung der Speicherdauer Deiner Daten ber&uuml;cksichtigen wir verschiedene Kriterien, darunter:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Erf&uuml;llung der Zwecke</strong>: Wir speichern Deine Daten nur so lange, wie sie f&uuml;r die Erf&uuml;llung der urspr&uuml;nglichen Verarbeitungszwecke notwendig sind.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Gesetzliche Anforderungen</strong>: Wir beachten die gesetzlichen Anforderungen, die die Aufbewahrung bestimmter Daten vorschreiben.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Vertr&auml;ge und Vereinbarungen</strong>: Die Speicherdauer kann durch Vertr&auml;ge und Vereinbarungen beeinflusst werden, die zwischen Dir und der Hochschule bestehen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Datensparsamkeit</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir speichern nur jene Daten, die f&uuml;r die jeweiligen Zwecke erforderlich sind und setzen auf Datensparsamkeit, um die Speicherdauer zu begrenzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. L&ouml;schung und Anonymisierung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sobald die Speicherdauer abgelaufen ist oder es keinen legitimen Zweck mehr f&uuml;r die Aufbewahrung Deiner Daten gibt, werden sie gel&ouml;scht oder anonymisiert, um sicherzustellen, dass Du nicht mehr identifiziert werden kannst.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>IX. Deine Datenschutzrechte</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School respektiert Deine Datenschutzrechte und ist bestrebt, sicherzustellen, dass Du die volle Kontrolle &uuml;ber Deine personenbezogenen Daten hast. Wir m&ouml;chten Dir im Detail erl&auml;utern, welche Datenschutzrechte Du aus&uuml;ben kannst.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Recht auf Zugang</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast das Recht, eine Kopie Deiner personenbezogenen Daten anzufordern, die von der ONSITES Graduate School verarbeitet werden. Wir werden Dir auf Anfrage diese Informationen zur Verf&uuml;gung stellen &ndash; zusammen mit jenen Informationen dar&uuml;ber, wie Deine Daten verwendet werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Recht auf Berichtigung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast das Recht, uns aufzufordern, unrichtige oder unvollst&auml;ndige personenbezogene Daten zu korrigieren, die wir &uuml;ber Dich gespeichert haben.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Recht auf L&ouml;schung (&quot;Recht auf Vergessenwerden&quot;)</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast unter bestimmten Umst&auml;nden das Recht, die L&ouml;schung Deiner personenbezogenen Daten zu verlangen. Dieses Recht ist jedoch nicht uneingeschr&auml;nkt und h&auml;ngt von den geltenden Datenschutzgesetzen und Datenvorschriften ab.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Recht auf Einschr&auml;nkung der Verarbeitung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast unter bestimmten Umst&auml;nden das Recht, die Einschr&auml;nkung der Verarbeitung Deiner personenbezogenen Daten zu beantragen. Dies bedeutet, dass wir Deine Daten nur in begrenztem Umfang verarbeiten werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>5. Recht auf Daten&uuml;bertragbarkeit</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast das Recht, Deine personenbezogenen Daten in einem strukturierten, g&auml;ngigen und maschinenlesbaren Format zu erhalten und die &Uuml;bertragung dieser Daten an einen anderen Verantwortlichen zu verlangen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>6. Widerspruchsrecht</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast das Recht, aus Gr&uuml;nden, die sich aus Deiner besonderen Situation ergeben, der Verarbeitung Deiner personenbezogenen Daten zu widersprechen, wenn diese Verarbeitung auf Grundlage unseres berechtigten Interesses erfolgt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>7. Recht auf Widerruf der Einwilligung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wenn wir Deine personenbezogenen Daten auf Grundlage Deiner Einwilligung verarbeiten, kannst Du Deine Einwilligung jederzeit widerrufen. Der Widerruf beeinflusst nicht die Rechtm&auml;&szlig;igkeit der Verarbeitung vor dem Widerruf.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>8. Beschwerderecht bei einer Aufsichtsbeh&ouml;rde</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast das Recht, eine Beschwerde bei einer Datenschutz-Aufsichtsbeh&ouml;rde in Deinem Land einzureichen, wenn Du der Meinung bist, dass Deine Datenschutzrechte verletzt wurden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>X. Schlussbemerkungen</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. &Auml;nderung der Datenschutzerkl&auml;rung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School beh&auml;lt sich das Recht vor, diese Datenschutzerkl&auml;rung von Zeit zu Zeit zu aktualisieren und zu &auml;ndern, um sie an ge&auml;nderte rechtliche Anforderungen, technologische Entwicklungen und organisatorische Anforderungen anzupassen. Wir werden alle wesentlichen &Auml;nderungen in dieser Datenschutzerkl&auml;rung hervorheben und das Datum der letzten Aktualisierung am Ende der Erkl&auml;rung angeben.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wenn wesentliche &Auml;nderungen vorgenommen werden, die sich auf die Verarbeitung Deiner personenbezogenen Daten auswirken, werden wir Dich dar&uuml;ber in geeigneter Weise informieren, zum Beispiel durch eine E-Mail oder eine Benachrichtigung auf unserer Website, bevor die &Auml;nderungen wirksam werden. Wir empfehlen Dir, diese Datenschutzerkl&auml;rung regelm&auml;&szlig;ig zu &uuml;berpr&uuml;fen, um auf dem Laufenden zu bleiben.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Falls Du mit den &Auml;nderungen der Datenschutzerkl&auml;rung nicht einverstanden bist, hast Du das Recht, der Verarbeitung Deiner personenbezogenen Daten gem&auml;&szlig; den ge&auml;nderten Bedingungen zu widersprechen. In diesem Fall kannst Du uns kontaktieren, um weitere Informationen oder Anweisungen zu erhalten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Kontakt</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Solltest Du Fragen oder Anliegen bez&uuml;glich dieser Datenschutzerkl&auml;rung oder des Datenschutzes im Allgemeinen haben, z&ouml;gere bitte nicht, uns zu kontaktieren. Die Kontaktdaten findest Du im Kapitel II dieser Datenschutzerkl&auml;rung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Letzte Aktualisierung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diese Datenschutzerkl&auml;rung wurde zuletzt am 23.10.2023 aktualisiert. Bitte &uuml;berpr&uuml;fe die Datenschutzerkl&auml;rung regelm&auml;&szlig;ig, um sicherzustellen, dass Du &uuml;ber aktuelle Informationen in Bezug auf den Datenschutz bei der ONSITES Graduate School verf&uuml;gst.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'privacy-policy');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(179, '<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Accreditation Through Cooperation</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School offers high-quality study programs in conjunction with accredited educational institutions in Germany and abroad, which act as official cooperation partners. Your benefit: <strong><em>online courses with a quality guarantee</em></strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>This Is Why Accreditation Matters For You</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Accreditation guarantees the high quality of our study programs. Thus, it fulfills two major functions for you at the same time. It serves as</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Security policy</strong></span>: an accreditation is an expression of an <strong><em>independent quality judgment</em></strong> about the study program; it gives you the security of a high-quality academic education.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Quality label</strong></span>: a completed study program with accreditation is an <strong><em>ideal figurehead</em></strong> for job applications; it confirms the high quality of your education to your potential employer.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>But What Does Accreditation Mean Anyway? </strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Accreditation means the process of <strong>quality assurance</strong> of study programs and teaching. The process is carried out by an independent audit committee of external experts.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The committee checks, among other things, whether the study concept is coherent, the practical relevance is guaranteed, the content taught is sufficient and the study requirements can be met within the specified period of time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The successful completion of the audit is documented in the form of an accreditation certificate.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Akkreditierung durch Kooperation</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School bietet hochwertige Studienprogramme in Verbindung mit akkreditierten Bildungsinstitutionen im In- und Ausland an, die als offizielle Kooperationspartner&nbsp;agieren. Dein Benefit: ein <strong><em>Online-Studium mit Qualit&auml;tsgarantie</em></strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Darum ist eine Akkreditierung f&uuml;r Dich wichtig</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Akkreditierung garantiert die hohe Qualit&auml;t unserer Studieng&auml;nge. Damit erf&uuml;llt sie f&uuml;r Dich gleich&nbsp;zwei wichtige Funktionen. Sie dient als</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Sicherheitspolice</strong></span>: eine Akkreditierung ist Ausdruck eines <strong><em>unabh&auml;ngigen Qualit&auml;tsurteils</em></strong> &uuml;ber das Studium; sie gibt Dir die Sicherheit einer&nbsp;hochwertigen akademischen Ausbildung.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>G&uuml;tezeichen</strong></span>: ein abgeschlossenes Studium mit Akkreditierung ist ein <strong><em>optimales Aush&auml;ngeschild</em></strong> bei Bewerbungen; es best&auml;tigt Deinem potenziellen Arbeitgeber die hohe Qualit&auml;t Deiner Ausbildung.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Aber was bedeutet Akkreditierung &uuml;berhaupt? </strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Akkreditierung bedeutet das Verfahren der <strong>Qualit&auml;tssicherung</strong> von Studium und Lehre. Der Prozess erfolgt durch ein unabh&auml;ngiges Pr&uuml;fungsgremium aus externen Gutachtern.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Das Komitee pr&uuml;ft unter anderem, ob das Studienkonzept schl&uuml;ssig ist, der Praxisbezug gew&auml;hrleistet ist, die vermittelten Inhalte ausreichend sind und die Studienanforderungen im vorgegebenen Zeitraum erf&uuml;llt werden k&ouml;nnen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die erfolgreich durchgef&uuml;hrte Pr&uuml;fung wird in Form einer Akkreditierungsurkunde dokumentiert.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text', 'accreditation'),
(180, 'Accreditation Guarantees The Quality Of Your Studies', 'Akkreditierung –  Dein Qualitätsgarant fürs Studium', '', '', '', 0, 'heading', 'accreditation'),
(181, 'Shaping Trust: Our Imprint For Transparency', 'Vertrauen gestalten: Unser Impressum für Transparenz', '', '', '', 0, 'heading', 'imprint'),
(182, '<p><strong>ONSITES Graduate School LLC</strong><br />\r\n<br />\r\n<strong>Headquarter</strong><br />\r\n7901 4TH ST. N #20418<br />\r\nSt. PETERSBURG<br />\r\nFL 33702<br />\r\nUSA<br />\r\n<br />\r\n<strong>Authorized representative</strong><br />\r\nDr. Mathias Kunze<br />\r\n<br />\r\n<strong>Phone</strong><br />\r\n+1 850 298 80 50<br />\r\n<br />\r\n<strong>Email</strong><br />\r\nhello(at)graduate.me<br />\r\n<br />\r\n<strong>Registration Number</strong><br />\r\nFlorida Department of State, L23000481280<br />\r\n<br />\r\n<strong>Employer Identification Number (EIN) </strong><br />\r\n61-2143015<br />\r\n<br />\r\n<strong>Branch ZURICH (Switzerland) </strong><br />\r\nSihleggstrasse 23<br />\r\nWollerau<br />\r\n8832<br />\r\nSwitzerland<br />\r\n<br />\r\n<strong>Branch VARNA (Bulgaria)</strong><br />\r\n56th Road No. 16<br />\r\nSt. St. Constantine &amp; Elena<br />\r\nVarna<br />\r\n9006<br />\r\nBulgaria<br />\r\n<br />\r\n<strong>Copyright holder of the images &amp; icons</strong><br />\r\nImages: Unsplash<br />\r\nIcons on the contact page: FlatIcon</p>', '<p><strong>ONSITES Graduate School LLC</strong><br />\r\n<br />\r\n<strong>Hauptsitz</strong><br />\r\n7901 4TH ST. N #20418<br />\r\nSt. PETERSBURG<br />\r\nFL 33702<br />\r\nUSA<br />\r\n<br />\r\n<strong>Vertretungsberechtigte Person</strong><br />\r\nDr. Mathias Kunze<br />\r\n<br />\r\n<strong>Telefon</strong><br />\r\n+1 850 298 80 50<br />\r\n<br />\r\n<strong>E-Mail</strong><br />\r\nhello(at)graduate.me<br />\r\n<br />\r\n<strong>Registrierungsnummer</strong><br />\r\nFlorida Department of State, L23000481280<br />\r\n<br />\r\n<strong>Steuernummer (EIN) </strong><br />\r\n61-2143015<br />\r\n<br />\r\n<strong>Niederlassung Z&Uuml;RICH (Schweiz) </strong><br />\r\nSihleggstrasse 23<br />\r\nWollerau SZ<br />\r\n8832<br />\r\nSchweiz<br />\r\n<br />\r\n<strong>Niederlassung VARNA (Bulgarien) </strong><br />\r\n56th Road No. 16<br />\r\nSt. St. Constantine &amp; Elena<br />\r\nVarna<br />\r\n9006<br />\r\nBulgarien<br />\r\n<br />\r\n<strong>Urheberrechteinhaber der Bilder &amp; Icons</strong><br />\r\nBilder: Unsplash<br />\r\nIcons auf der Kontakt-Seite: FlatIcon</p>', '', '', '', 1, 'text', 'imprint'),
(185, 'ONSITES GRADUATE SCHOOL', 'ONSITES GRADUATE SCHOOL', '', '', '', 0, 'onsites-school', 'header-nav'),
(186, 'Get Advice Now', 'Studienberatung', '', '', '', 0, 'advice', 'header-nav'),
(187, 'Get Free Advice Now', 'Jetzt kostenlos beraten lassen', 'dd', 'dd', 'dd', 0, 'button', 'recognition'),
(188, 'Programs', 'Programme', 'f', 'f', 'f', 0, 'programs', 'footer'),
(189, '<p>A solid education serves as the fundamental requirement for securing a desirable job, a stable income, and personal prosperity. This holds especially true for professions that face a scarcity of skilled specialists due to increased demands and other factors. Notable examples include roles in IT jobs, digitalization jobs, health care jobs, and business jobs. Consequently, the demand for highly trained IT and healthcare professionals, as well as forward-thinking business administrators and economists, is often pressing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As an education institution committed to social and political responsibility, ONSITES Graduate School offers cutting-edge online study programs through advanced online platforms, ensuring students can pursue fields with promising career prospects. Take advantage of the growing demand for qualified professionals by pursuing a Master&#39;s degree in <a href=\"https://graduate.me/en/master-degree/it-management\">IT Management</a> and <a href=\"https://graduate.me/en/master-degree/health-sciences\">Health Science&nbsp;</a>or an <a href=\"https://graduate.me/de/mba/cyber-security-studium\">MBA in Cyber Security</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you are already working and aspire to reach the highest levels of your profession?&nbsp;Then our job-accompanying&nbsp;<a href=\"https://graduate.me/en/doctorate\">doctorate </a>programs present an exceptional opportunity to establish yourself as a top-tier manager, with the added prestige of earning a doctoral degree.</p>', '<p>Eine fundierte Bildung ist die Grundvoraussetzung f&uuml;r einen guten Arbeitsplatz, ein sicheres Einkommen sowie pers&ouml;nlichen Wohlstand. Das gilt in besonderem Ma&szlig;e bei jenen Jobs, die u.a. aufgrund erh&ouml;hter Anforderungen einen Mangel an qualifizierten Fachkr&auml;ften verzeichnen. Prominente Beispiele sind IT-Jobs und Jobs in der Digitalisierung, Healthcare-Jobs sowie BWL-Jobs. So besteht mitunter ein dringender Bedarf an topausgebildeten IT- und Gesundheits-Experten sowie innovativen Betriebswirten und Wirtschaftswissenschaftlern.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Als sozialpolitisch verantwortungsvolle Bildungsinstitution bietet die ONSITES Graduate School gezielt topaktuelle Online-Studieng&auml;nge in zukunftssicheren Bereichen mit hohem Karrierepotential an. Nutze die Chancen des Fachkr&auml;ftebedarfs mit einem aussichtsreichen Master-Studium in <a href=\"https://graduate.me/de/master/it-management\">IT-Management </a>und <a href=\"https://graduate.me/de/master/gesundheitswissenschaften\">Gesundheitswissenschaften</a>&nbsp;oder einem MBA-Studium in <a href=\"https://graduate.me/de/mba/cyber-security-studium\">Cyber Security</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du bist bereits berufst&auml;tig und Dich zieht es ganz an die Spitze? Dann&nbsp;hast Du im Rahmen unserer <a href=\"https://graduate.me/de/doktorat\">berufsbegleitenden&nbsp;Doktorate</a> die M&ouml;glichkeit, Dich mit einem prestigetr&auml;chtigen Doktor-Titel optimal in den obersten F&uuml;hrungsetagen zu positionieren.</p>', NULL, NULL, NULL, 1, 'reason-one-text', 'welcome'),
(190, '1. Future-Proof Study Programs', '1. Studiengänge mit Zukunft', 'fggh', 'fffghg', 'fghfh', 0, 'reason-one-heading', 'welcome'),
(191, '2. Linking Theory & Practice', '2. Verknüpfung von Theorie & Praxis', 'gffg', 'fgfg', 'fgf', 0, 'reason-two-heading', 'welcome'),
(192, '<p>Online learning at ONSITES Graduate School is characterized by a high level of practical relevance and application orientation. In today&#39;s fast-paced and ever-evolving professional landscape, adaptability and versatility have become the new norm. To equip you for the heightened demands of the modern workplace, we prioritize the integration of practical and relevant content. Therefore, current problem cases from practice form an integral part of the teaching at ONSITES Graduate School.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Using authentic case studies as well as comprehensible practical examples in e-books, tutorials and other learning materials, you will gain valuable insights into real-world problem situations and deal with them independently.Immerse yourself in our comprehensive online courses through our dynamic distance learning programs. Gain the independence and confidence to tackle challenges head-on, armed with the knowledge gained from our comprehensive curriculum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>But our commitment to excellence doesn&#39;t stop there. We bring the industry to you through interactive online lectures led by seasoned professionals who bring their wealth of experience to the virtual classroom. Engage in meaningful discussions, share perspectives, and forge valuable connections that can shape your future career. Additionally, we offer practice-intensive <a href=\"https://graduate.me/en/coaching-services\">coaching</a>, <a href=\"https://graduate.me/en/conferences-workshops\">conferences and workshops</a> to further refine your individual skills and propel you to new heights.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The unique synergy between theory and practice at ONSITES Graduate School empowers you to seamlessly apply your newly acquired knowledge directly to your professional endeavors, generating immediate and tangible value for both your current and future employers. Embrace the future of learning with our state-of-the-art Distance Learning Courses and unlock your full potential.</p>', '<p>Das Online-Studium an der ONSITES Graduate School zeichnet sich durch einen hohen Praxisbezug und Anwendungsorientierung aus. Vielseitigkeit und permanente Anpassung an Ver&auml;nderungen sind in der heutigen dynamischen&nbsp;Arbeitswelt die Norm. Um Dich optimal auf die erh&ouml;hten beruflichen Anforderungen vorzubereiten, sind praxisnahe und praktisch anwendbare Inhalte wesentlich. Daher bilden aktuelle Problemf&auml;lle aus der Praxis einen festen Bestandteil der Lehre an der ONSITES Graduate School.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Anhand von authentischen Fallstudien sowie verst&auml;ndlichen Praxisbeispielen in e-Books, Tutorials und weiteren Lernmaterialien erh&auml;ltst Du wertvolle Einblicke in realit&auml;tsnahe Problemsituationen aus der Praxis und setzt Dich mit diesen selbst&auml;ndig auseinander. Erg&auml;nzend hinzu kommen interaktive Online-Vorlesungen mit erfahrenen Profis aus Industrie und Wirtschaft, die Erfahrungsaustausch und Netzwerkbildung auf Augenh&ouml;he erm&ouml;glichen. Zudem bieten wir praxisintensive <a href=\"https://graduate.me/de/coaching\">Coachings</a>, <a href=\"https://graduate.me/de/konferenzen-und-workshops\">Konferenzen und Workshops</a> an, in denen wir Deine individuellen Kompetenzen weiterentwickeln.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die starke Theorie-Praxis-Verkn&uuml;pfung&nbsp;der Lehre an der ONSITES Graduate School erm&ouml;glicht Dir, das vermittelte Wissen umgehend in Deiner beruflichen Praxis umzusetzen und damit einen sofort sp&uuml;rbaren Mehrwert f&uuml;r Deinen aktuellen oder k&uuml;nftigen Arbeitgeber zu generieren.</p>', '<p>fgfg</p>', '<p>fgfg</p>', '<p>fgfg</p>', 1, 'reason-two-text', 'welcome'),
(193, '<p>At ONSITES Graduate School, we value your prior accomplishments and offer you the opportunity to have them duly recognized. By crediting your previous achievements, we can significantly reduce your study time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whether it&#39;s academic achievements from other esteemed institutions, professional milestones, or non-academic degrees such as those conferred by the Chamber of Industry and Commerce, state-certified business economist, or business administrator, we welcome the chance to acknowledge your accomplishments. While non-academic achievements are recognized on a flat-rate basis, our approach to academic achievements is tailored to consider each case individually.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you have completed vocational training, our <a href=\"https://graduate.me/en/bachelor-degree\">Bachelor&#39;s programs</a> offer&nbsp;a <a href=\"https://graduate.me/en/bachelor-degree/bba-fast-track\">fast-track</a> option as well as&nbsp;a <a href=\"https://graduate.me/en/bachelor-degree/professional-in-business\">Bachelor Professional </a>option specifically designed to leverage your existing expertise. Furthermore, a completed online course can be seamlessly integrated into our <a href=\"https://graduate.me/en/master-degree\">Master&#39;s</a> or <a href=\"https://graduate.me/en/mba\">MBA</a> programs. For more detailed information, click <a href=\"https://graduate.me/en/recognition-of-prior-learning\">here</a>.</p>', '<p>Wenn Du Vorleistungen mitbringst, besteht die M&ouml;glichkeit, diese von uns anerkennen zu lassen. Die Anrechnung bisheriger Leistungen reduziert Deine&nbsp;Studienzeit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Infrage kommen akademische Vorleistungen, die Du an anderen Hochschulen erbracht hast, berufsbezogene Vorleistungen und nicht-akademische Abschl&uuml;sse (z.B. IHK-Abschluss, staatlich gepr&uuml;fter Betriebswirt, Fachwirt, Fortbildungen etc.). W&auml;hrend die Anerkennung bei nicht-akademischen Vorleistungen pauschal erfolgt, ber&uuml;cksichtigen wir akademische Leistungen individuell.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mit einer abgeschlossenen Berufsausbildung hast Du die M&ouml;glichkeit, die <a href=\"https://graduate.me/de/bachelor/bba\">Fast-Track-Option</a>&nbsp;bzw. die <a href=\"https://graduate.me/de/bachelor/professional-in-business\">Bachelor Professional</a>-Option unseres <a href=\"https://graduate.me/de/bachelor\">Bachelor-Studiums </a>in Anspruch zu nehmen. Ein abgeschlossenes Online-Studium mit Zertifikat kann als Teil eines <a href=\"https://graduate.me/de/master\">Master-Studiums</a> bzw. <a href=\"https://graduate.me/de/mba\">MBA-Studiums</a> anerkannt werden. N&auml;here Infos erh&auml;ltst Du <a href=\"https://graduate.me/de/studium-verkuerzen\">hier</a>.</p>', '<p>fgfgf</p>', '<p>fgfg</p>', '<p>fgfgfg</p>', 1, 'reason-three-text', 'welcome'),
(194, '3. Recognition Of Prior Learning', '3. Studium verkürzen', 'fgf', 'fgfg', 'fgf', 0, 'reason-three-heading', 'welcome'),
(195, '4. Study While Working', '4. Studieren neben dem Beruf', 'fgfg', 'fgf', 'fgfg', 0, 'reason-four-heading', 'welcome'),
(196, '<p>We recognize the importance of flexibility and strive to make all our degree programs accessible for working professionals like you. This unique opportunity allows you to achieve both personal and professional growth without sacrificing your full-time career. Whether you aspire to enhance your academic qualifications or acquire new professional skills, our job-accompanying study programs cater to your needs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>An extra-occupational study program at ONSITES Graduate School holds immense appeal, especially for recent graduates seeking to gain practical experience before pursuing further qualifications. It enables you to strike the perfect balance between gaining valuable professional insights and investing in additional educational endeavors.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With such a study arrangement, you have the freedom to tailor your learning journey to your own pace. Rather than adapting your life to fit your studies, you have the flexibility to adapt your studies to your professional commitments.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Moreover, the benefits extend beyond flexibility alone. Your employer can offer financial support, flexible working hours, and special leave to accommodate your educational pursuits. They understand the mutual advantage of investing in your growth. By expanding your knowledge and skills while actively contributing to your job, you become an invaluable asset to your company.</p>', '<p>S&auml;mtliche Studieng&auml;nge an der ONSITES Graduate School k&ouml;nnen berufsbegleitend studiert werden. Damit schl&auml;gst Du zwei Fliegen mit einer Klappe: Du qualifizierst Dich akademisch oder fachlich weiter, ohne Deine berufliche Vollzeitt&auml;tigkeit unterbrechen zu m&uuml;ssen. Ein berufsbegleitendes Studium an der ONSITES Graduate School ist daher auch besonders f&uuml;r Ausbildungsabsolventen interessant. Denn es erm&ouml;glicht Dir, zun&auml;chst Berufserfahrungen zu sammeln und Dich sp&auml;ter um Zusatzqualifikationen&nbsp;zu k&uuml;mmern.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berufsbegleitend studieren erlaubt Studieren im eigenen Tempo. Anstatt Dein Leben dem Studium anzupassen, passt Du Dein Studium Deinem Berufsleben an.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Und das Beste: Dein Arbeitgeber kann Dich dabei unterst&uuml;tzen, sei es finanziell oder in Form von flexiblen Arbeitszeiten und Sonderurlaub. Schlie&szlig;lich profitiert auch er von Deinem berufsbegleitenden Studium. So betrachtet erweist sich Studieren neben dem Beruf als eine Win-Win-Situation: Indem Du Dir neben der Aus&uuml;bung des Berufs zus&auml;tzliche Kenntnisse und Skills aneignest, die Du direkt in Deine berufliche T&auml;tigkeit einbringen kannst, stellst Du einen Mehrwert f&uuml;r das Unternehmen dar.</p>', '<p>fgf</p>', '<p>fgf</p>', '<p>fgfg</p>', 1, 'reason-four-text', 'welcome'),
(197, '<p>ONSITES Graduate School believes in fostering inclusivity and ensuring that everyone has a chance to pursue their academic aspirations. We understand that the traditional route to obtaining a high school diploma and undergraduate degree may not always be feasible for everyone. That&#39;s why we offer a flexible and alternative approach to access higher education.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Traditionally, access to a <a href=\"https://graduate.me/en/bachelor-degree\">bachelor&#39;s degree</a> program in Germany relies on proof of a school-based university entrance qualification, such as Abitur or Fachabitur. However, at ONSITES Graduate School, we embrace diversity and acknowledge that individuals with completed vocational training and, respectively,&nbsp;additional&nbsp;advanced&nbsp;training equivalent to Abitur (e.g., business administrator, state-certified business economist), have valuable skills and knowledge that make them eligible for our Bachelor&#39;s program.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The same inclusive approach applies to our <a href=\"https://graduate.me/en/master-degree\">Master&#39;s</a> and <a href=\"https://graduate.me/en/mba\">MBA</a> programs. We recognize that extensive professional experience in a relevant field, coupled with a general university entrance qualification and successful completion of an aptitude test, can demonstrate your readiness for advanced studies, eliminating the need for a completed first degree. Regardless of your educational background, we are here to guide you on your journey towards achieving your study goals.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Embrace the opportunity to pursue higher education through direct or indirect means, and let us support you every step of the way.</p>', '<p>Wenn es um den Zugang zum einem akademischen Erststudium und Zweitstudium geht, zeigt sich<strong> </strong>die ONSITES Graduate School &auml;u&szlig;erst flexibel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der Zugang zum <a href=\"https://graduate.me/de/bachelor\">Bachelor-Studium</a> an einer Hochschule in Deutschland erfolgt klassischerweise durch Nachweis einer schulischen Hochschulzugangsberechtigung in Form eines Abiturs bzw. Fachabiturs. Die ONSITES Graduate School bietet neben diesem direkten Weg einen alternativen Zugang an. Personen mit einer abgeschlossenen Berufsausbildung bzw. einer zus&auml;tzlichen, dem Abitur &auml;quivalenten beruflichen Fortbildung (z.B. Fachwirt, staatlich gepr&uuml;fter Betriebswirt) k&ouml;nnen ebenfalls zum Bachelor-Studium zugelassen werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Analoges gilt f&uuml;r die Aufnahme eines <a href=\"https://graduate.me/de/master\">Master-Studiums</a> oder <a href=\"https://graduate.me/de/mba\">MBA-Studiums</a>. Wer eine allgemeine Hochschulzugangsberechtigung sowie langj&auml;hrige Berufserfahrung in einem einschl&auml;gigen Berufsfeld vorweisen kann und zudem einen Eignungstest besteht, ben&ouml;tigt f&uuml;r die Zulassung kein abgeschlossenes Erststudium.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ob auf direktem oder indirektem Wege &ndash; wir f&uuml;hren Dich sicher an Dein Studienziel!</p>', '<p>gfgfg</p>', '<p>fgfg</p>', '<p>fgfg</p>', 1, 'reason-five-text', 'welcome'),
(198, '5. Study Without Traditional Requirements', '5. Studieren ohne Abitur & Erststudium', 'gfgf', 'fgf', 'fgf', 0, 'reason-five-heading', 'welcome'),
(200, 'Questions about your desired studies?', 'Fragen zu Deinem Wunschstudium?', 'f', 'f', 'f', 0, 'phone-box-heading', 'footer'),
(201, 'We will call you back and advise you.', 'Wir rufen zurück und beraten Dich gern.', 'f', 'f', 'f', 0, 'phone-box-subheading', 'footer'),
(202, 'What\'s the best time for you?', 'Wann passt es Dir am besten?', 'f', 'f', 'f', 0, 'phone-box-time-label', 'footer'),
(203, '08:00-10:00', '08:00-10:00', 'f', 'f', 'f', 0, 'phone-box-period-one', 'footer'),
(204, '10:00-12:00', '10:00-12:00', 'f', 'f', 'f', 0, 'phone-box-period-two', 'footer'),
(205, '12:00-14:00', '12:00-14:00', 'f', 'f', 'f', 0, 'phone-box-period-three', 'footer'),
(206, '14:00-16:00', '14:00-16:00', 'f', 'f', 'f', 0, 'phone-box-period-four', 'footer'),
(207, '16:00-18:00', '16:00-18:00', 'f', 'f', 'f', 0, 'phone-box-period-five', 'footer'),
(208, 'I have taken note of the Privacy Policy.', 'Ich habe die Datenschutzbestimmungen zur Kenntnis genommen.', 'fgghf', 'f', 'f', 0, 'phone-box-checkbox', 'footer'),
(209, 'Send', 'Senden', 'f', 'f', 'f', 0, 'phone-box-send-btn', 'footer'),
(210, 'Name and surname', 'Vorname und Nachname', 'f', 'f', 'f', 0, 'phone-box-name-placeholder', 'footer'),
(211, 'Phone', 'Telefon', 'f', 'f', 'f', 0, 'phone-box-phone-placeholder', 'footer'),
(212, 'Online Courses That Work:', 'Online-Studium neu denken:', 'Who are we bg', 'Who are we es', 'Who are we Ru', 0, 'slogan-first-part', 'welcome'),
(213, 'The Fast and Smart Way To Your Bachelor\'s, Master\'s, or PhD', 'Schnell und smart zu Bachelor, Master oder Doktor', 'fg', 'fgf', 'fgfg', 0, 'slogan-second-part', 'welcome'),
(214, 'Study part-time without attendance. Online learning on your own schedule.', 'Berufsbegleitendes Studium ohne Präsenz. Online studieren & weiterbilden nach Deinem Zeitplan.', 'fg', 'fgf', 'fgfg', 0, 'program-heading', 'welcome'),
(215, 'Find the course', 'Studiengang finden', 'fg', 'fg', 'fg', 0, 'select-program-option', 'welcome'),
(216, '100% autonomous', '100% autonom', 'fg', 'fg', 'fg', 0, 'first-benefit-heading', 'welcome'),
(217, '365-day support', '365-Tage-Support', 'fgf', 'fg', 'fg', 0, 'second-benefit-heading', 'welcome'),
(218, 'Education with accreditation', 'Garantiert akkreditiert', 'fgf', 'fgf', 'fgfg', 0, 'third-benefit-heading', 'welcome'),
(219, '<p>Flexible &amp; free: Study when &amp; where you want. Immediate entry &amp; free extension possible. Perfect for career trainees &amp; career changers.</p>', '<p>Flexibel &amp; frei: Studiere wann &amp; wo Du willst. Soforteinstieg &amp; kostenfreie Verl&auml;ngerung m&ouml;glich. Perfekt f&uuml;r Berufspraktiker &amp; Quereinsteiger.</p>', '<p>fgf</p>', '<p>fgf</p>', '<p>fgfg</p>', 1, 'first-benefit-text', 'welcome'),
(220, '<p>We are always by your side - from start to finish. Experience a special kind of study guidance: personal, individual &amp; comprehensive.</p>', '<p>Wir sind stets an Deiner Seite &ndash; von Anfang bis Ende. Erlebe Studienberatung auf besondere Art: pers&ouml;nlich, individuell &amp; umfassend.</p>', '<p>fgf</p>', '<p>fg</p>', '<p>fgfg</p>', 1, 'second-benefit-text', 'welcome'),
(221, '<p>We cooperate exclusively with accredited partner universities. The <a href=\"https://graduate.me/en/accreditation-partners\" style=\"color:blue; text-decoration:underline\">accreditation</a> of our partners is testament to the top quality of our study&nbsp;programs.</p>', '<p>Wir kooperieren ausschlie&szlig;lich mit akkreditierten Partnerhochschulen. Die <a href=\"https://graduate.me/de/akkreditierung-und-partner\" style=\"color:blue; text-decoration:underline\">Akkreditierung</a> unserer Partner attestiert die Top-Qualit&auml;t unserer Studieng&auml;nge.</p>', '<p>fgfg</p>', '<p>fgfg</p>', '<p>fgfg</p>', 1, 'third-benefit-text', 'welcome'),
(222, '5 Reasons For Online Learning At ONSITES Graduate School', '5 Gründe für ein Online-Studium mit ONSITES Graduate School', 'fgf', 'fgf', 'fgfg', 0, 'reason-section-heading', 'welcome'),
(223, 'Our Strong Partners', 'Unsere starken Partner', 'fgfg', 'fg', 'fg', 0, 'partners-section-heading', 'welcome'),
(224, '<h3>Get Your <span style=\"color:#e74c3c\">FREE </span>FactSheet Now</h3>', '<h3>Sichere Dir jetzt Deinen&nbsp;<span style=\"color:#e74c3c\">GRATIS</span>-FactSheet</h3>', 'fgfg', 'fggfg', 'fgfg', 1, 'contact-form-heading', 'welcome'),
(225, 'Ms.', 'Frau', 'fgg', 'fg', 'fgf', 0, 'contact-form-woman-option', 'welcome'),
(226, 'Mr.', 'Herr', 'fgf', 'fgf', 'gfg', 0, 'contact-form-man-option', 'welcome'),
(227, 'First name', 'Vorname', 'fg', 'fg', 'fg', 0, 'contact-form-first-name', 'welcome'),
(228, 'Last name', 'Nachname', 'fgfg', 'fg', 'fg', 0, 'contact-form-last-name', 'welcome'),
(229, 'Email', 'E-Mail', 'fgf', 'gfg', 'fggf', 0, 'contact-form-email', 'welcome'),
(230, 'Phone (optional)', 'Telefon (optional)', 'fgf', 'fg', 'fgf', 0, 'contact-form-phone', 'welcome'),
(231, 'I agree to receive information about the online study programs you offer by e-mail.', 'Ich erkläre mich einverstanden, Informationen zu Ihrem Studienangebot per E-Mail zu erhalten. ', '-', '-', '-', 0, 'contact-form-checkbox-one', 'welcome'),
(232, 'I agree to receive advice on courses offered by you by telephone.', 'Ich erkläre mich einverstanden, mich telefonisch zu Ihrem Studienangebot beraten lassen.', '<p>gfg</p>', '<p>gfg</p>', '<p>fg</p>', 0, 'contact-form-checkbox-two', 'welcome'),
(233, '<p>&nbsp;</p>\r\n\r\n<p><strong>Would you like to learn more?</strong></p>\r\n\r\n<p><strong>Simply request all information about your desired online&nbsp;learning program now - 100% <span style=\"color:red\">FREE</span>.</strong></p>', '<p>&nbsp;</p>\r\n\r\n<p><strong>Du m&ouml;chtest mehr erfahren?</strong></p>\r\n\r\n<p><strong>Dann fordere jetzt alle Infos zu Deinem gew&uuml;nschten Online-Studium an &ndash; 100% <span style=\"color:red\">GRATIS <span style=\"color:red\">.</span></span></strong></p>', '<p>gfg</p>', '<p>gfg</p>', '<p>fgfg</p>', 1, 'contact-form-text-after-select-program', 'welcome'),
(234, 'What Graduates Say About Our Online Courses', 'Das sagen Absolventen über unser Online-Studium', 'gfg', 'fg', 'fgf', 0, 'testimonials-section-heading', 'welcome'),
(235, 'Gain Inspiring Insights In Our Blog', 'Unser Blog: Finde spannende Wissenshighlights', 'gfg', 'fg', 'fg', 0, 'news-section-heading', 'welcome'),
(236, 'View all', 'Alle ansehen', 'fgfg', 'fg', 'fg', 0, 'view-all-button', 'welcome'),
(237, 'Discover The Many Benefits Of Our Online Courses', 'Entdecke die vielen Vorzüge unseres Online-Studiums', '-', '-', '-', 0, 'benefits-heading', 'welcome'),
(238, 'Request now for free', 'Jetzt gratis anfordern', '-', '-', '-', 0, 'contact-form-request-now', 'welcome'),
(239, 'Online Learning At Your Own Pace | ONSITES Graduate School', 'Online-Studium mit Günstiggarantie | ONSITES Graduate School', '-', '-', '-', 0, 'meta-title', 'welcome'),
(240, 'You want to study from home & alongside your job? Discover our future-proof online learning programs. ✔ Flexible ✔ Practice-oriented ✔ Accredited. Click now!', 'Du möchtest 100% online & berufsbegleitend studieren? Dann ist unser Fernstudium die richtige Wahl. ✔ Flexibel ✔ Praxisorientiert ✔ Akkreditiert. Jetzt klicken!', '-', '-', '-', 0, 'meta-description', 'welcome'),
(241, 'Discover More Exciting Articles', 'Entdecke weitere spannende Beiträge', '-', '-', '-', 0, 'all-news-heading', 'single-blog'),
(242, 'Show All', 'Alle anzeigen', 'All', '-', '-', 0, 'all-news-button', 'single-blog'),
(243, 'Welcome To Our Student Portal: Your Online Application Center', 'Bewerbung Studium: Der erste Schritt zu Deinem Abschluss', 'Application for study at Open Institute', 'Application for study at Open Institute', '-', 0, 'heading', 'study-registration'),
(244, 'Please select your desired study program', 'Bitte wähle Deinen gewünschten Studiengang aus', '-', '-', '-', 0, 'select-program', 'study-registration'),
(245, 'Please select an option', 'Bitte Option auswählen', '-', '-', '-', 0, 'select-option', 'study-registration'),
(246, 'What degree are you aiming for?', 'Welchen Abschluss strebst Du an?', '-', '-', '-', 0, 'degree', 'study-registration'),
(247, 'Please select your desired time model', 'Bitte wähle Dein gewünschtes Zeitmodell', '-', '-', '-', 0, 'time-model', 'study-registration'),
(248, '6 Months', '6 Monate', '-', '-', '-', 0, '6-months', 'study-registration'),
(249, '12 Months', '12 Monate', '-', '-', '-', 0, '12-months', 'study-registration'),
(250, '1 Year', '1 Jahr', '-', '-', '-', 0, '1-year', 'study-registration'),
(251, 'Enrollment fee', 'Immatrikulationsgebühr', '-', '-', '-', 0, 'application-fee', 'study-registration'),
(252, 'Examination fee (paid before final exam)', 'Prüfungsgebühr (vor der Abschlussprüfung zu zahlen)', '-', '-', '-', 0, 'examination-fee', 'study-registration'),
(253, 'After submitting this form you will receive an email with payment details and you ought to pay the application fee of 600.00 EUR. If your application is approved, you ought to pay the tuition fee (the whole amount or the first installment) in order to be enrolled. And the examination fee is paid at the end of the education.', 'Nach dem Absenden dieses Formulars erhältst Du eine E-Mail mit den Zahlungsmodalitäten und der Aufforderung, die Anmeldegebühr von 600,00 EUR zu entrichten. Wenn Deine Bewerbung angenommen wird, solltest Du die Studiengebühr (den gesamten Betrag oder die erste Rate) bezahlen, um eingeschrieben zu werden. Die Prüfungsgebühr wird am Ende der Ausbildung gezahlt.', '-', '-', '-', 0, 'further-details-one', 'study-registration'),
(254, 'Further details will be sent to you via email after submitting the application and paying the enrollment fee.', 'Weitere Einzelheiten werden Dir nach Einreichung der Bewerbung und Zahlung der Einschreibegebühr per E-Mail zugesandt.', '-', '-', '-', 0, 'further-details-two', 'study-registration'),
(255, 'Personal information', 'Angaben zur Person', '-', '-', '-', 0, 'personal-information', 'study-registration'),
(256, 'First name', 'Vorname', '-', '-', '-', 0, 'first-name', 'study-registration'),
(257, 'Middle name', 'Zweiter Vorname', '-', '-', '-', 0, 'middle-name', 'study-registration'),
(258, 'Family name', 'Familienname', '-', '-', '-', 0, 'family-name', 'study-registration'),
(259, 'Birth date', 'Geburtsdatum', '-', '-', '-', 0, 'birthdate', 'study-registration'),
(260, 'Gender', 'Geschlecht', '-', '-', '-', 0, 'gender', 'study-registration'),
(261, 'Female', 'Weiblich', '-', '-', '-', 0, 'female', 'study-registration'),
(262, 'Male', 'Männlich', '-', '-', '-', 0, 'male', 'study-registration'),
(263, 'Personal Documents', 'Persönliche Dokumente', '-', '-', '-', 0, 'personal-documents', 'study-registration'),
(264, 'ID', 'Personalausweis', '-', '-', '-', 0, 'passport', 'study-registration'),
(265, 'CV', 'Lebenslauf', '-', '-', '-', 0, 'cv', 'study-registration'),
(266, 'Degrees', 'Abschlüsse', '-', '-', '-', 0, 'degrees', 'study-registration'),
(267, 'Reference Letter', 'Referenzschreiben', '-', '-', '-', 0, 'reference-letter', 'study-registration'),
(268, 'Your Contact Details', 'Deine Kontaktdaten', '-', '-', '-', 0, 'contact-details', 'study-registration'),
(269, 'Email', 'E-Mail', '-', '-', '-', 0, 'email', 'study-registration'),
(270, 'Phone Number', 'Telefonnummer', '-', '-', '-', 0, 'phone', 'study-registration'),
(271, 'e.g., +49 30 1234 5678', 'z.B. +49 30 1234 5678', '-', '-', '-', 0, 'phone-example', 'study-registration'),
(272, 'Residency', 'Wohnsitz', '-', '-', '-', 0, 'residency', 'study-registration'),
(273, 'Country', 'Land', '-', '-', '-', 0, 'country', 'study-registration'),
(274, 'City', 'Stadt', '-', '-', '-', 0, 'city', 'study-registration'),
(275, 'ZIP Code', 'PLZ', '-', '-', '-', 0, 'zip', 'study-registration'),
(276, 'Address', 'Adresse', '-', '-', '-', 0, 'address', 'study-registration'),
(277, 'District, street number, apartment etc.', 'Ort, Straße, Wohnung etc.', '-', '-', '-', 0, 'address-example', 'study-registration'),
(278, 'Feedback (optional)', 'Feedback (optional)', '-', '-', '-', 0, 'feedback', 'study-registration'),
(279, 'How did you learn about our offer?', 'Wie hast Du von unserem Angebot erfahren?', '-', '-', '-', 0, 'how-you-learn-about-us', 'study-registration'),
(280, 'Internet Search Engine', 'Internet-Suchmaschine', '-', '-', '-', 0, 'internet', 'study-registration'),
(281, 'From a friend', 'Von einem Freund', '-', '-', '-', 0, 'from-friend', 'study-registration'),
(282, 'Other', 'Sonstiges', '-', '-', '-', 0, 'other', 'study-registration'),
(283, 'Why did you choose out institute?', 'Warum hast Du Dich für uns entschieden?', '-', '-', '-', 0, 'why-choose-our-institute', 'study-registration'),
(284, 'Attractive price', 'Attraktiver Preis', '-', '-', '-', 0, 'price', 'study-registration'),
(285, 'Because it is online', 'Weil es online ist', '-', '-', '-', 0, 'onllne', 'study-registration'),
(286, 'Positive opinions', 'Positive Meinungen', '-', '-', '-', 0, 'opinions', 'study-registration'),
(287, 'Attractive study programs', 'Attraktive Studiengänge', '-', '-', '-', 0, 'programs', 'study-registration'),
(288, '<p>I have taken note of the General <a href=\"https://graduate.me/en/terms-conditions\">Terms and Conditions</a> (GTC).</p>', '<p>Ich habe die Allgemeinen <a href=\"https://graduate.me/de/agb\">Gesch&auml;ftsbedingungen</a> (AGB) zur Kenntnis genommen.</p>', '-', '-', '-', 1, 'terms', 'study-registration'),
(289, 'Submit Application Now', 'Bewerbung jetzt versenden', '-', '-', '-', 0, 'submit', 'study-registration'),
(290, 'Student Portal: Apply Online | ONSITES Graduate School', 'Bewerbung Studium | ONSITES Graduate School', '-', '-', '-', 0, 'meta-title', 'study-registration'),
(291, 'Application made easy. With our online student portal. Your study journey starts here. Fill out application form & upload documents – fast & easy. Click now!', 'Bewerbung Studium leicht gemacht. Deine Studienreise startet hier. Einfach Bewerbungsformular ausfüllen & Dokumente hochladen - bequem online. Jetzt klicken!', '-', '-', '-', 0, 'meta-description', 'study-registration'),
(292, 'Smart Studies At Your Own Pace | ONSITES Graduate School', 'Online studieren 100% flexibel | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'digital-studies'),
(293, 'Smart studies without compromise. ✔ Free time management ✔ Digital exams ✔ Individual support. Start your online learning program in 3 steps. Learn more now!', 'Online studieren ohne Abstriche. ✔ Gestaltungsfreiheit ✔ Digitale Prüfungen ✔ Individueller Support. In 3 Schritten zum Traumstudium. Jetzt mehr erfahren!', '', '', '', 0, 'meta-description', 'digital-studies'),
(294, 'Recognition of Prior Learning | ONSITES Graduate School', 'Studium verkürzen | ONSITES Graduate School', 'dd', 'dd', 'dd', 0, 'meta-title', 'recognition'),
(295, 'Take a degree shortcut with Recognition of Prior Learning. Discover your options: ✔ Blanket recognition ✔ Individual recognition. In just 3 steps. Request now!', 'Mit Vorleistungen Studium verk&uuml;rzen. Entdecke Deine Optionen: ✔ Pauschale Anrechnung ✔ Individuelle Anrechnung. In nur 3 Schritten. Jetzt beraten lassen!', 'dd', 'dd', 'dd', 0, 'meta-description', 'recognition'),
(296, 'Student Finance Made Easy | ONSITES Graduate School', 'Studium finanzieren leicht gemacht | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'study-financing'),
(297, 'Leverage your education. Discover flexible student finance options: ✔ Scholarships ✔ Loans ✔ Education funds ✔ Employer sponsorship. Find out now!', 'Studium finanzieren – gewusst wie. Entdecke flexible Förderungsoptionen: ✔ Stipendien ✔ Kredite ✔ Bildungsfonds ✔ Arbeitgeberförderung. Jetzt informieren!', '', '', '', 0, 'meta-description', 'study-financing'),
(298, 'Our Student Assistance Team | ONSITES Graduate School', 'Studienberatung kostenlos | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'student-advisory-service'),
(299, 'Questions about your studies? Our student assistance team is there for you. ✔ phone, ✔ callback, ✔ email. We support you all the way. Contact us now!', 'Fragen zum Studium? Unsere Studienberatung ist jederzeit für Dich da. Per ✔ Telefon, ✔ Rückruftermin oder ✔ E-Mail. Wir freuen uns auf Dich. Jetzt kontaktieren!', '', '', '', 0, 'meta-description', 'student-advisory-service'),
(300, 'About Us | ONSITES Graduate School', 'Über uns | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'about'),
(301, 'Discover distance learning at Onsites Graduate School. Learn about our mission, vision & values as we provide in-home education & career growth. Read more.', 'Wir machen Dich karrierefit für die Zukunft. Erfahre mehr über Deinen Bildungspartner. ✔ Mission ✔ Zielgruppe ✔ Unternehmen ✔ Anspruch ✔ Werte. Jetzt klicken!', '', '', '', 0, 'meta-description', 'about'),
(302, 'Our Lecturers | ONSITES Graduate School', 'Unsere Dozenten | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'academics'),
(303, 'Get to know our team of top-level lecturers from research & business. ✔ Highly qualified  ✔ Pedagogically skilled ✔ Uniting theory & practice. Click here.', 'Lerne unsere Dozenten kennen! Unser Team steht für Lehre aus Leidenschaft. Jeder von ihnen vereint fundiertes Know-how & effektives Do-how. Jetzt mehr erfahren!', '', '', '', 0, 'meta-description', 'academics'),
(304, 'Accreditation & Partners | ONSITES Graduate School', 'Akkreditierung & Partner | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'accreditation'),
(305, 'Excellence guaranteed thanks to accredited programs & strong partners. Find out why accreditation is crucial & discover our trusted network. Learn more!', 'Garantiert exzellent mit akkreditierten Programmen & starken Partnern. Erfahre, warum eine Akkreditierung wichtig ist & entdecke unser Netzwerk. Jetzt klicken!', '', '', '', 0, 'meta-description', 'accreditation'),
(306, 'Blog About Online Education | ONSITES Graduate School', 'Blog über Online-Studium | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'blog'),
(307, 'Explore the ins and outs of online education. In our blog, you will find valuable insights, tips & trends. Stay informed with facts & fun. Read now!', 'Informieren mit Fakten & Fun. Entdecke die Ins & Outs zu Deinem Online-Studium. Spannende Beiträge über Lernen, Lifestyle & Trends. Jetzt kostenfrei lesen!', '', '', '', 0, 'meta-description', 'blog'),
(308, 'Conferences & Workshops | ONSITES Graduate School', 'Konferenzen & Workshops | ONSITES Graduate School﻿', '', '', '', 0, 'meta-title', 'conferences-and-workshops'),
(309, 'Conferences & workshops expand your network. Discover exciting events: ✔ Online & on-site ✔ Expert knowledge ✔ Fresh Ideas ✔ Free feedback. Join now!', 'Konferenzen & Workshops expandieren Dein Netzwerk. Entdecke spannende Events: ✔ Online & vor Ort ✔ Fachwissen ✔ Frische Ideen ✔ Gratis-Feedback. Jetzt buchen!', '', '', '', 0, 'meta-description', 'conferences-and-workshops'),
(310, 'Coaching Services At Eye Level | ONSITES Graduate School', 'Coaching auf Augenhöhe | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'coaching'),
(311, 'Unleash your full potential with our top Coaching services! ✔ Education, management & career ✔ One-on-one & in groups ✔ online & offline. Request now for free!', 'Entdecke Dein Potenzial! Top Coaching in Bildung, Management & Karriere. ✔ Erfahrene Coaches ✔ Einzelcoaching+Gruppencoaching ✔Online+Präsenz. Jetzt anfragen!', '', '', '', 0, 'meta-description', 'coaching'),
(312, 'Book Publishing Custom-Fit | ONSITES Graduate School', 'Buch veröffentlichen nach Wunsch | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'publishing'),
(313, 'Meta title', 'Meta title', '', '', '', 0, 'meta-title', 'recent-publications'),
(314, 'Meta description', 'Meta desc', '', '', '', 0, 'meta-description', 'recent-publications'),
(315, 'Event Calendar | ONSITES Graduate School', 'Eventkalender | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'conference-calendar'),
(316, 'Discover all events at a glance! Our event calendar shows you all the current dates – quickly & easily. Click now, register & take part!', 'Entdecke alle Events auf einen Blick! Unser Eventkalender zeigt Dir alle aktuellen Termine – schnell & bequem. Jetzt klicken, anmelden & teilnehmen!', '', '', '', 0, 'meta-description', 'conference-calendar'),
(319, 'FAQ | ONSITES Graduate School', 'FAQ - Häufig gestellte Fragen | ONSITES Graduate School', '1', '1', '1', 0, 'meta-title', 'faq'),
(320, 'Open questions? Get quick & concise answers to frequently asked questions. Learn more about us, our study programs & our services. Click now!', 'Offene Fragen? Erhalte schnelle Antworten auf häufig gestellte Fragen. Erfahre mehr über uns, unser Studienangebot & unsere Serviceleistungen. Jetzt klicken!', '1', '1', '1', 0, 'meta-description', 'faq'),
(321, 'Imprint | ONSITES Graduate School', 'Impressum | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'imprint'),
(322, 'The imprint of ONSITES Graduate School. All contact details + management & jurisdiction details. Read now!', 'Das Impressum der ONSITES Graduate School. Alle Kontaktdaten + Angaben zur Geschäftsführung & zum Gerichtsstand. Jetzt lesen!', '', '', '', 0, 'meta-description', 'imprint'),
(323, 'Privacy Policy | ONSITES Graduate School', 'Datenschutzerklärung | ONSITES Graduate School', '', '', '', 0, 'meta-title', 'privacy-policy'),
(324, 'Ensuring your data\'s safety is our priority. We handle personal information responsibly & strictly follow GDPR. Learn more about our Privacy Policy.', 'Die Sicherheit Deiner persönlichen Daten ist uns wichtig. Ein verantwortungsvoller Umgang ist für uns selbstverständlich. Jetzt Datenschutzerklärung lesen!', '', '', '', 0, 'meta-description', 'privacy-policy'),
(325, 'From', '', '', '', '', 0, 'from', 'single-conference'),
(326, 'To', '', '', '', '', 0, 'to', 'single-conference'),
(327, 'Places ', '', '', '', '', 0, 'places', 'single-conference'),
(328, 'Apply', '', '', '', '', 0, 'apply', 'single-conference'),
(329, 'Share', '', '', '', '', 0, 'share', 'single-conference'),
(330, 'Deadline', '', '', '', '', 0, 'deadline', 'single-conference'),
(331, '<p>For details about data protection, click <a href=\"https://graduate.me/en/privacy-policy\">here</a>.</p>', '<p>Details zum Datenschutz befinden sich <a href=\"https://graduate.me/de/datenschutz\">hier</a>.</p>', '<p>gfg</p>', '<p>gfg</p>', '<p>fg</p>', 1, 'contact-form-checkbox-additional', 'welcome'),
(332, 'Read more', 'Mehr lesen', '-', '-', '-', 0, 'read-more', 'welcome'),
(333, 'Edition', '', '', '', '', 0, 'edition', 'recent-publications'),
(334, 'Year', '', '', '', '', 0, 'year', 'recent-publications'),
(335, 'ISBN', '', '', '', '', 0, 'isbn', 'recent-publications'),
(336, 'Language', '', '', '', '', 0, 'language', 'recent-publications'),
(337, '<p>Share</p>', '<p>Teilen</p>', '', '', '', 1, 'share', 'modals'),
(338, '<p>Back</p>', '<p>Zur&uuml;ck</p>', '', '', '', 1, 'dismiss', 'modals'),
(339, 'Sitemap', 'Sitemap', 'f', 'f', 'f', 0, 'sitemap', 'footer'),
(340, 'Study With Security: Our Terms & Conditions Create Trust In Our Education', 'Studiere mit Sicherheit: Unsere AGB schaffen Vertrauen in unsere Bildung', 'terms and conditions bg1', 'terms and conditions es1', 'terms and conditions ru1', 0, 'heading', 'terms-and-conditions');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(341, '<h2>&nbsp;</h2>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2><strong>I. Preamble</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Purpose and scope of the GTC</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Purpose of the GTC</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These General Terms and Conditions (hereinafter referred to as &quot;GTC&quot;) serve to regulate the legal relationship between ONSITES Graduate School (hereinafter referred to as &quot;ONSITES&quot;) and the students (hereinafter referred to as &quot;students&quot;). These GTC set out the conditions for participation in our educational programs and the use of our services.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Scope of the GTC</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These GTC apply to all students who enroll in a degree program or an educational program at ONSITES Graduate School. They are an integral part of the study contract between ONSITES and the student. The GTC govern the rights and obligations of both contracting parties for the entire duration of the contract.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Reference to the study conditions</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The General Terms and Conditions of the ONSITES Graduate School are closely linked to the specific study conditions and curricula of our educational programs. The Study Conditions contain detailed information about the programs offered, course content, examination modalities, tuition fees and other relevant information. The Study Conditions supplement the GTC and take precedence in the event of conflicts or ambiguities.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Trust and integrity</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School places great emphasis on trust, integrity and transparency in its educational work. This preamble underlines our commitment to creating a high-quality educational environment in which students can develop their full potential.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With this in mind, these T&amp;Cs serve to set out clearly and fairly the rights and obligations of both ONSITES Graduate School and the student. We expect our students to understand and respect these T&amp;Cs as they form the basis of our educational relationship.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The following sections of these T&amp;Cs contain detailed information on various aspects of our educational agreement - including admission requirements, study conditions, rights and obligations of students and ONSITES Graduate School, tuition fees, liability and warranty, termination options and final provisions. Please read these terms and conditions carefully and contact us if you have any questions or concerns.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>II. Subject matter of the contract and contracting parties</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Description of the ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You are an important part of ONSITES Graduate School - a prestigious educational institution that specializes in providing high quality educational programs and degree programs. Students receive a first-class academic experience that not only imparts knowledge, but also promotes personal and professional growth.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our educational programs are designed to provide the skills and knowledge you need for a successful professional future. We offer a wide range of study programs - from Bachelor&#39;s programs to Master&#39;s and PhD programs and are committed to providing you with a stimulating and inspiring learning environment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Identification of the contracting parties</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The parties to an education agreement are:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 The ONSITES Graduate School</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School is led and represented by Prof. Dr. Mathias Kunze. Our school has a clear vision and mission aimed at making education accessible and achievable. We strive to provide our students with the best possible support through highly qualified teachers, innovative teaching methods and a supportive study environment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our head office is located at <strong>7901 4TH ST. N #20418, St. PETERSBURG, FL 33702, USA</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telephone number</strong>:&nbsp;&nbsp; +1 850 298 80 50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>E-mail address</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hello(at)graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Website</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; https://www.graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 The student</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The student is the other party to the contract. Your personal data and contact details are stored in our student file. We value your commitment to your education and will always endeavor to provide you with the support and resources to achieve your educational goals.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Conclusion and duration of the contract</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.1 Conclusion of contract</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The contract is concluded as soon as you successfully enroll for one of our degree courses or educational programs. This can be done online via our website or in writing. The acceptance of your application and the confirmation of your enrollment by the ONSITES Graduate School constitute the conclusion of the contract.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.2 Contract duration</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The educational contract between you and the ONSITES Graduate School is concluded for the duration of your chosen degree program or educational program. The exact duration of the contract is specified in the respective study conditions and may vary from program to program. Please note that it is your responsibility to keep track of the applicable deadlines and dates in order to graduate on time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>III. Study conditions</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Admission requirements</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Application process and requirements</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In order to participate in one of our degree programs or educational programs, certain admission requirements must be met. The application process includes the submission of documents such as transcripts, resume and letters of recommendation. The exact requirements are published in the respective program requirements on our website.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Selection procedure</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students are selected on the basis of their qualifications, motivation and aptitude. In some cases, a selection interview or examination may be part of the admission process. We value equal opportunities and an open and non-discriminatory selection process.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Study programs and study modules</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Description of the degree programs and study modules</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School offers a variety of degree programs and modules, which are described in detail in the respective study conditions on our website. These descriptions include course content, learning objectives and other relevant information to help you choose your program.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Curriculum and courses</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The exact study plans and the timing of the courses are determined by an individual study plan. These curricula may vary depending on the program and semester.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Study and examination regulations</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.1 Teaching methods and teaching materials</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The study and examination regulations define the teaching methods, study materials and study resources used. These include lectures, seminars, group projects, self-study and other pedagogical approaches used to impart knowledge.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.2 Examination modalities and examination requirements</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The examination modalities and examination requirements are clearly defined in the examination regulations. These include examination dates, examination formats (written examinations, oral examinations, project work, etc.) and the assessment criteria. Compliance with the examination regulations is essential for successful participation in the courses.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Tuition fees and payment modalities</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>4.1 Tuition fee structure</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The tuition fees for our degree programs and educational programs are specified in the study conditions and may vary depending on the program. The fee structure includes the cost of tuition, materials and other relevant fees. All tuition fees are published on our website on the respective program pages.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>4.2 Payment modalities and deadlines</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The payment modalities and payment deadlines are clearly stated in the study conditions and in the invoice. Tuition fees can be paid in installments or in full. It is important to adhere to the deadlines in order to ensure smooth participation in the program.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>IV. Rights and obligations of students and the ONSITES Graduate School</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Rights and obligations of students</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Compulsory attendance and study progress</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students are required to attend classes regularly and actively participate in the study process. Attendance and progress requirements may vary by program and are specified in the respective program requirements. It is important to familiarize yourself with the specific requirements and adhere to them.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Conduct and code of ethics</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students are required to demonstrate respectful, ethical and collegial behavior toward fellow students, faculty and staff of the ONSITES Graduate School. Violations of the Code of Ethics may result in disciplinary action. Respectful and ethical behavior contributes to the creation of a positive learning environment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.3 Copyrights and intellectual property</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students are obliged to respect the copyrights and intellectual property rights of third parties. Unauthorized copying, publication or distribution of protected materials is not permitted. The ONSITES Graduate School promotes academic integrity and expects students to adhere to academic standards.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.4 Data protection and confidentiality</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School is committed to protecting the privacy and data protection of its students. Students are also required to respect the school&#39;s privacy policy and to keep confidential information confidential. Improper handling of personal or sensitive information may result in disciplinary action.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Rights and obligations of the ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Teaching and supervision obligations</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School is committed to providing high quality teaching, professional support and supervision. We ensure that courses are taught by qualified faculty and meet educational objectives. We also strive to create a supportive environment for students.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Changes to the curriculum or study conditions</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School reserves the right to make changes to the curriculum or program requirements. If possible, such changes will be announced in advance. If changes significantly affect the course of study or the study conditions, alternative solutions will be offered.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.3 Exclusion and disciplinary measures</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School reserves the right to expel students or take disciplinary action for serious violations of the TOS, Code of Ethics, or other School policies. Disciplinary action may include a warning, temporary suspension or termination of studies, depending on the severity of the offense.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.4 Data protection and data security</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School is committed to safeguarding the data protection rights of students and taking appropriate data security measures. Personal data will be handled in accordance with applicable data protection laws. ONSITES Graduate School is committed to preventing data breaches.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We strive to create a successful educational environment and to respect the rights and responsibilities of both parties. Students can contact the ONSITES Graduate School at any time for clarification or support.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>V. Tuition fees and financial matters</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Tuition fee structure</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Fees for educational programs</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The tuition fees for our educational programs are specified in the respective study conditions. The fees may vary depending on the degree program and duration of study. The exact fees are displayed on the application page depending on the selected degree program, time model and payment interval.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Other fees</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In addition to the tuition fees, there are also enrollment fees and examination fees. Fees for conferences, coaching and workshops as well as publications, which are optional, are listed transparently on the respective pages or can be requested at any time. In addition to the tuition fees, certain material and other fees may apply, which must be paid by the students themselves. These fees may include literature and textbooks, writing materials and equipment as well as internet fees.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Payment modalities and payment deadlines</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Payment in installments or total amount</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School generally offers the option of paying tuition fees in installments. You can pay the fees in several installments as long as you meet the specified payment deadlines. Alternatively, you can pay the entire tuition fees at the beginning of the program or semester.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Due dates and interest on arrears</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>All invoiced fees must be paid immediately upon receipt of the invoice, unless a different payment deadline has been agreed upon between ONSITES Graduate School and the invoice recipient. Payment deadlines should be adhered to in order to avoid the charging of late interest, which is currently 6% per annum based on Florida Statutes Section 55.03.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>3. Refund guidelines</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students have the right to cancel or withdraw from a study program. If a cancellation is made before the official start of the program, a refund of the tuition fees already paid will be made. A refund of enrollment fees already paid is generally not possible. Cancellation or withdrawal is no longer possible after the start of the program. Instead, the study program can be terminated. In the event of termination, the student always owes all agreed tuition fees to ONSITES Graduate School until the end of the notice period.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VI. Liability and warranty</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Liability of the ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Liability for educational services</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School is committed to providing educational services with due care and quality. We strive to ensure that courses, resources and teaching materials meet the highest standards. As part of our educational services, we accept liability for errors or defects that are directly attributable to negligence or non-compliance with our contractual obligations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Liability for program changes</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School reserves the right to change curricula or other program-related details. These changes will be announced in advance whenever possible. If changes significantly affect the course of study, alternative solutions will be offered.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Liability of the students</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Compliance with the GTC and study conditions</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students are obliged to comply with the provisions set out in the General Terms and Conditions of Business and Study. This includes participation in courses, payment of tuition fees, compliance with the Code of Ethics and observance of rules of conduct.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Responsibility for personal items</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School is not liable for the loss of or damage to students&#39; personal belongings. It is the student&#39;s responsibility to protect their personal belongings appropriately.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>3. Warranty</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.1 Quality of education and performance guarantee</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School guarantees the quality of educational services and the fulfillment of the study objectives set out in the study conditions. We strive to provide the best possible educational opportunities to meet the educational needs of students.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.2 Fulfillment of study conditions</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School undertakes to comply with the conditions for study programs and educational programs set out in the Conditions of Study. This includes the provision of courses, materials, resources and compliance with the established study and examination regulations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VII. Termination and termination of contract</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Termination by students</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 General terms of termination</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Students have the right to terminate their contract with the ONSITES Graduate School with four weeks&#39; notice to the end of the semester without giving reasons. Notice of termination must be given in writing. If the termination is made electronically, it must be electronically signed.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Refund after termination</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the event of termination, the student owes the tuition fees incurred up to the end of the termination period. If tuition fees have already been paid for the period after the end of termination, these will be refunded by the ONSITES Graduate School.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Termination by the ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Reasons for termination by the ONSITES Graduate School</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School reserves the right to terminate students in the event of serious violations of the General Terms and Conditions, the Code of Ethics or other contractual provisions. The notice period is four weeks to the end of the semester. It must be given in writing. If the notice of termination is sent electronically, it must be electronically signed. Reasons for termination can be</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Non-payment of tuition fees</strong>: The ONSITES Graduate School may terminate the contract if students repeatedly fail to pay the agreed tuition fees.</p>\r\n\r\n<p><br />\r\n<strong>Violation of the Code of Ethics</strong>: Students who commit serious violations of the Code of Ethics or the ONSITES Graduate School Code of Conduct may be terminated.</p>\r\n\r\n<p><br />\r\n<strong>Poor academic performance</strong>: ONSITES Graduate School may terminate the contract in the event of repeated failure to pass examinations or inadequate academic performance.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Refund after termination by the ONSITES Graduate School</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the event of termination by the ONSITES Graduate School, the student owes the tuition fees incurred up to the end of the termination period. If tuition fees have already been paid for the period after the end of termination, these will be refunded by the ONSITES Graduate School.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VIII. Final provisions</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Applicable law and place of jurisdiction</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms and Conditions are governed by the laws of the State of Florida (USA), where ONSITES Graduate School is headquartered. Any dispute or controversy arising out of or relating to these Terms and Conditions shall be resolved in the competent courts of that state or country. If required by the consumer laws of another country or state, the laws of the country or state in which the student is habitually resident may also apply and the student&#39;s local courts may also have jurisdiction. This applies in particular to consumers and their legal protection rights.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Amendments and additions to the GTC</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Amendments or additions to these GTC are only valid if they are agreed in writing and signed by both parties. These amendments must be made in accordance with the applicable laws and regulations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Severability clause</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Should any provision of these GTC be declared invalid, illegal or unenforceable for any reason, the validity and enforceability of the remaining provisions of these GTC shall not be affected. The parties shall endeavor to replace any invalid, illegal or unenforceable provision with a valid and enforceable provision that comes as close as possible to the intended economic and legal purpose.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<h2>&nbsp;</h2>\r\n\r\n<h2><strong>I. Pr&auml;ambel</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Zweck und Geltungsbereich der AGB</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Zweck der AGB</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die vorliegenden Allgemeinen Gesch&auml;ftsbedingungen (im Folgenden &bdquo;AGB&ldquo;) dienen dazu, die rechtlichen Beziehungen zwischen der ONSITES Graduate School (im Folgenden &bdquo;ONSITES&ldquo;) sowie den Studierenden (im Folgenden &bdquo;Studierende&ldquo;) zu regeln. Diese AGB legen die Bedingungen f&uuml;r die Teilnahme an unseren Bildungsprogrammen und die Nutzung unserer Dienstleistungen fest.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Geltungsbereich der AGB</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diese AGB gelten f&uuml;r alle Studierenden, die sich f&uuml;r einen Studiengang oder ein Bildungsprogramm an der ONSITES Graduate School immatrikulieren. Sie sind integraler Bestandteil des Studienvertrags zwischen ONSITES und den Studierenden. Die AGB regeln die Rechte und Pflichten beider Vertragsparteien w&auml;hrend der gesamten Vertragslaufzeit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Bezugnahme auf die Studienbedingungen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die AGB der ONSITES Graduate School sind eng mit den spezifischen Studienbedingungen und Lehrpl&auml;nen unserer Bildungsprogramme verkn&uuml;pft. Die Studienbedingungen enthalten detaillierte Informationen &uuml;ber die angebotenen Studieng&auml;nge, Lehrinhalte, Pr&uuml;fungsmodalit&auml;ten, Studiengeb&uuml;hren und andere relevante Informationen. Die Studienbedingungen erg&auml;nzen die AGB und haben Vorrang im Falle von Konflikten oder Unklarheiten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Vertrauen und Integrit&auml;t</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School legt gro&szlig;en Wert auf Vertrauen, Integrit&auml;t und Transparenz in ihrer Bildungsarbeit. Diese Pr&auml;ambel unterstreicht unser Engagement, eine qualitativ hochwertige Bildungsumgebung zu schaffen, in welcher die Studierenden ihr volles Potenzial entfalten k&ouml;nnen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In diesem Sinne dienen diese AGB dazu, die Rechte und Pflichten sowohl der ONSITES Graduate School als auch der Studierenden klar und fair festzulegen. Wir erwarten von unseren Studierenden, dass sie diese AGB verstehen und respektieren, da sie die Grundlage f&uuml;r unsere Bildungsbeziehung bilden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die folgenden Abschnitte dieser AGB enthalten detaillierte Informationen zu verschiedenen Aspekten unserer Bildungsvereinbarung &ndash; einschlie&szlig;lich Zulassungsvoraussetzungen, Studienbedingungen, Rechte und Pflichten der Studierenden und der ONSITES Graduate School, Studiengeb&uuml;hren, Haftung und Gew&auml;hrleistung, K&uuml;ndigungsm&ouml;glichkeiten und Schlussbestimmungen. Bitte lese diese AGB sorgf&auml;ltig durch und kontaktiere uns bei Fragen oder Unklarheiten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>II. Vertragsgegenstand und Vertragsparteien</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Beschreibung der ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du bist ein wichtiger Teil der ONSITES Graduate School &ndash; einer angesehenen Bildungseinrichtung, die sich auf die Bereitstellung von qualitativ hochwertigen Bildungsprogrammen und Studieng&auml;ngen spezialisiert hat. Studierende erfahren eine erstklassige akademische Erfahrung, welche nicht nur Wissen vermittelt, sondern auch pers&ouml;nliches und berufliches Wachstum f&ouml;rdert.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unsere Bildungsprogramme sind darauf ausgerichtet, die F&auml;higkeiten und das Wissen zu vermitteln, die Du f&uuml;r eine erfolgreiche berufliche Zukunft ben&ouml;tigst. Wir bieten eine breite Palette von Studieng&auml;ngen an &ndash; vom Bachelorprogramm bis hin zu Master- und Doktorandenprogrammen und sind bestrebt, Dir eine anregende und inspirierende Lernumgebung zu bieten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Identifikation der Vertragsparteien</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Vertragsparteien einer Bildungsvereinbarung sind:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Die ONSITES Graduate School</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School wird von Prof. Dr. Mathias Kunze geleitet und repr&auml;sentiert. Unsere Schule verfolgt eine klare Vision und Mission, die darauf abzielen, Bildung zug&auml;nglich und erreichbar zu machen. Wir sind bestrebt, unsere Studierenden durch hochqualifizierte Lehrende, innovative Lehrmethoden und eine unterst&uuml;tzende Studienumgebung bestm&ouml;glich zu unterst&uuml;tzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unser Hauptsitz befindet sich in <strong>7901 4TH ST. N #20418, St. PETERSBURG, FL 33702, USA</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telefonnummer</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +1 850 298 80 50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>E-Mailadresse</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hello(at)graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Website</strong>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; https://www.graduate.me</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Der/Die Studierende</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der/Die Studierende ist die andere Vertragspartei. Deine pers&ouml;nlichen Daten und Kontaktdaten sind in unserer Studienakte hinterlegt. Wir sch&auml;tzen Dein Engagement f&uuml;r Deine Bildung und sind stets bem&uuml;ht, Dir die Unterst&uuml;tzung und Ressourcen zur Erreichung Deiner Bildungsziele zur Verf&uuml;gung zu stellen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Vertragsabschluss und Vertragsdauer</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.1 Vertragsabschluss</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der Vertragsabschluss erfolgt, sobald Du Dich erfolgreich f&uuml;r einen unserer Studieng&auml;nge oder Bildungsprogramme immatrikulierst. Dies kann online &uuml;ber unsere Website oder in schriftlicher Form erfolgen. Die Annahme Deiner Bewerbung und die Best&auml;tigung Deiner Immatrikulation durch die ONSITES Graduate School bilden den Vertragsabschluss.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.2 Vertragsdauer</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der Bildungsvertrag zwischen Dir und der ONSITES Graduate School wird f&uuml;r die Dauer Deines gew&auml;hlten Studiengangs oder Bildungsprogramms geschlossen. Die genaue Vertragsdauer wird in den jeweiligen Studienbedingungen festgelegt und kann von Programm zu Programm variieren. Bitte beachte, dass es in Deiner Verantwortung liegt, die geltenden Fristen und Termine im Auge zu behalten, um Deinen Abschluss rechtzeitig zu erreichen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>III. Studienbedingungen</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Zulassungsvoraussetzungen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Bewerbungsprozess und Anforderungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Um an einem unserer Studieng&auml;nge oder Bildungsprogramme teilzunehmen, sind bestimmte Zulassungsvoraussetzungen zu erf&uuml;llen. Der Bewerbungsprozess beinhaltet die Einreichung von Unterlagen wie Zeugnisse, Lebenslauf und Empfehlungsschreiben. Die genauen Anforderungen werden in den jeweiligen Studienbedingungen auf unserer Webseite ver&ouml;ffentlicht.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Auswahlverfahren</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Auswahl der Studierenden erfolgt auf Basis ihrer Qualifikationen, Motivation und Eignung. In einigen F&auml;llen kann ein Auswahlgespr&auml;ch oder eine Pr&uuml;fung zum Zulassungsprozess geh&ouml;ren. Wir legen Wert auf Chancengleichheit sowie eine offene und diskriminierungsfreie Auswahl.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Studieng&auml;nge und Studienmodule</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Beschreibung der Studieng&auml;nge und Studienmodule</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School bietet eine Vielzahl von Studieng&auml;ngen und Modulen an, die in den jeweiligen Studienbedingungen auf unserer Website detailliert beschrieben sind. Diese Beschreibungen umfassen Lehrinhalte, Lernziele und weitere relevante Informationen, um Dir bei der Auswahl Deines Studiengangs zu helfen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Studienplan und Lehrveranstaltungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die genauen Studienpl&auml;ne und die zeitliche Organisation der Lehrveranstaltungen werden durch einen individuellen Studienplan festgelegt. Diese Studienpl&auml;ne k&ouml;nnen je nach Programm und Semester variieren.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Studien- und Pr&uuml;fungsordnung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.1 Lehrmethoden und Lehrmaterialien</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Studien- und Pr&uuml;fungsordnung legt die verwendeten Lehrmethoden, Studienmaterialien und Studienressourcen fest. Dazu geh&ouml;ren Vorlesungen, Seminare, Gruppenprojekte, Selbststudium und andere p&auml;dagogische Ans&auml;tze, die zur Wissensvermittlung verwendet werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.2 Pr&uuml;fungsmodalit&auml;ten und Pr&uuml;fungsanforderungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Pr&uuml;fungsmodalit&auml;ten und Pr&uuml;fungsanforderungen sind in der Pr&uuml;fungsordnung klar definiert. Hierzu geh&ouml;ren Pr&uuml;fungstermine, Pr&uuml;fungsformate (schriftliche Pr&uuml;fungen, m&uuml;ndliche Pr&uuml;fungen, Projektarbeiten, etc.) und die Bewertungskriterien. Die Einhaltung der Pr&uuml;fungsordnung ist f&uuml;r die erfolgreiche Teilnahme an den Lehrveranstaltungen unerl&auml;sslich.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>4. Studiengeb&uuml;hren und Zahlungsmodalit&auml;ten</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>4.1 Studiengeb&uuml;hrenstruktur</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Studiengeb&uuml;hren f&uuml;r unsere Studieng&auml;nge und Bildungsprogramme werden in den Studienbedingungen festgelegt und k&ouml;nnen je nach Programm unterschiedlich sein. Die Geb&uuml;hrenstruktur umfasst die Kosten f&uuml;r das Studium, Materialien und weitere relevante Geb&uuml;hren. Alle Studiengeb&uuml;hren sind auf unserer Website auf den jeweiligen Studiengangseiten ver&ouml;ffentlicht.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>4.2 Zahlungsmodalit&auml;ten und Fristen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Zahlungsmodalit&auml;ten und Zahlungsfristen werden in den Studienbedingungen und in der Rechnung klar angegeben. Die Studiengeb&uuml;hren k&ouml;nnen in Raten oder als Gesamtbetrag gezahlt werden. Es ist wichtig, die Fristen einzuhalten, um eine reibungslose Studienteilnahme sicherzustellen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>IV. Rechte und Pflichten der Studierenden und der ONSITES Graduate School</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Rechte und Pflichten der Studierenden</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Anwesenheitspflicht und Studienfortschritt</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Studierenden sind verpflichtet, den Lehrveranstaltungen regelm&auml;&szlig;ig beizuwohnen und aktiv am Studienprozess teilzunehmen. Die Anwesenheits- und Studienfortschrittsanforderungen k&ouml;nnen je nach Programm variieren und werden in den jeweiligen Studienbedingungen festgelegt. Es ist wichtig, sich mit den spezifischen Anforderungen vertraut zu machen und diese einzuhalten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Verhalten und Ethikkodex</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studierende sind dazu angehalten, ein respektvolles, ethisches und kollegiales Verhalten gegen&uuml;ber Kommilitonen, Dozierenden und Mitarbeitern der ONSITES Graduate School an den Tag zu legen. Verst&ouml;&szlig;e gegen den Ethikkodex k&ouml;nnen disziplinarische Ma&szlig;nahmen zur Folge haben. Ein respektvolles und ethisch einwandfreies Verhalten tr&auml;gt zur Schaffung einer positiven Lernumgebung bei.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.3 Urheberrechte und geistiges Eigentum</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studierende sind verpflichtet, die Urheberrechte und geistigen Eigentumsrechte Dritter zu respektieren. Das unerlaubte Kopieren, Ver&ouml;ffentlichen oder Verbreiten von gesch&uuml;tzten Materialien ist nicht gestattet. Die ONSITES Graduate School f&ouml;rdert die akademische Integrit&auml;t und erwartet von Studierenden, dass sie wissenschaftliche Standards einhalten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.4 Datenschutz und Vertraulichkeit</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School ist bestrebt, die Privatsph&auml;re und den Datenschutz ihrer Studierenden zu sch&uuml;tzen. Studierende sind ebenfalls dazu aufgefordert, die Datenschutzrichtlinien der Schule zu respektieren und vertrauliche Informationen vertraulich zu behandeln. Der unsachgem&auml;&szlig;e Umgang mit pers&ouml;nlichen oder sensiblen Daten kann disziplinarische Konsequenzen nach sich ziehen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Rechte und Pflichten der ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Lehr- und Betreuungsverpflichtungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School verpflichtet sich, qualitativ hochwertige Lehrveranstaltungen, fachliche Unterst&uuml;tzung und Betreuung anzubieten. Wir stellen sicher, dass Lehrveranstaltungen von qualifizierten Dozierenden durchgef&uuml;hrt werden und die Bildungsziele erf&uuml;llen. Zudem sind wir bem&uuml;ht, eine unterst&uuml;tzende Umgebung f&uuml;r Studierende zu schaffen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 &Auml;nderungen im Studienplan oder in den Studienbedingungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School beh&auml;lt sich das Recht vor, &Auml;nderungen im Studienplan oder den Studienbedingungen vorzunehmen. Solche &Auml;nderungen werden nach M&ouml;glichkeit im Voraus angek&uuml;ndigt. Falls &Auml;nderungen den Studienverlauf oder die Studienbedingungen erheblich beeinflussen, werden alternative L&ouml;sungen angeboten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.3 Ausschluss und Disziplinarma&szlig;nahmen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School beh&auml;lt sich das Recht vor, Studierende bei schwerwiegenden Verst&ouml;&szlig;en gegen die AGB, den Ethikkodex oder andere Vorschriften der Schule auszuschlie&szlig;en oder disziplinarische Ma&szlig;nahmen zu ergreifen. Disziplinarma&szlig;nahmen k&ouml;nnen eine Verwarnung, vor&uuml;bergehende Suspendierung oder den Studienabbruch beinhalten &ndash; abh&auml;ngig von der Schwere des Versto&szlig;es.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.4 Datenschutz und Datensicherheit</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School verpflichtet sich, die Datenschutzrechte der Studierenden zu wahren und angemessene Ma&szlig;nahmen zur Datensicherheit zu ergreifen. Pers&ouml;nliche Daten werden gem&auml;&szlig; den geltenden Datenschutzgesetzen behandelt. Die ONSITES Graduate School setzt sich daf&uuml;r ein, Datenschutzverletzungen zu verhindern.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir sind bestrebt, eine erfolgreiche Bildungsumgebung zu schaffen und die Rechte und Pflichten beider Seiten zu respektieren. Studierende k&ouml;nnen sich jederzeit an die ONSITES Graduate School wenden, um Fragen zu kl&auml;ren oder Unterst&uuml;tzung zu erhalten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>V. Studiengeb&uuml;hren und finanzielle Angelegenheiten</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Studiengeb&uuml;hrenstruktur</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Geb&uuml;hren f&uuml;r Bildungsprogramme</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Studiengeb&uuml;hren f&uuml;r unsere Bildungsprogramme werden in den jeweiligen Studienbedingungen festgelegt. Die Geb&uuml;hren k&ouml;nnen je nach Studiengang und Studiendauer variieren. Auf der Bewerbungsseite werden die genauen Geb&uuml;hren in Abh&auml;ngigkeit vom gew&auml;hlten Studiengang, Zeitmodell und Zahlungsintervall angezeigt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Andere Geb&uuml;hren</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Zus&auml;tzlich zu den Studiengeb&uuml;hren fallen Immatrikulationsgeb&uuml;hren und Pr&uuml;fungsgeb&uuml;hren an. Geb&uuml;hren f&uuml;r Konferenzen, Coachings und Workshops sowie Ver&ouml;ffentlichungen, welche optional in Anspruch genommen werden k&ouml;nnen, werden auf den jeweiligen Seiten transparent aufgef&uuml;hrt oder k&ouml;nnen jederzeit angefragt werden. Zus&auml;tzlich zu den Studiengeb&uuml;hren k&ouml;nnen bestimmte Material- und sonstige Geb&uuml;hren anfallen, die von den Studierenden selbst getragen werden m&uuml;ssen. Diese Geb&uuml;hren k&ouml;nnen unter anderem Literatur und Lehrb&uuml;cher, Schreibmaterialien und Ausr&uuml;stung sowie Internetgeb&uuml;hren umfassen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Zahlungsmodalit&auml;ten und Zahlungsfristen</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Ratenzahlung oder Gesamtbetrag</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School bietet in der Regel die M&ouml;glichkeit zur Ratenzahlung der Studiengeb&uuml;hren an. Du kannst die Geb&uuml;hren in mehreren Teilbetr&auml;gen zahlen, solange Du die festgelegten Zahlungsfristen einh&auml;ltst. Alternativ kannst Du auch die gesamten Studiengeb&uuml;hren zu Beginn des Programms oder des Semesters entrichten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 F&auml;lligkeitsdaten und Verzugszinsen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Alle berechneten Geb&uuml;hren sind unmittelbar nach Rechnungszugang auszugleichen, es sei denn, dass zwischen der ONSITES Graduate School und dem Rechnungsempf&auml;nger eine andere Zahlungsfrist vereinbart ist. Zur Vermeidung der Berechnung von Verzugszinsen, welche in Anlehnung an die Florida-Statuten Abschnitt 55.03 gegenw&auml;rtig 6% per anno betragen, sollten die Zahlungsfristen eingehalten werden.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. R&uuml;ckerstattungsrichtlinien</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studierende haben das Recht, ihre Teilnahme an einem Studienprogramm zu stornieren oder zur&uuml;ckzutreten. Falls eine Stornierung vor dem offiziellen Studienbeginn erfolgt, wird eine R&uuml;ckerstattung der bereits gezahlten Studiengeb&uuml;hren vorgenommen. Eine R&uuml;ckerstattung von bereits gezahlten Immatrikulationsgeb&uuml;hren kann grunds&auml;tzlich nicht vorgenommen werden. Nach Studienbeginn ist eine Stornierung oder ein R&uuml;cktritt nicht mehr m&ouml;glich. Stattdessen kann das Studienprogramm aufgek&uuml;ndigt werden. Der Studierende schuldet im Falle einer K&uuml;ndigung immer alle vereinbarten Studiengeb&uuml;hren bis zum Ende der K&uuml;ndigungsfrist gegen&uuml;ber der ONSITES Graduate School.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VI. Haftung und Gew&auml;hrleistung</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Haftung der ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Haftung f&uuml;r Bildungsdienstleistungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School verpflichtet sich, Bildungsdienstleistungen mit der gebotenen Sorgfalt und Qualit&auml;t bereitzustellen. Wir sind bestrebt, sicherzustellen, dass Lehrveranstaltungen, Ressourcen und Lehrmaterialien den h&ouml;chsten Standards entsprechen. Im Rahmen unserer Bildungsdienstleistungen &uuml;bernehmen wir die Haftung f&uuml;r Fehler oder M&auml;ngel, die direkt auf Fahrl&auml;ssigkeit oder Nichteinhaltung unserer vertraglichen Verpflichtungen zur&uuml;ckzuf&uuml;hren sind.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 Haftung f&uuml;r Programm&auml;nderungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School beh&auml;lt sich das Recht vor, Studienpl&auml;ne oder andere programmbezogene Details zu &auml;ndern. Diese &Auml;nderungen werden nach M&ouml;glichkeit im Voraus angek&uuml;ndigt. Falls &Auml;nderungen den Studienverlauf erheblich beeinflussen, werden alternative L&ouml;sungen angeboten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. Haftung der Studierenden</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Einhaltung der AGB bzw. Studienbedingungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studierende sind verpflichtet, die in den AGB bzw. Studienbedingungen festgelegten Bestimmungen einzuhalten. Dies schlie&szlig;t die Teilnahme an Lehrveranstaltungen, die Bezahlung von Studiengeb&uuml;hren, die Einhaltung des Ethikkodex und die Beachtung von Verhaltensregeln ein.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 Verantwortung f&uuml;r pers&ouml;nliche Gegenst&auml;nde</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School haftet nicht f&uuml;r den Verlust oder die Besch&auml;digung pers&ouml;nlicher Gegenst&auml;nde der Studierenden. Es liegt in der Verantwortung der Studierenden, ihre pers&ouml;nlichen Besitzt&uuml;mer angemessen zu sch&uuml;tzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Gew&auml;hrleistung</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.1 Bildungsqualit&auml;t und Leistungsgarantie</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School garantiert die Qualit&auml;t der Bildungsdienstleistungen und die Erf&uuml;llung der in den Studienbedingungen festgelegten Studienziele. Wir sind bestrebt, die bestm&ouml;glichen Bildungsm&ouml;glichkeiten zu bieten, um den Bildungsbedarf der Studierenden zu erf&uuml;llen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>3.2 Erf&uuml;llung von Studienbedingungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School sichert zu, die in den Studienbedingungen festgelegten Bedingungen f&uuml;r Studieng&auml;nge und Bildungsprogramme einzuhalten. Dies umfasst die Bereitstellung von Lehrveranstaltungen, Materialien, Ressourcen und die Einhaltung der festgelegten Studien- und Pr&uuml;fungsordnung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VII. K&uuml;ndigung und Vertragsbeendigung</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. K&uuml;ndigung durch Studierende</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.1 Allgemeine K&uuml;ndigungsbedingungen</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studierende haben das Recht, ihren Vertrag mit der ONSITES Graduate School mit einer Frist von vier Wochen zum Semesterende ohne Angaben von Gr&uuml;nden aufzuk&uuml;ndigen. Die K&uuml;ndigung muss schriftlich erfolgen. Insofern die K&uuml;ndigung &uuml;ber den elektronischen Weg erfolgt, muss sie elektronisch signiert sein.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>1.2 R&uuml;ckerstattung nach K&uuml;ndigung</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Im Falle einer K&uuml;ndigung schuldet der Studierende die bis zum K&uuml;ndigungsende anfallenden Studiengeb&uuml;hren. Sollten bereits Studiengeb&uuml;hren f&uuml;r den Zeitraum nach K&uuml;ndigungsende geleistet worden sein, werden diese durch die ONSITES Graduate School zur&uuml;ckerstattet.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. K&uuml;ndigung durch die ONSITES Graduate School</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.1 Gr&uuml;nde f&uuml;r K&uuml;ndigung durch die ONSITES Graduate School</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School beh&auml;lt sich das Recht vor, Studierende zu k&uuml;ndigen, wenn schwerwiegende Verst&ouml;&szlig;e gegen die AGB, den Ethikkodex oder andere Vertragsbestimmungen vorliegen. Die K&uuml;ndigungsfrist betr&auml;gt vier Wochen zum Semesterende. Sie muss schriftlich erfolgen. Bei &Uuml;bersendung der K&uuml;ndigung auf elektronischem Wege muss sie elektronisch signiert sein. K&uuml;ndigungsgr&uuml;nde k&ouml;nnen sein:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Nichtzahlung der Studiengeb&uuml;hren</strong>: Die ONSITES Graduate School kann den Vertrag k&uuml;ndigen, wenn Studierende wiederholt die vereinbarten Studiengeb&uuml;hren nicht zahlen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Versto&szlig; gegen den Ethikkodex</strong>: Studierende, die schwerwiegende Verst&ouml;&szlig;e gegen den Ethikkodex oder gegen die Verhaltensregeln der ONSITES Graduate School begehen, k&ouml;nnen gek&uuml;ndigt werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Mangelnde akademische Leistung</strong>: Bei wiederholtem Nichtbestehen von Pr&uuml;fungen oder unzureichender akademischer Leistung kann die ONSITES Graduate School den Vertrag k&uuml;ndigen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4><strong>2.2 R&uuml;ckerstattung nach K&uuml;ndigung durch die ONSITES Graduate School</strong></h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Im Falle einer K&uuml;ndigung durch die ONSITES Graduate School schuldet der Studierende die bis zum K&uuml;ndigungsende anfallenden Studiengeb&uuml;hren. Sollten bereits Studiengeb&uuml;hren f&uuml;r den Zeitraum nach K&uuml;ndigungsende geleistet worden sein, werden diese durch die ONSITES Graduate School zur&uuml;ckerstattet.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>VIII. Schlussbestimmungen</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. Anwendbares Recht und Gerichtsstand</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diese AGB unterliegen dem Recht des Staates Florida (USA), wo die ONSITES Graduate School ihren Hauptsitz hat. Alle Streitigkeiten oder Konflikte im Zusammenhang mit diesen AGB werden vor den zust&auml;ndigen Gerichten in diesem Staat oder Land ausgetragen. Sofern dies zwingend durch die Verbrauchergesetze eines anderen Landes oder Staates vorgeschrieben ist, kann auch das Recht jenes Landes oder Staates gelten, in dem der Studierende seinen gew&ouml;hnlichen Aufenthalt hat und lokale Gerichte des Studierenden k&ouml;nnen ebenfalls zust&auml;ndig sein. Dies gilt insbesondere f&uuml;r Verbraucher und deren rechtliche Schutzrechte.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. &Auml;nderungen und Erg&auml;nzungen der AGB</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&Auml;nderungen oder Erg&auml;nzungen dieser AGB sind nur dann g&uuml;ltig, wenn sie schriftlich vereinbart und von beiden Parteien unterzeichnet werden. Diese &Auml;nderungen m&uuml;ssen in &Uuml;bereinstimmung mit den geltenden Gesetzen und Verordnungen erfolgen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>3. Salvatorische Klausel</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sollte eine Bestimmung dieser AGB aus irgendeinem Grund f&uuml;r ung&uuml;ltig, rechtswidrig oder nicht durchsetzbar erkl&auml;rt werden, so wird die G&uuml;ltigkeit und Durchsetzbarkeit der &uuml;brigen Bestimmungen dieser AGB nicht beeintr&auml;chtigt. Die Parteien sind bestrebt, eine ung&uuml;ltige, rechtswidrige oder nicht durchsetzbare Bestimmung durch eine g&uuml;ltige und durchsetzbare Bestimmung zu ersetzen, die dem beabsichtigten wirtschaftlichen und rechtlichen Zweck am n&auml;chsten kommt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>terms and conditions 1</p>', '<p>terms and conditions 1</p>', '<p>terms and conditions 1</p>', 1, 'text', 'terms-and-conditions');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(342, 'Terms & Conditions', 'AGB', 'f', 'f', 'f', 0, 'terms and conditions', 'footer'),
(343, 'General Terms & Conditions | ONSITES Graduate School', 'Unsere AGB | ONSITES Graduate School', NULL, NULL, NULL, 0, 'meta-title', 'terms-and-conditions'),
(344, 'Explore ONSITES Graduate School\'s General Terms & Conditions (GTC). Clear guidelines for a trustworthy experience & seamless business relationship. Click here.', 'Die Allgemeinen Geschäftsbedingungen der ONSITES Graduate School. Entdecke unsere Richtlinien für eine reibungslose Zusammenarbeit. Jetzt lesen!', NULL, NULL, NULL, 0, 'meta-description', 'terms-and-conditions'),
(348, '<p><span style=\"font-size:22px\"><strong><span style=\"color:#d35400\">3.</span> <span style=\"color:#2980b9\">Get Recognition</span></strong></span></p>', '<p><span style=\"font-size:22px\"><strong><span style=\"color:#d35400\">3.</span> <span style=\"color:#2980b9\">Vorleistungen anrechnen lassen</span></strong></span></p>', 'dd', 'dd', 'dd', 1, 'fifth-image-heading', 'recognition'),
(349, '<p>Upon successful completion of the examination, we will immediately recognize your prior achievements towards your desired course of study.</p>', '<p>Bei erfolgreichem Pr&uuml;fungsergebnis rechnen wir Deine Vorleistungen umgehend auf Dein Wunschstudium an.</p>', 'ddd', 'dd', 'dd', 1, 'fifth-image-text', 'recognition'),
(350, 'Arrange Callback', 'Rückruf vereinbaren', '', '', '', 0, 'request-call', 'student-advisory-service'),
(351, '<p style=\"text-align:justify\">Too busy right now? Arrange a <strong>free</strong> callback.</p>\r\n\r\n<p>Just <strong>click</strong> on the <strong>icon on the bottom right</strong>.</p>\r\n\r\n<p>We are looking forward to you!</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '<p style=\"text-align:justify\">Dir passt es zeitlich gerade nicht? Vereinbare einen <strong>kostenlosen</strong> R&uuml;ckruftermin.</p>\r\n\r\n<p>Einfach das <strong>Icon unten rechts</strong> <strong>anklicken</strong>.</p>\r\n\r\n<p>Wir freuen uns auf Dich!</p>', '', '', '', 1, 'request-call-text', 'student-advisory-service'),
(352, 'All Countries', 'Alle Länder', 'f', 'f', 'f', 0, 'all_countries_label', 'footer'),
(353, '<p>I have taken note of the <a href=\"https://graduate.me/en/privacy-policy\">Privacy Policy</a>.</p>', '<p>Ich habe die <a href=\"https://graduate.me/de/datenschutz\">Datenschutzerkl&auml;rung</a> zur Kenntnis genommen.</p>', '-', '-', '-', 1, 'privacy', 'study-registration'),
(354, '2 Years', '2 Jahre', '-', '-', '-', 0, '2-years', 'study-registration'),
(355, '3 Years', '3 Jahre', '-', '-', '-', 0, '3-years', 'study-registration'),
(356, 'Payment Method', 'Zahlungsmethode', '-', '-', '-', 0, 'payment-method-heading', 'study-registration'),
(357, 'Payment method: Bank transfer', 'Zahlungsmethode: Banküberweisung', '-', '-', '-', 0, 'payment-method-subheading', 'study-registration'),
(358, 'Payment Interval', 'Zahlungsintervall', '-', '-', '-', 0, 'payment-interval', 'study-registration'),
(359, 'Monthly', 'Monatlich', '-', '-', '-', 0, 'payment-interval-option-1', 'study-registration'),
(360, 'Per Year', 'Jährlich', '-', '-', '-', 0, 'payment-interval-option-2', 'study-registration'),
(361, 'Per Semester', 'Pro Semester', '-', '-', '-', 0, 'payment-interval-option-3', 'study-registration'),
(362, 'One-time', 'Einmalig', '-', '-', '-', 0, 'payment-interval-option-4', 'study-registration'),
(363, 'Please enter a valid date', 'Bitte gültiges Datum eingeben', '-', '-', '-', 0, 'incorrect-date', 'study-registration'),
(364, 'Tuition fee', 'Studiengebühr', '-', '-', '-', 0, 'tuition-fee', 'study-registration'),
(365, 'Incorrect File', 'Falsche Datei', '-', '-', '', 0, 'incorrect-file', 'study-registration'),
(366, 'Introducing Our Strong Partners', 'Power-Studium mit starken Partnern', '', '', '', 0, 'our-partners', 'accreditation'),
(367, '<p>&nbsp;</p>\r\n\r\n<p>Together we are stronger! By bundling our competencies, we grow beyond ourselves. With our proven partner network, we guarantee you a sensational study experience with countless synergy effects.</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Gemeinsam sind wir st&auml;rker! Durch B&uuml;ndelung unserer Kompetenzen wachsen wir &uuml;ber uns hinaus. Mit unserem erprobten Partnernetzwerk garantieren wir Dir ein sensationelles&nbsp;Studienerlebnis mit vielen Synergieeffekten<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">.</span></span></span></span></p>', '', '', '', 1, 'our-partners-text', 'accreditation'),
(368, 'Looking for recognition from your peers? Book publishing will do the job - fast & top-priced. ✔ Print & eBook ✔ Flexible options ✔ ISBN. Request now!', 'Du suchst Anerkennung in Deinem Fach? Wir werden Dein Buch veröffentlichen – schnell & günstig. ✔ Print & eBook ✔ Flexible Tarife ✔ ISBN. Jetzt Autor werden!', '', '', '', 0, 'meta-description', 'publishing'),
(369, '<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#3498db\"><strong>Recognizing Your Training For Fast-Track Bachelor</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You would like to start a Bachelor of Business Administration and have already completed a relevant vocational training? In our <a href=\"https://graduate.me/en/bachelor-degree\">fast-track</a> program, you can have your training recognized and take a degree shortcut.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Reduce your study time to just <strong>18&nbsp;months</strong>!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Lightspeed Bachelor</strong></span> for those with advanced training: With an additional completed advanced training as <em>staatlich gepr&uuml;fter Betriebswirt</em> or <em>Fachwirt</em>, you can even complete your degree in a jaw-dropping <strong>12 months</strong>!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We would also be happy to check other training constellations for you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Recognizing CAS Online Courses</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Are you interested in a <a href=\"https://graduate.me/en/master-degree\">Master&#39;s </a>degree or <a href=\"https://graduate.me/en/mba\">MBA</a> program, but still hesitating? Our <a href=\"https://graduate.me/en/cas-online\">CAS</a> courses are the perfect taster courses.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Of short study duration and compact, they offer you a</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>comprehensive overview of the content</strong></span></li>\r\n	<li><strong><span style=\"color:#2980b9\">accurate insight into the world of online continuing education</span></strong></li>\r\n	<li><strong><span style=\"color:#2980b9\">reliable impression of the feasibility of later studies</span></strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Play it safe! Start a CAS program first and then have it credited to the program of your choice.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We will be happy to advise you personally on which CAS courses are suitable for crediting towards modules of the respective Master&#39;s or MBA program.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Ausbildung anerkennen lassen im Bachelor Fast Track</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du m&ouml;chtest einen BWL-Bachelor starten und hast bereits eine einschl&auml;gige Berufsausbildung abgeschlossen? In unserem <a href=\"http://graduate.me/de/bachelor\">Fast-Track</a>-Programm kannst Du Deine Ausbildung anerkennen lassen und Dein Studium verk&uuml;rzen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Reduziere Deine Studienzeit auf nur <strong>18 Monate</strong>!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Blitz-Bachelor</strong> </span>f&uuml;r Fortgebildete: Mit einer zus&auml;tzlichen abgeschlossenen Fortbildung zum staatlich gepr&uuml;ften Betriebswirt oder Fachwirt kannst Du Dein Studium sogar in <strong>12 Monaten</strong> abschlie&szlig;en!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gerne pr&uuml;fen wir auch andere Ausbildungskonstellationen f&uuml;r Dich.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Anrechnung von CAS-Kursen</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du interessierst Dich f&uuml;r ein <a href=\"https://graduate.me/de/master\">Master</a>-Studium oder <a href=\"https://graduate.me/de/mba\">MBA</a>-Studium, aber z&ouml;gerst noch? Unsere <a href=\"https://graduate.me/de/cas-online\">CAS</a>-Kurse sind die perfekten Schnupperkurse.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Von kurzer Studiendauer und kompakt, bieten sie Dir einen</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>umfassenden inhaltlichen &Uuml;berblick</strong></span></li>\r\n	<li><strong><span style=\"color:#2980b9\">genauen Einblick in die Welt der Online-Weiterbildung</span></strong></li>\r\n	<li><strong><span style=\"color:#2980b9\">verl&auml;sslichen Eindruck &uuml;ber die Machbarkeit eines sp&auml;teren Studiums</span></strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gehe auf Nummer sicher! Starte zun&auml;chst ein CAS-Studium und lasse Dir dieses dann auf das Studium Deiner Wahl anrechnen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gerne beraten wir Dich pers&ouml;nlich, welche CAS-Kurse zur Anrechnung auf Module des jeweiligen Master- bzw. MBA-Studiums in Frage kommen.</p>\r\n\r\n<p>&nbsp;</p>', '<p>dd</p>', '<p>dd</p>', '<p>dd</p>', 1, 'second-text', 'recognition'),
(370, '<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>&nbsp; &nbsp; Education</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\">&nbsp;Academic writing</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\">Exam preparation</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Presentation help</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Time management</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>&nbsp; &nbsp; &nbsp;Bildung</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Wissenschaftliches Arbeiten</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\">&nbsp;Pr&uuml;fungsvorbereitung</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Pr&auml;sentationshilfe</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Zeitmanagement</span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'education-text', 'coaching'),
(371, '<p>&nbsp;</p>\r\n\r\n<p>How may we coach you &ndash; one-on-one&nbsp;or in a group?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id=\"individual-coaching\">\r\n<h2><span style=\"color:#2980b9\"><strong>Individual Coaching Puts You In The Center</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>You prefer coaching in private? Then <strong>one-on-one coaching</strong> is just right for you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your <strong>benefits</strong> at a glance:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Undivided Attention</strong></span>: Your coach is exclusively focused on you and your personal concerns, goals and problems.</li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>100% Discretion</strong></span>: Everything you reveal about yourself remains between you and your coach.</li>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Intimate Atmosphere</span></strong>: You will not be distracted by others and can open up freely.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Wie d&uuml;rfen wir Dich coachen &ndash; im Einzelcoaching oder Gruppencoaching?</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id=\"individual-coaching\">\r\n<h2><span style=\"color:#2980b9\"><strong>Im Einzelcoaching stehst Du allein im Mittelpunkt</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>Du bevorzugst ein Coaching unter vier Augen? Dann ist ein <strong>Einzelcoaching</strong> genau das Richtige f&uuml;r Dich.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Deine <strong>Vorteile</strong> auf einen Blick:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Ungeteilte Aufmerksamkeit</strong></span>: Dein Coach k&uuml;mmert sich ausschlie&szlig;lich um Dich und Deine pers&ouml;nlichen Anliegen, Ziele und Probleme.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>100% Diskretion</strong></span>: Alles, was Du von Dir preisgibst, bleibt zwischen Dir und Deinem Coach.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Intime&nbsp;Atmosph&auml;re</span></strong>: Du wirst nicht durch Andere abgelenkt und kannst Dich frei &ouml;ffnen.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'individual-coaching-text', 'coaching'),
(372, '<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>&nbsp; &nbsp; &nbsp;Management</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Motivation</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Upskilling</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Conflict management</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Competence analysis</span></li>\r\n</ul>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>&nbsp; &nbsp; &nbsp;Management</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Motivation</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Upskilling</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Konfliktmanagement</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Potenzialanalyse</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'management-text', 'coaching'),
(373, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>&nbsp; &nbsp; &nbsp;Career</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\">Analysis of strengths &amp; weaknesses</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Job application</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Reorientation</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\">Self-employment</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><span style=\"color:#2980b9\"><strong>&nbsp; &nbsp; &nbsp;Karriere</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>&nbsp;<span style=\"color:#2980b9\">St&auml;rken-&amp;-Schw&auml;chen-Analyse</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Bewerbung</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Neuorientierung</span></li>\r\n	<li style=\"text-align:justify\">&nbsp;<span style=\"color:#2980b9\">Selbst&auml;ndigkeit</span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'career-text', 'coaching'),
(374, '<p><em><strong>&ldquo;Our values reflect the cornerstones of our corporate philosophy. They are the principles that guide our actions every day.&ldquo;</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Prof. Dr. Mathias Kunze,</p>\r\n\r\n<p>President&nbsp;of&nbsp;ONSITES Graduate School</p>', '<p><em><strong>&bdquo;Unsere Werte spiegeln die Eckpfeiler unserer Unternehmensphilosophie wider. Sie sind die Prinzipien, nach denen wir unser Handeln tagt&auml;glich ausrichten.&ldquo;</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Prof. Dr. Mathias Kunze,</p>\r\n\r\n<p>Rektor der ONSITES Graduate School</p>', '', '', '', 1, 'president-text', 'about'),
(375, '<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Professional Graduates</strong></span></p>\r\n\r\n<p>You have just completed your vocational training and now want to climb the career ladder? Discover our <a href=\"https://graduate.me/en/bachelor-degree/bba-fast-track\">fast-track bachelor</a> and become a business all-rounder in no more than <strong>12&nbsp;months</strong> &ndash; <strong>without <em>Abitur</em>&nbsp;or numerus clausus</strong>.</p>', '<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Berufsabsolventen</strong></span></p>\r\n\r\n<p>Du hast gerade Deine Berufsausbildung abgeschlossen und willst jetzt die Karriereleiter aufsteigen? Entdecke unseren <a href=\"https://graduate.me/de/bachelor/bba\">Fast-Track-Bachelor</a> und werde Business-Allrounder in h&ouml;chstens <strong>12&nbsp;Monaten</strong> &ndash; <strong>ohne Abi &amp; Numerus Clausus</strong>.</p>', '', '', '', 1, 'professional-graduates-text', 'about'),
(376, '<p>&nbsp;</p>\r\n\r\n<p><strong><span style=\"color:#2980b9\">Bachelor Graduates &amp; Professionals</span></strong></p>\r\n\r\n<p>Ready for a leadership position? As a Bachelor&#39;s graduate or experienced professional, you can take your skills to the next level. With an <strong>extra-occupational</strong> <a href=\"https://graduate.me/en/master-degree\">Master</a> or <a href=\"https://graduate.me/en/mba\">MBA</a> program.</p>', '<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Bachelor-Absolventen &amp; Berufspraktiker</strong></span></p>\r\n\r\n<p>Bereit f&uuml;r eine F&uuml;hrungsposition? Als Bachelor-Absolvent oder erfahrener Berufspraktiker kannst Du Deine Skills auf das n&auml;chste Level heben. Mit einem <strong>berufsbegleitenden</strong> <a href=\"https://graduate.me/de/master\">Master</a>- oder <a href=\"https://graduate.me/de/mba\">MBA</a>-Studium.</p>', '', '', '', 1, 'bachelor-graduates-text', 'about'),
(377, '<p>&nbsp;</p>\r\n\r\n<p><strong><span style=\"color:#2980b9\">Master Graduates</span></strong></p>\r\n\r\n<p>You&#39;ve got your Master&#39;s in the bag and now you want to be a top executive? Expand your career opportunities with a part-time&nbsp;<a href=\"https://graduate.me/en/doctorate\">doctorate</a> &ndash; the <strong>fastest </strong>and most <strong>flexible</strong> way to a doctorate degree.</p>', '<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>Master-Absolventen</strong></span></p>\r\n\r\n<p>Du hast den Master in der Tasche und willst jetzt an die F&uuml;hrungsspitze? Expandiere Deine Karrierem&ouml;glichkeiten mit einer&nbsp;<a href=\"https://graduate.me/de/doktorat\">berufsbegleitenden Promotion</a>&nbsp;&ndash; der <strong>schnellste</strong> und <strong>flexibelste</strong> Weg zum Doktor-Titel.</p>', '', '', '', 1, 'master-graduates-text', 'about'),
(378, '<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Study In Excellent Company</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Experience expertise under one roof. ONSITES Graduate School is a private educational institution of ONSITES Group &ndash; an innovative industry expert in digital education and career marketing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thus, you are literally studying in excellent company. Because the company&#39;s outstanding achievements have been recognized not just once, but twice.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Benefit from the proven know-how and do-how of the<strong> two-time winner of the Employer Branding Awards 2022 and 2023</strong>.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Studiere in ausgezeichneter Gesellschaft</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Erlebe hohe Kompetenz vom Fach unter einem Dach. Die ONSITES Graduate School ist eine private Bildungsinstitution der ONSITES Group &ndash; einem innovativen Branchenexperten im Bereich digitale Bildung und Karrieremarketing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Damit studierst Du buchst&auml;blich in exzellenter Gesellschaft. Denn die herausragenden Leistungen des Unternehmens wurden nicht nur einmal ausgezeichnet, sondern gleich zweimal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Profitiere vom bew&auml;hrten Know-how und Do-how des <strong>zweifachen Gewinners des Employer Branding Awards 2022 und 2023</strong>.</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'about-middle-text', 'about'),
(379, '<p>&nbsp;</p>\r\n\r\n<p>ONSITES Graduate School marks the latest milestone in the <strong>5-year success story</strong> of the digital company. As a proven practitioner, ONSITES knows the current and future practical requirements of the labor market.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The focus of education at ONSITES Graduate School is therefore on imparting <strong>immediately transferable skills</strong> in order to successfully assert oneself in the dynamic digitalized professional world.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At the same time, we always keep an eye on <strong>internationality</strong>. Networked with strong <strong>cooperation partners at home and abroad</strong>, we create valuable synergy effects in the form of a broad, international continuing education portfolio in <strong>3 different languages</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Our Claim To Practice</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The strong practical focus of the program portfolio is a key trademark of our teaching. Our aim is to provide education that already enables a high added value in everyday working life during your studies. Your individual professional needs and requirements always form the focus.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In order to guarantee a <strong>balance between theory and practice</strong> in teaching, ONSITES Graduate School safeguards itself twice:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We cooperate not only with <strong>practice-proven <a href=\"https://graduate.me/en/lecturers\">specialists</a></strong> in the respective fields, who pass on their wealth of experience in a direct exchange. In addition, authentic <strong>case studies</strong> are an integral part of our teaching materials, which enable practice on realistic scenarios from professional real-life situations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>The Values We Live By</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Value-oriented action forms the stable foundation for trust and long-term success. ONSITES Graduate School is committed to these values:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Diversity</strong></span>: In the spirit of permeability in the education system, we promote the greatest possible equality of opportunity. We recognize different educational backgrounds and enable flexible access to studies. Even without Abitur, NC or first degree.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Flexibility</span></strong>: As a provider of extra-occupational online degree programs, we create study opportunities according to individual time rules. The compatibility of studies with family, work and private life is one of our top priorities.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Quality</span></strong>: We subject our study programs to regular quality reviews and improve them according to professional requirements, new findings, and feedback from colleagues and students.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Empathy</strong></span>: Dealing with students and peers in an understanding, fair and friendly manner is a matter of honor. Empathy is the fuel that drives our personal support, service and enduring partnerships.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Die ONSITES Graduate School markiert den j&uuml;ngsten Meilenstein in der <strong>5-j&auml;hrigen Erfolgsgeschichte</strong> des digitalen Unternehmens. Als erprobter Praktiker kennt ONSITES die aktuellen und k&uuml;nftigen Praxisanforderungen des Arbeitsmarktes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Im Mittelpunkt der Lehre an der ONSITES Graduate School steht daher die Vermittlung von <strong>sofort transferierbaren F&auml;higkeiten</strong>, um sich in der dynamischen digitalisierten Berufswelt erfolgreich zu behaupten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dabei bewahren wir stets auch den Blick f&uuml;r <strong>Internationalit&auml;t</strong>. Vernetzt mit starken <strong>Kooperationspartnern im In- und Ausland</strong>, schaffen wir wertvolle Synergieeffekte in Form eines breit aufgestellten, internationalen Weiterbildungsangebots in <strong>3 verschiedenen Sprachen</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Unser Praxisanspruch</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Der starke Praxisfokus des Studiengangportfolios ist ein wesentliches Markenzeichen unserer Lehre. Unser Anspruch ist es, Bildung zu bieten, die bereits im Studium einen hohen Mehrwert im Berufsalltag erm&ouml;glicht. Deine individuellen beruflichen Bedarfe und Bed&uuml;rfnisse bilden stets den Ausrichtungspunkt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Um ein <strong>ausgewogenes Verh&auml;ltnis zwischen Theorie und Praxis</strong> in der Lehre zu garantieren, sichert sich die ONSITES Graduate School doppelt ab:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wir kooperieren nicht nur mit <strong>praxiserfahrenen</strong> <a href=\"https://graduate.me/de/dozenten\">Spezialisten und Spezialistinnen</a> der jeweiligen Fachrichtungen, die ihren Erfahrungsreichtum im direkten Austausch weitergeben. Zudem sind authentische <strong>Fallstudien</strong> fester Bestandteil unserer Lehrmaterialien, die ein &Uuml;ben an realit&auml;tsnahen Szenarien aus der Berufspraxis erm&ouml;glichen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Unsere gelebten Werte</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Werteorientiertes Handeln bildet die stabile Grundlage f&uuml;r Vertrauen und langfristigen Erfolg. Die ONSITES Graduate School bekennt sich zu diesen Werten:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Diversit&auml;t</strong></span>: Im Sinne der Durchl&auml;ssigkeit im Bildungssystem f&ouml;rdern wir gr&ouml;&szlig;tm&ouml;gliche Chancengleichheit. Wir anerkennen unterschiedliche Bildungshintergr&uuml;nde und erm&ouml;glichen flexiblen Zugang zum Studium. Auch ohne Abitur, NC und Erststudium.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Flexibilit&auml;t</strong></span>: Als Anbieter von berufsbegleitenden Online-Studieng&auml;ngen schaffen wir ein Studium nach individuellen Zeitregeln. Die Vereinbarkeit des Studiums mit Familie, Beruf und Privatleben ist eine oberste Priorit&auml;t.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Qualit&auml;t</strong></span>: Wir unterziehen unsere Studienprogramme regelm&auml;&szlig;igen Qualit&auml;tspr&uuml;fungen und verbessern sie gem&auml;&szlig; beruflichen Anforderungen, neuen Erkenntnissen sowie R&uuml;ckmeldungen von Kollegen und Studierenden.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><strong><span style=\"color:#2980b9\">Empathie</span></strong>: Ein verst&auml;ndnisvoller, fairer und freundlicher Umgang mit Studierenden und Fachkollegen bzw. Fachkolleginnen ist Ehrensache. Einf&uuml;hlungsverm&ouml;gen ist der Brennstoff, der unseren pers&ouml;nlichen Support, Service und unsere best&auml;ndigen Partnerschaften antreibt.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'about-bottom-text', 'about'),
(381, 'January', 'Januar', NULL, NULL, NULL, 0, 'january', 'study-registration'),
(382, 'February', 'Februar', NULL, NULL, NULL, 0, 'february', 'study-registration'),
(383, 'March', 'März', NULL, NULL, NULL, 0, 'march', 'study-registration'),
(384, 'April', 'April', NULL, NULL, NULL, 0, 'april', 'study-registration'),
(385, 'May', 'Mai', NULL, NULL, NULL, 0, 'may', 'study-registration'),
(386, 'June', 'Juni', NULL, NULL, NULL, 0, 'june', 'study-registration'),
(387, 'July', 'Juli', NULL, NULL, NULL, 0, 'july', 'study-registration'),
(388, 'August', 'August', NULL, NULL, NULL, 0, 'august', 'study-registration'),
(389, 'September', 'September', NULL, NULL, NULL, 0, 'september', 'study-registration'),
(390, 'October', 'Oktober', NULL, NULL, NULL, 0, 'october', 'study-registration'),
(391, 'November', 'November', NULL, NULL, NULL, 0, 'november', 'study-registration'),
(392, 'December', 'Dezember', NULL, NULL, NULL, 0, 'december', 'study-registration'),
(393, 'Please enter your desired start date', 'Bitte gib Dein gewünschtes Startdatum ein', NULL, NULL, NULL, 0, 'start_date', 'study-registration'),
(394, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Book Publishing With Third-Party Publisher &ndash; 5 Good Reasons</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You don&#39;t have to worry about anything! We will handle all publishing activities for you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your advantages:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Global Findability</strong></span>: We market your book worldwide with an <strong>ISBN</strong> and register it with the <strong>Directory of Available Books (VLB)</strong> and the <strong>National Library</strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Targeted Marketing For High Visibility</strong></span>: We promote your book on our <strong>website</strong>, in <strong>social media</strong>, list it in <strong>book wholesalers</strong> and send the deposit copies to the<strong> national library</strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Personal Support</strong></span>: We advise and support you almost around the clock via <strong>phone</strong> and <strong><a href=\"https://graduate.me/en/contact\">e-mail</a></strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Free Copies</strong></span>: Proudly give away your work to relatives, friends and career contacts. We will provide you with <strong>several free copies</strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Custom Book Cover Design</strong></span>: Stand out with a <strong>unique cover design</strong> &ndash; tailored to your wishes.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>How Much Does Book Publishing Cost?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Experience professional publications for every budget. We are also maximally flexible when it comes to price!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>You decide</strong>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\">Sturdy</span> <span style=\"color:#2980b9\"><strong><em>hardcover</em></strong></span>: from 990 Euro</p>\r\n\r\n<p><span style=\"color:#2980b9\">Elastic</span> <span style=\"color:#2980b9\"><strong><em>softcover</em></strong></span>: from 490 Euro</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong><em>eBook exclusive</em></strong></span>: from 149 Euro</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Buch ver&ouml;ffentlichen im Fremdverlag &ndash; 5 gute Gr&uuml;nde</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du brauchst Dich um nichts zu k&uuml;mmern! Wir &uuml;bernehmen s&auml;mtliche verlegerische T&auml;tigkeiten f&uuml;r Dich.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Deine Vorteile:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Globale Auffindbarkeit</strong></span>: Wir vermarkten Dein Buch weltweit mit einer <strong>ISBN</strong> und registrieren es beim <strong>VLB</strong> sowie in der <strong>Nationalbibliothek</strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Gezieltes Marketing f&uuml;r hohe Sichtbarkeit</strong></span>: Wir promoten Dein Buch auf unserer <strong>Webseite</strong>, in den <strong>sozialen Medien</strong>, listen es im <strong>Buchgro&szlig;handel</strong> und versenden die Pflichtexemplare an die <strong>Nationalbibliothek</strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Pers&ouml;nlicher Support</strong></span>: Wir beraten und betreuen Dich fast rund um die Uhr via <strong>Telefon</strong> und <strong><a href=\"https://graduate.me/de/studienberatung\">E-Mail</a></strong>.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Freiexemplare</strong></span>: Verschenke Dein Werk stolz an Verwandte, Freunde und Karriere-Kontakte. Wir stellen Dir <strong>mehrere Belegexemplare</strong> frei zur Verf&uuml;gung.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#2980b9\"><strong>Individuelle Buchcovergestaltung</strong></span>: Gl&auml;nze mit einem <strong>einzigartigen Cover-Design</strong> &ndash; speziell nach Deinen W&uuml;nschen.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Was kostet eine Ver&ouml;ffentlichung?</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Erlebe <strong>professionelle </strong>Ver&ouml;ffentlichungen f&uuml;r jedes Budget. Auch in puncto Preis sind wir maximal flexibel!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Du entscheidest</strong>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\">Stabiles</span><strong><em><span style=\"color:#2980b9\"> Hardcover</span></em></strong>: ab 990 Euro</p>\r\n\r\n<p><span style=\"color:#2980b9\">Elastisches</span><strong><em> <span style=\"color:#2980b9\">Softcover</span></em></strong>: ab 490 Euro</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong><em>eBook exklusive</em></strong></span>: ab 149 Euro</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text-bottom', 'publishing'),
(395, '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>eBook Exclusive</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Modern &amp; eco-friendly &ndash; online-only publication includes <strong>no printing costs</strong>. Your benefit: a <strong>low-cost publication</strong>.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>eBook exklusive</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Modern &amp; umweltbewusst &ndash; eine reine Online-Ver&ouml;ffentlichung beinhaltet <strong>keine Druckkosten</strong>. Dein Benefit: eine <strong>topg&uuml;nstige Ver&ouml;ffentlichung</strong>.</p>', '', '', '', 1, 'text-ebook', 'publishing'),
(396, '<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Print Book</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Feel your writing success firmly in your hands. Your perks: <strong>100% internet-independent</strong>, physical <strong>presence at book fairs &amp; other events</strong>, special bonus: <strong>eBook included</strong>.</p>', '<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Print-Buch</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Sp&uuml;re Dein Werk fest in den H&auml;nden. Deine Vorteile: <strong>100% internetunabh&auml;ngig</strong>, physische <strong>Pr&auml;senz auf Buchmessen &amp; anderen Events</strong>, Spezialbonus: <strong>eBook inklusive</strong>.</p>', '', '', '', 1, 'text-book', 'publishing'),
(397, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Start Online Learning In 3 Steps</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is how easy it works:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"color:#e67e22\">1.</span></strong> <span style=\"color:#2980b9\"><strong>Get <a href=\"https://graduate.me/en#contact-section\">information </a>about your desired study program</strong></span></p>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"color:#e67e22\">2.</span></strong> <span style=\"color:#2980b9\"><strong>Apply online via our <a href=\"https://graduate.me/en/student-portal\">application form</a></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#e67e22\"><strong>3.</strong> </span><strong><span style=\"color:#2980b9\">Enroll after your admission.</span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We would be happy to advise you personally in your search for your dream study program.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Online studieren in 3 Schritten</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Und so einfach funktioniert&rsquo;s:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"color:#e67e22\">1.</span></strong> <span style=\"color:#2980b9\"><strong><a href=\"https://graduate.me#contact-section\">Informiere </a>Dich &uuml;ber Dein Wunschstudium</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"color:#e67e22\">2.</span></strong> <strong><span style=\"color:#2980b9\">Bewirb Dich online &uuml;ber unser <a href=\"https://graduate.me/de/studienberatung\">Bewerbungsformular</a></span></strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"color:#e67e22\">3.</span></strong> <strong><span style=\"color:#2980b9\">&nbsp;Immatrikuliere Dich nach Deiner Zulassung.</span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gerne beraten wir Dich auch pers&ouml;nlich auf der Suche nach Deinem Traumstudium.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'text-bottom', 'digital-studies'),
(398, '<p><strong>We take care of you!</strong></p>', '<p><strong>Wir sind f&uuml;r Dich da!</strong></p>', '', '', '', 1, 'text-message-bottom', 'digital-studies'),
(399, '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Prestigious Study Content</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Learn from the best. Work with the innovative teaching and learning materials of our renowned cooperation partners <strong>Harvard Business Publishing</strong> and <strong>LinkedIn Learning</strong> &ndash; from compact <u>online courses</u> to practical <u>case studies</u> and high-quality <u>articles</u>.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Studieninhalte mit Prestigegarantie</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Lernen von den Besten. Arbeite mit den <strong>innovativen Lehr- und Lernmaterialien</strong> unserer renommierten Kooperationspartner <strong>Harvard Business Publishing</strong> und <strong>LinkedIn Learning</strong> &ndash; von kompakten <u>Online-Kursen</u> &uuml;ber praxisnahe <u>Fallstudien</u> bis hin zu hochwertigen <u>Artikeln</u>.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'text-prestigious-study-content', 'digital-studies'),
(400, '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Optional Online Events</strong></span></p>\r\n\r\n<p>Broaden your horizons and deepen your expertise in interactive live lectures and seminars. In <strong>direct exchange</strong> with experienced <a href=\"https://graduate.me/en/lecturers\">speakers</a>, you will receive real practical examples, tips and solutions for your everyday work.</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Optionale Online-Events</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Erweitere Deinen Horizont und vertiefe Dein Fachwissen in interaktiven Live-Vorlesungen und -Seminaren. Im <strong>direkten Austausch</strong> mit praxiserprobten <a href=\"https://graduate.me/de/dozenten\">Referenten</a> erh&auml;ltst Du echte Praxisbeispiele, Tipps und L&ouml;sungsans&auml;tze f&uuml;r Deinen Berufsalltag.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text-optional-online-events', 'digital-studies'),
(401, '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Digital Exams</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">You work on tasks and complete exams completely <strong>independent of location</strong>. You simply send us your results <strong>by e-mail</strong>. Oral exams also take place online &ndash; conveniently via <strong>video conference</strong>.</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Digitale Pr&uuml;fungen</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Du bearbeitest Aufgaben und absolvierst Pr&uuml;fungen vollkommen <strong>ortsunabh&auml;ngig</strong>. Deine Ergebnisse sendest Du uns einfach <strong>per E-Mail</strong> zu. Auch m&uuml;ndliche Pr&uuml;fungen finden online statt &ndash; bequem per <strong>Videokonferenz</strong>.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'text-digital-exams', 'digital-studies'),
(402, '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">You submit written work such as <u>essays</u>, <u>term papers</u> and your <u>thesis</u> in digital and printed form.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">No time to print yourself or stand in line at the copy store? Print and bind your thesis with just one click. With our reliable partner Thesis &amp; Me. Your <u>benefit</u>: You can have your thesis <u>sent directly to our address</u>!</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Personal Support From A To Z</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Experience <strong>individual advice and support </strong>from start to finish.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Do you have questions about the organization or the programs? Your <strong>personal tutor</strong> is always at your side &ndash; <strong>365 days</strong> a year: via e-mail, phone or video call.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Planning problems, learning difficulties or lack of motivation? Benefit from intensive <a href=\"https://graduate.me/en/coaching-services\">one-on-one coaching</a> in the field of education. Whether it&#39;s time management, writing your thesis, or preparing for your oral exam, your <strong>private coach</strong> has got you covered - with <strong>100% custom-fit solutions</strong>.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Schriftliche Ausarbeitungen wie <u>Essays</u>, <u>Hausarbeiten</u> und Deine <u>Abschlussarbeit</u> reichst Du in <strong>digitaler und gedruckter Form</strong> ein.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Keine Zeit zum Selberdrucken oder Anstehen im Copyshop? Drucke und binde Deine Arbeit einfach per Klick. Mit unserem verl&auml;sslichen Partner <em>Thesis &amp; Me</em>. Dein <u>Vorteil</u>: Du kannst die Arbeit <u>direkt an unsere Adresse schicken</u> lassen!</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Pers&ouml;nlicher Support von A bis Z</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Erlebe <strong>individuelle Beratung und Betreuung</strong> von Anfang bis zum Ende.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast Fragen zur Organisation oder zu den Programmen? Dein <strong>pers&ouml;nlicher Tutor</strong> ist jederzeit an Deiner Seite &ndash; <strong>365 Tage</strong> im Jahr: via E-Mail, Telefon oder Videocall.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Planungsprobleme, Lernschwierigkeiten oder Motivationsmangel? Profitiere von einem intensiven <a href=\"https://graduate.me/de/studienberatung\">Einzelcoaching</a> im Bereich Bildung. Ob beim Zeitmanagement, bei der Erstellung Deiner Abschlussarbeit oder bei der Vorbereitung auf Deine m&uuml;ndliche Pr&uuml;fung: Dein <strong>Privatcoach</strong> h&auml;lt Dir den R&uuml;cken frei &ndash; mit <strong>100% passgenauen L&ouml;sungen</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'text-before-message', 'digital-studies'),
(403, 'Overview', 'Überblick', '', '', '', 0, 'overview', 'header-nav'),
(404, '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Increase Your Visibility With A Monograph &amp; eBook</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Congratulations! You&rsquo;ve got it made. Your scientific masterpiece is finally complete.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Now share your expertise and make a name for yourself &ndash; because your efforts are worth it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whether it&#39;s a bachelor&#39;s thesis, master&#39;s thesis, doctoral dissertation, post-doctoral thesis or a textbook &ndash; we guarantee a <strong>reliable</strong> and <strong>fast</strong> publication with <strong>flexible</strong> options.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The choice is yours:</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Erh&ouml;he Deine Sichtbarkeit mit Monographie &amp; eBook</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gl&uuml;ckwunsch! Du hast es geschafft. Dein wissenschaftliches Meisterwerk ist endlich vollendet.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Teile jetzt Dein Fachwissen und mache Dir einen Namen &ndash; damit sich Deine M&uuml;he auszahlt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ob Bachelorarbeit, Masterarbeit, Dissertation, Habilitationsschrift oder Fachbuch &ndash; wir garantieren eine <strong>seri&ouml;se</strong> und <strong>schnelle </strong>Ver&ouml;ffentlichung mit <strong>flexiblen</strong> Optionen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Du hast die Wahl:</p>', '', '', '', 1, 'text-two', 'publishing');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(405, '<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Become An Author In Just 3 Steps</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Your own book is within reach. It&#39;s that easy:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><strong>1.</strong></span><span style=\"color:#3498db\"><strong> Make a non-binding inquiry</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><strong>2.</strong></span><span style=\"color:#3498db\"><strong> Confirm offer &amp; send file</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><strong>3.</strong></span><span style=\"color:#3498db\"><strong> Have your book published quickly</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Don&#39;t waste any more time! Get the recognition you deserve.</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Autor werden in nur 3 Schritten</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dein eigenes Buch ist zum Greifen nahe. So einfach geht&rsquo;s:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#e67e22\"><strong>1.</strong></span><span style=\"color:#3498db\"><strong> Unverbindlich anfragen</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><strong>2.</strong></span><span style=\"color:#3498db\"><strong> Angebot best&auml;tigen &amp; Datei zusenden</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#e67e22\"><strong>3.</strong></span><span style=\"color:#3498db\"><strong> Z&uuml;gig Buch ver&ouml;ffentlichen lassen</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Verliere keine Zeit mehr! Erhalte endlich die Anerkennung, die Du verdienst.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '', '', '', 1, 'text-last', 'publishing'),
(406, 'Compare Packages', 'Pakete vergleichen', '', '', '', 0, 'button-compare', 'publishing'),
(407, '<div id=\"group-coaching\">\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Group Coaching Creates Sensational Synergy Effects</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>You want to experience our coaching services in the company of other people? Then group coaching is the ideal choice. Perfect <u>for executives, professionals and self-employed individuals</u>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>That&#39;s why coaching sessions in a group are worthwhile:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>High Interactivity</strong></span>: You reap valuable feedback, inspiration and motivation in the mutual exchange of ideas with like-minded people.</li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>Great Diversity of Perspectives</strong></span>: You develop new ideas based on different points of view and experience accounts.</li>\r\n	<li style=\"text-align:justify\"><span style=\"color:#e67e22\">&nbsp;</span><span style=\"color:#2980b9\"><strong>Strong Practical Focus</strong></span>: You discover effective solutions with direct added value in your everyday professional.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You need group coaching specifically for the members of your team or project? Increase your work performance with a topic-specific<strong> team coaching</strong> or <strong>project coaching</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Because teamwork matters.</p>\r\n\r\n<p>&nbsp;</p>', '<div id=\"group-coaching\">\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Gruppencoaching schafft sensationelle Synergieffekte</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>Du m&ouml;chtest ein Coaching zusammen mit anderen Personen? Dann ist ein Gruppencoaching die ideale Wahl. Perfekt <u>f&uuml;r F&uuml;hrungskr&auml;fte, Fachkr&auml;fte und Selbst&auml;ndige</u>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Darum lohnen sich Coachings in der Gruppe:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Hohe Interaktivit&auml;t</strong></span>: Du erntest&nbsp;wertvolles Feedback, Inspiration und Motivation&nbsp;im gegenseitigen Gedankenaustausch mit Gleichgesinnten.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Gro&szlig;e Perspektivenvielfalt</strong></span>: Du entwickelst neue Ideen anhand verschiedener Sichtweisen und Erfahrungsberichte.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Starker Praxisfokus</strong></span>: Du entdeckst effektive L&ouml;sungen mit direktem Mehrwert in Deinem Berufsalltag.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Du ben&ouml;tigst ein Gruppencoaching speziell f&uuml;r die Mitglieder Deines Teams bzw. Projekts? Steigere Deine Arbeitsleistung&nbsp;mit einem themenspezifischen <strong>Teamcoaching</strong> oder <strong>Projektcoaching</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Weil Dein Erfolg Teamsache ist.</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'group-coaching-text', 'coaching'),
(408, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#2980b9\"><strong>Experience Top Coaching Services In Education, Management &amp; Career</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In which area do you need coaching support?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our <strong>experienced coaches</strong> accompany you with <strong>customized solutions</strong> on your path&nbsp;to your new self.</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#2980b9\"><strong>Erlebe Top-Coaching in Bildung, Management &amp; Karriere</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">In welchem Bereich ben&ouml;tigst Du Coaching-Hilfe?</p>\r\n\r\n<p style=\"text-align:justify\">Unsere<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:red\"> </span></span></span></span></span><strong>erfahrenen Coaches</strong> begleiten Dich mit <strong>ma&szlig;geschneiderten L&ouml;sungen</strong> auf Deinem Weg zum neuen Selbst.</p>\r\n\r\n<p>&nbsp;</p>', '', '', '', 1, 'experience-text', 'coaching'),
(410, 'Place of birth', 'Geburtsort', 'Place of birth', 'Place of birth', '-', 0, 'place-of-birth', 'study-registration'),
(411, 'All-inclusive Publishing Services: The Relevance Boost For Academic Experts', 'Verlagsservice all-inclusive: Der Relevanz-Boost für akademische Könner', NULL, NULL, NULL, 0, 'heading', 'publishing-services'),
(412, '<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Publish a print book or ebook and cover all publishing services in one go &ndash; our dynamic package deal makes it possible. With the ONSITES Graduate School&#39;s comprehensive publishing services, you don&#39;t have to worry about a thing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Discover our top services in detail and put your publication in professional hands. Because it&#39;s so convenient.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Get The All-in-one Benefit Package For Your Publication</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>From <strong>production</strong> to <strong>marketing</strong> to <strong>logistics</strong> &ndash; book publishing can be so simple.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Monograph.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/оpen-book.webp\" style=\"height:1400px; width:2100px\" title=\"A monograph publication gives research lasting visibility.\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>All this is included in our in-house publishing services:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Book Creation Without Compromise: Let&rsquo;s Bring Your Ideas To Life</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Creation/printing of the first edition &amp; subsequent editions</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>From concept to reality: We realize your scientific vision and ensure that your work is always up to date.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Creation of a professional text layout</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Your research, in top form: We ensure a flawless typography and present your work in the best-possible light.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Design of a custom book cover</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>The perfect statement piece: a unique cover design gives your book a personal touch and guarantees a scientific work with a wow effect.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Production of your book as hardcover, softcover and/or e-book</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Every pick is perfect: whether it&#39;s a sturdy hardcover, elastic softcover or eco-friendly e-book &ndash; impress in a variety of formats.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Creation/printing of all color pages using four-color process printing</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Show your true colors: our state-of-the-art printing process ensures vivid, razor-sharp images that make your publication shine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Publication in a scientific journal.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/magazines.webp\" style=\"height:1400px; width:2100px\" title=\"A journal publication promises recognition in the scientific community.\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Registration With Maximum Reach: Be Present On The World Stage</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">ISBN allocation on the US market</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Your key to global visibility: We secure your presence on the American market and beyond &ndash; with a unique ISBN.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Worldwide registration of your book with the VLB Directory</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Your book, available globally: We open the door to a global readership and limitless distribution opportunities.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Registration of your book with the National Library</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Make your work immortal: registration with the German National Library secures your work a place at the heart of the national treasury of knowledge as a significant contribution to national culture and education.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"German National Library.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/white-library.webp\" style=\"height:1400px; width:2100px\" title=\"The National Library is the ideal place to make books permanently accessible to a wide audience.\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Put Your Book In The Spotlight &ndash; With 12 Magical Marketing Tricks</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Listing of your book in the ONSITES Library (online &amp; offline)</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Expand your audience and increase your recognition: By being listed in our in-house library, you will make a lasting name for yourself with our students, <a href=\"https://graduate.me/en/lecturers\">lecturers</a> and researchers.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Targeted library marketing of your book for efficient distribution</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Conquer the center of the scientific community: We maximize the visibility of your work and bring it to the attention and appreciation of researchers worldwide.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Marketing campaigns with other educational institutions &amp; bookstores</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:24px\">Excel at the core of the educational scene: our strategic collaborations put your work in the academic limelight and open up new horizons in the realm of academia.</p>\r\n\r\n<p style=\"margin-left:24px\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Listing of your book with book wholesalers</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>From bookshelf to bestseller: We ensure your publication has maximum availability and presence on the digital and physical shelves of booksellers globally.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Publicizing your book on our social media channels</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Go viral: Positioning your book on social media puts it in the focus of the digital world and increases your reach exponentially.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Boost your new publications with e-mail marketing</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Attract attention with express speed: Our targeted e-mail campaigns catapult your research directly into the mailboxes of renowned scholars and thus guarantee immediate attention in research circles.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Organization of reviews for positive book ratings</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>On the right track with positive feedback: our extensive network gives you enthusiastic book reviews that lend your work additional weight, credibility and prestige.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Organization of book events for students and lecturers</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Position yourself like a pro: Our exclusive book events offer your book an inspiring presentation platform for an intensive exchange of knowledge and fruitful expert dialog.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Press releases and media reporting on new publications</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Impress the press: We make your work the talk of the media and celebrate your research as a pioneering contribution to academia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Presentation of your book using book trailers and videos on video sharing platforms</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>A real eye-catcher: Our creative video marketing ensures an impressive preview of your work that will captivate every vision hunter. See for yourself!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Promotion of book awareness through audio productions &amp; podcasts</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Make yourself heard: Our captivating audio content creates a sound connection to all academic ears. Sound good?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Chance to win the ONSITES Book Award</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>The crowning glory of your success: Secure your place in the race for excellence and get the expert recognition you deserve.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Publications with a wow effect.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/light-bulbs-and-books.webp\" style=\"height:1400px; width:2100px\" title=\"The right book marketing gives innovative ideas wings\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Efficient Logistics Solutions: We Get Your Books To Their Destination Worldwide</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Inventory management of your book</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:24px\">Always at hand: Benefit from optimum availability of your work to reach your audience at the crucial moments.</p>\r\n\r\n<p style=\"margin-left:24px\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Logistics Provider Services</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Precise, punctual, perfect: we optimize the entire distribution process so that your work reaches your readers quickly, efficiently and reliably.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Impress Your Colleagues With FREE Copies</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">6 voucher copies included for the author</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Self-promotion for free: Give your book away to friends, universities or libraries and expand your network in the academic world like never before.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Book publishing with a happy ending.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/books-and-graduation-cap.webp\" style=\"height:1400px; width:2100px\" title=\"A smooth publication service ensures stress-free research success.\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Experience Package-deal Publishing Services At Their Best</strong></span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ready to take your scientific work to the next level? Then contact us today and increase your relevance as a science expert!</p>', '<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Print-Buch ver&ouml;ffentlichen oder eBook ver&ouml;ffentlichen und alle Publikationsleistungen auf einen Schlag abdecken - unser Komplettpaket macht&#39;s m&ouml;glich. Mit dem umfassenden Verlagsservice der ONSITES Graduate School brauchst Du Dir um nichts Gedanken machen.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Entdecke jetzt unsere Top-Leistungen im Detail und lege Deine Publikation in professionelle H&auml;nde. Einfach, weil&#39;s bequem ist.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#3498db\"><strong>Sichere Dir das All-in-One-Vorteilspaket f&uuml;r Deine Publikation</strong></span></h2>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Von der <strong>Herstellung</strong> &uuml;ber das <strong>Marketing</strong> bis hin zur <strong>Logistik</strong> - die Ver&ouml;ffentlichung eines Buches kann so sch&ouml;n simpel sein.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Monographie.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/оpen-book.webp\" style=\"height:1400px; width:2100px\" title=\"Eine Monographie-Veröffentlichung verleiht Forschung dauerhafte Sichtbarkeit.\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Das alles enth&auml;lt unser Inhouse-Verlagsservice:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#3498db\"><strong>Buch erstellen ohne Kompromisse: Erwecke Deine Ideen zum Leben</strong></span></h2>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Erstellung/Druck der Erstauflage &amp; Folgeauflagen</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Vom Konzept zur Realit&auml;t: Wir verwirklichen Deine wissenschaftliche Vision und stellen sicher, dass Dein Werk immer auf dem neuesten Stand ist.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Erstellung eines professionellen Textlayouts</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Forschung mit Format: Wir sorgen f&uuml;r ein makelloses Textbild und pr&auml;sentieren Deine Arbeit im besten Licht.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Gestaltung eines individuellen Buchcovers</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Das perfekte Aush&auml;ngeschild: Ein einzigartiges Cover-Design gibt Deinem Buch eine pers&ouml;nliche Note und garantiert ein wissenschaftliches Werk mit Wow-Effekt.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Produktion Deines Buches als Hardcover, Softcover und/oder&nbsp;eBook</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Jede Wahl optimal: Ob robustes Hardcover, elastisches Softcover oder umweltfreundliches eBook - beeindrucke in vielf&auml;ltigen Formaten.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Erstellung/Druck aller Farbseiten im Vier-Farb-Druck</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Alles im gr&uuml;nen Bereich: Unser hochmodernes Druckverfahren sorgt f&uuml;r lebendige, gestochen scharfe Abbildungen, die Deine Publikation zum Leuchten bringen.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Veröffentlichung in einer wissenschaftlichen Fachzeitschrift.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/magazines.webp\" style=\"height:1400px; width:2100px\" title=\"Eine Fachzeitschrift-Veröffentlichung verspricht Anerkennung in der wissenschaftlichen Gemeinschaft.\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:#3498db\"><strong>Registrierung mit maximaler Reichweite: Toppr&auml;sent auf der Weltb&uuml;hne</strong></span></h2>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Zuteilung der ISBN auf dem US-Markt</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Dein Schl&uuml;ssel zur globalen Sichtbarkeit: Wir sichern Deine Pr&auml;senz auf dem amerikanischen Markt und dar&uuml;ber hinaus - mit einer einzigartigen ISBN<span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">.</span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Regisrierung Deines&nbsp;Buches beim Verzeichnis Lieferbarer B&uuml;cher weltweit</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Dein Buch, weltweit verf&uuml;gbar: Wir &ouml;ffnen Dir T&uuml;r und Tor zu einer globalen Leserschaft und grenzenlosen Vertriebsm&ouml;glichkeiten.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Registrierung Deines Buches bei der Nationalbibliothek</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Mache Deine Arbeit unsterblich: Die Registrierung bei der Nationalbibliothek sichert Deinem Werk einen Platz im Herzen der nationalen Wissenssch&auml;tze als bedeutender Beitrag zur nationalen Kultur und Bildung.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Deutsche Nationalbilbiothek.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/white-library.webp\" style=\"height:1400px; width:2100px\" title=\"Die Nationalbibliothek ist der ideale Ort, um Werke dauerhaft einem breiten Publikum zugänglich zu machen.\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><strong><span style=\"color:#3498db\">Setze Dein Buch in Szene - mit 12 magischen Marketingtricks</span></strong></h2>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Listung Deines Buches in der ONSITES-Bibliothek (online &amp; offline)</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Publikum erweitern und Anerkennung erh&ouml;hen: Mit der Listung in unserer Inhouse-Bibliothek machst Du Dir einen bleibenden Namen bei unseren Studierenden, <a href=\"https://graduate.me/de/dozenten\">Dozierenden</a> und Forschenden.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Gezielte Bibliotheksvermarktung Deines Buches f&uuml;r eine effiziente Verbreitung</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Erobere das Zentrum der Fachwelt: Wir maximieren die Sichtbarkeit Deines Werks und bringen es gezielt in die Aufmerksamkeit und Wertsch&auml;tzung von Forschenden weltweit.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Marketingkampagnen mit anderen Bildungseinrichtungen &amp; Buchhandel</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Gl&auml;nze im Mittelpunkt des Bildungsgeschehens: Unsere strategischen Kooperationen bef&ouml;rdern Dein Werk ins akademische Rampenlicht und er&ouml;ffnen neue Horizonte in der Wissenschaftscommunity.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:48px\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Listung Deines Buches beim Buchgro&szlig;handel</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Vom Buchregal zum Bestseller: Wir sichern Deiner Publikation h&ouml;chste Verf&uuml;gbarkeit und Pr&auml;senz in den digitalen und physischen Regalen von Buchh&auml;ndlern weltweit.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Bekanntmachung Deines Buches auf unseren Social-Media-Kan&auml;len</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Go viral: Eine Positionierung in den sozialen Medien r&uuml;ckt Dein Buch in den Blickpunkt der digitalen Welt und steigert Deine Reichweite exponentiell.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Boosten von Neuver&ouml;ffentlichungen mittels E-Mail-Marketing</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Auffallen mit Expressgeschwindigkeit: Unsere gezielten E-Mail-Kampagnen katapultieren Deine Forschung direkt in die Postf&auml;cher renommierter Wissenschaftler und garantieren so sofortige Aufmerksamkeit in Forschungskreisen.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Organisation von Rezensionen f&uuml;r positive Buchbewertungen</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Genie&szlig;e den Glanz positiver Resonanz: Unser weitreichendes Netzwerk beschert Dir begeisterte Buchbewertungen, die Deinem Werk zus&auml;tzliches Gewicht, Glaubw&uuml;rdigkeit und Prestige verleihen.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Durchf&uuml;hrung von Buch-Events f&uuml;r Studierende und Dozenten</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Profi-Positionierung: Unsere exklusiven Buch-Veranstaltungen bieten Deinem Buch eine inspirierende Pr&auml;sentationsplattform f&uuml;r intensiven Wissensaustausch und fruchtbaren Fachdialog.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Pressemitteilungen und Medienberichterstattung &uuml;ber Neuerscheinungen</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Im Fokus der Weltpresse: Wir machen Dein Werk zum Gespr&auml;chsthema der Medien und feiern Deine Forschung als wegweisenden Beitrag zur Wissenschaft.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">Pr&auml;sentation Deines Buches mittels Buchtrailer und Videos auf Video-Sharing-Plattformen</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Ein echter Hingucker: Unser kreatives Videomarketing sorgt f&uuml;r eine eindrucksvolle Vorschau Deiner Arbeit, die jeden Visionsj&auml;ger in den Bann zieht. Du wirst Augen machen!</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">\r\n	<h3><span style=\"color:#3498db\">F&ouml;rderung der Buchbekanntheit durch Audioproduktionen &amp; Podcasts</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Verschaffe Dir mehr Geh&ouml;r: Unser fesselnder Audiocontent schafft eine klangvolle Verbindung zu allen akademischen Ohrenb&auml;ren. Wenn das nicht gut klingt.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Chance auf den ONSITES-Book-Award</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Die Kr&ouml;nung Deines Erfolgs: Sichere Dir Deine Teilnahme am Wettlauf um Exzellenz und hole Dir die fachliche Anerkennung, die Du verdienst.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Veröffentlichungen mit Wow-Effekt.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/light-bulbs-and-books.webp\" style=\"height:1400px; width:2100px\" title=\"Das richtige Buch-Marketing verleiht innovativen Ideen Flügel.\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2><strong><span style=\"color:#3498db\">Effiziente Logistikl&ouml;sungen: Wir bringen Deine B&uuml;cher weltweit ans Ziel</span></strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Lagerbestandsf&uuml;hrung des Buches</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Immer griffbereit: Profitiere von optimaler Verf&uuml;gbarkeit Deines Werks und erreiche Deine Publikum in den entscheidenden Momenten.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">Logistik Provider Services</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Pr&auml;zise, p&uuml;nktlich, perfekt: Wir optimieren den gesamten Vertriebsprozess, damit Dein Werk schnell, effizient und zuverl&auml;ssig in die H&auml;nde Deiner Leser gelangt.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong><span style=\"color:#3498db\">Beeindrucke Deine Kollegen mit GRATIS-Exemplaren</span></strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><span style=\"color:#3498db\">6 inkludierte Belegexemplare f&uuml;r den Autor</span></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Eigenwerbung zum Nulltarif: Verschenke Dein Buch an Fachfreunde, Universit&auml;ten oder Bibliotheken und expandiere Dein Netzwerk in der Fachwelt wie nie zuvor.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Buch veröffentlichen mit Happy End.\" class=\"publishing-service-images\" src=\"https://graduate.me/public/images/books-and-graduation-cap.webp\" style=\"height:1400px; width:2100px\" title=\"Ein reibungsloser Publikationsservice sorgt für stressfreien Forschungserfolg.\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2><span style=\"color:#3498db\"><strong>Erlebe Rundum-sorglos-Verlagsservice vom Feinsten</strong></span></h2>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p>Bereit, Dein wissenschaftliches&nbsp;Werk auf das n&auml;chste Level zu heben? Dann kontaktiere uns noch heute und steigere Deine Relevanz als Wissenschaftsexperte!</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span></p>', NULL, NULL, NULL, 1, 'text', 'publishing-services'),
(413, 'Would you like to find out more about our degree programs and courses? We look forward to providing you with all the information you need to make the right choice for your academic future.', 'Du möchtest mehr über unsere Studiengänge und Kurse erfahren? Wir freuen uns darauf, Dir alle Informationen bereitzustellen, die Du benötigst, um die richtige Wahl für Deine akademische Zukunft zu treffen.', '', '', '', 0, 'modal-1', 'student-advisory-service'),
(414, 'Would you like to have previous achievements recognized? We can advise you on your options for blanket and individual recognition.', 'Du möchtest Vorleistungen anerkennen lassen? Wir beraten Dich über Deine Möglichkeiten zur pauschalen und individuellen Anrechnung.', '', '', '', 0, 'modal-2', 'student-advisory-service'),
(415, 'Interested in an event at ONSITES Graduate School? We’ll be happy to advise you on the procedures of our conferences & workshops and other events.', 'Interesse an einer Veranstaltung an der ONSITES Graduate School? Gerne beraten wir Dich zum Ablauf unserer Konferenzen & Workshops und anderer Events.', '', '', '', 0, 'modal-3', 'student-advisory-service'),
(416, 'Would you like to take part in a coaching program? Simply write us a message below and receive a non-binding offer.', 'Du möchtest an einem Coaching teilnehmen? Schreibe uns einfach unten eine Nachricht und erhalte ein unverbindliches Angebot.', '', '', '', 0, 'modal-4', 'student-advisory-service'),
(417, 'Would you like to publish a book? Be sure to make a non-binding inquiry below and receive a personalized quote within 24 hours on weekdays.', 'Du möchtest ein Buch veröffentlichen? Dann stelle unten eine unverbindliche Anfrage und erhalte ein individuelles Angebot binnen 24h werktags.', '', '', '', 0, 'modal-5', 'student-advisory-service'),
(418, 'Interested in a cooperation? Please get in touch with us. We will be happy to explore all the possibilities for a partnership together.', 'Interesse an einer Kooperation? Dann setze Dich mit uns in Verbindung. Gerne erkunden wir gemeinsam alle Möglichkeiten für eine Zusammenarbeit.', '', '', '', 0, 'modal-6', 'student-advisory-service'),
(419, 'Media representatives are very welcome. Get media-related information and resources about ONSITES Graduate School, schedule an interview, or submit a collaboration request.', 'Wir heißen Medienvertreter herzlich willkommen. Erhalte medienrelevante Informationen und Ressourcen über die ONSITES Graduate School, vereinbare einen Interviewtermin oder stelle eine Anfrage zur Kooperation.', '', '', '', 0, 'modal-7', 'student-advisory-service'),
(420, 'We’ll answer all your questions about data protection, examination regulations, study contracts and other legal matters related to your studies.', 'Wir beantworten alle Deine Fragen zu Datenschutz, Prüfungsregelungen, Studienverträgen und anderen rechtlichen Angelegenheiten im Zusammenhang mit Deinem Studium.', '', '', '', 0, 'modal-8', 'student-advisory-service'),
(421, 'Difficulties with our website? Our IT team is ready to fix all technical issues quickly and ensure you a smooth user experience.', 'Schwierigkeiten mit unserer Website? Unser IT-Team steht bereit, alle technischen Probleme schnell zu beheben und Dir eine reibungslose User-Experience zu gewährleisten.', '', '', '', 0, 'modal-9', 'student-advisory-service'),
(424, '<p>Your All-in-one Contact Point For Quick Solutions</p>', '<p>Alles im Blick: Deine Anlaufstelle f&uuml;r schnelle L&ouml;sungen</p>', '', '', '', 1, 'second-heading', 'student-advisory-service'),
(425, '<p>We look forward to receiving your message. We usually respond within one business day.</p>', '<p>Wir freuen uns auf Deine Nachricht. In der Regel antworten wir innerhalb eines Werktages.</p>', '', '', '', 1, 'message-below-first', 'student-advisory-service'),
(426, '<p><strong>You want to tell us your request directly? Just give us a call!</strong></p>', '<p><strong>Du m&ouml;chtest uns&nbsp;Dein Anliegen direkt mitteilen? Dann rufe uns an!</strong></p>', '', '', '', 1, 'message-below-second', 'student-advisory-service'),
(427, '<p><span style=\"color:#3498db\"><strong>+41 44 5868130</strong></span></p>', '<p><span style=\"color:#3498db\"><strong>+41 44 5868130</strong></span></p>', '', '', '', 1, 'message-below-third', 'student-advisory-service'),
(428, '<p><strong>Experience personal top support in English and German.</strong></p>', '<p><strong>Erlebe pers&ouml;nlichen Top-Support in Deutsch und Englisch.</strong></p>', '', '', '', 1, 'message-below-fourth', 'student-advisory-service'),
(429, '<p>Thank you for your interest!</p>', '<p>Vielen Dank f&uuml;r Dein Interesse!</p>', '', '', '', 1, 'message-below-fifth', 'student-advisory-service'),
(430, '<p>Send Us Your Request</p>', '<p>Schreibe uns Dein Anliegen</p>', '', '', '', 1, 'contact-us-text', 'student-advisory-service'),
(431, 'Code of Ethics', 'Ethikkodex', '', '', '', 0, 'code-of-ethics', 'footer'),
(432, '<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School Code of Ethics is a guideline that forms the basis of our shared values and commitments. At ONSITES, ethics and integrity are not just buzzwords, but a promise we make to all our students, faculty and staff.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our ethics are our focus, our drive and our commitment. It guides us on our path to excellence in education and research. The principles it contains serve not only to guide our behavior, but also to create a respectful and inspiring educational community. Our ethics are the essence of what we do and what we stand for.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Anchored in our strong ethical foundation, we proudly present our ten ethical principles:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>1. Integrity and honesty</strong></h2>\r\n\r\n<p>We are committed to maintaining the highest standards of integrity and honesty in all our activities. We promote academic honesty and encourage our students and faculty to behave ethically.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>2. Respect</strong></h2>\r\n\r\n<p>We value the dignity and diversity of each individual. Respect for the opinions, backgrounds and identities of our students, lecturers and employees is of the utmost importance to us.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>3. Excellence in teaching and research</strong></h2>\r\n\r\n<p>We strive for academic excellence in teaching and research. Our lecturers and students are committed to diligent research and high-quality teaching.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>4. Promotion of equality</strong></h2>\r\n\r\n<p>We are actively committed to gender equality, diversity and inclusion. Discrimination and harassment are not tolerated.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>5. Responsibility towards the community</strong></h2>\r\n\r\n<p>We recognize our social responsibility and strive to make positive contributions to the communities in which we operate. This includes sustainability and environmental protection.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>6. Confidentiality and data protection</strong></h2>\r\n\r\n<p>We respect the confidentiality of information and data entrusted to us and protect the privacy of our students and employees.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>7. Fair handling of conflicts</strong></h2>\r\n\r\n<p>We are committed to resolving conflicts in a fair and respectful manner and treating all parties fairly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>8. Openness and transparency</strong></h2>\r\n\r\n<p>We strive for openness and transparency in our decision-making processes and in communication with our community.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>9. Continuous further development</strong></h2>\r\n\r\n<p>We strive for continuous improvement and further development in our educational programs, research activities and organizational processes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>10. Compliance with legal regulations and standards</strong></h2>\r\n\r\n<p>We comply with applicable laws, regulations and standards and act ethically and in accordance with the law.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Our code of ethics is not static, it is alive. It grows and evolves with us as we continue to develop our educational institution and fulfill our educational mission. We invite all members of our community to live and promote these principles to create a bright future. Thank you for being a part of our educational community and sharing our ethical values.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>&nbsp;</p>\r\n\r\n<p>Der Ethikkodex der ONSITES Graduate School ist eine Richtschnur, welche die Grundlage unserer gemeinsamen Werte und Verpflichtungen bildet. Bei ONSITES sind Ethik und Integrit&auml;t nicht nur Schlagw&ouml;rter, sondern ein Versprechen, das wir allen unseren Studierenden, Dozierenden und Mitarbeitenden geben.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unsere Ethik ist unsere Ausrichtung, unser Antrieb und unsere Verpflichtung. Sie leitet uns auf unserem Weg zur Spitzenleistung in Bildung und Forschung. Die darin enthaltenen Prinzipien dienen nicht nur zur Steuerung unseres Verhaltens, sondern auch zur Schaffung einer respektvollen und inspirierenden Bildungsgemeinschaft. Unsere Ethik ist die Essenz dessen, was wir tun und wof&uuml;r wir stehen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Verankert in unserer starken ethischen Grundlage pr&auml;sentieren wir stolz unsere zehn ethischen Prinzipien:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>1. Integrit&auml;t und Ehrlichkeit</strong></h2>\r\n\r\n<p>Wir verpflichten uns zur Wahrung h&ouml;chster Integrit&auml;t und Ehrlichkeit in all unseren Aktivit&auml;ten. Wir f&ouml;rdern akademische Ehrlichkeit und ermutigen unsere Studierenden und Dozierenden, sich ethisch zu verhalten.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>2. Respekt</strong></h2>\r\n\r\n<p>Wir sch&auml;tzen die W&uuml;rde und Vielfalt jedes Einzelnen. Respekt vor den Meinungen, Hintergr&uuml;nden und Identit&auml;ten unserer Studierenden, Dozierenden und Mitarbeitenden ist f&uuml;r uns von gr&ouml;&szlig;ter Bedeutung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>3. Exzellenz in der Lehre und Forschung</strong></h2>\r\n\r\n<p>Wir streben nach akademischer Exzellenz in Lehre und Forschung. Unsere Dozierenden und Studierenden verpflichten sich zur sorgf&auml;ltigen Forschung und qualitativ hochwertigen Lehre.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>4. F&ouml;rderung der Gleichstellung</strong></h2>\r\n\r\n<p>Wir setzen uns aktiv f&uuml;r die Gleichstellung der Geschlechter, Vielfalt und Inklusion ein. Diskriminierung und Bel&auml;stigung werden nicht toleriert.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>5. Verantwortung gegen&uuml;ber der Gemeinschaft</strong></h2>\r\n\r\n<p>Wir erkennen unsere soziale Verantwortung an und bem&uuml;hen uns um positive Beitr&auml;ge zur Gemeinschaft, in der wir t&auml;tig sind. Dies beinhaltet auch Nachhaltigkeit und Umweltschutz.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>6. Vertraulichkeit und Datenschutz</strong></h2>\r\n\r\n<p>Wir respektieren die Vertraulichkeit von Informationen und Daten, die uns anvertraut werden und sch&uuml;tzen die Privatsph&auml;re unserer Studierenden und Mitarbeitenden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>7. Fairer Umgang mit Konflikten</strong></h2>\r\n\r\n<p>Wir verpflichten uns, Konflikte auf faire und respektvolle Weise zu l&ouml;sen und alle Beteiligten gerecht zu behandeln.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>8. Offenheit und Transparenz</strong></h2>\r\n\r\n<p>Wir streben nach Offenheit und Transparenz in unseren Entscheidungsprozessen und in der Kommunikation mit unserer Gemeinschaft.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>9. Kontinuierliche Weiterentwicklung</strong></h2>\r\n\r\n<p>Wir streben nach kontinuierlicher Verbesserung und Weiterentwicklung in unseren Bildungsprogrammen, Forschungsaktivit&auml;ten und organisatorischen Abl&auml;ufen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>10. Einhaltung gesetzlicher Vorschriften und Standards</strong></h2>\r\n\r\n<p>Wir halten uns an geltende Gesetze, Verordnungen und Standards und handeln ethisch und rechtskonform.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unser Ethikkodex ist nicht statisch, sondern lebendig. Er w&auml;chst und entwickelt sich mit uns, w&auml;hrend wir auch unsere Bildungseinrichtung weiterentwickeln und unseren Bildungsauftrag erf&uuml;llen. Wir laden alle Mitglieder unserer Gemeinschaft ein, diese Prinzipien zu leben und zu f&ouml;rdern, um eine leuchtende Zukunft zu gestalten. Vielen Dank, dass Du ein Teil unserer Bildungsgemeinschaft bist und unsere ethischen Werte teilst.</p>\r\n\r\n<p>&nbsp;</p>', 'text', 'text', 'text', 1, 'text', 'code-of-ethics'),
(433, 'Ethical Elevation: Our Commitment To Educational Excellence', 'Ethische Elevation: Unser Engagement für Bildungsexzellenz', 'heading', 'heading', 'heading', 0, 'heading', 'code-of-ethics'),
(434, 'Examination Regulations At A Glance: The Guide To Your Academic Success', 'Prüfungsordnung im Überblick: Der Leitfaden für Deinen Studienerfolg', 'heading', 'heading', 'heading', 0, 'heading', 'examination-rules'),
(435, '<p>&nbsp;</p>\r\n\r\n<p>We would like to inform you that the examination regulations are currently being actively revised to ensure that they meet current requirements and standards. During this process, we are always striving to ensure transparency and to help you with any questions or uncertainties regarding the examination regulations. Your inquiries are always welcome and we will be happy to answer them and ensure that you are well informed.</p>', '<p>&nbsp;</p>\r\n\r\n<p>Wir m&ouml;chten Dich dar&uuml;ber informieren, dass die Pr&uuml;fungsordnung gegenw&auml;rtig aktiv &uuml;berarbeitet wird, um sicherzustellen, dass sie den aktuellen Anforderungen und Standards entspricht. W&auml;hrend dieses Prozesses sind wir stets bestrebt, Transparenz zu gew&auml;hrleisten und Dir bei allen Fragen oder Unklarheiten zur Pr&uuml;fungsordnung zu helfen. Deine Anfragen sind jederzeit willkommen und wir stehen Dir gern zur Verf&uuml;gung, um diese zu beantworten und sicherzustellen, dass Du gut informiert bist.</p>', 'text', 'text', 'text', 1, 'text', 'examination-rules'),
(436, 'Examination Rules', 'Prüfungsordnung', '', '', '', 0, 'examination-rules', 'footer'),
(437, '<p>Study Programs</p>', '<p>Studienprogramme</p>', '', '', '', 1, 'first-icon-heading', 'student-advisory-service'),
(438, '<p>Degree Shortcut</p>', '<p>Studium verk&uuml;rzen</p>', '', '', '', 1, 'second-icon-heading', 'student-advisory-service'),
(439, '<p>Conferences</p>', '<p>Konferenzen</p>', '', '', '', 1, 'third-icon-heading', 'student-advisory-service'),
(440, '<p>Coaching</p>', '<p>Coaching</p>', '', '', '', 1, 'four-icon-heading', 'student-advisory-service');
INSERT INTO `texts` (`id`, `text_en`, `text_de`, `text_bg`, `text_es`, `text_ru`, `editor`, `title`, `slug`) VALUES
(441, '<p>Book Publishing</p>', '<p>Buchver&ouml;ffentlichung</p>', '', '', '', 1, 'fifth-icon-heading', 'student-advisory-service'),
(442, '<p>Cooperation Requests</p>', '<p>Kooperationsanfragen</p>', '', '', '', 1, 'sixth-icon-heading', 'student-advisory-service'),
(443, '<p>Press &amp; Media</p>', '<p>Presse &amp; Medien</p>', '', '', '', 1, 'seventh-icon-heading', 'student-advisory-service'),
(444, '<p>Legal Issues</p>', '<p>Rechtliche Fragen</p>', '', '', '', 1, 'eight-icon-heading', 'student-advisory-service'),
(445, '<p>Technical Issues</p>', '<p>Technische Fragen</p>', '', '', '', 1, 'ninth-icon-heading', 'student-advisory-service'),
(446, 'Study Programs', 'Studienprogramme', '', '', '', 0, 'dropdown-option-one', 'student-advisory-service'),
(447, 'Degree Shortcut', 'Studium verkürzen', '', '', '', 0, 'dropdown-option-two', 'student-advisory-service'),
(448, 'Conferences', 'Konferenzen', '', '', '', 0, 'dropdown-option-three', 'student-advisory-service'),
(449, 'Coaching', 'Coaching', '', '', '', 0, 'dropdown-option-four', 'student-advisory-service'),
(450, 'Book Publishing', 'Buchveröffentlichung', '', '', '', 0, 'dropdown-option-five', 'student-advisory-service'),
(451, 'Cooperation Requests', 'Kooperationsanfragen', '', '', '', 0, 'dropdown-option-six', 'student-advisory-service'),
(452, 'Press & Media', 'Presse & Medien', '', '', '', 0, 'dropdown-option-seven', 'student-advisory-service'),
(453, 'Legal Issues', 'Rechtliche Fragen', '', '', '', 0, 'dropdown-option-eight', 'student-advisory-service'),
(454, 'Technical Issues', 'Technische Fragen', '', '', '', 0, 'dropdown-option-nine', 'student-advisory-service'),
(455, '<p>Select Your Request</p>', '<p>Anliegen ausw&auml;hlen</p>', '', '', '', 1, 'dropdown-option-request', 'student-advisory-service'),
(456, 'Subject', 'Betreff', '', '', '', 0, 'subject-placeholder', 'student-advisory-service'),
(457, 'Enter Your Message (maximum 2000 characters)', 'Nachricht eingeben (maximal 2000 Zeichen)', '', '', '', 0, 'message-placeholder', 'student-advisory-service'),
(458, 'CODE OF ETHICS', 'ETHIKKODEX', '', '', '', 0, 'code-of-ethics', 'header-nav'),
(459, 'Name', 'Name', '', '', '', 0, 'name-placeholder', 'student-advisory-service'),
(460, 'Email', 'E-Mail', '', '', '', 0, 'email-placeholder', 'student-advisory-service'),
(461, 'Send Now', 'Jetzt senden', '', '', '', 0, 'send-button', 'student-advisory-service'),
(471, '<p>Other Queries</p>', '<p>Sonstige Anliegen</p>', '', '', '', 1, 'ten-icon-heading', 'student-advisory-service'),
(472, 'Your query does not fit into any of the above categories? We’re also happy to support you with all other requests.', 'Dein Anliegen passt in keine der genannten Kategorien? Gerne unterstützen wir Dich auch bei allen sonstigen Anfragen.', '', '', '', 0, 'modal-10', 'student-advisory-service'),
(473, 'Other Queries', 'Sonstige Anliegen', '', '', '', 0, 'dropdown-option-ten', 'student-advisory-service'),
(474, 'Would you like to find out more about our degree programs and courses? We look forward to providing you with all the information you need to make the right choice for your academic future.', 'Du möchtest mehr über unsere Studiengänge und Kurse erfahren? Wir freuen uns darauf, Dir alle Informationen bereitzustellen, die Du benötigst, um die richtige Wahl für Deine akademische Zukunft zu treffen.', '', '', '', 0, 'modal-1', 'student-advisory-service'),
(475, 'Would you like to have previous achievements recognized? We can advise you on your options for blanket and individual recognition.', 'Du möchtest Vorleistungen anerkennen lassen? Wir beraten Dich über Deine Möglichkeiten zur pauschalen und individuellen Anrechnung.', '', '', '', 0, 'modal-2', 'student-advisory-service'),
(476, 'Interested in an event at ONSITES Graduate School? We’ll be happy to advise you on the procedures of our conferences & workshops and other events.', 'Interesse an einer Veranstaltung an der ONSITES Graduate School? Gerne beraten wir Dich zum Ablauf unserer Konferenzen & Workshops und anderer Events.', '', '', '', 0, 'modal-3', 'student-advisory-service'),
(477, 'Would you like to take part in a coaching program? Simply write us a message below and receive a non-binding offer.', 'Du möchtest an einem Coaching teilnehmen? Schreibe uns einfach unten eine Nachricht und erhalte ein unverbindliches Angebot.', '', '', '', 0, 'modal-4', 'student-advisory-service'),
(478, 'Would you like to publish a book? Be sure to make a non-binding inquiry below and receive a personalized quote within 24 hours on weekdays.', 'Du möchtest ein Buch veröffentlichen? Dann stelle unten eine unverbindliche Anfrage und erhalte ein individuelles Angebot binnen 24h werktags.', '', '', '', 0, 'modal-5', 'student-advisory-service'),
(479, 'Interested in a cooperation? Please get in touch with us. We will be happy to explore all the possibilities for a partnership together.', 'Interesse an einer Kooperation? Dann setze Dich mit uns in Verbindung. Gerne erkunden wir gemeinsam alle Möglichkeiten für eine Zusammenarbeit.', '', '', '', 0, 'modal-6', 'student-advisory-service'),
(480, 'Media representatives are very welcome. Get media-related information and resources about ONSITES Graduate School, schedule an interview, or submit a collaboration request.', 'Wir heißen Medienvertreter herzlich willkommen. Erhalte medienrelevante Informationen und Ressourcen über die ONSITES Graduate School, vereinbare einen Interviewtermin oder stelle eine Anfrage zur Kooperation.', '', '', '', 0, 'modal-7', 'student-advisory-service'),
(481, 'We’ll answer all your questions about data protection, examination regulations, study contracts and other legal matters related to your studies.', 'Wir beantworten alle Deine Fragen zu Datenschutz, Prüfungsregelungen, Studienverträgen und anderen rechtlichen Angelegenheiten im Zusammenhang mit Deinem Studium.', '', '', '', 0, 'modal-8', 'student-advisory-service'),
(482, 'Difficulties with our website? Our IT team is ready to fix all technical issues quickly and ensure you a smooth user experience.', 'Schwierigkeiten mit unserer Website? Unser IT-Team steht bereit, alle technischen Probleme schnell zu beheben und Dir eine reibungslose User-Experience zu gewährleisten.', '', '', '', 0, 'modal-9', 'student-advisory-service'),
(483, 'Your query does not fit into any of the above categories? We’re also happy to support you with all other requests.', 'Dein Anliegen passt in keine der genannten Kategorien? Gerne unterstützen wir Dich auch bei allen sonstigen Anfragen.', '', '', '', 0, 'modal-10', 'student-advisory-service'),
(4177, 'ONSITES Graduate School\'s compass of values. In our Code of Ethics you will discover the 10 basic values to which we are committed. Find out more now!', 'Der Wertekompass der ONSITES Graduate School. In unserem Ethik-Kodex entdeckst Du die 10 Grundwerte, denen wir uns verpflichtet fühlen. Jetzt informieren!', '-', '-', '-', 0, 'meta-description', 'code-of-ethics'),
(4178, 'Our Code Of Ethics | ONSITES Graduate School', 'Unser Ethik-Kodex | ONSITES Graduate School', '-', '-', '-', 0, 'meta-title', 'code-of-ethics'),
(4179, 'Our Examination Regulations | ONSITES Graduate School', 'Unsere Prüfungsordnung | ONSITES Graduate School', '-', '-', '-', 0, 'meta-title', 'examination-rules'),
(4180, 'Here you will find the current examination regulations of ONSITES Graduate School for the conduct of examinations in all degree programs and courses. Read now!', 'Hier findest Du die aktuelle Prüfungsordnung der ONSITES Graduate School für die Durchführung der Prüfungen in allen Studiengängen und Kursen. Jetzt lesen!', '-', '-', '-', 0, 'meta-description', 'examination-rules'),
(4181, 'Discover the benefits of our comprehensive publishing services! From production & registration to marketing & logistics – it\'s all here. Learn more now!', 'Unser Verlagsservice – Dein Vorteil. Entdecke alle Top-Leistungen im Schnellüberblick. ✔ Produktion ✔ Registrierung ✔ Marketing ✔ Logistik. Jetzt informieren!', NULL, NULL, NULL, 0, 'meta-description', 'publishing-services'),
(4182, 'All-In-One Publishing Services | ONSITES Graduate School', 'Verlagsservice Total | ONSITES Graduate School', NULL, NULL, NULL, 0, 'meta-title', 'publishing-services'),
(4183, 'Navigate with Ease! Effortlessly find what you\'re looking for with ONSITES Graduate School\'s user-friendly Sitemap. Click here!', 'Alle Seiten auf einen Blick. Mit unserer Sitemap findest Du Dich sofort zurecht - schnell & einfach. Navigiere in Sekunden. Jetzt ausprobieren!', NULL, NULL, NULL, 0, 'meta-description', 'sitemap'),
(4184, 'Sitemap | ONSITES Graduate School', 'Unsere Sitemap | ONSITES Graduate School', NULL, NULL, NULL, 0, 'meta-title', 'sitemap'),
(4185, 'Discover our publishing services', 'Entdecke unseren Verlagsservice', '', '', '', 0, 'services-button', 'publishing'),
(4186, 'Taught in German or Russian', 'Sprache: Deutsch oder Russisch', '-', '-', '-', 0, 'languages-cas', 'study-program'),
(4187, 'Previous', 'Vorherige', 'All', '-', '-', 0, 'previous', 'single-blog'),
(4188, 'Next', 'Nächste', 'All', '-', '-', 0, 'next', 'single-blog'),
(4189, 'Table of contents', 'Inhaltsverzeichnis', 'All', '-', '-', 0, 'table-of-content', 'single-blog'),
(4190, 'Articles', 'Artikel', 'Articles', 'Articles', '-', 0, 'articles', 'single-blog'),
(4191, 'German', 'Deutsch', '', '', '-', 0, 'lang-two', 'study-program'),
(4192, 'English', 'Englisch', '', '', '-', 0, 'lang-one', 'study-program'),
(4193, 'Select communication language with us', 'Wähle die Kommunikationssprache mit uns', '', '', '-', 0, 'text-dropdown', 'study-program'),
(4194, '600.00', '600.00', '600.00', '600.00', '-', 0, 'enrollment-fee-price', 'study-registration'),
(4195, '900.00', '900.00', '900.00', '900.00', '-', 0, 'examination-fee-price', 'study-registration'),
(4196, 'Phone Code', 'Vorwahl', 'Phone Code', 'Phone Code', '-', 0, 'phone-code', 'study-registration'),
(4197, 'Last name', 'Nachname', 'Фамилия', NULL, NULL, 0, 'last_name', 'study-program'),
(4198, 'How did you find out about us?', 'Wie hast Du von uns erfahren?', 'Как ни открихте?', NULL, NULL, 0, 'how_did_you_find', 'study-program'),
(4199, 'Write us more details (optional)', 'Schreibe uns weitere Details (optional)', 'Дайте ни още подробности (незадължително)', NULL, NULL, 0, 'more_details', 'study-program'),
(4200, 'Enter Your Message (maximum 2000 characters)', 'Gib Deine Nachricht ein (maximal 2000 Zeichen)', 'Въведете Вашето съобщение тук (до 2000 символа)', NULL, NULL, 0, 'enter_message_placeholder', 'study-program'),
(4201, 'Empowerment Kit: The Game Changer For Your Studies & Doctorate', 'Empowerment-Kit: Dein Gamechanger für Studium & Promotion', '-', '-', '-', 0, 'heading', 'promotion'),
(4202, '<p style=\"text-align:justify\">Studying and doing a doctorate are not just academic milestones &ndash; they are challenges characterized by intensive research, creative thinking, and strategic planning. To help you meet this challenge as efficiently and productively as possible, we are providing you with the free&nbsp;<strong>Empowerment Kit</strong>. This kit includes innovative tools to significantly shorten and simplify your path to a successful degree or doctorate.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Discover seven ultra-powerful features designed to support you at the highest level.</p>', '<p style=\"text-align:justify\">Studieren und Promovieren sind nicht nur akademische Meilensteine &ndash; sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung gepr&auml;gt sind. Um Dir diese Herausforderung so effizient und produktiv wie m&ouml;glich zu gestalten, stellen wir Dir das kostenfreie <strong>Empowerment-Kit</strong> zur Verf&uuml;gung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verk&uuml;rzen und zu erleichtern.</p>\r\n\r\n<p style=\"text-align:justify\">Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf h&ouml;chstem Niveau zu unterst&uuml;tzen.</p>', '-', '-', '-', 1, 'starting-text', 'promotion'),
(4203, '<h2>Powerful Apple iPad With Integrated AI Writing Assistant</h2>\r\n\r\n<p style=\"text-align:justify\">Academic writing has never been easier. Your new digital companion combines high-end technology with smart AI support. The Apple iPad is not only a powerful tool for literature research, but also an unbeatable helper when writing scientific papers. The integrated AI writing assistant analyzes your texts in real time, formulates text suggestions, makes precise corrections, and generates intelligent suggestions for optimizing your arguments.</p>\r\n\r\n<p style=\"text-align:justify\">But that&#39;s not all. You can use this device to create professional graphics, tables and presentations that impressively visualize your results. Use these technologies to structure complex content more efficiently and take your productivity to a higher level.</p>', '<h2>Leistungsstarkes Apple iPad mit integriertem KI-Schreibassistenten</h2>\r\n\r\n<p style=\"text-align:justify\">Wissenschaftliches Arbeiten war nie einfacher. Dein neuer digitaler Begleiter vereint High-End-Technologie mit smarter KI-Unterst&uuml;tzung. Das Apple iPad ist nicht nur ein leistungsstarkes Werkzeug f&uuml;r die Literaturrecherche, sondern auch ein unschlagbarer Helfer beim Schreiben wissenschaftlicher Arbeiten. Der integrierte KI-Schreibassistent analysiert Deine Texte in Echtzeit, formuliert Textvorschl&auml;ge, nimmt pr&auml;zise Korrekturen vor und generiert intelligente Vorschl&auml;ge f&uuml;r die Optimierung Deiner Argumentationen.</p>\r\n\r\n<p style=\"text-align:justify\">Doch das ist noch nicht alles. Du erstellst mit diesem Ger&auml;t professionelle Grafiken, Tabellen und Pr&auml;sentationen, die Deine Ergebnisse eindrucksvoll visualisieren. Nutze diese Technologien, komplexe Inhalte effizienter zu strukturieren und Deine Produktivit&auml;t auf ein h&ouml;heres Level zu heben.</p>', '-', '-', '-', 1, 'text-one', 'promotion'),
(4204, '<h2>Innovative AI Translator</h2>\r\n\r\n<p style=\"text-align:justify\">Communication without borders is the key to international research and scientific exchange. With the AI translator, you can overcome all language barriers in no time. This powerful tool allows you to scan texts and instantly translate them into and out of up to 106 languages &ndash; both written and spoken.</p>\r\n\r\n<p style=\"text-align:justify\">With an integrated individual user ID, you can communicate seamlessly with researchers and fellow students worldwide without encountering language barriers. Whether for scientific collaborations, studying foreign-language literature or exchanging ideas in global networks &ndash; this AI translator is an indispensable tool for contemporary studies and international research.</p>', '<h2>Innovativer KI-&Uuml;bersetzer</h2>\r\n\r\n<p style=\"text-align:justify\">Grenzenlose Kommunikation ist der Schl&uuml;ssel zur internationalen Forschung und zum wissenschaftlichen Austausch. Mit dem KI-&Uuml;bersetzer &uuml;berwindest Du alle sprachlichen Barrieren im Handumdrehen. Dieses leistungsstarke Tool erm&ouml;glicht das Scannen von Texten und die sofortige &Uuml;bersetzung in und aus bis zu 106 Sprachen &ndash; sowohl schriftlich als auch m&uuml;ndlich.</p>\r\n\r\n<p style=\"text-align:justify\">Mit einer integrierten individuellen Nutzer-ID kannst Du nahtlos mit Forschern und Kommilitonen weltweit kommunizieren, ohne sprachlichen Hindernissen zu begegnen. Ob f&uuml;r wissenschaftliche Kollaborationen, das Studium fremdsprachiger Literatur oder den Austausch in globalen Netzwerken &ndash; dieser KI-&Uuml;bersetzer ist ein unverzichtbares Tool f&uuml;r ein zeitgem&auml;&szlig;es Studium und f&uuml;r internationale Forschung.</p>', '-', '-', '-', 1, 'text-two', 'promotion'),
(4205, '<h2>Stylish Leather Folder With Note-taking Function</h2>\r\n\r\n<p style=\"text-align:justify\">The elegant leather folder combines functionality with elegance and helps you organize your thoughts. From taking handwritten notes during lectures to brainstorming for new projects and structuring scientific work, this folder offers you the perfect platform for staying creative and keeping everything organized and to hand. The high-quality design conveys professionalism while providing the comfort you need during your studies or doctorate.</p>', '<h2>Stilvolle Ledermappe mit Notizfunktion</h2>\r\n\r\n<p style=\"text-align:justify\">Die edle Ledermappe vereint Funktionalit&auml;t mit Eleganz und hilft Dir beim Ordnen Deiner Gedanken. Von handschriftlichen Notizen w&auml;hrend der Vorlesungen &uuml;ber Brainstorming f&uuml;r neue Projekte bis hin zur Strukturierung wissenschaftlicher Arbeiten &ndash; diese Mappe bietet Dir die perfekte Plattform, um kreativ zu bleiben und alles griffbereit zu organisieren. Das hochwertige Design vermittelt Professionalit&auml;t und bietet gleichzeitig den Komfort, den Du im Studium oder w&auml;hrend der Promotion ben&ouml;tigst.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '-', '-', '-', 1, 'text-three', 'promotion'),
(4206, '<h2>Comfortable Earbuds</h2>\r\n\r\n<p style=\"text-align:justify\">Stay connected at all times during your studies or doctorate with the comfortable earbuds. They are ideal for virtual meetings, online seminars or listening to recorded tutorials. What&#39;s more, they can give you a moment of relaxation &ndash; whether it&#39;s listening to your favorite music or an inspiring podcast. The premium sound quality and ergonomic design make the earbuds an indispensable companion for every academic milestone.</p>', '<h2>Komfortable Earbuds</h2>\r\n\r\n<p style=\"text-align:justify\">Mit den komfortablen Earbuds bist Du im Studium oder w&auml;hrend der Promotion jederzeit vernetzt. Sie sind ideal f&uuml;r virtuelle Meetings, Online-Seminare oder das Anh&ouml;ren aufgezeichneter Tutorials. Dar&uuml;ber hinaus k&ouml;nnen sie Dir einen Moment der Entspannung bieten &ndash; sei es beim H&ouml;ren Deiner Lieblingsmusik oder eines inspirierenden Podcast. Die erstklassige Klangqualit&auml;t und das ergonomische Design machen die Earbuds zu einem unverzichtbaren Begleiter f&uuml;r jeden akademischen Meilenstein.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '-', '-', '-', 1, 'text-four', 'promotion'),
(4207, '<h2>Includes Hardcover Bindings For Your Academic Theses</h2>\r\n\r\n<p style=\"text-align:justify\">Your scientific results deserve a first-class reputation. Through our exclusive cooperation with <a href=\"https://thesis.me/en\">Thesis &amp; Me</a>, you will receive three copies of your thesis in a noble hardcover binding. Whether for official submission to your university, to strengthen your image in your professional environment or as a personal copy to position yourself as an expert &ndash; these exclusive editions underline the value of your work and leave a lasting impression.</p>', '<h2>Inklusive Hardcover-Bindungen Deiner wissenschaftlichen Arbeit</h2>\r\n\r\n<p style=\"text-align:justify\">Deine wissenschaftlichen Ergebnisse verdienen eine erstklassige Reputation. Durch unsere exklusive Kooperation mit <a href=\"https://thesis.me/\">Thesis &amp; Me</a> erh&auml;ltst Du drei Exemplare Deiner Abschlussarbeit in edler Hardcover-Bindung. Ob f&uuml;r die offizielle Abgabe an Deine Universit&auml;t, zur St&auml;rkung Deines Images in Deinem beruflichen Umfeld oder als pers&ouml;nliches Exemplar zur Positionierung als Experte &ndash; diese exklusiven Ausgaben unterstreichen den Wert Deiner Arbeit und hinterlassen einen bleibenden Eindruck.</p>', '-', '-', '-', 1, 'text-five', 'promotion'),
(4208, '<h2>Publication Placement In A Renowned Peer-Reviewed Journal</h2>\r\n\r\n<p style=\"text-align:justify\">Academic excellence demands public respect. With this exclusive benefit, your research article will be published in a world-class peer-reviewed journal. This way, your outstanding scientific results will benefit from global visibility and brilliant recognition. With a complimentary copy, you can proudly display this success anywhere.</p>', '<h2>Publikationsplatzierung in renommiertem Peer-Review-Journal</h2>\r\n\r\n<p style=\"text-align:justify\">Akademische Exzellenz verlangt &ouml;ffentlichen Respekt. Mit diesem exklusiven Vorteil wird Dein Forschungsartikel in einem erstklassigen Peer-Review-Journal ver&ouml;ffentlicht. Damit profitieren Deine herausragenden wissenschaftlichen Ergebnisse von globaler Sichtbarkeit und brillanter Anerkennung. Mit einem kostenfreien Exemplar kannst Du diesen Erfolg mit Stolz &uuml;berall pr&auml;sentieren.</p>', '-', '-', '-', 1, 'text-six', 'promotion'),
(4209, '<h2>Professional Career Coaching</h2>\r\n\r\n<p style=\"text-align:justify\">Studying and doing a doctorate in particular are essential career drivers. But you can already start to accelerate your skills for professional success. In six individual and intensive coaching sessions, you will work specifically on the skills that are crucial for your professional success.</p>\r\n\r\n<p style=\"text-align:justify\">Whether it&#39;s about effective application strategies, analytical and strategic thinking, precise communication, confident negotiation skills, effective self-management or individually chosen topics &ndash; the coaching sessions are designed to sharpen your skills and give you the tools you need to excel in your career.</p>', '<h2>Professionelles Karrierecoaching</h2>\r\n\r\n<p style=\"text-align:justify\">Das Studium und insbesondere die Promotion sind wesentliche Karrieretreiber. Beschleunige aber bereits jetzt Deine Kompetenzen f&uuml;r den beruflichen Erfolg. In sechs individuellen und intensiven Coaching-Sitzungen arbeitest Du gezielt an jenen F&auml;higkeiten, die f&uuml;r Deinen beruflichen Erfolg entscheidend sind.</p>\r\n\r\n<p style=\"text-align:justify\">Ob durchschlagende Bewerbungsstrategien, analytisches und strategisches Denken, pr&auml;zise Kommunikation, souver&auml;nes Verhandlungsgeschick, effektives Selbstmanagement oder individuell von Dir gew&auml;hlte Schwerpunkte &ndash; die Coaching-Sessions sind darauf ausgelegt, Deine Kompetenzen zu sch&auml;rfen und Dir jene Tools an die Hand zu geben, um mit einer Top-Karriere zu gl&auml;nzen.</p>', '-', '-', '-', 1, 'text-seven', 'promotion'),
(4210, 'Free Empowerment Kit For Students | ONSITES Graduate School', 'Empowerment-Kit für Dein Studium | ONSITES Graduate School', '-', '-', '-', 0, 'meta-title', 'promotion'),
(4211, 'Make studying more efficient. Discover the ultimate empowerment kit for students. Free top tools to level up your study experience. Learn more!', 'Mach Dein Studium effizienter! Entdecke das ultimative Empowerment-Kit für Studierende. Kostenlose Top-Tools für Deinen Erfolg. Mehr erfahren!', '-', '-', '-', 0, 'meta-description', 'promotion'),
(4212, 'STARTER KIT', 'STARTER KIT', '', '', '', 0, 'kit-button', 'header-nav'),
(4213, 'Discover Your Program Now', 'Jetzt Studiengang entdecken', '-', '-', '-', 0, 'find-program-button', 'promotion'),
(4214, 'Don\'t Miss Out: Subscribe To Our Newsletter!', 'Verpasse keine Chance: Abonniere unseren Newsletter!', '-', '-', '-', 0, 'heading', 'newsletter'),
(4215, '<p style=\"text-align:justify\">Always one step ahead: With our free newsletter, you&#39;ll never miss an educational opportunity again! Receive regular exclusive information and stay up to date.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Your Subscription Benefits:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">🔍 <strong>News &amp; Updates:</strong> Be the first to know about new study programs, scholarships, and partnerships.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">📚 <strong>Insider Knowledge</strong>: Benefit from valuable expert tips and recommendations on studies &amp; career.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">🎓<strong> Trends &amp; Innovations:</strong> Stay informed about the latest developments in the world of online education.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong>Sign up now and secure your knowledge benefits!</strong></p>', '<p>Immer einen Schritt voraus: Mit unserem kostenlosen Newsletter verpasst Du keine Bildungschance mehr! Erhalte regelm&auml;&szlig;ig exklusive Infos und bleibe auf dem Laufenden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Deine Abo-Vorteile:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🔍 <strong>Neuigkeiten &amp; Updates: </strong>Erfahre als Erster von neuen Studienprogrammen, Stipendien und Partnerschaften.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>📚 <strong>Insider-Wissen:</strong> Profitiere von wertvollen Experten-Tipps &amp; Empfehlungen zu Studium &amp; Karriere.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>🎓 <strong>Trends &amp; Innovationen:</strong> Bleib stets informiert &uuml;ber aktuelle Entwicklungen in der Welt der Online-Bildung.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong>Jetzt anmelden und Wissensvorteile sichern!</strong></p>', '-', '-', '-', 1, 'content', 'newsletter'),
(4216, 'First name:', 'Vorname:', '-', '-', '-', 0, 'firstname', 'newsletter'),
(4217, 'Surname:', 'Nachname:', '-', '-', '-', 0, 'lastname', 'newsletter'),
(4218, 'Email address:', 'E-Mail-Adresse:', '-', '-', '-', 0, 'email', 'newsletter'),
(4219, 'Sign Up Now', 'Jetzt anmelden', '-', '-', '-', 0, 'subscribe-button', 'newsletter'),
(4220, '<p>Your data is safe. I hereby confirm that I have read the <a href=\"https://graduate.me/en/privacy-policy\">privacy policy</a> and agree to the processing of my data.</p>', '<p>Deine Daten sind sicher. Hiermit best&auml;tige ich, dass ich die <a href=\"https://graduate.me/de/datenschutz\">Datenschutzerkl&auml;rung</a> gelesen habe, und stimme der Verarbeitung meiner Daten zu.</p>', '-', '-', '-', 1, 'privacy', 'newsletter'),
(4221, 'Newsletter', 'Newsletter', '-', '-', '-', 0, 'newsletter', 'footer'),
(4222, 'Subscribe To Our Newsletter | ONSITES Graduate School', 'Newsletter abonnieren & profitieren | ONSITES Graduate School', '-', '-', '-', 0, 'meta-title', 'newsletter'),
(4223, 'Subscribe to our free newsletter and never miss an educational opportunity! Benefit from exclusive information on programs, scholarships & careers. Sign up now!', 'Abonniere jetzt unseren kostenlosen Newsletter & verpasse keine Bildungschance! Exklusive Infos zu Studium, Stipendien & Karriere. Jetzt anmelden!', '-', '-', '-', 0, 'meta-description', 'newsletter'),
(4224, 'AI-Powered Online Degrees | ONSITES Graduate School', 'Online-Studiengänge mit KI-Vorteil | ONSITES Graduate School', '-', '-', NULL, 0, 'meta-title', 'all-programs'),
(4225, 'Discover our flexible online degrees at a glance. Whether Bachelor\'s, Master\'s or PhD: study with AI-supported tools and personal support. Find out more!', 'Entdecke unsere flexiblen Online-Studiengänge. Bachelor, Master oder Doktor: studiere mit KI-gestützten Tools & persönlicher Betreuung. Jetzt informieren!', '-', '-', '-', 0, 'meta-description', 'all-programs'),
(4226, 'Studying online & doing a part-time doctorate: The smart way to excellence with AI', 'Online studieren & berufsbegleitend promovieren: Smart zu Exzellenz mit KI', '-', '-', NULL, 0, 'heading', 'all-programs'),
(4227, 'Get your degree faster and easier with ONSITES Graduate School. Whether you are studying for a bachelor\'s, master\'s or doctorate – our innovative programs use the latest AI technology to optimize your studies and guide you to your goal with maximum efficiency. Our intelligent concept will take your academic and professional success to the next level. Start when and where it suits you. Be smart, be excellent – with us.', 'Schneller und einfacher zum Abschluss mit der ONSITES Graduate School. Ob Bachelor, Master oder Promotion - unsere innovativen Studiengänge nutzen modernste KI-Technologie, um Dein Studium zu optimieren und Dich mit maximaler Effizienz zum Ziel zu führen. Mit unserem intelligenten Konzept hebst Du Deinen akademischen und beruflichen Erfolg auf das nächste Level. Steige ein, wann und wo es Dir passt. Sei smart, sei exzellent – mit uns.', '-', '-', '-', 0, 'description', 'all-programs'),
(4228, 'Early bird access to brand new degree programs & doctorates', 'Early-Bird-Zugang zu brandneuen Studiengängen & Doktoraten', '-', '-', '-', 0, 'reason_one', 'unsubscribe'),
(4229, 'Exclusive masterclasses with top international experts', 'Exklusive Masterclasses mit internationalen Top-Experten', '-', '-', '-', 0, 'reason_two', 'unsubscribe'),
(4230, 'Peer-reviewed publications as an academic seal of quality', 'Peer-Review-Publikationen als akademisches Qualitätssiegel', '-', '-', '-', 0, 'reason_three', 'unsubscribe'),
(4231, 'Professional career coaching for measurable success', 'Professionelles Karrierecoaching für messbare Erfolge', '-', '-', '-', 0, 'reason_four', 'unsubscribe'),
(4232, 'Innovative AI tools for sustainable academic success', 'Innovative KI-Tools für nachhaltigen Studienerfolg', '-', '-', '-', 0, 'reason_five', 'unsubscribe'),
(4233, 'Personal invitations to premium events & VIP networking', 'Persönliche Einladungen zu Premium-Events & VIP-Networking', '-', '-', '-', 0, 'reason_six', 'unsubscribe'),
(4234, 'Attractive options for financing your studies', 'Attraktive Optionen zur Studienfinanzierung', '-', '-', '-', 0, 'reason_seven', 'unsubscribe'),
(4235, 'Book publication as a turbo for global expert status', 'Buchveröffentlichung als Turbo für globalen Expertenstatus', '-', '-', '-', 0, 'reason_eight', 'unsubscribe'),
(4236, 'Are you sure you want to miss out on the exclusive benefits of the newsletter?', 'Bist Du sicher, dass Du auf die exklusiven Vorteile des Newsletters verzichten möchtest?', '-', '-', '-', 0, 'heading', 'unsubscribe'),
(4237, 'Stay tuned and continue to secure them:', 'Bleib dabei und sichere Dir weiterhin:', '-', '-', '-', 0, 'top-text', 'unsubscribe'),
(4238, 'Would you like to give up these benefits?', 'Möchtest Du diese Vorteile aufgeben?', '-', '-', '-', 0, 'bottom-text', 'unsubscribe'),
(4239, 'If you still want to unsubscribe, please tell us why:', 'Falls Du Dich dennoch abmelden möchtest, verrate uns bitte kurz, warum:', '-', '-', '-', 0, 'tell-us-why', 'unsubscribe'),
(4240, 'I didn\'t know the benefits before', 'Ich kannte die Vorteile bisher nicht', '-', '-', '-', 0, 'reason_one_leave', 'unsubscribe'),
(4241, 'Now you know them - it\'s worth sticking with them!', 'Jetzt kennst Du sie – es lohnt sich, dabei zu bleiben!', '-', '-', '-', 0, 'reason_one_desc', 'unsubscribe'),
(4242, 'I would like to receive fewer updates', 'Ich möchte weniger Updates erhalten', '-', '-', '-', 0, 'reason_two_leave', 'unsubscribe'),
(4243, 'No problem - we will adjust the frequency of your emails.', 'Kein Problem – wir passen die Häufigkeit Deiner E-Mails an.', '-', '-', '-', 0, 'reason_two_desc', 'unsubscribe'),
(4244, 'Der Mehrwert war mir bisher nicht klar', 'Bleib dabei und profitiere künftig direkt von unseren Vorteilen!', '-', '-', '-', 0, 'reason_three_leave', 'unsubscribe'),
(4245, 'Stay with us and benefit directly from our advantages in future!', 'Bleib dabei und profitiere künftig direkt von unseren Vorteilen!', '-', '-', '-', 0, 'reason_three_desc', 'unsubscribe'),
(4246, 'Other', 'Sonstiges', '-', '-', '-', 0, 'reason_four_leave', 'unsubscribe'),
(4247, 'Other  Let us know your wishes - we take your feedback seriously!', 'Teile uns Deine Wünsche mit – wir nehmen Dein Feedback ernst!', '-', '-', '-', 0, 'reason_four_desc', 'unsubscribe'),
(4248, 'Thank you for your feedback!', 'Danke für dein Feedback!', '-', '-', '-', 0, 'thank-you', 'unsubscribe'),
(4249, 'This will help us to constantly improve graduate.me.', 'Damit hilfst du uns, graduate.me ständig zu verbessern.', '-', '-', '-', 0, 'improve', 'unsubscribe'),
(4250, 'Unsubscribe', 'Abmelden', '-', '-', '-', 0, 'unsubscribe-button', 'unsubscribe'),
(4251, 'Feedback(optional)', 'Feedback(optional)', '-', '-', '-', 0, 'feedback', 'unsubscribe'),
(4252, 'No, I want to keep these benefits!', 'Nein, ich möchte diese Vorteile behalten!', '-', '-', '-', 0, 'resubscribe-button', 'unsubscribe'),
(4253, 'Accessibility Statement', 'Erklärung zur Barrierefreiheit', NULL, NULL, NULL, 0, 'heading', 'accessibility'),
(4254, '<p>The online platform graduate.me, operated by the ONSITES Graduate School based in Florida (USA), consistently complies with the internationally recognized Web Content Accessibility Guidelines (WCAG) 2.1 Level AA.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School ensures that all content and features on the graduate.me online platform can be fully accessed by all users&mdash;regardless of their individual limitations. Due to its international orientation and target groups within the European Union, the ONSITES Graduate School explicitly aligns the graduate.me online platform with the requirements of the European Accessibility Act.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Measures to ensure accessibility&nbsp;</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>All images and graphics have meaningful alternative texts (so-called &ldquo;alt attributes&rdquo;).</li>\r\n	<li>All navigation and control elements are fully operable via keyboard.</li>\r\n	<li>The structure and content of the online platform are optimized for screen readers and other assistive technologies.</li>\r\n	<li>Color contrasts of all colors used meet the required guidelines.</li>\r\n	<li>All forms and dropdown menus are technically fully accessible.</li>\r\n	<li>Multimedia content such as videos or audio files have accompanying alternatives or transcripts.</li>\r\n	<li>All PDF documents and other external documents have been checked and optimized for accessibility.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Regular Reviews</strong>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The accessibility of the graduate.me online platform is reviewed regularly. The status of all reviews can be found in the status information provided below.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Reporting Accessibility Issues</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In case users of the graduate.me online platform encounter accessibility barriers or experience difficulties using the site despite our extensive measures, please contact us via:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Email: accessibility@graduate.me</p>\r\n\r\n<p>Telephone: +1 (727) 739 03 20</p>\r\n\r\n<p>(Available: Monday&ndash;Friday, 08.00 AM to 12.00 PM, Eastern Standard Time, UTC-5)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The ONSITES Graduate School explicitly commits itself to a consistently inclusive philosophy and the continuous improvement of digital accessibility on the graduate.me online platform.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Status: June 28, 2025</p>', '<p>Die Online-Plattform graduate.me, betrieben von der ONSITES Graduate School mit Sitz in Florida (USA), erf&uuml;llt konsequent die Anforderungen der Barrierefreiheit gem&auml;&szlig; den international anerkannten Web Content Accessibility Guidelines (WCAG) 2.1 Level AA.</p>\r\n\r\n<p>Die ONSITES Graduate School stellt sicher, dass s&auml;mtliche Inhalte und Funktionalit&auml;ten auf der Online-Plattform graduate.me von allen Nutzern &ndash; unabh&auml;ngig von ihren pers&ouml;nlichen Einschr&auml;nkungen &ndash; uneingeschr&auml;nkt genutzt werden k&ouml;nnen. Aufgrund der internationalen Ausrichtung sowie der Zielgruppen in der Europ&auml;ischen Union orientiert sich die ONSITES Graduate School mit ihrer Online-Plattform graduate.me zus&auml;tzlich explizit an den Anforderungen der Europ&auml;ischen Barrierefreiheitsrichtlinie (European Accessibility Act).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Ma&szlig;nahmen zur Gew&auml;hrleistung der Barrierefreiheit</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>S&auml;mtliche Bilder und Grafiken verf&uuml;gen &uuml;ber aussagekr&auml;ftige Alternativtexte (so genannte&bdquo;alt&ldquo;-Attribute).</li>\r\n	<li>Alle Navigations- und Bedienelemente sind vollumf&auml;nglich durch die Tastatur steuerbar.</li>\r\n	<li>Die Struktur und die Inhalte der Online-Plattform sind optimal f&uuml;r Screenreader und weitere Hilfstechnologien aufbereitet.</li>\r\n	<li>Die Kontraste s&auml;mtlicher verwendeter Farben erf&uuml;llen durchg&auml;ngig die Richtlinien.</li>\r\n	<li>Alle Formulare und Dropdown-Men&uuml;s sind technisch vollst&auml;ndig barrierefrei gestaltet.</li>\r\n	<li>Multimediale Inhalte wie Videos oder Audios verf&uuml;gen &uuml;ber erg&auml;nzende Alternativen oder Transkripte.</li>\r\n	<li>Alle PDF-Dokumente und andere externe Dokumente sind auf Barrierefreiheit gepr&uuml;ft und optimiert.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Regelm&auml;&szlig;ige &Uuml;berpr&uuml;fung</strong>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die Barrierefreiheit der Online-Plattform graduate.me wird regelm&auml;&szlig;ig &uuml;berpr&uuml;ft. Der Status aller &Uuml;berpr&uuml;fungen kann der untenstehenden Statusinformation entnommen werden.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Meldung eventueller Barrieren&nbsp;</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>F&uuml;r den Fall, dass trotz umfassender Ma&szlig;nahmen durch die Nutzer der Online-Plattform graduate.me irgendwelche Barrieren identifiziert oder Schwierigkeiten bei der Nutzung festgestellt werden, steht folgender Kontakt zur Verf&uuml;gung:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>E-Mail: accessibility@graduate.me</p>\r\n\r\n<p>Telefon: +1 (727) 739 03 20</p>\r\n\r\n<p>(Erreichbarkeit: Mo&ndash;Fr, 08.00 Uhr bis 12.00 Uhr, Eastern Standard Time, UTC-5)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Die ONSITES Graduate School verpflichtet sich ausdr&uuml;cklich zu einer konsequent inklusiven Philosophie und der kontinuierlichen Weiterentwicklung der digitalen Barrierefreiheit auf der Online-Plattform graduate.me.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Stand: 28.06.2025</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, NULL, 1, 'text', 'accessibility'),
(4255, '-', '-', NULL, NULL, NULL, 0, 'meta-title', 'accessibility'),
(4256, '-', '-', NULL, NULL, NULL, 0, 'meta-description', 'accessibility'),
(4257, 'Accessibility', 'Barrierefreiheit ', NULL, NULL, NULL, 0, 'accessibility', 'footer');

-- --------------------------------------------------------

--
-- Table structure for table `texts_pages`
--

CREATE TABLE `texts_pages` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `texts_pages`
--

INSERT INTO `texts_pages` (`id`, `name`, `url`) VALUES
(1, 'Home Page', 'home'),
(2, 'About', 'about'),
(3, 'Institute', 'institute'),
(4, 'Departments', 'departments'),
(5, 'Studies', 'study'),
(6, 'Resources', 'resources');

-- --------------------------------------------------------

--
-- Table structure for table `unsubscribe_reasons`
--

CREATE TABLE `unsubscribe_reasons` (
  `id` int NOT NULL,
  `subscriber_id` int NOT NULL,
  `reason` text COLLATE utf8mb4_general_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unsubscribe_reasons`
--

INSERT INTO `unsubscribe_reasons` (`id`, `subscriber_id`, `reason`, `feedback`, `created_at`, `updated_at`) VALUES
(4, 72, 'I wasn\'t aware of the added value before', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint NOT NULL DEFAULT '1',
  `date_of_birth` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmation_code` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `middlename`, `surname`, `email`, `email_verified_at`, `password`, `role_id`, `date_of_birth`, `remember_token`, `created_at`, `updated_at`, `confirmation_code`, `is_verified`) VALUES
(1, 'Mathias Kunze', NULL, '', 'mathias.kunze@onsites.com', NULL, '$2y$10$mMBrrMojdB92AkuztZYA7usPLfD8j9esVYX3SeYNrR4sSsKtqzPSu', 1, NULL, 'FBLnXH7auoTu8tLKAyxeya52xT1RW9NnMFg9wCEnTxqmYxJt1WZRnTtgJQh9', '2020-10-14 13:03:08', '2020-10-22 12:16:17', '', 0),
(2, 'Tedo', NULL, '', 'teodor.hristov@onsites.com', NULL, '$2y$10$wiPjJWUFy5nBuv6ex5bDeeomCUi67XA0bwXcsUMmHaI3LMCanNccW', 1, NULL, 'ziZqMMXnQEkrlptPmy2cKiZhDpsv2AGhXqbYFn6MSwmHFPtm99wwXiBfIEXN', NULL, NULL, '', 0),
(3, 'Vasko', NULL, 'Stavrev', 'vasil.stavrev@onsites.com', NULL, '$2y$10$wiPjJWUFy5nBuv6ex5bDeeomCUi67XA0bwXcsUMmHaI3LMCanNccW', 1, NULL, 'zymHCPliBPy6xwgMRvnIVHbvCgSpFn55yGOmThIQj7ypD3Wri8PtdWm4nSlr', NULL, '2026-01-08 13:14:10', '', 0),
(4, 'Dimitar', NULL, '', 'dimitar.aleksiev@onsites.com', NULL, '$2y$10$MFwlBKhQlexCnOe4f/JvzuWS2OFsi3WxyT40x...r7JDaqeXaTBam', 1, NULL, 'RbSRUkFiH0H97BVhao7MQeBvASdd1MPZJFrfg2wkvb1uisnPyfFgehAXTS5h', NULL, '2024-05-08 03:28:46', '', 0),
(5, 'Christan', NULL, '', 'christian.reimann@onsites.com', NULL, '$2y$10$9Cfl5qJXMlvCVSw7HEeKP.Jmmf03T3hsvTKoYUPlmt7xklCwRrv.6', 1, NULL, 'uZc3klWWAnGxUNJPxmp20lBqRp3qOV5ER1deMEFdaoqT9yB2fU7f0pQLD0lV', NULL, '2024-05-08 03:37:16', '', 0),
(6, 'Ivan', NULL, '', 'ivan.georgiev@onsites.com', NULL, '$2y$10$7IzY3fvP0i261R8NIe/DHOtlzBnHCc9jfrhYEDN2RCJj/bY0WJ/R.', 1, NULL, '', NULL, '2024-05-08 03:28:46', '', 0),
(7, 'Olympia Barlow', NULL, 'pedalche', 'vubymojex@mailinator.com', NULL, '$2y$10$TvlmQ0SLcGXho.Vpo/azBumcnYLkDZK9ilDy.4.MpVNnh4PZWds9O', 4, '2026-02-02 09:54:07', NULL, '2025-10-22 12:27:30', '2025-10-22 12:27:30', '', 1),
(8, 'Maite Cobb', NULL, '', 'keneqo@mailinator.com', NULL, '$2y$10$qAo9nE/A2z1Cea9ViSjOwuaOkCz3IJZYKpXv9s0cwkfkUrHAra2Ru', 5, NULL, NULL, '2025-10-22 12:42:46', '2025-10-22 12:42:46', '', 0),
(9, 'Dimitar', NULL, '', 'parent@parent.bg', NULL, '$2y$10$rxAEbYfXMjf6FmT1q2gq3eFv8n0BebH2f03WPjQgiAPsunewVFkYe', 2, NULL, NULL, '2025-10-22 12:54:56', '2025-10-22 12:54:56', '', 0),
(10, 'dyqywydoj@mailinator.com', NULL, '', 'dadelifawa@mailinator.com', NULL, '$2y$10$D9C6vC.dlGAB.XEDF0YI4usZI6xeWZp7jtVQ4zYH.0AenmtRKytTS', 2, NULL, NULL, '2025-10-27 11:05:55', '2025-10-27 11:05:55', '', 0),
(11, 'geqivul@mailinator.com', NULL, '', 'bemuruxuq@mailinator.com', NULL, '$2y$10$a.uP91hWx8na4sdASrpgxOSxp3yRAgdZxBo3IBJREBSS0udWkKvUO', 2, NULL, NULL, '2025-10-27 11:11:51', '2025-10-27 11:11:51', '', 0),
(12, 'Vaskooo', NULL, 'Stavrev', 'vasil@test.bg', NULL, '$2y$10$wiPjJWUFy5nBuv6ex5bDeeomCUi67XA0bwXcsUMmHaI3LMCanNccW', 4, '2016-02-02 08:47:37', NULL, '2025-11-13 13:47:28', '2025-11-13 13:47:28', '', 0),
(13, 'Dragan', NULL, 'Ivanov', 'dragan@abv.bg', NULL, '$2y$10$wiPjJWUFy5nBuv6ex5bDeeomCUi67XA0bwXcsUMmHaI3LMCanNccW', 2, NULL, NULL, '2025-12-16 23:28:49', '2025-12-16 23:29:58', 'a8O6qdRoAptPFsc7x9p6BGYacLEfr6', 1),
(14, 'Verify', NULL, 'Test', 'test@verify.bg', NULL, '$2y$10$aSXjrGXhFCkx4MLy3b1xZuc0CqLsforQy5NgNhsVYF4ZwQpN4YY3m', 5, NULL, NULL, '2025-12-16 23:34:19', '2025-12-16 23:36:24', '4IcjoastJbvgogJZsPiQGs0azO6fRg', 1),
(15, 'Verify', NULL, 'Verifyov', 'veryfi@ver.bg', NULL, '$2y$10$7Ew5Y.Maohha0l7Gi8XPm.zKhNvrmsy29aKh/cmI/KwRk8CvGV0JG', 3, NULL, NULL, '2025-12-17 08:07:57', '2025-12-17 09:22:51', '6sVZ4t6h4Y9zDip5E73dt77DMESyId', 1),
(16, 'Petko', NULL, 'Draganov', 'petko@abv.bg', NULL, '$2y$10$JxnOyB6wN6x/d3hD9S8QFeIObZXfWOoQLP84M4.OxZky.uLDLjVue', 5, NULL, NULL, '2026-02-06 11:02:25', '2026-02-06 11:02:25', 'Mq4lbsaxq9DHUN102gBrTlwYG6H0HT', 0),
(17, 'Test', NULL, 'Testov', 'test@testov.bgbg', NULL, '$2y$10$Cdr0HQIBpqm/RbvL4E5pquXNPMskOCdTcr8/tAj8oo1f5AS.mktJS', 5, NULL, NULL, '2026-02-11 10:53:34', '2026-02-11 10:53:34', 'zJ8y5d1TSKH2Dmuvi7WhapwJoBRmMc', 0),
(18, 'Test', NULL, 'testov', 'pedalche@abv.bg', NULL, '$2y$10$lIsdjAI7ByCDptCa2/rAPu95yelFK8.AR7oh.UORjTxQ9lmr4Qppm', 1, '1970-11-30 22:00:00', NULL, '2026-02-18 09:52:23', '2026-02-18 09:52:23', 'Nkmajbzy4bCFgw22sEUWhcS3mrY4yy', 0),
(19, 'Test', 'view', 'all', 'view@all.bg', NULL, '$2y$10$CbXJMu/bZRPnEmnJ6ovbT.rsC8v8GBXtiRTjzqLkhea1nJ5MupJQO', 4, '2012-02-15 22:00:00', NULL, '2026-03-04 13:45:29', '2026-03-04 13:45:29', 'lWu4Limf9rg1F4qxnrgoKGbBfuvZ6Q', 0),
(20, 'Test', 'View', 'All', 'view@all.de', NULL, '$2y$10$wiPjJWUFy5nBuv6ex5bDeeomCUi67XA0bwXcsUMmHaI3LMCanNccW', 4, '2012-05-07 21:00:00', NULL, '2026-03-04 13:48:58', '2026-03-04 13:48:58', 'ZBa47tQSyBDJWxVCks2MWxuB1E9iib', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_coaching_sessions`
--

CREATE TABLE `user_coaching_sessions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `session_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_sessions`
--

CREATE TABLE `user_group_sessions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `session_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_group_sessions`
--

INSERT INTO `user_group_sessions` (`id`, `user_id`, `session_id`) VALUES
(7, 9, 1),
(8, 9, 3),
(9, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_mentoring_sessions`
--

CREATE TABLE `user_mentoring_sessions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `session_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `order`) VALUES
(1, 'Admin', 0),
(2, 'Parent/Adult', 1),
(3, 'Partner', 3),
(4, 'Student', 0),
(5, 'Educator', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_courses`
--
ALTER TABLE `additional_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador_activities`
--
ALTER TABLE `ambassador_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador_redemptions`
--
ALTER TABLE `ambassador_redemptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador_redemption_orders`
--
ALTER TABLE `ambassador_redemption_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador_rewards`
--
ALTER TABLE `ambassador_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador_services`
--
ALTER TABLE `ambassador_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambassador_service_actions`
--
ALTER TABLE `ambassador_service_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_details`
--
ALTER TABLE `ap_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `catalog_courses`
--
ALTER TABLE `catalog_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clep_details`
--
ALTER TABLE `clep_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `coaching_sessions`
--
ALTER TABLE `coaching_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat_curriculum_type` (`curriculum_type_id`),
  ADD KEY `fk_cat_subject_area` (`subject_area_id`);

--
-- Indexes for table `course_files`
--
ALTER TABLE `course_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_course_files_course_id` (`course_id`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_course_videos_course_id` (`course_id`);

--
-- Indexes for table `cte_clusters`
--
ALTER TABLE `cte_clusters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cte_courses`
--
ALTER TABLE `cte_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cte_jobs`
--
ALTER TABLE `cte_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cte_programs`
--
ALTER TABLE `cte_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_cte_programs_category_id` (`category_id`);

--
-- Indexes for table `curriculum_courses`
--
ALTER TABLE `curriculum_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_curriculum_course` (`curriculum_type_id`,`course_id`),
  ADD KEY `fk_cc_course` (`course_id`),
  ADD KEY `fk_cc_category` (`category_id`);

--
-- Indexes for table `curriculum_types`
--
ALTER TABLE `curriculum_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_curriculum_type_code` (`code`);

--
-- Indexes for table `diploma_printing_requests`
--
ALTER TABLE `diploma_printing_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_news`
--
ALTER TABLE `dynamic_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_news_authors`
--
ALTER TABLE `dynamic_news_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_news_sections`
--
ALTER TABLE `dynamic_news_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_news_sections_details`
--
ALTER TABLE `dynamic_news_sections_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educator_categories`
--
ALTER TABLE `educator_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elective_courses`
--
ALTER TABLE `elective_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esol_details`
--
ALTER TABLE `esol_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_students`
--
ALTER TABLE `exam_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fact_hubs`
--
ALTER TABLE `fact_hubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fact_hub_sections`
--
ALTER TABLE `fact_hub_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_consultations`
--
ALTER TABLE `family_consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_consultation_requests`
--
ALTER TABLE `family_consultation_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_categories`
--
ALTER TABLE `feature_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frauds`
--
ALTER TABLE `frauds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_sessions`
--
ALTER TABLE `group_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_desks`
--
ALTER TABLE `help_desks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentoring_sessions`
--
ALTER TABLE `mentoring_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_sections`
--
ALTER TABLE `newsletter_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_students`
--
ALTER TABLE `parent_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_releases`
--
ALTER TABLE `press_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_release_sections`
--
ALTER TABLE `press_release_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_release_section_translations`
--
ALTER TABLE `press_release_section_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `press_release_translations`
--
ALTER TABLE `press_release_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_courses`
--
ALTER TABLE `related_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_assessment_answers`
--
ALTER TABLE `self_assessment_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_assessment_attempts`
--
ALTER TABLE `self_assessment_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_assessment_attempt_questions`
--
ALTER TABLE `self_assessment_attempt_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_assessment_questions`
--
ALTER TABLE `self_assessment_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_enrolled_courses`
--
ALTER TABLE `student_enrolled_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_plans`
--
ALTER TABLE `student_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_spotlights`
--
ALTER TABLE `student_spotlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_spotlights_categories`
--
ALTER TABLE `student_spotlights_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_mentors`
--
ALTER TABLE `study_mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_areas`
--
ALTER TABLE `subject_areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_subject_area_name` (`name`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts_pages`
--
ALTER TABLE `texts_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unsubscribe_reasons`
--
ALTER TABLE `unsubscribe_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coaching_sessions`
--
ALTER TABLE `user_coaching_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_sessions`
--
ALTER TABLE `user_group_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mentoring_sessions`
--
ALTER TABLE `user_mentoring_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `additional_courses`
--
ALTER TABLE `additional_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ambassador_activities`
--
ALTER TABLE `ambassador_activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ambassador_redemptions`
--
ALTER TABLE `ambassador_redemptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ambassador_redemption_orders`
--
ALTER TABLE `ambassador_redemption_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ambassador_rewards`
--
ALTER TABLE `ambassador_rewards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ambassador_services`
--
ALTER TABLE `ambassador_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ambassador_service_actions`
--
ALTER TABLE `ambassador_service_actions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `catalog_courses`
--
ALTER TABLE `catalog_courses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `coaching_sessions`
--
ALTER TABLE `coaching_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course_files`
--
ALTER TABLE `course_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course_videos`
--
ALTER TABLE `course_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cte_clusters`
--
ALTER TABLE `cte_clusters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cte_courses`
--
ALTER TABLE `cte_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `cte_jobs`
--
ALTER TABLE `cte_jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cte_programs`
--
ALTER TABLE `cte_programs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `curriculum_courses`
--
ALTER TABLE `curriculum_courses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `curriculum_types`
--
ALTER TABLE `curriculum_types`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diploma_printing_requests`
--
ALTER TABLE `diploma_printing_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dynamic_news`
--
ALTER TABLE `dynamic_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dynamic_news_authors`
--
ALTER TABLE `dynamic_news_authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dynamic_news_sections`
--
ALTER TABLE `dynamic_news_sections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dynamic_news_sections_details`
--
ALTER TABLE `dynamic_news_sections_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educator_categories`
--
ALTER TABLE `educator_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `elective_courses`
--
ALTER TABLE `elective_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_students`
--
ALTER TABLE `exam_students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fact_hubs`
--
ALTER TABLE `fact_hubs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fact_hub_sections`
--
ALTER TABLE `fact_hub_sections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `family_consultations`
--
ALTER TABLE `family_consultations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `family_consultation_requests`
--
ALTER TABLE `family_consultation_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `feature_categories`
--
ALTER TABLE `feature_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `frauds`
--
ALTER TABLE `frauds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_sessions`
--
ALTER TABLE `group_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `help_desks`
--
ALTER TABLE `help_desks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mentoring_sessions`
--
ALTER TABLE `mentoring_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter_sections`
--
ALTER TABLE `newsletter_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `parent_students`
--
ALTER TABLE `parent_students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `press_releases`
--
ALTER TABLE `press_releases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `press_release_sections`
--
ALTER TABLE `press_release_sections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `press_release_section_translations`
--
ALTER TABLE `press_release_section_translations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `press_release_translations`
--
ALTER TABLE `press_release_translations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `related_courses`
--
ALTER TABLE `related_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `self_assessment_answers`
--
ALTER TABLE `self_assessment_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `self_assessment_attempts`
--
ALTER TABLE `self_assessment_attempts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `self_assessment_attempt_questions`
--
ALTER TABLE `self_assessment_attempt_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `self_assessment_questions`
--
ALTER TABLE `self_assessment_questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_documents`
--
ALTER TABLE `student_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_enrolled_courses`
--
ALTER TABLE `student_enrolled_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_plans`
--
ALTER TABLE `student_plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_spotlights`
--
ALTER TABLE `student_spotlights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_spotlights_categories`
--
ALTER TABLE `student_spotlights_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `study_mentors`
--
ALTER TABLE `study_mentors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_areas`
--
ALTER TABLE `subject_areas`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4258;

--
-- AUTO_INCREMENT for table `texts_pages`
--
ALTER TABLE `texts_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unsubscribe_reasons`
--
ALTER TABLE `unsubscribe_reasons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_coaching_sessions`
--
ALTER TABLE `user_coaching_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_group_sessions`
--
ALTER TABLE `user_group_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_mentoring_sessions`
--
ALTER TABLE `user_mentoring_sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ap_details`
--
ALTER TABLE `ap_details`
  ADD CONSTRAINT `fk_ap_course` FOREIGN KEY (`course_id`) REFERENCES `catalog_courses` (`id`);

--
-- Constraints for table `clep_details`
--
ALTER TABLE `clep_details`
  ADD CONSTRAINT `fk_clep_course` FOREIGN KEY (`course_id`) REFERENCES `catalog_courses` (`id`);

--
-- Constraints for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD CONSTRAINT `fk_cat_curriculum_type` FOREIGN KEY (`curriculum_type_id`) REFERENCES `curriculum_types` (`id`),
  ADD CONSTRAINT `fk_cat_subject_area` FOREIGN KEY (`subject_area_id`) REFERENCES `subject_areas` (`id`);

--
-- Constraints for table `course_files`
--
ALTER TABLE `course_files`
  ADD CONSTRAINT `fk_course_files_course` FOREIGN KEY (`course_id`) REFERENCES `catalog_courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD CONSTRAINT `fk_course_videos_course` FOREIGN KEY (`course_id`) REFERENCES `catalog_courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cte_programs`
--
ALTER TABLE `cte_programs`
  ADD CONSTRAINT `fk_cte_programs_category` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`);

--
-- Constraints for table `curriculum_courses`
--
ALTER TABLE `curriculum_courses`
  ADD CONSTRAINT `fk_cc_category` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`),
  ADD CONSTRAINT `fk_cc_course` FOREIGN KEY (`course_id`) REFERENCES `catalog_courses` (`id`),
  ADD CONSTRAINT `fk_cc_curriculum_type` FOREIGN KEY (`curriculum_type_id`) REFERENCES `curriculum_types` (`id`);

--
-- Constraints for table `esol_details`
--
ALTER TABLE `esol_details`
  ADD CONSTRAINT `fk_esol_course` FOREIGN KEY (`course_id`) REFERENCES `catalog_courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

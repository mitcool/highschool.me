-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2026 at 12:43 PM
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
-- Table structure for table `parent_guardian_profiles`
--

CREATE TABLE `parent_guardian_profiles` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `relationship_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `can_make_educational_decisions` tinyint(1) NOT NULL DEFAULT '0',
  `has_other_guardian_with_rights` tinyint(1) NOT NULL DEFAULT '0',
  `other_guardian_full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_guardian_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_guardian_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parent_guardian_profiles`
--
ALTER TABLE `parent_guardian_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_guardian_profiles_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parent_guardian_profiles`
--
ALTER TABLE `parent_guardian_profiles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parent_guardian_profiles`
--
ALTER TABLE `parent_guardian_profiles`
  ADD CONSTRAINT `parent_guardian_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

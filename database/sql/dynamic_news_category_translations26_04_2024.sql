-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 08:59 AM
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
-- Table structure for table `dynamic_news_category_translations`
--

CREATE TABLE `dynamic_news_category_translations` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `locale` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `headline` varchar(191) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dynamic_news_category_translations`
--

INSERT INTO `dynamic_news_category_translations` (`id`, `category_id`, `locale`, `name`, `slug`, `headline`, `meta_title`, `meta_description`) VALUES
(1, 1, 'en', 'Newsfeed', 'newsfeed', 'Catch Up On The Latest News From ONSITES Graduate ', 'Newsfeed | ONSITES Graduate School', 'Stay informed! Here you can find out all the latest news and updates about our institution & our partners - straight from the source. Get informed now!'),
(2, 1, 'de', 'Newsfeed', 'newsfeed', 'Erfahre das Neueste von der ONSITES Graduate School', 'Newsfeed | ONSITES Graduate School', 'Bleibe im Bilde! Hier erfährst Du alle Neuigkeiten und Updates rund um unsere Bildungsinstitution & unsere Partner - direkt aus erster Hand. Jetzt informieren!'),
(3, 2, 'en', 'Student Hub', 'student-hub', 'Boost Your Student Life', 'Student Hub | ONSITES Graduate School', 'Optimize your student life! With valuable tips on all aspects of studying. From study tips and lifestyle ideas to student discounts. Discover now for free!'),
(4, 2, 'de', 'Studenten-Hub', 'studenten-hub', 'Booste Dein Studentenleben', 'Studenten-Hub | ONSITES Graduate School', 'Optimiere Dein Studentenleben! Mit wertvollen Tipps rund ums Studieren. Von Lerntipps über Lifestyle-Ideen bis hin zu Studentenrabatten. Jetzt entdecken! '),
(5, 3, 'en', 'Career Compass', 'career-compass', 'Guide Your Career Towards Success', 'Career Compass | ONSITES Graduate School', 'Navigate your career with success! Discover amazing tips, tricks & trends & get started. ✔ Job interviews ✔ Remote work ✔ Top jobs & more. Read now!'),
(6, 3, 'de', 'Karriere-Kompass', 'karriere-kompass', 'Steuere Deine Karriere auf Erfolgskurs', 'Karriere-Kompass | ONSITES Graduate School', 'Karriere navigieren mit Erfolg! Entdecke spannende Tipps, Tricks & Trends & starte durch. ✔ Bewerbungsgespräche ✔ Remote-Arbeit ✔ Top-Jobs & mehr. Jetzt lesen!  '),
(7, 4, 'en', 'Innovation & Trends', 'innovation-and-trends', 'Stay In Sync With The World Of Education', 'Innovation & Trends | ONSITES Graduate School', 'Staying at the cutting edge. Discover the latest developments in education & beyond. From Gamification & Virtual Reality to AI in the classroom. Click now!'),
(8, 4, 'de', 'Innovation & Trends', 'innovation-und-trends', 'Bleibe am Puls der Bildungswelt', 'Innovation & Trends | ONSITES Graduate School', 'Stets am Puls der Zeit. Entdecke die neuesten Entwicklungen in der Bildung & darüber hinaus. Von Gamification & VR bis zu KI im Unterricht. Jetzt klicken!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dynamic_news_category_translations`
--
ALTER TABLE `dynamic_news_category_translations`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

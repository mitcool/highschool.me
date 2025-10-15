-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2024 at 10:25 AM
-- Server version: 10.5.26-MariaDB-ubu2004-log
-- PHP Version: 7.4.33-nmm6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d03d6247`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `src` varchar(191) NOT NULL,
  `nickname` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src`, `nickname`) VALUES
(1, '/images/large-conference-table.webp', 'main-image'),
(2, '/images/main-image-mobile.webp', 'main-image-mobile'),
(3, '/images/logo-header-image.png', 'logo'),
(4, '/images/image.webp', 'benefit-1'),
(5, '/images/handshake.webp', 'benefit-2'),
(6, '/images/roman-building.webp', 'benefit-3'),
(11, '/images/student-blog.webp', 'blog-cover'),
(12, '/images/graduating-students.webp', 'study-1'),
(13, '/images/pages-cover-images/master_programs.webp', 'study-2'),
(14, '/images/businessman-works-on-a-terrace.webp', 'study-3'),
(15, '/images/phd-degree.webp', 'study-4'),
(16, '/images/phone-conversation.webp', 'study-5'),
(26, '/images/partnership.webp', 'about-cover'),
(27, '/images/Black-man-and-dipoma.webp', 'program-321321'),
(28, '/images/businessman-in-dark-blue-suit.webp', 'program-1'),
(29, '/images/businesswoman-and-tablet.webp', 'program-3'),
(30, '/images/woman-hold-clipboard.webp', 'program-4'),
(31, '/images/female-doctor.webp', 'program-6'),
(32, '/images/emba-online.webp', 'program-7'),
(33, '/images/women-conversation.webp', 'program-10123123'),
(34, '/images/colleagues-working-side-by-side.webp', 'program-1112321'),
(35, '/images/work-discussion.webp', 'program-12'),
(37, '/images/man-typing-on-computer-keyboard.webp', 'program-8'),
(38, '/images/two-men-and-smartphone.webp', 'program-17'),
(39, '/images/businessman-in-blue-suit.webp', 'program-18'),
(40, '/images/professional-black-woman.webp', 'program-19'),
(41, '/images/female-works-on-laptop.webp', 'program-20'),
(42, '/images/businesswomen-with-crossed-arms.webp', 'program-21'),
(43, '/images/modern-office-environment.webp', 'program-22'),
(44, '/images/woman-presents-work-plan.webp', 'program-23'),
(45, '/images/focused-asian-man.webp', 'program-24'),
(46, '/images/cheerful-doctor-with-stethoscope.webp', 'program-25'),
(47, '/images/smiling-man-on-the-phone.webp', 'program-9'),
(48, '/images/portrait-of-a-doctor.webp', 'program-12'),
(49, '/images/man-hands-with-book-and-pen.webp', 'program-11'),
(56, '/images/hieroglyph-and-letter-a.webp', 'language-icon'),
(57, '/images/calendar.webp', 'calendar-icon'),
(58, '/images/map-point.webp', 'location-icon'),
(59, '/images/teaching-staff.webp', 'academics-cover'),
(60, '/images/mathias-kunze.webp', 'academic-50'),
(61, '/images/dr-adil-yuecel-lecturer-profile.webp', 'academic-51'),
(62, '/images/prof-dr-stefan-reith-lecturer-profile.webp', 'academic-52'),
(63, '/images/julia-becker.webp', 'academic-53'),
(64, '/images/prof-dr-kveng-hong-kao-lecturer-profile.webp', 'academic-54'),
(65, '/images/prof-kunal-saigal-lecturer-profile.webp', 'academic-55'),
(66, '/images/Group 2202.webp', 'academic-56'),
(67, '/images/benjamin-dunker.webp', 'academic-57'),
(68, '/images/stefan-gerstner-lecturer-profile.webp', 'academic-58'),
(69, '/images/dr-benjamin-von-block-schlesier-lecturer-profile.webp', 'academic-59'),
(70, '/images/IMG_0530.png', 'academic-60'),
(71, '/images/Group 2202.webp', 'academic-61'),
(72, '/images/sebastian-lamm.webp', 'academic-62'),
(73, '/images/patrick-van-geldern.jpg', 'academic-63'),
(74, '/images/ilhami-aben.webp', 'academic-64'),
(75, '/images/Group 2202.webp', 'academic-65'),
(77, '/images/logo-iic-university-of-technology.webp', 'partner-3'),
(78, '/images/logo-universitaet-com.webp', 'partner-4'),
(79, '/images/logo-thesis-me.webp', 'partner-5'),
(81, '/images/female-graduate-and-diploma.webp', 'accreditation-cover'),
(103, '/images/onsites-graduate-school-logo.png', 'logo-header'),
(105, '/images/coaching.webp', 'coaching'),
(106, '/images/monograph.webp', 'publishing'),
(107, '/images/professional-work-on-a-couch.webp', 'digital_studies'),
(108, '/images/clenching-fists-triumphing.webp', 'recognition_of_previous_achievemnts'),
(109, '/images/data-analysis-on-a-tablet.webp', 'study_financing'),
(110, '/images/student-assistance-team.webp', 'student_advisory_service'),
(111, '/images/people-taking-notes.webp', 'study_registration'),
(112, '/images/certificate.webp', 'accreditation'),
(113, '/images/two-monitors.webp', 'help_desk'),
(114, '/images/student-faq.webp', 'faqs'),
(115, '/images/padlocks.webp', 'gdpr'),
(116, '/images/panoramic-windows.webp', 'imprint'),
(117, '/images/diploma-certificate.webp', 'recognition_of_previous_achievemnts_one'),
(118, '/images/barbie-graduate.webp', 'recognition_of_previous_achievemnts_two'),
(119, '/images/envelope-and-paper-clip.webp', 'recognition_of_previous_achievemnts_three'),
(120, '/images/recognition_of_previous_achievemnts_four-images.png', 'recognition_of_previous_achievemnts_four'),
(121, '/images/working-desk.webp', 'term_and_conditions'),
(126, '/images/sun-check-mark.webp', 'recognition_of_previous_achievemnts_five'),
(150, '/images/logo-imc.webp', 'partner-9'),
(152, '/images/conference.webp', 'conferences'),
(156, '/images/contact-form-background.webp', 'contact-form-background'),
(157, '/images/student-rating.webp', 'stars-5'),
(158, '/images/phone-icon.webp', 'phone-icon'),
(159, '/images/coaching-session.webp', 'coaching-session'),
(160, '/images/coaching-seminar.webp', 'board-presentation'),
(161, '/images/colleagues-celebrate-success.webp', 'colleagues-celebrate-success'),
(162, '/images/professional-graduate.webp', 'professional-graduates'),
(163, '/images/master-graduates.webp', 'master-graduates'),
(164, '/images/bachelor-graduate.webp', 'bachelor-graduates-professionals'),
(165, '/images/prof-dr-mathias-kunze-lecturer-profile.webp', 'about-image-president'),
(166, '/images/employer-branding-award.webp', 'award'),
(167, '/images/high-quality-study-materials.webp', '1'),
(168, '/images/online-events.webp', '2'),
(169, '/images/online-exam.webp', '3'),
(170, '/images/student-support.webp', '4'),
(171, '/images/print-book.webp', 'book'),
(172, '/images/online-publication.webp', 'ebook'),
(174, '/images/barbie-lifelong-learning.webp', 'news-8'),
(175, '/news_images/graduation-gift.webp', 'news-12'),
(176, '/images/music-for-studying.webp', 'news-13'),
(177, '/images/up-icon.webp', 'up-icon'),
(178, '/news_images/student-discounts.webp', 'news-14'),
(179, '/news_images/ai-in-education.webp', 'news-15'),
(180, '/news_images/ai-in-education.webp', 'conference-1'),
(181, '/news_images/moocs.webp', 'news-16'),
(182, '/news_images/gamification.webp', 'news-17'),
(183, '/news_images/exam-stress.webp', 'news-18'),
(184, '/images/publishing-service.webp', 'book-publishing-services'),
(185, '/images/books.webp', 'publishing-services'),
(186, '/images/examination-rules.webp', 'examination-rules'),
(187, '/images/code-of-ethics.webp', 'code-of-ethics'),
(188, '/images/graduation-cap.webp', 'contact-us-first-icon'),
(189, '/images/webpage.webp', 'contact-us-two-icon'),
(190, '/images/public-speech.webp', 'contact-us-three-icon'),
(191, '/images/climb-stairs.webp', 'contact-us-four-icon'),
(192, '/images/open-book.webp', 'contact-us-five-icon'),
(193, '/images/business-handshake.webp', 'contact-us-six-icon'),
(194, '/images/newspaper.webp', 'contact-us-seven-icon'),
(195, '/images/weighing-scale.webp', 'contact-us-eight-icon'),
(196, '/images/gear.webp', 'contact-us-nine-icon'),
(197, '/images/contact-us-tech-support.webp', 'contact-us-tech-support'),
(198, '/news_images/studying-to-music.webp', 'news-19'),
(199, '/news_images/moocs.webp', 'news-20'),
(200, '/news_images/student-discounts.webp', 'news-21'),
(201, '/news_images/ai-in-education.webp', 'news-22'),
(202, '/news_images/gamification.webp', 'news-23'),
(203, '/news_images/pencil-in-mouth.webp', 'news-24'),
(206, '/images/bubble-message-boxes.webp', 'bubble-message-boxes'),
(207, '/images/logo.webp', 'partner-10'),
(208, '/images/author-1.webp', 'author-1'),
(209, '/images/author-2.webp', 'author-2'),
(210, '/images/mathias-kunze.webp', 'author-3'),
(211, '/images/graduation-caps-in-the-air.webp', 'program-2'),
(212, '/images/law-office.webp', 'program-5'),
(213, '/images/stock-brokers.webp', 'program-10'),
(214, '/images/industrial-engineer.webp', 'program-13'),
(215, '/images/it-engineer.webp', 'program-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3621325;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

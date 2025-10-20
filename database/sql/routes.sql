-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 11:17 AM
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
  `sitemap_name_de` text NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `slug`, `route_en`, `route_es`, `route_bg`, `route_de`, `route_ru`, `action`, `sitemap`, `sitemap_name_en`, `sitemap_name_de`, `is_active`) VALUES
(1, 'welcome', '/', '/', '/', '/', '/', 'MainController@showWelcome', 1, '', '', 0),
(4, 'conferences-and-workshops', 'conferences-workshops', 'conferences-and-workshops_es', 'conferences-and-workshops_bg', 'konferenzen-und-workshops', 'conferences-and-workshops_ru', 'MainController@showConferenceAndWorkshop', 1, 'Conferences & Workshops', 'Konferenzen & Workshops	', 0),
(5, 'conference-calendar', 'event-calendar', 'conference-calendar_es', 'conference-calendar_bg', 'eventkalender', 'conference-calendar_ru', 'MainController@showConferenceCalendar', 1, 'Event Calendar	', 'Eventkalender	', 0),
(6, 'coaching', 'coaching-services', 'coaching_es', 'coaching_bg', 'coaching', 'coaching_ru', 'MainController@showCoaching', 1, 'Coaching', 'Coaching	', 0),
(7, 'publishing', 'book-publishing', 'publishing_es', 'publishing_bg', 'buch-veroeffentlichen', 'publishing_ru', 'MainController@showPublishing', 1, 'Book Publishing', 'Buch veröffentlichen', 0),
(8, 'recent-publications', 'recent-publications', 'recent-publications_es', 'recent-publications_bg', 'recent-publications_de', 'recent-publications_ru', 'MainController@showRecentPublications', 2, 'Recent Publications', 'Aktuelle Veröffentlichungen', 0),
(10, 'single-conference', 'single-conference/{conference}', 'single-conference_es/{conference}', 'single-conference_bg/{conference}', 'single-conference_de/{conference}', 'single-conference_ru/{conference}', 'MainController@showSingleConference', 0, '', '', 0),
(11, 'school-overview', 'school-overview', 'digital-studies_es', 'digital-studies_bg', 'online-studieren', 'digital-studies_ru', 'AboutController@showhighschoolOverview', 1, 'Online Learning', 'Online studieren', 0),
(12, 'mission-statement', 'mission-statement', 'recognition_es', 'recognition_bg', 'studium-verkuerzen', 'recognition_ru', 'AboutController@showMissionStatement', 1, 'Recognition of Prior Learning', 'Studium verkürzen', 0),
(13, 'student-advisory-service', 'student-assistance-team', 'student-advisory-service_es', 'student-advisory-service_bg', 'studienberatung', 'student-advisory-service_ru', 'MainController@showStudyiengAdvisoryService', 1, 'Student Assistance Team ', 'Studienberatung', 0),
(14, 'study-registration', 'student-portal', 'study-registration_es', 'study-registration_bg', 'bewerbung-studium', 'study-registration_ru', 'MainController@showStudyRegistration', 1, 'Student Portal', 'Bewerbung Studium', 0),
(15, 'about', 'about-us', 'about_es', 'about_bg', 'ueber-uns', 'about_ru', 'MainController@showAbout', 1, 'About', 'Über uns', 0),
(16, 'academics', 'academics', 'academics_es', 'academics_bg', 'dozenten', 'academics_ru', 'AboutController@showAcademics', 1, 'Our Lecturers', 'Unsere Dozenten', 0),
(18, 'accreditation', 'accreditation', 'accreditation_es', 'accreditation_bg', 'akkreditierung-und-partner', 'accreditation_ru', 'AboutController@showAccreditation', 1, 'Accreditation & Partners', 'Akkreditierung & Partner', 0),
(20, 'blog', 'blog', 'blog_es', 'blog_bg', 'blog', 'blog_ru', 'MainController@showBlog', 1, 'Blog', 'Blog', 0),
(21, 'single-article', 'blog/{slug}', 'single-article_es/{slug}', 'single-article_bg/{slug}', 'blog/{slug}', 'single-article_ru/{slug}', 'MainController@showSingleBlog', 0, '', '', 0),
(22, 'academics1', 'academics1', 'imprint_es', 'imprint_bg', 'impressum', 'imprint_ru', 'MainController@showImprint', 1, 'Imprint', 'Impressum', 0),
(23, 'privacy-policy', 'privacy-policy', 'privacy-policy_es', 'privacy-policy_bg', 'datenschutz', 'privacy-policy_ru', 'MainController@showPrivacyPolicy', 1, 'Privacy Policy', 'Datenschutz', 0),
(24, 'terms-and-conditions', 'terms-conditions', 'terms-and-conditions_es', 'terms-and-conditions_bg', 'agb', 'terms-and-conditions_ru', 'MainController@showTerms', 1, 'Terms & Conditions', 'AGB', 0),
(25, 'faq', 'faq', 'faq_es', 'faq_bg', 'faq', 'faq_ru', 'MainController@showFaq', 1, 'Faq', 'FAQ', 0),
(26, 'single-faq-category', 'faq/{category}', 'faq/{category}', 'faq/{category}', 'faq/{category}', 'faq/{category}', 'MainController@getSingleFaqCategory', 0, '', '', 0),
(28, 'single-help-desk', 'help-desk/{video}', 'help-desk-es/{video}', 'help-desk-bg/{video}', 'help-desk-/{video}', 'help-desk-ru/{video}', 'MainController@getSingleVideo', 2, '', '', 0),
(29, 'students-in-spotlight', 'students-in-spotlight', 'study-financing_es', 'study-financing_bg', 'studium-finanzieren', 'study-financing_ru', 'AboutController@showStudentsInSpotlight', 1, 'Student Finance ', 'Studium finanzieren', 0),
(30, 'program-tutorial', 'program-tutorial/{video}', 'program-tutorial_es/{video}', 'program-tutorial_bg/{video}', 'program-tutorial-de/{video}', 'program-tutorial-ru/{video}', 'MainController@getSingleProgramTutorial', 2, '', '', 0),
(31, 'sitemap', 'sitemap', 'sitemap-es', 'sitemap-bg', 'sitemap', 'sitemap-ru', 'SitemapController@showSitemapHTML', 0, '', '', 0),
(33, 'success', 'success-en', 'success-es', 'success-bg', 'success-de', 'success-ru', 'MainController@showSuccessPage', 2, '', '', 0),
(34, 'sitemap-xml', 'sitemap.xml', 'sitemap.xml', 'sitemap.xml', 'sitemap.xml', 'sitemap.xml', 'SitemapController@sitemap', 0, '', '', 0),
(35, 'publishing-services', 'book-publishing/services', 'publishing_es/services', 'publishing_bg/services', 'buch-veroeffentlichen/verlagsservice', 'publishing_ru/services', 'MainController@showPublishingServices', 1, 'Publishing Services', 'Verlagsservice', 0),
(36, 'code-of-ethics', 'code-of-ethics', 'code-of-ethics_es', 'code-of-ethics_bg', 'ethik-kodex', 'code-of-ethics_ru', 'MainController@showCodeOfEtics', 1, 'Code of Ethics', 'Ethikkodex', 0),
(37, 'examination-rules', 'examination-regulations', 'examination-rules_es', 'examination-rules_bg', 'pruefungsordnung', 'examination-rules_ru', 'MainController@showExaminationRules', 1, 'Examination Rules', 'Prüfungsordnung', 0),
(38, 'artificial-inteligence', 'artificial-inteligence', 'artificial-inteligence', 'artificial-inteligence', 'artificial-inteligence-de', 'examination-rules_ru', 'MainController@showArtificialInteligence', 0, 'Artificial Inteligence', 'Artificial Inteligence', 0),
(39, 'cyber-security', 'cyber-security', 'cyber-security', 'cyber-security', 'cyber-security-de', 'cyber-security', 'MainController@showcyberSecurity', 0, 'Cyber Security', 'Cyber Security', 0),
(40, 'green-energetics', 'green-energetics', 'green-energetics', 'green-energetics', 'green-energetics-de', 'green-energetics', 'MainController@showGreenEnergetics', 0, 'Green Energetics', 'Green Energetics', 0),
(41, 'promotion', 'starter-kit', 'empowerment-kit', 'promotion-bg', 'empowerment-kit', 'promotion-ru', 'MainController@showPromotion', 1, 'Promotion', 'Promotion', 0),
(42, 'newsletter', 'newsletter', 'newsletter', 'newsletter-bg', 'newsletter', 'newsletter-ru', 'MainController@showNewsletter', 1, 'Newsletter', 'Newsletter', 0),
(43, 'all-programs', 'online-degrees', 'newsletter', 'newsletter-bg', 'online-studiengaenge', 'newsletter-ru', 'MainController@allPrograms', 1, 'All Programs', 'Alle Programme', 0),
(44, 'rss', 'rss', 'rss', 'rss', 'rss', 'rss', 'SitemapController@rss', 0, '', '', 0),
(45, 'unsubscribe/{code}', 'unsubscribe/{code}', 'unsubscribe/{code}', 'unsubscribe/{code}', 'unsubscribe/{code}', 'unsubscribe/{code}', 'MainController@unsubscribePage', 0, '', '', 0),
(46, 'facts-hub', 'facts-hub', 'facts-hub', 'facts-hub', 'facts-hub', 'facts-hub', 'MainController@showFactsHub', 1, 'Facts Hub', 'Blog', 0),
(47, 'single-facts-hub', 'facts-hub/{slug}', 'facts-hub/{slug}', 'facts-hub/{slug}', 'facts-hub/{slug}', 'facts-hub/{slug}', 'MainController@showSingleFactsHub', 0, '-', '-', 0),
(48, 'press-release', 'press-release', 'press-release', 'press-release', 'press-release', 'press-release', 'MainController@showPressRelease', 1, 'Press Release', 'Press Release', 0),
(49, 'single-press-release', 'press-release/{slug}', 'press-release/{slug}', 'press-release/{slug}', 'press-release/{slug}', 'press-release/{slug}', 'MainController@showSinglePressRelease', 0, '-', '-', 0),
(50, 'certificaton', 'certificaton/{slug}', 'certificaton/{slug}', 'certificaton/{slug}', 'certificaton/{slug}', 'certificaton/{slug}', 'MainController@certification', 0, '-', '-', 0),
(51, 'accessibility', 'accessibility', 'accessibility', 'accessibility', 'barrierefreiheit', 'accessibility', 'MainController@accessibility', 1, 'Accessibility', 'Barrierefreiheit', 0),
(52, 'leadership', 'leadership', 'accreditation_es', 'accreditation_bg', 'akkreditierung-und-partner', 'accreditation_ru', 'AboutController@showLeadership', 1, 'Accreditation & Partners', 'Akkreditierung & Partner', 0),
(53, 'partnership', 'partnership', 'academics_es', 'academics_bg', 'dozenten', 'academics_ru', 'AboutController@showPartnership', 1, 'Our Lecturers', 'Unsere Dozenten', 0),
(2000, 'studies', '{study}', '{study}', '{study}', '{study}', '{study}', 'MainController@showStudiesPages', 0, '', '', 0),
(3000, 'programs', '{study}/{program}', '{study}/{program}', '{study}/{program}', '{study}/{program}', '{study}/{program}', 'MainController@showStudyPrograms', 0, '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

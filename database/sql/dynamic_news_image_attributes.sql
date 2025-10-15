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
-- Table structure for table `dynamic_news_image_attributes`
--

CREATE TABLE `dynamic_news_image_attributes` (
  `id` int(11) NOT NULL,
  `alt_en` varchar(191) NOT NULL,
  `alt_de` varchar(191) NOT NULL,
  `title_en` varchar(191) NOT NULL,
  `title_de` varchar(191) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `dynamic_news_image_attributes`
--

INSERT INTO `dynamic_news_image_attributes` (`id`, `alt_en`, `alt_de`, `title_en`, `title_de`, `image_id`) VALUES
(16, 'A barbie doll with a pink shirt.', 'Eine Barbie-Puppe mit einem rosa Hemd.', 'A barbie doll in standing position with a pink shirt and a plant in the background.', 'Eine Barbie-Puppe in stehender Position mit einem rosa Hemd und einer Pflanze im Hintergrund.', 3),
(18, 'Women in research.', 'Frauen in der Forschung.', 'Empowering women in STEM is the key to a more diverse and creative research landscape.', 'Die Stärkung von Frauen in MINT ist der Schlüssel zu einer vielfältigeren und kreativeren Forschungslandschaft.', 40),
(24, 'Soft skills on the job.', 'Soft Skills im Beruf.', 'Soft skills are the key to success in professional life.', 'Soft Skills sind der Schlüssel zum Erfolg im Berufsleben.', 43),
(27, 'Uni stress.', 'Stress im Studium.', 'Learning stress takes the fun out of learning and impairs motivation.', 'Lernstress raubt einem den Spaß am Lernen und beeintächtigt die Motivation.', 32),
(28, 'Learning with fun.', 'Lernen mit Freude.', 'Gamification makes learning child\'s play.', 'Gamification macht Lernen zum Kinderspiel.', 27),
(29, 'Learning with AI.', 'Lernen mit KI.', 'Artificial intelligence in education is redefining learning.', 'Künstliche Intelligenz in der Bildung definiert das Lernen neu.', 24),
(30, 'Student offers.', 'Studenten-Angebote.', 'Shopping without a guilty conscience - student life can be so cheap.', 'Shopping ohne schlechtes Gewissen - das Studentenleben kann so günstig sein.', 20),
(31, 'Motivational music as a turbo for academic success.', 'Motivationsmusik als Turbo für den Studienerfolg.', 'With the right learning music, studying becomes a fun experience.', 'Mit der richtigen Lernmusik wird Studieren zum Fun-Erlebnis.\r\n', 12),
(32, 'Masters graduation gift.', 'Master-Abschluss-Geschenk.', 'What is the right graduation gift for a masters degree?', 'Welches ist das richtige Geschenk zum Masterabschluss?', 7),
(33, 'Studying online is the future.', 'Online studieren ist die Zukunft.', 'Online courses are becoming increasingly popular and offer flexible educational paths for modern learners.', 'Online-Studiengänge erfreuen sich wachsender Beliebtheit und bieten flexible Bildungswege für moderne Lernende.', 16),
(34, 'Educational deficits in professional life.', 'Bildungsdefizite im Berufsleben.', 'Educational gaps are often an obstacle on the road to professional success.', 'Bildungslücken sind oft das Hindernis auf dem Weg zum beruflichen Erfolg.', 49),
(35, 'Virtual reality and its applications.', 'Virtual reality is revolutionizing the way we learn, work and interact.', 'Smiling young woman with a black VR headset.', 'Virtual Reality revolutioniert die Art und Weise, wie wir lernen, arbeiten und interagieren.', 57),
(36, 'Studying in the evening.', 'Lernen am Abend.', 'For some, studying at night is the secret to their study success.', 'Nachts lernen ist für viele das Geheimnis ihres Studienerfolgs.', 65),
(37, 'Salary negotiation.', 'Negotiating salary properly requires skill.', 'Handshake between a smiling man in a suit  and a woman.', 'Gehalt richtig verhandeln will gekonnt sein.', 71),
(38, 'Digital marketing jobs are highly sought after.', 'Digital Marketing-Jobs sind begehrt.', 'Digital marketing is a dynamic field that opens up excellent job opportunities in various sectors.', 'Das digitale Marketing ist ein dynamisches Feld, das spannende Jobchancen in verschiedenen Branchen eröffnet.', 80),
(39, 'Optimized LinkedIn profile.', 'Optimiertes LinkedIn-Profil.', 'An optimized LinkedIn profile opens doors to new career opportunities.', 'Ein optimiertes LinkedIn-Profil öffnet Türen zu neuen Karrieremöglichkeiten.', 84),
(40, 'Job interview tips for applicants.', 'Vorstellungsgespräch-Tipps für Bewerber.', 'With the right job interview preparation, you can make the perfect appearance on the career stage.', 'Mit der richtigen Bewerbungsgespräch-Vorbereitung gelingt der perfekte Auftritt auf der Karriere-Bühne.', 88),
(41, 'Home office work.', 'Home-Office-Arbeit.', 'Remote working offers the freedom to be productive from anywhere.', 'Remote arbeiten bietet die Freiheit, von überall aus produktiv zu sein.', 92),
(42, 'St. Petersburg, Florida.', 'St. Petersburg, Florida.', 'St. Petersburg, Florida is the new home of Onsites Graduate School.', 'St. Petersburg in Florida ist die neue Heimat der Onsites Graduate School.', 98),
(43, 'St. Petersburg, USA.', 'St. Petersburg, USA.', 'St. Petersburg in the USA is known for its wide variety of industries.', 'St. Petersburg in den USA ist für ihre große Branchenvielfalt bekannt.', 100),
(44, 'St. Petersburg, America.', 'St. Petersburg, Amerika.', 'Saint Petersburg in America is a city that inspires day and night.', 'Sankt Petersburg in Amerika ist eine Stadt, die Tag und Nacht begeistert.', 102),
(45, 'Career change made easy.', 'Jobwechsel leicht gemacht.', 'Changing jobs can be so relaxed.', 'Den Job wechseln kann so entspannt sein.', 106),
(46, 'Say yes to a career switch.', 'Sage Ja zu Karrierewechsel.', 'Change job yes or no - that is the question here.', 'Job wechseln Ja oder Nein - das ist hier ist die Frage.', 108),
(47, 'Job reset.', 'Berufswechsel.', 'A thorough internet search is the first step in a career restart.', 'Eine gründliche Internet-Recherche steht am Anfang eines Karriere-Neustarts.', 110),
(48, 'Job change with career coaching.', 'Job-Wechsel mit Karriere-Coaching.', 'Professional support will turn your job switch into the stepping stone for your career.', 'Mit professioneller Unterstützung wird der berufliche Neuanfang zum Sprungbrett für Deine Karriere.', 114),
(49, 'The gig economy is conquering the world of work.', 'Die Gig Economy erobert die Arbeitswelt.', 'The gig economy brings flexibility and diversity to the world of work.', 'Die Gig Economy bringt Flexibilität und Vielfalt in die Arbeitswelt.', 118),
(50, 'The challenges of gig economy.', 'Die Herausforderungen der Gig-Economy.', 'If you want to be successful in the gig economy, you have to take several factors into account.', 'Wer in der Gig-Economy erfolgreich sein möchte, muss mehrere Faktoren berücksichtigen.', 120),
(51, 'Career coaching for gig workers.', 'Karriere-Coaching für Gigworker.', 'With professional coaching, entering the gig economy is the right career decision.', 'Mit professionellem Coaching wird der Einstieg in die Gig Economy zur richtigen Karriereentscheidung.', 122),
(52, 'Studying with ADHD.', 'Studieren mit ADHS.', 'ADHD students need adapted learning strategies in order to develop their full potential.', 'ADHS-Studenten benötigen angepasste Lernstrategien, um ihr volles Potenzial entfalten zu können.', 126),
(53, 'Students with ADHD.', 'ADHS-Studenten.', 'The challenge for ADHD students is to maintain their focus while finding creative solutions.', 'Die Herausforderung für ADHS-Studierende besteht darin, ihren Fokus zu halten und gleichzeitig kreative Lösungswege zu finden.', 128),
(54, 'Learning strategies for ADHD students.', 'ADHS-Strategien für Studierende.', 'Interactive learning technology is one of several effective ADHD learning strategies.', 'Interaktive Lerntechnologie ist eine von mehreren effektiven ADHS-Lernstrategien.', 132),
(55, 'Online courses for ADHD students.', 'Online-Studiengänge für ADHS-Studierende.', 'A flexible online degree program is just right for students with ADHD.', 'Ein flexibles Online-Studium ist genau das Richtige für Studenten mit ADHS.', 134),
(56, 'Further education.', 'Berufliche Fortbildung.', 'Professional development creates a win-win situation for employees and companies.', 'Berufliche Weiterbildungen schaffen eine Win-Win-Situation für Mitarbeitende und Unternehmen.', 140),
(57, 'Financial support for employees.', 'Finanzielle Unterstützung für Arbeitnehmer.', 'A well thought-out strategy and a clear plan significantly increase the chances of receiving employer funding', 'Eine durchdachte Strategie und ein klarer Plan erhöhen die Chancen auf eine Arbeitgeberförderung erheblich.', 142),
(58, 'Funded further training as a career springboard.', 'Geförderte Weiterbildung als Karriere-Sprungbrett.', 'An employer-sponsored further education course opens up new career paths.', 'Ein vom Arbeitgeber gefördertes Weiterbildungsstudium eröffnet neue Karrierewege.', 144),
(59, 'Professional development with employer sponsorship.', 'Berufliche Weiterbildung mit Arbeitgeberförderung.', 'With financial support from the employer, professional development becomes a smart investment in the future.', 'Mit der finanziellen Unterstützung des Arbeitgebers wird berufliche Weiterbildung zur cleveren Investition in die Zukunft.', 138),
(60, 'Glasses and an open book.', 'Eine Brille und ein offenes Buch.', 'A close-up of reading glasses with black frames and an open book in the background.', 'Nahaufnahme einer Lesebrille mit schwarzem Rahmen und einem offenen Buch im Hintergrund.', 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dynamic_news_image_attributes`
--
ALTER TABLE `dynamic_news_image_attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dynamic_news_image_attributes`
--
ALTER TABLE `dynamic_news_image_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

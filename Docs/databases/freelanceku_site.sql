-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 08:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelanceku_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `site_bank`
--

CREATE TABLE `site_bank` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_bank`
--

INSERT INTO `site_bank` (`id`, `bank_name`, `bank_code`) VALUES
(1, 'BANK REPUBLIK INDONESI (BRI)', '002'),
(2, 'BANK CENTRAL ASIA (BCA)', '014'),
(3, 'BANK MANDIRI', '008'),
(4, 'BANK NEGARA INDONESIA (BNI)', '009');

-- --------------------------------------------------------

--
-- Table structure for table `site_interest`
--

CREATE TABLE `site_interest` (
  `id` int(11) NOT NULL,
  `interest_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_interest`
--

INSERT INTO `site_interest` (`id`, `interest_name`) VALUES
(1, 'IU/UX'),
(2, 'Design'),
(3, 'Front-end'),
(4, 'Back-end'),
(5, 'DevOps'),
(6, 'Mobile'),
(7, 'Blockchain'),
(8, 'Game Dev');

-- --------------------------------------------------------

--
-- Table structure for table `site_seo`
--

CREATE TABLE `site_seo` (
  `id` int(11) NOT NULL,
  `seo_name` varchar(255) NOT NULL,
  `seo_type` varchar(255) NOT NULL,
  `seo_locale` varchar(255) NOT NULL,
  `seo_des` varchar(255) NOT NULL,
  `seo_amp` tinyint(1) NOT NULL,
  `seo_lang` varchar(255) NOT NULL,
  `seo_host` varchar(255) NOT NULL,
  `seo_author` varchar(100) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_seo`
--

INSERT INTO `site_seo` (`id`, `seo_name`, `seo_type`, `seo_locale`, `seo_des`, `seo_amp`, `seo_lang`, `seo_host`, `seo_author`, `seo_keyword`) VALUES
(1, 'Freelanceku', 'Marketplace', 'id_ID', 'No.1 Situs web pekerja lepas meraih impian', 0, 'id', 'localhost', 'Freelanceku', 'Freelanceku, website freelance, freelance indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `site_testimonial`
--

CREATE TABLE `site_testimonial` (
  `id` int(11) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_picture` varchar(255) NOT NULL,
  `testimonial_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site_bank`
--
ALTER TABLE `site_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_interest`
--
ALTER TABLE `site_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_seo`
--
ALTER TABLE `site_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_testimonial`
--
ALTER TABLE `site_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site_bank`
--
ALTER TABLE `site_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_interest`
--
ALTER TABLE `site_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_seo`
--
ALTER TABLE `site_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_testimonial`
--
ALTER TABLE `site_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

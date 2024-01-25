-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 08:10 PM
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

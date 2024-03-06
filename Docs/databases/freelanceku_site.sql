-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 09:23 PM
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
(1, 'BCA', '014'),
(2, 'BRI', '002'),
(3, 'BNI', '009'),
(4, 'Mandiri', '008');

-- --------------------------------------------------------

--
-- Table structure for table `site_identity`
--

CREATE TABLE `site_identity` (
  `id` int(11) NOT NULL,
  `identity_phone` varchar(255) NOT NULL,
  `identity_email` varchar(255) NOT NULL,
  `identity_address` varchar(255) NOT NULL,
  `identity_maps_embed` longtext DEFAULT NULL,
  `identity_maps_link` varchar(255) NOT NULL,
  `identity_ig` longtext DEFAULT NULL,
  `identity_linkedin` longtext DEFAULT NULL,
  `identity_x` longtext DEFAULT NULL,
  `identity_fb` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_identity`
--

INSERT INTO `site_identity` (`id`, `identity_phone`, `identity_email`, `identity_address`, `identity_maps_embed`, `identity_maps_link`, `identity_ig`, `identity_linkedin`, `identity_x`, `identity_fb`) VALUES
(1, '+62 (812) - 2333- 4444', 'freelancekuuu@gmail.com', 'Jl. Mojopahit No.666 B, Sidowayah, Celep, Kec. Sidoarjo, Kabupaten Sidoarjo - 61215', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.933710832993!2d112.716862!3d-7.467081!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6d4952b144b%3A0x311db776bc8bca8b!2sUniversitas%20Muhammadiyah%20Sidoarjo%20(UMSIDA)!5e0!3m2!1sid!2sid!4v1709363061400!5m2!1sid!2sid', 'https://maps.app.goo.gl/DMhJpY7QmyntgXxz8', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_income`
--

CREATE TABLE `site_income` (
  `id` int(11) NOT NULL,
  `income_trxid` varchar(255) NOT NULL,
  `income_date` varchar(255) NOT NULL,
  `income_fromemail` varchar(255) NOT NULL,
  `income_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'UI/UX'),
(2, 'Desain Grafis'),
(3, 'Front-end'),
(4, 'Back-end');

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
  `seo_lang` varchar(255) NOT NULL,
  `seo_host` varchar(255) NOT NULL,
  `seo_author` varchar(100) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_seo`
--

INSERT INTO `site_seo` (`id`, `seo_name`, `seo_type`, `seo_locale`, `seo_des`, `seo_lang`, `seo_host`, `seo_author`, `seo_keyword`) VALUES
(1, 'Freelanceku', 'Marketplace', 'id_ID', 'No.1 Situs web pekerja lepas untuk meraih impian', 'id', 'localhost', 'Freelanceku', 'Freelanceku, website freelance, freelance indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `site_tax`
--

CREATE TABLE `site_tax` (
  `id` int(11) NOT NULL,
  `tax_pay` int(11) DEFAULT NULL,
  `tax_midtrans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_tax`
--

INSERT INTO `site_tax` (`id`, `tax_pay`, `tax_midtrans`) VALUES
(1, 10, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `site_webhook`
--

CREATE TABLE `site_webhook` (
  `id` int(11) NOT NULL,
  `webhook_trxid` varchar(255) NOT NULL,
  `webhook_date` varchar(255) NOT NULL,
  `webhook_message` longtext DEFAULT NULL
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
-- Indexes for table `site_identity`
--
ALTER TABLE `site_identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_income`
--
ALTER TABLE `site_income`
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
-- Indexes for table `site_tax`
--
ALTER TABLE `site_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_webhook`
--
ALTER TABLE `site_webhook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site_bank`
--
ALTER TABLE `site_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_identity`
--
ALTER TABLE `site_identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_income`
--
ALTER TABLE `site_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_interest`
--
ALTER TABLE `site_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_seo`
--
ALTER TABLE `site_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_tax`
--
ALTER TABLE `site_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_webhook`
--
ALTER TABLE `site_webhook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

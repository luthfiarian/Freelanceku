-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2024 pada 20.28
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelanceku_user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `data_email` varchar(255) NOT NULL,
  `data_username` varchar(255) NOT NULL,
  `data_apikey` varchar(255) NOT NULL,
  `data_interest` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data_interest`)),
  `data_paymentstatus` int(1) NOT NULL,
  `data_paymentcode` varchar(10) NOT NULL,
  `data_paymentid` int(20) NOT NULL,
  `data_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_porto`
--

CREATE TABLE `user_porto` (
  `id` int(11) NOT NULL,
  `porto_user` varchar(255) NOT NULL,
  `porto_name` varchar(255) NOT NULL,
  `porto_date` varchar(255) NOT NULL,
  `porto_field` varchar(255) NOT NULL,
  `porto_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_reqwork`
--

CREATE TABLE `user_reqwork` (
  `id` int(11) NOT NULL,
  `reqwork_workid` int(11) NOT NULL,
  `reqwork_name` varchar(255) NOT NULL,
  `reqwork_email` varchar(255) NOT NULL,
  `reqwork_phone` int(20) NOT NULL,
  `reqwork_message` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_work`
--

CREATE TABLE `user_work` (
  `id` int(11) NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `work_host` varchar(255) NOT NULL,
  `work_des` longtext DEFAULT NULL,
  `work_field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `work_salary` int(255) NOT NULL,
  `work_status` int(1) NOT NULL,
  `work_maxuser` int(10) NOT NULL,
  `work_partner1` varchar(255) NOT NULL,
  `work_partner2` varchar(255) NOT NULL,
  `work_partner3` varchar(255) NOT NULL,
  `work_startdate` varchar(255) NOT NULL,
  `work_finishdate` varchar(255) NOT NULL,
  `work_image` varchar(255) NOT NULL,
  `work_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_porto`
--
ALTER TABLE `user_porto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_reqwork`
--
ALTER TABLE `user_reqwork`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_work`
--
ALTER TABLE `user_work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_porto`
--
ALTER TABLE `user_porto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_reqwork`
--
ALTER TABLE `user_reqwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_work`
--
ALTER TABLE `user_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

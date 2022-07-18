-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2022 at 02:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restful_api_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) UNSIGNED NOT NULL,
  `mahasiswa_nama` varchar(100) NOT NULL,
  `mahasiswa_nim` varchar(10) NOT NULL,
  `mahasiswa_email` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `mahasiswa_nama`, `mahasiswa_nim`, `mahasiswa_email`) VALUES
(1, 'Yusuf Bagus Sungging Herlambang', 'V3420077', 'yusufbagus'),
(2, 'Dhimas Risang Maulana', 'V3420077', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-04-08-034303', 'App\\Database\\Migrations\\OPD', 'default', 'App', 1657932606, 1),
(2, '2022-07-16-004722', 'App\\Database\\Migrations\\Otentikasi', 'default', 'App', 1657932606, 1),
(3, '2022-07-16-131118', 'App\\Database\\Migrations\\Mahasiswa', 'default', 'App', 1657978327, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ms_opd`
--

CREATE TABLE `ms_opd` (
  `opd_kode` int(11) UNSIGNED NOT NULL,
  `opd_nama` varchar(100) NOT NULL,
  `opd_logo` varchar(100) NOT NULL,
  `opd_email` varchar(100) NOT NULL,
  `opd_alamat` varchar(255) DEFAULT NULL,
  `opd_telp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_opd`
--

INSERT INTO `ms_opd` (`opd_kode`, `opd_nama`, `opd_logo`, `opd_email`, `opd_alamat`, `opd_telp`) VALUES
(1, 'Diskominfo Wonogiri', 'logo.png', 'diskominfo@gmail.com', 'Wonogiri', '089670198915'),
(3, 'coba233', 'logo', 'testing@email.com', 'testing', 'testing'),
(4, 'coba5', 'logo', 'testing@email.com', 'testing', '0912342211'),
(5, 'opd dua', 'logo', 'testing@email.com', 'testing', 'testing'),
(6, 'opd dua', 'logo', 'testing@email.com', 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `ms_otentikasi`
--

CREATE TABLE `ms_otentikasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_otentikasi`
--

INSERT INTO `ms_otentikasi` (`id`, `email`, `password`) VALUES
(2, 'yusufbagus@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_opd`
--
ALTER TABLE `ms_opd`
  ADD PRIMARY KEY (`opd_kode`);

--
-- Indexes for table `ms_otentikasi`
--
ALTER TABLE `ms_otentikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_opd`
--
ALTER TABLE `ms_opd`
  MODIFY `opd_kode` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ms_otentikasi`
--
ALTER TABLE `ms_otentikasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

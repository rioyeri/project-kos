-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 10:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectkos`
--

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id_blok` int(10) UNSIGNED NOT NULL,
  `namaBlok` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `namaBlok`, `class`) VALUES
(1, 'A', 'bg-default'),
(2, 'A (VIP)', 'bg-warning'),
(3, 'B', 'bg-primary'),
(4, 'C', 'bg-danger'),
(5, 'D', 'bg-success'),
(6, 'E', 'bg-theme02'),
(7, 'F', 'bg-info');

-- --------------------------------------------------------

--
-- Table structure for table `jaminankunci`
--

CREATE TABLE `jaminankunci` (
  `id_jaminankunci` int(10) UNSIGNED NOT NULL,
  `penghuni_id` int(10) UNSIGNED DEFAULT NULL,
  `jaminan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(10) UNSIGNED NOT NULL,
  `blok_id` int(10) UNSIGNED DEFAULT NULL,
  `lantai_id` int(10) UNSIGNED DEFAULT NULL,
  `namaKamar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `blok_id`, `lantai_id`, `namaKamar`, `harga`, `created_at`, `updated_at`) VALUES
(11, 1, 1, '01', 800000, '2019-08-26 21:48:23', '2019-08-26 21:48:23'),
(12, 1, 1, '02', 800000, '2019-08-26 21:49:11', '2019-08-26 21:49:11'),
(13, 1, 1, '03', 800000, '2019-08-26 21:49:31', '2019-08-26 21:49:31'),
(14, 1, 1, '04', 800000, '2019-08-26 21:49:47', '2019-08-26 21:49:47'),
(15, 2, 2, '05', 200000, '2019-08-26 21:51:09', '2019-08-26 21:51:09'),
(16, 2, 2, '06', 200000, '2019-08-26 21:51:28', '2019-08-26 21:51:28'),
(17, 2, 2, '07', 200000, '2019-08-26 21:51:45', '2019-08-26 21:51:45'),
(18, 2, 2, '08', 200000, '2019-08-26 21:52:07', '2019-08-26 21:52:07'),
(19, 2, 2, '09', 200000, '2019-08-26 21:52:51', '2019-08-26 21:52:51'),
(20, 2, 2, '10', 200000, '2019-08-26 21:53:14', '2019-08-26 21:53:14'),
(21, 2, 3, '11', 150000, '2019-08-26 21:54:10', '2019-08-26 21:54:10'),
(22, 2, 3, '12', 150000, '2019-08-26 21:54:32', '2019-08-26 21:54:32'),
(23, 2, 3, '12A', 150000, '2019-08-26 21:54:48', '2019-08-26 21:55:54'),
(24, 2, 3, '14', 150000, '2019-08-26 21:55:07', '2019-08-26 21:55:07'),
(25, 3, 1, 'A', 800000, '2019-08-26 21:57:35', '2019-08-26 21:57:35'),
(26, 3, 1, 'B', 800000, '2019-08-26 21:57:56', '2019-08-26 21:57:56'),
(27, 3, 1, 'C', 800000, '2019-08-26 21:58:30', '2019-08-26 21:58:30'),
(28, 3, 1, 'D', 800000, '2019-08-26 21:58:56', '2019-08-26 21:58:56'),
(29, 3, 1, 'E', 800000, '2019-08-26 21:59:29', '2019-08-26 21:59:29'),
(30, 3, 1, 'F', 800000, '2019-08-26 21:59:56', '2019-08-26 21:59:56'),
(31, 3, 1, 'G', 800000, '2019-08-26 22:00:11', '2019-08-26 22:00:11'),
(32, 3, 1, 'H', 800000, '2019-08-26 22:00:51', '2019-08-26 22:00:51'),
(33, 3, 1, 'I', 800000, '2019-08-26 22:01:13', '2019-08-26 22:01:13'),
(34, 3, 2, 'J', 900000, '2019-08-26 22:02:34', '2019-08-26 22:02:34'),
(35, 3, 2, 'K', 800000, '2019-08-26 22:04:09', '2019-08-26 22:04:09'),
(36, 3, 2, 'L', 800000, '2019-08-26 22:04:51', '2019-08-26 22:04:51'),
(37, 3, 2, 'M', 900000, '2019-08-26 22:05:09', '2019-08-26 22:05:09'),
(38, 3, 2, 'N', 800000, '2019-08-26 22:05:55', '2019-08-26 22:05:55'),
(39, 3, 2, 'O', 800000, '2019-08-26 22:06:33', '2019-08-26 22:06:33'),
(40, 3, 2, 'P', 800000, '2019-08-26 22:06:53', '2019-08-26 22:06:53'),
(41, 3, 2, 'Q', 800000, '2019-08-26 22:07:44', '2019-08-26 22:07:44'),
(42, 3, 2, 'R', 800000, '2019-08-26 22:08:18', '2019-08-26 22:08:18'),
(43, 3, 2, 'S', 800000, '2019-08-26 22:08:39', '2019-08-26 22:08:39'),
(44, 3, 2, 'T', 800000, '2019-08-26 22:08:53', '2019-08-26 22:08:53'),
(45, 4, 1, '01', 800000, '2019-08-26 22:10:16', '2019-08-26 22:10:16'),
(46, 4, 1, '02', 800000, '2019-08-26 22:10:35', '2019-08-26 22:10:35'),
(47, 4, 1, '03', 800000, '2019-08-26 22:10:49', '2019-08-26 22:10:49'),
(48, 4, 1, '04', 750000, '2019-08-26 22:11:36', '2019-08-26 22:11:36'),
(49, 4, 1, '05', 750000, '2019-08-26 22:11:52', '2019-08-26 22:11:52'),
(50, 4, 2, '06', 750000, '2019-08-26 22:12:12', '2019-08-26 22:12:12'),
(51, 4, 2, '07', 750000, '2019-08-26 22:12:29', '2019-08-26 22:12:29'),
(52, 4, 2, '08', 750000, '2019-08-26 22:12:59', '2019-08-26 22:12:59'),
(53, 4, 2, '09', 700000, '2019-08-26 22:13:42', '2019-08-26 22:13:42'),
(54, 4, 2, '10', 700000, '2019-08-26 22:13:58', '2019-08-26 22:13:58'),
(55, 4, 3, '11', 700000, '2019-08-26 22:14:14', '2019-08-26 22:14:14'),
(56, 4, 3, '12', 700000, '2019-08-26 22:14:33', '2019-08-26 22:14:33'),
(57, 4, 3, '12A', 700000, '2019-08-26 22:15:22', '2019-08-26 22:15:22'),
(58, 4, 3, '14', 700000, '2019-08-26 22:15:46', '2019-08-26 22:15:46'),
(59, 4, 3, '15', 700000, '2019-08-26 22:16:46', '2019-08-26 22:16:46'),
(60, 5, 1, '01', 900000, '2019-08-26 22:17:54', '2019-08-26 22:17:54'),
(61, 5, 1, '02', 900000, '2019-08-26 22:19:52', '2019-08-26 22:19:52'),
(62, 5, 1, '03', 900000, '2019-08-26 22:20:11', '2019-08-26 22:20:11'),
(63, 5, 1, '04', 900000, '2019-08-26 22:21:13', '2019-08-26 22:21:13'),
(64, 5, 1, '05', 900000, '2019-08-26 22:22:07', '2019-08-26 22:22:07'),
(65, 5, 1, '06', 900000, '2019-08-26 22:22:31', '2019-08-26 22:22:31'),
(66, 5, 1, '07', 850000, '2019-08-26 22:22:53', '2019-08-26 22:22:53'),
(67, 5, 2, '08', 850000, '2019-08-26 22:24:07', '2019-08-26 22:24:07'),
(68, 5, 2, '09', 850000, '2019-08-26 22:24:26', '2019-08-26 22:24:26'),
(69, 5, 2, '10', 850000, '2019-08-26 22:24:51', '2019-08-26 22:24:51'),
(70, 5, 2, '11', 850000, '2019-08-26 22:26:07', '2019-08-26 22:26:07'),
(71, 5, 2, '12', 850000, '2019-08-26 22:26:23', '2019-08-26 22:26:23'),
(72, 5, 2, '12A', 850000, '2019-08-26 22:26:41', '2019-08-26 22:26:41'),
(73, 5, 2, '14', 800000, '2019-08-26 22:26:58', '2019-08-26 22:26:58'),
(74, 6, 1, '01', 650000, '2019-08-26 22:28:31', '2019-08-26 22:28:31'),
(75, 6, 1, '02', 600000, '2019-08-26 22:28:54', '2019-08-26 22:28:54'),
(76, 6, 1, '03', 600000, '2019-08-26 22:29:16', '2019-08-26 22:29:16'),
(77, 6, 1, '04', 600000, '2019-08-26 22:29:36', '2019-08-26 22:29:36'),
(78, 6, 1, '05', 600000, '2019-08-26 22:30:23', '2019-08-26 22:30:23'),
(79, 6, 2, '06', 550000, '2019-08-26 22:31:21', '2019-08-26 22:31:21'),
(80, 6, 2, '07', 550000, '2019-08-26 22:31:36', '2019-08-26 22:31:36'),
(81, 6, 2, '08', 550000, '2019-08-26 22:32:04', '2019-08-26 22:32:04'),
(82, 6, 2, '09', 500000, '2019-08-26 22:32:26', '2019-08-26 22:32:26'),
(83, 6, 2, '10', 500000, '2019-08-26 22:32:45', '2019-08-26 22:32:45'),
(84, 6, 2, '11', 500000, '2019-08-26 22:33:04', '2019-08-26 22:33:04'),
(85, 7, 1, '01', 750000, '2019-08-26 22:34:11', '2019-08-26 22:34:11'),
(86, 7, 1, '02', 500000, '2019-08-26 22:34:27', '2019-08-26 22:34:27'),
(87, 7, 1, '03', 500000, '2019-08-26 22:34:42', '2019-08-26 22:34:42'),
(88, 7, 2, '04', 500000, '2019-08-26 22:35:03', '2019-08-26 22:35:03'),
(89, 7, 2, '05', 500000, '2019-08-26 22:35:50', '2019-08-26 22:35:50'),
(90, 7, 2, '06', 700000, '2019-08-26 22:36:20', '2019-08-26 22:36:20'),
(91, 7, 2, '07', 550000, '2019-08-26 22:37:00', '2019-08-26 22:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(10) NOT NULL,
  `trx_jenis` int(10) UNSIGNED DEFAULT NULL,
  `trx_id` int(10) UNSIGNED DEFAULT NULL,
  `saldo` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `trx_jenis`, `trx_id`, `saldo`, `created_at`, `updated_at`) VALUES
(2, 1, 11, 5000000, '2019-05-17 00:11:49', '2019-05-17 00:11:49'),
(3, 1, 12, 5050000, '2019-05-17 00:15:29', '2019-05-17 00:15:29'),
(4, 0, 5, 4550000, '2019-05-17 00:29:38', '2019-05-17 00:29:38'),
(5, 1, 13, 14550000, '2019-05-17 03:23:05', '2019-05-17 03:23:05'),
(6, 0, 6, 14050000, '2019-05-17 03:23:51', '2019-05-17 03:23:51'),
(7, 0, 7, 13850000, '2019-05-17 03:27:00', '2019-05-17 03:27:00'),
(8, 0, 8, 13700000, '2019-05-17 03:27:34', '2019-05-17 03:27:34'),
(9, 0, 9, 13250000, '2019-05-17 03:28:14', '2019-05-17 03:28:14'),
(10, 0, 10, 13230000, '2019-05-17 03:29:28', '2019-05-17 03:29:28'),
(11, 0, 11, 13180000, '2019-05-17 03:30:01', '2019-05-17 03:30:01'),
(12, 0, 12, 10680000, '2019-05-17 03:30:37', '2019-05-17 03:30:37'),
(13, 1, 14, 11180000, '2019-06-14 03:15:54', '2019-06-14 03:15:54'),
(14, 2, 11, 23180000, '2019-06-28 03:11:48', '2019-06-28 03:11:48'),
(15, 2, 12, 26180000, '2019-07-09 05:13:41', '2019-07-09 05:13:41'),
(16, 2, 13, 28180000, '2019-07-09 05:17:35', '2019-07-09 05:17:35'),
(17, 2, 18, 29180000, '2019-07-14 21:59:39', '2019-07-14 21:59:39'),
(18, 2, 19, 33680000, '2019-07-16 00:14:43', '2019-07-16 00:14:43'),
(19, 2, 20, 36680000, '2019-08-08 20:35:48', '2019-08-08 20:35:48'),
(20, 2, 21, 41180000, '2019-08-08 22:47:10', '2019-08-15 21:47:17'),
(21, 2, 22, 44380000, '2019-08-15 00:53:38', '2019-08-25 21:33:58'),
(22, 2, 23, 42780000, '2019-08-16 02:42:45', '2019-08-16 02:42:45'),
(23, 2, 24, 45980000, '2019-08-16 03:36:43', '2019-08-25 23:58:53'),
(24, 2, 25, 44380000, '2019-08-16 03:47:08', '2019-08-16 03:47:08'),
(25, 2, 23, 45180000, '2019-08-25 21:40:53', '2019-08-25 21:40:53'),
(26, 2, 24, 45980000, '2019-08-25 23:52:35', '2019-08-25 23:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id_lantai` int(10) UNSIGNED NOT NULL,
  `namaLantai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id_lantai`, `namaLantai`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `mappingkamar`
--

CREATE TABLE `mappingkamar` (
  `id_mapping` int(10) UNSIGNED NOT NULL,
  `id_penghuni` int(10) UNSIGNED DEFAULT NULL,
  `id_kamar` int(10) UNSIGNED DEFAULT NULL,
  `tglMasuk` date DEFAULT NULL,
  `tglKeluar` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_penghuni_table', 1),
(2, '2014_10_12_100000_create_blok_table', 1),
(3, '2019_03_14_011022_create_lantai_table', 1),
(4, '2019_03_14_012229_create_kamar_table', 1),
(5, '2019_03_14_013455_create_pembayaran_table', 1),
(6, '2019_03_14_013918_create_jaminan_kunci_table', 1),
(7, '2019_03_14_014528_create_pinjaman_table', 1),
(8, '2019_03_26_081115_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(10) NOT NULL,
  `namaSumber` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(10) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `namaSumber`, `jumlah`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(11, 'Donatur', 5000000, '2019-05-17', 'Cash', '2019-05-17 00:11:49', '2019-05-17 00:11:49'),
(12, 'Sukro', 50000, '2019-05-17', 'Coba', '2019-05-17 00:15:29', '2019-05-17 00:15:29'),
(13, 'Donatur', 10000000, '2019-05-18', 'Coba', '2019-05-17 03:23:05', '2019-05-17 03:23:05'),
(14, 'Donatur', 500000, '2019-06-14', 'Coba', '2019-06-14 03:15:54', '2019-06-14 03:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `penghuni_id` int(10) UNSIGNED DEFAULT NULL,
  `jumlahBayar` bigint(20) DEFAULT NULL,
  `tglPembayaran` date DEFAULT NULL,
  `buktiBayar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarandet`
--

CREATE TABLE `pembayarandet` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pembayaran` int(10) UNSIGNED DEFAULT NULL,
  `id_penghuni` int(10) UNSIGNED DEFAULT NULL,
  `tahun` int(10) UNSIGNED DEFAULT NULL,
  `bulan` int(10) UNSIGNED DEFAULT NULL,
  `tanggal` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(10) UNSIGNED NOT NULL,
  `namaPJ` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `namaPJ`, `jumlah`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 'Eko Patrio', 500000, '2019-05-17', 'Untuk Bayar Listrik', '2019-05-17 00:29:38', '2019-05-17 00:29:38'),
(6, 'Sukri', 500000, '2019-05-18', 'Hutang', '2019-05-17 03:23:50', '2019-05-17 03:23:50'),
(7, 'Juki', 200000, '2019-05-18', 'Hutang', '2019-05-17 03:27:00', '2019-05-17 03:27:00'),
(8, 'Galon', 150000, '2019-05-18', 'Untuk beli Pulsa', '2019-05-17 03:27:34', '2019-05-17 03:27:34'),
(9, 'Ferdi', 450000, '2019-05-18', 'Untuk bayar internet Indihome', '2019-05-17 03:28:14', '2019-05-17 03:28:14'),
(10, 'Eki', 20000, '2019-05-18', 'untuk beli takjil', '2019-05-17 03:29:28', '2019-05-17 03:29:28'),
(11, 'Penguin', 50000, '2019-05-18', 'Uang makan', '2019-05-17 03:30:01', '2019-05-17 03:30:01'),
(12, 'Lindsay Louhan', 2500000, '2019-05-18', 'Beli Sepatu', '2019-05-17 03:30:36', '2019-05-17 03:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(10) UNSIGNED NOT NULL,
  `noKTP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenisKelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatLahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalLahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noHP` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatAsli` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `noKTP`, `nama`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `noHP`, `pekerjaan`, `alamatAsli`, `ktp`, `created_at`, `updated_at`) VALUES
(66, '1111222233334444', 'Aaaaaa', 'Laki-Laki', 'Bandung', '1990-01-01', '082123456789', 'Mahasiswa', 'Jl. Bingung 01', NULL, '2019-08-27 02:57:51', '2019-08-27 02:57:51'),
(67, '5555666677778888', 'Bbbbbb', 'Perempuan', 'Cimahi', '1992-02-02', '081555666777', 'Swasta', 'Jl. Bingung 02', NULL, '2019-08-27 02:57:51', '2019-08-27 02:57:51'),
(68, '1111222211112222', 'Ccccccc', 'Perempuan', 'Garut', '1993-03-03', '085111222333', 'Mahasiswa', 'Jl. Bingung 03', NULL, '2019-08-27 02:57:51', '2019-08-27 02:57:51'),
(69, '5555666655556666', 'Dddddd', 'Laki-Laki', 'Tasikmalaya', '1998-04-04', '081222555888', 'Mahasiswa', 'Jl. Bingung 04', NULL, '2019-08-27 02:57:51', '2019-08-27 02:57:51'),
(70, '7777111122223333', 'Eeeeee', 'Laki-Laki', 'Karawang', '1995-05-05', '085999666333', 'Swasta', 'Jl. Bingung 05', NULL, '2019-08-27 02:57:51', '2019-08-27 02:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `account_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indexes for table `jaminankunci`
--
ALTER TABLE `jaminankunci`
  ADD PRIMARY KEY (`id_jaminankunci`),
  ADD KEY `jaminankunci_penghuni_id_foreign` (`penghuni_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `kamar_blok_id_foreign` (`blok_id`),
  ADD KEY `kamar_lantai_id_foreign` (`lantai_id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `keuangan_trx_id_foreign` (`trx_id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id_lantai`);

--
-- Indexes for table `mappingkamar`
--
ALTER TABLE `mappingkamar`
  ADD PRIMARY KEY (`id_mapping`),
  ADD KEY `tbl_mapping_id_penghuni_foreign` (`id_penghuni`),
  ADD KEY `tbl_mapping_id_kamar_foreign` (`id_kamar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_penghuni_id_foreign` (`penghuni_id`);

--
-- Indexes for table `pembayarandet`
--
ALTER TABLE `pembayarandet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_pembayarandet_id_penghuni` (`id_penghuni`),
  ADD KEY `tbl_pembayarandet_id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD UNIQUE KEY `penghuni_noktp_unique` (`noKTP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jaminankunci`
--
ALTER TABLE `jaminankunci`
  MODIFY `id_jaminankunci` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id_lantai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mappingkamar`
--
ALTER TABLE `mappingkamar`
  MODIFY `id_mapping` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayarandet`
--
ALTER TABLE `pembayarandet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jaminankunci`
--
ALTER TABLE `jaminankunci`
  ADD CONSTRAINT `jaminankunci_penghuni_id_foreign` FOREIGN KEY (`penghuni_id`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_blok_id_foreign` FOREIGN KEY (`blok_id`) REFERENCES `blok` (`id_blok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kamar_lantai_id_foreign` FOREIGN KEY (`lantai_id`) REFERENCES `lantai` (`id_lantai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mappingkamar`
--
ALTER TABLE `mappingkamar`
  ADD CONSTRAINT `tbl_mapping_id_kamar_foreign` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_mapping_id_penghuni_foreign` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_penghuni_id_foreign` FOREIGN KEY (`penghuni_id`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayarandet`
--
ALTER TABLE `pembayarandet`
  ADD CONSTRAINT `tbl_pembayarandet_id_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembayarandet_id_penghuni` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

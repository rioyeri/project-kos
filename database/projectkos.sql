-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 07:15 AM
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
  `namaBlok` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `namaBlok`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

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

--
-- Dumping data for table `jaminankunci`
--

INSERT INTO `jaminankunci` (`id_jaminankunci`, `penghuni_id`, `jaminan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Uang 100ribu', NULL, NULL),
(2, 2, 'Ironman suite', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(10) UNSIGNED NOT NULL,
  `blok_id` int(10) UNSIGNED DEFAULT NULL,
  `lantai_id` int(10) UNSIGNED DEFAULT NULL,
  `namaKamar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `blok_id`, `lantai_id`, `namaKamar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A101', NULL, NULL),
(2, 1, 2, 'A203', NULL, '2019-05-31 00:35:18'),
(3, 2, 2, 'B204', NULL, NULL),
(4, 3, 3, 'C303', NULL, NULL),
(5, 4, 2, 'D203', NULL, NULL),
(6, 3, 1, 'C111', NULL, NULL),
(9, 2, 1, 'B103', '2019-05-31 00:45:20', '2019-05-31 00:48:26'),
(10, 4, 3, 'D301', '2019-05-31 00:47:58', '2019-05-31 00:47:58');

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
(13, 1, 14, 11180000, '2019-06-14 03:15:54', '2019-06-14 03:15:54');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mappingkamar`
--

INSERT INTO `mappingkamar` (`id_mapping`, `id_penghuni`, `id_kamar`, `created_at`, `updated_at`) VALUES
(3, 3, 3, '2019-05-22 22:17:21', '2019-05-22 22:17:21'),
(7, 4, 5, '2019-05-30 23:56:09', '2019-05-30 23:56:09'),
(8, 5, 4, '2019-05-30 23:58:02', '2019-05-30 23:58:02'),
(9, 1, 2, '2019-05-31 00:00:05', '2019-05-31 00:00:05'),
(10, 6, 6, '2019-06-14 02:51:30', '2019-06-14 02:51:30');

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
  `kamar_id` int(10) UNSIGNED DEFAULT NULL,
  `penghuni_id` int(10) UNSIGNED DEFAULT NULL,
  `jumlahBayar` bigint(20) DEFAULT NULL,
  `tglPembayaran` date DEFAULT NULL,
  `tglMasuk` date DEFAULT NULL,
  `tglKeluar` date DEFAULT NULL,
  `buktiBayar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kamar_id`, `penghuni_id`, `jumlahBayar`, `tglPembayaran`, `tglMasuk`, `tglKeluar`, `buktiBayar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2500000, '2019-04-26', '2019-05-01', '2019-05-30', 'bukti/Adit/vwASWVy6zqEqjUnXvkNIky0mNWgFEhfHlOHuETgg.jpeg', NULL, '2019-04-26 00:53:23'),
(2, 5, 2, 5000000, '2019-04-30', '2019-05-01', '2019-10-01', 'bukti/Iron Man/c3LEc7Wnu6ur6O1SF37cDSS3PI9M8bPxv7t2yf6T.png', '2019-05-28 01:31:46', '2019-05-28 01:31:46'),
(3, 3, 3, 1000000, '2019-04-30', '2019-05-01', '2019-06-01', 'bukti/Nathasa Romanoff/oPJhSqefVUy10k36Q0RZkpUyLxlm7dSpobDdrw69.png', '2019-05-28 01:32:31', '2019-05-28 01:32:31'),
(4, 4, 4, 2000000, '2019-04-30', '2019-05-01', '2019-07-01', 'bukti/Steve Rogers/qTFbMaizXXjX9s4xPR6C03guWplx0rsPAtPGUk60.jpeg', '2019-05-28 01:41:01', '2019-05-28 01:41:01'),
(5, 6, 5, 1000000, '2019-05-01', '2019-05-01', '2019-06-01', 'bukti/Daisy Johnson/mCRGKknUirZ5BG3duIlZLRhfTftwkXwfiwvkppBn.jpeg', '2019-05-28 01:43:39', '2019-05-28 01:46:04');

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
  `tanggalLahir` date DEFAULT NULL,
  `noHP` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatAsli` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `noKTP`, `nama`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `noHP`, `pekerjaan`, `alamatAsli`, `created_at`, `updated_at`) VALUES
(1, '3504021810940001', 'Adit', 'Laki-laki', 'Tulungagung', '1994-10-18', NULL, 'Musidi', 'Bandung', '2019-04-25 21:04:43', '2019-04-25 21:04:43'),
(2, '1234567891234567', 'Iron Man', 'Laki-laki', 'New York', '1979-02-19', NULL, 'Engineer', 'Stark Industries', '2019-04-25 21:09:31', '2019-04-25 21:09:31'),
(3, '1111222233334444', 'Nathasa Romanoff', 'Perempuan', 'Sokovia', '1981-08-01', NULL, 'Spy', 'Morag', '2019-04-25 21:11:15', '2019-04-25 21:11:15'),
(4, '5555000055550000', 'Steve Rogers', 'Laki-laki', 'Berlin', '1928-09-28', NULL, 'Dancer', 'Rumahnya Peggy Carter (Founder of S.H.I.E.L.D)', '2019-04-25 21:13:58', '2019-04-25 21:14:38'),
(5, '7770000077700000', 'Daisy Johnson', 'Perempuan', 'Gang Sempit', '1990-09-19', '085321654987', 'Quake', 'Zephyr One', '2019-04-25 21:17:08', '2019-06-14 03:10:46'),
(6, '7418529637418520', 'Fiersa Besari', 'Laki-laki', 'Bandung', '1997-07-25', '081251321654', 'Spiderman', 'Jl. Sukabirus', '2019-05-28 03:44:30', '2019-05-28 03:44:30'),
(7, '1212343456567878', 'Peggy Carter', 'Perempuan', 'Berlin', '1991-05-31', '085123456789', 'Founder SHIELD', 'Washington DC', '2019-05-31 00:59:17', '2019-05-31 00:59:17');

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
  ADD KEY `pembayaran_kamar_id_foreign` (`kamar_id`),
  ADD KEY `pembayaran_penghuni_id_foreign` (`penghuni_id`);

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
  MODIFY `id_blok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jaminankunci`
--
ALTER TABLE `jaminankunci`
  MODIFY `id_jaminankunci` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id_lantai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mappingkamar`
--
ALTER TABLE `mappingkamar`
  MODIFY `id_mapping` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `pembayaran_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_penghuni_id_foreign` FOREIGN KEY (`penghuni_id`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

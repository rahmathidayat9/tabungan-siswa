-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 02:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_24_111246_create_nasabah_table', 1),
(5, '2021_02_24_111304_create_pegawai_table', 1),
(6, '2021_02_24_111316_create_rekening_table', 1),
(7, '2021_02_24_111327_create_transfer_table', 1),
(8, '2021_02_24_111338_create_transaksi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_users` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `kd_nasabah`, `nm_nasabah`, `jk`, `no_hp`, `email`, `alamat`, `id_users`, `created_at`, `updated_at`) VALUES
(11, 'NSBY0UT', 'Beni Nasution', NULL, '0879723487', 'beni@example.com', 'jl macedonia', 28, '2021-03-25 02:11:07', '2021-03-25 02:11:07'),
(12, 'NSBQYI7', 'Erwin Rommel', NULL, '08598099876', 'erwin@example.com', 'Berlin', 29, '2021-03-28 22:29:55', '2021-03-28 22:29:55');

--
-- Triggers `nasabah`
--
DELIMITER $$
CREATE TRIGGER `delete rekening` AFTER DELETE ON `nasabah` FOR EACH ROW delete from rekening where kd_nasabah=old.kd_nasabah
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_users` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `kd_pegawai`, `nm_pegawai`, `jk`, `no_hp`, `email`, `alamat`, `id_users`, `created_at`, `updated_at`) VALUES
(3, 'PGWUL2N', 'Adnan Nasution', NULL, '0858723723', 'adnan@example.com', 'jl macedonia', 24, '2021-03-25 01:51:51', '2021-03-25 01:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `kd_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `no_rekening`, `pin`, `kd_nasabah`, `saldo`, `created_at`, `updated_at`) VALUES
(10, '73359051', 123456, 'NSBY0UT', 100000, '2021-03-25 02:11:07', '2021-03-25 02:11:07'),
(11, '69568331', 123456, 'NSBQYI7', 100000, '2021-03-28 22:29:55', '2021-03-28 22:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL,
  `jns_transaksi` enum('setor','tarik','transfer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu`, `nominal`, `jns_transaksi`, `no_rekening`, `created_at`, `updated_at`) VALUES
(27, '2021-03-25 09:12:09', 100000, 'setor', '73359051', NULL, NULL),
(28, '2021-03-25 09:13:51', 50000, 'setor', '73359051', NULL, NULL),
(30, '2021-03-25 09:14:55', 80000, 'setor', '73359051', NULL, NULL),
(31, '2021-03-29 05:27:14', 30000, 'setor', '73359051', NULL, NULL),
(32, '2021-03-29 05:27:42', 30000, 'tarik', '73359051', NULL, NULL),
(33, '2021-03-29 05:28:48', 230000, 'tarik', '73359051', NULL, NULL),
(34, '2021-03-29 05:29:11', 100000, 'setor', '73359051', NULL, NULL),
(35, '2021-03-29 05:30:34', 100000, 'setor', '69568331', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` bigint(20) UNSIGNED NOT NULL,
  `jns_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_transaksi` bigint(20) DEFAULT NULL,
  `rek_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$1pec6NOp4NbuxkPeMbkXCOnxIU/mYagIfljT2lXPGXqsiwGwVvRG2',
  `level` enum('admin','nasabah','operator') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rahmat Hidayatullah', 'rahmat', 'rahmat@example.com', NULL, '$2y$10$ir2swNhg6Na5PXjFeGRZROkBZO3IVUrOJpk6aZDzqh8f1hHFzJTCG', 'admin', NULL, NULL, NULL),
(24, 'Adnan Nasution', 'pegawai1', 'adnan@example.com', NULL, '$2y$10$j8fQ.BPjvBNNnsKHB.JBQ.ShFfhBzOejPpsY02GTa1Y28wx6hnrFK', 'operator', NULL, '2021-03-25 01:51:51', '2021-03-25 01:51:51'),
(28, 'Beni Nasution', 'beni', 'beni@example.com', NULL, '$2y$10$Rcy21nIkAIhN98jTt23TMOEQ.lvFdG6D/hGTrKbjpIDqQEtHDNEV2', 'nasabah', NULL, '2021-03-25 02:11:07', '2021-03-25 02:11:07'),
(29, 'Erwin Rommel', 'erwin', 'erwin@example.com', NULL, '$2y$10$edOGmKWYx5L06xkL5DdU4eeb5qAJqNKEDnZDgIjSQP3/Wsx5KZQdy', 'nasabah', NULL, '2021-03-28 22:29:55', '2021-03-28 22:29:55');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `delete nasabah` AFTER DELETE ON `users` FOR EACH ROW BEGIN 
	DELETE FROM nasabah where id_users=old.id_users;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

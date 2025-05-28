-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2025 at 07:36 PM
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
-- Database: `aktu_companion_modified`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_28_045702_add_column_to_users_table', 2),
(5, '2025_04_28_063032_create_quantum_table', 3),
(6, '2025_04_28_063047_create_pyqs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pyqs`
--

CREATE TABLE `pyqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` enum('B.Tech') NOT NULL,
  `course_year` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `examination_year` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `public_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pyqs`
--

INSERT INTO `pyqs` (`id`, `course`, `course_year`, `subject`, `examination_year`, `location`, `public_id`, `created_at`, `updated_at`) VALUES
(2, 'B.Tech', 1, 'dummy2', 2019, 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746177824/quantum/adjnxlwjx1guk2rlk4rg.pdf', 'quantum/adjnxlwjx1guk2rlk4rg', '2025-05-02 03:53:46', '2025-05-02 03:53:46'),
(3, 'B.Tech', 1, 'dummy3', 2016, 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746181661/pyq/rk6v06d3vjttxllamnts.pdf', 'pyq/rk6v06d3vjttxllamnts', '2025-05-02 04:57:43', '2025-05-02 04:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `quantum`
--

CREATE TABLE `quantum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` enum('B.Tech') NOT NULL,
  `year` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `public_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantum`
--

INSERT INTO `quantum` (`id`, `course`, `year`, `subject`, `location`, `public_id`, `created_at`, `updated_at`) VALUES
(10, 'B.Tech', 1, 'b-dummy4', 'https://s3.us-east-005.backblazeb2.com/AKTU-Companion/quantum/6811eef5aac45_TeraBoxQuickStartGuide.pdf', 'quantum/6811eef5aac45_TeraBoxQuickStartGuide.pdf', '2025-04-30 04:05:50', '2025-04-30 04:05:50'),
(11, 'B.Tech', 1, 'b-dummy5', 'https://s3.us-east-005.backblazeb2.com/AKTU-Companion/quantum/6811f09804897_TeraBoxQuickStartGuide.pdf', 'quantum/6811f09804897_TeraBoxQuickStartGuide.pdf', '2025-04-30 04:12:49', '2025-04-30 04:12:49'),
(12, 'B.Tech', 1, 'dummy5', 'https://s3.us-east-005.backblazeb2.com/AKTU-Companion/quantum/6811f22d747b0_TeraBoxQuickStartGuide.pdf', 'quantum/6811f22d747b0_TeraBoxQuickStartGuide.pdf', '2025-04-30 04:19:34', '2025-04-30 04:19:34'),
(13, 'B.Tech', 1, 'b-dummy4', 'https://s3.us-east-005.backblazeb2.com/AKTU-Companion/quantum/6811f55edf471_TeraBoxQuickStartGuide.pdf', 'quantum/6811f55edf471_TeraBoxQuickStartGuide.pdf', '2025-04-30 04:33:12', '2025-04-30 04:33:12'),
(15, 'B.Tech', 1, 'dummy', 'https://res.cloudinary.com/dusbzopgz/raw/upload/v1746025227/quantum/azdcrfyfp1vxwvwbglew.tmp', 'quantum/azdcrfyfp1vxwvwbglew.tmp', '2025-04-30 09:30:27', '2025-04-30 09:30:27'),
(19, 'B.Tech', 1, 'summy69', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746089941/quantum/tsep9bfwh7vul1j16hap.pdf', 'quantum/tsep9bfwh7vul1j16hap', '2025-05-01 03:29:03', '2025-05-01 03:29:03'),
(24, 'B.Tech', 1, 'b-dummy--', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746091481/quantum/hp74c52cebpgm8ciltqy.pdf', 'quantum/hp74c52cebpgm8ciltqy', '2025-05-01 03:54:43', '2025-05-01 03:54:43'),
(30, 'B.Tech', 1, 'b-dummy20', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746092950/quantum/zv9ppw7sxijmmdbrenmu.pdf', 'quantum/zv9ppw7sxijmmdbrenmu', '2025-05-01 04:19:12', '2025-05-01 04:19:12'),
(34, 'B.Tech', 1, 'b-dummy2013', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746093437/quantum/ng5b8kreifciqyxiikux.pdf', 'quantum/ng5b8kreifciqyxiikux', '2025-05-01 04:27:19', '2025-05-01 04:27:19'),
(35, 'B.Tech', 1, 'b-dummy3', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746094411/quantum/lhkfau5ffovime6ilzve.pdf', 'quantum/lhkfau5ffovime6ilzve', '2025-05-01 04:43:33', '2025-05-01 04:43:33'),
(36, 'B.Tech', 1, 'dummy879', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746100700/quantum/irala2dhpajwvbhpfcd8.pdf', 'quantum/irala2dhpajwvbhpfcd8', '2025-05-01 06:28:22', '2025-05-01 06:28:22'),
(37, 'B.Tech', 1, 'dummy880', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746100834/quantum/hw6xvnoqcsc8vjlbx0hi.pdf', 'quantum/hw6xvnoqcsc8vjlbx0hi', '2025-05-01 06:30:36', '2025-05-01 06:30:36'),
(39, 'B.Tech', 1, 'dummy99', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1746102232/quantum/xcvsv54zk8fyg1dqizp9.pdf', 'quantum/xcvsv54zk8fyg1dqizp9', '2025-05-01 06:53:54', '2025-05-01 06:53:54'),
(40, 'B.Tech', 1, 'dummy4566', 'https://res.cloudinary.com/dusbzopgz/image/upload/v1748191784/quantum/txrnobbfmlktqmqep68u.pdf', 'quantum/txrnobbfmlktqmqep68u', '2025-05-25 11:19:45', '2025-05-25 11:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3yaoz6hE7HaRyacUyHAoL6CQWORHsTTKskAUq0ND', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaDFiV3J4SjhkdlplMkpSVVVnRDdKTWFzeFFFaFhHQXk1Q2hEMWxaUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1748193157),
('6KKfBvZ9eJnoHF1aebr31PNdJxCklZ4LVdmRuHtB', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYmxxTHkwZ0JOcHBIYmptcnVFVWduMnFzWDhzWnNpTDRLa2JMRXJadSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1746182464);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'yasharth', 'yash@123.com', NULL, '$2y$12$/6OCc4ggE9H1CTxiSrpvl.M8X5uvn0jutCsopeqfU40a4uKY0NM9S', 'admin', NULL, '2025-04-28 00:32:38', '2025-04-28 00:32:38'),
(4, 'yasharth', 'yash@1234.com', NULL, '$2y$12$J2myDyZsrOaAsobDRWcAsuAWvyq/1ppdkHTd2b2UotvdDBuyxC4Nu', 'user', NULL, '2025-04-28 00:32:54', '2025-04-28 00:32:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pyqs`
--
ALTER TABLE `pyqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantum`
--
ALTER TABLE `quantum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pyqs`
--
ALTER TABLE `pyqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quantum`
--
ALTER TABLE `quantum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

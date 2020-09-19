-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2020 at 11:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_payroll`
--
CREATE DATABASE IF NOT EXISTS `laravel_payroll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravel_payroll`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `positions_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `gender`, `address`, `positions_id`, `created_at`, `updated_at`) VALUES
(1, 'Charles', 'Bernaldez', 'Male', 'Guindulman, Bohol', 1, '2020-06-24 05:23:05', '2020-06-24 05:23:05'),
(2, 'Jane', 'Doe', 'Female', 'Cainta, Rizal', 3, '2020-06-24 05:23:25', '2020-06-24 05:23:25'),
(3, 'Conor', 'McGregor', 'Male', 'Ireland', 2, '2020-06-24 05:23:45', '2020-07-13 18:40:07'),
(4, 'Alpha', 'Bravo', 'Male', 'United Kingdom', 4, '2020-06-29 04:46:26', '2020-07-14 01:48:08'),
(5, 'Alyx', 'Vance', 'Female', 'Florida', 3, '2020-06-29 21:34:20', '2020-08-11 00:51:48'),
(6, 'Gordon', 'Freeman', 'Male', 'Black Mesa', 3, '2020-07-31 01:39:24', '2020-07-31 01:39:24'),
(7, 'Sample', 'Test', 'Female', 'Sample Address', 4, '2020-07-31 19:07:39', '2020-07-31 19:07:53'),
(8, 'Ash', 'Ketchum', 'Male', 'Pokeworld', 5, '2020-07-31 22:51:46', '2020-07-31 22:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `employees_payrolls`
--

CREATE TABLE `employees_payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employees_id` bigint(20) UNSIGNED NOT NULL,
  `payrolls_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_payrolls`
--

INSERT INTO `employees_payrolls` (`id`, `employees_id`, `payrolls_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 6, 5, NULL, NULL),
(6, 8, 6, NULL, NULL),
(7, 5, 7, NULL, NULL),
(8, 7, 8, NULL, NULL),
(9, 2, 9, NULL, NULL),
(10, 8, 10, NULL, NULL),
(11, 3, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2020_06_09_002708_create_employees_table', 1),
(5, '2020_06_09_003304_create_positions_table', 1),
(6, '2020_06_09_004356_create_payrolls_table', 1),
(7, '2020_06_09_234552_add_role_to_users_table', 1),
(8, '2020_06_21_093009_create_employee_payroll_table', 1),
(9, '2020_06_22_024037_update_positions_in_employees_table', 1),
(10, '2020_06_24_133425_create_employees_payrolls_table', 2),
(11, '2020_06_24_133645_create_employees_payrolls_table', 3);

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
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employees_id` int(11) NOT NULL,
  `days_work` int(11) NOT NULL,
  `overtime_hrs` double(8,2) NOT NULL,
  `late` int(11) NOT NULL,
  `absences` int(11) NOT NULL,
  `bonuses` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `employees_id`, `days_work`, `overtime_hrs`, `late`, `absences`, `bonuses`, `created_at`, `updated_at`) VALUES
(1, 2, 23, 4.00, 4, 4, NULL, '2020-06-24 05:25:31', '2020-06-24 05:38:12'),
(2, 3, 26, 4.00, 4, 5, NULL, '2020-06-24 05:28:05', '2020-06-24 05:38:27'),
(3, 1, 23, 3.00, 6, 2, NULL, '2020-06-24 05:37:52', '2020-06-24 05:37:52'),
(4, 1, 24, 4.00, 4, 6, NULL, '2020-06-24 05:39:12', '2020-06-24 05:39:12'),
(5, 6, 20, 0.00, 0, 0, NULL, '2020-07-31 01:40:25', '2020-07-31 01:40:25'),
(6, 8, 21, 0.00, 10, 3, 0.00, '2020-07-31 22:52:30', '2020-07-31 22:52:30'),
(7, 5, 19, 2.00, 5, 0, 0.00, '2020-08-04 00:39:02', '2020-08-04 00:39:02'),
(8, 7, 21, 3.00, 0, 0, NULL, '2020-08-11 00:53:14', '2020-08-11 00:53:14'),
(9, 2, 21, 1.00, 0, 0, NULL, '2020-08-11 00:54:10', '2020-08-11 00:54:10'),
(10, 8, 21, 2.00, 0, 0, NULL, '2020-08-11 00:56:06', '2020-08-11 00:56:06'),
(11, 3, 21, 19.00, 3, 2, NULL, '2020-08-11 01:03:04', '2020-08-11 01:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_pay` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `basic_pay`, `created_at`, `updated_at`) VALUES
(1, 'Junior PHP Developer', 100.00, '2020-06-24 05:21:32', '2020-07-31 00:36:13'),
(2, 'Senior Developer', 200.00, '2020-06-24 05:21:47', '2020-07-31 00:36:36'),
(3, 'System Analyst', 110.00, '2020-06-24 05:22:05', '2020-07-31 00:36:43'),
(4, 'Team Leader', 270.00, '2020-06-24 05:22:20', '2020-07-31 00:36:51'),
(5, 'Facilitator/Trainer', 150.00, '2020-07-31 19:08:58', '2020-07-31 22:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Charles Bernaldez', 'bernaldezsay@gmail.com', NULL, '$2y$10$t60mCq.O67MlOKlqLZCPR.Fv5I7VPSIPOZlnv.pT0Knbi8/yB/mjS', NULL, '2020-06-24 05:02:56', '2020-07-14 01:45:42', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_payrolls`
--
ALTER TABLE `employees_payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees_payrolls`
--
ALTER TABLE `employees_payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

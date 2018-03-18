-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 09:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `im_p`
--

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
(56, '	\r\n2017_07_05_064102_create_permission_tables', 9),
(59, '2014_10_12_000000_create_users_table', 10),
(60, '2014_10_12_100000_create_password_resets_table', 10),
(61, '2017_07_05_064102_create_permission_tables', 10),
(62, '2017_08_08_045203_HR', 10),
(63, '2017_08_10_110050_Employee', 11),
(64, '2017_08_20_035702_HrContract', 12),
(65, '2017_08_21_045836_HRLeave', 13),
(66, '2017_08_23_051624_HRContract', 14),
(68, '2017_08_27_065051_HR_Report', 15),
(69, '2017_10_31_065427_TasksMigration', 16),
(70, '2014_10_28_175635_create_threads_table', 17),
(71, '2014_10_28_175710_create_messages_table', 17),
(72, '2014_10_28_180224_create_participants_table', 17),
(73, '2014_11_03_154831_add_soft_deletes_to_participants_table', 17),
(74, '2014_12_04_124531_add_softdeletes_to_threads_table', 17),
(75, '2017_03_30_152742_add_soft_deletes_to_messages_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\User', 1),
(4, 'App\\User', 23),
(4, 'App\\User', 33),
(4, 'App\\User', 37),
(9, 'App\\User', 38),
(9, 'App\\User', 40),
(9, 'App\\User', 41),
(14, 'App\\User', 39);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Administer roles & permissions', 'web', '2017-07-09 02:22:11', '2017-07-09 02:22:11'),
(115, 'create role', 'web', '2017-07-10 06:15:18', '2017-07-10 06:15:18'),
(116, 'edit role', 'web', '2017-07-10 06:15:28', '2017-07-10 06:15:28'),
(117, 'delete role', 'web', '2017-07-10 06:15:34', '2017-07-10 06:15:34'),
(118, 'create permission', 'web', '2017-07-10 06:16:26', '2017-07-10 06:16:26'),
(119, 'edit permission', 'web', '2017-07-10 06:16:35', '2017-07-10 06:16:35'),
(139, 'delete permission', 'web', '2017-11-13 23:38:56', '2017-11-13 23:38:56'),
(140, 'create user', 'web', '2017-11-13 23:39:22', '2017-11-13 23:39:22'),
(142, 'Edit form', 'web', '2017-11-13 23:40:33', '2018-03-18 02:33:35'),
(143, 'Delete form', 'web', '2017-11-13 23:40:44', '2018-03-18 02:33:45'),
(144, 'Create form', 'web', '2017-11-13 23:41:02', '2018-03-18 02:34:03'),
(146, 'edit user', 'web', '2017-11-13 23:48:37', '2017-11-13 23:48:37'),
(147, 'delete user', 'web', '2017-11-13 23:48:46', '2017-11-13 23:48:46'),
(148, 'user management', 'web', '2017-11-18 05:45:49', '2017-11-18 05:45:49'),
(151, 'reports', 'web', '2018-03-18 02:42:45', '2018-03-18 02:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Administrator', 'web', '2017-07-09 05:29:20', '2018-03-18 02:31:22'),
(9, 'editor', 'web', '2017-11-13 23:49:39', '2018-03-18 02:32:02'),
(14, 'viewer', 'web', '2017-11-18 01:56:39', '2018-03-18 02:32:11'),
(16, 'asdasd', 'web', '2018-03-18 02:59:10', '2018-03-18 02:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 4),
(115, 4),
(116, 4),
(117, 4),
(118, 4),
(119, 4),
(139, 4),
(140, 4),
(142, 4),
(142, 9),
(143, 4),
(144, 4),
(144, 9),
(146, 4),
(147, 4),
(147, 16),
(148, 4),
(151, 4),
(151, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `dep_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `dep_id`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$pNb5.gvm9zsCeUVdgXKIEuNsKakhAg/AEWkgk8q/7gw75w6nsPJOe', '1510470272.jpg', 'LLmYaOstGMuHNyMYaz2692cp7b4RqUAWWkVAxthxiCaRHmcGkuzccdIkBxOx', '2017-04-26 00:33:59', '2018-03-18 02:47:09', 1, NULL),
(38, 'Editor', 'editor@editor.com', '$2y$10$0jhcECujU8AZR8hWdcVeO.KmLSF9naVvyXYbKtqam2fBmdeydNhH6', '1510471266.jpg', '3QNkbDNwMWDsdSDG53gNzEhLEwTvqPrk6OEAe547iFrCqHlJRLKwg1WOyw1T', '2017-11-06 23:48:13', '2018-03-18 02:47:30', 0, NULL),
(39, 'Viewer', 'Viewer@viewer.com', '$2y$10$ULi8jC/ZTgTIqgdzfuFXluBuk77LmOMY6Ty3Uw/PTSYzJHohfFE1.', NULL, NULL, '2017-11-08 00:32:15', '2018-03-18 02:48:07', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `id` int(11) NOT NULL,
  `form_title` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `location_date` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `note_of_location` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_reports`
--

INSERT INTO `user_reports` (`id`, `form_title`, `country`, `city`, `area`, `latitude`, `longitude`, `location_date`, `user_ip`, `note_of_location`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'kandahar', 'Afghanistan', 'Kabul', 'Kabul', '34.53329849243164', '69.16670227050781', NULL, '121.127.38.154', 'ss', 1, '2018-03-18 06:05:10', '2018-03-18 06:29:03', '2018-03-18 06:29:03'),
(3, 'dsf', 'Afghanistan', 'Kabul', 'Kabul', '34.53329849243164', '69.16670227050781', NULL, '121.127.38.154', 'sdfsdf', 1, '2018-03-18 06:05:52', '2018-03-18 06:29:06', '2018-03-18 06:29:06'),
(4, 'purchasing', 'Afghanistan', 'Kabul', 'Kabul', '34.53329849243164', '69.16670227050781', '2018-03-18', '121.127.38.154', 'system online registration', 1, '2018-03-18 06:18:00', '2018-03-18 06:18:00', NULL),
(5, 'dsfs', 'Afghanistan', 'Kabul', 'Kabul', '34.53329849243164', '69.16670227050781', '2018-03-18', '121.127.38.154', 'sdf sdfs', 1, '2018-03-18 06:30:05', '2018-03-18 06:30:05', NULL),
(6, 'das', 'Afghanistan', 'Kabul', 'Kabul', '34.53329849243164', '69.16670227050781', '2018-03-18', '121.127.38.154', 'asdasdas', 38, '2018-03-18 07:20:57', '2018-03-18 07:20:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user_reports`
--
ALTER TABLE `user_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

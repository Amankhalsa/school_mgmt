-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 12:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `created_at`, `updated_at`) VALUES
(19, 'CLENT 1', 'image/brand/1709507914044096.png', '2021-08-30 03:25:41', '2021-08-30 03:26:31'),
(20, 'CLENT 2', 'image/brand/1709507928974612.png', '2021-08-30 03:26:45', NULL),
(21, 'CLENT 3', 'image/brand/1709507949664604.png', '2021-08-30 03:27:05', NULL),
(22, 'CLENT 4', 'image/brand/1709507963860490.png', '2021-08-30 03:27:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `categories_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `categories_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Fish', '2021-07-27 10:21:17', NULL, NULL),
(2, 1, 'Mango', '2021-07-27 10:35:25', NULL, NULL),
(3, 1, 'Apple', '2021-07-27 10:35:57', NULL, NULL),
(4, 1, 'Iphone', '2021-07-27 10:42:11', '2021-07-27 10:42:11', NULL),
(5, 1, 'oppo', '2021-07-27 10:53:41', NULL, NULL),
(6, 1, 'hello', '2021-07-27 10:55:04', '2021-08-08 10:22:33', NULL),
(7, 2, 'Bdaam', '2021-07-27 11:13:27', NULL, NULL),
(8, 2, 'fan', '2021-07-27 11:14:16', NULL, NULL),
(10, 1, 'pen', '2021-07-31 16:26:24', '2021-08-03 11:26:57', NULL),
(11, 3, 'truck', '2021-07-31 16:28:54', NULL, NULL),
(12, 1, 'Mouse', '2021-08-01 03:56:52', '2021-08-04 11:51:53', NULL),
(13, 1, 'Bread', '2021-08-01 04:19:59', '2021-08-03 11:23:26', NULL),
(14, 1, 'Fruti', '2021-08-01 04:20:11', '2021-08-03 11:28:39', NULL),
(17, 1, 'Mobile', '2021-08-04 11:52:25', '2021-08-05 10:56:45', NULL),
(18, 1, 'Kulchay', '2021-08-08 10:29:08', NULL, NULL),
(19, 1, 'car', '2021-08-09 10:20:50', NULL, NULL),
(20, 2, 'head phone', '2021-08-15 03:29:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'A108 Adam Street\r\nNew York, NY 535022', 'info@example.com', '+1 5589 55', '2021-08-23 08:59:10', '2021-08-26 09:09:54'),
(3, 'sector ABC  # 98956  Mandi Gobindgarh', 'Aman@gmail.com', '9895465465', '2021-08-23 09:43:32', '2021-08-23 09:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE IF NOT EXISTS `contact_forms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'aman', 'aman@gmail.com', 'Help', 'I need you help and mobile number', '2021-08-24 07:10:53', NULL),
(17, 'Kazzi', 'Kazi@gmail.com', 'Hello Kazzi', 'Please send project link', '2021-08-24 07:37:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_abouts`
--

CREATE TABLE IF NOT EXISTS `home_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_dis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_dis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `li1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `li2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `li3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_abouts`
--

INSERT INTO `home_abouts` (`id`, `title`, `short_dis`, `long_dis`, `li1`, `li2`, `li3`, `created_at`, `updated_at`) VALUES
(1, 'Virtual Sessions with Today at Apple', 'Learn the basics of using iPhone, iPad, and Mac live with Apple Creatives.', 'Powerful assistive features are built into every Apple device to help you browse, work, play, and more.\r\nLearn how to manage an Apple device for your child, set up Family Sharing and Screen Time limits, and more.', '', '', '', '2021-08-22 10:59:25', '2021-08-23 00:11:10'),
(2, 'Get AppleCare+ for Mac', 'With AppleCare+, you\'re covered. Get accidental damage coverage and priority access to Apple experts.', 'Learn about AppleCare+ and the Apple limited warranty coverage, start a service request for your Mac, and find out how to prepare your Mac for service.And your memories.', '', '', '', '2021-08-23 00:13:19', '2021-08-23 03:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_07_21_120933_create_sessions_table', 1),
(7, '2021_07_25_170027_create_categories_table', 2),
(8, '2021_08_08_160657_create_brands_table', 3),
(9, '2021_08_12_142156_create_multipics_table', 4),
(10, '2021_08_21_132415_create_sliders_table', 5),
(11, '2021_08_22_152433_create_home_abouts_table', 6),
(12, '2021_08_23_131538_create_contacts_table', 7),
(13, '2021_08_24_120747_create_contact_forms_table', 8),
(14, '2021_08_26_130559_create_teams_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `multipics`
--

CREATE TABLE IF NOT EXISTS `multipics` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multipics`
--

INSERT INTO `multipics` (`id`, `image`, `created_at`, `updated_at`) VALUES
(32, 'image/Multi/1708886297547811.jpg', '2021-08-23 06:46:12', NULL),
(34, 'image/Multi/1708886410378476.jpg', '2021-08-23 06:47:59', NULL),
(35, 'image/Multi/1708886410567486.jpg', '2021-08-23 06:47:59', NULL),
(36, 'image/Multi/1708886410687493.jpg', '2021-08-23 06:47:59', NULL),
(37, 'image/Multi/1708886411007512.jpg', '2021-08-23 06:48:00', NULL),
(40, 'image/Multi/1708886623739348.jpg', '2021-08-23 06:51:22', NULL),
(41, 'image/Multi/1708886748018832.jpg', '2021-08-23 06:53:21', NULL),
(42, 'image/Multi/1708886829846967.jpg', '2021-08-23 06:54:39', NULL),
(44, 'image/Multi/1709506686486036.jpg', '2021-08-30 03:07:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ApTvbaaX4NdifJVaZadGeLEw3qEL22HrLxprp6MN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnh5bWVnOXU3aU9NM0RCUDRqZXFFNWJTdGtlZ0M5MjhoMGhuQTZnciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1630587973),
('cckFRZVVibQdXZczWlyPq3OXwiM1H29X4Wgy2Hfy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZXZ0Y3ZoYno5TGp6NUxiOEdMQUxoVFlFVmxrc0NCTUJBbDM5YllncSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSWIueGZFbkFGMTA3VTR1eVlzQzhkT1dFTlNEOURZZ1J1NzVHS1NNZkc4WnQ3c09yZDFRUjYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEliLnhmRW5BRjEwN1U0dXlZc0M4ZE9XRU5TRDlEWWdSdTc1R0tTTWZHOFp0N3NPcmQxUVI2IjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9fQ==', 1630428059),
('XZw3IeofSRLibYVDTQ14tR4OL8eyVeixPpMvUIeB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkoyZElpeEtFVW54Y0hxS0dmT01VRzgzOXR0TkQ0YTF4djBiMkxacCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1630499725);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'iPad Like a computer.', 'iPad  does more than a computer in simpler, more magical ways. And now with more features and capabilities,', 'image/slider/1708807187449210.jpg', '2021-08-21 09:31:55', '2021-08-27 06:59:41'),
(2, 'iPhone X Say hello to the future.', 'For more than a decade, our intention has been to create an iPhone that is all display.', 'image/slider/1708807213321729.jpg', '2021-08-22 05:05:14', '2021-08-27 06:59:27'),
(4, 'Face ID,  and Secure Authentication System', 'iPhone X also features a redesigned dual 12-megapixel rear camera system with dual optical image stabilisation.', 'image/slider/1709505837620388.jpg', '2021-08-22 07:55:17', '2021-08-30 02:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Walter White', 'Chief Executive Officer', 'image/team/1709164176640833.jpg', '2021-08-26 08:22:58', NULL),
(2, 'Sarah Jhonson', 'Product Manager', 'image/team/1709164417182697.jpg', '2021-08-26 08:26:47', NULL),
(3, 'William Anderson', 'CTO', 'image/team/1709164446355116.jpg', '2021-08-26 08:27:15', NULL),
(4, 'Amanda Jepson', 'Accountant', 'image/team/1709164473000681.jpg', '2021-08-26 08:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Aman Singh', 'aman@gmail.com', '2021-08-20 04:43:27', '$2y$10$Ib.xfEnAF107U4uyYsC8dOWENSD9DYgRu75GKSMfG8Zt7sOrd1QR6', NULL, NULL, NULL, NULL, '2108291405favicon.png', '2021-07-21 10:29:12', '2021-08-29 08:35:38'),
(2, 'Preet', 'preet@gmail.com', '2021-08-20 05:07:31', '$2y$10$jwij8yyEPzgvxPtLtiB.uO2OIsYoLnE0ikA.AArwUr9DbcxD4GWYG', NULL, NULL, '3685npDjldp7Rpxa3CMVNVv2aPjkv8KgwMK8MkKN3Cp1inWRJIgJp19xaRRS', NULL, '2108291409aman.jpg', '2021-07-22 09:04:25', '2021-08-29 08:39:22'),
(3, 'Test', 'test@gmail.com', '2021-08-29 08:41:42', '$2y$10$C40H/XnaEdo.LxCf1T7Nk.9dJzGlrpQ6Ii4pNFf7WNvGCQEO.VnVC', NULL, NULL, NULL, NULL, '2108291414apple.png', '2021-07-23 10:17:04', '2021-08-29 08:44:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

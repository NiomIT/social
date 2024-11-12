-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 04:14 AM
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
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text DEFAULT NULL,
  `box_size` varchar(255) DEFAULT NULL,
  `non_box_size` varchar(255) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `url`, `box_size`, `non_box_size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://tpc.googlesyndication.com/simgad/8448888884360123814', '1', NULL, 1, '2023-07-17 11:13:05', '2023-07-17 11:13:05'),
(2, 'https://tpc.googlesyndication.com/simgad/11278537785729760847', '1', NULL, 1, '2023-07-17 11:13:23', '2023-07-17 11:13:23'),
(3, 'https://www.dailynayadiganta.com/ads/300x250-29-dec.gif', '1', NULL, 1, '2023-07-17 11:13:40', '2023-07-17 11:13:40'),
(4, 'https://tpc.googlesyndication.com/simgad/8155636016249765331', NULL, '1', 1, '2023-07-17 11:13:58', '2023-07-17 11:13:58'),
(5, 'https://tpc.googlesyndication.com/simgad/4325040459101774261', NULL, '1', 1, '2023-07-17 11:14:41', '2023-07-17 11:14:41'),
(6, 'https://tpc.googlesyndication.com/simgad/4325040459101774261', NULL, '1', 1, '2023-07-27 06:36:55', '2023-07-27 06:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(100) DEFAULT NULL,
  `brand_name_bn` varchar(100) DEFAULT NULL,
  `brand_slug_en` varchar(100) DEFAULT NULL,
  `brand_image` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `featured_category` tinyint(1) DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `featured_category`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Private', 'private', 0, 1, '2024-11-10 09:29:54', '2024-11-10 09:30:46'),
(11, 'Profession', 'profession', 0, 1, '2024-11-10 09:31:56', '2024-11-10 09:31:56'),
(12, 'Food', 'food', 0, 1, '2024-11-10 09:32:11', '2024-11-10 09:32:11'),
(13, 'Clothing', 'clothing', 0, 1, '2024-11-10 09:32:22', '2024-11-10 09:32:22'),
(14, 'Health', 'health', 0, 1, '2024-11-10 09:32:44', '2024-11-10 09:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_topic` varchar(255) DEFAULT NULL,
  `meeting_link` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `presenter_name` varchar(255) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_topic`, `meeting_link`, `photo`, `presenter_name`, `start_time`, `end_time`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'namaz', '#', 'upload/event/1771948724206860.jpg', 'ashraful', '2023-07-20 23:00:00', '2023-07-20 23:30:00', 1, '2023-07-20 16:50:11', '2023-07-20 16:48:47', '2023-07-20 16:50:11'),
(2, 'How to get success', 'https://meet.google.com/vaa-wnzm-exy', 'upload/event/1772127880856537.jpg', 'Md Ashraful Islam', '2023-07-22 21:20:00', '2023-07-22 21:45:00', 1, '2023-07-23 12:28:09', '2023-07-22 15:34:45', '2023-07-23 12:28:09'),
(3, 'How to get success', 'https://meet.google.com/vaa-wnzm-exy', 'upload/event/1772214396242164.jpg', 'ashraful', '2023-07-23 18:28:00', '2023-07-23 18:41:00', 1, '2023-07-25 11:32:00', '2023-07-23 12:29:57', '2023-07-25 11:32:00'),
(4, 'How to get success', 'https://meet.google.com/vaa-wnzm-exy', 'upload/event/1772506511300352.jpg', 'Md Ashraful Islam', '2023-08-27 00:34:00', '2023-07-27 23:34:00', 1, '2023-07-26 17:54:51', '2023-07-26 17:53:54', '2023-07-26 17:54:51'),
(5, 'How to get success ?', 'https://meet.google.com/vaa-wnzm-exy', 'upload/event/1772507251511808.jpg', 'Md Ashraful Islam', '2023-07-29 00:00:00', '2023-07-31 23:55:00', 1, NULL, '2023-07-26 18:09:23', '2023-07-26 18:09:23');

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
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2023_06_03_195637_create_brands_table', 1),
(38, '2023_06_04_090422_create_categories_table', 1),
(39, '2023_06_04_092338_create_sub_categories_table', 1),
(40, '2023_06_04_092513_create_subcategories_table', 1),
(41, '2023_06_04_103122_create_subsubcategories_table', 1),
(42, '2023_07_07_094841_create_posts_table', 1),
(43, '2023_07_07_095509_create_settings_table', 1),
(44, '2023_07_09_132549_create_advertisements_table', 2),
(45, '2023_07_11_061554_create_comments_table', 3),
(47, '2023_07_20_092749_create_events_table', 4),
(48, '2023_07_24_222812_create_polls_table', 5),
(49, '2023_07_24_223032_create_options_table', 5),
(50, '2023_07_24_223047_create_votes_table', 5),
(51, '2023_07_27_142334_create_polls_table', 6),
(56, '2023_07_27_142345_create_options_table', 7),
(57, '2023_07_27_142352_create_votes_table', 7),
(58, '2023_07_27_142633_create_polls_table', 8),
(59, '2023_07_27_145526_create_votes_table', 9),
(60, '2023_07_27_204423_create_subscribes_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `poll_id`, `option_text`, `created_at`, `updated_at`) VALUES
(28, 16, 'Green', '2023-07-27 13:55:03', '2023-07-27 13:55:03'),
(29, 16, 'Red', '2023-07-27 13:55:03', '2023-07-27 13:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 'Which is favourite color ?', 1, '2023-07-27 13:55:03', '2023-07-27 13:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_thambnail` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `subcategory_id`, `post_title`, `post_slug`, `post_thambnail`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(56, 17, 10, NULL, 'আমার সোনার বাংলা', 'আমার-সোনার-বাংলা', 'upload/post/1815412364726454.jpg', 1, NULL, '2024-11-11 08:02:25', '2024-11-11 08:02:25'),
(58, 16, 11, 25, 'hello bondhura', 'hello-bondhura', 'upload/post/1815412748432587.jpg', 1, NULL, '2024-11-11 08:08:31', '2024-11-11 08:08:31'),
(59, 15, 11, 18, 'kemon aco sobai ?', 'kemon-aco-sobai-?', 'upload/post/1815412824439426.jpg', 1, NULL, '2024-11-11 08:09:44', '2024-11-11 08:09:44'),
(60, 18, 11, 19, 'hi there this is new post', 'hi-there-this-is-new-post', 'upload/post/1815413697207763.jpg', 1, NULL, '2024-11-11 08:23:36', '2024-11-11 08:23:36'),
(61, 16, 11, 25, 'this another post', 'this-another-post', 'upload/post/1815426827050270.png', 1, NULL, '2024-11-11 11:52:18', '2024-11-11 11:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'site_title', 'Febula News', '2023-07-07 06:44:50', '2023-07-07 06:49:38', NULL),
(2, 'site_address', 'Mirpur 10', '2023-07-07 06:44:50', '2023-07-07 06:49:38', NULL),
(3, 'site_phone_number', '+8801 906 299 549', '2023-07-07 06:44:50', '2023-07-17 11:55:19', NULL),
(4, 'site_facebook_link', 'https://www.facebook.com/', '2023-07-07 06:44:50', '2023-07-07 06:49:38', NULL),
(5, 'site_twitter_link', 'https://twitter.com/', '2023-07-07 06:44:50', '2023-07-11 02:55:10', NULL),
(6, 'site_google_link', 'https://www.google.com/', '2023-07-07 06:44:50', '2023-07-11 02:55:10', NULL),
(7, 'site_rss_link', 'https://rss.com/', '2023-07-07 06:44:50', '2023-07-11 02:55:10', NULL),
(8, 'site_vimeo_link', 'https://vimeo.com/', '2023-07-07 06:44:50', '2023-07-11 02:55:10', NULL),
(9, 'site_linkedin_link', 'https://www.linkedin.com/', '2023-07-07 06:44:50', '2023-07-11 02:55:10', NULL),
(10, 'copy_right', 'Copyright © 2023 Developed By <a href=\"https://febulait.com/\">Febula Technology </a> All rights reserved.', '2023-07-07 06:44:50', '2023-07-17 10:24:27', NULL),
(11, 'logo_image', 'upload/setting/logo/1689594919Febula-News-Logo.png', '2023-07-07 06:52:52', '2023-07-17 11:55:19', NULL),
(12, 'favicon_icon', 'upload/setting/favicon/1689594919Febula-Logo-Fav-Icon.png', '2023-07-07 06:52:52', '2023-07-17 11:55:19', NULL),
(13, 'site_youtube_link', 'https://www.youtube.com/', '2023-07-07 07:59:48', '2023-07-11 02:55:10', NULL),
(14, 'site_email', 'news@febula.tech', '2023-07-07 07:59:48', '2023-07-17 11:55:19', NULL),
(15, 'site_bio', 'Top leading tech News and Trending news', '2023-07-07 08:14:58', '2023-07-17 11:55:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(18, 11, 'doctor', 'doctor', 1, '2024-11-10 09:42:21', '2024-11-10 09:42:21'),
(19, 11, 'engineer', 'engineer', 1, '2024-11-10 09:42:48', '2024-11-10 09:42:48'),
(20, 12, 'mango', 'mango', 1, '2024-11-10 09:42:59', '2024-11-10 09:42:59'),
(21, 12, 'rice and beef', 'rice-and-beef', 1, '2024-11-10 09:43:28', '2024-11-10 09:43:28'),
(22, 13, 't-shirt', 't-shirt', 1, '2024-11-10 09:43:44', '2024-11-10 09:43:44'),
(23, 13, 'pant', 'pant', 1, '2024-11-10 09:43:57', '2024-11-10 09:43:57'),
(24, 14, 'gym', 'gym', 1, '2024-11-10 09:44:20', '2024-11-10 09:44:20'),
(25, 11, 'reseciptinist', 'reseciptinist', 0, '2024-11-11 06:37:32', '2024-11-11 06:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `category_id` text NOT NULL,
  `subcategory_id` text DEFAULT NULL,
  `subcategory_name` text DEFAULT NULL,
  `city_id` text DEFAULT NULL,
  `area_id` text DEFAULT NULL,
  `house_no` text DEFAULT NULL,
  `road_no` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `category_id`, `subcategory_id`, `subcategory_name`, `city_id`, `area_id`, `house_no`, `road_no`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$muwTwr.9hncsqxWypUk/aeg3uWdiBClbUO/iWDlWLZjE7Gb1s2ZtS', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL),
(2, 'Vendor', 'vendor', 'vendor@gmail.com', NULL, '$2y$10$muwTwr.9hncsqxWypUk/aeg3uWdiBClbUO/iWDlWLZjE7Gb1s2ZtS', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', NULL, NULL, NULL),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$HBdAchhVZXih2Kvxs0vNPeGeDLg/uuG4ehY4UwmAyq9ObiyYnNeGi', '202307110606pexels-sebastiaan-stam-1097456.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, NULL, '2023-07-11 00:06:49'),
(4, 'Virginie Schulist', NULL, 'a@gmail.com', '2023-07-07 23:01:56', '$2y$10$muwTwr.9hncsqxWypUk/aeg3uWdiBClbUO/iWDlWLZjE7Gb1s2ZtS', 'https://via.placeholder.com/60x60.png/00ff33?text=iusto', '', NULL, NULL, NULL, NULL, NULL, NULL, '937-889-1074', '8772 Pinkie Crossing Suite 614\nNew Buford, VA 04039-3487', 'user', 'active', 'a5sw73CoYEmFWo0SfWZczaKSTygignlu6nS8U3yWV3kFYtLsReERoMRrIAmd', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(5, 'Dr. Clifford Anderson', NULL, 'creola.kunde@example.com', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00cc99?text=rerum', '', NULL, NULL, NULL, NULL, NULL, NULL, '260-588-0233', '23336 Simonis Row\nEast Piper, AR 11449-7203', 'vendor', 'active', 'mZmDjWqi8o', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(6, 'Mr. Isaac Konopelski DDS', NULL, 'altenwerth.johathan@example.net', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/007722?text=dignissimos', '', NULL, NULL, NULL, NULL, NULL, NULL, '+19522366412', '1589 Alan Inlet\nCalistaton, IL 07449-2404', 'admin', 'active', 'ZjgclyVpNa', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(7, 'Roger Rice I', NULL, 'bergstrom.janick@example.org', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ddaa?text=velit', '', NULL, NULL, NULL, NULL, NULL, NULL, '1-918-588-2339', '25183 Reichel Lodge Apt. 105\nWest Katelinville, SD 64179', 'user', 'active', 'CYRI43RuTx', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(8, 'Verla McCullough', NULL, 'rashawn.skiles@example.net', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/002211?text=placeat', '', NULL, NULL, NULL, NULL, NULL, NULL, '458-424-6463', '58275 Blaze Fall Apt. 724\nKautzermouth, DE 35357', 'admin', 'inactive', 'iIubg8pwhJ', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(9, 'Mathew Adams', NULL, 'lera35@example.com', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ee99?text=pariatur', '', NULL, NULL, NULL, NULL, NULL, NULL, '+1-251-430-2100', '6703 Neil Grove\nLake Ben, NJ 12443', 'admin', 'active', 'dzMSxujIfP', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(10, 'Mylene Waters', NULL, 'xstehr@example.org', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0077aa?text=reprehenderit', '', NULL, NULL, NULL, NULL, NULL, NULL, '+1-559-235-4640', '4815 Adams Estate Apt. 840\nLake Williamton, LA 25477-4499', 'user', 'active', 'r82baTxikA', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(11, 'Ms. Marianna Dooley', NULL, 'dwolf@example.org', '2023-07-07 23:01:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0066aa?text=nulla', '', NULL, NULL, NULL, NULL, NULL, NULL, '(207) 595-1581', '1029 Darrel Bridge Apt. 910\nNew Gaston, AR 24037-6510', 'admin', 'active', '3QzQ4jN3Zd', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(12, 'Joanne Oberbrunner', NULL, 'c@gmail.com', '2023-07-07 23:01:56', '$2y$10$muwTwr.9hncsqxWypUk/aeg3uWdiBClbUO/iWDlWLZjE7Gb1s2ZtS', 'https://via.placeholder.com/60x60.png/00dd55?text=temporibus', '', NULL, NULL, NULL, NULL, NULL, NULL, '1-878-416-1691', '191 Mya Underpass\nEast Trevamouth, ME 28711', 'user', 'active', 'eklx7scSYsCugfgtn8H9AyO7jiquQYLfG5Xk1dT6ZNzpPW4Lcvn8UqGyNp7R', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(13, 'Jay McGlynn', NULL, 'b@gmail.com', '2023-07-07 23:01:56', '$2y$10$muwTwr.9hncsqxWypUk/aeg3uWdiBClbUO/iWDlWLZjE7Gb1s2ZtS', 'https://via.placeholder.com/60x60.png/0022aa?text=veritatis', '', NULL, NULL, NULL, NULL, NULL, NULL, '+1-346-940-5317', '64479 Kreiger Plaza Apt. 637\nNorth Cierra, SD 78419', 'user', 'inactive', '5D3F2OZXpGBRReuJEkTI35fZPtUzfqopuo15n6BFxMXKJlXp2nJqFI1tQOVK', '2023-07-07 23:01:56', '2023-07-07 23:01:56'),
(14, 'Md Asraful', 'asraful', 'asraful9355@gmail.com', NULL, '$2y$10$UioPqdghf.4Bvj5.N0qZAupx.6dxRgmntkqPzf.iPG/sXV6cb0kPq', 'photos/GRB5020eKAKfAjkLzbpOUZnTztcIzo7Uk3TqR2BO.jpg', '11', NULL, 'developer', NULL, NULL, '48', '201', NULL, NULL, 'user', 'active', NULL, '2024-11-11 05:29:40', '2024-11-11 05:29:40'),
(15, 'abc', 'abc', 'abc@gmail.com', NULL, '$2y$10$SVq9NL5iIkqzHnIBbHLhj.2RmS86BfWjaREiGGt.INdiefDEBwdam', 'upload/user_images/202411111545akash.jpg', '11', '18', NULL, NULL, NULL, '48', NULL, NULL, NULL, 'user', 'active', NULL, '2024-11-11 06:32:35', '2024-11-11 09:45:19'),
(16, 'aslam ahmed', 'aslam', 'aslam@gmail.com', NULL, '$2y$10$VRGhMjrprNW1zZntbM0fKe.TbgIfMmbblVaZwL3farqCHoAb5lnt.', 'upload/user_images/202411111547sayer.jpg', '11', '25', 'reseciptinist', 'narayanganj', 'chasaca', '20', '1', NULL, NULL, 'user', 'active', NULL, '2024-11-11 06:37:32', '2024-11-11 09:47:27'),
(17, 'rakib ahmed', 'rakib', 'rakib@gmail.com', NULL, '$2y$10$20m.2oBHvRcxBFE3Q405kemzNRHS3FAeOg.ILdNs9s0FapdLZZEMO', 'upload/user_images/202411111544bashar.jpg', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, '2024-11-11 06:41:28', '2024-11-11 09:44:36'),
(18, 'moin islam', 'moin', 'usermoin@gmail.com', NULL, '$2y$10$U5MTlE1bnJ7P.TsZhDdqcOfiDXafAsABrzKeRtaXX9PKU2DxXg6q.', 'upload/user_images/202411111530jahangir (3).jpg', '11', '19', NULL, 'narayanganj', 'chasara', '3/1/A', 'New Chasara Rd', NULL, NULL, 'user', 'active', NULL, '2024-11-11 08:22:59', '2024-11-11 09:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `poll_id`, `option_id`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 16, 28, 3, '2023-07-27 14:10:36', '2023-07-27 14:10:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_poll_id_foreign` (`poll_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polls_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribes_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_poll_id_foreign` (`poll_id`),
  ADD KEY `votes_option_id_foreign` (`option_id`),
  ADD KEY `votes_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

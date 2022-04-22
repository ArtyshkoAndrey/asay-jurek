-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 23, 2022 at 01:29 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asay`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '2022-04-19 08:06:00', '2022-04-19 08:06:00'),
(2, 1, '2022-04-19 08:06:00', '2022-04-19 08:06:00'),
(3, NULL, '2022-04-19 08:06:00', '2022-04-19 08:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`) VALUES
(1, 1, 'ru', 'Верхняя одежда'),
(2, 1, 'en', 'Outerwear'),
(3, 2, 'ru', 'Шапки'),
(4, 2, 'en', 'Hats'),
(5, 3, 'ru', 'Куртки'),
(6, 3, 'en', 'Jackets');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `value` double(10,3) NOT NULL DEFAULT '1.000',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `short_name`, `symbol`, `default`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'KZT', '₸', 0, 1.000, NULL, '2022-04-14 07:15:47', '2022-04-21 03:49:09'),
(2, 'RUB', '₽', 1, 2.000, NULL, '2022-04-14 15:19:24', '2022-04-21 03:49:09'),
(3, 'USD', '$', 0, 0.053, NULL, '2022-04-15 10:51:38', '2022-04-21 03:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `currency_translations`
--

CREATE TABLE `currency_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_translations`
--

INSERT INTO `currency_translations` (`id`, `currency_id`, `locale`, `name`) VALUES
(1, 2, 'ru', 'Рубль'),
(2, 2, 'en', 'Rubles'),
(3, 1, 'ru', 'Тенге'),
(4, 1, 'en', 'Tenge'),
(5, 3, 'ru', 'Доллар'),
(6, 3, 'en', 'Dollar');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_products`
--

CREATE TABLE `image_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bites` int(11) NOT NULL DEFAULT '0',
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_products`
--

INSERT INTO `image_products` (`id`, `owner_name`, `local_name`, `bites`, `alt`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'image 9.png', 'image 9.png', 741000, 'image 9.png', 1, '2022-04-21 06:50:14', '2022-04-21 06:50:14'),
(2, 'ZYBambVKxE.png', 'ZYBambVKxE.png', 741807, 'ZYBambVKxE.png', 2, '2022-04-21 04:56:19', '2022-04-21 04:56:19'),
(3, '7fc1pBuSPs.png', '7fc1pBuSPs.png', 741807, '7fc1pBuSPs.png', 3, '2022-04-21 04:57:04', '2022-04-21 04:57:04'),
(4, '0TuzMit5fZ.png', '0TuzMit5fZ.png', 741807, '0TuzMit5fZ.png', 4, '2022-04-21 04:57:13', '2022-04-21 04:57:13'),
(5, 'D6Jkb3vzdP.png', 'D6Jkb3vzdP.png', 741807, 'D6Jkb3vzdP.png', 5, '2022-04-21 04:57:14', '2022-04-21 04:57:14'),
(6, 'Wwm8RRJAxS.png', 'Wwm8RRJAxS.png', 741807, 'Wwm8RRJAxS.png', 6, '2022-04-21 04:57:14', '2022-04-21 04:57:14'),
(7, 'tFrTrnv9Ul.png', 'tFrTrnv9Ul.png', 741807, 'tFrTrnv9Ul.png', 7, '2022-04-21 04:57:15', '2022-04-21 04:57:15'),
(8, 'YAvHNCxq1X.png', 'YAvHNCxq1X.png', 741807, 'YAvHNCxq1X.png', 8, '2022-04-21 04:57:16', '2022-04-21 04:57:16'),
(9, 'K8pzKkEZUO.png', 'K8pzKkEZUO.png', 741807, 'K8pzKkEZUO.png', 9, '2022-04-21 04:57:17', '2022-04-21 04:57:17'),
(10, 'ODyohxDZOn.png', 'ODyohxDZOn.png', 741807, 'ODyohxDZOn.png', 10, '2022-04-21 04:57:18', '2022-04-21 04:57:18'),
(11, 'xuphEa8jWt.png', 'xuphEa8jWt.png', 741807, 'xuphEa8jWt.png', 11, '2022-04-21 04:57:19', '2022-04-21 04:57:19'),
(12, 'Y4kG4r4W6g.png', 'Y4kG4r4W6g.png', 741807, 'Y4kG4r4W6g.png', 12, '2022-04-21 04:57:20', '2022-04-21 04:57:20'),
(13, 'PmJ78kkclp.png', 'PmJ78kkclp.png', 741807, 'PmJ78kkclp.png', 13, '2022-04-21 04:57:20', '2022-04-21 04:57:21'),
(14, 'L5cy6NqQfS.png', 'L5cy6NqQfS.png', 741807, 'L5cy6NqQfS.png', 14, '2022-04-21 04:57:21', '2022-04-21 04:57:21'),
(15, '4xHDmmRR8r.png', '4xHDmmRR8r.png', 741807, '4xHDmmRR8r.png', 15, '2022-04-21 04:57:22', '2022-04-21 04:57:22'),
(16, 'isHG6MghjD.png', 'isHG6MghjD.png', 741807, 'isHG6MghjD.png', 16, '2022-04-21 04:57:48', '2022-04-21 04:57:48'),
(17, 'D5N6sfBVrr.png', 'D5N6sfBVrr.png', 741807, 'D5N6sfBVrr.png', 17, '2022-04-21 04:57:49', '2022-04-21 04:57:49'),
(18, 'qd611B9BOS.png', 'qd611B9BOS.png', 741807, 'qd611B9BOS.png', 18, '2022-04-21 04:57:50', '2022-04-21 04:57:51'),
(19, '0cfc9JJ7zI.png', '0cfc9JJ7zI.png', 741807, '0cfc9JJ7zI.png', 19, '2022-04-21 04:57:51', '2022-04-21 04:57:51'),
(20, '2x6ojLY3Un.png', '2x6ojLY3Un.png', 741807, '2x6ojLY3Un.png', 20, '2022-04-21 04:57:52', '2022-04-21 04:57:52'),
(21, 'ZVPcmYkpBE.png', 'ZVPcmYkpBE.png', 741807, 'ZVPcmYkpBE.png', 21, '2022-04-21 04:57:53', '2022-04-21 04:57:53'),
(22, 'sMyywfxjbO.png', 'sMyywfxjbO.png', 741807, 'sMyywfxjbO.png', 22, '2022-04-21 04:57:54', '2022-04-21 04:57:54'),
(23, 'LizekQSsXX.png', 'LizekQSsXX.png', 741807, 'LizekQSsXX.png', 23, '2022-04-21 04:57:55', '2022-04-21 04:57:55'),
(24, 'EnwWXSCfD9.png', 'EnwWXSCfD9.png', 741807, 'EnwWXSCfD9.png', 24, '2022-04-21 04:57:56', '2022-04-21 04:57:56'),
(25, 'Bipm33dUx9.png', 'Bipm33dUx9.png', 741807, 'Bipm33dUx9.png', 25, '2022-04-21 04:57:57', '2022-04-21 04:57:57'),
(26, 'YXzSGdvsQj.png', 'YXzSGdvsQj.png', 741807, 'YXzSGdvsQj.png', 26, '2022-04-21 04:57:58', '2022-04-21 04:57:58'),
(27, '63LmIrNKmu.png', '63LmIrNKmu.png', 741807, '63LmIrNKmu.png', 27, '2022-04-21 04:57:59', '2022-04-21 04:57:59'),
(28, 'vc5Pbia80x.png', 'vc5Pbia80x.png', 741807, 'vc5Pbia80x.png', 28, '2022-04-21 04:58:00', '2022-04-21 04:58:00'),
(29, 'xm8SEkNQeS.png', 'xm8SEkNQeS.png', 741807, 'xm8SEkNQeS.png', 29, '2022-04-21 04:58:01', '2022-04-21 04:58:01'),
(30, 'H4TiGQzN0d.png', 'H4TiGQzN0d.png', 741807, 'H4TiGQzN0d.png', 30, '2022-04-21 04:58:02', '2022-04-21 04:58:02'),
(31, 'OWv5BF6A5D.png', 'OWv5BF6A5D.png', 741807, 'OWv5BF6A5D.png', 31, '2022-04-21 04:59:23', '2022-04-21 04:59:23'),
(32, 'S5jtEO7Y5Y.png', 'S5jtEO7Y5Y.png', 741807, 'S5jtEO7Y5Y.png', 32, '2022-04-21 05:00:51', '2022-04-21 05:00:51'),
(33, '1TvD9pX9ZC.png', '1TvD9pX9ZC.png', 741807, '1TvD9pX9ZC.png', 33, '2022-04-21 05:05:00', '2022-04-21 05:05:00'),
(34, 'ACa84p57Yo.png', 'ACa84p57Yo.png', 741807, 'ACa84p57Yo.png', 34, '2022-04-21 05:05:01', '2022-04-21 05:05:01'),
(35, 'lmGHwOaZqD.png', 'lmGHwOaZqD.png', 741807, 'lmGHwOaZqD.png', 35, '2022-04-21 05:05:02', '2022-04-21 05:05:02'),
(36, 'Gr00jtFMBG.png', 'Gr00jtFMBG.png', 741807, 'Gr00jtFMBG.png', 36, '2022-04-21 05:05:03', '2022-04-21 05:05:03'),
(38, 'test.png', 'test.png', 741807, 'test.png', 35, '2022-04-21 04:57:57', '2022-04-21 04:57:57');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_04_14_140559_create_currencies_table', 1),
(14, '2022_04_14_151449_add_default_in_currencies_table', 2),
(15, '2022_04_15_094713_create_seos_table', 3),
(16, '2022_04_18_093747_create_currency_translations_table', 4),
(17, '2022_04_18_094120_drop_columns_in_currencies_table', 4),
(20, '2022_04_19_075850_create_categories_table', 5),
(21, '2022_04_19_080105_create_category_translations_table', 5),
(22, '2022_04_21_060723_create_products_table', 6),
(23, '2022_04_21_061139_create_statuses_table', 6),
(24, '2022_04_21_061209_create_status_translations_table', 7),
(25, '2022_04_21_061356_add_product_table', 7),
(27, '2022_04_21_061752_create_product_translations_table', 8),
(28, '2022_04_21_064535_create_image_products_table', 9),
(29, '2022_04_21_104558_add_columns_in_currencies_table', 10),
(34, '2022_04_22_114107_create_settings_table', 11),
(35, '2022_04_22_114138_create_setting_translations_table', 11);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `count`, `cost`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 1, 10, 200000, '2022-04-20 23:34:57', '2022-04-20 23:34:57', 1),
(2, 1, 10, 200000, '2022-04-21 04:56:19', '2022-04-21 04:56:19', 1),
(3, 1, 10, 200000, '2022-04-21 04:57:04', '2022-04-21 04:57:04', 1),
(4, 1, 10, 200000, '2022-04-21 04:57:13', '2022-04-21 04:57:13', 1),
(5, 1, 10, 200000, '2022-04-21 04:57:14', '2022-04-21 04:57:14', 1),
(6, 1, 10, 200000, '2022-04-21 04:57:14', '2022-04-21 04:57:14', 1),
(7, 1, 10, 200000, '2022-04-21 04:57:15', '2022-04-21 04:57:15', 1),
(8, 1, 10, 200000, '2022-04-21 04:57:16', '2022-04-21 04:57:16', 1),
(9, 1, 10, 200000, '2022-04-21 04:57:17', '2022-04-21 04:57:17', 1),
(10, 1, 10, 200000, '2022-04-21 04:57:18', '2022-04-21 04:57:18', 1),
(11, 1, 10, 200000, '2022-04-21 04:57:19', '2022-04-21 04:57:19', 1),
(12, 1, 10, 200000, '2022-04-21 04:57:20', '2022-04-21 04:57:20', 1),
(13, 1, 10, 200000, '2022-04-21 04:57:21', '2022-04-21 04:57:21', 1),
(14, 1, 10, 200000, '2022-04-21 04:57:21', '2022-04-21 04:57:21', 1),
(15, 1, 10, 200000, '2022-04-21 04:57:22', '2022-04-21 04:57:22', 1),
(16, 1, 10, 200000, '2022-04-21 04:57:48', '2022-04-21 04:57:48', 1),
(17, 1, 10, 200000, '2022-04-21 04:57:49', '2022-04-21 04:57:49', 1),
(18, 1, 10, 200000, '2022-04-21 04:57:51', '2022-04-21 04:57:51', 1),
(19, 1, 10, 200000, '2022-04-21 04:57:51', '2022-04-21 04:57:51', 1),
(20, 1, 10, 200000, '2022-04-21 04:57:52', '2022-04-21 04:57:52', 1),
(21, 1, 10, 200000, '2022-04-21 04:57:53', '2022-04-21 04:57:53', 1),
(22, 1, 10, 200000, '2022-04-21 04:57:54', '2022-04-21 04:57:54', 1),
(23, 1, 10, 200000, '2022-04-21 04:57:55', '2022-04-21 04:57:55', 1),
(24, 1, 10, 200000, '2022-04-21 04:57:56', '2022-04-21 04:57:56', 1),
(25, 1, 10, 200000, '2022-04-21 04:57:57', '2022-04-21 04:57:57', 1),
(26, 1, 10, 200000, '2022-04-21 04:57:58', '2022-04-21 04:57:58', 1),
(27, 1, 10, 200000, '2022-04-21 04:57:59', '2022-04-21 04:57:59', 1),
(28, 1, 10, 200000, '2022-04-21 04:58:00', '2022-04-21 04:58:00', 1),
(29, 1, 10, 200000, '2022-04-21 04:58:01', '2022-04-21 04:58:01', 1),
(30, 1, 10, 200000, '2022-04-21 04:58:02', '2022-04-21 04:58:02', 1),
(31, 1, 8, 775931, '2022-04-21 04:59:23', '2022-04-21 04:59:23', 1),
(32, 1, 0, 297877, '2022-04-21 05:00:51', '2022-04-21 05:00:51', 1),
(33, 1, 0, 714170, '2022-04-21 05:05:00', '2022-04-21 05:05:00', 1),
(34, 1, 0, 415604, '2022-04-21 05:05:01', '2022-04-21 05:05:01', 1),
(35, 1, 3, 291495, '2022-04-21 05:05:02', '2022-04-21 05:05:02', 1),
(36, 1, 1, 144579, '2022-04-21 05:05:03', '2022-04-21 05:05:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `history` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `name`, `description`, `history`) VALUES
(1, 1, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(2, 1, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(3, 2, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(4, 2, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(5, 3, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(6, 3, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(7, 4, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(8, 4, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(9, 5, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(10, 5, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(11, 6, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(12, 6, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(13, 7, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(14, 7, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(15, 8, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(16, 8, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(17, 9, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(18, 9, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(19, 10, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(20, 10, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(21, 11, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(22, 11, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(23, 12, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(24, 12, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(25, 13, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(26, 13, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(27, 14, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(28, 14, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(29, 15, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(30, 15, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(31, 16, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(32, 16, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(33, 17, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(34, 17, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(35, 18, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(36, 18, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(37, 19, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(38, 19, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(39, 20, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(40, 20, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(41, 21, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(42, 21, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(43, 22, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(44, 22, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(45, 23, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(46, 23, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(47, 24, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(48, 24, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(49, 25, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(50, 25, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(51, 26, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(52, 26, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(53, 27, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(54, 27, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(55, 28, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(56, 28, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(57, 29, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(58, 29, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(59, 30, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(60, 30, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(61, 31, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(62, 31, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(63, 32, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(64, 32, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(65, 33, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(66, 33, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(67, 34, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(68, 34, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(69, 35, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(70, 35, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(71, 36, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(72, 36, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `url`, `title`, `description`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, '/', 'Главная страница магазина Asay Jurek', 'Главная страница', 'Купить брендовую одежду в Казахстане', 'Asay Jurek, интернет магазин', '2022-04-15 02:52:29', '2022-04-15 02:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'delivery', '2022-04-22 11:57:29', '2022-04-22 11:57:29'),
(2, 'status_product', '2022-04-22 11:57:29', '2022-04-22 11:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`) VALUES
(1, 1, 'ru', 'Не следует, однако забывать, что сложившаяся структура организации способствует подготовки и реализации модели развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации систем массового участия. С другой стороны новая модель организационной деятельности играет важную роль в формировании форм развития. Задача организации, в особенности же консультация с широким активом в значительной степени обуславливает создание модели развития. Разнообразный и богатый опыт рамки и место обучения кадров требуют от нас анализа форм развития.'),
(2, 1, 'en', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 2, 'ru', 'Не следует, однако забывать, что сложившаяся структура организации способствует подготовки и реализации модели развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации систем массового участия. С другой стороны новая модель организационной деятельности играет важную роль в формировании форм развития. Задача организации, в особенности же консультация с широким активом в значительной степени обуславливает создание модели развития. Разнообразный и богатый опыт рамки и место обучения кадров требуют от нас анализа форм развития.'),
(4, 2, 'en', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-04-20 23:34:57', '2022-04-20 23:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `status_translations`
--

CREATE TABLE `status_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_translations`
--

INSERT INTO `status_translations` (`id`, `status_id`, `locale`, `name`) VALUES
(1, 1, 'ru', 'Отличное'),
(2, 1, 'en', 'Good');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrey', 'artyshko.andrey@gmail.com', NULL, '$2y$10$dW6vLiQNv.AuLhFosXPkg.M9TxQBb6pPX7CWgpDE/46BkgtIWW/xG', 'vA20Cxs9Tn8WLFacfmYLU8Wv8B5bzl6PTeND2HiryNdDnOCfhtzH4fqfMHfQ', '2022-04-18 09:55:27', '2022-04-18 09:55:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_short_name_unique` (`short_name`);

--
-- Indexes for table `currency_translations`
--
ALTER TABLE `currency_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_translations_currency_id_locale_unique` (`currency_id`,`locale`),
  ADD KEY `currency_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_products_local_name_unique` (`local_name`),
  ADD KEY `image_products_product_id_foreign` (`product_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_status_id_foreign` (`status_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translations_product_id_foreign` (`product_id`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seos_url_unique` (`url`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  ADD KEY `setting_translations_locale_index` (`locale`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_translations`
--
ALTER TABLE `status_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_translations_status_id_foreign` (`status_id`),
  ADD KEY `status_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency_translations`
--
ALTER TABLE `currency_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_translations`
--
ALTER TABLE `status_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `currency_translations`
--
ALTER TABLE `currency_translations`
  ADD CONSTRAINT `currency_translations_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_translations`
--
ALTER TABLE `status_translations`
  ADD CONSTRAINT `status_translations_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

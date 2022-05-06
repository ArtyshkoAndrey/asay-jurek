-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2022 at 12:53 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.27

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `count`, `created_at`, `updated_at`) VALUES
(25, 5, 51, 1, '2022-05-05 09:11:34', '2022-05-05 09:11:34');

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
  `value` double(10,5) NOT NULL DEFAULT '1.00000',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `short_name`, `symbol`, `default`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'KZT', '₸', 0, 1.00000, NULL, '2022-04-14 07:15:47', '2022-04-21 03:49:09'),
(2, 'RUB', '₽', 1, 0.15026, NULL, '2022-04-14 15:19:24', '2022-05-05 08:49:11'),
(3, 'USD', '$', 0, 0.00234, NULL, '2022-04-15 10:51:38', '2022-05-05 08:49:11');

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
(42, 'F59Jq20lQx.png', 'F59Jq20lQx.png', 3027579, 'F59Jq20lQx.png', 38, '2022-05-05 09:09:49', '2022-05-05 09:09:49'),
(43, 'zKbiup9GXa.png', 'zKbiup9GXa.png', 3027579, 'zKbiup9GXa.png', 39, '2022-05-05 09:09:50', '2022-05-05 09:09:50'),
(44, '8ehsHfnqsI.png', '8ehsHfnqsI.png', 3027579, '8ehsHfnqsI.png', 40, '2022-05-05 09:09:51', '2022-05-05 09:09:51'),
(45, '1h6pIONuyW.png', '1h6pIONuyW.png', 3027579, '1h6pIONuyW.png', 41, '2022-05-05 09:09:51', '2022-05-05 09:09:52'),
(46, 'MDy3AfjW5u.png', 'MDy3AfjW5u.png', 3027579, 'MDy3AfjW5u.png', 42, '2022-05-05 09:09:52', '2022-05-05 09:09:53'),
(47, 'jquB9y6Xgc.png', 'jquB9y6Xgc.png', 3027579, 'jquB9y6Xgc.png', 43, '2022-05-05 09:09:53', '2022-05-05 09:09:53'),
(48, '4x4AlUzNLl.png', '4x4AlUzNLl.png', 3027579, '4x4AlUzNLl.png', 44, '2022-05-05 09:09:54', '2022-05-05 09:09:54'),
(49, 'BzDkdIn7AG.png', 'BzDkdIn7AG.png', 3027579, 'BzDkdIn7AG.png', 45, '2022-05-05 09:09:55', '2022-05-05 09:09:55'),
(50, 'Vc77fIMIRP.png', 'Vc77fIMIRP.png', 3027579, 'Vc77fIMIRP.png', 46, '2022-05-05 09:09:56', '2022-05-05 09:09:56'),
(51, 'ZgTs8JQcbZ.png', 'ZgTs8JQcbZ.png', 3027579, 'ZgTs8JQcbZ.png', 47, '2022-05-05 09:09:57', '2022-05-05 09:09:57'),
(52, '9xZJUaB2er.png', '9xZJUaB2er.png', 3027579, '9xZJUaB2er.png', 48, '2022-05-05 09:09:58', '2022-05-05 09:09:58'),
(53, 'fu9wGmGsGA.png', 'fu9wGmGsGA.png', 3027579, 'fu9wGmGsGA.png', 49, '2022-05-05 09:09:58', '2022-05-05 09:09:58'),
(54, 'efP1sa0G9k.png', 'efP1sa0G9k.png', 3027579, 'efP1sa0G9k.png', 50, '2022-05-05 09:09:59', '2022-05-05 09:09:59'),
(55, 'nWEj77fpU8.png', 'nWEj77fpU8.png', 3027579, 'nWEj77fpU8.png', 51, '2022-05-05 09:10:00', '2022-05-05 09:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(35, '2022_04_22_114138_create_setting_translations_table', 11),
(36, '2022_04_25_155953_create_carts_table', 12),
(38, '2022_04_27_171743_add_user_columns_table', 13),
(39, '2022_04_30_103455_create_orders_table', 14),
(40, '2022_04_30_104008_create_order_items_table', 15),
(41, '2022_05_01_151801_add_new_product_table', 16),
(42, '2022_05_03_141901_create_shops_table', 17),
(43, '2022_05_03_141918_create_shop_translations_table', 17),
(45, '2022_05_04_125744_add_column_order_tabled', 18),
(46, '2022_05_04_133929_update_column_order_tabled', 19),
(47, '2022_05_04_140127_add_column_shop_order_tabled', 20),
(48, '2022_05_05_150256_create_jobs_table', 21),
(49, '2022_05_05_163456_add_is_admin_user_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci,
  `user_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_delivery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_at` date DEFAULT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'shop',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_address`, `user_phone`, `cost`, `status`, `type_delivery`, `payment_at`, `promo_code`, `sale`, `payment_method`, `created_at`, `updated_at`, `shop_id`) VALUES
(1, NULL, 'Артышко Андрей', 'Россия Красноярск Горького 24.  660099', '+79029634366', 10000, 'cancel', 'in_shop', '2022-04-30', NULL, 0, 'shop', '2022-06-16 12:36:39', '2022-04-30 12:36:39', 1),
(2, NULL, 'Артышко Андрей', 'Россия Красноярск Горького 24.  660099', '+79029634366', 10000, 'delivered', 'in_shop', '2022-04-30', NULL, 0, 'shop', '2022-04-30 12:36:39', '2022-04-30 12:36:39', 1),
(4, NULL, 'Артышко Андрей Алексеевич', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 06:56:39', '2022-05-04 06:56:39', 2),
(5, NULL, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 06:57:46', '2022-05-04 06:57:46', 1),
(6, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 06:59:07', '2022-05-04 06:59:07', 2),
(7, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-02-01 07:05:05', '2022-05-04 07:05:05', 2),
(8, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 07:13:22', '2022-05-04 07:13:22', 2),
(9, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 07:34:17', '2022-05-04 07:34:17', 2),
(10, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 07:34:47', '2022-05-04 07:34:47', 2),
(11, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 07:35:40', '2022-05-04 07:35:40', 2),
(12, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 07:35:53', '2022-05-04 07:35:53', 2),
(13, 5, 'Андрей Артышко', NULL, '89029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-04 07:42:10', '2022-05-04 07:42:10', 2),
(14, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:15:56', '2022-05-05 01:15:56', 2),
(15, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:17:22', '2022-05-05 01:17:22', 2),
(16, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:19:10', '2022-05-05 01:19:10', 2),
(17, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:27:50', '2022-05-05 01:27:50', 2),
(18, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:28:22', '2022-05-05 01:28:22', 2),
(19, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:29:47', '2022-05-05 01:29:47', 2),
(20, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:35:07', '2022-05-05 01:35:07', 1),
(21, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:37:14', '2022-05-05 01:37:14', 2),
(22, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:52:53', '2022-05-05 01:52:53', 2),
(23, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:54:51', '2022-05-05 01:54:51', 2),
(24, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:58:23', '2022-05-05 01:58:23', 2),
(25, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 01:58:53', '2022-05-05 01:58:53', 2),
(26, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:00:54', '2022-05-05 02:00:54', 2),
(27, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:01:49', '2022-05-05 02:01:49', 2),
(28, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:08:22', '2022-05-05 02:08:22', 2),
(29, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:09:24', '2022-05-05 02:09:24', 2),
(30, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:10:27', '2022-05-05 02:10:27', 2),
(31, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:11:30', '2022-05-05 02:11:30', 2),
(32, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:12:35', '2022-05-05 02:12:35', 2),
(33, 5, 'Андрей Артышко', NULL, '+79029634366', 1000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:14:47', '2022-05-05 02:14:47', 2),
(34, 5, 'Андрей Артышко', NULL, '+79029634366', 200000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 02:18:12', '2022-05-05 02:18:12', 2),
(35, 5, 'Андрей Артышко', NULL, '+79029634366', 200000, 'prepare', 'in_shop', NULL, NULL, 0, 'shop', '2022-05-05 03:41:01', '2022-05-05 03:41:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `week` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `count`, `cost`, `new`, `week`, `created_at`, `updated_at`, `status_id`) VALUES
(38, 1, 0, 251820, 0, 0, '2022-05-05 09:09:49', '2022-05-05 09:09:49', 1),
(39, 1, 1, 737271, 0, 0, '2022-05-05 09:09:50', '2022-05-05 09:09:50', 1),
(40, 1, 2, 228666, 0, 0, '2022-05-05 09:09:51', '2022-05-05 09:09:51', 1),
(41, 1, 2, 596132, 0, 0, '2022-05-05 09:09:52', '2022-05-05 09:09:52', 1),
(42, 1, 2, 736485, 0, 0, '2022-05-05 09:09:53', '2022-05-05 09:09:53', 1),
(43, 1, 3, 560422, 0, 0, '2022-05-05 09:09:53', '2022-05-05 09:09:53', 1),
(44, 1, 2, 872282, 0, 0, '2022-05-05 09:09:54', '2022-05-05 09:09:54', 1),
(45, 1, 2, 184011, 0, 0, '2022-05-05 09:09:55', '2022-05-05 09:09:55', 1),
(46, 1, 0, 698893, 0, 0, '2022-05-05 09:09:56', '2022-05-05 09:09:56', 1),
(47, 1, 3, 387069, 0, 0, '2022-05-05 09:09:57', '2022-05-05 09:09:57', 1),
(48, 1, 1, 252897, 0, 0, '2022-05-05 09:09:58', '2022-05-05 09:09:58', 1),
(49, 1, 0, 270838, 0, 0, '2022-05-05 09:09:58', '2022-05-05 09:09:58', 1),
(50, 1, 0, 359292, 0, 0, '2022-05-05 09:09:59', '2022-05-05 09:09:59', 1),
(51, 1, 0, 466762, 0, 0, '2022-05-05 09:10:00', '2022-05-05 09:10:00', 1);

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
(75, 38, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(76, 38, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(77, 39, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(78, 39, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(79, 40, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(80, 40, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(81, 41, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(82, 41, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(83, 42, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(84, 42, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(85, 43, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(86, 43, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(87, 44, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(88, 44, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(89, 45, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(90, 45, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(91, 46, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(92, 46, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(93, 47, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(94, 47, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(95, 48, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(96, 48, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(97, 49, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(98, 49, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(99, 50, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(100, 50, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL),
(101, 51, 'ru', 'Винтажный черный тренч', 'Шёлковый платок Hermés,<br/>рисунок разработан художницей Annie Faivre. <br/>Размеры: 90*90 см.', NULL),
(102, 51, 'en', 'Vintage Black Trench Coat', 'Hermès silk handkerchief,<br/>drawing designed by artist Annie Faivre. <br/>Dimensions: 90*90 cm.', NULL);

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
(2, 'status_product', '2022-04-22 11:57:29', '2022-04-22 11:57:29'),
(3, 'yandex_metrics', NULL, NULL);

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
(4, 2, 'en', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 3, 'ru', '<!-- Yandex.Metrika counter --> <script type=\"text/javascript\" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, \"script\", \"https://mc.yandex.ru/metrika/tag.js\", \"ym\"); ym(88715592, \"init\", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src=\"https://mc.yandex.ru/watch/88715592\" style=\"position:absolute; left:-9999px;\" alt=\"\" /></div></noscript> <!-- /Yandex.Metrika counter -->');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `phone`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, '+7 (771) 466-14-65', 'Алматы', 'Казахстан', NULL, NULL),
(2, '+7 (902) 963-14-65', 'Красноярск', 'Россия', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_translations`
--

CREATE TABLE `shop_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_translations`
--

INSERT INTO `shop_translations` (`id`, `shop_id`, `locale`, `street`, `time`) VALUES
(1, 1, 'ru', 'ул. Уалиханова, 43. 2 этаж', 'пн-пт 12:00 - 20:30 сб-вс 10:00 - 18:30'),
(2, 1, 'en', 'ул. Уалиханова, 43. 2 этаж', 'пн-пт 12:00 - 20:30 сб-вс 10:00 - 18:30'),
(3, 2, 'ru', 'ул. Горького, 24. 9 этаж', 'пн-пт 12:00 - 20:30 сб-вс 10:00 - 18:30'),
(4, 2, 'en', 'ул. Gorkogo, 24. 2 этаж', 'пн-пт 12:00 - 20:30 сб-вс 10:00 - 18:30');

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
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `photo` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` text COLLATE utf8mb4_unicode_ci,
  `post_index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `photo`, `phone`, `country`, `city`, `street`, `post_index`, `notify`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Андрей Артышко', 'artyshko.andrey@gmail.com', 1, '1651728647.png', '+79029634366', 'Россия', 'Красноярск', 'Горького 24', '660099', 0, NULL, '$2y$10$P1JygnS1S4R/tESZ6aErFOrigopkmUpgp37eVIese2ovsarpRtoL6', 'cDfvERW6yOIg7fxZvBx1lWr73aPVKrQeqEazRbtOoHe7yusZBQfu6gPx90bC', '2022-05-04 06:59:05', '2022-05-05 01:15:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

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
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_translations`
--
ALTER TABLE `shop_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shop_translations_shop_id_locale_unique` (`shop_id`,`locale`),
  ADD KEY `shop_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_translations`
--
ALTER TABLE `shop_translations`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `shop_translations`
--
ALTER TABLE `shop_translations`
  ADD CONSTRAINT `shop_translations_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_translations`
--
ALTER TABLE `status_translations`
  ADD CONSTRAINT `status_translations_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

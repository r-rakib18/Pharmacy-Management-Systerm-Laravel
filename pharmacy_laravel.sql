-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 09:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Capsule', '2020-01-19 18:02:08', '2020-01-19 18:02:08'),
(3, 'Tablet', '2020-01-19 18:02:25', '2020-01-19 18:02:25'),
(4, 'Serup', '2020-01-19 18:02:33', '2020-01-19 18:02:33'),
(5, 'Injection', '2020-01-19 18:02:40', '2020-01-19 18:02:40'),
(7, 'Saline', '2020-02-05 02:22:49', '2020-02-05 02:22:49');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sample group', '2020-01-19 07:54:07', '2020-01-19 07:54:07'),
(6, 'Paracetamol', '2020-01-19 18:03:13', '2020-01-19 18:03:13'),
(7, 'Omeprazole', '2020-01-19 18:03:22', '2020-01-19 18:03:22'),
(8, 'Flupenthixol + Melitracen', '2020-01-19 18:03:33', '2020-01-19 18:03:33'),
(9, 'Prochloperazine Maleate', '2020-01-19 18:03:42', '2020-01-19 18:03:42'),
(10, 'Insulin (Human) N', '2020-01-19 18:11:33', '2020-01-19 18:11:33'),
(11, 'Calcium', '2020-02-05 02:26:10', '2020-02-05 02:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Acme Lab', '2020-01-19 07:54:29', '2020-01-19 07:54:29'),
(2, 'Reneta', '2020-01-19 08:04:40', '2020-02-05 02:29:29'),
(3, 'Incepta Pharmaceuticals Ltd.', '2020-01-19 18:06:27', '2020-01-19 18:06:27'),
(4, 'Ranks Pharmaceuticals Ltd.', '2020-01-19 18:07:08', '2020-01-19 18:07:08'),
(5, 'Opsonin Pharma Limited', '2020-01-19 18:08:04', '2020-01-19 18:08:04'),
(6, 'Apc Pharma Limited', '2020-01-19 18:08:30', '2020-01-19 18:08:30'),
(7, 'Popular Pharmaceuticals Ltd.', '2020-01-19 18:10:03', '2020-01-19 18:10:03'),
(8, 'EDLC (Dhaka)', '2020-01-19 18:30:23', '2020-01-19 18:30:23'),
(9, 'Square Pharmaceuticals Limited', '2020-01-19 18:59:16', '2020-01-19 18:59:16'),
(10, 'Beximco Pharmaceuticals Ltd.', '2020-02-01 01:04:07', '2020-02-01 01:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strength` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `group_id`, `category_id`, `medicine_name`, `generic_name`, `manufacturer_id`, `strength`, `unit_id`, `box_size`, `photo`, `created_at`, `updated_at`) VALUES
(6, '6', '3', 'Napa Extra', 'Napa Extra', '10', '565 mg', '5', '10', NULL, '2020-02-01 01:07:17', '2020-02-01 01:07:17'),
(7, '7', '2', 'Seclo', 'Seaprazole', '9', '20 mg', '5', '10', NULL, '2020-02-01 01:09:49', '2020-02-01 01:09:49'),
(115, '8', '3', 'jhy', 'hgfd', '2', '10', '3', '10', NULL, '2020-02-02 12:52:14', '2020-02-02 12:52:14'),
(117, '10', '5', 'MEtacard N', 'MEtacard N++', '8', '10', '1', '1', NULL, '2020-02-02 21:04:56', '2020-02-02 21:04:56'),
(118, '9', '5', 'we3r5tyhujiklo', 'kiujhytgfredsx', '7', '10', '10', '01', NULL, '2020-02-02 21:07:55', '2020-02-02 21:07:55'),
(121, '7', '5', 'sergel', 'asdf', '3', '435', '2', '34', NULL, '2020-02-03 10:17:30', '2020-02-03 10:17:30'),
(122, '11', '3', 'Calbo-D', 'Calcium Carbonate (Elemental) + Vitamin D', '9', '500 mg+200 IU', '9', '1', NULL, '2020-02-05 02:32:41', '2020-02-05 02:32:41'),
(123, '6', '3', 'Napa', 'cghjk', '8', '10mg', '5', '10', NULL, '2020-02-07 12:42:31', '2020-02-07 12:42:50'),
(124, '6', '3', 'wertyujlk;', 'rtk', '4', '10', '4', '12', NULL, '2020-02-07 12:42:31', '2020-02-07 12:42:31'),
(125, '1', '7', 'sdfg', 'jhgfds', '2', '10', '2', '10', NULL, '2020-02-14 03:57:37', '2020-02-14 03:57:37'),
(126, '1', '7', 'dfghj', 'qwert', '1', '44', '1', '10', NULL, '2020-02-14 03:57:37', '2020-02-14 03:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_sales`
--

CREATE TABLE `medicine_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `total_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_sales`
--

INSERT INTO `medicine_sales` (`id`, `medicine_id`, `unit_id`, `quantity`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, '6', '5', 30, 2, 60, '2020-02-08 08:36:01', '2020-02-08 08:36:01'),
(2, '7', '5', 5, 5, 25, '2020-02-08 08:36:01', '2020-02-08 08:36:01'),
(3, '6', '5', 30, 2, 60, '2020-02-08 08:37:13', '2020-02-08 08:37:13'),
(4, '7', '5', 5, 5, 25, '2020-02-08 08:37:13', '2020-02-08 08:37:13'),
(5, '121', '2', 50, 0.5, 25, '2020-02-08 08:37:13', '2020-02-08 08:37:13'),
(6, '6', '5', 1000, 2020, 2020000, '2020-02-09 01:25:12', '2020-02-09 01:25:12'),
(7, '6', '5', 23, 2, 46, '2020-02-13 03:43:45', '2020-02-13 03:43:45'),
(8, '6', '5', 12, 2, 24, '2020-02-13 03:46:24', '2020-02-13 03:46:24'),
(9, '6', '5', 14, 2, 28, '2020-02-13 03:46:37', '2020-02-13 03:46:37'),
(10, '7', '5', 5, 5, 25, '2020-02-13 03:46:54', '2020-02-13 03:46:54'),
(11, '7', '5', 4, 5, 20, '2020-02-13 03:47:06', '2020-02-13 03:47:06'),
(12, '122', '9', 4, 70, 280, '2020-02-13 03:47:42', '2020-02-13 03:47:42'),
(13, '117', '1', 4, 15, 60, '2020-02-13 03:47:42', '2020-02-13 03:47:42'),
(14, '122', '9', 5, 70, 350, '2020-02-13 03:48:07', '2020-02-13 03:48:07'),
(15, '117', '1', 4, 15, 60, '2020-02-13 03:48:07', '2020-02-13 03:48:07'),
(16, '115', '3', 10, 2, 20, '2020-02-14 04:04:29', '2020-02-14 04:04:29'),
(17, '6', '5', 10, 2, 20, '2020-02-14 09:13:10', '2020-02-14 09:13:10'),
(18, '7', '5', 10, 2, 20, '2020-02-14 09:13:10', '2020-02-14 09:13:10');

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
(4, '2020_01_15_204709_create_categories_table', 1),
(5, '2020_01_16_141635_create_groups_table', 1),
(6, '2020_01_16_221656_create_manufacturers_table', 1),
(10, '2020_01_19_214234_create_units_table', 2),
(12, '2020_01_17_214731_create_medicines_table', 3),
(13, '2020_01_19_233130_alter_add_column_in_medicines', 3),
(14, '2020_01_20_180313_create_purchase_master_table', 4),
(15, '2020_01_20_180357_create_purchase_details_table', 4),
(16, '2020_01_21_220548_create_medicine_sales_table', 5),
(17, '2020_02_08_133145_create_stock_transactions_table', 6);

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
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_master_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `batch` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `manufacture_price` double NOT NULL,
  `retail_price` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_master_id`, `medicine_id`, `batch`, `expire_date`, `unit_id`, `quantity`, `manufacture_price`, `retail_price`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'MN0011', '2021-09-15', 5, 50, 500, 400, 20000, '2020-02-01 01:16:29', '2020-02-01 01:16:29'),
(2, 1, 6, 'MN0011', '2021-11-24', 5, 500, 1000, 800, 80000, '2020-02-01 01:16:29', '2020-02-01 01:16:29'),
(3, 2, 7, '2232', '2020-02-18', 5, 34, 44, 46, 1564, '2020-02-01 01:17:35', '2020-02-01 01:17:35'),
(4, 3, 5, '709222', '2020-02-27', 5, 10, 10, 10, 100, '2020-02-02 03:13:04', '2020-02-02 03:13:04'),
(5, 4, 82, 'sdfghjrtyu', '2020-02-12', 3, 10, 0, 120, 1200, '2020-02-03 00:48:37', '2020-02-03 00:48:37'),
(6, 4, 117, 'tyui', '2020-02-27', 1, 10, 10, 10, 100, '2020-02-03 00:48:37', '2020-02-03 00:48:37'),
(7, 4, 82, '20', '2020-02-12', 3, 410, 410, 10, 4100, '2020-02-03 00:48:37', '2020-02-03 00:48:37'),
(8, 5, 106, '10', '2020-02-04', 4, 23, 10, 13, 299, '2020-02-03 03:24:28', '2020-02-03 03:24:28'),
(9, 5, 111, '410', '2020-02-05', 4, 10, 10, 12, 120, '2020-02-03 03:24:28', '2020-02-03 03:24:28'),
(10, 5, 111, '20', '2020-02-08', 4, 10, 10, 14, 140, '2020-02-03 03:24:28', '2020-02-03 03:24:28'),
(11, 6, 121, '234', '2020-02-19', 2, 100, 43, 3, 102, '2020-02-08 07:16:56', '2020-02-08 07:16:56'),
(12, 7, 121, '234', '2020-02-28', 2, 500, 2, 3, 1500, '2020-02-08 09:00:27', '2020-02-08 09:00:27'),
(13, 8, 7, '123', '2021-11-24', 5, 100, 4.5, 5.2, 520, '2020-02-09 03:03:45', '2020-02-09 03:03:45'),
(14, 8, 122, '123', '2022-12-25', 9, 10, 600, 760, 7600, '2020-02-09 03:03:45', '2020-02-09 03:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `manufacturer_id`, `purchase_date`, `invoice_no`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 10, '2020-02-01', 12346, '1', '2020-02-01 01:16:29', '2020-02-01 01:16:29'),
(2, 9, '2020-02-21', 12355, '1', '2020-02-01 01:17:35', '2020-02-01 01:17:35'),
(3, 10, '2020-02-28', 789654, '2', '2020-02-02 03:13:04', '2020-02-02 03:13:04'),
(4, 8, '2020-02-18', 852, '2', '2020-02-03 00:48:36', '2020-02-03 00:48:36'),
(5, 4, '2020-02-13', 475263, '2', '2020-02-03 03:24:28', '2020-02-03 03:24:28'),
(6, 3, '2020-02-22', 3422, '1', '2020-02-08 07:16:56', '2020-02-08 07:16:56'),
(7, 3, '2020-02-28', 234, '1', '2020-02-08 09:00:27', '2020-02-08 09:00:27'),
(8, 9, '2019-12-26', 410, '1', '2020-02-09 03:03:45', '2020-02-09 03:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

CREATE TABLE `stock_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED DEFAULT NULL,
  `medicine_id` int(10) UNSIGNED DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `sale_qty` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `purchase_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_transactions`
--

INSERT INTO `stock_transactions` (`id`, `sale_id`, `medicine_id`, `stock`, `sale_qty`, `balance`, `purchase_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 500, 30, 470, NULL, '2020-02-08 08:36:01', '2020-02-08 08:36:01'),
(2, 2, 7, 34, 5, 29, NULL, '2020-02-08 08:36:01', '2020-02-08 08:36:01'),
(3, 3, 6, 470, 30, 440, NULL, '2020-02-08 08:37:13', '2020-02-08 08:37:13'),
(4, 4, 7, 29, 5, 24, NULL, '2020-02-08 08:37:13', '2020-02-08 08:37:13'),
(5, 5, 121, 100, 50, 550, NULL, '2020-02-08 08:37:13', '2020-02-08 09:00:27'),
(6, 6, 6, 440, 1000, -560, NULL, '2020-02-09 01:25:12', '2020-02-09 01:25:12'),
(7, 7, 6, -560, 23, -583, NULL, '2020-02-13 03:43:45', '2020-02-13 03:43:45'),
(8, 8, 6, -583, 12, -595, NULL, '2020-02-13 03:46:24', '2020-02-13 03:46:24'),
(9, 9, 6, -595, 14, -609, NULL, '2020-02-13 03:46:37', '2020-02-13 03:46:37'),
(10, 10, 7, 24, 5, 19, NULL, '2020-02-13 03:46:54', '2020-02-13 03:46:54'),
(11, 11, 7, 19, 4, 15, NULL, '2020-02-13 03:47:06', '2020-02-13 03:47:06'),
(12, 12, 122, 10, 4, 6, NULL, '2020-02-13 03:47:42', '2020-02-13 03:47:42'),
(13, 13, 117, 10, 4, 6, NULL, '2020-02-13 03:47:42', '2020-02-13 03:47:42'),
(14, 14, 122, 6, 5, 1, NULL, '2020-02-13 03:48:07', '2020-02-13 03:48:07'),
(15, 15, 117, 6, 4, 2, NULL, '2020-02-13 03:48:07', '2020-02-13 03:48:07'),
(16, 16, 115, 0, 10, -10, NULL, '2020-02-14 04:04:29', '2020-02-14 04:04:29'),
(17, 17, 6, -609, 10, -619, NULL, '2020-02-14 09:13:10', '2020-02-14 09:13:10'),
(18, 18, 7, 15, 10, 5, NULL, '2020-02-14 09:13:10', '2020-02-14 09:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1 *1', '2020-01-19 17:59:05', '2020-01-19 17:59:05'),
(2, '2 * 1', '2020-01-19 17:59:17', '2020-01-19 17:59:17'),
(3, '4 * 1', '2020-01-19 17:59:24', '2020-01-19 17:59:24'),
(4, '6 * 1', '2020-01-19 17:59:46', '2020-01-19 19:00:42'),
(5, '10 * 1', '2020-01-19 18:00:00', '2020-01-19 18:00:00'),
(6, '15 * 1', '2020-01-19 18:00:09', '2020-01-19 18:00:09'),
(7, '20 * 1', '2020-01-19 18:00:18', '2020-01-19 18:00:18'),
(8, '28 * 1', '2020-01-19 18:00:27', '2020-01-19 18:00:27'),
(9, '30 * 1', '2020-01-19 18:00:35', '2020-01-19 18:00:35'),
(10, '40* 1', '2020-01-19 18:00:43', '2020-01-19 18:00:43'),
(11, '100 * 1', '2020-02-07 12:43:09', '2020-02-07 12:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'admin@pms.com', '$2y$10$9W08eYw5rL06rY4w9d.4FuB2cM23uxqKFz0rINFBGgA0FzURljSWy', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_sales`
--
ALTER TABLE `medicine_sales`
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
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `medicine_sales`
--
ALTER TABLE `medicine_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

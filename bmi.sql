-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 07:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmi`
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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `reference`, `supplier_id`, `note`, `created_at`, `updated_at`) VALUES
(14, 'OLL-1467246549822', 17, NULL, '2021-03-16 16:13:21', '2021-03-16 16:13:21');

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
(4, '2021_02_18_040905_create_fruits_table', 1),
(5, '2021_02_25_030043_create_invoices_table', 1),
(6, '2021_02_25_030749_create_warehouses_table', 1),
(7, '2021_02_25_033121_create_suppliers_table', 1),
(8, '2021_02_25_034548_create_structure_categories_table', 1),
(9, '2021_02_25_040609_create_unit_measures_table', 1),
(10, '2021_02_25_041100_create_product_categories_table', 1),
(11, '2021_02_25_041946_create_raws_table', 1),
(12, '2021_02_25_060952_create_permission_tables', 1),
(15, '2021_02_27_064301_add_column_to_invoices_table', 2),
(16, '2021_02_28_164917_add_warehouse_id_to_users_table', 3),
(17, '2021_03_03_032000_create_records_table', 4),
(18, '2021_03_03_182152_add_warehouse_id_to_records_table', 5),
(19, '2021_03_03_201150_add_foreign_id_to_records_table', 6),
(20, '2021_03_05_094343_create_sawmillstocks_table', 7),
(21, '2021_03_05_151614_add_nop_virtual_to_sawmillstocks_table', 8),
(22, '2021_03_07_051257_add_foreign_to_sawmillstocks_table', 9),
(27, '2021_03_07_114025_create_types_table', 10),
(31, '2021_03_07_170030_create_sawmillruns_table', 11),
(32, '2021_03_07_211608_create_stocks_table', 11),
(33, '2021_03_08_215511_add_processed_to_sawmillstocks_table', 12),
(34, '2021_03_10_101237_add_amount_to_raws_table', 13),
(35, '2021_03_12_205357_add_status_to_stocks_table', 14),
(36, '2021_03_13_022304_create_stockprofiles_table', 15),
(37, '2021_03_13_022740_add_stockprofile_id_to_stocks_table', 15),
(38, '2021_03_17_000842_add_length_to_raws_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 11),
(6, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin packing', 'web', '2021-03-16 23:49:55', '2021-03-16 23:49:55'),
(2, 'admin sawmill', 'web', '2021-03-17 14:23:12', '2021-03-17 14:23:12'),
(3, 'admin pembahanan basah', 'web', '2021-03-17 14:23:19', '2021-03-17 14:23:19'),
(4, 'admin pembahanan kering', 'web', '2021-03-17 14:23:25', '2021-03-17 14:23:25'),
(5, 'admin joint', 'web', '2021-03-17 14:23:30', '2021-03-17 14:23:30'),
(6, 'admin coating', 'web', '2021-03-17 14:23:35', '2021-03-17 14:23:35'),
(7, 'admin bahan-baku', 'web', '2021-03-17 14:23:40', '2021-03-17 14:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `raws`
--

CREATE TABLE `raws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '''NULL''',
  `structure_category_id` bigint(20) UNSIGNED NOT NULL,
  `size` double UNSIGNED NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL,
  `length` double NOT NULL,
  `uom` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nop` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raws`
--

INSERT INTO `raws` (`id`, `series`, `structure_category_id`, `size`, `width`, `height`, `length`, `uom`, `nop`, `amount`, `status`, `invoice_id`, `created_at`, `updated_at`) VALUES
(37, 'TRM-8509', 3, 12, 230, 21, 4, 'm3', '1', '21', 'partially finished', 14, '2021-03-16 16:13:31', '2021-03-16 17:31:16'),
(38, 'JT-8510', 1, 8, 2, 2, 2, 'm3', '2', '23', 'partially finished', 14, '2021-03-16 17:22:34', '2021-03-16 22:31:06'),
(39, 'TRM-8511', 3, 300390, 34, 95, 93, 'm3', '49', '49', 'unprocessed', 14, '2021-03-17 03:54:43', '2021-03-17 15:50:11'),
(40, 'BKR-8512', 6, 1195057, 233, 23, 223, 'm3', '2', '6', 'partially finished', 14, '2021-03-17 03:55:39', '2021-03-17 03:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tally` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nop` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` smallint(6) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_status` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `confirm_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `series`, `tally`, `origin`, `warehouse_id`, `nop`, `unit`, `status`, `confirm_status`, `confirm_at`, `created_at`, `updated_at`) VALUES
(175, 'TRM-8509', NULL, 5, 1, '20', 20, 'processing all', 'revision confirmed', '2021-03-16 17:27:53', '2021-03-16 17:06:35', '2021-03-16 17:31:11'),
(176, 'JT-8510', NULL, 5, 1, '21', 21, 'processing all', 'revision confirmed', '2021-03-16 17:30:36', '2021-03-16 17:30:29', '2021-03-16 17:31:08'),
(177, 'BKR-8512', NULL, 5, 1, '4', 4, 'processing all', 'revision confirmed', '2021-03-17 03:57:53', '2021-03-17 03:56:18', '2021-03-17 03:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'super_admin', 'web', '2021-03-16 22:03:55', '2021-03-16 22:03:55'),
(3, 'admin', 'web', '2021-03-16 23:18:09', '2021-03-16 23:18:09'),
(4, 'admin_packing', 'web', '2021-03-16 23:21:07', '2021-03-16 23:21:07'),
(5, 'admin_bahanbaku', 'web', '2021-03-16 23:21:23', '2021-03-16 23:21:23'),
(6, 'admin_sawmill', 'web', '2021-03-16 23:22:02', '2021-03-16 23:22:02'),
(7, 'admin_p_basah', 'web', '2021-03-16 23:22:11', '2021-03-16 23:22:11'),
(8, 'admin_p_kering', 'web', '2021-03-16 23:22:16', '2021-03-16 23:22:16'),
(9, 'admin_coating', 'web', '2021-03-16 23:22:27', '2021-03-16 23:22:27'),
(10, 'admin_joint', 'web', '2021-03-16 23:22:32', '2021-03-16 23:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sawmillruns`
--

CREATE TABLE `sawmillruns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sawmillstock_id` bigint(20) UNSIGNED NOT NULL,
  `nop` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sawmillruns`
--

INSERT INTO `sawmillruns` (`id`, `sawmillstock_id`, `nop`, `status`, `created_at`, `updated_at`) VALUES
(38, 40, '21', 'finished', '2021-03-16 17:31:08', '2021-03-16 17:31:19'),
(39, 39, '20', 'finished', '2021-03-16 17:31:10', '2021-03-16 17:31:16'),
(40, 41, '4', 'finished', '2021-03-17 03:59:07', '2021-03-17 03:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `sawmillstocks`
--

CREATE TABLE `sawmillstocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nop` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nop_virtual` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sawmillstocks`
--

INSERT INTO `sawmillstocks` (`id`, `series`, `nop`, `nop_virtual`, `processed`, `created_at`, `updated_at`) VALUES
(39, 'TRM-8509', '0', '0', '20', '2021-03-16 17:27:53', '2021-03-16 17:31:11'),
(40, 'JT-8510', '0', '0', '21', '2021-03-16 17:30:36', '2021-03-16 17:31:08'),
(41, 'BKR-8512', '0', '0', '4', '2021-03-17 03:57:53', '2021-03-17 03:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `stockprofiles`
--

CREATE TABLE `stockprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` double NOT NULL,
  `length` double NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockprofiles`
--

INSERT INTO `stockprofiles` (`id`, `size`, `length`, `width`, `height`, `created_at`, `updated_at`) VALUES
(26, 950, 10, 19, 5, '2021-03-17 04:03:18', '2021-03-17 04:03:18'),
(27, 1584, 12, 12, 11, '2021-03-17 04:05:17', '2021-03-17 04:06:33'),
(28, 1000000, 100, 100, 100, '2021-03-17 04:12:08', '2021-03-17 04:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockprofile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tally` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double NOT NULL,
  `height` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `length` double DEFAULT NULL,
  `confirm_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `sawmillrun_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `unit_measure_id` bigint(20) UNSIGNED NOT NULL,
  `origin` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `stockprofile_id`, `tally`, `size`, `height`, `width`, `length`, `confirm_status`, `status`, `sawmillrun_id`, `type_id`, `unit_measure_id`, `origin`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(80, 'TRM BB JOINT', NULL, 'IR13237', 1728, 12, 12, 12, NULL, NULL, 39, 3, 1, 1, 1, '2021-03-16 17:31:28', '2021-03-16 17:31:28'),
(81, 'JT BB RST', NULL, 'IR13238', 1728, 12, 12, 12, NULL, NULL, 38, 4, 1, 1, 1, '2021-03-16 17:31:37', '2021-03-16 17:31:37'),
(82, 'BNGKR BB RST MD COATED', 26, 'IR13239', 5796, 23, 21, 12, 'confirmed', 'finished on BMI-E', 40, 4, 1, 2, 13, '2021-03-17 03:59:57', '2021-03-17 04:04:32'),
(83, 'BNGKR BB JOINT KD HF', 27, 'IR13240', 1728, 12, 12, 12, 'confirmed', 'finished on BMI-F', 40, 3, 1, 3, 4, '2021-03-17 04:00:10', '2021-03-17 04:14:53'),
(84, 'BNGKR BB SQUARE KD', 28, 'IR13241', 1, 1, 1, 1, 'confirmed', 'finished on BMI-DB', 40, 5, 1, 1, 3, '2021-03-17 04:11:01', '2021-03-17 04:12:08'),
(85, 'BNGKR BB RST', NULL, 'IR13242', 23552, 32, 32, 23, 'unconfirmed', 'moving to GUDANG P BASAH', 40, 4, 1, 1, 2, '2021-03-17 05:37:53', '2021-03-17 11:16:03'),
(86, 'BNGKR BB RST', NULL, 'IR13243', 0, 0.004, 0.003, 0.003, 'unconfirmed', 'moving to GUDANG P BASAH', 40, 4, 1, 1, 2, '2021-03-17 11:16:25', '2021-03-17 11:16:34'),
(87, 'BNGKR BB RST', NULL, 'IR13244', 12167, 23, 23, 23, 'unconfirmed', 'moving to GUDANG P BASAH', 40, 4, 1, 1, 2, '2021-03-17 11:17:03', '2021-03-17 11:17:09'),
(88, 'BNGKR BB RST', NULL, 'IR13245', 3024, 12, 21, 12, NULL, NULL, 40, 4, 1, 1, 1, '2021-03-17 11:17:47', '2021-03-17 11:17:47'),
(89, 'BNGKR BB JOINT', NULL, 'IR13246', 1728, 12, 12, 12, NULL, NULL, 40, 3, 1, 1, 1, '2021-03-17 18:26:42', '2021-03-17 18:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `structure_categories`
--

CREATE TABLE `structure_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `structure_categories`
--

INSERT INTO `structure_categories` (`id`, `name`, `shortname`, `created_at`, `updated_at`) VALUES
(1, 'KUKU', 'KK', '2021-02-25 07:53:59', '2021-02-25 07:53:59'),
(2, 'MERBAU', 'MRB', '2021-02-25 07:53:59', '2021-02-25 07:53:59'),
(3, 'TOREM', 'TRM', '2021-02-25 07:53:59', '2021-02-25 07:53:59'),
(4, 'JATI', 'JT', '2021-02-25 07:53:59', '2021-02-25 07:53:59'),
(5, 'MAHONI', 'MHN', '2021-02-25 07:53:59', '2021-02-25 07:53:59'),
(6, 'BENGKIRAI', 'BKR', '2021-02-25 07:53:59', '2021-02-25 07:53:59'),
(9, 'SEMBARANG', 'SMBRNG', '2021-02-28 07:36:14', '2021-02-28 07:36:14'),
(12, 'SUNGKAI', 'SNGK', '2021-03-09 18:32:01', '2021-03-09 18:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `shortname`, `address`, `owner`, `email`, `website`, `phone`, `created_at`, `updated_at`, `mobile`) VALUES
(17, 'OCCAECAT LABORE LABO', 'OLL', 'Non rem quidem rerum', 'Sunt iste esse sint', 'hyhisyqyvy@mailinator.com', 'https://www.domubekureqapy.cc', 1913408338, '2021-03-16 16:13:17', '2021-03-16 16:13:17', 12312312312);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'JOINT', 'BB JOINT', '2021-03-11 03:47:45', '2021-03-11 03:47:45'),
(4, 'RST', 'RST', '2021-03-11 03:47:45', '2021-03-11 03:47:45'),
(5, 'SQUARE', 'SQUARE', '2021-03-11 03:47:45', '2021-03-11 03:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `unit_measures`
--

CREATE TABLE `unit_measures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uom` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_measures`
--

INSERT INTO `unit_measures` (`id`, `uom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'm3', 'panjang kali lebar kali tinggi', '2021-02-25 07:55:22', '2021-02-25 07:55:22'),
(2, 'm2', 'panjang kali lebar', '2021-02-25 07:55:22', '2021-02-25 07:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` int(10) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `warehouse_id`) VALUES
(1, 'adminpacking', 'adminpacking@gmail.com', 'sembarang', 1231425, NULL, '$2y$10$/ZsjFsKmYj9FDVmCZD9Voe/mOouO7O8eZrGpQWqhSys7oGpa.nnca', NULL, '2021-03-16 23:55:42', '2021-03-16 23:55:42', 2),
(2, 'superadmin', 'superadmin@gmail.com', 'yes', 89232, NULL, '$2y$10$/ZsjFsKmYj9FDVmCZD9Voe/mOouO7O8eZrGpQWqhSys7oGpa.nnca', NULL, '2021-03-16 23:55:42', '2021-03-16 23:55:42', NULL),
(7, 'adminsawmill', 'adminsawmill@gmail.com', 'terserah', 821332423, NULL, '$2y$10$Hv3US1RDY52LsTEt99xfMeDb.EcT5ZLSuw5aV6aNNIG9KbIqWSNta', NULL, '2021-03-17 14:41:17', '2021-03-17 14:41:17', NULL),
(8, 'adminbahanbaku', 'adminbahanbaku@gmail.com', 'terserah', 2313123123, NULL, '$2y$10$GDVDP//TMilsHubPh151duHxn0/FJ69LlPBiuGGQ5NxUpbxHoEhNO', NULL, '2021-03-17 14:44:55', '2021-03-17 14:44:55', NULL),
(9, 'admin pembahanan basah', 'admin_p_basah@gmail.com', 'terserah', 1231231231, NULL, '$2y$10$LC9moPrLyKae4ddLMUv8l.d5JrE8oSkQsvTgBD.H7xz3kj0TAyf5y', NULL, '2021-03-17 14:46:14', '2021-03-17 14:46:14', NULL),
(10, 'admin pembahanan kering', 'admin_p_kering@gmail.com', 'terserah', 8123123, NULL, '$2y$10$fxK4ui1pcWFkf9rGHZPV8.YFW33wDvXSQvgBy9kQxWCD0aU8Bs4Su', NULL, '2021-03-17 14:47:19', '2021-03-17 14:47:19', NULL),
(11, 'admin joint', 'adminjoint@gmail.com', 'terserah', 123123123, NULL, '$2y$10$WBXbExun1ird93tKerW1L.mHe7BJrISY08eMzM3LZTDyT.bwzg.gm', NULL, '2021-03-17 14:51:13', '2021-03-17 14:51:13', NULL),
(12, 'admin coating', 'admincoating@gmail.com', 'terserah', 2131363442, NULL, '$2y$10$aJp4U.BZNUvJ3E2Anik2nOKlLP0lLjlEyPt2oOG5qGufm.64kYOlu', NULL, '2021-03-17 14:51:49', '2021-03-17 16:05:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `shortname`, `capacity`, `address`, `created_at`, `updated_at`) VALUES
(1, 'GUDANG SAWMILL', 'BMI-B', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-02-25 07:49:27', '2021-02-25 07:49:27'),
(2, 'GUDANG P BASAH', 'BMI-D', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-02-25 07:49:27', '2021-02-25 07:49:27'),
(3, 'GUDANG P KERING', 'BMI-DB', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-02-25 07:49:27', '2021-02-25 07:49:27'),
(4, 'GUDANG JOINT', 'BMI-F', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-02-25 07:49:27', '2021-02-25 07:49:27'),
(5, 'GUDANG BAHAN BAKU', 'BMI-A', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-02-25 14:11:51', '2021-02-25 14:11:51'),
(13, 'GUDANG COATING', 'BMI-E', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-03-13 05:29:33', '2021-03-13 05:29:33'),
(14, 'GUDANG PACKING', 'BMI-G', NULL, 'PT. BINA MEGAH INDOWOOD', '2021-03-13 15:59:05', '2021-03-13 15:59:05');

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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_ref_unique` (`reference`),
  ADD KEY `invoices_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `raws`
--
ALTER TABLE `raws`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `raws_reference_unique` (`series`),
  ADD KEY `raws_structure_category_id_foreign` (`structure_category_id`),
  ADD KEY `raws_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `records_tally_unique` (`tally`),
  ADD KEY `records_origin_foreign` (`origin`),
  ADD KEY `records_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `records_series_foreign` (`series`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sawmillruns`
--
ALTER TABLE `sawmillruns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sawmillruns_sawmillstock_id_foreign` (`sawmillstock_id`);

--
-- Indexes for table `sawmillstocks`
--
ALTER TABLE `sawmillstocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sawmillstocks_series_unique` (`series`);

--
-- Indexes for table `stockprofiles`
--
ALTER TABLE `stockprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stocks_tally_unique` (`tally`),
  ADD KEY `stocks_sawmillrun_id_foreign` (`sawmillrun_id`),
  ADD KEY `stocks_type_id_foreign` (`type_id`),
  ADD KEY `stocks_unit_measure_id_foreign` (`unit_measure_id`),
  ADD KEY `stocks_origin_foreign` (`origin`),
  ADD KEY `stocks_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `stocks_stockprofile_id_foreign` (`stockprofile_id`);

--
-- Indexes for table `structure_categories`
--
ALTER TABLE `structure_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `structure_categories_shortname_unique` (`shortname`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_shortname_unique` (`shortname`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_measures`
--
ALTER TABLE `unit_measures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_measures_uom_unique` (`uom`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_warehouse_id_foreign` (`warehouse_id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warehouses_shortname_unique` (`shortname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `raws`
--
ALTER TABLE `raws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sawmillruns`
--
ALTER TABLE `sawmillruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sawmillstocks`
--
ALTER TABLE `sawmillstocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `stockprofiles`
--
ALTER TABLE `stockprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `structure_categories`
--
ALTER TABLE `structure_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_measures`
--
ALTER TABLE `unit_measures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

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
-- Constraints for table `raws`
--
ALTER TABLE `raws`
  ADD CONSTRAINT `raws_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `raws_structure_category_id_foreign` FOREIGN KEY (`structure_category_id`) REFERENCES `structure_categories` (`id`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_origin_foreign` FOREIGN KEY (`origin`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `records_series_foreign` FOREIGN KEY (`series`) REFERENCES `raws` (`series`),
  ADD CONSTRAINT `records_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sawmillruns`
--
ALTER TABLE `sawmillruns`
  ADD CONSTRAINT `sawmillruns_sawmillstock_id_foreign` FOREIGN KEY (`sawmillstock_id`) REFERENCES `sawmillstocks` (`id`);

--
-- Constraints for table `sawmillstocks`
--
ALTER TABLE `sawmillstocks`
  ADD CONSTRAINT `sawmillstocks_ibfk_1` FOREIGN KEY (`series`) REFERENCES `raws` (`series`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_origin_foreign` FOREIGN KEY (`origin`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `stocks_sawmillrun_id_foreign` FOREIGN KEY (`sawmillrun_id`) REFERENCES `sawmillruns` (`id`),
  ADD CONSTRAINT `stocks_stockprofile_id_foreign` FOREIGN KEY (`stockprofile_id`) REFERENCES `stockprofiles` (`id`),
  ADD CONSTRAINT `stocks_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `stocks_unit_measure_id_foreign` FOREIGN KEY (`unit_measure_id`) REFERENCES `unit_measures` (`id`),
  ADD CONSTRAINT `stocks_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

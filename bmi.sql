-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 08:09 AM
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
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varian` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_found` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `name`, `varian`, `latin_name`, `origin`, `year_found`, `created_at`, `updated_at`) VALUES
(1, 'Keelie Gallagher', 'Sit est aperia', 'Rhona Guthrie', 'Vitae autem sun', 6969, '2021-02-25 06:59:02', '2021-03-06 07:33:02'),
(2, 'Holmes Sanford', 'Veniam quis ma', 'Susan Mckee', 'Odit tempor exe', 2005, '2021-02-25 07:00:21', '2021-02-25 07:00:21'),
(3, 'Isaiah Warren', 'In sapiente rec', 'Alexander Medina', 'Beatae explicab', 2003, '2021-02-25 07:00:26', '2021-02-25 07:00:26'),
(4, 'Oprah Beck', 'Anim dolor sed', 'Tyler Raymond', 'Ratione qui sit', 1978, '2021-02-27 09:57:02', '2021-02-27 09:57:02'),
(5, 'Jameson Castillo', 'Ut modi adipisc', 'Justine Mcleod', 'Quaerat exercit', 2003, '2021-02-27 10:08:48', '2021-02-27 10:08:48'),
(6, 'asd', 'asdasd', 'asdasd', 'asdasd', 2342, '2021-02-27 10:09:45', '2021-02-27 10:09:45'),
(7, 'asdasd', 'asdasd', 'asdasdasd', 'asdasd', 3422, '2021-02-27 10:11:10', '2021-02-27 10:11:10'),
(8, 'asd', 'asdasd', 'asdasd', 'asdasd', 2132, '2021-02-27 10:12:09', '2021-02-27 10:12:09'),
(9, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1231, '2021-02-27 10:12:22', '2021-02-27 10:12:22'),
(10, 'Avye Mayer', 'Necessitatibus', 'Channing Hudson', 'Corrupti quae', 2008, '2021-02-27 10:12:46', '2021-02-27 10:12:46'),
(11, 'Dale Brown', 'Quis nemo sunt', 'Duncan Mcdaniel', 'Ut deserunt vol', 1986, '2021-02-27 10:12:57', '2021-02-27 10:12:57'),
(12, 'Stewart Burch', 'Voluptate volup', 'Macaulay Nieves', 'Excepturi eum a', 1986, '2021-02-27 10:15:15', '2021-02-27 10:15:15'),
(13, 'Dacey Rich', 'Expedita iusto', 'Rana Pacheco', 'Sed officiis as', 1985, '2021-02-27 10:17:08', '2021-02-27 10:17:08'),
(14, 'Brady Hahn', 'Iste sed et min', 'Reece Pacheco', 'In illo rem est', 1997, '2021-02-27 10:17:31', '2021-02-27 10:17:31'),
(15, 'Rama Beard', 'Fuga Tenetur a', 'Hiram Nash', 'Ut quae modi po', 2002, '2021-02-27 10:17:59', '2021-02-27 10:17:59'),
(16, 'Zachary Snyder', 'Duis ipsum eum', 'Colin Rodgers', 'Sunt repellendu', 1977, '2021-02-27 10:18:39', '2021-02-27 10:18:39'),
(17, 'Colby Salazar', 'Unde architecto', 'Stacey Stone', 'Corporis est s', 2002, '2021-02-27 10:19:33', '2021-02-27 10:19:33'),
(18, 'Arthur Stuart', 'Qui eaque omnis', 'Melodie Oneil', 'Nulla voluptatu', 2006, '2021-02-27 10:20:44', '2021-02-27 10:20:44');

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
(1, '4294967295', 2, '', '2021-02-25 07:58:49', '2021-02-25 07:58:49'),
(2, '123123', 1, '', '2021-02-25 07:58:49', '2021-02-25 07:58:49'),
(3, '234234234', 1, '', '2021-02-25 07:58:49', '2021-02-25 07:58:49'),
(4, '21445745', 2, '', '2021-02-25 07:58:49', '2021-02-25 07:58:49'),
(7, 'PTGR-14679', 2, 'asdasd453dfsdfs', '2021-02-28 10:54:29', '2021-02-28 10:54:29'),
(8, 'PTGR-1467246549816', 2, 'Tesyooo', '2021-03-01 05:19:10', '2021-03-01 05:19:10'),
(9, 'EDF-1467246549817', 6, NULL, '2021-03-06 06:52:44', '2021-03-06 06:52:44'),
(10, 'CNm-1467246549818', 3, 'ini penambahan', '2021-03-06 07:28:47', '2021-03-06 07:28:47'),
(11, 'PNM-1467246549819', 16, 'Terserah', '2021-03-09 18:36:25', '2021-03-09 18:36:25');

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
(37, '2021_03_13_022740_add_stockprofile_id_to_stocks_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `shortname`, `created_at`, `updated_at`) VALUES
(1, 'BAHAN BAKU', 'BB', '2021-02-25 07:57:52', '2021-02-25 07:57:52'),
(2, 'BAHAN BAKU FJL', 'BB-FJL', '2021-02-25 07:57:52', '2021-02-25 07:57:52'),
(3, 'BAHAN PEMBANTU', 'BP', '2021-02-25 07:57:52', '2021-02-25 07:57:52'),
(4, 'BAHAN SETENGAH JADI', 'BSJ', '2021-02-25 07:57:52', '2021-02-25 07:57:52'),
(5, 'BAHAN JADI', 'BJ', '2021-02-25 07:57:52', '2021-02-25 07:57:52'),
(6, 'BAHAN JADI FJL', 'BJ-FJL', '2021-02-25 07:57:52', '2021-02-25 07:57:52'),
(7, 'BAHAN SETENGAH JADI FJL', 'BSJ-FJL', '2021-02-25 07:57:52', '2021-02-25 07:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `raws`
--

CREATE TABLE `raws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '''NULL''',
  `structure_category_id` bigint(20) UNSIGNED NOT NULL,
  `size` double UNSIGNED NOT NULL,
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

INSERT INTO `raws` (`id`, `series`, `structure_category_id`, `size`, `uom`, `nop`, `amount`, `status`, `invoice_id`, `created_at`, `updated_at`) VALUES
(30, 'TRM-8502', 3, 9, 'm3', '0', '37', 'all finished', 7, '2021-03-12 08:21:03', '2021-03-12 08:31:24'),
(31, 'JT-8503', 4, 3, 'm3', '5', '10', 'partially finished', 11, '2021-03-12 17:57:54', '2021-03-12 20:38:13');

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
(145, 'TRM-8502', NULL, 5, 1, '7', NULL, 'processing all', 'confirmed', '2021-03-12 08:27:56', '2021-03-12 08:27:48', '2021-03-12 08:28:00'),
(146, 'TRM-8502', NULL, 5, 1, '29', NULL, 'processing all', 'confirmed', '2021-03-12 08:28:37', '2021-03-12 08:28:31', '2021-03-12 08:28:39'),
(147, 'TRM-8502', NULL, 5, 1, '1', 1, 'processing all', 'revision confirmed', '2021-03-12 08:30:17', '2021-03-12 08:30:02', '2021-03-12 08:31:19'),
(148, 'JT-8503', NULL, 5, 1, '5', NULL, 'processing all', 'confirmed', '2021-03-12 17:58:14', '2021-03-12 17:58:08', '2021-03-12 20:38:07');

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
(27, 32, '7', 'finished', '2021-03-12 08:27:59', '2021-03-12 08:28:14'),
(28, 32, '29', 'finished', '2021-03-12 08:28:39', '2021-03-12 08:29:15'),
(30, 32, '1', 'finished', '2021-03-12 08:31:19', '2021-03-12 08:31:24'),
(31, 33, '5', 'finished', '2021-03-12 20:38:07', '2021-03-12 20:38:13');

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
(32, 'TRM-8502', '0', '0', '37', '2021-03-12 08:27:56', '2021-03-12 08:31:19'),
(33, 'JT-8503', '0', '0', '5', '2021-03-12 17:58:14', '2021-03-12 20:38:07');

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
(7, 1728, 12, 12, 12, '2021-03-13 16:26:46', '2021-03-13 16:26:46'),
(8, 272, 2, 34, 4, '2021-03-13 16:29:13', '2021-03-13 16:29:13'),
(9, 9, 1, 3, 3, '2021-03-13 17:04:16', '2021-03-13 17:04:16'),
(10, 124488, 76, 91, 18, '2021-03-13 17:25:28', '2021-03-13 17:25:28'),
(11, 96048, 24, 87, 46, '2021-03-13 17:57:50', '2021-03-13 17:57:50'),
(12, 1728, 12, 12, 12, '2021-03-14 05:56:44', '2021-03-14 05:56:44');

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
(26, 'JT BB JOINT', 7, 'IR13183', 50715, 15, 69, 49, 'confirmed', 'finished on BMI-D', 31, 3, 1, 1, 2, '2021-03-13 16:20:55', '2021-03-13 16:28:36'),
(27, 'JT BB RST MD', 10, 'IR13184', 34914, 23, 46, 33, 'confirmed', 'finished on BMI-D', 27, 4, 1, 1, 2, '2021-03-13 16:25:39', '2021-03-13 17:27:34'),
(28, 'TRM BB SQUARE MD COATED', 9, 'IR13185', 4608, 12, 32, 12, 'unconfirmed', 'moving to GUDANG PACKING', 27, 5, 1, 13, 14, '2021-03-13 16:26:09', '2021-03-14 07:07:01'),
(29, 'TRM BB JOINT KD', 12, 'IR13186', 6, 1, 2, 3, 'confirmed', 'finished on BMI-DB', 28, 3, 1, 1, 3, '2021-03-13 17:29:36', '2021-03-14 05:56:44'),
(30, 'JT BB RST KD MD COATED', 11, 'IR13187', 69, 1, 23, 3, 'confirmed', 'finished on BMI-E', 31, 4, 1, 3, 13, '2021-03-13 17:29:56', '2021-03-14 06:58:07');

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
(8, 'EMBOWES', 'JOS', NULL, NULL),
(9, 'SEMBARANG', 'SMBRNG', '2021-02-28 07:36:14', '2021-02-28 07:36:14'),
(10, 'HERNU', 'HRN', '2021-03-06 06:51:25', '2021-03-06 06:51:25'),
(11, 'DONI', 'DN', '2021-03-06 07:26:31', '2021-03-06 07:26:31'),
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
(1, 'PT. VIRTUAL', 'PTVR', 'ALAMAT JALAN YANG DITEMPUH NO. 90', 'FREDERICH', NULL, NULL, NULL, '2021-02-25 07:52:06', '2021-02-25 07:52:06', NULL),
(2, 'PT. NGARANG2', 'PTGR', 'ALAMAT SEMBARANG', 'JOHN CHENA', NULL, NULL, NULL, '2021-02-25 07:52:06', '2021-02-25 07:52:06', NULL),
(3, 'CV. NUSANTARA MERDEKA', 'CNm', 'jalan. merbabu', 'sembarang', NULL, NULL, NULL, '2021-03-01 06:57:08', '2021-03-01 06:57:08', NULL),
(4, 'EXCEPTURI AUT ESSE D', 'Eaed', 'Voluptatum est aut', 'Velit minim pariatur', 'wubafihex@mailinator.com', 'https://www.ginis.ws', 3423445, '2021-03-01 06:59:27', '2021-03-01 06:59:27', NULL),
(5, 'QUIA DO UT EST QUO Q', 'QDUEQQ', 'Dolore labore corpor', 'Eum eligendi dolores', 'nurulyxovo@mailinator.com', 'https://www.pizutuvopiw.ca', 32423, '2021-03-01 07:01:04', '2021-03-01 07:01:04', NULL),
(6, 'EXCEPTEUR DESERUNT F', 'EDF', 'Cum quas voluptate p', 'Voluptatem odit perf', 'lacicu@mailinator.com', 'https://www.fudyxuxehehyna.tv', 232323, '2021-03-01 07:48:57', '2021-03-01 07:48:57', NULL),
(7, 'EST VELIT ANIMI EN', 'EVAE', 'Natus repellendus V', 'Voluptatem fugiat ex', 'xoje@mailinator.com', 'https://www.gyre.in', 1258322873, '2021-03-01 07:53:27', '2021-03-01 07:53:27', NULL),
(8, 'OCCAECAT SAPIENTE EL', 'OSE', 'Ut veniam nostrum a', 'Dolore molestias asp', 'qejafi@mailinator.com', 'https://www.sehy.net', 1479436879, '2021-03-01 07:54:40', '2021-03-01 07:54:40', NULL),
(9, 'sembarang', NULL, '34asdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'asdasd', NULL, 'asdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'QUIA AT DOLOREM DEBI', 'QADD', 'Cupiditate ad tempor', 'Quis velit corrupti', 'xudo@mailinator.com', 'https://www.vipatowacahuga.co.uk', 1552614385, '2021-03-01 08:07:02', '2021-03-01 08:07:02', 3444444444444),
(12, 'VOLUPTATEM SUNT MOD', 'VSM', 'Ut quis vitae sint e', 'Sed rerum rerum omni', 'tabi@mailinator.com', 'https://www.buv.co.uk', 1736209339, '2021-03-01 08:35:45', '2021-03-01 08:35:45', 3333413333333),
(13, 'AD PORRO QUISQUAM IN', 'APQI', 'Sit hic consectetur', 'Quasi recusandae Al', 'hyvihifygo@mailinator.com', 'https://www.fup.ca', 1753781222, '2021-03-01 08:35:56', '2021-03-01 08:35:56', 3534666666666),
(14, 'EAQUE AUT CONSECTETU', 'EAC', 'Qui modi reiciendis', 'Ipsum est numquam d', 'vupug@mailinator.com', 'https://www.lytejekus.me', 1462946793, '2021-03-01 08:36:05', '2021-03-01 08:36:05', 4666666666666),
(15, 'REPELLENDUS DOLORE', 'RD', 'Aut nulla aut deseru', 'Accusantium velit no', 'hyvi@mailinator.com', 'https://www.difotibiwen.ws', 1758493802, '2021-03-01 21:00:32', '2021-03-01 21:00:32', 2312321312313),
(16, 'PT. NUSANTARA MERDEKA', 'PNM', 'Jl. Raya Gubernur Sunandar No 6', 'Ad commodo omnis exe', 'dytakoq@mailinator.com', 'https://www.nen.mobi', 1638155651, '2021-03-09 18:35:02', '2021-03-09 18:35:02', 2323333333333);

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
(1, 'dumb', 'dumb@gmail.com', 'sembarang', 1231425, NULL, 'asdasd123', NULL, NULL, NULL, 2);

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
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_shortname_unique` (`shortname`);

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
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `raws`
--
ALTER TABLE `raws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sawmillruns`
--
ALTER TABLE `sawmillruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sawmillstocks`
--
ALTER TABLE `sawmillstocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stockprofiles`
--
ALTER TABLE `stockprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `structure_categories`
--
ALTER TABLE `structure_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 02:36 PM
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
-- Database: `siddharsh`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Panduit', 'panduit', '1778066518.jpg', NULL, 1, '2026-05-06 05:51:58', '2026-05-06 05:51:58', NULL);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Copper Systems', 'copper-systems', '1778066598.jpg', 1, '2026-05-06 05:53:18', '2026-05-06 05:53:18', NULL),
(2, 'Cabinets, Thermal Management, Racks and Enclosures', 'cabinets-thermal-management-racks-and-enclosures', '1778070165.jpg', 1, '2026-05-06 06:52:45', '2026-05-06 06:52:45', NULL),
(3, 'Fiber Optic Systems', 'fiber-optic-systems', '1778070235.jpg', 1, '2026-05-06 06:53:55', '2026-05-06 06:53:55', NULL),
(4, 'Grounding & Bonding', 'grounding-bonding', '1778070285.jpg', 1, '2026-05-06 06:54:45', '2026-05-06 06:54:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Enterprise/Data Center Copper Cable', 'enterprisedata-center-copper-cable', '1778066712.jpg', 1, '2026-05-06 05:55:12', '2026-05-06 05:55:12', NULL),
(2, 2, 3, 'Cabinet Accessories', 'cabinet-accessories', '1778070690.jpg', 1, '2026-05-06 07:01:30', '2026-05-06 07:01:30', NULL),
(3, 2, 3, 'Micro Data Centers', 'micro-data-centers', '1778070759.jpg', 1, '2026-05-06 07:02:39', '2026-05-06 07:02:39', NULL),
(4, 2, 4, 'Horizontal Cable Managers', 'horizontal-cable-managers', '1778070842.jpg', 1, '2026-05-06 07:04:02', '2026-05-06 07:04:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `product_id`, `name`, `email`, `phone`, `message`, `is_read`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Keaton Bruce', 'vijayraaz2621@gmail.com', '9797897969', 'I am interested in the Pan-Net® TX6000™ Category 6 U/UTP cable for an upcoming data center refresh. Could you please provide a formal quote for 15 rolls (305m each) in Blue? Additionally, I\'d like to confirm the lead time for delivery to our New Delhi office and if you provide the matching Panduit TX6™ PLUS Jack Modules.', 1, '2026-05-06 06:00:40', '2026-05-06 06:01:42', NULL),
(2, 1, 'Tad Oneal', 'ritikrasenia1234@gmail.com', '9789693456', 'I am interested in the Pan-Net® TX6000™ Category 6 U/UTP cable for an upcoming data center refresh. Could you please provide a formal quote for 15 rolls (305m each) in Blue? Additionally, I\'d like to confirm the lead time for delivery.', 0, '2026-05-06 06:04:14', '2026-05-06 06:04:14', NULL);

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
(4, '2026_05_05_075711_create_brands_table', 1),
(5, '2026_05_05_085340_create_categories_table', 2),
(6, '2026_05_05_085342_create_subcategories_table', 2),
(7, '2026_05_05_085344_create_products_table', 2),
(8, '2026_05_05_085345_create_product_images_table', 2),
(9, '2026_05_05_085347_add_profile_image_to_users_table', 2),
(10, '2026_05_05_090000_create_permission_tables', 3),
(11, '2026_05_05_114700_create_settings_table', 4),
(12, '2026_05_05_114705_add_soft_deletes_to_crud_tables', 4),
(13, '2026_05_05_114753_add_additional_fields_to_products_table', 5),
(14, '2026_05_06_052748_create_child_categories_table', 6),
(15, '2026_05_06_052749_add_child_category_id_to_products_table', 7),
(16, '2026_05_06_100302_create_enquiries_table', 8),
(17, '2026_05_06_101937_add_status_to_enquiries_table', 9),
(18, '2026_05_06_102017_add_extra_fields_to_settings_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(2, 'role-create', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(3, 'role-edit', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(4, 'role-delete', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(5, 'user-list', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(6, 'user-create', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(7, 'user-edit', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(8, 'user-delete', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(9, 'brand-list', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(10, 'brand-create', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(11, 'brand-edit', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(12, 'brand-delete', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(13, 'category-list', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(14, 'category-create', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(15, 'category-edit', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(16, 'category-delete', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(17, 'subcategory-list', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(18, 'subcategory-create', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(19, 'subcategory-edit', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(20, 'subcategory-delete', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(21, 'product-list', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(22, 'product-create', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(23, 'product-edit', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(24, 'product-delete', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` longtext DEFAULT NULL,
  `specifications` text DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `packaging` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `child_category_id`, `name`, `slug`, `thumbnail`, `short_description`, `full_description`, `specifications`, `featured`, `status`, `created_at`, `updated_at`, `deleted_at`, `tags`, `packaging`, `additional_info`) VALUES
(1, 1, 1, 1, 1, 'Pan-Net® TX6000™ Category 6 U/UTP Enhanced Copper Cable', 'pan-net-tx6000-category-6-uutp-enhanced-copper-cable', '1778066931_download (3).png', 'Enhanced electrical headroom performance provides our enhanced Cat 6 U/UTP copper cable margin above industry standards and exceptional performance for PoE++ applications.', NULL, '<h3><strong>Specifications</strong></h3><figure class=\"table\"><table><tbody><tr><td>Environment</td><td>Indoor</td></tr><tr><td>Performance Level</td><td>Category 6</td></tr><tr><td>Cable Construction</td><td>U/UTP</td></tr><tr><td>Flammability Rating</td><td>Plenum (CMP)</td></tr><tr><td>Copper Cable Flame Rating</td><td>Plenum (CMP)</td></tr><tr><td>LP Rating</td><td>LP (0.5A)</td></tr><tr><td>Jacket Material</td><td>Fluorinated Ethylene Propylene</td></tr><tr><td>Nominal Cable Outside Diameter (In.)</td><td>0.225</td></tr><tr><td>Nominal Cable Outside Diameter (mm)</td><td>5.7</td></tr><tr><td>Sub Brand</td><td>Pan-Net®</td></tr><tr><td>Number of Pairs</td><td>4</td></tr><tr><td>Conductor Material</td><td>Copper</td></tr><tr><td>Conductor Type</td><td>Solid</td></tr><tr><td>Overall Length (ft.)</td><td>1000</td></tr><tr><td>Overall Length (m)</td><td>305</td></tr><tr><td>Conductor Gauge</td><td>23 AWG</td></tr><tr><td>Conductor Gauge (mm)</td><td>0.57</td></tr><tr><td>Insulation Material</td><td>Polyolefin</td></tr><tr><td>Color</td><td>Blue</td></tr><tr><td>Packaging Type</td><td>Carton</td></tr><tr><td>Product Type</td><td>Bulk Copper Cable</td></tr><tr><td>Part Features</td><td>Copper Cable</td></tr></tbody></table></figure>', 1, 1, '2026-05-06 05:58:06', '2026-05-06 05:58:51', NULL, 'Copper Cable, Cat 6, 23 AWG, UTP, CMP, Blue', '<h3><strong>Packaging Detail</strong></h3><figure class=\"table\"><table><tbody><tr><td>UPC</td><td>61305686003</td></tr><tr><td>Std. Pkg. Qty.</td><td>1000</td></tr><tr><td>Std. Pkg. Volume (cf)</td><td>1.7315</td></tr><tr><td>Std. Ctn. Qty.</td><td>36000</td></tr><tr><td>Std. Ctn. Volume (cf)</td><td>62.3333</td></tr></tbody></table></figure>', '<p>NOTE: Not all resources are available in your language.</p><p>If product info is not displayed in your selected language, it will be coming. We will continue to improve the experience over time.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2026-05-05 06:02:52', '2026-05-05 06:02:52'),
(2, 'Staff', 'web', '2026-05-05 06:32:30', '2026-05-05 06:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(24, 1);

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
('7SlTNRcV0JE8SfIYuFpKYOQjtmFM6LHxsvGGcCvG', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQnkxRUdGdENsM0lXOGhOeWxQWWNaRjBMRnBib1R4WmRRV1ZzaHJ6YyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1778070926),
('fbuzRSykRzoD47gVQG0bHOwcNiCeCevqXEhKXkio', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlRkZlpHbG9STm5zYmlncXpRYjk3SnFXeTRpMjRSUHVBanNENXZhWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXBsb2Fkcy9zdWJjYXRlZ29yaWVzL2h0dHBzOi8vaW1hZ2VzLnVuc3BsYXNoLmNvbS9waG90by0xNTU4NDk0OTQ5LWVmMDEwY2JkY2M1MT9hdXRvPWZvcm1hdCZmaXQ9Y3JvcCZxPTgwJnc9ODAwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778065479),
('GNZ3cAbGISou7HwMetT1Pzh9wy4MrkZUIdjM0E4C', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkI0dU51YnR0dTBNVWY5ald4a1EwS3RXNXI0RWpYU1lRODI1NmFUTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXBsb2Fkcy9jYXRlZ29yaWVzL2h0dHBzOi8vaW1hZ2VzLnVuc3BsYXNoLmNvbS9waG90by0xNTQ0MTk3MTUwLWI5OWE1ODBiYjdhOD9hdXRvPWZvcm1hdCZmaXQ9Y3JvcCZxPTgwJnc9ODAwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778065472),
('IuL6GU9SgRZyuwvKGjYuthzON8dZ3RCfOBiq8lgy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUtSZExEQm9LQk12YW0xZW9BVlFBV0M4b2Z0TlNlN04yeVZpaTFDVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXBsb2Fkcy9jYXRlZ29yaWVzL2h0dHBzOi8vaW1hZ2VzLnVuc3BsYXNoLmNvbS9waG90by0xNTU4NDk0OTQ5LWVmMDEwY2JkY2M1MT9hdXRvPWZvcm1hdCZmaXQ9Y3JvcCZxPTgwJnc9ODAwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778065474),
('KJkHEwKJDMU6OBDWeYsCyUEYVMP3Ua3K9Jdj1IIe', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieExzMTRzMnVHV2x1WldUdHVaenJ0S0ZSUk5LUWk5ZXJuQklVOFdGcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lkZGhhcnNoL3B1YmxpYyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778068337),
('lhnzsJsHGI2aLHJ4bQk9BiAgjZDSj4TBtxex4Gj9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWlUVVBCcWtJcHdtTHZ0SWFMaWNQalZ5SmNSV3ZMa3NqcVJzNkZoZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXBsb2Fkcy9zdWJjYXRlZ29yaWVzL2h0dHBzOi8vaW1hZ2VzLnVuc3BsYXNoLmNvbS9waG90by0xNTkzMzA1ODQxOTkxLTA1YzI5N2JhMzI2Yj9hdXRvPWZvcm1hdCZmaXQ9Y3JvcCZxPTgwJnc9ODAwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778065482),
('OZ4HYJIF6iAJunbih6xqMHfWK7yHlzz2BY87ykaC', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjR6czA2VDdQRGg5c3dVRXFYUTBPUG9EUTg2dlZVQkpwSk92VHNYWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lkZGhhcnNoL3B1YmxpYyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1778068254),
('Q1smBJcixK38Qeyw31JjMQnjjLgNf5k1GAUFnwTw', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUmg0eHhTZldaaFdGWkRhWkNseGdWQUxqdFFuWTdGeXFPbWYyZ3QzUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1778065390),
('RNnP4cCSVsy8444tVcltH1grK6HSvDb8UyTNRY5k', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkRPVkthWFpCN1FOeXFDcFVyYzZQUWw1TUFaeEZDWG9lck1WRXpFUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXBsb2Fkcy9jYXRlZ29yaWVzL2h0dHBzOi8vaW1hZ2VzLnVuc3BsYXNoLmNvbS9waG90by0xNjAwMjY3MTc1MTYxLWNmYWE3MTFiNGE4MT9hdXRvPWZvcm1hdCZmaXQ9Y3JvcCZxPTgwJnc9ODAwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778065476),
('XWFDk7IYKsTSrFMPp8S27fKD5QQcb8NJyBC2TfSm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU05PU2ZoNzBrRmZiNGZhRlhaMndPNlBMSW9KZGFITXpudjZyMnJiSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXBsb2Fkcy9zdWJjYXRlZ29yaWVzL2h0dHBzOi8vaW1hZ2VzLnVuc3BsYXNoLmNvbS9waG90by0xNjAwMjY3MTc1MTYxLWNmYWE3MTFiNGE4MT9hdXRvPWZvcm1hdCZmaXQ9Y3JvcCZxPTgwJnc9ODAwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1778065482);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `logo`, `favicon`, `created_at`, `updated_at`, `email`, `phone`, `address`, `admin_email`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`) VALUES
(1, 'Siddharsh Technologies', 'Leading Enterprise IT Infrastructure & Networking Solutions Provider. Expert in Cisco, HP, Dell and more.', '1778064492_logo.png', '1778064492_favicon.png', '2026-05-06 05:12:10', '2026-05-06 06:03:14', 'info@siddharsh.com', '+91-8826363495', 'Plot No. 45, Second Floor, Okhla Industrial Estate Phase III, New Delhi, Delhi-110020, India', 'ritikrasenia1234@gmail.com', 'https://facebook.com/siddharshtech', 'https://twitter.com/siddharshtech', 'https://instagram.com/siddharshtech', 'https://linkedin.com/company/siddharshtech', 'https://youtube.com/c/siddharshtech');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Bulk Copper Cable', 'bulk-copper-cable', '1778066649.jpg', 1, '2026-05-06 05:54:09', '2026-05-06 05:54:09', NULL),
(2, 1, 'Cable Trunks & Switch Harnesses', 'cable-trunks-switch-harnesses', '1778070405.jpg', 1, '2026-05-06 06:56:45', '2026-05-06 06:56:45', NULL),
(3, 2, 'Cabinets & Accessories', 'cabinets-accessories', '1778070516.jpg', 1, '2026-05-06 06:58:36', '2026-05-06 06:58:36', NULL),
(4, 2, 'Cable Managers & Accessories', 'cable-managers-accessories', '1778070576.jpg', 1, '2026-05-06 06:59:36', '2026-05-06 06:59:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'admin@gmail.com', '1777979761.jpg', NULL, '$2y$10$MbYHu49X0EV5wDE2J.5bCebmygZbcdvYeETfr98SFV1vky15PIdE2', NULL, '2026-05-05 09:23:44', '2026-05-05 05:46:01'),
(3, 'Ritik Rasenia', 'ritikrasenia1234@gmail.com', NULL, NULL, '$2y$12$q7SS2n7uq82ZtKPvTyBP9O.BTwOv/lpikCZcUcH6pZl8yLJB4eW/q', NULL, '2026-05-05 06:32:53', '2026-05-05 06:32:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_categories_slug_unique` (`slug`),
  ADD KEY `child_categories_category_id_foreign` (`category_id`),
  ADD KEY `child_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_product_id_foreign` (`product_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_child_category_id_foreign` (`child_category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `child_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `child_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

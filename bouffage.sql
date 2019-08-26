-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2019 at 01:19 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bouffage`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

DROP TABLE IF EXISTS `buy`;
CREATE TABLE IF NOT EXISTS `buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `amount` float DEFAULT NULL,
  `qty` float NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Special Menu', '2018-12-31 10:03:49', '2018-12-31 10:03:49'),
(2, 'Breakfast', '2018-12-31 09:04:02', '2018-12-31 09:04:02'),
(3, 'Lunch', '2018-12-31 10:00:12', '2018-12-31 10:00:12'),
(4, 'Dinner', '2018-12-31 10:00:31', '2018-12-31 10:00:31'),
(5, 'Drinks', '2018-12-31 10:00:43', '2018-12-31 10:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `category_menu`
--

DROP TABLE IF EXISTS `category_menu`;
CREATE TABLE IF NOT EXISTS `category_menu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_menu_menu_id_foreign` (`menu_id`),
  KEY `category_menu_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_menu`
--

INSERT INTO `category_menu` (`id`, `menu_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 3, NULL, NULL),
(6, 6, 5, NULL, NULL),
(7, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `tax` float NOT NULL,
  `discount` float NOT NULL,
  `discountp` float NOT NULL,
  `pmethod` varchar(30) NOT NULL,
  `pamount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `total`, `created_at`, `updated_at`, `tax`, `discount`, `discountp`, `pmethod`, `pamount`) VALUES
(1, 1, 180, '2018-12-19 08:11:30', '2018-12-19 08:11:30', 0, 27, 15, 'Cash', 500),
(2, 1, 770, '2018-12-19 08:13:46', '2018-12-19 08:13:46', 0, 115, 15, 'Cash', 0),
(3, 1, 670, '2018-12-19 08:15:39', '2018-12-19 08:15:39', 0, 100, 15, 'Cash', 0),
(4, 1, 230, '2018-12-19 09:14:01', '2018-12-19 09:14:01', 0, 34, 15, 'Cash', 0),
(7, 1, 720, '2018-12-19 11:02:43', '2018-12-19 11:02:43', 0, 108, 15, 'Cash', 0),
(6, 1, 130, '2018-12-19 10:40:55', '2018-12-19 10:40:55', 0, 19, 15, 'Cash', 0),
(8, 1, 350, '2018-12-19 11:09:52', '2018-12-19 11:09:52', 0, 52, 15, 'Cash', 0),
(9, 1, 180, '2018-12-20 06:57:29', '2018-12-20 06:57:29', 0, 27, 15, 'Cash', 0),
(10, 1, 230, '2018-12-20 08:02:52', '2018-12-20 08:02:52', 0, 34, 15, 'Cash', 0),
(11, 1, 690, '2018-12-20 10:11:55', '2018-12-20 10:11:55', 0, 103, 15, 'Cash', 0),
(12, 1, 710, '2018-12-21 08:49:36', '2018-12-21 08:49:37', 0, 106, 15, 'Cash', 0),
(14, 1, 515, '2018-12-21 09:08:19', '2018-12-21 09:08:19', 0, 77, 15, 'Cash', 0),
(15, 1, 880, '2018-12-21 09:59:50', '2018-12-21 09:59:50', 0, 132, 15, 'Cash', 0),
(16, 1, 610, '2018-12-21 10:40:29', '2018-12-21 10:40:29', 0, 91, 15, 'Cash', 0),
(17, 1, 210, '2018-12-22 03:33:51', '2018-12-22 03:33:51', 0, 31, 15, 'Cash', 0),
(18, 1, 0, '2018-12-22 04:00:36', '2018-12-22 04:01:37', 0, 0, 0, 'Cash', 0),
(19, 1, 650, '2018-12-22 04:01:11', '2018-12-22 04:01:11', 0, 97, 15, 'Cash', 0),
(21, 1, 300, '2018-12-22 04:38:15', '2018-12-22 04:38:15', 0, 45, 15, 'Cash', 0),
(22, 1, 260, '2018-12-22 07:16:10', '2018-12-22 07:16:10', 0, 39, 15, 'Cash', 0),
(23, 1, 530, '2018-12-22 09:40:31', '2018-12-22 09:40:32', 0, 79, 15, 'Cash', 0),
(26, 1, 190, '2018-12-23 05:24:12', '2018-12-23 05:24:12', 0, 22, 15, 'Cash', 0),
(27, 1, 160, '2018-12-23 06:57:59', '2018-12-23 06:57:59', 0, 24, 15, 'Cash', 0),
(28, 1, 140, '2018-12-23 07:45:04', '2018-12-23 07:45:04', 0, 15, 15, 'Cash', 0),
(29, 1, 400, '2018-12-23 08:31:56', '2018-12-23 08:31:56', 0, 60, 15, 'Cash', 0),
(30, 1, 100, '2018-12-23 09:28:40', '2018-12-23 09:28:40', 0, 15, 15, 'Cash', 0),
(31, 1, 570, '2018-12-24 05:04:18', '2018-12-24 05:04:18', 0, 82, 15, 'Cash', 0),
(32, 1, 510, '2018-12-24 05:16:46', '2018-12-24 05:16:46', 0, 64, 15, 'Cash', 0),
(33, 1, 260, '2018-12-24 06:48:53', '2018-12-24 06:48:53', 0, 36, 15, 'Cash', 0),
(34, 1, 240, '2018-12-24 08:30:21', '2018-12-24 08:30:21', 0, 36, 15, 'Cash', 0),
(35, 1, 880, '2018-12-24 09:49:23', '2018-12-24 09:49:23', 0, 132, 15, 'Cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_category_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `category_id`, `description`, `image`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(49, 'Burger', 2, NULL, 'cheeseburger_1547013962.jpg', 10, 2, '2019-01-09 00:06:02', '2019-01-09 00:06:02'),
(50, 'Lobster', 1, NULL, 'lobster_1547014723.jpg', 80, 6, '2019-01-09 00:18:43', '2019-01-09 00:18:43'),
(36, 'Fride Rice', 3, NULL, 'download_1547011765.jpg', 60, 3, '2019-01-08 23:29:25', '2019-01-08 23:29:25'),
(37, 'Fride Rice', 4, NULL, 'download_1547011783.jpg', 60, 4, '2019-01-08 23:29:43', '2019-01-08 23:29:43'),
(38, 'Pizza', 2, NULL, 'istockphoto-804291810-612x612_1547011800.jpg', 30, 4, '2019-01-08 23:30:00', '2019-01-08 23:30:00'),
(40, 'Chicken Fry', 1, NULL, '1-6_1547011840.jpg', 70, 5, '2019-01-08 23:30:40', '2019-01-08 23:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_24_173724_create_items_table', 1),
(4, '2018_02_24_173820_entrust_setup_tables', 1),
(5, '2018_12_31_142314_create_categories_table', 2),
(8, '2019_01_03_085356_create_shoppingcart_table', 5),
(7, '2018_12_31_142314_create_menus_table', 4),
(9, '2019_01_06_173843_create_category_menu_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'User List', 'List Show', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(2, 'user-create', 'User Create', 'New User Create', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(3, 'user-edit', 'User Edit', 'Edit A User', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(4, 'user-delete', 'User Delete', 'Delete A User', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(5, 'role-list', 'Role List', 'Role Show', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(6, 'role-create', 'Role Create', 'New Role Create', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(7, 'role-edit', 'Role Edit', 'Edit A Role', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(8, 'role-delete', 'Role Delete', 'Delete A Role', '2018-12-14 18:00:00', '2018-12-14 18:00:00'),
(9, 'item-list', 'Display Item Listing', 'See only Listing Of Item', '2018-02-24 06:46:21', '2018-02-24 06:46:21'),
(10, 'item-create', 'Create Item', 'Create New Item', '2018-02-24 06:46:21', '2018-02-24 06:46:21'),
(11, 'item-edit', 'Edit Item', 'Edit Item', '2018-02-24 06:46:21', '2018-02-24 06:46:21'),
(12, 'item-delete', 'Delete Item', 'Delete Item', '2018-02-24 06:46:21', '2018-02-24 06:46:21'),
(33, 'buy-list', 'Display Bought Item Listing', 'See only Listing Of Bought Item', NULL, NULL),
(34, 'buy-create', 'Create Bought Item', 'Create New Bought Item', NULL, NULL),
(35, 'buy-edit', 'Edit Bought Item', 'Edit Bought Item', NULL, NULL),
(36, 'buy-delete', 'Delete Bought Item', 'Delete Bought Item', NULL, NULL),
(13, 'sale-list', 'Display Sold Item Listing', 'See only Listing Of Sold Item', NULL, NULL),
(14, 'sale-create', 'Create Sold Item', 'Create Sold New Item', NULL, NULL),
(15, 'sale-edit', 'Edit Sold Item', 'Edit Sold Item', NULL, NULL),
(16, 'sale-delete', 'Delete Sold Item', 'Delete Sold Item', NULL, NULL),
(17, 'rawMaterial-list', 'Display Raw Material Listing', 'See only Listing Of Raw Material Item', NULL, NULL),
(18, 'rawMaterial-create', 'Create Raw Material Item', 'Create New Raw Material Item', NULL, NULL),
(19, 'rawMaterial-edit', 'Edit Raw Material Item', 'Edit Raw Material Item', NULL, NULL),
(20, 'rawMaterial-delete', 'Delete Raw Material Item', 'Delete Raw Material Item', NULL, NULL),
(21, 'sellableItem-list', 'Display Sellable Listing', 'See only Listing Of Sellable Item', NULL, NULL),
(22, 'sellableItem-create', 'Create Sellable Item', 'Create New Sellable Item', NULL, NULL),
(23, 'sellableItem-edit', 'Edit Sellable Item', 'Edit Sellable Item', NULL, NULL),
(24, 'sellableItem-delete', 'Delete Sellable Item', 'Delete Sellable Item', NULL, NULL),
(25, 'category-list', 'Display Category Listing', 'See only Listing Of Category', NULL, NULL),
(26, 'category-create', 'Create Category', 'Create New Category', NULL, NULL),
(27, 'category-edit', 'Edit Category', 'Edit Category', NULL, NULL),
(28, 'category-delete', 'Delete Category', 'Delete Category', NULL, NULL),
(29, 'menu-list', 'Display Menu Listing', 'See only Listing Of Menu', NULL, NULL),
(30, 'menu-create', 'Create Menu', 'Create New Menu', NULL, NULL),
(31, 'menu-edit', 'Edit Menu', 'Edit Menu', NULL, NULL),
(32, 'menu-delete', 'Delete Menu', 'Delete Menu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `raw_matetials`
--

DROP TABLE IF EXISTS `raw_matetials`;
CREATE TABLE IF NOT EXISTS `raw_matetials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'System Admin', 'System Admin', '2018-12-15 05:40:46', '2018-12-15 05:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `qty` float NOT NULL,
  `invoice` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `invoice` (`invoice`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `item_id`, `user_id`, `rate`, `qty`, `invoice`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 90, 2, 1, '2018-12-19 08:11:30', '2018-12-19 08:11:30'),
(2, 4, 1, 770, 1, 2, '2018-12-19 08:13:46', '2018-12-19 08:13:46'),
(3, 1, 1, 550, 1, 3, '2018-12-19 08:15:39', '2018-12-19 08:15:39'),
(4, 2, 1, 120, 1, 3, '2018-12-19 08:15:39', '2018-12-19 08:15:39'),
(5, 7, 1, 230, 1, 4, '2018-12-19 09:14:01', '2018-12-19 09:14:01'),
(6, 8, 1, 150, 1, 5, '2018-12-19 10:30:08', '2018-12-19 10:30:08'),
(7, 9, 1, 120, 1, 5, '2018-12-19 10:30:08', '2018-12-19 10:30:08'),
(8, 10, 1, 80, 1, 5, '2018-12-19 10:30:08', '2018-12-19 10:30:08'),
(9, 11, 1, 130, 1, 6, '2018-12-19 10:40:55', '2018-12-19 10:40:55'),
(10, 12, 1, 130, 1, 7, '2018-12-19 11:02:43', '2018-12-19 11:02:43'),
(11, 11, 1, 130, 1, 7, '2018-12-19 11:02:43', '2018-12-19 11:02:43'),
(12, 10, 1, 80, 1, 7, '2018-12-19 11:02:43', '2018-12-19 11:02:43'),
(13, 2, 1, 130, 1, 7, '2018-12-19 11:02:43', '2018-12-19 11:02:43'),
(14, 13, 1, 250, 1, 7, '2018-12-19 11:02:43', '2018-12-19 11:02:43'),
(15, 8, 1, 150, 1, 8, '2018-12-19 11:09:52', '2018-12-19 11:09:52'),
(16, 9, 1, 120, 1, 8, '2018-12-19 11:09:52', '2018-12-19 11:09:52'),
(17, 10, 1, 80, 1, 8, '2018-12-19 11:09:52', '2018-12-19 11:09:52'),
(18, 5, 1, 90, 2, 9, '2018-12-20 06:57:29', '2018-12-20 06:57:29'),
(19, 7, 1, 230, 1, 10, '2018-12-20 08:02:52', '2018-12-20 08:02:52'),
(20, 7, 1, 230, 3, 11, '2018-12-20 10:11:55', '2018-12-20 10:11:55'),
(21, 7, 1, 230, 2, 12, '2018-12-21 08:49:37', '2018-12-21 08:49:37'),
(22, 14, 1, 250, 1, 12, '2018-12-21 08:49:37', '2018-12-21 08:49:37'),
(23, 17, 1, 130, 3, 13, '2018-12-21 08:59:56', '2018-12-21 08:59:56'),
(24, 16, 1, 100, 1, 13, '2018-12-21 08:59:56', '2018-12-21 08:59:56'),
(25, 17, 1, 130, 3, 14, '2018-12-21 09:08:19', '2018-12-21 09:08:19'),
(26, 18, 1, 25, 5, 14, '2018-12-21 09:08:19', '2018-12-21 09:08:19'),
(27, 19, 1, 800, 1, 15, '2018-12-21 09:59:50', '2018-12-21 09:59:50'),
(28, 10, 1, 80, 1, 15, '2018-12-21 09:59:50', '2018-12-21 09:59:50'),
(29, 20, 1, 230, 1, 16, '2018-12-21 10:40:29', '2018-12-21 10:40:29'),
(30, 22, 1, 190, 2, 16, '2018-12-21 10:40:29', '2018-12-21 10:40:29'),
(31, 24, 1, 90, 1, 17, '2018-12-22 03:33:51', '2018-12-22 03:33:51'),
(32, 9, 1, 120, 1, 17, '2018-12-22 03:33:51', '2018-12-22 03:33:51'),
(35, 26, 1, 150, 2, 20, '2018-12-22 04:01:55', '2018-12-22 04:01:55'),
(34, 25, 1, 650, 1, 19, '2018-12-22 04:01:11', '2018-12-22 04:01:11'),
(36, 26, 1, 150, 2, 21, '2018-12-22 04:38:15', '2018-12-22 04:38:15'),
(37, 11, 1, 130, 1, 22, '2018-12-22 07:16:10', '2018-12-22 07:16:10'),
(38, 17, 1, 130, 1, 22, '2018-12-22 07:16:10', '2018-12-22 07:16:10'),
(39, 13, 1, 250, 1, 23, '2018-12-22 09:40:32', '2018-12-22 09:40:32'),
(40, 24, 1, 90, 2, 23, '2018-12-22 09:40:32', '2018-12-22 09:40:32'),
(41, 27, 1, 100, 1, 23, '2018-12-22 09:40:32', '2018-12-22 09:40:32'),
(42, 7, 1, 230, 1, 24, '2018-12-23 03:50:28', '2018-12-23 03:50:28'),
(43, 4, 1, 770, 1, 24, '2018-12-23 03:50:28', '2018-12-23 03:50:28'),
(44, 10, 1, 80, 2, 24, '2018-12-23 03:50:28', '2018-12-23 03:50:28'),
(45, 15, 1, 15, 2, 24, '2018-12-23 03:50:28', '2018-12-23 03:50:28'),
(46, 26, 1, 150, 1, 25, '2018-12-23 05:23:27', '2018-12-23 05:23:27'),
(47, 28, 1, 20, 1, 25, '2018-12-23 05:23:27', '2018-12-23 05:23:27'),
(48, 26, 1, 150, 1, 26, '2018-12-23 05:24:12', '2018-12-23 05:24:12'),
(49, 28, 1, 20, 2, 26, '2018-12-23 05:24:12', '2018-12-23 05:24:12'),
(50, 10, 1, 80, 2, 27, '2018-12-23 06:57:59', '2018-12-23 06:57:59'),
(51, 16, 1, 100, 1, 28, '2018-12-23 07:45:04', '2018-12-23 07:45:04'),
(52, 28, 1, 20, 2, 28, '2018-12-23 07:45:04', '2018-12-23 07:45:04'),
(53, 30, 1, 220, 1, 29, '2018-12-23 08:31:56', '2018-12-23 08:31:56'),
(54, 29, 1, 100, 1, 29, '2018-12-23 08:31:56', '2018-12-23 08:31:56'),
(55, 10, 1, 80, 1, 29, '2018-12-23 08:31:56', '2018-12-23 08:31:56'),
(56, 16, 1, 100, 1, 30, '2018-12-23 09:28:40', '2018-12-23 09:28:40'),
(57, 1, 1, 550, 1, 31, '2018-12-24 05:04:18', '2018-12-24 05:04:18'),
(58, 28, 1, 20, 1, 31, '2018-12-24 05:04:18', '2018-12-24 05:04:18'),
(59, 11, 1, 130, 2, 32, '2018-12-24 05:16:46', '2018-12-24 05:16:46'),
(60, 31, 1, 170, 1, 32, '2018-12-24 05:16:46', '2018-12-24 05:16:46'),
(61, 28, 1, 20, 4, 32, '2018-12-24 05:16:46', '2018-12-24 05:16:46'),
(62, 2, 1, 130, 1, 33, '2018-12-24 06:48:53', '2018-12-24 06:48:53'),
(63, 32, 1, 110, 1, 33, '2018-12-24 06:48:53', '2018-12-24 06:48:53'),
(64, 28, 1, 20, 1, 33, '2018-12-24 06:48:53', '2018-12-24 06:48:53'),
(65, 10, 1, 80, 3, 34, '2018-12-24 08:30:21', '2018-12-24 08:30:21'),
(66, 33, 1, 880, 1, 35, '2018-12-24 09:49:23', '2018-12-24 09:49:23'),
(67, 2, 1, 130, 2, 36, '2018-12-25 01:58:45', '2018-12-25 01:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `sellable_items`
--

DROP TABLE IF EXISTS `sellable_items`;
CREATE TABLE IF NOT EXISTS `sellable_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellable_items`
--

INSERT INTO `sellable_items` (`id`, `title`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'Chicken Pizza 8\"', 550, '2018-12-19 06:50:06', '2018-12-19 06:50:06'),
(2, 'Chicken Fried Rice', 130, '2018-12-19 06:50:15', '2018-12-19 11:00:12'),
(3, 'Beef Burger', 80, '2018-12-19 06:50:32', '2018-12-19 06:50:32'),
(4, 'Chicken Pizza 12\"', 770, '2018-12-19 07:38:03', '2018-12-19 07:38:03'),
(5, 'Coffee (Hot)', 90, '2018-12-19 08:06:41', '2018-12-19 08:06:56'),
(6, 'Coffee (Cold)', 100, '2018-12-19 08:07:29', '2018-12-19 08:07:29'),
(7, 'Combo 1', 230, '2018-12-19 09:12:39', '2018-12-19 09:12:39'),
(8, 'Mixed Fried Rice', 150, '2018-12-19 10:27:09', '2018-12-19 10:27:09'),
(9, 'Beef Chilli Onion', 120, '2018-12-19 10:27:50', '2018-12-19 10:27:50'),
(10, 'Crispy  Fried Chicken', 80, '2018-12-19 10:28:51', '2018-12-19 10:28:51'),
(11, 'Chicken Chowmin', 130, '2018-12-19 10:31:47', '2018-12-19 10:31:47'),
(12, 'Hot & Saur Soup/Prwan/Chicken', 130, '2018-12-19 10:33:51', '2018-12-19 10:33:51'),
(13, 'Massala Fried Chicken (Half)', 250, '2018-12-19 10:57:52', '2018-12-19 10:57:52'),
(14, 'Chicken Cashe nut salad', 250, '2018-12-21 08:45:44', '2018-12-21 08:45:44'),
(15, 'Water 500ml', 15, '2018-12-21 08:46:23', '2018-12-21 08:46:23'),
(16, 'Fried Wonthon 4pcs', 100, '2018-12-21 08:53:13', '2018-12-21 08:53:13'),
(17, 'Thai soup', 130, '2018-12-21 08:54:18', '2018-12-21 08:54:18'),
(18, 'Fried wonthon', 25, '2018-12-21 09:01:38', '2018-12-21 09:01:38'),
(19, 'Pepporioni  Pizza 12\'', 800, '2018-12-21 09:59:03', '2018-12-21 09:59:03'),
(20, 'Combo 2', 230, '2018-12-21 10:38:50', '2018-12-21 10:38:50'),
(21, 'Combo 3', 220, '2018-12-21 10:39:15', '2018-12-21 10:39:15'),
(22, 'Combo 4', 190, '2018-12-21 10:39:35', '2018-12-21 10:39:35'),
(23, 'Bouffage special chow mein', 190, '2018-12-22 03:10:13', '2018-12-22 03:10:13'),
(24, 'vegetable fried rice', 90, '2018-12-22 03:33:23', '2018-12-22 03:33:23'),
(25, 'Meet pizza 8\'', 650, '2018-12-22 03:48:45', '2018-12-22 03:48:45'),
(26, 'Mixed chow mein', 150, '2018-12-22 03:53:20', '2018-12-22 03:53:20'),
(27, 'Chicken Vegetable Chilli', 100, '2018-12-22 09:37:14', '2018-12-22 09:37:14'),
(28, 'soft drinks per glass', 20, '2018-12-23 05:22:51', '2018-12-23 05:22:51'),
(29, 'Potato wadges', 100, '2018-12-23 08:30:03', '2018-12-23 08:30:03'),
(30, 'Spaghetti Bolognese', 220, '2018-12-23 08:31:07', '2018-12-23 08:31:07'),
(31, 'Chicken Burger', 170, '2018-12-24 05:14:05', '2018-12-24 05:14:05'),
(32, 'Chicken Chilli Onion', 110, '2018-12-24 06:45:06', '2018-12-24 06:45:06'),
(33, 'Meat Pizza 12inchi', 880, '2018-12-24 09:48:48', '2018-12-24 09:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'System Admin', 'system@bouffagebd.com', '$2y$10$bLHZvL3apqdPEUe7DVHskOv/zOXkuqmK.KM9VnFB7QLUCMf46Yglq', 'o9tWjdVqklqvxXXMAo8dSUvvFPQhw7yb6Tn6t4R3HQuwDqHjigYVQ88TdZw6', '2018-12-15 05:26:52', '2018-12-15 05:26:52'),
(2, 'bouffage', 'jakirkakon@gmail.com', '$2y$10$QJKetl5Ozp.j9Ru4Cd3oj.hB0l0oRmELuE3hycCfRM0jYYvyk/NbC', '06jKuQuGONcAnqPytf9AAwIEqNakjbmOFyxFbbF7PJhBoTz1NNNYVgzngT9B', '2018-12-17 02:21:06', '2018-12-17 02:21:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

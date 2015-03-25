-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 03:31 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `silver`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE IF NOT EXISTS `approvals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `quotation_id` int(10) unsigned NOT NULL,
  `approval_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `approvals_quotation_id_foreign` (`quotation_id`),
  KEY `approvals_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `created_at`, `updated_at`, `user_id`, `quotation_id`, `approval_status`) VALUES
(1, '2015-03-24 23:00:29', '2015-03-24 23:00:29', 22, 1, 1),
(2, '2015-03-25 01:57:54', '2015-03-25 01:57:54', 24, 2, 1),
(3, '2015-03-25 07:28:48', '2015-03-25 07:28:48', 24, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attachments_project_id_foreign` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE IF NOT EXISTS `budgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` int(10) unsigned NOT NULL,
  `entry_id` int(10) unsigned NOT NULL,
  `quantity` decimal(16,2) NOT NULL,
  `unit_price` decimal(16,2) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `quotation_id`, `entry_id`, `quantity`, `unit_price`, `amount`, `created_at`, `updated_at`, `remarks`, `deleted_at`, `supplier_id`) VALUES
(1, 1, 3, '1.00', '5000.00', '5000.00', '2015-03-24 23:59:20', '2015-03-25 00:06:17', 'Done', '2015-03-25 00:06:17', 0),
(2, 1, 3, '1.00', '5000.00', '5000.00', '2015-03-25 00:27:59', '2015-03-25 00:27:59', 'Done', NULL, 0),
(3, 1, 3, '1.00', '5000.00', '5000.00', '2015-03-25 00:28:20', '2015-03-25 00:38:27', 'Done', '2015-03-25 00:38:27', 0),
(4, 1, 3, '1.00', '5000.00', '5000.00', '2015-03-25 00:28:34', '2015-03-25 00:38:34', 'Done', '2015-03-25 00:38:34', 0),
(5, 1, 4, '1.00', '2000.00', '2000.00', '2015-03-25 00:38:53', '2015-03-25 00:38:53', 'Done', NULL, 0),
(6, 1, 3, '1.00', '5000.00', '5000.00', '2015-03-25 01:30:16', '2015-03-25 01:30:16', 'Additional', NULL, 0),
(7, 1, 3, '1.00', '2500.00', '2500.00', '2015-03-25 06:55:53', '2015-03-25 06:55:53', 'Additional', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `child_entries`
--

CREATE TABLE IF NOT EXISTS `child_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `child_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `child_entries_child_id_foreign` (`child_id`),
  KEY `child_entries_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `child_entries`
--

INSERT INTO `child_entries` (`id`, `child_id`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2015-03-24 22:53:34', '2015-03-24 22:53:34', NULL),
(2, 3, 2, '2015-03-24 22:54:03', '2015-03-24 22:54:03', NULL),
(3, 4, 2, '2015-03-24 22:58:38', '2015-03-24 22:58:38', NULL),
(4, 7, 6, '2015-03-25 01:44:02', '2015-03-25 01:44:02', NULL),
(5, 8, 7, '2015-03-25 01:44:37', '2015-03-25 01:44:37', NULL),
(6, 9, 5, '2015-03-25 01:45:33', '2015-03-25 01:45:33', NULL),
(7, 10, 9, '2015-03-25 01:46:00', '2015-03-25 01:46:00', NULL),
(8, 11, 9, '2015-03-25 01:46:40', '2015-03-25 01:46:40', NULL),
(9, 13, 12, '2015-03-25 07:10:44', '2015-03-25 07:10:44', NULL),
(10, 14, 13, '2015-03-25 07:13:06', '2015-03-25 07:13:06', NULL),
(11, 16, 15, '2015-03-25 07:24:08', '2015-03-25 07:24:08', NULL),
(12, 17, 16, '2015-03-25 07:24:47', '2015-03-25 07:24:47', NULL),
(13, 18, 13, '2015-03-25 07:25:35', '2015-03-25 07:25:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '{"admin":1}', '2015-03-24 22:39:59', '2015-03-24 22:39:59'),
(2, 'Architect', '{"archi":1}', '2015-03-24 22:39:59', '2015-03-24 22:39:59'),
(3, 'Secretary', '{"secre":1}', '2015-03-24 22:39:59', '2015-03-24 22:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_12_27_013847_add_username_to_users_table', 2),
('2014_12_27_013900_remove_email_to_users_table', 2),
('2015_01_15_223652_create_projects_table', 2),
('2015_01_15_224749_create_attachments_table', 2),
('2015_01_15_225915_create_entries_table', 2),
('2015_01_15_233638_add_unit_to_entries_table', 2),
('2015_01_15_234425_create_user_load_table', 2),
('2015_01_15_235359_add_is_approved_to_user_load_table', 2),
('2015_01_16_062649_remove_authors_id_to_projects_table', 2),
('2015_01_16_075837_add_is_author_to_user_load_table', 2),
('2015_01_18_122043_remove_fields_on_user_load_table', 2),
('2015_01_18_122513_add_location_to_projects_table', 2),
('2015_01_18_122846_create_project_load_table', 2),
('2015_01_18_123552_add_missing_fields_to_entries_table', 2),
('2015_01_18_125939_remove_material_to_entries_table', 2),
('2015_01_18_215453_remove_fields_on_entries_table', 2),
('2015_01_18_215942_add_fields_on_entries_table', 2),
('2015_01_18_220235_remove_project_id_to_entries_table', 2),
('2015_01_18_220638_add_project_load_id_to_entries_table', 2),
('2015_01_18_223940_add_additional_fields_to_users_table', 2),
('2015_01_19_091912_add_additional_fields_to_projects_table', 2),
('2015_01_21_015858_add_status_to_project_table', 2),
('2015_01_21_045602_remove_status_to_project_table', 2),
('2015_01_21_045654_add_status_to_projects_table', 2),
('2015_02_02_135658_delete_entries_table', 2),
('2015_02_02_135847_create_quotations_table', 2),
('2015_02_02_140341_add_status_to_quotations_table', 2),
('2015_02_02_140514_create_quotation_entries_table', 2),
('2015_02_02_141833_create_child_entries_table', 2),
('2015_02_19_022439_add_unit_on_quotation_entries_table', 2),
('2015_02_19_050140_add_nullable_to_quotation_entries_table', 2),
('2015_02_19_050517_add_missing_fields_to_quotation_entries_table', 2),
('2015_02_19_102838_add_price_to_quotation_entries_table', 2),
('2015_02_19_110516_add_soft_deletes_to_table', 2),
('2015_02_19_114726_add_soft_deletes_to_child_entries_table', 2),
('2015_02_24_064319_add_for_approval_to_quotations_table', 2),
('2015_03_01_193931_create_approvals_table', 2),
('2015_03_01_203849_add_status_to_approvals_table', 2),
('2015_03_08_085018_add_active_quotation_to_projects_table', 2),
('2015_03_13_094747_create_suppliers_table', 2),
('2015_03_13_134214_remove_fields_to_projects_table', 2),
('2015_03_13_141918_create_quotations_load_table', 2),
('2015_03_14_044755_remove_code_to_projects_table', 2),
('2015_03_15_194704_create_rates_table', 2),
('2015_03_15_202928_create_notifications_table', 2),
('2015_03_17_112845_drop_rates_table', 2),
('2015_03_17_113223_create_other_expenses_table', 2),
('2015_03_17_143535_remove_price_on_entries_table', 2),
('2015_03_17_144109_add_fields_to_quotation_entries_table', 2),
('2015_03_17_213059_remove_quantity_on_quotation_entries_table', 2),
('2015_03_17_214152_add_quantity_on_quotation_entries_table', 2),
('2015_03_17_215547_add_grand_total_to_quotations_table', 2),
('2015_03_18_113739_add_rates_on_quotations_table', 2),
('2015_03_22_171211_add_adjustments_on_quotations_table', 2),
('2015_03_24_224705_create_budgets_table', 2),
('2015_03_24_232833_add_remarks_on_budgets_table', 2),
('2015_03_25_072507_add_soft_deletes_on_budgets_table', 3),
('2015_03_25_144304_add_supplier_id_to_budgets_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=92 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `description`, `user_id`, `is_read`, `created_at`, `updated_at`) VALUES
(14, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 1, 0, '2015-03-25 00:38:53', '2015-03-25 00:38:53'),
(15, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 2, 0, '2015-03-25 00:38:53', '2015-03-25 00:38:53'),
(16, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 3, 0, '2015-03-25 00:38:53', '2015-03-25 00:38:53'),
(17, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 4, 0, '2015-03-25 00:38:53', '2015-03-25 00:38:53'),
(18, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 5, 0, '2015-03-25 00:38:53', '2015-03-25 00:38:53'),
(19, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 6, 0, '2015-03-25 00:38:54', '2015-03-25 00:38:54'),
(20, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 7, 0, '2015-03-25 00:38:54', '2015-03-25 00:38:54'),
(21, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 8, 0, '2015-03-25 00:38:54', '2015-03-25 00:38:54'),
(22, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 9, 0, '2015-03-25 00:38:54', '2015-03-25 00:38:54'),
(23, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 10, 0, '2015-03-25 00:38:54', '2015-03-25 00:38:54'),
(24, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 21, 1, '2015-03-25 00:38:54', '2015-03-25 01:13:02'),
(25, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 1, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(26, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 2, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(27, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 3, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(28, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 4, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(29, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 5, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(30, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 6, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(31, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 7, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(32, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 8, 0, '2015-03-25 01:30:16', '2015-03-25 01:30:16'),
(33, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 9, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(34, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 10, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(35, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 21, 1, '2015-03-25 01:30:17', '2015-03-25 01:30:23'),
(36, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 1, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(37, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 2, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(38, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 3, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(39, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 4, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(40, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 5, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(41, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 6, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(42, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 7, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(43, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 8, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(44, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 9, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(45, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 10, 0, '2015-03-25 01:30:17', '2015-03-25 01:30:17'),
(46, 'Alert! Allocated Budget for Quotation: Renovation for Aranque ProjectHas Exceeded the Total Amount of Materials on Quotation', 21, 1, '2015-03-25 01:30:17', '2015-03-25 01:30:23'),
(47, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 1, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(48, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 2, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(49, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 3, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(50, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 4, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(51, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 5, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(52, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 6, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(53, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 7, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(54, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 8, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(55, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 9, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(56, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 10, 0, '2015-03-25 01:57:54', '2015-03-25 01:57:54'),
(57, 'New quotation for client approval. Title: Additional Poker Tables on project: E-games Aranque', 21, 1, '2015-03-25 01:57:54', '2015-03-25 01:58:22'),
(58, 'Your Quotation: "Additional Poker Tables" has been Approved by the Client', 2, 0, '2015-03-25 06:41:49', '2015-03-25 06:41:49'),
(59, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 1, 0, '2015-03-25 06:55:53', '2015-03-25 06:55:53'),
(60, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 2, 0, '2015-03-25 06:55:53', '2015-03-25 06:55:53'),
(61, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 3, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(62, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 4, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(63, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 5, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(64, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 6, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(65, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 7, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(66, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 8, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(67, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 9, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(68, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 10, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(69, 'Alert! Quantity for Mobilization/Demobilization on QoutationRenovation for Aranque Project has exceeded', 21, 1, '2015-03-25 06:55:54', '2015-03-25 06:59:55'),
(70, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 1, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(71, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 2, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(72, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 3, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(73, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 4, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(74, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 5, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(75, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 6, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(76, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 7, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(77, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 8, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(78, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 9, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(79, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 10, 0, '2015-03-25 06:55:54', '2015-03-25 06:55:54'),
(80, 'Alert! Allocated Budget for Quotation: Renovation for Aranque Project Has Exceeded the Total Amount of Materials on Quotation', 21, 1, '2015-03-25 06:55:55', '2015-03-25 06:59:54'),
(81, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 1, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(82, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 2, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(83, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 3, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(84, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 4, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(85, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 5, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(86, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 6, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(87, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 7, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(88, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 8, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(89, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 9, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(90, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 10, 0, '2015-03-25 07:28:49', '2015-03-25 07:28:49'),
(91, 'New quotation for client approval. Title: Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works on project: E-games Bayombong', 21, 1, '2015-03-25 07:28:49', '2015-03-25 07:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `other_expenses`
--

CREATE TABLE IF NOT EXISTS `other_expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(16,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `other_expenses_quotation_id_foreign` (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `other_expenses`
--

INSERT INTO `other_expenses` (`id`, `quotation_id`, `description`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'TK/Foreman', '40000.00', '2015-03-24 22:57:46', '2015-03-24 22:57:46'),
(2, 2, 'TK/Foreman', '50000.00', '2015-03-25 01:42:58', '2015-03-25 01:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `created_at`, `updated_at`, `location`) VALUES
(1, 'E-games Aranque', 'E-games in Quiapo Aranque', '2015-03-24 22:45:50', '2015-03-24 22:45:50', 'Quiapo, Aranque'),
(2, 'E-games Bayombong', 'E-games in Bayombong, Nueva Ecija', '2015-03-25 07:06:57', '2015-03-25 07:06:57', 'Bayombong, Nueva Ecija');

-- --------------------------------------------------------

--
-- Table structure for table `project_load`
--

CREATE TABLE IF NOT EXISTS `project_load` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_approved` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `project_load_project_id_foreign` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE IF NOT EXISTS `quotations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quotation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `for_approval` tinyint(4) NOT NULL,
  `grand_total` decimal(16,2) NOT NULL,
  `cont` decimal(16,2) NOT NULL DEFAULT '0.03',
  `others` decimal(16,2) NOT NULL,
  `tax` decimal(16,2) NOT NULL DEFAULT '0.10',
  `adjustments` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quotations_project_id_foreign` (`project_id`),
  KEY `quotations_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `project_id`, `user_id`, `title`, `quotation_code`, `remarks`, `created_at`, `updated_at`, `status`, `for_approval`, `grand_total`, `cont`, `others`, `tax`, `adjustments`) VALUES
(1, 1, 24, 'Renovation for Aranque Project', '1', '', '2015-03-24 22:52:42', '2015-03-24 23:01:23', '2', 1, '0.00', '0.05', '0.02', '0.10', '0.00'),
(2, 1, 22, 'Additional Poker Tables', '2', '', '2015-03-25 01:42:18', '2015-03-25 06:41:49', '2', 1, '0.00', '0.05', '0.02', '0.10', '0.00'),
(3, 2, 22, 'Bill of Quantities for Architectural,Electrical, Mechanical & Plumbing Works', '1', '', '2015-03-25 07:10:14', '2015-03-25 07:28:49', '1', 1, '0.00', '0.05', '0.02', '0.10', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotations_load`
--

CREATE TABLE IF NOT EXISTS `quotations_load` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `quotation_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `quotations_load_project_id_foreign` (`project_id`),
  KEY `quotations_load_quotation_id_foreign` (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quotations_load`
--

INSERT INTO `quotations_load` (`id`, `project_id`, `quotation_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-03-24 23:01:23', '2015-03-24 23:01:23'),
(2, 1, 2, '2015-03-25 06:41:49', '2015-03-25 06:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_entries`
--

CREATE TABLE IF NOT EXISTS `quotation_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` int(10) unsigned NOT NULL,
  `level` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `um` decimal(16,2) NOT NULL,
  `tm` decimal(16,2) NOT NULL,
  `ul` decimal(16,2) NOT NULL,
  `tl` decimal(16,2) NOT NULL,
  `dc` decimal(16,2) NOT NULL,
  `quantity` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_entries_quotation_id_foreign` (`quotation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `quotation_entries`
--

INSERT INTO `quotation_entries` (`id`, `quotation_id`, `level`, `description`, `created_at`, `updated_at`, `unit`, `deleted_at`, `um`, `tm`, `ul`, `tl`, `dc`, `quantity`) VALUES
(1, 1, 1, 'Preliminaries', '2015-03-24 22:53:22', '2015-03-24 22:53:22', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(2, 1, 2, 'Items', '2015-03-24 22:53:34', '2015-03-24 22:53:34', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(3, 1, 3, 'Mobilization/Demobilization', '2015-03-24 22:54:03', '2015-03-24 22:54:03', 'SQM', NULL, '5000.00', '5000.00', '10000.00', '10000.00', '15000.00', '1.00'),
(4, 1, 3, 'Surveying Costs', '2015-03-24 22:58:38', '2015-03-24 22:58:38', 'SQM', NULL, '1000.00', '2000.00', '10000.00', '20000.00', '22000.00', '2.00'),
(5, 2, 1, 'Preliminaries', '2015-03-25 01:43:24', '2015-03-25 01:43:24', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(6, 2, 1, 'Architectural Works', '2015-03-25 01:43:43', '2015-03-25 01:43:43', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(7, 2, 2, 'Floor Finishes', '2015-03-25 01:44:02', '2015-03-25 01:44:02', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, 2, 3, 'FF-01 600x600mm non-skid Homogenous Tiles (Architect White Rock,Architect White Matt)', '2015-03-25 01:44:37', '2015-03-25 01:44:37', 'PCS', NULL, '1020.00', '408000.00', '468.00', '187200.00', '595200.00', '400.00'),
(9, 2, 2, 'Items', '2015-03-25 01:45:33', '2015-03-25 01:45:33', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '1.00'),
(10, 2, 3, 'Mobilization/Demobilization', '2015-03-25 01:46:00', '2015-03-25 01:46:00', 'SQM', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '1.00'),
(11, 2, 3, 'Surveying Costs', '2015-03-25 01:46:39', '2015-03-25 01:46:39', 'SQM', NULL, '0.00', '0.00', '40000.00', '40000.00', '40000.00', '1.00'),
(12, 3, 1, 'Preliminaries', '2015-03-25 07:10:34', '2015-03-25 07:10:34', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(13, 3, 2, 'Items', '2015-03-25 07:10:44', '2015-03-25 07:10:44', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(14, 3, 3, 'Mobilization/Demobilization', '2015-03-25 07:13:06', '2015-03-25 07:13:06', 'SQM', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '1.00'),
(15, 3, 1, 'Architectural Works', '2015-03-25 07:23:39', '2015-03-25 07:23:39', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(16, 3, 2, 'Floor Finishes', '2015-03-25 07:24:08', '2015-03-25 07:24:08', '', NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(17, 3, 3, 'FF-01 600x600mm non-skid Homogenous Tiles (Architect White Rock,Architect White Matt)', '2015-03-25 07:24:47', '2015-03-25 07:24:47', 'SQM', NULL, '1000.00', '400000.00', '498.00', '199200.00', '599200.00', '400.00'),
(18, 3, 3, 'Temporary Facilities', '2015-03-25 07:25:35', '2015-03-25 07:25:35', 'LOT', NULL, '7000.00', '7000.00', '8000.00', '8000.00', '15000.00', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `description`, `address`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Silverado Inc.', 'Hardware and Tools Supplier', 'Antipolo, Rizal', '', '2015-03-25 06:52:17', '2015-03-25 06:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 21, '::1', 0, 0, 0, NULL, NULL, NULL),
(2, 24, '::1', 0, 0, 0, NULL, NULL, NULL),
(3, 22, '::1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_initial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`, `email`, `middle_initial`, `gender`, `contact_number`, `address`) VALUES
(1, '$2y$10$8zFD/vtgIUFUdA6E38KAdezFy/6ZT79t7uqO.SITU/HBZvOSSUaDG', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Cordell', 'Torp', '2015-03-24 22:40:00', '2015-03-24 22:40:00', 'Marks.Aisha@yahoo.com', '', 0, '(803)337-0470', '4609 Norbert Lodge\nMalikatown, DC 99640-9159'),
(2, '$2y$10$fOB.m75BbGNqnanG56SXLO9nTV5.12jPC61NNfUbHfKpMFWAdFHHi', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Abraham', 'Bartoletti', '2015-03-24 22:40:00', '2015-03-24 22:40:00', 'qCartwright@Lind.com', '', 0, '1-414-503-9442', '46066 O''Hara Walk\nDurganmouth, IA 81609-9140'),
(3, '$2y$10$yWuXS35Hd.q5U8XtEVLYN.wgcbTP1IDshQnPqTBFRiKZpniVkO5om', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Carter', 'Bednar', '2015-03-24 22:40:01', '2015-03-24 22:40:01', 'mOlson@Altenwerth.net', '', 0, '201.263.1307x355', '19735 Emil Throughway\nKathleenside, VT 96394-0450'),
(4, '$2y$10$7CpGHZRN.y/hKMfXGazYau5uZ9b33P/9xJ2fj3563R9AfzzoPxxEe', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Marilie', 'O''Hara', '2015-03-24 22:40:01', '2015-03-24 22:40:01', 'Montana.Berge@hotmail.com', '', 0, '370.570.6252', '514 Serena Ville Suite 443\nNehaville, CT 72285-9800'),
(5, '$2y$10$LwrzFB6QeYWcs/ZSvtWgq.xQvvTUkBbD3pTnt2GqBBY3lhk8Pz7Ne', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Montana', 'Lindgren', '2015-03-24 22:40:01', '2015-03-24 22:40:01', 'Gracie.Huel@Kuphal.net', '', 0, '423.740.1740x372', '257 Kihn Rapid Suite 233\nNew Bethmouth, DE 00920-4801'),
(6, '$2y$10$BYiMGCjKNfIEBDPh8vhUu..fjDpkt6QykEPX8CdiYxsJzcqd1Yafu', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Sibyl', 'Crist', '2015-03-24 22:40:01', '2015-03-24 22:40:01', 'jKing@gmail.com', '', 0, '019-867-0909x43171', '53611 Skiles Trafficway\nNew Rudymouth, CT 07584-9596'),
(7, '$2y$10$uEhWf67hbuEd.f4iFUIb0ufV2BgWDysFCQKyKprHdlUzbYJnGb/Ya', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Carolina', 'Lynch', '2015-03-24 22:40:02', '2015-03-24 22:40:02', 'Aniyah.Howe@gmail.com', '', 0, '1-195-963-4918', '850 Elvis Wall\nReichertland, NY 80631-1207'),
(8, '$2y$10$Im2XQDDk4N1W0XztpApiXeBxBxwtWhjvCXltTTIH/d8I6fxK51b8C', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Heath', 'Schmeler', '2015-03-24 22:40:02', '2015-03-24 22:40:02', 'zFay@hotmail.com', '', 0, '807.511.3131x236', '235 Mosciski Mill\nNolanton, OK 51137'),
(9, '$2y$10$QP0YEGuxPhW2JOH9Sp6NLOVbXHH27hLmILO5EZQ.cEmtfPl5fmrOK', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Juliana', 'Considine', '2015-03-24 22:40:02', '2015-03-24 22:40:02', 'Thelma.Rogahn@yahoo.com', '', 0, '(184)443-6530x382', '61732 Huel Lock\nZiemebury, MI 48814'),
(10, '$2y$10$0UBqH2EwbWI.m0qSghHEBeE2pzTE65LG6/WgH8tKCBcA/vlBWmtJe', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Carolanne', 'Jones', '2015-03-24 22:40:02', '2015-03-24 22:40:02', 'Kaleb.Blick@Smitham.com', '', 0, '533-716-7151', '6412 Elbert Ridge Suite 278\nHoppeburgh, PA 37294-0656'),
(11, '$2y$10$kbZpT6RnIQpTIbM2jaBQUeBq1VYw9AQ1l4uUB6lEg6ENxXF5YrBWy', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Bud', 'Parisian', '2015-03-24 22:40:03', '2015-03-24 22:40:03', 'Quitzon.Antonia@Dickens.com', '', 0, '161-943-1755', '073 Stark Ridges\nDuaneborough, OR 41321-2373'),
(12, '$2y$10$bkc4sXcjMJbAHxVkBKBfyO/QY.V8QyKrFIQZZ4DCCpuvhLVJIgL9i', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Freida', 'Bruen', '2015-03-24 22:40:03', '2015-03-24 22:40:03', 'eRenner@Gaylord.biz', '', 0, '02182525444', '00405 Klein Ferry\nGutkowskihaven, MD 62294-9894'),
(13, '$2y$10$DY77KawUojkPUQmBtEiWQOzNdqjUDAbkGD0M4xC6qwn6XB6igB2.6', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Sebastian', 'Bergstrom', '2015-03-24 22:40:03', '2015-03-24 22:40:03', 'Hessel.Loraine@yahoo.com', '', 0, '09637969311', '0096 Owen Port Suite 063\nDoloresview, ID 52054-6017'),
(14, '$2y$10$.KukuYY18WSiP1DVMgK.Nu/Sy.9xlCdm4z4yFhrPudnABl4dkZxci', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Reynold', 'Kihn', '2015-03-24 22:40:03', '2015-03-24 22:40:03', 'Terry.Emmitt@gmail.com', '', 0, '+80(4)4123216479', '93897 Pfannerstill Flats Suite 035\nBartolettiside, DC 25671-5840'),
(15, '$2y$10$GtmsCgw8qiPTfEUDCZyYheAFqns3c.bgJLXUwDIPPULse5EYMua5K', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Alexanne', 'Bashirian', '2015-03-24 22:40:04', '2015-03-24 22:40:04', 'kKoss@yahoo.com', '', 0, '625-930-6417', '7525 Nolan Terrace Apt. 427\nRuthieville, MA 49335-9055'),
(16, '$2y$10$eCD0PoaF9TJVO4wPTOmRbebZPAVbwziV1q3PpStvwBeXiW45iCSWK', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Geoffrey', 'Hoeger', '2015-03-24 22:40:04', '2015-03-24 22:40:04', 'nBeahan@yahoo.com', '', 0, '+50(1)9537458440', '0558 Hank Loaf\nHandshire, HI 02190-5745'),
(17, '$2y$10$EeLASdONtYFyZBCt5gPiLefNA15qOPAZOmb2S.mrAjKyALpe3Tmoq', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Margaret', 'Moore', '2015-03-24 22:40:04', '2015-03-24 22:40:04', 'Adrian.Goodwin@Hamill.com', '', 0, '06380124427', '731 Saige Mountains\nEast Mafalda, AZ 23864-0523'),
(18, '$2y$10$860709jHe3a0a3jhdZvxx.0w.FwYT.6AIJ3T3dst9dIiVrIh4F/Nm', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Lenora', 'Nitzsche', '2015-03-24 22:40:05', '2015-03-24 22:40:05', 'Durgan.Gideon@hotmail.com', '', 0, '350-199-2841', '770 Felicity Estate\nEast Carolynemouth, DC 72490'),
(19, '$2y$10$xDW0jltvNedZnOY/gYDm8ucKYsTZTf/vFLv5pdqY37bzfcBPgIOCW', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Marlen', 'Price', '2015-03-24 22:40:05', '2015-03-24 22:40:05', 'Sanford14@yahoo.com', '', 0, '1-226-884-7444x06754', '3316 Norbert Skyway Suite 615\nAlantown, PA 59003'),
(20, '$2y$10$yV.yS5xsRXIaJGfJfczUg.d7SALAh5vje4vRb9m2DVim7YF53vMla', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Savion', 'Will', '2015-03-24 22:40:05', '2015-03-24 22:40:05', 'Bernier.Bernie@Veum.net', '', 0, '01879646577', '502 Wiegand Cove\nPort Bryon, IN 74120-3111'),
(21, '$2y$10$K7j/FYOcI8xIB9.dvSY44.CNivoQJwrSbTL.dBNOrdWUBHUL1AcpW', NULL, 1, NULL, NULL, '2015-03-25 07:29:03', '$2y$10$glDar.Dhf1.ceTSXGkmlE.ORGC15yaEPRsj0t6s4raHbu9NYyqE8y', NULL, 'JM', 'Ramos', '2015-03-24 22:40:05', '2015-03-25 07:29:03', 'jmramos@creativejose.com', '', 0, '+639054704478', '110 brgy Coloong II Valenzuela City'),
(22, '$2y$10$Zvx8rUwoNDObJhMOa97cQ.PpEDpK.3ENREIxB9gpbdXa4AXh0MMju', NULL, 1, NULL, NULL, '2015-03-25 07:27:26', '$2y$10$Aa/qbC.yFso2GgSx3IZvWOX8.XCVFM/TUsrHllLaXYVDKp1Ohe/S.', NULL, 'Jose Mari', 'Ramos', '2015-03-24 22:40:06', '2015-03-25 07:27:26', 'ramosjosemari@gmail.com', '', 0, '+639054704478', '110 brgy Coloong II Valenzuela City'),
(23, '$2y$10$vc9PL44bN9HEqM3fOixTu.GlHwwlMd2rw/qfDaEY5Q6fkvxlYMZ3i', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Joshua', 'Turingan', '2015-03-24 22:40:06', '2015-03-24 22:40:06', 'turingan.joshua@gmail.com', '', 0, '+639054005755', '983 metom st. brgy. comm. q.c'),
(24, '$2y$10$qy8g8v4GIHzEa3IBwwqtv.qp5vsnhgFnzX2ddi.SdhsGuPUdB7sFy', NULL, 1, NULL, NULL, '2015-03-25 07:28:19', '$2y$10$ctYoAVOAz1iYaWY2U2z8vuxkfQFjspK5TMbDUSHXEJmWTjvv31U5q', NULL, 'Jeanne Ver', 'Relatado', '2015-03-24 22:49:35', '2015-03-25 07:28:19', 'baba@gmail.com', 'R', 1, '+639055222268', 'Taguig');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
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
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 1),
(22, 2),
(23, 2),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_load`
--

CREATE TABLE IF NOT EXISTS `user_load` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_load_user_id_foreign` (`user_id`),
  KEY `user_load_project_id_foreign` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_load`
--

INSERT INTO `user_load` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 22, 1, '2015-03-24 22:48:29', '2015-03-24 22:48:29'),
(2, 24, 1, '2015-03-24 22:51:43', '2015-03-24 22:51:43'),
(3, 22, 2, '2015-03-25 07:09:07', '2015-03-25 07:09:07'),
(4, 24, 2, '2015-03-25 07:09:27', '2015-03-25 07:09:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`),
  ADD CONSTRAINT `approvals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `child_entries`
--
ALTER TABLE `child_entries`
  ADD CONSTRAINT `child_entries_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `quotation_entries` (`id`),
  ADD CONSTRAINT `child_entries_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `quotation_entries` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `other_expenses`
--
ALTER TABLE `other_expenses`
  ADD CONSTRAINT `other_expenses_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `project_load`
--
ALTER TABLE `project_load`
  ADD CONSTRAINT `project_load_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `quotations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quotations_load`
--
ALTER TABLE `quotations_load`
  ADD CONSTRAINT `quotations_load_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`),
  ADD CONSTRAINT `quotations_load_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `quotation_entries`
--
ALTER TABLE `quotation_entries`
  ADD CONSTRAINT `quotation_entries_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `user_load`
--
ALTER TABLE `user_load`
  ADD CONSTRAINT `user_load_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `user_load_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

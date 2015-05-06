CREATE DATABASE  IF NOT EXISTS `silver` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `silver`;
-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: silver
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `approvals`
--

DROP TABLE IF EXISTS `approvals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `approvals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `quotation_id` int(10) unsigned NOT NULL,
  `approval_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `approvals_quotation_id_foreign` (`quotation_id`),
  KEY `approvals_user_id_foreign` (`user_id`),
  CONSTRAINT `approvals_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`),
  CONSTRAINT `approvals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvals`
--

LOCK TABLES `approvals` WRITE;
/*!40000 ALTER TABLE `approvals` DISABLE KEYS */;
/*!40000 ALTER TABLE `approvals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attachments_project_id_foreign` (`project_id`),
  CONSTRAINT `attachments_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `child_entries`
--

DROP TABLE IF EXISTS `child_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `child_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `child_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `child_entries_child_id_foreign` (`child_id`),
  KEY `child_entries_parent_id_foreign` (`parent_id`),
  CONSTRAINT `child_entries_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `quotation_entries` (`id`),
  CONSTRAINT `child_entries_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `quotation_entries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `child_entries`
--

LOCK TABLES `child_entries` WRITE;
/*!40000 ALTER TABLE `child_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `child_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses_values`
--

DROP TABLE IF EXISTS `expenses_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cost` decimal(16,2) NOT NULL,
  `expense_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `quotation_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_values_expense_id_foreign` (`expense_id`),
  KEY `expenses_values_quotation_id_foreign` (`quotation_id`),
  CONSTRAINT `expenses_values_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `other_expenses` (`id`),
  CONSTRAINT `expenses_values_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses_values`
--

LOCK TABLES `expenses_values` WRITE;
/*!40000 ALTER TABLE `expenses_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Administrator','{\"admin\":1}','2015-05-06 02:22:22','2015-05-06 02:22:22'),(2,'Architect','{\"archi\":1}','2015-05-06 02:22:22','2015-05-06 02:22:22'),(3,'Secretary','{\"secre\":1}','2015-05-06 02:22:22','2015-05-06 02:22:22');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `quantity` decimal(16,2) NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `entry_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_quotation_id_foreign` (`quotation_id`),
  KEY `materials_supplier_id_foreign` (`supplier_id`),
  KEY `materials_entry_id_foreign` (`entry_id`),
  CONSTRAINT `materials_entry_id_foreign` FOREIGN KEY (`entry_id`) REFERENCES `quotation_entries` (`id`),
  CONSTRAINT `materials_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotation_entries` (`id`),
  CONSTRAINT `materials_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users',1),('2012_12_06_225929_migration_cartalyst_sentry_install_groups',1),('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot',1),('2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1),('2014_12_27_013847_add_username_to_users_table',2),('2014_12_27_013900_remove_email_to_users_table',2),('2015_01_15_223652_create_projects_table',2),('2015_01_15_224749_create_attachments_table',2),('2015_01_15_225915_create_entries_table',2),('2015_01_15_233638_add_unit_to_entries_table',2),('2015_01_15_234425_create_user_load_table',2),('2015_01_15_235359_add_is_approved_to_user_load_table',2),('2015_01_16_062649_remove_authors_id_to_projects_table',2),('2015_01_16_075837_add_is_author_to_user_load_table',2),('2015_01_18_122043_remove_fields_on_user_load_table',2),('2015_01_18_122513_add_location_to_projects_table',2),('2015_01_18_122846_create_project_load_table',2),('2015_01_18_123552_add_missing_fields_to_entries_table',2),('2015_01_18_125939_remove_material_to_entries_table',2),('2015_01_18_215453_remove_fields_on_entries_table',2),('2015_01_18_215942_add_fields_on_entries_table',2),('2015_01_18_220235_remove_project_id_to_entries_table',2),('2015_01_18_220638_add_project_load_id_to_entries_table',2),('2015_01_18_223940_add_additional_fields_to_users_table',2),('2015_01_19_091912_add_additional_fields_to_projects_table',2),('2015_01_21_015858_add_status_to_project_table',2),('2015_01_21_045602_remove_status_to_project_table',2),('2015_01_21_045654_add_status_to_projects_table',2),('2015_02_02_135658_delete_entries_table',2),('2015_02_02_135847_create_quotations_table',2),('2015_02_02_140341_add_status_to_quotations_table',2),('2015_02_02_140514_create_quotation_entries_table',2),('2015_02_02_141833_create_child_entries_table',2),('2015_02_19_022439_add_unit_on_quotation_entries_table',2),('2015_02_19_050140_add_nullable_to_quotation_entries_table',2),('2015_02_19_050517_add_missing_fields_to_quotation_entries_table',2),('2015_02_19_102838_add_price_to_quotation_entries_table',2),('2015_02_19_110516_add_soft_deletes_to_table',2),('2015_02_19_114726_add_soft_deletes_to_child_entries_table',2),('2015_02_24_064319_add_for_approval_to_quotations_table',2),('2015_03_01_193931_create_approvals_table',2),('2015_03_01_203849_add_status_to_approvals_table',2),('2015_03_08_085018_add_active_quotation_to_projects_table',2),('2015_03_13_094747_create_suppliers_table',2),('2015_03_13_134214_remove_fields_to_projects_table',2),('2015_03_13_141918_create_quotations_load_table',2),('2015_03_14_044755_remove_code_to_projects_table',2),('2015_03_15_194704_create_rates_table',2),('2015_03_15_202928_create_notifications_table',2),('2015_03_17_112845_drop_rates_table',2),('2015_03_17_113223_create_other_expenses_table',2),('2015_03_17_143535_remove_price_on_entries_table',2),('2015_03_17_144109_add_fields_to_quotation_entries_table',2),('2015_03_17_213059_remove_quantity_on_quotation_entries_table',2),('2015_03_17_214152_add_quantity_on_quotation_entries_table',2),('2015_03_17_215547_add_grand_total_to_quotations_table',2),('2015_03_18_113739_add_rates_on_quotations_table',2),('2015_03_22_171211_add_adjustments_on_quotations_table',2),('2015_03_24_224705_create_budgets_table',2),('2015_03_24_232833_add_remarks_on_budgets_table',2),('2015_03_25_072507_add_soft_deletes_on_budgets_table',2),('2015_03_25_144304_add_supplier_id_to_budgets_table',2),('2015_04_01_111720_remove_fields_on_quotation_entries_table',2),('2015_04_01_120246_create_values_table',2),('2015_04_01_134910_add_parent_id_on_quotation_entries_table',2),('2015_04_07_215709_drop_budgets_table',2),('2015_04_07_220343_create_materials_table',2),('2015_04_12_092144_remove_fields_on_other_expenses_table',2),('2015_04_12_093104_add_fields_on_other_expenses_table',2),('2015_04_12_151847_create_expenses_values_table',2),('2015_04_12_214317_add_quotation_id_on_expenses_values_table',2),('2015_04_25_085112_add_entry_id_to_materials_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `other_expenses`
--

DROP TABLE IF EXISTS `other_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `other_expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_expenses`
--

LOCK TABLES `other_expenses` WRITE;
/*!40000 ALTER TABLE `other_expenses` DISABLE KEYS */;
INSERT INTO `other_expenses` VALUES (1,'2015-05-06 02:22:33','2015-05-06 02:22:33','Mobilization'),(2,'2015-05-06 02:22:33','2015-05-06 02:22:33','Demobilization'),(3,'2015-05-06 02:22:33','2015-05-06 02:22:33','Bonds/Ins'),(4,'2015-05-06 02:22:33','2015-05-06 02:22:33','Permits'),(5,'2015-05-06 02:22:34','2015-05-06 02:22:34','Contractors Tax'),(6,'2015-05-06 02:22:34','2015-05-06 02:22:34','Supervision'),(7,'2015-05-06 02:22:34','2015-05-06 02:22:34','TK/Foreman'),(8,'2015-05-06 02:22:34','2015-05-06 02:22:34','Office Staff'),(9,'2015-05-06 02:22:34','2015-05-06 02:22:34','Office Suppplies'),(10,'2015-05-06 02:22:34','2015-05-06 02:22:34','Transportation Staff'),(11,'2015-05-06 02:22:34','2015-05-06 02:22:34','Communication'),(12,'2015-05-06 02:22:34','2015-05-06 02:22:34','Tools/equipt.'),(13,'2015-05-06 02:22:34','2015-05-06 02:22:34','Barracks'),(14,'2015-05-06 02:22:34','2015-05-06 02:22:34','temfacil'),(15,'2015-05-06 02:22:34','2015-05-06 02:22:34','TOILET'),(16,'2015-05-06 02:22:34','2015-05-06 02:22:34','H. Keeping'),(17,'2015-05-06 02:22:34','2015-05-06 02:22:34','Demolition'),(18,'2015-05-06 02:22:34','2015-05-06 02:22:34','Handling'),(19,'2015-05-06 02:22:34','2015-05-06 02:22:34','Hauling materials'),(20,'2015-05-06 02:22:34','2015-05-06 02:22:34','Hauling out of debris'),(21,'2015-05-06 02:22:34','2015-05-06 02:22:34','Utilities Water'),(22,'2015-05-06 02:22:34','2015-05-06 02:22:34','Utilities Electric'),(23,'2015-05-06 02:22:34','2015-05-06 02:22:34','Temp Util Deposits'),(24,'2015-05-06 02:22:34','2015-05-06 02:22:34','Safety'),(25,'2015-05-06 02:22:34','2015-05-06 02:22:34','Rep'),(26,'2015-05-06 02:22:34','2015-05-06 02:22:34','Bodegero w/ Cellphone'),(27,'2015-05-06 02:22:34','2015-05-06 02:22:34','Professional Fee'),(28,'2015-05-06 02:22:34','2015-05-06 02:22:34','Reports'),(29,'2015-05-06 02:22:35','2015-05-06 02:22:35','Plans'),(30,'2015-05-06 02:22:35','2015-05-06 02:22:35','As-built plans'),(31,'2015-05-06 02:22:35','2015-05-06 02:22:35','Shop drawing'),(32,'2015-05-06 02:22:35','2015-05-06 02:22:35','Board up'),(33,'2015-05-06 02:22:35','2015-05-06 02:22:35','Signboards'),(34,'2015-05-06 02:22:35','2015-05-06 02:22:35','Signals & warnings'),(35,'2015-05-06 02:22:35','2015-05-06 02:22:35','Sec guard'),(36,'2015-05-06 02:22:35','2015-05-06 02:22:35','Protection of prop'),(37,'2015-05-06 02:22:35','2015-05-06 02:22:35','exhaust fans/vac'),(38,'2015-05-06 02:22:35','2015-05-06 02:22:35','ads'),(39,'2015-05-06 02:22:35','2015-05-06 02:22:35','messenger'),(40,'2015-05-06 02:22:35','2015-05-06 02:22:35','janitor'),(41,'2015-05-06 02:22:35','2015-05-06 02:22:35','Testing and Commissioning'),(42,'2015-05-06 02:22:35','2015-05-06 02:22:35','Restoration'),(43,'2015-05-06 02:22:35','2015-05-06 02:22:35','Nurse'),(44,'2015-05-06 02:22:35','2015-05-06 02:22:35','Final Cleaning'),(45,'2015-05-06 02:22:35','2015-05-06 02:22:35','Scaffolding'),(46,'2015-05-06 02:22:35','2015-05-06 02:22:35','Line/Grade'),(47,'2015-05-06 02:22:35','2015-05-06 02:22:35','Health Certificate'),(48,'2015-05-06 02:22:35','2015-05-06 02:22:35','Warranty');
/*!40000 ALTER TABLE `other_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_load`
--

DROP TABLE IF EXISTS `project_load`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_load` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_approved` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `project_load_project_id_foreign` (`project_id`),
  CONSTRAINT `project_load_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_load`
--

LOCK TABLES `project_load` WRITE;
/*!40000 ALTER TABLE `project_load` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_load` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Bagito Online Casino','Online Casino','2015-05-06 02:22:35','2015-05-06 02:22:35','Bagito City'),(2,'Harvest Moon','Park Casino','2015-05-06 02:22:35','2015-05-06 02:22:35','Metro Manila'),(3,'Great Mood Sinkship','Trending Casino','2015-05-06 02:22:35','2015-05-06 02:22:35','Pampanga'),(4,'Dream Suite','Online Casino','2015-05-06 02:22:36','2015-05-06 02:22:36','Baguio City');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_entries`
--

DROP TABLE IF EXISTS `quotation_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_entries`
--

LOCK TABLES `quotation_entries` WRITE;
/*!40000 ALTER TABLE `quotation_entries` DISABLE KEYS */;
INSERT INTO `quotation_entries` VALUES (1,1,'Preliminaries','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,0),(2,1,'Architectural Works','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,0),(3,1,'Electrical Works','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,0),(4,1,'Plumbing Works','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,0),(5,1,'Mechanical Works','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,0),(6,2,'Preliminaries','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,1),(7,2,'Partitional Works','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,2),(8,2,'Floor Finishes','2015-05-06 02:22:28','2015-05-06 02:22:28',NULL,NULL,2),(9,2,'Wall Finishes','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,2),(10,2,'Ceiling Finishes','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,2),(11,2,'Doors','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,2),(12,2,'Cashier','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,2),(13,2,'Glass Works','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,2),(14,2,'Miscellaneous','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,2),(15,2,'Panel Boards And Breakers','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(16,2,'Conduit Boxes and Fittings','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(17,2,'Hangers and Supports','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(18,2,'Wires and Cables','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(19,2,'Wiring Devices','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(20,2,'Lighting Fixtures','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(21,2,'Auxiliary Systems','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(22,2,'Miscellaneous','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,3),(23,2,'Toilet/Kitchen Fixtures','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,4),(24,2,'Toilet Accessories','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,4),(25,2,'Rough-ins','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,4),(26,2,'Mechanical Works','2015-05-06 02:22:29','2015-05-06 02:22:29',NULL,NULL,5),(27,3,'Mobilization / Demobilization','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(28,3,'Temporary Facilities','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(29,3,'Demolition Works','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(30,3,'General Cleaning and Clearing of Site','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(31,3,'Tools and Equipment','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(32,3,'Handling and Hauling of Materials','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(33,3,'Testing and Commissioning','2015-05-06 02:22:29','2015-05-06 02:22:29','LOT',NULL,6),(34,3,'100 mm chb wall','2015-05-06 02:22:29','2015-05-06 02:22:29','SQM',NULL,7),(35,3,'Drywall wall Partition','2015-05-06 02:22:29','2015-05-06 02:22:29','SQM',NULL,7),(36,3,'Designed Wood Slats','2015-05-06 02:22:29','2015-05-06 02:22:29','SQM',NULL,7),(37,3,'FF-01 600x600mm non-skid Homogenous Tiles (Architect White Rock,Architect White Matt)','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,8),(38,3,'FF-03 300x300mm non-skid Ceramic tiles (Maskara White)','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,8),(39,3,'FF-4A 600x600mm Carpet Tiles Blue','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,8),(40,3,'300x300mm Ceramic tiles (Maskara White)','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,9),(41,3,'Painted Finish (color to be verified)','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,9),(42,3,'Laminated Finish','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,9),(43,3,'CF-1 12mm thk. Gypsum Board on Metal Furring on Latex Flat Painted Finish','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,10),(44,3,'Cove Ceiling Painted finish (color to be verified)','2015-05-06 02:22:30','2015-05-06 02:22:30','LM',NULL,10),(45,3,'D1- 2100x900mm - Glass door & 12mm thk. clear Tempered glass door frameless ','2015-05-06 02:22:30','2015-05-06 02:22:30','SETS',NULL,11),(46,3,'D5- 2100x700mm - 45mm thk. Hollow Core HDF door w/ Wooden Louver','2015-05-06 02:22:30','2015-05-06 02:22:30','SETS',NULL,11),(47,3,'D6- 2100x600mm - 45mm thk. Hollow Core HDF door w/ Wooden Louver','2015-05-06 02:22:30','2015-05-06 02:22:30','SETS',NULL,11),(48,3,'D7- 2100x500mm - 45mm thk. Hollow Core HDF door w/ Wooden Louver','2015-05-06 02:22:30','2015-05-06 02:22:30','SETS',NULL,11),(49,3,'Cahier Drawers in Ducco Finish','2015-05-06 02:22:30','2015-05-06 02:22:30','SETS',NULL,12),(50,3,'Cashier Booth with Shelves','2015-05-06 02:22:30','2015-05-06 02:22:30','LOT',NULL,12),(51,3,'Granite countertop for Cashier Counter','2015-05-06 02:22:30','2015-05-06 02:22:30','LM',NULL,12),(52,3,'EE Cabinet Painted Finish','2015-05-06 02:22:30','2015-05-06 02:22:30','LOT',NULL,12),(53,3,'Cahier Glass w/ Holes','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,13),(54,3,'Cahier Glass w/ Holes','2015-05-06 02:22:30','2015-05-06 02:22:30','SQM',NULL,13),(55,3,'Signage','2015-05-06 02:22:30','2015-05-06 02:22:30','PCS',NULL,14),(56,3,'Panel MDP','2015-05-06 02:22:30','2015-05-06 02:22:30','ASSY',NULL,15),(57,3,'Panel LP','2015-05-06 02:22:30','2015-05-06 02:22:30','ASSY',NULL,15),(58,3,'Panel PAC','2015-05-06 02:22:30','2015-05-06 02:22:30','ASSY',NULL,15),(59,3,'8-40AT, 2P, 230V, BOLT-ON IN NEMA-3R ENCLOSURE','2015-05-06 02:22:31','2015-05-06 02:22:31','SET',NULL,15),(60,3,'1-30AT, 2P, 230V, BOLT-ON IN NEMA-3R ENCLOSURE','2015-05-06 02:22:31','2015-05-06 02:22:31','SET',NULL,15),(61,3,'2-20AT, 2P, 230V, BOLT-ON IN NEMA-3R ENCLOSURE','2015-05-06 02:22:31','2015-05-06 02:22:31','SET',NULL,15),(62,3,'63mm Ø IMC Pipe , With Coupling','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(63,3,'63mm Ø IMC Locknut and Bushing','2015-05-06 02:22:31','2015-05-06 02:22:31','PAIRS',NULL,16),(64,3,'63mm Ø Entrance Cap','2015-05-06 02:22:31','2015-05-06 02:22:31','PAIRS',NULL,16),(65,3,'32mm Ø PVC Pipe , With Coupling','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(66,3,'32mm Ø PVC Adopter w/ Locknut','2015-05-06 02:22:31','2015-05-06 02:22:31','PAIRS',NULL,16),(67,3,'25mm  Ø PVCPipe, With Coupling','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(68,3,'25mm  Ø PVC Connector/Adoptor','2015-05-06 02:22:31','2015-05-06 02:22:31','PAIRS',NULL,16),(69,3,'20mm Ø PVC Pipe , With Coupling','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(70,3,'20mm Ø PVC Elbow','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(71,3,'20mm Ø PVC  Connector/Adoptor','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(72,3,'Utility Box G.I','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(73,3,'Junction Boxes G.I','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(74,3,'Square Boxes G.I','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(75,3,'G.I. Tie Wire','2015-05-06 02:22:31','2015-05-06 02:22:31','PCS',NULL,16),(76,3,'15mm  Ø Grounding Rod','2015-05-06 02:22:31','2015-05-06 02:22:31','PC',NULL,16),(77,3,'15mm  Ø Grounding Terminal Clamp','2015-05-06 02:22:31','2015-05-06 02:22:31','PC',NULL,16),(78,3,'Hangers and Suppors','2015-05-06 02:22:31','2015-05-06 02:22:31','LOT',NULL,17),(79,3,'50mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','M',NULL,18),(80,3,'22mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','M',NULL,18),(81,3,'14mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','M',NULL,18),(82,3,'8.0mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','ROLLS',NULL,18),(83,3,'5.5mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','ROLLS',NULL,18),(84,3,'3.5mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','ROLLS',NULL,18),(85,3,'2.0mm2 THHN','2015-05-06 02:22:31','2015-05-06 02:22:31','ROLLS',NULL,18),(86,3,'CAT-5 - 5/P Cable D-Link Brand','2015-05-06 02:22:32','2015-05-06 02:22:32','M',NULL,18),(87,3,'CAT-5 - 2/P Cable D-Link Brand','2015-05-06 02:22:32','2015-05-06 02:22:32','M',NULL,18),(88,3,'RG59 Coaxial Cable','2015-05-06 02:22:32','2015-05-06 02:22:32','M',NULL,18),(89,3,'#18 AWG T.F Wire','2015-05-06 02:22:32','2015-05-06 02:22:32','M',NULL,18),(90,3,'Miscellaneous','2015-05-06 02:22:32','2015-05-06 02:22:32','LOT',NULL,18),(91,3,'Single Convenience Outlet','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(92,3,'Duplex Convenience Outlet','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(93,3,'Data Outlet','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(94,3,'CATV Outlet','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(95,3,'Telephone Outlet','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(96,3,'Wall Switches One Gang','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(97,3,'Wall Switches Two Gang','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,19),(98,3,'Pinlights square','2015-05-06 02:22:32','2015-05-06 02:22:32','PC',NULL,20),(99,3,'T-5 Fluorescent Light','2015-05-06 02:22:32','2015-05-06 02:22:32','M',NULL,20),(100,3,'Emergency Lights','2015-05-06 02:22:32','2015-05-06 02:22:32','PC',NULL,20),(101,3,'Smoke Detector','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,21),(102,3,'Heat Detector','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,21),(103,3,'FACD 4 Zones (Conventional)','2015-05-06 02:22:32','2015-05-06 02:22:32','SET',NULL,21),(104,3,'Fire Bell and Manual Pull Station','2015-05-06 02:22:32','2015-05-06 02:22:32','SETS',NULL,21),(105,3,'Telephone Terminal Cabinet (TTC)','2015-05-06 02:22:32','2015-05-06 02:22:32','ASSY',NULL,21),(106,3,'Exit Light ','2015-05-06 02:22:32','2015-05-06 02:22:32','ASSY',NULL,21),(107,3,'Testing and Commissioning','2015-05-06 02:22:32','2015-05-06 02:22:32','LOT',NULL,22),(108,3,'Mobilization','2015-05-06 02:22:32','2015-05-06 02:22:32','LOT',NULL,22),(109,3,'As-Built Plan','2015-05-06 02:22:32','2015-05-06 02:22:32','LOT',NULL,22),(110,3,'Water closet (OSM)','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(111,3,'Urinal (OSM)','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(112,3,'Lavatory (OSM)','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(113,3,'Lavatory Faucet (OSM)','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(114,3,'Stainless Steel Kitchen Sink','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(115,3,'Slop Sink Faucet (OSM)','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(116,3,'Floor Drain','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(117,3,'Miscellaneous','2015-05-06 02:22:33','2015-05-06 02:22:33','LOT',NULL,23),(118,3,'Sub-meter','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,23),(119,3,'Septic Tank (As Per Plan)','2015-05-06 02:22:33','2015-05-06 02:22:33','UNIT',NULL,23),(120,3,'Toilet Paper Holder (OSM)','2015-05-06 02:22:33','2015-05-06 02:22:33','PCS',NULL,24),(121,3,'1100mm x 60mm x 6mm THK mirror on 6mm THK marine plywood backing','2015-05-06 02:22:33','2015-05-06 02:22:33','SETS',NULL,24),(122,3,'Roughing-ins and Accessories','2015-05-06 02:22:33','2015-05-06 02:22:33','LOT',NULL,25),(123,3,' 1.5 HP wall Mounted Aircon Unit','2015-05-06 02:22:33','2015-05-06 02:22:33','PC',NULL,26),(124,3,' 1Hp Wall Mounted Aircon Unit','2015-05-06 02:22:33','2015-05-06 02:22:33','PC',NULL,26),(125,3,' Exhaust Grille','2015-05-06 02:22:33','2015-05-06 02:22:33','PC',NULL,26),(126,3,' Fresh Air Grille','2015-05-06 02:22:33','2015-05-06 02:22:33','PC',NULL,26),(127,3,' Ducting','2015-05-06 02:22:33','2015-05-06 02:22:33','LOT',NULL,26),(128,3,' Air Duct Blower','2015-05-06 02:22:33','2015-05-06 02:22:33','LOT',NULL,26);
/*!40000 ALTER TABLE `quotation_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotations`
--

DROP TABLE IF EXISTS `quotations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotations` (
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
  KEY `quotations_user_id_foreign` (`user_id`),
  CONSTRAINT `quotations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `quotations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotations`
--

LOCK TABLES `quotations` WRITE;
/*!40000 ALTER TABLE `quotations` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotations_load`
--

DROP TABLE IF EXISTS `quotations_load`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotations_load` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `quotation_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `quotations_load_project_id_foreign` (`project_id`),
  KEY `quotations_load_quotation_id_foreign` (`quotation_id`),
  CONSTRAINT `quotations_load_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `quotations_load_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotations_load`
--

LOCK TABLES `quotations_load` WRITE;
/*!40000 ALTER TABLE `quotations_load` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotations_load` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Silverado Inc','Supplier of hardware materials','Antipolo City','','2015-05-06 02:26:40','2015-05-06 02:26:40'),(2,'Company 123','My Company','huehuehue','1234','2015-05-06 02:27:23','2015-05-06 02:27:23');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` VALUES (1,21,'127.0.0.1',0,0,0,NULL,NULL,NULL),(2,22,'127.0.0.1',0,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_load`
--

DROP TABLE IF EXISTS `user_load`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_load` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_load_user_id_foreign` (`user_id`),
  KEY `user_load_project_id_foreign` (`project_id`),
  CONSTRAINT `user_load_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `user_load_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_load`
--

LOCK TABLES `user_load` WRITE;
/*!40000 ALTER TABLE `user_load` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_load` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$8aZnIzqy8cjqPEaY0taw4OXu4IUr4p0arGTC..LEznDPojkkME2Ry',NULL,1,NULL,NULL,NULL,NULL,NULL,'Adeline','Dach','2015-05-06 02:22:22','2015-05-06 02:22:22','hMitchell@Moen.biz','',0,'02019208622','6829 Strosin Plains\nEast Griffin, DE 31266'),(2,'$2y$10$F5M5Ed8OYCpQmAZPayB5HOIBP5.YqfnQfKOnujEdBd8at1jFz4Mi2',NULL,1,NULL,NULL,NULL,NULL,NULL,'Clyde','Prohaska','2015-05-06 02:22:22','2015-05-06 02:22:22','Carroll.Deckow@Treutel.net','',0,'1-478-028-1651x880','1265 Toy Burg Suite 610\nNew Marleeview, TX 47167-0897'),(3,'$2y$10$EN1RVHc8zku3B4FDx.oYfeEppB6SHgsggSGe0zwemg7IKovWH/SZ.',NULL,1,NULL,NULL,NULL,NULL,NULL,'Rowena','Adams','2015-05-06 02:22:23','2015-05-06 02:22:23','pKutch@Marvin.com','',0,'(982)048-6421x526','54668 Kaylie Locks\nPagacstad, NM 88659'),(4,'$2y$10$8gHAiF8mP7eeyktMgbXMEODjBcLUxUs6tvVseRhPQn9U/t3dOJyF.',NULL,1,NULL,NULL,NULL,NULL,NULL,'Vicenta','Hodkiewicz','2015-05-06 02:22:23','2015-05-06 02:22:23','nRoberts@gmail.com','',0,'(482)302-3219x3534','113 Demetrius Mountains\nSouth Tatyanabury, WI 39436'),(5,'$2y$10$A2UcOoU804lngtXw0I.YLO/TmlNztRXEcS1.7XROAqgnV6H0w.WAu',NULL,1,NULL,NULL,NULL,NULL,NULL,'Coty','Koch','2015-05-06 02:22:23','2015-05-06 02:22:23','Jacobson.Ola@hotmail.com','',0,'984-702-5613','667 Jerel Loop\nSouth Annabelstad, CA 38590-0440'),(6,'$2y$10$/eEjNJoHPZfBf2BeLGUa7egwEwCVPvH.LdydUn7wZ7JGpRsxbXd/i',NULL,1,NULL,NULL,NULL,NULL,NULL,'Fabiola','Windler','2015-05-06 02:22:23','2015-05-06 02:22:23','Sarah.Jacobi@Daniel.org','',0,'+31(4)0696313014','25376 Gibson Pine\nSouth Leo, LA 93159-0360'),(7,'$2y$10$FJhfykrH83rGMyioK2hN4uwEVmxw0LqessJRA2J3JzqrZhh0dlJuG',NULL,1,NULL,NULL,NULL,NULL,NULL,'Phyllis','Rohan','2015-05-06 02:22:24','2015-05-06 02:22:24','sBraun@Heidenreich.org','',0,'1-023-252-5009x619','382 Norma Branch Apt. 069\nWest Khalil, CT 20586-6135'),(8,'$2y$10$H.vpGJAIcVpgLSw/j51QUe8/iIJk7traQVgTK0GvYYjzb4MHYbT1q',NULL,1,NULL,NULL,NULL,NULL,NULL,'Elna','Rutherford','2015-05-06 02:22:24','2015-05-06 02:22:24','Oran99@Gottlieb.com','',0,'244.927.4697','31545 Gibson Mount\nAvashire, SD 82892-6227'),(9,'$2y$10$ZBR2GAVTEUPxxcO9akR1TeyoeqfNQyu.V4bbDHbEd2nTQVl/aHcbe',NULL,1,NULL,NULL,NULL,NULL,NULL,'Annamarie','Wolf','2015-05-06 02:22:24','2015-05-06 02:22:24','Thad19@hotmail.com','',0,'905-237-4413x39479','094 Rogers Hill Apt. 902\nErdmanburgh, IA 01548'),(10,'$2y$10$ghhGOdMLBZsu0X/JiRCm3u6U/ne2SdU4KmLYwN3jLZ0gVFEpqRL4W',NULL,1,NULL,NULL,NULL,NULL,NULL,'Don','Hodkiewicz','2015-05-06 02:22:24','2015-05-06 02:22:24','Ima.Abshire@hotmail.com','',0,'668-581-8687x917','575 Uriel Key\nEast Manleyfort, NY 47135'),(11,'$2y$10$yLGNsfmABQPZvdVy3O5dKOBisci5QXgmNNcTOTeCTFb2r3T6QswTK',NULL,1,NULL,NULL,NULL,NULL,NULL,'Casimer','Treutel','2015-05-06 02:22:24','2015-05-06 02:22:24','Davis.Carmela@hotmail.com','',0,'1-733-135-6763','0840 Cruickshank Plains Suite 754\nLake Jeanieberg, FL 06714'),(12,'$2y$10$dD.zVov5nCiGbUOqrsgZleYumXJISnRAmOe4/0XTJZLoWtpUgUHoW',NULL,1,NULL,NULL,NULL,NULL,NULL,'Sandra','Schuster','2015-05-06 02:22:25','2015-05-06 02:22:25','Grady86@Hammes.net','',0,'(873)495-1519x0025','5397 Ursula Walk\nNorth Coraliemouth, WA 00073'),(13,'$2y$10$yfpt8Vondwd2jl3g23.UAOVsOwfA.US2olhhpeV1OX9XWahWfmCn.',NULL,1,NULL,NULL,NULL,NULL,NULL,'Arnaldo','Wisoky','2015-05-06 02:22:25','2015-05-06 02:22:25','Medhurst.Ethel@hotmail.com','',0,'423-462-2179','39728 Wilkinson Way Suite 882\nEast Nyahburgh, GA 46343-9191'),(14,'$2y$10$Dfl.KkKkdhmMzgM0Y59Z/OSkvvJl2vQMbstKwcKvR2/KecTg7eSJm',NULL,1,NULL,NULL,NULL,NULL,NULL,'Verona','Osinski','2015-05-06 02:22:25','2015-05-06 02:22:25','Gutmann.Willow@Prohaska.org','',0,'830-924-4405x58961','13609 Thalia Port Apt. 587\nBechtelarstad, FL 32567'),(15,'$2y$10$t.91v8YsqTeYRCL7drys2.lEb1Cw0O3uI0CwLxhpotIGFCU6HHLvS',NULL,1,NULL,NULL,NULL,NULL,NULL,'Opal','Tremblay','2015-05-06 02:22:25','2015-05-06 02:22:25','bGutkowski@Raynor.com','',0,'1-386-914-7480','476 Renner Freeway\nHauckchester, AL 01852-1167'),(16,'$2y$10$dLNkQzA4KBh7EP0BYyDwhOUZpMv359BpowPb0q7ew6T.7Gjl1nuKi',NULL,1,NULL,NULL,NULL,NULL,NULL,'Alford','Bednar','2015-05-06 02:22:26','2015-05-06 02:22:26','iStracke@gmail.com','',0,'1-860-004-2902','109 Braden Forges Apt. 450\nStiedemannhaven, MS 01211-9750'),(17,'$2y$10$NnEbdXESb5ijV6z/FywH.udK73iTj9KfL6RqPnC5l84jQo/7EwuQC',NULL,1,NULL,NULL,NULL,NULL,NULL,'Letitia','Ankunding','2015-05-06 02:22:26','2015-05-06 02:22:26','Hillard.Cummings@Morissette.net','',0,'(549)518-5444x04851','0576 Zola Crescent Apt. 890\nCreminstad, TN 46291'),(18,'$2y$10$LRBIEZcIXXR750us0maoRerTAY0Uy3p5nDKjhLaTwjevgOrJHN1B2',NULL,1,NULL,NULL,NULL,NULL,NULL,'Laury','Waelchi','2015-05-06 02:22:26','2015-05-06 02:22:26','zBrakus@yahoo.com','',0,'801-757-3046','7179 Maia Route Suite 361\nPort Gardner, DE 34188-9028'),(19,'$2y$10$TLERfse45HwG12D2bzFMYuVj7t.64feLdkBq8Dq.jUyuf275Uq2xu',NULL,1,NULL,NULL,NULL,NULL,NULL,'Kristofer','Jakubowski','2015-05-06 02:22:26','2015-05-06 02:22:26','Dickens.Winona@gmail.com','',0,'1-406-825-7457x3691','67073 Felton Garden Apt. 649\nRoscoeburgh, MN 05382-8817'),(20,'$2y$10$nbPpVy504Z..n7V/p7zEWuiDV.NME2wnB1mC76tFeIYqncN7Amn9q',NULL,1,NULL,NULL,NULL,NULL,NULL,'Maurice','Schmidt','2015-05-06 02:22:27','2015-05-06 02:22:27','Schiller.Flavio@Lakin.info','',0,'808-211-8087','43436 Dooley Street Suite 009\nEast Zora, KY 41777-1094'),(21,'$2y$10$kdCdNvBQGlxg4ffbfxrXouWKOo8yEKNIWKVaz/24H1eydK/HMlI7u',NULL,1,NULL,NULL,'2015-05-06 02:36:32','$2y$10$Z7x.YBBvzZsTKAI0ag.vre/Bha0FvAhn3D7oTb/lZuQtFkcPG0If.',NULL,'JM','Ramos','2015-05-06 02:22:27','2015-05-06 02:36:32','jmramos@creativejose.com','',0,'+639054704478','110 brgy Coloong II Valenzuela City'),(22,'$2y$10$rNdYVjDZDpypnZGjIomJdeQrkSIkQllYrkjILH4ug7kjcUqdzMj0e',NULL,1,NULL,NULL,'2015-05-06 02:36:03','$2y$10$OfBwj5d04TUgdzfX04gN8eWHx6P5c9iLcLRDwa8lA3b.BZacDKU3.',NULL,'Jose Mari','Ramos','2015-05-06 02:22:27','2015-05-06 02:36:03','ramosjosemari@gmail.com','',0,'+639054704478','110 brgy Coloong II Valenzuela City'),(23,'$2y$10$CYfAH1DzNw./lQSO94MHieEcA6RjM0goIfHvcP1iSe/EQxPmdLPTu',NULL,1,NULL,NULL,NULL,NULL,NULL,'Joshua','Turingan','2015-05-06 02:22:27','2015-05-06 02:22:27','turingan.joshua@gmail.com','',0,'+639054005755','983 metom st. brgy. comm. q.c'),(24,'$2y$10$BwcN56JR67LFfT5rVuzoBuJlj.tCPvukYSlDBWjjv0kNUYHPXiV1q',NULL,1,NULL,NULL,NULL,NULL,NULL,'Joshua','Turingan','2015-05-06 02:22:28','2015-05-06 02:22:28','tors@gmail.com','',0,'+639054005755','983 metom st. brgy. comm. q.c'),(25,'$2y$10$bsUirBwiorjYIHRr1.l6KeoQQjnISdhwTP62phNa28H4FoWo1X.gu',NULL,1,NULL,NULL,NULL,NULL,NULL,'Jeanne Ver','Relatado','2015-05-06 02:22:28','2015-05-06 02:22:28','baba@gmail.com','',0,'+639055024485','Purok II Muntinlupa City');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,1),(22,2),(23,2),(24,3),(25,3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `values`
--

DROP TABLE IF EXISTS `values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` decimal(16,2) NOT NULL,
  `ul` decimal(16,2) NOT NULL,
  `um` decimal(16,2) NOT NULL,
  `tl` decimal(16,2) NOT NULL,
  `tm` decimal(16,2) NOT NULL,
  `dc` decimal(16,2) NOT NULL,
  `entry_id` int(10) unsigned NOT NULL,
  `quotation_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `values_entry_id_foreign` (`entry_id`),
  KEY `values_quotation_id_foreign` (`quotation_id`),
  CONSTRAINT `values_entry_id_foreign` FOREIGN KEY (`entry_id`) REFERENCES `quotation_entries` (`id`),
  CONSTRAINT `values_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `values`
--

LOCK TABLES `values` WRITE;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
/*!40000 ALTER TABLE `values` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-06 10:46:47

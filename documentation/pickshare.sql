-- MySQL dump 10.13  Distrib 8.0.34, for Linux (aarch64)
--
-- Host: localhost    Database: pickshare
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book_requests`
--

DROP TABLE IF EXISTS `book_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `pickup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journeyDate` date NOT NULL,
  `journeyTime` time NOT NULL,
  `personCount` int NOT NULL,
  `journeyDetails` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contracted_id` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `book_requests_user_id_foreign` (`user_id`),
  CONSTRAINT `book_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_requests`
--

LOCK TABLES `book_requests` WRITE;
/*!40000 ALTER TABLE `book_requests` DISABLE KEYS */;
INSERT INTO `book_requests` VALUES (1,1,'Dhaka','Sirajganj','2023-09-06','15:51:00',5,'Journey with family','2023-08-29 09:49:48','2023-08-29 09:52:19',1),(2,1,'Dhaka','Kishoreganj','2023-10-16','14:50:00',6,'Family','2023-08-30 08:48:17','2023-09-01 19:22:50',9),(3,3,'Kishoreganj','Dhaka','2023-10-04','17:58:00',8,'Journey with family need to small 2 cars','2023-08-30 08:58:51','2023-08-30 08:58:51',0),(4,2,'Sirajganj','Kishoreganj','2023-09-18','17:01:00',2,'Travel','2023-08-30 09:01:04','2023-08-30 09:01:04',0),(5,1,'Dhaka','Kushita','2023-09-10','14:46:00',7,'Friends and family needs to receive from our home. House number and road number will mention after contract.','2023-08-30 16:44:12','2023-08-30 16:44:12',0),(6,12,'agargaon','shyamoly','2023-08-31','21:08:00',5,'good','2023-08-31 15:08:53','2023-08-31 15:11:02',7),(7,12,'dhaka','barisal','2023-08-31','21:38:00',3,'from adabar','2023-08-31 15:40:03','2023-08-31 15:42:35',8),(8,1,'Dhaka','Thailand','2023-09-01','20:27:00',10,'Funny Travel','2023-09-01 14:27:39','2023-09-01 14:27:39',0),(9,12,'farmgate','SAvar','2023-09-01','20:24:00',5,'good','2023-09-01 14:27:46','2023-09-01 17:34:23',10),(10,15,'Dhaka','Barisal','2023-09-03','12:05:00',4,'lorem ipsum','2023-09-03 06:07:00','2023-09-03 06:07:00',0),(11,8,'dhaka','cumilla','2023-09-04','01:52:00',6,'ch5rc5rfr5','2023-09-03 07:10:44','2023-09-03 07:12:13',11),(12,1,'Khulna','Kuliarchar','2023-09-29','19:39:00',101,'Tour','2023-09-29 13:40:42','2023-09-29 13:40:42',0);
/*!40000 ALTER TABLE `book_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contracts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_request_id` bigint unsigned NOT NULL,
  `requester_user_id` bigint unsigned NOT NULL,
  `driver_user_id` bigint unsigned NOT NULL,
  `driver_request_amount` decimal(10,2) NOT NULL,
  `contract_amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contracted_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `proposal` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `contracts_book_request_id_foreign` (`book_request_id`),
  KEY `contracts_requester_user_id_foreign` (`requester_user_id`),
  KEY `contracts_driver_user_id_foreign` (`driver_user_id`),
  CONSTRAINT `contracts_book_request_id_foreign` FOREIGN KEY (`book_request_id`) REFERENCES `book_requests` (`id`),
  CONSTRAINT `contracts_driver_user_id_foreign` FOREIGN KEY (`driver_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `contracts_requester_user_id_foreign` FOREIGN KEY (`requester_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` VALUES (1,1,1,2,5000.00,4500.00,NULL,'2023-08-29',1,'2023-08-29 09:51:08','2023-08-29 09:53:08','Hello, I am interested for ride with you and my proposal amount are given also.'),(2,1,1,4,5000.00,NULL,NULL,NULL,0,'2023-08-30 08:46:27','2023-08-30 08:46:27','Hello, I am interested for ride with you and my proposal amount are given also.'),(3,2,1,2,3000.00,NULL,NULL,NULL,2,'2023-08-30 08:48:54','2023-08-30 08:50:25','Hello, I am interested for ride with you and my proposal amount are given also.'),(4,2,1,4,1800.00,NULL,NULL,NULL,2,'2023-08-30 08:49:30','2023-08-31 08:09:44','Hello, I am interested for ride with you and my proposal amount are given also.'),(5,3,3,2,7000.00,NULL,NULL,NULL,0,'2023-08-30 08:59:16','2023-08-30 08:59:16','I have 2 cars'),(6,5,1,11,400.00,NULL,NULL,NULL,0,'2023-08-31 14:56:56','2023-08-31 14:56:56','Hello, I am interested for ride with you and my proposal amount are given also.'),(7,6,12,11,200.00,200.00,NULL,'2023-08-31',1,'2023-08-31 15:09:57','2023-08-31 15:11:47','Hello, I am interested for ride with you and my proposal amount are given also.'),(8,7,12,11,700.00,700.00,NULL,'2023-08-31',1,'2023-08-31 15:41:13','2023-08-31 15:43:34','Hello, I am interested for ride with you and my proposal amount are given also.'),(9,2,1,13,3000.00,3000.00,NULL,'2023-09-01',1,'2023-09-01 06:58:10','2023-09-01 19:23:27','Hello, I am interested for ride with you and my proposal amount are given also.'),(10,9,12,11,200.00,200.00,NULL,'2023-09-01',1,'2023-09-01 17:27:26','2023-09-01 17:35:26','Hello, I am interested for ride with you and my proposal amount are given also.'),(11,11,8,2,9000.00,8000.00,NULL,'2023-09-03',1,'2023-09-03 07:11:41','2023-09-03 07:12:33','Hello, I am interested for ride with you and my proposal amount are given also.');
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `present_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_expire_date` date NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers_user_id_foreign` (`user_id`),
  CONSTRAINT `drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,2,'mirpur-1','Sirajganj','lN20238CLSDH','2026-09-23','5118947471','1999-09-09','1','2023-08-29 09:46:46','2023-08-29 09:50:37'),(2,3,'Dhaka','Natore','DL194747CL204','2026-08-19','1028382149','2001-08-16','2','2023-08-30 07:46:41','2023-08-30 07:47:02'),(3,4,'Dhaka','Rangpur','Dl1946CL0284','2026-08-30','1028382148','1976-08-30','1','2023-08-30 07:48:39','2023-08-30 07:52:42'),(4,5,'Dhaka','Bogura','DL194747CL2041','2027-08-30','1504745621','2011-08-30','0','2023-08-30 07:50:45','2023-08-30 07:50:45'),(5,6,'Dhaka','Tangail','DL194747CL204W','2032-08-30','10283821494','2002-08-30','0','2023-08-30 07:52:07','2023-08-30 07:52:07'),(6,7,'Dhaka','Munshijganj','DL194747CL','2031-08-30','10283821491','1998-08-30','2','2023-08-30 07:54:27','2023-08-30 07:54:31'),(7,11,'dhaka','munshiganj','bfbnmn335465','1999-01-03','12346789087','1999-01-03','1','2023-08-31 14:53:10','2023-08-31 14:55:15'),(8,13,'Adabor, Dhaka','Bheramara, Kushtia','LN01','2027-12-02','123','1985-12-02','1','2023-09-01 06:56:51','2023-09-01 06:57:32'),(9,14,'UTTARA','KAMRANGIRCHAR','LDF555','2027-02-01','1255485','1993-01-05','2','2023-09-02 18:19:08','2023-09-02 18:20:07');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_08_18_052704_create_sessions_table',1),(7,'2023_08_19_073321_add_phone_number_to_users',1),(8,'2023_08_20_072830_create_book_requests_table',1),(9,'2023_08_20_132922_add_role_to_users_table',1),(10,'2023_08_20_152811_create_drivers_table',1),(11,'2023_08_20_155031_add_license_expire_date_to_drivers_table',1),(12,'2023_08_22_114511_create_contracts_table',1),(13,'2023_08_23_033427_add_contracted_id_to_book_requests_table',1),(14,'2023_08_23_045817_add_proposal_to_contracts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1uJ9icdl0KCNnjFFarPccGa0tN97g57WqfmCsmdW',NULL,'3.70.238.4','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXJ1MkU3dlBYdnZreEFDMW54Z1RRZlpCVkZ4OWJrbmpQYkhZV2JEdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698162564),('2DbwVIj1cXLLWL31fs1qIe66w8qTKC6bEA36CAdJ',NULL,'69.164.217.74','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWs2ZFJoZVJMdlc0M0xTelRlRDBlTGxDcGJLeWI2aFQzWjRyUUlKNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698149973),('8JEHXmr7ZvnHmUcFb64ROwUVsqAK3bvpJzz6Nw3T',NULL,'172.104.11.51','Mozilla/5.0 (Macintosh; Intel Mac OS X 13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnBBZnJkcDRsR3VISkdGOUpXWnNIR0hncHlxQlJVakpKQkk2Q2V0WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698149990),('8WjSoU91XMcyB4FgZug3SGhl9pEfHFqGhGWK9uYt',NULL,'18.223.113.110','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0.2 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZldqd081bXJkemxjOGRuclhmZ1IyRVlHdzAxdlNpMmMxTnQ2cmtXcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698128786),('bhsXGYtpgE0HzcDVYsM9AKeVoRuBbJsgvXrEELNR',NULL,'183.136.225.9','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmRwS1NUbVpOYW1Xb3RCZzVaV3Q3aHhON2JqVFlIbnNSUUhBaDdONyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698141803),('cG1CH8TFle2HRxt7tFqFUXFE26UISjPvrdr3PfHA',NULL,'188.0.255.92','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1RIc083V1VNYmVBNlpQTFhiMVpFV0xUeVhuR3JYOFB4Z3lXZVY1eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698125354),('CInEzCyMu5eWdKdH54wOCYfbcfIFUlL5MWkvTKoB',NULL,'104.152.52.201','masscan/1.3 (https://github.com/robertdavidgraham/masscan)','YTozOntzOjY6Il90b2tlbiI7czo0MDoieG5NT3NyMVZWNEJwejVuTUMyaVVxNmx4MUN3TEI4aVJ4SDh3c05wNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9waWNrc2hhcmUuYXNpZnVsbWFtdW4uaW5mby5iZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698140312),('gM85VZwTY3BYbQoOuy7pMzbHZWRYpZ1GNUJTPpoS',NULL,'167.248.133.51','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGNJVFFQbkZXMUxhZVJXc1dvWnBLbEYxWnk0d2Y3NkVtUE5QSjdHTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698134921),('HdaUGEgR7dB5jXg8fgZZt2DUlgFc4KoK2cP8ivxA',NULL,'179.150.203.140','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEhheURqU01kNXZCTEJKeFRWUzBSN2VQQ2tRczdSdjZsdmJFSDZDcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698156340),('hfka0haFHPse5ObGab6nZr6DHNIX0q4LIlfPK15b',NULL,'185.180.143.79','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFpOS3BZUXFNdU1OSXJhVEszQUhlQVNHRDhCM0xkbkZZclo3S2R0OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698125379),('hMG2cixBr5QN6hAGlQokWtNH2GEQfD3nluLCvieE',NULL,'18.223.113.110','Mozilla/5.0 (Linux; Android 9; ONEPLUS A6010) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.89 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXlNelpKM2lUR0dNZ0x5VHFFbEJWWWJDM3pnUEhyMmJGRTN5bHVyRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698129333),('hrgDw52Cl0goxSivPO2p08wMJtOU1VQtyDjkmkpz',NULL,'185.165.190.34','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoia1hESkpxYVVXTDkwdm1ObG43YTREQ1pBWFV0d1ExdVE3YndzT1FPRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698174231),('HvenzkIsjRyMFQUKaLeKn7gOYwDTuwXooZdujWqX',NULL,'103.174.98.6','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFVucFFJYmFrSlRtRGQxMjVaSU5GWTBVU3VGcWo1dVFkcEgzQVMwcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9waWNrc2hhcmUuYXNpZnVsbWFtdW4uaW5mby5iZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698173661),('IJRWVdu5NUnHeMKxHrdPQ48l0p1DR8Qye55TUu8d',NULL,'154.209.125.131','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGc5VEd1b1ZMb0t4ODQycmU2ZndvQVZpYUJ0ekxaZlNOelNOZXJ3QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698123705),('itgR2sZ2LG6GRRSubuGtGHTEMcz7utpkZc1CK4tj',NULL,'20.232.101.84','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidlp6aUszaXBkUFpzRnJLQkNsRE5RRFlsWjA2bHNvNjQ4NWFDRHBFVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMi8/cGhwaW5mbz0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1698164312),('OmfxMWvrATSNVsCTVWnYOIjhnPHTmuYPRYuFsKfV',NULL,'167.248.133.51','Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoibHAzNUtlUDd4U2IzS1JlTkFuVUxLaG55cVJDeWU1YW93WWpEYW1aMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698134922),('omylu97jEoSIWdqCyMopBxCHsMQL1koKi7sNUop0',NULL,'81.178.159.8','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFEZGx6clowazJkVWdFZWo0dGlrZnZXNGJvazB2eHA0S3RwMWRrNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698172180),('QPP8ZgjFI4XeHpJDaGj5aBqE6QhRFzRwZxNIJOaO',NULL,'130.211.54.158','python-requests/2.31.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2kwMkhxRnhvUjk2akc0SzNZUkE5T3cxbTNXc2dVaGJkbk9qQXVhViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698148842),('Scpzvpo8yxJwwWZDbv56RJeO8eOeRoK3Lg86pGoJ',NULL,'117.214.242.249','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlNCSk5rTVdkWXV6TEJyYUV3NDE5ZU1BaURtc3BwemM5eDZZM2djbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698153104),('t79IOp4F3EBAyiaAiqXjLIJmoKWBHr6ekBwiJD0l',NULL,'3.236.64.189','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnRqckFzT3dENm11NWprSGs1d08yT2lYQW9Dc2J1VEQyS0NWME04YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698171224),('TwrLBbpe0Hn730670ngxMpTosWWA9BmKw0qjpv8Z',NULL,'184.105.247.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.70','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXJnZGMwVEdtMnp0VnpIRG1qcXVyNkgzNDlVbFlWVEVuMVRnU0k3OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698133627),('XSr5OPUzA4NW45RaQqSsb3bSYNPz78eiROELYknp',NULL,'128.1.248.42','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFhubzI5QVRJbUJJT1VxZHFyaUJaVUFxYm44S3FzazdxRG1Rd1p5MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly80NC4yMTIuMjQxLjIzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1698162984);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Al Mamun','hello@asifulmamun.info.bd',NULL,'$2y$10$wK0rZDCd7FECFALyS9nYk.FbZ2DRaozy3JF88gutMsBem20hKLJ9.',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-28 16:44:36','2023-08-28 16:44:36','01721600688',1),(2,'Md Rafiul Islam','mdrafiulislam06@gmail.com',NULL,'$2y$10$fFEDBmkbbEdsKLq9Vx2ne.TxLFC1dz4W3IabABSGnyrPQlzfHx2KC',NULL,NULL,NULL,'PoWcgoPLutQbdfq5QXOudLE8JAx7rqAgSuFtidWhHKSbBXKJWMQRxzXo6UMo',NULL,NULL,'2023-08-29 09:41:39','2023-08-29 09:46:46','01727930056',2),(3,'Shahed Oli Noor','mdrafiulislam0692@gmail.com',NULL,'$2y$10$E7bGr9stsVwQBt50RIudS.QiY2XVdMhUtlS9ZWXGzXo0RpuGOPaQy',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:45:45','2023-08-30 07:46:41','017000000',2),(4,'Khairul Islam Rony','khairulislam@gmail.com',NULL,'$2y$10$MbbYgdZzVOo3Zy426gsuwOetsNvQJUL86Qrco9.jdmV21tfHmpdB6',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:47:56','2023-08-30 07:48:39','0178888888',2),(5,'Salehin Fokir','salehin420@gmail.com',NULL,'$2y$10$2HfA.SE6WbNw..hvOrCIgOlvas6TCbNALhx53hrlzx0CnfppEdG/K',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:49:42','2023-08-30 07:50:45','01930463421',2),(6,'Sabiba Alam Tamannah','sabibaalomtamanna@gmail.com',NULL,'$2y$10$OMzuytuq4gw1dniInKPM0uJYJSinIYkunV9Zpe9ZWc3HDrEJdeyjm',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:51:33','2023-08-30 07:52:07','0183043792',2),(7,'Tasmin Yeasmin','tasmin@gmail.com',NULL,'$2y$10$tmyjsfHd0PDFUdvTnvlOj.nU1vHi/M5st7UyqnTIEdOVE59miYsWi',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:53:48','2023-08-30 07:54:27','01301456731',2),(8,'Jenny Rozario','jenny@gmail.com',NULL,'$2y$10$0hNIpFFJq.tq1cLs9EUedOWDl8jQ4TQubPaRPVXJiraGeBun4kVRW',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:55:30','2023-08-30 07:55:30','01812342123',0),(9,'Mim','mimamarjaan@gmail.com',NULL,'$2y$10$auP9aOozUZqNwOA4twriv.sZOD8XEZNP6m91jf.FdrhMW5OvW//Bq',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 07:56:14','2023-08-30 07:56:14','01243564321',0),(10,'Shamim Khan','seshopbd@gmail.com',NULL,'$2y$10$mFZO4fPsOU8nlwkijdEqjuuZhdaWzLb7WCdpJk4ben8/Msn/icES6',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 16:42:05','2023-08-30 16:42:05','01748981923',0),(11,'tasmin','tasminakhanam03@gmail.com',NULL,'$2y$10$VJlFF0B6XmiCp2dZWCIIjeEbEJL4AOznwwyaOBGpI2zesHCoWOYRC',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-31 14:49:49','2023-08-31 14:53:10','01830350245',2),(12,'tas','cw_10517889@hotmmail.com',NULL,'$2y$10$Pw5HRAEb5sK9euWApdH94.Eu9NQz2gLS5Jhj55icXNuRfawSVIEQu',NULL,NULL,NULL,'xFydp84i0OflbizqkJsTbPH2ZiVjd8WOaA36oOa6AR4NkekwUPl7YDA65MK9',NULL,NULL,'2023-08-31 15:06:37','2023-08-31 15:06:37','01302399038',0),(13,'The Driver 01','driver1@gmail.com',NULL,'$2y$10$4DCOydSd6jxf2pf8aJPesuo58shAL1/A1poGZagA9ah2fzmZ2PVPi',NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-01 06:56:08','2023-09-01 06:56:51','01111111111',2),(14,'The Driver 02','driver2@gmail.com',NULL,'$2y$10$VzztR0Of1dckdc754jKd2.hwp0hn5096UiY/L8JF8tc6vJKOL3UMe',NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-02 18:17:08','2023-09-02 18:19:08','01568445565',2),(15,'rezoan','rezoan.cse.2017@gmail.com',NULL,'$2y$10$DdL4ol5jjZJR9lNa8cEWY.ps9hGKhVg2ePL6YVtiFV59FXnUS8PHm',NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-03 06:06:31','2023-09-03 06:06:31','01855673393',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-24 19:14:24

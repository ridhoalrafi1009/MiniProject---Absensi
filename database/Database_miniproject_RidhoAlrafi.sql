-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for briminiproject
CREATE DATABASE IF NOT EXISTS `briminiproject` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `briminiproject`;

-- Dumping structure for table briminiproject.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_asisten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teaching_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.absensi: ~2 rows (approximately)
REPLACE INTO `absensi` (`id`, `id_kelas`, `id_materi`, `id_asisten`, `teaching_role`, `date`, `start`, `duration`, `end`, `id_code`, `created_at`, `updated_at`) VALUES
	(1, '2', '6', '2', 'Asisten Baris', '2024-03-14', '16:30:57', '8', '16:39:30', '6', '2024-03-14 02:30:57', '2024-03-14 02:39:30'),
	(2, '2', '6', '6', 'Tutor', '2024-03-14', '22:34:49', '2', '22:37:46', '2', '2024-03-14 08:34:49', '2024-03-14 08:37:46');

-- Dumping structure for table briminiproject.code
CREATE TABLE IF NOT EXISTS `code` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_get` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.code: ~10 rows (approximately)
REPLACE INTO `code` (`id`, `code`, `id_user`, `id_user_get`, `created_at`, `updated_at`) VALUES
	(1, 'J2tyI5yZJ9', '2', NULL, '2024-03-13 08:23:42', '2024-03-13 08:23:42'),
	(2, 'NOYHlqBG7a', '1', '6', '2024-03-13 08:33:34', '2024-03-14 08:34:49'),
	(3, 'zHGyydXZtd', '1', NULL, '2024-03-13 09:08:41', '2024-03-13 09:08:41'),
	(4, 'yhZLFtxdqW', '1', NULL, '2024-03-13 19:49:40', '2024-03-13 19:49:40'),
	(5, 'aQqJxgx7l2', '1', NULL, '2024-03-14 00:04:50', '2024-03-14 00:04:50'),
	(6, 'vt6UqaeL1K', '1', '2', '2024-03-14 00:05:01', '2024-03-14 02:30:57'),
	(7, 'BlcnDuI5OB', '5', NULL, '2024-03-14 01:55:57', '2024-03-14 01:55:57'),
	(8, '8ZexJpYthZ', '5', NULL, '2024-03-14 01:58:55', '2024-03-14 01:58:55'),
	(9, 'S3FxqhD79v', '5', NULL, '2024-03-14 01:59:10', '2024-03-14 01:59:10'),
	(10, 'gAtiXjPIjF', '6', NULL, '2024-03-14 08:38:28', '2024-03-14 08:38:28');

-- Dumping structure for table briminiproject.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table briminiproject.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.kelas: ~2 rows (approximately)
REPLACE INTO `kelas` (`id`, `jurusan`, `fakultas`, `tingkat`, `nama_kelas`, `created_at`, `updated_at`) VALUES
	(1, 'Ilmu Komputer', 'FMIPA', '2', 'Q001', '2024-03-14 01:46:17', '2024-03-14 01:46:17'),
	(2, 'Ilmu Pemerintah', 'FISIP', '1', 'Q002', '2024-03-14 01:46:39', '2024-03-14 01:46:55');

-- Dumping structure for table briminiproject.materi
CREATE TABLE IF NOT EXISTS `materi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.materi: ~2 rows (approximately)
REPLACE INTO `materi` (`id`, `nama_materi`, `created_at`, `updated_at`) VALUES
	(1, 'Ilmu Pengetahuan Alam', '2024-03-14 05:28:15', '2024-03-14 05:28:16'),
	(6, '123', '2024-03-14 01:08:04', '2024-03-14 01:34:27');

-- Dumping structure for table briminiproject.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.migrations: ~8 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_03_12_070103_absensi', 2),
	(6, '2024_03_12_070123_code', 2),
	(7, '2024_03_12_070141_kelas', 3),
	(8, '2024_03_12_070203_materi', 3);

-- Dumping structure for table briminiproject.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.password_resets: ~0 rows (approximately)

-- Dumping structure for table briminiproject.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table briminiproject.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pj','assisten') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_asisten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table briminiproject.users: ~4 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `role`, `id_asisten`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES
	(1, 'admin', 'admin@admin.com', 'admin', 'A1', NULL, '$2y$10$F6bywSVBWaJZXo61PMLJlOcLuNK3HQaYlc1qu5MATs8sllyo//cCS', NULL, '2024-03-14 15:40:39', '2024-03-14 03:40:55', '.... (2).jpg'),
	(2, 'asisten', 'asisten@asisten.com', 'assisten', 'A001', NULL, '$2y$10$Iv9pyKHKKjF0Klz7vDjcuOEx04yr6w6eMxHmyvqN8/TaDVH3uGxB6', NULL, '2024-03-13 08:17:55', '2024-03-13 08:17:55', NULL),
	(3, 'ridho', 'ridho@gmail.com', 'assisten', 'A002', NULL, '$2y$10$FSKuONSM1ZezMwldGWfIq.Rz2fBakFPnex2nydcFlGSTkQi6IC6I2', NULL, '2024-03-13 08:47:25', '2024-03-13 08:47:25', NULL),
	(6, 'pj', 'pj@pj.com', 'pj', 'A005', NULL, '$2y$10$/89LxtiUhEMf//OtrOiCIugljYkUSYa8yU4AUGy66ixtbnjc/1C3G', NULL, '2024-03-13 17:00:00', '2024-03-14 08:23:47', 'Clown.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

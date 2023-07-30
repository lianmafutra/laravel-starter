-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_laravel_starter
CREATE DATABASE IF NOT EXISTS `db_laravel_starter` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_laravel_starter`;

-- Dumping structure for table db_laravel_starter.audits
CREATE TABLE IF NOT EXISTS `audits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) unsigned NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.audits: ~49 rows (approximately)
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 112277, 'created', 'App\\Models\\PermissionGroup', 38, '[]', '{"id":38,"name":"dwqd","desc":"wqdqw"}', 'http://127.0.0.1:8000/admin/permission-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-18 18:14:21', '2023-07-18 18:14:21'),
	(2, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\PermissionGroup', 38, '{"id":38,"desc":"wqdqw","name":"dwqd"}', '[]', 'http://127.0.0.1:8000/admin/permission-group/38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-18 18:16:08', '2023-07-18 18:16:08'),
	(3, 'App\\Models\\User', 112277, 'created', 'App\\Models\\PermissionGroup', 39, '[]', '{"id":39,"name":"s","desc":"s"}', 'http://127.0.0.1:8000/admin/permission-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-18 18:19:21', '2023-07-18 18:19:21'),
	(4, 'App\\Models\\User', 112277, 'created', 'App\\Models\\PermissionGroup', 40, '[]', '{"id":40,"name":"dqw","desc":"dwqd"}', 'http://127.0.0.1:8000/admin/permission-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-18 18:22:45', '2023-07-18 18:22:45'),
	(5, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-18 21:24:43"}', '{"last_login_at":"2023-07-19 08:49:34"}', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:49:34', '2023-07-19 01:49:34'),
	(6, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\PermissionGroup', 40, '{"id":40,"desc":"dwqd","name":"dqw"}', '[]', 'http://127.0.0.1:8000/admin/permission-group/40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:55:15', '2023-07-19 01:55:15'),
	(7, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\PermissionGroup', 39, '{"id":39,"desc":"s","name":"s"}', '[]', 'http://127.0.0.1:8000/admin/permission-group/39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:58:35', '2023-07-19 01:58:35'),
	(8, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 08:49:34"}', '{"last_login_at":"2023-07-19 22:22:04"}', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:22:04', '2023-07-19 15:22:04'),
	(9, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"lwmqld","nama_lengkap":"lmdlqm","kontak":"21312","email":null,"password":"$2y$10$BryukqQ\\/CwoTrWdHW\\/K8veHRR971YQcI5AvDRd55w3rMhQ4p59IP6"}', 'http://127.0.0.1:8000/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:35:00', '2023-07-19 15:35:00'),
	(10, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"lwmqld","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"lmdlqm","kontak":"21312","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$BryukqQ\\/CwoTrWdHW\\/K8veHRR971YQcI5AvDRd55w3rMhQ4p59IP6","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://127.0.0.1:8000/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:35:10', '2023-07-19 15:35:10'),
	(11, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 22:22:04"}', '{"last_login_at":"2023-07-19 22:37:09"}', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:37:09', '2023-07-19 15:37:09'),
	(12, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 22:37:09"}', '{"last_login_at":"2023-07-19 22:41:59"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:41:59', '2023-07-19 15:41:59'),
	(13, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"dq","nama_lengkap":"dqw","kontak":null,"email":"dq","password":"$2y$10$m4wVwdfIgNTwWgoRHIM8WuHrjvMox048eEOCZgAGTVzL6.x9nlwki"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:52:33', '2023-07-19 15:52:33'),
	(14, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"dq","nip":null,"bidang_id":null,"email":"dq","nama_lengkap":"dqw","kontak":null,"alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$m4wVwdfIgNTwWgoRHIM8WuHrjvMox048eEOCZgAGTVzL6.x9nlwki","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:52:43', '2023-07-19 15:52:43'),
	(15, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112279, '[]', '{"id":112279,"username":"q","nama_lengkap":"d","kontak":null,"email":null,"password":"$2y$10$bYRF1F8Po7ifbUHBp9Dxo.\\/sqkKn1tTrx7kjnfoQY8AgOP\\/7DHzwm"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 15:57:08', '2023-07-19 15:57:08'),
	(16, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112279, '{"id":112279,"username":"q","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"d","kontak":null,"alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$bYRF1F8Po7ifbUHBp9Dxo.\\/sqkKn1tTrx7kjnfoQY8AgOP\\/7DHzwm","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112279', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 16:01:07', '2023-07-19 16:01:07'),
	(17, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 22:41:59"}', '{"last_login_at":"2023-07-19 23:03:38"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 16:03:38', '2023-07-19 16:03:38'),
	(18, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 23:03:38"}', '{"last_login_at":"2023-07-20 06:23:06"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 23:23:06', '2023-07-19 23:23:06'),
	(19, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 06:23:06"}', '{"last_login_at":"2023-07-20 09:04:47"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 02:04:47', '2023-07-20 02:04:47'),
	(20, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 48, '{"nama_lengkap":"admin2","password":"$2y$10$AjP.Sn2TTBkVpDkAOnICTu\\/uHMqfpWnI6bZYtleg6GW\\/W\\/dueQbgu"}', '{"nama_lengkap":"admin22","password":"$2y$10$iIqFXRzSULAgIIDUunfOke15McZC8DmEfV0e6CKaKDnqIqnToNE9m"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 02:25:41', '2023-07-20 02:25:41'),
	(21, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"dqwd","nama_lengkap":"wqd","kontak":"1212","email":null,"password":"$2y$10$BoNECQh3zZGVkb1k3K7xveGf0N1kscJBqUkh1bjNVFY5FdwMLbQla"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 02:25:52', '2023-07-20 02:25:52'),
	(22, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"dqwd","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"wqd","kontak":"1212","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$BoNECQh3zZGVkb1k3K7xveGf0N1kscJBqUkh1bjNVFY5FdwMLbQla","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 02:25:56', '2023-07-20 02:25:56'),
	(23, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 09:04:47"}', '{"last_login_at":"2023-07-20 19:13:42"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 12:13:42', '2023-07-20 12:13:42'),
	(24, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 48, '{"kontak":null,"password":"$2y$10$iIqFXRzSULAgIIDUunfOke15McZC8DmEfV0e6CKaKDnqIqnToNE9m"}', '{"kontak":"089902103902","password":"$2y$10$Uei3iIW\\/IEFVcHZe7wa4L.G\\/K.neOgCMh0nX4yW4Evb85e1ZbZjp."}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 13:39:28', '2023-07-20 13:39:28'),
	(25, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 49, '{"kontak":null,"password":"$2y$10$hTxfMLhXUT9bOUrRSjpdauUsarOxEeRBuYd7TP9Ojv\\/l1Yrw.9qte"}', '{"kontak":"0323901923","password":"$2y$10$3ZnbvjOQwIy6NZRtOnpoGul6t3UcIY3KjwKuXIagoFMOQ3U3MqQa6"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 13:39:42', '2023-07-20 13:39:42'),
	(26, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 48, '{"id":48,"username":"200105072023021002","nip":"200105072023021002","bidang_id":null,"email":"admin2@gmail.com","nama_lengkap":"admin22","kontak":"089902103902","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$Uei3iIW\\/IEFVcHZe7wa4L.G\\/K.neOgCMh0nX4yW4Evb85e1ZbZjp.","remember_token":null,"gldepan":null,"nama":"ADIB YUDA PRATAMA","glblk":"A.Md.Ak.","kunker":"4002000000","nunker":"INSPEKTORAT KOTA JAMBI","kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/48', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 13:39:54', '2023-07-20 13:39:54'),
	(27, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 19:13:42"}', '{"last_login_at":"2023-07-20 23:57:32"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 16:57:32', '2023-07-20 16:57:32'),
	(28, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"d","nama_lengkap":"dq","kontak":"3213","email":null,"password":"$2y$10$4TPThJtFlKmQO2V6lFJR9O4rkB0Fu6VkemsMAj2Mko525\\/fcd8tYK"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 16:57:51', '2023-07-20 16:57:51'),
	(29, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"d","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"dq","kontak":"3213","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$4TPThJtFlKmQO2V6lFJR9O4rkB0Fu6VkemsMAj2Mko525\\/fcd8tYK","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 16:58:14', '2023-07-20 16:58:14'),
	(30, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"foto":null}', '{"foto":"a1699373-6ddb-42aa-bca1-160729e2c994"}', 'http://laravel-starter.test:8080/user/profile/photo/change', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:13:20', '2023-07-20 17:13:20'),
	(31, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"kontak":"082244261525"}', '{"kontak":"0822442615252"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:36:16', '2023-07-20 17:36:16'),
	(32, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"kontak":"0822442615252"}', '{"kontak":"082244261525"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:36:21', '2023-07-20 17:36:21'),
	(33, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"email":"lianmafutra@gmail.com","kontak":"082244261525"}', '{"email":"lianmafutra@gmail.com2","kontak":"0822442615252"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:36:48', '2023-07-20 17:36:48'),
	(34, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"email":"lianmafutra@gmail.com2","nama_lengkap":"Lian Mafutra Dev","kontak":"0822442615252"}', '{"email":"lianmafutra@gmail.com22","nama_lengkap":"Lian Mafutra Dev2","kontak":"08224426152522"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:37:04', '2023-07-20 17:37:04'),
	(35, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"email":"lianmafutra@gmail.com22","nama_lengkap":"Lian Mafutra Dev2","kontak":"08224426152522"}', '{"email":"lianmafutra@gmail.com","nama_lengkap":"Lian Mafutra Dev","kontak":"082244261525"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:37:11', '2023-07-20 17:37:11'),
	(36, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"alamat":null}', '{"alamat":"jl"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:38:07', '2023-07-20 17:38:07'),
	(37, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"alamat":"jl"}', '{"alamat":"Jl. Jawa No.99Kebun Handil, Kec. Jelutung, Kota Jambi, Jambi 36125"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:40:51', '2023-07-20 17:40:51'),
	(38, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"jenis_kelamin":null}', '{"jenis_kelamin":"L"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:45:12', '2023-07-20 17:45:12'),
	(39, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"jenis_kelamin":"L"}', '{"jenis_kelamin":"P"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:46:12', '2023-07-20 17:46:12'),
	(40, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"jenis_kelamin":"P"}', '{"jenis_kelamin":"L"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 17:46:17', '2023-07-20 17:46:17'),
	(41, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 23:57:32"}', '{"last_login_at":"2023-07-21 02:02:05"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 19:02:05', '2023-07-20 19:02:05'),
	(42, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-21 02:02:05"}', '{"last_login_at":"2023-07-21 02:04:40"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 19:04:40', '2023-07-20 19:04:40'),
	(43, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-21 02:04:40"}', '{"last_login_at":"2023-07-21 08:36:29"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 01:36:29', '2023-07-21 01:36:29'),
	(44, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 49, '{"password":"$2y$10$3ZnbvjOQwIy6NZRtOnpoGul6t3UcIY3KjwKuXIagoFMOQ3U3MqQa6"}', '{"password":"$2y$10$uZSdsqJzPyUXfedJpMMJ9eFGTuTnh4uZQlUgVk6h31q8Ttj\\/HYcDK"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:30:08', '2023-07-21 02:30:08'),
	(45, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 192, '{"password":"$2y$10$2wLaswl9FTPeSvgcLgdCl.VyxNLafluR.unhmuLqyz8\\/ixyl9G.mi"}', '{"password":"$2y$10$fcSX59FP\\/0WKNUPQgV41WOZuGwXli\\/xajGPbfEgmlhKiBtam9q\\/8S"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:30:16', '2023-07-21 02:30:16'),
	(46, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 192, '{"password":"$2y$10$fcSX59FP\\/0WKNUPQgV41WOZuGwXli\\/xajGPbfEgmlhKiBtam9q\\/8S"}', '{"password":"$2y$10$iTIA4LGNVzrczxNdScEBEexn4k9ml7HAZLzkQgwcb0nHV8zq.yRwm"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:30:25', '2023-07-21 02:30:25'),
	(47, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"password":"$2y$10$chRjlp8KIegoD6wsyAwMi.Vm9no0A\\/SjWyDC9ivLiWsTRUUStANga"}', '{"password":"$2y$10$0NB6gLigZ4UxuZ0nnjaQxuSqr2Nk8L7KQTn6NK3DJq9uF418UOIL6"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:33:47', '2023-07-21 02:33:47'),
	(48, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 49, '{"email":null,"password":"$2y$10$uZSdsqJzPyUXfedJpMMJ9eFGTuTnh4uZQlUgVk6h31q8Ttj\\/HYcDK"}', '{"email":"ok@gmail.com","password":"$2y$10$2alaM\\/qTDj2dsNLml4WrHeNznfGcvuMCwoxpKNA8\\/1xTOG9.wNO86"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:34:03', '2023-07-21 02:34:03'),
	(49, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 192, '{"email":null,"kontak":null,"password":"$2y$10$iTIA4LGNVzrczxNdScEBEexn4k9ml7HAZLzkQgwcb0nHV8zq.yRwm"}', '{"email":"bb@gmail.com","kontak":"0829389273","password":"$2y$10$SdutgiYNd3dG.HiAYT6h0u2J7IVLVOCNeF1OjuMy.w18\\/BC0J.i12"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:34:19', '2023-07-21 02:34:19');

-- Dumping structure for table db_laravel_starter.deploy_log
CREATE TABLE IF NOT EXISTS `deploy_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commit_message` text,
  `status` enum('success','error') DEFAULT NULL,
  `log` text,
  `deploy_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.deploy_log: ~0 rows (approximately)

-- Dumping structure for table db_laravel_starter.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_laravel_starter.file
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` varchar(500) DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `name_origin` text NOT NULL,
  `name_hash` text NOT NULL,
  `path` varchar(500) NOT NULL,
  `mime` varchar(500) NOT NULL,
  `size` varchar(500) DEFAULT NULL,
  `desc` text,
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_file_users` (`created_by`),
  KEY `FK_file_kanban` (`model_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.file: ~15 rows (approximately)
INSERT INTO `file` (`id`, `file_id`, `model_id`, `name_origin`, `name_hash`, `path`, `mime`, `size`, `desc`, `order`, `created_by`, `created_at`, `updated_at`) VALUES
	(37, '010259564.jpg', 3, 'avatar3.png', 'avatar3-d885e44c-f4f3-495d-884b-2b4a15a7b6ad-Yqcmj1m8o9f1Z1EH63R6g9apofVaJFt5QnWBKV6dGkUoOl8Nik.png', '2023/07/profile', '', '23799', NULL, NULL, NULL, '2023-07-13 08:29:43', '2023-07-13 08:29:43'),
	(38, 'a1699373-6ddb-42aa-bca1-160729e2c994', 112277, 'foto-red.png', 'foto-red-6686b011-c8a0-4d96-96b7-c249fc3b641d-8R5KN3pn4qUX7dz7MfP1Mz2t1X91sD7KRVxHr3WJEBYZIsJYGH.png', '2023/07/profile', '', '209301', NULL, NULL, NULL, '2023-07-20 17:13:20', '2023-07-28 16:02:37'),
	(40, 'e0d116a9-edab-4ac1-ac98-72993099dd01', 35, '281294637_5047555672032170_782718356241701622_n.jpg', '281294637_5047555672032170_782718356241701622_n-e30a1c3b-d6cc-43a8-931d-e99349ae769e-0Bu45ekLEGU3ObNtwEyyhIVzMiZacUpKEDZwuPF9lTGhMnj4QC.jpg', '2023/07/cover', 'image/jpeg', '208271', NULL, NULL, 112277, '2023-07-30 15:40:09', '2023-07-30 15:40:09'),
	(41, '28845479-5fcc-4535-841d-5212150dfdbc', 37, '281294637_5047555672032170_782718356241701622_n.jpg', '281294637_5047555672032170_782718356241701622_n-03041183-033c-4556-905b-e718881ca054-y2SuOq143GMJpiQDTLnaIfRfQObtlsx2jPEInGoDjGYEDdOeUN.jpg', '2023/07/cover', 'image/jpeg', '208271', NULL, NULL, 112277, '2023-07-30 15:46:48', '2023-07-30 15:46:48'),
	(42, 'e3966fc4-2b80-4cc5-aa92-a8e6b08a8e4b', 49, '281294637_5047555672032170_782718356241701622_n.jpg', '281294637_5047555672032170_782718356241701622_n-d45d75b4-d61e-4b1a-a5d1-358c2861975e-puw5QEHMrtRDrtA4iFSmkFNL1n51PGZm7jVLRhMrskSYSWQ3vw.jpg', '2023/07/cover', 'image/jpeg', '208271', NULL, NULL, 112277, '2023-07-30 15:56:00', '2023-07-30 15:56:00'),
	(43, '3264aef7-3073-4520-919c-07d253c3f7ee', 51, 'bg_1.jpg', 'bg_1-5c58a7a8-2125-4f70-97f9-e5382f1d762c-sjIOYq3P0SowvLBKqhKhEFdjdgqC5RMJAk3ru2rpE69kEaSziw.jpg', '2023/07/cover', 'image/jpeg', '69273', NULL, NULL, 112277, '2023-07-30 15:57:10', '2023-07-30 15:57:10'),
	(44, 'a135d125-3ca4-46a1-805e-bf369b9f0003', 52, '288186374_5130799293707807_3674442644226995322_n.jpg', '288186374_5130799293707807_3674442644226995322_n-9ab5a927-834e-4041-8926-273fcf1c90af-b9GZUfhEwXdvPpKd4R1uoveVmHL7AKoSJkt298uAQ5OTzNdQJF.jpg', '2023/07/cover', 'image/jpeg', '93900', NULL, NULL, 112277, '2023-07-30 15:57:27', '2023-07-30 15:57:27'),
	(45, '65aa93c6-c62c-423b-bfe6-d7611f3a1dc5', 52, '147327683_116933510343213_2442951898143145947_n.jpg', '147327683_116933510343213_2442951898143145947_n-e4585a1f-1c36-434d-bbaf-5f0bb85d4b35-N36xF8g8tq16b3rL15hdZZuJpqvuXNcIV7ltsd5aBYnsCgjOqI.jpg', '2023/07/cover', 'image/jpeg', '94570', NULL, NULL, 112277, '2023-07-30 15:57:27', '2023-07-30 15:57:27'),
	(46, '810fe2b3-1879-4621-a666-b0cd584be8f7', 52, 'bg_1.jpg', 'bg_1-fa654289-c987-4a8b-987a-68ad639361b7-ZxiLvIlwxKMm88X1IEhsluArQHJh0bL25xlujy4suKagq20qHz.jpg', '2023/07/cover', 'image/jpeg', '69273', NULL, NULL, 112277, '2023-07-30 15:57:27', '2023-07-30 15:57:27'),
	(47, 'beb71462-b408-41fb-8b21-589b7d8db6b4', 53, '288186374_5130799293707807_3674442644226995322_n.jpg', '288186374_5130799293707807_3674442644226995322_n-eae33cfc-d9f7-43d2-ab25-258aa3ea7143-V4WqTbTRcR8QipOnXJRn87T9QKUwOwFaj5qgSTtfLwqCeHslO5.jpg', '2023/07/cover', 'image/jpeg', '93900', NULL, 1, 112277, '2023-07-30 16:16:15', '2023-07-30 16:16:15'),
	(48, '09f1e883-78e0-47ab-a224-8f4759342196', 53, '147327683_116933510343213_2442951898143145947_n.jpg', '147327683_116933510343213_2442951898143145947_n-fe9850f5-ac54-4e3c-bbc3-b2bcd78cc9c9-BIe3XG8TkQ2QRtSOh0V1coUmfxS5VFK5IWz71gMO2HMq3q54Ap.jpg', '2023/07/cover', 'image/jpeg', '94570', NULL, 2, 112277, '2023-07-30 16:16:15', '2023-07-30 16:16:15'),
	(49, 'bb51047a-25cf-4980-b444-54d7e5051d7a', 53, 'bg_1.jpg', 'bg_1-ec8f9ba2-0938-4b91-b584-5d47c7a3fc71-9otpbUtEB9ovfjyakFn70aTdck0tecKrwJONUqCrKF1qSGcVIb.jpg', '2023/07/cover', 'image/jpeg', '69273', NULL, 3, 112277, '2023-07-30 16:16:15', '2023-07-30 16:16:15'),
	(50, '2aa3bcea-52be-4c7b-a18c-4635bf2d7289', 54, '288186374_5130799293707807_3674442644226995322_n.jpg', '288186374_5130799293707807_3674442644226995322_n-a5293df0-beff-4e57-8528-6978cba98eca-sBkgYqPAwmcmzjRgXc6f5U45MJ7AZTQqRUeqOLTrkNjBtBk5zy.jpg', '2023/07/cover/', 'image/jpeg', '93900', NULL, 1, 112277, '2023-07-30 16:18:02', '2023-07-30 16:18:02'),
	(51, 'b01416a9-ba2f-4306-94b3-52417b5ea880', 54, '147327683_116933510343213_2442951898143145947_n.jpg', '147327683_116933510343213_2442951898143145947_n-c7f6269b-7cc8-4f83-b796-40390e8d0480-jM1mDgwYLsVadLAZIxyTFUjkcDF0xFzN4tnnmIq5BHsNdPOuTh.jpg', '2023/07/cover/', 'image/jpeg', '94570', NULL, 2, 112277, '2023-07-30 16:18:02', '2023-07-30 16:18:02'),
	(52, '855b2c97-a445-442d-b0cb-2930f54e965a', 54, 'bg_1.jpg', 'bg_1-12311d36-7603-4147-92bb-d335136b4efd-Kv6FyowYN19rL1je3t9anNNwRKuh3fuQcjszKcvfFn2ftk6OLr.jpg', '2023/07/cover/', 'image/jpeg', '69273', NULL, 3, 112277, '2023-07-30 16:18:02', '2023-07-30 16:18:02');

-- Dumping structure for table db_laravel_starter.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.migrations: ~12 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_03_19_102456_create_permission_tables', 1),
	(6, '2022_03_29_105225_create_settings_table', 1),
	(7, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
	(8, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
	(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
	(10, '2016_06_01_000004_create_oauth_clients_table', 2),
	(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
	(12, '2023_07_19_011148_create_audits_table', 3);

-- Dumping structure for table db_laravel_starter.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.model_has_permissions: ~0 rows (approximately)
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(11, 'App\\Models\\User', 49),
	(15, 'App\\Models\\User', 192);

-- Dumping structure for table db_laravel_starter.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.model_has_roles: ~4 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(13, 'App\\Models\\User', 14),
	(3, 'App\\Models\\User', 49),
	(13, 'App\\Models\\User', 192),
	(1, 'App\\Models\\User', 112277);

-- Dumping structure for table db_laravel_starter.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.oauth_access_tokens: ~51 rows (approximately)
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('07195761e4ed2667474d5b202c0c97a3955bb3e2987d2c1163b5449117c29752621fc94592a248cc', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:00', '2023-02-10 02:48:00', '2024-02-10 09:48:00'),
	('0cacde07e93c6d9eafdef75044c47795fc94ff2ac233eb9f1c603b426135eb6d5b9843c6f175d5a3', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:50:06', '2023-02-10 03:50:06', '2024-02-10 10:50:06'),
	('34054cbb2d1a5cc5731652c5821b0c93b9eef5d4df15d7fb2bd9546b592829b5008c4747fb31eb53', 1, 3, 'travel_app', '[]', 0, '2023-02-14 04:14:20', '2023-02-14 04:14:20', '2024-02-14 11:14:20'),
	('3576c6b0526b1ae5e3454868cb3f13a534a0df1cbb980f1cd4d5f1c1d7956e6277da708ba363f24d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:03', '2023-02-10 02:48:04', '2024-02-10 09:48:03'),
	('3ee726fee0c27ec5d33e5c1c227a2ec70e1a3743fedfe4de0bd0083df22b9ada5496b16dc64c161d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:47:58', '2023-02-10 02:47:58', '2024-02-10 09:47:58'),
	('40928a7755933429a164d12723b70b4a7305880debdb4d7fc030627584fdec58b80630a4d39e2056', 1, 3, 'travel_app', '[]', 0, '2023-02-16 07:49:24', '2023-02-16 07:49:24', '2024-02-16 14:49:24'),
	('42605287b5f335d6e42e62aabe6829d351562e927e60f6714532e1b9e4b87442ab9b46c8e47092f7', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:06:53', '2023-02-10 03:06:53', '2024-02-10 10:06:53'),
	('42d94451cfa677a2782cd07d1dc6e34573223fecb5bd048b85acf017ba107a3d08063992bc29676c', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:55:11', '2023-02-10 02:55:11', '2024-02-10 09:55:11'),
	('4624418fdf90aaff4be39e48c70e5e62f3e97d84c868006e33a459f6eddea4c86332d35a88a83fa4', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:45:38', '2023-02-10 02:45:38', '2024-02-10 09:45:38'),
	('46cc8c07f5ee151fef04fac3cd547f25a41952c1455b91ed1208e145eb284dbb0145d69b55d4d896', 1, 3, 'travel_app', '[]', 0, '2023-02-16 07:49:36', '2023-02-16 07:49:36', '2024-02-16 14:49:36'),
	('496cbc87ec405170856ff0dfb0d14dde8fab1704142e9e3d355fe043933244efde631d06597742d9', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:01', '2023-02-10 02:48:01', '2024-02-10 09:48:01'),
	('4e04f79ca4db950533b69e31dddf5e8c4847c632e4c5e3e6dd76cf9e78bb467293762ebd6058ee19', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:45:33', '2023-02-10 02:45:33', '2024-02-10 09:45:33'),
	('51d044e81a090e9eb68d43e04a50e3057e603807bd10f985710c28118bcf8baecbe8417700d9aa2e', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:57:00', '2023-02-10 02:57:00', '2024-02-10 09:57:00'),
	('5726eb11138b5c01a79ad754e396c3e06f3af8490628ccb79f89c9b9285a83fedfd3be2737f63caa', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:57:50', '2023-02-10 02:57:50', '2024-02-10 09:57:50'),
	('586d56c63c8b46ef293738b9bfbcbe74879233ccf35e9aaf5f3807c0babd9cbde837154f6796d7f7', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:50', '2023-02-10 02:48:50', '2024-02-10 09:48:50'),
	('5b0e011a90d78964b14436e2a232a8a91cd576698dcb4aaa8abda0369fe03f092b249f94404eb792', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:04', '2023-02-10 02:48:04', '2024-02-10 09:48:04'),
	('6102e759812668631eca97be12ba78a3136499f751760ae541f34c82ae7e36647b234beb5ad4559a', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:01:43', '2023-02-10 03:01:43', '2024-02-10 10:01:43'),
	('67a872175f784ffd70a5b517d212986e786e5f55254b1255bcb2a904c65d5dd2c25b13cc5af78397', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:01', '2023-02-10 02:48:01', '2024-02-10 09:48:01'),
	('684bf7b2acd10b665831b60a6ec345ae428ca6b012faf1d7e83f7aa3563475a93fecf7bef97c203d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:06:39', '2023-02-10 03:06:39', '2024-02-10 10:06:39'),
	('712683828de8b9a3ca5a6269171d88d9c2031a096922dad3421533efe7143c7ab3071c17dff57855', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:47:59', '2023-02-10 02:47:59', '2024-02-10 09:47:59'),
	('72aa8a12af40740c9151b1729c7caa19bbcf421ae4f6589ac2b7f0157eea443126a8659d1d85d6b6', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:43:09', '2023-02-10 02:43:09', '2024-02-10 09:43:09'),
	('73d4654d09902cc2adfd428a5c33277819a190f81cf53f7faef2a04c43f9f80f10bcc90e461166b8', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:49:55', '2023-02-10 03:49:55', '2024-02-10 10:49:55'),
	('7e8dd4f375f605e43ae0100f9c12f14d9949ff8fd1c186e013778a4568cca9a00cd5d48ae217fc68', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:49:42', '2023-02-10 03:49:42', '2024-02-10 10:49:42'),
	('81b83b003226cb344cd1571f9888c6617c2ecf417add0e943d7ade64fcc3abaea2454a424969cb5e', 1, 3, 'travel_app', '[]', 0, '2023-02-10 04:00:23', '2023-02-10 04:00:23', '2024-02-10 11:00:23'),
	('845f648de84d5d561a5216e8bda5ef86fd76a0eb93062e13aa6bce8482404a46b840b07799018107', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:49:47', '2023-02-10 02:49:47', '2024-02-10 09:49:47'),
	('88add6a6e08bf506d5ff89b34cce7c817315f594f5c366891c7688862e247ce18eb16a55a3d1810b', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:43:51', '2023-02-10 02:43:51', '2024-02-10 09:43:51'),
	('8c7ef32cb3046726582c7c33fa68829a9e5a62cd1a27f314ce296ee51c19c787f0520aafb420029f', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:46:51', '2023-02-10 02:46:51', '2024-02-10 09:46:51'),
	('94ca1d354083b9b0cfd6293e17f782e6f8fc82f23d88e53d76f6cc5509bb4158bb15fa1e91865660', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:00:52', '2023-02-10 03:00:52', '2024-02-10 10:00:52'),
	('99c86b2fd234a3c067fd9de2cba0b5b9548a9c03969537660344253950ba90f3d4ea03e86210fb9f', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:47:47', '2023-02-10 02:47:47', '2024-02-10 09:47:47'),
	('a50b8d7dadcd839424e17b87ff3ea0ed4a89c40c0f8685e0c9d6d196572c969dc5af9a282d5fdab2', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:50:44', '2023-02-10 03:50:44', '2024-02-10 10:50:44'),
	('a52aee9f34056e60dfecf34d6892e840725d9f9ff3982b69b065cb6bcfa68269cdc6ebe16f00a877', 1, 3, 'travel_app', '[]', 0, '2023-02-10 04:00:36', '2023-02-10 04:00:36', '2024-02-10 11:00:36'),
	('a5aeb225c40946778bf0cab82b4832e26913eae0b44e50e132a1261d76e343b76a1462ab605aab87', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:39:26', '2023-02-10 02:39:26', '2024-02-10 09:39:26'),
	('b0838337b3b206f22c762f1cb4f5b5229050188a06b1c2de2316f89539a1bb93b08d610f85a5be4e', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:28', '2023-02-10 02:48:28', '2024-02-10 09:48:28'),
	('b1150f06f0cf87e797ad45e3ca3099cfb9ed4e5c3271256db15a8b0ca8672a93aab3dd4c96606441', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:53:20', '2023-02-10 02:53:20', '2024-02-10 09:53:20'),
	('b702afff924ea5cb7f346a6d4f091f0b90f91cf99840f7522daeb6e9e21e361dc28f8ca3f26027fa', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:00:19', '2023-02-10 03:00:19', '2024-02-10 10:00:19'),
	('b75d04a1179639f7baa49aa1b8642aca64b16c07809b112ee78b57c21513964a73208132504b91ad', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:47:31', '2023-02-10 02:47:31', '2024-02-10 09:47:31'),
	('ba8dbbf3f767c0463e9c10f9c469ca25e7da7bf1ce44f86e4a61e035b5352ac8bbbe427c06f1ccd4', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:52:01', '2023-02-10 02:52:01', '2024-02-10 09:52:01'),
	('bc95985efc86e8c7f66c6183203132927489dd8388dc6be8fbf2f8d5ee77b0a72ce55b796959ad85', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:47:57', '2023-02-10 02:47:57', '2024-02-10 09:47:57'),
	('bd8783422a8fbb45cc055ba32e8c2eeef2920adf0ac407aa4396d65e8c4ac6f98096d90d03ebc268', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:52:40', '2023-02-10 02:52:40', '2024-02-10 09:52:40'),
	('beb7e55bdb2d6c832a3ab74c579083f15689aae02af9edb473d8c81e90886755b6b44e7247f44fd6', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:07:16', '2023-02-10 03:07:16', '2024-02-10 10:07:16'),
	('c54c013ff16cb8a8485972788ca9259fb971204356dca47a64d34806ca2e3ce54145ee74d62bf091', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:58:35', '2023-02-10 02:58:35', '2024-02-10 09:58:35'),
	('cb34f517ff11a4baf329ec0c1f882a557190c2b36cfd3836d647ea1ceaa871eba662ac19b14eae4a', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:02', '2023-02-10 02:48:02', '2024-02-10 09:48:02'),
	('cbb63530b733ae65dca1e64e01cba36404d10f19b22c1be10bc20e58238ba20a49045fd716a426eb', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:54:16', '2023-02-10 02:54:16', '2024-02-10 09:54:16'),
	('d4d42649ceaf47d124a286e8c8757153bfd927f7d83e9b5124b1f313ab2fd9b27e791e4de0dbb21c', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:03:13', '2023-02-10 03:03:13', '2024-02-10 10:03:13'),
	('d6476035308ff01e7ec6c7bfeb2bce749210bd266d62810a054f3bf20980de86148823d7a0f5a880', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:51:11', '2023-02-10 02:51:11', '2024-02-10 09:51:11'),
	('dcf481ec1031f5b01c5e38d5190618c47beae529770be2d5d9fad5ca634b70fe4610d98077e30f80', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:01:19', '2023-02-10 03:01:19', '2024-02-10 10:01:19'),
	('e85064d42efc83a34387f4f16197e552769ea9d9453d27794cf652ea23afd614c30703c6ece13dd5', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:48:06', '2023-02-10 02:48:06', '2024-02-10 09:48:06'),
	('f1047583c0155a8dd21987e78ae6e1987bd1506f7043cc619f9b2970c675c22e2dc8a8f91afa710d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 03:50:22', '2023-02-10 03:50:22', '2024-02-10 10:50:22'),
	('f4c42877c8dc81562eb85db28a0e4f4c085f09f6c9ebb000b8b4ae7dc6cb998d67a1ab91c4d953ff', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:44:21', '2023-02-10 02:44:21', '2024-02-10 09:44:21'),
	('f59300ff7707dffbfe8ca91d3fc6788146e5f70f7dae61c0f71c955a0e8ba0822e59aaed512e8e13', 1, 3, 'travel_app', '[]', 0, '2023-02-10 02:44:11', '2023-02-10 02:44:11', '2024-02-10 09:44:11'),
	('f7ca225f38a0941b3f7efd72e441f4fcc863336fb5664428d55f8072ad29c964fdd7dd0c20062512', 1, 3, 'travel_app', '[]', 0, '2023-02-14 03:54:31', '2023-02-14 03:54:31', '2024-02-14 10:54:31');

-- Dumping structure for table db_laravel_starter.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.oauth_auth_codes: ~0 rows (approximately)

-- Dumping structure for table db_laravel_starter.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.oauth_clients: ~4 rows (approximately)
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, ' Personal Access Client', 'PgQEmkEv4ekJ0jYaVzlniQordOoNDUamae5XPU7J', NULL, 'http://localhost', 1, 0, 0, '2023-02-07 23:30:23', '2023-02-07 23:30:23'),
	(2, NULL, ' Password Grant Client', 'k5zn28UVAZQ6GWjTBSH8k7dRE0eSbo01ICoyyBbD', 'users', 'http://localhost', 0, 1, 0, '2023-02-07 23:30:23', '2023-02-07 23:30:23'),
	(3, NULL, ' Personal Access Client', 'KroPQIOvfRradoA220rgupPwaYmfzYh1TEpkF4ve', NULL, 'http://localhost', 1, 0, 0, '2023-02-09 08:29:33', '2023-02-09 08:29:33'),
	(4, NULL, ' Password Grant Client', '9EYzJJr2R1cMEd2yLtR9YqzrGeuVouEuD6IEPPrA', 'users', 'http://localhost', 0, 1, 0, '2023-02-09 08:29:33', '2023-02-09 08:29:33');

-- Dumping structure for table db_laravel_starter.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.oauth_personal_access_clients: ~2 rows (approximately)
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-02-07 23:30:23', '2023-02-07 23:30:23'),
	(2, 3, '2023-02-09 08:29:33', '2023-02-09 08:29:33');

-- Dumping structure for table db_laravel_starter.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping structure for table db_laravel_starter.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.password_resets: ~0 rows (approximately)

-- Dumping structure for table db_laravel_starter.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  KEY `FK_permissions_permission_group` (`permission_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.permissions: ~21 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `permission_group_id`, `desc`, `guard_name`, `created_at`, `updated_at`) VALUES
	(2, 'read module', 5, 'modul data app', 'web', '2022-11-18 03:50:20', '2023-07-18 15:04:54'),
	(11, 'delete role', 2, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(12, 'update role', 2, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(13, 'read role', 2, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(14, 'create role', 2, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(15, 'delete permission', 3, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(16, 'update permission', 3, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(17, 'read permission', 3, '', 'web', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(18, 'create permission', 3, NULL, 'web', '2022-11-18 03:50:20', '2023-07-19 06:18:45'),
	(24, 'kanban_group show perbidang', 5, '', 'web', '2023-07-13 03:03:29', '2023-07-13 03:03:29'),
	(25, 'kanban_group show sesuai anggota', 5, 'filter query select', 'web', '2023-07-13 03:03:42', '2023-07-18 15:04:48'),
	(110, 'verification data', 29, NULL, 'web', '2023-07-18 08:13:36', '2023-07-18 08:13:36'),
	(111, 'manipulate info', 29, NULL, 'web', '2023-07-18 08:13:36', '2023-07-18 08:13:36'),
	(112, 'recording data', 29, NULL, 'web', '2023-07-18 08:13:36', '2023-07-18 08:13:36'),
	(113, 'reset user', 29, NULL, 'web', '2023-07-18 08:13:36', '2023-07-18 08:13:36'),
	(137, 'www', 29, NULL, 'web', '2023-07-18 09:39:22', '2023-07-18 09:39:29'),
	(139, 'ok aja baru nih', 3, 'kdkajdkqwjd', 'web', '2023-07-18 15:10:21', '2023-07-18 15:10:21'),
	(143, 'tetsing multi2', 3, NULL, 'web', '2023-07-18 15:15:18', '2023-07-18 15:15:18'),
	(149, 'ddd', 2, NULL, 'web', '2023-07-18 15:22:04', '2023-07-18 15:22:04'),
	(150, 'mkqjdk', 2, NULL, 'web', '2023-07-18 15:22:04', '2023-07-18 15:22:04'),
	(151, 'qwdmlmwqd', 2, NULL, 'web', '2023-07-18 15:22:04', '2023-07-18 15:22:04'),
	(152, 'dqwdqwd', 3, 'qwdqwd', 'web', '2023-07-28 17:56:36', '2023-07-28 17:56:36');

-- Dumping structure for table db_laravel_starter.permission_group
CREATE TABLE IF NOT EXISTS `permission_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` text,
  `name` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.permission_group: ~4 rows (approximately)
INSERT INTO `permission_group` (`id`, `desc`, `name`, `created_at`, `updated_at`) VALUES
	(2, 'Master Data User Management', 'Role', '2023-07-14 16:58:20', '2023-07-14 16:58:20'),
	(3, 'Permissions Management Super Admin', 'Permissions', '2023-07-14 16:58:20', '2023-07-14 16:58:20'),
	(5, 'Pengelolalan kanban task', 'kanban', '2023-07-14 16:58:20', '2023-07-15 10:16:05'),
	(29, 'Permission dont without group', 'ungroup', '2023-07-18 08:10:51', '2023-07-18 08:10:51');

-- Dumping structure for table db_laravel_starter.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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

-- Dumping data for table db_laravel_starter.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table db_laravel_starter.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `desc`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'web', 'Super Admin App', '2022-11-18 03:50:20', '2022-11-18 03:50:20'),
	(3, 'employee', 'web', 'Pegawai', '2023-06-06 13:07:04', '2023-07-21 12:29:05'),
	(13, 'staff', 'web', 'staff', '2023-07-15 16:36:45', '2023-07-18 08:02:28');

-- Dumping structure for table db_laravel_starter.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.role_has_permissions: ~14 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(13, 3),
	(15, 3),
	(16, 3),
	(17, 3),
	(25, 3),
	(110, 3),
	(111, 3),
	(137, 3),
	(2, 13),
	(11, 13),
	(12, 13),
	(13, 13),
	(14, 13),
	(17, 13);

-- Dumping structure for table db_laravel_starter.sample
CREATE TABLE IF NOT EXISTS `sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `category_multi_id` varchar(200) NOT NULL,
  `days` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `date_publisher` datetime NOT NULL,
  `date_range_start` datetime NOT NULL,
  `date_range_end` datetime NOT NULL,
  `time` time NOT NULL,
  `price` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `password` varchar(50) NOT NULL,
  `contact` char(13) NOT NULL,
  `check` char(13) NOT NULL,
  `radio` char(13) NOT NULL,
  `file_cover` varchar(100) DEFAULT NULL,
  `summernote` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.sample: ~19 rows (approximately)
INSERT INTO `sample` (`id`, `title`, `desc`, `category_id`, `category_multi_id`, `days`, `month`, `start_date`, `end_date`, `date_publisher`, `date_range_start`, `date_range_end`, `time`, `price`, `password`, `contact`, `check`, `radio`, `file_cover`, `summernote`, `created_at`, `updated_at`) VALUES
	(11, 'dqwdwqddqwddwq', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-21 00:00:00', '2023-07-30 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 80.000000, '02193092013213', '2132-1312-3', 'on', 'on', 'C:\\Windows\\Temp\\phpE809.tmp', '<span style="color: rgb(33, 37, 41); background-color: rgb(244, 245, 255);">&lt;script&gt;alert("XSS")&lt;/script&gt;</span>', '2023-07-30 05:03:16', '2023-07-30 05:03:16'),
	(14, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1111111111111.000000, '02193092013213', '2132-1312-3', 'on', 'on', 'C:\\Windows\\Temp\\phpBC8.tmp', '<p>wqdwqd</p>', '2023-07-30 06:03:30', '2023-07-30 06:03:30'),
	(15, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 2131232132132.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\php9F9C.tmp', '<p>dwqdqwd</p>', '2023-07-30 06:09:35', '2023-07-30 06:09:35'),
	(16, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\phpF644.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:11:03', '2023-07-30 06:11:03'),
	(17, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\phpA4EF.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:12:53', '2023-07-30 06:12:53'),
	(18, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\phpE8CF.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:13:10', '2023-07-30 06:13:10'),
	(19, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\phpDAC3.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:14:12', '2023-07-30 06:14:12'),
	(20, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\phpA1AE.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:15:03', '2023-07-30 06:15:03'),
	(21, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\phpB8B1.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:15:09', '2023-07-30 06:15:09'),
	(22, 'dqwdwqdwqdwqdwqd', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 123123123.000000, '02193092013213', '213213123', 'on', 'on', 'C:\\Windows\\Temp\\php4C64.tmp', '<p>dqwdqwd</p>', '2023-07-30 06:36:32', '2023-07-30 06:36:32'),
	(35, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', 'e0d116a9-edab-4ac1-ac98-72993099dd01', '<p>dwqdwq</p>', '2023-07-30 15:40:09', '2023-07-30 15:40:09'),
	(37, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', '28845479-5fcc-4535-841d-5212150dfdbc', '<p>dwqdwq</p>', '2023-07-30 15:46:48', '2023-07-30 15:46:48'),
	(49, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', 'e3966fc4-2b80-4cc5-aa92-a8e6b08a8e4b', '<p>dwqdwq</p>', '2023-07-30 15:56:00', '2023-07-30 15:56:00'),
	(51, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', '3264aef7-3073-4520-919c-07d253c3f7ee', '<p>dwqdwq</p>', '2023-07-30 15:57:10', '2023-07-30 15:57:10'),
	(52, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', '810fe2b3-1879-4621-a666-b0cd584be8f7', '<p>dwqdwq</p>', '2023-07-30 15:57:27', '2023-07-30 15:57:27'),
	(53, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', 'bb51047a-25cf-4980-b444-54d7e5051d7a', '<p>dwqdwq</p>', '2023-07-30 16:16:15', '2023-07-30 16:16:15'),
	(54, 'tes upload file terbaru', 'qwdqwdwqdwqd', 'fiction', '["fiction","biography"]', 'jumat', '1', '2023-07-27 00:00:00', '2023-07-28 00:00:00', '2023-07-20 00:00:00', '2023-07-06 00:00:00', '2023-07-08 00:00:00', '12:00:00', 1212.000000, '02193092013213', '213213123', 'on', 'on', '855b2c97-a445-442d-b0cb-2930f54e965a', '<p>dwqdwq</p>', '2023-07-30 16:18:02', '2023-07-30 16:18:02');

-- Dumping structure for table db_laravel_starter.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('information','contact','payment','email','api') COLLATE utf8mb4_unicode_ci DEFAULT 'information',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.settings: ~6 rows (approximately)
INSERT INTO `settings` (`id`, `key`, `value`, `name`, `type`, `ext`, `category`, `created_at`, `updated_at`) VALUES
	(1, 'app_name', '', 'Application Short Name', 'text', NULL, 'information', '2022-11-18 03:50:20', '2023-02-16 01:24:47'),
	(2, 'app_short_name', '', 'Application Name', 'text', NULL, 'information', '2022-11-18 03:50:20', '2023-02-16 01:24:47'),
	(3, 'app_logo', '', 'Application Logo', 'file', 'png', 'information', '2022-11-18 03:50:20', '2023-02-16 01:24:47'),
	(4, 'app_favicon', '', 'Application Favicon', 'file', 'png', 'information', '2022-11-18 03:50:20', '2023-02-16 01:24:47'),
	(5, 'app_loading_gif', '', 'Application Loading Image', 'file', 'gif', 'information', '2022-11-18 03:50:20', '2023-02-16 01:24:47'),
	(6, 'app_map_loaction', 'none', 'Application Map Location', 'textarea', NULL, 'contact', '2022-11-18 03:50:20', '2023-01-18 03:51:15');

-- Dumping structure for table db_laravel_starter.styles
CREATE TABLE IF NOT EXISTS `styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `value` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.styles: ~3 rows (approximately)
INSERT INTO `styles` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'sidebar_color', '#673de6', '2023-07-18 16:05:24', '2023-07-18 16:05:25'),
	(2, 'sidebar_bg_color', '#ffffff', '2023-07-18 16:05:24', '2023-07-18 16:05:25'),
	(3, 'sidebar_header_bg', '#ffffff', '2023-07-18 16:05:24', '2023-07-18 16:05:25');

-- Dumping structure for table db_laravel_starter.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama_lengkap` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bio` text,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('AKTIF','NONAKTIF') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'AKTIF',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(33) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=112278 DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `nama_lengkap`, `kontak`, `alamat`, `bio`, `jenis_kelamin`, `status`, `password`, `remember_token`, `nama`, `foto`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
	(49, '200104282023021004', 'ok@gmail.com', 'superdev', '0323901923', NULL, NULL, NULL, 'AKTIF', '$2y$10$m1NPZ1/16nmjtixSkjpK0eEBJvF4a9WL.sUm5bWn20QSY.0hdkp3K', NULL, 'AFRIZAL FADLI', NULL, NULL, NULL, NULL, '2023-07-21 14:13:50'),
	(192, '199203312012062001', 'bb@gmail.com', 'admin1', '0829389273', NULL, NULL, NULL, 'AKTIF', '$2y$10$WK8aS6U.G5cJ.xLapx7kZOr9M6k5o0yxVfqUHBTIkh5TD.ZJqxkVa', NULL, 'RICKY EKASARI R.W', '199203312012062001.jpg', NULL, NULL, NULL, '2023-07-29 06:45:35'),
	(112277, 'superadmin', 'lianmafutra@gmail.com', 'Lian Mafutra Dev', '082244261525', 'Jl. Jawa No.99Kebun Handil, Kec. Jelutung, Kota Jambi, Jambi 36125', NULL, 'L', 'AKTIF', '$2y$10$ePONa3NdHUKKqDA1s3l1GuYIMlznMwx65bM3GawBKArA1Whp/kgTi', NULL, NULL, 'a1699373-6ddb-42aa-bca1-160729e2c994', '2023-07-30 14:10:00', '127.0.0.1', '2023-07-06 04:28:03', '2023-07-30 14:10:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

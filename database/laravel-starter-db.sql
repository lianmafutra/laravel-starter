-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


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

-- Dumping data for table db_laravel_starter.audits: ~48 rows (approximately)
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 112277, 'created', 'App\\Models\\PermissionGroup', 38, '[]', '{"id":38,"name":"dwqd","desc":"wqdqw"}', 'http://127.0.0.1:8000/admin/permission-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:14:21', '2023-07-19 01:14:21'),
	(2, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\PermissionGroup', 38, '{"id":38,"desc":"wqdqw","name":"dwqd"}', '[]', 'http://127.0.0.1:8000/admin/permission-group/38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:16:08', '2023-07-19 01:16:08'),
	(3, 'App\\Models\\User', 112277, 'created', 'App\\Models\\PermissionGroup', 39, '[]', '{"id":39,"name":"s","desc":"s"}', 'http://127.0.0.1:8000/admin/permission-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:19:21', '2023-07-19 01:19:21'),
	(4, 'App\\Models\\User', 112277, 'created', 'App\\Models\\PermissionGroup', 40, '[]', '{"id":40,"name":"dqw","desc":"dwqd"}', 'http://127.0.0.1:8000/admin/permission-group', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 01:22:45', '2023-07-19 01:22:45'),
	(5, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-18 21:24:43"}', '{"last_login_at":"2023-07-19 08:49:34"}', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 08:49:34', '2023-07-19 08:49:34'),
	(6, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\PermissionGroup', 40, '{"id":40,"desc":"dwqd","name":"dqw"}', '[]', 'http://127.0.0.1:8000/admin/permission-group/40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 08:55:15', '2023-07-19 08:55:15'),
	(7, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\PermissionGroup', 39, '{"id":39,"desc":"s","name":"s"}', '[]', 'http://127.0.0.1:8000/admin/permission-group/39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 08:58:35', '2023-07-19 08:58:35'),
	(8, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 08:49:34"}', '{"last_login_at":"2023-07-19 22:22:04"}', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:22:04', '2023-07-19 22:22:04'),
	(9, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"lwmqld","nama_lengkap":"lmdlqm","kontak":"21312","email":null,"password":"$2y$10$BryukqQ\\/CwoTrWdHW\\/K8veHRR971YQcI5AvDRd55w3rMhQ4p59IP6"}', 'http://127.0.0.1:8000/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:35:00', '2023-07-19 22:35:00'),
	(10, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"lwmqld","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"lmdlqm","kontak":"21312","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$BryukqQ\\/CwoTrWdHW\\/K8veHRR971YQcI5AvDRd55w3rMhQ4p59IP6","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://127.0.0.1:8000/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:35:10', '2023-07-19 22:35:10'),
	(11, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 22:22:04"}', '{"last_login_at":"2023-07-19 22:37:09"}', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:37:09', '2023-07-19 22:37:09'),
	(12, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 22:37:09"}', '{"last_login_at":"2023-07-19 22:41:59"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:41:59', '2023-07-19 22:41:59'),
	(13, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"dq","nama_lengkap":"dqw","kontak":null,"email":"dq","password":"$2y$10$m4wVwdfIgNTwWgoRHIM8WuHrjvMox048eEOCZgAGTVzL6.x9nlwki"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:52:33', '2023-07-19 22:52:33'),
	(14, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"dq","nip":null,"bidang_id":null,"email":"dq","nama_lengkap":"dqw","kontak":null,"alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$m4wVwdfIgNTwWgoRHIM8WuHrjvMox048eEOCZgAGTVzL6.x9nlwki","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:52:43', '2023-07-19 22:52:43'),
	(15, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112279, '[]', '{"id":112279,"username":"q","nama_lengkap":"d","kontak":null,"email":null,"password":"$2y$10$bYRF1F8Po7ifbUHBp9Dxo.\\/sqkKn1tTrx7kjnfoQY8AgOP\\/7DHzwm"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 22:57:08', '2023-07-19 22:57:08'),
	(16, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112279, '{"id":112279,"username":"q","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"d","kontak":null,"alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$bYRF1F8Po7ifbUHBp9Dxo.\\/sqkKn1tTrx7kjnfoQY8AgOP\\/7DHzwm","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112279', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 23:01:07', '2023-07-19 23:01:07'),
	(17, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 22:41:59"}', '{"last_login_at":"2023-07-19 23:03:38"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-19 23:03:38', '2023-07-19 23:03:38'),
	(18, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-19 23:03:38"}', '{"last_login_at":"2023-07-20 06:23:06"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 06:23:06', '2023-07-20 06:23:06'),
	(19, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 06:23:06"}', '{"last_login_at":"2023-07-20 09:04:47"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 09:04:47', '2023-07-20 09:04:47'),
	(20, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 48, '{"nama_lengkap":"admin2","password":"$2y$10$AjP.Sn2TTBkVpDkAOnICTu\\/uHMqfpWnI6bZYtleg6GW\\/W\\/dueQbgu"}', '{"nama_lengkap":"admin22","password":"$2y$10$iIqFXRzSULAgIIDUunfOke15McZC8DmEfV0e6CKaKDnqIqnToNE9m"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 09:25:41', '2023-07-20 09:25:41'),
	(21, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"dqwd","nama_lengkap":"wqd","kontak":"1212","email":null,"password":"$2y$10$BoNECQh3zZGVkb1k3K7xveGf0N1kscJBqUkh1bjNVFY5FdwMLbQla"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 09:25:52', '2023-07-20 09:25:52'),
	(22, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"dqwd","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"wqd","kontak":"1212","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$BoNECQh3zZGVkb1k3K7xveGf0N1kscJBqUkh1bjNVFY5FdwMLbQla","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 09:25:56', '2023-07-20 09:25:56'),
	(23, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 09:04:47"}', '{"last_login_at":"2023-07-20 19:13:42"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 19:13:42', '2023-07-20 19:13:42'),
	(24, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 48, '{"kontak":null,"password":"$2y$10$iIqFXRzSULAgIIDUunfOke15McZC8DmEfV0e6CKaKDnqIqnToNE9m"}', '{"kontak":"089902103902","password":"$2y$10$Uei3iIW\\/IEFVcHZe7wa4L.G\\/K.neOgCMh0nX4yW4Evb85e1ZbZjp."}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 20:39:28', '2023-07-20 20:39:28'),
	(25, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 49, '{"kontak":null,"password":"$2y$10$hTxfMLhXUT9bOUrRSjpdauUsarOxEeRBuYd7TP9Ojv\\/l1Yrw.9qte"}', '{"kontak":"0323901923","password":"$2y$10$3ZnbvjOQwIy6NZRtOnpoGul6t3UcIY3KjwKuXIagoFMOQ3U3MqQa6"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 20:39:42', '2023-07-20 20:39:42'),
	(26, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 48, '{"id":48,"username":"200105072023021002","nip":"200105072023021002","bidang_id":null,"email":"admin2@gmail.com","nama_lengkap":"admin22","kontak":"089902103902","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$Uei3iIW\\/IEFVcHZe7wa4L.G\\/K.neOgCMh0nX4yW4Evb85e1ZbZjp.","remember_token":null,"gldepan":null,"nama":"ADIB YUDA PRATAMA","glblk":"A.Md.Ak.","kunker":"4002000000","nunker":"INSPEKTORAT KOTA JAMBI","kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/48', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 20:39:54', '2023-07-20 20:39:54'),
	(27, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 19:13:42"}', '{"last_login_at":"2023-07-20 23:57:32"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 23:57:32', '2023-07-20 23:57:32'),
	(28, 'App\\Models\\User', 112277, 'created', 'App\\Models\\User', 112278, '[]', '{"id":112278,"username":"d","nama_lengkap":"dq","kontak":"3213","email":null,"password":"$2y$10$4TPThJtFlKmQO2V6lFJR9O4rkB0Fu6VkemsMAj2Mko525\\/fcd8tYK"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 23:57:51', '2023-07-20 23:57:51'),
	(29, 'App\\Models\\User', 112277, 'deleted', 'App\\Models\\User', 112278, '{"id":112278,"username":"d","nip":null,"bidang_id":null,"email":null,"nama_lengkap":"dq","kontak":"3213","alamat":null,"jenis_kelamin":null,"status":"AKTIF","password":"$2y$10$4TPThJtFlKmQO2V6lFJR9O4rkB0Fu6VkemsMAj2Mko525\\/fcd8tYK","remember_token":null,"gldepan":null,"nama":null,"glblk":null,"kunker":null,"nunker":null,"kjab":null,"njab":null,"foto":null,"keselon":null,"neselon":null,"kgolru":null,"ngolru":null,"pangkat":null,"last_login_at":null,"last_login_ip":null}', '[]', 'http://laravel-starter.test:8080/admin/master-user/112278', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-20 23:58:14', '2023-07-20 23:58:14'),
	(30, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"foto":null}', '{"foto":"a1699373-6ddb-42aa-bca1-160729e2c994"}', 'http://laravel-starter.test:8080/user/profile/photo/change', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:13:20', '2023-07-21 00:13:20'),
	(31, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"kontak":"082244261525"}', '{"kontak":"0822442615252"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:36:16', '2023-07-21 00:36:16'),
	(32, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"kontak":"0822442615252"}', '{"kontak":"082244261525"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:36:21', '2023-07-21 00:36:21'),
	(33, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"email":"lianmafutra@gmail.com","kontak":"082244261525"}', '{"email":"lianmafutra@gmail.com2","kontak":"0822442615252"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:36:48', '2023-07-21 00:36:48'),
	(34, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"email":"lianmafutra@gmail.com2","nama_lengkap":"Lian Mafutra Dev","kontak":"0822442615252"}', '{"email":"lianmafutra@gmail.com22","nama_lengkap":"Lian Mafutra Dev2","kontak":"08224426152522"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:37:04', '2023-07-21 00:37:04'),
	(35, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"email":"lianmafutra@gmail.com22","nama_lengkap":"Lian Mafutra Dev2","kontak":"08224426152522"}', '{"email":"lianmafutra@gmail.com","nama_lengkap":"Lian Mafutra Dev","kontak":"082244261525"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:37:11', '2023-07-21 00:37:11'),
	(36, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"alamat":null}', '{"alamat":"jl"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:38:07', '2023-07-21 00:38:07'),
	(37, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"alamat":"jl"}', '{"alamat":"Jl. Jawa No.99Kebun Handil, Kec. Jelutung, Kota Jambi, Jambi 36125"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:40:51', '2023-07-21 00:40:51'),
	(38, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"jenis_kelamin":null}', '{"jenis_kelamin":"L"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:45:12', '2023-07-21 00:45:12'),
	(39, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"jenis_kelamin":"L"}', '{"jenis_kelamin":"P"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:46:12', '2023-07-21 00:46:12'),
	(40, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"jenis_kelamin":"P"}', '{"jenis_kelamin":"L"}', 'http://laravel-starter.test:8080/user/profile/112277', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 00:46:17', '2023-07-21 00:46:17'),
	(41, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-20 23:57:32"}', '{"last_login_at":"2023-07-21 02:02:05"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:02:05', '2023-07-21 02:02:05'),
	(42, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-21 02:02:05"}', '{"last_login_at":"2023-07-21 02:04:40"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 02:04:40', '2023-07-21 02:04:40'),
	(43, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"last_login_at":"2023-07-21 02:04:40"}', '{"last_login_at":"2023-07-21 08:36:29"}', 'http://laravel-starter.test:8080/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 08:36:29', '2023-07-21 08:36:29'),
	(44, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 49, '{"password":"$2y$10$3ZnbvjOQwIy6NZRtOnpoGul6t3UcIY3KjwKuXIagoFMOQ3U3MqQa6"}', '{"password":"$2y$10$uZSdsqJzPyUXfedJpMMJ9eFGTuTnh4uZQlUgVk6h31q8Ttj\\/HYcDK"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 09:30:08', '2023-07-21 09:30:08'),
	(45, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 192, '{"password":"$2y$10$2wLaswl9FTPeSvgcLgdCl.VyxNLafluR.unhmuLqyz8\\/ixyl9G.mi"}', '{"password":"$2y$10$fcSX59FP\\/0WKNUPQgV41WOZuGwXli\\/xajGPbfEgmlhKiBtam9q\\/8S"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 09:30:16', '2023-07-21 09:30:16'),
	(46, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 192, '{"password":"$2y$10$fcSX59FP\\/0WKNUPQgV41WOZuGwXli\\/xajGPbfEgmlhKiBtam9q\\/8S"}', '{"password":"$2y$10$iTIA4LGNVzrczxNdScEBEexn4k9ml7HAZLzkQgwcb0nHV8zq.yRwm"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 09:30:25', '2023-07-21 09:30:25'),
	(47, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 112277, '{"password":"$2y$10$chRjlp8KIegoD6wsyAwMi.Vm9no0A\\/SjWyDC9ivLiWsTRUUStANga"}', '{"password":"$2y$10$0NB6gLigZ4UxuZ0nnjaQxuSqr2Nk8L7KQTn6NK3DJq9uF418UOIL6"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 09:33:47', '2023-07-21 09:33:47'),
	(48, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 49, '{"email":null,"password":"$2y$10$uZSdsqJzPyUXfedJpMMJ9eFGTuTnh4uZQlUgVk6h31q8Ttj\\/HYcDK"}', '{"email":"ok@gmail.com","password":"$2y$10$2alaM\\/qTDj2dsNLml4WrHeNznfGcvuMCwoxpKNA8\\/1xTOG9.wNO86"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 09:34:03', '2023-07-21 09:34:03'),
	(49, 'App\\Models\\User', 112277, 'updated', 'App\\Models\\User', 192, '{"email":null,"kontak":null,"password":"$2y$10$iTIA4LGNVzrczxNdScEBEexn4k9ml7HAZLzkQgwcb0nHV8zq.yRwm"}', '{"email":"bb@gmail.com","kontak":"0829389273","password":"$2y$10$SdutgiYNd3dG.HiAYT6h0u2J7IVLVOCNeF1OjuMy.w18\\/BC0J.i12"}', 'http://laravel-starter.test:8080/admin/master-user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82', NULL, '2023-07-21 09:34:19', '2023-07-21 09:34:19');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `deploy_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `deploy_log` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table db_laravel_starter.file
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` varchar(500) DEFAULT NULL,
  `parent_file_id` int(11) NOT NULL,
  `name_origin` text NOT NULL,
  `name_random` text NOT NULL,
  `path` varchar(500) NOT NULL,
  `size` varchar(500) DEFAULT NULL,
  `desc` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_file_users` (`created_by`),
  KEY `FK_file_kanban` (`parent_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table db_laravel_starter.file: ~22 rows (approximately)
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` (`id`, `file_id`, `parent_file_id`, `name_origin`, `name_random`, `path`, `size`, `desc`, `created_by`, `created_at`, `updated_at`) VALUES
	(11, '9693259e-a647-4dba-9de2-1cdbfb3000ff', 3, 'file-2.pdf', 'file-2-7daa5b6f-7e78-48b6-bc29-2c724baa40cc-0aEzK7TqMnAddVLF97NCQC4kMWH5ai4ktif9FJVgNdsUzDYvkR.pdf', '2023/07/file_pk', '42111', NULL, 46, '2023-07-10 14:53:02', '2023-07-10 14:53:02'),
	(12, 'f16597a4-80c9-4c56-aa8e-2e958f845abf', 3, 'file-2.pdf', 'file-2-b347f42a-db2c-49f5-a756-01e3d2fa57ff-fZEPEriOzzLl6tkbBCQ5NcZ0yBLmu9hFvVzfU5bKjcRsiCPry5.pdf', '2023/07/file_tindak_lanjut', '42111', NULL, 46, '2023-07-10 14:53:02', '2023-07-10 14:53:02'),
	(14, '8c6d6e31-dd7f-42dd-9f40-c784add1873c', 4, 'file-2.pdf', 'file-2-e8afb78b-e9e3-4d99-97c6-02069a7adfca-yqqNbGPG0Te9ksJPsrcPsvqaDSgGscjQW2rYuQRDJl90vWOFNJ.pdf', '2023/07/file_pk', '42111', NULL, 46, '2023-07-10 15:14:52', '2023-07-10 15:14:52'),
	(15, '89de1b05-e071-4baf-b464-22ee8cd3aa6b', 1, 'file-2.pdf', 'file-2-abbab701-6bee-4b15-ae16-c750995d998f-1htYn0CPfwPuR7ljGv0XSFrtzUu0j0gHkXmxyQ6PQb0F1TDO9z.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 08:53:08', '2023-07-12 08:53:08'),
	(17, '22428112-fa45-4abe-9d11-add0fdddd57b', 3, 'file-2.pdf', 'file-2-cb92bc96-db9f-440e-8afa-de99491c1d2c-urGv8ZX2v73LAtAOZNjoqQ6gqFAoSkPWEZvkuRlVlNROG1m0ed.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 10:32:20', '2023-07-12 10:32:20'),
	(18, '3eae342d-88f3-4d7a-83cd-1b4a41a26b8e', 4, 'file-2.pdf', 'file-2-b406de41-2048-41f4-83ac-f027e5476011-mV7hVveXr8hCx4nI6wPkBIshpgni3f3QgVpIaI1eKmk9U0t2Ij.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 10:36:48', '2023-07-12 10:36:48'),
	(20, '1502d86c-ba80-4fc8-8fb7-10338561b5ef', 6, 'file-2-cb92bc96-db9f-440e-8afa-de99491c1d2c-urGv8ZX2v73LAtAOZNjoqQ6gqFAoSkPWEZvkuRlVlNROG1m0ed-6c8c2bb2-26e1-48dc-a0fd-cdd252da07bb-rH5Tz2sTdnvaTYh15RklrJqwzJj0lWtqS88QCsmgwvt3axFE9W.pdf', 'file-2-cb92bc96-db9f-440e-8afa-de99491c1d2c-urGv8ZX2v73LAtAOZNjoqQ6gqFAoSkPWEZvkuRlVlNROG1m0ed-6c8c2bb2-26e1-48dc-a0fd-cdd252da07bb-rH5Tz2sTdnvaTYh15RklrJqwzJj0lWtqS88QCsmgwvt3axFE9W-1777f954-7ce6-4ca5-9f23-7244961e8733-SSYdEgARI7yIMOkRlm5Sle9DEb75urzkidEe8E1r0MXrDqYPJP.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 10:46:07', '2023-07-12 10:46:07'),
	(21, '609c3733-511f-41a6-8a79-917d89f6a0b6', 6, 'file-2.pdf', 'file-2-52f77d0a-f6e5-47e8-859f-111e1fe1f515-5pgsj2wncIVjo16tH8B1SIGFVFBohigkU54nItcn2RdZK2mT30.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 10:47:00', '2023-07-12 10:47:00'),
	(22, '87960e42-142d-4100-8fec-68da7086733f', 6, 'file-2-52f77d0a-f6e5-47e8-859f-111e1fe1f515-5pgsj2wncIVjo16tH8B1SIGFVFBohigkU54nItcn2RdZK2mT30.pdf', 'file-2-52f77d0a-f6e5-47e8-859f-111e1fe1f515-5pgsj2wncIVjo16tH8B1SIGFVFBohigkU54nItcn2RdZK2mT30-f92808fa-9210-407c-9b17-ceb81dba554c-qENglA4O9yj521NvlVXVfCIdGfdABM9u0lU7HlJF0y3H3DsmMj.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 10:47:07', '2023-07-12 10:47:07'),
	(23, '65586a74-a711-4dd0-b81d-21bd3b1115f6', 6, 'file-2-52f77d0a-f6e5-47e8-859f-111e1fe1f515-5pgsj2wncIVjo16tH8B1SIGFVFBohigkU54nItcn2RdZK2mT30-f92808fa-9210-407c-9b17-ceb81dba554c-qENglA4O9yj521NvlVXVfCIdGfdABM9u0lU7HlJF0y3H3DsmMj.pdf', 'file-2-52f77d0a-f6e5-47e8-859f-111e1fe1f515-5pgsj2wncIVjo16tH8B1SIGFVFBohigkU54nItcn2RdZK2mT30-f92808fa-9210-407c-9b17-ceb81dba554c-qENglA4O9yj521NvlVXVfCIdGfdABM9u0lU7HlJF0y3H3DsmMj-3b11b5ba-382e-4be0-a57d-9b7b83ee0e4e-LftcYfEayumwibOGwDTLkWiNp6bbTK2wKtewdxA5xioJjqrED7.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 10:47:15', '2023-07-12 10:47:15'),
	(24, '34fd852b-5d10-47b4-bc52-cd2cc1e43574', 6, 'file-1.pdf', 'file-1-d4a74eab-c73e-4e29-8f49-12c035bb7b8d-0modPvUZ81JPNje7jKe52N6B7mwiOrO6GLcaTIXKRWcTmPIY2s.pdf', '2023/07/file_regulasi', '41783', NULL, 46, '2023-07-12 11:10:05', '2023-07-12 11:10:05'),
	(25, 'fcfa9cf5-06f8-4ad1-a214-e5a8b20af9c3', 6, 'file-2.pdf', 'file-2-3ce3678d-7bc4-4032-b233-076f342064e3-mNv8cnnQ64n1TFLUEkITOVKhOy7T2eWJUnH96TZctUGvcmSLkC.pdf', '2023/07/file_regulasi', '42111', NULL, 46, '2023-07-12 11:10:17', '2023-07-12 11:10:17'),
	(26, '198707142014032014.jpg', 46, 'user_blank.png', 'user_blank-073dea83-20eb-478c-a349-ee23c78f3409-BAnj5bxYYEcRViXFVa5YYbkUwUfUdSxxY7i3QiJR5j0cYTj1Dg.png', '2023/07/profile', '2158', NULL, NULL, '2023-07-12 14:20:23', '2023-07-12 14:20:23'),
	(28, 'a18d9a7d-730d-4b96-93db-a93cfa952338', 1, 'file-1.pdf', 'file-1-a261652b-2ee5-41d8-9a24-cfdaa3a94940-xM9HokJrAjptUUAgZFTtBlhqFnsGMlicieMTvZ6v2ojg72jN52.pdf', '2023/07/file_surat_masuk', '41783', NULL, 46, '2023-07-12 14:51:53', '2023-07-12 14:51:53'),
	(30, 'fea43643-8ce3-482c-8e27-0d697a6c22ab', 5, 'file-2.pdf', 'file-2-c16d2dc3-254e-4977-badd-098f60f40d2f-tZ830Ab6S7kqFuBLXyfBl8LxB1YLNcUvC6yZu3YhLmQkHlxWcr.pdf', '2023/07/file_nodis', '42111', NULL, 46, '2023-07-13 10:37:08', '2023-07-13 10:37:08'),
	(31, '8d1b8e55-a6e8-4e0a-a9b1-e61f80c10627', 5, 'file-1.pdf', 'file-1-c8595641-fbb7-4f22-a1c4-08acdc2714a8-4Bvecs7TPOXmUE7FnBXC8Zoh0TpQXbaRz656jwZNQ7dKmpIXOH.pdf', '2023/07/file_pk', '41783', NULL, 46, '2023-07-13 10:37:08', '2023-07-13 10:37:08'),
	(32, '6c6aa8b7-adb6-48ba-b8f7-11d188368556', 5, 'file-1.pdf', 'file-1-59488896-71cd-4a41-9293-d5a11da8621e-Ef2mKcwTdb5ok3N0EwpQOVzeLlyv3xSrvd28jGJaTrkhBcKcc2.pdf', '2023/07/file_tindak_lanjut', '41783', NULL, 46, '2023-07-13 10:37:08', '2023-07-13 10:37:08'),
	(33, '2386cb6e-5bba-4b39-9320-733cac8d6a26', 6, 'file-1.pdf', 'file-1-c70c0e1f-14ed-4b07-8360-fe9fd609aa44-tYogiE9jtTx0oCG7s2QFUNybgWHeuZmh7TKLsfRxvNRC2lmpqR.pdf', '2023/07/file_nodis', '41783', NULL, 46, '2023-07-13 10:57:55', '2023-07-13 10:57:55'),
	(34, 'ed103984-44b2-4fed-83d0-a6298e33c9f8', 6, 'file-1.pdf', 'file-1-d5b763d8-da49-4a9d-9810-637247a83b2f-zRLjjqcHABHlSkt9ROjQzjJ5JHJoQmmB3cYvV7EsV1pomEKsjT.pdf', '2023/07/file_pk', '41783', NULL, 46, '2023-07-13 10:57:55', '2023-07-13 10:57:55'),
	(35, '0f9c6bba-ee74-4fea-b554-72f69e8552af', 6, 'file-2.pdf', 'file-2-b1d598d9-7e70-43fa-86a1-92df31613f5f-3GBresTXuJZocYZvNbHN7SS2iRO17mw8AtaGuiPfBON8UiHMZ0.pdf', '2023/07/file_tindak_lanjut', '42111', NULL, 46, '2023-07-13 10:57:56', '2023-07-13 10:57:56'),
	(36, '010252627.jpg', 55, 'logo_inspektorat.png', 'logo_inspektorat-c081f479-d216-4d37-bde4-e1773c2b9b04-AUGiBacNBwNLmCKJtfVaDUgzW0Xv79JNpOZREcY0a6W1Ji4EUA.png', '2023/07/profile', '7733', NULL, NULL, '2023-07-13 14:35:17', '2023-07-13 14:35:17'),
	(37, '010259564.jpg', 3, 'avatar3.png', 'avatar3-d885e44c-f4f3-495d-884b-2b4a15a7b6ad-Yqcmj1m8o9f1Z1EH63R6g9apofVaJFt5QnWBKV6dGkUoOl8Nik.png', '2023/07/profile', '23799', NULL, NULL, '2023-07-13 15:29:43', '2023-07-13 15:29:43'),
	(38, 'a1699373-6ddb-42aa-bca1-160729e2c994', 112277, 'gambar3.jpg', 'gambar3-ca39f71e-a93e-40fe-a6bc-355a53afb99b-oHRuzU3y6p7zlpu8s6BubGpVWMxUwy3YGfOZMUC17VXEFwTdyS.jpg', '2023/07/profile', '107329', NULL, NULL, '2023-07-21 00:13:20', '2023-07-21 00:13:20');
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

-- Dumping structure for table db_laravel_starter.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.migrations: ~11 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_laravel_starter.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.model_has_permissions: ~1 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(13, 'App\\Models\\User', 14),
	(3, 'App\\Models\\User', 49),
	(13, 'App\\Models\\User', 192),
	(1, 'App\\Models\\User', 112277);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('07195761e4ed2667474d5b202c0c97a3955bb3e2987d2c1163b5449117c29752621fc94592a248cc', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:00', '2023-02-10 09:48:00', '2024-02-10 09:48:00'),
	('0cacde07e93c6d9eafdef75044c47795fc94ff2ac233eb9f1c603b426135eb6d5b9843c6f175d5a3', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:50:06', '2023-02-10 10:50:06', '2024-02-10 10:50:06'),
	('34054cbb2d1a5cc5731652c5821b0c93b9eef5d4df15d7fb2bd9546b592829b5008c4747fb31eb53', 1, 3, 'travel_app', '[]', 0, '2023-02-14 11:14:20', '2023-02-14 11:14:20', '2024-02-14 11:14:20'),
	('3576c6b0526b1ae5e3454868cb3f13a534a0df1cbb980f1cd4d5f1c1d7956e6277da708ba363f24d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:03', '2023-02-10 09:48:04', '2024-02-10 09:48:03'),
	('3ee726fee0c27ec5d33e5c1c227a2ec70e1a3743fedfe4de0bd0083df22b9ada5496b16dc64c161d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:47:58', '2023-02-10 09:47:58', '2024-02-10 09:47:58'),
	('40928a7755933429a164d12723b70b4a7305880debdb4d7fc030627584fdec58b80630a4d39e2056', 1, 3, 'travel_app', '[]', 0, '2023-02-16 14:49:24', '2023-02-16 14:49:24', '2024-02-16 14:49:24'),
	('42605287b5f335d6e42e62aabe6829d351562e927e60f6714532e1b9e4b87442ab9b46c8e47092f7', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:06:53', '2023-02-10 10:06:53', '2024-02-10 10:06:53'),
	('42d94451cfa677a2782cd07d1dc6e34573223fecb5bd048b85acf017ba107a3d08063992bc29676c', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:55:11', '2023-02-10 09:55:11', '2024-02-10 09:55:11'),
	('4624418fdf90aaff4be39e48c70e5e62f3e97d84c868006e33a459f6eddea4c86332d35a88a83fa4', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:45:38', '2023-02-10 09:45:38', '2024-02-10 09:45:38'),
	('46cc8c07f5ee151fef04fac3cd547f25a41952c1455b91ed1208e145eb284dbb0145d69b55d4d896', 1, 3, 'travel_app', '[]', 0, '2023-02-16 14:49:36', '2023-02-16 14:49:36', '2024-02-16 14:49:36'),
	('496cbc87ec405170856ff0dfb0d14dde8fab1704142e9e3d355fe043933244efde631d06597742d9', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:01', '2023-02-10 09:48:01', '2024-02-10 09:48:01'),
	('4e04f79ca4db950533b69e31dddf5e8c4847c632e4c5e3e6dd76cf9e78bb467293762ebd6058ee19', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:45:33', '2023-02-10 09:45:33', '2024-02-10 09:45:33'),
	('51d044e81a090e9eb68d43e04a50e3057e603807bd10f985710c28118bcf8baecbe8417700d9aa2e', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:57:00', '2023-02-10 09:57:00', '2024-02-10 09:57:00'),
	('5726eb11138b5c01a79ad754e396c3e06f3af8490628ccb79f89c9b9285a83fedfd3be2737f63caa', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:57:50', '2023-02-10 09:57:50', '2024-02-10 09:57:50'),
	('586d56c63c8b46ef293738b9bfbcbe74879233ccf35e9aaf5f3807c0babd9cbde837154f6796d7f7', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:50', '2023-02-10 09:48:50', '2024-02-10 09:48:50'),
	('5b0e011a90d78964b14436e2a232a8a91cd576698dcb4aaa8abda0369fe03f092b249f94404eb792', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:04', '2023-02-10 09:48:04', '2024-02-10 09:48:04'),
	('6102e759812668631eca97be12ba78a3136499f751760ae541f34c82ae7e36647b234beb5ad4559a', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:01:43', '2023-02-10 10:01:43', '2024-02-10 10:01:43'),
	('67a872175f784ffd70a5b517d212986e786e5f55254b1255bcb2a904c65d5dd2c25b13cc5af78397', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:01', '2023-02-10 09:48:01', '2024-02-10 09:48:01'),
	('684bf7b2acd10b665831b60a6ec345ae428ca6b012faf1d7e83f7aa3563475a93fecf7bef97c203d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:06:39', '2023-02-10 10:06:39', '2024-02-10 10:06:39'),
	('712683828de8b9a3ca5a6269171d88d9c2031a096922dad3421533efe7143c7ab3071c17dff57855', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:47:59', '2023-02-10 09:47:59', '2024-02-10 09:47:59'),
	('72aa8a12af40740c9151b1729c7caa19bbcf421ae4f6589ac2b7f0157eea443126a8659d1d85d6b6', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:43:09', '2023-02-10 09:43:09', '2024-02-10 09:43:09'),
	('73d4654d09902cc2adfd428a5c33277819a190f81cf53f7faef2a04c43f9f80f10bcc90e461166b8', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:49:55', '2023-02-10 10:49:55', '2024-02-10 10:49:55'),
	('7e8dd4f375f605e43ae0100f9c12f14d9949ff8fd1c186e013778a4568cca9a00cd5d48ae217fc68', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:49:42', '2023-02-10 10:49:42', '2024-02-10 10:49:42'),
	('81b83b003226cb344cd1571f9888c6617c2ecf417add0e943d7ade64fcc3abaea2454a424969cb5e', 1, 3, 'travel_app', '[]', 0, '2023-02-10 11:00:23', '2023-02-10 11:00:23', '2024-02-10 11:00:23'),
	('845f648de84d5d561a5216e8bda5ef86fd76a0eb93062e13aa6bce8482404a46b840b07799018107', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:49:47', '2023-02-10 09:49:47', '2024-02-10 09:49:47'),
	('88add6a6e08bf506d5ff89b34cce7c817315f594f5c366891c7688862e247ce18eb16a55a3d1810b', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:43:51', '2023-02-10 09:43:51', '2024-02-10 09:43:51'),
	('8c7ef32cb3046726582c7c33fa68829a9e5a62cd1a27f314ce296ee51c19c787f0520aafb420029f', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:46:51', '2023-02-10 09:46:51', '2024-02-10 09:46:51'),
	('94ca1d354083b9b0cfd6293e17f782e6f8fc82f23d88e53d76f6cc5509bb4158bb15fa1e91865660', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:00:52', '2023-02-10 10:00:52', '2024-02-10 10:00:52'),
	('99c86b2fd234a3c067fd9de2cba0b5b9548a9c03969537660344253950ba90f3d4ea03e86210fb9f', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:47:47', '2023-02-10 09:47:47', '2024-02-10 09:47:47'),
	('a50b8d7dadcd839424e17b87ff3ea0ed4a89c40c0f8685e0c9d6d196572c969dc5af9a282d5fdab2', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:50:44', '2023-02-10 10:50:44', '2024-02-10 10:50:44'),
	('a52aee9f34056e60dfecf34d6892e840725d9f9ff3982b69b065cb6bcfa68269cdc6ebe16f00a877', 1, 3, 'travel_app', '[]', 0, '2023-02-10 11:00:36', '2023-02-10 11:00:36', '2024-02-10 11:00:36'),
	('a5aeb225c40946778bf0cab82b4832e26913eae0b44e50e132a1261d76e343b76a1462ab605aab87', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:39:26', '2023-02-10 09:39:26', '2024-02-10 09:39:26'),
	('b0838337b3b206f22c762f1cb4f5b5229050188a06b1c2de2316f89539a1bb93b08d610f85a5be4e', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:28', '2023-02-10 09:48:28', '2024-02-10 09:48:28'),
	('b1150f06f0cf87e797ad45e3ca3099cfb9ed4e5c3271256db15a8b0ca8672a93aab3dd4c96606441', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:53:20', '2023-02-10 09:53:20', '2024-02-10 09:53:20'),
	('b702afff924ea5cb7f346a6d4f091f0b90f91cf99840f7522daeb6e9e21e361dc28f8ca3f26027fa', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:00:19', '2023-02-10 10:00:19', '2024-02-10 10:00:19'),
	('b75d04a1179639f7baa49aa1b8642aca64b16c07809b112ee78b57c21513964a73208132504b91ad', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:47:31', '2023-02-10 09:47:31', '2024-02-10 09:47:31'),
	('ba8dbbf3f767c0463e9c10f9c469ca25e7da7bf1ce44f86e4a61e035b5352ac8bbbe427c06f1ccd4', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:52:01', '2023-02-10 09:52:01', '2024-02-10 09:52:01'),
	('bc95985efc86e8c7f66c6183203132927489dd8388dc6be8fbf2f8d5ee77b0a72ce55b796959ad85', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:47:57', '2023-02-10 09:47:57', '2024-02-10 09:47:57'),
	('bd8783422a8fbb45cc055ba32e8c2eeef2920adf0ac407aa4396d65e8c4ac6f98096d90d03ebc268', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:52:40', '2023-02-10 09:52:40', '2024-02-10 09:52:40'),
	('beb7e55bdb2d6c832a3ab74c579083f15689aae02af9edb473d8c81e90886755b6b44e7247f44fd6', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:07:16', '2023-02-10 10:07:16', '2024-02-10 10:07:16'),
	('c54c013ff16cb8a8485972788ca9259fb971204356dca47a64d34806ca2e3ce54145ee74d62bf091', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:58:35', '2023-02-10 09:58:35', '2024-02-10 09:58:35'),
	('cb34f517ff11a4baf329ec0c1f882a557190c2b36cfd3836d647ea1ceaa871eba662ac19b14eae4a', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:02', '2023-02-10 09:48:02', '2024-02-10 09:48:02'),
	('cbb63530b733ae65dca1e64e01cba36404d10f19b22c1be10bc20e58238ba20a49045fd716a426eb', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:54:16', '2023-02-10 09:54:16', '2024-02-10 09:54:16'),
	('d4d42649ceaf47d124a286e8c8757153bfd927f7d83e9b5124b1f313ab2fd9b27e791e4de0dbb21c', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:03:13', '2023-02-10 10:03:13', '2024-02-10 10:03:13'),
	('d6476035308ff01e7ec6c7bfeb2bce749210bd266d62810a054f3bf20980de86148823d7a0f5a880', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:51:11', '2023-02-10 09:51:11', '2024-02-10 09:51:11'),
	('dcf481ec1031f5b01c5e38d5190618c47beae529770be2d5d9fad5ca634b70fe4610d98077e30f80', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:01:19', '2023-02-10 10:01:19', '2024-02-10 10:01:19'),
	('e85064d42efc83a34387f4f16197e552769ea9d9453d27794cf652ea23afd614c30703c6ece13dd5', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:48:06', '2023-02-10 09:48:06', '2024-02-10 09:48:06'),
	('f1047583c0155a8dd21987e78ae6e1987bd1506f7043cc619f9b2970c675c22e2dc8a8f91afa710d', 1, 3, 'travel_app', '[]', 0, '2023-02-10 10:50:22', '2023-02-10 10:50:22', '2024-02-10 10:50:22'),
	('f4c42877c8dc81562eb85db28a0e4f4c085f09f6c9ebb000b8b4ae7dc6cb998d67a1ab91c4d953ff', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:44:21', '2023-02-10 09:44:21', '2024-02-10 09:44:21'),
	('f59300ff7707dffbfe8ca91d3fc6788146e5f70f7dae61c0f71c955a0e8ba0822e59aaed512e8e13', 1, 3, 'travel_app', '[]', 0, '2023-02-10 09:44:11', '2023-02-10 09:44:11', '2024-02-10 09:44:11'),
	('f7ca225f38a0941b3f7efd72e441f4fcc863336fb5664428d55f8072ad29c964fdd7dd0c20062512', 1, 3, 'travel_app', '[]', 0, '2023-02-14 10:54:31', '2023-02-14 10:54:31', '2024-02-14 10:54:31');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, ' Personal Access Client', 'PgQEmkEv4ekJ0jYaVzlniQordOoNDUamae5XPU7J', NULL, 'http://localhost', 1, 0, 0, '2023-02-08 06:30:23', '2023-02-08 06:30:23'),
	(2, NULL, ' Password Grant Client', 'k5zn28UVAZQ6GWjTBSH8k7dRE0eSbo01ICoyyBbD', 'users', 'http://localhost', 0, 1, 0, '2023-02-08 06:30:23', '2023-02-08 06:30:23'),
	(3, NULL, ' Personal Access Client', 'KroPQIOvfRradoA220rgupPwaYmfzYh1TEpkF4ve', NULL, 'http://localhost', 1, 0, 0, '2023-02-09 15:29:33', '2023-02-09 15:29:33'),
	(4, NULL, ' Password Grant Client', '9EYzJJr2R1cMEd2yLtR9YqzrGeuVouEuD6IEPPrA', 'users', 'http://localhost', 0, 1, 0, '2023-02-09 15:29:33', '2023-02-09 15:29:33');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table db_laravel_starter.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.oauth_personal_access_clients: ~2 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-02-08 06:30:23', '2023-02-08 06:30:23'),
	(2, 3, '2023-02-09 15:29:33', '2023-02-09 15:29:33');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table db_laravel_starter.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_laravel_starter.permissions: ~19 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `permission_group_id`, `desc`, `guard_name`, `created_at`, `updated_at`) VALUES
	(2, 'read module', 5, 'modul data app', 'web', '2022-11-18 10:50:20', '2023-07-18 22:04:54'),
	(11, 'delete role', 2, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(12, 'update role', 2, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(13, 'read role', 2, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(14, 'create role', 2, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(15, 'delete permission', 3, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(16, 'update permission', 3, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(17, 'read permission', 3, '', 'web', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(18, 'create permission', 3, NULL, 'web', '2022-11-18 10:50:20', '2023-07-19 13:18:45'),
	(24, 'kanban_group show perbidang', 5, '', 'web', '2023-07-13 10:03:29', '2023-07-13 10:03:29'),
	(25, 'kanban_group show sesuai anggota', 5, 'filter query select', 'web', '2023-07-13 10:03:42', '2023-07-18 22:04:48'),
	(110, 'verification data', 29, NULL, 'web', '2023-07-18 15:13:36', '2023-07-18 15:13:36'),
	(111, 'manipulate info', 29, NULL, 'web', '2023-07-18 15:13:36', '2023-07-18 15:13:36'),
	(112, 'recording data', 29, NULL, 'web', '2023-07-18 15:13:36', '2023-07-18 15:13:36'),
	(113, 'reset user', 29, NULL, 'web', '2023-07-18 15:13:36', '2023-07-18 15:13:36'),
	(137, 'www', 29, NULL, 'web', '2023-07-18 16:39:22', '2023-07-18 16:39:29'),
	(139, 'ok aja baru nih', 3, 'kdkajdkqwjd', 'web', '2023-07-18 22:10:21', '2023-07-18 22:10:21'),
	(143, 'tetsing multi2', 3, NULL, 'web', '2023-07-18 22:15:18', '2023-07-18 22:15:18'),
	(149, 'ddd', 2, NULL, 'web', '2023-07-18 22:22:04', '2023-07-18 22:22:04'),
	(150, 'mkqjdk', 2, NULL, 'web', '2023-07-18 22:22:04', '2023-07-18 22:22:04'),
	(151, 'qwdmlmwqd', 2, NULL, 'web', '2023-07-18 22:22:04', '2023-07-18 22:22:04');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `permission_group` DISABLE KEYS */;
INSERT INTO `permission_group` (`id`, `desc`, `name`, `created_at`, `updated_at`) VALUES
	(2, 'Master Data User Management', 'Role', '2023-07-14 23:58:20', '2023-07-14 23:58:20'),
	(3, 'Permissions Management Super Admin', 'Permissions', '2023-07-14 23:58:20', '2023-07-14 23:58:20'),
	(5, 'Pengelolalan kanban task', 'kanban', '2023-07-14 23:58:20', '2023-07-15 17:16:05'),
	(29, 'Permission dont without group', 'ungroup', '2023-07-18 15:10:51', '2023-07-18 15:10:51');
/*!40000 ALTER TABLE `permission_group` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `desc`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'web', 'Super Admin App', '2022-11-18 10:50:20', '2022-11-18 10:50:20'),
	(3, 'employee', 'web', 'Pegawai', '2023-06-06 20:07:04', '2023-07-21 19:29:05'),
	(13, 'staff', 'web', 'staff', '2023-07-15 23:36:45', '2023-07-18 15:02:28');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `value`, `name`, `type`, `ext`, `category`, `created_at`, `updated_at`) VALUES
	(1, 'app_name', '', 'Application Short Name', 'text', NULL, 'information', '2022-11-18 10:50:20', '2023-02-16 08:24:47'),
	(2, 'app_short_name', '', 'Application Name', 'text', NULL, 'information', '2022-11-18 10:50:20', '2023-02-16 08:24:47'),
	(3, 'app_logo', '', 'Application Logo', 'file', 'png', 'information', '2022-11-18 10:50:20', '2023-02-16 08:24:47'),
	(4, 'app_favicon', '', 'Application Favicon', 'file', 'png', 'information', '2022-11-18 10:50:20', '2023-02-16 08:24:47'),
	(5, 'app_loading_gif', '', 'Application Loading Image', 'file', 'gif', 'information', '2022-11-18 10:50:20', '2023-02-16 08:24:47'),
	(6, 'app_map_loaction', 'none', 'Application Map Location', 'textarea', NULL, 'contact', '2022-11-18 10:50:20', '2023-01-18 10:51:15');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `styles` DISABLE KEYS */;
INSERT INTO `styles` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'sidebar_color', '#673de6', '2023-07-18 23:05:24', '2023-07-18 23:05:25'),
	(2, 'sidebar_bg_color', '#ffffff', '2023-07-18 23:05:24', '2023-07-18 23:05:25'),
	(3, 'sidebar_header_bg', '#ffffff', '2023-07-18 23:05:24', '2023-07-18 23:05:25');
/*!40000 ALTER TABLE `styles` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `nama_lengkap`, `kontak`, `alamat`, `bio`, `jenis_kelamin`, `status`, `password`, `remember_token`, `nama`, `foto`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
	(49, '200104282023021004', 'ok@gmail.com', 'superdev', '0323901923', NULL, NULL, NULL, 'AKTIF', '$2y$10$m1NPZ1/16nmjtixSkjpK0eEBJvF4a9WL.sUm5bWn20QSY.0hdkp3K', NULL, 'AFRIZAL FADLI', NULL, NULL, NULL, NULL, '2023-07-21 21:13:50'),
	(192, '199203312012062001', 'bb@gmail.com', 'admin1', '0829389273', NULL, NULL, NULL, 'AKTIF', '$2y$10$f.NIBaQDS9Pd6izvdq17Su.8a00gJI0mwHt.qe11XREnm.dDWLmfK', NULL, 'RICKY EKASARI R.W', '199203312012062001.jpg', NULL, NULL, NULL, '2023-07-21 21:21:12'),
	(112277, 'superadmin', 'lianmafutra@gmail.com', 'Lian Mafutra Dev', '082244261525', 'Jl. Jawa No.99Kebun Handil, Kec. Jelutung, Kota Jambi, Jambi 36125', NULL, 'L', 'AKTIF', '$2y$10$5D0BGqhoXbeq5wU2raO.guuguGtDlKtBveoTgQIUfc/m5OAOGg7Oy', NULL, NULL, 'a1699373-6ddb-42aa-bca1-160729e2c994', '2023-07-28 21:11:35', '127.0.0.1', '2023-07-06 11:28:03', '2023-07-28 21:11:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

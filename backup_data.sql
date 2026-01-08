-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for eshoptelu
CREATE DATABASE IF NOT EXISTS `eshoptelu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eshoptelu`;

-- Dumping structure for table eshoptelu.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.cache: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.cache_locks: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.failed_jobs
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

-- Dumping data for table eshoptelu.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.jobs: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.job_batches: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_01_01_000001_create_products_table', 1),
	(5, '2026_01_01_000002_create_orders_table', 1),
	(6, '2026_01_01_000003_create_order_items_table', 1);

-- Dumping structure for table eshoptelu.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `payment_status` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.orders: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.order_items: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('HP','Laptop') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.products: ~16 rows (approximately)
INSERT INTO `products` (`id`, `name`, `slug`, `category`, `price`, `description`, `image`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 'iPhone 15 Pro Max', 'iphone-15-pro-max', 'HP', 22999000.00, 'Smartphone flagship Apple dengan chip A17 Pro, kamera 48MP, dan layar Super Retina XDR 6.7 inch.', '/images/products/iphone-15-pro-max.jpg', 10, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(2, 'Samsung Galaxy S24 Ultra', 'samsung-galaxy-s24-ultra', 'HP', 19999000.00, 'Smartphone premium Samsung dengan S Pen, kamera 200MP, dan AI generatif bawaan.', '/images/products/samsung-galaxy-s24-ultra.jpg', 15, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(3, 'Xiaomi 14 Ultra', 'xiaomi-14-ultra', 'HP', 14999000.00, 'Smartphone flagship killer dengan Leica optics, Snapdragon 8 Gen 3, dan fast charging 90W.', '/images/products/xiaomi-14-ultra.jpg', 20, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(4, 'OPPO Find X7 Ultra', 'oppo-find-x7-ultra', 'HP', 16999000.00, 'Smartphone flagship dengan dual periskop kamera Hasselblad dan pengisian cepat 100W.', '/images/products/oppo-find-x7-ultra.jpg', 12, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(5, 'MacBook Pro 14 M3 Pro', 'macbook-pro-14-m3-pro', 'Laptop', 32999000.00, 'Laptop profesional Apple dengan chip M3 Pro, RAM 18GB, SSD 512GB, dan layar Liquid Retina XDR.', '/images/products/macbook-pro-14-m3-pro.jpg', 5, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(6, 'ASUS ROG Strix G16', 'asus-rog-strix-g16', 'Laptop', 24999000.00, 'Laptop gaming dengan Intel Core i9, RTX 4070, RAM 16GB, dan refresh rate 240Hz.', '/images/products/asus-rog-strix-g16.jpg', 8, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(7, 'Lenovo ThinkPad X1 Carbon', 'lenovo-thinkpad-x1-carbon', 'Laptop', 28999000.00, 'Laptop bisnis premium dengan Intel Core Ultra, layar OLED, dan bodi karbon ringan.', '/images/products/lenovo-thinkpad-x1-carbon.jpg', 7, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(8, 'HP Spectre x360 16', 'hp-spectre-x360-16', 'Laptop', 26999000.00, 'Laptop convertible premium dengan layar OLED 3K, Intel Core Ultra 7, dan desain elegan.', '/images/products/hp-spectre-x360-16.jpg', 6, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(9, 'Google Pixel 8 Pro', 'google-pixel-8-pro', 'HP', 17999000.00, 'Smartphone Google dengan kamera AI terbaik, prosesor Tensor G3, dan update 7 tahun.', '/images/products/google-pixel-8-pro.jpg', 10, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(10, 'Asus Zenfone 10', 'asus-zenfone-10', 'HP', 11999000.00, 'Smartphone flagship compact dengan Snapdragon 8 Gen 2 dan stabilizer gimbal hibrida.', '/images/products/asus-zenfone-10.jpg', 15, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(11, 'Sony Xperia 1 V', 'sony-xperia-1-v', 'HP', 20999000.00, 'Smartphone untuk kreator konten dengan sensor kamera Exmor T dan layar 4K OLED 21:9.', '/images/products/sony-xperia-1-v.jpg', 5, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(12, 'Vivo X100 Pro', 'vivo-x100-pro', 'HP', 16499000.00, 'Smartphone fotografi dengan lensa ZEISS APO Floating Telephoto dan Dimensity 9300.', '/images/products/vivo-x100-pro.jpg', 8, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(13, 'Dell XPS 15', 'dell-xps-15', 'Laptop', 35999000.00, 'Laptop creator premium dengan layar 3.5K OLED, Intel Core i9, dan grafis RTX 4060.', '/images/products/dell-xps-15.jpg', 4, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(14, 'Razer Blade 16', 'razer-blade-16', 'Laptop', 45999000.00, 'Laptop gaming monster dengan layar Dual Mode (4K/120Hz atau FHD/240Hz) dan RTX 4090.', '/images/products/razer-blade-16.jpg', 3, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(15, 'Surface Laptop Studio 2', 'surface-laptop-studio-2', 'Laptop', 38999000.00, 'Laptop convertible serbaguna dari Microsoft dengan layar sentuh 14.4 inci dan engsel dinamis.', '/images/products/surface-laptop-studio-2.jpg', 6, '2026-01-07 06:21:05', '2026-01-07 06:21:05'),
	(16, 'Acer Predator Helios 18', 'acer-predator-helios-18', 'Laptop', 31999000.00, 'Laptop gaming layar raksasa 18 inci dengan refresh rate 250Hz dan sistem pendingin canggih.', '/images/products/acer-predator-helios-18.jpg', 7, '2026-01-07 06:21:05', '2026-01-07 06:21:05');

-- Dumping structure for table eshoptelu.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.sessions: ~0 rows (approximately)

-- Dumping structure for table eshoptelu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table eshoptelu.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `address`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'Test User', 'test@example.com', '2026-01-07 06:21:05', '$2y$12$GoILbIZL2HtQyThcIE7R4u.F9wksEeQUyp5uZd8lBD8ptHebz3i2e', '2ZM0ZUVoLs', 'Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta 10220', '081234567890', '2026-01-07 06:21:05', '2026-01-07 06:21:05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

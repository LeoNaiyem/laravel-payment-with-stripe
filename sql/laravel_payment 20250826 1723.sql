

DROP TABLE IF EXISTS `pgs_cache`;
CREATE TABLE `pgs_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--





--
-- Definition of table `cache_locks`
--

DROP TABLE IF EXISTS `pgs_cache_locks`;
CREATE TABLE `pgs_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--





--
-- Definition of table `failed_jobs`
--

DROP TABLE IF EXISTS `pgs_failed_jobs`;
CREATE TABLE `pgs_failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--





--
-- Definition of table `job_batches`
--

DROP TABLE IF EXISTS `pgs_job_batches`;
CREATE TABLE `pgs_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--





--
-- Definition of table `jobs`
--

DROP TABLE IF EXISTS `pgs_jobs`;
CREATE TABLE `pgs_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--


INSERT INTO `pgs_jobs` (`id`,`queue`,`payload`,`attempts`,`reserved_at`,`available_at`,`created_at`) VALUES 
 (1,'default','{\"uuid\":\"7b01b6d1-2a6b-4ddd-945a-8181a95a2fc2\",\"displayName\":\"App\\\\Mail\\\\PaymentInvoiceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\PaymentInvoiceMail\\\":3:{s:7:\\\"payment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Payment\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:26:\\\"sumaiya.israt.17@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1756200368,\"delay\":null}',0,NULL,1756200368,1756200368),
 (2,'default','{\"uuid\":\"71e4486f-67f0-4b9f-908b-d97954a4891c\",\"displayName\":\"App\\\\Mail\\\\PaymentInvoiceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\PaymentInvoiceMail\\\":3:{s:7:\\\"payment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Payment\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:26:\\\"sumaiya.israt.17@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1756200807,\"delay\":null}',0,NULL,1756200807,1756200807),
 (3,'default','{\"uuid\":\"017f18d8-f536-404d-80ce-286e4c65fdef\",\"displayName\":\"App\\\\Mail\\\\PaymentInvoiceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\PaymentInvoiceMail\\\":3:{s:7:\\\"payment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Payment\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:26:\\\"sumaiya.israt.17@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1756201287,\"delay\":null}',0,NULL,1756201287,1756201287),
 (4,'default','{\"uuid\":\"a4bbaa7d-98f4-4264-853b-a3fc33a4299b\",\"displayName\":\"App\\\\Mail\\\\PaymentInvoiceMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:27:\\\"App\\\\Mail\\\\PaymentInvoiceMail\\\":3:{s:7:\\\"payment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Payment\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:26:\\\"sumaiya.israt.17@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1756201592,\"delay\":null}',0,NULL,1756201592,1756201592);



--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `pgs_migrations`;
CREATE TABLE `pgs_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--


INSERT INTO `pgs_migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'0001_01_01_000000_create_users_table',1),
 (2,'0001_01_01_000001_create_cache_table',1),
 (3,'0001_01_01_000002_create_jobs_table',1),
 (4,'2025_08_26_080917_create_payments',1);



--
-- Definition of table `password_reset_tokens`
--

DROP TABLE IF EXISTS `pgs_password_reset_tokens`;
CREATE TABLE `pgs_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--





--
-- Definition of table `payments`
--

DROP TABLE IF EXISTS `pgs_payments`;
CREATE TABLE `pgs_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `charge_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL DEFAULT 'usd',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `receipt_url` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `failure_message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--


INSERT INTO `pgs_payments` (`id`,`charge_id`,`user_id`,`amount`,`currency`,`status`,`receipt_url`,`payment_method`,`failure_message`,`created_at`,`updated_at`) VALUES 
 (1,'ch_3S0IMwK1Jp5xxGKT1WIjCPEH',NULL,7200,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKJvktcUGMgbONEA716Y6LBZglV5dFuQj1S_sjukCsw3J7AkcX5YIO-7rpANNFfjMGPlT2q289Pqi5n1m','card_1S0IMvK1Jp5xxGKTaVok9yF5',NULL,'2025-08-26 08:36:43','2025-08-26 08:36:43'),
 (2,'ch_3S0J8lK1Jp5xxGKT1NkBHFhS',NULL,1500,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKLD7tcUGMgYpjNt_OUU6LBYIVmde5GBIGkET0gRjbAcZ6QOY4cef8fIOqfQx1J6s7pbLcSxNwgelttdU','card_1S0J8iK1Jp5xxGKTQ2DiuMQf',NULL,'2025-08-26 09:26:08','2025-08-26 09:26:08'),
 (3,'ch_3S0JFqK1Jp5xxGKT1fMHn4Mw',NULL,100,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKOf-tcUGMgb2IAE1WBI6LBZdVWsnHLEzL7iyrmnnANwBaONxNo0CcdH22KhPhxf-Sq-hcbMos0NWhDlu','card_1S0JFpK1Jp5xxGKTSneEreWT',NULL,'2025-08-26 09:33:27','2025-08-26 09:33:27'),
 (4,'ch_3S0JNaK1Jp5xxGKT0l6h10EL',NULL,4500,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKMeCtsUGMga_VVQl0QA6LBZqiNKWHnCFqlyZurJaeaZui8AO__O_Y0OPw-V-Ndo1KWlZ4l6HRMCC3Ru9','card_1S0JNZK1Jp5xxGKTHmYOVmBW',NULL,'2025-08-26 09:41:27','2025-08-26 09:41:27'),
 (5,'ch_3S0JSWK1Jp5xxGKT0QmiEkYa',NULL,7800,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKPiEtsUGMgbbWIjcnyE6LBaloq_r4SLlLNbwSL8TEv29jfSqBeO8NmBcvnEjY4v6mLnIIaMd2pAgwLq7','card_1S0JSUK1Jp5xxGKTFQasZ3Xn',NULL,'2025-08-26 09:46:32','2025-08-26 09:46:32'),
 (6,'ch_3S0JdTK1Jp5xxGKT0bo00pNV',NULL,2700,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKJ-KtsUGMgbxyEbPqAo6LBYD8PMlWcf8rO_gWOvMcW1N1RfDI47m3VEYsUtaIMoeauKOhGTrv7PqT9Uc','card_1S0JdSK1Jp5xxGKTiaaWqDFJ',NULL,'2025-08-26 09:57:51','2025-08-26 09:57:51'),
 (7,'ch_3S0JfCK1Jp5xxGKT1ZJCjRIu',NULL,5000,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKIuLtsUGMgYKIizKZ0k6LBbFXrRk6Ai3GPa9KeYnzx8oD68WMyYhXvJ4oZrD075w99tzeHCVkHMoW-xP','card_1S0JfBK1Jp5xxGKTrg7hdAVz',NULL,'2025-08-26 09:59:39','2025-08-26 09:59:39'),
 (8,'ch_3S0Ku2K1Jp5xxGKT0hHOyFPG',NULL,3500,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKKewtsUGMgbDlIbYpBc6LBbdSGtiZ0AFbwGNQfvjx8nA30PfL6aRdqQ6fxeyB_JX99VRi90h7fkZ0TyM','card_1S0Ku1K1Jp5xxGKTVRA0dcpP',NULL,'2025-08-26 11:19:04','2025-08-26 11:19:04'),
 (9,'ch_3S0KwQK1Jp5xxGKT1LjfGIvR',NULL,4900,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKLuxtsUGMgZq2mdzzvY6LBYAG7w4xkfuRfPKWQmovk2LBgx8DhxaVnxZhhGiCnBVjUt2xP-BwjvkuU9q','card_1S0KwPK1Jp5xxGKTAOv1VhDz',NULL,'2025-08-26 11:21:31','2025-08-26 11:21:31'),
 (10,'ch_3S0Kx4K1Jp5xxGKT01C7eJfZ',NULL,8000,'usd','succeeded','https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xUzBHTHNLMUpwNXh4R0tUKOKxtsUGMgZv_eLMCNE6LBa5R6LtgahtlY76dH7PBz34XGhAU3IGP1F9hAhMI2r5eJUiPrMHUubsSAMw','card_1S0Kx3K1Jp5xxGKTHjXNbsQl',NULL,'2025-08-26 11:22:10','2025-08-26 11:22:10');



--
-- Definition of table `sessions`
--

DROP TABLE IF EXISTS `pgs_sessions`;
CREATE TABLE `pgs_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--


INSERT INTO `pgs_sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES 
 ('qP7fp2tRRaVo6egk0xKKCcCwNz39eo7Q9oO0poei',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlM0ZUVMWm9oU0lkUWRXcW1WeVpLMDNROHd6bjEzMW9jQ0tkTmVLYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHJpcGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1756207348);



--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `pgs_users`;
CREATE TABLE `pgs_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--

--







/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

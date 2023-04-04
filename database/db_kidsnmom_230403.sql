-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 04:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kidsnmom`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'productOrder', 'created', 'App\\Models\\ProductOrder', 'created', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"name\":null,\"text\":null}}', NULL, '2023-02-15 13:03:12', '2023-02-15 13:03:12'),
(2, 'productOrder', 'created', 'App\\Models\\ProductOrder', 'created', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":21,\"productDetails\":\"{\\\"id\\\":21,\\\"name\\\":\\\"Sandra Baumbach II\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":4,\\\"projectId\\\":2,\\\"productCode\\\":\\\"33876184\\\",\\\"purchasePrice\\\":18257,\\\"salesPrice\\\":7107,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":55,\\\"details\\\":\\\"Odio temporibus minus earum ipsum rerum soluta laborum quia repellat eum occaecati laudantium consequatur perferendis et aliquam et aliquid illum fugiat mollitia numquam officiis aperiam velit officiis aut modi est numquam quasi deleniti eum voluptas suscipit ducimus officia esse eius sunt sed aut molestiae sequi ipsam delectus aspernatur est est asperiores est consequatur asperiores ipsum dolorem laudantium voluptas qui qui quia aut.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"0.00\",\"unit\":2,\"subTotal\":0,\"flatDiscount\":\"214.00\",\"payable\":\"14000.00\",\"paid\":\"5000.00\",\"due\":\"9000.00\",\"note\":\"<p>hello<br><\\/p>\"}}', NULL, '2023-02-16 12:09:15', '2023-02-16 12:09:15'),
(3, 'productOrder', 'created', 'App\\Models\\ProductOrder', 'created', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":35,\"productDetails\":\"{\\\"id\\\":35,\\\"name\\\":\\\"Paul Wyman\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":4,\\\"projectId\\\":2,\\\"productCode\\\":\\\"31550574\\\",\\\"purchasePrice\\\":9996,\\\"salesPrice\\\":1875,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":100,\\\"details\\\":\\\"Quisquam qui illo non recusandae qui est nisi eaque reiciendis culpa dicta praesentium fugit placeat voluptatem optio blanditiis repudiandae doloribus totam et nostrum excepturi dolor accusantium voluptas ea ab quis cumque autem corrupti ex optio facere qui maiores nulla fugiat assumenda mollitia cum labore sed explicabo et illo quaerat est minima rerum est tempora autem atque distinctio eos.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"1875.00\",\"unit\":1,\"subTotal\":1875,\"flatDiscount\":\"75.00\",\"payable\":\"1800.00\",\"paid\":\"900.00\",\"due\":\"900.00\",\"note\":\"<p>k<br><\\/p>\"}}', NULL, '2023-02-16 12:18:12', '2023-02-16 12:18:12'),
(4, 'productOrder', 'created', 'App\\Models\\ProductOrder', 'created', 7, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":19,\"productDetails\":\"{\\\"id\\\":19,\\\"name\\\":\\\"Zackery Lemke\\\",\\\"categoryId\\\":4,\\\"manufacturerId\\\":2,\\\"projectId\\\":1,\\\"productCode\\\":\\\"93068918\\\",\\\"purchasePrice\\\":4044,\\\"salesPrice\\\":18565,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":89,\\\"details\\\":\\\"Aliquid aut amet nemo sed magni ex debitis ut maxime quis aut molestiae amet non pariatur fugiat blanditiis voluptate deserunt occaecati est et alias at dolor quas ratione atque quia laudantium ipsum ratione minima dolorum ratione officia optio id nam veniam quod qui libero distinctio et commodi natus fuga vel laborum.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"18565.00\",\"unit\":1,\"subTotal\":18565,\"flatDiscount\":\"0.00\",\"payable\":\"18565.00\",\"paid\":\"600.00\",\"due\":\"17965.00\",\"note\":\"<p>llll<br><\\/p>\"}}', NULL, '2023-02-25 12:26:23', '2023-02-25 12:26:23'),
(5, 'productOrder', 'updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":20,\"productDetails\":\"{\\\"id\\\":20,\\\"name\\\":\\\"Freeda Balistreri\\\",\\\"categoryId\\\":3,\\\"manufacturerId\\\":1,\\\"projectId\\\":4,\\\"productCode\\\":\\\"83984952\\\",\\\"purchasePrice\\\":14285,\\\"salesPrice\\\":11989,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":55,\\\"details\\\":\\\"Voluptate voluptatem quas non velit dolores accusantium libero quis fuga blanditiis laudantium maxime eligendi ipsam quam quia dolor rem vel consequatur officiis velit deserunt aut esse excepturi eius cupiditate.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"11989.00\",\"unit\":3,\"subTotal\":35967,\"flatDiscount\":\"495.00\",\"payable\":\"35472.00\",\"paid\":\"808.00\",\"due\":\"34664.00\",\"note\":\"<p>yyyy uuu<br><\\/p>\"},\"old\":{\"productId\":20,\"productDetails\":\"{\\\"id\\\":20,\\\"name\\\":\\\"Freeda Balistreri\\\",\\\"categoryId\\\":3,\\\"manufacturerId\\\":1,\\\"projectId\\\":4,\\\"productCode\\\":\\\"83984952\\\",\\\"purchasePrice\\\":14285,\\\"salesPrice\\\":11989,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":55,\\\"details\\\":\\\"Voluptate voluptatem quas non velit dolores accusantium libero quis fuga blanditiis laudantium maxime eligendi ipsam quam quia dolor rem vel consequatur officiis velit deserunt aut esse excepturi eius cupiditate.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"11989.00\",\"unit\":5,\"subTotal\":59945,\"flatDiscount\":\"500.00\",\"payable\":\"59445.00\",\"paid\":\"800.00\",\"due\":\"58645.00\",\"note\":\"<p>yyyy<br><\\/p>\"}}', NULL, '2023-02-25 12:42:19', '2023-02-25 12:42:19'),
(6, 'productOrder', 'created', 'App\\Models\\ProductOrder', 'created', 8, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":0,\"productDetails\":null,\"projectId\":0,\"customerId\":0,\"customerDetails\":null,\"unitPrice\":\"0.00\",\"unit\":0,\"subTotal\":0,\"flatDiscount\":\"0.00\",\"payable\":\"0.00\",\"paid\":\"0.00\",\"due\":\"0.00\",\"note\":null}}', NULL, '2023-02-25 13:54:56', '2023-02-25 13:54:56'),
(7, 'productOrder', 'updated', 'App\\Models\\ProductOrder', 'updated', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":35,\"productDetails\":\"{\\\"id\\\":35,\\\"name\\\":\\\"Paul Wyman\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":4,\\\"projectId\\\":2,\\\"productCode\\\":\\\"31550574\\\",\\\"purchasePrice\\\":9996,\\\"salesPrice\\\":1875,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":100,\\\"details\\\":\\\"Quisquam qui illo non recusandae qui est nisi eaque reiciendis culpa dicta praesentium fugit placeat voluptatem optio blanditiis repudiandae doloribus totam et nostrum excepturi dolor accusantium voluptas ea ab quis cumque autem corrupti ex optio facere qui maiores nulla fugiat assumenda mollitia cum labore sed explicabo et illo quaerat est minima rerum est tempora autem atque distinctio eos.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"1875.00\",\"unit\":1,\"subTotal\":1875,\"flatDiscount\":\"75.00\",\"payable\":\"1800.00\",\"paid\":\"900.00\",\"due\":\"900.00\",\"note\":\"<p>k<br><\\/p>\"},\"old\":{\"productId\":35,\"productDetails\":\"{\\\"id\\\":35,\\\"name\\\":\\\"Paul Wyman\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":4,\\\"projectId\\\":2,\\\"productCode\\\":\\\"31550574\\\",\\\"purchasePrice\\\":9996,\\\"salesPrice\\\":1875,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":100,\\\"details\\\":\\\"Quisquam qui illo non recusandae qui est nisi eaque reiciendis culpa dicta praesentium fugit placeat voluptatem optio blanditiis repudiandae doloribus totam et nostrum excepturi dolor accusantium voluptas ea ab quis cumque autem corrupti ex optio facere qui maiores nulla fugiat assumenda mollitia cum labore sed explicabo et illo quaerat est minima rerum est tempora autem atque distinctio eos.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"1875.00\",\"unit\":1,\"subTotal\":1875,\"flatDiscount\":\"75.00\",\"payable\":\"1800.00\",\"paid\":\"900.00\",\"due\":\"900.00\",\"note\":\"<p>k<br><\\/p>\"}}', NULL, '2023-02-25 14:00:46', '2023-02-25 14:00:46'),
(8, 'productOrder', 'updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":20,\"productDetails\":\"{\\\"id\\\":20,\\\"name\\\":\\\"Freeda Balistreri\\\",\\\"categoryId\\\":3,\\\"manufacturerId\\\":1,\\\"projectId\\\":4,\\\"productCode\\\":\\\"83984952\\\",\\\"purchasePrice\\\":14285,\\\"salesPrice\\\":11989,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":55,\\\"details\\\":\\\"Voluptate voluptatem quas non velit dolores accusantium libero quis fuga blanditiis laudantium maxime eligendi ipsam quam quia dolor rem vel consequatur officiis velit deserunt aut esse excepturi eius cupiditate.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"11989.00\",\"unit\":3,\"subTotal\":35967,\"flatDiscount\":\"495.00\",\"payable\":\"35472.00\",\"paid\":\"808.00\",\"due\":\"34664.00\",\"note\":\"<p>yyyy uuu<br><\\/p>\"},\"old\":{\"productId\":20,\"productDetails\":\"{\\\"id\\\":20,\\\"name\\\":\\\"Freeda Balistreri\\\",\\\"categoryId\\\":3,\\\"manufacturerId\\\":1,\\\"projectId\\\":4,\\\"productCode\\\":\\\"83984952\\\",\\\"purchasePrice\\\":14285,\\\"salesPrice\\\":11989,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":55,\\\"details\\\":\\\"Voluptate voluptatem quas non velit dolores accusantium libero quis fuga blanditiis laudantium maxime eligendi ipsam quam quia dolor rem vel consequatur officiis velit deserunt aut esse excepturi eius cupiditate.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"11989.00\",\"unit\":3,\"subTotal\":35967,\"flatDiscount\":\"495.00\",\"payable\":\"35472.00\",\"paid\":\"808.00\",\"due\":\"34664.00\",\"note\":\"<p>yyyy uuu<br><\\/p>\"}}', NULL, '2023-02-25 14:01:17', '2023-02-25 14:01:17'),
(9, 'productOrder', 'updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":23,\"productDetails\":\"{\\\"id\\\":23,\\\"name\\\":\\\"Shea Bailey\\\",\\\"categoryId\\\":4,\\\"manufacturerId\\\":2,\\\"projectId\\\":2,\\\"productCode\\\":\\\"47780934\\\",\\\"purchasePrice\\\":14384,\\\"salesPrice\\\":8865,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":31,\\\"details\\\":\\\"Porro et voluptates cum fugiat occaecati quia illum et eligendi ut omnis velit reiciendis saepe suscipit totam modi nemo eaque quisquam nemo sint voluptates et ea in magnam autem labore amet ad non accusantium excepturi vel dolorem unde inventore soluta repellendus maxime sed id.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"8865.00\",\"unit\":2,\"subTotal\":17730,\"flatDiscount\":\"0.00\",\"payable\":\"17730.00\",\"paid\":\"5000.00\",\"due\":\"12730.00\",\"note\":\"<p>yyyy uuu<br><\\/p>\"},\"old\":{\"productId\":20,\"productDetails\":\"{\\\"id\\\":20,\\\"name\\\":\\\"Freeda Balistreri\\\",\\\"categoryId\\\":3,\\\"manufacturerId\\\":1,\\\"projectId\\\":4,\\\"productCode\\\":\\\"83984952\\\",\\\"purchasePrice\\\":14285,\\\"salesPrice\\\":11989,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":55,\\\"details\\\":\\\"Voluptate voluptatem quas non velit dolores accusantium libero quis fuga blanditiis laudantium maxime eligendi ipsam quam quia dolor rem vel consequatur officiis velit deserunt aut esse excepturi eius cupiditate.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T21:46:33.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":\"11989.00\",\"unit\":3,\"subTotal\":35967,\"flatDiscount\":\"495.00\",\"payable\":\"35472.00\",\"paid\":\"808.00\",\"due\":\"34664.00\",\"note\":\"<p>yyyy uuu<br><\\/p>\"}}', NULL, '2023-02-25 15:20:46', '2023-02-25 15:20:46'),
(10, 'productOrder', 'edited', NULL, NULL, NULL, 'App\\Models\\User', 3, '[]', NULL, '2023-02-26 11:29:42', '2023-02-26 11:29:42'),
(11, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":7,\"productDetails\":\"{\\\"id\\\":7,\\\"name\\\":\\\"Product14\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":1,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product14\\\",\\\"purchasePrice\\\":1114,\\\"salesPrice\\\":1114,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":1114,\\\"details\\\":\\\"<div>addasdasdada 1114<br><\\\\\\/div>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-13T21:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T18:10:04.000000Z\\\"}\",\"unitPrice\":\"1114.00\",\"unit\":3,\"subTotal\":3342,\"flatDiscount\":\"300.00\",\"payable\":\"3042.00\",\"paid\":\"42.00\",\"due\":\"3000.00\"},\"old\":{\"productId\":3,\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":22222,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T21:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-13T23:07:00.000000Z\\\"}\",\"unitPrice\":\"22222.00\",\"unit\":2,\"subTotal\":44444,\"flatDiscount\":\"500.00\",\"payable\":\"43944.00\",\"paid\":\"500.00\",\"due\":\"43444.00\"}}', NULL, '2023-02-26 11:55:15', '2023-02-26 11:55:15'),
(12, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"unit\":1,\"subTotal\":1114,\"payable\":\"814.00\",\"paid\":\"500.00\",\"due\":\"314.00\",\"note\":\"<p>hhhhhh up<br><\\/p>\"},\"old\":{\"unit\":3,\"subTotal\":3342,\"payable\":\"3042.00\",\"paid\":\"42.00\",\"due\":\"3000.00\",\"note\":\"<p>hhhhhh<br><\\/p>\"}}', NULL, '2023-02-28 13:21:06', '2023-02-28 13:21:06'),
(13, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":3,\"productId\":34,\"projectId\":1,\"note\":\"<p>jjjjj<br><\\/p>\",\"paymentMethod\":\"1\",\"amount\":\"2500.00\",\"reference\":\"na\",\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-02 20:14:56', '2023-03-02 20:14:56'),
(14, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":3,\"productId\":5,\"projectId\":1,\"note\":\"<p>note<br><\\/p>\",\"paymentMethod\":\"4\",\"amount\":\"1.00\",\"reference\":null,\"phoneNumber\":\"01737153148\"}}', NULL, '2023-03-02 20:19:48', '2023-03-02 20:19:48'),
(15, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":8,\"productId\":25,\"projectId\":1,\"note\":null,\"paymentMethod\":\"5\",\"amount\":\"600.00\",\"reference\":null,\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-02 20:20:31', '2023-03-02 20:20:31'),
(16, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":10,\"productId\":12,\"projectId\":1,\"note\":null,\"paymentMethod\":\"1\",\"amount\":\"6000.00\",\"reference\":\"16165615\",\"phoneNumber\":\"01737153148\"}}', NULL, '2023-03-03 15:21:08', '2023-03-03 15:21:08'),
(17, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":8,\"productId\":37,\"projectId\":1,\"note\":\"<p>jjjjj updated<br><\\/p>\",\"paymentMethod\":\"4\",\"amount\":\"500.00\",\"reference\":\"updated\",\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-03 16:26:47', '2023-03-03 16:26:47'),
(18, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":7,\"productId\":35,\"projectId\":1,\"note\":\"<p>jjjjj<br><\\/p>\",\"paymentMethod\":\"1\",\"amount\":\"500.00\",\"reference\":\"na\",\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-03 16:29:47', '2023-03-03 16:29:47'),
(19, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"amount\":\"3500.00\",\"reference\":\"navv\"},\"old\":{\"amount\":\"2500.00\",\"reference\":\"na\"}}', NULL, '2023-03-03 16:33:09', '2023-03-03 16:33:09'),
(20, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 5, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-03 16:37:57', '2023-03-03 16:37:57'),
(21, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-03 16:38:11', '2023-03-03 16:38:11'),
(22, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"note\":\"<p>1500<br><\\/p>\",\"amount\":\"1500.00\",\"reference\":\"1500\"},\"old\":{\"note\":null,\"amount\":\"6000.00\",\"reference\":\"16165615\"}}', NULL, '2023-03-04 13:41:34', '2023-03-04 13:41:34'),
(23, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":7,\"productId\":25,\"note\":\"<p>j f<br><\\/p>\"},\"old\":{\"customerId\":10,\"productId\":12,\"note\":\"<p>1500<br><\\/p>\"}}', NULL, '2023-03-04 13:43:19', '2023-03-04 13:43:19'),
(24, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"unit\":50,\"subTotal\":1111100,\"payable\":1110600,\"due\":1110100},\"old\":{\"unit\":2,\"subTotal\":44444,\"payable\":43944,\"due\":43444}}', NULL, '2023-03-04 14:03:03', '2023-03-04 14:03:03'),
(25, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 9, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":28,\"productDetails\":\"{\\\"id\\\":28,\\\"name\\\":\\\"Jocelyn Hayes\\\",\\\"categoryId\\\":5,\\\"manufacturerId\\\":3,\\\"projectId\\\":2,\\\"productCode\\\":\\\"17793827\\\",\\\"purchasePrice\\\":16513,\\\"salesPrice\\\":16579,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":52,\\\"details\\\":\\\"Quia enim eligendi repudiandae velit voluptatem at ab deserunt voluptates sed maxime laudantium dolorem sed nulla quos tenetur vero totam rerum molestiae voluptates beatae distinctio enim architecto sapiente necessitatibus sunt optio veritatis dicta eaque accusamus facere maxime.\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-21T20:49:35.000000Z\\\"}\",\"projectId\":1,\"customerId\":5,\"customerDetails\":\"{\\\"id\\\":5,\\\"name\\\":\\\"Dr. Keith Wilkinson MD\\\",\\\"password\\\":\\\"$2y$10$fbviLJFT4EHVu2GAnH4peu\\\\\\/7X\\\\\\/Gl3OHqnIbW1r1I4c05qCpMAjYdC\\\",\\\"address\\\":\\\"Port Metaland, Maine\\\",\\\"phoneNumber\\\":\\\"+1.206.398.2518\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":16579,\"unit\":5,\"subTotal\":82895,\"flatDiscount\":895,\"payable\":82000,\"paid\":0,\"due\":82000,\"note\":null}}', NULL, '2023-03-04 14:32:29', '2023-03-04 14:32:29'),
(26, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 9, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":500,\"due\":81500},\"old\":{\"paid\":0,\"due\":82000}}', NULL, '2023-03-08 12:22:06', '2023-03-08 12:22:06'),
(27, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":2,\"productId\":3,\"projectId\":1,\"note\":\"<p>due 1110100, 1100 pay, <br><\\/p>\",\"paymentMethod\":\"1\",\"amount\":1100,\"reference\":\"cch\",\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-09 11:41:09', '2023-03-09 11:41:09'),
(28, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":4,\"productId\":23,\"projectId\":1,\"note\":\"<p>due 12730, pay 730<\\/p><p>\\r\\nName: Shea Bailey<br>Customer: Walton Bednar<br>Phone: +1 (541) 629-4264\\r\\n\\r\\n<br><\\/p>\",\"paymentMethod\":\"2\",\"amount\":730,\"reference\":null,\"phoneNumber\":\"01737153148\"}}', NULL, '2023-03-09 11:43:18', '2023-03-09 11:43:18'),
(29, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"note\":\"<p>due 1110100, 1100 pay, change to&nbsp;\\r\\n10100\\r\\n\\r\\npaid <br><\\/p>\",\"amount\":10100},\"old\":{\"note\":\"<p>due 1110100, 1100 pay, <br><\\/p>\",\"amount\":1100}}', NULL, '2023-03-09 11:54:17', '2023-03-09 11:54:17'),
(30, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"note\":\"<p>\\r\\nName: Product2<br>Customer: Misael Jacobi<br>Phone: +1.319.750.8780<br>Payable: 43944<br>Paid: 500<br>Due: 43444&nbsp;<\\/p><p>paid amount: 444<br><\\/p>\",\"paymentMethod\":\"3\",\"amount\":444},\"old\":{\"note\":\"<p>due 1110100, 1100 pay, change to&nbsp;\\r\\n10100\\r\\n\\r\\npaid <br><\\/p>\",\"paymentMethod\":\"1\",\"amount\":10100}}', NULL, '2023-03-09 11:55:53', '2023-03-09 11:55:53'),
(31, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-09 11:58:02', '2023-03-09 11:58:02'),
(32, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"customerId\":3,\"productId\":35,\"note\":\"<p>\\r\\n\\r\\nName: Paul Wyman<br>Customer: Kenya Pfeffer<br>Phone: +1-740-217-9011<br>Payable: 1800<br>Paid: 900<br>Due: 900\\r\\n\\r\\n<\\/p><p>paid amount: 500<br><\\/p>\",\"amount\":500},\"old\":{\"customerId\":2,\"productId\":3,\"note\":\"<p>\\r\\nName: Product2<br>Customer: Misael Jacobi<br>Phone: +1.319.750.8780<br>Payable: 43944<br>Paid: 500<br>Due: 43444&nbsp;<\\/p><p>paid amount: 444<br><\\/p>\",\"amount\":444}}', NULL, '2023-03-09 11:59:08', '2023-03-09 11:59:08'),
(33, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 10, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":4,\"productDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Product3\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product3\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":25,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T21:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-20T15:56:48.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unitPrice\":22222,\"unit\":2,\"subTotal\":44444,\"flatDiscount\":0,\"payable\":44444,\"paid\":444,\"due\":44000,\"note\":\"<p>\\r\\n<\\/p><div><div>Name: Product3<br>Code: undefined<br>Purchase Price: 2222<br>Sale price: 22222<br>Product Quantity: 25<\\/div>\\r\\n                        <\\/div>\\r\\n                        \\r\\n                        <div>\\r\\n                            Customer Details:\\r\\n                            <div>Kenya Pfeffer<br>Starkview, New York<br>+1-740-217-9011<\\/div>\\r\\n                        <\\/div>\\r\\n\\r\\n44444<br>444<br>44000<br><p><\\/p>\"}}', NULL, '2023-03-09 14:27:36', '2023-03-09 14:27:36'),
(34, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 11, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":4,\"productDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Product3\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product3\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":23,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T13:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-09T12:27:36.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T11:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T11:08:48.000000Z\\\"}\",\"unitPrice\":22222,\"unit\":1,\"subTotal\":22222,\"flatDiscount\":0,\"payable\":22222,\"paid\":2222,\"due\":20000,\"note\":null}}', NULL, '2023-03-10 22:29:04', '2023-03-10 22:29:04'),
(35, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":22},\"old\":{\"productQuantity\":23}}', NULL, '2023-03-10 22:29:04', '2023-03-10 22:29:04'),
(36, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2_2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":22,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-13T17:07:00.000000Z\\\"}\",\"customerDetails\":\"{\\\"id\\\":2,\\\"name\\\":\\\"Misael Jacobi\\\",\\\"password\\\":\\\"$2y$10$bFSeN3b5xepkJAoOe5B6y.JG9.3sGOBHYcL8SAZZpKr8nHPveB3Me\\\",\\\"address\\\":\\\"East Jarrettshire, Colorado\\\",\\\"phoneNumber\\\":\\\"+1.319.750.8780\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unit\":3,\"subTotal\":66666,\"payable\":66166,\"due\":65666},\"old\":{\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":22222,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T21:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-13T23:07:00.000000Z\\\"}\",\"customerDetails\":\"{\\\"id\\\":2,\\\"name\\\":\\\"Misael Jacobi\\\",\\\"password\\\":\\\"$2y$10$bFSeN3b5xepkJAoOe5B6y.JG9.3sGOBHYcL8SAZZpKr8nHPveB3Me\\\",\\\"address\\\":\\\"East Jarrettshire, Colorado\\\",\\\"phoneNumber\\\":\\\"+1.319.750.8780\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T19:08:48.000000Z\\\"}\",\"unit\":50,\"subTotal\":1111100,\"payable\":1110600,\"due\":1110100}}', NULL, '2023-03-10 21:20:17', '2023-03-10 21:20:17'),
(37, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":69},\"old\":{\"productQuantity\":22}}', NULL, '2023-03-10 21:20:17', '2023-03-10 21:20:17'),
(38, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2_2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":69,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-10T21:20:17.000000Z\\\"}\",\"unit\":5,\"subTotal\":111110,\"payable\":110610,\"due\":110110},\"old\":{\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2_2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":22,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-13T17:07:00.000000Z\\\"}\",\"unit\":3,\"subTotal\":66666,\"payable\":66166,\"due\":65666}}', NULL, '2023-03-10 21:20:52', '2023-03-10 21:20:52'),
(39, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":67},\"old\":{\"productQuantity\":69}}', NULL, '2023-03-10 21:20:52', '2023-03-10 21:20:52'),
(40, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":1,\"customerId\":2,\"productId\":7,\"projectId\":1,\"note\":\"<p>\\r\\nPayable: 814<br>Paid: 500<br>Due: 314\\r\\n\\r\\n<br><\\/p>\",\"paymentMethod\":\"2\",\"amount\":14,\"reference\":\"16165615\",\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-10 21:43:36', '2023-03-10 21:43:36'),
(41, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":514,\"due\":300},\"old\":{\"paid\":500,\"due\":314}}', NULL, '2023-03-10 21:43:36', '2023-03-10 21:43:36'),
(42, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":1,\"customerId\":2,\"productId\":7,\"projectId\":1,\"note\":null,\"paymentMethod\":\"4\",\"amount\":20,\"reference\":null,\"phoneNumber\":\"01737153148\"}}', NULL, '2023-03-10 21:49:22', '2023-03-10 21:49:22'),
(43, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":534,\"due\":280},\"old\":{\"paid\":514,\"due\":300}}', NULL, '2023-03-10 21:49:22', '2023-03-10 21:49:22'),
(44, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":514,\"due\":534},\"old\":{\"paid\":534,\"due\":280}}', NULL, '2023-03-10 23:02:04', '2023-03-10 23:02:04'),
(45, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":3,\"customerId\":4,\"productId\":23},\"old\":{\"orderId\":1,\"customerId\":2,\"productId\":7}}', NULL, '2023-03-10 23:05:20', '2023-03-10 23:05:20'),
(46, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":494,\"due\":320},\"old\":{\"paid\":514,\"due\":300}}', NULL, '2023-03-10 23:05:20', '2023-03-10 23:05:20'),
(47, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":1,\"customerId\":2,\"productId\":7},\"old\":{\"orderId\":3,\"customerId\":4,\"productId\":23}}', NULL, '2023-03-10 23:17:32', '2023-03-10 23:17:32'),
(48, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":514,\"due\":300},\"old\":{\"paid\":494,\"due\":320}}', NULL, '2023-03-10 23:17:32', '2023-03-10 23:17:32'),
(49, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":4980,\"due\":12750},\"old\":{\"paid\":5000,\"due\":12730}}', NULL, '2023-03-10 23:17:32', '2023-03-10 23:17:32'),
(50, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":3,\"customerId\":4,\"productId\":23},\"old\":{\"orderId\":1,\"customerId\":2,\"productId\":7}}', NULL, '2023-03-10 23:18:43', '2023-03-10 23:18:43'),
(51, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":5000,\"due\":12730},\"old\":{\"paid\":4980,\"due\":12750}}', NULL, '2023-03-10 23:18:43', '2023-03-10 23:18:43'),
(52, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":494,\"due\":320},\"old\":{\"paid\":514,\"due\":300}}', NULL, '2023-03-10 23:18:43', '2023-03-10 23:18:43'),
(53, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":1,\"customerId\":2,\"productId\":7,\"projectId\":1,\"note\":null,\"paymentMethod\":\"3\",\"amount\":320,\"reference\":null,\"phoneNumber\":\"01779458866\"}}', NULL, '2023-03-11 00:15:18', '2023-03-11 00:15:18'),
(54, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":814,\"due\":0},\"old\":{\"paid\":494,\"due\":320}}', NULL, '2023-03-11 00:15:18', '2023-03-11 00:15:18'),
(55, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":6,\"customerId\":3,\"productId\":35,\"projectId\":1,\"note\":null,\"paymentMethod\":\"4\",\"amount\":900,\"reference\":null,\"phoneNumber\":\"01737153148\"}}', NULL, '2023-03-11 00:29:40', '2023-03-11 00:29:40'),
(56, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":1800,\"due\":0},\"old\":{\"paid\":900,\"due\":900}}', NULL, '2023-03-11 00:29:40', '2023-03-11 00:29:40'),
(57, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 12, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":11,\"productDetails\":\"{\\\"id\\\":11,\\\"name\\\":\\\"Product22\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product22\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":22222,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-13T17:07:00.000000Z\\\"}\",\"projectId\":1,\"customerId\":8,\"customerDetails\":\"{\\\"id\\\":8,\\\"name\\\":\\\"Mrs. Pamela Swaniawski\\\",\\\"password\\\":\\\"$2y$10$k5uF0i8wxGXrSjpqMjzPLOsLv3Tr7uZdOCqDA2mDggwYV9JIpnLOa\\\",\\\"address\\\":\\\"North Dario, Arkansas\\\",\\\"phoneNumber\\\":\\\"+1-870-777-7079\\\",\\\"projectId\\\":2,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unitPrice\":22222,\"unit\":5,\"subTotal\":111110,\"flatDiscount\":0,\"payable\":111110,\"paid\":25000,\"due\":86110,\"note\":null}}', NULL, '2023-03-12 16:09:34', '2023-03-12 16:09:34'),
(58, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 11, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":22217},\"old\":{\"productQuantity\":22222}}', NULL, '2023-03-12 16:09:34', '2023-03-12 16:09:34'),
(59, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 13, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":11,\"productDetails\":\"{\\\"id\\\":11,\\\"name\\\":\\\"Product22\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product22\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":22217,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":1,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-12T16:09:34.000000Z\\\"}\",\"projectId\":1,\"customerId\":8,\"customerDetails\":\"{\\\"id\\\":8,\\\"name\\\":\\\"Mrs. Pamela Swaniawski\\\",\\\"password\\\":\\\"$2y$10$k5uF0i8wxGXrSjpqMjzPLOsLv3Tr7uZdOCqDA2mDggwYV9JIpnLOa\\\",\\\"address\\\":\\\"North Dario, Arkansas\\\",\\\"phoneNumber\\\":\\\"+1-870-777-7079\\\",\\\"projectId\\\":2,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unitPrice\":22222,\"unit\":5,\"subTotal\":111110,\"flatDiscount\":0,\"payable\":111110,\"paid\":25000,\"due\":86110,\"note\":null}}', NULL, '2023-03-12 16:11:03', '2023-03-12 16:11:03'),
(60, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 11, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":22212},\"old\":{\"productQuantity\":22217}}', NULL, '2023-03-12 16:11:03', '2023-03-12 16:11:03'),
(61, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":11,\"customerId\":8,\"productId\":11,\"projectId\":1,\"note\":null,\"paymentMethod\":\"3\",\"amount\":25000,\"reference\":null,\"phoneNumber\":\"+1-870-777-7079\"}}', NULL, '2023-03-12 16:11:03', '2023-03-12 16:11:03'),
(62, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":3,\"customerId\":4,\"productId\":23,\"projectId\":1,\"note\":null,\"paymentMethod\":\"4\",\"amount\":500,\"reference\":null,\"phoneNumber\":\"01779458866\",\"deletionStatus\":0}}', NULL, '2023-03-12 16:48:25', '2023-03-12 16:48:25'),
(63, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":5500,\"due\":12230},\"old\":{\"paid\":5000,\"due\":12730}}', NULL, '2023-03-12 16:48:25', '2023-03-12 16:48:25'),
(64, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":3,\"customerId\":4,\"productId\":23,\"projectId\":1,\"note\":null,\"paymentMethod\":\"2\",\"amount\":1000,\"reference\":null,\"phoneNumber\":\"01779458866\",\"deletionStatus\":0}}', NULL, '2023-03-12 16:52:35', '2023-03-12 16:52:35'),
(65, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":6500,\"due\":11230},\"old\":{\"paid\":5500,\"due\":12230}}', NULL, '2023-03-12 16:52:35', '2023-03-12 16:52:35'),
(66, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":3,\"customerId\":4,\"productId\":23,\"projectId\":1,\"note\":null,\"paymentMethod\":\"4\",\"amount\":1500,\"reference\":null,\"phoneNumber\":\"01737153148\",\"deletionStatus\":0}}', NULL, '2023-03-12 16:53:00', '2023-03-12 16:53:00'),
(67, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":8000,\"due\":9730},\"old\":{\"paid\":6500,\"due\":11230}}', NULL, '2023-03-12 16:53:00', '2023-03-12 16:53:00'),
(68, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":9,\"customerId\":3,\"productId\":4,\"projectId\":1,\"note\":null,\"paymentMethod\":\"4\",\"amount\":5000,\"reference\":null,\"phoneNumber\":\"01234567891\",\"deletionStatus\":0}}', NULL, '2023-03-12 16:58:19', '2023-03-12 16:58:19'),
(69, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 9, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":5444,\"due\":39000},\"old\":{\"paid\":444,\"due\":44000}}', NULL, '2023-03-12 16:58:19', '2023-03-12 16:58:19'),
(70, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-12 16:58:53', '2023-03-12 16:58:53'),
(71, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-12 16:58:53', '2023-03-12 16:58:53'),
(72, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-12 16:58:53', '2023-03-12 16:58:53'),
(73, 'product', 'Product has been created', 'App\\Models\\Product', 'created', 38, 'App\\Models\\User', 3, '{\"attributes\":{\"name\":\"Test Product 313\",\"categoryId\":2,\"manufacturerId\":2,\"projectId\":0,\"productCode\":\"ABC313\",\"purchasePrice\":200,\"salesPrice\":250,\"discountPrice\":null,\"discountStatus\":0,\"productQuantity\":20,\"totalAmount\":1000,\"dueAmount\":300,\"details\":null,\"productImage\":null,\"publicationStatus\":1,\"deletionStatus\":0}}', NULL, '2023-03-13 17:52:19', '2023-03-13 17:52:19');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(74, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 14, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":38,\"productDetails\":\"{\\\"id\\\":38,\\\"name\\\":\\\"Test Product 313\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"ABC313\\\",\\\"purchasePrice\\\":200,\\\"salesPrice\\\":250,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":20,\\\"totalAmount\\\":1000,\\\"dueAmount\\\":300,\\\"details\\\":null,\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-03-13T17:52:19.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-13T17:52:19.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unitPrice\":250,\"unit\":3,\"subTotal\":750,\"flatDiscount\":50,\"payable\":700,\"paid\":500,\"due\":200,\"note\":null}}', NULL, '2023-03-13 18:00:33', '2023-03-13 18:00:33'),
(75, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 38, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":17},\"old\":{\"productQuantity\":20}}', NULL, '2023-03-13 18:00:33', '2023-03-13 18:00:33'),
(76, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":14,\"customerId\":3,\"productId\":38,\"projectId\":1,\"note\":null,\"paymentMethod\":\"1\",\"amount\":500,\"reference\":null,\"phoneNumber\":\"+1-740-217-9011\",\"deletionStatus\":0}}', NULL, '2023-03-13 18:00:33', '2023-03-13 18:00:33'),
(77, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":14,\"customerId\":3,\"productId\":38,\"projectId\":1,\"note\":null,\"paymentMethod\":\"2\",\"amount\":50,\"reference\":null,\"phoneNumber\":\"01779458866\",\"deletionStatus\":0}}', NULL, '2023-03-13 18:04:09', '2023-03-13 18:04:09'),
(78, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 14, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":550,\"due\":150},\"old\":{\"paid\":500,\"due\":200}}', NULL, '2023-03-13 18:04:09', '2023-03-13 18:04:09'),
(79, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"amount\":40},\"old\":{\"amount\":50}}', NULL, '2023-03-13 18:06:23', '2023-03-13 18:06:23'),
(80, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 14, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":540,\"due\":160},\"old\":{\"paid\":550,\"due\":150}}', NULL, '2023-03-13 18:06:23', '2023-03-13 18:06:23'),
(81, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 14, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-13 18:08:24', '2023-03-13 18:08:24'),
(82, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-13 18:09:13', '2023-03-13 18:09:13'),
(83, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-13 18:09:13', '2023-03-13 18:09:13'),
(84, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 38, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":3},\"old\":{\"productQuantity\":17}}', NULL, '2023-03-13 18:38:52', '2023-03-13 18:38:52'),
(85, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 7, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":4,\"customerId\":2,\"productId\":3,\"projectId\":1,\"note\":null,\"paymentMethod\":\"3\",\"amount\":2000,\"reference\":null,\"phoneNumber\":\"01779458866\",\"deletionStatus\":0}}', NULL, '2023-03-13 18:40:33', '2023-03-13 18:40:33'),
(86, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"paid\":2500,\"due\":41444},\"old\":{\"paid\":500,\"due\":43444}}', NULL, '2023-03-13 18:40:33', '2023-03-13 18:40:33'),
(87, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 4, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-13 18:43:35', '2023-03-13 18:43:35'),
(88, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":2},\"old\":{\"productQuantity\":67}}', NULL, '2023-03-13 18:43:35', '2023-03-13 18:43:35'),
(89, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 7, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-13 18:43:35', '2023-03-13 18:43:35'),
(90, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-13 18:59:48', '2023-03-13 18:59:48'),
(91, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":72},\"old\":{\"productQuantity\":67}}', NULL, '2023-03-13 18:59:48', '2023-03-13 18:59:48'),
(92, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":3,\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2_2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":20,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-13T18:59:48.000000Z\\\"}\",\"projectId\":1,\"customerId\":3,\"customerDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Kenya Pfeffer\\\",\\\"password\\\":\\\"$2y$10$T1ZYSUwUUiO\\\\\\/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje\\\",\\\"address\\\":\\\"Starkview, New York\\\",\\\"phoneNumber\\\":\\\"+1-740-217-9011\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unitPrice\":22222,\"unit\":2,\"subTotal\":44444,\"flatDiscount\":444,\"payable\":44000,\"paid\":15000,\"due\":29000,\"note\":null}}', NULL, '2023-03-14 19:55:07', '2023-03-14 19:55:07'),
(93, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":18},\"old\":{\"productQuantity\":20}}', NULL, '2023-03-14 19:55:07', '2023-03-14 19:55:07'),
(94, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":1,\"customerId\":3,\"productId\":3,\"projectId\":1,\"note\":null,\"paymentMethod\":\"2\",\"amount\":15000,\"reference\":null,\"phoneNumber\":\"+1-740-217-9011\",\"deletionStatus\":0}}', NULL, '2023-03-14 19:55:07', '2023-03-14 19:55:07'),
(95, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":7,\"productDetails\":\"{\\\"id\\\":7,\\\"name\\\":\\\"Product14\\\",\\\"categoryId\\\":1,\\\"manufacturerId\\\":1,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product14\\\",\\\"purchasePrice\\\":1114,\\\"salesPrice\\\":1114,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":20,\\\"totalAmount\\\":700,\\\"dueAmount\\\":600,\\\"details\\\":\\\"<div>addasdasdada 1114<br><\\\\\\/div>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-09T12:22:42.000000Z\\\"}\",\"projectId\":1,\"customerId\":5,\"customerDetails\":\"{\\\"id\\\":5,\\\"name\\\":\\\"Dr. Keith Wilkinson MD\\\",\\\"password\\\":\\\"$2y$10$fbviLJFT4EHVu2GAnH4peu\\\\\\/7X\\\\\\/Gl3OHqnIbW1r1I4c05qCpMAjYdC\\\",\\\"address\\\":\\\"Port Metaland, Maine\\\",\\\"phoneNumber\\\":\\\"+1.206.398.2518\\\",\\\"projectId\\\":5,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unitPrice\":1114,\"unit\":3,\"subTotal\":3342,\"flatDiscount\":2500,\"payable\":842,\"paid\":0,\"due\":842,\"note\":null}}', NULL, '2023-03-14 19:59:14', '2023-03-14 19:59:14'),
(96, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 7, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":17},\"old\":{\"productQuantity\":20}}', NULL, '2023-03-14 19:59:14', '2023-03-14 19:59:14'),
(97, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":2,\"customerId\":5,\"productId\":7,\"projectId\":1,\"note\":null,\"paymentMethod\":\"1\",\"amount\":0,\"reference\":null,\"phoneNumber\":\"+1.206.398.2518\",\"deletionStatus\":0}}', NULL, '2023-03-14 19:59:14', '2023-03-14 19:59:14'),
(98, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-14 20:41:47', '2023-03-14 20:41:47'),
(99, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-26 18:21:22', '2023-03-26 18:21:22'),
(100, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-26 18:24:27', '2023-03-26 18:24:27'),
(101, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":20},\"old\":{\"productQuantity\":18}}', NULL, '2023-03-26 18:24:27', '2023-03-26 18:24:27'),
(102, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-26 18:24:27', '2023-03-26 18:24:27'),
(103, 'productOrder', 'Order has been updated', 'App\\Models\\ProductOrder', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":[],\"old\":[]}', NULL, '2023-03-26 18:24:29', '2023-03-26 18:24:29'),
(104, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 7, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":20},\"old\":{\"productQuantity\":17}}', NULL, '2023-03-26 18:24:29', '2023-03-26 18:24:29'),
(105, 'payment', 'Payment has been updated', 'App\\Models\\Payment', 'updated', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"deletionStatus\":1},\"old\":{\"deletionStatus\":0}}', NULL, '2023-03-26 18:24:29', '2023-03-26 18:24:29'),
(106, 'productOrder', 'Order has been created', 'App\\Models\\ProductOrder', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"productId\":3,\"productDetails\":\"{\\\"id\\\":3,\\\"name\\\":\\\"Product2_2\\\",\\\"categoryId\\\":2,\\\"manufacturerId\\\":2,\\\"projectId\\\":0,\\\"productCode\\\":\\\"Product2\\\",\\\"purchasePrice\\\":2222,\\\"salesPrice\\\":22222,\\\"discountPrice\\\":null,\\\"discountStatus\\\":0,\\\"productQuantity\\\":20,\\\"totalAmount\\\":0,\\\"dueAmount\\\":0,\\\"details\\\":\\\"<p>adasdasdAAAAAAA<br><\\\\\\/p>\\\",\\\"productImage\\\":null,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"created_at\\\":\\\"2023-01-13T15:09:08.000000Z\\\",\\\"updated_at\\\":\\\"2023-03-26T18:24:27.000000Z\\\"}\",\"projectId\":1,\"customerId\":4,\"customerDetails\":\"{\\\"id\\\":4,\\\"name\\\":\\\"Walton Bednar\\\",\\\"password\\\":\\\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\\\",\\\"address\\\":\\\"East Alanis, Nevada\\\",\\\"phoneNumber\\\":\\\"+1 (541) 629-4264\\\",\\\"projectId\\\":1,\\\"publicationStatus\\\":1,\\\"deletionStatus\\\":0,\\\"image\\\":null,\\\"created_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\",\\\"updated_at\\\":\\\"2023-01-22T13:08:48.000000Z\\\"}\",\"unitPrice\":22222,\"unit\":1,\"subTotal\":22222,\"flatDiscount\":500,\"payable\":21722,\"paid\":20000,\"due\":1722,\"note\":null}}', NULL, '2023-03-26 18:28:05', '2023-03-26 18:28:05'),
(107, 'product', 'Product has been updated', 'App\\Models\\Product', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"productQuantity\":19},\"old\":{\"productQuantity\":20}}', NULL, '2023-03-26 18:28:05', '2023-03-26 18:28:05'),
(108, 'payment', 'Payment has been created', 'App\\Models\\Payment', 'created', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"orderId\":1,\"customerId\":4,\"productId\":3,\"projectId\":1,\"note\":null,\"paymentMethod\":\"2\",\"amount\":20000,\"reference\":null,\"phoneNumber\":\"+1 (541) 629-4264\",\"deletionStatus\":0}}', NULL, '2023-03-26 18:28:05', '2023-03-26 18:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$K60a5dkpsTkX0fYSX4v/FO5hFm0PX.iPSPqs2KDvmRZIqjBhZZrt.', '0', 0, NULL, '2023-01-02 10:01:43', '2023-01-02 10:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectId` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `parent` tinyint(4) NOT NULL DEFAULT 0,
  `child` tinyint(4) NOT NULL DEFAULT 0,
  `parentId` int(11) DEFAULT NULL,
  `publicationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `projectId`, `type`, `parent`, `child`, `parentId`, `publicationStatus`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 'libero', 2, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(2, 'quia', 5, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(3, 'dolorem', 4, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(4, 'laborum', 3, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(5, 'aliquam', 4, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(6, 'hic', 4, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(7, 'quis', 3, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(8, 'velit', 2, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(9, 'nobis', 1, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:31', '2023-01-20 15:50:31'),
(10, 'eligendi', 4, 0, 0, 0, NULL, 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `publicationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `address`, `phoneNumber`, `projectId`, `publicationStatus`, `deletionStatus`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Elnora Langworth', '$2y$10$30Sx4hH1o9Mfd.g7Z9OW2OvXnxbrJmVR2oT7vPMW9SceC2ksNtFwy', 'Malvinachester, Utah', '01737153148', 1, 1, 0, NULL, '2023-01-22 13:08:48', '2023-02-08 11:06:49'),
(2, 'Misael Jacobi', '$2y$10$bFSeN3b5xepkJAoOe5B6y.JG9.3sGOBHYcL8SAZZpKr8nHPveB3Me', 'East Jarrettshire, Colorado', '+1.319.750.8780', 5, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(3, 'Kenya Pfeffer', '$2y$10$T1ZYSUwUUiO/pLqGsJESE.dz9Ug1BbB1IZMcFDSaxFP3uma.Dkyje', 'Starkview, New York', '+1-740-217-9011', 5, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(4, 'Walton Bednar', '$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.', 'East Alanis, Nevada', '+1 (541) 629-4264', 1, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(5, 'Dr. Keith Wilkinson MD', '$2y$10$fbviLJFT4EHVu2GAnH4peu/7X/Gl3OHqnIbW1r1I4c05qCpMAjYdC', 'Port Metaland, Maine', '+1.206.398.2518', 5, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(6, 'Prof. Nathanial Toy IV', '$2y$10$X6nJDcCwCTEPekikDwOfNec8PN1GKTXGquI9vOya7mPPgW.ossVKC', 'New Aniyahstad, South Carolina', '1-520-654-1869', 5, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(7, 'Ford Heller Sr.', '$2y$10$P8SHRarW5FkZZFyTi7D8w.qaNAXEhfKIdeuc/CLRXmzljOtItstlO', 'South Shyann, Alaska', '442.665.8143', 2, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(8, 'Mrs. Pamela Swaniawski', '$2y$10$k5uF0i8wxGXrSjpqMjzPLOsLv3Tr7uZdOCqDA2mDggwYV9JIpnLOa', 'North Dario, Arkansas', '+1-870-777-7079', 2, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(9, 'Prof. Bernadette Leannon', '$2y$10$nBro6cCuTq.qi2Ye9fRiA.1vdJZwx63Y5wfi0t6Ua8ut./nZysiwy', 'Dareview, Kentucky', '+1 (680) 255-5214', 3, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(10, 'Mikayla Kuhlman II', '$2y$10$nHZ1Uwsgt1enXo.o21f4SuGbFEs1zGKQikXiGk7miaWPSdWBx0WrS', 'Majormouth, South Carolina', '+1-760-617-0862', 4, 1, 0, NULL, '2023-01-22 13:08:48', '2023-01-22 13:08:48'),
(11, 'Sample User 134', NULL, '<p>hello hello34<br></p>', '12345678914', 1, 1, 0, NULL, '2023-01-22 13:39:01', '2023-01-22 14:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criteria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectId` int(11) NOT NULL DEFAULT 0,
  `publicationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designationId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(7,2) NOT NULL DEFAULT 0.00,
  `projectId` int(11) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designationId`, `nid`, `address`, `phoneNumber`, `salary`, `projectId`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 'Abbie Goodwin I', '3', 'NID479-407-6395', 'East Jordane, Missouri', '1-610-612-0340', '15514.00', 2, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(2, 'Dr. Clifford Frami', '2', 'NID218.793.9852', 'Runolfssonburgh, Oregon', '1-765-535-3419', '17075.00', 5, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(3, 'Jalon Hill PhD', '3', 'NID1-743-442-3518', 'Mercedesview, Virginia', '+16466098324', '17839.00', 3, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(4, 'Berry Pagac', '4', 'NID413-362-3045', 'Eldridgeside, Connecticut', '712.483.5316', '15868.00', 4, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(5, 'Issac Hane', '3', 'NID667.891.7679', 'North Alexanneview, District of Columbia', '+1.717.766.0218', '14581.00', 5, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(6, 'Dino Marquardt', '3', 'NID(252) 423-2179', 'Gabrielburgh, Iowa', '219.730.7911', '10955.00', 3, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(7, 'Rickie Pollich', '2', 'NID(442) 968-6256', 'East Imani, West Virginia', '+17037969647', '12690.00', 4, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(8, 'Mr. Antwon Schimmel Jr.', '5', 'NID651-802-9522', 'New Frankieville, Nebraska', '248.758.6923', '5893.00', 2, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(9, 'Ally Ryan', '4', 'NID(530) 863-8496', 'Wisokyfort, Rhode Island', '1-458-663-6378', '8447.00', 2, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(10, 'Cory Herman', '4', 'NID(717) 583-1075', 'Gaylordfurt, North Dakota', '+1-832-398-7661', '8228.00', 1, 0, '2023-02-09 11:18:23', '2023-02-09 11:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `amount` double(11,2) NOT NULL DEFAULT 0.00,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `type`, `details`, `projectId`, `amount`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, '1', '<p>exp details mmmm<br></p>', 1, 1100.50, 0, '2023-02-09 13:36:43', '2023-02-10 13:39:32'),
(2, '3', '<p>ddddd EEEEE<br></p>', 2, 5500.50, 0, '2023-02-10 11:54:29', '2023-02-10 13:37:06'),
(3, '2', '<p>ffff<br></p>', 1, 2500.00, 0, '2023-03-06 13:23:55', '2023-03-06 13:23:55'),
(4, '5', '<p>dhaka to bogra - ripon<br></p>', 3, 1000.00, 0, '2023-03-13 18:27:14', '2023-03-13 18:27:14'),
(5, '6', '<p>dringks, customer tea<br></p>', 1, 500.00, 0, '2023-03-13 18:30:05', '2023-03-13 18:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `publicationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`, `details`, `projectId`, `publicationStatus`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 'employee salary', 'employee salary', 1, 1, 0, '2023-02-08 18:12:20', '2023-02-08 18:12:20'),
(2, 'dokan vara', 'dokan vara', 2, 1, 0, '2023-02-08 18:12:20', '2023-02-08 18:12:20'),
(3, 'Test expense1', NULL, 3, 1, 0, '2023-02-08 12:47:36', '2023-02-08 12:47:36'),
(4, 'Test expense2', '<p>Test expense2<br></p>', 1, 1, 1, '2023-02-08 12:49:11', '2023-02-08 12:49:11'),
(5, 'Traveling Cost', '<p>all types of travels<br></p>', 1, 1, 0, '2023-03-13 18:26:26', '2023-03-31 18:49:01'),
(6, 'Daily Expense', NULL, 1, 1, 0, '2023-03-13 18:28:52', '2023-03-13 18:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `projectId` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `projectId`, `name`, `path`, `type`, `size`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'shamim.jpg', 'file/invoice/2023/shamim_1679949527.jpg', 'image/jpeg', '70279', '2023-03-27 20:38:47', '2023-03-27 20:38:47'),
(2, 3, 2, 'Due_Customers-1.pdf', 'file/invoice/2023/Due_Customers-1_1679949825.pdf', 'application/pdf', '3945', '2023-03-27 20:43:45', '2023-03-27 20:43:45'),
(3, 3, 1, 'OLDUntitled.png', 'file/invoice/2023/OLDUntitled_1679949841.png', 'image/png', '139621', '2023-03-27 20:44:01', '2023-03-27 20:44:01'),
(4, 3, 1, 'WhatsApp Image 2022-12-25 at 16.50.47.jpg', 'file/invoice/2023/WhatsApp Image 2022-12-25 at 16.50.47_1679949854.jpg', 'image/jpeg', '65509', '2023-03-27 20:44:14', '2023-03-27 20:44:14'),
(5, 3, 1, 'shamim.jpg', 'file/invoice/2023/shamim_1679950580.jpg', 'image/jpeg', '70279', '2023-03-27 20:56:20', '2023-03-27 20:56:20'),
(6, 3, 3, 'ISTQB_CTAL-TA_Syllabus_v3.1.2 (1).pdf', 'file/invoice/2023/ISTQB_CTAL-TA_Syllabus_v3.1.2 (1)_1680462649.pdf', 'application/pdf', '665431', '2023-04-02 19:10:49', '2023-04-02 19:10:49'),
(7, 3, 3, 'Sales_Data_2023_04_03_00 51 _.xlsx', 'file/invoice/2023/Sales_Data_2023_04_03_00 51 __1680462984.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '6367', '2023-04-02 19:16:24', '2023-04-02 19:16:24'),
(8, 3, 2, 'SalesData.xlsx', 'file/invoice/2023/SalesData_1680463085.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '6367', '2023-04-02 19:18:05', '2023-04-02 19:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectId` int(11) DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `projectId`, `details`, `publicationStatus`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 'iste', 5, 'Vero rerum aut omnis cumque blanditiis suscipit nostrum voluptatum laborum enim possimus ad vero velit vel voluptatem doloremque aut quia magnam officia dolorem est nostrum magni qui laboriosam ratione dolore doloribus blanditiis laboriosam vel magni delectus dolore commodi amet qui nihil rerum dolorum facilis tempora labore aspernatur doloribus voluptate delectus tenetur odit temporibus eius veniam ipsum magnam et voluptatum eos placeat sint totam voluptas.', 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32'),
(2, 'est', 3, 'Neque earum dolorem incidunt odio quisquam incidunt qui et minus excepturi eaque doloremque et quod eum similique maiores incidunt voluptatibus quis sunt harum et quia modi officiis nihil ipsum qui quia vero assumenda enim ipsam vel totam vel est id et debitis dolores dolores ipsum maxime inventore neque consectetur exercitationem voluptatem quia sit accusamus quia doloremque et repellat dolore dolore molestiae nemo.', 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32'),
(3, 'quia updated', 2, 'Sapiente voluptatum suscipit dolores consequatur dolorem nobis saepe qui at deserunt est quas ducimus sapiente beatae sed placeat impedit fuga quis quo et quia eum quo repellendus sed et voluptatem pariatur qui deserunt nihil aut aut eum.', 1, 0, '2023-01-20 15:50:32', '2023-04-02 20:45:51'),
(4, 'at updated', 1, 'Quibusdam illo in corporis consequatur ab amet et culpa excepturi non accusantium sunt necessitatibus est esse atque odio itaque dolor nostrum asperiores excepturi cumque dolorum quos nam nihil sit ut minus voluptatem adipisci aut veritatis quasi voluptate illum.', 1, 0, '2023-01-20 15:50:32', '2023-04-02 20:45:34'),
(5, 'asperiores', 2, 'Deleniti animi hic ea occaecati quibusdam non quaerat dolorem quia voluptatum nihil voluptatem similique repellendus nihil quam aut suscipit libero qui corporis enim eum vel nisi doloribus molestias sequi soluta necessitatibus assumenda aperiam hic libero nihil id cum quaerat ipsum iusto ea quia corporis occaecati veniam soluta enim est aliquid eligendi voluptas animi molestiae.', 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32'),
(6, 'a', 1, 'Rerum aliquid id unde nobis porro qui vero exercitationem ratione at deleniti itaque error eum voluptate inventore laborum in ex doloribus ducimus totam aut quae reiciendis nesciunt omnis consequuntur voluptas qui labore assumenda illum est vel error recusandae qui et temporibus neque sequi rem odio quibusdam non quod provident quisquam maxime quia magni distinctio molestias.', 1, 1, '2023-01-20 15:50:32', '2023-04-02 20:52:49'),
(7, 'distinctio', 3, 'Doloremque fugit omnis earum autem saepe ipsum aut consequatur voluptatem ut dolor ut dolorem dignissimos quia neque iure beatae fuga dignissimos aut perferendis et nostrum sit illo et perspiciatis eum repudiandae saepe dolores.', 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32'),
(8, 'aspernatur', 1, 'Suscipit excepturi quos est ipsa id qui sed accusantium quam aliquid qui quis odio suscipit soluta ullam molestiae cumque voluptatibus fugit expedita perferendis sit fugiat laudantium enim ullam sit quod qui rerum ipsa ut deserunt perferendis voluptatem dolorum facere quia sint dolorem velit aperiam placeat facilis iure.', 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32'),
(9, 'et', 4, 'Voluptatem harum eum sed harum perferendis omnis autem officiis placeat aut et voluptate tempora accusantium maiores vel rerum in ut natus eos non ut debitis nesciunt quas autem ut nisi molestias natus minima soluta at culpa qui consequatur perferendis ratione dolor rem quibusdam ut itaque unde officia aut accusantium officiis praesentium.', 1, 0, '2023-01-20 15:50:32', '2023-01-20 15:50:32'),
(10, 'in', 2, 'Vel earum ea quis est voluptatibus eos a repellendus molestiae et similique quibusdam laboriosam quo neque cumque et ut quis sapiente magni doloremque iure a voluptatem natus voluptas nam veritatis ad qui harum incidunt deserunt ducimus facilis tempore voluptas incidunt voluptas voluptatem esse id laboriosam.', 1, 1, '2023-01-20 15:50:32', '2023-04-02 20:53:17'),
(11, 'NewMan1', 1, '<p>afafaf<br></p>', 1, 0, '2023-04-02 20:00:59', '2023-04-02 20:00:59'),
(12, 'NewMan2', 2, '<p>asaf<br></p>', 1, 0, '2023-04-02 20:01:21', '2023-04-02 20:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_30_120553_create_admins_table', 1),
(6, '2023_01_05_170644_create_permission_tables', 2),
(14, '2023_01_05_174034_create_products_table', 5),
(15, '2017_12_16_185144_create_categories_table', 6),
(16, '2017_12_16_232816_create_manufacturers_table', 6),
(17, '2017_12_26_011022_create_customers_table', 6),
(21, '2023_01_21_202658_create_customers_table', 7),
(22, '2023_01_22_203615_create_expenses_table', 8),
(23, '2023_02_08_171250_create_expense_types_table', 8),
(26, '2023_02_09_145000_create_designations_table', 9),
(27, '2023_02_09_144340_create_employees_table', 10),
(29, '2023_02_15_160507_create_activity_log_table', 11),
(30, '2023_02_15_160508_add_event_column_to_activity_log_table', 11),
(31, '2023_02_15_160509_add_batch_uuid_column_to_activity_log_table', 11),
(34, '2023_03_03_210918_create_payment_methods_table', 13),
(36, '2023_02_13_151455_create_payments_table', 14),
(39, '2023_02_08_171527_create_product_orders_table', 15),
(41, '2023_03_27_235613_create_files_table', 16),
(43, '2023_03_30_231802_create_projects_table', 17),
(44, '2023_03_31_013332_create_project_users_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('srbdgat@gmail.com', '$2y$10$FTcOgM.3rMwhkG1Jrukb8e4g7NkqLzK5uu6O70jDGmymlH.b53sv.', '2023-04-01 20:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerId` int(11) NOT NULL DEFAULT 0,
  `productId` int(11) NOT NULL DEFAULT 0,
  `orderId` int(11) NOT NULL DEFAULT 0,
  `projectId` int(11) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(11,2) NOT NULL DEFAULT 0.00,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentType` tinyint(4) NOT NULL DEFAULT 0,
  `paymentSource` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `customerId`, `productId`, `orderId`, `projectId`, `note`, `paymentMethod`, `amount`, `reference`, `phoneNumber`, `paymentType`, `paymentSource`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 3, 1, 1, NULL, '2', 15000.00, NULL, '+1-740-217-9011', 1, 'ProductOrder', 1, '2023-03-14 19:55:07', '2023-03-26 18:24:27'),
(2, NULL, 5, 7, 2, 1, NULL, '1', 0.00, NULL, '+1.206.398.2518', 1, 'ProductOrder', 1, '2023-03-14 19:59:14', '2023-03-26 18:24:29'),
(3, NULL, 4, 3, 1, 1, NULL, '2', 20000.00, NULL, '+1 (541) 629-4264', 1, 'ProductOrder', 0, '2023-03-26 18:28:05', '2023-03-26 18:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `methodName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accuntNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `methodName`, `accountName`, `accuntNumber`, `publicationStatus`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 'Cash', NULL, NULL, 1, 0, '2023-02-28 21:15:12', '2023-02-28 21:15:12'),
(2, 'Cheque', NULL, NULL, 1, 0, '2023-02-28 21:15:12', '2023-02-28 21:15:12'),
(3, 'bKash', NULL, NULL, 1, 0, '2023-02-28 21:15:12', '2023-02-28 21:15:12'),
(4, 'Nagad', NULL, NULL, 1, 0, '2023-02-28 21:15:12', '2023-02-28 21:15:12'),
(5, 'Roket', NULL, NULL, 1, 0, '2023-02-28 21:15:12', '2023-02-28 21:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(2, 'role-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(3, 'role-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(4, 'role-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(5, 'product-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(6, 'product-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(7, 'product-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(8, 'product-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(9, 'product-order-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(10, 'product-order-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(11, 'product-order-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(12, 'product-order-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(13, 'payment-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(14, 'payment-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(15, 'payment-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(16, 'payment-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(17, 'expense-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(18, 'expense-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(19, 'expense-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(20, 'expense-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(21, 'expense-type-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(22, 'expense-type-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(23, 'expense-type-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(24, 'expense-type-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(25, 'customer-list', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(26, 'customer-create', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(27, 'customer-edit', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44'),
(28, 'customer-delete', 'web', '2023-01-06 14:40:44', '2023-01-06 14:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` int(11) NOT NULL DEFAULT 0,
  `manufacturerId` int(11) NOT NULL DEFAULT 0,
  `projectId` int(11) NOT NULL DEFAULT 0,
  `productCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `purchasePrice` double(11,2) NOT NULL DEFAULT 0.00,
  `salesPrice` double(11,2) NOT NULL DEFAULT 0.00,
  `discountPrice` double(11,2) DEFAULT NULL,
  `discountStatus` tinyint(1) NOT NULL DEFAULT 0,
  `productQuantity` int(11) NOT NULL DEFAULT 0,
  `totalAmount` double(11,2) NOT NULL DEFAULT 0.00,
  `dueAmount` double(11,2) NOT NULL DEFAULT 0.00,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productImage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicationStatus` tinyint(4) NOT NULL DEFAULT 0,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `categoryId`, `manufacturerId`, `projectId`, `productCode`, `purchasePrice`, `salesPrice`, `discountPrice`, `discountStatus`, `productQuantity`, `totalAmount`, `dueAmount`, `details`, `productImage`, `publicationStatus`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 'Product1', 1, 2, 1, '0', 0.00, 0.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:03:59', '2023-01-20 10:02:35'),
(2, 'Product2', 2, 1, 0, '0', 0.00, 0.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 1, '2023-01-13 15:09:08', '2023-01-20 10:03:01'),
(3, 'Product2_2', 2, 2, 1, 'Product2', 2222.00, 22222.00, NULL, 0, 19, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-03-26 18:28:05'),
(4, 'Product3', 1, 2, 0, 'Product3', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 1, '2023-01-13 15:09:08', '2023-03-10 22:29:04'),
(5, 'Product4', 1, 2, 0, 'Product4', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 1, '2023-01-13 15:09:08', '2023-01-20 09:57:13'),
(6, 'Product56', 1, 3, 0, 'Product56', 666.00, 526.00, NULL, 0, 20, 0.00, 0.00, '<div>aaaaaaaaaaaaaaaa526<br></div>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-02-16 12:35:58'),
(7, 'Product14', 1, 1, 0, 'Product14', 1114.00, 1114.00, NULL, 0, 20, 700.00, 600.00, '<div>addasdasdada 1114<br></div>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-03-26 18:24:29'),
(8, 'Product7', 1, 1, 0, 'Product7', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(9, 'Product8', 2, 1, 0, 'Product8', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(10, 'Product id 10', 2, 1, 0, 'id10', 101010.00, 101010.00, 0.00, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA 1010<br></p>', NULL, 1, 1, '2023-01-13 15:09:08', '2023-01-20 13:31:55'),
(11, 'Product22', 2, 2, 0, 'Product22', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 1, '2023-01-13 15:09:08', '2023-03-12 16:11:03'),
(12, 'Product31', 1, 2, 0, 'Product31', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(13, 'Product41', 1, 1, 0, 'Product41', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(14, 'Product51', 1, 1, 0, 'Product51', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 1, '2023-01-13 15:09:08', '2023-01-20 10:02:25'),
(15, 'Product61', 1, 1, 0, 'Product61', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(16, 'Product71', 1, 1, 0, 'Product71', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(17, 'Product81', 2, 1, 0, 'Product81', 2222.00, 22222.00, NULL, 0, 20, 0.00, 0.00, '<p>adasdasdAAAAAAA<br></p>', NULL, 1, 0, '2023-01-13 15:09:08', '2023-01-13 15:09:08'),
(18, 'Paul Stehr Sr.', 1, 2, 3, '07778148', 8607.00, 18833.00, NULL, 0, 20, 0.00, 0.00, 'Maiores laboriosam et qui rerum et saepe culpa itaque veniam maxime et temporibus enim hic tempora reiciendis eum dolorem cupiditate iure ut hic labore aliquid est dolorem qui qui deleniti occaecati velit et tempore ab nulla dolores ut veniam debitis velit commodi aut nesciunt animi nesciunt asperiores cum itaque non aut ut.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(19, 'Zackery Lemke', 4, 2, 1, '93068918', 4044.00, 18565.00, NULL, 0, 20, 0.00, 0.00, 'Aliquid aut amet nemo sed magni ex debitis ut maxime quis aut molestiae amet non pariatur fugiat blanditiis voluptate deserunt occaecati est et alias at dolor quas ratione atque quia laudantium ipsum ratione minima dolorum ratione officia optio id nam veniam quod qui libero distinctio et commodi natus fuga vel laborum.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(20, 'Freeda Balistreri', 3, 1, 4, '83984952', 14285.00, 11989.00, NULL, 0, 20, 0.00, 0.00, 'Voluptate voluptatem quas non velit dolores accusantium libero quis fuga blanditiis laudantium maxime eligendi ipsam quam quia dolor rem vel consequatur officiis velit deserunt aut esse excepturi eius cupiditate.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(21, 'Sandra Baumbach II', 2, 4, 2, '33876184', 18257.00, 7107.00, NULL, 0, 20, 0.00, 0.00, 'Odio temporibus minus earum ipsum rerum soluta laborum quia repellat eum occaecati laudantium consequatur perferendis et aliquam et aliquid illum fugiat mollitia numquam officiis aperiam velit officiis aut modi est numquam quasi deleniti eum voluptas suscipit ducimus officia esse eius sunt sed aut molestiae sequi ipsam delectus aspernatur est est asperiores est consequatur asperiores ipsum dolorem laudantium voluptas qui qui quia aut.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(22, 'Miss Savanna Lueilwitz DVM', 5, 4, 4, '24927895', 12370.00, 14274.00, NULL, 0, 20, 0.00, 0.00, 'Id non quia aut non consequuntur enim perspiciatis tempora reprehenderit labore voluptas aut aliquam fuga vel qui ratione ab recusandae aut dolorem libero corporis ut iste in sit est odio sint adipisci blanditiis rerum quia consequatur autem ut cupiditate veritatis ut non voluptatem quidem autem dolorum itaque enim quidem vel fugiat at magni ipsa accusamus ut laborum debitis omnis laboriosam.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(23, 'Shea Bailey', 4, 2, 2, '47780934', 14384.00, 8865.00, NULL, 0, 20, 0.00, 0.00, 'Porro et voluptates cum fugiat occaecati quia illum et eligendi ut omnis velit reiciendis saepe suscipit totam modi nemo eaque quisquam nemo sint voluptates et ea in magnam autem labore amet ad non accusantium excepturi vel dolorem unde inventore soluta repellendus maxime sed id.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(24, 'Ludwig Hayes', 5, 1, 2, '56255867', 18510.00, 9523.00, NULL, 0, 20, 0.00, 0.00, 'Ullam quas quos consectetur corporis est et ut officiis labore velit aut veritatis voluptas eum sapiente et sapiente nisi placeat impedit quia quis quos sed perferendis beatae tenetur et saepe quam sunt quibusdam eligendi impedit.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(25, 'Jadon Leuschke', 4, 4, 3, '70481907', 9067.00, 1434.00, NULL, 0, 20, 0.00, 0.00, 'Reiciendis ut dolorum harum porro nobis qui sint quis voluptatem odio aut id aut laudantium enim dicta at sint doloremque beatae sequi quae voluptatem voluptatem magnam nisi et tempora enim et reiciendis quod atque.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(26, 'Kay Hauck', 3, 1, 3, '94714203', 6790.00, 16498.00, NULL, 0, 20, 0.00, 0.00, 'Qui qui qui placeat quibusdam aut eveniet dolores ea aut in odit pariatur dolor reiciendis id molestias deserunt at vel totam blanditiis rerum laborum reiciendis eos dicta quisquam recusandae commodi voluptatum aspernatur aut cum quas nam cupiditate ut distinctio inventore voluptates quisquam excepturi similique assumenda quaerat.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(27, 'Aida Huel', 3, 4, 1, '10791769', 6718.00, 1491.00, NULL, 0, 20, 0.00, 0.00, 'Aut dolorum et repellendus optio quia et totam non mollitia corrupti et facilis nam similique non dolorum eos nihil dolorem error laborum reprehenderit minima necessitatibus totam et molestias sit perferendis non sint quisquam suscipit totam blanditiis.', NULL, 1, 0, '2023-01-20 15:46:33', '2023-01-20 15:46:33'),
(28, 'Jocelyn Hayes', 5, 3, 2, '17793827', 16513.00, 16579.00, NULL, 0, 20, 0.00, 0.00, 'Quia enim eligendi repudiandae velit voluptatem at ab deserunt voluptates sed maxime laudantium dolorem sed nulla quos tenetur vero totam rerum molestiae voluptates beatae distinctio enim architecto sapiente necessitatibus sunt optio veritatis dicta eaque accusamus facere maxime.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(29, 'Quincy Waters III', 1, 4, 3, '15247056', 19607.00, 11118.00, NULL, 0, 20, 0.00, 0.00, 'Labore nihil praesentium voluptas eum odio delectus provident nostrum enim quo pariatur accusamus animi facere quasi explicabo accusamus perspiciatis enim ducimus ex possimus nisi non similique beatae expedita et itaque perferendis aliquid voluptates similique repudiandae aliquid et incidunt.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(30, 'Lawson Zboncak', 4, 4, 5, '18799484', 19479.00, 16326.00, NULL, 0, 20, 0.00, 0.00, 'Ipsum eum qui nisi consectetur fugiat molestiae saepe necessitatibus eius voluptas quia sit voluptatibus non voluptates ut consequatur ratione corrupti unde at at id ut quaerat ut ipsa veniam a maiores et vero aut quam sint hic temporibus aliquam molestias optio recusandae totam at repellendus nihil est enim perferendis magnam autem voluptatem aliquid sunt maiores fuga sit quibusdam aut.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(31, 'Gordon Keeling', 4, 4, 1, '76206658', 8980.00, 18316.00, NULL, 0, 20, 0.00, 0.00, 'Ipsam placeat voluptatem autem sed voluptatem voluptas vel et qui nostrum iure corrupti molestiae blanditiis illo a consequatur dolorum qui vitae consequatur repellendus ut ipsam architecto illum vel aperiam rem aut eligendi nostrum eos voluptatibus eum hic deleniti et occaecati ut ut in blanditiis fugit iusto ut distinctio.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(32, 'Cristina Waelchi', 3, 1, 1, '80525059', 1197.00, 12014.00, NULL, 0, 20, 0.00, 0.00, 'Explicabo facere debitis sequi quia autem ab veritatis eos voluptatem quis quis quae eum numquam nemo dolorem eligendi aut aut repellendus et perferendis voluptas doloremque ipsum et porro optio.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(33, 'Mr. Mathew Pfeffer DVM', 3, 2, 1, '81437337', 12399.00, 11337.00, NULL, 0, 20, 0.00, 0.00, 'Iusto animi et repellat dolores voluptate est sed commodi quia tempora nisi sint tenetur eius distinctio dolor occaecati quis aut aut alias earum voluptatem provident cupiditate sed id est sapiente ut doloribus voluptatibus in eveniet magnam qui.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(34, 'Imogene Schuster I', 2, 3, 1, '87807318', 5225.00, 1312.00, NULL, 0, 20, 0.00, 0.00, 'Qui quo doloribus eligendi provident commodi magni aut et nostrum cupiditate et maiores consequatur fugiat occaecati eligendi repellendus illo perferendis corporis ut ad sequi quia adipisci tempore optio ullam quae voluptatibus sed repellendus rerum perspiciatis est aliquid aut est voluptas hic nihil velit quis atque aspernatur sunt nostrum eius sit atque sint veritatis ab ea nihil.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(35, 'Paul Wyman', 1, 4, 2, '31550574', 9996.00, 1875.00, NULL, 0, 20, 0.00, 0.00, 'Quisquam qui illo non recusandae qui est nisi eaque reiciendis culpa dicta praesentium fugit placeat voluptatem optio blanditiis repudiandae doloribus totam et nostrum excepturi dolor accusantium voluptas ea ab quis cumque autem corrupti ex optio facere qui maiores nulla fugiat assumenda mollitia cum labore sed explicabo et illo quaerat est minima rerum est tempora autem atque distinctio eos.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(36, 'Javonte Roob', 5, 2, 5, '84227041', 14113.00, 6587.00, NULL, 0, 20, 0.00, 0.00, 'Tenetur delectus dolores corporis distinctio eos aliquam tempore assumenda possimus odio possimus adipisci officiis odit ex vel magni rerum asperiores et fugit rerum tenetur rerum ipsa fugiat ut et est possimus hic occaecati quas et qui nobis dolores.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(37, 'Demario Durgan', 1, 4, 2, '36775378', 13480.00, 14212.00, NULL, 0, 20, 0.00, 0.00, 'Ut dolor adipisci eius ut enim laborum inventore ut et dicta animi nesciunt iste sed dolores nobis et reprehenderit quia sequi facilis voluptatem numquam repellendus excepturi repudiandae et placeat dolorem veniam molestias commodi accusantium voluptatem sequi eum quas quia tempora aut necessitatibus non atque soluta quod sed voluptas vitae perspiciatis rem minus repudiandae repudiandae nulla voluptate sit dolorem laborum sit omnis commodi.', NULL, 1, 0, '2023-01-21 14:49:35', '2023-01-21 14:49:35'),
(38, 'Test Product 313', 2, 2, 0, 'ABC313', 200.00, 250.00, NULL, 0, 20, 1000.00, 300.00, NULL, NULL, 1, 0, '2023-03-13 17:52:19', '2023-03-13 18:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL DEFAULT 0,
  `productDetails` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectId` int(11) NOT NULL DEFAULT 0,
  `customerId` int(11) NOT NULL DEFAULT 0,
  `customerDetails` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitPrice` double(10,2) NOT NULL DEFAULT 0.00,
  `unit` int(11) NOT NULL DEFAULT 0,
  `subTotal` double(10,2) NOT NULL DEFAULT 0.00,
  `flatDiscount` double(10,2) NOT NULL DEFAULT 0.00,
  `payable` double(10,2) NOT NULL DEFAULT 0.00,
  `paid` double(10,2) NOT NULL DEFAULT 0.00,
  `due` double(10,2) NOT NULL DEFAULT 0.00,
  `dueDate` datetime NOT NULL DEFAULT '2023-03-27 00:25:44',
  `profit` double(10,2) NOT NULL DEFAULT 0.00,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletionStatus` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `productId`, `productDetails`, `projectId`, `customerId`, `customerDetails`, `unitPrice`, `unit`, `subTotal`, `flatDiscount`, `payable`, `paid`, `due`, `dueDate`, `profit`, `note`, `deletionStatus`, `created_at`, `updated_at`) VALUES
(1, 3, '{\"id\":3,\"name\":\"Product2_2\",\"categoryId\":2,\"manufacturerId\":2,\"projectId\":0,\"productCode\":\"Product2\",\"purchasePrice\":2222,\"salesPrice\":22222,\"discountPrice\":null,\"discountStatus\":0,\"productQuantity\":20,\"totalAmount\":0,\"dueAmount\":0,\"details\":\"<p>adasdasdAAAAAAA<br><\\/p>\",\"productImage\":null,\"publicationStatus\":1,\"deletionStatus\":0,\"created_at\":\"2023-01-13T15:09:08.000000Z\",\"updated_at\":\"2023-03-26T18:24:27.000000Z\"}', 1, 4, '{\"id\":4,\"name\":\"Walton Bednar\",\"password\":\"$2y$10$yT8Ki3fEBWazVkdILAq6dOTXXPSu3ihMvogmehdPqdTAUCG3q9u3.\",\"address\":\"East Alanis, Nevada\",\"phoneNumber\":\"+1 (541) 629-4264\",\"projectId\":1,\"publicationStatus\":1,\"deletionStatus\":0,\"image\":null,\"created_at\":\"2023-01-22T13:08:48.000000Z\",\"updated_at\":\"2023-01-22T13:08:48.000000Z\"}', 22222.00, 1, 22222.00, 500.00, 21722.00, 20000.00, 1722.00, '2023-03-31 23:59:59', 19500.00, NULL, 0, '2023-03-26 18:28:05', '2023-03-26 18:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Agomoni Machineries', '2023-03-30 19:39:56', '2023-03-30 19:39:56'),
(2, 'B. AGRO', '2023-03-30 19:55:04', '2023-03-30 19:55:04'),
(3, 'Agomoni Hachary', '2023-03-30 19:58:11', '2023-03-30 19:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE `project_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2023-03-30 19:44:42', '2023-04-01 17:39:26'),
(2, 1, 1, '2023-03-30 20:17:58', '2023-03-30 20:17:58'),
(3, 2, 1, '2023-03-30 20:17:58', '2023-03-30 20:17:58'),
(4, 3, 2, '2023-03-30 20:18:47', '2023-03-30 20:18:47'),
(5, 3, 1, '2023-03-30 20:18:47', '2023-03-30 20:18:47'),
(6, 5, 1, '2023-03-30 20:20:46', '2023-03-30 20:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-01-06 14:41:44', '2023-01-06 14:41:44'),
(2, 'RoleProView', 'web', '2023-01-06 15:24:12', '2023-01-07 10:56:43'),
(3, 'Tester', 'web', '2023-01-07 11:21:17', '2023-01-07 11:21:17');

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
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
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
(28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@user.com', NULL, '$2y$10$Co8TsMtNDsmiia/WpaZUBulR1EKujMZf0lk1jW8ePIw1CZuylxmZa', '0', 1, NULL, '2023-01-02 10:01:43', '2023-01-02 10:01:43'),
(2, 'Hardik Savani', 'admin@gmail.com', NULL, '$2y$10$E8UQ.vg2Pl.5y.5jPEMXNOB3Z3urTfCJo2QilJeJHxpejxs8oDB5K', '0', 0, NULL, '2023-01-06 14:41:44', '2023-01-06 14:41:44'),
(3, 'hle', 'srbdgat@gmail.com', NULL, '$2y$10$n6649go8Q5/wgQgxTPDI2uYJiIpaX/E4fdluLvNJc9H/JL35L88l6', '0', 2, NULL, '2023-01-06 15:21:43', '2023-03-30 20:17:34'),
(4, 'QA Engineer', 'cj@cj.com', NULL, '$2y$10$8R1uAwKI4wTOg8TvionUPOIQmK8Glz4daRHKkJQ9puCA1CoomCWVy', '0', 0, NULL, '2023-01-07 11:22:10', '2023-01-07 11:44:07'),
(5, 'Agomoni1', 'agomoni1@gmail.com', NULL, '$2y$10$DAg2r7FxL1bN1MLCJLwW2e.3R/tywSlN0EmwzJU5y7pGKXLtncYXG', '0', 0, NULL, '2023-03-30 19:43:55', '2023-03-30 19:43:55'),
(6, 'Agomoni2', 'agomoni2@gmail.com', NULL, '$2y$10$77/fNhQi8Z/KQH5X4.T77O3aqy71Sixcv8Nzj.4ph6n695TkT838a', '0', 0, NULL, '2023-03-30 19:44:42', '2023-03-30 19:59:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_users`
--
ALTER TABLE `project_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

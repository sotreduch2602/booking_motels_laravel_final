-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 09:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_hotels_laravel_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` char(36) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `room_id` char(36) DEFAULT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled','completed') DEFAULT 'pending',
  `payment_status` enum('pending','paid','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` char(36) NOT NULL,
  `name` varchar(150) NOT NULL,
  `stars` tinyint(1) DEFAULT 3 CHECK (`stars` between 1 and 5),
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `owner_id` char(36) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 2),
(6, '2025_07_12_073208_add_updated_column_to_users_table', 3),
(7, '2025_07_12_075332_add_created&updated_column_to_rooms_table', 4),
(8, '2025_07_12_075543_add_created&updated_column_to_room_types_table', 4),
(10, '2025_07_16_111116_add_google_id_column_to_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` char(36) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `hotel_id` char(36) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` char(36) NOT NULL,
  `hotel_id` char(36) DEFAULT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_type_id` char(36) DEFAULT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `max_people` int(11) DEFAULT 2,
  `description` text DEFAULT NULL,
  `available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `base_price` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `description`, `amenities`, `base_price`, `created_at`, `updated_at`) VALUES
('1db9256b-5ef9-11f0-b7b4-24418ccc3d95', 'Presidential Suite', 'Rerum rem aut et consequatur tempora error. Fugit reprehenderit possimus error debitis ipsam sed. Minima excepturi rerum minus aut. Velit nesciunt eligendi ex placeat maxime architecto.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area', 205.00, '2024-11-22 21:07:29', '2025-06-27 00:36:15'),
('1dba9905-5ef9-11f0-b7b4-24418ccc3d95', 'Standard Room', 'Odit corrupti enim qui sint. Modi architecto laboriosam non est. Dolores ut distinctio debitis est perspiciatis labore quis maxime.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area', 325.00, '2024-08-21 07:28:40', '2025-07-07 22:19:10'),
('1dbe184e-5ef9-11f0-b7b4-24418ccc3d95', 'Deluxe Room', 'Soluta et sit similique beatae. Est voluptatem tempora minima nisi quaerat beatae sed dolor. Nisi ut omnis in sit dolor magni voluptatem. Praesentium debitis aut eligendi et.', 'Wi-Fi, TV, Air Conditioning, Mini Bar', 51.00, '2025-03-28 17:52:31', '2025-06-17 16:11:28'),
('1dbf2061-5ef9-11f0-b7b4-24418ccc3d95', 'Executive Room', 'Quidem maiores tempora qui vel rem. Est animi consequatur voluptatem minus. Repellat praesentium sit voluptas.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area', 147.00, '2025-06-12 08:47:56', '2025-06-19 19:36:20'),
('1dc02614-5ef9-11f0-b7b4-24418ccc3d95', 'Deluxe Room', 'Doloremque molestiae maiores vel cupiditate asperiores quia consectetur. Ratione tenetur perferendis corporis illo. Delectus rerum sapiente maiores et quas illum.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Jacuzzi, Living Room', 492.00, '2024-12-10 05:17:46', '2025-07-01 03:00:26'),
('1dc12a9f-5ef9-11f0-b7b4-24418ccc3d95', 'Standard Room', 'Ipsam dolor facilis velit qui est voluptatem. Ut non error veniam sed vel voluptatum voluptas. Nam corrupti corrupti voluptatum temporibus. Enim alias quaerat dolores blanditiis eum temporibus.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area', 364.00, '2025-02-26 17:48:26', '2025-06-19 07:08:41'),
('1dc23091-5ef9-11f0-b7b4-24418ccc3d95', 'Business Room', 'Ut inventore dolorum in nam doloribus tenetur cum alias. Voluptatem error quo ducimus sunt magni veniam. Inventore voluptate magnam voluptatum libero eos qui iure. Distinctio voluptate non enim repellendus quisquam aperiam. Eius iste distinctio perspiciatis aliquid mollitia.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Work Desk, Meeting Table', 363.00, '2024-09-25 22:28:11', '2025-06-22 23:03:46'),
('1dc33041-5ef9-11f0-b7b4-24418ccc3d95', 'Business Room', 'Soluta quaerat qui natus occaecati consectetur quam natus. Molestiae tempore enim ut accusamus quis odit pariatur.', 'Wi-Fi, TV, Air Conditioning, Mini Bar, Jacuzzi, Living Room, Kitchen, Butler Service', 277.00, '2024-09-26 02:09:50', '2025-06-26 01:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0vGkRZXVcWLqYqR9fzhcmuSgRdaF3vE7hxDBIum5', 9223372036854775807, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaWw1dlZxTkhEYmd5aUhUbzIyTFg5dG8yQVB3RWhvT2pteFpoUnlQbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjkyMjMzNzIwMzY4NTQ3NzU4MDc7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fX0=', 1752665479),
('7OQ0Zxxo18NuUOMtMlHZib7apl3OHgexx0WMd1yq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNzV3T0FBU3R3Q3dDdnI3VWtVVTRoOUJzbmp5TlJRVVdyazFoUkhtUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6NTE3My9nb29nbGUvcmVkaXJlY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6InN0YXRlIjtzOjQwOiJzVm1tRncwOUFqYmpTdDVkQWhWazdjTzVUZmxxUDYzUElKTko3MGd0Ijt9', 1752666956),
('BzVKzTfG6K7wmkmmiZrWVlH8EsqiYiot1m9mgmn5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWtXOXZ5UlF6WW5oUldzSEk3NG9zTEhmTGRqSDRocFNNR0djb0NpciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6NTE3My9nb29nbGUvcmVkaXJlY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6InN0YXRlIjtzOjQwOiJ4T2M2Z0IwUnhaQ3dSOVNwWEVmUVVLeGZmNmhKSVpISzNobTBwdFhmIjt9', 1752666940),
('cGraS5f5NyMWbdY1xKFNOuT22OSNkZk8x2mlLcbW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3VhM1NTWjR3NnFOVmQxVURpZGNjQ0FzSG5jTnNKbFpUaFVlbHdqUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6NTE3My9nb29nbGUvcmVkaXJlY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6InN0YXRlIjtzOjQwOiJ6SHVqWE11d3RpcUsycDk5WE1FYlR4NXBJQ1l5RThaOHZIOFJXdmpUIjt9', 1752666996),
('QUpj6aDojU6ILHQrFdTQHsprg4p8cAQlexQlcHJi', 0, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib2s1VEl6OG94WWdGajIxWThWNUx6bUNpbU1KTGFBN1V1dzg0UlR6TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTowO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1752669579),
('zslSZBIHHlHjfLxs62mg2M18CtidPwfKjPoEDrAJ', 0, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNmJhMFhpdTMweXlWdUhqSU1pZVVOcFRiS2gydEZVSFlXVkl1azBHayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZ29vZ2xlL2NhbGxiYWNrP2F1dGh1c2VyPTAmY29kZT00JTJGMEFWTUJzSmh3WDF0VzJLM2swRWI2WXNwcW41R09vSjZGZVQzOGNNZXRQUndGWmZqaDN4eHhQT1VrTHZmM3ppeHJJT0swckEmcHJvbXB0PW5vbmUmc2NvcGU9ZW1haWwlMjBwcm9maWxlJTIwaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlYXBpcy5jb20lMkZhdXRoJTJGdXNlcmluZm8ucHJvZmlsZSUyMGh0dHBzJTNBJTJGJTJGd3d3Lmdvb2dsZWFwaXMuY29tJTJGYXV0aCUyRnVzZXJpbmZvLmVtYWlsJTIwb3BlbmlkJnN0YXRlPWRFRlh6VEl6YXQ0T0JKYm1OenBhRjNGck5KR2Q0dExiWXpXZTZncDUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTowO30=', 1752664716);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` int(11) DEFAULT 0,
  `google_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password_hash`, `phone`, `role`, `google_id`, `created_at`, `updated_at`) VALUES
('105977326368752474782', 'NLN', 'sotreduch26022001@gmail.com', '$2y$12$UWGrvs0JFMAVzd4gaQhLtOlkrSDQyyzzIHnEzIm8TbznXXSciAvS6', NULL, 0, '105977326368752474782', '2025-07-16 05:37:58', '2025-07-16 05:37:58'),
('6833e5c3-5ef0-11f0-b7b4-24418ccc3d95', 'test', 'test@gmail.com', '$2y$12$CMFb0IKY/DBGtX6oW7CJhul3co03BING9N4x0Y9bDymPoed4nEieS', '111111111', 2, NULL, '2025-07-12 07:40:45', '2025-07-12 07:44:10'),
('af97f7ff-5ef4-11f0-b7b4-24418ccc3d95', 'Christop Ruecker', 'keyshawn98@example.com', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '(979) 455-3512', 1, NULL, '2025-05-03 03:21:56', '2024-10-14 10:51:01'),
('af9961a3-5ef4-11f0-b7b4-24418ccc3d95', 'Mr. Wyman Dare DDS', 'jeramie48@example.com', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '318.570.6715', 1, NULL, '2024-10-09 22:17:18', '2025-02-17 08:08:35'),
('af9c43c2-5ef4-11f0-b7b4-24418ccc3d95', 'Deonte Doyle', 'torphy.don@example.org', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '445.757.5595', 0, NULL, '2025-06-19 08:06:09', '2025-04-30 00:23:08'),
('af9d5244-5ef4-11f0-b7b4-24418ccc3d95', 'Victor Abshire', 'kwilliamson@example.net', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '+16313898023', 0, NULL, '2025-06-29 19:20:12', '2024-12-04 15:00:03'),
('af9ef09b-5ef4-11f0-b7b4-24418ccc3d95', 'Sandy Welch', 'white.kaci@example.com', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '1-531-578-5639', 1, NULL, '2025-01-23 11:07:47', '2025-05-25 05:27:27'),
('af9ff8c9-5ef4-11f0-b7b4-24418ccc3d95', 'Cortez Hayes', 'scot45@example.org', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '380.499.9417', 1, NULL, '2025-06-09 01:40:39', '2025-05-08 12:05:41'),
('afa1011f-5ef4-11f0-b7b4-24418ccc3d95', 'Duane Hane', 'lubowitz.pansy@example.org', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '1-302-638-1302', 0, NULL, '2025-06-21 07:11:01', '2024-09-14 07:55:15'),
('afa21002-5ef4-11f0-b7b4-24418ccc3d95', 'Sammy Cummerata', 'ferry.felicity@example.com', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '(703) 637-8273', 1, NULL, '2025-03-30 03:16:27', '2025-06-04 21:11:54'),
('afa31de3-5ef4-11f0-b7b4-24418ccc3d95', 'Clemens Kertzmann', 'ghettinger@example.net', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '+1-737-404-3758', 0, NULL, '2025-04-01 04:20:56', '2024-08-12 15:46:44'),
('afa3ec79-5ef4-11f0-b7b4-24418ccc3d95', 'Mr. Damian Weber', 'ray43@example.com', '$2y$12$UgZWcO9nQzp.C3dhaSQTdekeuCZtSVcQ1zqF4vQbQNNx4nw725kAG', '1-502-228-0212', 1, NULL, '2025-05-17 22:57:34', '2025-06-25 18:34:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

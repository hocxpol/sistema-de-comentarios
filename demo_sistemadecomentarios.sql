-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2019 at 12:34 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_sistemadecomentarios`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Autem est id ut eligendi architecto labore. Repellat quia tempore beatae perferendis et quis.', 4, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(2, 'Dolorum eius ratione sunt quos sit minima voluptates. Ut nulla sunt recusandae dignissimos inventore. Consequatur rerum velit eos rerum ad omnis omnis.', 3, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(3, 'Molestiae tempore non delectus reiciendis. Quas nihil magni velit rem. Sit animi ea laboriosam et et inventore eius.', 5, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(4, 'Laboriosam voluptatem ut corporis non. Veniam nobis ut minus earum. Et illum aperiam tempora modi. Porro dolores nisi dolorem.', 7, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(5, 'Blanditiis dignissimos voluptas porro. Architecto ab sed harum ea voluptas est. Quis laborum consequatur architecto dignissimos enim.', 5, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(6, 'Eveniet dignissimos velit magni qui voluptatum ut necessitatibus. Et atque et est quidem. Quia quia voluptates mollitia eligendi eaque consequuntur in.', 7, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(7, 'Voluptatibus beatae et aut saepe tempora cum. Veritatis cupiditate voluptatem porro eveniet explicabo. Qui natus cum quod vitae nihil illo accusamus.', 5, '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(8, 'teste', 1, '2019-10-16 17:23:20', '2019-10-16 17:23:20');

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
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_10_14_234152_create_users_table', 1),
(10, '2019_10_14_234157_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'test@test.com', '2019-10-16 17:21:22', '$2y$10$ch4iDKIQNxeXiYTqimcd3udOiCWrCxkzj0sz3SyR/eDxXRcGWKDlK', '0', '1_avatar1571239839.jpg', 'cf7pCoQEeC', '2019-10-16 17:21:22', '2019-10-16 18:30:39'),
(2, 'Era Block', 'jacynthe.watsica@example.org', '2019-10-16 17:21:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 'avatar.jpg', 'eAJDlA0Jfr', '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(3, 'Ms. Lavonne Eichmann', 'ywilliamson@example.com', '2019-10-16 17:21:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 'avatar.jpg', 'WRrkbHzVkU', '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(4, 'Ara Block', 'hfeeney@example.org', '2019-10-16 17:21:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 'avatar.jpg', 'r4OouRWD8F', '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(5, 'Prof. Alphonso Corwin MD', 'preinger@example.org', '2019-10-16 17:21:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 'avatar.jpg', 'GcP7pK9iJt', '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(6, 'Maryse Streich', 'beer.leland@example.com', '2019-10-16 17:21:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 'avatar.jpg', 'UIzoDy6Qjv', '2019-10-16 17:21:22', '2019-10-16 17:21:22'),
(7, 'Herminia Dibbert', 'heather.altenwerth@example.org', '2019-10-16 17:21:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 'avatar.jpg', 'wuoSz00Tdb', '2019-10-16 17:21:22', '2019-10-16 17:21:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

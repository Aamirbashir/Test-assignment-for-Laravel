-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2018 at 07:26 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_films`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `film_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'This was an amazing moview i ever watched', '2018-10-03 03:06:36', '2018-10-03 03:06:36'),
(2, 1, 2, 'This was an amazing moview i ever watched', '2018-10-03 03:06:36', '2018-10-03 03:06:36'),
(3, 1, 1, 'thisisjsdfsa', '2018-10-04 07:21:39', '2018-10-04 07:21:39'),
(4, 1, 1, 'thisisjsdfsaawetndsf', '2018-10-04 07:22:23', '2018-10-04 07:22:23'),
(5, 1, 1, 'hello', '2018-10-04 07:23:18', '2018-10-04 07:23:18'),
(6, 1, 1, 'jsdfs', '2018-10-04 07:24:37', '2018-10-04 07:24:37'),
(7, 1, 1, 'sdfdsf', '2018-10-04 07:26:51', '2018-10-04 07:26:51'),
(8, 1, 1, 'sdfdsfjdsjfdsjf', '2018-10-04 07:27:01', '2018-10-04 07:27:01'),
(9, 1, 1, 'pppf pai', '2018-10-04 07:28:36', '2018-10-04 07:28:36'),
(10, 1, 9, 'I loved this film. It\'s funny and creative. Kept my daughter (9.5) captivated. She just had to call Grandma afterward to tell her all about it.', '2018-10-04 08:00:38', '2018-10-04 08:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `ratings` int(11) NOT NULL,
  `ticket_price` double NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genrs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `film_slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `description`, `release_date`, `ratings`, `ticket_price`, `country`, `genrs`, `photo`, `film_slug`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Skyscraper', 'FBI Hostage Rescue Team leader and U.S. war veteran Will Sawyer now assesses security for skyscrapers. On assignment in Hong Kong he finds the tallest, safest building in the world suddenly ablaze and he\'s been framed for it. A wanted man on the run, Will must find those responsible, clear his name and somehow rescue his family who are trapped inside the building - above the fire line', '2018-05-04', 5, 25.3, 'USA', 'action,thrilling,adventure', 'images/medium-cover.jpg', 'Skyscraper_1', 1, '2018-10-03 03:06:36', '2018-10-03 03:06:36'),
(2, 'Ant-Man and the Wasp', 'In the aftermath of Captain America: Civil War (2016), Scott Lang grapples with the consequences of his choices as both a superhero and a father. As he struggles to rebalance his home life with his responsibilities as Ant-Man, he\'s confronted by Hope van Dyne and Dr. Hank Pym with an urgent new mission. Scott must once again put on the suit and learn to fight alongside The Wasp as the team works together to uncover secrets from their past', '2018-05-04', 3, 20.3, 'USA', 'action,thrilling,adventure,commedy', 'images/medium-cover1.jpg', 'Ant-Man_and_the_Wasp_2', 1, '2018-10-03 03:06:36', '2018-10-03 03:06:36'),
(9, 'Hotel Transylvania 3: Summer Vacation', 'Mavis surprises Dracula with a family voyage on a luxury Monster Cruise Ship so he can take a vacation from providing everyone else\'s vacation at the hotel. The rest of Drac\'s Pack cannot resist going along. But once they leave port, romance arises when Dracula meets the mysterious ship Captain, Ericka. Now it\'s Mavis\' turn to play the overprotective parent, keeping her dad and Ericka apart. Little do they know that his \"too good to be true\" love interest is actually a descendant of Abraham Van Helsing, ancient nemesis to Dracula and all other monsters.', '2018-01-01', 4, 80, 'French Polynesia', 'Action,thrilling', 'images/1538658003.jpeg', 'Hotel Transylvania 3: Summer Vacation', 1, '2018-10-04 08:00:03', '2018-10-04 08:00:03');

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
(1, '2018_10_03_063122_create_films_table', 1),
(2, '2018_10_03_071858_create_comments_table', 2);

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aamir', 'aamir_bashir@live.com', NULL, '$2y$10$urs1UWqhV67.yJJ8yvYwfebSehPKNY.fk6Gh2aL9cOf/4KrNuYKZW', 'xt3ioIWWX5mvWcyoX1z1AjvSE9YS9EWlgLtzNwc2miKPByLLVrxAaZkVXp54', '1nErOzcfyTmYcxVRs639mXKZa8mPYTllXk7SUslnqFSJ555D5ru2qTexcH8c', '2018-10-03 01:28:49', '2018-10-04 11:54:50'),
(2, 'Yasir Khan', 'aamir_bashir+1@live.com', NULL, '$2y$10$ky6mQEcxNpqWhQOfsYuPM.87sKMp4g8RsJePgwmqINmXcoB9xN4Fm', '9iQg19TDCgSTSbfezrpRreAGhusk5QLfXhMnwimd7xO7vzsJm4Hgoomg9T4P', 'DOlrxImsMywo7fbyBS0F0TEXj5fsANJFGe7i9HhyTTFCiAV9beSdoVCAVtIH', '2018-10-03 05:52:52', '2018-10-03 05:52:52'),
(3, 'Aamir', 'shaibi3036@gmail.com', NULL, '$2y$10$avh5qwYfwuSPimRXd9qOm.MEoef.Ze/9CoGtQPETV0xnXJ4u3B0vm', 'VqiwwXLMvoi1lS0Gn1f0ZaQI1ku5bicM1FaLg5pRNXX9TLkdZw6zJiKskqTy', 'kUnoNvYp1nKIzkzqZH87w1JoTKG7IHXPN8jwsP6pkWA3pICHqPPbdv3ymcWA', '2018-10-03 05:54:23', '2018-10-03 06:00:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_index` (`user_id`),
  ADD KEY `comments_film_id_index` (`film_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

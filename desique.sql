-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2016 at 06:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desique`
--
-- ---------------------------------------------------------
-- Table structure for table `g_album_photos`
--

CREATE TABLE `g_album_photos` (
  `id` int(11) NOT NULL,
  `flag` text CHARACTER SET latin1 NOT NULL,
  `alt` text CHARACTER SET utf8,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `members`
--

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `mission` varchar(150) CHARACTER SET utf8 NOT NULL,
  `vision` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` int(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcomments`
--

CREATE TABLE `pcomments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL,
  `flag` text CHARACTER SET utf8,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `likes` int(11) DEFAULT '0',
  `comments` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `flag`, `alt`, `date`, `likes`, `comments`, `author`, `cat_id`, `updated_at`, `created_at`) VALUES
(4, 'messi', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', '1474384771', 'aaaaaaa', '1983-03-18', 0, 0, 'alaa', 8, '2016-09-20 13:19:31', '2016-09-20 13:19:31'),
(5, 'now', 'now', '1474386527', 'dddd', '2000-02-17', 0, 0, 'alaa', 8, '2016-09-20 13:48:47', '2016-09-20 13:45:42'),
(6, 'next', 'next', '1474386447', 'dddd', '1999-03-18', 0, 0, 'alaa', 8, '2016-09-20 13:47:27', '2016-09-20 13:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `snews`
--

CREATE TABLE `snews` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `flag` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `additional_info` text CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `url` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `flag` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------
--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `url` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `flag` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'disactivated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'lames', 'lames@lames.com', '$2y$10$d8WHCeFB2GbdeVSABCHUr.IQmMt.v4tXzr32iOEUfh9NTdl0rReFO', 'doocyD6qz9KYLbHdTz5YBcqJIEdDf4YBFJFLPT5bja38VNgmXRKPnH9UktGh', '2016-05-11 06:01:54', '2016-09-06 12:37:25', 'Editor'),
(3, 'alaa', 'alaa@yahoo.com', '$2y$10$BKmcSsvjypRF/Xjm4LSaL./osSpNt/FbUYLu.Ik1AKC05VO2ldVue', 'rFfSK8OJh8WPwJ2m79uaEUmS5bBhgGtvv7BRbJx9udXtzwMuuujjtYjXucDa', '2016-05-11 06:04:22', '2016-09-06 12:36:08', 'Admin'),
(4, 'mohaned', 'm.fouad.developer@gmail.com', '$2y$10$BKmcSsvjypRF/Xjm4LSaL./osSpNt/FbUYLu.Ik1AKC05VO2ldVue', 'AFtDw748GdoVIzrQkQ8pO4p5Zq18qqAUawomI3NdFHqXMp2U777cc7GMbIYi', '2016-05-15 13:23:10', '2016-09-04 08:08:54', 'Data Entry'),
(5, 'amera', 'amera.elsayed6@gmail.com', '$2y$10$5Itr3pLJTdM4SI0GMeB.f.WWIoa2FOh1gPs1HCKRchuDIQdmJd9g.', '4cgjartVEo98RoSrvlqQwLfw9lE13f0N2zdty4CR7WEWsLLJ2dRTyquSEXjJ', '2016-05-16 06:25:55', '2016-05-16 08:57:47', 'Admin'),
(6, 'reham mohamed', 'rehammohamed@brother-group.net', '$2y$10$BR2q0F5Ujf/g4AhHvVP1dOStRzgA1YSuAqWONQCoKQD1dnTErhb.G', 'zlBAVfXZ3xNFXkJtrSRhIyDSyXeO2FOpOaSFhao5gDsjFgGuB8ymifrT6miF', '2016-05-16 08:27:45', '2016-06-02 12:56:25', 'Data Entry'),
(7, 'soaad elattar ', 'SOSO_MOSTAFA2012@HOTMAIL.COM', '$2y$10$5DNUW.mPGbC4jUA9qtd/MOly/hhkSQjz3H4xZ31Uuq7I9PDolPIYO', 'eOqwsPCynpxZZ7bK4wG8QcYO6N08vuMA4wRXvjGKcBhqa6gHLERYYJlR1RU3', '2016-05-17 12:03:04', '2016-05-29 14:48:07', 'Data Entry'),
(8, 'abeer', 'brry111@gmail.com', '$2y$10$IUxRyz/Hq72x4dTFC9FipOlvz5Hb3YYxNKTa7YnJCgm.f8GT2xOBu', 'sCB3mbl9eYpTXqFWqRTjuJWGEpaaEfD2xPVOQnOe9YgGsckUFBet2NapIOx7', '2016-05-19 04:45:40', '2016-07-14 09:54:28', 'Data Entry'),
(9, 'sara mostafa', 'saramostafa@brother-group.net', '$2y$10$rswECoDUIdHMY2uhA0IVD.5DuVLaGrljsMcmNVNWiXau4.kKl01M.', 'RRK1lV8lygPxbHdtJ0gQmpT6zeb748LhLpZgHjDQcSS9Xbgfoa3RlteDQLgv', '2016-06-01 09:22:24', '2016-06-01 09:24:52', 'Data Entry');

-- --------------------------------------------------------

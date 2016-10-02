-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 10:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desique`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `mission` varchar(150) CHARACTER SET utf8 NOT NULL,
  `vision` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` int(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `mission`, `vision`, `address`, `tel`, `email`, `updated_at`, `created_at`) VALUES
(1, 'asd', 'asd', 'aa', '33', 0, '2016-09-29 09:11:02', '2016-09-29 09:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `g_album_photos`
--

CREATE TABLE `g_album_photos` (
  `id` int(11) NOT NULL,
  `flag` text CHARACTER SET latin1 NOT NULL,
  `alt` text CHARACTER SET utf8,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `g_album_photos`
--

INSERT INTO `g_album_photos` (`id`, `flag`, `alt`, `created_at`, `updated_at`) VALUES
(0, '1475145960', '1475145949', '2016-09-29 10:46:00', '2016-09-29 08:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `job` text CHARACTER SET utf8 NOT NULL,
  `facebook` text CHARACTER SET utf8 NOT NULL,
  `flag` text CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `job`, `facebook`, `flag`, `created_at`, `updated_at`) VALUES
(2, 'amera', 'amera.elsayed6@gmail.com', 'web developer', '', '1475382180', '2016-10-02 02:23:00', '2016-10-02 02:23:00');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `flag`, `alt`, `date`, `likes`, `comments`, `author`, `updated_at`, `created_at`) VALUES
(4, 'messi', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.', '1475144783', 'aaaaaaa', '1983-03-18', 0, 0, 'alaa', '2016-09-29 08:26:23', '2016-09-20 13:19:31'),
(5, 'now', 'now', '1474386527', 'dddd', '2000-02-17', 0, 0, 'alaa', '2016-09-20 13:48:47', '2016-09-20 13:45:42'),
(7, 'aaa', 'aaa', '1475144804', 'aa', '2017-01-01', 0, 0, 'alaa', '2016-09-29 08:26:44', '2016-09-29 08:26:44');

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
  `price` int(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `flag`, `description`, `price`, `updated_at`, `created_at`) VALUES
(1, 'aaa', 'http://ss', '1475144431', 'aa', 65, '2016-09-29 08:20:31', '2016-09-29 08:20:16');

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
-- Table structure for table `snews`
--

CREATE TABLE `snews` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `additional_info` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `snews`
--

INSERT INTO `snews` (`id`, `title`, `date`, `additional_info`, `created_at`, `updated_at`) VALUES
(1, 'first new', '2001-05-17 03:05:00', 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.', '2016-09-29 09:47:36', '2016-09-29 09:47:36');

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
(3, 'alaa', 'alaa@yahoo.com', '$2y$10$BKmcSsvjypRF/Xjm4LSaL./osSpNt/FbUYLu.Ik1AKC05VO2ldVue', 'FYxvpA4YcQlDwMcOr27OnYAm6nnJ7F5L3aAMZlYE5dysjnP3sMWxz4XbS7Du', '2016-05-11 06:04:22', '2016-10-02 01:42:08', 'Admin'),
(4, 'mohaned', 'm.fouad.developer@gmail.com', '$2y$10$BKmcSsvjypRF/Xjm4LSaL./osSpNt/FbUYLu.Ik1AKC05VO2ldVue', 'AFtDw748GdoVIzrQkQ8pO4p5Zq18qqAUawomI3NdFHqXMp2U777cc7GMbIYi', '2016-05-15 13:23:10', '2016-09-04 08:08:54', 'Data Entry'),
(5, 'amera', 'amera.elsayed6@gmail.com', '$2y$10$5Itr3pLJTdM4SI0GMeB.f.WWIoa2FOh1gPs1HCKRchuDIQdmJd9g.', '4cgjartVEo98RoSrvlqQwLfw9lE13f0N2zdty4CR7WEWsLLJ2dRTyquSEXjJ', '2016-05-16 06:25:55', '2016-05-16 08:57:47', 'Admin'),
(6, 'reham mohamed', 'rehammohamed@brother-group.net', '$2y$10$BR2q0F5Ujf/g4AhHvVP1dOStRzgA1YSuAqWONQCoKQD1dnTErhb.G', 'zlBAVfXZ3xNFXkJtrSRhIyDSyXeO2FOpOaSFhao5gDsjFgGuB8ymifrT6miF', '2016-05-16 08:27:45', '2016-06-02 12:56:25', 'Data Entry'),
(7, 'soaad elattar ', 'SOSO_MOSTAFA2012@HOTMAIL.COM', '$2y$10$5DNUW.mPGbC4jUA9qtd/MOly/hhkSQjz3H4xZ31Uuq7I9PDolPIYO', 'eOqwsPCynpxZZ7bK4wG8QcYO6N08vuMA4wRXvjGKcBhqa6gHLERYYJlR1RU3', '2016-05-17 12:03:04', '2016-05-29 14:48:07', 'Data Entry'),
(8, 'abeer', 'brry111@gmail.com', '$2y$10$IUxRyz/Hq72x4dTFC9FipOlvz5Hb3YYxNKTa7YnJCgm.f8GT2xOBu', 'sCB3mbl9eYpTXqFWqRTjuJWGEpaaEfD2xPVOQnOe9YgGsckUFBet2NapIOx7', '2016-05-19 04:45:40', '2016-07-14 09:54:28', 'Data Entry'),
(9, 'sara mostafa', 'saramostafa@brother-group.net', '$2y$10$rswECoDUIdHMY2uhA0IVD.5DuVLaGrljsMcmNVNWiXau4.kKl01M.', 'RRK1lV8lygPxbHdtJ0gQmpT6zeb748LhLpZgHjDQcSS9Xbgfoa3RlteDQLgv', '2016-06-01 09:22:24', '2016-06-01 09:24:52', 'Data Entry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_album_photos`
--
ALTER TABLE `g_album_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snews`
--
ALTER TABLE `snews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `snews`
--
ALTER TABLE `snews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

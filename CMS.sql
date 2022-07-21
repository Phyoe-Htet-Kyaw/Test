-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2022 at 05:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `images` blob NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `title`, `description`, `images`, `user_id`, `category_id`, `tag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Information Technology', 'Information Technology', 0x4d54524b5f313635373938363439305f617661746172352e706e67, 2, 11, 10, '2022-07-09 09:07:32', '2022-07-16 18:07:12', NULL),
(2, 'Programming', 'Programming', 0x4d54524b5f313635373938363437395f617661746172342e706e67, 3, 12, 9, '2022-07-09 11:07:23', '2022-07-16 18:07:04', NULL),
(3, 'Hello Title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id vero sunt voluptas expedita mollitia accusamus aliquid asperiores? Similique doloribus magnam, iure mollitia quas, tempore magni soluta vitae debitis repellat fuga!', 0x4d54524b5f313635373938373137365f617661746172332e706e67, 5, 14, 8, '2022-07-10 05:07:37', '2022-07-16 18:07:59', NULL),
(4, 'Test Blog', 'testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog testing blog ', 0x4d54524b5f313635373938373333315f617661746172322e706e67, 4, 10, 7, '2022-07-15 17:07:26', '2022-07-16 18:07:11', NULL),
(11, 'Test Photo', 'Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo Test Photo ', 0x4d54524b5f313635383032373235335f6176617461722e706e67, 1, 13, 6, '2022-07-16 15:07:05', '2022-07-17 05:07:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Web Design', '2022-06-25 12:32:21', NULL, NULL),
(10, 'UI/UX', '2022-06-25 12:32:35', NULL, NULL),
(11, 'PHP', '2022-06-25 12:32:50', NULL, NULL),
(12, 'Phyton', '2022-06-25 12:32:58', NULL, NULL),
(13, 'Java Script', '2022-06-25 12:33:07', NULL, NULL),
(14, 'HTML & CSS', '2022-06-28 14:44:50', '2022-07-09 05:42:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Test Tag 1', '2022-06-29 15:19:55', NULL, NULL),
(7, 'Test Tag 2', '2022-06-29 15:20:04', NULL, NULL),
(8, 'Test Tag 3', '2022-06-29 15:20:12', NULL, NULL),
(9, 'Test Tag 4', '2022-06-29 15:20:33', NULL, NULL),
(10, 'Test Tag 5', '2022-06-29 15:26:06', '2022-07-09 06:59:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mg Mg', 'mgmg@gmail.com', 'mgmg12345#', '2022-07-09 05:35:27', NULL, NULL),
(2, 'Kaung Kaung', 'kaungkaung@gmail.com', 'kaungkaung123', '2022-07-09 05:07:11', NULL, NULL),
(3, 'Mg Hla', 'mghla@gmail.com', 'MgHla123#', '2022-07-09 06:07:03', NULL, NULL),
(4, 'Aye Aye', 'ayeaye@gmail.com', 'ayeaye123', '2022-07-15 16:07:50', NULL, NULL),
(5, 'Su Su', 'susu@gmail.com', 'susu123', '2022-07-16 17:07:16', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

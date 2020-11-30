-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 06:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`, `quantity`, `totalprice`, `price`) VALUES
(26, 1, 1, '2020-11-24 23:49:03', '2020-11-24 23:49:10', 2, 400, 200);

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
(1, '2020_11_21_034657_create_users_table', 1),
(2, '2020_11_21_050531_create_products_table', 2),
(3, '2020_11_22_041851_create_cart_table', 3),
(4, '2020_11_22_104616_create_orders_table', 4),
(5, '2020_11_24_125848_add_quantity_to_products', 5),
(6, '2020_11_24_130152_add_quantity_to_products', 6),
(7, '2020_11_24_133529_add_quantity_to_cart', 7),
(8, '2020_11_24_143238_add_totalprice_to_cart', 8),
(9, '2020_11_24_163508_add_price_to_cart', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `description`, `gallery`, `created_at`, `updated_at`) VALUES
(1, 'LG Mobile', '200', 'Mobile', 'A smart phone with 4GB Ram and Much More Features', 'https://www.lg.com/in/images/mobile-phones/md06190476/Purple-pro_Thumb-350.jpg', NULL, NULL),
(2, 'Oppo Mobile', '250', 'Mobile', 'A smart phone with 4GB Ram and Much More Features', 'https://i.gadgets360cdn.com/products/large/1539154374_635_oppo_k1_db.jpg', NULL, NULL),
(3, 'Sony Mobile', '300', 'Mobile', 'A smart phone with 4GB Ram and Much More Features', 'https://cdn1.smartprix.com/rx-iH1H5VM56-w1200-h1200/sony-xperia-pro-5g.jpg', NULL, NULL),
(4, 'Samsung Mobile', '275', 'Mobile', 'A smart phone with 4GB Ram and Much More Features', 'https://n2.sdlcdn.com/imgs/b/e/z/Samsung-Z300-8gb-Yellow-SDL161365839-1-f414f.jpg', NULL, NULL),
(5, 'Mi Mobile', '320', 'Mobile', 'A smart phone with 4GB Ram and Much More Features', 'https://i01.appmifile.com/webfile/globalimg/in/cms/AB364A54-1B83-9A20-B4F3-05BCE9135921.jpg', NULL, NULL),
(6, 'LG Fridge', '250', 'Fridge', 'A smart phone with 4GB Ram and Much More Features', 'https://5.imimg.com/data5/MI/IE/MY-31194682/lg-single-door-refrigerator-188-ltr-500x500.png', NULL, NULL),
(7, 'Sony Tv', '500', 'TV', 'A smart phone with 4GB Ram and Much More Features', 'https://static.toiimg.com/photo/54150442/Sony-BRAVIA-KLV-32W562D-32-inch-LED-Full-HD-TV.jpg', NULL, NULL),
(8, 'Onida Tv', '275', 'Tv', 'A smart phone with 4GB Ram and Much More Features', 'https://5.imimg.com/data5/KY/JX/MY-12560825/onida-led-tv-500x500.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'pranali', 'pranali@gmail.com', '$2y$10$6nLoCY/OXhHr.5.N7kqLue32QLhkN/KaTZtbd0mAJyQq0Ky7UXihS', NULL, NULL),
(2, 'Anamika Kale', 'anamika@gmail.com', '$2y$10$Xk03efs4dJrOqG4XpdKtb.sNHn4lYjbx9w2oBIAzXBcy243pTkfMe', NULL, NULL),
(3, 'Rohan Mehra', 'rohan@gmail.com', '$2y$10$1oR/l86WIOCEAVnii8uoZ.NFAMiHviuminyTMu..LpS1nZev3bepS', NULL, NULL),
(4, 'Ayesha Sharma', 'ayesha@gmail.com', '$2y$10$QIm3iKs41sABt8my5vcEJu7LvZFRiYDLL.2EA87Jr0gbBC1uzgAsu', NULL, NULL),
(5, 'akhil mane', 'akhil@gmail.com', '$2y$10$G/lZNcHyF5Dp/DuU86PmKehojA1Bkjw/M14x.IleAqxdOQciUQ366', '2020-11-22 06:20:19', '2020-11-22 06:20:19'),
(26, 'ABC', 'abc@gmail.com', '$2y$10$nk2KggTZOsFlXvWqZCorOOVQIdEzcnOmUMAiSKYl8/ai5Ozuyx2SC', '2020-11-24 06:14:57', '2020-11-24 06:14:57'),
(27, 'XYZ', 'xyz@gmail.com', '$2y$10$vJinV0X7WyTCUGD.5WQaceJKpTBUyOwS1pUfcz2BnvrCt6OrCn0ji', '2020-11-24 06:25:09', '2020-11-24 06:25:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2019 at 10:42 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_posts`
--

CREATE TABLE IF NOT EXISTS `admin_posts` (
  `id` int(11) NOT NULL,
  `post_name` varchar(280) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` datetime DEFAULT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_posts`
--

INSERT INTO `admin_posts` (`id`, `post_name`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'Super Admin', 1, 1, 1, '2019-09-29 00:00:00', '2019-10-02 08:50:43'),
(2, 'Employee', 1, 1, 1, '2019-10-02 00:00:00', '2019-10-02 03:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'Asus', 1, 1, '2019-09-29', '2019-09-29 05:17:57', 1),
(2, 'Hp', 1, 1, '2019-09-30', NULL, 1),
(3, 'Dell', 1, 1, '2019-09-30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `price_range`
--

CREATE TABLE IF NOT EXISTS `price_range` (
  `id` int(11) NOT NULL,
  `price` varchar(20) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_range`
--

INSERT INTO `price_range` (`id`, `price`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, '5000', 1, 1, '2019-10-01', '2019-10-01 12:48:12', 1),
(2, '10000', 1, 1, '2019-10-01', NULL, 1),
(3, '15000', 1, 1, '2019-10-01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `processor_type`
--

CREATE TABLE IF NOT EXISTS `processor_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processor_type`
--

INSERT INTO `processor_type` (`id`, `name`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, 'Pentium Quad Core', 1, 1, '2019-09-29', NULL, 1),
(2, 'Pentium Gold', 1, 1, '2019-09-30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `canonical_name` varchar(250) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `processor_type` int(11) DEFAULT NULL,
  `screen` decimal(10,2) DEFAULT NULL,
  `touch_screen` int(11) DEFAULT NULL COMMENT '1-yes 0- no',
  `availability` int(11) DEFAULT NULL COMMENT '1-available 0- not available',
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `canonical_name`, `image`, `price`, `brand`, `processor_type`, `screen`, `touch_screen`, `availability`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'Asus Pentium Quad core', 'asus-pentium-quad-core', 'jpeg', '43434.00', 1, 1, '15.55', 0, 1, 1, 1, '2019-09-29', '2019-10-01 18:25:49'),
(2, 'Asus pentium Gold', 'asus-pentium-gold', 'jpeg', '55550.00', 1, 2, '12.50', 1, 1, 1, 1, '2019-09-30', NULL),
(3, 'HP 15s Pentium Quad core', 'hp-15s-pentium-quad-core', 'jpeg', '15000.00', 2, 1, '11.00', 0, 1, 1, 1, '2019-09-30', NULL),
(4, 'HP 15s Pentium Gold', 'hp-15s-pentium-gold', 'jpeg', '20000.00', 2, 2, '25.50', 0, 1, 1, 1, '2019-09-30', '2019-10-01 15:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `screen_size`
--

CREATE TABLE IF NOT EXISTS `screen_size` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `CB` int(11) DEFAULT NULL,
  `UB` int(11) DEFAULT NULL,
  `DOC` date DEFAULT NULL,
  `DOU` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screen_size`
--

INSERT INTO `screen_size` (`id`, `name`, `value`, `CB`, `UB`, `DOC`, `DOU`, `status`) VALUES
(1, '14 inch - 14.9 inch', '14-14.9', 1, 1, '2019-10-01', NULL, 1),
(2, '12 inch - 12.9 inch', '12-12.9', 1, 1, '2019-10-01', NULL, 1),
(3, 'Below 12 inch', '0-12', 1, 1, '2019-10-01', NULL, 1),
(4, 'Above 15 inch', '15-', 1, 1, '2019-10-01', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(280) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(280) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `post_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `name`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'testing', '', '$2y$13$RS.hkV5A0BeKtCGGzql6yO7lZ2MblwFkNxxixzsf3NbuZwFphLhyi', NULL, 'admin@protracked.com', 'Admin', '8547987654', 1, 0, 0),
(2, 2, 'employee1', '', '$2y$13$9Rut8/AhxoEzD9xI59N.M.anGi7q5XmSFd6zizScmWyPY9svX.N9W', NULL, 'employee@protracked.com', 'Employee1', '9876543218', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_posts`
--
ALTER TABLE `admin_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `price_range`
--
ALTER TABLE `price_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processor_type`
--
ALTER TABLE `processor_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand`),
  ADD KEY `processor_type` (`processor_type`);

--
-- Indexes for table `screen_size`
--
ALTER TABLE `screen_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_posts`
--
ALTER TABLE `admin_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `price_range`
--
ALTER TABLE `price_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `processor_type`
--
ALTER TABLE `processor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `screen_size`
--
ALTER TABLE `screen_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `tbl_productbrand` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `tbl_productprocessor` FOREIGN KEY (`processor_type`) REFERENCES `processor_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

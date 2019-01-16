-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 06:12 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanly`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cus_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `address`, `phone`, `email`, `cus_id`, `type`, `deleted`, `created_at`) VALUES
(1, 'nguyen van men', '357 cmt8 f12 quan 10', '81e8c414226304f', 'nguyen@gmail.com', NULL, 1, 0, '2019-01-15 00:00:00'),
(2, 'Hanh Nguyen', '', '09084872456', 'hanh@gmail.com', NULL, 1, 0, '2019-01-15 00:00:00'),
(3, 'fgdfgdf', 'dfgdfgdf', 'dfgdfgd', 'dfgdfgdf@gmail.com', NULL, 1, 0, '2019-01-15 00:00:00'),
(4, 'gfgfg\'\'\'\'\'\'', '\'\'\'\'', '\'\'\'\'', '', NULL, 1, 1, '2019-01-15 00:00:00'),
(5, 'Nguyen thi My dung', '', '595906945069', 'men@gmail.com', NULL, 1, 0, '2019-01-15 00:00:00'),
(6, 'Nguyen Van Teo', '3423423423 sfsdfsdfsd', '234234234234', 'teo@gmail.com', NULL, 1, 1, '2019-01-15 00:00:00'),
(7, 'yghfgh', 'gfhgfhgfhgf', 'fghgfhgf', '', NULL, 1, 0, '2019-01-15 07:59:29'),
(8, 'fdfdf', '', '', '', NULL, 1, 0, '2019-01-15 08:35:52'),
(9, 'Nguyen Teo', '357 cmt8 f12 quan 10', '090394303', 'hep@gmail.com', NULL, 1, 1, '2019-01-15 12:37:07'),
(10, 'gggg', '', '', '', NULL, 1, 0, '2019-01-15 15:33:53'),
(11, 'xxxx', '', '', '', NULL, 1, 0, '2019-01-15 16:28:49'),
(12, 'grtrtr', '', '', '', NULL, 1, 1, '2019-01-15 16:31:14'),
(13, 'ererw', 'werewr', 'wrwer', '', NULL, 1, 0, '2019-01-16 16:58:35'),
(14, 'werew3443', '3242342', '3423423', '', NULL, 1, 0, '2019-01-16 16:58:40'),
(15, '234234', '3454rerter', '5435345', '', NULL, 1, 0, '2019-01-16 16:58:45'),
(16, '34534534', '657657657', '3453467567', '', NULL, 1, 0, '2019-01-16 16:58:50'),
(17, '67rtytry', 'fhfghf', 'tytryrtygfh', '', NULL, 1, 0, '2019-01-16 16:58:56'),
(18, '\'', '', '', '', NULL, 1, 1, '2019-01-16 17:04:07'),
(19, 'mmm', '', '', '', NULL, 1, 0, '2019-01-16 17:04:47'),
(20, 'mmy', '', '', '', NULL, 1, 1, '2019-01-16 17:04:50'),
(21, 'mmmc', '', '', '', NULL, 1, 0, '2019-01-16 17:04:54'),
(22, 'mmme', '', '', '', NULL, 1, 0, '2019-01-16 17:04:58'),
(23, 'mmvvdd', '', '', '', NULL, 1, 0, '2019-01-16 17:05:04'),
(24, 'mutdrdf', '', '', '', NULL, 1, 1, '2019-01-16 17:05:08'),
(25, 'sdsdm', '', '', '', NULL, 1, 0, '2019-01-16 17:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `create_date` date NOT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `discount` decimal(10,0) DEFAULT '0',
  `total` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'thuong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`, `discount`, `status`, `type`) VALUES
(1, 0, NULL, NULL, 1, 'thuong'),
(2, 0, NULL, NULL, 1, 'thuong');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_age`, `user_mobile`) VALUES
(1, 'Ehtesham', 'ehtesham@gmail.com', '123', 23, 334443333),
(2, 'Ehtesham', 'ehtesham@gmail.com', '123', 23, 2147483647),
(3, 'farrukh', 'farrukh@gmail.com', '123', 32, 232342343),
(4, 'zaid', 'zaid@gmail.com', '202cb962ac59075b964b07152d234b70', 23, 324234234),
(5, 'men', 'men@gmail.com', 'f2d136ea22a5b6e0ed0120a03ab795c2', 19, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cus_id` (`cus_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_id`,`service_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

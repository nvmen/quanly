-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2019 at 05:17 PM
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
(1, 'nguyen van men', '357 cmt8 f12 quan 10', '81e8c414226304f', 'nguyen@gmail.com', NULL, 1, 1, '2019-01-15 00:00:00'),
(2, 'Hanh Nguyen', '', '09084872456', 'hanh@gmail.com', NULL, 1, 1, '2019-01-15 00:00:00'),
(3, 'fgdfgdf', 'dfgdfgdf', 'dfgdfgd', 'dfgdfgdf@gmail.com', NULL, 1, 1, '2019-01-15 00:00:00'),
(4, 'gfgfg\'\'\'\'\'\'', '\'\'\'\'', '\'\'\'\'', '', NULL, 1, 1, '2019-01-15 00:00:00'),
(5, 'Nguyen thi My dung', '', '595906945069', 'men@gmail.com', NULL, 1, 1, '2019-01-15 00:00:00'),
(6, 'Nguyen Van Teo', '3423423423 sfsdfsdfsd', '234234234234', 'teo@gmail.com', NULL, 1, 1, '2019-01-15 00:00:00'),
(7, 'Nguyen Thi teo', '357/10 CMT8', '09084895', 'men@gmailcom', NULL, 1, 0, '2019-01-15 07:59:29'),
(8, '', '', '', '', NULL, 1, 1, '2019-01-15 08:35:52'),
(9, 'Nguyen Teo', '357 cmt8 f12 quan 10', '090394303', 'hep@gmail.com', NULL, 1, 0, '2019-01-15 12:37:07'),
(10, 'nguyen van men', 'Cach mang thang 8', '0908489245', 'men.nguyen.sg@gmail.com', NULL, 1, 0, '2019-01-16 07:49:21'),
(11, 'Home ', 'asdasdas', 'dasasda', '', NULL, 1, 0, '2019-01-16 14:24:51'),
(12, 'asdasdas', '23423423', 'q34234234', '', NULL, 1, 0, '2019-01-16 14:24:56'),
(13, 'erfdsfdss', 'sdfdsfdsfsd', 'dsfdsf', '', NULL, 1, 1, '2019-01-16 14:25:00'),
(14, 'Ngoc', 'Quan 19', '756756576756', '', NULL, 1, 0, '2019-01-16 14:42:45'),
(15, 'Hanh', 'erterter', '405930595435', '', NULL, 1, 0, '2019-01-16 14:42:54'),
(16, 'Chua Biet', '654654654', '53534534', '', NULL, 1, 0, '2019-01-16 14:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `cus_id`, `create_date`, `total`, `user_id`, `fullname`, `phone`, `email`, `address`, `deleted`, `invoice_id`) VALUES
(1, NULL, '2019-01-18 07:49:42', '550000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', '0', 0, NULL),
(2, NULL, '2019-01-19 07:50:49', '550000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', 'Cach mang thang 8', 1, NULL),
(3, NULL, '2019-01-19 07:57:13', '550000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', 'Cach mang thang 8', 0, NULL),
(4, NULL, '2019-01-19 08:09:32', '550000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', 'Cach mang thang 8', 0, NULL),
(5, NULL, '2019-01-19 08:13:19', '350000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', 'Cach mang thang 8', 0, NULL),
(6, NULL, '2019-01-19 08:13:56', '550000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', 'Cach mang thang 8', 0, NULL),
(7, NULL, '2019-01-19 08:15:17', '1700000', NULL, 'nguyen van men', '0908489245', 'men.nguyen.sg@gmail.com', 'Cach mang thang 8', 0, NULL),
(8, NULL, '2019-01-19 13:21:47', '650000', NULL, 'Nguyen Thi teo', '09084895', 'men@gmailcom', '357/10 CMT8', 0, NULL),
(9, NULL, '2019-01-19 16:06:25', '3900000', NULL, 'Nguyen Thi teo', '09084895', 'men@gmailcom', '357/10 CMT8', 1, NULL);

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
  `total` decimal(10,0) NOT NULL DEFAULT '0',
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`invoice_id`, `service_id`, `price`, `qty`, `discount`, `total`, `service`) VALUES
(6, 2, '250000', 1, '0', '250000', 'Tam trang toan than'),
(6, 4, '300000', 1, '0', '300000', 'Massage toan tan'),
(7, 4, '300000', 5, '0', '1500000', 'Massage toan tan'),
(7, 5, '100000', 2, '0', '200000', 'tamsucuocsong.vn'),
(8, 2, '250000', 1, '0', '250000', 'Tam trang toan than'),
(8, 4, '300000', 1, '0', '300000', 'Massage toan tan'),
(8, 5, '100000', 1, '0', '100000', 'tamsucuocsong.vn'),
(9, 2, '250000', 10, '0', '2500000', 'Tam trang toan than'),
(9, 4, '300000', 4, '0', '1200000', 'Massage toan tan'),
(9, 5, '100000', 2, '0', '200000', 'tamsucuocsong.vn');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`, `discount`, `status`, `type`, `deleted`) VALUES
(1, '0', '120000', NULL, 1, 'thuong', 1),
(2, 'Tam trang toan than', '250000', NULL, 1, 'thuong', 0),
(3, 'Giam gia 500k', '500000', NULL, 1, 'khuyenmai', 0),
(4, 'Massage toan tan', '300000', NULL, 1, 'thuong', 0),
(5, 'tamsucuocsong.vn', '100000', NULL, 1, 'thuong', 0),
(6, 'Khuyến mãi 200k', '200000', NULL, 1, 'khuyenmai', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

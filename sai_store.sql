-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 12:37 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sai_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsang'),
(3, 'Apple'),
(4, 'shoe'),
(5, 'other brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES
(15, 5, '0', 1, 'men wear xyz', 'a2.png', 1, 2000, 2000),
(16, 1, '0', 0, 'samsang xyz', 'ph1.png', 1, 50000, 50000),
(17, 2, '0', 0, 'samsang pqr', 'ph2.png', 1, 25000, 25000),
(18, 3, '0', 0, 'apple xyz', 'ph3.png', 1, 48000, 48000),
(19, 4, '0', 0, 'apple pqr', 'ph4.png', 1, 52000, 52000),
(20, 5, '0', 0, 'men wear xyz', 'a2.png', 1, 2000, 2000),
(21, 6, '0', 0, 'men wear pqr', 'a8.png', 1, 3000, 3000),
(22, 1, '0', 1, 'samsang xyz', 'ph1.png', 1, 50000, 50000),
(23, 6, '0', 1, 'men wear pqr', 'a8.png', 1, 3000, 3000),
(28, 6, '0', 8, 'men wear pqr', 'a8.png', 1, 3000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wear'),
(3, 'Mens Wear'),
(4, 'sports Common\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `trx_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 2, 'samsang xyz', 50000, 'samsang xyz kajdgjkakj', 'ph1.png', 'samsang xyz'),
(2, 1, 2, 'samsang pqr', 25000, 'samsang pqr akschaskch', 'ph2.png', 'samsang pqr'),
(3, 1, 3, 'apple xyz', 48000, 'apple iphone mnbcjzbcj', 'ph3.png', 'iphone xyz'),
(4, 1, 3, 'apple pqr', 52000, 'apple iphone pqr kjbsskjsafh', 'ph4.png', 'iphone pqr'),
(5, 3, 5, 'men wear xyz', 2000, 'men wear jhdjsagjhga', 'a2.png', 'men wear'),
(6, 3, 5, 'men wear pqr', 3000, 'men wear2 kjhsdkjhsd', 'a8.png', 'men wear2'),
(7, 2, 5, 'women wear xyz', 2500, 'women wear xyz cnaskncka', 'a1.png', 'w wear xyz'),
(8, 2, 5, 'women wear pqr', 3500, 'w wear pqr kcncnask', 'a3.png', 'w wear pqr'),
(9, 4, 4, 'shoe 1', 5000, 'shoe1 sakjsakj', 'grid3.jpg', 'shoe1 '),
(10, 4, 4, 'shoe2', 3200, 'shoe2 ksfkjas', 'grid4.jpg', 'shoe2');

-- --------------------------------------------------------

--
-- Table structure for table `received_payment`
--

CREATE TABLE `received_payment` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `trx_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `fisrt_name` varchar(300) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `fisrt_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'dishi', 'rajani', 'disha@gmail.com', '8286', '899559100', 'asdfghjklqwe', 'qwertyuiop'),
(3, 'Rahul', 'Lalchandani', '7864.lalchandani@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '0987654321', 'qwertyuiop', 'asdfghjkl'),
(6, 'Abc', 'Abcabc', 'abc@gmail.com', '1234567890', '0987654321', 'asdfghjkl', 'qwertyuiop'),
(7, 'Rahul', 'Lalchandani', 'rahul@gmail.com', '1234567890', '8794561230', 'asdfghjkl', 'qwertyuiop'),
(8, 'Jyoti', 'Tejwani', 'jyoti@gmail.com', '1234567890', '7894652130', 'qwertyuiop', 'poiuytrewq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

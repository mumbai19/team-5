-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 07:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trishul`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Bag'),
(2, 'Jewellery'),
(3, 'Keychain'),
(4, 'Paperweights'),
(5, 'Candle');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `trx_id` varchar(300) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation_category`
--

CREATE TABLE `donation_category` (
  `don_cat_id` int(11) NOT NULL,
  `don_cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_category`
--

INSERT INTO `donation_category` (`don_cat_id`, `don_cat_name`) VALUES
(1, 'Woman Empowerment'),
(2, 'Disaster Management'),
(3, 'Child Education'),
(4, 'Environment Conservation'),
(5, 'Health and Nutrition');

-- --------------------------------------------------------

--
-- Table structure for table `funds_raised`
--

CREATE TABLE `funds_raised` (
  `donation_id` int(11) NOT NULL,
  `don_amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `don_cat_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat_id` int(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `Stock` int(4) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat_id`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `Stock`, `visible`) VALUES
(1, 1, 'Handmade Warli Bag(Black)', 100, 'Hand Made Bag by the women of rural India', 'b1.jpg', 'handmade', 10, 0),
(2, 2, 'Handmade Jewellery', 300, 'One in a kind jewellery made from beads and stones hand picked by the woman of rural India', 'j1.jpg', 'handmade', 5, 0),
(3, 1, 'Handmade Warli Bag(White)', 175, 'b2.jpg', 'Description_3', 'handmade bag', 11, 0),
(4, 1, 'Handmade Flower Bag(White)', 250, 'b3.jpg', 'Description_4', 'handmade bag', 12, 0),
(5, 3, 'Hand Picked Beads(Red)', 150, 'k1.jpg', 'Description_5', 'handmade keychain', 5, 0),
(6, 2, 'Handmade Necklace(red)', 300, 'j2.jpg', 'Description_6', 'handmade jewellery', 18, 0),
(7, 5, 'Royal Falooda', 125, 'c1.jpg', 'Description_7', 'falooda candle', 11, 0),
(8, 2, 'Earing(Blue)', 175, 'j3.jpg', 'Description_8', 'earing blue', 7, 0),
(9, 3, 'Multicolor Beads', 150, 'k2.jpg', 'Description_9', 'multicolor', 11, 0),
(10, 4, 'Beautiful Flower', 75, 'p1.jpg', 'Description_10', 'flower', 7, 0),
(11, 2, 'Earing(Red)', 250, 'j4.jpg', 'Description_11', 'earing red', 5, 0),
(12, 5, 'Rainbow Jar', 150, 'c2.jpg', 'Description_12', 'rainbow candle', 17, 0),
(13, 1, 'Handmade Peacock Bag(Ochre)', 200, 'b4.jpg', 'Description_13', 'handmade bag', 14, 0),
(14, 1, 'Handmade Warli Bag(Ochre)', 225, 'b5.jpg', 'Description_14', 'handmade bag', 12, 0),
(15, 4, 'Warli', 75, 'p2.jpg', 'Description_15', 'warli', 14, 0);

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

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
  `address2` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postal_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `fisrt_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `role_id`, `city`, `state`, `postal_code`) VALUES
(1, 'Shlok', 'Surname', 'shlok@gmail.com', 'pass_11', '9819519327', 'Flat No, Building Name', 'Street Name,Suburb', 1, 'Mumbai', 'Maharashtra', 400054),
(2, 'Athul', 'Surname', 'athul@gmail.com', 'pass_11', '9819519328', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Delhi', 'Delhi', 110017),
(3, 'Devang', 'Surname', 'devang@gmail.com', 'pass_11', '9819519329', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Bangalore', 'Karnataka', 560104),
(4, 'Disha', 'Surname', 'disha@gmail.com', 'pass_11', '9819519330', 'Flat No, Building Name', 'Street Name,Suburb', 1, 'Hyderabad', 'Telangana', 500030),
(5, 'Dheeraj', 'Surname', 'dheeraj@gmail.com', 'pass_11', '9819519331', 'Flat No, Building Name', 'Street Name,Suburb', 1, 'Ahmedabad', 'Gujarat', 382434),
(6, 'Gunjan', 'Surname', 'gunjan@gmail.com', 'pass_11', '9819519332', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Chennai', 'Tamil Nadu', 600044),
(7, 'Yogesh', 'Surname', 'yogesh@gmail.com', 'pass_11', '9819519333', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Kolkata', 'West Bengal', 700129),
(8, 'Devansh', 'Surname', 'devansh@gmail.com', 'pass_11', '9819519334', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Mumbai', 'Maharashtra', 400040),
(9, 'Siddhi', 'Surname', 'siddhi@gmail.com', 'pass_11', '9819519335', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Mumbai', 'Maharashtra', 400065),
(10, 'Akhil', 'Surname', 'akhil@gmail.com', 'pass_11', '9819519336', 'Flat No, Building Name', 'Street Name,Suburb', 2, 'Pune', 'Maharashtra', 411053);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD KEY `cart_ibfk_2` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `donation_category`
--
ALTER TABLE `donation_category`
  ADD PRIMARY KEY (`don_cat_id`);

--
-- Indexes for table `funds_raised`
--
ALTER TABLE `funds_raised`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `don_cat_id_fk` (`don_cat_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`product_cat_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_category`
--
ALTER TABLE `donation_category`
  MODIFY `don_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `funds_raised`
--
ALTER TABLE `funds_raised`
  ADD CONSTRAINT `don_cat_id_fk` FOREIGN KEY (`don_cat_id`) REFERENCES `donation_category` (`don_cat_id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `customer_order` (`id`),
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

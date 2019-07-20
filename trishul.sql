-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 10:20 PM
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
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation_categories`
--

CREATE TABLE `donation_categories` (
  `don_cat_id` int(11) NOT NULL,
  `don_cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_categories`
--

INSERT INTO `donation_categories` (`don_cat_id`, `don_cat_name`) VALUES
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

--
-- Dumping data for table `funds_raised`
--

INSERT INTO `funds_raised` (`donation_id`, `don_amount`, `date`, `don_cat_id`, `user_id`, `status`) VALUES
(1, 10000, '2019-03-03 18:30:00', 5, 8, 'SUCCESS'),
(2, 15000, '2019-04-22 18:30:00', 1, 7, 'SUCCESS'),
(3, 7500, '2019-04-17 18:30:00', 4, 4, 'SUCCESS'),
(4, 500, '2019-05-30 18:30:00', 1, 3, 'SUCCESS'),
(5, 350, '2019-06-27 18:30:00', 4, 7, 'SUCCESS'),
(6, 20000, '2019-01-02 18:30:00', 1, 7, 'SUCCESS'),
(7, 200, '2019-07-10 18:30:00', 1, 8, 'SUCCESS'),
(8, 500, '2019-05-26 18:30:00', 3, 8, 'SUCCESS'),
(9, 100, '2019-04-15 18:30:00', 1, 9, 'SUCCESS'),
(10, 1000, '2019-06-17 18:30:00', 1, 4, 'SUCCESS'),
(11, 2000, '2019-05-05 18:30:00', 2, 5, 'SUCCESS'),
(12, 10000, '2019-05-11 18:30:00', 3, 1, 'SUCCESS'),
(13, 6000, '2019-07-20 18:30:00', 1, 2, 'SUCCESS'),
(14, 4000, '2019-03-11 18:30:00', 2, 9, 'SUCCESS'),
(15, 4500, '2019-03-03 18:30:00', 3, 6, 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `payment_id`, `order_date`, `delivery_date`, `total_amount`) VALUES
(1, 3, 1, '2019-01-08', '2019-01-14', NULL),
(2, 4, 5, '2019-04-10', '2019-04-20', NULL),
(3, 10, 2, '2019-02-26', '2019-03-07', NULL),
(4, 9, 3, '2019-04-12', '2019-04-18', NULL),
(5, 9, 5, '2019-06-25', '2019-06-30', NULL),
(6, 5, 2, '2019-03-16', '2019-03-22', NULL),
(7, 9, 2, '2019-01-03', '2019-01-10', NULL),
(8, 6, 3, '2019-01-27', '2019-02-06', NULL),
(9, 6, 2, '2019-02-05', '2019-02-08', NULL),
(10, 5, 2, '2019-02-05', '2019-02-14', NULL),
(11, 2, 1, '2019-04-15', '2019-04-22', NULL),
(12, 8, 1, '2019-05-20', '2019-05-29', NULL),
(13, 2, 1, '2019-05-21', '2019-05-27', NULL),
(14, 5, 4, '2019-06-20', '2019-06-28', NULL),
(15, 1, 5, '2019-03-17', '2019-03-21', NULL),
(16, 8, 1, '2019-02-01', '2019-02-07', NULL),
(17, 9, 2, '2019-06-21', '2019-06-27', NULL),
(18, 3, 5, '2019-01-18', '2019-01-28', NULL),
(19, 7, 2, '2019-01-14', '2019-01-20', NULL),
(20, 5, 4, '2019-01-11', '2019-01-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `product_quantity`) VALUES
(1, 4, 3),
(1, 12, 4),
(1, 13, 5),
(2, 6, 3),
(2, 10, 5),
(2, 11, 3),
(2, 12, 2),
(3, 7, 2),
(5, 11, 1),
(5, 13, 4),
(6, 10, 4),
(6, 15, 1),
(7, 7, 4),
(7, 10, 2),
(8, 6, 3),
(10, 6, 1),
(10, 13, 3),
(11, 2, 2),
(11, 12, 5),
(11, 15, 5),
(13, 5, 1),
(13, 11, 4),
(14, 2, 4),
(14, 7, 5),
(14, 14, 3),
(15, 6, 4),
(15, 8, 2),
(15, 12, 1),
(17, 1, 2),
(17, 4, 4),
(17, 8, 4),
(17, 14, 4),
(18, 14, 2),
(19, 1, 2),
(19, 3, 5),
(19, 4, 4),
(19, 14, 4),
(20, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(100) NOT NULL,
  `payment_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_mode`) VALUES
(1, 'CoD'),
(2, 'Debit Card'),
(3, 'Credit Card'),
(4, 'Netbanking'),
(5, 'UPI');

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
(3, 1, 'Handmade Warli Bag(White)', 175, 'Description_3', 'b2.jpg', 'handmade bag', 11, 0),
(4, 1, 'Handmade Flower Bag(White)', 250, 'Description_4', 'b3.jpg', 'handmade bag', 12, 0),
(5, 3, 'Hand Picked Beads(Red)', 150, 'Description_5', 'k1.jpg', 'handmade keychain', 5, 0),
(6, 2, 'Handmade Necklace(red)', 300, 'Description_6', 'j2.jpg', 'handmade jewellery', 18, 0),
(7, 5, 'Royal Falooda', 125, 'Description_7', 'c1.jpg', 'falooda candle', 11, 0),
(8, 2, 'Earing(Blue)', 175, 'Description_8', 'j3.jpg', 'earing blue', 7, 0),
(9, 3, 'Multicolor Beads', 150, 'Description_9', 'k2.jpg', 'multicolor', 11, 0),
(10, 4, 'Beautiful Flower', 75, 'Description_10', 'p1.jpg', 'flower', 7, 0),
(11, 2, 'Earing(Red)', 250, 'Description_11', 'j4.jpg', 'earing red', 5, 0),
(12, 5, 'Rainbow Jar', 150, 'Description_12', 'c2.jpg', 'rainbow candle', 17, 0),
(13, 1, 'Handmade Peacock Bag(Ochre)', 200, 'Description_13', 'b4.jpg', 'handmade bag', 14, 0),
(14, 1, 'Handmade Warli Bag(Ochre)', 225, 'Description_14', 'b5.jpg', 'handmade bag', 12, 0),
(15, 4, 'Warli', 75, 'Description_15', 'p2.jpg', 'warli', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prod_categories`
--

CREATE TABLE `prod_categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_categories`
--

INSERT INTO `prod_categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bag'),
(2, 'Jewellery'),
(3, 'Keychain'),
(4, 'Paperweights'),
(5, 'Candle');

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
-- Indexes for table `donation_categories`
--
ALTER TABLE `donation_categories`
  ADD PRIMARY KEY (`don_cat_id`);

--
-- Indexes for table `funds_raised`
--
ALTER TABLE `funds_raised`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `don_cat_id_fk` (`don_cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_order_fk_1` (`cust_id`),
  ADD KEY `customer_order_fk_2` (`payment_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`product_cat_id`);

--
-- Indexes for table `prod_categories`
--
ALTER TABLE `prod_categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- AUTO_INCREMENT for table `donation_categories`
--
ALTER TABLE `donation_categories`
  MODIFY `don_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prod_categories`
--
ALTER TABLE `prod_categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `funds_raised`
--
ALTER TABLE `funds_raised`
  ADD CONSTRAINT `don_cat_id_fk` FOREIGN KEY (`don_cat_id`) REFERENCES `donation_categories` (`don_cat_id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_order_fk_1` FOREIGN KEY (`cust_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `customer_order_fk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `prod_categories` (`cat_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 06:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_group10`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Beauty Products'),
(2, 'Tops'),
(3, 'Dress'),
(4, 'Bottoms'),
(5, 'Footwear'),
(6, 'Accessories');

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
  `tr_id` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `uid`, `pid`, `p_name`, `p_price`, `p_qty`, `p_status`, `tr_id`, `order_date`) VALUES
(92, 7, 1, 'Polo Girl', 650, 1, 'CONFIRMED', '2093399339', '2024-11-25 18:57:05'),
(93, 7, 1, 'Polo Girl', 3250, 5, 'CONFIRMED', '1283269248', '2024-11-25 19:26:03'),
(94, 7, 1, 'Polo Girl', 650, 1, 'CONFIRMED', '151552441', '2024-11-25 19:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, '2', 'Polo Girl', 650, 'Polo Tops\n\nSize : up to 2xl 30-40bust', '1.JPG', 'Tops polo babae'),
(2, '2', 'Mickey Stripes', 450, 'Shirt Tops : up to 2xl 30-40bust', '2.JPG', 'Tops Mickey Stripes'),
(3, '2', 'Charm Colorful', 580, 'Fitted Tops up to 2xl 30-40bust', '3.jpg', 'Tops Charm Colorful'),
(4, '2', 'Charm MyMelody ', 680, 'Cartoon Topsup to 2xl 30-40bust', '4.JPG', 'Tops Charm MyMelody '),
(5, '2', 'Labubu Solo', 650, 'Labubu Tops up to 2xl 30-40bust', '5.JPG', 'Tops Labubu Solo'),
(6, '2', 'Labubu Family', 650, 'Labubu Fam Topsup to 2xl 30-40bust', '6.JPG', 'Tops Labubu Family'),
(7, '4', 'Polo Pants Black', 580, 'Polo Pants\nSize:\n28-40 waist line', 'A.JPG', 'Bottoms Polo \nPants Black'),
(8, '4', 'Comfy Pants Ivory', 580, 'PantsSize:\n28-40 waist line', 'B.JPG', 'Bottoms Comfy Pants Ivory'),
(9, '4', 'Prada Pants Choco Brown', 580, 'Prada Pants Size:\n28-40 waist line', 'C.JPG', 'Bottoms Prada Pants Choco Brown'),
(10, '4', 'Prada Pants Peanut', 580, 'Prada Pants Size:\n28-40waist line', 'D.JPG', 'Bottoms Prada Pants Peanut'),
(11, '4', 'Polo Pants White', 580, 'Polo Pants Size:\n28-40waist line', 'E.JPG', 'Bottoms Polo Pants White'),
(12, '4', 'Loewe Pants Brown', 580, 'Loewe Pants Size:\n28-40waist line', 'F.JPG', 'Bottoms Loewe Pants Brown'),
(13, '6', 'Pimmy Wallet Green', 950, 'Long Wallet', '7.jpg', 'Accessories Pimmy Wallet Green'),
(14, '6', 'Pimmy Wallet White', 950, 'Long Wallet', '8.jpg', 'Accessories Pimmy Wallet White'),
(15, '6', 'Pimmy Wallet Pink', 950, 'Long Wallet', '9.jpg', 'Accessories Pimmy Wallet Pink'),
(16, '6', 'Necklace Pearl', 850, 'Pearl', '10.jpg', 'Accessories Necklace Pearl'),
(17, '6', 'Nine West Box Type Watch', 1200, 'Quartz Watch', '11.jpg', 'Accessories Nine West Box Type Watch'),
(18, '6', 'Nine West Watch', 950, 'Quartz Watch', '12.jpg', 'Accessories Nine West Watch'),
(19, '1', 'Cathy Doll Water Tint', 350, 'Water Tint', 'G.jpg', 'Beauty Products Cathy Doll Water Tint'),
(20, '1', 'Walnuts 50 SPF Body Sunscreen', 450, 'Body Screen', 'H.jpg', 'Beauty Products Walnuts 50 SPF Body Sunscreen'),
(21, '1', 'SE7EN Sleep Balm', 250, 'Sleep Balm', 'I.jpg', 'Beauty Products SE7EN Sleep Balm'),
(22, '1', 'Precious Eye Roller Serum', 380, 'Eye Roller', 'J.jpg', 'Beauty Products Precious Eye Roller Serum'),
(23, '1', 'The Elf Advanced Whitening', 580, 'Whitening', 'K.jpg', 'Beauty Products The Elf Advanced Whitening'),
(24, '3', 'Knitted Stripes Dress Black', 850, 'Knitted Dress Size : med to 2xl up to 44bust', '13.jpg', 'Dress Knitted Stripes Dress Black'),
(25, '3', 'Knitted Stripes Dress White', 850, 'Knitted Dress Size : med to 2xl up to 44bust', '14.jpg', 'Dress Knitted Stripes Dress White'),
(26, '3', 'Floral Aqua Dress', 650, 'Floral Dress Size : med to 2xl up to 44bust', '15.jpg', 'Dress Floral Aqua Dress'),
(27, '3', 'Knitted Black 4 Pockets', 750, 'Pocket Dress Size : med to 2xl up to 44bust', '16.jpg', 'Dress Knitted Black 4 Pockets'),
(28, '3', 'Floral Blue Long Dress', 850, 'Floral Long Dress Size : med to 2xl up to 44bust', '17.jpg', 'Dress Floral Blue Long Dress'),
(29, '3', 'Plain Navy Blue Dress', 680, 'Plain Dress Size : med to 2xl up to 44bust', '18.jpg', 'Dress Plain Navy Blue Dress'),
(30, '5', 'Monobo Glitter Beige', 950, 'Strapped Footwear\n\nSize 7 : 24.5 inches ', 'L.jpg', 'Footwear Monobo Glitter Beige'),
(31, '5', 'Lacoste White Shoes', 5800, 'Lacoste Shoes Size : med to 2xl up to 44bust', 'M.jpg', 'Footwear Lacoste White Shoes'),
(32, '5', 'Lacoste Tricolor Shoes', 5800, 'Lacoste Shoes Size : med to 2xl up to 44bust', 'N.jpg', 'Footwear Lacoste Tricolor Shoes'),
(33, '5', 'Lacoste Blue Shoes', 5800, 'Lacoste Shoes Size : med to 2xl up to 44bust', 'O.jpg', 'Footwear Lacoste Blue Shoes'),
(34, '5', 'Lacoste Green Slides', 3500, 'Lacoste Slides Size : med to 2xl up to 44bust', 'P.jpg', 'Footwear Lacoste Green Slides'),
(35, '5', 'Moniga Brown ', 950, 'Stapped Footwear Size : med to 2xl up to 44bust', 'Q.jpg', 'Footwear Moniga Brown ');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(7, 'Alyssa Andrea', 'Ramos', '123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9384325383', 'Blk-44 Lot-26 Quercus St. Putatan', NULL),
(8, 'Alyssa Andrea', 'Ramos', 'meme@gmail.com', '9c2f924fb2f7004e7979ab2027ca1d65', '9384325383', 'Blk-44 Lot-26 Quercus St. Putatan', 'Blk-48 Lot-26 Quercus St. Putatan');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2122;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

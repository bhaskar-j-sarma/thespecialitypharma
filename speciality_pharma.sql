-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 07:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speciality_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `approvel` varchar(10) DEFAULT '1',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `url`, `description`, `image`, `status`, `approvel`, `created`, `updated`) VALUES
(141, 'Pharmaceutical Capsules', 'pharmaceutical-capsules', '<p>Pharmaceutical Capsules</p>\r\n', 'BlogImage160312318120201019.jpg', 1, '1', '2020-10-19 21:29:41', '2020-10-19 21:35:46'),
(142, 'Pharmaceutical Injections', 'pharmaceutical-injections', '<p>Pharmaceutical Injections</p>\r\n', 'BlogImage160312325320201019.jpg', 1, '1', '2020-10-19 21:30:53', '2020-10-19 21:35:37'),
(143, 'Dexamethasone Tablets', 'dexamethasone-tablets', '<p>Dexamethasone Tablets</p>\r\n', 'BlogImage160312327420201019.jpg', 1, '1', '2020-10-19 21:31:14', '2020-10-19 21:35:26'),
(145, 'New Items', 'new-items', '<p>New Items</p>\n', 'BlogImage160320964520201020.jpg', 1, '1', '2020-10-20 21:30:45', '2020-10-20 21:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `product` text NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email_id`, `phone_number`, `product`, `address`, `created`) VALUES
(6, 'mobisoft@gmail.com', '7002628206', 'Disprin', 'Tihur Chowk', '2020-10-20 16:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `packaging_type` varchar(50) NOT NULL,
  `application` varchar(50) NOT NULL,
  `packaging_size` varchar(50) NOT NULL,
  `dosage_form` varchar(50) NOT NULL,
  `form_of_medicine` varchar(50) NOT NULL,
  `approvel` varchar(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tbumb_image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `url`, `category_name`, `brand_name`, `price`, `packaging_type`, `application`, `packaging_size`, `dosage_form`, `form_of_medicine`, `approvel`, `status`, `created_at`, `tbumb_image`, `updated_at`, `description`) VALUES
(19, 'Disprin', 'disprin/', '143', 'Cipla', '55', 'Strips', 'Headache', '10 tablets per strip', 'Oral', 'Tablet', '', 1, '2020-10-19 16:08:21', 'BlogImage160312370120201019.jpg', '2020-10-20 15:55:00', '<p>Used in headache</p>\n'),
(20, 'Best Injection', 'best-injection/', '142', 'Mankind', '660', 'Pouch', 'External', '1Injection per pouch', 'External', 'Injection', '', 1, '2020-10-20 15:50:12', 'BlogImage160320901220201020.jpg', '2020-10-20 15:50:12', '<p>Mankind Injection</p>\n'),
(21, 'Best Capsule', 'best-capsule/', '141', 'Cipla', '78', 'Strips', 'Headache', '10 tablets per strip', 'Oral', 'Capsule', '', 1, '2020-10-20 16:10:47', 'BlogImage160321024720201020.jpg', '2020-10-20 16:10:47', '<p>Cipla Capsules</p>\n'),
(22, 'This Injection', 'this-injection/', '142', 'Lorem', '78', 'Pouch', 'Acidity', '1Injection per pouch', 'External', 'Injection', '', 1, '2020-10-20 16:12:29', 'BlogImage160321034920201020.jpg', '2020-10-20 16:12:29', '<p>Lorem Injection</p>\n'),
(23, 'Best Tablet', 'best-tablet/', '143', 'Lorem', '52', 'Strips', 'Headache', '10 tablets per strip', 'Oral', 'Tablet', '', 1, '2020-10-20 16:13:29', 'BlogImage160321040920201020.jpg', '2020-10-20 16:13:29', '<p>Lorem Tablet</p>\n'),
(24, 'Lorem Ipsum', 'lorem-ipsum/', '141', 'Lorem', '100', 'Strips', 'Ipsum', '10 tablets per strip', 'Oral', 'Tablet', '', 1, '2020-10-20 16:14:27', 'BlogImage160321046720201020.jpg', '2020-10-20 16:26:20', '<p>Lorem Ipsum</p>\n'),
(25, 'Lorem Ipsum', 'lorem-ipsum/', '145', 'Lorem', '200 ', 'Strips', 'Acidity', '20 per strip', 'Oral', 'Tablets', '', 1, '2020-10-20 16:23:22', 'BlogImage160321040920201020.jpg', '2020-10-20 16:24:23', 'Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `number` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created` varchar(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `name`, `email`, `number`, `message`, `created`) VALUES
(6, 'Bhaskar Jyoti Sarma', 'bhaskars464@gmail.com', '7002628206', 'aaaaaaaaaaaaaaaaaaaa', '2020-10-11 '),
(7, 'Bhaskar Jyoti Sarma', 'bhaskars464@gmail.com', '7002628206', 'sssssssssssssssssssssdddddddddddddddddddd', '2020-10-11 '),
(8, 'Bhaskar Jyoti Sarma', 'bhaskars464@gmail.com', '7002628206', 'sssssssssssssssssssssdddddddddddddddddddd', '2020-10-11 '),
(9, 'Bhaskar Jyoti Sarma', 'bhaskars464@gmail.com', '7002628206', 'sssssssssssssssssssssdddddddddddddddddddd', '2020-10-11 ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `status`) VALUES
(1, 'admin', '123', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 06:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `courier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`courier_id`, `name`, `email`, `phone`, `address`, `vehicle_type`, `status`) VALUES
(3, 'john', 'charles@gmail.com', '0724367897', 'karen', 'Bicycle', 'Inactive'),
(4, 'john', 'john@gmail.com', '0724367897', 'kikuyu', 'Truck', 'Active'),
(5, 'george', 'gregmoses657@gmail.com', '0724367897', 'Adams', 'Motorcycle', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `courier_details`
--

CREATE TABLE `courier_details` (
  `id` int(6) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(12) NOT NULL,
  `County` text NOT NULL,
  `Vehicle_type` text NOT NULL,
  `Vehicle_colour` text NOT NULL,
  `Number_plate` varchar(7) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier_details`
--

INSERT INTO `courier_details` (`id`, `Name`, `Email`, `Phone`, `County`, `Vehicle_type`, `Vehicle_colour`, `Number_plate`, `Status`) VALUES
(1, 'charles', 'charlesdete47@gmail.com', 712121212, 'Nairobi', 'car', 'red', 'KCP 171', 'active'),
(3, 'philip', 'philip@gmail.com', 712121212, 'Nairobi', 'van', 'blue', 'KCP 171', 'inactive'),
(4, 'naomi', 'naomi@gmail.com', 712121212, 'Nairobi', 'van', 'blue', 'KCP 171', 'active'),
(5, 'john', 'john@example.com', 712121212, 'Nairobi', 'truck', 'white', 'KCP 171', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `package_status` text NOT NULL,
  `delivery_status` enum('Pending','In Transit','Delivered') DEFAULT 'Pending',
  `delivery_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tracking_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `courier_id`, `customer_name`, `customer_address`, `package_status`, `delivery_status`, `delivery_date`, `tracking_id`) VALUES
(36, 4, 'naomi', 'langatta', '', 'Delivered', '2024-05-12 23:00:11', 'YJ70NRNPXJ'),
(37, 4, 'adeh', 'uthiru', '', 'Delivered', '2024-05-20 18:52:58', '0OADLBBTJ7'),
(38, 4, 'naomi', 'kaaren', '', 'In Transit', '2024-05-27 09:27:39', 'BY99KV27GY');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `recipient_name` varchar(100) NOT NULL,
  `recipient_address` varchar(255) NOT NULL,
  `package_weight` decimal(10,2) NOT NULL,
  `package_category` text NOT NULL,
  `price` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pickup_date` date NOT NULL,
  `tracking_id` varchar(20) DEFAULT NULL,
  `assigned_courier` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `sender_name`, `sender_address`, `recipient_name`, `recipient_address`, `package_weight`, `package_category`, `price`, `order_date`, `pickup_date`, `tracking_id`, `assigned_courier`, `user_id`) VALUES
(1, 'charles', 'karen', 'naomi', 'langatta', 2.90, '', 0, '2024-05-10 20:53:23', '0000-00-00', 'YJ70NRNPXJ', '', NULL),
(4, 'adeh', 'uthiru', 'charles', 'ngong', 40.00, '', 0, '2024-05-20 18:50:43', '0000-00-00', '0OADLBBTJ7', '', NULL),
(5, 'charles', 'ngong', 'bro', 'karen', 49.00, '', 0, '2024-05-23 18:11:25', '0000-00-00', 'D8HG9QULM1', 'Motorbike', NULL),
(6, 'charles', 'ngong', 'bro', 'karen', 49.00, '', 0, '2024-05-23 18:23:38', '0000-00-00', 'AIYP2RKYSL', 'Motorbike', NULL),
(7, 'john', 'juja', 'adeh', 'jamu', 50.00, '', 0, '2024-05-23 18:34:42', '0000-00-00', '5D8074IIEQ', 'Motorbike', NULL),
(12, 'bro', 'juja', 'naomi', 'jamu', 49.00, '', 0, '2024-05-30 12:44:44', '0000-00-00', 'TA6E1ZMM4B', 'Motorbike', 6),
(13, 'bro', 'juja', 'naomi', 'jamu', 49.00, '', 0, '2024-05-30 12:45:14', '0000-00-00', '70QUBK07JD', 'Motorbike', 6),
(15, 'philip', 'juja', 'adeh', 'karen', 20.00, '', 0, '2024-05-30 12:53:49', '0000-00-00', 'HHUONLDXOJ', 'Motorbike', 10),
(20, 'charles', 'ngong', 'bro', 'jamu', 49.00, '', 800, '2024-05-31 22:33:32', '2024-06-19', 'DW9OBCROHO', 'Motorbike', 6),
(21, 'john', 'juja', 'adeh', 'karen', 20.00, '', 600, '2024-05-31 22:57:08', '2024-06-12', 'TD1OAI3J6X', 'Motorbike', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Phone`, `Password`, `Role`) VALUES
(6, 'charles', 'charles@gmail.com', 712121212, '$2y$10$32uzomlINXf/JYRkMw8OKudOeZjmFbFBtYEX1x0DAmCKrsrGtEkBq', 0),
(9, 'paul', 'paul@gmail.com', 794953436, '$2y$10$3/B6rnkm/zgo1sywV7bgBukpCQ0d7cFG8jFdABEj.uY4oT/qag9Zy', 0),
(10, 'philiy', 'philip@example.com', 712121212, '$2y$10$twjTCJp4tiOcRGAiCAMBVOaLTTXw7T8c30.HD0Q8SdpG7hxfdSk7C', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`courier_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `courier_details`
--
ALTER TABLE `courier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`),
  ADD UNIQUE KEY `tracking_id` (`tracking_id`),
  ADD KEY `courier_id` (`courier_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `tracking_id` (`tracking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courier_details`
--
ALTER TABLE `courier_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`courier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

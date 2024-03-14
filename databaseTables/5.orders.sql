-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 05:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthybytes`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `special_instructions` text NOT NULL,
  `order_status` enum('pending','OutForDelivery','Delivered','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `address`, `special_instructions`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, '200.00', 'makarpura', '', 'Delivered', '2024-03-02 05:45:21', '2024-03-02 05:51:08'),
(2, 1, '150.00', 'makarpura', '', 'Delivered', '2024-03-02 06:01:49', '2024-03-02 06:02:48'),
(3, 1, '200.00', 'ff', '', 'Delivered', '2024-03-02 06:03:06', '2024-03-02 06:04:00'),
(4, 1, '400.00', 'C/37,Shree Sai Dham Soc.,near susen circle, Makrpura, Vadodara', '', 'Delivered', '2024-03-02 06:17:48', '2024-03-02 06:21:01'),
(5, 3, '300.00', 'baroda', '', 'Delivered', '2024-03-02 06:23:44', '2024-03-02 06:24:24'),
(6, 1, '200.00', '', '', 'pending', '2024-03-03 13:16:15', '2024-03-03 13:16:15'),
(7, 1, '200.00', '', '', 'pending', '2024-03-03 13:17:01', '2024-03-03 13:17:01'),
(8, 1, '200.00', 'baroda', '', 'Delivered', '2024-03-03 13:17:43', '2024-03-03 13:22:27'),
(9, 1, '300.00', 'asd', '', 'Delivered', '2024-03-03 13:28:12', '2024-03-03 13:29:37'),
(10, 1, '200.00', 'asdas', '', 'Delivered', '2024-03-03 13:29:38', '2024-03-03 13:30:55'),
(11, 1, '200.00', 'asds', '', 'Delivered', '2024-03-03 13:31:04', '2024-03-03 13:34:15'),
(12, 1, '200.00', 'sdg', 'sdg', 'Delivered', '2024-03-03 13:34:16', '2024-03-03 13:40:07'),
(13, 1, '750.00', '', '', 'pending', '2024-03-03 17:52:36', '2024-03-03 17:52:36'),
(14, 1, '750.00', '', '', 'pending', '2024-03-03 17:52:55', '2024-03-03 17:52:55'),
(15, 1, '950.00', '', '', 'pending', '2024-03-03 18:00:16', '2024-03-03 18:00:16'),
(16, 1, '1150.00', '', '', 'pending', '2024-03-03 18:00:35', '2024-03-03 18:00:35'),
(17, 1, '1150.00', '', '', 'pending', '2024-03-03 18:01:36', '2024-03-03 18:01:36'),
(18, 1, '1150.00', '', '', 'pending', '2024-03-03 18:01:40', '2024-03-03 18:01:40'),
(19, 1, '1150.00', '', '', 'pending', '2024-03-03 18:01:57', '2024-03-03 18:01:57'),
(20, 1, '1150.00', '', '', 'pending', '2024-03-03 18:02:26', '2024-03-03 18:02:26'),
(21, 1, '1150.00', '', '', 'pending', '2024-03-03 18:03:00', '2024-03-03 18:03:00'),
(22, 1, '1150.00', '', '', 'pending', '2024-03-03 18:03:03', '2024-03-03 18:03:03'),
(23, 1, '1150.00', '', '', 'pending', '2024-03-03 18:03:36', '2024-03-03 18:03:36'),
(24, 1, '1150.00', '', '', 'pending', '2024-03-03 18:03:43', '2024-03-03 18:03:43'),
(25, 1, '1150.00', '', '', 'pending', '2024-03-03 18:05:29', '2024-03-03 18:05:29'),
(26, 1, '1150.00', '', '', 'pending', '2024-03-03 18:07:18', '2024-03-03 18:07:18'),
(27, 1, '1150.00', '', '', 'pending', '2024-03-03 18:07:32', '2024-03-03 18:07:32'),
(28, 1, '1150.00', '', '', 'pending', '2024-03-03 18:07:41', '2024-03-03 18:07:41'),
(29, 1, '1150.00', '', '', 'pending', '2024-03-03 18:08:34', '2024-03-03 18:08:34'),
(30, 1, '1150.00', '', '', 'pending', '2024-03-03 18:09:22', '2024-03-03 18:09:22'),
(31, 1, '1150.00', '', '', 'pending', '2024-03-03 18:09:23', '2024-03-03 18:09:23'),
(32, 1, '1150.00', '', '', 'pending', '2024-03-03 18:09:31', '2024-03-03 18:09:31'),
(33, 1, '1150.00', '', '', 'pending', '2024-03-03 18:09:36', '2024-03-03 18:09:36'),
(34, 1, '1150.00', '', '', 'pending', '2024-03-03 18:09:41', '2024-03-03 18:09:41'),
(35, 1, '1150.00', '', '', 'pending', '2024-03-03 18:09:52', '2024-03-03 18:09:52'),
(36, 1, '1150.00', '', '', 'pending', '2024-03-03 18:10:00', '2024-03-03 18:10:00'),
(37, 1, '1150.00', '', '', 'pending', '2024-03-03 18:10:46', '2024-03-03 18:10:46'),
(38, 1, '1150.00', '', '', 'pending', '2024-03-03 18:11:43', '2024-03-03 18:11:43'),
(39, 1, '1150.00', '', '', 'pending', '2024-03-03 18:11:54', '2024-03-03 18:11:54'),
(40, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:01', '2024-03-03 18:12:01'),
(41, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:05', '2024-03-03 18:12:05'),
(42, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:12', '2024-03-03 18:12:12'),
(43, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:29', '2024-03-03 18:12:29'),
(44, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:34', '2024-03-03 18:12:34'),
(45, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:41', '2024-03-03 18:12:41'),
(46, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:43', '2024-03-03 18:12:43'),
(47, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:53', '2024-03-03 18:12:53'),
(48, 1, '1150.00', '', '', 'pending', '2024-03-03 18:12:58', '2024-03-03 18:12:58'),
(49, 1, '1150.00', '', '', 'pending', '2024-03-03 18:13:15', '2024-03-03 18:13:15'),
(50, 1, '1850.00', 'C/37 Shree SaiDham Society,B/H Priyadarshani Nagar,Makarpura Road.', '', 'Delivered', '2024-03-04 06:44:25', '2024-03-04 06:45:07'),
(51, 2, '200.00', '', '', 'pending', '2024-03-11 05:39:12', '2024-03-11 05:39:12'),
(52, 2, '500.00', '', '', 'pending', '2024-03-11 08:12:33', '2024-03-11 08:12:33'),
(56, 2, '900.00', 'Priyadarshani Nagar,Makarpura Road.', 'hello', 'Delivered', '2024-03-13 05:15:12', '2024-03-13 05:29:01'),
(57, 6, '1000.00', 'stark', 'A.I', 'Delivered', '2024-03-13 05:29:57', '2024-03-13 05:30:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

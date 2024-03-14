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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_id`, `razorpay_payment_id`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'pay_NghuBWDufo5xwz', '500.00', 'success', '2024-02-29 13:11:50', '2024-02-29 13:11:50'),
(2, 1, '2', 'pay_Ngi1fxCvpMntQT', '200.00', 'success', '2024-02-29 13:18:55', '2024-02-29 13:18:55'),
(3, 1, '5', 'pay_NgiAjQ7jZgdKeD', '450.00', 'success', '2024-02-29 13:27:27', '2024-02-29 13:27:27'),
(4, 1, '6', 'pay_NgkkjphFo7Ebds', '400.00', 'success', '2024-02-29 15:58:55', '2024-02-29 15:58:55'),
(5, 1, '7', 'pay_NgllQD7wEhqIjs', '150.00', 'success', '2024-02-29 16:58:15', '2024-02-29 16:58:15'),
(6, 1, '8', 'pay_Ngm1XJVLAKfFBX', '500.00', 'success', '2024-02-29 17:13:30', '2024-02-29 17:13:30'),
(7, 1, '9', 'pay_Ngm7emXZmLoKfS', '200.00', 'success', '2024-02-29 17:19:17', '2024-02-29 17:19:17'),
(8, 1, '10', 'pay_NgmEZKgv1oXcMf', '150.00', 'success', '2024-02-29 17:25:50', '2024-02-29 17:25:50'),
(9, 1, '11', 'pay_Nh0DdgCjGZeMYp', '200.00', 'success', '2024-03-01 07:06:41', '2024-03-01 07:06:41'),
(10, 1, '12', 'pay_Nh1HeYVPHfl5eu', '200.00', 'success', '2024-03-01 08:09:13', '2024-03-01 08:09:13'),
(11, 1, '1', 'pay_NhNNgqrvHtS5rS', '200.00', 'success', '2024-03-02 05:46:08', '2024-03-02 05:46:08'),
(12, 1, '2', 'pay_NhNeobAHNOmzdk', '150.00', 'success', '2024-03-02 06:02:18', '2024-03-02 06:02:18'),
(13, 1, '3', 'pay_NhNfwPUWcMMIiK', '200.00', 'success', '2024-03-02 06:03:24', '2024-03-02 06:03:24'),
(14, 1, '4', 'pay_NhNyFbcbNLQEG3', '400.00', 'success', '2024-03-02 06:20:52', '2024-03-02 06:20:52'),
(15, 3, '5', 'pay_NhO1yWrpXmEhdn', '300.00', 'success', '2024-03-02 06:24:18', '2024-03-02 06:24:18'),
(16, 1, '8', 'pay_NhtfqQbAVAI3MY', '200.00', 'success', '2024-03-03 13:21:31', '2024-03-03 13:21:31'),
(17, 1, '9', 'pay_NhtnOomWLjXaMV', '300.00', 'success', '2024-03-03 13:28:40', '2024-03-03 13:28:40'),
(18, 1, '10', 'pay_Nhtov1taSOZN56', '200.00', 'success', '2024-03-03 13:30:07', '2024-03-03 13:30:07'),
(19, 1, '11', 'pay_NhtqUpHKJQ0Veo', '200.00', 'success', '2024-03-03 13:31:36', '2024-03-03 13:31:36'),
(20, 1, '12', 'pay_Nhttx0nNkpXWeK', '200.00', 'success', '2024-03-03 13:35:14', '2024-03-03 13:35:14'),
(21, 1, '50', 'pay_NiBS4I1K5dhO32', '1850.00', 'success', '2024-03-04 06:44:59', '2024-03-04 06:44:59'),
(25, 2, '56', 'pay_Nlik57D9kLaK6V', '900.00', 'success', '2024-03-13 05:15:55', '2024-03-13 05:15:55'),
(26, 6, '57', 'pay_NliziUyz2PrW6I', '1000.00', 'success', '2024-03-13 05:30:43', '2024-03-13 05:30:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

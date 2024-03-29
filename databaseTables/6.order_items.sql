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
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `salad_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `salad_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, '200.00'),
(2, 2, 5, 1, '150.00'),
(3, 3, 2, 1, '200.00'),
(4, 4, 2, 2, '200.00'),
(5, 5, 5, 2, '150.00'),
(6, 6, 2, 1, '200.00'),
(7, 7, 2, 1, '200.00'),
(8, 8, 2, 1, '200.00'),
(9, 9, 5, 2, '150.00'),
(10, 10, 2, 1, '200.00'),
(11, 11, 2, 1, '200.00'),
(12, 12, 2, 1, '200.00'),
(13, 13, 11, 1, '350.00'),
(14, 13, 21, 1, '400.00'),
(15, 14, 11, 1, '350.00'),
(16, 14, 21, 1, '400.00'),
(17, 15, 11, 1, '350.00'),
(18, 15, 21, 1, '400.00'),
(19, 15, 2, 1, '200.00'),
(20, 16, 11, 1, '350.00'),
(21, 16, 21, 1, '400.00'),
(22, 16, 2, 2, '200.00'),
(23, 17, 11, 1, '350.00'),
(24, 17, 21, 1, '400.00'),
(25, 17, 2, 2, '200.00'),
(26, 18, 11, 1, '350.00'),
(27, 18, 21, 1, '400.00'),
(28, 18, 2, 2, '200.00'),
(29, 19, 11, 1, '350.00'),
(30, 19, 21, 1, '400.00'),
(31, 19, 2, 2, '200.00'),
(32, 20, 11, 1, '350.00'),
(33, 20, 21, 1, '400.00'),
(34, 20, 2, 2, '200.00'),
(35, 21, 11, 1, '350.00'),
(36, 21, 21, 1, '400.00'),
(37, 21, 2, 2, '200.00'),
(38, 22, 11, 1, '350.00'),
(39, 22, 21, 1, '400.00'),
(40, 22, 2, 2, '200.00'),
(41, 23, 11, 1, '350.00'),
(42, 23, 21, 1, '400.00'),
(43, 23, 2, 2, '200.00'),
(44, 24, 11, 1, '350.00'),
(45, 24, 21, 1, '400.00'),
(46, 24, 2, 2, '200.00'),
(47, 25, 11, 1, '350.00'),
(48, 25, 21, 1, '400.00'),
(49, 25, 2, 2, '200.00'),
(50, 26, 11, 1, '350.00'),
(51, 26, 21, 1, '400.00'),
(52, 26, 2, 2, '200.00'),
(53, 27, 11, 1, '350.00'),
(54, 27, 21, 1, '400.00'),
(55, 27, 2, 2, '200.00'),
(56, 28, 11, 1, '350.00'),
(57, 28, 21, 1, '400.00'),
(58, 28, 2, 2, '200.00'),
(59, 29, 11, 1, '350.00'),
(60, 29, 21, 1, '400.00'),
(61, 29, 2, 2, '200.00'),
(62, 30, 11, 1, '350.00'),
(63, 30, 21, 1, '400.00'),
(64, 30, 2, 2, '200.00'),
(65, 31, 11, 1, '350.00'),
(66, 31, 21, 1, '400.00'),
(67, 31, 2, 2, '200.00'),
(68, 32, 11, 1, '350.00'),
(69, 32, 21, 1, '400.00'),
(70, 32, 2, 2, '200.00'),
(71, 33, 11, 1, '350.00'),
(72, 33, 21, 1, '400.00'),
(73, 33, 2, 2, '200.00'),
(74, 34, 11, 1, '350.00'),
(75, 34, 21, 1, '400.00'),
(76, 34, 2, 2, '200.00'),
(77, 35, 11, 1, '350.00'),
(78, 35, 21, 1, '400.00'),
(79, 35, 2, 2, '200.00'),
(80, 36, 11, 1, '350.00'),
(81, 36, 21, 1, '400.00'),
(82, 36, 2, 2, '200.00'),
(83, 37, 11, 1, '350.00'),
(84, 37, 21, 1, '400.00'),
(85, 37, 2, 2, '200.00'),
(86, 38, 11, 1, '350.00'),
(87, 38, 21, 1, '400.00'),
(88, 38, 2, 2, '200.00'),
(89, 39, 11, 1, '350.00'),
(90, 39, 21, 1, '400.00'),
(91, 39, 2, 2, '200.00'),
(92, 40, 11, 1, '350.00'),
(93, 40, 21, 1, '400.00'),
(94, 40, 2, 2, '200.00'),
(95, 41, 11, 1, '350.00'),
(96, 41, 21, 1, '400.00'),
(97, 41, 2, 2, '200.00'),
(98, 42, 11, 1, '350.00'),
(99, 42, 21, 1, '400.00'),
(100, 42, 2, 2, '200.00'),
(101, 43, 11, 1, '350.00'),
(102, 43, 21, 1, '400.00'),
(103, 43, 2, 2, '200.00'),
(104, 44, 11, 1, '350.00'),
(105, 44, 21, 1, '400.00'),
(106, 44, 2, 2, '200.00'),
(107, 45, 11, 1, '350.00'),
(108, 45, 21, 1, '400.00'),
(109, 45, 2, 2, '200.00'),
(110, 46, 11, 1, '350.00'),
(111, 46, 21, 1, '400.00'),
(112, 46, 2, 2, '200.00'),
(113, 47, 11, 1, '350.00'),
(114, 47, 21, 1, '400.00'),
(115, 47, 2, 2, '200.00'),
(116, 48, 11, 1, '350.00'),
(117, 48, 21, 1, '400.00'),
(118, 48, 2, 2, '200.00'),
(119, 49, 11, 1, '350.00'),
(120, 49, 21, 1, '400.00'),
(121, 49, 2, 2, '200.00'),
(122, 50, 11, 1, '350.00'),
(123, 50, 21, 1, '400.00'),
(124, 50, 2, 2, '200.00'),
(125, 50, 15, 2, '350.00'),
(126, 51, 2, 1, '200.00'),
(127, 52, 2, 1, '200.00'),
(128, 52, 6, 1, '300.00'),
(132, 56, 2, 1, '200.00'),
(133, 56, 6, 1, '300.00'),
(134, 56, 19, 1, '400.00'),
(135, 57, 3, 4, '250.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `salad_id` (`salad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`salad_id`) REFERENCES `salads` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

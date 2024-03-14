-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 05:39 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'hitansh123', 'hitu', 'hitansh@abc.com'),
(2, 'priyansh', '$2y$10$a8RWfcKkyQ.4CYWwPv87a.GzC81Sroc18nrtR5QbuQ0gQJ6ycq9qq', 'thakurhitansh4325@gmail.com'),
(3, 'yash sharma', '$2y$10$55NgQaVepz6Pysm9lv3KIu/QuUZSvZE2P9ixhwBSq3kezy/uPfQZm', 'yash@abc.com'),
(4, 'bhavini123', '$2y$10$6j0dD93YOcsdGeKxfSuveOyelLzlYZ/OyCWAwewIPujBJV6I0gmz2', 'bhavini@gmail.com'),
(5, 'ayaan123', '$2y$10$ZHLZILCLlfGkNLMmHNISYeyHhPYEaO4a1Jxw64zAsibXx7/b3xzbq', 'ayaan@mail.com'),
(6, 'jarvis123', '$2y$10$RC3ushAUeS/YAMQgYdf6n.GvvmPtLsVoNzYnEBhugtUMef3shWYn2', 'jarvis@123.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

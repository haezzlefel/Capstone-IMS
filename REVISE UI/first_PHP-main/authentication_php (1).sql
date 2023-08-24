-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 06:59 AM
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
-- Database: `authentication_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_receipts`
--

CREATE TABLE IF NOT EXISTS `delivery_receipts` (
  `DR_No.` varchar(50) NOT NULL,
  `Product_Code` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Quantity` int(30) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Total` varchar(20) NOT NULL,
  PRIMARY KEY (`DR_No.`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `photo`, `password`, `token`, `status`) VALUES
(25, 'Demo', 'Demo', 'demo@mail.com', '2345678', '', '$2y$10$UXh2euSr79Cgeil6brbOs.VkA0aq9zA82.BMa7IR3JEl576sdKY6y', '', 1),
(26, 'Test', 'Test', 'test@mail.com', '12345678', '', '$2y$10$z4RX9Nrv8PYO6BGK7ifrw.Sf/pEQNHI1yBZv7XM14XQZ30VluqAqm', '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

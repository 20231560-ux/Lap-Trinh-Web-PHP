-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2026 at 11:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab13_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `created_at`) VALUES
(1, 'SP001', 'Bàn phím cơ', 500000.00, '2026-01-27 16:59:28'),
(2, 'SP002', 'Chuột gaming', 300000.00, '2026-01-27 16:59:28'),
(3, 'SP003', 'Màn hình 24 inch', 2500000.00, '2026-01-27 16:59:28'),
(4, 'SP004', 'Tai nghe', 400000.00, '2026-01-27 16:59:28'),
(5, 'SP005', 'Laptop Dell', 15000000.00, '2026-01-27 16:59:28'),
(6, 'SP006', 'USB 32GB', 150000.00, '2026-01-27 16:59:28'),
(7, 'SP007', 'Ổ cứng SSD', 1200000.00, '2026-01-27 16:59:28'),
(8, 'SP008', 'Webcam HD', 600000.00, '2026-01-27 16:59:28'),
(9, 'SP009', 'Loa Bluetooth', 700000.00, '2026-01-27 16:59:28'),
(10, 'SP010', 'Router Wifi', 900000.00, '2026-01-27 16:59:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

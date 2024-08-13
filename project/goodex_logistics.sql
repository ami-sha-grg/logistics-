-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 05:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodex_logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `freight_type` enum('Sea Freight','Air Freight','Road Freight','Train Freight') NOT NULL,
  `status` enum('Pending','Processing','Completed') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `company_name`, `contact_name`, `email`, `contact_number`, `address`, `origin`, `destination`, `freight_type`, `status`, `created_at`) VALUES
(1, 'a', 'a', 'd@gmail.com', '9816683043', 'a', 's', 's', 'Air Freight', 'Completed', '2024-08-11 17:05:44'),
(2, 'PNC', 'Milan Bhandari', 'milan@gmail.com', '9845632789', 'Pokhara', 'idk', 'dharan', 'Air Freight', 'Completed', '2024-08-12 15:41:27'),
(3, 'hola', 'v', 'v@gmail.com', '1234567890', 'Pokhara', 'uff', 'Nepalgunj', 'Road Freight', 'Pending', '2024-08-12 16:36:25'),
(4, 'hola', 'v', 'v@gmail.com', '1234567890', 'Pokhara', 'uff', 'Nepalgunj', 'Road Freight', 'Pending', '2024-08-12 16:36:25'),
(5, 'hola', 'v', 'v@gmail.com', '1234567890', 'Pokhara', 'uff', 'Nepalgunj', 'Road Freight', 'Pending', '2024-08-12 16:36:55'),
(6, 'hola', 'v', 'v@gmail.com', '1234567890', 'Pokhara', 'uff', 'Nepalgunj', 'Road Freight', 'Pending', '2024-08-12 16:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'amsa123@gmail.com', 'amsa123', 'admin', '2024-08-12 15:17:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

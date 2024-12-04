-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 12:25 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `quantity_delivered` int(11) NOT NULL DEFAULT '0',
  `location` varchar(100) DEFAULT NULL,
  `date_of_receiving` date DEFAULT NULL,
  `receiver` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `in_stock`
--

CREATE TABLE `in_stock` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `quantity_in_stock` int(11) NOT NULL DEFAULT '0',
  `location` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_stock`
--

INSERT INTO `in_stock` (`item_id`, `item_name`, `category`, `quantity_in_stock`, `location`) VALUES
(1, 'Epson Printer Ink', 'Printer Supplies', 12, 'ITSS Office'),
(2, 'Short Bond Paper', 'Office Supplies', 13, 'ITSS Office'),
(3, 'Tissue Roll', 'Others', 20, 'ITSS Office'),
(4, 'Router', 'Network Equipment', 1, 'ITSS Office'),
(5, 'Ethernet Cables', 'Network Equipment', 2, 'ITSS Office'),
(6, 'TLS w/ Logo', 'Office Supplies', 50, 'PGN 2nd Floor'),
(7, 'ID Laces', 'ID Supplies', 100, 'ITSS Office'),
(8, 'ID Plastic Case', 'ID Supplies', 100, 'ITSS Office'),
(9, 'Long Bond Paper', 'Office Supplies', 30, 'ITSS Office'),
(10, 'ID Printer (Transform Film)', 'ID Supplies', 20, 'ITSS Office'),
(11, 'ID Printer (Color Film)', 'ID Supplies', 20, 'ITSS Office');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `userpass`, `created_at`) VALUES
(1, 'itss', '$2y$10$LVxND7xPXKUkQ08kcT9Ed.GTv9OL3iSfVZw1WaIPcwpcrNtzI6gAW', '2024-11-26 08:00:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `in_stock`
--
ALTER TABLE `in_stock`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 12:41 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `compsupps`
--

CREATE TABLE `compsupps` (
  `ITEM_NUM` int(11) NOT NULL,
  `PROD_NAME` varchar(150) NOT NULL,
  `PROD_CODE` varchar(150) NOT NULL,
  `QUANT_RECEIVE` int(11) NOT NULL,
  `QUANT_USED` int(11) NOT NULL,
  `QUANT_REMAIN` int(11) NOT NULL,
  `CATEGORY` varchar(150) NOT NULL,
  `RECEIVER` varchar(150) NOT NULL,
  `DATE_RECEIVE` date NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compsupps`
--

INSERT INTO `compsupps` (`ITEM_NUM`, `PROD_NAME`, `PROD_CODE`, `QUANT_RECEIVE`, `QUANT_USED`, `QUANT_REMAIN`, `CATEGORY`, `RECEIVER`, `DATE_RECEIVE`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'ACER Computer Monitor', 'M785-23C4', 3, 1, 2, 'Computer Equipment', 'Joko Mallari', '2024-05-31', '2024-07-16 03:15:14', '2024-07-16 03:17:56');

--
-- Triggers `compsupps`
--
DELIMITER $$
CREATE TRIGGER `update_quant_remain_compsupps` BEFORE INSERT ON `compsupps` FOR EACH ROW BEGIN
	SET NEW.QUANT_REMAIN = NEW.QUANT_RECEIVE - NEW.QUANT_USED;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `idsupps`
--

CREATE TABLE `idsupps` (
  `ITEM_NUM` int(11) NOT NULL,
  `PROD_NAME` varchar(150) NOT NULL,
  `QUANT_RECEIVE` int(11) NOT NULL,
  `QUANT_USED` int(11) NOT NULL,
  `QUANT_REMAIN` int(11) NOT NULL,
  `CATEGORY` varchar(150) NOT NULL,
  `RECEIVER` varchar(150) NOT NULL,
  `DATE_RECEIVE` date NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idsupps`
--

INSERT INTO `idsupps` (`ITEM_NUM`, `PROD_NAME`, `QUANT_RECEIVE`, `QUANT_USED`, `QUANT_REMAIN`, `CATEGORY`, `RECEIVER`, `DATE_RECEIVE`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'ID Lace', 2100, 500, 1600, 'ID Supplies', 'Joko Mallari', '2024-06-28', '2024-07-12 07:33:24', '2024-07-15 06:33:30'),
(2, 'ID Plastic Case', 2000, 600, 1400, 'ID Supplies', 'Joko Mallari', '2024-07-01', '2024-07-12 07:33:24', '2024-07-15 06:34:54'),
(3, 'ID (Plastic PVC) Cards', 3500, 1500, 2000, 'ID Supplies', 'Joko Mallari', '2024-07-12', '2024-07-12 07:33:24', '2024-07-15 06:36:04'),
(4, 'ID (Plastic White PVC) Cards', 500, 200, 300, 'ID Supplies', 'Joko Mallari', '2024-07-15', '2024-07-15 06:26:46', '2024-07-15 06:26:46'),
(5, 'ID Plastic Case', 2500, 750, 1750, 'ID Supplies', 'Joko Mallari', '2024-06-05', '2024-07-16 06:17:33', '2024-07-16 06:17:33'),
(6, 'ID Lace', 1000, 200, 800, 'ID Supplies', 'Joko Mallari', '2024-05-12', '2024-07-16 06:24:09', '2024-07-16 06:24:09');

--
-- Triggers `idsupps`
--
DELIMITER $$
CREATE TRIGGER `update_quant_remain` BEFORE INSERT ON `idsupps` FOR EACH ROW BEGIN
	SET NEW.quant_remain = NEW.quant_receive - NEW.quant_used;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_quant_remain_onedit` BEFORE UPDATE ON `idsupps` FOR EACH ROW BEGIN
	SET NEW.QUANT_REMAIN = NEW.QUANT_RECEIVE - NEW.QUANT_USED;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `offsupps`
--

CREATE TABLE `offsupps` (
  `ITEM_NUM` int(11) NOT NULL,
  `PROD_NAME` varchar(150) NOT NULL,
  `QUANT_RECEIVE` int(11) NOT NULL,
  `QUANT_USED` int(11) NOT NULL,
  `QUANT_REMAIN` int(11) NOT NULL,
  `CATEGORY` varchar(150) NOT NULL,
  `RECEIVER` varchar(150) NOT NULL,
  `DATE_RECEIVE` date NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offsupps`
--

INSERT INTO `offsupps` (`ITEM_NUM`, `PROD_NAME`, `QUANT_RECEIVE`, `QUANT_USED`, `QUANT_REMAIN`, `CATEGORY`, `RECEIVER`, `DATE_RECEIVE`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'Short Bond Paper', 100, 30, 70, 'Office Supplies', 'Joko Mallari', '2024-07-12', '2024-07-15 01:43:37', '2024-07-16 01:22:39'),
(2, 'Long Bond Paper', 80, 30, 50, 'Office Supplies', 'Joko Mallari', '2024-07-01', '2024-07-15 01:43:37', '2024-07-16 01:24:05'),
(3, 'Ballpens (Black)', 30, 8, 22, 'Office Supplies', 'Joko Mallari', '2024-07-16', '2024-07-16 01:30:10', '2024-07-16 01:30:10');

--
-- Triggers `offsupps`
--
DELIMITER $$
CREATE TRIGGER `update_quant_remain_offsupps` BEFORE INSERT ON `offsupps` FOR EACH ROW BEGIN
	SET NEW.QUANT_REMAIN = NEW.QUANT_RECEIVE - NEW.QUANT_USED;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `printersupps`
--

CREATE TABLE `printersupps` (
  `ITEM_NUM` int(11) NOT NULL,
  `PROD_NAME` varchar(150) NOT NULL,
  `PROD_CODE` varchar(150) NOT NULL,
  `QUANT_RECEIVE` int(11) NOT NULL,
  `QUANT_USED` int(11) NOT NULL,
  `QUANT_REMAIN` int(11) DEFAULT NULL,
  `CATEGORY` varchar(150) NOT NULL,
  `RECEIVER` varchar(150) NOT NULL,
  `DATE_RECEIVE` date NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printersupps`
--

INSERT INTO `printersupps` (`ITEM_NUM`, `PROD_NAME`, `PROD_CODE`, `QUANT_RECEIVE`, `QUANT_USED`, `QUANT_REMAIN`, `CATEGORY`, `RECEIVER`, `DATE_RECEIVE`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'Printer Ink (Black)', 'A950-221', 7, 3, 4, 'Printer Supplies', 'Joko Mallari', '2024-07-12', '2024-07-15 01:45:41', '2024-07-16 01:37:48'),
(2, 'Printer Ink (Magenta)', 'A336-900', 10, 3, 7, 'Printer Supplies', 'Joko Mallari', '2024-07-16', '2024-07-16 01:41:03', '2024-07-16 01:41:03');

--
-- Triggers `printersupps`
--
DELIMITER $$
CREATE TRIGGER `update_quant_remain_printersupps` BEFORE INSERT ON `printersupps` FOR EACH ROW BEGIN
	SET NEW.QUANT_REMAIN = NEW.QUANT_RECEIVE - NEW.QUANT_USED;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashedpassword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hashedpassword`) VALUES
(1, 'lino', '$2y$10$SaAO4/CkzG8URcvLWYmu9OILr0jvB8r0T3qomc6t.mSWr7fX07YTO'),
(2, 'lino1', '$2y$10$nGhW8OxihYsK16khkBIy1.SBoExGCys6idSkyJGcHgpSecbNGUPw2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compsupps`
--
ALTER TABLE `compsupps`
  ADD PRIMARY KEY (`ITEM_NUM`),
  ADD UNIQUE KEY `PROD_CODE` (`PROD_CODE`);

--
-- Indexes for table `idsupps`
--
ALTER TABLE `idsupps`
  ADD PRIMARY KEY (`ITEM_NUM`);

--
-- Indexes for table `offsupps`
--
ALTER TABLE `offsupps`
  ADD PRIMARY KEY (`ITEM_NUM`);

--
-- Indexes for table `printersupps`
--
ALTER TABLE `printersupps`
  ADD PRIMARY KEY (`ITEM_NUM`),
  ADD UNIQUE KEY `PROD_CODE` (`PROD_CODE`);

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
-- AUTO_INCREMENT for table `compsupps`
--
ALTER TABLE `compsupps`
  MODIFY `ITEM_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `idsupps`
--
ALTER TABLE `idsupps`
  MODIFY `ITEM_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `offsupps`
--
ALTER TABLE `offsupps`
  MODIFY `ITEM_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `printersupps`
--
ALTER TABLE `printersupps`
  MODIFY `ITEM_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

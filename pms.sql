-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 07:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(17, 'calcimimetics'),
(22, 'diuretics'),
(23, 'estrogens'),
(24, 'thioxanthenes'),
(25, 'thrombolytics'),
(26, 'thyroid drugs'),
(27, 'topical antivirals'),
(28, 'topical emollients'),
(29, 'incretin mimetics'),
(30, 'Insulin'),
(31, 'vitamins'),
(32, 'iron products'),
(34, 'heparins'),
(35, 'Capsul'),
(36, 'Serup'),
(37, 'Tablet'),
(40, 'Vitamins');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacture_name` varchar(100) NOT NULL,
  `manufacture_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacture_name`, `manufacture_address`) VALUES
(4, 'Beximco Pharmaceuticals Ltd.', NULL),
(5, 'Beacon Pharmaceuticals Ltd.', NULL),
(6, 'Belsen Pharmaceuticals Ltd.', NULL),
(7, 'Biopharma Laboratories Ltd.', NULL),
(8, 'Apex Pharmaceuticals Ltd.', NULL),
(9, 'Aexim Pharmaceuticals Ltd.', NULL),
(10, 'Amico Laboratories Ltd.', NULL),
(11, 'Ambee Pharmaceuticals Ltd.', NULL),
(12, 'Acme Laboratories Limited', NULL),
(13, 'Active Fine Chemicals Ltd.', NULL),
(14, 'Alkad Laboratories', NULL),
(15, 'Allied Pharmaceuticals Ltd.', NULL),
(16, 'Bengal drugs Ltd.', NULL),
(17, 'Centeon Pharma Limited', NULL),
(18, 'City Pharmaceuticals', NULL),
(19, 'Cosmo Pharma Laboratories Ltd.', NULL),
(20, 'Crystal Pharmaceuticals Ltd.', NULL),
(21, 'Decent Pharma Laboratories Ltd.', NULL),
(22, 'Doctor TIMS Pharmaceuticals Ltd.', NULL),
(24, 'Skylab Pharmaceuticals Ltd.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `medicine_name` varchar(191) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `strength` varchar(191) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `box_size` varchar(191) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `group_id`, `category_id`, `medicine_name`, `generic_name`, `manufacturer_id`, `strength`, `unit_id`, `box_size`, `photo`) VALUES
(1, 13, 37, 'Omeprazol', 'srfgjhk', 24, '10', '5', '10', ''),
(2, 13, 22, 'eh', 'dfgh', 22, 'wert', '11', '10', ''),
(3, 13, 22, 'eh', 'dfgh', 22, 'wert', '11', '10', ''),
(4, 13, 22, 'eh', 'dfgh', 22, 'wert', '11', '10', ''),
(5, 13, 22, 'eh', 'dfgh', 22, 'wert', '11', '10', ''),
(6, 13, 22, 'eh', 'dfgh', 22, 'wert', '11', '10', ''),
(7, 14, 22, 'fgh', 'dfgh', 7, '10', '2', '10', ''),
(8, 14, 22, 'sdfg', 'sdfg', 8, '10', '4', '10', ''),
(9, 14, 22, 'sdefr', 'edfr', 5, '10', '1', '11', ''),
(10, 14, 22, 'sdfg', 'sdfg', 8, '10', '4', '10', ''),
(11, 14, 22, 'sdefr', 'edfr', 5, '10', '1', '11', ''),
(12, 13, 22, 'fvb', 'xcv', 6, '10', '3', '10', ''),
(13, 13, 22, 'sdfvg', 'edfrg', 7, '10', '1', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_grp`
--

CREATE TABLE `medicine_grp` (
  `id` int(11) NOT NULL,
  `grp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_grp`
--

INSERT INTO `medicine_grp` (`id`, `grp`) VALUES
(13, 'Omeprazol'),
(14, 'Paracetamol'),
(15, 'Imex'),
(17, 'ftghjk');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, '1 *1'),
(2, '2 * 1'),
(3, '4 * 1'),
(4, '6 * 1'),
(5, '10 * 1'),
(6, '15 * 1'),
(7, '20 * 1'),
(8, '28 * 1'),
(9, '30 * 1'),
(10, '40* 1'),
(11, '100 * 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@pms.com', 827);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_grp`
--
ALTER TABLE `medicine_grp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medicine_grp`
--
ALTER TABLE `medicine_grp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

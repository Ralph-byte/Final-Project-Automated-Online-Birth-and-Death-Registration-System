-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paystack_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date_purchased` datetime NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `status`, `reference`, `fullname`, `date_purchased`, `email`) VALUES
(1, 'success', 'SD6735936', ' ', '2023-07-01 19:50:04', 'dumakorandrin@gmail.com'),
(2, 'success', 'SD832567475', ' ', '2023-07-03 21:59:04', 'dumakorandrin@gmail.com'),
(3, 'success', 'SD894417149', ' ', '2023-07-03 23:42:06', 'dumakorandrin@gmail.com'),
(4, 'success', 'SD531875279', ' ', '2023-07-03 23:45:14', 'dumakorandrin@gmail.com'),
(5, 'success', 'SD233683533', ' ', '2023-07-03 23:51:56', 'dumakorandrin@gmail.com'),
(6, 'success', 'SD130508616', ' ', '2023-07-11 03:10:30', 'dumakorraphael60@gmail.com'),
(7, 'success', 'SD609388951', ' ', '2023-07-11 03:18:38', 'dumakorraphael60@gmail.com'),
(8, 'success', 'SD656534016', ' ', '2023-07-11 03:31:53', 'dumakorandrin@gmail.com'),
(9, 'success', 'SD229603311', ' ', '2023-07-11 10:17:00', 'dumakorraphael60@gmail.com'),
(10, 'success', 'SD959981549', ' ', '2023-07-11 10:28:04', 'dumakorandrin@gmail.com'),
(11, 'success', 'SD237749391', ' ', '2023-08-05 17:29:28', 'dumakorraphael60@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

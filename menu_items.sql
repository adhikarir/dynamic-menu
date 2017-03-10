-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 08:13 AM
-- Server version: 5.6.16
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `menu_name` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `url` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_name`, `parent_id`, `menu_order`, `depth`, `url`, `created`) VALUES
(1, 'Heading-1', 0, 1, 0, 'hellonepal.com', '2017-03-03 05:08:02'),
(2, 'Heading-2', 0, 2, 0, 'pokhara.com', '2017-03-03 05:08:49'),
(3, 'Heading-3', 0, 3, 0, 'gorkha.com', '2017-03-03 05:09:27'),
(4, 'Heading-4', 0, 4, 0, 'naya.com', '2017-03-03 05:10:05'),
(5, 'Sub Heading-1', 2, 1, 1, '#', '2017-03-03 07:46:00'),
(6, 'Sub Heading-2', 2, 2, 1, '#', '2017-03-03 07:46:07'),
(7, 'Sub Heading-3', 2, 3, 1, '#', '2017-03-03 07:46:10'),
(8, 'Sub Menu-1 Level-3', 5, 1, 2, 'dsa.bo', '2017-03-03 07:46:14'),
(9, 'Sub Menu-2 Level-3', 5, 2, 2, 'dfgh.bo', '2017-03-03 07:46:17'),
(10, 'Sub Menu-3 Level-3', 6, 1, 2, 'fghjk.mb', '2017-03-03 09:41:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

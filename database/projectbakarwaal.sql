-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 02:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectbakarwaal`
--
CREATE DATABASE IF NOT EXISTS `projectbakarwaal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projectbakarwaal`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`) VALUES
(1, 'afaq', 'afaq@gmail.com', 'aaaaa'),
(2, 'azhar', 'azhar@gmail.com', 'bbbbbbbbb'),
(3, 'teacher', 'teacher@ims.com', 'ccccccc'),
(4, 'afaq', 'afaqmnsr@yahoo.com', 'aaaaaaaaaaaaa'),
(5, 'musadaq mansoor', 'musadaq.mansoor@imsciences.edu.pk', 'I am your instructor.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `largeimage` varchar(255) NOT NULL,
  `largeimage2` varchar(255) NOT NULL,
  `largeimage3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `company`, `price`, `code`, `image`, `largeimage`, `largeimage2`, `largeimage3`) VALUES
(1, 'Men\'s Down Puffer Jacket', 'Marc New York', '21', 'pr01', 'jacket1-small.jpg', 'jacket1.jpg', 'jacket9-blue.jpg', 'jacket9-gray.jpg'),
(2, 'Men\'s Water-Resistant Windbreaker', 'Champion', '27', 'pr02', 't-shirt.png', '', '', ''),
(3, 'Men\'s Maui Scene Jacket', 'Sun + Stone', '45', 'pr03', 't-shirt.png', '', '', ''),
(4, 'Men\'s Essentials Windbreaker ', 'Adidas', '35', 'pr04', 't-shirt.png', '', '', ''),
(5, 'Men\'s Track Jacket', 'Ideology', '24', 'pr05', 't-shirt.png', '', '', ''),
(6, 'Men\'s Colorblocked Jacket', 'Ideology', '27', 'pr06', 't-shirt.png', '', '', ''),
(7, 'Outfitter Men\'s Packable Jacket', 'Club Room', '104', 'pr07', 't-shirt.png', '', '', ''),
(8, 'Outfitter Men\'s Packable Chevron', 'Hawke & Co.', '90', 'pr08', 't-shirt.png', '', '', ''),
(9, 'Men\'s Full-Zip Bomber Jacket', 'Alfani', '70', 'pr09', 'jacket9-gray.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE `subscribe` (
  `email` varchar(255) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`email`, `id`) VALUES
('afaqmnsr@yahoo.com', 1),
('afaqmnsr0@gmail.com', 2),
('musadaq.mansoor@imsciences.edu.pk', 13),
('m.yousaf@gmail.com', 14),
('m.yousaf@imsciences.edu.pk', 15),
('afaqmnsr@yahoo.coma', 16);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `des`, `image`) VALUES
(1, 'Afaq Mansoor Khan', 'Web Developer', 'afaq.jpg'),
(2, 'Syed Muhammad Azhar', 'Web Developer', 'azhar.png'),
(3, 'Musadaq Mansoor', 'CEO', 'musadaq.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

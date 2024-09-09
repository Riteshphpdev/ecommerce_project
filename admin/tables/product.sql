-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 02:57 PM
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
-- Database: `ecommerce1`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `model`, `description`, `price`, `qty`, `image`, `status`) VALUES
(1, 'DC BOOK', 'dc marvel 01', 'DC BOOK super hero', 899, 2000, 'all dc marvel heros.jpg', 1),
(2, 'super man ', 'comics 02', 'dc marvel super man', 169, 599, 'super man dc marvel.jpg', 0),
(3, 'marvel', 'marvel01', 'caption america marvel heros first', 99, 199, 'captain america2 marval.jpg', 0),
(4, 'dc hero', 'dc marvel03', 'dc marvel03 woonder women', 99, 599, 'all dc marvel heros.jpg', 1),
(5, 'captain america', 'marvel ', 'stive a good acting', 69, 49, 'captain america marvel.jpg', 1),
(6, 'comics marvel', 'marvel12', ' comics marvel', 46, 23, 'all marvel heros.jpg', 1),
(7, 'ssuper hero ', 'comics456', 'ssuper hero  comics', 25, 56, 'all dc marvel heros.jpg', 1),
(8, 'segf', 'gdhjfh', 'hfjkgk', 544, 878, 'super man 02 dc marvel.jpg', 1),
(9, 'gfedh', 'gfjh', 'hgkj', 654, 9894, 'bat man vs super man dc marvel.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

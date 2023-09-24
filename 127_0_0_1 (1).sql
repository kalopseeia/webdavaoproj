-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 05:37 AM
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
-- Database: `dbfurniture`
--
CREATE DATABASE IF NOT EXISTS `dbfurniture` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbfurniture`;

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `name`, `quantity`, `type`, `date`) VALUES
(1, 'Table', 5, 'Dining', '2023-09-22'),
(2, 'Sofa', 3, 'Living Room', '2023-09-23'),
(3, 'Chair', 10, 'Dining', '2023-09-24'),
(4, 'Bed', 2, 'Bedroom', '2023-09-25'),
(5, 'Cabinet', 4, 'Storage', '2023-09-26'),
(6, 'Desk', 6, 'Office', '2023-09-27'),
(7, 'Bookshelf', 8, 'Storage', '2023-09-28'),
(8, 'Coffee Table', 7, 'Living Room', '2023-09-29'),
(9, 'Wardrobe', 3, 'Bedroom', '2023-09-30'),
(10, 'Office Chair', 4, 'Office', '2023-10-01'),
(11, 'Table', 5, 'Dining', '2023-09-22'),
(12, 'Sofa', 3, 'Living Room', '2023-09-23'),
(13, 'Chair', 10, 'Dining', '2023-09-24'),
(14, 'Bed', 2, 'Bedroom', '2023-09-25'),
(15, 'Cabinet', 4, 'Storage', '2023-09-26'),
(16, 'Desk', 6, 'Office', '2023-09-27'),
(17, 'Bookshelf', 8, 'Storage', '2023-09-28'),
(18, 'Coffee Table', 7, 'Living Room', '2023-09-29'),
(19, 'Wardrobe', 3, 'Bedroom', '2023-09-30'),
(20, 'Office Chair', 4, 'Office', '2023-10-01'),
(21, 'Dresser', 2, 'Bedroom', '2023-10-02'),
(22, 'End Table', 3, 'Living Room', '2023-10-03'),
(23, 'File Cabinet', 5, 'Office', '2023-10-04'),
(24, 'Dining Bench', 3, 'Dining', '2023-10-05'),
(25, 'Sideboard', 4, 'Dining', '2023-10-06'),
(26, 'Nightstand', 2, 'Bedroom', '2023-10-07'),
(27, 'TV Stand', 6, 'Living Room', '2023-10-08'),
(28, 'Lounge Chair', 3, 'Living Room', '2023-10-09'),
(29, 'Filing Cabinet', 4, 'Office', '2023-10-10'),
(30, 'Bar Stool', 4, 'Dining', '2023-10-11'),
(31, 'Shelving Unit', 5, 'Storage', '2023-10-12'),
(32, 'Computer Desk', 3, 'Office', '2023-10-13'),
(33, 'Dining Table', 1, 'Dining', '2023-10-14'),
(34, 'Armchair', 2, 'Living Room', '2023-10-15'),
(35, 'Chest of Drawers', 3, 'Bedroom', '2023-10-16'),
(36, 'Side Table', 2, 'Living Room', '2023-10-17'),
(37, 'Bookcase', 4, 'Storage', '2023-10-18'),
(38, 'Conference Table', 1, 'Office', '2023-10-19'),
(39, 'Dining Chair', 6, 'Dining', '2023-10-20'),
(40, 'Sofa Bed', 2, 'Living Room', '2023-10-21'),
(41, 'Wine Rack', 4, 'Dining', '2023-10-22'),
(42, 'Bunk Bed', 1, 'Bedroom', '2023-10-23'),
(43, 'Laptop Desk', 3, 'Office', '2023-10-24'),
(44, 'Rocking Chair', 2, 'Living Room', '2023-10-25'),
(45, 'Dresser Mirror', 2, 'Bedroom', '2023-10-26'),
(46, 'Shoe Cabinet', 3, 'Storage', '2023-10-27'),
(47, 'Office Desk', 3, 'Office', '2023-10-28'),
(48, 'Console Table', 2, 'Living Room', '2023-10-29'),
(49, 'Wardrobe Closet', 1, 'Bedroom', '2023-10-30'),
(50, 'Chaise Lounge', 2, 'Living Room', '2023-10-31'),
(51, 'Reception Desk', 1, 'Office', '2023-11-01'),
(52, 'Dining Hutch', 2, 'Dining', '2023-11-02'),
(53, 'Bar Table', 1, 'Dining', '2023-11-03'),
(54, 'Futon', 3, 'Living Room', '2023-11-04'),
(55, 'File Drawer', 4, 'Office', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'lol', 'lol'),
(2, '', ''),
(3, 'sad', 'sad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
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
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

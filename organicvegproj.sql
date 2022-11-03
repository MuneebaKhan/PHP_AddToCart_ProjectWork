-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 10:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organicvegproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(225) NOT NULL,
  `categoryImg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `categoryImg`) VALUES
(3, 'Vege', '../MainLayout/assets/images/Veget.jpg'),
(5, 'Fruits', '../MainLayout/assets/images/cat-1.jpg'),
(7, 'DryFruits', '../MainLayout/assets/images/DryFruit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceId` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` varchar(225) NOT NULL,
  `prodImg` varchar(400) NOT NULL,
  `Category` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `price`, `description`, `prodImg`, `Category`, `status`) VALUES
(2, 'Potato', 100, ' Sweet Potato', 'assets/images/potato.jpg', 3, 0),
(3, 'Mango', 200, ' Tasty Mango', 'assets/images/Mango.jpg', 5, 0),
(4, 'Almond', 300, ' Sweet Almonds', '../MainLayout/assets/images/almond.jpg', 7, 0),
(5, 'Cheery', 500, ' Red Cherries', '../MainLayout/assets/images/Cherry.jpg', 5, 0),
(6, 'Apple', 500, ' Green Apples', '../MainLayout/assets/images/Apple.jpg', 5, 0),
(7, 'Carrot', 100, ' Raddish Carrot', '../MainLayout/assets/images/Carrot.jpg', 3, 0),
(8, 'Peanut', 80, ' Peanut Desc', '../MainLayout/assets/images/Peanut.jpg', 7, 0),
(9, 'Cucumber', 200, ' Juicy Cucumber ', '../MainLayout/assets/images/grocerapp-cucumber--627a0612ad04d.jpeg', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `RoleType` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `Password`, `RoleType`) VALUES
(1, 'Muniba', 'Munibakhan9125@gmail.com', '$2y$10$y/b3q8vSo/3shCk/EtBX9ennMtF6P8Kxg1PBvFyDewBxWVmjloVzO', 'V'),
(2, 'Admin', 'Admin@gmail.com', '$2y$10$hYsU7kDyyrn7ZtOGjr1PUOv5eioQt0k.Izx/p.0v/Nv7e5DuBoRtS', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`),
  ADD KEY `fk_UserId` (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `fk_invId` (`invoiceID`),
  ADD KEY `fk_prodId` (`prodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `fk_category` (`Category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_UserId` FOREIGN KEY (`userID`) REFERENCES `users` (`userId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_invId` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`invoiceId`),
  ADD CONSTRAINT `fk_prodId` FOREIGN KEY (`prodId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`Category`) REFERENCES `category` (`categoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

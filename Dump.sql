-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 20, 2018 at 03:20 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `say_uncle`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Service`
--

CREATE TABLE `Customer_Service` (
  `c_firstName` varchar(50) NOT NULL,
  `c_lastName` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer_Service`
--

INSERT INTO `Customer_Service` (`c_firstName`, `c_lastName`, `c_email`, `c_message`, `timestamp`) VALUES
('test', 'test', 'test@gmail.com', 'hello!', '2018-05-31 16:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_signup`
--

CREATE TABLE `newsletter_signup` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_signup`
--

INSERT INTO `newsletter_signup` (`id`, `email`, `timestamp`) VALUES
(1, 'test@example.com', '2018-05-31 16:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `oId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `pId` int(11) NOT NULL,
  `productSize` varchar(20) NOT NULL,
  `productColor` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uId` int(11) NOT NULL,
  `totalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `pId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` float NOT NULL,
  `productImage` varchar(150) NOT NULL,
  `productDescription` varchar(500) NOT NULL,
  `productCategoryID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`pId`, `productName`, `productPrice`, `productImage`, `productDescription`, `productCategoryID`) VALUES
(1, '"THE UNCLE"', 5.99, 'images/sponge berb.png', '', 1),
(2, '"THE NEPHEW"', 5.99, 'images/nephew.png', '', 1),
(3, '"THE COUSINS"', 15.99, 'images/cousins (new arms).png', '', 2),
(4, '"THE AUNTIE"', 5.99, 'images/auntie sponge update.png', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Product_Category`
--

CREATE TABLE `Product_Category` (
  `productCategoryID` int(11) NOT NULL,
  `productCategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product_Category`
--

INSERT INTO `Product_Category` (`productCategoryID`, `productCategoryName`) VALUES
(1, 'Sponge'),
(2, 'Towel');

-- --------------------------------------------------------

--
-- Table structure for table `Product_Inventory`
--

CREATE TABLE `Product_Inventory` (
  `pid` int(11) NOT NULL,
  `productSize` varchar(20) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productColor` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Shopping_Cart`
--

CREATE TABLE `Shopping_Cart` (
  `pId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productColor` varchar(30) NOT NULL,
  `productSize` varchar(20) NOT NULL,
  `uId` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `uId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `emailId` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`uId`, `userName`, `emailId`, `password`, `firstName`, `lastName`) VALUES
(1, 'test', 'test@gmail.com', '123123', 'Henry', 'Young');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter_signup`
--
ALTER TABLE `newsletter_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`oId`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `Product_Category`
--
ALTER TABLE `Product_Category`
  ADD PRIMARY KEY (`productCategoryID`);

--
-- Indexes for table `Product_Inventory`
--
ALTER TABLE `Product_Inventory`
  ADD PRIMARY KEY (`pid`,`productSize`,`productColor`);

--
-- Indexes for table `Shopping_Cart`
--
ALTER TABLE `Shopping_Cart`
  ADD PRIMARY KEY (`pId`,`productColor`,`productSize`,`uId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter_signup`
--
ALTER TABLE `newsletter_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `oId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2015 at 11:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll_tmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`id` int(11) NOT NULL,
  `F_name` varchar(200) NOT NULL,
  `M_name` varchar(200) NOT NULL,
  `L_name` varchar(200) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `MS` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Contacts` varchar(20) NOT NULL,
  `date_applied` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `F_name`, `M_name`, `L_name`, `gender`, `DOB`, `MS`, `email`, `password`, `Contacts`, `date_applied`, `status`, `position_id`) VALUES
(1, 'Trevane Rey', 'Viente', 'Jeminico', 'male', '1994-01-05', 'single', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1234567890', '2015-04-13', 'Active', 1),
(2, 'Hero', 'Yuki', 'Yamato', 'male', '1994-12-02', 'single', 'Hero@gmail.com', '2fb0316705bc331bea6b9f10727864b1', '', '2015-04-14', 'Active', 1),
(3, 'merry', 'Christopher', 'FlameHeart', 'female', '1973-02-24', 'married', 'merry@gmail.com', '557ef094357dfd2a5cb4f5fd3cf57076', '1234567890', '2015-04-14', 'Active', 2),
(4, 'James', '', 'Yap', 'male', '1998-06-10', 'divorced', 'James@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-14', 'In-active', 3),
(5, 'Harvey', 'Cruz', 'Santos', 'male', '1963-03-05', 'single', 'Santos@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-15', 'Active', 2),
(6, 'Maria', 'Weber', 'Duncan', 'female', '1994-07-10', 'married', 'maria@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-15', 'In-active', 3),
(7, 'Naomi', 'Hiiro', 'Saito', 'female', '1995-05-12', 'single', 'Naomi@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-15', 'Active', 2),
(8, 'James', 'm', 'price', 'male', '1978-06-14', 'single', 'james@sampe.com', 'e5f0f20b92f7022779015774e90ce917', '123456789', '2015-09-24', 'In-active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `status`) VALUES
(1, 'GAP', 'Active'),
(2, 'Tribal', 'In-active'),
(3, 'GODZ', 'Active'),
(4, 'Grimmiore', 'Active'),
(5, 'Tower Inn', 'Active'),
(6, 'Nike', 'Active'),
(7, 'Taylor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(1, 'Mens Clothing', 'Active'),
(2, 'Womens Clothing', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_contact` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_address`, `customer_contact`) VALUES
(1, 'kane ', 'davao', 'sample@sample.com'),
(4, 'Mary ann Curtis', 'Makati', 'sample123@sample.com'),
(5, 'Gett', 'tagum', 'sample1234@sample.com'),
(6, 'Ezio', 'Italy', 'sample12@sample.com'),
(7, 'jerry', 'davao', '092123123'),
(8, 'Mario Auditore', 'Venince', '1234567889'),
(9, 'emilie rose', 'texas', '1234567889'),
(10, 'Miguel Gomez', 'Mexico', '123123123'),
(11, 'Lara Croft', 'USA', '2123123123'),
(12, 'sorayamato', 'japan', '123123123'),
(13, 'Froilan Villaester', 'Mintal, Davao City', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `payment` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `customer_id`, `account_id`, `payment`) VALUES
(2, '2015-04-18', 1, 1, 'cash'),
(3, '2015-04-18', 4, 1, 'cash'),
(4, '2015-04-18', 5, 1, 'cash'),
(5, '2015-04-18', 6, 1, 'credit'),
(6, '2015-04-20', 7, 1, 'cash'),
(7, '2015-04-21', 8, 1, 'credit'),
(8, '2015-04-22', 9, 1, 'credit'),
(9, '2015-04-22', 10, 1, 'cash'),
(10, '2015-04-23', 11, 1, 'cash'),
(11, '2015-04-25', 12, 1, 'credit'),
(12, '2015-07-24', 13, 2, 'credit');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 2, 3, 2, '120.00'),
(2, 2, 1, 1, '150.00'),
(3, 3, 3, 20, '120.00'),
(4, 4, 5, 1, '50.00'),
(5, 5, 3, 1, '120.00'),
(6, 6, 6, 1, '200.00'),
(7, 7, 2, 21, '120.00'),
(8, 7, 6, 13, '200.00'),
(9, 8, 2, 4, '120.00'),
(10, 9, 4, 3, '410.00'),
(11, 9, 3, 3, '120.00'),
(12, 10, 1, 1, '150.00'),
(13, 11, 3, 2, '120.00'),
(14, 11, 1, 3, '150.00'),
(15, 12, 1, 5, '150.00'),
(16, 12, 2, 6, '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
`id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `Pay` int(11) NOT NULL,
  `dayswork` int(11) NOT NULL,
  `otrate` int(11) NOT NULL,
  `othrs` int(11) NOT NULL,
  `allow` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `insurance` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `account_id`, `date`, `Pay`, `dayswork`, `otrate`, `othrs`, `allow`, `advance`, `insurance`) VALUES
(1, 1, '2015', 500, 21, 400, 1, 210, 0, 2000),
(2, 2, '2015', 500, 51, 400, 4, 340, 210, 2000),
(3, 3, '2015', 300, 32, 150, 0, 100, 0, 2000),
(4, 4, '2015', 200, 12, 100, 2, 200, 500, 2000),
(5, 5, '2015', 300, 34, 150, 3, 0, 4, 2000),
(6, 6, '2015', 200, 12, 100, 4, 300, 0, 2000),
(7, 7, '2015', 300, 32, 150, 5, 100, 0, 2000),
(8, 1, '2014', 851, 200, 250, 21, 500, 299, 3000),
(9, 2, '2014', 851, 150, 250, 24, 350, 210, 3000),
(10, 3, '2014', 550, 123, 50, 13, 100, 100, 3000),
(11, 4, '2014', 200, 100, 50, 32, 300, 500, 3000),
(12, 5, '2014', 550, 50, 50, 42, 150, 4, 3000),
(13, 6, '2014', 200, 213, 50, 32, 300, 500, 3000),
(14, 7, '2014', 550, 120, 50, 21, 100, 22, 3000),
(15, 1, '2013', 851, 300, 250, 21, 500, 299, 3000),
(16, 2, '2013', 851, 200, 250, 24, 350, 210, 3000),
(17, 3, '2013', 550, 123, 50, 13, 100, 100, 3000),
(18, 4, '2013', 200, 230, 50, 32, 300, 500, 3000),
(19, 5, '2013', 550, 140, 50, 42, 150, 4, 3000),
(20, 6, '2013', 200, 210, 50, 32, 300, 500, 3000),
(21, 7, '2013', 550, 150, 50, 21, 100, 22, 3000),
(22, 1, '2012', 851, 300, 250, 21, 500, 299, 3000),
(23, 2, '2012', 851, 200, 250, 24, 350, 210, 3000),
(24, 3, '2012', 550, 123, 50, 13, 100, 100, 3000),
(25, 4, '2012', 200, 230, 50, 32, 300, 500, 3000),
(26, 5, '2012', 550, 140, 50, 42, 150, 4, 3000),
(27, 6, '2012', 200, 210, 50, 32, 300, 500, 3000),
(28, 7, '2012', 550, 150, 50, 21, 100, 22, 3000),
(29, 1, '2013', 851, 300, 250, 21, 500, 299, 3000),
(30, 2, '2013', 851, 200, 250, 24, 350, 210, 3000),
(31, 3, '2013', 550, 123, 50, 13, 100, 100, 3000),
(32, 4, '2013', 200, 230, 50, 32, 300, 500, 3000),
(33, 5, '2013', 550, 140, 50, 42, 150, 523, 3000),
(34, 6, '2013', 200, 210, 50, 32, 300, 500, 3000),
(35, 7, '2013', 550, 150, 50, 21, 100, 22, 3000),
(36, 1, '2016', 851, 300, 250, 21, 500, 299, 3000),
(37, 2, '2016', 851, 200, 250, 24, 350, 210, 3000),
(38, 3, '2016', 550, 123, 50, 13, 100, 100, 3000),
(39, 4, '2016', 200, 230, 50, 32, 300, 500, 3000),
(40, 5, '2016', 550, 140, 50, 42, 150, 523, 3000),
(41, 6, '2016', 200, 210, 50, 32, 300, 500, 3000),
(42, 7, '2016', 550, 150, 50, 12, 100, 22, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id` int(11) NOT NULL,
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`) VALUES
(1, 'Administrator'),
(2, 'Accounting'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `brand_id`, `Quantity`, `price`, `status`) VALUES
(1, 'Hoodie', 1, 2, 23, '150.00', 'Active'),
(2, 'Cargo Shorts', 1, 1, 54, '120.00', 'Active'),
(3, 'Skinny Jeans', 1, 1, 25, '120.00', 'Active'),
(4, 'Heavy Green Rock', 1, 1, 23, '410.00', 'Active'),
(5, 'High Heels 4inches', 2, 4, 15, '50.00', 'Active'),
(6, 'Kobe 2014', 1, 6, 21, '200.00', 'Active'),
(7, 'AProgrammer', 2, 3, 21, '21.00', 'Active'),
(8, 'A programmer', 1, 5, 1, '21.32', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`), ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

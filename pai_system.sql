-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2016 at 07:52 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pai_system`
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
  `position_id` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `F_name`, `M_name`, `L_name`, `gender`, `DOB`, `MS`, `email`, `password`, `Contacts`, `date_applied`, `status`, `position_id`, `grade`) VALUES
(1, 'sujan', '', 'Ahmed', 'male', '1994-01-05', 'married', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1234567890', '2015-04-13', 'Active', 1, 'AD'),
(2, 'Noor', 'Alam', 'Khan', 'male', '1994-12-02', 'single', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '', '2015-04-14', 'Active', 1, 'AD'),
(3, 'Riadul', '', 'Islam', 'female', '1973-02-24', 'married', 'emp', '21232f297a57a5a743894a0e4a801fc3', '1234567890', '2015-04-14', 'Active', 3, 'MT'),
(4, 'Ziaur ', '', 'Rahman', 'male', '1998-06-10', 'divorced', 'James@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-14', '', 3, 'MT'),
(5, 'Toloar ', 'Hossain', 'Koyedi', 'male', '1963-03-05', 'single', 'agdumbagdumghora', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-15', 'Active', 4, 'ZM'),
(6, 'Alu', 'Potol', 'Kabab', 'female', '1994-07-10', 'married', 'maria@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '1234567890', '2015-04-15', 'In-active', 3, 'DSS'),
(7, 'Chicken', '', 'Biriyani', 'female', '1995-05-12', 'married', 'Naomi@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '12345678900', '2015-04-15', 'Active', 2, 'VO'),
(8, 'Abdul', 'Kader', 'Khan', 'male', '1978-06-14', 'single', 'james@sampe.com', 'e5f0f20b92f7022779015774e90ce917', '123456789', '2015-09-24', 'In-active', 4, 'VO'),
(9, 'first', 'mid', 'last', 'male', '1965-04-08', 'married', 'rd', 'e5f0f20b92f7022779015774e90ce917', '3', '2016-07-24', 'Active', 3, 'FS'),
(10, 'sdf', 'sdf', 'sdf', 'male', '1981-11-18', 'divorced', 'sdf', 'e5f0f20b92f7022779015774e90ce917', '234', '2016-07-29', 'Active', 3, 'MT'),
(11, 'aaaa', 'aaaaaa', 'aaaa', 'male', '0000-00-00', 'married', 'aaaaa', 'e5f0f20b92f7022779015774e90ce917', '23', '2016-07-29', 'Active', 3, 'MT'),
(12, 'riad', '', 'islam', 'male', '1963-01-01', 'married', 'rd@gmail.com', 'e5f0f20b92f7022779015774e90ce917', '0178120020', '2016-08-04', 'In-active', 3, 'MT');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(13, 'Froilan Villaester', 'Mintal, Davao City', '1234567890'),
(14, '', '', ''),
(15, 'demo', 'hgjhgjhgjhg', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(12, '2015-07-24', 13, 2, 'credit'),
(13, '2016-07-12', 14, 1, 'cash'),
(14, '2016-07-14', 15, 1, 'cash');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
(16, 12, 2, 6, '120.00'),
(17, 13, 1, 1, '150.00'),
(18, 13, 4, 1, '410.00'),
(19, 14, 3, 1, '120.00'),
(20, 14, 8, 2, '21.32');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `account_id`, `date`, `Pay`, `dayswork`, `otrate`, `othrs`, `allow`, `advance`, `insurance`) VALUES
(1, 1, 'February', 500, 21, 400, 1, 210, 0, 2000),
(2, 2, 'February', 500, 51, 400, 4, 340, 210, 5000),
(3, 3, 'February', 300, 32, 150, 0, 100, 0, 2000),
(4, 4, 'February', 200, 12, 100, 2, 200, 500, 2000),
(5, 5, 'February', 300, 34, 150, 3, 0, 4, 2000),
(6, 6, 'February', 200, 12, 100, 4, 300, 0, 2000),
(7, 7, 'February', 300, 32, 150, 5, 100, 0, 2000),
(8, 1, 'January', 851, 200, 250, 21, 500, 299, 3000),
(9, 2, 'January', 851, 150, 250, 24, 350, 210, 3000),
(10, 3, 'January', 550, 123, 50, 13, 100, 100, 3000),
(11, 4, 'January', 200, 100, 50, 32, 300, 500, 3000),
(12, 5, 'January', 550, 50, 50, 42, 150, 4, 3000),
(13, 6, 'January', 200, 213, 50, 32, 300, 500, 3000),
(14, 7, 'January', 550, 120, 50, 21, 100, 22, 3000),
(15, 1, 'March', 851, 300, 250, 21, 500, 299, 3000),
(16, 2, 'March', 851, 200, 250, 24, 350, 210, 3000),
(17, 3, 'March', 550, 123, 50, 13, 100, 100, 3000),
(18, 4, 'March', 200, 230, 50, 32, 300, 500, 3000),
(19, 5, 'March', 550, 140, 50, 42, 150, 4, 3000),
(20, 6, 'March', 200, 210, 50, 32, 300, 500, 3000),
(21, 7, 'March', 550, 150, 50, 21, 100, 22, 3000),
(22, 1, 'April', 851, 300, 250, 21, 500, 299, 3000),
(23, 2, 'April', 851, 200, 250, 24, 350, 210, 3000),
(24, 3, 'April', 550, 123, 50, 13, 100, 100, 3000),
(25, 4, 'April', 200, 230, 50, 32, 300, 500, 3000),
(26, 5, 'April', 550, 140, 50, 42, 150, 4, 3000),
(27, 6, 'April', 200, 210, 50, 32, 300, 500, 3000),
(28, 7, 'April', 550, 150, 50, 21, 100, 22, 3000),
(29, 1, 'May', 851, 300, 250, 21, 500, 299, 3000),
(30, 2, 'May', 851, 200, 250, 24, 350, 210, 3000),
(31, 3, 'May', 550, 123, 50, 13, 100, 100, 3000),
(32, 4, 'May', 200, 230, 50, 32, 300, 500, 3000),
(33, 5, 'May', 550, 140, 50, 42, 150, 523, 3000),
(34, 6, 'May', 200, 210, 50, 32, 300, 500, 3000),
(35, 7, 'May', 550, 150, 50, 21, 100, 22, 3000),
(36, 1, 'June', 851, 300, 250, 21, 500, 299, 3000),
(37, 2, 'June', 851, 200, 250, 24, 350, 210, 3000),
(38, 3, 'June', 550, 123, 50, 13, 100, 100, 3000),
(39, 4, 'June', 200, 230, 50, 32, 300, 500, 3000),
(40, 5, 'June', 550, 140, 50, 42, 150, 523, 3000),
(41, 6, 'June', 200, 210, 50, 32, 300, 500, 3000),
(42, 7, 'June', 550, 150, 50, 12, 100, 22, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pay_scale_14`
--

CREATE TABLE IF NOT EXISTS `pay_scale_14` (
`grade` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `pay_scale` int(20) NOT NULL,
  `basic` int(20) NOT NULL,
  `hr` int(20) NOT NULL,
  `medical` int(20) NOT NULL,
  `conveyance` int(20) NOT NULL,
  `cpf` int(20) NOT NULL,
  `gia` int(20) NOT NULL,
  `bf` int(20) NOT NULL,
  `gross_total` int(20) NOT NULL,
  `ded_cpf_tmss` int(20) NOT NULL,
  `ded_cpf_self` int(20) NOT NULL,
  `ded_cpf_total` int(20) NOT NULL,
  `ded_gia_tmss` int(20) NOT NULL,
  `ded_gia_self` int(20) NOT NULL,
  `ded_gia_total` int(20) NOT NULL,
  `ded_bf_tmss` int(20) NOT NULL,
  `ded_bf_self` int(20) NOT NULL,
  `ded_bf_total` int(20) NOT NULL,
  `ded_total` int(20) NOT NULL,
  `net_pay` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pay_scale_14`
--

INSERT INTO `pay_scale_14` (`grade`, `designation`, `pay_scale`, `basic`, `hr`, `medical`, `conveyance`, `cpf`, `gia`, `bf`, `gross_total`, `ded_cpf_tmss`, `ded_cpf_self`, `ded_cpf_total`, `ded_gia_tmss`, `ded_gia_self`, `ded_gia_total`, `ded_bf_tmss`, `ded_bf_self`, `ded_bf_total`, `ded_total`, `net_pay`) VALUES
(1, 'ED', 129500, 74000, 70300, 0, 7400, 7400, 740, 740, 17538, 7400, 3700, 11100, 740, 370, 1110, 740, 370, 1110, 13320, 162060),
(2, 'DED', 87500, 50000, 45000, 10000, 5000, 5000, 500, 500, 116000, 5000, 2500, 7500, 500, 250, 750, 500, 250, 750, 9000, 107000),
(3, 'D', 66500, 38000, 32300, 7600, 3800, 3800, 380, 380, 86260, 3800, 1900, 5700, 380, 190, 570, 380, 190, 570, 6840, 79420),
(4, 'JD', 48125, 27500, 22000, 5500, 2750, 2750, 275, 275, 61050, 2750, 1375, 4125, 275, 138, 413, 275, 138, 413, 4950, 56100),
(5, 'DD', 40250, 23000, 18400, 4600, 2300, 2300, 230, 230, 51060, 2300, 1150, 3450, 230, 115, 345, 230, 115, 345, 4140, 46920),
(6, 'SAD', 32375, 18500, 14800, 0, 1850, 1850, 185, 185, 41070, 1850, 925, 2775, 185, 93, 278, 185, 93, 278, 3330, 37740),
(7, 'AD', 28875, 16500, 13200, 3300, 1650, 1650, 165, 165, 36630, 1650, 825, 2475, 165, 83, 248, 165, 83, 248, 2970, 33660),
(8, 'SZM', 20125, 11500, 5750, 2300, 1150, 1150, 115, 115, 22080, 1150, 575, 1725, 115, 58, 173, 115, 58, 173, 2070, 20010),
(9, 'ZM', 18375, 10500, 5250, 2100, 1050, 1050, 105, 105, 20160, 1050, 525, 1575, 105, 53, 158, 105, 53, 158, 1890, 18270),
(10, 'AZM', 16625, 9500, 4750, 1900, 950, 950, 95, 95, 18240, 950, 475, 1425, 95, 48, 143, 95, 48, 143, 1710, 16530),
(11, 'AM', 15400, 8800, 4400, 1760, 880, 880, 88, 88, 16896, 880, 440, 1320, 88, 44, 132, 88, 44, 132, 1584, 15312),
(12, 'AAM', 14700, 8400, 4200, 1680, 840, 840, 84, 84, 16128, 840, 420, 1260, 84, 42, 126, 84, 42, 126, 1512, 14616),
(13, 'DAM', 13825, 7900, 3950, 1580, 790, 790, 79, 79, 15168, 790, 395, 1185, 79, 40, 119, 79, 40, 119, 1422, 13746),
(14, 'JAM', 13125, 7500, 3750, 1500, 750, 750, 75, 75, 14400, 750, 375, 1125, 75, 38, 113, 75, 38, 113, 1350, 13050),
(15, 'SBM', 11900, 6800, 3400, 1360, 680, 680, 68, 68, 13056, 680, 340, 1020, 68, 34, 102, 68, 34, 102, 1224, 11832),
(16, 'DSBM', 11200, 6400, 3200, 1280, 640, 640, 64, 64, 12288, 640, 320, 960, 64, 32, 96, 64, 32, 96, 1152, 11136),
(17, 'BM', 10500, 6000, 3000, 1200, 600, 600, 60, 60, 11520, 600, 300, 900, 60, 30, 90, 60, 30, 90, 1080, 10440),
(18, 'ABM', 9800, 5600, 2800, 1120, 560, 560, 56, 56, 10752, 560, 280, 840, 56, 28, 84, 56, 28, 84, 1008, 9744),
(19, 'SS', 8575, 4900, 2450, 980, 490, 490, 49, 49, 9408, 490, 245, 735, 49, 25, 74, 49, 25, 74, 882, 8526),
(20, 'DSS', 8050, 4600, 2300, 920, 460, 460, 46, 46, 8832, 460, 230, 690, 46, 23, 69, 46, 23, 69, 828, 8004),
(21, 'FS', 7700, 4400, 2200, 880, 440, 440, 44, 44, 8448, 440, 220, 660, 44, 22, 66, 44, 22, 66, 792, 7656),
(22, 'AFS', 7000, 4000, 2000, 800, 400, 400, 40, 40, 7680, 400, 200, 600, 40, 20, 60, 40, 20, 60, 720, 6960),
(23, 'SVO', 5950, 3400, 1700, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE IF NOT EXISTS `percentage` (
`id` int(11) NOT NULL,
  `item` varchar(11) NOT NULL,
  `percent` double(11,0) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `item`, `percent`) VALUES
(1, 'medical', 20),
(2, 'conveyance', 10),
(3, 'cpf', 10),
(4, 'gia', 5),
(5, 'bf', 1),
(6, 'ded_cpf_tms', 10),
(7, 'ded_cpf_sel', 5),
(8, 'ded_gia_tms', 1),
(9, 'ded_gia_sel', 1),
(10, 'ded_bf_tmss', 1),
(11, 'ded_bf_self', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id` int(11) NOT NULL,
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`) VALUES
(1, 'Administrator'),
(2, 'Accounting'),
(3, 'Employee'),
(4, 'dotdot\r\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `brand_id`, `Quantity`, `price`, `status`) VALUES
(1, 'Hoodie', 1, 2, 22, '150.00', 'Active'),
(2, 'Cargo Shorts', 1, 1, 54, '120.00', 'Active'),
(3, 'Skinny Jeans', 1, 1, 24, '120.00', 'Active'),
(4, 'Heavy Green Rock', 1, 1, 22, '410.00', 'Active'),
(5, 'High Heels 4inches', 2, 4, 15, '50.00', 'Active'),
(6, 'Kobe 2014', 1, 6, 21, '200.00', 'Active'),
(7, 'AProgrammer', 2, 3, 21, '21.00', 'Active'),
(8, 'A programmer', 1, 5, -1, '21.32', 'Active'),
(9, 'test', 1, 1, 0, '345555.00', 'Active');

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
-- Indexes for table `pay_scale_14`
--
ALTER TABLE `pay_scale_14`
 ADD PRIMARY KEY (`grade`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `pay_scale_14`
--
ALTER TABLE `pay_scale_14`
MODIFY `grade` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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

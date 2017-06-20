-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 11:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
`id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `dayswork` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `hr` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `conveyance` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `bf` int(11) NOT NULL,
  `gross_total` int(11) NOT NULL,
  `ded_cpf_tmss` int(11) NOT NULL,
  `ded_cpf_self` int(11) NOT NULL,
  `ded_cpf_total` int(11) NOT NULL,
  `ded_gia_tmss` int(11) NOT NULL,
  `ded_gia_self` int(11) NOT NULL,
  `ded_gia_total` int(11) NOT NULL,
  `ded_bf_tmss` int(11) NOT NULL,
  `ded_bf_self` int(11) NOT NULL,
  `ded_bf_total` int(11) NOT NULL,
  `ded_total` int(11) NOT NULL,
  `net_pay` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1086 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `account_id`, `date`, `dayswork`, `basic`, `hr`, `medical`, `conveyance`, `cpf`, `gia`, `bf`, `gross_total`, `ded_cpf_tmss`, `ded_cpf_self`, `ded_cpf_total`, `ded_gia_tmss`, `ded_gia_self`, `ded_gia_total`, `ded_bf_tmss`, `ded_bf_self`, `ded_bf_total`, `ded_total`, `net_pay`) VALUES
(1083, 1006, '2016-11-19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1084, 1007, '2016-11-19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1085, 1008, '2016-11-19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1086;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

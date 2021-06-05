-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 03:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `compony`
--

CREATE TABLE `compony` (
  `compony_id` varchar(5) NOT NULL,
  `compony_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compony`
--

INSERT INTO `compony` (`compony_id`, `compony_name`) VALUES
('001', 'Maruthi'),
('002', 'TATA'),
('003', 'Mahindra');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `phone_no` double NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp` int(11) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `working_hrs` int(11) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp`, `emp_name`, `designation`, `working_hrs`, `salary`) VALUES
(1, 'SREYAS P', 'manager', 15, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insur_id` varchar(15) NOT NULL,
  `plan` int(11) NOT NULL,
  `amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `model_no` varchar(10) NOT NULL,
  `model_name` varchar(20) NOT NULL,
  `compony_id` varchar(5) NOT NULL,
  `diesel/petrol` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model_no`, `model_name`, `compony_id`, `diesel/petrol`, `status`) VALUES
('1', 'sumo', '002', 'diesel', 'available'),
('1', 'Thar', '003', 'diesel', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `purchase details`
--

CREATE TABLE `purchase details` (
  `order_no` int(11) NOT NULL,
  `cust_no` int(11) NOT NULL,
  `model_no` varchar(10) NOT NULL,
  `insur_no` varchar(15) NOT NULL,
  `paid_amt` double NOT NULL,
  `emp` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compony`
--
ALTER TABLE `compony`
  ADD PRIMARY KEY (`compony_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insur_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`model_no`,`compony_id`),
  ADD KEY `compony_id` (`compony_id`);

--
-- Indexes for table `purchase details`
--
ALTER TABLE `purchase details`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `cust_no` (`cust_no`),
  ADD KEY `emp` (`emp`),
  ADD KEY `insur_no` (`insur_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `compony_id` FOREIGN KEY (`compony_id`) REFERENCES `compony` (`compony_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase details`
--
ALTER TABLE `purchase details`
  ADD CONSTRAINT `purchase details_ibfk_1` FOREIGN KEY (`cust_no`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase details_ibfk_2` FOREIGN KEY (`emp`) REFERENCES `employee` (`emp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase details_ibfk_3` FOREIGN KEY (`insur_no`) REFERENCES `insurance` (`insur_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

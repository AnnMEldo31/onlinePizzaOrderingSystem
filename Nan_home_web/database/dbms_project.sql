-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 10:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `Pizza_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `B_Price` decimal(10,2) NOT NULL,
  `B_Perks` int(11) NOT NULL,
  `Offer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cust_acct`
--

CREATE TABLE `cust_acct` (
  `Cust_ID` int(11) NOT NULL,
  `C_Name` varchar(30) NOT NULL,
  `C_Ph_No` bigint(10) NOT NULL,
  `C_Mail` varchar(50) NOT NULL,
  `C_Username` varchar(15) NOT NULL,
  `C_Password` varchar(15) NOT NULL,
  `C_Perks` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_acct`
--

INSERT INTO `cust_acct` (`Cust_ID`, `C_Name`, `C_Ph_No`, `C_Mail`, `C_Username`, `C_Password`, `C_Perks`) VALUES
(1, 'Bill', 9427274851, 'bill@gmail.com', 'billuser', 'Bill$123', NULL),
(3, 'Charlie', 8464947684, 'charlie31@gmail.com', 'charlie31', 'Charlie@135', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `c_address`
--

CREATE TABLE `c_address` (
  `Add_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `C_Pin_Code` int(6) NOT NULL,
  `C_Street_No` varchar(5) NOT NULL,
  `C_House_No` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `c_address`
--

INSERT INTO `c_address` (`Add_ID`, `Cust_ID`, `C_Pin_Code`, `C_Street_No`, `C_House_No`) VALUES
(1, 1, 64537, '4278', '88A'),
(2, 1, 650007, '5859', '97C');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `Ingr_ID` int(11) NOT NULL,
  `In_Name` varchar(40) NOT NULL,
  `In_Type` enum('crust','topping','cheese','sauce') NOT NULL,
  `In_Qty` int(11) NOT NULL,
  `In_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `Pizza_ID` int(11) NOT NULL,
  `Ingr_ID` int(11) NOT NULL,
  `Amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `O_Date_Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Total_Price` decimal(10,2) NOT NULL,
  `Total_Perks` int(11) DEFAULT NULL,
  `O_House_No` int(5) NOT NULL,
  `O_Street_No` int(5) NOT NULL,
  `O_Pin_Code` int(6) NOT NULL,
  `O_Mail` varchar(50) NOT NULL,
  `Contact_No` bigint(10) NOT NULL,
  `Pay` enum('cash','gpay') NOT NULL,
  `Total_Orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`Pizza_ID`),
  ADD KEY `custf3` (`Cust_ID`),
  ADD KEY `orderid1` (`Order_ID`);

--
-- Indexes for table `cust_acct`
--
ALTER TABLE `cust_acct`
  ADD PRIMARY KEY (`Cust_ID`);

--
-- Indexes for table `c_address`
--
ALTER TABLE `c_address`
  ADD PRIMARY KEY (`Add_ID`),
  ADD KEY `custf1` (`Cust_ID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`Ingr_ID`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`Pizza_ID`,`Ingr_ID`),
  ADD KEY `ingrid1` (`Ingr_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `custf2` (`Cust_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `Pizza_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_acct`
--
ALTER TABLE `cust_acct`
  MODIFY `Cust_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c_address`
--
ALTER TABLE `c_address`
  MODIFY `Add_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `Ingr_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD CONSTRAINT `custf3` FOREIGN KEY (`Cust_ID`) REFERENCES `cust_acct` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_address`
--
ALTER TABLE `c_address`
  ADD CONSTRAINT `custf1` FOREIGN KEY (`Cust_ID`) REFERENCES `cust_acct` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `needs`
--
ALTER TABLE `needs`
  ADD CONSTRAINT `ingrid1` FOREIGN KEY (`Ingr_ID`) REFERENCES `ingredients` (`Ingr_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pizzaid1` FOREIGN KEY (`Pizza_ID`) REFERENCES `bill_items` (`Pizza_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `custf2` FOREIGN KEY (`Cust_ID`) REFERENCES `cust_acct` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

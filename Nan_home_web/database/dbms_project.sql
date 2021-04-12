-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 08:33 AM
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
  `In_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`Ingr_ID`, `In_Name`, `In_Type`, `In_Qty`, `In_Price`) VALUES
(1, 'Salami', 'topping', 100, '35.00'),
(2, 'Pepperoni', 'topping', 100, '30.00'),
(3, 'Bacon', 'topping', 100, '35.00'),
(4, 'Chicken', 'topping', 100, '40.00'),
(5, 'Ham', 'topping', 100, '30.00'),
(6, 'Sausage', 'topping', 100, '40.00'),
(7, 'Tomato', 'topping', 100, '20.00'),
(8, 'Onion', 'topping', 100, '25.00'),
(9, 'Pineapple', 'topping', 100, '30.00'),
(10, 'Jalepeno', 'topping', 100, '30.00'),
(11, 'Bell Pepper', 'topping', 100, '25.00'),
(12, 'Mushroom', 'topping', 100, '35.00'),
(13, 'neopolitan', 'sauce', 100, '45.00'),
(14, 'betchamel', 'sauce', 100, '55.00'),
(15, 'motzerella', 'cheese', 100, '35.00'),
(16, 'cheddar', 'cheese', 100, '50.00'),
(17, 'thin', 'crust', 100, '50.00'),
(18, 'stuffed', 'crust', 100, '50.00'),
(19, 'vegan', 'crust', 100, '60.00'),
(20, 'thick', 'crust', 100, '55.00'),
(21, 'neopolitan', 'crust', 100, '45.00'),
(22, 'siscilian', 'crust', 100, '45.00'),
(23, 'focassia', 'crust', 100, '50.00'),
(24, 'pan', 'crust', 100, '55.00');

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `Pizza_ID` int(11) NOT NULL,
  `Ingr_ID` int(11) NOT NULL,
  `Amt` enum('less','extra','+','') NOT NULL
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
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Cust_ID`, `O_Date_Time`, `Total_Price`, `Total_Perks`, `O_House_No`, `O_Street_No`, `O_Pin_Code`, `O_Mail`, `Contact_No`, `Pay`, `Total_Orders`) VALUES
(47, 1, '2021-04-12 11:16:06', '0.00', NULL, 0, 0, 0, '', 0, 'cash', 0);

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
  MODIFY `Pizza_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `Ingr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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

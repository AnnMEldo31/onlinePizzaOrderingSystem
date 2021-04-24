-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 10:04 AM
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
-- Table structure for table `adm_acct`
--

CREATE TABLE `adm_acct` (
  `a_id` int(11) NOT NULL,
  `a_username` varchar(30) NOT NULL,
  `a_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_acct`
--

INSERT INTO `adm_acct` (`a_id`, `a_username`, `a_password`) VALUES
(1, 'Nan', 'Nann$1631');

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `Pizza_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `B_Price` decimal(10,2) NOT NULL,
  `Offer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`Pizza_ID`, `Cust_ID`, `Order_ID`, `B_Price`, `Offer_ID`) VALUES
(127, 1, 145, '215.00', 0),
(128, 1, 145, '195.00', 0),
(132, 1, 145, '225.00', 0),
(134, 4, 146, '185.00', 0),
(135, 4, 146, '200.00', 0),
(136, 4, 147, '240.00', 0),
(139, 4, 149, '200.00', 0);

--
-- Triggers `bill_items`
--
DELIMITER $$
CREATE TRIGGER `Del_Logs` AFTER DELETE ON `bill_items` FOR EACH ROW UPDATE orders SET Total_Orders = Total_Orders - 1 where Order_ID = old.Order_ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insert_Logs` AFTER INSERT ON `bill_items` FOR EACH ROW UPDATE orders SET Total_Orders = Total_Orders + 1 where Order_ID = new.Order_ID
$$
DELIMITER ;

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
  `C_Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_acct`
--

INSERT INTO `cust_acct` (`Cust_ID`, `C_Name`, `C_Ph_No`, `C_Mail`, `C_Username`, `C_Password`) VALUES
(1, 'Bill', 9427274851, 'bill@gmail.com', 'billuser', 'Bill$123'),
(3, 'Charlie', 8464947684, 'charlie31@gmail.com', 'charlie31', 'Charlie@135'),
(4, 'boopboop', 2755848394, 'nan@gmail.com', 'nann', 'Boop$1631');

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
(17, 'thin', 'crust', 100, '50.00'),
(18, 'stuffed', 'crust', 100, '50.00'),
(19, 'vegan', 'crust', 100, '60.00'),
(20, 'thick', 'crust', 100, '55.00'),
(21, 'neopolitan', 'crust', 100, '45.00'),
(22, 'siscilian', 'crust', 100, '45.00'),
(23, 'focassia', 'crust', 100, '50.00'),
(24, 'pan', 'crust', 100, '55.00'),
(25, 'neopolitan_less', 'sauce', 100, '45.00'),
(26, 'neopolitan_normal', 'sauce', 100, '55.00'),
(27, 'neopolitan_extra', 'sauce', 100, '65.00'),
(28, 'betchamel_less', 'sauce', 100, '35.00'),
(29, 'betchamel_normal', 'sauce', 100, '45.00'),
(30, 'betchamel_extra', 'sauce', 100, '55.00'),
(31, 'motzerella_less', 'cheese', 100, '35.00'),
(32, 'motzerella_normal', 'cheese', 100, '40.00'),
(33, 'motzerella_extra', 'cheese', 100, '45.00'),
(34, 'cheddar_less', 'cheese', 100, '40.00'),
(35, 'cheddar_normal', 'cheese', 100, '45.00'),
(36, 'cheddar_extra', 'cheese', 100, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `Pizza_ID` int(11) NOT NULL,
  `Ingr_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`Pizza_ID`, `Ingr_ID`) VALUES
(127, 2),
(127, 7),
(127, 8),
(127, 21),
(127, 26),
(127, 32),
(128, 8),
(128, 10),
(128, 19),
(128, 28),
(128, 35),
(132, 3),
(132, 4),
(132, 9),
(132, 10),
(132, 17),
(132, 18),
(132, 26),
(132, 32),
(132, 35),
(134, 9),
(134, 10),
(134, 18),
(134, 28),
(134, 32),
(135, 8),
(135, 12),
(135, 20),
(135, 29),
(135, 32),
(136, 1),
(136, 5),
(136, 6),
(136, 18),
(136, 29),
(136, 32),
(139, 4),
(139, 20),
(139, 26),
(139, 36);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `O_Date_Time` datetime DEFAULT NULL,
  `Total_Price` decimal(10,2) NOT NULL,
  `O_House_No` varchar(5) NOT NULL,
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

INSERT INTO `orders` (`Order_id`, `Cust_ID`, `O_Date_Time`, `Total_Price`, `O_House_No`, `O_Street_No`, `O_Pin_Code`, `O_Mail`, `Contact_No`, `Pay`, `Total_Orders`) VALUES
(145, 1, NULL, '620.00', '49', 3847, 600092, 'kri@gmail.com', 4959495039, 'cash', 0),
(146, 4, '2021-04-23 15:24:09', '385.00', '49', 3848, 600092, 'nann@gmail.com', 9327271539, 'gpay', 2),
(147, 4, '2021-04-23 15:43:18', '240.00', '69', 4969, 374994, 'kri@gmail.com', 8486486944, 'cash', 1),
(149, 4, '2021-04-23 21:49:10', '200.00', '40', 4594, 600092, 'rejr@gmail.com', 4959495039, 'cash', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_acct`
--
ALTER TABLE `adm_acct`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_user` (`a_username`);

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
  ADD PRIMARY KEY (`Cust_ID`),
  ADD UNIQUE KEY `C_Username` (`C_Username`);

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
-- AUTO_INCREMENT for table `adm_acct`
--
ALTER TABLE `adm_acct`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `Pizza_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `cust_acct`
--
ALTER TABLE `cust_acct`
  MODIFY `Cust_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `c_address`
--
ALTER TABLE `c_address`
  MODIFY `Add_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `Ingr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

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

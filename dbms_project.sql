-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 05:43 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `daily_orders` (OUT `d_ord` INT(5), IN `date` DATE)  SELECT COUNT(*) INTO d_ord FROM orders WHERE DATE(O_Date_Time)=date$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `daily_revenue` (OUT `d_rev` INT(10), IN `date` DATE)  select sum(total_price) into d_rev from orders where DATE(o_date_time)=date$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIngr` (IN `pID` INT)  SELECT needs.Pizza_ID In_Type, ": ", In_Name, bill_items.B_Price from ingredients, needs, bill_items where needs.Ingr_ID = ingredients.Ingr_ID AND needs.Pizza_ID = pID AND needs.Pizza_ID = bill_items.Pizza_ID$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calc_disc` (`total` INT(10), `dsc_id` INT(5)) RETURNS DECIMAL(10,2) BEGIN
DECLARE discount decimal(10,2);
DECLARE OD int(5);
SET OD = (SELECT Offer_Discount FROM offer_table WHERE dsc_id = Offer_ID);
SET discount = total * OD * 0.01;
RETURN discount;
END$$

DELIMITER ;

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
  `B_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`Pizza_ID`, `Cust_ID`, `Order_ID`, `B_Price`) VALUES
(134, 4, 146, '185.00'),
(135, 4, 146, '200.00'),
(136, 4, 147, '240.00'),
(139, 4, 149, '200.00'),
(178, 4, 169, '220.00'),
(179, 4, 169, '160.00'),
(180, 1, 170, '190.00'),
(182, 6, 171, '165.00'),
(183, 6, 171, '280.00'),
(184, 6, 171, '200.00');

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
DELIMITER $$
CREATE TRIGGER `deletefromcart` BEFORE DELETE ON `bill_items` FOR EACH ROW BEGIN
	UPDATE orders SET Total_Price = Total_Price - old.B_Price WHERE orders.Order_id = old.Order_ID;
    UPDATE orders SET Final_Price = Total_Price - (SELECT calc_disc((SELECT Total_Price FROM orders WHERE orders.Order_id = old.Order_ID), (SELECT Offer_ID from orders WHERE orders.Order_id = old.Order_ID))) WHERE orders.Order_id = old.Order_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertintocart` AFTER INSERT ON `bill_items` FOR EACH ROW BEGIN
	UPDATE orders SET Total_Price = Total_Price + new.B_Price WHERE orders.Order_id = new.Order_ID;
    UPDATE orders SET Final_Price = Total_Price - (SELECT calc_disc((SELECT Total_Price FROM orders WHERE orders.Order_id = new.Order_ID), (SELECT Offer_ID from orders WHERE orders.Order_id = new.Order_ID))) WHERE orders.Order_id = new.Order_id;
END
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
(1, 'Bill', 27732277732, 'bill_tarzan@gmail.com', 'billuser', 'billuserwasd'),
(3, 'Charlie', 8464947684, 'charlie31@gmail.com', 'charlie31', 'Charlie@135'),
(4, 'boopboop', 2755848394, 'nan@gmail.com', 'nann', 'Boop$1631'),
(5, 'Tarzan', 6537462432, 'tarzan@gmail.com', 'tartanformer', 'tartanformer123'),
(6, 'Ann', 6664442220, 'astrono@nasa.com', 'astronomer', 'astroboy');

-- --------------------------------------------------------

--
-- Table structure for table `c_address`
--

CREATE TABLE `c_address` (
  `Add_ID` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `C_Pin_Code` int(6) NOT NULL,
  `C_Street_No` int(5) NOT NULL,
  `C_House_No` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `c_address`
--

INSERT INTO `c_address` (`Add_ID`, `Cust_ID`, `C_Pin_Code`, `C_Street_No`, `C_House_No`) VALUES
(1, 1, 64537, 4278, '88A'),
(2, 1, 650007, 5859, '97C'),
(6, 1, 324534, 52, '34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `disp_cust`
-- (See below for the actual view)
--
CREATE TABLE `disp_cust` (
`cust_id` int(11)
,`c_name` varchar(30)
,`c_username` varchar(15)
,`c_mail` varchar(50)
,`c_ph_no` bigint(10)
);

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
(36, 'cheddar_extra', 'cheese', 100, '50.00'),
(37, 'none', 'topping', 0, '0.00');

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
(139, 36),
(178, 6),
(178, 12),
(178, 22),
(178, 30),
(178, 33),
(179, 9),
(179, 22),
(179, 29),
(179, 34),
(180, 2),
(180, 3),
(180, 18),
(180, 28),
(180, 32),
(182, 6),
(182, 18),
(182, 28),
(182, 32),
(183, 7),
(183, 8),
(183, 10),
(183, 12),
(183, 19),
(183, 27),
(183, 33),
(184, 6),
(184, 12),
(184, 20),
(184, 28),
(184, 31);

-- --------------------------------------------------------

--
-- Table structure for table `offer_table`
--

CREATE TABLE `offer_table` (
  `Offer_ID` int(11) NOT NULL,
  `Offer_Discount` int(5) NOT NULL,
  `Offer_Desc` varchar(50) NOT NULL,
  `Offer_Day` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_table`
--

INSERT INTO `offer_table` (`Offer_ID`, `Offer_Discount`, `Offer_Desc`, `Offer_Day`) VALUES
(0, 0, 'None', 'NULL'),
(1, 50, 'Monday Offer: 50% off', 'monday'),
(2, 20, 'Tuesday Offer: 20% off', 'tuesday'),
(3, 30, 'Friday Offer: 30% off', 'friday');

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
  `Total_Orders` int(11) NOT NULL,
  `Final_Price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `offer_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Cust_ID`, `O_Date_Time`, `Total_Price`, `O_House_No`, `O_Street_No`, `O_Pin_Code`, `O_Mail`, `Contact_No`, `Pay`, `Total_Orders`, `Final_Price`, `offer_id`) VALUES
(146, 4, '2021-04-22 15:24:09', '385.00', '49', 3848, 600092, 'nann@gmail.com', 9327271539, 'gpay', 2, '0.00', 0),
(147, 4, '2021-04-23 15:43:18', '240.00', '69', 4969, 374994, 'kri@gmail.com', 8486486944, 'cash', 1, '0.00', 0),
(149, 4, '2021-04-24 21:49:10', '200.00', '40', 4594, 600092, 'rejr@gmail.com', 4959495039, 'cash', 1, '0.00', 0),
(169, 4, '2021-04-26 19:24:30', '670.00', '23', 2531, 666123, 'billuser@gmail.com', 873483747348, 'gpay', 2, '190.00', 1),
(170, 1, '2021-04-26 17:50:37', '205.00', '11', 88, 637388, 'billuser@gmail.com', 367229478, 'cash', 1, '190.00', 0),
(171, 6, '2021-04-26 19:30:45', '205.00', '22', 7372, 777111, 'ann@something.com', 32425364, 'cash', 3, '645.00', 0);

-- --------------------------------------------------------

--
-- Structure for view `disp_cust`
--
DROP TABLE IF EXISTS `disp_cust`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `disp_cust`  AS SELECT `cust_acct`.`Cust_ID` AS `cust_id`, `cust_acct`.`C_Name` AS `c_name`, `cust_acct`.`C_Username` AS `c_username`, `cust_acct`.`C_Mail` AS `c_mail`, `cust_acct`.`C_Ph_No` AS `c_ph_no` FROM `cust_acct` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_acct`
--
ALTER TABLE `adm_acct`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `a_user` (`a_username`),
  ADD UNIQUE KEY `a_username` (`a_username`);

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
-- Indexes for table `offer_table`
--
ALTER TABLE `offer_table`
  ADD PRIMARY KEY (`Offer_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `custf2` (`Cust_ID`),
  ADD KEY `fk_offerid` (`offer_id`);

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
  MODIFY `Pizza_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `cust_acct`
--
ALTER TABLE `cust_acct`
  MODIFY `Cust_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `c_address`
--
ALTER TABLE `c_address`
  MODIFY `Add_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `Ingr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `offer_table`
--
ALTER TABLE `offer_table`
  MODIFY `Offer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

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
  ADD CONSTRAINT `custf2` FOREIGN KEY (`Cust_ID`) REFERENCES `cust_acct` (`Cust_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_offerid` FOREIGN KEY (`offer_id`) REFERENCES `offer_table` (`Offer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

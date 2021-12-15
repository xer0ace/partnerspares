-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 04:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppm_dbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `Username`, `Password`, `Last_Name`, `First_Name`, `picture`) VALUES
('Admin-000', 'Master_Admin', '$2y$10$RmmhPUs/wcc2UT7v9abOwOSAY59T00CR.hiXDh.yUBalmoGkWyuWq', 'Admin', 'Master', '6681-Mr_beans_holiday_ver2.jpg'),
('Admin-001', 'Demo_Admin', '$2y$10$JWvtPfJ66LZOrUF0r8F5qujwbnWvHX0v0ppdZM64Nz20fAhJUyQNa', 'admin', 'admin', 'admin-default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_best_seller`
--

CREATE TABLE `tbl_best_seller` (
  `Best_Seller_ID` varchar(20) NOT NULL,
  `Food_Item_ID` varchar(20) NOT NULL,
  `Category_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_best_seller`
--

INSERT INTO `tbl_best_seller` (`Best_Seller_ID`, `Food_Item_ID`, `Category_ID`) VALUES
('Best-Seller-03', 'Food-0002', 'Category-03'),
('Best-Seller-04', 'Food-0004', 'Category-01'),
('Best-Seller-05', 'Food-0006', 'Category-02'),
('Best-Seller-06', 'Food-0008', 'Category-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `Cart_ID` varchar(20) NOT NULL,
  `Food_Item_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(50) NOT NULL,
  `Date_Added` date NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`Cart_ID`, `Food_Item_ID`, `Client_ID`, `Date_Added`, `Status`) VALUES
('Cart-21-12-04-0010', 'Food-0006', 'Client-0001', '2021-12-04', 'Sold'),
('Cart-21-12-04-0013', 'Food-0001', 'Client-0001', '2021-12-04', 'Sold'),
('Cart-21-12-04-0014', 'Food-0002', 'Client-0001', '2021-12-04', 'Sold'),
('Cart-21-12-04-0015', 'Food-0001', 'Client-0001', '2021-12-04', 'Sold'),
('Cart-21-12-06-0001', 'Food-0001', 'Client-0001', '2021-12-06', 'Sold'),
('Cart-21-12-06-0002', 'Food-0002', 'Client-0001', '2021-12-06', 'Sold'),
('Cart-21-12-06-0003', 'Food-0001', 'Client-0001', '2021-12-06', 'Sold'),
('Cart-21-12-06-0004', 'Food-0002', 'Client-0001', '2021-12-06', 'Sold'),
('Cart-21-12-08-0001', 'Food-0001', 'Client-0001', '2021-12-08', 'Sold'),
('Cart-21-12-08-0002', 'Food-0002', 'Client-0001', '2021-12-08', 'Sold'),
('Cart-21-12-12-0001', 'Food-0001', 'Client-0001', '2021-12-12', 'Pending'),
('Cart-21-12-12-0002', 'Food-0002', 'Client-0001', '2021-12-12', 'Pending'),
('Cart-21-12-13-0001', 'Food-0001', 'Client-0001', '2021-12-13', 'To Pay'),
('Cart-21-12-13-0002', 'Food-0002', 'Client-0001', '2021-12-13', 'To Pay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Category_ID` varchar(20) NOT NULL,
  `Category_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Category_ID`, `Category_Name`) VALUES
('Category-01', 'House Specialties'),
('Category-02', 'Congee'),
('Category-03', 'Noodles'),
('Category-04', 'Soup'),
('Category-05', 'Pinoy Toppings'),
('Category-06', 'Rice Toppings');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `Client_ID` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Municipality_City` varchar(255) NOT NULL,
  `Barangay` varchar(50) NOT NULL,
  `Street_Purok` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`Client_ID`, `Username`, `Password`, `Last_Name`, `First_Name`, `Contact`, `Municipality_City`, `Barangay`, `Street_Purok`, `picture`) VALUES
('Client-0001', 'Demo1234', '$2y$10$fis7gLdSm7VsIF3jMrCp0Ol8E3fxD54NPOGjAWpTDYEsMUP.IYSme', 'dela Cruz', 'Juan', '325-15978', 'Tumauini', 'Karpintero', 'Purok 4', '2082-Mr_beans_holiday_ver2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_tracing`
--

CREATE TABLE `tbl_contact_tracing` (
  `Contact_Tracing_ID` varchar(50) NOT NULL,
  `Client_ID` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Fever` varchar(10) NOT NULL,
  `Colds` varchar(10) NOT NULL,
  `Pain` varchar(10) NOT NULL,
  `Throat` varchar(10) NOT NULL,
  `Socialized` varchar(10) NOT NULL,
  `Patient` varchar(10) NOT NULL,
  `Traveled` varchar(10) NOT NULL,
  `Traveled_Local` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact_tracing`
--

INSERT INTO `tbl_contact_tracing` (`Contact_Tracing_ID`, `Client_ID`, `Date`, `Time`, `Fever`, `Colds`, `Pain`, `Throat`, `Socialized`, `Patient`, `Traveled`, `Traveled_Local`) VALUES
('Contact-Tracing-21-12-06-0001', 'Client-0001', '2021-12-06', '10:57:45', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
('Contact-Tracing-21-12-08-0001', 'Client-0001', '2021-12-08', '11:39:59', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
('Contact-Tracing-21-12-09-0001', 'Client-0001', '2021-12-09', '10:26:17', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
('Contact-Tracing-21-12-12-0001', 'Client-0001', '2021-12-12', '01:42:55', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
('Contact-Tracing-21-12-13-0001', 'Client-0001', '2021-12-13', '10:08:25', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dine_table`
--

CREATE TABLE `tbl_dine_table` (
  `Table_Number` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Capacity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dine_table`
--

INSERT INTO `tbl_dine_table` (`Table_Number`, `Status`, `Capacity`) VALUES
('Table-01', 'Occupied', '4'),
('Table-02', 'Occupied', '4'),
('Table-03', 'Occupied', '4'),
('Table-04', 'Occupied', '4'),
('Table-05', 'Occupied', '4'),
('Table-06', 'Available', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discounts`
--

CREATE TABLE `tbl_discounts` (
  `Discount_ID` varchar(20) NOT NULL,
  `Food_Item_ID` varchar(20) NOT NULL,
  `Percent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_discounts`
--

INSERT INTO `tbl_discounts` (`Discount_ID`, `Food_Item_ID`, `Percent`) VALUES
('Discount-001', 'Food-0001', '.5'),
('Discount-002', 'Food-0002', '.25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_grid_display`
--

CREATE TABLE `tbl_food_grid_display` (
  `Menu_ID` varchar(20) NOT NULL,
  `Food_Item_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food_grid_display`
--

INSERT INTO `tbl_food_grid_display` (`Menu_ID`, `Food_Item_ID`) VALUES
('Menu-01', 'Food-0001'),
('Menu-02', 'Food-0002'),
('Menu-03', 'Food-0003'),
('Menu-04', 'Food-0004'),
('Menu-05', 'Food-0005'),
('Menu-06', 'Food-0006'),
('Menu-07', 'Food-0007'),
('Menu-08', 'Food-0008');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_item_list`
--

CREATE TABLE `tbl_food_item_list` (
  `Food_Item_ID` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category_ID` varchar(20) NOT NULL,
  `Price` float NOT NULL,
  `Availability` varchar(20) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `Serving` varchar(10) NOT NULL,
  `Discount_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food_item_list`
--

INSERT INTO `tbl_food_item_list` (`Food_Item_ID`, `Name`, `Category_ID`, `Price`, `Availability`, `picture`, `Serving`, `Discount_Status`) VALUES
('Food-0001', 'Beef Pares', 'Category-01', 80, 'Yes', '2038-p3.png', '1', 'Yes'),
('Food-0002', 'Beef Mami with Egg', 'Category-03', 90, 'Yes', '1082-p1.png', '1', 'Yes'),
('Food-0003', 'Special Bulalo', 'Category-01', 150, 'Yes', '5238-p2.png', '1', 'No'),
('Food-0004', 'Sizzling Sisig', 'Category-01', 100, 'Yes', '2955-p7.png', '2', 'No'),
('Food-0005', 'Tapsilog', 'Category-01', 70, 'Yes', '3281-p8.png', '1', 'No'),
('Food-0006', 'Siopao', 'Category-02', 30, 'Yes', '1604-p4.png', '1', 'No'),
('Food-0007', 'Siomai (4 pieces)', 'Category-01', 30, 'Yes', '4954-p5.png', '1', 'No'),
('Food-0008', 'Goto', 'Category-04', 40, 'Yes', '1040-p6.png', '1', 'No'),
('Food-0009', 'Pancit', 'Category-01', 50, 'Yes', 'default.png', '2', 'No'),
('Food-0010', 'Takoyaki', 'Category-02', 50, 'Yes', 'default.png', '2', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_inputs`
--

CREATE TABLE `tbl_form_inputs` (
  `Contact_Tracing_ID` varchar(50) NOT NULL,
  `Client_ID` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Lagnat` varchar(10) NOT NULL,
  `Ubo/sipon` varchar(10) NOT NULL,
  `Pananakit` varchar(10) NOT NULL,
  `Lalamunan` varchar(10) NOT NULL,
  `Nakasalamuha` varchar(10) NOT NULL,
  ` Pasyente` varchar(10) NOT NULL,
  `Lumipad` varchar(10) NOT NULL,
  `Nagbiyahe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health_declaration`
--

CREATE TABLE `tbl_health_declaration` (
  `Details_ID` varchar(20) NOT NULL,
  `Topic` varchar(20) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_health_declaration`
--

INSERT INTO `tbl_health_declaration` (`Details_ID`, `Topic`, `Description`) VALUES
('Health-001', 'Lagnat', 'May lagnat ka ba?'),
('Health-002', 'Ubo/sipon', 'May ubo ka ba o sipon?'),
('Health-003', 'Pananakit', ' Pananakit ng katawan?'),
('Health-004', 'Lalamunan', 'Pananakit ng lalamunan/masakit lumunok?'),
('Health-005', 'Nakasalamuha', 'May nakasalamuha ka ba na probable o kumpirmadong pasyente na may COVID-19 case mula sa isang metrong distansya o mas malapit pa at tumagal ng  mahigit 15 minuto sa nakalipas na 14 na araw?'),
('Health-006', ' Pasyente', 'Nag alaga ka ba ng probable o kumpirmadong pasyente na may COVID-19 ng hindi nakasuot ng tamang personal equipment sa nakalipas na 14 na araw?'),
('Health-007', 'Lumipad', 'Ikaw ba ay nagbyahe sa labas ng Pilipinas sa nakalipas na 14 na araw?'),
('Health-008', 'Nagbiyahe', 'Ikaw ba ay nagbyahe sa labas ng iyong lungsod/munisipyo sa nakalipas na 14 na araw?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_list`
--

CREATE TABLE `tbl_menu_list` (
  `Menu_ID` varchar(20) NOT NULL,
  `Food_Item_ID` varchar(20) NOT NULL,
  `Menu_Number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu_list`
--

INSERT INTO `tbl_menu_list` (`Menu_ID`, `Food_Item_ID`, `Menu_Number`) VALUES
('Item-01', 'Food-0001', 'Menu-01'),
('Item-02', 'Food-0002', 'Menu-01'),
('Item-03', '', 'Menu-01'),
('Item-04', '', 'Menu-01'),
('Item-05', '', 'Menu-01'),
('Item-06', 'Food-0003', 'Menu-02'),
('Item-07', 'Food-0004', 'Menu-02'),
('Item-08', '', 'Menu-02'),
('Item-09', '', 'Menu-02'),
('Item-10', '', 'Menu-02'),
('Item-11', 'Food-0005', 'Menu-03'),
('Item-12', 'Food-0006', 'Menu-03'),
('Item-13', '', 'Menu-03'),
('Item-14', '', 'Menu-03'),
('Item-15', '', 'Menu-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending_orders`
--

CREATE TABLE `tbl_pending_orders` (
  `Pending_Orders_ID` varchar(50) NOT NULL,
  `Client_ID` varchar(50) NOT NULL,
  `Items` text NOT NULL,
  `Item_Quantity` varchar(20) NOT NULL,
  `Total` varchar(20) NOT NULL,
  `Date_Added` date NOT NULL,
  `Time_Added` time NOT NULL,
  `proof_picture` varchar(255) NOT NULL,
  `Payment_Status` varchar(20) NOT NULL,
  `Order_Status` varchar(20) NOT NULL,
  `Dine_Method` varchar(20) NOT NULL,
  `Table_Number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pending_orders`
--

INSERT INTO `tbl_pending_orders` (`Pending_Orders_ID`, `Client_ID`, `Items`, `Item_Quantity`, `Total`, `Date_Added`, `Time_Added`, `proof_picture`, `Payment_Status`, `Order_Status`, `Dine_Method`, `Table_Number`) VALUES
('Order-Food-PPM-ID-21-12-04-0002', 'Client-0001', '4x - Siopao | ₱30.00 x 4 = ₱120', '4', '120.00', '2021-12-04', '09:28:00', 'Cash-on-Delivery.jpg', 'Not Paid', 'Pending', 'Delivery', 'Delivery - No Table'),
('Order-Food-PPM-ID-21-12-04-0003', 'Client-0001', '1x Beef Pares | ₱80 x 1 = ₱80<br>3x - Beef Mami with Egg | ₱90.00 x 3 = ₱270', '4', '350.00', '2021-12-04', '09:45:11', '8168-slide-3.jpg', 'Paid', 'Pending', 'Dine In', 'Table-04'),
('Order-Food-PPM-ID-21-12-06-0001', 'Client-0001', '1x Beef Pares | ₱80 x 1 = ₱80<br>1x Beef Mami with Egg | ₱90 x 1 = ₱90', '2', '170', '2021-12-06', '12:18:27', '2945-xS7ej6R.png', 'Paid', 'Pending', 'Dine In', 'Table-05'),
('Order-Food-PPM-ID-21-12-06-0002', 'Client-0001', '1x Beef Pares | ₱80 x 1 = ₱80<br>\n1x Beef Mami with Egg | ₱90 x 1 = ₱90', '2', '170', '2021-12-06', '12:22:40', 'Cash-on-Delivery.jpg', 'Not Paid', 'Pending', 'Delivery', 'Delivery - No Table'),
('Order-Food-PPM-ID-21-12-12-0001', 'Client-0001', '1x Beef Pares | ₱80 x 1 = ₱80<br>1x Beef Mami with Egg | ₱90 x 1 = ₱90', '2', '170', '2021-12-12', '10:14:01', '9812-frame.png', 'Paid', 'Pending', 'Delivery', 'Delivery - No Table'),
('Pending-Food-ID-21-12-04-0001', 'Client-0001', '4x - Siomai (4 pieces) | ₱30.00 x 4 = ₱120', '4', '120.00', '2021-12-04', '09:25:55', 'Cancelled-order.jpg', 'Cancelled', 'Cancelled', 'Cancelled', 'Cancelled'),
('Pending-Food-ID-21-12-04-0002', 'Client-0001', '3x - Beef Pares | ₱80.00 x 3 = ₱240<br>2x - Beef Mami with Egg | ₱90.00 x 2 = ₱180', '5', '420.00', '2021-12-04', '09:42:16', 'Cancelled-order.jpg', 'Cancelled', 'Cancelled', 'Cancelled', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms_and_conditions`
--

CREATE TABLE `tbl_terms_and_conditions` (
  `Terms_ID` varchar(50) NOT NULL,
  `Client_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_terms_and_conditions`
--

INSERT INTO `tbl_terms_and_conditions` (`Terms_ID`, `Client_ID`) VALUES
('Terms-ID-0001', 'Client-0001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_to_pay`
--

CREATE TABLE `tbl_to_pay` (
  `To_Pay_ID` varchar(20) NOT NULL,
  `Client_ID` varchar(50) NOT NULL,
  `To_Pay_Items` text NOT NULL,
  `Item_Quantity` varchar(20) NOT NULL,
  `Sub_Total` varchar(20) NOT NULL,
  `Date_Added` date NOT NULL,
  `Dine_Method` varchar(20) NOT NULL,
  `Table_Number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_to_pay`
--

INSERT INTO `tbl_to_pay` (`To_Pay_ID`, `Client_ID`, `To_Pay_Items`, `Item_Quantity`, `Sub_Total`, `Date_Added`, `Dine_Method`, `Table_Number`) VALUES
('To-Pay-21-12-12-0001', 'Client-0001', '2x - Beef Pares | ₱40.00 x 2 = ₱80<br>\n1x - Beef Mami with Egg | ₱67.50 x 1 = ₱67.5', '3', '147.50', '2021-12-12', 'Delivery', 'Delivery - No Table');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `tbl_best_seller`
--
ALTER TABLE `tbl_best_seller`
  ADD PRIMARY KEY (`Best_Seller_ID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`Client_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `tbl_contact_tracing`
--
ALTER TABLE `tbl_contact_tracing`
  ADD PRIMARY KEY (`Contact_Tracing_ID`);

--
-- Indexes for table `tbl_dine_table`
--
ALTER TABLE `tbl_dine_table`
  ADD PRIMARY KEY (`Table_Number`);

--
-- Indexes for table `tbl_discounts`
--
ALTER TABLE `tbl_discounts`
  ADD PRIMARY KEY (`Discount_ID`);

--
-- Indexes for table `tbl_food_grid_display`
--
ALTER TABLE `tbl_food_grid_display`
  ADD PRIMARY KEY (`Menu_ID`),
  ADD UNIQUE KEY `Menu_ID` (`Menu_ID`);

--
-- Indexes for table `tbl_food_item_list`
--
ALTER TABLE `tbl_food_item_list`
  ADD PRIMARY KEY (`Food_Item_ID`),
  ADD UNIQUE KEY `Food_Item_ID` (`Food_Item_ID`);

--
-- Indexes for table `tbl_form_inputs`
--
ALTER TABLE `tbl_form_inputs`
  ADD PRIMARY KEY (`Contact_Tracing_ID`);

--
-- Indexes for table `tbl_health_declaration`
--
ALTER TABLE `tbl_health_declaration`
  ADD PRIMARY KEY (`Details_ID`);

--
-- Indexes for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  ADD PRIMARY KEY (`Menu_ID`),
  ADD UNIQUE KEY `Menu_ID` (`Menu_ID`);

--
-- Indexes for table `tbl_pending_orders`
--
ALTER TABLE `tbl_pending_orders`
  ADD PRIMARY KEY (`Pending_Orders_ID`);

--
-- Indexes for table `tbl_terms_and_conditions`
--
ALTER TABLE `tbl_terms_and_conditions`
  ADD PRIMARY KEY (`Terms_ID`);

--
-- Indexes for table `tbl_to_pay`
--
ALTER TABLE `tbl_to_pay`
  ADD PRIMARY KEY (`To_Pay_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

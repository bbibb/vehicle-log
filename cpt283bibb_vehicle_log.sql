-- phpMyAdmin SQL Dump
-- version 
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2024 at 12:32 PM
-- Server version: 8.0.35-percona-sure1
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpt283bibb_vehicle_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `fuel_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `fuel_source` varchar(100) NOT NULL,
  `fuel_gallons` int NOT NULL,
  `fuel_cost` decimal(10,2) NOT NULL,
  `fuel_mileage` decimal(10,1) NOT NULL,
  `fuel_date` datetime NOT NULL,
  `fuel_date_modified` datetime DEFAULT NULL,
  `entry_user_ID` int DEFAULT NULL,
  `edit_user_ID` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fuel_id`, `vehicle_id`, `fuel_source`, `fuel_gallons`, `fuel_cost`, `fuel_mileage`, `fuel_date`, `fuel_date_modified`, `entry_user_ID`, `edit_user_ID`) VALUES
(1, 1, 'Spinx', 15, 2.69, 198.1, '2024-01-05 00:00:00', NULL, NULL, NULL),
(2, 12, 'Texaco', 12, 3.50, 150.0, '2024-04-02 10:38:02', NULL, NULL, NULL),
(3, 1, 'QT', 26, 3.68, 398.0, '2024-03-04 10:38:08', NULL, NULL, NULL),
(12, 2, 'Spinx', 13, 3.50, 123.0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(14, 11, 'QT', 12, 3.43, 143.0, '2024-04-02 00:00:00', NULL, NULL, NULL),
(15, 1, 'BP', 15, 3.69, 189.0, '2024-04-09 00:00:00', NULL, NULL, NULL),
(16, 13, '7 Eleven', 14, 3.29, 165.0, '2024-04-11 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance_id` int NOT NULL,
  `maintenance_type_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `maintenance_vendor` varchar(100) NOT NULL,
  `maintenance_description` varchar(255) NOT NULL,
  `maintenance_vendor_address` varchar(255) NOT NULL,
  `maintenance_cost` decimal(10,2) NOT NULL,
  `maintenance_mileage` decimal(10,1) NOT NULL,
  `maintenance_date` datetime NOT NULL,
  `maintenance_date_modified` datetime DEFAULT NULL,
  `entry_user_id` int DEFAULT NULL,
  `edit_user_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance_id`, `maintenance_type_id`, `vehicle_id`, `maintenance_vendor`, `maintenance_description`, `maintenance_vendor_address`, `maintenance_cost`, `maintenance_mileage`, `maintenance_date`, `maintenance_date_modified`, `entry_user_id`, `edit_user_id`) VALUES
(1, 14, 1, 'Ken\'s Auto', 'New Windshield', 'Furman Hall Rd, Greenville SC', 25.00, 123456.0, '2024-03-11 00:00:00', NULL, NULL, NULL),
(3, 10, 2, 'Jiffy Lube', 'Spark plugs and wires', 'Cherrydale Point, Greenville SC', 165.00, 23456.0, '2024-04-09 22:28:02', NULL, NULL, NULL),
(4, 2, 3, 'Jiffy Lube', 'Oil Change', 'Cherrydale Point, Greenville SC', 65.00, 165456.0, '2024-03-24 00:00:00', NULL, NULL, NULL),
(5, 4, 15, 'Test2', 'Test2', 'Test2', 22.00, 140000.0, '0000-00-00 00:00:00', NULL, NULL, NULL),
(9, 3, 13, 'Jiffy Lube', 'Oil Pan', 'Cherrydale Point', 23.45, 123456.0, '2024-02-28 00:00:00', NULL, NULL, NULL),
(10, 0, 14, 'Ken\'s Auto', 'Dent repairs', 'Furman Hall Road, Greenville SC', 256.34, 12345.0, '2024-04-09 00:00:00', NULL, NULL, NULL),
(11, 1, 11, 'Ken\'s Auto', 'tire rotation', 'Furman Hall Road, Greenville SC', 35.00, 20000.0, '2024-04-02 00:00:00', NULL, NULL, NULL),
(13, 2, 3, 'Harris Motors', 'Oil Change and Lube', '123 Elm St, Greenville SC', 122.65, 156000.0, '2024-04-01 00:00:00', NULL, NULL, NULL),
(14, 4, 13, 'Cedar Pete\'s', 'Wash and detail', 'Cedar Lane Road, Greenville', 26.95, 130400.0, '2024-03-31 00:00:00', NULL, NULL, NULL),
(15, 0, 14, 'Tesla dealer', 'Rotate tires', 'Woodruff Road', 135.00, 345.0, '2024-02-05 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_type`
--

CREATE TABLE `maintenance_type` (
  `maintenance_type_id` int NOT NULL,
  `maintenance_type` varchar(255) NOT NULL,
  `entry_user_ID` int NOT NULL,
  `edit_user_ID` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance_type`
--

INSERT INTO `maintenance_type` (`maintenance_type_id`, `maintenance_type`, `entry_user_ID`, `edit_user_ID`) VALUES
(1, 'Rotate tires', 0, 0),
(2, 'Oil change', 0, 0),
(3, 'Coolant flush', 0, 0),
(4, 'Wash and detail', 0, 0),
(8, 'Brake service', 0, 0),
(9, 'Air filter', 0, 0),
(10, 'Spark plug replacement', 0, 0),
(11, 'Transmission service', 0, 0),
(12, 'Battery replacement', 0, 0),
(13, 'Body repair', 0, 0),
(14, 'Window repair', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` char(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_role` varchar(26) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_lastlogin` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `entry_user_ID` int DEFAULT NULL,
  `edit_user_ID` int DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `user_role`, `date_created`, `date_lastlogin`, `date_modified`, `entry_user_ID`, `edit_user_ID`, `status`) VALUES
(1, 'Bryan', 'Bibb', 'bbibb', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'bdbibb@gmail.com', 'user', '2024-03-07 16:44:03', NULL, NULL, NULL, NULL, 0),
(2, 'John', 'Smith', 'jsmith', '$2y$10$uDDlwSOT7oOsXs2R30b4meIxQD1wmnDrO76mkfIXAg4GirWXMk4mu', 'test22@test.null', 'user', '2024-03-07 17:56:50', NULL, '2024-04-22 08:14:16', NULL, NULL, 1),
(3, 'Admin', 'Account', 'cpt283', '$2y$10$0oy6x.mrDxX5.wynGX3EA.sEIN4qUXINzPQWjf5ZiT17AGGksrHW.', 'admin5@test.null', 'admin', '2024-03-11 09:22:07', NULL, '2024-04-22 08:14:49', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int NOT NULL,
  `vehicle_class` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_year` int NOT NULL,
  `vehicle_year_purchased` int NOT NULL,
  `vehicle_color` varchar(50) NOT NULL,
  `vehicle_VIN` varchar(30) DEFAULT NULL,
  `vehicle_license_tag` varchar(100) NOT NULL,
  `vehicle_license_state` varchar(50) NOT NULL,
  `vehicle_purchase_price` decimal(10,2) NOT NULL,
  `vehicle_purchase_mileage` decimal(10,1) NOT NULL,
  `entry_user_ID` int DEFAULT NULL,
  `edit_user_ID` int NOT NULL,
  `vehicle_current_mileage` decimal(10,1) NOT NULL,
  `vehicle_make` varchar(100) NOT NULL,
  `record_status` int DEFAULT NULL,
  `image_file` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_class`, `vehicle_model`, `vehicle_year`, `vehicle_year_purchased`, `vehicle_color`, `vehicle_VIN`, `vehicle_license_tag`, `vehicle_license_state`, `vehicle_purchase_price`, `vehicle_purchase_mileage`, `entry_user_ID`, `edit_user_ID`, `vehicle_current_mileage`, `vehicle_make`, `record_status`, `image_file`) VALUES
(1, 'truck', 'Tundra', 2002, 2002, 'red', '19UUA66255A066573', 'cpt283', 'SC', 27000.00, 157.0, 1001, 1003, 155000.0, 'Toyota', NULL, 'uploads/2002-toyota-tundra-sr5.jpeg'),
(2, 'truck', 'Tundra', 2021, 2021, 'gray', '2A8HR54P18R702383', 'cpt187', 'SC', 48000.00, 6.0, 1001, 1001, 35344.0, 'Toyota', NULL, 'uploads/2021_toyota_tundra.jpg'),
(3, 'suv', 'Highlander', 2013, 2015, 'white', '3GCPCSE01BG225388', 'ist272', 'SC', 22505.00, 15000.0, 1002, 1002, 110345.0, 'Toyota', NULL, 'uploads/highlander.jpg'),
(14, 'truck', 'Cybertruck', 2024, 2024, 'silver', '3VW2K7AJ5EM275657', 'OUTATIME', 'SC', 79990.00, 4.0, NULL, 0, 620.0, 'Tesla', NULL, 'uploads/cybertruck.jpg'),
(15, 'Truck', 'Pickup', 1966, 1970, 'Purple', '1234567890', 'GTC-123', 'SC', 37000.00, 570.0, NULL, 0, 1500.0, 'Beaumobile', NULL, NULL),
(11, 'car', 'tC', 2014, 2022, 'blue', '3GSDL43N19S599833', 'IST278', 'SC', 10500.00, 98009.0, 1001, 1002, 104000.0, 'Scion', NULL, 'uploads/2016_scion_tc.jpeg'),
(12, 'car', '240', 1991, 2024, 'white', '1FMHK7D87CGA51847', 'EET112', 'SC', 6000.00, 138000.0, 1002, 1001, 142000.0, 'Volvo', NULL, 'uploads/28479602-1990-volvo-240-std.jpg'),
(13, 'suv', 'Wrangler', 2005, 2020, 'silver', '2A8HR54169R633896', 'ABC123', 'GA', 9500.00, 98000.0, 1003, 1003, 120000.0, 'Jeep', NULL, 'uploads/IMG_2767.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`fuel_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- Indexes for table `maintenance_type`
--
ALTER TABLE `maintenance_type`
  ADD PRIMARY KEY (`maintenance_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `fuel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `maintenance_type`
--
ALTER TABLE `maintenance_type`
  MODIFY `maintenance_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

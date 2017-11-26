-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2017 at 06:51 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royal_motors_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_expense`
--

CREATE TABLE `accounts_expense` (
  `entry_id` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `particulars` varchar(500) DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payment`
--

CREATE TABLE `accounts_payment` (
  `entry_id` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `particulars` varchar(500) DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_payment`
--

INSERT INTO `accounts_payment` (`entry_id`, `date`, `particulars`, `amount`) VALUES
('pay-599200af11cb5', '2017-08-01', 'Star Automobiles', 1780000),
('pay-599200f36b717', '2017-08-03', 'Global', 2300000),
('pay-59bd761608754', '2017-09-17', 'Star Automobiles', 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_profit_loss`
--

CREATE TABLE `accounts_profit_loss` (
  `entry_id` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `particulars` varchar(500) NOT NULL,
  `chassis_no` varchar(50) DEFAULT NULL,
  `profit` float DEFAULT NULL,
  `loss` float DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_profit_loss`
--

INSERT INTO `accounts_profit_loss` (`entry_id`, `date`, `particulars`, `chassis_no`, `profit`, `loss`, `remarks`) VALUES
('proloss-59bd7689953e', '2017-09-18', '', 'NZE161-', 100000, 0, 'profit');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_received`
--

CREATE TABLE `accounts_received` (
  `entry_id` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `particulars` varchar(500) DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_received`
--

INSERT INTO `accounts_received` (`entry_id`, `date`, `particulars`, `amount`) VALUES
('rec-59920158e0863', '2017-08-14', 'Axio Buyer', 1850000),
('rec-59920196601bc', '2017-08-15', 'Noah Buyer', 2390000),
('rec-59bd768994b84', '2017-09-18', 'Mr. XYZ', 1900000);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_vehicle_purchase`
--

CREATE TABLE `accounts_vehicle_purchase` (
  `entry_id` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `chassis_no` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `importer_name` varchar(500) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_vehicle_purchase`
--

INSERT INTO `accounts_vehicle_purchase` (`entry_id`, `date`, `chassis_no`, `amount`, `importer_name`, `status`) VALUES
('pay-599200af11cb5', '2017-08-01', 'NZE161-12123131', 1780000, 'Star Automobiles', ''),
('pay-599200f36b717', '2017-08-03', 'ZRR70-561543', 2300000, 'Global', ''),
('pay-59bd761608754', '2017-09-17', 'NZE161-', 1800000, 'Star Automobiles', 'sold');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_vehicle_sold`
--

CREATE TABLE `accounts_vehicle_sold` (
  `entry_id` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `chassis_no` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `customer_name` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_vehicle_sold`
--

INSERT INTO `accounts_vehicle_sold` (`entry_id`, `date`, `chassis_no`, `amount`, `customer_name`) VALUES
('rec-59920158e0863', '2017-08-14', 'NZE161-12123131', 1850000, 'Axio Buyer'),
('rec-59bd768994b84', '2017-09-18', 'NZE161-', 1900000, 'Mr. XYZ');

-- --------------------------------------------------------

--
-- Table structure for table `emp_list`
--

CREATE TABLE `emp_list` (
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_department` varchar(20) NOT NULL,
  `emp_designation` varchar(50) NOT NULL,
  `emp_phone` varchar(20) DEFAULT NULL,
  `emp_email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_list`
--

INSERT INTO `emp_list` (`emp_id`, `emp_name`, `emp_department`, `emp_designation`, `emp_phone`, `emp_email`) VALUES
('x', 'abcd', 'Account', 'o', '01676567772', 'a@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `uname` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`uname`, `password`, `emp_id`, `role`) VALUES
('sales', '$2y$10$12eO8C06zxo7DHklNkPMY.9cXk0skCPFc8vkXGdXzTwxjCHGO3I4W', 's1', 'Sales'),
('accounts', '$2y$10$aEtzvNiDo5BRV67Q0IfiweRJpUtFo6QulQK89hj0eBTxpvvtg0m7m', 'a1', 'Account'),
('admin', '$2y$10$e6qBhfko1Ox5pZPpEl4iquJckHbdS6sIhbWEATxGMVQ11T.xXuUvq', '1', 'Admin'),
('x', '$2y$10$Qc/fbjH68ff3vJywlm1YH.1WjGE5RWPG1lLZ/8iK5rEZgEWLh3NoS', 'x', 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `most_viewed`
--

CREATE TABLE `most_viewed` (
  `id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `view_counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `most_viewed`
--

INSERT INTO `most_viewed` (`id`, `model`, `view_counter`) VALUES
(7, 'Premio', 2),
(11, 'X Trail', 0),
(12, 'Prado', 0),
(13, 'Axio', 1),
(14, 'Allion', 0),
(15, 'Sport', 2),
(16, 'e350', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer_table`
--

CREATE TABLE `offer_table` (
  `id` varchar(20) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `file_no` varchar(100) NOT NULL,
  `view_counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_table`
--

INSERT INTO `offer_table` (`id`, `title`, `file_no`, `view_counter`) VALUES
('offer-59be863e6c779', '10% Discount on Premio 2017', '1', 0),
('offer-59be869728acf', '10% Discount on Noah 2012', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_inventory`
--

CREATE TABLE `vehicle_inventory` (
  `maker` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `chassis_no` varchar(50) NOT NULL,
  `engine_no` varchar(50) DEFAULT '-',
  `man_year` int(11) NOT NULL,
  `color` varchar(30) NOT NULL DEFAULT '-',
  `cc` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_inventory`
--

INSERT INTO `vehicle_inventory` (`maker`, `model`, `grade`, `chassis_no`, `engine_no`, `man_year`, `color`, `cc`) VALUES
('Honda', 'CV-R', 'X', 'RU1-1', 'ABC', 2013, 'Black', '2000'),
('Toyota', 'Axio', 'X', 'NZE141-12123131', '1NZE-123123123', 2012, 'silver', '1500'),
('Toyota', 'Prado', 'TX-L', 'TRZ260-1', 'ABC', 2013, 'Black', '2700'),
('Range Rover', 'Sport', 'HSE', 'rr-1', 'enrr', 2017, 'silver', '2000'),
('Nissan', 'X Trail', 'F', 'xtr-1', 'extr', 2014, 'Pearl', '2000'),
('Toyota', 'Premio', 'X', 'NZE260-1', '1NZE-645377', 2012, 'Black', '1500'),
('Toyota', 'Allion', 'G', 'NZT260-2', 'ahd', 2014, 'Black', '1500'),
('Mercedes', 'e350', 'premium', 'mm1-1', 'bbb', 2017, 'black', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_options`
--

CREATE TABLE `vehicle_options` (
  `chassis_no` varchar(50) NOT NULL,
  `engine_no` varchar(50) DEFAULT NULL,
  `shape` varchar(10) NOT NULL DEFAULT '-',
  `start` varchar(10) NOT NULL DEFAULT '-',
  `mileage` varchar(10) NOT NULL DEFAULT '-',
  `rim` varchar(10) NOT NULL DEFAULT '-',
  `wheel_option` varchar(10) NOT NULL DEFAULT '-',
  `meter` varchar(10) NOT NULL DEFAULT '-',
  `head_light` varchar(20) NOT NULL DEFAULT '-',
  `seat` varchar(20) NOT NULL DEFAULT '-',
  `seating_capacity` int(11) NOT NULL DEFAULT '0',
  `body_kit` varchar(25) DEFAULT '-',
  `transmission` varchar(20) DEFAULT NULL,
  `fuel` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_options`
--

INSERT INTO `vehicle_options` (`chassis_no`, `engine_no`, `shape`, `start`, `mileage`, `rim`, `wheel_option`, `meter`, `head_light`, `seat`, `seating_capacity`, `body_kit`, `transmission`, `fuel`) VALUES
('xtr-1', 'extr', 'New', 'Key Start', '100000', 'Alloy', '4WD', 'Normal', 'Normal', 'Fabric', 5, 'none', 'Automatic', 'Octen/Petrol'),
('rr-1', 'enrr', 'New', 'Push Start', '0', 'Alloy', '4WD', 'Digital', 'Projection HID', 'Leather', 5, 'none', 'Automatic', 'Octen/Petrol'),
('TRZ260-1', 'ABC', 'New', 'Key Start', '10000', 'Cap', '4WD', 'Optic', 'Projection HID', 'Fabric', 5, 'None', 'Automatic', 'Octen/Petrol'),
('NZE141-12123131', '1NZE-123123123', 'Old', 'Key Start', '55555', 'Cap', '4WD', 'Digital', 'Projection HID', 'Half Leather', 5, 'None', 'Manual', 'CNG'),
('RU1-1', 'ABC', 'Old', 'Key Start', '10000', 'Alloy', '2WD', 'Digital', 'Normal', 'Fabric', 5, 'None', 'Automatic', 'Octen/Petrol'),
('NZE260-1', '1NZE-645377', 'Old', 'Key Start', '20000', 'Cap', '4WD', 'Normal', 'HID', 'Half Leather', 8, 'None', 'Automatic', 'CNG'),
('NZT260-2', 'ahd', 'New', 'Push Start', '120000', 'Alloy', '2WD', 'Optic', 'HID', 'Half Leather', 5, 'none', 'Automatic', 'Octen/Petrol'),
('mm1-1', 'bbb', 'New', 'Push Start', '0', 'Alloy', '2WD', 'Digital', 'Projection HID', 'Leather', 5, '', 'Automatic', 'Octen/Petrol');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_other_options`
--

CREATE TABLE `vehicle_other_options` (
  `chassis_no` varchar(50) NOT NULL,
  `wooden_panel` varchar(20) DEFAULT NULL,
  `cruise_control` varchar(20) DEFAULT NULL,
  `high_floor` varchar(20) DEFAULT NULL,
  `rain_shed` varchar(20) DEFAULT NULL,
  `dvd_player` varchar(20) DEFAULT NULL,
  `back_camera` varchar(20) DEFAULT NULL,
  `four_cameras` varchar(20) DEFAULT NULL,
  `sunroof` varchar(20) DEFAULT NULL,
  `winker_mirror` varchar(20) DEFAULT NULL,
  `ac` varchar(20) DEFAULT NULL,
  `third_row_seats` varchar(20) DEFAULT NULL,
  `rear_ac` varchar(20) DEFAULT NULL,
  `air_bag` varchar(20) DEFAULT NULL,
  `high_roof` varchar(20) DEFAULT NULL,
  `low_roof` varchar(20) DEFAULT NULL,
  `wooden_steering` varchar(20) DEFAULT NULL,
  `low_floor` varchar(20) DEFAULT NULL,
  `roof_rail` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_other_options`
--

INSERT INTO `vehicle_other_options` (`chassis_no`, `wooden_panel`, `cruise_control`, `high_floor`, `rain_shed`, `dvd_player`, `back_camera`, `four_cameras`, `sunroof`, `winker_mirror`, `ac`, `third_row_seats`, `rear_ac`, `air_bag`, `high_roof`, `low_roof`, `wooden_steering`, `low_floor`, `roof_rail`) VALUES
('mm1-1', 'Wooden Panel', 'Cruise Control', '', '', 'DVD Player', '', '4 Camera', 'Sunroof', '', 'Built In AC', '', 'Rear AC', 'Air Bag', '', '', 'Wooden Stearing', '', ''),
('NZT260-2', '', 'Cruise Control', '', 'Rain Shed', 'DVD Player', 'Back Camera', '', '', 'Winker Mirror', 'Built In AC', '', '', 'Air Bag', '', '', '', '', ''),
('xtr-1', '', 'Cruise Control', '', 'Rain Shed', 'DVD Player', 'Back Camera', '', '', 'Winker Mirror', 'Built In AC', '', 'Rear AC', 'Air Bag', '', '', '', '', 'Roof Rail'),
('TRZ260-1', 'Wooden Panel', '', 'High Floor', '', '', 'Back Camera', '4 Camera', '', '', '', '3rd Row Seats', 'Rear AC', 'Air Bag', '', '', '', 'Low Floor', 'Roof Rail'),
('rr-1', 'Wooden Panel', 'Cruise Control', '', 'Rain Shed', 'DVD Player', 'Back Camera', '4 Camera', 'Sunroof', 'Winker Mirror', 'Built In AC', '3rd Row Seats', 'Rear AC', 'Air Bag', '', '', 'Wooden Stearing', '', 'Roof Rail'),
('NZE141-12123131', '', 'Cruise Control', '', 'Rain Shed', 'DVD Player', 'Back Camera', '4 Camera', 'Sunroof', 'Winker Mirror', 'Built In AC', '3rd Row Seats', 'Rear AC', 'Air Bag', '', '', '', '', 'Roof Rail'),
('RU1-1', '', '', '', '', 'DVD Player', 'Back Camera', '', '', '', '', '3rd Row Seats', '', '', '', 'Low Roof', '', '', 'Roof Rail'),
('NZE260-1', '', 'Cruise Control', '', '', '', '', '', 'Sunroof', '', '', '3rd Row Seats', '', 'Air Bag', '', '', '', '', 'Roof Rail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_expense`
--
ALTER TABLE `accounts_expense`
  ADD UNIQUE KEY `entry_id` (`entry_id`);

--
-- Indexes for table `accounts_payment`
--
ALTER TABLE `accounts_payment`
  ADD UNIQUE KEY `entry_id` (`entry_id`);

--
-- Indexes for table `accounts_profit_loss`
--
ALTER TABLE `accounts_profit_loss`
  ADD UNIQUE KEY `entry_id` (`entry_id`);

--
-- Indexes for table `accounts_received`
--
ALTER TABLE `accounts_received`
  ADD UNIQUE KEY `entry_id` (`entry_id`);

--
-- Indexes for table `accounts_vehicle_purchase`
--
ALTER TABLE `accounts_vehicle_purchase`
  ADD UNIQUE KEY `entry_id` (`entry_id`);

--
-- Indexes for table `accounts_vehicle_sold`
--
ALTER TABLE `accounts_vehicle_sold`
  ADD UNIQUE KEY `entry_id` (`entry_id`);

--
-- Indexes for table `emp_list`
--
ALTER TABLE `emp_list`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `most_viewed`
--
ALTER TABLE `most_viewed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_table`
--
ALTER TABLE `offer_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_inventory`
--
ALTER TABLE `vehicle_inventory`
  ADD PRIMARY KEY (`chassis_no`);

--
-- Indexes for table `vehicle_options`
--
ALTER TABLE `vehicle_options`
  ADD PRIMARY KEY (`chassis_no`);

--
-- Indexes for table `vehicle_other_options`
--
ALTER TABLE `vehicle_other_options`
  ADD PRIMARY KEY (`chassis_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `most_viewed`
--
ALTER TABLE `most_viewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

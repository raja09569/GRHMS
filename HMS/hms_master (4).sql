-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 09:36 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billid` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `bill_type` varchar(20) COLLATE utf8_bin NOT NULL,
  `paid_amt` double(10,2) NOT NULL,
  `paid_date` date NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `php_users_login`
--

CREATE TABLE `php_users_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `content` text,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `php_users_login`
--

INSERT INTO `php_users_login` (`id`, `email`, `password`, `name`, `phone`, `content`, `last_login`) VALUES
(1, 'demo1@demo.com', 'pass', 'Demo 1', '+0123456789', 'text content for Demo1 user.', NULL),
(2, 'demo2@demo.com', 'pass', 'Demo 2', '+9876543210', 'another text content for Demo2 user', NULL),
(3, 'demo1', 'pass', 'Demo 1', '+0123456789', 'text content for Demo1 user.', NULL),
(4, 'demo2', 'pass', 'Demo 2', '+9876543210', 'another text content for Demo2 user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_floor_details`
--

CREATE TABLE `t_floor_details` (
  `floor_sno` int(11) NOT NULL,
  `floor_name` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `room_no` varchar(32) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `t_guest_details`
--

CREATE TABLE `t_guest_details` (
  `g_sno` int(11) NOT NULL,
  `g_id` int(11) DEFAULT NULL,
  `room_sno` int(11) DEFAULT NULL,
  `g_first_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `g_last_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `g_permanent_address` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `g_temporary_address` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `g_phone` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `g_email` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `g_id_proof` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `g_id_proof_number` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `g_doj` date DEFAULT NULL,
  `g_doe` date DEFAULT NULL,
  `g_isactive` tinyint(1) DEFAULT NULL,
  `g_actual_rent` int(11) DEFAULT NULL,
  `g_adv` int(11) DEFAULT NULL,
  `g_id_proof_image` blob,
  `g_profile_image` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_guest_details`
--

INSERT INTO `t_guest_details` (`g_sno`, `g_id`, `room_sno`, `g_first_name`, `g_last_name`, `g_permanent_address`, `g_temporary_address`, `g_phone`, `g_email`, `g_id_proof`, `g_id_proof_number`, `g_doj`, `g_doe`, `g_isactive`, `g_actual_rent`, `g_adv`, `g_id_proof_image`, `g_profile_image`) VALUES
(3, 119, NULL, 'Ram', 'Anji', NULL, NULL, '9920314033', NULL, NULL, NULL, '2015-11-12', NULL, 1, NULL, NULL, NULL, 0x72616d2e6a7067),
(4, 6406227, NULL, 'RajSekhar', 'Pandu', NULL, NULL, '9666572573', NULL, NULL, NULL, '2015-11-12', NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_guest_payment_details`
--

CREATE TABLE `t_guest_payment_details` (
  `gp_sno` int(11) NOT NULL,
  `g_sno` int(11) DEFAULT NULL,
  `room_sno` int(11) DEFAULT NULL,
  `g_first_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `g_last_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gp_actual_rent` int(11) DEFAULT NULL,
  `gp_paid_rent` int(11) DEFAULT NULL,
  `gp_due_rent` int(11) DEFAULT NULL,
  `gp_month` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `gp_paid_date` date DEFAULT NULL,
  `gp_rent_collected_by` varchar(64) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_guest_payment_details`
--

INSERT INTO `t_guest_payment_details` (`gp_sno`, `g_sno`, `room_sno`, `g_first_name`, `g_last_name`, `gp_actual_rent`, `gp_paid_rent`, `gp_due_rent`, `gp_month`, `gp_paid_date`, `gp_rent_collected_by`) VALUES
(1, 3, 1, 'Ram', 'Anji', 5000, 3000, 2000, 'Apr-2016', '2016-04-13', 'Ram'),
(2, 4, 1, 'Rajasekhar', 'Pandu', 5000, 2000, 3000, 'Apr-2016', '2016-04-15', 'Ram'),
(3, 4, 1, 'Rajasekhar', 'Pandu', 5000, 5000, 0, 'Mar-2016', '2016-04-15', 'Ram');

-- --------------------------------------------------------

--
-- Table structure for table `t_hostel_registration`
--

CREATE TABLE `t_hostel_registration` (
  `hostel_reg_id` int(10) NOT NULL,
  `hostel_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `hostel_type` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `hostel_address` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `mobile_number` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `hostel_logo` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `payment` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `comments` varchar(516) COLLATE utf8_bin DEFAULT NULL,
  `services_id` int(10) DEFAULT NULL,
  `hostel_owner` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL,
  `hostel_database` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `t_hostel_services_form`
--

CREATE TABLE `t_hostel_services_form` (
  `hostel_service_id` int(10) NOT NULL,
  `hostel_reg_id` int(10) NOT NULL,
  `wifi` tinyint(1) DEFAULT NULL,
  `AC` tinyint(1) DEFAULT NULL,
  `3_times_food` tinyint(1) DEFAULT NULL,
  `2_times_food` tinyint(1) DEFAULT NULL,
  `washing_machine` tinyint(1) DEFAULT NULL,
  `furnished` tinyint(1) DEFAULT NULL,
  `semi_furnished` tinyint(1) DEFAULT NULL,
  `refrigirator` tinyint(1) DEFAULT NULL,
  `gyser` tinyint(1) DEFAULT NULL,
  `veg` tinyint(1) DEFAULT NULL,
  `non_veg` tinyint(1) DEFAULT NULL,
  `2_wheeler_parking` tinyint(1) DEFAULT NULL,
  `4_wheeler_parking` tinyint(1) DEFAULT NULL,
  `withoutfood` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `t_login_form`
--

CREATE TABLE `t_login_form` (
  `login_reg_id` int(10) NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `username` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `role` varchar(128) COLLATE utf8_bin NOT NULL,
  `hostel_reg_id` int(10) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_login_form`
--

INSERT INTO `t_login_form` (`login_reg_id`, `email`, `username`, `password`, `role`, `hostel_reg_id`, `status`) VALUES
(1, 'ram.mtlm2000@gmail.com', 'ram', 'ram', 'admin', 1, 'enabled'),
(2, 'ramanji.b@gmail.com', 'Ramanjianji', 'ram', 'user', 0, 'enabled'),
(4, 'pedralamadhu12@gmail.com', 'MadhuPedrala', 'madhu', 'user', 0, 'enabled'),
(5, 'raju2011nam@gmail.com', 'rajunam', 'raju', 'user', 0, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `t_product_details`
--

CREATE TABLE `t_product_details` (
  `p_code` int(11) NOT NULL,
  `p_desc` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `p_date` datetime DEFAULT NULL,
  `p_onhand` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `p_price` double DEFAULT NULL,
  `p_discount` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `p_salecode` int(11) DEFAULT NULL,
  `v_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_product_details`
--

INSERT INTO `t_product_details` (`p_code`, `p_desc`, `p_date`, `p_onhand`, `p_price`, `p_discount`, `p_salecode`, `v_code`) VALUES
(0, 'Iphone 5S Good condition', '2016-04-07 00:00:00', NULL, 35000, '10', 12345, 1),
(1, 'Iphone 5S Good condition', '2016-04-09 00:00:00', NULL, 35000, '10', 10000, 1),
(2, 'Iphone 6S Good condition', '2016-04-09 00:00:00', NULL, 50000, '10', 12345, 1),
(3, '1100 Good condition', '2016-04-09 00:00:00', NULL, 5000, '10', 10000, 2),
(4, '6600 Good condition', '2016-04-09 00:00:00', NULL, 10000, '10', 12345, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_room_details`
--

CREATE TABLE `t_room_details` (
  `room_sno` int(11) NOT NULL,
  `room_no` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `floor_sno` int(11) DEFAULT NULL,
  `actual_members` int(11) DEFAULT NULL,
  `alloted_members` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_room_details`
--

INSERT INTO `t_room_details` (`room_sno`, `room_no`, `floor_sno`, `actual_members`, `alloted_members`) VALUES
(1, 'GF1', 0, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_vendor_details`
--

CREATE TABLE `t_vendor_details` (
  `v_code` int(11) NOT NULL,
  `v_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `v_contact` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `v_areacode` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `v_phone` int(11) DEFAULT NULL,
  `v_state` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `v_order` varchar(32) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_vendor_details`
--

INSERT INTO `t_vendor_details` (`v_code`, `v_name`, `v_contact`, `v_areacode`, `v_phone`, `v_state`, `v_order`) VALUES
(1, 'Apple', 'Bangalore', '560068', 23456, 'karnataaka', 'ORDER_1234'),
(2, 'Nokia', 'Bangalore', '560068', 23457, 'karnataaka', 'ORDER_1235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `php_users_login`
--
ALTER TABLE `php_users_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_floor_details`
--
ALTER TABLE `t_floor_details`
  ADD PRIMARY KEY (`floor_sno`);

--
-- Indexes for table `t_guest_details`
--
ALTER TABLE `t_guest_details`
  ADD PRIMARY KEY (`g_sno`),
  ADD KEY `room_sno` (`room_sno`);

--
-- Indexes for table `t_guest_payment_details`
--
ALTER TABLE `t_guest_payment_details`
  ADD PRIMARY KEY (`gp_sno`),
  ADD KEY `g_sno` (`g_sno`);

--
-- Indexes for table `t_hostel_registration`
--
ALTER TABLE `t_hostel_registration`
  ADD PRIMARY KEY (`hostel_reg_id`);

--
-- Indexes for table `t_hostel_services_form`
--
ALTER TABLE `t_hostel_services_form`
  ADD PRIMARY KEY (`hostel_service_id`);

--
-- Indexes for table `t_login_form`
--
ALTER TABLE `t_login_form`
  ADD PRIMARY KEY (`login_reg_id`),
  ADD UNIQUE KEY `login_reg_id` (`login_reg_id`);

--
-- Indexes for table `t_room_details`
--
ALTER TABLE `t_room_details`
  ADD PRIMARY KEY (`room_sno`);

--
-- Indexes for table `t_vendor_details`
--
ALTER TABLE `t_vendor_details`
  ADD PRIMARY KEY (`v_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `php_users_login`
--
ALTER TABLE `php_users_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_floor_details`
--
ALTER TABLE `t_floor_details`
  MODIFY `floor_sno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_guest_details`
--
ALTER TABLE `t_guest_details`
  MODIFY `g_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_guest_payment_details`
--
ALTER TABLE `t_guest_payment_details`
  MODIFY `gp_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_hostel_registration`
--
ALTER TABLE `t_hostel_registration`
  MODIFY `hostel_reg_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_hostel_services_form`
--
ALTER TABLE `t_hostel_services_form`
  MODIFY `hostel_service_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_login_form`
--
ALTER TABLE `t_login_form`
  MODIFY `login_reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_room_details`
--
ALTER TABLE `t_room_details`
  MODIFY `room_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_vendor_details`
--
ALTER TABLE `t_vendor_details`
  MODIFY `v_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_guest_details`
--
ALTER TABLE `t_guest_details`
  ADD CONSTRAINT `t_guest_details_ibfk_1` FOREIGN KEY (`room_sno`) REFERENCES `t_room_details` (`room_sno`);

--
-- Constraints for table `t_guest_payment_details`
--
ALTER TABLE `t_guest_payment_details`
  ADD CONSTRAINT `t_guest_payment_details_ibfk_1` FOREIGN KEY (`g_sno`) REFERENCES `t_guest_details` (`g_sno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

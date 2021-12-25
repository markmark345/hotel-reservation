-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 06:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `amenity_id` int(11) NOT NULL,
  `amenity_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`amenity_id`, `amenity_name`) VALUES
(1, 'free WIFI'),
(2, 'free parking');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `booking_code` varchar(10) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `adult` int(11) DEFAULT 2,
  `child` int(11) DEFAULT 0,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `booking_status` int(11) DEFAULT 0,
  `payment_status` int(11) DEFAULT 0,
  `payment_type_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `uid` varchar(45) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `cus_id`, `booking_code`, `booking_date`, `adult`, `child`, `check_in`, `check_out`, `booking_status`, `payment_status`, `payment_type_id`, `total`, `tax`, `uid`, `creation_date`, `amount`) VALUES
(13, 21, '', '0000-00-00 00:00:00', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 1, 0, 1, '0.00', '0.00', '', '2021-05-14 17:35:03', 2),
(14, 22, '', '2021-05-15 00:43:02', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, '0.00', '0.00', '', '2021-05-15 00:43:02', 0),
(15, 23, '', '2021-05-15 00:43:56', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, '0.00', '0.00', '', '2021-05-15 00:43:56', 0),
(16, 24, '', '2021-05-15 01:34:55', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 2, 0, 1, '0.00', '0.00', '', '2021-05-15 01:34:55', 3),
(17, 25, '', '2021-05-15 22:43:20', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 22:43:20', 1),
(18, 26, '', '2021-05-15 22:44:46', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 22:44:46', 1),
(19, 27, '', '2021-05-15 22:47:58', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 22:47:58', 1),
(20, 28, '', '2021-05-15 22:53:34', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 22:53:34', 1),
(21, 29, '', '2021-05-15 22:57:43', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 22:57:43', 1),
(22, 30, '', '2021-05-15 23:01:38', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 23:01:38', 1),
(23, 31, '', '2021-05-15 23:03:27', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 23:03:27', 1),
(24, 32, '', '2021-05-15 23:04:19', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 23:04:19', 1),
(25, 33, '', '2021-05-15 23:06:24', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 23:06:24', 1),
(26, 34, '', '2021-05-15 23:07:36', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5965.00', '-35.00', '', '2021-05-15 23:07:36', 1),
(27, 35, '', '2021-05-15 23:08:33', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:08:33', 1),
(28, 36, '', '2021-05-15 23:10:13', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:10:13', 1),
(29, 37, '', '2021-05-15 23:10:44', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:10:44', 1),
(30, 38, '', '2021-05-15 23:12:31', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:12:31', 1),
(31, 39, '', '2021-05-15 23:12:47', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:12:47', 1),
(32, 40, '', '2021-05-15 23:14:44', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:14:44', 1),
(33, 41, '', '2021-05-15 23:16:43', 2, 0, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0, 0, 1, '5989.50', '-10.50', '', '2021-05-15 23:16:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `extra_service_price` decimal(10,2) NOT NULL,
  `include_break_fast` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`booking_id`, `room_id`, `price`, `discount`, `extra_service_price`, `include_break_fast`) VALUES
(13, 2, '4000.00', '0.00', '0.00', b'1'),
(16, 1, '2000.00', '0.00', '0.00', b'1'),
(33, 3, '6000.00', '0.00', '0.00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `booking_service`
--

CREATE TABLE `booking_service` (
  `booking_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_service`
--

INSERT INTO `booking_service` (`booking_id`, `service_id`, `uid`, `creation_date`) VALUES
(33, 3, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `citizen_id` varchar(20) NOT NULL,
  `cust_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `uid` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `citizen_id`, `cust_name`, `email`, `phone`, `uid`, `creation_date`) VALUES
(21, '112339', 'ณัฐพัชร อนุโรจน์', 'natapatchara.anuroje@gmail.com', '0910120438', 0, '2021-05-14 17:35:03'),
(22, '', '', '', '', 0, '2021-05-15 00:43:02'),
(23, '', '', '', '', 0, '2021-05-15 00:43:56'),
(24, '122xxxxx', 'alice', 'alice@gmail.com', '090xxxxxxx', 0, '2021-05-15 01:34:55'),
(25, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 22:43:20'),
(26, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 22:44:46'),
(27, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 22:47:58'),
(28, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 22:53:34'),
(29, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 22:57:43'),
(30, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:01:38'),
(31, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:03:27'),
(32, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:04:19'),
(33, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:06:24'),
(34, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:07:36'),
(35, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:08:33'),
(36, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:10:13'),
(37, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:10:44'),
(38, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:12:31'),
(39, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:12:47'),
(40, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:14:44'),
(41, '123xxxxxx', 'bob', 'bob@gamil.com', '061xxxxxxx', 0, '2021-05-15 23:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `pay_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `pay_name`) VALUES
(1, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_num` varchar(10) NOT NULL,
  `price` decimal(10,0) DEFAULT 0,
  `room_status` int(11) DEFAULT 0,
  `area_size` varchar(45) DEFAULT NULL,
  `num_of_bed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_num`, `price`, `room_status`, `area_size`, `num_of_bed`) VALUES
(1, 1, '1', '2000', 0, '30x30', 1),
(2, 2, '2', '4000', 0, '40x40', 2),
(3, 3, '3', '6000', 1, '50x50', 3),
(4, 4, '4', '8000', 0, '60x60', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room_amenity`
--

CREATE TABLE `room_amenity` (
  `room_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_available`
--

CREATE TABLE `room_available` (
  `room_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `room_available_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_available`
--

INSERT INTO `room_available` (`room_id`, `check_in`, `check_out`, `room_available_status`) VALUES
(1, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0),
(2, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0),
(3, '2021-01-01 00:00:00', '2021-01-03 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `type_name` varchar(45) NOT NULL,
  `number_of_room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `type_name`, `number_of_room`) VALUES
(1, 'Standard', 1),
(2, 'Superior', 1),
(3, 'Delux', 1),
(4, 'Suite', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `ser_name` varchar(45) NOT NULL,
  `ser_price` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `ser_name`, `ser_price`) VALUES
(1, 'Fitness ', 200),
(2, 'Lounge', 500),
(3, 'spa', 350);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `user_name`, `password`, `email`) VALUES
(3, 'mark', '12345', 'mark@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `account_uid_user_uid_idx` (`uid`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`amenity_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_payment_type_id_payment_type_payment_type_id_idx` (`payment_type_id`),
  ADD KEY `booking_cus_id_customer_cus_id_idx` (`cus_id`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`booking_id`,`room_id`),
  ADD KEY `booking_detail_room_id_room_room_id_idx` (`room_id`);

--
-- Indexes for table `booking_service`
--
ALTER TABLE `booking_service`
  ADD KEY `booking_service_booking_id_booking_booking_id_idx` (`booking_id`),
  ADD KEY `booking_service_service_id_service_service_id_idx` (`service_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id_idx` (`room_type_id`);

--
-- Indexes for table `room_amenity`
--
ALTER TABLE `room_amenity`
  ADD PRIMARY KEY (`room_id`,`amenity_id`),
  ADD KEY `room_amenity_amenity_id_amnity_amnitey_id_idx` (`amenity_id`);

--
-- Indexes for table `room_available`
--
ALTER TABLE `room_available`
  ADD PRIMARY KEY (`room_id`,`check_in`,`check_out`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_uid_user_uid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_cus_id_customer_cus_id` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`),
  ADD CONSTRAINT `booking_payment_type_id_payment_type_payment_type_id` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`);

--
-- Constraints for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_booking_id_booking_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `booking_detail_room_id_room_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `booking_service`
--
ALTER TABLE `booking_service`
  ADD CONSTRAINT `booking_service_booking_id_booking_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `booking_service_service_id_service_service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_room_type_id_room_type_room_type_id` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `room_amenity`
--
ALTER TABLE `room_amenity`
  ADD CONSTRAINT `room_amenity_amenity_id_amnity_amnitey_id` FOREIGN KEY (`amenity_id`) REFERENCES `amenity` (`amenity_id`),
  ADD CONSTRAINT `room_amenity_room_id_room_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `room_available`
--
ALTER TABLE `room_available`
  ADD CONSTRAINT `room_available_room_id_room_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

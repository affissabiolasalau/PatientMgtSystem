-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 12:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babs_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients_contact`
--

CREATE TABLE `clients_contact` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `client_id` varchar(20) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_contact`
--

INSERT INTO `clients_contact` (`id`, `user_id`, `client_id`, `phone1`, `phone2`, `email`, `home_address`, `office_address`) VALUES
(2, 'PMSNWuoI6RX', 'PMS74penim5za', '0987654321', '1234567890', 'adeigwezaki@gmail.com', '33, Street name, State, City, Country', '  11, Street name, State, City, Country'),
(3, 'PMSNWuoI6RX', 'PMSjamidhvwb1', '8787653535', '1209877772', 'davison@gmall.com', '20, Akute, Ogun State', ' '),
(4, 'PMSUzogWEwf', 'PMSx2njuagpvm', '0987654321', '1234567890', 'adeigwezaki@gmail.com', '33, Street name, State, City, Country', ' 11, Street name, State, City, Country');

-- --------------------------------------------------------

--
-- Table structure for table `clients_diagnosis`
--

CREATE TABLE `clients_diagnosis` (
  `id` int(11) NOT NULL,
  `symptoms` varchar(1000) DEFAULT NULL,
  `diagnosis` varchar(1000) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_diagnosis`
--

INSERT INTO `clients_diagnosis` (`id`, `symptoms`, `diagnosis`, `client_id`, `user_id`, `date_added`) VALUES
(1, 'ewewew', 'wewe', 'PMSx2njuagpvm', NULL, '2021-07-12'),
(2, 'ghsdgsdg', 'fddfsd', 'PMSx2njuagpvm', NULL, '2021-07-12'),
(4, 'dghg hfff jhfjffj ghdfdghg hfff jhfjffj ghdfdghg hfff jhfjffj ghdf', 'dghg hfff jhfjffj ghdfdghg hfff jhfjffj ghdfdghg hfff jhfjffj ghdfdghg hfff jhfjffj ghdf', 'PMSx2njuagpvm', 'PMSUzogWEwf', '2021-07-12'),
(6, 'fffhhf', 'fdgg', 'PMSx2njuagpvm', 'PMSUzogWEwf', '2021-07-12'),
(7, 'dgd', 'rghfhhhj hj', 'PMSx2njuagpvm', 'PMSUzogWEwf', '2021-07-12'),
(8, 'hello ki', 'frws', 'PMSx2njuagpvm', 'PMSUzogWEwf', '2021-07-12'),
(9, 'ghdfgd', 'dsfghfj', 'PMSx2njuagpvm', 'PMSUzogWEwf', '2021-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `clients_picture`
--

CREATE TABLE `clients_picture` (
  `id` int(11) NOT NULL,
  `client_id` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_picture`
--

INSERT INTO `clients_picture` (`id`, `client_id`, `image`) VALUES
(6, 'PMSbcrwtnkfp7', 'bitcoin-btc-logo.png'),
(7, 'PMS74penim5za', 'team-4.jpg'),
(8, 'PMSjamidhvwb1', 'testimonial-5.jpg'),
(9, 'PMSx2njuagpvm', 'p28495.png'),
(10, 'PMSquvmlo4kgi', '4966.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clients_profile`
--

CREATE TABLE `clients_profile` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `client_id` varchar(20) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `othernames` varchar(80) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `occupation` varchar(200) DEFAULT NULL,
  `genotype` varchar(20) DEFAULT NULL,
  `blood_group` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_profile`
--

INSERT INTO `clients_profile` (`id`, `user_id`, `client_id`, `sname`, `fname`, `othernames`, `dob`, `gender`, `avatar`, `occupation`, `genotype`, `blood_group`, `weight`, `height`, `date_added`) VALUES
(2, 'PMSNWuoI6RX', 'PMS74penim5za', 'Samule', 'Eli', '', '2021-04-15', 'Male', NULL, 'Civil', 'SS', 'AB', '63', '400', '2021-04-13 03:29:37'),
(3, 'PMSNWuoI6RX', 'PMSjamidhvwb1', 'Dave', 'Simion', 'Aliu', '2021-04-16', 'Male', NULL, 'Student', 'AA', 'B', '71', '400', '2021-04-13 03:32:17'),
(4, 'PMSUzogWEwf', 'PMSx2njuagpvm', 'Ade', 'Igwe ', 'Zaki', '2010-05-15', 'Female', NULL, 'Trader', 'AA', 'B', '234', '500', '2021-05-15 11:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_file`
--

CREATE TABLE `diagnosis_file` (
  `id` int(11) NOT NULL,
  `diagnosis_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis_file`
--

INSERT INTO `diagnosis_file` (`id`, `diagnosis_id`, `client_id`, `file`, `date_added`) VALUES
(2, 8, 0, 'banner1.jpg', '2021-07-12 22:55:13'),
(3, 8, 0, 'banner2.jpg', '2021-07-12 22:55:13'),
(4, 9, 0, 'banner1.jpg', '2021-07-12 23:05:25'),
(5, 9, 0, 'banner2.jpg', '2021-07-12 23:05:25'),
(6, 9, 0, '1568648112267.jpeg', '2021-07-12 23:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `label` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `type` enum('Credit','Debit') DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `label`, `amount`, `type`, `date_added`) VALUES
(9, 'PMSNWuoI6RX', 'Electricity', '20000', 'Debit', '2021-04-13 00:52:26'),
(10, 'PMSNWuoI6RX', 'Treatment', '42000', 'Credit', '2021-04-13 00:52:51'),
(11, 'PMSNWuoI6RX', 'Medications', '10000', 'Credit', '2021-04-13 00:53:29'),
(12, 'PMSNWuoI6RX', 'Treatment', '10200', 'Credit', '2021-04-13 01:00:22'),
(13, 'PMSNWuoI6RX', 'Staff Salary', '20000', 'Debit', '2021-04-13 01:00:54'),
(14, 'PMSNWuoI6RX', 'Security', '1000', 'Debit', '2021-04-13 01:01:18'),
(15, 'PMSNWuoI6RX', 'Fuel', '1400', 'Debit', '2021-04-13 01:01:48'),
(16, 'PMSNWuoI6RX', 'Medication', '3000', 'Credit', '2021-04-13 01:03:05'),
(17, 'PMSUzogWEwf', 'Treatment', '10000', 'Credit', '2021-05-15 11:47:13'),
(18, 'PMSUzogWEwf', '5 Nurses Salary', '120000', 'Debit', '2021-05-15 11:47:57'),
(19, 'PMSUzogWEwf', 'Fan', '15000', 'Debit', '2021-05-15 11:48:22'),
(20, 'PMSUzogWEwf', 'Treatment', '50000', 'Credit', '2021-05-15 11:48:45'),
(21, 'PMSUzogWEwf', 'Sales of medication', '101000', 'Credit', '2021-05-15 11:49:17'),
(22, 'PMSUzogWEwf', 'Broom', '200', 'Debit', '2021-05-15 11:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `fname`, `lname`, `image`, `institution`) VALUES
(2, 'PMSNWuoI6RX', 'test@user.com', 'e10adc3949ba59abbe56e057f20f883e', 'alfred', 'Jane', '7.jpg', ''),
(3, 'PMSb9aJMEIB', 'test2@user.com', 'e10adc3949ba59abbe56e057f20f883e', 'Test', 'Tester', NULL, NULL),
(4, 'PMSnQDM9IhZ', 'test3@user.com', 'e10adc3949ba59abbe56e057f20f883e', 'Test3', 'Tester3', NULL, NULL),
(5, 'PMSUzogWEwf', 'user1@email.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'user', 'use', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients_contact`
--
ALTER TABLE `clients_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_diagnosis`
--
ALTER TABLE `clients_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_picture`
--
ALTER TABLE `clients_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_profile`
--
ALTER TABLE `clients_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis_file`
--
ALTER TABLE `diagnosis_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients_contact`
--
ALTER TABLE `clients_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients_diagnosis`
--
ALTER TABLE `clients_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients_picture`
--
ALTER TABLE `clients_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients_profile`
--
ALTER TABLE `clients_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnosis_file`
--
ALTER TABLE `diagnosis_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

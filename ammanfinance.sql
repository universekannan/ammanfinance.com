-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 04:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ammanfinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

CREATE TABLE `activation` (
  `id` int(10) NOT NULL,
  `page_number` varchar(50) DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_details` varchar(50) DEFAULT NULL,
  `measurement` varchar(20) DEFAULT NULL,
  `credit_amount` varchar(100) DEFAULT NULL,
  `intrest` varchar(10) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `item_image` varchar(200) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activation`
--

INSERT INTO `activation` (`id`, `page_number`, `customer_id`, `item_name`, `item_details`, `measurement`, `credit_amount`, `intrest`, `from_date`, `item_image`, `status`, `created_at`, `updated_at`, `login_id`) VALUES
(1, '1', '1', 'qqqqq', 'qqq', '12', '0.039999999999054126', '24', '2023-02-09', NULL, '1', '2023-02-11 14:40:36', '2023-02-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activation_details`
--

CREATE TABLE `activation_details` (
  `id` int(11) NOT NULL,
  `activation_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `intrest` varchar(10) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `credit_amount` varchar(100) DEFAULT NULL,
  `intrest_amount` varchar(10) DEFAULT NULL,
  `total_amount` varchar(20) DEFAULT NULL,
  `pay_amount` varchar(10) DEFAULT NULL,
  `balance_amount` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activation_details`
--

INSERT INTO `activation_details` (`id`, `activation_id`, `customer_id`, `intrest`, `from_date`, `to_date`, `credit_amount`, `intrest_amount`, `total_amount`, `pay_amount`, `balance_amount`, `status`, `created_at`, `update_at`, `login_id`) VALUES
(23, 1, 1, '24', '2023-02-09', '2023-02-12', '10000', '19.73', '10019.73', '2000', '8019.73', '1', '2023-02-12 00:07:09', NULL, 1),
(24, 1, 1, '24', '2023-02-09', '2023-02-12', '8019.73', '15.82', '8035.55', '5000', '3035.5499999999993', '1', '2023-02-12 00:07:27', NULL, 1),
(25, 1, 1, '24', '2023-02-09', '2023-02-12', '3035.5499999999993', '5.99', '3041.54', '3041.5', '0.039999999999054126', '1', '2023-02-12 00:08:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `id_proof` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `follow_date` date DEFAULT NULL,
  `follow_message` varchar(5000) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` varchar(30) DEFAULT NULL,
  `updated_at` varchar(30) DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `mobile_number`, `id_proof`, `gender`, `age`, `address`, `follow_date`, `follow_message`, `status`, `created_at`, `updated_at`, `login_id`) VALUES
(1, 'District Presidents', '9344332244', 'eeeeeeeeeee', '1', 44, 'Mottavilai\r\nKarankadu PO', NULL, NULL, '1', '2023-02-06 09:12:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deposits_activation`
--

CREATE TABLE `deposits_activation` (
  `id` int(10) NOT NULL,
  `page_number` varchar(50) DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_details` varchar(50) DEFAULT NULL,
  `measurement` varchar(20) DEFAULT NULL,
  `credit_amount` varchar(10) DEFAULT NULL,
  `intrest` varchar(10) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deposits_activation_details`
--

CREATE TABLE `deposits_activation_details` (
  `id` int(11) NOT NULL,
  `activation_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `intrest` varchar(10) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `credit_amount` varchar(10) DEFAULT NULL,
  `intrest_amount` varchar(10) DEFAULT NULL,
  `total_amount` varchar(10) DEFAULT NULL,
  `pay_amount` varchar(10) DEFAULT NULL,
  `balance_amount` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deposits_customers`
--

CREATE TABLE `deposits_customers` (
  `id` int(10) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `id_proof` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `follow_date` date DEFAULT NULL,
  `follow_message` varchar(5000) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deposits_interest`
--

CREATE TABLE `deposits_interest` (
  `id` int(10) NOT NULL,
  `deposits_interest_value` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposits_interest`
--

INSERT INTO `deposits_interest` (`id`, `deposits_interest_value`, `status`, `created_at`, `login_id`) VALUES
(1, '12', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(10) NOT NULL,
  `interest_value` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `interest_value`, `status`, `created_at`, `login_id`) VALUES
(1, '24', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_types_id` int(11) DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8_unicode_ci DEFAULT '1',
  `dob` varchar(33) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check_password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `states` varchar(10) COLLATE utf8_unicode_ci DEFAULT '1',
  `district_id` int(10) DEFAULT NULL,
  `taluk_id` int(10) DEFAULT NULL,
  `village_id` int(10) DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `login_id` int(10) DEFAULT NULL,
  `center_id` int(11) DEFAULT 0,
  `profile_photo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aadhar_number` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_types_id`, `full_name`, `first_name`, `last_name`, `gender`, `mobile_number`, `email`, `password`, `status`, `dob`, `created_at`, `updated_at`, `check_password`, `states`, `district_id`, `taluk_id`, `village_id`, `address`, `login_id`, `center_id`, `profile_photo`, `aadhar_number`) VALUES
(1, 1, 'Amman Finance', NULL, NULL, 'Male', '1234567890', 'licsenthil11@gmail.com', '$2y$10$xQbKheWI/acrAKRmLD9AYOtOwt8THcgh4A2I.vwVQOdtUVklLx2A.', '1', NULL, NULL, NULL, 'Gfh3er1321$', '1', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, 3, 'Manager', 'k', 'f', 'Female', '9047736314', 'manager@gmail.com', '$2y$10$iyX2Mfuf2zStKp6kb.Wxk.TZvkzZ5Nxw/mk.ZcwiUAmkEQhvptJ72', '1', NULL, '2023-01-05 11:51:28', NULL, '$2y$10$/KvgXoJMGoUzBmGlGJv4Q..QJi7U6Wqgn6G2nTaETmpf.JfUMXKh2', '1', NULL, NULL, NULL, 'jiniikhguf\r\nyryetryf', NULL, 0, 'girl.png', 'i786868'),
(3, 2, 'Cashier', NULL, NULL, 'Female', NULL, 'cashier@gmail.com', 'required', '1', NULL, '2023-01-05 12:10:15', NULL, '$2y$10$x4GOus0krbYzQvafO0RRuO31ABOXW9JYBC4Bd52gaa8apR1DKarpa', '1', NULL, NULL, NULL, NULL, NULL, 0, 'girl.png', NULL),
(4, 4, 'Appraiser ', 'Appraiser', NULL, 'Male', '9344332244', 'appraiser@gmail.com', '$2y$10$xQbKheWI/acrAKRmLD9AYOtOwt8THcgh4A2I.vwVQOdtUVklLx2A.', '1', NULL, '2023-01-16 09:24:02', NULL, 'Gfh3er1321$', '1', NULL, NULL, NULL, 'Mottavilai\r\nKarankadu PO', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `user_types_id` int(10) DEFAULT NULL,
  `roles` int(1) DEFAULT 0,
  `addrole` int(1) DEFAULT 0,
  `editrole` int(1) DEFAULT 0,
  `deleterole` int(1) DEFAULT 0,
  `dashboard` int(10) DEFAULT 1,
  `users` int(10) DEFAULT 0,
  `adduser` int(10) DEFAULT 0,
  `edituser` int(1) DEFAULT 0,
  `deleteuser` int(1) DEFAULT 0,
  `patients` int(1) DEFAULT 0,
  `addpatient` int(1) DEFAULT 0,
  `editpatient` int(1) DEFAULT 0,
  `deletepatient` int(1) DEFAULT 0,
  `blocks` int(1) DEFAULT 0,
  `addblock` int(1) DEFAULT 0,
  `editblock` int(1) DEFAULT 0,
  `deleteblock` int(1) DEFAULT 0,
  `rooms` int(1) DEFAULT 0,
  `addroom` int(1) DEFAULT 0,
  `editroom` int(1) DEFAULT 0,
  `deleteroom` int(1) DEFAULT 0,
  `admission` int(1) NOT NULL DEFAULT 0,
  `billing` int(1) NOT NULL DEFAULT 0,
  `pharmacy` int(1) NOT NULL DEFAULT 0,
  `investigation` int(1) NOT NULL DEFAULT 0,
  `ot` int(1) NOT NULL DEFAULT 0,
  `mrd` int(1) NOT NULL DEFAULT 0,
  `appointments` int(1) NOT NULL DEFAULT 0,
  `mis` int(1) NOT NULL DEFAULT 0,
  `Login_id` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_id`, `user_types_id`, `roles`, `addrole`, `editrole`, `deleterole`, `dashboard`, `users`, `adduser`, `edituser`, `deleteuser`, `patients`, `addpatient`, `editpatient`, `deletepatient`, `blocks`, `addblock`, `editblock`, `deleteblock`, `rooms`, `addroom`, `editroom`, `deleteroom`, `admission`, `billing`, `pharmacy`, `investigation`, `ot`, `mrd`, `appointments`, `mis`, `Login_id`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 3, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 4, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) NOT NULL,
  `user_types_id` int(10) DEFAULT NULL,
  `user_types_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_types_id`, `user_types_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Superadmin', '2022-06-07 11:42:03', '2022-06-07 11:42:08', 1),
(2, 2, 'Manager', '2022-06-07 06:11:55', '2022-06-07 06:11:55', 1),
(3, 3, 'Cashier', '2022-06-07 06:12:39', '2022-06-07 06:12:39', 1),
(4, 4, 'Appraiser', '2022-06-07 06:12:39', '2022-06-07 06:12:39', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activation_details`
--
ALTER TABLE `activation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits_activation`
--
ALTER TABLE `deposits_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits_activation_details`
--
ALTER TABLE `deposits_activation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits_customers`
--
ALTER TABLE `deposits_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits_interest`
--
ALTER TABLE `deposits_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation`
--
ALTER TABLE `activation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activation_details`
--
ALTER TABLE `activation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits_activation`
--
ALTER TABLE `deposits_activation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits_activation_details`
--
ALTER TABLE `deposits_activation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits_customers`
--
ALTER TABLE `deposits_customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits_interest`
--
ALTER TABLE `deposits_interest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

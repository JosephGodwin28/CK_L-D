-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 05:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ck_l&d`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_trainee`
--

CREATE TABLE `create_trainee` (
  `id` int(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `trainee_code` varchar(20) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  `name_trainee` varchar(40) NOT NULL,
  `batch_code` varchar(30) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `pro_sbu` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `emp_emailid` varchar(30) NOT NULL,
  `join_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_alt_num` int(11) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `createdBy_emp` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_address` varchar(700) NOT NULL,
  `l_address` varchar(700) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `supervisor_name` varchar(30) NOT NULL,
  `trainee_sta` varchar(30) NOT NULL,
  `c_devices` varchar(30) NOT NULL,
  `assignedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_trainee`
--

INSERT INTO `create_trainee` (`id`, `location`, `trainee_code`, `emp_code`, `name_trainee`, `batch_code`, `designation`, `pro_sbu`, `number`, `emp_emailid`, `join_date`, `gender`, `emp_dob`, `emp_alt_num`, `relation`, `created_by`, `createdBy_emp`, `created_on`, `p_address`, `l_address`, `qualification`, `experience`, `supervisor_name`, `trainee_sta`, `c_devices`, `assignedDate`) VALUES
(1, 'Bangalore', '87688', 'emp001', 'jdldj', 'VTAAM210222', 'iuhk', 'kjh', 2147483647, 'vignesh@gmail.com', '2022-03-10', 'male', '2022-02-05', 86, 'jkh', 'admin', 'admin01', '2022-02-21 10:22:19', 'kjb', 'mb', 'kb', 'kbkbj', '1', 'Work From Home', '86', '2022-02-21'),
(2, 'Cuddalore', '900315', 'emp001', 'vigneshwaran', 'VTAAM121122', 'sdlkfh', 'dlfdh', 56156661, 'dskfh@gmail.com', '2022-07-07', 'male', '2022-03-11', 5498484, 'sdojf', 'admin', 'admin01', '2022-11-12 05:21:59', 'dslfj', 'dfl', 'dfl', 'dlfowehf', '1', 'Work From Home', '54', '2022-11-12'),
(3, 'pondy', '900316', 'emp001', 'vignesh', 'VTAAM121122', 'kdsjf', 'dkh', 54151611, 'dfkh@gmail.com', '2022-11-10', 'male', '2022-08-18', 544, 'sih', 'admin', 'admin01', '2022-11-12 05:23:06', 'sdkh', 'dkfh', 'dkfh', 'difh', '1', 'Work From Home', '65', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_name`
--

CREATE TABLE `supervisor_name` (
  `id` int(11) NOT NULL,
  `supervisor_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor_name`
--

INSERT INTO `supervisor_name` (`id`, `supervisor_name`) VALUES
(1, 'kumar'),
(2, 'bala'),
(3, 'krihna'),
(4, 'mani'),
(5, 'guna');

-- --------------------------------------------------------

--
-- Table structure for table `trainee_daily_report`
--

CREATE TABLE `trainee_daily_report` (
  `id` int(11) NOT NULL,
  `training_day` varchar(30) NOT NULL,
  `batch_code` varchar(30) NOT NULL,
  `trainee_code` varchar(20) NOT NULL,
  `assignedDate` date NOT NULL,
  `progress_trend` varchar(30) NOT NULL,
  `attendance` varchar(10) NOT NULL,
  `average_score` varchar(50) NOT NULL,
  `punctuality` varchar(50) NOT NULL,
  `completion_assignment` varchar(50) NOT NULL,
  `participation_act` varchar(50) NOT NULL,
  `understanding_content` varchar(50) NOT NULL,
  `communication` varchar(50) NOT NULL,
  `confidence` varchar(50) NOT NULL,
  `asking_questions` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainee_daily_report`
--

INSERT INTO `trainee_daily_report` (`id`, `training_day`, `batch_code`, `trainee_code`, `assignedDate`, `progress_trend`, `attendance`, `average_score`, `punctuality`, `completion_assignment`, `participation_act`, `understanding_content`, `communication`, `confidence`, `asking_questions`, `remarks`, `created_by`, `created_on`) VALUES
(1, '1', 'VTAAM121122', '900316', '2022-11-13', 'lkjdf', 'P', '28.14', '54', '56', '6', '5', '5', '65', '6', 'sdlkj', 'emp001', '2022-11-12'),
(2, '1', 'VTAAM121122', '900315', '2022-11-13', 'dlij', 'P', '24.57', '54', '84', '6', '9', '5', '9', '5', '65', 'emp001', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `trainee_dup_record`
--

CREATE TABLE `trainee_dup_record` (
  `id` int(11) NOT NULL,
  `trainer_name` varchar(30) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  `assignedDate` date NOT NULL,
  `createdBy_emp` varchar(20) NOT NULL,
  `batch_code` varchar(30) NOT NULL,
  `day_type` varchar(20) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainee_dup_record`
--

INSERT INTO `trainee_dup_record` (`id`, `trainer_name`, `emp_code`, `assignedDate`, `createdBy_emp`, `batch_code`, `day_type`, `status`, `created_on`) VALUES
(1, '', 'emp001', '2022-02-21', 'admin01', 'VTAAM210222', '1', 'pending', '2022-02-21'),
(2, '', 'emp001', '2022-11-12', 'admin01', 'VTAAM121122', '1', 'completed', '2022-11-12'),
(3, '', 'emp001', '2022-11-13', 'emp001', 'VTAAM121122', '1', 'completed', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_name`
--

CREATE TABLE `trainer_name` (
  `id` int(11) NOT NULL,
  `trainer_name` varchar(100) NOT NULL,
  `emp_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_name`
--

INSERT INTO `trainer_name` (`id`, `trainer_name`, `emp_code`) VALUES
(1, 'Aamir', 'emp001'),
(2, 'Salman', 'emp002'),
(3, 'Katrina', 'emp003'),
(4, 'Farhan ', 'emp004'),
(5, 'Ram', 'emp005'),
(6, 'Guna', 'emp006');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `emp_id`, `email`, `password`, `role`, `status`, `created_date`) VALUES
(1, 'admin', 'admin01', 'admin@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2021-12-14 10:26:25'),
(2, 'radha', '111', 'krish@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-15 07:30:32'),
(3, 'krish', 'emp001', 'emp001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-17 11:52:39'),
(4, 'bala', 'emp002', 'emp002@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-17 11:52:59'),
(5, 'kumar', 'emp003', 'emp003@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-17 11:53:19'),
(6, 'abi', 'emp004', 'emp004@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-18 05:36:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_trainee`
--
ALTER TABLE `create_trainee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_name`
--
ALTER TABLE `supervisor_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainee_daily_report`
--
ALTER TABLE `trainee_daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainee_dup_record`
--
ALTER TABLE `trainee_dup_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_name`
--
ALTER TABLE `trainer_name`
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
-- AUTO_INCREMENT for table `create_trainee`
--
ALTER TABLE `create_trainee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisor_name`
--
ALTER TABLE `supervisor_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainee_daily_report`
--
ALTER TABLE `trainee_daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainee_dup_record`
--
ALTER TABLE `trainee_dup_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainer_name`
--
ALTER TABLE `trainer_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

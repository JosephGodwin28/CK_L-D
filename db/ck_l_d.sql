-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 11:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `assessment_and_certificate`
--

CREATE TABLE `assessment_and_certificate` (
  `Id` int(11) NOT NULL,
  `Batch_code` varchar(250) NOT NULL,
  `Trainee_code` varchar(100) NOT NULL,
  `Levels` varchar(100) NOT NULL,
  `Attempts` varchar(100) NOT NULL,
  `Mark` varchar(100) NOT NULL,
  `Total_mark` varchar(50) NOT NULL,
  `Percentage` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Created_by` varchar(50) NOT NULL,
  `Created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment_and_certificate`
--

INSERT INTO `assessment_and_certificate` (`Id`, `Batch_code`, `Trainee_code`, `Levels`, `Attempts`, `Mark`, `Total_mark`, `Percentage`, `Status`, `Created_by`, `Created_on`) VALUES
(34, 'VTAAM221122', 'emp0012345', 'L1', 'A1', '4', '', '80.00', '', 'emp001', '2022-11-29 12:45:10'),
(35, 'VTAAM221122', 'emp009', 'L1', 'A1', '3', '', '60.00', '', 'emp001', '2022-11-29 12:45:10'),
(50, 'VTAAM221122', 'emp009', 'L1', 'A2', '4', '', '80.00', '', 'emp001', '2022-11-29 12:45:10'),
(51, 'VTAAM121122', '900315', 'L1', 'A1', '4', '', '80.00', '', 'emp001', '2022-11-30 08:27:13'),
(52, 'VTAAM121122', '900316', 'L1', 'A1', '3', '', '60.00', '', 'emp001', '2022-11-30 08:27:13'),
(53, 'VTAAM121122', '900315', 'L2', 'A1', '11', '', '73.33', '', 'emp001', '2022-11-30 08:28:08'),
(54, 'VTAAM121122', '900316', 'L2', 'A1', '11', '', '73.33', '', 'emp001', '2022-11-30 08:28:08'),
(55, 'VTAAM121122', '900315', 'L2', 'A2', '13', '', '86.67', '', 'emp001', '2022-11-30 08:29:33'),
(56, 'VTAAM121122', '900316', 'L2', 'A2', '14', '', '93.33', '', 'emp001', '2022-11-30 08:29:33'),
(57, 'VTAAM221122', 'emp0012345', 'L2', 'A1', '11', '', '73.33', '', 'emp001', '2022-12-01 07:42:13'),
(58, 'VTAAM221122', 'emp009', 'L2', 'A1', '14', '', '93.33', '', 'emp001', '2022-12-01 07:42:13'),
(59, 'VTAAM221122', 'emp0012345', 'L2', 'A2', '13', '', '86.67', '', 'emp001', '2022-12-01 10:41:19'),
(103, 'VTAAM261122', 'emp11100', 'L1', 'A1', '5', '', '100.00', '', 'emp001', '2022-12-05 13:18:09'),
(105, 'VTAAM261122', 'emp11100', 'L2', 'A1', '15', '', '100.00', '', 'emp001', '2022-12-07 07:56:56'),
(106, 'VTAAM261122', 'test', 'L2', 'A1', '13', '', '86.67', '', 'emp001', '2022-12-07 07:56:56'),
(109, 'VTAAM261122', 'test567', 'L1', 'A1', '5', '5', '100.00', '', 'emp001', '2022-12-13 13:31:49'),
(123, 'VTAAM261122', 'test', 'L1', 'A1', '1', '5', '20.00', '', 'emp001', '2022-12-16 08:07:32'),
(124, 'VTAAM261122', 'test21', 'L1', 'A1', '1', '5', '20.00', '', 'emp001', '2022-12-16 08:07:32'),
(125, 'VTAAM261122', 'test', 'L1', 'A2', '1', '5', '20.00', '', 'emp001', '2022-12-16 08:08:10'),
(126, 'VTAAM261122', 'test21', 'L1', 'A2', '1', '6', '16.67', '', 'emp001', '2022-12-16 08:08:37'),
(127, 'VTAAM261122', 'test', 'L1', 'A3', '1', '5', '20.00', '', 'emp001', '2022-12-16 08:26:27'),
(128, 'VTAAM261122', 'test21', 'L1', 'A3', '2', '4', '50.00', '', 'emp001', '2022-12-16 08:26:27'),
(129, 'VTAAM261122', 'test', 'L1', 'A4', '5', '5', '100.00', '', 'emp001', '2022-12-16 08:26:52'),
(130, 'VTAAM261122', 'test21', 'L1', 'A4', '4', '4', '100.00', '', 'emp001', '2022-12-16 08:26:52');

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
(3, 'pondy', '900316', 'emp001', 'vignesh', 'VTAAM121122', 'kdsjf', 'dkh', 54151611, 'dfkh@gmail.com', '2022-11-10', 'male', '2022-08-18', 544, 'sih', 'admin', 'admin01', '2022-11-12 05:23:06', 'sdkh', 'dkfh', 'dkfh', 'difh', '1', 'Work From Home', '65', '2022-11-12'),
(6, 'Cuddalore', 'emp0012', 'emp001', 'Joseph Godwin', 'VTAAM211122', 'Trainee', 'ss', 2147483647, 'joseph.s@hepl.com', '2011-03-12', 'male', '2000-12-28', 2147483647, 'ss', 'admin', 'admin01', '2022-11-21 12:08:38', 'fgfh', 's', 'mcca', '2', '1', 'Work From Site', 'System', '2022-11-21'),
(7, 'Cuddalore', 'emp0012345', 'emp001', 'Nirmal', 'VTAAM221122', 'Trainee', 'ss', 2147483647, 'nirmal@hepl.com', '2021-05-12', 'male', '1999-09-23', 2147483647, 'test', 'admin', 'admin01', '2022-11-22 04:27:32', 'test', 'test', 'mca', '2', '1', 'Work From Site', '2', '2022-11-22'),
(8, 'Cuddalore', 'emp009', 'emp001', 'Nithi', 'VTAAM221122', 'test', 'TEST', 2147483647, 'nithi@hepl.com', '2011-02-12', 'male', '2000-03-12', 2147483647, 'test', 'krish', 'emp001', '2022-11-22 07:35:02', 'test', 'test', 'test', '2', '1', 'Work From Site', 'System', '2022-11-22'),
(9, 'Cuddalore', 'Emp0010', 'emp003', 'Sri', 'VTKAT221122', 'test', 'ss', 2147483647, 'sri@gmail.com', '2011-03-12', 'male', '0000-00-00', 2147483647, 'ss', 'krish', 'emp001', '2022-11-22 07:38:23', 'ss', 'ss', 'ss', 'ss', '2', 'Work From Site', 'ss', '2022-11-22'),
(10, 'Cuddalore', 'Emp111', 'emp006', 'Archana', 'VTGUN231122', 'test', 'test', 2147483647, 'archana@hepl.com', '2020-06-26', 'female', '2000-03-15', 2147483647, 'test', 'admin', 'admin01', '2022-11-23 04:57:57', 'test', 'test', 'test', 'test', '1', 'Work From Site', 'test', '2022-11-23'),
(11, 'Cud', 'test001', 'emp002', 'tsets', 'VTSAL231122', 'tsest', 'test', 2147483647, 'test@hepl.com', '2011-03-12', 'male', '2000-02-23', 2147483647, 'hw', 'admin', 'admin01', '2022-11-23 05:01:55', 'tt', 'tt', 'tt', 'tt', '2', 'Work From Site', 'tt', '2022-11-23'),
(12, 'Vanisri', 'emp11100', 'emp001', 'Vani', 'VTAAM261122', 'test', 'test', 0, 'test@gmail.com', '2022-11-16', 'female', '1999-03-12', 0, 'test', 'admin', 'admin01', '2022-11-26 09:52:34', 'test', 'test', 'test', 'test', '1', 'Work From Site', 'test', '2022-11-26'),
(13, 'test', 'test', 'emp001', 'Test1', 'VTAAM261122', 'test', 'test', 0, 'test@gmail.com', '2022-11-11', 'male', '1996-03-12', 0, 'test', 'admin', 'admin01', '2022-11-26 09:54:30', 'test', 'test', 'test', 'test', '1', 'Work From Site', 'test', '2022-11-26'),
(14, 'test', 'test21', 'emp001', 'Test2', 'VTAAM261122', 'test', 'testtest', 0, 'test@gmail.com', '2022-11-17', 'female', '1996-03-19', 0, 'test', 'admin', 'admin01', '2022-11-26 09:55:17', 'test', 'test', 'test', 'test', '1', 'Work From Home', 'test', '2022-11-26'),
(15, 'test', 'test123', 'emp003', 'Test3', 'VTKAT031122', 'test', 'testtest', 0, 'test@gmail.com', '0000-00-00', 'male', '0000-00-00', 0, 'test', 'admin', 'admin01', '2022-11-26 10:05:44', 'test', 'test', 'test', 'test', '1', 'Work From Home', 'test', '2022-11-03'),
(16, 'test', 'test11234', 'emp002', 'Test4', 'VTSAL181122', 'test', 'test', 0, 'test@gtmaik.com', '2022-11-13', 'male', '1999-02-11', 0, 'test', 'admin', 'admin01', '2022-11-26 10:06:21', 'test', 'test', 'test', 'test', '1', 'Work From Site', 'test', '2022-11-18'),
(17, 'test', 'test567', 'emp001', 'Test5', 'VTAAM261122', 'test', 'test', 987654321, 'test@gmail.com', '2021-03-12', 'male', '1999-05-11', 986543210, 'test', 'admin', 'admin01', '2022-11-26 10:09:15', 'test', 'test', 'test', 'test', '1', 'Work From Home', 'test', '2022-11-26'),
(18, 'assignEmp', 'assignEmp12', 'emp001', 'Test6', 'VTAAM281122', 'assignEmp', 'assignEmpassignEmp', 0, 'assignEmp@gmail.com', '2022-11-26', 'female', '1996-03-12', 0, 'assignEmp', 'admin', 'emp001', '2022-11-26 10:38:06', 'assignEmp', 'assignEmp', 'assignEmp', 'assignEmp', '2', 'Work From Home', 'assignEmp', '2022-11-28'),
(19, 'hello', 'h123', '', 'Test7', '', 'h', 'h', 987654321, 'h@gmail.com', '2011-03-12', 'male', '2000-03-02', 2147483647, 'h', 'admin', 'admin01', '2022-11-28 04:45:59', 'h', 'h', 'h', 'h', '1', 'Work From Site', 'h', '0000-00-00');

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
-- Table structure for table `table_attrition`
--

CREATE TABLE `table_attrition` (
  `table_attrition_id` int(11) NOT NULL,
  `table_attrition_batch_code` varchar(50) NOT NULL,
  `table_attrition_location` varchar(100) NOT NULL,
  `table_attrition_trainee_code` varchar(50) NOT NULL,
  `table_attrition_designation` varchar(50) NOT NULL,
  `table_attrition_join_date` date NOT NULL,
  `table_attrition_trainer_code` varchar(50) NOT NULL,
  `table_attrition_training_stage` varchar(100) NOT NULL,
  `table_attrition_attrition_date` date NOT NULL,
  `table_attrition_attrition_mode` varchar(100) NOT NULL,
  `table_attrition_attrition_category` varchar(100) NOT NULL,
  `table_attrition_detailed_reason` varchar(100) NOT NULL,
  `table_attrition_created_by` varchar(50) NOT NULL,
  `table_attrition_created_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_attrition`
--

INSERT INTO `table_attrition` (`table_attrition_id`, `table_attrition_batch_code`, `table_attrition_location`, `table_attrition_trainee_code`, `table_attrition_designation`, `table_attrition_join_date`, `table_attrition_trainer_code`, `table_attrition_training_stage`, `table_attrition_attrition_date`, `table_attrition_attrition_mode`, `table_attrition_attrition_category`, `table_attrition_detailed_reason`, `table_attrition_created_by`, `table_attrition_created_on`) VALUES
(79, 'VTAAM121122', 'Cuddalore', '900315', 'sdlkfh', '2022-07-07', 'emp001', '1', '2003-12-22', '1', '1', '1', 'admin01', '2022-12-02'),
(80, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 'vt', '2024-12-22', 'absconded', 'absent for more than two days', '3', 'admin01', '2022-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `table_emp_remark`
--

CREATE TABLE `table_emp_remark` (
  `Id` int(11) NOT NULL,
  `Batch_code` varchar(100) NOT NULL,
  `trainee_code` varchar(100) NOT NULL,
  `Rag` varchar(100) NOT NULL,
  `Remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_emp_remark`
--

INSERT INTO `table_emp_remark` (`Id`, `Batch_code`, `trainee_code`, `Rag`, `Remark`) VALUES
(26, 'VTAAM221122', 'emp0012345', 'Amber', 'Bad'),
(27, 'VTAAM211122', 'emp0012', 'Red', 'Good'),
(28, 'VTAAM121122', '900315', 'Green', 'Good'),
(29, 'VTAAM121122', '900316', 'Green', 'Bad'),
(30, 'VTGUN231122', 'Emp111', 'Amber', 'Good'),
(31, 'VTSAL231122', 'test001', 'Green', 'Good'),
(33, 'VTAAM221122', 'emp009', 'Amber', 'Good'),
(34, 'VTAAM261122', 'emp11100', 'Green', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `id` int(11) NOT NULL,
  `trainee_code` varchar(20) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  `batch_code` varchar(30) NOT NULL,
  `objectives` varchar(100) NOT NULL,
  `topics_covered` varchar(100) NOT NULL,
  `opportunity` varchar(100) NOT NULL,
  `training_rating` varchar(100) NOT NULL,
  `time_trianing` varchar(100) NOT NULL,
  `training_material` varchar(100) NOT NULL,
  `knowledge_topic` varchar(100) NOT NULL,
  `participation` varchar(100) NOT NULL,
  `answered_questions` varchar(100) NOT NULL,
  `training_methods` varchar(100) NOT NULL,
  `effective_training_program` varchar(100) NOT NULL,
  `hands_experience` varchar(100) NOT NULL,
  `call_recordings` varchar(100) NOT NULL,
  `overall_training` varchar(100) NOT NULL,
  `key_learning` varchar(100) NOT NULL,
  `new_learning` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `improve_program` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`id`, `trainee_code`, `emp_code`, `batch_code`, `objectives`, `topics_covered`, `opportunity`, `training_rating`, `time_trianing`, `training_material`, `knowledge_topic`, `participation`, `answered_questions`, `training_methods`, `effective_training_program`, `hands_experience`, `call_recordings`, `overall_training`, `key_learning`, `new_learning`, `feedback`, `improve_program`, `created_by`, `created_on`) VALUES
(10, '', '87688', 'VTAAM210222', 'nb', 'nn', 'bnnnb', 'nbmn', '', 'jhjkh', 'jkhj', 'khjk', 'hjkh', 'jkh', 'jkhj', 'khjk', 'hjk', 'hjk', 'hjkh', 'jkh', 'jkhk', 'hk', 'admin01', '2022-11-30'),
(11, '', '87688', 'VTAAM210222', 'nbmnb', 'nbm', 'bnmb', 'mnbnmb', '', 'bmnbnm', 'bnmbnm', 'bnmb', 'nmb', 'mnbnm', 'bnm', 'bnmb', 'mnbnm', 'nmbnm', 'bnmbnm', 'bmnb', 'nmbmn', 'bn', 'admin01', '2022-11-30'),
(12, '', '87688', 'VTAAM210222', 'nbxnbmnBNMBMN', 'bnmbn', 'mnbnm', 'nmbmn', '', 'bnm', 'nmbnm', 'bnm', 'mnb', 'mnbn', 'mbnm', 'b', 'nmb', 'nmb', 'nm', 'mnb', 'nmb', 'nmb', 'admin01', '2022-11-30'),
(13, '', '900315', 'VTAAM121122', 'nbnmbm', 'mnm,n', 'mnm,nm', 'nm,', '', 'm,n,m', 'nmnm', 'nm,', 'n,mnm,', 'n,m', 'nm,', 'n,mnm,', 'n,mn', 'mn', 'm,n,m', 'nm,n', 'm,nm,', 'n,', 'admin01', '2022-11-30'),
(14, '', '900316', 'VTAAM121122', 'bnm', 'nmbmn', 'bmn', 'bmnb', '', 'mbnm', 'bmnb', 'mnbnm', 'bmn', 'bmnb', 'nmb', 'mnbn', 'mbmn', 'b', 'mnbnm', 'bnmbnm', 'nbmnb', 'bnmbmn', 'admin01', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `table_ojt`
--

CREATE TABLE `table_ojt` (
  `table_ojt_id` int(11) NOT NULL,
  `table_ojt_batch_code` varchar(50) NOT NULL,
  `table_ojt_location` varchar(100) NOT NULL,
  `table_ojt_trainee_code` varchar(50) NOT NULL,
  `table_ojt_designation` varchar(50) NOT NULL,
  `table_ojt_join_date` date NOT NULL,
  `table_ojt_trainer_code` varchar(50) NOT NULL,
  `table_ojt_day_status` int(4) NOT NULL,
  `table_ojt_training_covered` varchar(100) NOT NULL,
  `table_ojt_total_outlet` varchar(50) NOT NULL,
  `table_ojt_target_achieved` varchar(50) NOT NULL,
  `table_ojt_created_by` varchar(50) NOT NULL,
  `table_ojt_created_on` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_ojt`
--

INSERT INTO `table_ojt` (`table_ojt_id`, `table_ojt_batch_code`, `table_ojt_location`, `table_ojt_trainee_code`, `table_ojt_designation`, `table_ojt_join_date`, `table_ojt_trainer_code`, `table_ojt_day_status`, `table_ojt_training_covered`, `table_ojt_total_outlet`, `table_ojt_target_achieved`, `table_ojt_created_by`, `table_ojt_created_on`) VALUES
(101, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 1, '1', '1', '1', 'admin01', '2022-12-02'),
(102, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 2, '1', '1', '1', 'admin01', '2022-12-02'),
(103, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 3, '1', '1', '1', 'admin01', '2022-12-02'),
(104, 'VTAAM121222', 'cuddalore', '2363763', 'jghjg', '2022-11-24', 'emp001', 1, '1', '1', '1', 'admin01', '2022-12-17'),
(105, 'VTAAM121222', 'villupuram', '2363764', 'hkjh', '2022-11-24', 'emp001', 1, '1', '1', '1', 'admin01', '2022-12-17'),
(106, 'VTAAM121222', 'villupuram', '2363765', 'khkjh', '2022-11-25', 'emp001', 1, '1', '1', '1', 'admin01', '2022-12-17'),
(107, 'VTAAM121222', 'cuddalore', '2363763', 'jghjg', '2022-11-24', 'emp001', 2, '1', '1', '1', 'admin01', '2022-12-17'),
(108, 'VTAAM121222', 'villupuram', '2363764', 'hkjh', '2022-11-24', 'emp001', 2, '1', '1', '1', 'admin01', '2022-12-17'),
(109, 'VTAAM121222', 'villupuram', '2363765', 'khkjh', '2022-11-25', 'emp001', 2, '1', '1', '1', 'admin01', '2022-12-17');

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
(2, '1', 'VTAAM121122', '900315', '2022-11-13', 'dlij', 'P', '24.57', '54', '84', '6', '9', '5', '9', '5', '65', 'emp001', '2022-11-12'),
(4, '1', 'VTAAM211122', 'emp0012', '2022-11-22', 'qwe', 'P', '5.00', '5', '5', '5', '5', '5', '5', '5', 'Good', 'emp001', '2022-11-21'),
(5, '1', 'VTAAM221122', 'emp0012345', '2022-11-22', 'qwe', 'P', '7.00', '7', '7', '7', '7', '7', '7', '7', 'Good', 'emp001', '2022-11-22'),
(6, '1', 'VTSAL231122', 'test001', '2022-11-23', '4', 'P', '4.00', '4', '4', '4', '4', '4', '4', '4', 'Good', 'emp002', '2022-11-23'),
(7, '1', 'VTAAM281122', 'assignEmp12', '2022-11-28', '5', 'P', '5.00', '5', '5', '5', '5', '5', '5', '5', 'Good', 'emp001', '2022-11-28');

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
  `day_pic` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainee_dup_record`
--

INSERT INTO `trainee_dup_record` (`id`, `trainer_name`, `emp_code`, `assignedDate`, `createdBy_emp`, `batch_code`, `day_type`, `day_pic`, `status`, `created_on`) VALUES
(1, '', 'emp001', '2022-02-21', 'admin01', 'VTAAM210222', '1', '', 'pending', '2022-02-21'),
(2, '', 'emp001', '2022-11-12', 'admin01', 'VTAAM121122', '1', '', 'completed', '2022-11-12'),
(3, '', 'emp001', '2022-11-13', 'emp001', 'VTAAM121122', '1', '', 'completed', '2022-11-12'),
(6, '', 'emp001', '2022-11-21', 'admin01', 'VTAAM211122', '1', '', 'completed', '2022-11-21'),
(7, '', 'emp001', '2022-11-22', 'emp001', 'VTAAM211122', '1', '', 'completed', '2022-11-21'),
(8, '', 'emp001', '2022-11-22', 'admin01', 'VTAAM221122', '1', '', 'completed', '2022-11-22'),
(9, '', 'emp001', '2022-11-22', 'emp001', 'VTAAM221122', '1', '', 'completed', '2022-11-22'),
(10, '', 'emp001', '2022-11-22', 'emp001', 'VTAAM221122', '1', '', 'pending', '2022-11-22'),
(11, '', 'emp003', '2022-11-22', 'emp001', 'VTKAT221122', '1', '', 'pending', '2022-11-22'),
(12, '', 'emp006', '2022-11-23', 'admin01', 'VTGUN231122', '1', '', 'pending', '2022-11-23'),
(13, '', 'emp002', '2022-11-23', 'admin01', 'VTSAL231122', '1', '', 'completed', '2022-11-23'),
(14, '', 'emp002', '2022-11-23', 'emp002', 'VTSAL231122', '1', '', 'completed', '2022-11-23'),
(15, '', 'emp001', '2022-11-26', 'admin01', 'VTAAM261122', '1', '', 'pending', '2022-11-26'),
(16, '', 'emp001', '2022-11-26', 'admin01', 'VTAAM261122', '1', '', 'pending', '2022-11-26'),
(17, '', 'emp002', '2022-11-18', 'admin01', 'VTSAL181122', '1', '', 'pending', '2022-11-26'),
(18, '', 'emp003', '2022-11-03', 'admin01', 'VTKAT031122', '1', '', 'pending', '2022-11-26'),
(19, '', 'emp001', '2022-11-26', 'admin01', 'VTAAM261122', '1', '', 'pending', '2022-11-26'),
(20, '', 'emp001', '2022-11-28', 'emp001', 'VTAAM281122', '1', '', 'completed', '2022-11-28'),
(21, '', 'emp001', '2022-11-28', 'emp001', 'VTAAM281122', '1', '', 'completed', '2022-11-28');

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
-- Indexes for table `assessment_and_certificate`
--
ALTER TABLE `assessment_and_certificate`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `table_attrition`
--
ALTER TABLE `table_attrition`
  ADD PRIMARY KEY (`table_attrition_id`);

--
-- Indexes for table `table_emp_remark`
--
ALTER TABLE `table_emp_remark`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_ojt`
--
ALTER TABLE `table_ojt`
  ADD PRIMARY KEY (`table_ojt_id`);

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
-- AUTO_INCREMENT for table `assessment_and_certificate`
--
ALTER TABLE `assessment_and_certificate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `create_trainee`
--
ALTER TABLE `create_trainee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supervisor_name`
--
ALTER TABLE `supervisor_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_attrition`
--
ALTER TABLE `table_attrition`
  MODIFY `table_attrition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `table_emp_remark`
--
ALTER TABLE `table_emp_remark`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_ojt`
--
ALTER TABLE `table_ojt`
  MODIFY `table_ojt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `trainee_daily_report`
--
ALTER TABLE `trainee_daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainee_dup_record`
--
ALTER TABLE `trainee_dup_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trainer_name`
--
ALTER TABLE `trainer_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

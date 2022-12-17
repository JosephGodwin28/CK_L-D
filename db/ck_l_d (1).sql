-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2022 at 07:19 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `create_trainee`;
CREATE TABLE IF NOT EXISTS `create_trainee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_address` varchar(700) NOT NULL,
  `l_address` varchar(700) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `supervisor_name` varchar(30) NOT NULL,
  `trainee_sta` varchar(30) NOT NULL,
  `c_devices` varchar(30) NOT NULL,
  `assignedDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_trainee`
--

INSERT INTO `create_trainee` (`id`, `location`, `trainee_code`, `emp_code`, `name_trainee`, `batch_code`, `designation`, `pro_sbu`, `number`, `emp_emailid`, `join_date`, `gender`, `emp_dob`, `emp_alt_num`, `relation`, `created_by`, `createdBy_emp`, `created_on`, `p_address`, `l_address`, `qualification`, `experience`, `supervisor_name`, `trainee_sta`, `c_devices`, `assignedDate`) VALUES
(1, 'Bangalore', '87688', 'emp001', 'jey', 'VTAAM210222', 'iuhk', 'kjh', 2147483647, 'vignesh@gmail.com', '2022-03-10', 'male', '2022-02-05', 86, 'jkh', 'admin', 'admin01', '2022-02-21 10:22:19', 'kjb', 'mb', 'kb', 'kbkbj', '1', 'Work From Home', '86', '2022-02-21'),
(2, 'Cuddalore', '900315', 'emp001', 'vigneshwaran', 'VTAAM121122', 'sdlkfh', 'dlfdh', 56156661, 'dskfh@gmail.com', '2022-07-07', 'male', '2022-03-11', 5498484, 'sdojf', 'admin', 'admin01', '2022-11-12 05:21:59', 'dslfj', 'dfl', 'dfl', 'dlfowehf', '1', 'Work From Home', '54', '2022-11-12'),
(3, 'pondy', '900316', 'emp001', 'vignesh', 'VTAAM121122', 'kdsjf', 'dkh', 54151611, 'dfkh@gmail.com', '2022-11-10', 'male', '2022-08-18', 544, 'sih', 'admin', 'admin01', '2022-11-12 05:23:06', 'sdkh', 'dkfh', 'dkfh', 'difh', '1', 'Work From Home', '65', '2022-11-12'),
(4, 'villupuram', '900875', 'emp001', 'aris ansari', 'VTAAM181122', 'php developer', 'software', 2147483647, 'arisansari@gmail.com', '2022-11-07', 'male', '1989-06-12', 2147483647, 'muslim', 'admin', 'admin01', '2022-11-16 12:23:11', 'virudhachalam', 'villupuram', 'mca', '1year', '1', 'Work From Home', 'system', '2022-11-18'),
(5, 'villupuram', '2363761', 'emp001', 'ansari', 'VTAAM181122', 'php', 'test', 2147483647, 'ar@gmail.com', '2000-10-18', 'male', '2022-11-17', 2147483647, 'ssss', 'admin', 'admin01', '2022-11-18 09:57:25', 'aaaaa', 'ddddd', 'mca', '1', '1', 'Work From Home', 'mobile', '2022-11-18'),
(6, 'dsahjhdskj', '2363762', '', 'jkhkjdhj', '', 'kjhjk', 'hjkh', 3873233, 'hjkbnmbm@ff.com', '2022-11-13', 'male', '2022-11-13', 32322323, 'ud snm cnmm', 'admin', 'admin01', '2022-11-26 04:45:38', 'n', 'bnmbmnb', 'nbnm', 'nmbnm', '2', 'Work From Home', 'bn', '0000-00-00'),
(7, 'hghjgjh', '2363763', '', 'ghjgh', '', 'jghjg', 'hjg', 2147483647, 'ghjghjg@fsf.com', '2022-11-24', 'female', '2022-11-26', 2147483647, 'bvcgbchggh', 'admin', 'admin01', '2022-11-26 06:09:53', 'cvjgfgj', 'jhfjh', 'jfhjfjh', 'ghjgjh', '', 'Work From Home', 'gfgfgfgh', '0000-00-00'),
(8, 'jkfvjkdhvkj', '2363764', '', 'ajhsdkfhk', '', 'hkjh', 'kjhkj', 33333, 'hjjhkj@hkh', '2022-11-24', 'male', '2022-11-05', 2147483647, 'bjkdsbfkj', 'admin', 'admin01', '2022-11-26 06:11:56', 'jkdshfkjdhkj', 'hkjhjk', 'jhjkhk', 'jkhjk', '', 'Work From Home', 'jbkjh', '0000-00-00'),
(9, 'asgdhkgsdjh', '2363765', '', 'jhjkh', '', 'khkjh', 'jkhjk', 2147483647, 'hjgfghj', '2022-11-25', 'female', '2022-11-13', 645465465, 'tdgdghdgh', 'admin', 'admin01', '2022-11-26 08:56:56', 'hfjhfhj', 'dhgdhgd', 'ytdtdyt', 'nvhvjhv', '2', 'Work From Home', 'vhgjhgjh', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_name`
--

DROP TABLE IF EXISTS `supervisor_name`;
CREATE TABLE IF NOT EXISTS `supervisor_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supervisor_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `table_attrition`;
CREATE TABLE IF NOT EXISTS `table_attrition` (
  `table_attrition_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `table_attrition_created_on` date NOT NULL,
  PRIMARY KEY (`table_attrition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_attrition`
--

INSERT INTO `table_attrition` (`table_attrition_id`, `table_attrition_batch_code`, `table_attrition_location`, `table_attrition_trainee_code`, `table_attrition_designation`, `table_attrition_join_date`, `table_attrition_trainer_code`, `table_attrition_training_stage`, `table_attrition_attrition_date`, `table_attrition_attrition_mode`, `table_attrition_attrition_category`, `table_attrition_detailed_reason`, `table_attrition_created_by`, `table_attrition_created_on`) VALUES
(79, 'VTAAM121122', 'Cuddalore', '900315', 'sdlkfh', '2022-07-07', 'emp001', '1', '2003-12-22', '1', '1', '1', 'admin01', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

DROP TABLE IF EXISTS `table_feedback`;
CREATE TABLE IF NOT EXISTS `table_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `table_ojt`;
CREATE TABLE IF NOT EXISTS `table_ojt` (
  `table_ojt_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `table_ojt_created_on` date NOT NULL,
  PRIMARY KEY (`table_ojt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_ojt`
--

INSERT INTO `table_ojt` (`table_ojt_id`, `table_ojt_batch_code`, `table_ojt_location`, `table_ojt_trainee_code`, `table_ojt_designation`, `table_ojt_join_date`, `table_ojt_trainer_code`, `table_ojt_day_status`, `table_ojt_training_covered`, `table_ojt_total_outlet`, `table_ojt_target_achieved`, `table_ojt_created_by`, `table_ojt_created_on`) VALUES
(101, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 1, '1', '1', '1', 'admin01', '2022-12-02'),
(102, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 2, '1', '1', '1', 'admin01', '2022-12-02'),
(103, 'VTAAM210222', 'Bangalore', '87688', 'iuhk', '2022-03-10', 'emp001', 3, '1', '1', '1', 'admin01', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `trainee_daily_report`
--

DROP TABLE IF EXISTS `trainee_daily_report`;
CREATE TABLE IF NOT EXISTS `trainee_daily_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainee_daily_report`
--

INSERT INTO `trainee_daily_report` (`id`, `training_day`, `batch_code`, `trainee_code`, `assignedDate`, `progress_trend`, `attendance`, `average_score`, `punctuality`, `completion_assignment`, `participation_act`, `understanding_content`, `communication`, `confidence`, `asking_questions`, `remarks`, `created_by`, `created_on`) VALUES
(1, '1', 'VTAAM121122', '900316', '2022-11-13', 'lkjdf', 'P', '28.14', '54', '56', '6', '5', '5', '65', '6', 'sdlkj', 'emp001', '2022-11-12'),
(2, '1', 'VTAAM121122', '900315', '2022-11-13', 'dlij', 'P', '24.57', '54', '84', '6', '9', '5', '9', '5', '65', 'emp001', '2022-11-12'),
(3, '1', 'VTAAM181122', '2363762', '2022-11-21', 'test', 'P', '7.00', '11', '5', '5', '7', '8', '9', '4', 'test', 'emp001', '0000-00-00'),
(4, '1', 'VTAAM181122', '900875', '2022-11-21', 'test', 'P', '7.14', '12', '3', '5', '5', '8', '8', '9', 'test', 'emp001', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `trainee_dup_record`
--

DROP TABLE IF EXISTS `trainee_dup_record`;
CREATE TABLE IF NOT EXISTS `trainee_dup_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_name` varchar(30) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  `assignedDate` date NOT NULL,
  `createdBy_emp` varchar(20) NOT NULL,
  `batch_code` varchar(30) NOT NULL,
  `day_type` varchar(20) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainee_dup_record`
--

INSERT INTO `trainee_dup_record` (`id`, `trainer_name`, `emp_code`, `assignedDate`, `createdBy_emp`, `batch_code`, `day_type`, `status`, `created_on`) VALUES
(1, '', 'emp001', '2022-02-21', 'admin01', 'VTAAM210222', '1', 'pending', '2022-02-21'),
(2, '', 'emp001', '2022-11-12', 'admin01', 'VTAAM121122', '1', 'completed', '2022-11-12'),
(3, '', 'emp001', '2022-11-13', 'emp001', 'VTAAM121122', '1', 'completed', '2022-11-12'),
(4, '', 'emp001', '2022-11-18', 'admin01', 'VTAAM181122', '1', 'completed', '0000-00-00'),
(5, '', 'emp001', '2022-11-21', 'emp001', 'VTAAM181122', '1', 'completed', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_name`
--

DROP TABLE IF EXISTS `trainer_name`;
CREATE TABLE IF NOT EXISTS `trainer_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_name` varchar(100) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `emp_id`, `email`, `password`, `role`, `status`, `created_date`) VALUES
(1, 'admin', 'admin01', 'admin@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2021-12-14 10:26:25'),
(2, 'radha', '111', 'krish@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-15 07:30:32'),
(3, 'krish', 'emp001', 'emp001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-17 11:52:39'),
(4, 'bala', 'emp002', 'emp002@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-17 11:52:59'),
(5, 'kumar', 'emp003', 'emp003@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-17 11:53:19'),
(6, 'abi', 'emp004', 'emp004@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '2021-12-18 05:36:06'),
(7, 'aris', 'emp005', 'aris@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

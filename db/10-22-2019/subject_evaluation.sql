-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 10:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subject_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT 'open/close',
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `name`, `status`, `date_create`) VALUES
(5, '2019-2020', 1, '2019-08-24 16:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `department_id` varchar(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_major` varchar(50) NOT NULL,
  `course_desc` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `department_id`, `code`, `course_title`, `course_major`, `course_desc`, `level`, `date_create`) VALUES
(1, '1', '000001', 'BSRT', '', 'Bachelor of Science in Radiologic Technology', 0, '2019-06-15 11:17:36'),
(2, '1', '000002', 'DM', '', 'Diploma in Midwifery', 0, '2019-06-15 11:17:56'),
(3, '1', '000003', 'BSA', '', 'Bachelor of Science in Architecture', 0, '2019-06-15 11:18:38'),
(4, '1', '000004', 'BSCE', '', 'BS Civil Engineering', 0, '2019-06-15 11:19:01'),
(5, '1', '000005', 'BSIT', '', 'Bachelor of Science in Information Technology', 0, '2019-06-15 11:19:30'),
(6, '1', '000006', 'BSEE', '', 'BS Electrical Engineering', 0, '2019-06-15 11:19:47'),
(7, '1', '000007', 'BSME', '', 'BS Mechanical Engineering', 0, '2019-06-15 11:20:02'),
(8, '1', '000008', 'BAPA', '', 'BA Political Science', 0, '2019-06-15 11:20:43'),
(9, '1', '000009', 'BSED', '', 'Bachelor of Secondary Education major in English', 0, '2019-06-15 11:21:43'),
(10, '1', '000010', 'BEED', '', 'B Elementary Education major in Pre-School Education', 0, '2019-06-15 11:22:04'),
(11, '1', '000011', 'DT', '', 'Diploma in Teaching', 0, '2019-06-15 11:22:18'),
(12, '1', '000012', 'BSAcct', '', 'BS Accountancy', 0, '2019-06-15 11:22:56'),
(13, '1', '000013', 'BSAT', '', 'BS Accounting Technology', 0, '2019-06-15 11:23:10'),
(14, '1', '000014', 'BSBA-B', '', 'BS Business Administration majors in Banking', 0, '2019-06-15 11:23:30'),
(15, '1', '000015', 'BSHM', '', 'BS Hospitality Management', 0, '2019-06-15 11:23:51'),
(16, '1', '000016', 'BSTM', '', 'BS Tourism Management', 0, '2019-06-15 11:24:02'),
(17, '1', '000017', 'BSEd major in Math', '', 'Bachelor of Secondary Education major in Math', 0, '2019-06-20 13:05:43'),
(18, '1', '000018', 'BSEd Major in Science', '', 'Bachelor of Secondary Education Major in Science', 0, '2019-06-20 13:06:26'),
(19, '1', '000019', 'BSBA major in Marketing Management', '', 'BS Business Administration majors in Marketing Management', 0, '2019-06-20 13:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(11) NOT NULL,
  `curriculum_title` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `academicyear` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`id`, `curriculum_title`, `course_id`, `academicyear`, `status`, `date_create`) VALUES
(2, 'BSIT 2019-2020', 5, 5, '1', '2019-10-21 18:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_level`
--

CREATE TABLE `curriculum_level` (
  `id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum_level`
--

INSERT INTO `curriculum_level` (`id`, `curriculum_id`, `year_level`, `date_create`) VALUES
(5, 2, '1', '2019-10-21 18:26:18'),
(6, 2, '2', '2019-10-21 18:26:18'),
(7, 2, '3', '2019-10-21 18:26:18'),
(8, 2, '4', '2019-10-21 18:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_head` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `department_head`, `description`, `date_create`) VALUES
(1, 'SMH', 'RUTH C. ELBANBUENA, RN, RM, MN', 'School of Midwifery & Health Sciences', '2019-06-15 19:11:43'),
(2, 'SECSA', 'BENJAMIN C. TOBIAS', 'School of Engineering, Computer Studies and Architecture', '2019-06-15 19:14:04'),
(3, 'SEAS', 'RHODA J. AMOR', 'School of Education, Arts & Sciences', '2019-06-15 19:14:55'),
(4, 'SBAHTM', 'HENLY S. PAHILAGAO, CPA, PhD', 'School of Business, Accountancy, Hospitality & Tourism Management', '2019-06-15 19:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'enroll or pre-enroll or dropped'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `stud_subject_id` int(11) NOT NULL COMMENT 'from prospectus ID',
  `cid` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `gwa` float NOT NULL,
  `date_submit` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `stud_subject_id`, `cid`, `course`, `level`, `semester`, `gwa`, `date_submit`, `date_updated`) VALUES
(1, 83, 1, 2, 5, 1, 1, 90, '2019-10-21 19:12:34', '2019-10-21 19:12:34'),
(2, 83, 2, 2, 5, 1, 1, 90, '2019-10-21 19:12:36', '2019-10-21 19:12:36'),
(3, 83, 3, 2, 5, 1, 1, 88, '2019-10-21 19:12:38', '2019-10-21 19:12:38'),
(4, 83, 4, 2, 5, 1, 1, 85, '2019-10-21 19:12:40', '2019-10-21 19:12:40'),
(5, 83, 5, 2, 5, 1, 1, 83, '2019-10-21 19:12:42', '2019-10-21 19:12:42'),
(6, 83, 6, 2, 5, 1, 1, 84, '2019-10-21 19:12:44', '2019-10-21 19:12:44'),
(7, 83, 7, 2, 5, 1, 1, 85, '2019-10-21 19:12:46', '2019-10-21 19:12:46'),
(8, 83, 8, 2, 5, 1, 1, 82, '2019-10-21 19:12:48', '2019-10-21 19:12:48'),
(9, 83, 9, 2, 5, 1, 1, 83, '2019-10-21 19:12:50', '2019-10-21 19:12:50'),
(10, 83, 10, 2, 5, 1, 2, 88, '2019-10-21 19:13:23', '2019-10-21 19:13:23'),
(11, 83, 11, 2, 5, 1, 2, 89, '2019-10-21 19:13:25', '2019-10-21 19:13:25'),
(12, 83, 12, 2, 5, 1, 2, 90, '2019-10-21 19:13:26', '2019-10-21 19:13:26'),
(13, 83, 13, 2, 5, 1, 2, 90, '2019-10-21 19:13:28', '2019-10-21 19:13:28'),
(14, 83, 14, 2, 5, 1, 2, 90, '2019-10-21 19:13:36', '2019-10-21 19:13:36'),
(15, 83, 15, 2, 5, 1, 2, 92, '2019-10-21 19:13:37', '2019-10-21 19:13:37'),
(16, 83, 16, 2, 5, 1, 2, 95, '2019-10-21 19:13:39', '2019-10-21 19:13:39'),
(17, 83, 17, 2, 5, 1, 2, 93, '2019-10-21 19:13:40', '2019-10-21 19:13:40'),
(18, 83, 26, 2, 5, 2, 1, 88, '2019-10-21 19:15:02', '2019-10-21 19:15:02'),
(19, 83, 27, 2, 5, 2, 1, 89, '2019-10-21 19:15:04', '2019-10-21 19:15:04'),
(20, 83, 28, 2, 5, 2, 1, 83, '2019-10-21 19:15:07', '2019-10-21 19:15:07'),
(21, 83, 29, 2, 5, 2, 1, 84, '2019-10-21 19:15:08', '2019-10-21 19:15:08'),
(22, 83, 30, 2, 5, 2, 1, 85, '2019-10-21 19:15:10', '2019-10-21 19:15:10'),
(23, 83, 31, 2, 5, 2, 1, 85, '2019-10-21 19:15:11', '2019-10-21 19:15:11'),
(24, 83, 32, 2, 5, 2, 1, 89, '2019-10-21 19:15:12', '2019-10-21 19:15:12'),
(25, 83, 18, 2, 5, 2, 2, 90, '2019-10-21 19:15:31', '2019-10-21 19:15:31'),
(26, 83, 19, 2, 5, 2, 2, 90, '2019-10-21 19:15:33', '2019-10-21 19:15:33'),
(27, 83, 20, 2, 5, 2, 2, 92, '2019-10-21 19:15:34', '2019-10-21 19:15:34'),
(28, 83, 21, 2, 5, 2, 2, 93, '2019-10-21 19:15:35', '2019-10-21 19:15:35'),
(29, 83, 22, 2, 5, 2, 2, 94, '2019-10-21 19:15:37', '2019-10-21 19:15:37'),
(30, 83, 23, 2, 5, 2, 2, 92, '2019-10-21 19:15:38', '2019-10-21 19:15:38'),
(31, 83, 24, 2, 5, 2, 2, 96, '2019-10-21 19:15:40', '2019-10-21 19:15:40'),
(32, 83, 25, 2, 5, 2, 2, 95, '2019-10-21 19:15:41', '2019-10-21 19:15:41'),
(33, 83, 33, 2, 5, 3, 1, 88, '2019-10-21 19:16:18', '2019-10-21 19:16:18'),
(34, 83, 34, 2, 5, 3, 1, 88, '2019-10-21 19:16:19', '2019-10-21 19:16:19'),
(35, 83, 35, 2, 5, 3, 1, 88, '2019-10-21 19:16:20', '2019-10-21 19:16:20'),
(36, 83, 36, 2, 5, 3, 1, 88, '2019-10-21 19:16:21', '2019-10-21 19:16:21'),
(37, 83, 37, 2, 5, 3, 1, 88, '2019-10-21 19:16:22', '2019-10-21 19:16:22'),
(38, 83, 38, 2, 5, 3, 1, 88, '2019-10-21 19:16:25', '2019-10-21 19:16:25'),
(39, 83, 39, 2, 5, 3, 1, 88, '2019-10-21 19:16:26', '2019-10-21 19:16:26'),
(40, 83, 40, 2, 5, 3, 2, 89, '2019-10-21 19:16:47', '2019-10-21 19:16:47'),
(41, 83, 41, 2, 5, 3, 2, 90, '2019-10-21 19:16:51', '2019-10-21 19:16:51'),
(42, 83, 42, 2, 5, 3, 2, 90, '2019-10-21 19:16:52', '2019-10-21 19:16:52'),
(43, 83, 43, 2, 5, 3, 2, 94, '2019-10-21 19:16:53', '2019-10-21 19:16:53'),
(44, 83, 44, 2, 5, 3, 2, 92, '2019-10-21 19:16:54', '2019-10-21 19:16:54'),
(45, 83, 45, 2, 5, 3, 2, 93, '2019-10-21 19:16:55', '2019-10-21 19:16:55'),
(46, 83, 46, 2, 5, 4, 1, 92, '2019-10-21 19:17:39', '2019-10-21 19:17:39'),
(47, 83, 47, 2, 5, 4, 1, 92, '2019-10-21 19:17:41', '2019-10-21 19:17:41'),
(48, 83, 48, 2, 5, 4, 2, 95, '2019-10-21 19:18:12', '2019-10-21 19:18:12'),
(49, 83, 49, 2, 5, 4, 2, 95, '2019-10-21 19:18:15', '2019-10-21 19:18:15'),
(59, 82, 67, 2, 5, 1, 1, 92, '2019-10-21 19:33:49', '2019-10-21 19:33:49'),
(60, 82, 68, 2, 5, 1, 1, 95, '2019-10-21 19:33:51', '2019-10-21 19:33:51'),
(61, 82, 69, 2, 5, 1, 1, 93, '2019-10-21 19:33:55', '2019-10-21 19:33:55'),
(62, 82, 70, 2, 5, 1, 1, 94, '2019-10-21 19:33:57', '2019-10-21 19:33:57'),
(63, 82, 71, 2, 5, 1, 1, 92, '2019-10-21 19:33:59', '2019-10-21 19:33:59'),
(64, 82, 72, 2, 5, 1, 1, 91, '2019-10-21 19:34:00', '2019-10-21 19:34:00'),
(65, 82, 73, 2, 5, 1, 1, 74, '2019-10-21 19:34:04', '2019-10-21 19:34:04'),
(66, 82, 74, 2, 5, 1, 1, 74, '2019-10-21 19:34:05', '2019-10-21 19:34:05'),
(67, 82, 75, 2, 5, 1, 1, 74, '2019-10-21 19:34:06', '2019-10-21 19:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `prospectus`
--

CREATE TABLE `prospectus` (
  `id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `curriculum_level_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospectus`
--

INSERT INTO `prospectus` (`id`, `curriculum_id`, `curriculum_level_id`, `subject_id`, `semester`, `date_create`) VALUES
(1, 2, 5, 1, 1, '2019-10-21 18:29:43'),
(2, 2, 5, 17, 1, '2019-10-21 18:30:15'),
(3, 2, 5, 23, 1, '2019-10-21 18:30:26'),
(5, 2, 5, 12, 1, '2019-10-21 18:30:54'),
(6, 2, 5, 6, 1, '2019-10-21 18:31:10'),
(7, 2, 5, 24, 1, '2019-10-21 18:31:18'),
(8, 2, 5, 25, 1, '2019-10-21 18:31:20'),
(9, 2, 5, 13, 1, '2019-10-21 18:31:28'),
(10, 2, 5, 14, 1, '2019-10-21 18:34:46'),
(11, 2, 5, 15, 2, '2019-10-21 18:37:21'),
(12, 2, 5, 22, 2, '2019-10-21 18:37:32'),
(14, 2, 5, 26, 2, '2019-10-21 18:37:37'),
(15, 2, 5, 27, 2, '2019-10-21 18:39:45'),
(16, 2, 5, 28, 2, '2019-10-21 18:39:56'),
(17, 2, 5, 29, 2, '2019-10-21 18:40:05'),
(18, 2, 5, 30, 2, '2019-10-21 18:40:14'),
(19, 2, 5, 31, 2, '2019-10-21 18:40:21'),
(25, 2, 6, 33, 1, '2019-10-21 18:43:05'),
(26, 2, 6, 34, 1, '2019-10-21 18:43:11'),
(27, 2, 6, 35, 1, '2019-10-21 18:43:16'),
(28, 2, 6, 8, 1, '2019-10-21 18:43:23'),
(29, 2, 6, 36, 1, '2019-10-21 18:43:31'),
(30, 2, 6, 37, 1, '2019-10-21 18:43:32'),
(31, 2, 6, 38, 1, '2019-10-21 18:43:37'),
(32, 2, 6, 19, 2, '2019-10-21 18:43:54'),
(33, 2, 6, 39, 2, '2019-10-21 18:43:59'),
(34, 2, 6, 40, 2, '2019-10-21 18:44:15'),
(36, 2, 6, 41, 2, '2019-10-21 18:45:38'),
(37, 2, 6, 42, 2, '2019-10-21 18:45:46'),
(40, 2, 6, 43, 2, '2019-10-21 18:46:55'),
(42, 2, 6, 44, 2, '2019-10-21 18:46:56'),
(44, 2, 6, 45, 2, '2019-10-21 18:47:20'),
(45, 2, 7, 7, 1, '2019-10-21 18:48:17'),
(46, 2, 7, 46, 1, '2019-10-21 18:48:27'),
(47, 2, 7, 47, 1, '2019-10-21 18:48:35'),
(48, 2, 7, 48, 1, '2019-10-21 18:48:40'),
(49, 2, 7, 49, 1, '2019-10-21 18:48:45'),
(51, 2, 7, 50, 1, '2019-10-21 18:51:16'),
(52, 2, 7, 51, 1, '2019-10-21 18:52:20'),
(53, 2, 7, 16, 2, '2019-10-21 18:52:36'),
(54, 2, 7, 52, 2, '2019-10-21 18:57:21'),
(55, 2, 7, 53, 2, '2019-10-21 18:57:30'),
(56, 2, 7, 54, 2, '2019-10-21 18:57:40'),
(59, 2, 7, 55, 2, '2019-10-21 18:58:24'),
(65, 2, 7, 56, 2, '2019-10-21 19:03:13'),
(68, 2, 8, 57, 1, '2019-10-21 19:08:46'),
(69, 2, 8, 58, 1, '2019-10-21 19:08:51'),
(70, 2, 8, 59, 2, '2019-10-21 19:09:00'),
(71, 2, 8, 60, 2, '2019-10-21 19:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester_name`, `status`, `date_create`) VALUES
(1, 'First', 1, '2019-08-24 16:58:54'),
(2, 'Second', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` int(11) NOT NULL,
  `year` varchar(30) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `middle_name`, `address`, `gender`, `dob`, `age`, `birth_place`, `religion`, `civil_status`, `nationality`, `mobile`, `email`, `course`, `year`, `date_create`) VALUES
(78, 'John', 'Doe', 'Smith', 'Hello World', 'Male', '2019-09-20', 20, 'Kabankalan City', 'Catholic', 'Single', 'Filipino', '34253425345', 'johndoe@gmail.com', 5, '2', '2019-09-20 11:06:28'),
(79, 'Jane', 'Doe', 'Smith', 'adasdasd', 'Male', '2019-09-20', 20, 'Kabankalan City', 'Catholic', 'Single', 'Filipino', '346', 'jeandoe@gmail.com', 5, '1', '2019-09-20 11:33:17'),
(80, 'Arian', 'Alaman', 'A', 'Kabankalan City', 'Female', '2019-09-27', 12, 'Kabankalan City', 'Catholic', 'Single', 'Filipino', '123456785', 'aa@gmail.com', 5, '1', '2019-09-27 14:38:32'),
(81, 'Irene', 'Taquiso', 'Test', 'sdasd', 'Female', '2019-10-11', 24, 'asdlfkldsf', 'fds', 'dfg', 'dfg', '342534534523', 'test@test.com', 5, '1', '2019-10-11 19:27:02'),
(82, 'Student', 'Transferee', 'Test', 'sdasas', 'Male', '2019-10-11', 23, 'asdlfkldsf', 'dsaf', 'sdaf', 'sd', '34234', 'test@test.com', 5, '1', '2019-10-11 20:34:04'),
(83, 'Account', 'Dummy', 'Test', 'ft', 'Male', '2019-10-20', 23, 'asdlfkldsf', 'fds', 'dfg', 'dfg', '123', 'test@test.com', 5, '4', '2019-10-20 15:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `father` varchar(50) NOT NULL,
  `father_occuoation` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `guardian_addreess` varchar(100) NOT NULL,
  `other_person` varchar(50) NOT NULL,
  `other_person_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `student_id`, `father`, `father_occuoation`, `mother`, `mother_occupation`, `guardian`, `guardian_addreess`, `other_person`, `other_person_address`) VALUES
(32, 78, 'John Doe father', 'Project Manager', 'John Doe Mother', 'Designer', 'John Doe Guardian', 'Programmer', 'John Doe Other', 'Technical Support Specialist'),
(33, 79, 'John Doe father', 'Project Manager', 'John Doe Mother', 'Designer', 'John Doe Guardian', 'Programmer', 'John Doe Other', 'Technical Support Specialist'),
(34, 80, 'John Doe father', 'Project Manager', 'John Doe Mother', 'Designer', 'John Doe Guardian', 'Programmer', 'John Doe Other', 'Technical Support Specialist'),
(35, 81, 'dsfdf', 'sdfds', 'dsffd', 'sdfdf', 'sdf', 'sdfd', 'dsf', 'sdf'),
(36, 82, 'dsfdf', 'dsf', 'sdf', 'df', 'df', 'df', 'dsf', 'sdf'),
(37, 83, 'dsfdf', 'sdfds', 'dsffd', 'sdfdf', 'sdf', 'sdfd', 'dsf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `student_requirements`
--

CREATE TABLE `student_requirements` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `form138` int(11) NOT NULL DEFAULT 0,
  `nso` int(11) NOT NULL DEFAULT 0,
  `baptismal` int(11) DEFAULT 0,
  `cgc` int(11) NOT NULL DEFAULT 0,
  `entrance_exam_result` int(11) NOT NULL DEFAULT 0,
  `marriage_certificate` int(11) NOT NULL DEFAULT 0,
  `transfer_of_records` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`, `curriculum_id`, `course_id`, `year_level`, `academic_year`, `semester`, `enrollment_id`) VALUES
(1, 83, 1, 2, 5, 1, 5, 1, 0),
(2, 83, 2, 2, 5, 1, 5, 1, 0),
(3, 83, 3, 2, 5, 1, 5, 1, 0),
(4, 83, 5, 2, 5, 1, 5, 1, 0),
(5, 83, 6, 2, 5, 1, 5, 1, 0),
(6, 83, 7, 2, 5, 1, 5, 1, 0),
(7, 83, 8, 2, 5, 1, 5, 1, 0),
(8, 83, 9, 2, 5, 1, 5, 1, 0),
(9, 83, 10, 2, 5, 1, 5, 1, 0),
(10, 83, 11, 2, 5, 1, 5, 2, 0),
(11, 83, 12, 2, 5, 1, 5, 2, 0),
(12, 83, 14, 2, 5, 1, 5, 2, 0),
(13, 83, 15, 2, 5, 1, 5, 2, 0),
(14, 83, 16, 2, 5, 1, 5, 2, 0),
(15, 83, 17, 2, 5, 1, 5, 2, 0),
(16, 83, 18, 2, 5, 1, 5, 2, 0),
(17, 83, 19, 2, 5, 1, 5, 2, 0),
(18, 83, 32, 2, 5, 2, 5, 2, 0),
(19, 83, 33, 2, 5, 2, 5, 2, 0),
(20, 83, 34, 2, 5, 2, 5, 2, 0),
(21, 83, 36, 2, 5, 2, 5, 2, 0),
(22, 83, 37, 2, 5, 2, 5, 2, 0),
(23, 83, 40, 2, 5, 2, 5, 2, 0),
(24, 83, 42, 2, 5, 2, 5, 2, 0),
(25, 83, 44, 2, 5, 2, 5, 2, 0),
(26, 83, 25, 2, 5, 2, 5, 1, 0),
(27, 83, 26, 2, 5, 2, 5, 1, 0),
(28, 83, 27, 2, 5, 2, 5, 1, 0),
(29, 83, 28, 2, 5, 2, 5, 1, 0),
(30, 83, 29, 2, 5, 2, 5, 1, 0),
(31, 83, 30, 2, 5, 2, 5, 1, 0),
(32, 83, 31, 2, 5, 2, 5, 1, 0),
(33, 83, 45, 2, 5, 3, 5, 1, 0),
(34, 83, 46, 2, 5, 3, 5, 1, 0),
(35, 83, 47, 2, 5, 3, 5, 1, 0),
(36, 83, 48, 2, 5, 3, 5, 1, 0),
(37, 83, 49, 2, 5, 3, 5, 1, 0),
(38, 83, 51, 2, 5, 3, 5, 1, 0),
(39, 83, 52, 2, 5, 3, 5, 1, 0),
(40, 83, 53, 2, 5, 3, 5, 2, 0),
(41, 83, 54, 2, 5, 3, 5, 2, 0),
(42, 83, 55, 2, 5, 3, 5, 2, 0),
(43, 83, 56, 2, 5, 3, 5, 2, 0),
(44, 83, 59, 2, 5, 3, 5, 2, 0),
(45, 83, 65, 2, 5, 3, 5, 2, 0),
(46, 83, 68, 2, 5, 4, 5, 1, 0),
(47, 83, 69, 2, 5, 4, 5, 1, 0),
(48, 83, 70, 2, 5, 4, 5, 2, 0),
(49, 83, 71, 2, 5, 4, 5, 2, 0),
(67, 82, 1, 2, 5, 1, 5, 1, 0),
(68, 82, 2, 2, 5, 1, 5, 1, 0),
(69, 82, 3, 2, 5, 1, 5, 1, 0),
(70, 82, 5, 2, 5, 1, 5, 1, 0),
(71, 82, 6, 2, 5, 1, 5, 1, 0),
(72, 82, 7, 2, 5, 1, 5, 1, 0),
(73, 82, 8, 2, 5, 1, 5, 1, 0),
(74, 82, 9, 2, 5, 1, 5, 1, 0),
(75, 82, 10, 2, 5, 1, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(11) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_desc` varchar(250) NOT NULL,
  `units` int(11) NOT NULL,
  `prerequisite` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_code`, `subject_title`, `subject_desc`, `units`, `prerequisite`, `date_create`) VALUES
(1, 'CRE1', 'Christian Ethics', 'Christian theology that defines virtuous behavior and wrong behavior from a Christian perspective.', 3, '', '2019-06-20 11:02:47'),
(6, 'SCGE 1', 'Understanding the Self', 'Understanding the Self', 3, '', '2019-06-20 11:22:11'),
(7, 'SCGE 2', 'Readings in Philippine History', 'Readings in Philippine History', 3, '', '2019-06-20 13:50:37'),
(8, 'SCGE 3', 'The Contemporary World', 'The Contemporary World', 3, '', '2019-06-20 13:56:23'),
(9, 'ACC1', 'Comprehensive Basic Accounting', 'Comprehensive Basic Accounting', 6, '', '2019-06-20 13:58:55'),
(10, 'AE 11', 'Managerial Economics', 'Managerial Economics', 3, '', '2019-06-20 14:01:12'),
(11, 'CBME 1', 'Operation Management & TQM', 'Operation Management & TQM', 3, '', '2019-06-20 14:04:58'),
(12, 'SCGE 4', 'Mathematics in the Modern World', 'Mathematics in the Modern World', 3, '', '2019-06-20 14:16:21'),
(13, 'NSTP 1', 'National Service Training Program 1', 'National Service Training Program 1', 3, '', '2019-06-20 14:45:15'),
(14, 'PE 1', 'Physical Education 1', 'Physical Education 1', 2, '', '2019-06-20 14:45:41'),
(15, 'CRE2', 'Christian Living', 'Christian Living', 3, '', '2019-06-20 14:47:57'),
(16, 'SCGE 6', 'Art Appreciation', 'Art Appreciation', 3, '', '2019-06-20 14:48:35'),
(17, 'SCGE 5', 'Purposive Communication', 'Purposive Communication', 3, '', '2019-06-20 14:50:18'),
(18, 'AE 13', 'Financial Accounting & Reporting', 'Financial Accounting & Reporting', 3, '', '2019-06-20 14:51:00'),
(19, 'SCGE 7', 'Science, Technology & Society', 'Science, Technology & Society', 3, '', '2019-06-20 14:51:47'),
(20, 'AE 22', 'Cost Accounting Control', 'Cost Accounting Control', 3, '', '2019-06-20 14:52:33'),
(21, 'AE 12', 'Economic Development', 'Economic Development', 3, '', '2019-06-20 14:53:15'),
(22, 'SCGE 8', 'Ethics', 'Ethics', 3, '', '2019-07-06 19:50:35'),
(23, 'SCGE 11', 'Filipino at Iba\'t ibang Disiplina', 'Filipino at Iba\'t ibang Disiplina', 3, '', '2019-07-06 19:54:59'),
(24, 'ITC 11', 'Introduction to Computing', 'Introduction to Computing', 3, '', '2019-07-06 19:57:16'),
(25, 'ITC 12', 'Computer Programming 1', 'Computer Programming 1 (Fundamentals of Programming)', 3, '', '2019-07-06 19:58:09'),
(26, 'SCGE 12', 'Sosyedad at Literatura/Panitikang Panlipunan', 'Sosyedad at Literatura/Panitikang Panlipunan', 3, '', '2019-07-06 21:30:50'),
(27, 'IT 11', 'Intorduction to Human Computer Interaction', 'Intorduction to Human Computer Interaction', 3, '', '2019-07-06 21:31:55'),
(28, 'IT 12', 'Discrete Mathematics', 'Discrete Mathematics', 3, '', '2019-07-06 21:33:21'),
(29, 'ITC 13', 'Computer Programming 2', 'Computer Programming 2 (Intermediate Programming)', 3, 'ITC 12', '2019-07-06 21:34:33'),
(30, 'NSTP 2', 'National Service Training Program 2', 'National Service Training Program 2', 3, 'NSTP 1', '2019-07-06 21:35:12'),
(31, 'PE 2', 'Physical Education 2', 'Physical Education 2', 2, 'PE 1', '2019-07-06 21:35:35'),
(33, 'ITC 14', 'Data Structures and Algorithm', 'Data Structures and Algorithm', 3, 'IT 12', '2019-07-06 23:54:46'),
(34, 'IT 13', 'Object Oriented Programming', 'Object Oriented Programming', 3, 'ITC 13', '2019-07-06 23:59:01'),
(35, 'IT 14', 'Platform Technologies', 'Platform Technologies', 3, '', '2019-07-06 23:59:29'),
(36, 'ElecIT 101', 'Multimedia Systems', 'Multimedia Systems', 3, '', '2019-07-07 00:00:58'),
(37, 'ElecIT 102', 'Web Systems and Technologies', 'Web Systems and Technologies', 3, '', '2019-07-07 00:01:26'),
(38, 'PE 3', 'Physical Education 3', 'Physical Education 3', 2, 'PE 1', '2019-07-07 00:01:56'),
(39, 'SCGE 9', 'Rizal Life and Works', 'Rizal Life and Works', 3, '', '2019-07-07 00:04:24'),
(40, 'IT 15', 'Integrative Programming and Technologies 1', 'Integrative Programming and Technologies 1', 3, '', '2019-07-07 00:04:54'),
(41, 'ElecIT 103', 'Fundamentals of Database Systems', 'Fundamentals of Database Systems', 3, '', '2019-07-07 00:05:23'),
(42, 'ITC 15', 'Information Management 1', 'Information Management 1', 3, '', '2019-07-07 00:05:49'),
(43, 'IT 16', 'Quantitative Methods', 'Quantitative Methods (including modeling and simulation)', 3, '', '2019-07-07 00:06:46'),
(44, 'IT 17', 'Networking 1', 'Networking 1', 3, '', '2019-07-07 00:07:08'),
(45, 'PE 4', 'Physical Education 4', 'Physical Education 4', 2, 'PE 2', '2019-07-07 00:07:30'),
(46, 'IT 18', 'Advance Database Systems', 'Advance Database Systems', 3, 'ElecIT 102', '2019-07-25 15:21:50'),
(47, 'IT 19', 'Networking 2', 'Networking 2', 3, 'IT 17', '2019-07-25 15:23:07'),
(48, 'IT 20', 'System Integration and Architecture 1', 'System Integration and Architecture 1', 3, '', '2019-07-25 15:24:05'),
(49, 'IT 21', 'Event Driven Programming', 'Event Driven Programming', 3, '', '2019-07-25 15:44:09'),
(50, 'ElecIT 104', 'Human Computer Interaction 2', 'Human Computer Interaction 2', 3, 'IT 11', '2019-10-21 18:51:10'),
(51, 'IT 30', 'Integrative Programming Technologies 2', 'Integrative Programming Technologies 2', 3, 'IT 15', '2019-10-21 18:52:13'),
(52, 'SCGE 10N', 'Methods of Research in Computing', 'Methods of Research in Computing', 3, 'IT 20', '2019-10-21 18:53:40'),
(53, 'IT 22', 'Information Assurance & Security 1', 'Information Assurance & Security 1', 3, '', '2019-10-21 18:54:32'),
(54, 'IT 23', 'Systems Integration & Architecture 2', 'Systems Integration & Architecture 2', 3, 'IT 20', '2019-10-21 18:55:25'),
(55, 'ITC 16', 'Applications Development and Emerging Technologies', 'Applications Development and Emerging Technologies', 3, 'IT 13', '2019-10-21 18:56:22'),
(56, 'IT 31', 'Artificial Intelligence', 'Artificial Intelligence', 3, '', '2019-10-21 18:57:07'),
(57, 'IT 26', 'Systems Administration and Maintenance', 'Systems Administration and Maintenance', 3, 'IT 18', '2019-10-21 19:06:28'),
(58, 'IT 27', 'Capstone Project 2', 'Capstone Project 2', 3, 'IT 121', '2019-10-21 19:07:09'),
(59, 'IT 28', 'Practicum', 'Practicum', 6, '', '2019-10-21 19:07:43'),
(60, 'IT 29', 'Social and Professional Business', 'Social and Professional Business', 3, ' ', '2019-10-21 19:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `full_name`, `user_type`, `date_create`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 'administrator', '2019-06-05 17:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `year_level`
--

CREATE TABLE `year_level` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_level`
--

INSERT INTO `year_level` (`id`, `level`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum_level`
--
ALTER TABLE `curriculum_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectus`
--
ALTER TABLE `prospectus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requirements`
--
ALTER TABLE `student_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `year_level`
--
ALTER TABLE `year_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curriculum_level`
--
ALTER TABLE `curriculum_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `prospectus`
--
ALTER TABLE `prospectus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_requirements`
--
ALTER TABLE `student_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `year_level`
--
ALTER TABLE `year_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

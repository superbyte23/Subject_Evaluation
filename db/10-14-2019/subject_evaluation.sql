-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 03:44 AM
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
(1, 'BSIT 2019-2020', 5, 5, '1', '2019-10-12 07:12:37');

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
(1, 1, '1', '2019-10-12 07:12:37'),
(2, 1, '2', '2019-10-12 07:12:37'),
(3, 1, '3', '2019-10-12 07:12:37'),
(4, 1, '4', '2019-10-12 07:12:37');

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
(10, 81, 23, 1, 5, 1, 1, 85, '2019-10-12 10:46:37', '2019-10-12 10:46:37'),
(11, 81, 24, 1, 5, 1, 1, 85, '2019-10-12 10:46:38', '2019-10-12 10:46:38'),
(12, 81, 25, 1, 5, 1, 1, 86, '2019-10-12 10:46:39', '2019-10-12 10:46:39'),
(13, 81, 26, 1, 5, 1, 1, 87, '2019-10-12 10:46:41', '2019-10-12 10:46:41'),
(14, 81, 27, 1, 5, 1, 1, 84, '2019-10-12 10:46:42', '2019-10-12 10:46:42'),
(15, 81, 28, 1, 5, 1, 1, 85, '2019-10-12 10:46:43', '2019-10-12 10:46:43'),
(16, 81, 29, 1, 5, 1, 1, 83, '2019-10-12 10:46:47', '2019-10-12 10:46:47'),
(17, 81, 30, 1, 5, 1, 1, 85, '2019-10-12 10:46:49', '2019-10-12 10:46:49'),
(18, 81, 31, 1, 5, 1, 1, 83, '2019-10-12 10:46:56', '2019-10-12 10:46:56'),
(19, 82, 32, 1, 5, 1, 1, 90, '2019-10-12 10:47:28', '2019-10-12 10:47:28'),
(20, 82, 33, 1, 5, 1, 1, 90, '2019-10-12 10:47:32', '2019-10-12 10:47:32'),
(21, 82, 34, 1, 5, 1, 1, 90, '2019-10-12 10:47:34', '2019-10-12 10:47:34'),
(22, 82, 35, 1, 5, 1, 1, 91, '2019-10-12 10:47:35', '2019-10-12 10:47:35'),
(23, 82, 36, 1, 5, 1, 1, 92, '2019-10-12 10:47:37', '2019-10-12 10:47:37'),
(24, 82, 37, 1, 5, 1, 1, 93, '2019-10-12 10:47:39', '2019-10-12 10:47:39'),
(25, 82, 38, 1, 5, 1, 1, 94, '2019-10-12 10:47:40', '2019-10-12 10:47:40');

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
(1, 1, 1, 1, 1, '2019-07-06 22:50:38'),
(2, 1, 1, 17, 1, '2019-07-06 22:50:47'),
(3, 1, 1, 23, 1, '2019-07-06 22:51:01'),
(4, 1, 1, 12, 1, '2019-07-06 22:51:07'),
(5, 1, 1, 6, 1, '2019-07-06 22:51:16'),
(6, 1, 1, 24, 1, '2019-07-06 22:51:22'),
(7, 1, 1, 25, 1, '2019-07-06 22:51:23'),
(8, 1, 1, 13, 1, '2019-07-06 22:51:30'),
(9, 1, 1, 14, 1, '2019-07-06 22:52:02'),
(10, 1, 1, 15, 2, '2019-07-06 22:52:19'),
(11, 1, 1, 22, 2, '2019-07-06 22:52:33'),
(12, 1, 1, 26, 2, '2019-07-06 22:53:02'),
(13, 1, 1, 27, 2, '2019-07-06 22:53:10'),
(14, 1, 1, 28, 2, '2019-07-06 22:53:15'),
(15, 1, 1, 29, 2, '2019-07-06 22:53:23'),
(16, 1, 1, 30, 2, '2019-07-06 22:53:29'),
(17, 1, 1, 31, 2, '2019-07-06 22:53:34'),
(18, 1, 2, 33, 1, '2019-07-06 23:57:05'),
(19, 1, 2, 34, 1, '2019-07-06 23:59:45'),
(20, 1, 2, 35, 1, '2019-07-06 23:59:49'),
(21, 1, 2, 8, 1, '2019-07-07 00:00:05'),
(22, 1, 2, 38, 1, '2019-07-07 00:02:45'),
(23, 1, 2, 36, 1, '2019-07-07 00:02:57'),
(24, 1, 2, 37, 1, '2019-07-07 00:03:00'),
(25, 1, 2, 19, 2, '2019-07-07 00:03:36'),
(26, 1, 2, 39, 2, '2019-07-07 00:07:41'),
(27, 1, 2, 40, 2, '2019-07-07 00:07:50'),
(28, 1, 2, 41, 2, '2019-07-07 00:07:56'),
(29, 1, 2, 42, 2, '2019-07-07 00:08:09'),
(30, 1, 2, 43, 2, '2019-07-07 00:08:24'),
(31, 1, 2, 44, 2, '2019-07-07 00:08:30'),
(32, 1, 2, 45, 2, '2019-07-07 00:08:36');

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
(80, 'Arian', 'Alaman', 'A', 'Kabankalan City', 'Female', '2019-09-27', 12, 'Kabankalan City', 'Catholic', 'Single', 'Filipino', '123456785', 'alsagar@gmail.com', 5, '1', '2019-09-27 14:38:32'),
(81, 'Irene', 'Taquiso', 'Test', 'sdasd', 'Female', '2019-10-11', 24, 'asdlfkldsf', 'fds', 'dfg', 'dfg', '342534534523', 'test@test.com', 5, '1', '2019-10-11 19:27:02'),
(82, 'Student', 'Transferee', 'Test', 'sdasas', 'Male', '2019-10-11', 23, 'asdlfkldsf', 'dsaf', 'sdaf', 'sd', '34234', 'test@test.com', 5, '1', '2019-10-11 20:34:04');

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
(36, 82, 'dsfdf', 'dsf', 'sdf', 'df', 'df', 'df', 'dsf', 'sdf');

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
(23, 81, 1, 1, 5, 1, 5, 1, 0),
(24, 81, 2, 1, 5, 1, 5, 1, 0),
(25, 81, 3, 1, 5, 1, 5, 1, 0),
(26, 81, 4, 1, 5, 1, 5, 1, 0),
(27, 81, 5, 1, 5, 1, 5, 1, 0),
(28, 81, 6, 1, 5, 1, 5, 1, 0),
(29, 81, 7, 1, 5, 1, 5, 1, 0),
(30, 81, 8, 1, 5, 1, 5, 1, 0),
(31, 81, 9, 1, 5, 1, 5, 1, 0),
(32, 82, 1, 1, 5, 1, 5, 1, 0),
(33, 82, 2, 1, 5, 1, 5, 1, 0),
(34, 82, 3, 1, 5, 1, 5, 1, 0),
(35, 82, 4, 1, 5, 1, 5, 1, 0),
(36, 82, 5, 1, 5, 1, 5, 1, 0),
(37, 82, 6, 1, 5, 1, 5, 1, 0),
(38, 82, 7, 1, 5, 1, 5, 1, 0);

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
(38, 'PE 3', 'Physical Education 3', 'Physical Education 3', 2, 'PE 2', '2019-07-07 00:01:56'),
(39, 'SCGE 9', 'Rizal Life and Works', 'Rizal Life and Works', 3, '', '2019-07-07 00:04:24'),
(40, 'IT 15', 'Integrative Programming and Technologies 1', 'Integrative Programming and Technologies 1', 3, '', '2019-07-07 00:04:54'),
(41, 'ElecIT 103', 'Fundamentals of Database Systems', 'Fundamentals of Database Systems', 3, '', '2019-07-07 00:05:23'),
(42, 'ITC 15', 'Information Management 1', 'Information Management 1', 3, '', '2019-07-07 00:05:49'),
(43, 'IT 16', 'Quantitative Methods', 'Quantitative Methods (including modeling and simulation)', 3, '', '2019-07-07 00:06:46'),
(44, 'IT 17', 'Networking 1', 'Networking 1', 3, '', '2019-07-07 00:07:08'),
(45, 'PE 4', 'Physical Education 4', 'Physical Education 4', 2, 'PE 3', '2019-07-07 00:07:30'),
(46, 'IT 18', 'Advance Database Systems', 'Advance Database Systems', 3, 'ElecIT 102', '2019-07-25 15:21:50'),
(47, 'IT 19', 'Networking 2', 'Networking 2', 3, 'IT 17', '2019-07-25 15:23:07'),
(48, 'IT 20', 'System Integration and Architecture 1', 'System Integration and Architecture 1', 3, '', '2019-07-25 15:24:05'),
(49, 'IT 21', 'Event Driven Programming', 'Event Driven Programming', 3, '', '2019-07-25 15:44:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `curriculum_level`
--
ALTER TABLE `curriculum_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `prospectus`
--
ALTER TABLE `prospectus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_requirements`
--
ALTER TABLE `student_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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

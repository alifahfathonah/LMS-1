-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 10:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, 'Super Admin1', 'superadmin1@gmail.com', 'superadmin123', 'super admin', 'active'),
(2, 'Ali Akbar', 'ahmad@gmail.com', 'ahmad123', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `assign_group`
--

CREATE TABLE `assign_group` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_group`
--

INSERT INTO `assign_group` (`id`, `sid`, `gid`, `status`) VALUES
(15, 3, 2, 'inactive'),
(16, 11, 4, 'inactive'),
(17, 6, 5, 'inactive'),
(18, 10, 3, 'inactive'),
(28, 3, 4, 'inactive'),
(29, 1, 4, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `iid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `sid`, `iid`) VALUES
(5, 3, 1),
(6, 1, 2),
(7, 3, 2),
(8, 1, 1),
(12, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sid`, `iid`, `feedback`) VALUES
(1, 6, 2, 'Great and effective learning'),
(2, 10, 1, 'Very impressive'),
(3, 1, 1, 'Very Informative and helpul '),
(4, 1, 2, 'Here is your feedback. Excelle');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `iid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `iid`, `status`) VALUES
(1, 'Linear Algebra', 1, 'inactive'),
(2, 'Programming Fundammentals', 1, 'inactive'),
(3, 'Calculus', 2, 'active'),
(4, 'Python for beginners', 1, 'active'),
(5, 'Probability', 2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `name`, `email`, `password`, `address`, `gender`, `status`) VALUES
(1, 'Qadeer Raza', 'qadeer@gmail.com', 'qadeer123', 'sahiwal, pakistan', 'male', 'active'),
(2, 'Bilal Shafiq', 'bilal@gmail.com', 'bilal123', 'Farid Twon sahiwal pakistan', 'male', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `lisence`
--

CREATE TABLE `lisence` (
  `id` int(11) NOT NULL,
  `lkey` varchar(30) NOT NULL,
  `exp_date` date DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lisence`
--

INSERT INTO `lisence` (`id`, `lkey`, `exp_date`, `sid`, `iid`, `status`) VALUES
(1, 'jkK80fA5', '2021-12-31', 1, 1, 'active'),
(2, 'pQPH0nXu', '2021-01-30', NULL, 2, 'inactive'),
(3, '2e0TJHiB', '2022-01-01', 2, NULL, 'inactive'),
(4, 'JqNRIrJX', '2021-01-19', NULL, 1, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `address`, `gender`, `status`) VALUES
(1, 'Ahmad Ashfaq', 'ahmad123@gmail.com', 'ahmad123', 'Lahore punjab pakistan', 'male', 'inactive'),
(2, 'Hina Altaf', 'hina@gmail.com', 'hina1234', 'sahiwal, pakistan', 'female', 'inactive'),
(3, 'Zulfiqar', 'zulfi@gmail.com', 'zulfi1234', 'Toba tak sing, Pakistan', 'male', 'inactive'),
(6, 'Nawaz Ul haq', 'nawaz@gmail.com', 'nawaz123', 'nawaz home address here', 'male', 'inactive'),
(10, 'Kashif Khan', 'kashif@gmail.com', 'kashif123', 'Kashif living address put here', 'male', 'inactive'),
(11, 'yaqoob ali', 'yaqoob@gmail.com', 'yaqoob123', 'Farid Twon sahiwal pakistan', 'male', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `validity` date NOT NULL,
  `l_type` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `user_type`, `validity`, `l_type`, `status`) VALUES
(1, 'Ahmad Sharif', 'student', '2021-01-30', 'monthly', 'active'),
(2, 'Zulfiqar', 'instructor', '2020-12-31', 'weekly', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `workbook`
--

CREATE TABLE `workbook` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `iid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workbook`
--

INSERT INTO `workbook` (`id`, `title`, `iid`, `status`) VALUES
(1, 'Linear Algebra Excersice', 1, 'inactive'),
(2, 'Intro to Programming', 2, 'inactive'),
(3, 'Calculus 1', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `workbook_ch`
--

CREATE TABLE `workbook_ch` (
  `id` int(11) NOT NULL,
  `ch` int(11) NOT NULL,
  `wid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workbook_ch`
--

INSERT INTO `workbook_ch` (`id`, `ch`, `wid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 3),
(5, 2, 3),
(6, 3, 3),
(7, 4, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workbook_qs`
--

CREATE TABLE `workbook_qs` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `options` varchar(300) DEFAULT NULL,
  `chid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workbook_qs`
--

INSERT INTO `workbook_qs` (`id`, `question`, `options`, `chid`) VALUES
(5, 'What is Stats?', 'Help to plot graph , Help to Manage , NOt Helping', 4),
(6, 'What is Linear Algbra and why we use it in our daily life? Explain in your words', '', 1),
(7, 'What is Linear Algbra and why we use it in our daily life? Explain in your words', '', 4),
(8, 'What is Linear Algbra and why we use it in our daily life?', 'Option1 Example , Option 2 exampke , Option3 example', 4),
(9, 'What is Increment in Programming', '', 8),
(10, 'Which One is pre Increment Sign?', 'i-- , ++i , --i', 8);

-- --------------------------------------------------------

--
-- Table structure for table `workbook_submit`
--

CREATE TABLE `workbook_submit` (
  `id` int(11) NOT NULL,
  `chid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `ans` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workbook_submit`
--

INSERT INTO `workbook_submit` (`id`, `chid`, `wid`, `sid`, `ans`) VALUES
(6, 8, 2, 1, 'Yes Increment in programming is working as increase in values , ++i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_group`
--
ALTER TABLE `assign_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`sid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `iid` (`iid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nsid` (`sid`),
  ADD KEY `i_iid` (`iid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `in_id` (`iid`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lisence`
--
ALTER TABLE `lisence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`sid`),
  ADD KEY `i_id` (`iid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workbook`
--
ALTER TABLE `workbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inst_id` (`iid`);

--
-- Indexes for table `workbook_ch`
--
ALTER TABLE `workbook_ch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wid` (`wid`);

--
-- Indexes for table `workbook_qs`
--
ALTER TABLE `workbook_qs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chid` (`chid`);

--
-- Indexes for table `workbook_submit`
--
ALTER TABLE `workbook_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuid` (`sid`),
  ADD KEY `wkid` (`wid`),
  ADD KEY `chpid` (`chid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_group`
--
ALTER TABLE `assign_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lisence`
--
ALTER TABLE `lisence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workbook`
--
ALTER TABLE `workbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workbook_ch`
--
ALTER TABLE `workbook_ch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `workbook_qs`
--
ALTER TABLE `workbook_qs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workbook_submit`
--
ALTER TABLE `workbook_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_group`
--
ALTER TABLE `assign_group`
  ADD CONSTRAINT `gid` FOREIGN KEY (`gid`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `std_id` FOREIGN KEY (`sid`) REFERENCES `student` (`id`);

--
-- Constraints for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD CONSTRAINT `iid` FOREIGN KEY (`iid`) REFERENCES `instructor` (`id`),
  ADD CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `student` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `i_iid` FOREIGN KEY (`iid`) REFERENCES `instructor` (`id`),
  ADD CONSTRAINT `nsid` FOREIGN KEY (`sid`) REFERENCES `student` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `in_id` FOREIGN KEY (`iid`) REFERENCES `instructor` (`id`);

--
-- Constraints for table `lisence`
--
ALTER TABLE `lisence`
  ADD CONSTRAINT `i_id` FOREIGN KEY (`iid`) REFERENCES `instructor` (`id`),
  ADD CONSTRAINT `s_id` FOREIGN KEY (`sid`) REFERENCES `student` (`id`);

--
-- Constraints for table `workbook`
--
ALTER TABLE `workbook`
  ADD CONSTRAINT `inst_id` FOREIGN KEY (`iid`) REFERENCES `instructor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workbook_ch`
--
ALTER TABLE `workbook_ch`
  ADD CONSTRAINT `wid` FOREIGN KEY (`wid`) REFERENCES `workbook` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workbook_qs`
--
ALTER TABLE `workbook_qs`
  ADD CONSTRAINT `chid` FOREIGN KEY (`chid`) REFERENCES `workbook_ch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workbook_submit`
--
ALTER TABLE `workbook_submit`
  ADD CONSTRAINT `chpid` FOREIGN KEY (`chid`) REFERENCES `workbook_ch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stuid` FOREIGN KEY (`sid`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wkid` FOREIGN KEY (`wid`) REFERENCES `workbook` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

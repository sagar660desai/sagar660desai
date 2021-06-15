-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 03:11 PM
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
-- Database: `demoproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `login_user` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `login_logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `p_id` int(11) NOT NULL,
  `p_date` datetime NOT NULL,
  `p_name` text NOT NULL,
  `p_manager` text NOT NULL,
  `p_artist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`p_id`, `p_date`, `p_name`, `p_manager`, `p_artist`) VALUES
(2, '2021-06-15 06:11:51', 'demo new car project', '17', '20'),
(3, '2021-06-15 06:27:59', 'demo new car project', '22', '21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_login_id` text NOT NULL,
  `user_password` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_parent_id` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_login_id`, `user_password`, `user_role`, `user_parent_id`, `user_status`, `user_entry_date`) VALUES
(1, 'desai', 'admin@gmail.com', 'qUWCqWk=', 1, 0, 1, '0000-00-00 00:00:00'),
(17, 'mansih', 'manisha@gmail.com', 'pUCBqXRT', 2, 0, 1, '2021-06-15 06:10:31'),
(18, 'vishal', 'vishal@gmail.com', 'vkicqGZX', 2, 0, 0, '2021-06-15 06:10:49'),
(19, 'ravi', 'ravi@gmail.com', 'ukCZqQ==', 3, 0, 1, '2021-06-15 06:11:10'),
(20, 'man', 'man@gmail.com', 'pUCB', 3, 0, 1, '2021-06-15 06:11:19'),
(21, 'raj', 'raj@gmail.com', 'ukCF', 3, 0, 1, '2021-06-15 06:11:32'),
(22, 'kapoor', 'kapoor@gmail.com', 'o0Cfr2hJ', 2, 0, 1, '2021-06-15 06:20:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

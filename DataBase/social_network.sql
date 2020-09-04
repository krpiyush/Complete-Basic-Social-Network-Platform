-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 02:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `access` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `access`, `name`) VALUES
(1, 'admin', 'admin@12345', 'full', 'Piyush');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(12) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'programming'),
(6, 'networking'),
(7, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Date` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ID`, `Name`, `Message`, `Date`) VALUES
(1, 'pk', 'Hiii', '18:37:56'),
(2, 'pk', 'Hiii', '18:38:01'),
(3, 'db', 'hiii', '18:59:16'),
(4, 'db', 'Hiiii', '18:59:22'),
(6, 'Piyush', 'thanks', '19:22:47'),
(7, 'Piyush', 'thanks', '19:23:04'),
(8, 'Piyush', 'Anyone there...', '19:23:31'),
(9, 'Piyush', 'hi there', '00:00:00'),
(10, 'Piyush', 'Hiii', '04:01:00'),
(12, 'Piyush', 'I am fine...', '04:07:00'),
(13, 'pk', 'hiiii', '00:00:00'),
(14, 'Piyush', 'hi', '04:15:00'),
(18, 'Piyush', 'Thanks', '05:21:00'),
(19, 'Piyush', '', '05:48:00'),
(20, 'Megha', '', '06:01:00'),
(21, 'Megha', '', '06:02:00'),
(22, 'Piyush', '', '06:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 1, 4, 'hi						', 'piyush_kumar_773162', '2019-11-18 19:21:54'),
(2, 5, 4, 'nice post\r\n', 'piyush_kumar', '2019-11-22 16:37:15'),
(3, 7, 4, 'nice post', 'piyush_kumar', '2019-11-23 03:41:04'),
(4, 8, 7, 'great', 'piyush_kumar', '2019-11-23 03:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `pay_req`
--

CREATE TABLE `pay_req` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_req`
--

INSERT INTO `pay_req` (`id`, `user_id`, `username`, `amount`, `status`, `req_date`, `Phone_no`) VALUES
(1, '12', 'demo', '335', 'Success', '2020-05-13 20:52:40', '8102722819'),
(2, '4', 'piyush_kumar', '34', 'Pending', '2020-05-13 20:55:38', '8102722819'),
(8, '4', 'piyush_kumar', '34', 'Success', '2020-05-13 22:04:38', '8102722819'),
(9, '4', 'piyush_kumar', '3.4', 'Pending', '2020-05-13 22:06:43', '8102722819'),
(10, '4', 'piyush_kumar', '3.5', 'Success', '2020-05-14 03:46:16', '8102722819'),
(11, '7', 'megha_mishra_549316', '0.4', 'Pending', '2020-05-14 04:06:02', '7895106205'),
(12, '4', 'piyush_kumar', '3.5', 'Success', '2020-05-14 04:13:09', '8102722819');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(1, 4, 'Hello World...!!!!', '', '2019-11-17 19:23:06'),
(5, 4, 'hi', 'World Cricket Championship 2.PNG.69', '2019-11-19 19:04:03'),
(8, 7, '#blissful', '', '2019-11-23 03:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `accnt_Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accnt_Id`, `username`, `password`, `user_Id`) VALUES
(8, 'mcdo', '8542c29a0773a42de1f302903b9e2d74', 13),
(9, 'mar', '5fa9db2e335ef69a4eeb9fe7974d61f4', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `comment_Id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `post_Id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`comment_Id`, `comment`, `post_Id`, `datetime`, `user_Id`, `f_name`, `l_name`) VALUES
(24, '192.168.0.1', 17, '2020-05-10 12:17:24', 4, 'Piyush', 'Kumar'),
(25, '192.168.0.12', 17, '2020-05-10 01:05:58', 4, 'Piyush', 'Kumar'),
(26, '192.168.0.122', 17, '2020-05-10 01:08:40', 4, 'Piyush', 'Kumar'),
(28, '192.168.0.190', 17, '2020-05-10 01:23:36', 4, 'Piyush', 'Kumar'),
(29, '1.1.1.1', 17, '2020-05-10 01:26:30', 4, 'Piyush', 'Kumar'),
(30, '255.255.255.2', 17, '2020-05-10 01:31:01', 4, 'Piyush', 'Kumar'),
(31, '192.168.0.1\r\n\r\n', 17, '2020-05-14 12:09:50', 4, 'Piyush', 'Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `post_Id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `datetime` datetime DEFAULT NULL,
  `cat_id` int(12) DEFAULT NULL,
  `user_Id` int(12) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_Id`, `title`, `content`, `datetime`, `cat_id`, `user_Id`, `f_name`, `l_user`) VALUES
(15, 'Array Index', 'What is starting index of Array..?', '2020-04-19 11:40:18', 7, 4, NULL, NULL),
(16, 'techwiki the blog', 'Error\r\n', '2020-04-20 12:29:28', 6, 4, NULL, NULL),
(17, 'What is default DNS address', '255.255.255.0', '2020-05-09 09:14:04', 6, 4, 'Piyush', 'Kumar'),
(18, 'Array', 'Array out of index', '2020-05-14 11:49:28', 7, 4, 'Piyush', 'Kumar'),
(19, 'IP Address', 'what is default ip?', '2020-05-14 12:09:29', 6, 4, 'Piyush', 'Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_Id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_Id`, `fname`, `lname`, `gender`) VALUES
(4, 'piyush', 'kumar', 'male'),
(13, 'mcdo', 'mcdo', 'Male'),
(14, 'mar', 'mar', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL,
  `u_music` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`, `u_music`) VALUES
(4, 'Piyush', 'Kumar', 'piyush_kumar', 'Happy', 'Single', '9334714344', 'pkdr78@gmail.com', 'India', 'Male', '1997-12-10', '91414.JPG.76', 'default_cover.jpg.44', '2019-11-17 16:52:08', 'verified', 'yes', 'mohan', 'Music 1'),
(5, 'captain', 'America', 'captain_america_171386', 'hi there', '...', '9334714344', 'captain@gmail.com', 'India', 'Male', '1910-12-10', 'dp1.png', 'default_cover.jpg', '2019-11-19 21:03:19', 'verified', 'no', 'Iwanttoputadingintheuniverse', 'default.mp3'),
(6, 'Naman', 'Gupta', 'naman_gupta_846099', 'hi there', '...', 'admin', 'naman@gmail.com', 'India', 'Male', '2000-10-15', 'dp2.png', 'default_cover.jpg', '2019-11-22 19:52:36', 'verified', 'no', 'admin', 'default.mp3'),
(7, 'Megha', 'Mishra', 'megha_mishra_549316', 'hi there', '...', 'admin', 'megha@gmail.com', 'India', 'Female', '1998-02-28', 'dp1.png', 'default_cover.jpg', '2019-11-22 19:53:26', 'verified', 'yes', 'admin', 'Currently set to default.mp3'),
(8, 'Smita', 'Kumari', 'smita_kumari_419219', 'hi there', '...', '123456', 'smita@gmail.com', 'India', 'Female', '1998-10-10', 'dp1.png', 'default_cover.jpg', '2019-11-23 03:56:54', 'verified', 'no', 'admin', 'default.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES
(1, 5, 4, 'hi	', '2019-11-20 11:32:49', 'no'),
(2, 4, 4, 'hi\r\n', '2019-11-20 12:15:04', 'no'),
(3, 4, 4, 'hi\r\n', '2019-11-20 12:15:10', 'no'),
(4, 4, 4, 'hello', '2019-11-20 12:15:16', 'no'),
(5, 4, 4, 'hello', '2019-11-20 12:15:20', 'no'),
(6, 5, 4, 'hello\r\n', '2019-11-20 12:15:37', 'no'),
(7, 5, 4, 'hello\r\n', '2019-11-20 12:15:40', 'no'),
(8, 5, 4, 'hello\r\n', '2019-11-20 12:17:45', 'no'),
(9, 5, 4, 'hello\r\n', '2019-11-20 12:19:06', 'no'),
(10, 5, 4, 'hello\r\n', '2019-11-20 12:20:29', 'no'),
(11, 5, 4, 'hello\r\n', '2019-11-20 12:23:19', 'no'),
(12, 5, 4, 'hello\r\n', '2019-11-20 12:23:30', 'no'),
(13, 5, 4, 'hello\r\n', '2019-11-20 12:24:12', 'no'),
(14, 5, 4, 'hello\r\n', '2019-11-20 12:25:01', 'no'),
(15, 5, 4, 'hello\r\n', '2019-11-20 12:25:56', 'no'),
(16, 4, 5, 'hi\r\n', '2019-11-20 12:30:08', 'no'),
(17, 5, 4, 'whats up', '2019-11-20 12:30:37', 'no'),
(18, 4, 5, 'good and u?', '2019-11-20 12:34:13', 'no'),
(19, 5, 4, 'nice', '2019-11-20 12:34:25', 'no'),
(20, 4, 5, 'are you free', '2019-11-20 12:35:24', 'no'),
(21, 5, 4, 'yes', '2019-11-20 13:24:17', 'no'),
(22, 5, 4, '#7646FF\r\n', '2019-11-22 14:38:32', 'no'),
(23, 5, 4, 'hello', '2019-11-22 18:32:01', 'no'),
(24, 7, 4, 'hi', '2019-11-22 21:09:07', 'no'),
(25, 7, 4, 'hi', '2019-11-23 03:45:53', 'no'),
(26, 4, 7, 'hi', '2019-11-23 03:46:16', 'no'),
(27, 4, 7, 'hello', '2020-02-25 09:39:56', 'no'),
(28, 7, 4, 'hi', '2020-02-25 09:40:23', 'no'),
(29, 7, 4, 'hi', '2020-02-25 09:40:34', 'no'),
(30, 7, 4, 'hi megha', '2020-02-25 10:12:26', 'no'),
(31, 5, 4, 'hi\r\n', '2020-04-18 13:58:20', 'no'),
(32, 5, 4, 'hi', '2020-04-18 13:58:24', 'no'),
(33, 5, 4, 'hello', '2020-05-14 03:44:36', 'no'),
(34, 6, 4, 'Hi', '2020-05-14 04:12:03', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `t_comment` int(20) NOT NULL,
  `t_msg` int(20) NOT NULL,
  `t_post` int(20) NOT NULL,
  `t_point` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `t_comment`, `t_msg`, `t_post`, `t_point`, `user_id`, `date`) VALUES
(1, 0, 0, 0, 0, 4, '2020-05-14 03:13:24'),
(2, 0, 0, 0, 0, 7, '2020-05-14 09:27:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `pay_req`
--
ALTER TABLE `pay_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`accnt_Id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`comment_Id`),
  ADD KEY `user_Id` (`user_Id`),
  ADD KEY `post_Id` (`post_Id`),
  ADD KEY `user_Id_2` (`user_Id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`post_Id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pay_req`
--
ALTER TABLE `pay_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `accnt_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD CONSTRAINT `tblaccount_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbluser` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbluser` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomment_ibfk_2` FOREIGN KEY (`post_Id`) REFERENCES `tblpost` (`post_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `tblpost_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

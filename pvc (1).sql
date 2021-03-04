-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 10:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'fawad@gmail.com', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `blog_cat_id` int(11) NOT NULL,
  `blog_cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`blog_cat_id`, `blog_cat_title`) VALUES
(1, 'javaScript'),
(2, 'C++'),
(4, 'mysqli'),
(5, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `blog_com_id` int(11) NOT NULL,
  `blog_comment_name` varchar(255) NOT NULL,
  `blog_comment_email` varchar(255) NOT NULL,
  `blog_comment_body` text NOT NULL,
  `name` text NOT NULL,
  `size` text NOT NULL,
  `blog_comment_status` varchar(50) NOT NULL DEFAULT 'Unapproved',
  `blog_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`blog_com_id`, `blog_comment_name`, `blog_comment_email`, `blog_comment_body`, `name`, `size`, `blog_comment_status`, `blog_post_id`) VALUES
(122, 'fawad 4bros', 'fawad4bros@gmail.com', 'fawad', 'admin2.pdf', '1643988', 'Approved', 62),
(125, 'fawad 4bros', 'fawad4bros@gmail.com', 'worng file this one', 'admin.pdf', '1643988', 'Approved', 63),
(126, 'fawad 4bros', 'fawad4bros@gmail.com', 'new file', 'admin2.pdf', '1643988', 'Approved', 68),
(127, 'fawad', 'fawad4bros@gmail.com', 'hi', 'admin.pdf', '1643988', 'Approved', 68),
(128, 'fawad', 'fawad4bros@gmail.com', 'bye', 'TitlePageBSCS023R16119FawadNaeem.pdf', '176194', 'Approved', 68),
(129, 'fawad', 'fawad4bros@gmail.com', 'new', 'TitlePageBSCS023R16119FawadNaeem.pdf', '176194', 'Approved', 68),
(130, 'fawad', 'fawad4bros@gmail.com', 'check this file out', 'admin.pdf', '1643988', 'Approved', 69),
(131, 'fawad 4bros', 'fawad4bros@gmail.com', 'No check this file out', 'admin2.pdf', '1643988', 'Approved', 69),
(132, 'fawad 4bros', 'fawad4bros@gmail.com', 'je han', 'TitlePageBSCS023R16119FawadNaeem.pdf', '176194', 'Approved', 70);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `blog_post_id` int(11) NOT NULL,
  `blog_post_title` varchar(255) NOT NULL,
  `blog_post_cat_title` varchar(255) NOT NULL,
  `blog_post_cat_id` int(11) NOT NULL,
  `blog_post_author` varchar(255) NOT NULL,
  `blog_post_content` text NOT NULL,
  `blog_post_date` varchar(255) NOT NULL,
  `blog_post_image` text NOT NULL,
  `name` text NOT NULL,
  `size` text NOT NULL,
  `blog_post_comment_count` int(255) NOT NULL,
  `blog_post_views` int(255) NOT NULL,
  `blog_post_tags` text NOT NULL,
  `blog_post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `blog_post_track` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`blog_post_id`, `blog_post_title`, `blog_post_cat_title`, `blog_post_cat_id`, `blog_post_author`, `blog_post_content`, `blog_post_date`, `blog_post_image`, `name`, `size`, `blog_post_comment_count`, `blog_post_views`, `blog_post_tags`, `blog_post_status`, `blog_post_track`) VALUES
(62, 'hi', 'javaScript', 1, 'fawad 4bros', 'hi', 'Thursday 22 October 2020', 'photo.jpg', 'admin.pdf', '1643988', 0, 0, 'hi', 'published', ''),
(63, 'fawad', 'javaScript', 1, 'fawad 4bros', 'fawad', 'Thursday 22 October 2020', 'Untitled.jpg', 'admin2.pdf', '1643988', 0, 0, 'fawad', 'published', ''),
(67, 'saad', 'javaScript', 1, 'fawad4bros', 'saad', 'Thursday 22 October 2020', 'download.jpg', 'admin.pdf', '1643988', 0, 0, 'saad', 'published', ''),
(68, 'jawad', 'javaScript', 1, 'fawad 4bros', 'jawad', 'Thursday 29 October 2020', 'photo.jpg', 'admin.pdf', '1643988', 0, 0, 'jawad', 'published', ''),
(69, 'hammad', 'javaScript', 1, 'fawad', 'hammad', 'Thursday 29 October 2020', 'Web 1920 – 1@2x.jpg', 'TitlePageBSCS023R16119FawadNaeem.pdf', '176194', 0, 0, 'hammad', 'published', ''),
(70, 'fawad', 'javaScript', 1, 'fawad 4bros', 'fawda', 'Thursday 29 October 2020', 'Untitled.jpg', 'FYPReportBSCS023R16119FawadNaeem.pdf', '1994153', 0, 0, 'dawad', 'published', '');

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `blog_user_id` int(11) NOT NULL,
  `blog_username` varchar(255) NOT NULL,
  `blog_user_email` varchar(255) NOT NULL,
  `blog_user_password` text NOT NULL,
  `blog_user_profile_pic` text NOT NULL,
  `blog_user_is_active` varchar(3) NOT NULL DEFAULT 'yes',
  `blog_post_id` int(11) NOT NULL,
  `blog_user_role` varchar(255) NOT NULL DEFAULT 'Editor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`blog_user_id`, `blog_username`, `blog_user_email`, `blog_user_password`, `blog_user_profile_pic`, `blog_user_is_active`, `blog_post_id`, `blog_user_role`) VALUES
(20, 'fawad', 'fawad4bros@gmail.com', 'ef166fd99bb7502b9b9343e945c1d0ce', 'users/profile_pics/defaults/head_1.png', 'yes', 0, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(96, 17, 'Cover', '1.jpg.43', '2020-09-19 19:22:37'),
(98, 17, 'No', 'q3 ai.jpg.59', '2020-09-19 19:23:06'),
(106, 19, 'sdsd', 'IMG-20140425-WA0004.jpg.54', '2020-09-19 22:02:47'),
(107, 17, 'fawad', '', '2020-09-20 02:19:57'),
(110, 19, 'saaad', 'Admin use case.jpg.22', '2020-09-20 04:36:52'),
(111, 19, 'No', 'admit card.jpg.45', '2020-09-20 04:36:59'),
(112, 19, 'saad', '', '2020-09-20 04:37:03'),
(114, 17, 'fawad', '', '2020-10-14 12:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`) VALUES
(17, 'fawad 4bros', 'naeem', 'fawad4bros', 'Hello PVC', 'Single', '0616774920', 'fawad4bros@gmail.com', 'Pakistan', 'Male', '1996-09-11', '11.BeFunky_c11121.jpg.jpg', '6.before.jpg', '2020-06-21 06:52:12', 'verified', 'yes', 'fawad'),
(18, 'biru', 'log', 'biru_log_582126', 'Hello Coding Cafe.This is my default status!', '...', '0614017626', 'birulog@gmail.com', 'Pakistan', 'Male', '2020-07-09', '72936-survarium-game-4k-ultra-hd-wallpaper__video-games.jpg.50', '72936-survarium-game-4k-ultra-hd-wallpaper__video-games.jpg.37', '2020-07-01 15:04:11', 'verified', 'yes', 'Iwanttoputading intheuniverse.'),
(19, 'saad', 'naeem', 'saad_naeem_790820', 'Hello PVC.This is my default status!', '', '123456789', 'saad@gmail.com', 'Pakistan', 'Male', '2020-09-04', '../users/pic1.jpg', '../cover/cover.jpg', '2020-09-04 13:43:58', 'verified', 'yes', 'Iwanttoputading intheuniverse.'),
(20, 'naeem', 'raza', 'naeem_raza_151174', 'Hello PVC.This is my default status!', '', '123456789', 'naeem@gmail.com', 'Pakistan', 'Male', '2020-09-12', '../users/pic3.jpg', '../cover/cover.jpg', '2020-09-13 06:59:15', 'verified', 'no', 'Iwanttoputading intheuniverse.'),
(21, '12345', '6789', '12345_6789_144967', 'Hello PVC.This is my default status!', '', '123456789', 'jawad@gmail.com', 'Pakistan', 'Male', '2020-10-03', '../users/pic2.jpg', '../cover/cover.jpg', '2020-09-30 22:55:03', 'verified', 'no', 'Iwanttoputading intheuniverse.'),
(22, 'jawad', 'raza', 'jawad_raza_455613', 'Hello PVC.This is my default status!', '', '1234567890', '123@gmail.com', 'Pakistan', 'Male', '2020-11-12', '../users/pic2.jpg', '../cover/cover.jpg', '2020-11-17 10:13:04', 'verified', 'no', 'Iwanttoputading intheuniverse.');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES
(29, 18, 17, 'hi', '2020-11-16 18:33:45', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `session` char(100) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`session`, `time`) VALUES
('li6epu115g2rr543u3qd9tlamj', 1609106118);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`blog_cat_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`blog_com_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`blog_post_id`);

--
-- Indexes for table `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`blog_user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `blog_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `blog_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `blog_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `blog_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

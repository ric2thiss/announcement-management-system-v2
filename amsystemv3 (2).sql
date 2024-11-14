-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 03:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amsystemv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_by`) VALUES
(13, 'USG', NULL),
(14, 'LITS', NULL),
(15, 'CEIT', NULL),
(16, 'CTHM', NULL),
(17, 'CBA', NULL),
(18, 'General', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(4, 'CBA'),
(1, 'CEIT'),
(3, 'CITTE'),
(2, 'CTHM');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinned_posts`
--

CREATE TABLE `pinned_posts` (
  `pinned_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `pinned_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinned_posts`
--

INSERT INTO `pinned_posts` (`pinned_id`, `post_id`, `pinned_date`) VALUES
(54, 45, '2024-11-05'),
(55, 47, '2024-11-08'),
(56, 48, '2024-11-13'),
(57, 50, '2024-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_when` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_when`, `user_id`, `category_id`, `images`, `created_at`) VALUES
(45, 'Get ready to kick off IT DAY with an energizing Fun Run!', '<p>HELLO TEST</p>', '2024-11-05', 1, 14, 'uploads/image.jpg', '2024-11-04 22:24:51'),
(46, 'asdasdsa', '<p>ASDASD</p>', '2024-11-06', 1, 15, 'uploads/462554293_906348401644475_1392498713266649207_n.jpg', '2024-11-04 22:51:21'),
(47, 'Test', '<p>asdasd</p>', '2024-11-08', 1, 15, 'uploads/image.jpg', '2024-11-07 22:03:56'),
(48, 'NOW TEST', '<p>asdsd</p>', '2024-11-13', 1, 18, 'uploads/297151_184570888280773_1423610_n.jpg', '2024-11-13 00:36:16'),
(49, 'HELLO WORLD', '<p><br></p>', '2024-11-15', 1, 16, 'uploads/Screenshot 2024-10-25 132826.png', '2024-11-13 21:11:41'),
(50, 'asdasd', '<p>asdasd</p>', '2024-11-14', 1, 13, 'uploads/Screenshot 2024-11-10 221407.png', '2024-11-14 00:04:35');

--
-- Triggers `posts`
--
DELIMITER $$
CREATE TRIGGER `after_post_insert` AFTER INSERT ON `posts` FOR EACH ROW BEGIN
    IF NEW.post_when >= NOW() THEN
        INSERT INTO scheduled_posts (post_id, schedule_date)
        VALUES (NEW.post_id, NEW.post_when);
        -- Do not modify NEW.post_when here, as it's not allowed in AFTER triggers.
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `department_id`) VALUES
(1, 'BSIT', 1),
(2, 'EE', 1),
(3, 'BSEE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(3, 'Moderator'),
(4, 'Student'),
(2, 'USG Admin');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_posts`
--

CREATE TABLE `scheduled_posts` (
  `scheduled_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `schedule_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduled_posts`
--

INSERT INTO `scheduled_posts` (`scheduled_id`, `post_id`, `schedule_date`) VALUES
(19, 46, '2024-11-06 00:00:00'),
(20, 49, '2024-11-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `address_purok` varchar(50) DEFAULT NULL,
  `address_barangay` varchar(50) DEFAULT NULL,
  `address_city` varchar(50) DEFAULT NULL,
  `address_zip` varchar(10) DEFAULT NULL,
  `address_province` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id_number`, `first_name`, `last_name`, `middle_initial`, `email`, `password`, `department_id`, `program_id`, `contact_number`, `address_purok`, `address_barangay`, `address_city`, `address_zip`, `address_province`, `gender`, `role_id`, `photo`, `created_at`) VALUES
(1, '20201199', 'Ric Charles', 'Paquibot', 'L', 'ric2thiss@gmail.com', '$2y$10$TshrNSTvA/saE1S6dlvBLuw9VfUQ/2HUXMS7kUrrecPHfpso/GD8G', 1, 1, '09063804889', 'Purok-2A', 'Ampayon', 'Butuan City', '8600', 'Agusan Del Norte', 'Male', 1, 'uploads/profile.jpg', '2024-10-28 11:02:22'),
(4, '19100000405', 'Trixxie Nicolee', 'Petalcorin', 'G', 'trix@example.com', '$2y$10$RzEskhi.rXBH.aw5nXaozO.qNhUiesz/vJZmnGFjdEPtJod.vJ.na', 4, 3, '09123808107', 'asdasdsad', 'asdasdasd', 'Butuan', '8700', 'asdasd', 'Female', 1, '', '2024-10-31 03:13:47'),
(6, '12345', 'Admin', 'Admin', 'L', 'admin@example.com', '$2y$10$74Ev/jYytQXbd8zEN5YY0eJPQUvI2f6sAZByxaf7uTvHd7DvLC.Bu', 3, 3, '09123808107', 'asdasdsad', 'asdasdasd', 'Butuan', '8700', 'asdasd', 'Male', 1, '', '2024-10-31 09:20:19'),
(7, '0212221', 'Trixxie Nicole', 'Petalcorin', 'n', 'xielle021221@gmail.com', '$2y$10$i3NhEfgEFQkGHNwiDsrm/Or90ROhzda.f.AEHfVXPNInOW6D9R/Yy', 1, 1, '064677658768', 'p;[p', '[[i[i', 'ii[i', 'i[iyggu', 'pipuy', 'Female', 1, '', '2024-10-31 10:59:02'),
(8, '012345', 'Student', 'Student', 's', 'student@student.com', '$2y$10$y2lJIEko3OIbpvtY/BJATurbcEZTpYYhP1Po80HXCYLPe32IugUaa', 2, 1, '12345678901', 'Ampayon', 'Ampayon', 'Butuan City', '8600', 'Agusan Del Norte', 'Female', 4, 'uploads/297151_184570888280773_1423610_n.jpg', '2024-11-01 22:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `users_pinned_posts`
--

CREATE TABLE `users_pinned_posts` (
  `user_pinned_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_pinned_posts`
--

INSERT INTO `users_pinned_posts` (`user_pinned_id`, `post_id`, `user_id`) VALUES
(24, 50, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `can_create` tinyint(1) DEFAULT 0,
  `can_update` tinyint(1) DEFAULT 0,
  `can_delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_id` (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pinned_posts`
--
ALTER TABLE `pinned_posts`
  ADD PRIMARY KEY (`pinned_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `scheduled_posts`
--
ALTER TABLE `scheduled_posts`
  ADD PRIMARY KEY (`scheduled_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users_pinned_posts`
--
ALTER TABLE `users_pinned_posts`
  ADD PRIMARY KEY (`user_pinned_id`),
  ADD KEY `post_id` (`post_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `pinned_posts`
--
ALTER TABLE `pinned_posts`
  MODIFY `pinned_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scheduled_posts`
--
ALTER TABLE `scheduled_posts`
  MODIFY `scheduled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_pinned_posts`
--
ALTER TABLE `users_pinned_posts`
  MODIFY `user_pinned_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pinned_posts`
--
ALTER TABLE `pinned_posts`
  ADD CONSTRAINT `pinned_posts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `scheduled_posts`
--
ALTER TABLE `scheduled_posts`
  ADD CONSTRAINT `scheduled_posts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `users_pinned_posts`
--
ALTER TABLE `users_pinned_posts`
  ADD CONSTRAINT `users_pinned_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_pinned_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:24 AM
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
(2, 'Examination for BSIT', 1);

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
-- Table structure for table `pinned_posts`
--

CREATE TABLE `pinned_posts` (
  `pinned_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `pinned_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_when`, `user_id`, `category_id`, `created_at`) VALUES
(1, 'asdasdsa', '<p>asdasd</p>', '2024-02-02', 1, 2, '2024-10-28 14:16:22'),
(2, 'Test Title', 'Test Content', '2024-12-12', 1, 2, '2024-10-28 14:21:12'),
(3, 'Test', '<p><strong>asdasdsad</strong></p>', '2024-10-28', 1, 2, '2024-10-28 14:23:38'),
(4, 'TEST', '<p>asdasdasdas</p>', '2024-12-12', 1, 2, '2024-10-28 14:24:11'),
(5, 'HELLO', '<p>UGMA</p>', '2024-10-29', 1, 2, '2024-10-28 14:47:38'),
(6, 'asdasdsa', '<p>asdasdasd</p>', '2024-10-29', 3, 2, '2024-10-28 14:56:58'),
(7, 'Welcome to my system', '<p><strong>Welcome to my system</strong></p>', '2024-10-31', 1, 2, '2024-10-28 22:01:25'),
(8, 'WE ARE LOOKING FOR 𝗣𝗛𝗢𝗧𝗢𝗚𝗥𝗔𝗣𝗛𝗘𝗥 & 𝗩𝗜𝗗𝗘𝗢𝗚𝗥𝗔𝗣𝗛𝗘𝗥 IN KUMBATI 2024 ', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">WE ARE LOOKING FOR</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">𝗣𝗛𝗢𝗧𝗢𝗚𝗥𝗔𝗣𝗛𝗘𝗥 &amp; 𝗩𝗜𝗗𝗘𝗢𝗚𝗥𝗔𝗣𝗛𝗘𝗥 IN KUMBATI 2024</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">Step into a role where every click tells the event story. Let’s make this year unforgettable!</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">Interested?</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">DM us now and be part of something amazing!</span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">Ji Ah</span></p><p><a href=\"https://www.facebook.com/jo.050800?__cft__[0]=AZXsrM9-xfouSS21xDcCJ3fHLyZRe3-yGrRFAc9Ywf7QynCWG5MYwJ57QxgNg6t5VKiEme8vNLx8-RvA_wke-dhB2j1I3_4U075IyB37oSPALCf04nGyppw-GdNqJmVZvm_rkWJ_JhDhx4at2eHU4DTPiUDPWKV5GhAeU4sYkCDOIu_zJNHFMQLqnuS4a5r3QIQAyiMPou5trJDjAIaYYFc9qr-zng5ZN9fcBOxag57TMA&amp;__tn__=-]K-R\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: var(--blue-link);\">Jomari Ayala</a><a href=\"https://www.facebook.com/jo.050800?__cft__[0]=AZXsrM9-xfouSS21xDcCJ3fHLyZRe3-yGrRFAc9Ywf7QynCWG5MYwJ57QxgNg6t5VKiEme8vNLx8-RvA_wke-dhB2j1I3_4U075IyB37oSPALCf04nGyppw-GdNqJmVZvm_rkWJ_JhDhx4at2eHU4DTPiUDPWKV5GhAeU4sYkCDOIu_zJNHFMQLqnuS4a5r3QIQAyiMPou5trJDjAIaYYFc9qr-zng5ZN9fcBOxag57TMA&amp;__tn__=-]K-R\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">?</a></p><p><a href=\"https://www.facebook.com/hashtag/kumbati2024?__eep__=6&amp;__cft__[0]=AZXsrM9-xfouSS21xDcCJ3fHLyZRe3-yGrRFAc9Ywf7QynCWG5MYwJ57QxgNg6t5VKiEme8vNLx8-RvA_wke-dhB2j1I3_4U075IyB37oSPALCf04nGyppw-GdNqJmVZvm_rkWJ_JhDhx4at2eHU4DTPiUDPWKV5GhAeU4sYkCDOIu_zJNHFMQLqnuS4a5r3QIQAyiMPou5trJDjAIaYYFc9qr-zng5ZN9fcBOxag57TMA&amp;__tn__=*NK-R\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: var(--blue-link);\">#KUMBATI2024</a></p><p><a href=\"https://www.facebook.com/hashtag/csucc?__eep__=6&amp;__cft__[0]=AZXsrM9-xfouSS21xDcCJ3fHLyZRe3-yGrRFAc9Ywf7QynCWG5MYwJ57QxgNg6t5VKiEme8vNLx8-RvA_wke-dhB2j1I3_4U075IyB37oSPALCf04nGyppw-GdNqJmVZvm_rkWJ_JhDhx4at2eHU4DTPiUDPWKV5GhAeU4sYkCDOIu_zJNHFMQLqnuS4a5r3QIQAyiMPou5trJDjAIaYYFc9qr-zng5ZN9fcBOxag57TMA&amp;__tn__=*NK-R\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"background-color: transparent; color: var(--blue-link);\">#CSUCC</a></p><p><br></p>', '2024-10-30', 1, 2, '2024-10-28 22:10:44'),
(9, 'Get ready to kick off IT DAY with an energizing Fun Run!', '<ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">Date: October 29, 2024</span></li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f554.png\" alt=\"🕔\" height=\"16\" width=\"16\"> Call Time: 4:30 AM</span></li></ol><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png\" alt=\"📍\" height=\"16\" width=\"16\"></span><strong style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\"> Location: CSUCC Gymnasium</strong></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">Join us for a fun-filled morning of fitness as we celebrate together! Enjoy activities, get active, and check out the program flow and venue seating arrangements below. Attendance is required. See you there, programmers!</span></p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">1st Year: White</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">2nd Year: Black</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">3rd Year: Maroon</span></li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><span style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">4th Year: Orange</span></li></ol><p><strong style=\"background-color: rgb(255, 255, 255); color: rgb(5, 5, 5);\">Kindly adhere to the color-coding guidelines to help make our students easily identifiable!</strong></p><p><br></p>', '2024-10-30', 1, 2, '2024-10-28 23:27:42'),
(10, 'Mobile Legends team is on fire! Congratulations to these skilled player', '<p><strong>Mobile Legends team is on fire! Congratulations to these skilled player</strong>s for dominating the IT Day elimination round last October 23, 2024 –onto the next challenge! Let’s keep the winning streak alive! 🔥</p><p>Game 1 - Power rangers vs Laravel</p><p>Winner:  Laravel</p><p>Game 2 - FUCICUT eSports vs Osgard Esports</p><p>Winner:  Osgard Esports</p><p>Game 3 - Baorasdar vs GAHI</p><p>Winner: Baorasdar</p><p>Game 4 - Pyat7 vs DL (Drop Lister)</p><p>Winner: DL (Drop Lister)</p><p>Game 5 - Team kupal vs Fucci Destroyer</p><p>Winner: Fucci Destroyer</p><p>Game 6 - Team Bokot-Bokot vs 404 NOT FOUND</p><p>Winner: Team Bokot-Bokot</p><p>Graphics: Jezrel</p>', '2024-10-30', 3, 2, '2024-10-28 23:30:23'),
(11, 'asdasdsa', '<p>asdasd</p>', '2024-10-27', 1, 2, '2024-10-29 00:53:10');

--
-- Triggers `posts`
--
DELIMITER $$
CREATE TRIGGER `after_post_insert` AFTER INSERT ON `posts` FOR EACH ROW BEGIN
    IF NEW.post_when > NOW() THEN
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
(3, 'BSIT Admin'),
(1, 'CEIT Admin'),
(4, 'STUDENT'),
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
(6, 4, '2024-12-12 00:00:00'),
(7, 5, '2024-10-29 00:00:00'),
(8, 6, '2024-10-29 00:00:00'),
(9, 7, '2024-10-31 00:00:00'),
(10, 8, '2024-10-30 00:00:00'),
(11, 9, '2024-10-30 00:00:00'),
(12, 10, '2024-10-30 00:00:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id_number`, `first_name`, `last_name`, `middle_initial`, `email`, `password`, `department_id`, `program_id`, `contact_number`, `address_purok`, `address_barangay`, `address_city`, `address_zip`, `address_province`, `gender`, `role_id`, `created_at`) VALUES
(1, '20201199', 'Ric Charles', 'Paquibot', 'L', 'ric2thiss@gmail.com', '$2y$10$TshrNSTvA/saE1S6dlvBLuw9VfUQ/2HUXMS7kUrrecPHfpso/GD8G', 1, 1, '09063804889', 'Ampayon', 'Ampayon', 'Butuan City', '8600', 'Agusan Del Norte', 'Male', 1, '2024-10-28 11:02:22'),
(2, '19100000405', 'Trixxie Nicole', 'Petalcorin', 'P', 'trix@example.com', '$2y$10$IK.eJ.1U.gDtCbBm6bSQROTb/MJWzh3e5B8KKao2rMILFELEo1662', 2, 3, '09063804889', 'Purok-2A', 'al nahda', 'Butuan City', '8600', 'Agusan Del Norte', 'Female', 4, '2024-10-28 11:03:50'),
(3, '20201234', 'User 1', 'User 1', 'L', 'user@example.com', '$2y$10$9MEbj7BtlyKbXNE8WSGEqOTvk/zqTnj6EEy7lxFfH8p12hzaEkyIC', 1, 3, '09123808107', 'Ampayon', 'Ampayon', 'Butuan City', '8600', 'Agusan Del Norte', 'Female', 1, '2024-10-28 14:56:25');

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinned_posts`
--
ALTER TABLE `pinned_posts`
  MODIFY `pinned_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `scheduled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2026 at 06:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Kim Ngan', 'kimngan@gmail.com', 'Hello, I noticed the module dropdown does not show newly added modules until I refresh the page. Is this expected behavior?', '2026-08-10 09:57:13'),
(2, 'Nguyen Minh', 'nguyenminh@gmail.com', 'Hi admin, could you please check if the file upload limit can be increased? I am trying to upload a screenshot around 6MB and the system rejects it.', '2026-08-10 09:57:48'),
(3, 'Khanh Linh', 'khanhlinh@gmail.com', 'Hello admin, can I talk to you privately to discuss the class schedule?', '2026-08-10 10:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`) VALUES
(1, 'COMP1841 - Web Programming'),
(2, 'COMP1782 - Cyber Security'),
(3, 'COMP1809 - Software Engineering'),
(4, 'COMP1801 - Machine Learning & AI');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `user_id`, `module_id`, `created_at`) VALUES
(1, 'How do I fix a PDO connection being denied?', 'I am trying to connect to MySQL using PDO but keep getting \"SQLSTATE[HY000] Connection refused\". I have checked my host and port but still no luck. Has anyone run into this on XAMPP before?', '1786354909_web.png', 2, 1, '2026-08-10 09:41:49'),
(2, 'Best way to structure a Software Engineering report?', 'For the requirements analysis section, should I use UML use case diagrams or just a written list of functional requirements? Looking for advice on what markers usually expect.', '1786355032_sofware.jpg', 3, 3, '2026-08-10 09:43:52'),
(3, 'Difference between supervised and unsupervised learning?', 'I understand supervised learning uses labeled data, but I am confused about when to actually choose unsupervised learning for a real project. Any simple examples would help.', '1786355543_AI.jpg', 4, 4, '2026-08-10 09:52:23'),
(4, 'How does SQL injection actually work in a login form?', 'We covered this briefly in the Cyber Security lecture but I still do not fully understand how an attacker bypasses a login form with SQL injection. Can someone explain with a simple example?', NULL, 4, 2, '2026-08-10 09:53:10'),
(5, 'Why is my form validation not working with HTML5 required attribute?', 'I added the required attribute to my input fields but the form still submits with empty values when I test it. Is there something else I need to add for it to work properly?', '1786355713_web11.jpg', 5, 1, '2026-08-10 09:55:13'),
(7, 'hi', 'I love HTML ', NULL, 4, 1, '2026-08-10 11:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(20) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Hoang My', 'hoangmy@gmail.com', '$2b$10$w5jq06RVYZwv9VZ/aHAxgu2EJ4901GAT7M6mtuaWxw7ijj6qdxT/O', 'admin'),
(2, 'Nguyen Minh', 'nguyenminh@gmail.com', '$2b$10$yheZK8h6zIfodbtAlncYCeYs7So7I/9co3DjbceJtL68JEaDBDeu.', 'student'),
(3, 'Le Vinh', 'levinh@gmail.com', '$2b$10$m2TXUbcCiQXTpdIHU7xKFOCu0cYt6JRihnHRMhSf3Nw7DurRARXSK', 'student'),
(4, 'Khanh Linh', 'khanhlinh@gmail.com', '$2b$10$CgRpZsbSGdaNCjcqS9K5COcGlHnpRuWm0IWciMkYxox.4XSLD2Ybi', 'student'),
(5, 'Kim Ngan', 'kimngan@gmail.com', '$2b$10$sYPDEI0XdP3CFJpHUTob2uxN2ZDJ4Bd.SRtwuXtw.YWWCV090wdm.', 'student'),
(6, 'Vo Hoang Tu', 'votu@gmail.com', '$2y$10$up1kl4Ra6738y8hWKGb1be8kCy.yLJPVHkHtR6hTwclG/vOIpcX5S', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

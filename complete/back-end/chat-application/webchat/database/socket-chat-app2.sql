-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 10:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socket-chat-app2`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

CREATE TABLE `chatrooms` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatrooms`
--

INSERT INTO `chatrooms` (`chat_id`, `user_id`, `msg`, `timestamp`) VALUES
(141, 2, 'hi', '2022-08-02 14:31:34'),
(142, 2, 'nice', '2022-08-02 14:39:11'),
(143, 1, 'hey', '2022-08-02 14:45:21'),
(144, 1, 'HI', '2022-08-02 14:50:04'),
(145, 1, 'hi', '2022-08-02 14:50:26'),
(146, 1, 'awesome work bro', '2022-08-02 14:50:32'),
(147, 1, 'acha', '2022-08-02 14:50:39'),
(148, 1, 'oh', '2022-08-02 14:51:45'),
(149, 1, 'hi dear', '2022-08-02 14:53:10'),
(150, 1, 'hi', '2022-08-02 14:53:35'),
(151, 1, 'nice', '2022-08-02 15:00:34'),
(152, 1, 'hi', '2022-08-02 15:03:37'),
(153, 1, '', '2022-08-02 15:03:40'),
(154, 0, 'hi', '2022-08-02 15:07:29'),
(155, 0, 'hey', '2022-08-02 15:08:41'),
(156, 1, 'hi', '2022-08-02 15:12:03'),
(157, 2, 'hi', '2022-08-02 15:12:38'),
(158, 2, 'nice', '2022-08-02 15:13:04'),
(159, 2, 'oh', '2022-08-02 15:14:36'),
(160, 1, 'nice', '2022-08-02 15:15:39'),
(161, 1, 'nice', '2022-08-02 15:16:03'),
(162, 2, 'oh', '2022-08-02 15:16:34'),
(163, 1, 'nice', '2022-08-02 15:16:51'),
(164, 1, 'acccha', '2022-08-02 15:16:57'),
(165, 2, 'sun', '2022-08-02 15:17:28'),
(166, 1, 'accha', '2022-08-02 15:18:02'),
(167, 2, 'hey bro', '2022-08-02 15:18:30'),
(168, 1, 'sun', '2022-08-02 15:18:37'),
(169, 1, 'bolo', '2022-08-02 15:18:49'),
(170, 1, 'oh', '2022-08-02 15:18:57'),
(171, 2, 'suno', '2022-08-02 15:19:40'),
(172, 1, 'accha', '2022-08-02 15:19:49'),
(173, 1, 'hey', '2022-08-02 15:20:14'),
(174, 2, 'yes', '2022-08-02 15:20:22'),
(175, 1, 'hey', '2022-08-02 15:20:45'),
(176, 1, 'hey', '2022-08-02 15:22:27'),
(177, 2, 'hey bro', '2022-08-02 15:22:57'),
(178, 1, 'nice', '2022-08-02 15:23:19'),
(179, 2, 'oh my god', '2022-08-02 15:23:27'),
(180, 2, 'nice', '2022-08-02 15:24:17'),
(181, 2, 'oh', '2022-08-02 15:24:22'),
(182, 2, 'suno', '2022-08-02 15:25:30'),
(183, 2, 'bolo na yaar', '2022-08-02 15:25:37'),
(184, 2, 'sno', '2022-08-02 15:26:21'),
(185, 2, 'bolo', '2022-08-02 15:26:25'),
(186, 2, 'nice work any;where', '2022-08-02 15:26:31'),
(187, 1, 'accha', '2022-08-02 15:26:34'),
(188, 1, 'oh', '2022-08-02 15:26:39'),
(189, 1, 'hi', '2022-08-02 15:31:40'),
(190, 1, 'hi', '2022-08-02 15:32:58'),
(191, 1, 'hello', '2022-08-02 15:33:12'),
(192, 1, 'nice', '2022-08-02 15:39:41'),
(193, 1, 'oh', '2022-08-02 15:40:10'),
(194, 2, 'nice', '2022-08-02 15:40:24'),
(195, 2, 'work', '2022-08-02 15:40:27'),
(196, 1, 'oh', '2022-08-02 15:41:30'),
(197, 2, 'oh', '2022-08-02 15:41:45'),
(198, 2, 'hi', '2022-08-02 15:43:27'),
(199, 2, 'nice', '2022-08-02 15:44:26'),
(200, 2, 'hi', '2022-08-02 15:45:20'),
(201, 1, 'hey', '2022-08-02 15:46:55'),
(202, 2, 'hey', '2022-08-02 15:47:02'),
(203, 1, 'oh', '2022-08-02 15:47:27'),
(204, 2, 'ok by talk you later', '2022-08-02 15:47:36'),
(205, 1, 'oh', '2022-08-02 16:38:51'),
(206, 1, 'accha', '2022-08-02 16:39:00'),
(207, 2, 'hi', '2022-08-03 13:24:42'),
(208, 2, 'suno', '2022-08-03 13:25:02'),
(209, 1, 'accha', '2022-08-03 13:25:06'),
(210, 2, 'no problem', '2022-08-03 13:25:11'),
(211, 1, 'oh', '2022-08-03 17:49:38'),
(212, 4, 'hey gys whatsap', '2022-08-03 17:58:36'),
(213, 4, 'Anybody is here ?', '2022-08-03 18:02:23'),
(214, 2, 'yes tell me bro i am here', '2022-08-03 18:04:01'),
(215, 1, 'oh', '2022-08-03 20:06:51'),
(216, 1, 'oh', '2022-08-03 20:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `securechat`
--

CREATE TABLE `securechat` (
  `secure_chat_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_msg` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `securechat`
--

INSERT INTO `securechat` (`secure_chat_id`, `to_user_id`, `from_user_id`, `chat_msg`, `timestamp`) VALUES
(57, 2, 1, 'suno', '2022-08-03 17:24:05'),
(58, 1, 2, 'ok', '2022-08-03 17:25:21'),
(59, 1, 2, 'baby', '2022-08-03 17:26:53'),
(60, 2, 1, 'yes my darlo', '2022-08-03 17:27:03'),
(61, 1, 2, 'suniya', '2022-08-03 17:29:28'),
(62, 2, 1, 'ohhh', '2022-08-03 17:29:51'),
(63, 2, 1, 'acccha bhia', '2022-08-03 17:30:04'),
(64, 1, 2, 'accha', '2022-08-03 17:30:09'),
(65, 1, 2, 'ohh', '2022-08-03 17:32:23'),
(66, 2, 1, 'oh ello', '2022-08-03 17:33:02'),
(67, 1, 2, 'bolo', '2022-08-03 17:33:06'),
(68, 2, 1, 'chal thik hai', '2022-08-03 17:33:12'),
(69, 2, 1, 'oh', '2022-08-03 17:33:47'),
(70, 2, 1, 'ohhh chal thk hai', '2022-08-03 17:33:53'),
(71, 2, 1, 'sun', '2022-08-03 17:33:59'),
(72, 2, 1, 'suna', '2022-08-03 17:34:39'),
(73, 2, 1, 'koi na yaar i will see', '2022-08-03 17:34:47'),
(74, 2, 4, 'hey bro', '2022-08-03 18:03:14'),
(75, 2, 4, 'are you there ?', '2022-08-03 18:03:21'),
(76, 4, 2, 'hello shahid sir', '2022-08-03 18:04:25'),
(77, 1, 2, 'what ??', '2022-08-03 18:43:55'),
(78, 2, 1, 'hey', '2022-08-03 19:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_activation` enum('Disabled','Enable') DEFAULT 'Disabled',
  `user_verification_code` text NOT NULL,
  `user_password` text NOT NULL,
  `user_profile` text NOT NULL,
  `user_status` enum('online','offline') NOT NULL DEFAULT 'offline',
  `last_login` text NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_activation`, `user_verification_code`, `user_password`, `user_profile`, `user_status`, `last_login`, `user_timestamp`) VALUES
(1, 'Ravina', 'israfil123.sa@gmail.com', 'Enable', 'e38000311e7b82cbf69ce0ba56f298fa', '1234', '../assets/image/users/Sajid Ali845123270.jpeg', 'offline', '', '2022-07-30 09:41:07'),
(2, 'Sajid Ali', 'kamina@gmail.com', 'Enable', '343877f894734dcbc7fb011b5249a554', '12345', '../assets/image/users/Sajid Ali261007738.jpg', 'online', '', '2022-07-30 09:43:09'),
(4, 'Shahid Kapoor', 'tricktips123.sa@gmail.com', 'Enable', 'b363e238a8aa75d7d5678faeebb2c6cc', '1234', '../assets/image/users/Shahid Kapoor931888853.jpg', 'offline', '', '2022-08-03 17:52:49'),
(10, 'Shahid Kapoor', 'sajid320.sa@gmail.com', 'Enable', '996809dc7c2105a08811eae2a9c97ed6', '1234', 'http://localhost/PHP/socket/web-chat/my//assets/image/avtar.webp', 'offline', '', '2022-08-06 16:03:32'),
(11, 'Krishna', 'krishna.sa@gmail.com', 'Disabled', '1d58a766b6d5ca7f3886e4a33c4312b2', '12346', 'http://localhost/PHP/socket/web-chat/my//assets/image/avtar.webp', 'offline', '', '2022-08-06 16:04:11'),
(12, 'sajid', 'israfil123.sa@yahoo.com', 'Disabled', 'e16efac6269b38d987f76f50ccae4b73', '12346', 'http://localhost/PHP/socket/web-chat/my//assets/image/avtar.webp', 'offline', '', '2022-08-06 16:04:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `securechat`
--
ALTER TABLE `securechat`
  ADD PRIMARY KEY (`secure_chat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatrooms`
--
ALTER TABLE `chatrooms`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `securechat`
--
ALTER TABLE `securechat`
  MODIFY `secure_chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

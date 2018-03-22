-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 01:05 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtmeeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `History_ID` int(11) NOT NULL,
  `Action` varchar(100) NOT NULL,
  `File_Name` varchar(225) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`History_ID`, `Action`, `File_Name`, `TimeStamp`) VALUES
(1, 'CREATE', 'Meeting 1', '2018-02-28 05:53:13'),
(2, 'CREATE', 'Meeting 2', '2018-03-09 06:46:30'),
(3, 'CREATE', 'Meeting 2', '2018-03-09 06:47:44'),
(4, 'CREATE', 'Meeting 3', '2018-03-09 09:08:07'),
(5, 'DELETE', 'Meeting 1', '2018-03-10 21:39:51'),
(6, 'UPDATE', 'Meeting 2', '2018-03-10 21:44:25'),
(7, 'UPDATE', 'Meeting 2', '2018-03-10 21:46:44'),
(8, 'CREATE', 'Meeting 4', '2018-03-10 21:50:48'),
(9, 'UPDATE', 'Meeting 4', '2018-03-10 21:51:20'),
(10, 'UPDATE', 'Meeting 2', '2018-03-10 21:58:45'),
(11, 'UPDATE', 'Meeting 4', '2018-03-15 21:53:01'),
(12, 'CREATE', 'Meeting 6', '2018-03-15 21:57:14'),
(13, 'CREATE', 'Meeting 1', '2018-03-19 06:02:30'),
(14, 'DELETE', 'Meeting 1', '2018-03-20 21:59:48'),
(15, 'CREATE', 'Meeting 1', '2018-03-20 22:02:36'),
(16, 'CREATE', 'Meeting 2', '2018-03-21 18:42:12'),
(17, 'CREATE', 'Meeting 3', '2018-03-21 19:22:40'),
(18, 'UPDATE', 'Meeting 2', '2018-03-21 21:44:23'),
(19, 'UPDATE', 'Meeting 1', '2018-03-21 22:11:07'),
(20, 'UPDATE', 'Meeting 3', '2018-03-21 22:13:09'),
(21, 'UPDATE', 'Meeting 4', '2018-03-21 22:13:30'),
(22, 'UPDATE', 'Meeting 3', '2018-03-21 22:14:34'),
(23, 'UPDATE', 'Meeting 1', '2018-03-21 22:16:40'),
(24, 'UPDATE', 'Meeting 2', '2018-03-21 22:18:31'),
(25, 'UPDATE', 'Meeting 4', '2018-03-21 22:18:51'),
(26, 'UPDATE', 'Meeting 4', '2018-03-21 22:19:25'),
(27, 'UPDATE', 'Meeting 4', '2018-03-21 22:36:31'),
(28, 'UPDATE', 'Meeting 1', '2018-03-21 22:36:45'),
(29, 'UPDATE', 'Meeting 4', '2018-03-21 23:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `MeetingID` int(11) NOT NULL,
  `MeetingName` varchar(255) NOT NULL,
  `MeetingFileName` varchar(255) NOT NULL,
  `MeetingDate` date NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `Note` varchar(500) DEFAULT NULL,
  `MeetingShow` varchar(10) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`MeetingID`, `MeetingName`, `MeetingFileName`, `MeetingDate`, `Venue`, `Note`, `MeetingShow`, `tags`) VALUES
(2, 'Meeting 1', '03032009 - Meeting 1.pdf', '2009-03-03', 'Soc. Hall', NULL, 'Shown', 'one,two,three'),
(3, 'Meeting 4', '08112014 - Meeting 4.pdf', '2014-08-11', 'NCCC', NULL, 'Shown', 'two,three,four'),
(4, 'Meeting 3', '12212018 - Meeting 3.pdf', '2018-12-21', 'USEP', NULL, 'Shown', 'Help, kill, med');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `u_fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_mname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_profpic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_fname`, `u_mname`, `u_lname`, `email`, `password`, `u_profpic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rhobert', 'Vincent', 'Odoya', '123@gmail.com', '$2b$10$FMR4SODhAN4zDcmJrAUbgO84L33rojLdmUuQX1XDKe7sJKF2yEzr2', NULL, 'DGa33i8WG13oVeox5Q75cX5iOwablqqZKx7z3GQkreWBgAh3vAAw53vsZudI', '2018-02-28 05:30:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`History_ID`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`MeetingID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `History_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `MeetingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 10:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `User_Id` int(3) NOT NULL,
  `Msg_Id` int(11) NOT NULL,
  `Message` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`User_Id`, `Msg_Id`, `Message`, `Date`) VALUES
(0, 1, 'This is a new message', '2023-03-05 15:45:47'),
(1, 2, 'Message 2', '2023-03-05 16:05:37'),
(2, 4, 'Hello world', '2023-03-07 01:16:17'),
(1, 13, 'glablabla', '2023-03-09 20:25:27'),
(1, 14, 'glablabla', '2023-03-09 20:29:59'),
(1, 16, 'hello world 7', '2023-03-09 21:40:59'),
(4, 24, 'blah blah blah', '2023-03-10 01:06:55'),
(4, 25, 'anyone there', '2023-03-10 01:08:33'),
(4, 26, 'hellooooo', '2023-03-10 01:08:41'),
(4, 27, 'hellooooo', '2023-03-10 01:08:48'),
(4, 28, 'hello world 33', '2023-03-10 02:02:04'),
(1, 29, 'world is beautiful', '2023-03-10 02:05:47'),
(2, 30, 'hey there!', '2023-03-10 02:13:12'),
(2, 31, 'yes you are right world is beautifull', '2023-03-10 02:13:30'),
(2, 32, ':)', '2023-03-10 02:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Name`, `Email`, `Password`, `Status`) VALUES
(1, 'Mohsan', 'Example@gmail.com', '123', 'Active'),
(2, 'John', 'john@example.com', 'password123', 'Offline'),
(4, 'Kira', 'kira123@gmail.com', '1234', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Msg_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `Msg_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

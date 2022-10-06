-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 09:44 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `checked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `taskname`, `name`, `description`, `datetime`, `checked`) VALUES
(1, 'Bye', 'Mila', 'bread, flowers,tickets', '2022-09-30 15:56:47', 0),
(2, 'Clean', 'Sandra', 'windows,bed,floor', '2022-09-30 15:58:38', 0),
(4, 'Write', 'Martina', 'essay, homework, write about popular topics from a different angle, focus on a detail...', '2022-09-30 15:59:17', 0),
(5, 'Write', 'Martin', 'essay, homework, to my friends', '2022-09-30 17:27:46', 0),
(6, 'Learn', 'Nick', 'Exams are coming up', '2022-10-01 20:28:59', 0),
(8, 'Homework', 'Marija', 'Calculus, Algebra, Probability and statistics', '2022-10-01 20:31:19', 0),
(9, 'Cook', 'Tina', 'lunch for kids, soup, dinner ', '2022-10-01 20:31:19', 0),
(40, 'Cinema', 'Pera', 'Bye tickets for a movie night ', '2022-10-02 19:28:26', 0),
(41, 'Travel', 'Ana', 'South Island, New Zealand, Paris, Maui, Bora Bora, Tahiti, London, Rome, Turks & Caicos,', '2022-10-02 19:36:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

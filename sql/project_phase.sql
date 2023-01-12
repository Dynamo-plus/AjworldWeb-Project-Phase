-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2023 at 01:20 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_phase`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(4, 'john', 'johndoe@gmail.com', '$2y$10$uVlTeCjpAKnhKovUMjJncOKIR7Xwr4iL6F.tnDEulb/SNKEh9L5BO'),
(5, 'jacob', 'jacob@gmail.com', '$2y$10$lTebetc0kTyUz89/xeQ3O.idReHOZ9Q7eIvlwUpZuu2jw3woYx6pq'),
(6, 'kunle', 'kunle@gmail.com', '$2y$10$L8M.AFQTO4.2SLlG51Q/COE3jNOE2Uq00.t0VVx8SNNLRa2hCXYmC'),
(7, 'victor', 'victor@gmail.com', '$2y$10$d42vbBCPcheywsQtg4gsFuN1Yf/67UYHJhhk2.kqSH61DG6Z2ulYq'),
(8, 'isaac', 'isaac@gmail.com', '$2y$10$pHw.lqyH0jEJaO8pCzjcIOEjqtIEQTskUbBEzmOl5IBMD5A8whqcG'),
(9, 'james', 'james@gmail.com', '$2y$10$35q2j7Xlcb2JgxGmo.6uiev3WdUZP7hYNnjf.MyRT.q634Ivx2eJi'),
(10, 'Dynamo', 'dynamo@gmail.com', '$2y$10$Mkrc8WFfFYLMvu0QuYsVRuJqYgQHeDPFAzIuG6jF/UNrgzJnRjSUm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

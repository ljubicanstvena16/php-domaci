-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 05:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdomaci`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `todo_id` int(11) NOT NULL,
  `nazivTaska` varchar(150) NOT NULL,
  `datumPocetka` date NOT NULL,
  `datumZavrsetka` date NOT NULL,
  `osobeTaska` varchar(150) NOT NULL,
  `opisTaska` varchar(150) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todo_id`, `nazivTaska`, `datumPocetka`, `datumZavrsetka`, `osobeTaska`, `opisTaska`, `userid`) VALUES
(1, 'Projekat iz PHP-a', '2023-08-15', '2023-08-16', 'Jovana', 'Domaci zadatak.', 1),
(2, 'Jovanin task', '2023-08-13', '2023-08-17', 'Marko', 'Potrebno je da zavrsis ovaj task sto pre!', 2),
(3, 'Domaci zadaci iz ostalih predmeta', '2023-09-24', '2023-09-30', 'Jovana', 'Za ovo ti treba dosta vremena. Rasporedi obaveze na manje delove kako bi bila sto produktivnija!!!', 1),
(4, 'Jovanin i Markov task', '2023-10-03', '2023-10-28', 'Jovana, Marko', 'Detaljnije o tasku: Marko i Jovana se moraju dogovoriti detaljnije...', 2),
(5, 'Kupovina', '2023-09-30', '2023-10-01', 'Jovana', 'Uzmi spisak stvari sa frizidera', 1),
(6, 'Novi Jovanin Zadatak', '2023-10-30', '2023-11-30', 'Jovana', 'Veliki task, mesec dana posla!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `ime` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `ime`, `username`, `password`) VALUES
(1, 'jovana', 'jovana', 'jovana'),
(2, 'marko', 'marko', 'marko'),
(3, 'milan', 'milan', 'milan'),
(4, 'novi', 'novi', 'novi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

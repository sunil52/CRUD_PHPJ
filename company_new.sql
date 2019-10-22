-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Oct 21, 2019 at 06:25 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_new`
--

CREATE TABLE `company_new` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `number` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_new`
--

INSERT INTO `company_new` (`id`, `email`, `name`, `number`, `password`, `gender`, `comment`) VALUES
(1, 'sj@gmail.com', 'sunil', '8861375702', 'fcea920f7412b5da7be0cf42b8c93759', 'Male', 'Hi My name is sunil'),
(2, 'sj209004@gmail.com', 'sunil jaiswal', '9864563459', 'd81cfdc0bc361367c7382ef841dd5dd0', 'Male', 'Hi i am jaiswal from india'),
(3, 'sad@gmail.com', 'soni', '8964636367', 'eeb0d46ea30c04a3aa35468737f30b70', 'Female', 'Hi My name is soni kumar'),
(4, 'shyam@gmail.com', 'shyam', '983476534', '0addb0304286c4e0fa04042e20bc26bc', 'Male', 'Hi i am from india'),
(5, 'shubham@gmail.com', 'shubham', '7898734565', '5d83adbe161d763d5ba1b73465104b66', 'Male', 'Hi my Name is shubham. I am from Goa.'),
(7, 'ram@gmail.com', 'Ram', '9846543276', 'e21e9c03f5b301b090ed5cad49e2916a', 'Male', 'Hi my name is Ram.'),
(8, 'rika@gmail.com', 'Rika Raj', '9856763456', 'af652b4d088e3478e2949bb59444c859', 'Female', 'Hi my Name is Rika Raj.'),
(10, 'soumya@gmail.com', 'soumya', '5635774877', 'fcea920f7412b5da7be0cf42b8c93759', 'Female', 'qwqeqe rewrew ewrwe'),
(11, 'sj@gmail.comdtgde', 'dstfged', '5635774877', '665afa6841ec91fdc8a82a5f4c9429ed', 'Male', 'df tdrt r tr tre ter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_new`
--
ALTER TABLE `company_new`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_new`
--
ALTER TABLE `company_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

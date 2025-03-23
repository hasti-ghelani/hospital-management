-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2020 at 02:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`) VALUES
(61, 54, 'jay', 'sekhaliya', 'Male', 'jay@gmail.com', '1234567890', 'Dinesh', 700, '2025-03-20', '12:00:00', 1, 1),
(62, 55, 'virat', 'patel', 'Male', 'virat@gmail.com', '1597563258', 'Dinesh', 1000, '2025-03-21', '10:00:00', 1, 1);


-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contact`, `message`) VALUES
('khushi', 'khushi@gmail.com', '9874563210', 'nice!!!'),
('janvi', 'janvi@gmail.com', '7896542301', 'Wonderfull!!!'),
('harsh', 'harsh@gmail.com', '6925801473', 'GiVe better advice'),
('hiren', 'hiren@gmail.com', '8596471235', 'good'),
('utsav', 'utsav@gmail.com', '7456982013', 'great !!!'),
('shivani', 'shivani@gmail.com', '9856201454', 'I Like it');


-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `exper` varchar(50) NOT NULL,
  `joindate` date NOT NULL,
  `docFees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`username`, `password`, `email`, `spec`,`joindate`, `docFees`,`exper`) VALUES
('ashok', 'ashok123', 'ashok@gmail.com', 'General', '2025-03-15',500,'2 years'),
('arun', 'arun123', 'arun@gmail.com', 'Cardiologist', '2024-11-14', 600,'3 years'),
('Dinesh', 'dinesh123', 'dinesh@gmail.com', 'General', '2022-01-01', 1000,'5 years'),
('Ganesh', 'ganesh123', 'ganesh@gmail.com', 'Pediatrician', '2025-02-01', 550,'1 years'),
('Kartik', 'kartik123', 'kartik@gmail.com', 'Pediatrician', '2020-09-02', 2000,'15 years'),
('Amit', 'amit123', 'amit@gmail.com', 'Cardiologist', '2025-02-05', 700,'2 years'),
('Aditya', 'aditya123', 'aditya@gmail.com', 'Neurologist', '2024-08-09', 1500,'6 years'),
('abhi', 'abhi123', 'abhi@gmail.com', 'Neurologist', '2024-10-10', 900,'2 years');

-- --------------------------------------------------------

--
-- Table structure for table `patreg`
--

CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patreg`
--

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`,`age`, `email`, `contact`, `password`, `cpassword`,`city`) VALUES
(60, 'krishna', 'radha', 'Male',60, 'radha@gmail.com', '3692581470', '123456', '123456','vrindavan'),
(61, 'jay', 'sekhaliya', 'Male',22, 'jay@gmail.com', '1234567890', '123456', '123456','damnagar'),
(62, 'virat', 'patel', 'Male',35, 'virat@gmail.com', '1597563258', '123456', '123456','mumbai');



-- --------------------------------------------------------

--
-- Table structure for table `prestb`
--

CREATE TABLE `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 47, 43, 'jiya', 'monpara', '2025-03-17', '08:00:00', 'cold', 'sand', 'wear mask'),
('Amit', 48, 44, 'tisha', 'patel', '2025-03-18', '10:00:00', 'hgb rrvs', 'ferg', 'gerrg'),
('Dinesh', 61, 54, 'jay', 'sekhaliya', '2025-03-20', '12:00:00', 'cold', 'sand', 'distance between sand'),
('Dinesh', 62, 65, 'virat', 'patel', '2025-03-21', '10:00:00', 'fever', 'cold air', 'stay without AC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patreg`
--
ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patreg`
--
ALTER TABLE `patreg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 05:09 PM
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
-- Database: `rtours`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `pass`) VALUES
(1, 'harsh', 'harsh');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `pgender` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `pmobile` varchar(255) NOT NULL,
  `ptour` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `btime` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `bstatus` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `rid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `uid`, `tid`, `pgender`, `page`, `pmobile`, `ptour`, `pname`, `btime`, `bstatus`, `price`, `rid`) VALUES
(6, 1, 3, 'Male', '20', '9827463271', '3', 'harsh', '2023-04-18 16:20:55.000000', '1', '5000', 'pay_LfEAGXOJRu5XCj'),
(7, 2, 3, 'Male', '20', '8788388573', '3', 'harsh said', '2023-04-18 16:34:11.000000', '1', '5000', 'pay_LfEODotuEjimXu'),
(8, 3, 3, 'Male', '20', '9087678765', '3', 'harsh said', '2023-04-18 16:39:02.000000', '1', '5000', 'pay_LfETN6kkMqzOfm'),
(9, 3, 3, 'Female', '19', '9087678765', '3', 'harshada', '2023-04-18 16:39:02.000000', '1', '5000', 'pay_LfETN6kkMqzOfm');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pid` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `payment_time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `uname` varchar(255) NOT NULL,
  `umobile` varchar(255) NOT NULL,
  `bstatus` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `rid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pid`, `tid`, `uid`, `payment_time`, `uname`, `umobile`, `bstatus`, `price`, `rid`) VALUES
(4, 3, 1, '2023-04-18 16:20:55.000000', 'harsh', '9827463271', '1', '5000', 'pay_LfEAGXOJRu5XCj'),
(5, 3, 2, '2023-04-18 16:34:11.000000', 'ritika', '8788388573', '1', '5000', 'pay_LfEODotuEjimXu'),
(6, 3, 3, '2023-04-18 16:39:02.000000', 'rakesh', '9087678765', '1', '5000', 'pay_LfETN6kkMqzOfm');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `rid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ph` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`rid`, `name`, `ph`, `message`) VALUES
(1, 'harsh ', '9893293495', 'This is test mssage');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tid` int(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tlocation` varchar(255) NOT NULL,
  `tdesc` varchar(255) NOT NULL,
  `tduration` varchar(255) NOT NULL,
  `tstartdate` varchar(255) NOT NULL,
  `tenddate` varchar(255) NOT NULL,
  `tdays` varchar(255) NOT NULL,
  `tmonths` varchar(255) NOT NULL,
  `itihead` varchar(255) NOT NULL,
  `iti` varchar(255) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `creation_date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `tprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tid`, `tname`, `tlocation`, `tdesc`, `tduration`, `tstartdate`, `tenddate`, `tdays`, `tmonths`, `itihead`, `iti`, `pic1`, `pic2`, `status`, `creation_date`, `tprice`) VALUES
(3, 'Trip to Goa', 'goa', 'This is test descrition', '5 Days', '2023-04-19', '2023-04-24', '5', 'April', 'This is itenary head', 'This is first day plan,This is second day plan', 'uploads/402557410.jpg', 'uploads/1346384492.jpg', 'completed', '2023-04-18 16:18:05.000000', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `upass`, `no`) VALUES
(1, 'harsh', 'harsh', '9827463271'),
(2, 'ritika', 'harsh', '8788388573'),
(3, 'rakesh', 'harsh', '9087678765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `rid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

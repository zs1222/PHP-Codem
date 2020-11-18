-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2020 at 11:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iwardrobe`
--

-- --------------------------------------------------------

--
-- Table structure for table `carer`
--

CREATE TABLE `carer` (
  `carerid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `careremail` varchar(255) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clothing`
--

CREATE TABLE `clothing` (
  `clothingid` int(11) NOT NULL,
  `clothingtype` varchar(25) NOT NULL,
  `instructions` blob NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clothing`
--

INSERT INTO `clothing` (`clothingid`, `clothingtype`, `instructions`, `userid`) VALUES
(2, '5', 0x31, 28),
(3, '5', 0x31, 28),
(4, '5', 0x31, 28),
(5, '4', 0x32, 28),
(6, '5', 0x31, 28),
(7, '5', 0x31, 28),
(8, '6', 0x35, 28),
(9, '5', 0x31, 28);

-- --------------------------------------------------------

--
-- Table structure for table `clothinglog`
--

CREATE TABLE `clothinglog` (
  `userid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `clothingid` int(11) NOT NULL,
  `weatherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clothingpicture`
--

CREATE TABLE `clothingpicture` (
  `clothingpictureid` int(11) NOT NULL,
  `picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passw` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `vkey` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `passw`, `usertype`, `firstname`, `lastname`, `useremail`, `vkey`, `status`, `createdate`) VALUES
(28, 'kerry', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'Kerry', 'Brady', 'kerry11@hotmail.co.uk', '274638d3031063948fff018496fadd96', 0, '2020-07-09 16:08:36.932168'),
(36, 'clare', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'Clare', 'Brady', 'kerry.louise.brady@hotmail.co.uk', '505bb99a39489537a7b005e44c4632dc', 0, '2020-07-08 10:33:08.064438');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `weatherid` int(11) NOT NULL,
  `date/time` timestamp NOT NULL DEFAULT current_timestamp(),
  `weathertypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weatherclothing`
--

CREATE TABLE `weatherclothing` (
  `weatherid` int(11) NOT NULL,
  `clothingid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weathertype`
--

CREATE TABLE `weathertype` (
  `weathertypeid` int(11) NOT NULL,
  `weatherdescription` varchar(25) NOT NULL,
  `temperature` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carer`
--
ALTER TABLE `carer`
  ADD PRIMARY KEY (`carerid`,`userid`),
  ADD KEY `FK_userid__` (`userid`);

--
-- Indexes for table `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`clothingid`),
  ADD KEY `FK_userid` (`userid`);

--
-- Indexes for table `clothinglog`
--
ALTER TABLE `clothinglog`
  ADD PRIMARY KEY (`userid`,`datetime`),
  ADD KEY `FK_clothingid_` (`clothingid`),
  ADD KEY `FK_weatherid_` (`weatherid`);

--
-- Indexes for table `clothingpicture`
--
ALTER TABLE `clothingpicture`
  ADD PRIMARY KEY (`clothingpictureid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `uniqueusername` (`username`),
  ADD UNIQUE KEY `uniqueuseremail` (`useremail`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`weatherid`),
  ADD KEY `FK_weathertypeid` (`weathertypeid`);

--
-- Indexes for table `weatherclothing`
--
ALTER TABLE `weatherclothing`
  ADD PRIMARY KEY (`weatherid`,`clothingid`);

--
-- Indexes for table `weathertype`
--
ALTER TABLE `weathertype`
  ADD PRIMARY KEY (`weathertypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clothing`
--
ALTER TABLE `clothing`
  MODIFY `clothingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clothingpicture`
--
ALTER TABLE `clothingpicture`
  MODIFY `clothingpictureid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `weatherid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weathertype`
--
ALTER TABLE `weathertype`
  MODIFY `weathertypeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carer`
--
ALTER TABLE `carer`
  ADD CONSTRAINT `FK_userid__` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `clothing`
--
ALTER TABLE `clothing`
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `clothinglog`
--
ALTER TABLE `clothinglog`
  ADD CONSTRAINT `FK_clothingid_` FOREIGN KEY (`clothingid`) REFERENCES `clothing` (`clothingid`),
  ADD CONSTRAINT `FK_weatherid_` FOREIGN KEY (`weatherid`) REFERENCES `weather` (`weatherid`);

--
-- Constraints for table `weather`
--
ALTER TABLE `weather`
  ADD CONSTRAINT `FK_weathertypeid` FOREIGN KEY (`weathertypeid`) REFERENCES `weathertype` (`weathertypeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

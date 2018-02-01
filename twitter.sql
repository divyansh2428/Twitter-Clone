-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 02:42 PM
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
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`id`, `follower`, `following`) VALUES
(0, 11, 1),
(130, 11, 4),
(135, 14, 1),
(137, 1, 11),
(138, 11, 11),
(141, 4, 3),
(142, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `tweet` text NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `tweet`, `userid`, `datetime`) VALUES
(1, 'Loving this website', 1, '2017-12-28 01:00:22'),
(2, 'Phod diya!!!', 4, '2017-12-28 01:30:22'),
(3, 'Phod dsiya!!!', 4, '2017-12-28 03:54:22'),
(4, 'Working good', 3, '2017-12-30 00:05:41'),
(16, 'Twitter Clone made!!!', 11, '2017-12-30 17:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'divyansh1802@gmail.com', 'div'),
(3, 'vaibhav3051@gmail.com', '789504c2ea2a1b66f0bb6ca2d5c14fa4'),
(4, 'malikabhiskhek273@gmail.com', 'e9e1e0e3a532dac510df1472cd514f70'),
(5, 'ss21232@das.com', '36a69c6c6cc0219bd0f6aeca5b036f5c'),
(6, 'rk412@gmail.com', 'fbd9c3edbc9642ff071b5b8b8fd57106'),
(7, 'rkr@gmail.com', '1921b570382faf66b7b65ffccba8d8bb'),
(8, 'divyansh18021@gmail.com', '3cebb8e95137ad517b069197410858a0'),
(9, 'dvv@12.com', '39a1b6b6f438b1cb13011b53502629fe'),
(10, 'divyansh18022@gmail.com', '9e7697db22700a0486340da9ebdae522'),
(11, 'sad@123.com', '6bd05f1776fb2b67687a7e3453cdd2a2'),
(12, 'popsi@12.com', '7a431fe5e9fe9bb3c7976bc4419c83fd'),
(13, 'aaa@qwe.com', 'e929e5616f421af8fb77332c1d60f18f'),
(14, 'divu22@gmail.com', 'a6f3258dfb7be6f430178d4efdb19548'),
(15, 'pop12@qw.com', '209e4ad8403c90878605d6217da01f2d'),
(16, 'pikachu123@gmail.com', '704c79e2ec0961aba35909a246ea7dbf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

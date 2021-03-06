-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2015 at 07:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inject_point`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`id` int(11) NOT NULL,
  `concile_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `hw_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `concile_id`, `name`, `number`, `hw_name`) VALUES
(1, 4, 'Paharang 1', 1, 'Najma'),
(2, 4, 'Paharang 2', 2, 'Samina'),
(3, 4, 'Paharang 3', 3, 'Salmaah'),
(4, 4, 'Paharang 4', 4, 'Kausar'),
(5, 4, 'Salarwala KLD ', 5, 'Razia'),
(6, 4, 'Salarwala Qamar', 6, 'Rabina'),
(7, 2, 'Paropian', 1, 'Bushra'),
(8, 6, 'sahianwala', 1, 'rasheed');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
`id` int(11) NOT NULL,
  `concile_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `m_card` bigint(20) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `tt1` varchar(11) NOT NULL,
  `tt2` varchar(11) NOT NULL,
  `edd` varchar(15) NOT NULL,
  `card_number` varchar(14) NOT NULL,
  `name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cell_number` varchar(12) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `1_inj` varchar(11) NOT NULL,
  `2_inj` varchar(11) NOT NULL,
  `3_inj` varchar(11) NOT NULL,
  `4_inj` varchar(11) NOT NULL,
  `5_inj` varchar(11) NOT NULL,
  `6_inj` varchar(11) NOT NULL,
  `opv1` varchar(15) NOT NULL,
  `opv2` varchar(15) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `mremarks` varchar(255) NOT NULL,
  `create_date` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `concile_id`, `area_id`, `m_card`, `m_name`, `tt1`, `tt2`, `edd`, `card_number`, `name`, `father_name`, `address`, `cell_number`, `dob`, `1_inj`, `2_inj`, `3_inj`, `4_inj`, `5_inj`, `6_inj`, `opv1`, `opv2`, `remarks`, `mremarks`, `create_date`) VALUES
(1, 4, 1, 0, '', '', '', '', '123456', 'Ali', 'Haider', 'Paharang near Jamia Masjid', '03324153317', '01-10-2015', '27-10-2015', '', '', '', '', '', '', '', '', '', ''),
(2, 4, 4, 0, '', '', '', '', '123457', 'Sajaad', 'Rafique', 'Pahrang Near Gulzar e madina Masjid', '03454153317', '18-08-2015', '01-09-2015', '11-11-2015', '30-11-2015', '', '', '', '', '', '', '', ''),
(3, 4, 6, 0, '', '', '', '', '123458', 'Faisal', 'M. Ali', 'Street # 4 Qamar Colony Salarwala', '03454153345', '05-08-2015', '10-08-2015', '18-09-2015', '', '', '', '', '', '', '', '', ''),
(4, 4, 5, 0, '', '', '', '', '123459', 'Khalid', 'Naseem', 'khalid colony Salarwala', '03324153317', '10-07-2015', '20-07-2015', '22-08-2015', '06-09-2015', '', '', '', '20-07-2015', '22-08-2015', '', '', ''),
(5, 4, 4, 0, '', '', '', '', '123460', 'Saleem', 'Jameel', 'Paharang near Jamia Masjid', '03454153317', '15-09-2015', '', '', '', '', '', '', '', '', '', '', ''),
(6, 4, 4, 5233245, 'Rabia', '', '', '06-11-2015', '123461', 'Noman', 'Haider', 'Paharang near Jamia Masjid', '03454153317', '08-09-2015', '', '', '', '', '', '', '', '', '', '', ''),
(7, 2, 1, 0, 'Rashida', '', '', '', '123462', 'Ali', 'Jameel', 'main bazar parpopian', '264656565465', '08-07-2015', '19-08-2015', '16-09-2015', '16-10-2015', '14-11-2015', '', '', '10-08-2015', '', 'child moved', '', '05-11-2015'),
(8, 4, 4, 5233246, 'Salmaah', '16-11-2015', '30-11-2015', '22-06-2016', '', '', 'Saleem', 'near jamia masjid', '03142555245', '', '', '', '', '', '', '', '', '', '', 'mother target complete', '09-11-2015'),
(9, 4, 1, 0, 'Farzana', '', '', '', '10', 'zaigham', 'Shafiq Ahmad', '126 rb', '00000000', '02-11-2015', '', '', '', '', '', '', '', '', '', '', '09-11-2015'),
(10, 2, 1, 0, 'Salmaah', '', '', '', '11', 'Salman', 'Saleem', 'paropian main bazar', '0000000000', '10-04-2014', '10-05-2014', '26-06-2014', '29-07-2014', '27-10-2014', '04-02-2015', '22-10-2015', '10-05-2014', '27-10-2014', 'target complete', '', '14-11-2015'),
(11, 2, 1, 12345, 'Salmaah', '', '', '07-11-2015', '15', 'saleem', 'sfs', 'paropian main bazar', '23234532452', '25-11-2015', '', '', '', '', '', '', '', '', '', '', '19-11-2015'),
(12, 4, 6, 0, 'najmah', '', '', '', '12', 'noman', 'naeem', 'Qamar Colony', '23234532452', '19-11-2015', '', '', '', '', '', '', '', '', '', '', '19-11-2015'),
(13, 2, 1, 123, 'sdf', '19-11-2015', '', '23-11-2015', '345', 'sfvcv', 'sdf', 'sdfsd', '12313', '24-11-2015', '', '', '', '', '', '', '', '', '', '', '23-11-2015'),
(14, 2, 1, 0, 'sdfs', '', '', '', '1234', 'tet', 'sdf', 'sdf', '1232', '23-11-2015', '18-11-2015', '', '', '', '', '', '', '', '', '', '23-11-2015');

-- --------------------------------------------------------

--
-- Table structure for table `un_concile`
--

CREATE TABLE IF NOT EXISTS `un_concile` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `tehsil` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un_concile`
--

INSERT INTO `un_concile` (`id`, `name`, `number`, `tehsil`) VALUES
(1, 'BehlorPur', 4, 'chak Jhumra'),
(2, 'chak jhumra', 13, 'chak jhumra'),
(3, 'Sahian Wala', 6, 'chak jhumra'),
(4, 'Paropian', 2, 'chak jhumra'),
(5, 'test', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `password`, `user_type`) VALUES
(1, 'Usman Ali', 'admin', '$2y$10$rVQAnp5M3dZdbL8yDfYyUeevOgKGGHiwHykrSSrmWz48xlYS5plO6', 1),
(2, 'Imran Ali', 'imran', 'imran', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `un_concile`
--
ALTER TABLE `un_concile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `un_concile`
--
ALTER TABLE `un_concile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

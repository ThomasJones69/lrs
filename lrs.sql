-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2018 at 12:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanwezigheid`
--

CREATE TABLE `aanwezigheid` (
  `leerling_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` int(5) NOT NULL,
  `absentiecode` int(11) DEFAULT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aanwezigheid`
--

INSERT INTO `aanwezigheid` (`leerling_id`, `datum`, `tijd`, `absentiecode`, `klas`) VALUES
(1, '2018-01-13', 1158, 0, 1),
(1, '2018-01-13', 1228, 0, 1),
(2, '2018-01-13', 1158, 0, 1),
(4, '2018-01-13', 1149, 0, 1),
(4, '2018-01-13', 1228, 0, 1),
(5, '2018-01-13', 1149, 0, 1),
(6, '2018-01-13', 1149, 0, 1),
(6, '2018-01-13', 1158, 0, 1),
(7, '2018-01-13', 1149, 0, 1),
(8, '2018-01-13', 1149, 0, 1),
(9, '2018-01-13', 1149, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `absentie`
--

CREATE TABLE `absentie` (
  `id` int(11) NOT NULL,
  `signalering` varchar(20) NOT NULL,
  `aantal` int(11) NOT NULL,
  `urgentie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absentie`
--

INSERT INTO `absentie` (`id`, `signalering`, `aantal`, `urgentie`) VALUES
(0, 'Aanwezig', 0, 0),
(1, 'Ziek', 3, 1),
(4, 'Onbekend', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `klas`
--

CREATE TABLE `klas` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `omschrijving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klas`
--

INSERT INTO `klas` (`id`, `naam`, `omschrijving`) VALUES
(1, 'Klas 1a', 'Eerste klas van onderwijzer Van de Valk ');

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

CREATE TABLE `leerling` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `telnood` varchar(20) NOT NULL,
  `telouders` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `schermvolgnr` int(11) NOT NULL,
  `klas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `adres`, `woonplaats`, `tel`, `telnood`, `telouders`, `foto`, `schermvolgnr`, `klas`) VALUES
(1, 'Bas Gehin', 'Kerkstraat 26', 'Zwolle', '06123456789', '06123456789', '06123456789', './fotoos/bas.jpg', 1, 1),
(2, 'Thomas Jones', 'Dorpstraat 12', 'Hardenberg', '06123456789', '06123456789', '06123456789', './fotoos/thomas.jpg', 2, 1),
(3, 'Khaldoon', 'kerlaan 22', 'amsterdam', '06123456789', '06123456789', '06123456789', 'fotoos/khaldoon.jpg', 3, 1),
(5, 'eenhorn', 'ee', 'ee', '98', '76', '54', 'fotoos/default.jpg', 4, 1),
(6, 'g', 'g', 'g', '8', 'g', '', 'fotoos/default.jpg', 1, 0),
(7, 'a', 'a', 'a', '', '', '', 'fotoos/default.jpg', 1, 0),
(8, 'h', 'h', 'h', '56789', '56789', '6789', 'fotoos/default.jpg', 5, 1),
(9, 'eenhoorn', 'kerklaan', 'ede', '666', '666', '66666', 'fotoos/eenhorn.png', 6, 1),
(10, 'gerard', 'gg', '', '', '', '', 'fotoos/eenhorn.png', 7, 1),
(18, 'zx', '', '', '', '', '', 'fotoos/eenhorn.png', 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  ADD PRIMARY KEY (`leerling_id`,`datum`,`tijd`);

--
-- Indexes for table `absentie`
--
ALTER TABLE `absentie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leerling`
--
ALTER TABLE `leerling`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aanwezigheid`
--
ALTER TABLE `aanwezigheid`
  MODIFY `leerling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `absentie`
--
ALTER TABLE `absentie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klas`
--
ALTER TABLE `klas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leerling`
--
ALTER TABLE `leerling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

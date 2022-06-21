-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2021 at 08:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkmoora`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(25) NOT NULL,
  `nama_alternatif` varchar(80) NOT NULL,
  `c1` varchar(25) NOT NULL,
  `c2` varchar(25) NOT NULL,
  `c3` varchar(25) NOT NULL,
  `c4` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `c1`, `c2`, `c3`, `c4`) VALUES
('89003417', 'Lotto Flash', '6', '6', '5', '5.60'),
('89007475', 'Piero Royale', '6', '7', '3', '3.20'),
('89007659', 'Yonex 777', '5', '7', '3', '3.50'),
('89008545', 'Li-Ning Attack', '5', '7', '2', '3.75'),
('89008634', 'Ortuseight Wavez', '7', '7', '5', '3.04');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id`, `kode`, `tanggal`) VALUES
(8, 'k002', '25 - Aug - 2021 | 18 : 47 : 49'),
(11, 'k005', '25 - Aug - 2021 | 23 : 06 : 55'),
(12, 'k006', '11 - Oct - 2021 | 15 : 36 : 17'),
(14, 'k007', '08 - Nov - 2021 | 11 : 27 : 01');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(80) NOT NULL,
  `bobot` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `type`) VALUES
(1, 'Merek', '0.25', 'Benefit'),
(2, 'Bahan', '0.35', 'Benefit'),
(3, 'Berat', '0.15', 'Benefit'),
(4, 'Harga', '0.25', 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `kode_hasil` varchar(20) NOT NULL,
  `id_alternatif` varchar(25) NOT NULL,
  `nama_alternatif` varchar(80) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `kode_hasil`, `id_alternatif`, `nama_alternatif`, `total`) VALUES
(30, 'k002', '89003417', 'Lotto Flash', '0.1816'),
(31, 'k002', '89007475', 'Piero Royale', '0.2375'),
(32, 'k002', '89007659', 'Yonex 777', '0.2099'),
(33, 'k002', '89008545', 'Li-Ning Attack', '0.1851'),
(34, 'k002', '89008634', 'Ortuseight Wavez', '0.2965'),
(40, 'k005', '89008545', 'Li-Ning Attack', '0.2543'),
(41, 'k005', '89008634', 'Ortuseight Wavez', '0.4328'),
(42, 'k006', '89003417', 'Lotto Flash', '0.1816'),
(43, 'k006', '89007475', 'Piero Royale', '0.2375'),
(44, 'k006', '89007659', 'Yonex 777', '0.2099'),
(45, 'k006', '89008545', 'Li-Ning Attack', '0.1851'),
(46, 'k006', '89008634', 'Ortuseight Wavez', '0.2965'),
(52, 'k007', '89003417', 'Lotto Flash', '0.3365'),
(53, 'k007', '89007659', 'Yonex 777', '0.3705');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 02:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kdmapel` varchar(5) NOT NULL,
  `namamapel` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kdmapel`, `namamapel`) VALUES
('A-001', 'Pendidikan Agama Islam dan Budi Pekerti'),
('A-002', 'Pendidikan Pancasila dan Kewarganegaraan'),
('A-003', 'Bahasa Indonesia'),
('A-004', 'Matematika (Umum)'),
('A-005', 'Sejarah Indonesia'),
('A-006', 'Bahasa Inggris'),
('B-001', 'Seni Budaya'),
('B-002', 'Pendidikan Jasmani, Olahraga, dan Kesehatan'),
('B-003', 'Prakarya dan Kewirausahaan'),
('C-001', 'Matematika (Peminatan)'),
('C-002', 'Biologi'),
('C-003', 'Fisika'),
('C-004', 'Kimia'),
('C-005', 'Bahasa dan Sastra Jerman');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jen_kel` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `alamat`, `jen_kel`) VALUES
('1811500824', 'Fadhlan Hadaina', 'Kp. Samboja, Ds. Cikoneng, Kec. Anyer, Kab. Serang, Banten 42166.', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `mtk`
--

CREATE TABLE `mtk` (
  `kdmtk` varchar(5) NOT NULL,
  `namamtk` varchar(20) NOT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtk`
--

INSERT INTO `mtk` (`kdmtk`, `namamtk`, `sks`) VALUES
('B-001', 'Mobile Programming', 3),
('B-002', 'Java Web Programming', 2),
('B-003', 'Kalkulus 1', 3),
('B-004', 'Kalkulus II', 2),
('B-005', 'Image Processing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nis` varchar(6) NOT NULL,
  `kdmapel` varchar(5) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nis`, `kdmapel`, `nilai`) VALUES
('210001', 'A-001', 87),
('210001', 'A-002', 86),
('210001', 'A-003', 82),
('210001', 'A-004', 84),
('210001', 'A-005', 80),
('210001', 'A-006', 88),
('210001', 'B-001', 84),
('210001', 'B-002', 84),
('210001', 'B-003', 87),
('210001', 'C-001', 81),
('210001', 'C-002', 86),
('210001', 'C-003', 77),
('210001', 'C-004', 79),
('210001', 'C-005', 75);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(6) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jen_kel` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `jen_kel`) VALUES
('210001', 'Fadhlan Hadaina', 'Kp. Samboja, Ds. Cikoneng, Kec. Anyer, Banten 42166.', 'L'),
('210002', 'Budi', 'Jakarta', 'L'),
('21003', 'Luhur', 'Ciledug', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `role` varchar(16) DEFAULT NULL,
  `nis` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userpass`, `role`, `nis`) VALUES
(1, 'crypto411', '041100', 'admin', NULL),
(2, 'u210001', 'p210001', NULL, '210001'),
(3, 'u210002', 'p2010002', NULL, '210002'),
(4, 'u21003', 'p21003', NULL, '21003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kdmapel`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mtk`
--
ALTER TABLE `mtk`
  ADD PRIMARY KEY (`kdmtk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nis`,`kdmapel`),
  ADD KEY `kdmapel` (`kdmapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kdmapel`) REFERENCES `mapel` (`kdmapel`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

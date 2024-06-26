-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 07:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen_karyawandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` char(10) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL,
  `id_user` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `waktu`, `keterangan`, `id_user`) VALUES
('57', '2024-05-08', '09:39:39', 'Masuk', '14'),
('58', '2024-05-08', '09:39:56', 'Pulang', '14'),
('59', '2024-05-09', '00:57:07', 'Masuk', '14'),
('60', '2024-05-09', '01:01:49', 'Masuk', '15'),
('61', '2024-05-09', '01:02:01', 'Pulang', '15'),
('62', '2024-05-09', '10:32:27', 'Masuk', '24'),
('63', '2024-05-09', '12:30:40', 'Pulang', '24'),
('64', '2024-05-10', '14:03:01', 'Masuk', '24'),
('65', '2024-05-10', '14:03:12', 'Pulang', '24'),
('66', '2024-05-11', '17:30:32', 'Masuk', '24'),
('67', '2024-05-11', '20:11:22', 'Pulang', '24'),
('68', '2024-05-18', '13:19:10', 'Masuk', '24'),
('69', '2024-05-18', '13:19:27', 'Pulang', '24'),
('70', '2024-05-21', '15:51:07', 'Masuk', '24'),
('71', '2024-05-21', '15:51:13', 'Pulang', '24'),
('72', '2024-05-21', '16:26:29', 'Masuk', '27'),
('73', '2024-05-21', '16:26:37', 'Pulang', '2'),
('74', '2024-05-02', '10:00:00', 'Masuk', '27'),
('75', '2024-05-28', '14:21:11', 'Masuk', '28'),
('76', '2024-05-28', '14:21:18', 'Pulang', '28'),
('AB24060301', '2024-06-03', '20:53:53', 'Masuk', 'UI240602'),
('AB24060302', '2024-06-03', '20:53:56', 'Pulang', 'UI240602');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` char(10) NOT NULL,
  `tanggal_cuti` date NOT NULL,
  `tipe` enum('Cuti Tahunan','Cuti Sakit','Cuti Melahirkan','Cuti Alasan Penting') NOT NULL,
  `id_user` char(128) NOT NULL,
  `alasan` varchar(1024) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `tanggal_cuti`, `tipe`, `id_user`, `alasan`, `status`) VALUES
('14', '2024-05-08', 'Cuti Tahunan', '2', 'asdasd', 'off'),
('15', '2024-05-07', 'Cuti Tahunan', '24', 'sadasdasdasdasddadadddd', 'off'),
('16', '2024-05-29', 'Cuti Tahunan', '24', 'asdsdaasddsaasdqweqwe', 'off'),
('17', '2024-05-14', 'Cuti Tahunan', '24', 'asdasddsddsa', 'off'),
('24', '2024-05-11', 'Cuti Tahunan', '24', 'ghjjgh', 'off'),
('25', '2024-05-08', 'Cuti Tahunan', '25', 'mbnbnmbnmbnmbnmmnbmbnm', 'off'),
('26', '2024-05-22', 'Cuti Tahunan', '25', 'zxcasdqwe', 'off'),
('30', '2024-05-08', 'Cuti Tahunan', '0', 'asdasdasd', 'on'),
('31', '2024-06-07', 'Cuti Tahunan', '0', 'zxcccc', 'on'),
('32', '2024-05-15', 'Cuti Tahunan', '0', 'asdasdfghfghjkljkl', 'on'),
('33', '2024-05-16', 'Cuti Tahunan', '24', 'asdzxcdzxcsdzxczxzxccx', 'off'),
('34', '2024-05-10', 'Cuti Tahunan', '0', 'ugxgvn yhjexh vnm', 'on'),
('35', '2024-05-09', 'Cuti Tahunan', '28', 'Masuk angin', 'off'),
('36', '2024-05-15', 'Cuti Tahunan', '2', 'asdasd', 'off'),
('37', '2024-05-30', 'Cuti Sakit', '24', 'masuk angin pak bos', 'on'),
('38', '2024-05-30', 'Cuti Tahunan', '28', ' ', 'off'),
('CT240601', '2024-06-28', 'Cuti Alasan Penting', 'UI240602', 'sakit perut', 'on'),
('CT240602', '2024-06-28', 'Cuti Melahirkan', 'UI240601', 'asdasd', 'on'),
('CT240603', '2024-06-28', 'Cuti Tahunan', '28', 'aaaa', 'on'),
('CT240604', '2024-06-11', 'Cuti Melahirkan', '24', 'asdasdasdsdaasdasdasd', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` char(8) NOT NULL,
  `id_user` char(8) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `gaji_sekunder` int(11) NOT NULL,
  `total_absen` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_user`, `gaji_pokok`, `gaji_sekunder`, `total_absen`, `bonus`, `total_gaji`, `bulan`, `tahun`) VALUES
('1', '24', 1200000, 50000, 0, 500000, 0, 20240516, 0),
('2', '27', 1200000, 50000, 10, 500000, 1700000, 5, 2024),
('3', '27', 1200000, 50000, 2, 100000, 1300000, 5, 2024),
('4', '25', 1, 2, 0, 0, 1, 5, 2024),
('GJ240601', 'UI240602', 600000, 50000, 1, 50000, 650000, 6, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '07:30:00', '08:00:00', 'Masuk'),
(2, '17:00:00', '18:00:00', 'Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` char(8) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(20) DEFAULT 'no-foto.png',
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('Admin','Karyawan') NOT NULL DEFAULT 'Karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nik`, `nama`, `telp`, `email`, `foto`, `username`, `password`, `role`) VALUES
('1', '', 'Muchamad Hatta', '081218114681', 'muchamadhatta96@mail.com', '1672893764.jpg', 'ata', '$2y$10$0cGh5c51nPxYB3cutrQtZe74L.SsTjAwsDn2aWGSETSwt9.VIiZOS', 'Admin'),
('2', '123', 'Alief', '123', '12221061@bsi.ac.id', 'no-foto.png', '12221061@bsi.ac.id', '$2y$10$s46x8DTvImOhSaR8AyFab.i91jItb9l2tUOh6R1yEjFf1zm1I8urK', 'Admin'),
('24', 'joni', 'joni', 'joni', 'joni@j.j', 'no-foto.png', 'joni', '$2y$10$WBU4h16Em0MkVgYvbvOxAuL0QObkv2T1r8pjpmvlKmOME/rwSIUgy', 'Karyawan'),
('25', '123', 'asd', '123', 'kyubiakun58@gmail.com', 'no-foto.png', 'budi', '$2y$10$msQOmap96XMh9UFLvwZUL.tiIgPEKoBwBPHgmhG22t.5G9bj.MxQi', 'Karyawan'),
('27', '32710612020400099', 'budi', '02002222222', 'budi@gmail.com', 'no-foto.png', 'Budi', '$2y$10$pTzwWJaiWsKdWk4W5dJD/.zx4EowIKOravh1BrUOEoArtHjGZ46xe', 'Karyawan'),
('28', '3271061202040007', 'Budi', '123', 'kyubiakun58@gmail.com', 'no-foto.png', 'Admin', '$2y$10$5VhpvhWwFvKCbxQVRgjKBe4w02DgmjVhezbdgM6T3/dD3M0yUDP4W', 'Karyawan'),
('UI240601', '3271061202040007', 'matsunaga', '1', '2@g.c', 'no-foto.png', 'crazykiller', '$2y$10$4LoJ5GJ.1zn8pEt2XtFj0eznoLgbjSm8hXUn2Fr/h2qtc/Zq7clgG', 'Karyawan'),
('UI240602', '3271061202040007', 'when the stars smile at moon', 'wonder how look', 'in-your-eyes-just-dialing@your.number', 'failing-to-press.png', 'TheLastTwo', '$2y$10$gazML80oypOGnnCBvCXL1e3gd1ROnkxpUIwMkpVxMIrVZ7SteXtjS', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

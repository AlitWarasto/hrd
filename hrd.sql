-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 09:04 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrd`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idkar` varchar(255) NOT NULL,
  `namakaryawan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `domisili` text NOT NULL,
  `noktp` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `ttgll` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pernikahan` varchar(32) NOT NULL,
  `tglmasuk` varchar(255) NOT NULL,
  `status` varchar(32) NOT NULL,
  `penempatan` varchar(255) NOT NULL,
  `devisi` varchar(255) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `sp` varchar(32) NOT NULL,
  `cuti` varchar(32) NOT NULL,
  `gaji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idkar`, `namakaryawan`, `foto`, `alamat`, `domisili`, `noktp`, `tempat`, `nohp`, `ttgll`, `pendidikan`, `pernikahan`, `tglmasuk`, `status`, `penempatan`, `devisi`, `jabatan`, `sp`, `cuti`, `gaji`) VALUES
('0', 'Damar Sasongko', '0', 'Jl. Mangga no 57 Jatiasem Sukoharjo', 'Jl. Padi No 90 Griya Kost Menawan Serengan Solo', '2523653258979512', '', '08122457788859', '1993-06-25', 'Sarjana Seni', 'Belum Menikah', '2020-10-12', 'Aktif', 'Kantor Pusat', 'Marketing', 'Graphic Designer', '0', '9', '2300000'),
('1', 'Dani Wahyudi', '0', 'Jl. soka VI no 1 Timuran Banjarsari Solo', 'Jl. soka VI no 1 Timuran Banjarsari Solo', '0', '', '0', 'Sragen, 30 Februari 1992', 'SMA', 'Menikah', '12 Desember 2018', 'aktif', 'Penumping', 'Outlet', 'SPV', '0', '9', '0'),
('2', 'Dani Wahyudi', '0', 'Jl. soka VI no 1 Timuran Banjarsari Solo', 'Jl. soka VI no 1 Timuran Banjarsari Solo', '3313110556810002', '', '08562810458', 'Sragen, 30 Februari 1992', 'SMA', 'Menikah', '12 Desember 2018', 'aktif', 'Penumping', 'Outlet', 'SPV', '0', '9', '5000000'),
('21012211311102445256', 'Wahyu Adi', '0', 'Wonogori', 'Boyolali', '11311102445256', '', '0813290464554', '1990-02-14', 'sarjana ekonomi', 'Menikah', '2014-01-01', 'Aktif', 'Kantor Pusat', 'Operasional', 'PIC', '0', '9', '2500000'),
('210126123456789123', 'Bayu Ahmad', '0', 'Kalioso RT 09 RW 13 ', 'Kalioso RT 03 RW 13', '1234567891234', 'Kalioso', '081225647894', '1990-06-05', 'SMA', 'Belum Menikah', '2014-02-03', 'Aktif', 'Outlet', 'Operasional', 'SPV', '0', '9', '2500000'),
('2101264568529517530', 'Sutarwanto', '0', 'Kartasura', 'surakarta', '4568529517530', '', '0815564478932', '2000-12-23', 'SMA', 'Menikah', '2018-03-05', 'Aktif', 'Outlet', 'Operasional', 'Staff Kithen', '0', '9', '2000000'),
('210126987654321012', 'Titis Safitri', '0', 'Sukoharjo', 'Sukoharjo', '987654321012', '', '08564567892', '1990-06-05', 'Sarjana Psi', 'Menikah', '2019-03-13', 'Aktif', 'Kantor Pusat', 'HRD', 'Staff', '0', '9', '2500000'),
('2102048546251547852', 'Johan Lingga Permana', '2102048546251547852.jpg', 'jaten', 'jaten', '8546251547852', '', '0812254466211', '1985-06-05', 'SMA', 'Menikah', '2013-05-03', 'Aktif', 'Kantor Pusat', 'Operasional', 'BOSS', '0', '9', '10000000'),
('2215887755875', 'Pijar Wicaksono', '0', 'jl. Palem No 98 wonosobo', 'jl. Palem No 98 wonosobo', '2215887755875', '', '2585466641236', '1995-05-05', 'sarjana ekonomi', 'Menikah', '2020-10-19', 'Aktif', 'Kantor Pusat', 'Acct', 'Selles Perform', '0', '9', '2400000'),
('3', 'Alfian Chiko', '3.jpg', 'Kalitan Raya jl. Gading No 67 Kalitan Solo', 'Jl. Layang layang no 45 Penumping Serengan Solo', '0221012020120125', 'Kalitan', '081245569965', '1992-02-05', 'Sarjana Seni', 'Belum Menikah', '2020-10-06', 'Aktif', 'Kantor Pusat', 'Marketing', 'Graphic Designer', 'Tidak Ada', '9', '2500000');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `idoutlet` int(255) NOT NULL,
  `namaoutlet` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`idoutlet`, `namaoutlet`, `alamat`) VALUES
(1, 'Penumping', 'Jl Kebangkitan Nasional No 63 Penumping Laweyan Surakarta'),
(2, 'Kantor Pusat', 'Jl. Soka VI No. 1 Timuran Banjarsari Surakarta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `name`, `username`, `email`, `password`) VALUES
(2, 'admin', 'admin', 'admin@pantiespizza.com', '$2y$10$pboB50DTJ62cjehD4.vfl.EAzlP9Zpa7xpptakraiMs7XaY4xD4kC'),
(3, 'aku', 'aku', 'aku@aku.com', '$2y$10$bCvfXxRoGLLBlkw.9mjpXu4lVI7nl6zwV0qNUFn2TiTKRJPbhRw5G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkar`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`idoutlet`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `idoutlet` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

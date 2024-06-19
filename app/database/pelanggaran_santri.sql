-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 01:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggaran_santri`
--

-- --------------------------------------------------------

--
-- Table structure for table `keamanan`
--

CREATE TABLE `keamanan` (
  `id_keamanan` varchar(5) NOT NULL,
  `id_ketua` varchar(5) NOT NULL,
  `nama_keamanan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ketua`
--

CREATE TABLE `ketua` (
  `id_ketua` varchar(5) NOT NULL,
  `nama_ketua` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_diskusi`
--

CREATE TABLE `laporan_diskusi` (
  `nama_santri` varchar(80) NOT NULL,
  `no_pelanggaran` varchar(5) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL,
  `id_ketua` varchar(5) NOT NULL,
  `id_keamanan` varchar(5) NOT NULL,
  `hasil_diskusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `no_pelanggaran` varchar(5) NOT NULL,
  `nama_pelanggaran` varchar(25) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL,
  `id_keamanan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `no_sanksi` varchar(5) NOT NULL,
  `nama_sanksi` varchar(25) NOT NULL,
  `jenis_sanksi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `nis` varchar(10) NOT NULL,
  `nama_santri` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_pelanggaran` varchar(5) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sistem`
--

CREATE TABLE `sistem` (
  `id` int(11) NOT NULL,
  `nama_pesantren` varchar(128) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `flags` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sistem`
--

INSERT INTO `sistem` (`id`, `nama_pesantren`, `gambar`, `flags`) VALUES
(1, 'Pondok Pesantren Al-Dairah Cilegon', 'icon-128.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_santri` varchar(128) DEFAULT NULL,
  `role` enum('keamanan','ketua','wali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `repassword`, `nama`, `nama_santri`, `role`) VALUES
(1, 'putrikhotimah', 'putrikhotimah69@gmail.com', '4093fed663717c843bea100d17fb67c8', '4093fed663717c843bea100d17fb67c8', 'putri khotimah', '', 'keamanan'),
(2, 'fitrikhotimah12', 'fitrikhotimah69@gmail.com', '534a0b7aa872ad1340d0071cbfa38697', '534a0b7aa872ad1340d0071cbfa38697', 'fitri khotimah', '', 'ketua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keamanan`
--
ALTER TABLE `keamanan`
  ADD PRIMARY KEY (`id_keamanan`),
  ADD KEY `id_ketua` (`id_ketua`);

--
-- Indexes for table `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`id_ketua`);

--
-- Indexes for table `laporan_diskusi`
--
ALTER TABLE `laporan_diskusi`
  ADD PRIMARY KEY (`nama_santri`),
  ADD KEY `id_keamanan` (`id_keamanan`),
  ADD KEY `id_ketua` (`id_ketua`),
  ADD KEY `no_pelanggaran` (`no_pelanggaran`),
  ADD KEY `no_sanksi` (`no_sanksi`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`no_pelanggaran`),
  ADD KEY `id_keamanan` (`id_keamanan`),
  ADD KEY `no_sanksi` (`no_sanksi`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`no_sanksi`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `no_pelanggaran` (`no_pelanggaran`),
  ADD KEY `no_sanksi` (`no_sanksi`);

--
-- Indexes for table `sistem`
--
ALTER TABLE `sistem`
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
-- AUTO_INCREMENT for table `sistem`
--
ALTER TABLE `sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keamanan`
--
ALTER TABLE `keamanan`
  ADD CONSTRAINT `keamanan_ibfk_1` FOREIGN KEY (`id_ketua`) REFERENCES `ketua` (`id_ketua`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_keamanan`) REFERENCES `keamanan` (`id_keamanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggaran_ibfk_2` FOREIGN KEY (`no_sanksi`) REFERENCES `sanksi` (`no_sanksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`no_pelanggaran`) REFERENCES `pelanggaran` (`no_pelanggaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `santri_ibfk_2` FOREIGN KEY (`no_sanksi`) REFERENCES `sanksi` (`no_sanksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

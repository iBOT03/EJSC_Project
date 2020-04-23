-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 08:24 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ejsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `NIK` varchar(16) NOT NULL,
  `LEVEL` varchar(1) NOT NULL COMMENT '1.Admin, 2.User',
  `FOTO_KTP` varchar(100) NOT NULL,
  `NAMA_LENGKAP` varchar(150) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NO_TELEPON` varchar(13) NOT NULL,
  `ALAMAT` text NOT NULL,
  `ID_KOMUNITAS` varchar(3) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`NIK`, `LEVEL`, `FOTO_KTP`, `NAMA_LENGKAP`, `EMAIL`, `NO_TELEPON`, `ALAMAT`, `ID_KOMUNITAS`, `PASSWORD`) VALUES
('3529010308000005', '2', 'Task_Andre1.PNG', 'User', 'nekad@dev.com', '081252989930', 'Jl. Kalimantan Gd. EJSC Bakorwil V Jember', '1', '$2y$10$PHibE0LQ9299ZdtwFu3UmOpzfutEMzrVWz.AncS8bJ7sM7btsNsFe'),
('3529010308000011', '1', 'KTM_AndreaSA.jpeg', 'Admin', 'admin@gmail.com', '0987239461909', 'Admin', '', '$2y$10$kG/3E6Ed6EFa6IdoBXDWXuuvwmhw5ode8u7MUvnNtUpGSiZGES3pa'),
('3529010308000017', '2', 'ejscmobile1.png', 'Tes Bug', 'Coding@gmail.com', '09918', 'Jl.Trunojoyo', '2', '$2y$10$HqV9gw2MGr2vV43w4TPgbOjZ1./qdybV/p3PNS2LV7PWCbdMVTB9i'),
('3529010308000028', '2', 'KTM_Andrea_S_A.jpeg', 'tes', 'KMJ@Gmail.com', '05022', 'Jl', '3', '$2y$10$B2HPqbddTvMZ1ewh4UAK9ue3q9D1mGwixCJeUZvE59mDOuiId6vA.');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `ID_ALAT` int(3) NOT NULL,
  `NAMA_ALAT` varchar(100) NOT NULL,
  `JUMLAH_ALAT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`ID_ALAT`, `NAMA_ALAT`, `JUMLAH_ALAT`) VALUES
(1, 'gitar', 3),
(2, 'viewer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID_BOOKING` int(11) NOT NULL,
  `NAMA` varchar(150) NOT NULL,
  `NOMOR_TELEPON` varchar(13) NOT NULL,
  `ID_KOMUNITAS` varchar(200) NOT NULL,
  `ID_RUANGAN` varchar(50) NOT NULL,
  `JUMLAH_ORANG` int(3) NOT NULL,
  `DESKRIPSI_KEGIATAN` text NOT NULL,
  `TUJUAN` text NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `DURASI` int(11) NOT NULL,
  `JAM_MULAI` time NOT NULL,
  `JAM_SELESAI` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Pending, 3.Selesai, 4.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID_BOOKING`, `NAMA`, `NOMOR_TELEPON`, `ID_KOMUNITAS`, `ID_RUANGAN`, `JUMLAH_ORANG`, `DESKRIPSI_KEGIATAN`, `TUJUAN`, `TANGGAL_MULAI`, `DURASI`, `JAM_MULAI`, `JAM_SELESAI`, `STATUS`) VALUES
(47, 'Kabupaten Jember', '0825', '3', '3', 14, '', 'Ngobar1', '2020-02-05', 1, '21:42:00', '2020-02-05 22:42:00', '3'),
(48, 'Kabupaten Jember', '03060', '1', '2', 2, '', 'Ngobar', '2020-02-08', 2, '21:16:00', '2020-02-08 23:17:00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `detail_event`
--

CREATE TABLE `detail_event` (
  `ID_DETAIL_EVENT` int(11) NOT NULL,
  `ID_EVENT` varchar(225) NOT NULL,
  `ID_ALAT` varchar(225) NOT NULL,
  `JUMLAH` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_event`
--

INSERT INTO `detail_event` (`ID_DETAIL_EVENT`, `ID_EVENT`, `ID_ALAT`, `JUMLAH`) VALUES
(8, 'E001', '1', 1),
(9, 'E001', '1', 1),
(21, 'E008', '1', 1),
(22, 'E008', '1', 2),
(34, 'E011', '2', 2),
(36, 'E012', '1', 1),
(37, 'E012', '2', 2),
(38, 'E009', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID_EVENT` varchar(11) NOT NULL,
  `JUDUL` varchar(150) NOT NULL,
  `FOTO` varchar(150) NOT NULL,
  `SURAT_PENGAJUAN` varchar(100) NOT NULL,
  `PENYELENGGARA` varchar(150) NOT NULL,
  `NAMA_PJ` varchar(150) NOT NULL,
  `NAMA_PENGISI_ACARA` varchar(150) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `TANGGAL_SELESAI` date NOT NULL,
  `WAKTU` time NOT NULL,
  `ID_RUANGAN` varchar(1) NOT NULL,
  `ASAL_PESERTA` varchar(150) NOT NULL,
  `JUMLAH_PESERTA` int(2) NOT NULL,
  `KETERANGAN` text NOT NULL,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Pending, 3.Selesai, 4.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID_EVENT`, `JUDUL`, `FOTO`, `SURAT_PENGAJUAN`, `PENYELENGGARA`, `NAMA_PJ`, `NAMA_PENGISI_ACARA`, `TANGGAL_MULAI`, `TANGGAL_SELESAI`, `WAKTU`, `ID_RUANGAN`, `ASAL_PESERTA`, `JUMLAH_PESERTA`, `KETERANGAN`, `STATUS`) VALUES
('E008', 'Event baru11', 'images4.png', 'KUIS_STATISTIKA_kedua_TIF_16_AB.pdf', 'Ryan', 'fdsafad', 'ss', '2000-09-08', '2000-02-02', '19:00:00', '1', 'ssl', 2, 'ss', '4'),
('E009', 'Event baru', 'images.png', 'Materi - Procedure.pdf', 'Ryan', 'fdsafad', 'q', '2020-02-08', '2020-04-16', '05:00:00', '3', 'q', 1, 'ew', '3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_komunitas`
--

CREATE TABLE `kategori_komunitas` (
  `ID_KATEGORI` int(3) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_komunitas`
--

INSERT INTO `kategori_komunitas` (`ID_KATEGORI`, `KATEGORI`) VALUES
(1, 'Musician');

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `ID_KOMUNITAS` int(11) NOT NULL,
  `LOGO` varchar(150) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `NAMA_KOMUNITAS` varchar(200) NOT NULL,
  `ID_KATEGORI` varchar(3) NOT NULL,
  `DESKRIPSI_KOMUNITAS` text NOT NULL,
  `NAMA_KETUA` varchar(150) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NO_TELEPON` varchar(13) NOT NULL,
  `TWITTER` varchar(150) NOT NULL,
  `FACEBOOK` varchar(150) NOT NULL,
  `INSTAGRAM` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`ID_KOMUNITAS`, `LOGO`, `EMAIL`, `NAMA_KOMUNITAS`, `ID_KATEGORI`, `DESKRIPSI_KOMUNITAS`, `NAMA_KETUA`, `ALAMAT`, `NO_TELEPON`, `TWITTER`, `FACEBOOK`, `INSTAGRAM`) VALUES
(1, '', 'nekad@dev.com', 'NEKAD Dev', '', 'Nekad ngoding', 'Ryan Hartadi', 'Jl. Kalimantan Gd. EJSC Bakorwil V Jember', '081252989930', '', '', ''),
(2, 'JTI.jpg', 'Coding@gmail.com', 'Coding', '2', 'Komunitas Musisi Jember', 'Ryan', 'Jl.Trunojoyo', '09918', '', '', ''),
(3, 'f5192848fe49eb3245358ea6efbf0e0b.jpg', 'KMJ@Gmail.com', 'Komunitas Musisi Jember', '1', 'yoo', 'Agus Pindhank', 'Jl', '05022', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `EMAIL` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `NOMOR_TELEPON` varchar(13) NOT NULL,
  `WHATSAPP` varchar(13) NOT NULL,
  `FACEBOOK` varchar(100) NOT NULL,
  `INSTAGRAM` varchar(100) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak_kami`
--

INSERT INTO `kontak_kami` (`EMAIL`, `ID`, `NOMOR_TELEPON`, `WHATSAPP`, `FACEBOOK`, `INSTAGRAM`, `ALAMAT`) VALUES
('ejscjember@gmail.com', 1, '080203165', '085749806996', 'ejsc jember', 'ejscjember', 'Jl. Kalimantan            ');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_RUANGAN` int(11) NOT NULL,
  `FOTO_RUANGAN` varchar(100) NOT NULL,
  `NAMA_RUANGAN` varchar(100) NOT NULL,
  `KAPASITAS` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANGAN`, `FOTO_RUANGAN`, `NAMA_RUANGAN`, `KAPASITAS`) VALUES
(1, '', 'Meeting Room', 15),
(2, '', 'Training Room', 15),
(3, '', 'Conference Room', 20),
(4, '', 'Co-Working Space', 25),
(5, 'download.png', 'Ruang Musik', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`ID_ALAT`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_BOOKING`);

--
-- Indexes for table `detail_event`
--
ALTER TABLE `detail_event`
  ADD PRIMARY KEY (`ID_DETAIL_EVENT`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_EVENT`);

--
-- Indexes for table `kategori_komunitas`
--
ALTER TABLE `kategori_komunitas`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`ID_KOMUNITAS`);

--
-- Indexes for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_RUANGAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `ID_ALAT` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_BOOKING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `detail_event`
--
ALTER TABLE `detail_event`
  MODIFY `ID_DETAIL_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kategori_komunitas`
--
ALTER TABLE `kategori_komunitas`
  MODIFY `ID_KATEGORI` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `ID_KOMUNITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ID_RUANGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

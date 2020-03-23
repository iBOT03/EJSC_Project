-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 10:42 AM
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
  `KOMUNITAS` varchar(150) NOT NULL,
  `PASSWORD` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`NIK`, `LEVEL`, `FOTO_KTP`, `NAMA_LENGKAP`, `EMAIL`, `NO_TELEPON`, `ALAMAT`, `KOMUNITAS`, `PASSWORD`) VALUES
('0918309139183918', '2', 'user.png', 'ppp', 'ppp@gmail.com', '0918398173987', 'www', 'NEKAD Dev', 'pppppppp'),
('1', '1', 'dicky.jpg', 'Admin 1', 'admin@admin.com', '000', 'admin', '', 'asdasdasd'),
('1234567890098', '1', '', 'Octavian Yudha Mahendra', 'yudhaoctavian01@gmail.com', '081252989930', 'Jl. Nangka 4/9 Perumnas Patrang Jember', '', 'admin'),
('2', '1', 'userprofil.png', 'Admin 2', 'admin2@admin.com', '0000', 'admin', '', 'asdasdasd'),
('3500000000000005', '2', '', 'Aku User', 'user@gmail.com', '123456789012', 'alamat user', 'komunitas user', '1234');

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
  `KOMUNITAS` varchar(200) NOT NULL,
  `RUANGAN` varchar(50) NOT NULL,
  `JUMLAH_ORANG` int(3) NOT NULL,
  `TEMA_KEGIATAN` varchar(150) NOT NULL,
  `DESKRIPSI_KEGIATAN` text NOT NULL,
  `WAKTU` time NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `TANGGAL_KEMBALI` date NOT NULL,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Pending, 3.Selesai, 4.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID_BOOKING`, `NAMA`, `NOMOR_TELEPON`, `KOMUNITAS`, `RUANGAN`, `JUMLAH_ORANG`, `TEMA_KEGIATAN`, `DESKRIPSI_KEGIATAN`, `WAKTU`, `TANGGAL_MULAI`, `TANGGAL_KEMBALI`, `STATUS`) VALUES
(1, 'yudha', '081252989930', '', '', 4, 'ngoding', 'mabar', '01:00:00', '2020-03-20', '2020-03-20', '1'),
(2, 'ryan', '081', '', '', 4, 'mabar', 'ngoding', '01:00:00', '2020-03-20', '2020-03-20', '2'),
(3, 'andre', '081', '', '', 4, 'mabar', 'mabar', '01:00:00', '2020-03-20', '2020-03-20', '3'),
(4, 'yudha', '081', 'nekad', '', 4, '', '', '01:00:00', '2020-03-21', '2020-03-21', '4');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID_EVENT` int(11) NOT NULL,
  `JUDUL` varchar(150) NOT NULL,
  `FOTO` varchar(150) NOT NULL,
  `SURAT_PENGAJUAN` varchar(100) NOT NULL,
  `PENYELENGGARA` varchar(150) NOT NULL,
  `NAMA_PJ` varchar(150) NOT NULL,
  `NAMA_PENGISI_ACARA` varchar(150) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `TANGGAL_SELESAI` date NOT NULL,
  `WAKTU` time NOT NULL,
  `RUANGAN` varchar(1) NOT NULL,
  `ASAL_PESERTA` varchar(150) NOT NULL,
  `JUMLAH_PESERTA` int(2) NOT NULL,
  `KETERANGAN` text NOT NULL,
  `PEMINJAMAN_ALAT` varchar(50) NOT NULL,
  `JUMLAH_PEMINJAMAN_ALAT` int(3) NOT NULL,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Pending, 3.Selesai, 4.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID_EVENT`, `JUDUL`, `FOTO`, `SURAT_PENGAJUAN`, `PENYELENGGARA`, `NAMA_PJ`, `NAMA_PENGISI_ACARA`, `TANGGAL_MULAI`, `TANGGAL_SELESAI`, `WAKTU`, `RUANGAN`, `ASAL_PESERTA`, `JUMLAH_PESERTA`, `KETERANGAN`, `PEMINJAMAN_ALAT`, `JUMLAH_PEMINJAMAN_ALAT`, `STATUS`) VALUES
(1, 'Lomba Smart App', '', '', 'EJSC', '', '', '2020-03-19', '0000-00-00', '00:00:00', '', '', 0, '', '', 0, '1'),
(2, 'ngoding', '', '', 'nekad', '', '', '2020-03-20', '2020-03-20', '00:00:00', '', '', 0, '', '', 0, '2'),
(3, 'mabar', '', '', 'nekad', '', '', '2020-03-20', '2020-03-20', '00:00:00', '', '', 0, '', '', 0, '3'),
(4, 'push rank', '', '', 'nekad', '', '', '2020-03-21', '2020-03-21', '00:00:00', '', '', 0, '', '', 0, '4');

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
  `NAMA` varchar(200) NOT NULL,
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

INSERT INTO `komunitas` (`ID_KOMUNITAS`, `LOGO`, `EMAIL`, `NAMA`, `ID_KATEGORI`, `DESKRIPSI_KOMUNITAS`, `NAMA_KETUA`, `ALAMAT`, `NO_TELEPON`, `TWITTER`, `FACEBOOK`, `INSTAGRAM`) VALUES
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
('ejscjember@gmail.com', 1, '', '085749806996', 'ejsc jember', 'ejscjember', 'Jl. Kalimantan');

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
(4, '', 'Co-Working Space', 25);

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
  MODIFY `ID_BOOKING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_komunitas`
--
ALTER TABLE `kategori_komunitas`
  MODIFY `ID_KATEGORI` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `ID_RUANGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

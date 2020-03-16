-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2020 pada 09.12
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `NIK` varchar(16) NOT NULL,
  `LEVEL` varchar(1) NOT NULL COMMENT '1.Admin, 2.User',
  `FOTO_KTP` varchar(100) NOT NULL,
  `NAMA_LENGKAP` varchar(150) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NO_TELEPON` varchar(13) NOT NULL,
  `ALAMAT` text NOT NULL,
  `KOMUNITAS` varchar(200) NOT NULL,
  `PASSWORD` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`NIK`, `LEVEL`, `FOTO_KTP`, `NAMA_LENGKAP`, `EMAIL`, `NO_TELEPON`, `ALAMAT`, `KOMUNITAS`, `PASSWORD`) VALUES
('1', '1', '', 'admin', 'admin@admin.com', '', '', '', 'admin'),
('2', '1', 'yudha.jpg', 'Octavian Yudha Mahendra', 'yudhaoctavian01@gmail.com', '081252989930', 'Jl. Nangka Gg. 4 No. 9 Perumnas Patrang, Jember', '', '1234'),
('3500000000000005', '2', '', 'Aku User', 'user@user.com', '123456789012', 'alamat user', 'komunitas user', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `ID_ALAT` int(11) NOT NULL,
  `NAMA_ALAT` varchar(100) NOT NULL,
  `JUMLAH_ALAT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `ID_BOOKING` int(11) NOT NULL,
  `NAMA` varchar(150) NOT NULL,
  `NOMOR_TELEPON` varchar(13) NOT NULL,
  `KOMUNITAS` varchar(200) NOT NULL,
  `RUANGAN` varchar(100) NOT NULL,
  `JUMLAH_ORANG` int(3) NOT NULL,
  `TEMA_KEGIATAN` varchar(255) NOT NULL,
  `DESKRIPSI_KEGIATAN` varchar(255) NOT NULL,
  `DURASI` time NOT NULL,
  `TANGGAL` date NOT NULL,
  `TANGGAL_KEMBALI` date NOT NULL,
  `PEMINJAMAN_ALAT` varchar(100) NOT NULL,
  `JUMLAH_PEMINJAMAN_ALAT` int(3) NOT NULL,
  `SURAT_PENGAJUAN` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Selesai, 3.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `ID_EVENT` int(11) NOT NULL,
  `JUDUL` varchar(255) NOT NULL,
  `FOTO` varchar(255) NOT NULL,
  `PENYELENGGARA` varchar(255) NOT NULL,
  `WAKTU` datetime NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Selesai, 3.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_komunitas`
--

CREATE TABLE `kategori_komunitas` (
  `ID_KATEGORI` int(11) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunitas`
--

CREATE TABLE `komunitas` (
  `ID_KOMUNITAS` int(11) NOT NULL,
  `LOGO` varchar(150) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL,
  `DESKRIPSI_KOMUNITAS` text NOT NULL,
  `NAMA_KETUA` varchar(150) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NO_TELEPON` varchar(13) NOT NULL,
  `TWITTER` varchar(150) NOT NULL,
  `FACEBOOK` varchar(150) NOT NULL,
  `INSTAGRAM` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `EMAIL` varchar(100) NOT NULL,
  `NOMOR_TELEPON` varchar(13) NOT NULL,
  `WHATSAPP` varchar(13) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_RUANGAN` int(11) NOT NULL,
  `FOTO_RUANGAN` varchar(100) NOT NULL,
  `NAMA_RUANGAN` varchar(100) NOT NULL,
  `KAPASITAS` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANGAN`, `FOTO_RUANGAN`, `NAMA_RUANGAN`, `KAPASITAS`) VALUES
(1, '', 'Meeting Room', 0),
(2, '', 'Training Room', 0),
(3, '', 'Conference Room', 0),
(4, '', 'Co-Working Space', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar`
--

CREATE TABLE `seminar` (
  `ID_SEMINAR` int(11) NOT NULL,
  `JUDUL` varchar(255) NOT NULL,
  `FOTO` varchar(255) NOT NULL,
  `PENYELENGGARA` varchar(255) NOT NULL,
  `WAKTU` datetime NOT NULL,
  `KETERANGAN` varchar(255) NOT NULL,
  `STATUS` varchar(1) NOT NULL COMMENT '1.Aktif, 2.Selesai, 3.Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`ID_ALAT`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_BOOKING`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_EVENT`);

--
-- Indeks untuk tabel `kategori_komunitas`
--
ALTER TABLE `kategori_komunitas`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`ID_KOMUNITAS`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_RUANGAN`);

--
-- Indeks untuk tabel `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`ID_SEMINAR`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `ID_ALAT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_BOOKING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_komunitas`
--
ALTER TABLE `kategori_komunitas`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `ID_KOMUNITAS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ID_RUANGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `seminar`
--
ALTER TABLE `seminar`
  MODIFY `ID_SEMINAR` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

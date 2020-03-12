-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2020 pada 06.07
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
  `ID_AKUN` int(11) NOT NULL,
  `LEVEL` int(1) NOT NULL COMMENT '1.SuperAdmin, 2.Admin, 3.User',
  `FOTO_USER` varchar(100) NOT NULL,
  `NAMA_LENGKAP` varchar(150) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NO_TELEPON` varchar(13) NOT NULL,
  `ALAMAT` text NOT NULL,
  `KOMUNITAS` varchar(200) NOT NULL,
  `KATEGORI_KOMUNITAS` varchar(200) NOT NULL,
  `PASSWORD` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `ID_BOOKING` int(11) NOT NULL,
  `NAMA` varchar(150) NOT NULL,
  `KOMUNITAS` varchar(200) NOT NULL,
  `RUANGAN` varchar(100) NOT NULL,
  `TUJUAN` varchar(255) NOT NULL,
  `DURASI` int(2) NOT NULL,
  `PEMINJAMAN_ALAT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `EMAIL` int(11) NOT NULL,
  `NOMOR_TELEPON` int(11) NOT NULL,
  `WHATSAPP` int(11) NOT NULL,
  `ALAMAT` int(11) NOT NULL
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
  `STATUS` varchar(10) NOT NULL
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
  `NAMA` varchar(255) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL,
  `NAMA_KETUA` varchar(150) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_AKUN`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_AKUN` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

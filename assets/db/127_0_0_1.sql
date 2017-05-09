-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Mei 2017 pada 01.36
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--
CREATE DATABASE IF NOT EXISTS `db_perpus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_perpus`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `telp` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `jk`, `telp`, `alamat`, `username`, `password`) VALUES
('PGS00000001', 'Ahmad Dimas Abid M', 'L', '08223642145', 'Bojonegoro', 'ahmad', '7d49e40f4b3d8f68c19406a58303f826');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `jk`, `telp`, `alamat`, `foto`) VALUES
('00000000001', 'Ahmad Dimas', 'L', '082236421452', 'Malang', 'C360_2016-08-12-20-02-17-823_-_Copy.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` varchar(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `penerbit`, `pengarang`, `jenis`, `jumlah`, `foto`) VALUES
('BK170426001', 'one punch man', 'manga', 'sensei', 'komik', 3, 'de03677ad69d4ac68c61f95af0b9dc90.jpg'),
('BK170426002', 'overlord', 'manga', 'sensei', 'komika', 2, 'Overlord-Japanese-Volume-2-Cover.jpg'),
('BK170426003', 'tokyo ghoul', 'manga', 'sensei', 'komikb', 4, 'kaneki-ken-wallpaper-2-1366x768.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku_transaksi`
--

CREATE TABLE `tb_buku_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `id_buku` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku_transaksi`
--

INSERT INTO `tb_buku_transaksi` (`id`, `id_transaksi`, `id_buku`) VALUES
(9, 'PJ170502001', 'BK170426001'),
(10, 'PJ170502001', 'BK170426003'),
(11, 'PJ170504001', 'BK170426003'),
(12, 'PJ170508001', 'BK170426002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_anggota`, `nama`, `tgl_pinjam`, `tgl_kembali`, `denda`, `status`) VALUES
('PJ170502001', '00000000001', 'Ahmad Dimas', '2017-05-02', '2017-05-09', 0, 'pinjam'),
('PJ170504001', '00000000001', 'Ahmad Dimas', '2017-05-04', '2017-05-04', 0, 'ada'),
('PJ170508001', '00000000001', 'Ahmad Dimas', '2017-05-08', '2017-05-08', 0, 'ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_buku_transaksi`
--
ALTER TABLE `tb_buku_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku_transaksi`
--
ALTER TABLE `tb_buku_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

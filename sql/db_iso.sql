-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Apr 2018 pada 20.25
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iso`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_uji`
--

CREATE TABLE `t_jenis_uji` (
  `id_jenis_uji` int(11) NOT NULL,
  `id_kelompok_jenis_uji` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nama_singkat` text NOT NULL,
  `rumus` text NOT NULL,
  `hasil` text NOT NULL,
  `satuan` text NOT NULL,
  `ref_method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_klien`
--

CREATE TABLE `t_klien` (
  `id_klien` int(11) NOT NULL,
  `nama_klien` text NOT NULL,
  `kontak_klien` text NOT NULL,
  `telepon_klien` text NOT NULL,
  `alamat_klien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_permintaan_analisis`
--

CREATE TABLE `t_permintaan_analisis` (
  `id_permintaan_analisis` int(11) NOT NULL,
  `id_klien` text NOT NULL,
  `tanggal_deadline` date NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `nama_sample` text NOT NULL,
  `manager_teknis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `tingkat`) VALUES
(1, 'admin', '$2y$05$9Y6S65jVrACTOeG8ad7PIeqNkm69rj6Zxj0TXPdrZWkrvqKCpWrdW', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_jenis_uji`
--
ALTER TABLE `t_jenis_uji`
  ADD PRIMARY KEY (`id_jenis_uji`);

--
-- Indexes for table `t_klien`
--
ALTER TABLE `t_klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `t_permintaan_analisis`
--
ALTER TABLE `t_permintaan_analisis`
  ADD PRIMARY KEY (`id_permintaan_analisis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jenis_uji`
--
ALTER TABLE `t_jenis_uji`
  MODIFY `id_jenis_uji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_klien`
--
ALTER TABLE `t_klien`
  MODIFY `id_klien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_permintaan_analisis`
--
ALTER TABLE `t_permintaan_analisis`
  MODIFY `id_permintaan_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

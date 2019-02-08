-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2018 pada 13.04
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tekad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `kode_desa` int(11) NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `luas_desa` varchar(255) DEFAULT NULL,
  `nama_kepala_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`kode_desa`, `kode_kecamatan`, `nama_desa`, `luas_desa`, `nama_kepala_desa`) VALUES
(1, 1, 'Jalan ABC', '123', 'Tekad 1'),
(2, 1, 'Jalan BCD', '234', 'Tekad 2'),
(3, 1, 'jalan CDE', '145', 'Tekad 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_jalan` int(11) NOT NULL,
  `nilai_weigh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalan`
--

CREATE TABLE `jalan` (
  `kode_jalan` int(11) NOT NULL,
  `kode_lurah` int(11) NOT NULL,
  `nama_jalan` varchar(255) NOT NULL,
  `periode` date NOT NULL,
  `nila_weigh` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`kode_jalan`, `kode_lurah`, `nama_jalan`, `periode`, `nila_weigh`) VALUES
(1, 1, 'Jln. ABC', '2018-04-12', 0.166615),
(2, 2, 'Jln. BCD', '2018-04-12', 0.216768),
(3, 3, 'CDE', '2018-04-12', 0.277803),
(4, 3, 'Jln. FGD', '2018-04-12', 0.338814);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `nama_kecamatan`) VALUES
(1, 'asdadassdasd'),
(2, 'sdsfsfsdfsdf'),
(3, 'asdadassdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `nila_weigh` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nila_weigh`) VALUES
(1, 'Kondisi Jalan', 0),
(2, 'Volume Kendaraan', 0.32674496645182),
(3, 'Pelayanan Wisata', 0.26668569847642),
(4, 'Lebar Jalan', 0.21630494228417),
(5, 'Fungsi Jalan', 0.19026439278759);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('superadmin','desa','lurah','camat','admin') NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nope` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `level`, `nama`, `nope`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'Tekad Murphy', '081397932320', 'donal.itb@gmail.com'),
('desa', 'e54cc06625bbadf12163b41a3cb92bf8', 'desa', 'Desa A', '081397932320', 'desaa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lurah`
--

CREATE TABLE `lurah` (
  `kode_lurah` int(11) NOT NULL,
  `kode_desa` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL,
  `nama_kepala_lurah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lurah`
--

INSERT INTO `lurah` (`kode_lurah`, `kode_desa`, `nama_kelurahan`, `nama_kepala_lurah`) VALUES
(1, 1, 'Lurah ABC', 'Lurah ABC'),
(2, 2, 'Lurah BCD', 'BCD'),
(3, 3, 'Lurah CDE', 'CDE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`kode_desa`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`kode_jalan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `lurah`
--
ALTER TABLE `lurah`
  ADD PRIMARY KEY (`kode_lurah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `kode_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `kode_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kode_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lurah`
--
ALTER TABLE `lurah`
  MODIFY `kode_lurah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

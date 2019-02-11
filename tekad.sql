-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 09:09 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `kode_desa` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `luas_desa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`kode_desa`, `user_id`, `kode_kecamatan`, `nama_desa`, `luas_desa`) VALUES
(1, 6, 1, 'Desa pertama Milik Camat 1', '123'),
(2, 7, 2, 'Desa kedua milik camat 2', '111'),
(3, 8, 1, 'desa A1', '5455'),
(4, 9, 1, 'desa ka', '344');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `kode_jalan` int(11) NOT NULL,
  `gallery_judul` varchar(50) NOT NULL,
  `filefoto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `kode_jalan`, `gallery_judul`, `filefoto`) VALUES
(2, 436405, 'tess', 'rumah-terbalik-696x454.jpg'),
(3, 798438, 'asa', 'Wallpaper-Nissan-GT-R.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_jalan` int(11) NOT NULL,
  `nilai_weigh` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `info_judul` varchar(50) NOT NULL,
  `info_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `info_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `info_status` enum('read','not') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `kode_jalan` int(11) NOT NULL,
  `kode_desa` int(11) NOT NULL,
  `nama_jalan` varchar(255) NOT NULL,
  `periode` date NOT NULL,
  `nila_weigh` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`kode_jalan`, `kode_desa`, `nama_jalan`, `periode`, `nila_weigh`) VALUES
(46666, 1, 'jalanx4', '2018-12-30', 0.101034),
(436405, 1, 'Jalan X', '2016-12-30', 0.128512),
(798438, 1, 'Jalan 4', '2019-01-22', 0.17296),
(801116, 2, 'Jalan 5', '2019-01-16', 0.215549),
(984713, 3, 'Jalan 6', '2019-12-30', 0.381945);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `user_id`, `nama_kecamatan`) VALUES
(1, 4, 'Kecamatan 1'),
(2, 5, 'Kecamatan 2');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `nila_weigh` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nila_weigh`) VALUES
(1, 'Kondisi Jalan', 0),
(2, 'Volume Kendaraan', 0.32674496645182),
(3, 'Pelayanan Wisata', 0.26668569847642),
(4, 'Lebar Jalan', 0.21630494228417),
(5, 'Fungsi Jalan', 0.19026439278759);

-- --------------------------------------------------------

--
-- Table structure for table `kritik`
--

CREATE TABLE `kritik` (
  `kritik_id` int(11) NOT NULL,
  `kritik_nama` varchar(50) NOT NULL,
  `kritik_email` varchar(50) NOT NULL,
  `kritik_telepon` char(12) NOT NULL,
  `kritik_isi` text NOT NULL,
  `kritik_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik`
--

INSERT INTO `kritik` (`kritik_id`, `kritik_nama`, `kritik_email`, `kritik_telepon`, `kritik_isi`, `kritik_tanggal`) VALUES
(1, 'adityads', 'adityads@ymail.com', '082371373347', 'tess ', '2019-02-11 20:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('desa','camat','admin','pu') NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nope` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `level`, `nama`, `nope`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Tekad Murphy', '081397932320', 'donal.itb@gmail.com'),
(4, 'usercamat1', '202cb962ac59075b964b07152d234b70', 'camat', 'Pak Camat 1', '2222', 'aaa@aaa.com'),
(5, 'usercamat2', '202cb962ac59075b964b07152d234b70', 'camat', 'Pak camat 2', '222', 'aa@aa.com'),
(6, 'userdesa1', '202cb962ac59075b964b07152d234b70', 'desa', 'Pak Des 1', '3323', 'aaa@aaa.com'),
(7, 'userdesa2', '202cb962ac59075b964b07152d234b70', 'desa', 'Pak Desa 2', '333', 'aaa@aaa.com'),
(8, 'userdesa3', '202cb962ac59075b964b07152d234b70', 'desa', 'Desa 1a', '0888', 'desa@aaa.com'),
(9, 'desasa', '202cb962ac59075b964b07152d234b70', 'desa', 'desa satu', '444', 'desa@aa.com'),
(10, 'adityads', '202cb962ac59075b964b07152d234b70', 'pu', 'adityads', '082371373347', 'adityads@ymail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lurah`
--

CREATE TABLE `lurah` (
  `kode_lurah` int(11) NOT NULL,
  `kode_desa` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL,
  `nama_kepala_lurah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lurah`
--

INSERT INTO `lurah` (`kode_lurah`, `kode_desa`, `nama_kelurahan`, `nama_kepala_lurah`) VALUES
(1, 1, 'Lurah ABC', 'Lurah ABC'),
(2, 2, 'Lurah BCD', 'BCD'),
(3, 3, 'Lurah CDE', 'CDE');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `kode_jalan` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `penilaian_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`penilaian_id`, `kode_jalan`, `kriteria_id`, `penilaian_nilai`) VALUES
(1, 801116, 1, 3),
(2, 801116, 2, 4),
(3, 801116, 3, 1),
(4, 801116, 4, 6),
(5, 801116, 5, 2),
(6, 984713, 1, 3),
(7, 984713, 2, 1),
(8, 984713, 3, 2),
(9, 984713, 4, 6),
(10, 984713, 5, 4),
(11, 798438, 1, 1),
(12, 798438, 2, 2),
(13, 798438, 3, 6),
(14, 798438, 4, 3),
(15, 798438, 5, 1),
(16, 436405, 1, 3),
(17, 436405, 2, 1),
(18, 436405, 3, 4),
(19, 436405, 4, 2),
(20, 436405, 5, 3),
(21, 46666, 1, 3),
(22, 46666, 2, 1),
(23, 46666, 3, 4),
(24, 46666, 4, 5),
(25, 46666, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pesan_id` int(11) NOT NULL,
  `kode_desa` int(11) NOT NULL,
  `pesan_judul` varchar(50) NOT NULL,
  `pesan_message` text NOT NULL,
  `pesan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pesan_id`, `kode_desa`, `pesan_judul`, `pesan_message`, `pesan_tanggal`) VALUES
(1, 1, 'tes', 'asdsa', '2019-02-11 20:03:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`kode_desa`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`);

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
-- Indexes for table `kritik`
--
ALTER TABLE `kritik`
  ADD PRIMARY KEY (`kritik_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `lurah`
--
ALTER TABLE `lurah`
  ADD PRIMARY KEY (`kode_lurah`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `kode_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `kode_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=984714;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kode_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kritik`
--
ALTER TABLE `kritik`
  MODIFY `kritik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lurah`
--
ALTER TABLE `lurah`
  MODIFY `kode_lurah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

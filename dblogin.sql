-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 03:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_surat`
--

CREATE TABLE `data_surat` (
  `id` int(50) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `unit_pengelola` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` text NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_surat`
--

INSERT INTO `data_surat` (`id`, `nomor_surat`, `unit_pengelola`, `tanggal`, `tentang`, `file_surat`) VALUES
(7, '01', 'BPKAD', '2016-01-04', 'Satuan Biaya1 Perjalanan Dinas dilingkungan Pemerintah Provinsi Sumatera Selatan', '5_6141176352738378906.pdf'),
(8, '02', 'IX', '2016-01-06', 'Penunjukan Penanggung Jawab Koordinator Kegiatan dan Pejabat Pelaksana Teknis Kegiatan dilingkungan Sekretariat Daerah Provinsi Sumatera Selatan Tahun Anggaran 2016', ''),
(9, '03', 'BPKAD', '2016-01-07', 'Evaluasi Rancangan Peraturan Daerah Kabupaten Penukal ABAB Lematang Ilir tentang APBD Tahun Anggaran 2016 dan Rancangan Peraturan Bupati Penukal ABAB Lematang Ilir tentang APBD Tahun Anggaran 2016', ''),
(10, '04', 'V', '2016-01-11', 'Penunjukan Pejabat Kuasa Pengguna Anggaran Dana Dekonsentrasi pada Dinas Perkebunan Provinsi Sumatera Selatan Tahun Anggaran 2016', ''),
(11, '05', 'V', '2016-01-04', 'Penunjukan Pejabat Kuasa Pengguna Anggaran Tugas Pembantuan pada Dinas Perkebunan Provinsi Sumatera Selatan Tahun Anggaran 2016', ''),
(12, '06', 'V', '2016-01-04', 'Penunjukan Pejabat Kuasa Pengguna Anggaran dan Bendahara Pengeluaran Dana Dekonsentrasi pada Dinas Perindustrian dan Perdagangan Provinsi Sumatera Selatan Tahun Anggaran 2016', ''),
(13, '07', 'IX', '2016-01-04', 'Penunjukan Ajudan, Pengawal Pribadi, Petugas Pengamanan, Petugas Protokoler, Petugas Vorriders Gubernur dan Wakil Gubernur Sumsel dan Bawah Kendali Operasi Pengamanan Pemerintah Provinsi Sumatera Selatan Tahun 2016', ''),
(14, '08', 'IX', '2016-01-04', 'Tambahan Penghasilan berdasarkan beban kerja kepada Sekretaris Daerah, Asisten  Sekretaris Daerah,  Pejabat Skruktural  dan Staf di Liongkungan  Biro Umum dan Perlengkapan  Setda Prov.Sumsel  TA 2016', ''),
(15, '09', 'IX', '2016-01-04', 'Penunjukan Pejabat Penata Usahaan Keuangan pada Sekretariat Daerah Provinsi Sumatera Selatan Tahun Anggaran 2016', ''),
(16, '10', 'IX', '2016-01-04', 'Penunjukan Pembantu Bendahara Pengeluaran pada Sekretariat Daerah Provinsi Sumatera Selatan Tahun Anggaran 2016', ''),
(17, '01', 'Ninis', '2021-10-15', 'Satuan Biaya1 Perjaalanan Dinas dilingkungan Pemerintah Provinsi Sumatera Selatan', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `id_user_level`) VALUES
(1, 'admin', 'admin ganteng', 'admin', 1),
(2, 'pegawai', 'pegawai ganteng', 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `user_level_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `user_level_name`) VALUES
(1, 'admin\r\n'),
(2, 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_surat`
--
ALTER TABLE `data_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_surat`
--
ALTER TABLE `data_surat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

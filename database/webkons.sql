-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 07:33 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webkons`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `nisn` int(15) DEFAULT NULL,
  `nip` int(15) DEFAULT NULL,
  `chat` text DEFAULT NULL,
  `jwb_guru` text NOT NULL,
  `stat_chat` int(2) DEFAULT NULL,
  `tgl` timestamp NULL DEFAULT NULL,
  `status` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `nisn`, `nip`, `chat`, `jwb_guru`, `stat_chat`, `tgl`, `status`) VALUES
(1, 3, 2, 'aaa', '', 2, '2019-12-19 05:22:11', 0),
(2, 3, 2, 'asdad', '', 1, '2019-12-19 06:20:45', 0),
(3, 3, 2, '1111', '', 2, '2019-12-19 01:28:33', 0),
(4, 3, 2, '1111', '', 2, '2019-12-19 01:29:58', 0),
(5, 123, 321, 'qqqqq', '', 1, '2019-12-19 01:38:10', 0),
(6, 123, 321, 'dada', '', 1, '2020-07-12 21:03:46', 0),
(7, 123, 321, 'dad', '', 1, '2020-07-12 21:07:02', 0),
(8, 123, 321, '1', '', 2, '2020-07-12 21:07:29', 0),
(9, 123, 321, '2', '', 2, '2020-07-12 21:08:20', 0),
(10, 123, 321, 'fsd', '', 2, '2020-07-12 21:08:42', 0),
(11, 123, 321, 'fds', '', 2, '2020-07-12 21:08:47', 0),
(12, 123, 321, 'df', '', 1, '2020-07-12 21:09:15', 0),
(13, 123, 321, 'sdf', '', 1, '2020-07-12 21:09:47', 0),
(14, 123, 321, 'asd', '', 2, '2020-07-12 21:18:21', 0),
(15, 123, 321, 'ada1', '', 1, '2020-07-12 21:18:41', 0),
(16, 98766, 12345, 'hello...', '', 1, '2020-07-14 00:30:27', 1),
(17, 98766, 12345, 'hai', '', 2, '2020-07-14 00:30:45', 1),
(18, 98766, 12345, 'coba sebagai siswa', '', 1, '2020-07-14 00:30:58', 1),
(19, 98766, 12345, 'iya, coba sebagai guru', '', 2, '2020-07-14 00:31:08', 1),
(20, 98766, 12345, 'sukses', '', 1, '2020-07-14 00:31:15', 1),
(21, 98765, 12345, 'hy', '', 1, '2020-07-16 10:26:36', 2),
(22, 98765, 12345, 'hallo', '', 2, '2020-07-18 02:52:28', 2),
(23, 98765, 12345, 'haiiiii', '', 1, '2020-07-21 20:45:38', 2),
(24, 98765, 12345, 'hallooo', '', 2, '2020-07-21 20:47:29', 2),
(25, 98765, 123456, 'halo yayan', '', 1, '2020-07-21 21:08:23', 1),
(26, 98766, 123456, 'coba', '', 2, '2020-07-21 21:11:11', 0),
(27, 98765, 12345, 'asd', '', 1, '2020-07-22 22:48:29', 2),
(28, 98765, 12345, 'da1', '', 1, '2020-07-22 22:48:31', 2),
(29, 98765, 12345, 'siswa', '', 1, '2020-07-22 23:11:02', 2),
(30, 98765, 12345, 'guru', '', 2, '2020-07-22 23:11:26', 2),
(31, 98765, 12345, 'saya seorang siswa', '', 1, '2020-07-22 23:27:37', 2),
(32, 98765, 12345, 'saya seorang siswa baru', '', 1, '2020-07-22 23:34:23', 2),
(33, 98765, 12345, 'iya bagaimana', '', 2, '2020-07-22 23:34:52', 2),
(34, 98765, 12345, 'ada apakah', '', 2, '2020-07-22 23:36:51', 2),
(35, 98765, 12345, 'oke bu', '', 1, '2020-07-22 23:37:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_lap` int(11) NOT NULL,
  `nisn` int(15) DEFAULT NULL,
  `nip` int(15) DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `alternatif_mslh` text DEFAULT NULL,
  `tindak_lanjut` text DEFAULT NULL,
  `tgl_lap` datetime DEFAULT current_timestamp(),
  `topik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_lap`, `nisn`, `nip`, `uraian`, `alternatif_mslh`, `tindak_lanjut`, `tgl_lap`, `topik`) VALUES
(2, 3, 0, 'asdada', '11111111', 'saaaaaaaaaaa', '2019-02-02 00:00:00', ''),
(4, 987654, 123456, '000000001111111', '999999999999111111', '88888888888811111', '2020-06-01 00:00:00', ''),
(5, 98765, 12345, 'asadsad', '111', 'ada', '2020-06-01 00:00:00', ''),
(7, 98765, 12345, 'sq', 'das', 'dsa', '2020-07-13 09:01:37', 'dad'),
(8, 98766, 12345, 'tidak ada permasalahan ', 'sukses', 'sukses', '2020-07-14 12:31:59', 'Percobaan konseling'),
(9, 98766, 12345, 'Terjadi pembullyan siswa di sekolah', 'Menghentikan bullying di sekolah dengan cara memberi bimbingan kepada siswa sekolah', 'mengundang orangtua siswa terkait', '2020-07-14 15:10:05', 'Bully');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admins`
--

CREATE TABLE `tb_admins` (
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_users` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admins`
--

INSERT INTO `tb_admins` (`username`, `password`, `nm_users`, `level`) VALUES
('ID001', '21232f297a57a5a743894a0e4a801fc3', 'Admin1', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` int(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_guru` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `password`, `nm_guru`, `level`) VALUES
(123, 'fd2cc6c54239c40495a0d3a93b6380eb', 'afdf', ''),
(12345, '92afb435ceb16630e9827f54330c59c9', 'Siti Rejeki', 'Guru'),
(123456, '440a21bd2b3a7c686cf3238883dd34e9', 'Yayan Yaeni', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kls` int(11) NOT NULL,
  `nm_kls` varchar(20) NOT NULL,
  `nip` int(20) NOT NULL,
  `thn_ajar` varchar(25) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kls`, `nm_kls`, `nip`, `thn_ajar`, `status`) VALUES
(1, 'IX A', 12345, '2021', 1),
(2, 'IX B', 12345, '2021', 0),
(3, 'IX C', 123456, '2021', 1),
(4, 'IX D', 123456, '2021', 1),
(5, 'fdsfdsfs', 0, '12313', 1),
(11, 'IX AA', 123, '2021', 1),
(27, 'IX C', 123456, '2222', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` int(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_siswa` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `id_kls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `password`, `nm_siswa`, `level`, `id_kls`) VALUES
(98765, '013f0f67779f3b1686c604db150d12ea', 'Biela Aprilia', 'Siswa', 2),
(98766, '013f0f67779f3b1686c604db150d12ea', 'Alika Naila', 'Siswa', 1),
(98769, '5fa72358f0b4fb4f2c5d7de8c9a41846', 'fdfd', '', 4),
(987654, '013f0f67779f3b1686c604db150d12ea', 'Sri Rejeki', 'Siswa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `tb_admins`
--
ALTER TABLE `tb_admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kls`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

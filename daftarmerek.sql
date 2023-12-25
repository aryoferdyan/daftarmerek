-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 12:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarmerek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(29, 2, 2),
(30, 1, 2),
(31, 3, 10),
(32, 1, 10),
(33, 1, 11),
(34, 1, 12),
(35, 3, 11),
(36, 4, 11),
(37, 4, 10),
(38, 1, 13),
(39, 4, 13),
(40, 1, 14),
(41, 2, 14),
(42, 4, 14),
(43, 2, 12),
(45, 2, 10),
(46, 1, 15),
(49, 2, 15),
(51, 1, 16),
(52, 2, 16),
(53, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_log` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id_log`, `id_user`, `tanggal`) VALUES
(1, 2, '2023-12-09 00:00:00'),
(2, 2, '2023-12-09 00:00:00'),
(3, 3, '2023-12-09 21:43:15'),
(4, 3, '2023-12-09 21:43:18'),
(5, 7, '2023-12-09 15:52:17'),
(6, 17, '2023-12-09 15:53:41'),
(7, 7, '2023-12-14 15:04:09'),
(8, 17, '2023-12-14 15:08:21'),
(9, 8, '2023-12-14 15:15:13'),
(10, 8, '2023-12-20 06:39:33'),
(11, 11, '2023-12-20 06:41:09'),
(12, 1, '2023-12-20 06:42:06'),
(13, 11, '2023-12-20 06:42:36'),
(14, 1, '2023-12-20 06:47:40'),
(15, 8, '2023-12-20 07:17:25'),
(16, 1, '2023-12-20 07:27:29'),
(17, 8, '2023-12-20 08:52:07'),
(18, 1, '2023-12-20 09:00:25'),
(19, 7, '2023-12-20 15:09:26'),
(20, 8, '2023-12-20 16:23:27'),
(21, 8, '2023-12-20 16:25:12'),
(22, 7, '2023-12-20 16:33:19'),
(23, 7, '2023-12-20 16:36:10'),
(24, 7, '2023-12-20 16:39:36'),
(25, 17, '2023-12-20 16:41:18'),
(26, 7, '2023-12-20 16:41:28'),
(27, 8, '2023-12-20 16:42:38'),
(28, 1, '2023-12-20 16:45:11'),
(29, 17, '2023-12-20 16:47:27'),
(30, 11, '2023-12-20 16:50:25'),
(31, 1, '2023-12-20 16:50:35'),
(32, 17, '2023-12-20 16:52:09'),
(33, 1, '2023-12-20 16:54:12'),
(34, 17, '2023-12-20 16:54:38'),
(35, 7, '2023-12-20 17:07:42'),
(36, 17, '2023-12-20 17:07:54'),
(37, 17, '2023-12-20 17:10:20'),
(38, 18, '2023-12-20 17:10:50'),
(39, 18, '2023-12-20 17:15:06'),
(40, 7, '2023-12-20 17:24:29'),
(41, 1, '2023-12-20 17:25:58'),
(42, 7, '2023-12-22 13:59:43'),
(43, 7, '2023-12-22 14:07:40'),
(44, 7, '2023-12-22 14:46:53'),
(45, 7, '2023-12-22 14:47:07'),
(46, 7, '2023-12-22 14:55:04'),
(47, 17, '2023-12-22 14:55:25'),
(48, 7, '2023-12-23 10:17:19'),
(49, 1, '2023-12-23 15:35:52'),
(50, 7, '2023-12-25 04:26:44'),
(51, 17, '2023-12-25 04:28:52'),
(52, 1, '2023-12-25 04:50:48'),
(53, 1, '2023-12-25 04:52:27'),
(54, 1, '2023-12-25 04:53:40'),
(55, 1, '2023-12-25 04:55:41'),
(56, 18, '2023-12-25 04:59:39'),
(57, 17, '2023-12-25 05:02:57'),
(58, 17, '2023-12-25 05:15:29'),
(59, 1, '2023-12-25 05:15:45'),
(60, 18, '2023-12-25 07:50:05'),
(61, 1, '2023-12-25 08:26:45'),
(62, 2, '2023-09-05 15:38:03'),
(63, 2, '2023-01-05 15:38:03'),
(64, 1, '2023-12-25 10:20:23'),
(65, 7, '2023-12-25 11:38:54'),
(66, 7, '2023-12-25 11:42:33'),
(67, 7, '2023-12-25 11:42:36'),
(68, 18, '2023-12-25 11:43:00'),
(69, 1, '2023-12-25 12:21:57'),
(70, 17, '2023-12-25 12:25:04'),
(71, 17, '2023-12-25 12:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(10, 'Dashboard', 'home', 'fa fa-home', 0, 'y'),
(11, 'Pengumuman', 'pengumuman', 'fa fa-bell', 0, 'y'),
(12, 'Administrasi', 'admin', 'fa fa-book', 0, 'y'),
(13, 'Permohonan', 'permohonan', 'fa fa-book', 0, 'y'),
(14, 'Profil Pengguna', 'profil', 'fa fa-user', 0, 'y'),
(15, 'Pengumuman Admin', 'pengumuman_admin', 'fa fa-bell', 0, 'y'),
(16, 'Merek Terdaftar', 'merekterdaftar', 'fa fa-info', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `id_notes` int(20) NOT NULL,
  `id_permohonan` int(10) NOT NULL,
  `tgl_notes` date NOT NULL,
  `isi_notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `isi_pengumuman` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `tgl_pengumuman`, `isi_pengumuman`, `id_user`) VALUES
(1, '2222-02-02', 'KAJSDKJASD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan`
--

CREATE TABLE `tbl_permohonan` (
  `id_permohonan` int(10) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `nama_usaha` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_owner` varchar(30) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permohonan`
--

INSERT INTO `tbl_permohonan` (`id_permohonan`, `tanggal`, `nama_usaha`, `alamat`, `nama_owner`, `logo`, `surat`, `ttd`, `id_user`, `status`, `notes`) VALUES
(21, '2023-11-25', 'BENSU', 'Nangka Street 49', 'ruben onus', 'logo-geprek-bensu-dan-i-am-geprek-bensu-3.jpeg', 'watermark_uns_transparent1.png', 'mceclip017.png', 8, 1, 'Sudah terdaftar'),
(23, '2023-12-01', 'vsfdiehrjwep', 'Jl. Nangka No. 49 Kerten, Lawe', 'andi musot', 'watermark_uns_darken.png', 'nilai_akhir1.pdf', 'background-01_(2)_-_Copy.png', 1, 3, ''),
(24, '2023-12-03', 'BANGUN NUSANTARA', 'Jakarta Pusat', 'andi', 'download.png', 'nilai_akhir2.pdf', 'mceclip0171.png', 15, 2, 'Tanda tangan tidak jelas'),
(28, '2023-12-25', 'Hati-Hati di Jalan', 'Jl. Nangka No. 49 Kerten, Laweyan, Kota Surakarta', 'Tulus', 'FP_UNS_Adakan_Launching_Buku_Kisah_Inspiratif_50_Alumni_Batch_3_(2)1.jpeg', '7838_16659_1_PB.pdf', 'watermark_uns_darken2.png', 18, 0, NULL),
(29, '2023-12-25', 'Hati-Hati di Jalan 2', 'Jl. Nangka No. 49 Kerten, Laweyan, Kota Surakarta', 'Tulus', 'watermark_uns_transparent4.png', 'Screenshot_2022-10-29_122820.png', 'background-01_(2)_-_Copy1.png', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL DEFAULT 4,
  `is_aktif` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Superr Admin', 'super.admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'logo-geprek-bensu-dan-i-am-geprek-bensu-3.jpeg', 1, 'y'),
(7, 'Guest', 'guest', '$2y$04$kLpk.Y61UO0lq6Wy1OuL.e2eFVnsYRshAvF5hw2wJzoxp.Dmr5BTO', '', 3, 'y'),
(8, 'Ferdyan Aryo Noviyant', 'aryoferdyan@gmail.com', '$2y$04$TuGyeJvSLUkTO4MNKSHw7.xRrmBZMUTwpDQS8Bj7tDDrGN.Zm/e3G', 'watermark_uns_transparent1.png', 4, 'y'),
(9, 'Abdul Qodir', 'abdul@gmail.com', '$2y$10$d/NLJmVthVeVchu7onw.QeIHaVGVqPtQNTDgv2tjnIceXj4Q5TBVG', '', 4, 'y'),
(10, 'Aditya Pamungkas', 'adit1@gmail.com', '$2y$10$.Rc1tPXw/6q0zII2JD07HO8ecw.uWhw.2YOHS4fbKKThnjQsUtApK', '', 4, 'y'),
(11, 'admin1', 'a@a.a', '$2y$04$eKLx.xEH5U8BpAl6o4/x6O/VUjgmJzYMorhHY4cF4JEriXA8Abl2W', 'logo-geprek-bensu-dan-i-am-geprek-bensu-3.jpeg', 2, 'y'),
(14, 'Ferdyan Aryo Noviyanto', 'kotoruba2018@gmail.com', '$2y$10$rzOPN5cYle1Pf47P4lp1ZObO7aISQ6lrS1bkwREc/HxNjTqxJ2dFO', '', 4, 'y'),
(15, 'Andi Nov', 'andi@gmail.com', '$2y$10$ZkfKWH4.fiydiYNw/cPkQOPgtsHCVhM48Oc7uav.IymjibKUOKyNa', 'default-foto.png', 4, 'y'),
(16, 'Denis Suarez', 'denis@gmail.com', '$2y$10$waMTDxeHrlgJFqP/evLG8ufEUnhRp04ZLEYwD8zW2WTISASDWPnN6', 'default-foto.png', 4, 'y'),
(17, 'admin', 'admin@gmail.com', '$2y$04$pJ1MEtt0pLGbFTa21ZJUWexaxHYNQclu87zPVAJ4xK8KwxjLH0d1u', 'maxresdefault.jpg', 2, 'y'),
(18, 'PEMOHON 1', 'pemohon@gmail.com', '$2y$10$kkNR01yVXy7peY7irNiCTuFT6gw9MYsCLFdvJGPUELBDsptuqYulO', '165157_620.jpg', 4, 'y'),
(19, 'Pemohon 2', 'pemohon2@gmail.com', '$2y$10$yyXdU062RRNp3mMN2parX.pCup.cDMVIgprMeahY01p9fSRq1i5GO', 'default-foto.png', 4, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Guest'),
(4, 'Pemohon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`id_notes`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_permohonan`
--
ALTER TABLE `tbl_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `id_notes` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_permohonan`
--
ALTER TABLE `tbl_permohonan`
  MODIFY `id_permohonan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

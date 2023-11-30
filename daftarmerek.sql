-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 12:26 PM
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
(21, 2, 1),
(24, 1, 9),
(28, 2, 3),
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
(39, 4, 13);

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
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'Dashboard', 'home', 'fa fa-home', 0, 'y'),
(11, 'Pengumuman', 'pengumuman', 'fa fa-bell', 0, 'y'),
(12, 'Administrasi', 'admin', 'fa fa-book', 0, 'y'),
(13, 'Permohonan', 'permohonan', 'fa fa-form', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan`
--

CREATE TABLE `tbl_permohonan` (
  `id_permohonan` int(10) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `nama_usaha` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nama_owner` varchar(30) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permohonan`
--

INSERT INTO `tbl_permohonan` (`id_permohonan`, `tanggal`, `nama_usaha`, `alamat`, `nama_owner`, `logo`, `surat`, `ttd`, `id_user`, `status`) VALUES
(19, '2023-11-30', 'AAH MANTAP222', 'Jl simatupang', 'Rendi Pangalila', '', '', '', 9, 1),
(20, '2023-11-30', 'Koto Ruba', 'Jl simatupang', 'Rendi Pangalila', '', '', '', 9, 0),
(21, '2023-11-25', 'BENSU', 'Nangka Street 49', 'ruben onus', '', '', '', 9, 0),
(22, '2023-11-30', 'Alawdkoa', 'Nangka Street 49', 'Fredyan aryo', '', '', '', 9, 0);

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
(1, 'Nuris Akbar M.Kom', 'nuris.akbar@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'download1.png', 1, 'y'),
(3, 'Muhammad hafidz Muzaki', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y'),
(7, 'Guest', 'guest', '$2y$04$kLpk.Y61UO0lq6Wy1OuL.e2eFVnsYRshAvF5hw2wJzoxp.Dmr5BTO', '', 3, 'y'),
(8, 'Ferdyan', 'aryoferdyan@gmail.com', '$2y$04$TuGyeJvSLUkTO4MNKSHw7.xRrmBZMUTwpDQS8Bj7tDDrGN.Zm/e3G', 'watermark_uns_transparent1.png', 4, 'y'),
(9, 'Abdul Qodir', 'abdul@gmail.com', '$2y$10$d/NLJmVthVeVchu7onw.QeIHaVGVqPtQNTDgv2tjnIceXj4Q5TBVG', '', 4, 'y'),
(10, 'Aditya Pamungkas', 'adit1@gmail.com', '$2y$10$.Rc1tPXw/6q0zII2JD07HO8ecw.uWhw.2YOHS4fbKKThnjQsUtApK', '', 4, 'y');

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
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_permohonan`
--
ALTER TABLE `tbl_permohonan`
  MODIFY `id_permohonan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

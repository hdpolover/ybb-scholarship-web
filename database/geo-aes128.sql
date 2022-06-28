-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 05:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geo-aes128`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `file_name_source` varchar(255) DEFAULT NULL,
  `file_name_finish` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','2') NOT NULL COMMENT '1 untuk enkripsi, 2 untuk dekripsi',
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `last_activity` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `hak_akses` enum('admin','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `last_activity`, `email`, `hak_akses`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2022-03-09 23:26:39', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD CONSTRAINT `tbl_file_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 03:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyek_merchandise`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `jurusan` enum('Teknologi Informasi','Teknik Elektro','Akuntansi','Administrasi Bisnis','Teknik Kimia','Teknik Sipil','Teknik Mesin') NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `beli` int(2) NOT NULL,
  `pengeluaran` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `nama`, `password`, `jk`, `jurusan`, `no_telp`, `alamat`, `foto`, `beli`, `pengeluaran`) VALUES
('1531140005', 'Deni Candra', '1531140005', 'Laki-laki', 'Teknologi Informasi', '08532413176', 'Madiun ', 'IMG_20170115_141329.jpg', 0, 0),
('1531140014', 'tya ', '1531140014', 'Perempuan', 'Teknologi Informasi', '087564836426', 'Probolinggo', 'IMG_20170115_141142.jpg', 0, 0),
('1531140017', 'Windi Rahmawati', '1531140017', 'Perempuan', 'Teknologi Informasi', '09664675557', 'Bondowoso', 'IMG_20170115_141221.jpg', 0, 0),
('1531140018', 'Aliefian Dio B', '1531140018', 'Laki-laki', 'Teknologi Informasi', '09864375', 'Malang ', 'IMG_20170115_141351.jpg', 0, 0),
('1531140020', 'Rifky Abdillah', '1531140020', 'Laki-laki', 'Teknologi Informasi', '097437252725', 'Sumenep', 'IMG_20170115_141151.jpg', 0, 0),
('1531140024', 'Zumrotul S', '1531140024', 'Perempuan', 'Teknologi Informasi', '09669543467', 'Pasuruan', 'IMG_0318.JPG', 0, 0),
('1531140047', 'Dwi Lika Adnriani  ', '1531140047', 'Perempuan', 'Teknologi Informasi', '087583572', 'Malang ', 'IMG_20170115_141445.jpg', 0, 0),
('1531140109', 'M.rifky Fuady', '1531140109', 'Laki-laki', 'Teknologi Informasi', '087965346789', 'Malang ', 'IMG_20170115_141318.jpg', 0, 0),
('1531140111', 'M. Reza Ilham', '1531140111', 'Laki-laki', 'Teknologi Informasi', '097998777768', 'Lumajang', 'IMG_20170115_141211.jpg', 0, 0),
('1531140118', 'ANISSA VISTA CUTE', '1531140118', 'Perempuan', 'Teknologi Informasi', '089685447587', 'Malang ', 'Screenshot_2017-01-16-08-35-19-46[1].png', 0, 0),
('1531140127', 'Bima Putra Pratama', '1531140127', 'Laki-laki', 'Teknologi Informasi', '0865788654', 'Kediri', 'IMG_20170115_141340.jpg', 0, 0),
('1531140131', 'Rizma Maudy ', '1531140131', 'Perempuan', 'Teknologi Informasi', '087557252464', 'Malang ', 'IMG_20170115_141644.jpg', 0, 0),
('1531140136', 'M. Iqbal F', '1531140136', 'Laki-laki', 'Teknologi Informasi', '098765432145', 'Trenggalek', 'IMG_20170115_141202.jpg', 0, 0),
('1531140144', 'Lukita Ratnasari', '1531140144', 'Perempuan', 'Teknologi Informasi', '08654322267', 'Malang ', 'IMG_0320.JPG', 0, 0),
('1531140148', 'Yayan Rahmat Wijaya', '1531140148', 'Laki-laki', 'Teknologi Informasi', '085790394935', 'Asrikaton Malang    ', 'yayan.jpg', 0, 0),
('1531140149', 'Lukman Alfiansyah', '1531140149', 'Laki-laki', 'Teknologi Informasi', '09864464254', 'Malang ', 'IMG_20170115_141125.jpg', 0, 0),
('1531140154', 'Wildhan Alfiansyah', '1531140154', 'Laki-laki', 'Teknologi Informasi', '089754673637', 'Pasuruan', 'IMG_20170115_141558.jpg', 0, 0),
('1531140156', 'Elok Indah Narwanti', '1531140156', 'Perempuan', 'Teknologi Informasi', '085790394934', 'Pandanwangi Malang', '07-08-31-Chibi-Muslimah.png', 0, 0),
('1531140163', 'Meganingtyas Lexy P', '1531140163', 'Perempuan', 'Teknologi Informasi', '098573752632', 'Sukun city', 'Screenshot_2017-01-16-08-35-27-99[1].png', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`nim`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

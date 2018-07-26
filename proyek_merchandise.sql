-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2017 at 04:48 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_merchandise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `alamat`, `tanggal_lahir`, `no_telp`, `foto`) VALUES
('anakhuroida', 'admin', 'Ana Khuroida', 'Tumpang', '1998-01-14', '083333333333', 'anakhuroida.jpg'),
('dewipirena', 'admin', 'Fitria Dewi Pirena', 'Lumajang ', '1997-02-26', '0822222222', 'dewipirena.jpg'),
('rahmania', 'admin', 'Rahmania Kumalasari', 'Madiun', '1996-02-23', '0811111111', 'rahmania.jpg'),
('yayanrw', 'admin', 'Yayan Rahmat Wijaya', 'Asrikaton - Pakis', '1996-12-27', '085790394935', 'yayanrw.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(3) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `harga` int(8) NOT NULL,
  `stok` int(10) NOT NULL,
  `kategori` enum('Jacket','Polo T-Shirt','T-Shirt','Accessories','Sticker') NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `stok`, `kategori`, `keterangan`, `foto`) VALUES
(1, 'Jaket Jurusan TI', 110000, 0, 'Jacket', 'Bahan American Drill', 'jacketti.png'),
(4, 'Polo IT', 60000, 10, 'Polo T-Shirt', 'IT Keren', '1.png'),
(5, 'Jaket Jurusan TI 2', 110000, 15, 'Jacket', 'Keren', 'bener.png'),
(6, 'Katelpak Polinema', 65000, 15, 'Polo T-Shirt', 'Keren', 'bajupoltek.png'),
(7, 'Mug ', 25000, 8, 'Accessories', 'Murah', 'colorful-rhombus-decal-design-ceramic-mug.jpg'),
(8, 'Ganci Medsos', 5000, 14, 'Accessories', 'Murah Meriah', 'fbkunci.jpg'),
(9, 'Ganci Keren', 9000, 15, 'Accessories', 'Keren', 'gantungan kunci.jpg'),
(10, 'Polo Mesin', 60000, 15, 'Polo T-Shirt', 'Solid', 'hmm.png'),
(11, 'Polo Sipil', 60000, 15, 'Polo T-Shirt', 'Keren', 'hms.png'),
(12, 'Jaket Jurusan TI 3', 120000, 17, 'Jacket', 'Keren', 'Huft.png'),
(13, 'Ganci IG', 5000, 13, 'Accessories', 'IG', 'igkunci.jpg'),
(14, 'Stiker TI', 3000, 20, 'Sticker', 'Fast', 'stiker2.png'),
(15, 'Kaos Dropdead', 55000, 15, 'T-Shirt', 'Murah', 'KAOS.png'),
(16, 'Jaket Jurusan TI 4', 110000, 15, 'Jacket', 'Wow', 'JAKET.png'),
(17, 'Mug Sapi', 35000, 20, 'Accessories', 'moooooo', 'mug sapi.png'),
(19, 'Jaket', 120000, 10, 'Jacket', 'sdssd', 'IMG_20160808_224650_3_LI.jpg'),
(20, 'Jaket', 120000, 10, 'Jacket', 'sdssd', 'IMG_20160808_224650_3_LI.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `id_merch` int(3) NOT NULL,
  `qty` int(3) NOT NULL,
  `total` int(9) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nim`, `id_merch`, `qty`, `total`, `tanggal`, `status`) VALUES
(1, '1531140148', 7, 1, 25000, '2017-01-20 10:05:02', 'N'),
(2, '1531140148', 12, 1, 120000, '2017-01-20 11:26:35', 'N'),
(3, '1531140148', 8, 2, 10000, '2017-01-20 11:26:36', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `jurusan` enum('Teknologi Informasi','Teknik Elektro','Akuntansi','Administrasi Bisnis','Teknik Kimia','Teknik Sipil','Teknik Mesin') NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `pengeluaran` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `nama`, `email`, `password`, `jk`, `jurusan`, `no_telp`, `alamat`, `foto`, `pengeluaran`) VALUES
('1531000000', 'Mentoring', '', '1531000000', 'Laki-laki', 'Teknik Mesin', '089000000000', 'Dimana-mana', 'c698aa00-514d-44e0-8b53-7f1384e65881.jpg', 0),
('153114000', 'fitria', '', '153114000', 'Perempuan', 'Teknologi Informasi', '081427292', 'Malang', 'IMG_20170115_141211.jpg', 0),
('1531140005', 'Deni Candra', '', '1531140005', 'Laki-laki', 'Teknologi Informasi', '08532413176', 'Madiun ', 'IMG_20170115_141329.jpg', 0),
('1531140014', 'tya ', '', '1531140014', 'Perempuan', 'Teknologi Informasi', '087564836426', 'Probolinggo', 'IMG_20170115_141142.jpg', 0),
('1531140017', 'Windi Rahmawati', '', '1531140017', 'Perempuan', 'Teknologi Informasi', '09664675557', 'Bondowoso', 'IMG_20170115_141221.jpg', 0),
('1531140018', 'Aliefian Dio B', '', '1531140018', 'Laki-laki', 'Teknologi Informasi', '098643756', 'Malang  ', 'IMG_20170115_141351.jpg', 0),
('1531140020', 'Rifky Abdillah', '', '1531140020', 'Laki-laki', 'Teknologi Informasi', '097437252725', 'Sumenep', 'IMG_20170115_141151.jpg', 0),
('1531140024', 'Zumrotul S', '', '1531140024', 'Perempuan', 'Teknologi Informasi', '09669543467', 'Pasuruan', 'IMG_0318.JPG', 0),
('1531140047', 'Dwi Lika Adnriani  ', '', '1531140047', 'Perempuan', 'Teknologi Informasi', '087583572', 'Malang ', 'IMG_20170115_141445.jpg', 0),
('1531140109', 'M.rifky Fuady', '', '1531140109', 'Laki-laki', 'Teknologi Informasi', '087965346789', 'Malang ', 'IMG_20170115_141318.jpg', 0),
('1531140111', 'M. Reza Ilham', '', '1531140111', 'Laki-laki', 'Teknologi Informasi', '097998777768', 'Lumajang', 'IMG_20170115_141211.jpg', 0),
('1531140118', 'Anisa Vista', '', '1531140118', 'Perempuan', 'Teknologi Informasi', '089685447587', 'Malang  ', 'Screenshot_2017-01-16-08-35-19-46[1].png', 0),
('1531140127', 'Bima Putra Pratama', '', '1531140127', 'Laki-laki', 'Teknologi Informasi', '0865788654', 'Kediri', 'IMG_20170115_141340.jpg', 0),
('1531140131', 'Rizma Maudy ', '', '1531140131', 'Perempuan', 'Teknologi Informasi', '087557252464', 'Malang ', 'IMG_20170115_141644.jpg', 0),
('1531140136', 'M. Iqbal F', '', '1531140136', 'Laki-laki', 'Teknologi Informasi', '098765432145', 'Trenggalek', 'IMG_20170115_141202.jpg', 0),
('1531140144', 'Lukita Ratnasari', '', '1531140144', 'Perempuan', 'Teknologi Informasi', '08654322267', 'Malang ', 'IMG_0320.JPG', 0),
('1531140148', 'Yayan Rahmat Wijaya', '', '1531140148', 'Laki-laki', 'Teknologi Informasi', '085790394935', 'Asrikaton Malang    ', 'yayan.jpg', 3084000),
('1531140149', 'Lukman Alfiansyah', '', '1531140149', 'Laki-laki', 'Teknologi Informasi', '09864464254', 'Malang ', 'IMG_20170115_141125.jpg', 0),
('1531140154', 'Wildhan Alfiansyah', '', '1531140154', 'Laki-laki', 'Teknologi Informasi', '089754673637', 'Pasuruan', 'IMG_20170115_141558.jpg', 0),
('1531140156', 'Elok Indah Narwanti', '', '1531140156', 'Perempuan', 'Teknologi Informasi', '085790394934', 'Pandanwangi Malang', '07-08-31-Chibi-Muslimah.png', 0),
('1531140163', 'Meganingtyas Lexy P', '', '1531140163', 'Perempuan', 'Teknologi Informasi', '098573752632', 'Sukun city', 'Screenshot_2017-01-16-08-35-27-99[1].png', 0),
('1531140189', 'Rio Rahmat Wijaya', '', '1531140189', 'Laki-laki', 'Teknik Mesin', '085790394940', 'Asrikaton', 'IMG_20161205_111444_450.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 11:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florist`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL,
  `kategori_ket` text NOT NULL,
  `kategori_gambar` varchar(50) NOT NULL DEFAULT 'images/defaultkat.php'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_ket`, `kategori_gambar`) VALUES
(1, 'kategori 1', 'kategori', 'images/defaultkat.php'),
(2, 'kategori 2', 'hhh', 'images/defaultkat.php');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `produk_kode` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keranjang_qty` int(11) NOT NULL,
  `keranjang_ukuran` enum('m1','m2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_kode` int(11) NOT NULL,
  `pesanan_kode` int(11) NOT NULL,
  `pembayaran_nama` varchar(50) NOT NULL,
  `pembayaran_norek` varchar(30) NOT NULL,
  `pembayaran_status` enum('pending','selesai') NOT NULL,
  `pembayaran_tanggal` datetime NOT NULL,
  `pembayaran_bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_kode` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `pemesanan_sprice` int(11) NOT NULL,
  `pemesanan_diskon` int(11) NOT NULL,
  `pemesanan_ongkir` int(11) NOT NULL,
  `pemesanan_total` int(11) NOT NULL,
  `pemesanan_status` enum('waiting','selesai','batal') NOT NULL DEFAULT 'waiting',
  `pemesanan_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_kode`, `user_id`, `rekening_id`, `pemesanan_sprice`, `pemesanan_diskon`, `pemesanan_ongkir`, `pemesanan_total`, `pemesanan_status`, `pemesanan_tanggal`) VALUES
('INV10111180163', 4, 3, 232, 0, 10000, 10232, 'waiting', '2018-11-01 19:42:27'),
('INV91410182926', 4, 2, 1046000, 56900, 40000, 1029100, 'waiting', '2018-10-29 15:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detailp`
--

CREATE TABLE `pemesanan_detailp` (
  `pdp_id` int(11) NOT NULL,
  `pemesanan_kode` varchar(15) NOT NULL,
  `produk_kode` varchar(15) NOT NULL,
  `pdp_qty` int(11) NOT NULL,
  `pdp_size` enum('m1','m2') NOT NULL,
  `pdp_harga` int(11) NOT NULL,
  `pdp_diskon` int(11) NOT NULL,
  `pdp_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_detailp`
--

INSERT INTO `pemesanan_detailp` (`pdp_id`, `pemesanan_kode`, `produk_kode`, `pdp_qty`, `pdp_size`, `pdp_harga`, `pdp_diskon`, `pdp_subtotal`) VALUES
(3, 'INV91410182926', 'PRD251017181', 2, 'm2', 19550, 6900, 39100),
(4, 'INV91410182926', 'PRD6811017188', 4, 'm1', 237500, 50000, 950000),
(5, 'INV10111180163', 'PRD71017184', 1, 'm1', 232, 0, 232);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_ship`
--

CREATE TABLE `pemesanan_ship` (
  `ps_id` int(11) NOT NULL,
  `pemesanan_kode` varchar(15) NOT NULL,
  `produk_kode` varchar(15) NOT NULL,
  `ps_nama` varchar(50) NOT NULL,
  `ps_tanggal` date NOT NULL,
  `ps_ucapan` text NOT NULL,
  `ps_lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_ship`
--

INSERT INTO `pemesanan_ship` (`ps_id`, `pemesanan_kode`, `produk_kode`, `ps_nama`, `ps_tanggal`, `ps_ucapan`, `ps_lokasi`) VALUES
(7, 'INV91410182926', 'PRD251017181', 'AdityaDS', '2017-10-22', 'asd', 'ads'),
(8, 'INV91410182926', 'PRD251017181', 'ads', '2018-10-29', 'ads', 'asd'),
(9, 'INV91410182926', 'PRD6811017188', 'asd', '2018-11-23', 'ad', 'ads'),
(10, 'INV91410182926', 'PRD6811017188', 'asda', '2018-11-15', 'ad', 'ad'),
(11, 'INV91410182926', 'PRD6811017188', 'adsdasd', '2017-11-14', 'asd', 'ad'),
(12, 'INV91410182926', 'PRD6811017188', 'adsasd', '2017-12-27', 'asd', 'ad'),
(13, 'INV10111180163', 'PRD71017184', 'Abdul', '2016-11-30', 'selamat', 'jl.aaa');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_kode` varchar(15) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_ket` text NOT NULL,
  `produk_gambar` varchar(50) NOT NULL DEFAULT 'images/default.php'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_kode`, `kategori_id`, `produk_nama`, `produk_harga`, `produk_ket`, `produk_gambar`) VALUES
('PRD251017181', 1, 'Produk 1', 23000, 'sad', 'bride-1355473_19201.jpg'),
('PRD441017189', 1, 'produk 4', 0, '', 'roses-1566792_19201.jpg'),
('PRD6811017188', 1, 'Produk 5', 250000, '', 'roses-1477992_19201.jpg'),
('PRD71017184', 1, 'Produk 2', 232, 'aa', 'flowers-3441662_19201.jpg'),
('PRD7611017184', 1, 'Produk 3', 500000, '', 'roses-1229148_1920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `rekening_id` int(11) NOT NULL,
  `rekening_bank` varchar(25) NOT NULL,
  `rekening_nama` varchar(50) NOT NULL,
  `rekening_nomor` varchar(25) NOT NULL,
  `rekening_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`rekening_id`, `rekening_bank`, `rekening_nama`, `rekening_nomor`, `rekening_gambar`) VALUES
(2, 'BRI', 'tesla', '2222', 'Logo_BRI.png'),
(3, 'BCA', 'aza', '22', '800px-BNI_logo_svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_judul` varchar(50) NOT NULL,
  `slider_ket` text NOT NULL,
  `slider_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_judul`, `slider_ket`, `slider_gambar`) VALUES
(10, 'Karangan bunga', 'Sejuk dan indah melihatnya', 'roses-1566792_1920.jpg'),
(11, 'Slide 2', 'Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 Slide 2 ', 'bride-1355473_1920.jpg'),
(12, 'Slide 3', 'Slide 3 Slide 3 Slide 3 Slide 3 Slide 3 Slide 3 ', 'flowers-3441662_1920.jpg'),
(13, 'slide 4', 'slide 4 slide 4 slide 4 slide 4 slide 4 slide 4 ', 'girl-751070_1920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_jk` enum('L','P') NOT NULL,
  `user_role` enum('customer','admin','pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_tel`, `user_alamat`, `user_jk`, `user_role`) VALUES
(1, 'adityads', '202cb962ac59075b964b07152d234b70', 'tesadmin', 'admin@aaa.com33', '082222333', 'jl.aaa444', 'L', 'admin'),
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'tesadmin', 'admin@aaa.com33', '082222333', 'jl.aaa44411', 'L', 'customer'),
(5, 'wayan', '202cb962ac59075b964b07152d234b70', 'tesadmin', 'admin@aaa.com33', '082222333', 'jl.aaa444', 'P', 'admin'),
(6, 'ranama', '202cb962ac59075b964b07152d234b70', 'tesadmin', 'admin@aaa.com33', '082222333', 'jl.aaa444', 'P', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_kode`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_kode`),
  ADD KEY `rekening_id` (`rekening_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pemesanan_detailp`
--
ALTER TABLE `pemesanan_detailp`
  ADD PRIMARY KEY (`pdp_id`),
  ADD KEY `pemesanan_kode` (`pemesanan_kode`),
  ADD KEY `produk_kode` (`produk_kode`);

--
-- Indexes for table `pemesanan_ship`
--
ALTER TABLE `pemesanan_ship`
  ADD PRIMARY KEY (`ps_id`),
  ADD KEY `pemesanan_kode` (`pemesanan_kode`),
  ADD KEY `produk_kode` (`produk_kode`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_kode`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`rekening_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_kode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan_detailp`
--
ALTER TABLE `pemesanan_detailp`
  MODIFY `pdp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan_ship`
--
ALTER TABLE `pemesanan_ship`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `rekening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`rekening_id`) REFERENCES `rekening` (`rekening_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_detailp`
--
ALTER TABLE `pemesanan_detailp`
  ADD CONSTRAINT `pemesanan_detailp_ibfk_1` FOREIGN KEY (`pemesanan_kode`) REFERENCES `pemesanan` (`pemesanan_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_detailp_ibfk_2` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_ship`
--
ALTER TABLE `pemesanan_ship`
  ADD CONSTRAINT `pemesanan_ship_ibfk_1` FOREIGN KEY (`pemesanan_kode`) REFERENCES `pemesanan` (`pemesanan_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ship_ibfk_2` FOREIGN KEY (`produk_kode`) REFERENCES `produk` (`produk_kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

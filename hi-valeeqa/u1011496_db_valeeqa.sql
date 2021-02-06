-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2021 at 10:18 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1011496_db_valeeqa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_user`, `id_produk`, `jumlah`) VALUES
(2, 26, 1),
(10, 16, 6),
(10, 26, 7);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `jumlah`) VALUES
(1, 14, 3),
(2, 14, 1),
(6, 14, 40),
(7, 15, 5),
(7, 18, 3),
(8, 24, 3),
(9, 26, 1),
(10, 23, 1),
(10, 24, 2),
(11, 15, 2),
(12, 22, 1),
(12, 23, 1),
(13, 18, 1),
(14, 16, 4),
(14, 24, 1),
(15, 18, 1),
(16, 21, 1),
(17, 22, 1),
(18, 22, 1),
(19, 16, 1),
(20, 16, 2),
(20, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_produk` int(11) NOT NULL,
  `lokasi_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_produk`, `lokasi_gambar`) VALUES
(14, 'images/product-img/yumna1.png'),
(15, 'images/product-img/yumna2.png'),
(16, 'images/product-img/yumna3.png'),
(17, 'images/product-img/yumna4.png'),
(18, 'images/product-img/yumna5.png'),
(19, 'images/product-img/yumna6.png'),
(20, 'images/product-img/chayra1.png'),
(21, 'images/product-img/chayra2.png'),
(22, 'images/product-img/chayra3.png'),
(23, 'images/product-img/chayra4.png'),
(24, 'images/product-img/chayra5.png'),
(25, 'images/product-img/chayra6.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Chayra Abaya'),
(2, 'Yumna Dress');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(70) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `harga` int(8) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `best_seller` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_barang`, `warna`, `bahan`, `harga`, `keterangan`, `stok`, `best_seller`) VALUES
(2, 1, 'Chayra Abaya', 'Black', 'Wollycrape', 140000, '-', 4, 1),
(3, 1, 'Chayra Abaya', 'Caramel', 'Wollycrape', 150000, '-\r\n', 4, 0),
(14, 2, 'Yumna Dress 1', 'Milo', 'Wolpeach Exclusive', 177000, '-', 25, 0),
(15, 2, 'Yumna Dress 2', 'Dusty Peach', 'Wolpeach Exclusive', 177000, '-', 78, 0),
(16, 2, 'Yumna Dress 3', 'Dark Army', 'Wolpeach Exclusive', 177000, '-', 0, 1),
(17, 2, 'Yumna Dress 4', 'Milo', 'Wolpeach Exclusive', 177000, '-', 43, 0),
(18, 2, 'Yumna Dress 5', 'Dusty Peach', 'Wolpeach Exclusive', 177000, '-', 22, 0),
(19, 2, 'Yumna Dress 6', 'Dark Army', 'Wolpeach Exclusive', 177000, '-', 12, 0),
(20, 1, 'Chayra Abaya 1', 'Caramel', 'Wollycrepe', 167000, '-', 33, 0),
(21, 1, 'Chayra Abaya 2', 'Black', 'Wollycrepe', 167000, '-', 53, 0),
(22, 1, 'Chayra Abaya 3', 'Gray', 'Wollycrepe', 167000, '-', 0, 0),
(23, 1, 'Chayra Abaya 4', 'Caramel', 'Wollycrepe', 167000, '-', 77, 0),
(24, 1, 'Chayra Abaya 5', 'Black', 'Wollycrepe', 167000, '-', 61, 0),
(25, 1, 'Chayra Abaya 6', 'Gray', 'Wollycrepe', 167000, '-', 16, 0),
(26, 1, 'Arturia Pendragon Alter', 'Black', 'Canvas', 999000, 'New without tags: A brand-new, unused and unworn item that is not in its original retail packaging or may be missing its original retail packaging materials (such as the original box or bag). The original tags may not be attached. For example, new shoes (with absolutely no signs of wear) that are no longer in their original box fall into this category', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `nama` varchar(70) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `nomor_wa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`nama`, `rekening`, `bank`, `nomor_wa`) VALUES
('Akhmad Nur Hidayatulloh', '1234567', 'BNI', '6285784197425');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_pembayaran` varchar(15) NOT NULL,
  `jenis_pengiriman` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tabungan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `resi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `jenis_pembayaran`, `jenis_pengiriman`, `tanggal_transaksi`, `tabungan`, `total`, `status`, `resi`) VALUES
(1, 2, 'tabungan', 'kurir', '2020-12-01', 137000, 137000, 'selesai', '-'),
(2, 2, 'cash', 'cod', '2020-12-02', 0, 137000, 'proses kirim', 'JNT123456789'),
(6, 2, 'cash', 'kurir', '2021-01-16', 0, 7100000, 'proses kirim', '-'),
(7, 2, 'tabungan', 'kurir', '2021-01-16', 10000, 1436000, 'gagal', '-'),
(8, 2, 'cash', 'cod', '2021-01-18', 0, 501000, 'selesai', 'JNT123456789'),
(9, 1, 'tabungan', 'kurir', '2021-01-22', 0, 1019000, 'gagal', '-'),
(10, 12, 'cash', 'cod', '2021-01-24', 0, 501000, 'selesai', '-'),
(11, 13, 'cash', 'kurir', '2021-01-25', 0, 374000, 'selesai', 'JNT123456789'),
(12, 13, 'tabungan', 'cod', '2021-01-25', 0, 334000, 'gagal', '-'),
(13, 13, 'cash', 'kurir', '2021-01-25', 0, 197000, 'proses kirim', '000000'),
(14, 11, 'cash', 'kurir', '2021-01-26', 0, 895000, 'proses kirim', '1111'),
(15, 3, 'cash', 'cod', '2021-01-26', 0, 177000, 'gagal', '-'),
(16, 3, 'tabungan', 'cod', '2021-01-26', 0, 167000, 'belum bayar', '-'),
(17, 3, 'tabungan', 'kurir', '2021-01-27', 0, 187000, 'belum bayar', '-'),
(18, 11, 'cash', 'cod', '2021-01-28', 0, 167000, 'proses kirim', '000000'),
(19, 3, 'cash', 'cod', '2021-01-28', 0, 177000, 'belum bayar', '-'),
(20, 1, 'tabungan', 'cod', '2021-01-28', 0, 521000, 'belum bayar', '-');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_produk` int(11) NOT NULL,
  `lebar_dada` int(3) NOT NULL,
  `panjang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_produk`, `lebar_dada`, `panjang`) VALUES
(14, 100, 136),
(15, 100, 136),
(16, 100, 136),
(17, 100, 136),
(18, 100, 136),
(19, 100, 136),
(20, 100, 137),
(21, 100, 137),
(22, 100, 137),
(23, 100, 137),
(24, 100, 137),
(25, 100, 137);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_wa` varchar(15) NOT NULL,
  `level` int(1) NOT NULL,
  `lupa_password` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `pass`, `nama`, `jenis_kelamin`, `alamat`, `nomor_wa`, `level`, `lupa_password`) VALUES
(1, '07akhmadnur@gmail.com', '12345', 'Akhmad Nur Hidayatulloh', 'L', 'Mojokerto', '085784197425', 1, 'tidak'),
(2, 'aaa@gmail.com', 'aaa', 'Tony Chopper', 'L', 'Jombang', '123213123', 0, 'tidak'),
(3, 'aku@gmail.com', 'aku', 'aku', 'P', 'Jember', '6281211111111', 0, 'tidak'),
(10, 'hanifsatrio12@gmail.com', 'tempegoreng', 'Hanif Satrio Rimamtomo', 'L', 'Depan A3', '089698672710', 0, ''),
(11, 'admin@test.com', 'admin', 'Admin', 'L', 'Mojokerto', '087754040446', 1, 'tidak'),
(12, 'user@test.com', 'user', 'User', 'P', 'Surabaya', '087754040446', 0, 'tidak'),
(13, 'mdayat@gmail.com', '12345', 'Muhammad Dayat', 'L', 'RT 03/RW 02, Dusun Seneporejo, Desa Kesilir, Kecamatan Bangorejo, Kabupaten Banyuwangi, Jawa Timur', '0812345678901', 0, ''),
(14, 'nasrullmrt125@gmail.com', '123', 'muhammad nasrul', 'L', 'jawa timur, Jemebr, sumbersari, Jl.mastrip4', '085156596145', 0, ''),
(15, 'nasrullmrt201@gmail.com', '123', 'muhammad nasrul', 'L', 'jl mastrip', '453464224', 0, ''),
(16, 'ukiazulgrana89@gmail.com', 'devandra', 'Devandra Lukito Wibisono', 'L', 'Jember\r\n', '12345678', 0, 'tidak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD CONSTRAINT `ukuran_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

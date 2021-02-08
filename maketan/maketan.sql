-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 08:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1011496_maketan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password_admin`, `nama_lengkap`, `foto_admin`) VALUES
(1, 'admin', 'admin123', 'Admin', '1.jpg'),
(2, 'figo', 'figo123', 'figo fajar y', '2.jpg'),
(3, 'rajih', 'rajih123', 'rajih', '3.jpg'),
(4, 'rosyid', 'rosyid123', 'Rifqi Rosyid E', '4.jpg'),
(5, 'icha', 'icha123', 'Dwi Nurannisa R', '5.jpg'),
(6, 'devan', 'devan123', 'M.Devan F', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buka_toko`
--

CREATE TABLE `buka_toko` (
  `id_toko` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_toko` varchar(30) DEFAULT NULL,
  `link_toko` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kode_pos` int(8) DEFAULT NULL,
  `link_map` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buka_toko`
--

INSERT INTO `buka_toko` (`id_toko`, `user_id`, `nama_toko`, `link_toko`, `kota`, `kode_pos`, `link_map`) VALUES
(1, 0, 'ddd', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(2, 0, 'jamet', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(3, 0, 'paka', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(4, 0, 'Rama', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(5, 0, 'jamet', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(6, 0, 'jamet', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(7, 8, 'Rankau', 'www.gogle.com', 'makasar', 2525, 'map.google.com'),
(8, 0, '', 'sanmdnnjaksdbasd', '', 0, ''),
(9, 0, '', 'hahaha', '', 0, ''),
(10, 0, 'jksadhjasd', '', '', 0, ''),
(11, 11, 'rajih kharissuha', 'rajih', 'jembeb', 0, 'jembeb'),
(12, 3, 'wendy', 'ndak tau', 'jembeb', 9999, 'rosyidjelekbangetsangatkebange');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transaksi`
--

CREATE TABLE `bukti_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gambar_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_transaksi`
--

INSERT INTO `bukti_transaksi` (`id_transaksi`, `user_id`, `gambar_transaksi`) VALUES
(1, 0, 'IMG20181006093842.jpg'),
(2, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(3, 8, 'IMG20191105171612(1).jpg'),
(4, 8, 'IMG20191105171612(1).jpg'),
(5, 8, 'IMG20191105171612(1).jpg'),
(6, 8, 'IMG20181006093842.jpg'),
(7, 8, 'IMG20191105171612(1).jpg'),
(8, 8, 'IMG20191105171612(1).jpg'),
(9, 8, 'IMG20191105171612(1).jpg'),
(10, 8, 'IMG20191105171612(1).jpg'),
(11, 8, 'IMG20181006093842.jpg'),
(12, 8, 'IMG20181006093842.jpg'),
(13, 8, 'IMG20191105171612(1).jpg'),
(14, 8, 'asasdas.jpg'),
(15, 8, 'asasdas.jpg'),
(16, 8, 'asasdas.jpg'),
(17, 8, 'asasdas.jpg'),
(18, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(19, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(20, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(21, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(22, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(23, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(24, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(25, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers'),
(26, 8, 'Pokemon 20th Anniversary A Wild Lapras Has Appeared 21 9 Wallpaper Ultrawide Monitor 21 9 Wallpapers');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `id_produk`, `jumlah`) VALUES
(8, 22, 1),
(8, 25, 1),
(19, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `jumlah`) VALUES
(23, 21, 1),
(24, 21, 1),
(25, 21, 1),
(26, 31, 1),
(27, 31, 1),
(28, 5, 2),
(29, 31, 1),
(30, 31, 1),
(31, 31, 1),
(32, 31, 1),
(33, 12, 2),
(34, 4, 1),
(35, 4, 1),
(36, 25, 1),
(37, 25, 1),
(38, 25, 1),
(39, 22, 1),
(40, 22, 1),
(41, 22, 1),
(42, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pertanian'),
(3, 'Alat'),
(4, 'Pupuk'),
(5, 'Bibit'),
(6, 'Obat');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `online_id` int(11) NOT NULL,
  `online_pengirim` int(11) NOT NULL,
  `online_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`online_id`, `online_pengirim`, `online_penerima`) VALUES
(56, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'pupuk', 10, 20, 'pupuk.jpg', 'asdasdasdasdasdasdasdasdasdasdasdasdas'),
(2, 'alat pertanian', 50, 10, 'alat.jpg', 'asdkajsbnfjkabsnjkgfbkasg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `nama` text NOT NULL,
  `rekening` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`nama`, `rekening`, `bank`) VALUES
('rajih kharissuh', 268478264, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'kg'),
(2, 'unit'),
(3, 'botol'),
(4, 'ikat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(6) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga` char(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `map_link` text NOT NULL,
  `gbr_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi_produk`, `harga`, `stok`, `id_satuan`, `map_link`, `gbr_produk`) VALUES
(4, 4, 'pupuk kandang', '<p><small>Pupuk Organik Cair POC FERTIFORT Kuning</small></p>\r\n\r\n<p><small>FERTIFORT - K ( KUNING ) KANDUNGAN : Asam Amino, Nutrisi Mikro, Vitamin, Enzim, Chitosan, Klorofil Stimulan, dan 7 macam ZPT ( 0.250 SL ). UNTUK : Pembungaan, Pembuahan, Pengumbian, Pembesaran Batang / Kokoh, dan untuk Sayuran Daun (Daun Lebih Tebal) Bunga lebih Lebat dan tahan rontok, Penyerbukan lebih Maksimal sehingga lebih banyak yang menjadi buah. Buah pun lebih Lebat dan tahan rontok, Lebih cepat besar, Lebih Berbobot, dan Lebih cepat masak , Lebih manis / Brix meningkat. Bila penyemprotan dikenakan ke buah nya juga, akan lebih mempercepat pembesaran dan pemasakan buah Warna Bunga /Tanaman hias lebih cerah Dan lebih tahan berbagai penyakit Kemasan Botol plastik HDPE 500 ml CATATAN : ( BERAT per BOTOL = 650 gram ) UNTUK Pengiriman dengan kurir : 1 KG BISA 2 BOTOL UNTUK EFISIENSI ONGKIR BISA ORDER KELIPATAN TIAP 2 BOTOL. MISAL UTK ORDER 4 BOTOL BISA DIBUAT 2 KALI ORDER ( AKAN TERHITUNG 2 KG ) KARENA KALO LANGSUNG ORDER 4 BOTOL AKAN TERHITUNG 3 KG ( 4X650gram = 2,6KG = 3 kg )</small></p>\r\n', '30000', 0, 3, 'jember, kec sumbersari, JL. karimata', 'pupuk1.jpg'),
(5, 3, 'Sekop Baja Tebal', '<p><small>&nbsp;HASSTON PROHEX Skrop Abri Lipat Gg Besi&nbsp;</small></p>\r\n\r\n<p><small>1pcs Skrop Abri Lipat Gg Besi</small></p>\r\n', '20000', 0, 2, 'Jember, kec sumbersari, JL. karimata', 'sekopjpg.jpg'),
(12, 5, 'Bibit jeruk lemon', '<p><small>Deskripsi&nbsp;Bibit Jeruk lemon import Kondisi berbuah</small></p>\r\n\r\n<p><small>bibit hasil okulasi dan cangkok kini ukuran mini dan cocok untuk di tanam di dalam pot. Barang always ready stock. Lemon yang sangat digemari para pecinta kuliner Tinggi50-70cm</small></p>\r\n', '10000', 0, 1, 'jember, kec sumbersari, JL. karimata', 'yu.png'),
(21, 5, 'Bibit Rambutan', '<p><small>Bibit pohon rambutan rapiah / Tanaman buah rambutan / Ropiah</small></p>\r\n\r\n<p><small>Tinggi bibit : 40-50 cm Asal bibit : okulasi Dari kesebelas jenis unggulan tersebutRambutan Rapiahmerupakan rambutan yang banyak diminati masyarakat Indonesai. Ciri khas rambutan jenis Rapiah ini adalah buahnya yang agak kecil dengan rambut yang sangat pendek akan tetapi rasa buahnya sangat manis. renyah dan mudah lepas dari bijinya (nglotok).</small></p>\r\n', '20000', 0, 1, 'Jember, kec sumbersari, JL. karimata', 'bibit3.jpg'),
(22, 5, 'bibit jeruk', '<p><small>Deskripsi&nbsp;Bibit Jeruk Santang Madu Tabulampot</small></p>\r\n\r\n<p><small>Jeruk santang biasa disebut jeruk santang madu atau jeruk madu, merupakan varietas jeruk yang unggul, berasal dari China, ciri khas buahnya berwarna orange terang dan mengandung biji buah yang sedikit. Buah jeruk santang disukai oleh semua penggemar jeruk, buahnya kecil sampai sedang dengan rasa yang sangat manis sehingga disebut jeruk madu. Nama ilmiah (botanical name): Citrus sp Bibit berasal dari: okulasi Rekomendasi dataran dan kondisi tempat tumbuh optimal: dataran rendah &ndash; tinggi, suhu panas maupun dingin Kebutuhan sinar matahari: full sun (penyinaran sepanjang hari) Kapan berbuah: kira-kira +-1 tahunan</small></p>\r\n', '17000', 491, 1, 'jember, kec sumbersari, JL. karimata', 'bibit4.jpg'),
(25, 5, 'BENIH PANAH MERAH CABE RAWIT ', '<p>Deskripsi BENIH PANAH MERAH CABE RAWIT BARA 3200 BUTIR PER SACHET KEMASAN PABRIK Sumber: Internet *** PRODUK ORIGINAL ASLI, BUKAN PALSU*** *** HATI-HATI PRODUK SEJENIS DENGAN HARGA MURAH*** BENIH CAP PANAH MERAH CABE RAWIT BARA KEMASAN PABRIK Isi : 3.200 Butir Produksi : PT East West Seed Indonesia Buah banyak, Sangat Pedas BENTUK BUAH/ TANGKAI - Cabang banyak - Genjah &amp; Produktif - Buah tegak dan lebat - Warna buah merah terang KETAHANAN PENYAKIT Tahan Layu Bakteri, CMV, Col, BW BOBOT BUAH 1-2 gram POTENSI HASIL 9-10 ton/ha REKOMENDASI Cocok ditanaman di ketinggian di dataran rendah, menengah, dan tinggi UMUR PANEN 75-100 HST (Hari Setelah Tanaman) * Ketahanan penyakit, umur panen, bobot dan potensi hasil tergantung pada lingkungan dan perlakuan budidayanya. #BENIHCABERAWIT #CAPPANAHMERAH #BENIHBARA (MASA EDAR DI FOTO PRODUK HANYA CONTOH. SILAHKAN CHAT UNTUK MASA EDAR TERBARU) PENGIRIMAN VIA GOSEND/GRAB SAMEDAY AKAN DI PROSES MAKSIMAL 3 JAM DARI ORDERAN MASUK, BATAS WAKTU TERIMA ORDERAN SAMPAI JAM 12.00, DIATAS JAM 12.00 AKAN DIPROSES KEESOKAN HARI HARI MINGGU/LIBUR NASIONAL TIDAK ADA PENGIRIMAN</p>\r\n', '40000', 71, 1, 'Daerah ASDASDASDASDASDASD', 'benihpanahmerah.jpg'),
(26, 5, 'Bibit Mangga Mahatir / Mangifera indica', '<p>&nbsp;<small>Bibit Mangga Mahatir / Mangifera indica</small></p>\r\n\r\n<p><small>Mangga Mahatir merupakan Tanaman Buah Mangga Asal Malaysia yang berukuran super besar dan belum ada yang mengalahkannya. Meskipun tergolong bibit tanaman baru akan tetapi sudah memikat hati para pecinta tanaman buah mangga. Bibit Mangga Mahatir termasuk jenis bibit tanaman mangga genjah karena relatif mudah dan cepat berbuah. Kami menyediakan bibit mangga mahatir unggul, asli, berkualitas dan bergaransi</small></p>\r\n', '10000', 41, 1, 'Jember, kec sumbersari, JL. karimata', 'mangga.jpg'),
(27, 5, ' Bibit Buah Durian Musangking Kaki 3 / Musang King', '<p><small>Bibit Buah Durian Musangking Kaki 3 / Musang King Kaki 3 Unggul</small></p>\r\n\r\n<p><small>Bibit Ready banyak silahkan Langsung diorder...!! Bagi penggemar durian atau duren, Durian Musang King adalah salah satu durian dengan rasa mantap yang banyak dicari. Teksturnya lembut dengan warna kuning keemasan, tidak ada serat sehingga legit ketika dimakan, kering dan sangat lembut. Rasanya manis dengan sedikit pahit sehingga benar-benar memanjakan Anda penikmat buah yang terkenal dengan sebutan raja buah ini. Nama : Durian Musang King Nama Ilmiah : Durio sp Asal Daerah : Negara Malaysia Asal Bibit : Hasil okulasi Ukuran bibit : 40-80cm dan 80-120cm Kebutuhan Sinar Matahari : Penyinaran sepanjang hari Berbuah : 3 &ndash; 5 tahun Ukuran jika tanam dalam pot : diameter lubang 60cm</small></p>\r\n', '10000', 20, 3, 'Jember, kec sumbersari, JL. karimata', 'durian.jpg'),
(28, 3, 'Sprayer / Semprotan Tekanan Yoto Tanaman, Pestisid', '<p><small>semprot multifungsi</small></p>\r\n', '147000', 87, 1, 'Jember, kec sumbersari, JL. karimata', 'semprot.jpg'),
(29, 3, 'Arit Babatan Baja | Sabit Alat Pertanian', '<p><small>arit ini merupakan arit yang sangat tajam dan tahan karat</small></p>\r\n', '55000', 63, 1, 'Jember, kec sumbersari, JL. karimata', 'arit.jpg'),
(30, 3, 'Dodos Sawit Kelapa Alat Pertanian Baja Per', '<p><small>&nbsp;Dodos Sawit Kelapa Alat Pertanian Baja Per</small></p>\r\n\r\n<p><small>Dodos Sawit Kelapa Alat pertanian Made Ini Indonesia Bilah Baja</small></p>\r\n', '45000', 45, 1, 'Jember, kec sumbersari, JL. karimata', 'alat.jpg'),
(31, 3, 'SEKOP CETOK STAINLEES OVAL TNG # ALAT TUKANG / BER', '<p><small>Cetok Stainlees Oval Besar Ukuran 6&quot; Berat 0.3 Kg</small></p>\r\n', '15000', 67, 1, 'jember, kec sumbersari, JL. karimata', 'sekop2.jpg'),
(32, 3, 'alat pertanian bercocok tanam alat pengukur ph tan', '<p><small>alat pengukur ph tanah</small></p>\r\n', '85000', 59, 1, 'Jember, kec sumbersari, JL. karimata', 'pengukur.jpg'),
(33, 4, 'PAKET PUPUK PERTANIAN PADI', '<p><small>ISI PAKET 1 BOTOL SUPERNASA 250 gram 1 BOTOL POCNASA 500 cc 1 BOTOL HORMONIK 100 cc</small></p>\r\n', '130000', 554, 1, 'Jember, kec sumbersari, JL. karimata', 'obat.jpg'),
(34, 4, 'EM 4 Pertanian 1 Liter / Pupuk Organik / Pupuk Fer', '<p><small>EM4 ini sangat cocok sekali digunkanan untuk Tanaman Perkebunan, seperti Tanaman Hortikultura, Padi dan Palawija. Hal ini dikarenakan EM4 ini sifatnya yang tidak beracun dan tidak pula menimbulkan pencemaran. Lalu apa saja manfaat menggunakan EM4 dan keuntungan yang dapat diperoleh dari penggunaan EM4 tersebut? Berikut penjelasannya. 1. Dapat memperbaiki sifat fisik, kimia dan biologi tanah. 2. Dapat meningkatkan jumlah produksi tanaman dan juga bisa menjaga kestabilan produksi hasil pertanian maupun perkebunan. 3. Dapat Memfermentasi bahan organik tanah dan mempercepat dekomposisi. 4. Dapat meningkatkan kualitas dan kuantitas dari hasil pertanian yang berwawasan dan ramah terhadap lingkungan. 5. Dapat meningkatkan keragaman mikroba yang sangat menguntungkan di dalam tanah. 6. Dapat meningkatkan nutrisi, dan juga senyawa organik yang ada didalam tanah. 7. Dapat meningkatkan Fixasi/Bintil Akar.</small></p>\r\n', '21500', 2, 1, 'Jember, kec sumbersari, JL. karimata', 'em4.jpg'),
(35, 4, 'PUPUK SUPER PHOSPATE SP 36 PETRO KIMIA GRESIK', '<p><small>Super 36 Nonton Subsidi Petro Kimia Gresik ,selain di gunakan untuk proses pertanian juga di gunakan proses microbiologi bagi pengolahan limbah industri ,min order 50 kg Pt.Ratul Ris Sejahtera Untuk informasi bisa tanyakan di chat atau diskusi.</small></p>\r\n', '90000', 6, 1, 'Jember, kec sumbersari, JL. karimata', 'pupuk2.png'),
(37, 4, 'Vitamin Nutrisi Akar Tanaman Groot Hormon Pertumbu', '<p><small>Cara penggunaan groot : oleskan cairan groot pada batang yang akan ditumbuhkan akarnya boleh dilakukan dengan cara dicelupkan dan tunggu hingga 5 menit tancapkan batang yang telah dioles/dicelup dengan Infarm groot pada tanah atau media tanam yg lain.</small></p>\r\n', '30000', 58, 1, 'Jember, kec sumbersari, JL. karimata', 'groot.png'),
(38, 4, 'Pupuk Tanaman Pertanian MPK Pak Tani', '<p><small>Aplikasi pupuk ini akan: 1. Mencegah rontok bunga dan buah 2. Merangsang pertumbuhan akar 3. Mengendalikan powdery mildew apabila dicampur dengan fungisida sistemik Aplikasi dengan cara ditabur, dikocor, disemprot, atau sistem hidroponik. Dengan dosis 2-5gram per liter air. Cocok digunakan untuk kentang, cabai, tomat, terong, semangka, melon, mangga, apel, jeruk, bawang merah, kacang panjang, kedelai, dll.</small></p>\r\n', '42000', 21, 1, 'Jember, kec sumbersari, JL. karimata', 'mpk.jpg'),
(39, 1, 'cabe merah keriting segar', '<p>cabe segar</p>\r\n', '30000', 56, 1, 'Jember, kec sumbersari, JL. karimata', 'cabe.jpg'),
(40, 1, 'Jagung Manis Organik ', '<p><small>jagung manis enak</small></p>\r\n', '10000', 23, 1, 'Jember, kec sumbersari, JL. karimata', 'jagung.jpg'),
(56, 1, 'Singkong/ Ketela Pohon Fresh Bersih', '<p><small>Ketela pohon/Singkong Fresh bersih (sudah dicuci) 1 paket berat (1000gr), langsung dari petani, daging empuk</small></p>\r\n', '10000', 78, 1, 'Jember, kec sumbersari, JL. karimata', 'singkong7.jpg'),
(59, 6, 'Obat Anti Stress Tanaman', '<p>Detail produk :<br />\r\n-Produk ini berfungsi untuk menstimulir akar, mengurangi stress yang diakibatkan perjalanan jauh dan stress akibat proses pemindahan tanaman dari tanah ke pot serta dapat menyuburkan akar.<br />\r\n-Berat bersih 100ml<br />\r\n<br />\r\nCara penggunaan :<br />\r\nCampurkan 5ml cairan B1 kedalam 1 liter air</p>\r\n', '28000', 89, 2, 'Jember,kec Sumbersari, JL Karimata', 'obat setres.png'),
(60, 6, 'Antracol Fungisida-Obat Jamur Tanaman 70WP-250gr', '<p>Antracol adalah fungisida yang memiliki kerja cepat dan telah diproduksi serta dipasarkan di Indonesia selama lebih dari 30 tahun. Antracol sangat cocok untuk mengontrol Phytophthora dan Alternaria untuk sayur-sayuran. Antracol adalah kegiatan residu yang sangat baik.</p>\r\n\r\n<p>Kelebihan Produk</p>\r\n\r\n<ol>\r\n	<li>Bekerja efektif di segala musim (musim kering dan hujan)</li>\r\n	<li>Cocok untuk diaplikasikan di dataran rendah atau tinggi</li>\r\n	<li>Dapat diandalkan, telah menjadi pemimpin pasar selama 30 tahun</li>\r\n	<li>Merupakan sumber elemen penting (zinc)</li>\r\n	<li>Dapat ditoleransi oleh beragam tanaman, juga untuk tanaman yang usianya masih muda (dalam tahap awal pertumbuhan).</li>\r\n</ol>\r\n\r\n<p><br />\r\nCara Pemakaian :<br />\r\nSemprotkan semua bagian tanaman yang terserang jamur. pada tanaman yang berlapis lapisan lilin seperti bawang, Frekwensi penyemprotan ditentukan berat ringannya serangan jamur dan iklim.<br />\r\n<br />\r\nDosis = 1 - 2 gr per 1 liter air</p>\r\n', '40000', 63, 1, 'Jember,kec Sumbersari, JL Karimata', 'obat tanaman.png'),
(61, 6, 'obat hama tanaman dursban 100ml basmi kutu putih u', '<p>Bahan aktif : Klorpirifos 200 g/l<br />\r\nInsektisida racun lambung, kontak dan pernafasan, berbentuk pekatan yang dapat diemulsikan, berwarna kekuningan, mengendalikan hama-hama pada tanaman bawang merah, cabai, jagung, kacang hijau, kacang tanah, kakao, kedelai, kelapa, kelapa sawit, kubis, lada, petsi, tembakau, tomat dan wortel</p>\r\n', '22000', 52, 3, 'Jember,kec Sumbersari, JL Karimata', 'obat hama tanaman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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

INSERT INTO `transaksi` (`id_transaksi`, `user_id`, `jenis_pembayaran`, `jenis_pengiriman`, `tanggal_transaksi`, `tabungan`, `total`, `status`, `resi`) VALUES
(21, 8, 'cash', 'kurir', '2021-02-04', 0, 217000, 'gagal', '-'),
(22, 8, 'cash', 'cod', '2021-02-04', 0, 37000, 'gagal', '-'),
(23, 8, 'cash', 'cod', '2021-02-04', 0, 37000, 'gagal', '-'),
(24, 8, 'tabungan', 'cod', '2021-02-04', 0, 37000, 'gagal', '-'),
(25, 8, 'cash', 'kurir', '2021-02-04', 0, 57000, 'gagal', '-'),
(26, 8, 'cash', 'cod', '2021-02-05', 0, 15000, 'gagal', '-'),
(27, 8, 'cash', 'kurir', '2021-02-06', 0, 35000, 'gagal', '-'),
(28, 8, 'cash', 'kurir', '2021-02-06', 0, 75000, 'menunggu kirim', '-'),
(29, 8, 'cash', 'kurir', '2021-02-06', 0, 35000, 'menunggu kirim', '-'),
(30, 8, 'cash', 'cod', '2021-02-06', 0, 15000, 'menunggu kirim', '-'),
(31, 8, 'tabungan', 'cod', '2021-02-06', 0, 15000, 'gagal', '-'),
(32, 8, 'cash', 'cod', '2021-02-06', 0, 15000, 'gagal', '-'),
(33, 8, 'cash', 'cod', '2021-02-06', 0, 35000, 'menunggu kirim', '-'),
(34, 8, 'cash', 'cod', '2021-02-06', 0, 30000, 'menunggu kirim', '-'),
(35, 8, 'cash', 'cod', '2021-02-06', 0, 30000, 'belum bayar', '-'),
(36, 8, 'cash', 'cod', '2021-02-06', 0, 40000, 'belum bayar', '-'),
(37, 8, 'cash', 'kurir', '2021-02-07', 0, 60000, 'belum bayar', '-'),
(38, 8, 'tabungan', 'kurir', '2021-02-07', 0, 60000, 'belum bayar', '-'),
(39, 8, 'cash', 'cod', '2021-02-07', 0, 57000, 'belum bayar', '-'),
(40, 8, 'cash', 'kurir', '2021-02-07', 0, 77000, 'belum bayar', '-'),
(41, 8, 'cash', 'kurir', '2021-02-07', 0, 77000, 'belum bayar', '-'),
(42, 8, 'cash', 'cod', '2021-02-08', 0, 57000, 'belum bayar', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_foto` text DEFAULT NULL,
  `user_status` varchar(20) DEFAULT NULL,
  `user_alamat` text NOT NULL,
  `user_telepon` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_nama`, `user_password`, `user_foto`, `user_status`, `user_alamat`, `user_telepon`) VALUES
(1, 'rahmad@gmail.com', 'Rahmat Syah Jaya', '6ad14ba9986e3615423dfca256d04e3f', '186312963_Kevin-Micnick.jpg', 'online', '', '082334678123'),
(2, 'junaidi@gmail.com', 'Junaidi', '6ad14ba9986e3615423dfca256d04e3f', '410522440_poco.jpg', 'offline', '', '087321657843'),
(3, 'wendy@gmail.com', 'rajih kharissuha', '6ad14ba9986e3615423dfca256d04e3f', '1504007626_9264_1573545192866144_7821235428126859557_n.jpg', 'sibuk', '', '082334678543'),
(6, 'malasngoding@gmail.com', 'Malas Ngoding', '6ad14ba9986e3615423dfca256d04e3f', '989315468_avatar1.png', 'online', '', '087321657898'),
(8, 'rajih@gmail.com', 'figo fajar', '97ba9b79bb22f40291c322af338e2adb', '1938755685_14412041_59881acf-9d8a-4816-a0e4-f5607a946395_1280_1280.jpg', 'offline', 'perum muktisari rk 2', '081444666788'),
(12, 'rosyid1@gmail.com', 'rosyid', 'e0b7063561fd14b5bd0cd9be137143e7', '1513403028_groot.png', 'online', '', '082336277667'),
(13, 'figofajar@gmail.com', 'figo fajar yulianto', '36897575779e7f74e16c5dde8fa4c9a3', '1560489022_sekop2.jpg', 'online', '', '082346123987'),
(14, 'bayu@gmail.com', 'figo fajar jamed rosyid', '202cb962ac59075b964b07152d234b70', '1474369717_profile picture zoom.png', 'online', '', '085349672357'),
(15, 'rosyid@gmail.com', 'Rosyid', '202cb962ac59075b964b07152d234b70', '', 'online', '', '086135976543'),
(16, 'arinmita7@gmail.com', 'mita unziyah', 'eec880aeca50aa8340918e233d80a17d', '', 'online', '', '082223058576'),
(17, 'algasaputra257@gmail.com', 'Alga Saputra', '924c0c3500a84ad9085b7e153ea890c0', '', 'online', '', '082235301951'),
(18, 'joni122@gmail.com', 'Joni', '873a56e82e3d8999f44cdd6eb8ae552f', '', 'online', '', '08155564899'),
(19, 'rajihkharissuha120701@gmail.com', 'asdasdasdasd', '97ba9b79bb22f40291c322af338e2adb', '', 'online', '', '082222222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buka_toko`
--
ALTER TABLE `buka_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `bukti_transaksi`
--
ALTER TABLE `bukti_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id_user` (`user_id`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`online_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buka_toko`
--
ALTER TABLE `buka_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bukti_transaksi`
--
ALTER TABLE `bukti_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

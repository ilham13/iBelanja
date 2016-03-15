-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 05:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ibelanja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id_orders` int(5) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_session` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_orders` date NOT NULL,
  `jam_orders` time NOT NULL,
  `stock_orders` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_orders`, `id_produk`, `id_session`, `jumlah`, `tgl_orders`, `jam_orders`, `stock_orders`) VALUES
(1, 14, '8ag8qg7hovf0eccgsb20jcqug4', 1, '2016-03-05', '18:01:25', 5),
(2, 16, '8ag8qg7hovf0eccgsb20jcqug4', 3, '2016-03-05', '20:47:06', 5),
(3, 15, '8ag8qg7hovf0eccgsb20jcqug4', 1, '2016-03-05', '20:48:41', 5),
(4, 17, '8ag8qg7hovf0eccgsb20jcqug4', 1, '2016-03-05', '20:59:10', 5),
(5, 12, '8ag8qg7hovf0eccgsb20jcqug4', 1, '2016-03-05', '21:15:54', 19),
(6, 18, 'aujbke9mc9hrht7e6s6vn674f1', 1, '2016-03-05', '21:27:51', 7),
(7, 15, 'aujbke9mc9hrht7e6s6vn674f1', 2, '2016-03-05', '22:14:22', 5),
(8, 14, 'aujbke9mc9hrht7e6s6vn674f1', 1, '2016-03-05', '22:15:45', 5),
(9, 17, 'u05s9v1opt2dao3qh7pmp5md70', 1, '2016-03-05', '22:27:40', 5),
(10, 12, 'kviifsn942kllj71c6c1v4fim5', 1, '2016-03-05', '22:45:13', 19),
(11, 13, 'kviifsn942kllj71c6c1v4fim5', 1, '2016-03-05', '22:56:48', 3),
(13, 14, 'm56aksndugn65n3g5eqpjmk7j2', 2, '2016-03-06', '09:29:14', 5),
(15, 15, 'm56aksndugn65n3g5eqpjmk7j2', 5, '2016-03-06', '10:17:40', 5),
(20, 18, 'a869n17rovnidtng0o7f309ga7', 1, '2016-03-06', '18:16:45', 7),
(21, 12, 'a869n17rovnidtng0o7f309ga7', 1, '2016-03-06', '18:16:52', 19),
(22, 15, 'a869n17rovnidtng0o7f309ga7', 1, '2016-03-06', '18:17:01', 5),
(23, 14, 'a869n17rovnidtng0o7f309ga7', 1, '2016-03-06', '18:17:05', 5),
(24, 12, 'aaq1ggs0ng0thlleremurovl85', 3, '2016-03-07', '16:05:54', 19),
(25, 14, 'aaq1ggs0ng0thlleremurovl85', 1, '2016-03-07', '16:06:02', 5),
(26, 18, 'aaq1ggs0ng0thlleremurovl85', 1, '2016-03-07', '16:06:14', 7),
(27, 16, 'hrgh5n1ujq8704mvl07n4c7ok7', 1, '2016-03-07', '18:34:12', 5),
(28, 14, 'hrgh5n1ujq8704mvl07n4c7ok7', 1, '2016-03-07', '18:34:24', 5),
(29, 16, 'a42e3ncr6gt7ld3pd4n28tsij7', 1, '2016-03-07', '21:55:16', 5),
(30, 14, 'a42e3ncr6gt7ld3pd4n28tsij7', 1, '2016-03-07', '21:55:24', 5),
(31, 16, 'qk5stv1relfgt590n5pvpohn55', 1, '2016-03-09', '10:15:12', 5),
(32, 12, 'cvtfu2f5hkkpien3m2ur45msf7', 2, '2016-03-10', '23:16:52', 19),
(33, 17, 'cvtfu2f5hkkpien3m2ur45msf7', 3, '2016-03-10', '23:17:08', 5),
(35, 18, 'tkg0c60lm1vt5kactvs1jobfi7', 2, '2016-03-11', '23:45:34', 7),
(36, 13, '71ebs5ui1psbfgv2s7a6bnmu51', 1, '2016-03-12', '06:05:49', 3),
(37, 19, '10vdl3ncbo189ik60cea0j7723', 1, '2016-03-12', '11:34:53', 2),
(40, 17, '10vdl3ncbo189ik60cea0j7723', 1, '2016-03-12', '16:57:56', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
`id_kategori` int(10) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `kategori`) VALUES
(1, 'sepatu gunung'),
(2, 'carrier'),
(3, 'daypack'),
(4, 'accessories'),
(5, 'tenda'),
(6, 'jam outdoor'),
(7, 'Kemeja'),
(8, 'sendal outdoor'),
(9, 'jaket gunung'),
(10, 'celana panjang'),
(21, 'kaos'),
(22, 'slempang');

-- --------------------------------------------------------

--
-- Table structure for table `ongkos_kirim`
--

CREATE TABLE IF NOT EXISTS `ongkos_kirim` (
`id_kota` int(5) NOT NULL,
  `id_perusahaan` int(5) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `ongkir` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkos_kirim`
--

INSERT INTO `ongkos_kirim` (`id_kota`, `id_perusahaan`, `nama_kota`, `ongkir`) VALUES
(1, 1, 'Jakarta', 15000),
(2, 1, 'Bogor', 10000),
(3, 1, 'bandung', 24000),
(4, 1, 'jogja', 22000),
(5, 2, 'jakarta', 17000),
(6, 2, 'bandung', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id_order` int(5) NOT NULL,
  `nama_costumer` varchar(70) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_order` varchar(30) NOT NULL,
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `nama_costumer`, `alamat`, `kode_pos`, `telepon`, `email`, `status_order`, `tgl_order`, `jam_order`) VALUES
(1, 'ilham', '', 0, '', '', '', '2016-03-09', '11:06:07'),
(2, 'ilham', 'kp tugu selatan rt/rw 002/006 kec cisarua kab.bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '11:07:07'),
(3, 'chester', 'bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '14:09:29'),
(4, 'chester', '', 0, '', '', '', '2016-03-09', '15:29:12'),
(5, '', '', 0, '', '', '', '2016-03-09', '15:29:21'),
(6, '', '', 0, '', '', '', '2016-03-09', '15:31:59'),
(7, '', '', 0, '', '', '', '2016-03-09', '15:32:22'),
(8, '', '', 0, '', '', '', '2016-03-09', '15:32:25'),
(9, 'ilham', 'Jl raya puncak <br>\r\nKec Cisarua Kab. Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '15:33:20'),
(10, 'ilham', 'Jl raya puncak <br>\r\nKec Cisarua Kab. Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '15:38:09'),
(11, 'ilham', 'Jl raya puncak <br>\r\nKec Cisarua Kab. Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '15:38:19'),
(12, '', '', 0, '', '', '', '2016-03-09', '15:40:59'),
(13, '', '', 0, '', '', '', '2016-03-09', '15:44:48'),
(14, '', '', 0, '', '', '', '2016-03-09', '16:09:50'),
(15, '', '', 0, '', '', '', '2016-03-09', '16:10:02'),
(16, '', '', 0, '', '', '', '2016-03-09', '16:10:45'),
(17, 'ilham', 'Jl Raya Puncak <br>\r\nKec. Cisarua Kab. Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '16:11:55'),
(18, 'ilham', 'Jl Raya Puncak <br>\r\nKec. Cisarua Kab. Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '16:18:44'),
(19, 'ilham', 'Jl Raya Puncak <br>\r\nKec. Cisarua Kab. Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '16:22:12'),
(20, 'ILHAM', '', 0, '', '', '', '2016-03-09', '16:22:50'),
(21, '', '', 0, '', '', '', '2016-03-09', '16:26:05'),
(22, 'ilham', 'jl raya puncak <b>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '17:48:15'),
(23, 'ilham', 'jl raya puncak <b>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '17:48:55'),
(24, 'ilham', 'jl raya puncak <b>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-09', '17:49:02'),
(25, '', '', 0, '', '', '', '2016-03-09', '17:53:25'),
(26, 'ilham', 'Jl raya puncak, No. 55 <br>\r\nKec. Cisarua Kab. Bogor <br>\r\nRT/RW 002/006', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-10', '17:09:43'),
(27, '', '', 0, '', '', '', '2016-03-10', '19:18:04'),
(28, '', '', 0, '', '', '', '2016-03-10', '19:24:17'),
(29, 'ilham', 'jl raya puncak <br>\r\ncisarua-bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-10', '19:24:54'),
(30, 'ilham', 'jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '0000-00-00', '00:00:00'),
(31, 'ilham', 'jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-10', '19:34:50'),
(32, 'ilham', 'jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-10', '19:35:43'),
(33, 'ilham', 'jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-10', '19:36:55'),
(34, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:30:56'),
(35, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:31:40'),
(36, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:32:59'),
(37, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:35:20'),
(38, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:36:15'),
(39, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:36:31'),
(40, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:37:37'),
(41, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:42:16'),
(42, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:43:04'),
(43, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:43:19'),
(44, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:44:01'),
(45, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:44:34'),
(46, 'ilham', 'Jl raya puncak <br>\r\nCisarua-Bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-11', '10:44:54'),
(47, '', '', 0, '', '', '', '2016-03-11', '10:47:21'),
(48, '', '', 0, '', '', '', '2016-03-11', '10:48:23'),
(49, '', '', 0, '', '', '', '2016-03-11', '10:48:43'),
(50, '', '', 0, '', '', '', '2016-03-11', '10:49:02'),
(51, '', '', 0, '', '', '', '2016-03-11', '10:49:35'),
(52, '', '', 0, '', '', '', '2016-03-11', '10:51:32'),
(53, '', '', 0, '', '', '', '2016-03-11', '10:52:03'),
(54, '', '', 0, '', '', '', '2016-03-11', '10:53:34'),
(55, '', '', 0, '', '', '', '2016-03-11', '10:55:45'),
(56, '', '', 0, '', '', '', '2016-03-11', '10:56:16'),
(57, '', '', 0, '', '', '', '2016-03-11', '10:56:48'),
(58, '', '', 0, '', '', '', '2016-03-11', '10:57:46'),
(59, '', '', 0, '', '', '', '2016-03-11', '10:58:18'),
(60, '', '', 0, '', '', '', '2016-03-11', '10:58:53'),
(61, '', '', 0, '', '', '', '2016-03-11', '10:59:57'),
(62, '', '', 0, '', '', '', '2016-03-11', '11:00:32'),
(63, '', '', 0, '', '', '', '2016-03-11', '11:01:06'),
(64, '', '', 0, '', '', '', '2016-03-11', '11:06:53'),
(65, '', '', 0, '', '', '', '2016-03-11', '11:14:31'),
(66, '', '', 0, '', '', '', '2016-03-11', '11:22:50'),
(67, '', '', 0, '', '', '', '2016-03-11', '11:23:05'),
(68, '', '', 0, '', '', '', '2016-03-11', '11:23:19'),
(69, '', '', 0, '', '', '', '2016-03-11', '11:24:26'),
(70, '', '', 0, '', '', '', '2016-03-12', '17:44:45'),
(71, '', '', 0, '', '', '', '2016-03-12', '17:46:49'),
(72, 'ff', '', 0, '', '', '', '2016-03-12', '17:51:02'),
(73, '', '', 0, '', '', '', '2016-03-12', '21:19:22'),
(74, 'ilham', 'Jl Raya Puncak<br>\r\nCisarua-Bogor', 0, '08974618352', 'chester.kautsar@gmai', '', '2016-03-13', '10:32:38'),
(75, 'ilham', 'jl raya puncak <br>\r\ncisarua - bogor', 0, '08975618352', 'chester.kautsar@gmai', '', '2016-03-13', '19:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_orders`, `id_produk`, `jumlah`) VALUES
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 14, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(0, 16, 1),
(1, 16, 1),
(2, 16, 1),
(3, 17, 3),
(3, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(0, 17, 3),
(0, 18, 1),
(4, 17, 3),
(4, 18, 1),
(5, 17, 3),
(5, 18, 1),
(6, 17, 3),
(6, 18, 1),
(7, 17, 3),
(7, 18, 1),
(8, 17, 3),
(8, 18, 1),
(9, 17, 3),
(9, 18, 1),
(10, 17, 3),
(10, 18, 1),
(11, 17, 3),
(11, 18, 1),
(12, 17, 3),
(12, 18, 1),
(13, 17, 3),
(13, 18, 1),
(14, 17, 3),
(14, 18, 1),
(15, 17, 3),
(15, 18, 1),
(16, 17, 3),
(16, 18, 1),
(17, 12, 1),
(17, 15, 3),
(20, 15, 1),
(22, 18, 2),
(22, 14, 3),
(22, 15, 1),
(25, 17, 1),
(25, 15, 1),
(26, 16, 1),
(27, 12, 1),
(29, 15, 1),
(30, 12, 1),
(33, 15, 1),
(34, 16, 1),
(70, 5, 1),
(71, 18, 1),
(73, 19, 1),
(74, 14, 1),
(74, 17, 3),
(75, 17, 1),
(75, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
`id_perusahaan` int(5) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_perusahaan`, `nama_perusahaan`, `gambar`) VALUES
(1, 'jne', ''),
(2, 'tiki', ''),
(3, 'kantor_pos', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `diskon` int(3) NOT NULL,
  `stok` int(3) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `tgl_posting` date NOT NULL,
  `berat` decimal(5,2) unsigned NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `diskon`, `stok`, `deskripsi`, `gambar`, `harga`, `slug`, `tgl_posting`, `berat`) VALUES
(5, 'SNTA 471 Brown Orange', 8, 15, 5, 'sepatu buatan lokal!', '48471-brown orange.jpg', 299000, 'snta-471-brown-orange', '2016-03-11', '1.00'),
(6, 'SNTA 471 Brown Yellow', 2, 15, 3, 'sepatu buatan lokal!', '65471-brown yellow.jpg', 299000, 'snta-471-brown-yellow', '2016-03-11', '1.00'),
(11, 'SNTA 466 Grey', 6, 12, 0, 'sepatu lokal berkualitas nih gan.', '93466-grey.jpg', 299000, 'snta-466-grey', '2016-03-11', '1.00'),
(12, 'SNTA 463 Grey Green', 21, 5, 19, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque velit natus nulla culpa corrupti sit dolores mollitia provident quos doloribus, eius aspernatur quisquam eaque, similique porro expedita maiores veniam dolor. ', '75463-grey green.jpg', 289000, 'snta-463-grey-green', '2016-03-11', '1.00'),
(13, 'SNTA 465 Brown Orange', 22, 5, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque velit natus nulla culpa corrupti sit dolores mollitia provident quos doloribus, eius aspernatur quisquam eaque, similique porro expedita maiores veniam dolor.', '722.jpg', 299000, 'snta-465-brown-orange', '2016-03-11', '1.00'),
(14, 'SNTA 464 Green Orange', 1, 10, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel reprehenderit quae libero fuga aspernatur, quisquam reiciendis ad quas nam ut, porro aliquam eaque veniam doloribus, cupiditate iure et consectetur quos.', '60464-green orange.jpg', 289000, 'snta-464-green-orange', '2016-03-02', '1.00'),
(15, 'SNTA 468 Brown Yellow', 1, 15, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel reprehenderit quae libero fuga aspernatur, quisquam reiciendis ad quas nam ut, porro aliquam eaque veniam doloribus, cupiditate iure et consectetur quos.', '12468-brown yellow.jpg', 299000, 'snta-468-brown-yellow', '2016-03-02', '1.00'),
(16, 'SNTA 468 Beige', 1, 10, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel reprehenderit quae libero fuga aspernatur, quisquam reiciendis ad quas nam ut, porro aliquam eaque veniam doloribus, cupiditate iure et consectetur quos.', '62468-beige.jpg', 299000, 'snta-468-beige', '2016-03-02', '1.00'),
(17, 'SNTA 471 Grey', 1, 0, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel reprehenderit quae libero fuga aspernatur, quisquam reiciendis ad quas nam ut, porro aliquam eaque veniam doloribus, cupiditate iure et consectetur quos.', '42471-grey.jpg', 299000, 'snta-471-grey', '2016-03-03', '1.00'),
(18, 'SNTA 466 Beige', 1, 10, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel reprehenderit quae libero fuga aspernatur, quisquam reiciendis ad quas nam ut, porro aliquam eaque veniam doloribus, cupiditate iure et consectetur quos.', '66466-beige.jpg', 289000, 'snta-466-beige', '2016-03-02', '1.00'),
(19, 'SNTA 464 Grey Green', 1, 10, 2, 'Spesifikasi : <br>\r\n- Outsole : TPR (Thermo Plastic Rubber)<br>\r\nâ€“ Atasan : PU Lether<br>\r\nâ€“ Mesh : Polyester<br>\r\nâ€“ Warna : Brown/Yellow<br>\r\nâ€“ Ukuran : 40,43', '14.jpg', 299000, 'snta-464-grey-green', '2016-03-11', '1.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
 ADD PRIMARY KEY (`id_kota`), ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
 ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id_orders` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
MODIFY `id_kota` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
MODIFY `id_perusahaan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
ADD CONSTRAINT `ongkos_kirim_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `pengiriman` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

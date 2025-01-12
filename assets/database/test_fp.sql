-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_fp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('K0001', 'L QUEENLY'),
('K0002', 'L MTH AKSESORIS (IM)'),
('K0003', 'L MTH TABUNG (LK)'),
('K0004', 'SP MTH SPAREPART (LK)'),
('K0005', 'CI MTH TINTA LAIN (IM)'),
('K0006', 'L MTH AKSESORIS (LK)'),
('K0007', 'S MTH STEMPEL (IM)');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(50) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `kategori_id` varchar(50) NOT NULL,
  `status_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`) VALUES
(6, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 'K0001', 'S0001'),
(9, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 'K0002', 'S0001'),
(11, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 'K0002', 'S0001'),
(12, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 'K0002', 'S0002'),
(15, 'ALUMUNIUM FOIL HDPE\\/PE BULAT 23mm IM', 12500, 'K0002', 'S0001'),
(17, 'ALUMUNIUM FOIL HDPE\\/PE BULAT 30mm IM', 1000, 'K0002', 'S0001'),
(18, 'ALUMUNIUM FOIL HDPE\\/PE SHEET 250mm IM', 13000, 'K0002', 'S0002'),
(19, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 'K0002', 'S0002'),
(22, 'ARM PENDEK MODEL U', 13000, 'K0002', 'S0001'),
(23, 'ARM SUPPORT KECIL', 13000, 'K0003', 'S0002'),
(24, 'ARM SUPPORT KOTAK PUTIH', 13000, 'K0002', 'S0002'),
(26, 'ARM SUPPORT PENDEK POLOS', 13000, 'K0003', 'S0001'),
(27, 'ARM SUPPORT S IM', 1000, 'K0002', 'S0002'),
(28, 'ARM SUPPORT T (IMPORT)', 13000, 'K0002', 'S0001'),
(29, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 'K0003', 'S0001'),
(50, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 'K0002', 'S0002'),
(56, 'BODY PRINTER CANON IP2770', 500, 'K0004', 'S0001'),
(58, 'BODY PRINTER T13X', 15000, 'K0004', 'S0001'),
(59, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800\\/R800 - 4180 IM (T054920)', 10000, 'K0005', 'S0001'),
(60, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800\\/R800\\/R1900\\/R2000 - 4120 IM (T054220)', 10000, 'K0005', 'S0002'),
(61, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800\\/R800\\/R1900\\/R2000\\/IX7000\\/MG6170 - 4100 IM (T054020)', 1500, 'K0005', 'S0001'),
(62, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 'K0005', 'S0002'),
(63, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 'K0005', 'S0002'),
(64, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800\\/R800\\/R1900\\/R2000 - 4140 IM (T054320)', 1000, 'K0005', 'S0001'),
(65, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800\\/R800\\/R1900\\/R2000 - 3503 IM (T054820)', 1500, 'K0005', 'S0002'),
(66, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900\\/R2000 IM - 4190 (T087920)', 1500, 'K0005', 'S0001'),
(67, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800\\/R800\\/R1900\\/R2000 - 4170 IM (T054720)\",\"kategori\":\"CI MTH TINTA LAIN (IM)', 1000, 'K0005', 'S0002'),
(68, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800\\/R800\\/R1900\\/R2000 - 4160 IM (T054420)', 1500, 'K0005', 'S0002'),
(70, 'BOTOL KOTAK 100ML LK', 1000, 'K0006', 'S0001'),
(72, 'BOTOL 10ML IM', 1000, 'K0007', 'S0002');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` varchar(50) NOT NULL,
  `nama_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('S0001', 'Bisa Dijual'),
('S0002', 'Tidak Bisa Dijual');

--
-- Indexes for dumped tables
--

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
  ADD KEY `produk_kategori` (`kategori_id`),
  ADD KEY `produk_status` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

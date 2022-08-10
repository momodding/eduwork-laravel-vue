-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 03:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `jenis_obat` text NOT NULL,
  `id_produsen` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `jenis_obat`, `id_produsen`, `stock`, `exp_date`) VALUES
(1, 'Amoxicilin', 'Tablet', 1, 2000, '2025-08-11'),
(2, 'Paracetamol', 'Puyer', 3, 5000, '2025-08-19'),
(3, 'Asam Mefanamat', 'Tablet', 3, 2000, '2023-08-11'),
(4, 'Ampicilin', 'Tablet', 5, 5000, '2026-08-29'),
(5, 'Asam Salisilat', 'Tablet', 6, 4500, '2024-07-02'),
(6, 'Asam Pipemidat', 'Cair', 1, 3200, '2023-08-21'),
(7, 'Daktarin', 'Cair', 7, 300, '2024-06-22'),
(8, 'Feminax', 'Tablet', 3, 5000, '2026-08-29'),
(9, 'Gentamicin', 'Tablet', 5, 4000, '2026-08-29'),
(10, 'Metamfetamin', 'Tablet', 8, 2300, '2026-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tgl_jual` datetime NOT NULL,
  `pasien_name` varchar(32) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tgl_jual`, `pasien_name`, `harga`, `id_resep`) VALUES
(1, '2022-08-08 18:53:21', 'Pasien Test', 20000, 1),
(2, '2022-07-01 18:09:21', 'Pasien Test 2', 100000, 2),
(3, '2022-07-10 18:53:21', 'Pasien Test 3', 150000, 3),
(4, '2022-08-10 18:53:21', 'Pasien Coba 2', 12000, 4),
(5, '2022-06-21 17:53:21', 'Pasien Test 4', 13000, 5),
(6, '2022-03-12 19:53:21', 'Pasien Test 5', 30000, 6),
(7, '2022-08-08 18:53:21', 'Pasien Test 6', 350000, 7),
(8, '2022-08-01 22:53:21', 'Pasien coba 3', 230000, 8),
(9, '2022-02-05 18:53:21', 'Pasien Test 7', 25000, 9),
(10, '2022-08-02 15:53:21', 'Pasien Test 8', 10000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(64) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kontak_telp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id`, `nama_perusahaan`, `alamat`, `kontak_telp`) VALUES
(1, 'Produsen Obat Satu', 'Jakarta', '08122222112'),
(3, 'Perusahaan Produsen 2', 'Bekasi', '0823121221'),
(4, 'Perusahaan Produsen 2', 'Bekasi', '0823121221'),
(5, 'Prusahaan lima', 'Jakarta', '08122222112'),
(6, 'Perusahaan enam', 'Bogor', '0892131312'),
(7, 'Perusahaan tujuh', 'Surabaya', '0821213121'),
(8, 'Perusahaan delapan', 'Bekasi', '0896281112'),
(9, 'Perusahaan sembilan', 'Jakarta', '0865767122'),
(10, 'Perusahaan sepuluh', 'Semarang', '0812372715'),
(11, 'Perusahaan Sebelas', 'Jember', '0827667112'),
(12, 'Perusahaan Dua Belas', 'Makassar', '0866255181');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `tgl_resep` date NOT NULL,
  `id_obat` int(11) NOT NULL,
  `dosis` varchar(32) NOT NULL,
  `dokter_name` varchar(32) DEFAULT NULL,
  `pasien_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `tgl_resep`, `id_obat`, `dosis`, `dokter_name`, `pasien_name`) VALUES
(1, '2022-08-09', 1, '500mg', 'Dr. Test', 'Pasien Test'),
(2, '2022-08-09', 2, '500mg', 'Dr. Coba', 'Pasien Test'),
(3, '2022-08-10', 5, '250mg', 'Dr. Test 2', 'Pasien Test 2'),
(4, '2022-04-11', 6, '500mg', 'Dr. Test 2', 'Pasien Test 3'),
(5, '2022-07-06', 4, '350mg', 'Dr. Coba 2', 'Pasien Test 4'),
(6, '2022-06-04', 2, '500mg', 'Dr. Coba 3', 'Pasien Test 5'),
(7, '2022-04-10', 10, '250mg', 'Dr. Test 4', 'Pasien Test 6'),
(8, '2022-08-11', 2, '250mg', 'Dr. Test 5', 'Pasien Test 7'),
(9, '2022-05-09', 7, '300mg', 'Dr. Test 6', 'Pasien Test 8'),
(10, '2022-08-09', 8, '500mg', 'Dr. Test 7', 'Pasien Test 9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produsen` (`id_produsen`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resep` (`id_resep`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_produsen` FOREIGN KEY (`id_produsen`) REFERENCES `produsen` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_resep` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

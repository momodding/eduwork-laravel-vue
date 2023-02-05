-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 02:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `id_obat` varchar(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `harga`) VALUES
('M001', 'Paracetamol', 50, 1850),
('M002', 'Paratusin', 34, 15500),
('M003', 'Antangin', 12, 12000),
('M004', 'Demacolin', 57, 6643),
('M005', 'Tolak Angin', 45, 39300),
('M006', 'Antimo', 18, 63076),
('M007', 'Listerine', 15, 57517),
('M008', 'Alcohol', 84, 11000),
('M009', 'Konvermex', 46, 18000),
('M010', 'Bodrex', 72, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `jk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `umur`, `alamat`, `jk`) VALUES
('P001', 'Agus', 56, 'Jl Anggrek no 44', 1),
('P002', 'Budi', 35, 'Jl Mawar no 81', 1),
('P003', 'Citra', 29, 'Jl Bugis no 3', 2),
('P004', 'Dian', 15, 'Jl Merdeka no 1', 2),
('P005', 'Eko', 40, 'Jl Bougenvile no 33', 1),
('P006', 'Fina', 18, 'Jl Sulawesi no 123 Yogyakarta', 2),
('P007', 'Gani', 25, 'Jl Proklamasi No 1 Jakarta', 1),
('P008', 'Hani', 26, 'Jl Pahlawan no 2 Surabaya', 2),
('P009', 'Ian', 36, 'Jl Nakula no 20 Bekasi', 1),
('P010', 'Joko', 40, 'Jl Singa no 14 Sulawesi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` varchar(11) DEFAULT NULL,
  `id_pelanggan` varchar(11) DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `total_transaksi`, `total_bayar`, `total_kembalian`) VALUES
('T001', 'P005', '2023-02-01', 74572, 80000, 5428),
('T002', 'P001', '2023-02-02', 11000, 20000, 9000),
('T003', 'P005', '2023-02-03', 145929, 146000, 71),
('T004', 'P003', '2023-02-04', 360000, 360000, 0),
('T005', 'P006', '2023-02-04', 946140, 1000000, 53860);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_transaksi_detail` varchar(11) DEFAULT NULL,
  `id_transaksi` varchar(11) DEFAULT NULL,
  `id_obat` varchar(11) DEFAULT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_transaksi_detail`, `id_transaksi`, `id_obat`, `jumlah_obat`, `harga_obat`, `total_harga`) VALUES
('TR001', 'T001', 'M003', 2, 12000, 24000),
('TR002', 'T001', 'M004', 4, 6643, 26572),
('TR003', 'T001', 'M010', 3, 8000, 24000),
('TR004', 'T002', 'M008', 1, 11000, 11000),
('TR005', 'T003', 'M001', 6, 1850, 11100),
('TR006', 'T003', 'M002', 4, 15500, 62000),
('TR007', 'T003', 'M004', 3, 6643, 19929),
('TR008', 'T003', 'M010', 8, 8000, 64000),
('TR009', 'T004', 'M009', 20, 18000, 360000),
('TR010', 'T005', 'M006', 15, 63076, 946140);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_penjualan` FOREIGN KEY (`id_transaksi`) REFERENCES `penjualan` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

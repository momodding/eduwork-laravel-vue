-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 08:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `kd_satuan` varchar(6) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL COMMENT 'nama jenis obat',
  `ketersediaan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `kd_satuan`, `nama_satuan`, `ketersediaan`) VALUES
(1, 'BIO01', 'Tablet_paracetamol', 'ada'),
(2, 'NEO01', 'Tablet', 'Tidak ada'),
(3, 'PAN01', 'Tablet', 'ada'),
(4, 'SANGO0', 'Sirop', 'ada'),
(5, 'SANG01', 'Sirop', 'ada'),
(6, 'PAN01', 'Tablet', 'ada'),
(7, 'BODX01', 'Kapsul', 'Tidak ada'),
(8, 'MYLTA4', 'Sirop', 'ada'),
(9, 'SLPS01', 'Plester', 'ada'),
(10, 'BETA01', 'Cair', 'Tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `pembuat_obat` varchar(30) NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `id_obat`, `nama_obat`, `pembuat_obat`, `stok_obat`, `tgl_kadaluwarsa`) VALUES
(1, 0, 'biogesic', 'Anwar', 50, '2023-01-01'),
(2, 2, 'panadol', 'Banu', 50, '2023-01-03'),
(3, 3, 'neozep', 'Nina', 45, '2023-01-12'),
(4, 4, 'Mylanta', 'Risma', 60, '2023-02-08'),
(5, 5, 'Sangobion', 'Dani', 120, '2023-03-01'),
(6, 6, 'Bodrex', 'Valdi', 100, '2022-02-09'),
(7, 7, 'Combantrin', 'Reza', 90, '2023-01-28'),
(8, 8, 'Amoxcilin', 'Vina', 75, '2022-05-04'),
(9, 9, 'Salonpas', 'Sari', 60, '2024-06-12'),
(10, 10, 'Mixagrip', 'Agus', 45, '2023-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `id_pasien`, `nama_pasien`, `tanggal_lahir_pasien`) VALUES
(1, 1, 'hilda', '2010-08-02'),
(2, 2, 'zilong', '2013-11-06'),
(3, 3, 'vale', '2012-08-14'),
(4, 4, 'argus', '2013-02-07'),
(5, 5, 'miya', '2022-03-11'),
(6, 6, 'layla', '2013-12-20'),
(7, 7, 'thamuz', '2014-07-09'),
(8, 8, 'lancelot', '2013-09-12'),
(9, 9, 'freya', '2022-08-31'),
(10, 10, 'selena', '2017-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_namaobat` (`id_obat`),
  ADD KEY `fk_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_namaobat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

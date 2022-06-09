-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 06:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `umur` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` char(15) NOT NULL,
  `jenis_asuransi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `jenis_kelamin`, `umur`, `tanggal_lahir`, `alamat`, `no_telepon`, `jenis_asuransi`) VALUES
(1, 'Andre Leonardo Judah', 'Laki_Laki', 34, '1987-08-12', 'Jakarta Timur', '081280492727', 'BPJS Kesehatan'),
(2, 'Kiranta', 'Perempuan', 24, '1997-09-26', 'Medan Selayang', '081280492626', 'BPJS Kesehatan'),
(3, 'Lie Diana', 'Perempuan', 31, '1990-06-23', 'Jakarta Pusat', '081280492121', 'Swasta'),
(4, 'Dinda Monica', 'Perempuan', 33, '1988-08-18', 'Jakarta Selatan', '081280492222', 'Swasta'),
(5, 'Theodore Christopher', 'Laki_Laki', 33, '1988-10-18', 'Jakarta Utara', '081280492323', 'BPJS Kesehatan'),
(6, 'Wiliam', 'Laki_Laki', 32, '1989-04-14', 'Jakarta Barat', '081280492424', 'Swasta'),
(7, 'Marsha Yahya', 'Perempuan', 34, '1987-11-16', 'Jakarta Pusat', '081280492525', 'Swasta'),
(8, 'Ayu Lestari', 'Perempuan', 32, '1998-03-07', 'Jakarta Pusat', '081280492828', 'BPJS Kesehatan'),
(9, 'Irvan Setiawan', 'Laki_Laki', 32, '1989-07-14', 'Jakarta Barat', '081280492929', 'BPJS Kesehatan'),
(10, 'Devi Natalia', 'Perempuan', 22, '1999-12-16', 'Medan Selayang', '081280493030', 'BPJS Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `perusahaan_farmasi` varchar(128) DEFAULT NULL,
  `stok_obat` int(11) DEFAULT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id`, `nama_obat`, `perusahaan_farmasi`, `stok_obat`, `tanggal_kadaluwarsa`, `id_pasien`) VALUES
(1, 'Panadol Paracetamol', 'GlaxoSmithKline', 150, '2024-06-08', 1),
(2, 'Vicks Formula 44', 'Darya Varia Laboratoria', 43, '2024-06-22', 2),
(3, 'Entrostop', 'Kalbe Farma', 75, '2024-09-12', 3),
(4, 'Promag 12 Tablet', 'Kalbe Farma', 100, '2024-09-16', 3),
(5, 'Holisticare Super Ester C', 'PT Konimex', 17, '2025-01-14', 1),
(6, 'Microlax Gel 5 ml', 'Pharos', 50, '2026-11-20', 9),
(7, 'Polysilane Suspensi 180 ml', 'Pharos', 15, '2023-02-22', 4),
(8, 'Neozep Forte 1 Strip 4 Tablet', 'Darya Varia Laboratoria', 360, '2023-06-22', 1),
(9, 'Neurobion Forte 10 Tablet', 'Merck Indonesia', 50, '2025-06-08', 7),
(10, 'Nalgestan Tablet', 'Biomedis Ltd', 91, '2027-07-08', 6),
(11, 'Nalgestan Tablet', 'Biomedis Ltd', 91, '2027-07-08', 2),
(12, 'Neozep Forte 1 Strip 4 Tablet', 'Darya Varia Laboratoria', 360, '2023-06-22', 2),
(13, 'Folavit 400mg', 'Sanbe', 60, '2024-08-10', 7),
(14, 'Folavit 400mg', 'Sanbe', 60, '2024-08-10', 4),
(15, 'Decolgen Flu Paracetamol 400 mg', 'Darya Varia Laboratoria', 250, '2023-08-10', 5),
(16, 'Viostin Suplemen Sendi', 'Pharos', 30, '2025-03-03', 10),
(17, 'Lelap 4 Tablet', 'Soho Global Health', 20, '2023-05-01', 8);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kunjungan`
--

CREATE TABLE `riwayat_kunjungan` (
  `id` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `keluhan` text NOT NULL,
  `hasil_diagnosa` text NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_resep_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_kunjungan`
--

INSERT INTO `riwayat_kunjungan` (`id`, `tanggal_kunjungan`, `keluhan`, `hasil_diagnosa`, `id_pasien`, `id_resep_obat`) VALUES
(1, '2022-06-01', 'Pusing dan gejala flu', 'Konsumsi obat dan istirahat cukup', 1, 1),
(2, '2022-06-01', 'Pusing dan gejala flu', 'Konsumsi obat dan istirahat cukup', 1, 5),
(3, '2022-06-01', 'Pusing dan gejala flu', 'Konsumsi obat dan istirahat cukup', 1, 8),
(4, '2022-06-04', 'Batuk dan pilek', 'Konsumsi obat', 2, 2),
(5, '2022-06-04', 'Batuk dan pilek', 'Konsumsi obat', 2, 11),
(6, '2022-06-04', 'Batuk dan pilek', 'Konsumsi obat', 2, 12),
(7, '2022-06-08', 'Kesehatan tubuh', 'Konsumsi suplemen dan multi vitamin', 7, 9),
(8, '2022-06-08', 'Kesehatan tubuh', 'Konsumsi suplemen dan multi vitamin', 7, 13),
(9, '2022-05-30', 'Sakit maag', 'Konsumsi obat', 3, 3),
(10, '2022-05-30', 'Sakit maag', 'Konsumsi obat', 3, 4),
(11, '2022-05-24', 'Nyeri lambung dan kembung', 'Konsumsi obat', 4, 7),
(12, '2022-05-24', 'Kesehatan tubuh', 'Konsumsi suplemen dan multi vitamin', 4, 14),
(13, '2022-06-03', 'Batuk dan pilek', 'Konsumsi obat', 6, 10),
(14, '2022-06-07', 'Gejala Flu', 'Konsumsi obat', 5, 15),
(15, '2022-06-09', 'Konsumsi suplemen dan multi vitamin', 'Kesehatan Tubuh', 10, 16),
(16, '2022-06-05', 'Susah tidur', 'Konsumsi obat', 8, 17),
(17, '2022-05-30', 'Sembelit', 'Konsumsi obat', 9, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pasien` (`id_pasien`);

--
-- Indexes for table `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resep_obat` (`id_resep_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  ADD CONSTRAINT `fk_resep_obat` FOREIGN KEY (`id_resep_obat`) REFERENCES `resep_obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

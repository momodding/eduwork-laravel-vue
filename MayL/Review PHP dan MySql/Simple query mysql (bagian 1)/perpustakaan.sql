-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 03:16 PM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `id_penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `sinopsis`, `penerbit`, `tahun_terbit`, `id_penulis`) VALUES
(1, 'Sedang belajar', 'belajar biar pinter', 'ada aja', 2000, 1),
(2, 'kedua', 'ini judaul kedua', 'ada aja 2', 2000, 2),
(3, 'kopi', 'kopi manis', 'barista', 2001, 2),
(4, 'topi saya bundar', 'bundar topi saya', 'penyanyi', 2003, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `name`, `tanggal_lahir`, `alamat`, `no_tlp`) VALUES
(1, 'MayL', '2023-01-26', 'apa aja', '08123456789'),
(2, 'May Aja', '2023-01-26', 'kedua', '08123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penulis` (`id_penulis`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Tugas simple query
-- 1. SELECT * FROM `buku` WHERE judul like '%o%';
-- menampilkan semua data dari tabel buku dengan judul yang memiliki karakter o (ada 2)

-- 2. SELECT * FROM `buku` WHERE tahun_terbit >= 2001 ;
-- menampilkan semua data dari n tabel buku dengan tahun terbit lebih dari 2001, 2001 masuk dalam pencarian (ada 2 data) 

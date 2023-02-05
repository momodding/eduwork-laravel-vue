-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:42 AM
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
  `isbn` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_penerbit` varchar(10) DEFAULT NULL,
  `id_pengarang` varchar(10) NOT NULL,
  `id_katalog` varchar(10) DEFAULT NULL,
  `qty_stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`) VALUES
('002-291', 'Lancar Javascript', 2017, 'PN01', 'PG05', 'KG2', 8),
('009-281', 'Basic PHP', 2021, 'PN04', 'PG01', 'KG1', 19),
('092-111', 'Belajar PHP', 2010, 'PN01', 'PG05', 'KG0', 12),
('292-181', 'Basic JQuery', 2019, NULL, 'PG05', 'KG0', 11),
('377-482', 'MySQL Dasar', 2020, 'PN04', 'PG04', 'KG0', 20),
('381-561', 'Basic Vue.js', 2014, 'PN03', 'PG01', 'KG2', 5),
('774-201', 'Laravel Part 3', 2021, 'PN03', 'PG05', 'KG1', 7),
('774-211', 'Laravel Part 1', 2018, 'PN03', 'PG05', 'KG1', 5),
('777-380', 'Mongo DB Lanjut', 2020, 'PN01', 'PG03', 'KG2', 7),
('777-381', 'MySQL Lanjut', 2021, 'PN01', 'PG04', 'KG0', 9),
('881-291', 'Belajar Laravel', 2020, 'PN03', 'PG05', 'KG1', 3),
('882-191', 'Belajar CSS', 2020, 'PN03', 'PG05', 'KG0', 8),
('902-191', 'CSS Part 2', 2020, 'PN04', 'PG05', 'KG0', 8),
('909-181', 'Basic HTML', 2021, 'PN01', 'PG04', 'KG0', 10),
('977-381', 'CSS Part 1', 2018, 'PN01', 'PG01', 'KG0', 9),
('999-281', 'Laravel Part 2', 2020, 'PN04', 'PG05', 'KG1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES
('PN01', 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya'),
('PN02', 'Penerbit 02', 'penerbit2@perpus.co.id', '02123456789', 'Bandung'),
('PN03', 'Penerbit 03', 'penerbit3@perpus.co.id', NULL, 'Jakarta Barat'),
('PN04', 'Penerbit 04', 'penerbit4@perpus.co.id', '08123456789', 'Jakarta Selatan');

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
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- select isbn, judul, buku.id_penerbit, nama_penerbit
-- from buku
-- join penerbit on buku.id_penerbit = penerbit.id_penerbit
-- order by id_penerbit asc

-- select isbn, judul, buku.id_penerbit, nama_penerbit
-- from buku
-- right join penerbit on buku.id_penerbit = penerbit.id_penerbit
-- order by id_penerbit asc

select isbn, judul, buku.id_penerbit, nama_penerbit
-- from buku
-- left join penerbit on buku.id_penerbit = penerbit.id_penerbit
-- order by id_penerbit asc

select isbn, judul, buku.id_penerbit, nama_penerbit
-- from buku join penerbit on buku.id_penerbit = penerbit.id_penerbit
where alamat like '%Jakarta%' and telp is null
-- order by id_penerbit asc
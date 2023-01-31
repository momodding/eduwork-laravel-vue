-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 04:27 PM
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
  `id_penerbit` varchar(10) NOT NULL,
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
('377-482', 'MySQL Dasar', 2020, 'PN04', 'PG04', 'KG0', 20),
('381-561', 'Basic Vue.js', 2014, 'PN03', 'PG01', 'KG2', 5),
('774-201', 'Laravel Part 3', 2021, 'PN03', 'PG05', 'KG1', 7),
('774-211', 'Laravel Part 1', 2018, 'PN03', 'PG05', 'KG1', 5),
('777-380', 'Mongo DB Lanjut', 2020, 'PN01', 'PG03', 'KG2', 7),
('777-381', 'MySQL Lanjut', 2021, 'PN01', 'PG04', 'KG0', 9),
('881-291', 'Belajar Laravel', 2020, 'PN03', 'PG05', 'KG1', 3),
('882-191', 'Belajar CSS', 2020, 'PN03', 'PG05', 'KG0', 8),
('902-191', 'CSS Part 2', 2020, 'PN04', 'PG05', 'KG0', 8),
('909-181', 'Basic HTML', 2021, 'PN01', 'PG04', 'KG0', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- select * from buku order by isbn desc;
-- mengurutkan data buku berdasarkan nomor isbn dari yang terbesar

-- select * from buku order by judul asc;
-- mengurutkan data buku berdasarkan nomor isbn dari yang terkecil

-- select * from buku where judul like '%CSS%';
-- mencari data di tabel buku dengan kata CSS

-- select * from buku where judul like '%Laravel%';
-- mencari data di tabel buku dengan kata CSS

-- select id_penerbit, sum(qty_stok) as total from buku group by id_penerbit;
-- menampilkan jumlah buku berdasarkan id_penerbit

-- select id_pengarang, sum(qty_stok) as total from buku group by id_pengarang;
-- menampilkan jumlah buku berdasarkan id_pengarang

-- select id_katalog, sum(qty_stok) as total from buku group by id_katalog;
-- menampilkan jumlah buku berdasarkan id_katalog

-- select tahun, sum(qty_stok) as total from buku group by tahun;
-- menampilkan jumlah buku dan mengelompokkan berdasarkan tahun terbit

-- select tahun, sum(qty_stok) as total from buku where tahun >= 2020 group by tahun order by tahun desc;
-- menampilkan jumlah buku yang terbit dari dan setelah tahun 2020 berdasarkan tahun terbit dari dan setelah tahun 2020

-- select tahun, sum(qty_stok) as total from buku group by tahun order by tahun asc;
-- menampilkan data dari tabel buku, jumlah buku yang terbit dikelompokkan berdasarkan tahun terbit dari tahun terkecil 2010 sampai 2021

-- select tahun, sum(qty_stok) as total from buku group by tahun order by tahun desc;
-- -- menampilkan data dari tabel buku, jumlah buku yang terbit dikelompokkan berdasarkan tahun terbit dari tahun terbesar 2021 sampai 2010


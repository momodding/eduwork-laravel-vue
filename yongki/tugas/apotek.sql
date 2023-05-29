-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2022 pada 20.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `faktur_supply`
--

CREATE TABLE `faktur_supply` (
  `no` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan` int(8) NOT NULL,
  `id_supplier` int(8) NOT NULL,
  `id_obat` int(8) NOT NULL,
  `jumlah_obat` int(8) DEFAULT NULL,
  `harga` int(16) DEFAULT NULL,
  `total_harga` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur_supply`
--

INSERT INTO `faktur_supply` (`no`, `tanggal`, `id_karyawan`, `id_supplier`, `id_obat`, `jumlah_obat`, `harga`, `total_harga`) VALUES
(1, '0000-00-00', 4, 4, 9, NULL, NULL, NULL),
(2, '2022-07-27', 5, 9, 2, 2, NULL, NULL),
(3, '0000-00-00', 5, 9, 3, NULL, NULL, NULL),
(4, '2022-07-20', 3, 3, 8, NULL, NULL, NULL),
(5, '0000-00-00', 6, 6, 4, NULL, NULL, NULL),
(6, '2022-07-29', 8, 2, 7, NULL, NULL, NULL),
(7, '2022-07-28', 4, 5, 2, NULL, NULL, NULL),
(8, '2022-07-27', 1, 10, 7, NULL, NULL, NULL),
(9, '0000-00-00', 10, 7, 10, 2, NULL, NULL),
(10, '2022-07-20', 4, 9, 6, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(8) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `Tahun_Lahir` int(4) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_telepon` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `Tahun_Lahir`, `alamat`, `no_telepon`) VALUES
(1, 'Joko Santoso', 2000, 'Gamping, Yogyakarta', 88263374),
(2, 'Marvin Alexa', 2001, 'Mantrijeron, Yogyakarta', 87754392),
(3, 'Rizqi Xavier', 1999, 'Gunungkidul, Yogyakarta', 84225253),
(4, 'Brigita Nanda', 1999, 'Nganjuk, Jawa Timur', 8645234),
(5, 'Clarissa Diva', 2001, 'Prambanan, Jawa tengah', 8775243),
(6, 'Muhammad Ahsan', 1998, 'Jakarta', 85342345),
(7, 'Yovanda putra', 1999, 'Malang, Jawa Timur', 8674345),
(8, 'Fragma Dwika', 2002, 'Palembang', 864483),
(9, 'Azka Fabiatul', 2001, 'NTB', 967374),
(10, 'Annisa Mutiara', 2001, 'Klaten, Jawa tengah', 85347673);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `pembuat_obat` varchar(32) DEFAULT NULL,
  `tanggal_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `pembuat_obat`, `tanggal_kadaluwarsa`) VALUES
(1, 'paracetamol', 'Dr. yongku', '2022-07-29'),
(2, 'bodrex', 'Dr. Boyke', '2022-07-20'),
(3, 'minyak cobra', 'Dr. Tirta', '2022-07-05'),
(4, 'menchetamol', 'Dr. Boyke', '2022-07-31'),
(5, 'Obat Kuat', 'Dr. yongku', '2022-07-30'),
(6, 'Parachimin', 'Dr. Tirta', '2022-07-30'),
(7, 'Acarbose', 'Dr. Tirta', '2022-07-30'),
(8, 'Albumin', 'Dr, Yongku', '2022-07-07'),
(9, 'Bethadine', 'Dr. Tirta', '2022-07-29'),
(10, 'Ethanol', 'Dr. Tirta', '2022-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `Alamat` varchar(64) NOT NULL,
  `no_telepon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `Alamat`, `no_telepon`) VALUES
(1, 'Edo Himawan', 'Jakarta', '08647654'),
(2, 'Bayu Kumbara', 'Ngawi, Jawa Timur', '08546367'),
(3, 'Yoga Saputra', 'Malang, Jawa Timur', '086436347'),
(4, 'Andre Maulanm', 'Solo, jawa Tengah', '086436348'),
(5, 'Zaqi Zamzam', 'Solo, Jawa Tengah', '08643472'),
(6, 'Brian hermawan', 'Klaten, Jawa Tengah', '07743674rhe'),
(7, 'Jonhathan', 'Jakarta', '08646746'),
(8, 'Komal Saputra', 'Trenggalek', '085644366'),
(9, 'Fredi Abdullah', 'Solo, Jawa Tengah', '07846337'),
(10, 'Dina Soluta', 'Solo, Jawa Tengah', '0873483');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `no` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_ customer` varchar(32) NOT NULL,
  `id_karyawan` int(8) NOT NULL,
  `id_obat` int(8) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `harga` int(16) NOT NULL,
  `total_harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`no`, `tanggal`, `nama_ customer`, `id_karyawan`, `id_obat`, `jumlah`, `harga`, `total_harga`) VALUES
(1, '2022-07-27', 'anonim', 9, 8, 0, 0, 0),
(2, '2022-07-27', 'Heri', 8, 10, 2, 0, 0),
(3, '0202-07-26', 'Irawan', 5, 6, 0, 0, 0),
(4, '2022-07-29', 'Joko', 4, 8, 0, 0, 0),
(5, '2022-07-30', 'Suyatno', 2, 5, 0, 0, 0),
(6, '2022-07-30', 'Rifqi', 7, 9, 0, 0, 0),
(7, '2022-07-27', 'Dani', 9, 5, 3, 0, 0),
(8, '2022-07-27', 'Marwanto', 10, 10, 3, 0, 0),
(9, '0000-00-00', 'dani', 4, 10, 4, 0, 0),
(10, '2022-07-30', 'Erik', 8, 2, 6, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faktur_supply`
--
ALTER TABLE `faktur_supply`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_supplier` (`id_supplier`),
  ADD KEY `fk_karyawan` (`id_karyawan`),
  ADD KEY `fk_obat` (`id_obat`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faktur_supply`
--
ALTER TABLE `faktur_supply`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur_supply`
--
ALTER TABLE `faktur_supply`
  ADD CONSTRAINT `fk_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `transaksi_penjualan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 03:29 AM
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
-- Table structure for table `detail_kunjungan`
--

CREATE TABLE `detail_kunjungan` (
  `id_detail_kunjungan` int(11) NOT NULL,
  `no_rekam_medis` varchar(24) NOT NULL,
  `poliklinik` varchar(64) NOT NULL,
  `nama_dokter` varchar(64) NOT NULL,
  `rujukan` varchar(128) NOT NULL,
  `id_resep_obat` int(11) NOT NULL,
  `id_riwayat_kunjungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kunjungan`
--

INSERT INTO `detail_kunjungan` (`id_detail_kunjungan`, `no_rekam_medis`, `poliklinik`, `nama_dokter`, `rujukan`, `id_resep_obat`, `id_riwayat_kunjungan`) VALUES
(1, 'rkm001', 'THT-KL (Telinga Hidung Tenggorok Bedah Kepala Leher)', 'dr. Eliot Ginting Suka, Sp.THT-KL', 'Pribadi', 1, 1),
(2, 'rkm002', 'THT-KL (Telinga Hidung Tenggorok Bedah Kepala Leher)', 'dr. Eliot Ginting Suka, Sp.THT-KL', 'Pribadi', 2, 4),
(3, 'rkm003', 'Penyakit Dalam (Internist)', 'dr. Putu Gede Surya Wibawa, M.Biomed, Sp.PD', 'Rumah Sakit Pemerintah', 3, 9),
(4, 'rkm004', 'Penyakit Dalam (Internist)', 'dr. Putu Gede Surya Wibawa, M.Biomed, Sp.PD', 'Rumah Sakit Pemerintah\r\n', 7, 11),
(5, 'rkm005', 'Kesehatan Jiwa (Psikiatri)', 'dr. Heriani Sp.KJ(K)', 'Rumah Sakit Pemerintah', 15, 14),
(6, 'rkm006', 'THT-KL (Telinga Hidung Tenggorok Bedah Kepala Leher)', 'dr. Eliot Ginting Suka, Sp.THT-KL', 'Pribadi', 10, 19),
(7, 'rkm007', 'Kebidanan dan Kandungan', 'dr. Gita Pratama, Sp.OG(K), MRepSc', 'Rumah Sakit Swasta', 9, 7),
(8, 'rkm008', 'Umum', 'dr. Kusumawardhani Sp.KJ(K), MPH', 'Rumah Sakit Swasta', 17, 16),
(9, 'rkm009', 'Penyakit Dalam (Internist)', 'dr. Putu Gede Surya Wibawa, M.Biomed, Sp.PD', 'Pribadi', 6, 18),
(10, 'rkm010', 'Reutamologi', 'dr. Rudy Hidayat, Sp.PD-KR', 'Rumah Sakit Pemerintah', 16, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `umur` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` char(15) NOT NULL,
  `jenis_asuransi` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(128) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `golongan_darah` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `jenis_kelamin`, `umur`, `tanggal_lahir`, `alamat`, `no_telepon`, `jenis_asuransi`, `pekerjaan`, `status`, `golongan_darah`) VALUES
(1, 'Andre Leonardo Judah', 'L', 34, '1987-08-12', 'Kayu Putih Jakarta Timur', '081280492727', 'BPJS Kesehatan', 'Pegawai Negeri Sipil', 'Belum Menikah', 'AB'),
(2, 'Kiranta', 'P', 24, '1997-09-26', 'Medan Selayang', '081280492626', 'BPJS Kesehatan', 'Pelajar/Mahasiswa', 'Belum Menikah', 'B'),
(3, 'Lie Diana', 'P', 31, '1990-06-23', 'Jakarta Pusat', '081280492121', 'Swasta', 'Pegawai Swasta', 'Sudah Menikah', 'O'),
(4, 'Dinda Monica', 'P', 33, '1988-08-18', 'Jakarta Selatan', '081280492222', 'Swasta', 'Ibu Rumah Tangga', 'Sudah Menikah', 'B'),
(5, 'Theodore Christopher', 'L', 33, '1988-10-18', 'Jakarta Utara', '081280492323', 'BPJS Kesehatan', 'Pegawai Swasta', 'Sudah Menikah', 'AB'),
(6, 'Wiliam', 'L', 32, '1989-04-14', 'Jakarta Barat', '081280492424', 'Swasta', 'Pegawai BUMN', 'Sudah Menikah', 'A'),
(7, 'Marsha Yahya', 'P', 34, '1987-11-16', 'Jakarta Pusat', '081280492525', 'Swasta', 'Ibu Rumah Tangga', 'Sudah Menikah', 'O'),
(8, 'Ayu Lestari', 'P', 32, '1998-03-07', 'Jakarta Pusat', '081280492828', 'BPJS Kesehatan', 'Pelajar/Mahasiswa', 'Belum Menikah', 'A'),
(9, 'Irvan Setiawan', 'L', 32, '1989-07-14', 'Jakarta Barat', '081280492929', 'BPJS Kesehatan', 'Pegawai Negeri Sipil', 'Belum Menikah', 'B'),
(10, 'Devi Natalia', 'P', 22, '1999-12-16', 'Medan Selayang', '081280493030', 'BPJS Kesehatan', 'Pelajar/Mahasiswa', 'Belum Menikah', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep_obat` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `perusahaan_farmasi` varchar(128) DEFAULT NULL,
  `stok_obat` int(11) DEFAULT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `jenis_obat` varchar(64) DEFAULT NULL,
  `nomor_izin_edar` varchar(32) DEFAULT NULL,
  `golongan_obat` varchar(128) DEFAULT NULL,
  `kategori` varchar(128) NOT NULL,
  `dosis` varchar(32) DEFAULT NULL,
  `efek_samping` varchar(256) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep_obat`, `nama_obat`, `perusahaan_farmasi`, `stok_obat`, `tanggal_kadaluwarsa`, `jenis_obat`, `nomor_izin_edar`, `golongan_obat`, `kategori`, `dosis`, `efek_samping`, `id_pasien`) VALUES
(1, 'Panadol Extra', 'GlaxoSmithKline', 150, '2024-06-08', 'Tablet', 'DBL9624502804A1', 'Obat Bebas', 'Analgesik dan Antipiretik', '3-4 Kali Sehari', 'Mual, Muntah, Nyeri Lambung, Kehilangan Nafsu Makan, Ruam Pada Kulit', 1),
(2, 'Vicks Formula 44', 'Darya Varia Laboratoria', 43, '2024-06-22', 'Obat Cair Sirup', 'DTL0304518837A1', 'Obat Bebas', 'Obat Batuk dan Pilek', '3-4 Kali Sehari', 'Mual, Pusing, Mengantuk', 2),
(3, 'Entrostop', 'Kalbe Farma', 75, '2024-09-12', 'Tablet', 'DBL9111602010A1', 'Obat Bebas', 'Anti Diare', '2 Kali Sehari', 'Konstipasi Sementara', 3),
(4, 'Promag 12 Tablet', 'Kalbe Farma', 100, '2024-09-16', 'Tablet', 'DBL9111601963A1', 'Obat Bebas', 'Antasid, Obat Antirefluks & Antiulserasi', '3-4 Kali Sehari', 'Sembelit, Diare, Mual, Muntah', 3),
(5, 'Holisticare Super Ester C', 'PT Konimex', 17, '2025-01-14', 'Tablet', 'SD031508481', 'Obat Bebas', 'Vitamin C', '3-4 Kali Sehari', 'Mual, Muntah, Diare, Keram Perut, Sakit Maag', 1),
(6, 'Microlax Gel 5 ml', 'Pharos', 50, '2026-11-20', 'Tube', 'DBL7221628958A1', 'Obat Bebas Terbatas', 'Laksatif dan Pencahar', '1 Tube per Rektal', 'BAB berdarah, Iritasi pada anus, Perut kembung, Kram perut, Mual, Muntah, Diare, Pusing', 9),
(7, 'Polysilane Suspensi 180 ml', 'Pharos', 15, '2023-02-22', 'Obat Cair Sirup', 'DBL7821624233A1', 'Obat Bebas', 'Antasid, Obat Antirefluks, dan Antiulserasi', '3-4 Kali Sehari', 'Deplesi Fosfat', 4),
(8, 'Neozep Forte 1 Strip 4 Tablet', 'Darya Varia Laboratoria', 360, '2023-06-22', 'Tablet', 'DTL1504523110A1', 'Obat Bebas Terbatas', 'Obat Batuk dan Pilek', '3-4 Kali Sehari', 'Mengantuk, Gangguan Pencernaan , Takikardia, Aritmia, Mulut Kering , Retensi Urin, Iritasi Lambung, Penggunaan Dengan Dosis Besar dan Jangka Panjang Menyebabkan Kerusakan Hati', 1),
(9, 'Neurobion Forte 10 Tablet', 'Merck Indonesia', 50, '2025-06-08', 'Tablet', 'DBL9615806416A1', 'Obat Bebas', 'Vitamin B Kompleks dan Vitamin C', '1 Kali Sehari', NULL, 7),
(10, 'Nalgestan Tablet', 'Biomedis Ltd', 91, '2027-07-08', 'Tablet', 'DTL1404522310A1', 'Obat Bebas Terbatas', 'Obat Batuk dan Pilek', '3-4 Kali Sehari', 'Mengantuk', 6),
(11, 'Nalgestan Tablet', 'Biomedis Ltd', 91, '2027-07-08', 'Tablet', 'DTL1404522310A1', 'Obat Bebas Terbatas', 'Obat Batuk dan Pilek', '3-4 Kali Sehari', 'Mengantuk', 2),
(12, 'Neozep Forte 1 Strip 4 Tablet', 'Darya Varia Laboratoria', 360, '2023-06-22', 'Tablet', 'DTL1504523110A1', 'Obat Bebas Terbatas', 'Obat Batuk dan Pilek', '3-4 Kali Sehari', 'Mengantuk, Gangguan Pencernaan , Takikardia, Aritmia, Mulut Kering , Retensi Urin, Iritasi Lambung, Penggunaan Dengan Dosis Besar dan Jangka Panjang Menyebabkan Kerusakan Hati', 2),
(13, 'Folavit 400mg', 'Sanbe', 60, '2024-08-10', 'Tablet', 'SD091536141', 'Obat Bebas', 'Vitamin dan Mineral (untuk Masa Hamil dan Nifas) dan Antianemia', '1 Kali Sehari', NULL, 7),
(14, 'Folavit 400mg', 'Sanbe', 60, '2024-08-10', 'Tablet', 'SD091536141', 'Obat Bebas', 'Vitamin dan Mineral (untuk Masa Hamil dan Nifas) dan Antianemia', '1 Kali Sehari', NULL, 4),
(15, 'Decolgen Flu Paracetamol 400 mg', 'Darya Varia Laboratoria', 250, '2023-08-10', 'Tablet', 'DTL1404522410A1', 'Obat Bebas Terbatas', 'Obat Batuk dan Pilek', '3-4 Kali Sehari', 'Mengantuk, Ganguan Pencernaan, Insomnia, Gelisah, Eksitasi, Tremor, Takikardi, Aritmia, Mulut Kering, Sulit Berkemih, Penggunaan Dosis Besar dan Jangka Panjang Menyebabkan Kerusakan Hati', 5),
(16, 'Viostin Suplemen Sendi', 'Pharos', 30, '2025-03-03', 'Kapsul', 'SD181552401', 'Obat Bebas', 'Obat Sistem Muskuloskeletal', '3-4 Kali Sehari', NULL, 10),
(17, 'Lelap 4 Tablet', 'Soho Global Health', 20, '2023-05-01', 'Tablet', 'HT142500451', 'Obat Bebas', 'Meningkatkan Kualitas Tidur dan Membuat Tidur Lebih Pulas', '2 Kali Sehari', NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kunjungan`
--

CREATE TABLE `riwayat_kunjungan` (
  `id_riwayat_kunjungan` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `keluhan` text NOT NULL,
  `hasil_diagnosa` text NOT NULL,
  `riwayat_alergi` varchar(128) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `indeks_massa_tubuh` varchar(12) DEFAULT NULL,
  `keanggotaan` enum('Membership','Non-Member','','') NOT NULL,
  `jenis_pasien` enum('Pasien Rawat Jalan','Pasien Rawat Inap','','') NOT NULL,
  `data_radiologi` varchar(128) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_resep_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_kunjungan`
--

INSERT INTO `riwayat_kunjungan` (`id_riwayat_kunjungan`, `tanggal_kunjungan`, `keluhan`, `hasil_diagnosa`, `riwayat_alergi`, `tinggi_badan`, `berat_badan`, `indeks_massa_tubuh`, `keanggotaan`, `jenis_pasien`, `data_radiologi`, `id_pasien`, `id_resep_obat`) VALUES
(1, '2022-06-01', 'Pusing dan gejala flu', 'Konsumsi obat dan istirahat cukup', 'Tidak Ada', 178, 75, '23', 'Membership', 'Pasien Rawat Jalan', NULL, 1, 1),
(2, '2022-06-01', 'Pusing dan gejala flu', '', 'Tidak Ada', 178, 75, '23', 'Membership', 'Pasien Rawat Jalan', NULL, 1, 5),
(3, '2022-06-01', 'Pusing dan gejala flu', 'Konsumsi obat dan istirahat cukup', 'Tidak Ada', 178, 75, '23', 'Membership', 'Pasien Rawat Jalan', NULL, 1, 8),
(4, '2022-06-04', 'Batuk dan pilek', 'Konsumsi obat', 'Alergi Debu', 165, 55, '20', 'Membership', 'Pasien Rawat Jalan', NULL, 2, 2),
(5, '2022-06-04', 'Batuk dan pilek', 'Konsumsi obat', 'Alergi Debu', 165, 55, '20', 'Membership', 'Pasien Rawat Jalan', NULL, 2, 11),
(6, '2022-06-04', 'Batuk dan pilek', '', 'Alergi Debu', 165, 55, '20', 'Membership', 'Pasien Rawat Jalan', NULL, 2, 12),
(7, '2022-06-08', 'Kesehatan tubuh', 'Konsumsi suplemen dan multi vitamin', 'Tidak Ada', 158, 58, '23', 'Non-Member', 'Pasien Rawat Inap', 'Imbasan Ultrasound', 7, 9),
(8, '2022-06-08', 'Kesehatan tubuh', 'Konsumsi suplemen dan multi vitamin', 'Tidak Ada', 158, 58, '23', 'Non-Member', 'Pasien Rawat Inap', 'Imbasan Ultrasound', 7, 13),
(9, '2022-05-30', '', 'Konsumsi obat', 'Alergi Makanan Laut', 157, 52, '21', 'Membership', 'Pasien Rawat Jalan', NULL, 3, 3),
(10, '2022-05-30', '', 'Konsumsi obat', 'Alergi Makanan Laut', 157, 52, '21', 'Membership', 'Pasien Rawat Jalan', NULL, 3, 4),
(11, '2022-05-24', 'Nyeri lambung dan kembung', 'Konsumsi obat', 'Alergi Gigitan Serangga', 167, 55, '19', 'Membership', 'Pasien Rawat Jalan', NULL, 4, 7),
(12, '2022-05-24', 'Kesehatan tubuh', 'Konsumsi suplemen dan multi vitamin', 'Alergi Gigitan Serangga', 167, 55, '19', 'Membership', 'Pasien Rawat Jalan', NULL, 4, 14),
(14, '2022-06-07', 'Gejala Flu', 'Konsumsi obat', 'Alergi Makanan Laut', 175, 80, '26', 'Membership', 'Pasien Rawat Jalan', 'Computerized Tomography (CT) Scan', 5, 15),
(15, '2022-06-09', 'Konsumsi suplemen dan multi vitamin', 'Kesehatan Tubuh', 'Tidak Ada', 160, 55, '21', 'Non-Member', 'Pasien Rawat Jalan', 'Magnetic Resonance Imaging (MRI) Scan', 10, 16),
(16, '2022-06-05', 'Susah tidur', 'Konsumsi obat', 'Alergi Debu', 165, 57, '20', 'Membership', 'Pasien Rawat Jalan', NULL, 8, 17),
(18, '2022-05-30', 'Sembelit', 'Konsumsi obat', 'Tidak Ada', 173, 85, '28', 'Non-Member', 'Pasien Rawat Inap', 'Fluoroskopi', 9, 6),
(19, '2022-06-03', 'Batuk dan Pilek', 'Konsumsi obat', 'Tidak Ada', 173, 78, '26', 'Non-Member', 'Pasien Rawat Jalan', NULL, 6, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kunjungan`
--
ALTER TABLE `detail_kunjungan`
  ADD PRIMARY KEY (`id_detail_kunjungan`),
  ADD KEY `id_resep_obat` (`id_resep_obat`,`id_riwayat_kunjungan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep_obat`),
  ADD KEY `fk_pasien` (`id_pasien`);

--
-- Indexes for table `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  ADD PRIMARY KEY (`id_riwayat_kunjungan`),
  ADD KEY `fk_resep_obat` (`id_resep_obat`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kunjungan`
--
ALTER TABLE `detail_kunjungan`
  MODIFY `id_detail_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  MODIFY `id_riwayat_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Constraints for table `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  ADD CONSTRAINT `fk_resep_obat` FOREIGN KEY (`id_resep_obat`) REFERENCES `resep_obat` (`id_resep_obat`),
  ADD CONSTRAINT `riwayat_kunjungan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

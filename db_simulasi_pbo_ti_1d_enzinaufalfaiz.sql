-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 06:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti_1d_enzinaufalfaiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(12,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Andi Saputra', 'SMAN 1 Bandung', '85.50', '500000.00', 'Reguler', 'Teknik Informatika', 'Bandung', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 2 Jakarta', '82.75', '500000.00', 'Reguler', 'Sistem Informasi', 'Jakarta', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 5 Surabaya', '88.20', '500000.00', 'Reguler', 'Teknik Komputer', 'Surabaya', NULL, NULL, NULL, NULL),
(4, 'Dewi Anggraini', 'SMAN 3 Yogyakarta', '84.90', '500000.00', 'Reguler', 'Informatika', 'Yogyakarta', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMAN 1 Semarang', '80.50', '500000.00', 'Reguler', 'Teknologi Informasi', 'Semarang', NULL, NULL, NULL, NULL),
(6, 'Farhan Maulana', 'SMAN 4 Bekasi', '86.10', '500000.00', 'Reguler', 'Sistem Informasi', 'Bekasi', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 7 Bogor', '89.00', '500000.00', 'Reguler', 'Teknik Informatika', 'Bogor', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 8 Bandung', '90.00', '500000.00', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Sari', 'SMAN 1 Depok', '92.50', '500000.00', 'Prestasi', NULL, NULL, 'Olimpiade Informatika', 'Provinsi', NULL, NULL),
(10, 'Joko Susilo', 'SMAN 6 Jakarta', '88.75', '500000.00', 'Prestasi', NULL, NULL, 'Kejuaraan Robotik', 'Nasional', NULL, NULL),
(11, 'Kartika Dewi', 'SMAN 2 Bogor', '91.40', '500000.00', 'Prestasi', NULL, NULL, 'Lomba Karya Ilmiah', 'Provinsi', NULL, NULL),
(12, 'Lukman Hakim', 'SMAN 3 Bekasi', '89.30', '500000.00', 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(13, 'Maya Putri', 'SMAN 5 Tangerang', '93.10', '500000.00', 'Prestasi', NULL, NULL, 'Kejuaraan Debat', 'Internasional', NULL, NULL),
(14, 'Nanda Pratama', 'SMAN 9 Bandung', '90.60', '500000.00', 'Prestasi', NULL, NULL, 'Lomba Pemrograman', 'Nasional', NULL, NULL),
(15, 'Oki Ramadhan', 'SMAN 1 Garut', '87.50', '500000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-001', 'Kementerian Keuangan'),
(16, 'Putri Maharani', 'SMAN 2 Cimahi', '89.20', '500000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-002', 'Badan Pusat Statistik'),
(17, 'Qori Ahmad', 'SMAN 4 Bandung', '86.80', '500000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-003', 'Kementerian Perhubungan'),
(18, 'Rina Oktavia', 'SMAN 1 Tasikmalaya', '91.00', '500000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-004', 'Badan Siber dan Sandi Negara'),
(19, 'Satria Nugraha', 'SMAN 6 Bogor', '88.40', '500000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-005', 'Kementerian Dalam Negeri'),
(20, 'Tania Kusuma', 'SMAN 3 Cirebon', '90.30', '500000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-006', 'Badan Kepegawaian Negara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

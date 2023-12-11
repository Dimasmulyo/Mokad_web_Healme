-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `no_telp`, `alamat`, `bidang`, `username`, `password`, `role`, `foto`) VALUES
(1, 'eren', '087527854245', '', 'administrasi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'upload/admin.webp'),
(2, 'Mikasa', '08510546465', 'RT.05/RW.10 Jakarta', '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'upload/maudi.png'),
(6, 'dr. Joriandhita Surya Ramadhan, Sp.GK', '081', '', 'Gizi Klinik', 'Joriandhita', 'e2ac0e0f8a7123289767f9cf5c4e6d09', 'dokter', 'upload/img_429VpeF.jpg'),
(7, 'dr. Pritasari Dewi Damayanti, Sp.OG, M.Kes', '081', '', 'Kebidanan & Kandungan', 'Pritasari', 'dd816e63eea2f524d4d13c6d96fa3239', 'dokter', 'upload/img_dGbaj2X.jpg'),
(8, 'dr. Rudi Kristianto, Sp.B', '081', '', 'Bedah Umum', 'Rudi', '06c572878f11d3b55bcc9fcb9476f26e', 'dokter', 'upload/img_uWhwigf.jpg'),
(9, 'dr. Siti Farida Setyaningrum, Sp.S', '081', '', 'Saraf', 'Siti', '95ad0f83653fdb01ed928a4aad362eec', 'dokter', 'upload/img_1bVnFr9.jpg'),
(10, 'dr. Muhammad Mukhson, Sp.A', '081', '', 'Anak', 'Mukhson', '9cf540e5292f9cb7ed0bba489531a420', 'dokter', 'upload/img_W3rhU7p.jpg'),
(11, 'dr. M. Targib Alatas, Sp.BS', '081', '', 'Bedah Saraf', 'Targib', 'aac2e5a51cea40f165453a3dbb50581c', 'dokter', 'upload/img_ErKgnIp.png'),
(12, 'dr. Andi Lestiono, Sp.BA', '081', '', 'Bedah Anak', 'Andi', '5f1d0630d2deaa9f541131a857240ac0', 'dokter', 'upload/img_KF79lkT.jpg'),
(13, 'dr. Dani Amalia Arifin, M.H, M.Sc., Sp.PK', '081', '', 'Patologi Klinik', 'Dani', '0b2cc82e6a177b18faefd88581b8597d', 'dokter', 'upload/img_9EuL21e.jpg'),
(14, 'dr. Achmad Yudha Aditya Pratama, Sp.A, M.Kes', '08222876', 'RS.JIH', 'Spesialis anak', 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'dokter', 'upload/img_HriGdWo (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `katalog_id` int(11) NOT NULL,
  `nm_katalog` varchar(100) NOT NULL,
  `kandungan` varchar(200) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`katalog_id`, `nm_katalog`, `kandungan`, `deskripsi`, `harga`, `stok`, `img`) VALUES
(15, 'BODREXIN TABLET', 'Paracetamol, Phenylephrine HCl, dan Chlorpheniramine Maleate, Guaifenesin, dan Bromhexine HCl.', 'Untuk meringankan gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin.', 3000, 30, 'upload/74a33a896ef2ae5453c19d091c166f68049d97fd-original.jpg'),
(16, 'Tolak Angin JRG', 'Kandungan jahe, panax ginseng, akar manis, kunyit, dan biji pala', 'Kandungan jahe, panax ginseng, akar manis, kunyit, dan biji pala di dalam Antangin JRG berisiko menyebabkan perdarahan rahim atau kontraksi, keguguran, kelahiran prematur, hingga cacat lahir. Jangan m', 3700, 20, 'upload/OIP (9).jpg'),
(18, 'Mixagrip flu tablet obat batuk flu bok 25 strp@4 tablet', 'Paracetamol, Phenylephrine HCl, dan Chlorpheniramine Maleate. ', 'Untuk meringankan gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin.', 2700, 17, 'upload/PIM-1629953832926-6550b77e-3ee0-4956-91d6-dd772a7d8629_v1-small.jpg'),
(19, 'BODREXIN SIRUP', 'Paracetamol, Phenylephrine HCl, dan Chlorpheniramine Maleate, Guaifenesin, dan Bromhexine HCl.', 'Untuk meringankan gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin.', 13000, 35, 'upload/59a976448263b15d982acbb60ca11aa8_tn.jpg'),
(20, 'INZANA', 'Acetylsalicylic Acid.', 'Untuk penurun panas, demam, serta pereda nyeri pada anak.', 3000, 45, 'upload/R.png'),
(21, 'OBH COMBI', 'Succus Liquiritiae Extract, Paracetamol, Ammonium Chloride, Ephedrine HCl, dan  Chlorpheniramine Maleate.', 'Untuk meredakan batuk yang disertai gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat, dan bersin-bersin.', 23000, 20, 'upload/229340_22-9-2021_10-23-57-1665772297.png'),
(22, 'INSTO', 'Hypromellose', 'Untuk mengatasi kekeringan pada mata dan sebagai pelumas mata', 18000, 30, 'upload/ce43e6beb82f14863480de5bc4f2d348.jpg'),
(23, 'BETADINE', 'Povidone Iodine', 'Cairan antiseptik pada luka untuk membunuh kuman penyebab infeksi.', 7000, 30, 'upload/00000699_BetadineSolution15ML.jpg'),
(24, 'DIAPET', 'Daun jambu biji, kunyit, buah mojokeling, dan kulit buah delima', 'Mengatasi diare', 5000, 30, 'upload/OIP (9).jpg'),
(25, 'TERMOREX', 'paracetamol, pseudoephedrine HCl, guaifenesin (gliseril guaiakolat), chlorpheniramine maleate', 'Meredakan demam, nyeri, serta gejala flu dan batuk', 4000, 15, 'upload/Termorex_60_ml_Sirup___Paracetamol___Obat_Demam__Sakit_Kepal.jpg'),
(26, 'CURVIT ANAK', 'Vitamin B1 3 mg, Vitamin B2 2 mg, Vitamin B6 5 mg, Vitamin B12 5 mcg, ?-carotene 4 mg, dexpanthenol 3 mg, curcuminoid 2 mg, Ca gluconate 300 mg. choline bitartrate 150 mg, vitamin B6 2 mg', 'Menambah nafsu makan anak', 18000, 28, 'upload/b28260823ea8797ae2f5fc869449e410.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `obat` varchar(200) NOT NULL,
  `total` int(20) NOT NULL,
  `resep` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` varchar(35) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nm_katalog` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `total` int(50) NOT NULL,
  `status_byr` varchar(50) NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_by` varchar(100) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nm_katalog`, `harga`, `jml_beli`, `total`, `status_byr`, `insert_at`, `update_by`, `update_at`) VALUES
(8, 2, 'Actifed Plus Cough Supressant Sirup 60 ml (Merah)', 50900, 1, 50900, 'Belum Bayar', '2022-10-17 02:32:55', '2', '2022-10-26 15:36:11'),
(9, 1, 'Actifed Plus Cough Supressant Sirup 60 ml (Merah)', 50900, 3, 152700, 'Bayar', '2022-10-26 15:38:23', '--', '2022-10-26 15:38:33'),
(10, 2, 'Mixagrip flu tablet obat batuk flu bok 25 strp@4 tablet', 2700, 3, 8100, 'Belum Bayar', '2023-12-11 05:11:36', '--', '2023-12-11 05:11:36'),
(11, 2, 'Actifed Plus Cough Supressant Sirup 60 ml (Merah)', 50900, 2, 101800, 'Belum Bayar', '2023-12-11 05:12:17', '--', '2023-12-11 05:12:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`katalog_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `katalog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

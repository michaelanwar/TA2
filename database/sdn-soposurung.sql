-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-80432-db.mysql-80432:13108
-- Generation Time: Jun 23, 2022 at 04:40 AM
-- Server version: 8.0.26
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdn-soposurung`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', '2022-04-25 15:45:21', NULL),
(2, 15, 'Michael', '2022-05-14 13:24:44', '2022-05-15 13:54:47'),
(6, 25, 'Tupperware', '2022-05-15 19:24:39', '2022-05-15 19:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `assign_kelas_guru`
--

CREATE TABLE `assign_kelas_guru` (
  `id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `guru_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_kelas_guru`
--

INSERT INTO `assign_kelas_guru` (`id`, `kelas_id`, `guru_id`, `created_at`, `update_at`) VALUES
(1, 1, 1, '2022-04-25 16:45:18', NULL),
(2, 1, 2, '2022-04-25 16:46:52', NULL),
(3, 1, 3, '2022-04-25 16:50:22', NULL),
(4, 1, 4, '2022-04-26 03:49:13', NULL),
(5, 1, 5, '2022-04-26 03:49:13', NULL),
(6, 2, 1, '2022-05-11 17:54:26', NULL),
(7, 2, 4, '2022-05-11 18:02:28', NULL),
(8, 4, 5, '2022-05-11 18:13:39', NULL),
(9, 2, 2, '2022-05-15 15:36:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_kelas_siswa`
--

CREATE TABLE `assign_kelas_siswa` (
  `id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `siswa_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_kelas_siswa`
--

INSERT INTO `assign_kelas_siswa` (`id`, `kelas_id`, `siswa_id`, `created_at`, `update_at`) VALUES
(1, 1, 1, '2022-04-25 15:58:45', NULL),
(2, 1, 2, '2022-04-26 07:20:44', NULL),
(3, 4, 3, '2022-05-11 20:09:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_mapel_kelas`
--

CREATE TABLE `assign_mapel_kelas` (
  `id` int NOT NULL,
  `mapel_id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_mapel_kelas`
--

INSERT INTO `assign_mapel_kelas` (`id`, `mapel_id`, `kelas_id`, `created_at`, `update_at`) VALUES
(1, 1, 1, '2022-04-25 16:14:34', NULL),
(2, 2, 1, '2022-04-25 16:14:34', NULL),
(3, 5, 1, '2022-04-26 03:03:31', NULL),
(4, 6, 1, '2022-04-26 03:03:31', NULL),
(5, 7, 1, '2022-04-26 03:04:40', NULL),
(6, 1, 2, '2022-05-15 16:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_mapel_kelas_guru`
--

CREATE TABLE `assign_mapel_kelas_guru` (
  `id` int NOT NULL,
  `assign_mapel_kelas_id` int NOT NULL,
  `assign_kelas_guru_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_mapel_kelas_guru`
--

INSERT INTO `assign_mapel_kelas_guru` (`id`, `assign_mapel_kelas_id`, `assign_kelas_guru_id`, `created_at`, `update_at`) VALUES
(1, 1, 1, '2022-04-25 16:52:56', NULL),
(2, 2, 2, '2022-04-25 16:52:56', NULL),
(3, 3, 3, '2022-04-26 03:06:51', NULL),
(4, 4, 4, '2022-04-26 03:49:28', NULL),
(5, 5, 5, '2022-04-26 03:49:28', NULL),
(6, 6, 6, '2022-05-15 16:27:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_mapel_kelas_guru_bab`
--

CREATE TABLE `assign_mapel_kelas_guru_bab` (
  `id` int NOT NULL,
  `assign_mapel_kelas_guru_id` int NOT NULL,
  `bab_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_mapel_kelas_guru_bab`
--

INSERT INTO `assign_mapel_kelas_guru_bab` (`id`, `assign_mapel_kelas_guru_id`, `bab_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-26 02:30:35', NULL),
(2, 1, 2, '2022-04-26 02:30:54', NULL),
(3, 2, 1, '2022-04-26 02:30:54', NULL),
(12, 1, 3, '2022-05-10 12:01:56', '2022-05-10 12:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `bab`
--

CREATE TABLE `bab` (
  `id` int NOT NULL,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bab`
--

INSERT INTO `bab` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bab I', '2022-04-26 02:29:45', NULL),
(2, 'Bab II', '2022-04-26 02:30:03', NULL),
(3, 'Bab III', '2022-04-26 02:30:03', NULL),
(4, 'Bab IV', '2022-04-26 02:30:13', NULL),
(5, 'Bab V', '2022-04-26 02:30:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_pengumuman`
--

CREATE TABLE `file_pengumuman` (
  `id` int NOT NULL,
  `pengumuman_id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama` varchar(141) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nama`, `gambar`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 3, 'Anto Siakangan M.Th', NULL, 'Huta Gijang', '2022-04-25 09:16:16', NULL),
(2, 4, 'Adrian Butar-butar M.Pd', NULL, 'Huta Tanjak', '2022-04-25 16:46:34', NULL),
(3, 5, 'Andoko Hutahean S.Pd', NULL, 'Huta Padang', '2022-04-26 03:06:55', NULL),
(4, 6, 'Andini Sirait S.Pd', NULL, 'Huta toru', '2022-04-26 03:47:50', NULL),
(5, 7, 'Irine Sinaga S.Pd', NULL, 'Huta tongah', '2022-04-26 03:47:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kelas I', '2022-04-25 09:17:07', NULL),
(2, 'Kelas II', '2022-04-25 09:17:51', NULL),
(3, 'Kelas III', '2022-04-25 09:17:51', NULL),
(4, 'Kelas IV', '2022-04-25 09:18:13', NULL),
(5, 'Kelas V', '2022-04-25 09:18:13', NULL),
(6, 'Kelas VI', '2022-04-25 09:18:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int NOT NULL,
  `nama` varchar(141) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Agama', '2022-04-25 09:18:44', NULL),
(2, 'Bahasa Indonesia', '2022-04-25 09:18:44', NULL),
(3, 'Pendidikan Kewarganegaraan (PKN)', '2022-04-25 09:19:17', NULL),
(4, 'Matematika (MM)', '2022-04-25 09:19:17', NULL),
(5, 'Bahasa Ingriss', '2022-04-25 09:19:42', NULL),
(6, 'Ilmu Pengetahuan Alam (IPA)', '2022-04-25 09:19:42', NULL),
(7, 'Ilmu Pengetahuan Sosial (IPS)', '2022-04-25 09:20:38', NULL),
(8, 'pendidikan jasmani olahraga dan kesehatan (PenJasKes)', '2022-04-25 09:20:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int NOT NULL,
  `assign_mapel_kelas_guru_bab_id` int NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `judul` varchar(141) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `assign_mapel_kelas_guru_bab_id`, `banner`, `link`, `judul`, `deskripsi`, `nama_file`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'https://www.youtube.com/watch?v=6APj-kiYPfY', 'Menghormati Orang yang Lebih tua di lingkungan sekitar', 'materi hari ini adalah mengenai \"Menghormati orang yang lebih tua\".\r\nDownload file nya ya anak anak,lalu buka halaman 45\r\n\r\nNah untuk tugas kalian download modul tugas yang ada dibawah, lalu kerjakan sesuai instruksi yang diberikan.\r\n\r\nJika ada pertanyaan tanyakan melalui WA ya anak anak\r\n', 'agama_kristen_kelas_2sd.pdf', '2022-05-10 06:46:49', '2022-05-10 12:48:44'),
(2, 1, NULL, 'https://www.youtube.com/watch?v=b20KQMJnu5Y', 'Saling Mengasihi Anggota Keluarga', 'Materi:\r\nPengantar\r\nMendengarkan Cerita\r\nMenempel Gambar\r\nMengasihi Melalui Sikap Berbagi\r\nAku Mau Melakukan\r\nTugas Rumah', 'agama_kristen_kelas_2sd.pdf', '2022-05-10 06:46:49', '2022-05-13 06:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `materi_tugas`
--

CREATE TABLE `materi_tugas` (
  `id` int NOT NULL,
  `materi_id` int NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `deadline_1` timestamp NOT NULL,
  `deadline_2` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi_tugas`
--

INSERT INTO `materi_tugas` (`id`, `materi_id`, `nama_file`, `deadline_1`, `deadline_2`, `created_at`, `updated_at`) VALUES
(4, 1, '7657acdfa96fc3490fe5a2ffe10dccc7.pdf', '2022-05-16 17:08:00', '2022-05-16 17:10:00', '2022-05-11 17:49:17', '2022-05-16 11:30:46'),
(5, 2, '2539ae36e28782760436ee54625f2083.pdf', '2022-05-24 23:59:00', '2022-05-16 20:00:00', '2022-05-13 06:05:20', '2022-05-16 09:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `materi_tugas_submit`
--

CREATE TABLE `materi_tugas_submit` (
  `id` int NOT NULL,
  `materi_tugas_id` int NOT NULL,
  `siswa_id` int NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi_tugas_submit`
--

INSERT INTO `materi_tugas_submit` (`id`, `materi_tugas_id`, `siswa_id`, `nama_file`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '36b2955a2fd7a456dce4fa13207272fb.JPG', '2022-05-11 17:05:37', '2022-05-16 17:07:18'),
(4, 5, 1, '151b7bbf2d5cae1ea47eb52c9a5492ee.JPG', '2022-05-15 17:30:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `author` int NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `judul` varchar(141) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `author`, `banner`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'c9e2a226dbdf2873830b4c0056999a36.png', 'Pengumuman Libur Natal 2022 &Tahun baru 2023', 'Kepada Siswa/Siswi SD N Sopsurung.Kami sampaikan bahwa SD N Soposurung libur sejak 20 Desember 2022 sampai 10 Januari 2023.Untuk lebih lanjut dapat mengunduh lampiran  yang di upload dibawah.Diharapkan Siswa/Siswi sekalian memberitahu pengumuman ini kepada Orang Tua masing masing agar tidak ada kekeliruan.Terimakasih', '2022-04-26 04:07:25', '2022-04-26 14:45:37'),
(2, 1, '65f20075ac5ea75036c59fbc53be3d21.png', 'Perlombaan Olimpiade Nasional, Science dan Soscial', 'Kepada siswa / siswi kami kelas 5-6, yang tertarik untuk mengikuti perlombaan Science dan Sosial dari Kemendikbud dapat mendaftarkan diri ke Ibu Andini Sirait.Pihak sekolah akan terlebih dahulu melakukan seleksi internal untuk dapat mewakili SD N Sopsurung di tingkat kecamatan.', '2022-04-26 04:07:25', '2022-04-26 14:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-05-14 09:29:44', NULL),
(2, 'guru', '2022-05-14 09:29:44', NULL),
(3, 'siswa', '2022-05-14 09:29:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama` varchar(141) NOT NULL,
  `alamat` text,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `gambar`, `nama`, `alamat`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(1, 8, 'fa3beb81b19cadf7744dc85213c144f7.JPG', 'Amelia Sitanggangs2', 'Cengkareng Barat, Jakarta Barat', '2022-03-19', '2022-04-25 09:13:20', '2022-05-16 12:14:43'),
(2, 9, 'no-image.png', 'Yedija Sianipar', 'Laguboti', '2022-04-01', '2022-04-26 06:37:22', NULL),
(3, 10, 'no-image.png', 'Yedija 1', 'Del', '2022-05-11', '2022-05-11 20:01:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(141) NOT NULL,
  `password` varchar(141) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@example.test', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2022-05-14 09:28:20', NULL),
(2, 'sutarjo@gmail.com', 'ee440435480513b57d86a033448d214413babfb6', '2022-05-14 09:28:20', NULL),
(3, 'anto@gmail.com', '6d0cee163ee3703c665a882b900523fd28f0d9a1', '2022-05-14 09:28:20', NULL),
(4, 'sitinjak@gmail.com', '65dc778fb75a29d8152cca37c02542c3320aae96', '2022-05-14 09:28:20', NULL),
(5, 'andoko@gmail.com', '2535c0b6759737f6f0830349e177c7eb45137e0d', '2022-05-14 09:28:20', NULL),
(6, 'andini@gmail.com', 'e6d520174335c25c6bcab922e10f02454e462ee9', '2022-05-14 09:28:20', NULL),
(7, 'irine@gmail.com', 'c2ff18e3dffba65b33a35f29c3f5e3b0fa6e80d4', '2022-05-14 09:28:20', NULL),
(8, 'amelia@gmail.com', 'ee440435480513b57d86a033448d214413babfb6', '2022-05-14 09:28:20', NULL),
(9, 'yedija@gmail.com', '2c50f3b6202612854415dbbb97788f94adf22b6c', '2022-05-14 09:28:20', NULL),
(10, 'yedija1@gmail.com', 'c9e67266018d2cbc615d1e63f6bc3df55773e2f2', '2022-05-14 09:28:20', NULL),
(11, 'yedija2@gmail.com', '6083aadbd6dd8bf664e856c821465e4ba8c7376f', '2022-05-14 09:28:20', NULL),
(15, 'michael@gmail.com', '667641b92ceae6bd7443b8f8c9deb1df46a3e78c', '2022-05-14 13:24:42', '2022-05-14 14:38:57'),
(18, 'johndoe@gmail.com', 'ae2b299b1c065b186f8d50869097cbff26ea283b', '2022-05-14 11:43:37', NULL),
(19, 'lorem@gmail.com', '913244d501f31552629228bf0094a47d61caf9b4', '2022-05-14 11:45:44', NULL),
(25, 'test@gmail.com', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', '2022-05-15 19:24:38', '2022-05-15 19:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-14 09:43:14', NULL),
(2, 2, 2, '2022-05-14 09:43:14', NULL),
(3, 3, 2, '2022-05-14 09:43:14', NULL),
(4, 4, 2, '2022-05-14 09:43:14', NULL),
(5, 5, 2, '2022-05-14 09:43:14', NULL),
(6, 6, 2, '2022-05-14 09:43:14', NULL),
(7, 7, 2, '2022-05-14 09:43:14', NULL),
(8, 8, 3, '2022-05-14 09:43:14', NULL),
(9, 9, 3, '2022-05-14 09:43:14', NULL),
(10, 10, 3, '2022-05-14 09:43:14', NULL),
(11, 11, 3, '2022-05-14 09:43:14', NULL),
(13, 15, 1, '2022-05-14 13:24:43', '2022-05-14 13:24:43'),
(15, 18, 3, '2022-05-14 11:43:38', NULL),
(16, 19, 3, '2022-05-14 11:45:45', NULL),
(22, 25, 1, '2022-05-15 19:24:39', '2022-05-15 19:24:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_admin_ibfk1` (`user_id`);

--
-- Indexes for table `assign_kelas_guru`
--
ALTER TABLE `assign_kelas_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akg_k` (`kelas_id`),
  ADD KEY `akg_g` (`guru_id`);

--
-- Indexes for table `assign_kelas_siswa`
--
ALTER TABLE `assign_kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aks_s` (`siswa_id`),
  ADD KEY `aks_k` (`kelas_id`);

--
-- Indexes for table `assign_mapel_kelas`
--
ALTER TABLE `assign_mapel_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amk_m` (`mapel_id`),
  ADD KEY `amk_k` (`kelas_id`);

--
-- Indexes for table `assign_mapel_kelas_guru`
--
ALTER TABLE `assign_mapel_kelas_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amkg_akg` (`assign_kelas_guru_id`),
  ADD KEY `amkg_akm` (`assign_mapel_kelas_id`);

--
-- Indexes for table `assign_mapel_kelas_guru_bab`
--
ALTER TABLE `assign_mapel_kelas_guru_bab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amkgb_amkg` (`assign_mapel_kelas_guru_id`),
  ADD KEY `amkgb_b` (`bab_id`);

--
-- Indexes for table `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_pengumuman`
--
ALTER TABLE `file_pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fp_p` (`pengumuman_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_user_id_ibfk1` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amkgb_m` (`assign_mapel_kelas_guru_bab_id`);

--
-- Indexes for table `materi_tugas`
--
ALTER TABLE `materi_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_id_ibfk1` (`materi_id`);

--
-- Indexes for table `materi_tugas_submit`
--
ALTER TABLE `materi_tugas_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_tugas_id_ibfk1` (`materi_tugas_id`),
  ADD KEY `siswa_id_ibfk1` (`siswa_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_p` (`author`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_user_id_ibfk1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_role_id_ibfk1` (`role_id`),
  ADD KEY `role_user_id_ibfk1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_kelas_guru`
--
ALTER TABLE `assign_kelas_guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assign_kelas_siswa`
--
ALTER TABLE `assign_kelas_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_mapel_kelas`
--
ALTER TABLE `assign_mapel_kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_mapel_kelas_guru`
--
ALTER TABLE `assign_mapel_kelas_guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_mapel_kelas_guru_bab`
--
ALTER TABLE `assign_mapel_kelas_guru_bab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bab`
--
ALTER TABLE `bab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `file_pengumuman`
--
ALTER TABLE `file_pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `materi_tugas`
--
ALTER TABLE `materi_tugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi_tugas_submit`
--
ALTER TABLE `materi_tugas_submit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `user_admin_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_kelas_guru`
--
ALTER TABLE `assign_kelas_guru`
  ADD CONSTRAINT `akg_g` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akg_k` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_kelas_siswa`
--
ALTER TABLE `assign_kelas_siswa`
  ADD CONSTRAINT `aks_k` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aks_s` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_mapel_kelas`
--
ALTER TABLE `assign_mapel_kelas`
  ADD CONSTRAINT `amk_k` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amk_m` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_mapel_kelas_guru`
--
ALTER TABLE `assign_mapel_kelas_guru`
  ADD CONSTRAINT `amkg_akg` FOREIGN KEY (`assign_kelas_guru_id`) REFERENCES `assign_kelas_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amkg_akm` FOREIGN KEY (`assign_mapel_kelas_id`) REFERENCES `assign_mapel_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_mapel_kelas_guru_bab`
--
ALTER TABLE `assign_mapel_kelas_guru_bab`
  ADD CONSTRAINT `amkgb_amkg` FOREIGN KEY (`assign_mapel_kelas_guru_id`) REFERENCES `assign_mapel_kelas_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amkgb_b` FOREIGN KEY (`bab_id`) REFERENCES `bab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_pengumuman`
--
ALTER TABLE `file_pengumuman`
  ADD CONSTRAINT `fp_p` FOREIGN KEY (`pengumuman_id`) REFERENCES `pengumuman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_user_id_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `amkgb_m` FOREIGN KEY (`assign_mapel_kelas_guru_bab_id`) REFERENCES `assign_mapel_kelas_guru_bab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi_tugas`
--
ALTER TABLE `materi_tugas`
  ADD CONSTRAINT `materi_id_ibfk1` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi_tugas_submit`
--
ALTER TABLE `materi_tugas_submit`
  ADD CONSTRAINT `materi_tugas_id_ibfk1` FOREIGN KEY (`materi_tugas_id`) REFERENCES `materi_tugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_id_ibfk1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `a_p` FOREIGN KEY (`author`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_user_id_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `role_role_id_ibfk1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `role_user_id_ibfk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

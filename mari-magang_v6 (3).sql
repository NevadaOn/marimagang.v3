-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2025 at 09:17 AM
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
-- Database: `mari-magang.v6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','admin_bidang','admin_dinas') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$12$JD1SHLDiR0AxOeH/TMexzO8iyvX6srzJ3Mnzr/98ElV9UXwa4asIu', 'superadmin', 1, NULL, '2025-06-27 11:28:04', '2025-06-28 07:06:30'),
(3, 'Admin Aptika', 'aptika@gmail.com', NULL, '$2y$12$KqX2ibb2n4h3DsT41cJatObFqM1piP7zszwILPCQt5Z16qv3p09zi', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-07-02 20:33:20'),
(4, 'Admin Infrastruktur', 'infrastruktur@gmail.com', NULL, '$2y$10$LnPPyumT.CsMzF7mA27.SekWK0s.4bbPdZwKcT01LKYe3qOn/ZQIu', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(5, 'Admin Komunikasi', 'komunikasi@gmail.com', NULL, '$2y$10$QgduF0Gr/H/MKpWmtca2..q8s2LBl0Weu6fVulRyhDGj.SXEY9DeO', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(6, 'Admin Statistik', 'statistik@gmail.com', NULL, '$2y$12$CQfbZdZdD62lvU5APJZASeEg3VcE6tal3TI.AtwrmMD45RNv8zOzi', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-07-02 23:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `skill` text DEFAULT NULL,
  `universitas` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `role` enum('ketua','anggota') DEFAULT 'anggota',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `pengajuan_id`, `nama`, `nim`, `skill`, `universitas`, `prodi`, `fakultas`, `email`, `no_hp`, `role`, `created_at`, `updated_at`) VALUES
(11, 34, 'Arfan Nur Ivandi', '22552021032', NULL, 'Universitas Islam Raden Rahmat Malang', NULL, NULL, 'arfanvn@gmail.com', '085171015681', 'ketua', '2025-08-06 01:04:45', '2025-08-06 01:04:45'),
(12, 34, 'arfan ivan', '22552021022', 'ssdfdfdgdfgf', 'Universitas Islam Raden Rahmat Malang', NULL, NULL, 'arfanv@gm.ak', '08652332344565', 'anggota', '2025-08-06 01:04:45', '2025-08-06 01:04:45'),
(13, 41, 'arfannn', 'sdfdfdg', NULL, 'Universitas Islam Raden Rahmat Malang', NULL, NULL, 'ivanarfan57@gmail.com', '08813303251', 'ketua', '2025-08-06 21:06:31', '2025-08-06 21:06:31'),
(14, 41, 'fdgf', '56675675', 'php', 'Universitas Islam Raden Rahmat Malang', NULL, NULL, 'd@gmail.com', '5667467', 'anggota', '2025-08-06 21:06:31', '2025-08-06 21:06:31'),
(15, 41, 'qwe', '5435345345', 'java', 'Universitas Islam Raden Rahmat Malang', NULL, NULL, 'a@gmail.com', '877878778', 'anggota', '2025-08-06 21:06:31', '2025-08-06 21:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `sender_type` varchar(255) DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_type` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `databidang`
--

CREATE TABLE `databidang` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('buka','tutup') NOT NULL DEFAULT 'buka',
  `kuota` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `kuota_terisi` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `databidang`
--

INSERT INTO `databidang` (`id`, `admin_id`, `nama`, `slug`, `thumbnail`, `photo`, `deskripsi`, `status`, `kuota`, `kuota_terisi`, `created_at`, `updated_at`) VALUES
(2, 3, 'Aplikasi Informatika', 'aplikasi-informatika', 'thumbnails/RXt7jqVqupf5ViZ7OX7XKnIg8mUJ18nkOsXr31Af.jpg', 'bidang/photos/aptika.jpg', 'Bidang yang berfokus pada pengembangan, pengelolaan, dan pemanfaatan aplikasi serta sistem informatika.', 'buka', 5, 0, '2025-06-27 11:28:04', '2025-07-16 20:16:06'),
(3, 4, 'Infrastruktur Jaringan', 'infrastruktur-jaringan', 'thumbnails/bkIwQ7wU0FBWVrqUT699YBq2s0t5gxLGIS7gBSAD.png', 'bidang/photos/infrastruktur.jpg', 'Bidang yang berfokus pada perencanaan, pembangunan, pengelolaan, dan pemeliharaan jaringan komunikasi data.', 'buka', 5, 0, '2025-06-27 11:28:04', '2025-07-16 18:21:55'),
(4, 5, 'Komunikasi dan Konten', 'komunikasi-konten', 'bidang/thumbnails/komunikasi.jpg', 'bidang/photos/komunikasi.jpg', 'Bidang yang berfokus pada pembuatan, pengelolaan, dan distribusi konten media sosial.', 'buka', 5, 0, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(5, 6, 'Statistik dan Data', 'statistik-data', NULL, NULL, 'Bidang yang berfokus pada analisis dan penyajian data untuk pengambilan keputusan.', 'buka', 5, 0, '2025-06-27 11:28:04', '2025-07-03 19:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) DEFAULT NULL,
  `judul_project` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentation_images`
--

CREATE TABLE `documentation_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documentation_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logbooks`
--

CREATE TABLE `logbooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `kegiatan` text NOT NULL,
  `progress` text DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_06_28_132628_create_sessions_table', 1),
(2, '2025_06_30_145138_create_cache_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'info',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `message`, `type`, `data`, `is_read`, `created_at`, `updated_at`) VALUES
(79, 22, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: hj', 'skill_added', '{\"skill_name\":\"hj\"}', 0, '2025-08-06 00:42:33', '2025-08-06 00:42:33'),
(80, 22, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-08-06 01:02:46', '2025-08-06 01:02:46'),
(81, 22, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: informatika', 'skill_added', '{\"skill_name\":\"informatika\"}', 0, '2025-08-06 01:03:12', '2025-08-06 01:03:12'),
(82, 22, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":34}', 0, '2025-08-06 01:04:45', '2025-08-06 01:04:45'),
(83, 22, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":34,\"kode_pengajuan\":\"MGG-2025-13AUX0\",\"url\":\"http:\\/\\/172.16.1.4:8000\\/pengajuan\\/MGG-2025-13AUX0\"}', 0, '2025-08-06 04:12:16', '2025-08-06 04:12:16'),
(84, 22, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":34,\"kode_pengajuan\":\"MGG-2025-13AUX0\",\"url\":\"http:\\/\\/172.16.1.4:8000\\/pengajuan\\/MGG-2025-13AUX0\"}', 0, '2025-08-06 04:14:14', '2025-08-06 04:14:14'),
(85, 22, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":34,\"kode_pengajuan\":\"MGG-2025-13AUX0\",\"url\":\"http:\\/\\/172.16.1.4:8000\\/pengajuan\\/MGG-2025-13AUX0\"}', 0, '2025-08-06 04:18:24', '2025-08-06 04:18:24'),
(86, 23, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-08-06 12:20:58', '2025-08-06 12:20:58'),
(87, 23, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: vbvn', 'skill_added', '{\"skill_name\":\"vbvn\"}', 0, '2025-08-06 12:21:10', '2025-08-06 12:21:10'),
(88, 23, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":39}', 0, '2025-08-06 12:21:48', '2025-08-06 12:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('skafajar3@gmail.com', '$2y$12$SkycP9pLo4E1iqWFK/SgM.FHVd.i30cZb2dH2LoKMv4pJkAdO3VEm', '2025-07-16 21:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `databidang_id` int(10) UNSIGNED NOT NULL,
  `kode_pengajuan` varchar(20) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('diproses','diteruskan','diterima','ditolak','magang','selesai','dibatalkan') NOT NULL,
  `surat_pdf` varchar(255) DEFAULT NULL,
  `form_kesediaan_magang` varchar(255) DEFAULT NULL,
  `komentar_admin` text DEFAULT NULL,
  `nilai_akhir` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `user_id`, `databidang_id`, `kode_pengajuan`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `status`, `surat_pdf`, `form_kesediaan_magang`, `komentar_admin`, `nilai_akhir`, `created_at`, `updated_at`) VALUES
(34, 22, 3, 'MGG-2025-13AUX0', NULL, '2025-08-07', '2025-09-06', 'dibatalkan', 'surat_pengajuan/surat_MGG-2025-13AUX0.pdf', NULL, NULL, NULL, '2025-08-06 01:04:44', '2025-08-06 08:33:01'),
(35, 22, 4, 'MGG-2025-RSBII6', NULL, '2025-08-15', '2025-08-30', 'dibatalkan', NULL, NULL, NULL, NULL, '2025-08-06 08:40:43', '2025-08-06 08:40:58'),
(36, 22, 3, 'MGG-2025-XBEXIV', NULL, '2025-08-15', '2025-09-06', 'dibatalkan', NULL, NULL, NULL, NULL, '2025-08-06 10:11:53', '2025-08-06 10:38:18'),
(37, 22, 5, 'MGG-2025-HPYEBK', NULL, '2025-08-15', '2025-09-06', 'diterima', 'surat_pengajuan/surat_MGG-2025-HPYEBK.pdf', NULL, NULL, NULL, '2025-08-06 10:58:29', '2025-08-06 12:04:14'),
(38, 22, 5, 'MGG-2025-9H8UP9', NULL, '2025-08-09', '2025-09-06', 'diterima', 'surat_pengajuan/surat_MGG-2025-9H8UP9.pdf', NULL, NULL, NULL, '2025-08-06 11:00:39', '2025-08-06 20:38:26'),
(39, 23, 4, 'MGG-2025-YYHSUD', NULL, '2025-08-15', '2025-09-20', 'ditolak', NULL, NULL, NULL, NULL, '2025-08-06 12:21:48', '2025-08-06 21:00:07'),
(40, 23, 5, 'MGG-2025-AWQPQI', NULL, '2025-08-14', '2025-08-30', 'dibatalkan', NULL, NULL, NULL, NULL, '2025-08-06 21:03:43', '2025-08-06 21:04:03'),
(41, 23, 2, 'MGG-2025-ZHLXK8', NULL, '2025-08-07', '2025-09-05', 'ditolak', 'surat_pengajuan/surat_MGG-2025-ZHLXK8.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-ZHLXK8.pdf', NULL, NULL, '2025-08-06 21:06:31', '2025-08-06 21:14:14'),
(42, 23, 2, 'MGG-2025-EAIDZC', NULL, '2025-08-07', '2025-08-31', 'diproses', NULL, NULL, NULL, NULL, '2025-08-06 21:15:11', '2025-08-06 21:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_documents`
--

CREATE TABLE `pengajuan_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_size` int(10) UNSIGNED DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_documents`
--

INSERT INTO `pengajuan_documents` (`id`, `pengajuan_id`, `document_type`, `file_name`, `file_path`, `file_size`, `uploaded_at`) VALUES
(76, 34, 'surat_pengantar', 'ARFAN NUR IVANDI-resume-1.pdf', 'dokumen_pengajuan/2rEOMFqTLPwHNFlx1RJ25EfnOBsK5n3SG2GIOcLh.pdf', 189707, '2025-08-06 01:04:44'),
(77, 34, 'proposal', 'ARFAN NUR IVANDI-resume-1.pdf', 'dokumen_pengajuan/JnNUrKhzX9OM7399BH3RCft0n3xfULRlVZi0FbNW.pdf', 189707, '2025-08-06 01:04:45'),
(78, 35, 'surat_pengantar', 'ARFAN NUR IVANDI-resume-1.pdf', 'dokumen_pengajuan/XIg7hl5YiSE2Y55gRfY8TlScCpNntwll0uE9Tr7Y.pdf', 189707, '2025-08-06 08:40:44'),
(79, 35, 'proposal', 'ARFAN NUR IVANDI-resume.pdf', 'dokumen_pengajuan/C6jOY5xPH6Lp518wWqPz7lBXabbsoDnyv7n9zJnN.pdf', 189706, '2025-08-06 08:40:45'),
(80, 36, 'surat_pengantar', 'Arfan nur ivandi.pdf', 'dokumen_pengajuan/fGHy2wjB1lbzLqIIY0zv2WFc8BilxRk3aaua9Ydj.pdf', 354732, '2025-08-06 10:11:53'),
(81, 36, 'proposal', 'ARFAN NUR IVANDI-resume.pdf', 'dokumen_pengajuan/CxUYEOLMyLxjo9ebo4508MHzGzZ7RaTCt1rcVSbw.pdf', 189706, '2025-08-06 10:11:53'),
(82, 37, 'surat_pengantar', 'ARFAN NUR IVANDI-resume.pdf', 'dokumen_pengajuan/9MlvTiLjGikkZx2Mki4hoy5IhARY6dTBhGNZZaFV.pdf', 189706, '2025-08-06 10:58:29'),
(83, 37, 'proposal', 'Arfan nur ivandi.pdf', 'dokumen_pengajuan/iyt3Uku8eweHC6f2Dj1YNYKGNMLflJpGXoUD5HXz.pdf', 354732, '2025-08-06 10:58:29'),
(84, 38, 'surat_pengantar', 'Arfan nur ivandi.pdf', 'dokumen_pengajuan/XDx3Gxd9JOQpM7BSMGUcdZ80vIXkD7JiBncc5eli.pdf', 354732, '2025-08-06 11:00:39'),
(85, 38, 'proposal', 'ARFAN NUR IVANDI-resume.pdf', 'dokumen_pengajuan/r1pnJwRgIX4nw5BZDAA8N2t4OfpcGoUIQlNXb76v.pdf', 189706, '2025-08-06 11:00:39'),
(86, 39, 'surat_pengantar', 'Arfan nur ivandi.pdf', 'dokumen_pengajuan/zBCjAzY4h9IeBueOmAbYAjQbikPSDEMKvg6x6qQR.pdf', 354732, '2025-08-06 12:21:48'),
(87, 39, 'proposal', 'ARFAN NUR IVANDI-resume.pdf', 'dokumen_pengajuan/2rp6O2ZC9tE2QWVVqQsxC9CmZhOjj8OYswNHkGuv.pdf', 189706, '2025-08-06 12:21:48'),
(88, 40, 'surat_pengantar', 'sertifikat_course_177_3607808_230225175442.pdf', 'dokumen_pengajuan/iNPV0PKOuAiLG1o9J4w5cRp8k9dwk8kqdSxR52R6.pdf', 928537, '2025-08-06 21:03:44'),
(89, 40, 'proposal', 'sertifikat_course_653_3607808_230225173000.pdf', 'dokumen_pengajuan/BXMwiroxk4Ar8Ou51v5rDsIohM6AzyJ9CHxxqT9U.pdf', 939249, '2025-08-06 21:03:44'),
(90, 41, 'surat_pengantar', 'Coursera 38JGETZ23FTQ.pdf', 'dokumen_pengajuan/aCd1Y4FzALyE5cNRUrBLahcj59jYDuYByJe2QWnd.pdf', 296856, '2025-08-06 21:06:31'),
(91, 41, 'proposal', 'Certificate-of-Completion-Introduction-to-Information-Security.pdf', 'dokumen_pengajuan/8TfCIoywooyXqxGIvriOf7aYA7NvjP3LdBSKxhGV.pdf', 462191, '2025-08-06 21:06:31'),
(92, 42, 'surat_pengantar', 'Certificate-of-Completion-Introduction-to-Information-Security.pdf', 'dokumen_pengajuan/HSlONK2SgtA99zdPUmrNejgmQMsP9orsqA40fVI3.pdf', 462191, '2025-08-06 21:15:11'),
(93, 42, 'proposal', 'Coursera 38JGETZ23FTQ.pdf', 'dokumen_pengajuan/VlAXcnoq5METJ4DmOiWrL542M3VzZCvsdmIE5FQh.pdf', 296856, '2025-08-06 21:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_status_history`
--

CREATE TABLE `pengajuan_status_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `status_from` varchar(20) DEFAULT NULL,
  `status_to` varchar(20) NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('48Elnxe2JTzs9Mk6CWZDlMlD2X4B26IfL1x0NUfk', 1, '172.16.1.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUVh2WmNRWDI4TUJLTDNWOEFIVlJ0SGE3anJNWFhTZVpPZW03SjdiMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xNzIuMTYuMS40OjgwMDAvYWRtaW4vY2hhdD91c2VyX2lkPTIzIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzg6Imh0dHA6Ly8xNzIuMTYuMS40OjgwMDAvY2hhdD91c2VyX2lkPTIyIjt9fQ==', 1754723738),
('e2ZIz36WEdJtlJS28TWYbZdmdfkLXrcLzNPISFSD', 22, '172.16.1.14', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:141.0) Gecko/20100101 Firefox/141.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicGFETE1hd2t0NkdEMWd1V0dhb0NWa0F3WjFxOEJzMTFseUMxYnBzbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xNzIuMTYuMS40OjgwMDAvY2hhdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIyO30=', 1754723732);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(10) UNSIGNED NOT NULL,
  `databidang_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `judul_proyek` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `link_project` varchar(255) DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `databidang_id`, `nama`, `judul_proyek`, `deskripsi`, `file_path`, `link_project`, `is_required`, `created_at`, `updated_at`) VALUES
(43, NULL, 'hj', NULL, NULL, NULL, NULL, 0, '2025-08-06 00:42:33', '2025-08-06 00:42:33'),
(44, NULL, 'informatika', NULL, NULL, NULL, NULL, 0, '2025-08-06 01:03:12', '2025-08-06 01:03:12'),
(45, NULL, 'vbvn', NULL, NULL, NULL, NULL, 0, '2025-08-06 12:21:10', '2025-08-06 12:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_universitas` varchar(200) NOT NULL,
  `fakultas` varchar(150) NOT NULL,
  `prodi` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id`, `nama_universitas`, `fakultas`, `prodi`, `created_at`, `updated_at`) VALUES
(42, 'Universitas Islam Raden Rahmat Malang', 'Sain dan Teknologi', 'Teknik Informatika', '2025-08-06 01:02:46', '2025-08-06 01:02:46'),
(43, 'Universitas Islam Raden Rahmat Malang', 'Fakultas Sains dan Teknologi', 'Teknik Informatika', '2025-08-06 12:20:58', '2025-08-06 12:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `universitas_id` int(10) UNSIGNED DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','suspended') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `universitas_id`, `nim`, `telepon`, `email`, `email_verified_at`, `password`, `foto`, `status`, `remember_token`, `created_at`, `updated_at`, `bio`, `alamat`) VALUES
(22, 'Arfan Nur Ivandi', 42, '22552021032', '085171015681', 'arfanvn@gmail.com', '2025-08-06 00:17:41', '$2y$12$mMbtBjDoIs2whilY1CFyx.QznsTM.sQGP9U1UxeLa4c5VRbvKh19K', 'foto_user/sVw35csjweT75Hye9xuh9ovBlbkou3tbCxvJGHzN.png', 'active', NULL, '2025-08-06 00:17:07', '2025-08-06 01:03:41', 'Saya adalah seorang mahasiswa yang berfokus untuk mengembangkan kemampuan di bidang informatikan dan komputer', 'Jl Sumbersari Panggungrejo Kepanjen Malang'),
(23, 'arfannn', 43, 'sdfdfdg', '08813303251', 'ivanarfan57@gmail.com', '2025-08-06 12:15:50', '$2y$12$R5a8Gp24vVGzZXWEZq2q4.ED9Z.RSCeP4hVRgctk041FGTtXI6jvC', 'foto_user/NitFUueuZyPloXbDB1TXta4PRnw6amWdJsJZHhmE.jpg', 'active', NULL, '2025-08-06 12:15:19', '2025-08-06 12:20:58', 'dsdfsdgfghtyh', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `pengajuan_id` int(10) UNSIGNED DEFAULT NULL,
  `skill_id` int(10) UNSIGNED NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `sertifikat_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `pengajuan_id`, `skill_id`, `level`, `sertifikat_path`, `created_at`, `updated_at`) VALUES
(32, 22, NULL, 43, 'Menengah', NULL, '2025-08-06 00:42:33', '2025-08-06 00:42:33'),
(33, 22, NULL, 44, 'Ahli', NULL, '2025-08-06 01:03:12', '2025-08-06 01:03:12'),
(34, 23, NULL, 45, 'Menengah', NULL, '2025-08-06 12:21:10', '2025-08-06 12:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_admin_email` (`email`),
  ADD KEY `idx_role_active` (`role`,`is_active`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `databidang`
--
ALTER TABLE `databidang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_slug` (`slug`),
  ADD KEY `idx_admin_id` (`admin_id`),
  ADD KEY `idx_status_kuota` (`status`,`kuota_terisi`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentation_images`
--
ALTER TABLE `documentation_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentation_id` (`documentation_id`);

--
-- Indexes for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pengajuan_id` (`pengajuan_id`),
  ADD KEY `idx_tanggal` (`tanggal`),
  ADD KEY `idx_approved` (`is_approved`),
  ADD KEY `idx_approved_by` (`approved_by`),
  ADD KEY `idx_logbooks_composite` (`pengajuan_id`,`tanggal`,`is_approved`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_is_read` (`is_read`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_user_read` (`user_id`,`is_read`),
  ADD KEY `idx_notifications_composite` (`user_id`,`is_read`,`created_at`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD KEY `password_reset_tokens_email_index` (`email`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_kode_pengajuan` (`kode_pengajuan`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_databidang_id` (`databidang_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_tanggal` (`tanggal_mulai`,`tanggal_selesai`),
  ADD KEY `idx_user_status` (`user_id`,`status`),
  ADD KEY `idx_pengajuan_composite` (`user_id`,`databidang_id`,`status`);

--
-- Indexes for table `pengajuan_documents`
--
ALTER TABLE `pengajuan_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pengajuan_id` (`pengajuan_id`),
  ADD KEY `idx_document_type` (`document_type`);

--
-- Indexes for table `pengajuan_status_history`
--
ALTER TABLE `pengajuan_status_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pengajuan_id` (`pengajuan_id`),
  ADD KEY `idx_admin_id` (`admin_id`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_databidang_id` (`databidang_id`),
  ADD KEY `idx_required` (`is_required`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nama_universitas` (`nama_universitas`),
  ADD KEY `idx_fakultas` (`fakultas`),
  ADD KEY `idx_prodi` (`prodi`),
  ADD KEY `idx_universitas_fakultas` (`nama_universitas`,`fakultas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_email` (`email`),
  ADD UNIQUE KEY `uk_telepon` (`telepon`),
  ADD UNIQUE KEY `uk_nim` (`nim`),
  ADD KEY `idx_universitas_id` (`universitas_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_email_status` (`email`,`status`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_pengajuan_skill` (`pengajuan_id`,`skill_id`),
  ADD KEY `idx_skill_id` (`skill_id`),
  ADD KEY `idx_level` (`level`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `databidang`
--
ALTER TABLE `databidang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documentation_images`
--
ALTER TABLE `documentation_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logbooks`
--
ALTER TABLE `logbooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pengajuan_documents`
--
ALTER TABLE `pengajuan_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `pengajuan_status_history`
--
ALTER TABLE `pengajuan_status_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `fk_pengajuan_id` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`);

--
-- Constraints for table `databidang`
--
ALTER TABLE `databidang`
  ADD CONSTRAINT `fk_databidang_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `documentation_images`
--
ALTER TABLE `documentation_images`
  ADD CONSTRAINT `documentation_images_ibfk_1` FOREIGN KEY (`documentation_id`) REFERENCES `documentations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD CONSTRAINT `fk_logbooks_admin` FOREIGN KEY (`approved_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_logbooks_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notifications_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `fk_pengajuan_databidang` FOREIGN KEY (`databidang_id`) REFERENCES `databidang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajuan_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_documents`
--
ALTER TABLE `pengajuan_documents`
  ADD CONSTRAINT `fk_documents_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_status_history`
--
ALTER TABLE `pengajuan_status_history`
  ADD CONSTRAINT `fk_status_history_admin` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_history_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `fk_skill_databidang` FOREIGN KEY (`databidang_id`) REFERENCES `databidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_universitas` FOREIGN KEY (`universitas_id`) REFERENCES `universitas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `fk_user_skills_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_skills_skill` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`),
  ADD CONSTRAINT `user_skills_ibfk_3` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc42
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2025 at 09:49 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.2.29

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
(6, 'Admin Statistik', 'statistik@gmail.com', NULL, '$2y$12$CQfbZdZdD62lvU5APJZASeEg3VcE6tal3TI.AtwrmMD45RNv8zOzi', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-07-02 23:54:38'),
(7, 'admin bidang hukum', 'ivandiarfannur@gmail.com', NULL, '$2y$12$SBPMxknByCgH.F8SbDgaVOAUrSJycWxSXsbHjkprDFr7Wh2tBswTm', 'admin_bidang', 1, NULL, '2025-07-02 19:52:22', '2025-07-02 19:52:37'),
(8, 'aida', 'aida123@gmail.com', NULL, '$2y$12$bprM0PLVMEW./nHzbHe27OGleY9lwDcN5Hy6XTo2CmEP3eU7idj5.', 'admin_dinas', 1, NULL, '2025-07-03 10:31:44', '2025-07-04 21:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengajuan_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending',
  `role` enum('ketua','anggota') NOT NULL DEFAULT 'anggota',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('mari_magang_cache_91032ad7bbcb6cf72875e8e8207dcfba80173f7c', 'i:1;', 1752725094),
('mari_magang_cache_91032ad7bbcb6cf72875e8e8207dcfba80173f7c:timer', 'i:1752725094;', 1752725094);

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
(5, 6, 'Statistik dan Data', 'statistik-data', NULL, NULL, 'Bidang yang berfokus pada analisis dan penyajian data untuk pengambilan keputusan.', 'buka', 5, 0, '2025-06-27 11:28:04', '2025-07-03 19:38:28'),
(6, 3, 'asdsfsd', 'sdfjvc', NULL, NULL, 'dd', 'buka', 12, 0, '2025-07-03 19:35:54', '2025-07-16 06:20:58');

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

--
-- Dumping data for table `documentations`
--

INSERT INTO `documentations` (`id`, `judul_kegiatan`, `judul_project`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'hhhha', 'asd', 'ads', '2025-07-25 20:25:57', '2025-07-25 20:25:57');

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

--
-- Dumping data for table `documentation_images`
--

INSERT INTO `documentation_images` (`id`, `documentation_id`, `image_path`, `caption`, `created_at`, `updated_at`) VALUES
(2, 2, 'dokumentasi/NWNnoBb8bWkmGG8JQsPlx49DD2SssN1aFCO1jSEv.png', NULL, '2025-07-25 20:25:57', '2025-07-25 20:25:57');

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
(6, 1, 'Profil Berhasil Dibuat', 'Profil Anda telah berhasil dibuat. Sekarang Anda dapat mengajukan magang.', 'profile_update', '[]', 0, '2025-06-30 04:10:41', '2025-06-30 04:10:41'),
(7, 3, 'Profil Berhasil Dibuat', 'Profil Anda telah berhasil dibuat. Sekarang Anda dapat mengajukan magang.', 'profile_update', '[]', 0, '2025-06-30 04:30:58', '2025-06-30 04:30:58'),
(25, 1, 'Dimasukkan ke Kelompok', 'Anda telah dimasukkan ke kelompok: MGG-2025-IOJYSZ', 'group_assigned', '{\"group_name\":\"MGG-2025-IOJYSZ\"}', 0, '2025-07-01 02:11:42', '2025-07-01 02:11:42'),
(31, 13, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: sc', 'skill_added', '{\"skill_name\":\"sc\"}', 0, '2025-07-03 20:56:52', '2025-07-03 20:56:52'),
(32, 13, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil. Minimal isi Nama Kemampuan dan Tingkat Keahlian.', 'profile_update', '[]', 0, '2025-07-03 20:57:27', '2025-07-03 20:57:27'),
(33, 13, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":21}', 0, '2025-07-03 20:58:10', '2025-07-03 20:58:10'),
(34, 16, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: lkjikhjkbutubjg', 'skill_added', '{\"skill_name\":\"lkjikhjkbutubjg\"}', 0, '2025-07-13 23:20:32', '2025-07-13 23:20:32'),
(35, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: awsdfg', 'skill_added', '{\"skill_name\":\"awsdfg\"}', 0, '2025-07-15 06:41:51', '2025-07-15 06:41:51'),
(36, 17, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-07-15 06:59:20', '2025-07-15 06:59:20'),
(37, 17, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":22}', 0, '2025-07-15 07:01:46', '2025-07-15 07:01:46'),
(38, 16, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-07-16 21:02:09', '2025-07-16 21:02:09'),
(39, 20, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: Python', 'skill_added', '{\"skill_name\":\"Python\"}', 0, '2025-07-16 21:08:28', '2025-07-16 21:08:28'),
(40, 20, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-07-16 21:09:29', '2025-07-16 21:09:29'),
(41, 20, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":23}', 0, '2025-07-16 21:13:52', '2025-07-16 21:13:52'),
(42, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: poqweirdfg', 'skill_added', '{\"skill_name\":\"poqweirdfg\"}', 0, '2025-07-18 09:54:50', '2025-07-18 09:54:50'),
(43, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: aszdxfgvhb', 'skill_added', '{\"skill_name\":\"aszdxfgvhb\"}', 0, '2025-07-18 09:55:06', '2025-07-18 09:55:06'),
(44, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: asdfgh', 'skill_added', '{\"skill_name\":\"asdfgh\"}', 0, '2025-07-18 09:55:15', '2025-07-18 09:55:15'),
(45, 17, 'Catatan dari Admin', 'harus melengkapi beberapa data sebelum di acc', 'catatan_pengajuan', '\"{\\\"pengajuan_id\\\":22,\\\"dari_admin\\\":\\\"Admin\\\"}\"', 0, '2025-07-21 07:03:47', '2025-07-21 07:03:47'),
(46, 20, 'Catatan dari Admin', 'k', 'catatan_pengajuan', '\"{\\\"pengajuan_id\\\":23,\\\"dari_admin\\\":\\\"Admin\\\"}\"', 0, '2025-07-23 09:02:49', '2025-07-23 09:02:49'),
(47, 20, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":23,\"kode_pengajuan\":\"MGG-2025-Z3CKKX\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-Z3CKKX\"}', 0, '2025-07-25 17:45:20', '2025-07-25 17:45:20'),
(48, 20, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":23,\"kode_pengajuan\":\"MGG-2025-Z3CKKX\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-Z3CKKX\"}', 0, '2025-07-25 17:47:21', '2025-07-25 17:47:21'),
(49, 20, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":23,\"kode_pengajuan\":\"MGG-2025-Z3CKKX\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-Z3CKKX\"}', 0, '2025-07-25 17:48:00', '2025-07-25 17:48:00'),
(50, 20, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":23,\"kode_pengajuan\":\"MGG-2025-Z3CKKX\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-Z3CKKX\"}', 0, '2025-07-25 17:48:10', '2025-07-25 17:48:10'),
(51, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 17:48:34', '2025-07-25 17:48:34'),
(52, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 17:51:17', '2025-07-25 17:51:17'),
(53, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 17:54:55', '2025-07-25 17:54:55'),
(54, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 17:56:21', '2025-07-25 17:56:21'),
(55, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 18:10:13', '2025-07-25 18:10:13'),
(56, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 18:12:32', '2025-07-25 18:12:32'),
(57, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 18:12:51', '2025-07-25 18:12:51'),
(58, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 18:16:19', '2025-07-25 18:16:19'),
(59, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 0, '2025-07-25 18:17:27', '2025-07-25 18:17:27'),
(60, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 1, '2025-07-25 18:19:49', '2025-07-27 02:40:24'),
(61, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 1, '2025-07-25 18:20:31', '2025-07-27 02:28:14'),
(62, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 1, '2025-07-25 18:21:28', '2025-07-27 02:40:21'),
(63, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 1, '2025-07-25 18:23:55', '2025-07-27 02:29:19'),
(64, 17, 'Pengajuan Diterima', 'Selamat! Pengajuan magang Anda telah diterima. Silakan cek detail pengajuan.', 'success', '{\"pengajuan_id\":22,\"kode_pengajuan\":\"MGG-2025-QYGX0J\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/pengajuan\\/MGG-2025-QYGX0J\"}', 1, '2025-07-25 18:25:09', '2025-07-27 02:30:40'),
(65, 20, 'Catatan dari Admin', 'halo', 'catatan_pengajuan', '\"{\\\"pengajuan_id\\\":23,\\\"dari_admin\\\":\\\"Admin\\\"}\"', 0, '2025-07-25 23:09:46', '2025-07-25 23:09:46'),
(66, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: ASDFG', 'skill_added', '{\"skill_name\":\"ASDFG\"}', 1, '2025-07-26 19:22:20', '2025-07-27 02:27:12'),
(67, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: arfann', 'skill_added', '{\"skill_name\":\"arfann\"}', 1, '2025-07-27 01:19:06', '2025-07-27 02:27:01'),
(68, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: a', 'skill_added', '{\"skill_name\":\"a\"}', 1, '2025-07-27 01:21:32', '2025-07-27 02:24:01'),
(69, 17, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: ar', 'skill_added', '{\"skill_name\":\"ar\"}', 1, '2025-07-27 01:21:42', '2025-07-27 02:24:07');

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
  `status` enum('pending','diproses','diteruskan','diterima','ditolak','magang','selesai') NOT NULL DEFAULT 'pending',
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
(21, 13, 2, 'MGG-2025-NERPJR', 'sdsc', '2025-07-26', '2025-10-25', 'diteruskan', 'surat_pengajuan/surat_MGG-2025-NERPJR.pdf', NULL, NULL, NULL, '2025-07-03 20:58:10', '2025-07-04 22:56:06'),
(22, 17, 5, 'MGG-2025-QYGX0J', NULL, '2025-07-22', '2025-07-30', 'diterima', 'surat_pengajuan/surat_MGG-2025-QYGX0J.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-QYGX0J.pdf', 'asdfg', NULL, '2025-07-15 07:01:46', '2025-07-25 18:21:12'),
(23, 20, 2, 'MGG-2025-Z3CKKX', NULL, '2025-07-18', '2025-08-19', 'diterima', 'surat_pengajuan/surat_MGG-2025-Z3CKKX.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-Z3CKKX.pdf', 'hkm', NULL, '2025-07-16 21:13:52', '2025-07-25 17:45:20');

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
(50, 21, 'surat_pengantar', 'Penghargaan - arfannurivandi-5145 _ Microsoft Learn.pdf', 'dokumen_pengajuan/RuVmMe6mN7jg0un1TVm7iPrO9MdjZh6wIqcPFDdL.pdf', 372394, '2025-07-03 20:58:10'),
(51, 21, 'proposal', 'e9be1754-fb92-4a26-9e52-ae223e66981f_Penghargaan_-_arfannurivandi-5145_1__Microsoft_Learn.pdf', 'dokumen_pengajuan/6jwmWJLr6BXD2s9BXHP6H9ODmWpnXkgAvqJKUO0p.pdf', 372538, '2025-07-03 20:58:10'),
(52, 22, 'surat_pengantar', 'IDENTIFIKASI PEMASALAHAN DALAM PROSES PEMBAYARAN SANTRI UTS_METOPEN_KEL 8 A1A2 (1)_corrected-3.pdf', 'dokumen_pengajuan/fo4q2hLaaNW5YrE5IdzK4mNmuXwuPm8lk7WocNex.pdf', 656428, '2025-07-15 07:01:46'),
(53, 22, 'proposal', '5eaa4ca3-35c2-4c59-b130-b716e3e9b6dc_Penghargaan_-_arfannurivandi-5145___Microsoft_Learn.pdf', 'dokumen_pengajuan/ew2ZE5HVgF4KAN4tkjY3niRQkoaTJEHtLdR5tIM1.pdf', 372394, '2025-07-15 07:01:46'),
(54, 23, 'surat_pengantar', '22552021037_Tugas Pertemuan 1_Fajar Sasongko.pdf', 'dokumen_pengajuan/2VnbjHGs8awnIUVmupp27lV1559FzRcYBdGiu4yW.pdf', 126757, '2025-07-16 21:13:52'),
(55, 23, 'proposal', '22552021037_Tugas Pertemuan 1_Fajar Sasongko.pdf', 'dokumen_pengajuan/zOd7a2e6pysIAU6pyhMaIzjOs2dryynNi9ryK86m.pdf', 126757, '2025-07-16 21:13:52');

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
('MKCCtdt1nUywbGV39IbsJoCGIfDaJr8jkOd4ey8j', 17, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:141.0) Gecko/20100101 Firefox/141.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzFZc0hvQ0hIelRnN0dCSUJKS081T2pFWEdDVlgyTXpldVVkMEF2YyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHlsZS9pbWFnZXMvbG9nby9hcHBsZS10b3VjaC1pY29uLnBuZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE3O30=', 1753609741);

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
(3, 2, 'Pemrograman Web', NULL, 'Kemampuan dalam pengembangan aplikasi web', NULL, NULL, 1, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(4, 2, 'Database Management', NULL, 'Kemampuan dalam pengelolaan database', NULL, NULL, 0, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(6, 3, 'Troubleshooting', NULL, 'Kemampuan dalam pemecahan masalah teknis', NULL, NULL, 1, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(7, 4, 'Content Writing', NULL, 'Kemampuan dalam penulisan konten', NULL, NULL, 1, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(8, 4, 'Social Media Management', NULL, 'Kemampuan mengelola media sosial', NULL, NULL, 1, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(9, 5, 'Analisis Data', NULL, 'Kemampuan dalam menganalisis data statistik', NULL, NULL, 1, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(10, 5, 'Excel Advanced', NULL, 'Kemampuan advanced dalam Microsoft Excel', NULL, NULL, 1, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(11, NULL, 'kemampuan akademik', NULL, NULL, NULL, NULL, 0, '2025-06-28 20:26:05', '2025-06-28 20:26:05'),
(15, NULL, 'askldc', 'sdhsacsd', 'sajdschsdv b', 'projects/7bHHER54Oll2mvnIuoAkHkTzPkUqsbdC7lQKPMPJ.pdf', NULL, 0, '2025-06-29 01:24:47', '2025-06-29 02:45:14'),
(16, NULL, 'kajshdc', 'jsdhd', 'sjadwasz', 'projects/d2hK7Nh8cIru36PeSUrIWoAPeFkOd9sOAKHVl163.pdf', 'https://devportal.arfanivan.my.id/?p=242', 0, '2025-06-29 02:46:38', '2025-06-29 02:47:26'),
(17, NULL, 'kjjfddfkjvndf', NULL, NULL, NULL, NULL, 0, '2025-06-29 03:10:05', '2025-06-29 03:10:05'),
(18, NULL, 'jhgf', NULL, NULL, NULL, NULL, 0, '2025-06-30 04:33:36', '2025-06-30 04:33:36'),
(19, NULL, 'hhjv', NULL, NULL, NULL, NULL, 0, '2025-06-30 04:37:25', '2025-06-30 04:37:25'),
(20, NULL, 'liuy', NULL, NULL, NULL, NULL, 0, '2025-06-30 19:09:06', '2025-06-30 19:09:06'),
(22, NULL, 'ksehfd', NULL, NULL, NULL, NULL, 0, '2025-07-01 02:10:58', '2025-07-01 02:10:58'),
(23, NULL, 'sc', NULL, NULL, NULL, NULL, 0, '2025-07-03 20:56:52', '2025-07-03 20:56:52'),
(24, NULL, 'lkjikhjkbutubjg', NULL, NULL, NULL, NULL, 0, '2025-07-13 23:20:32', '2025-07-13 23:20:32'),
(26, NULL, 'Python', 'mari magang', 'lorem ipsum dolor soet', NULL, NULL, 0, '2025-07-16 21:08:28', '2025-07-16 21:08:28'),
(32, NULL, 'zxczx', 'asd', 'lsajlckn', NULL, NULL, 0, '2025-07-27 00:03:41', '2025-07-27 00:03:41'),
(33, NULL, 'eh', 'ies', 'akwd', NULL, 'http://127.0.0.1:8000/profile/edit', 0, '2025-07-27 00:05:34', '2025-07-27 00:05:34'),
(34, NULL, 'arfann', 'alsdjfh', 'sadfguyiop', 'projects/ws2B81CUsXb1zdyuajNO2Y5EIylO2u7FVipflwlG.png', NULL, 0, '2025-07-27 01:19:06', '2025-07-27 01:19:06'),
(37, NULL, 'a', NULL, NULL, NULL, NULL, 0, '2025-07-27 01:21:32', '2025-07-27 01:22:24'),
(38, NULL, 'ar', 'alsdjfh', 'sadfguyiop', NULL, NULL, 0, '2025-07-27 01:21:42', '2025-07-27 01:21:42');

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
(1, 'Universitas Indonesia', 'Fakultas Teknik', 'Teknik Informatika', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(2, 'Universitas Indonesia', 'Fakultas Teknik', 'Teknik Mesin', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(3, 'Universitas Indonesia', 'Fakultas Ekonomi dan Bisnis', 'Manajemen', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(4, 'Universitas Indonesia', 'Fakultas Ekonomi dan Bisnis', 'Akuntansi', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(5, 'Institut Teknologi Bandung', 'Sekolah Teknik Elektro dan Informatika', 'Teknik Informatika', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(6, 'Institut Teknologi Bandung', 'Sekolah Teknik Elektro dan Informatika', 'Teknik Elektro', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(7, 'Institut Teknologi Bandung', 'Fakultas Teknik Mesin dan Dirgantara', 'Teknik Mesin', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(8, 'Institut Teknologi Bandung', 'Sekolah Bisnis dan Manajemen', 'Manajemen', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(9, 'Universitas Gadjah Mada', 'Fakultas Teknik', 'Teknik Informatika', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(10, 'Universitas Gadjah Mada', 'Fakultas Teknik', 'Teknik Mesin', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(11, 'Universitas Gadjah Mada', 'Fakultas Ekonomika dan Bisnis', 'Manajemen', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(12, 'Universitas Gadjah Mada', 'Fakultas Ekonomika dan Bisnis', 'Akuntansi', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(13, 'Institut Teknologi Sepuluh Nopember', 'Fakultas Teknologi Elektro dan Informatika Cerdas', 'Teknik Informatika', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(14, 'Institut Teknologi Sepuluh Nopember', 'Fakultas Teknologi Industri dan Rekayasa Sistem', 'Teknik Mesin', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(15, 'Institut Teknologi Sepuluh Nopember', 'Fakultas Bisnis dan Manajemen Teknologi', 'Manajemen Bisnis', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(16, 'Universitas Airlangga', 'Fakultas Sains dan Teknologi', 'Sistem Informasi', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(17, 'Universitas Airlangga', 'Fakultas Ekonomi dan Bisnis', 'Manajemen', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(18, 'Universitas Airlangga', 'Fakultas Ekonomi dan Bisnis', 'Akuntansi', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(19, 'Universitas Brawijaya', 'Fakultas Ilmu Komputer', 'Teknik Informatika', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(20, 'Universitas Brawijaya', 'Fakultas Teknik', 'Teknik Mesin', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(21, 'Universitas Brawijaya', 'Fakultas Ekonomi dan Bisnis', 'Manajemen', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(22, 'Universitas Brawijaya', 'Fakultas Ekonomi dan Bisnis', 'Akuntansi', '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(23, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-28 09:10:26', '2025-06-28 09:10:26'),
(24, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-28 09:35:06', '2025-06-28 09:35:06'),
(25, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-28 09:35:24', '2025-06-28 09:35:24'),
(26, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-28 09:37:45', '2025-06-28 09:37:45'),
(27, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-28 09:38:27', '2025-06-28 09:38:27'),
(28, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-29 00:15:19', '2025-06-29 00:15:19'),
(29, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-29 00:16:53', '2025-06-29 00:16:53'),
(30, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-29 02:49:50', '2025-06-29 02:49:50'),
(31, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-29 03:09:49', '2025-06-29 03:09:49'),
(32, 'Universitas Islam Raden Rahmat Malang', 'sains dan teknologi', 'Teknik Informatika', '2025-06-29 03:12:18', '2025-06-29 03:12:18'),
(33, 'uauravdfvndf', 'skjdd sdfhchxmdfns', 'dscn asdhsedxc', '2025-06-30 04:30:58', '2025-06-30 04:30:58'),
(34, 'Universitas Brawijaya', 'Ilmu Komputer', 'Informatika', '2025-07-03 20:57:27', '2025-07-03 20:57:27'),
(35, 'polinema', 'saintek', 'teknik informatika', '2025-07-15 06:59:20', '2025-07-15 06:59:20'),
(36, 'Uniersitas Islam Raden Rahmat Malang', 'Saintek', 'Agrotek', '2025-07-16 21:09:29', '2025-07-16 21:09:29'),
(37, 'Politeknik Negeri Malang', 'Teknik', 'Teknik Elektro', '2025-07-18 09:41:09', '2025-07-18 09:41:09'),
(38, 'Saintek', 'Teknik', 'Teknik Elektro', '2025-07-26 17:11:11', '2025-07-26 17:11:11'),
(39, 'Saintek', 'Teknik informatika', 'Teknik Elektro', '2025-07-27 00:42:05', '2025-07-27 00:42:05'),
(40, 'Unira Malang', 'sains dan teknologi', 'Teknik informatika', '2025-07-27 00:42:31', '2025-07-27 00:42:31');

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
(1, 'arfan nur ivandi', 23, '22552021032', '085171015682', 'arfanvn@gmail.com', '2025-06-30 08:04:13', '$2y$12$zw6faTnxT7iHwJgf4LM3wuS8bTj/pJH.HZOxp7AE.XKHmB4mx0QMu', 'foto_user/wUFF3tiQShVL58o04358TYCbxmwgOFBUSk9sQshV.png', 'active', 'Mm5V5UqfxQ8M5RX1Wu9BJyCQJMhwOeMmrksohICBlFPPYgSAO6YeRnwT2HUw', '2025-06-28 06:44:26', '2025-07-13 18:21:08', NULL, NULL),
(2, 'aurii1', 23, '0987655', '09876543111', 'contoh@gmail.com', NULL, '$2y$12$QjtSJz5k6jJnQn2Z7HrXTe2p3aJKiV8OU5Kn5cPPh797zO1OfbX.C', 'foto_user/0Di2uLipc0sdAU8N1AfwLHJHI4Ie2EUdQEheG4Fq.jpg', 'active', NULL, '2025-06-29 03:09:22', '2025-06-29 03:18:45', NULL, NULL),
(3, 'aurfghj', 33, '2212122112', '876543219', 'user1@gmail.com', NULL, '$2y$12$cKRpIIuXENPpVtRz8RRWZOvRw.80hXbdk8Ea.vtTciP4mKH4y6Hm2', NULL, 'active', NULL, '2025-06-30 04:30:22', '2025-06-30 04:35:51', NULL, NULL),
(13, 'arfa', 34, '987654321', '9876324325345', 'ivanarfan57@gmail.com', '2025-07-03 20:56:44', '$2y$12$rCByZEs4M6JcvNpfwcgryuNLUcUNRBOE31s0QNiVVr61lQeTG9NeC', NULL, 'active', NULL, '2025-07-03 20:56:10', '2025-07-03 20:57:27', NULL, NULL),
(14, 'fajarpdf', NULL, NULL, '1234567890', 'skafajar3@gmail.com', NULL, '$2y$12$74b1C9kavNcg4WSMwdTpBuMP/Dckxk3.HlKHNaBUtOp6zPn7z7Fym', NULL, 'active', NULL, '2025-07-05 07:17:15', '2025-07-05 07:17:15', NULL, NULL),
(15, 'contoh', NULL, NULL, '29345678', 'contoh1@gmail.com', NULL, '$2y$12$r0UW8Kt1JkXrPQzNCoynW.lpFTCc1kBuX6BIVvR2xS6iGJUoeRP4e', NULL, 'active', NULL, '2025-07-05 08:52:33', '2025-07-05 08:52:33', NULL, NULL),
(16, 'NUR KHOLIS MAJID', 23, '22552021052', '083764736473', 'majidholes8304@gmail.com', '2025-07-13 23:17:58', '$2y$12$/7TA/RLuWfnjd80H17PVVugZbfb3JEcEylxxDN.em/imFxWK5b0QK', 'foto_user/0M8BTumDaKaxSPcRJlRUljXdlZrmIfpaetNOMIAS.jpg', 'active', NULL, '2025-07-13 23:16:50', '2025-07-16 21:02:22', NULL, NULL),
(17, 'Arfan Nur Ivandi', 40, '230201023090', '086547955677542', 'ivanandi775@gmail.com', '2025-07-15 06:37:46', '$2y$12$a1a39RcZqotzURzWTPlmPemdJpVLwQ060h5EYs4YMM4RZHoeW0xTq', 'foto_user/bGnnQTkSL2yu0XI2OxuzttEwvQ1zKnLJdcLk27YK.png', 'active', NULL, '2025-07-15 06:37:15', '2025-07-27 00:43:26', 'Saya Adalah Mahasiswa unira malang yang berfokus pada pengembangan informasi dan digitalisasi', 'Jl Sumbersari Panggungrejo Kepanjen Malang'),
(18, 'kingM', NULL, NULL, '083764736470', 'nurkholismajid802@gmail.com', NULL, '$2y$12$z9ItnAgfFnYp49vL3yotuOzpMrZbMtHQreHhkqw76WCYMFdBhEsIq', NULL, 'active', NULL, '2025-07-16 21:00:26', '2025-07-16 21:00:26', NULL, NULL),
(19, 'Zainul fanani Al tegar', NULL, NULL, '089650760660', 'pixelate368@gmail.com', '2025-07-16 21:04:20', '$2y$12$0QyFR5sacvFgCWqRxsj37e/hjxHTAGyVddouYHxVoJAY0oHfLPlwe', NULL, 'active', NULL, '2025-07-16 21:03:07', '2025-07-16 21:04:20', NULL, NULL),
(20, 'fajar', 36, '22552021066', '085808228865', 'jajantaro9@gmail.com', '2025-07-16 21:06:58', '$2y$12$7Wx4jJa01SynNuQDrL3PYeNnVIBGrK2i5XMoWzR5X17MhBV1jtCEe', 'foto_user/X3F2hnc9FWzoww2XVYDh0KmUNVLAm18IF0sYj3vS.png', 'active', NULL, '2025-07-16 21:03:42', '2025-07-16 21:32:56', NULL, NULL);

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
(4, 1, NULL, 15, 'Dasar', 'sertifikat/k0BlJMAxcErnZ8ECGDf9wMDhjDtIoKEvfdD6MUvN.pdf', '2025-06-29 01:24:47', '2025-06-29 02:45:20'),
(5, 1, NULL, 16, 'Dasar', 'sertifikat/rZcwObWgZK50XHrXGCBgKdG08hdbmFMbqabIdHJj.pdf', '2025-06-29 02:46:38', '2025-06-29 02:46:38'),
(6, 2, NULL, 17, 'Dasar', NULL, '2025-06-29 03:10:05', '2025-06-29 03:10:05'),
(7, 3, NULL, 18, 'Dasar', NULL, '2025-06-30 04:33:36', '2025-06-30 04:33:36'),
(8, 3, NULL, 19, 'Menengah', NULL, '2025-06-30 04:37:25', '2025-06-30 04:37:25'),
(13, 16, NULL, 24, 'Menengah', NULL, '2025-07-13 23:20:32', '2025-07-13 23:20:32'),
(15, 20, NULL, 26, 'Lanjutan', 'sertifikat/sYzm95HcD7mS7jkkEuFcHIUMtgD2SFfg07h4OHms.pdf', '2025-07-16 21:08:28', '2025-07-16 21:34:35'),
(16, 20, NULL, 26, 'Lanjutan', NULL, '2025-07-16 21:08:28', '2025-07-16 21:08:28'),
(23, 17, NULL, 32, 'Dasar', NULL, '2025-07-27 00:03:41', '2025-07-27 00:03:41'),
(24, 17, NULL, 33, 'Dasar', NULL, '2025-07-27 00:05:34', '2025-07-27 00:05:34'),
(25, 17, NULL, 34, 'Mahir', 'sertifikat/KU2AzJFlKfetFMsSZBbkFS3lYRzbHjZi6PUNUohS.pdf', '2025-07-27 01:19:06', '2025-07-27 01:19:06'),
(26, 17, NULL, 37, 'Mahir', NULL, '2025-07-27 01:21:32', '2025-07-27 01:21:32'),
(27, 17, NULL, 38, 'Mahir', NULL, '2025-07-27 01:21:42', '2025-07-27 01:21:42');

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
  ADD KEY `idx_pengajuan_id` (`pengajuan_id`),
  ADD KEY `anggota_user_fk` (`user_id`);

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
  ADD UNIQUE KEY `uk_nim` (`nim`),
  ADD UNIQUE KEY `uk_email` (`email`),
  ADD UNIQUE KEY `uk_telepon` (`telepon`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengajuan_documents`
--
ALTER TABLE `pengajuan_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pengajuan_status_history`
--
ALTER TABLE `pengajuan_status_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_anggota_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

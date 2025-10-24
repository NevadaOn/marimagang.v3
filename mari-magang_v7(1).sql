-- phpMyAdmin SQL Dump
-- version 5.2.3-1.fc42.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2025 at 03:30 AM
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
-- Database: `mari-magang.v7`
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
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$12$6D9o9fNgIiWG1v2YvxK7C.fNNbuAzyFEwv9OqGOG2ef/CPNKXKhuy', 'superadmin', 1, NULL, '2025-06-27 11:28:04', '2025-10-20 20:56:44'),
(3, 'Admin Aptika', 'aptika@gmail.com', NULL, '$2y$12$KqX2ibb2n4h3DsT41cJatObFqM1piP7zszwILPCQt5Z16qv3p09zi', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-07-02 20:33:20'),
(4, 'Admin Infrastruktur', 'infrastruktur@gmail.com', NULL, '$2y$10$LnPPyumT.CsMzF7mA27.SekWK0s.4bbPdZwKcT01LKYe3qOn/ZQIu', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(5, 'Admin Komunikasi', 'komunikasi@gmail.com', NULL, '$2y$10$QgduF0Gr/H/MKpWmtca2..q8s2LBl0Weu6fVulRyhDGj.SXEY9DeO', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-06-27 11:28:04'),
(6, 'Admin Statistik', 'statistik@gmail.com', NULL, '$2y$12$CQfbZdZdD62lvU5APJZASeEg3VcE6tal3TI.AtwrmMD45RNv8zOzi', 'admin_bidang', 1, NULL, '2025-06-27 11:28:04', '2025-07-02 23:54:38'),
(9, 'admindinas', 'dinas@gmail.com', NULL, '$2y$12$ozPKO4CuEZ0yVozoWZqu6erG6oKRPJrh3QWe8x3bqcQ5MjzG4IfDe', 'admin_dinas', 1, NULL, '2025-08-12 23:50:37', '2025-10-20 20:53:01'),
(10, 'sekertaris', 'sekertaris@gmail.com', NULL, '$2y$12$xozo.9eNoKUR3Jbb9I1pdeiu6QmP3wijxtNu9d3Wqjj8fG.30Si/G', 'admin_bidang', 1, NULL, '2025-08-12 23:55:20', '2025-08-12 23:55:20');

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
(15, 41, 'qwe', '5435345345', 'java', 'Universitas Islam Raden Rahmat Malang', NULL, NULL, 'a@gmail.com', '877878778', 'anggota', '2025-08-06 21:06:31', '2025-08-06 21:06:31'),
(16, 43, 'arfan nur ivandi12345678', 'ndsfjndcnjx', NULL, 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'ivanandi775@gmail.com', '0986468787444', 'ketua', '2025-08-11 23:07:20', '2025-08-11 23:07:20'),
(17, 43, 'sfdds', '8765432', ';jbhvbvbgv', 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'ASA@sa.d', '98087876', 'anggota', '2025-08-11 23:07:20', '2025-08-11 23:07:20'),
(18, 46, 'arfan nur ivandi12345678', 'ndsfjndcnjx', NULL, 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'ivanandi775@gmail.com', '0986468787444', 'ketua', '2025-08-12 20:26:27', '2025-08-12 20:26:27'),
(19, 46, 'arafsdsadjs', 'dfdgghg', 'kdsfjdsn', 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'sdfdf@asdjsa.a', 'ghjgj', 'anggota', '2025-08-12 20:26:27', '2025-08-12 20:26:27'),
(20, 46, 'jef', 'g-0298765', '932432ehdjknsas', 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'fdgdf@ads.a', '324324324', 'anggota', '2025-08-12 20:26:27', '2025-08-12 20:26:27'),
(21, 46, 'jfdjs', '09876543', '09876', 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'wsdf@a.a', '8765432', 'anggota', '2025-08-12 20:26:27', '2025-08-12 20:26:27'),
(22, 46, 'dtf', '098765432', 'ijhgfdsa', 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', NULL, NULL, 'saa@sa.r', '098765432', 'anggota', '2025-08-12 20:26:27', '2025-08-12 20:26:27');

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
('mari_magang_cache_4d134bc072212ace2df385dae143139da74ec0ef', 'i:1;', 1754978517),
('mari_magang_cache_4d134bc072212ace2df385dae143139da74ec0ef:timer', 'i:1754978517;', 1754978517),
('mari_magang_cache_887309d048beef83ad3eabf2a79a64a389ab1c9f', 'i:1;', 1761017275),
('mari_magang_cache_887309d048beef83ad3eabf2a79a64a389ab1c9f:timer', 'i:1761017275;', 1761017275);

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

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `sender_type`, `receiver_id`, `receiver_type`, `message`, `read_at`, `is_read`, `created_at`, `updated_at`) VALUES
(22, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'bolehkah saya bertanya?', '2025-08-11 23:22:41', 0, '2025-08-11 23:22:31', '2025-08-11 23:22:41'),
(23, 1, 'App\\Models\\Admin', 24, 'App\\Models\\User', 'monggo takok o', NULL, 0, '2025-08-11 23:22:45', '2025-08-11 23:22:45'),
(24, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'p', '2025-08-13 00:07:38', 0, '2025-08-12 20:32:10', '2025-08-13 00:07:38'),
(25, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'halooo', '2025-08-13 00:17:16', 0, '2025-08-13 00:12:53', '2025-08-13 00:17:16'),
(26, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'p', '2025-08-13 00:53:08', 0, '2025-08-13 00:18:08', '2025-08-13 00:53:08'),
(27, 1, 'App\\Models\\Admin', 24, 'App\\Models\\User', 'p', NULL, 0, '2025-08-13 00:53:12', '2025-08-13 00:53:12'),
(28, 1, 'App\\Models\\Admin', 22, 'App\\Models\\User', 'p', NULL, 0, '2025-08-13 00:53:25', '2025-08-13 00:53:25'),
(29, 22, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'lkhfds', '2025-08-13 00:53:42', 0, '2025-08-13 00:53:36', '2025-08-13 00:53:42'),
(30, 22, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'halo', '2025-10-20 21:03:38', 0, '2025-08-22 00:22:27', '2025-10-20 21:03:38'),
(31, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'assalamualaikum bapak', NULL, 0, '2025-10-14 10:02:19', '2025-10-14 10:02:19'),
(32, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'Izin Bertanya', NULL, 0, '2025-10-14 10:02:28', '2025-10-14 10:02:28'),
(33, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'Untuk Pengajuan Magang itu kira kira Diproses berapa Hari', NULL, 0, '2025-10-14 10:02:56', '2025-10-14 10:02:56'),
(34, 24, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'Terimakasih', NULL, 0, '2025-10-14 10:03:06', '2025-10-14 10:03:06'),
(35, 22, 'App\\Models\\User', 1, 'App\\Models\\Admin', 'assalamualaikum bapak', '2025-10-20 21:03:38', 0, '2025-10-20 20:49:51', '2025-10-20 21:03:38');

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
(7, 10, 'Sekertaris', 'Bidang Arsipan Data', 'thumbnails/r4bEyW2mqpuqzQrxZZmeEAAJOUAEPwvAZ2wtgvnv.png', 'photos/aVCEam1S82GIaCoY4wBFpWa4YTc0vFy76OEWD30r.png', 'idang yang berfokus pada arsip dan tata kelola data', 'buka', 8, 0, '2025-08-12 23:56:34', '2025-08-12 23:56:34');

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
(4, 'kegiatan mari magang', 'project1', 'dokumen pendukung', '2025-08-11 22:23:53', '2025-08-11 22:23:53'),
(5, 'lkjh', 'sdnsjcnxcv', 'sjddjffddvfdg', '2025-08-11 22:24:16', '2025-08-11 22:24:16'),
(6, 'pemasangan QR Code ke menara BTS', 'Pemetaan Menara Telekomunikasi', NULL, '2025-10-20 21:09:13', '2025-10-20 21:09:13');

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
(4, 4, 'dokumentasi/OhjyouRQnJrciYt1Qjt8SdDzUJxchEdriXnEYuDG.png', NULL, '2025-08-11 22:23:53', '2025-08-11 22:23:53'),
(5, 5, 'dokumentasi/aFsra522rRZHEMiAwYgI6W0T6WrwNk4hXzFzEfNg.jpg', NULL, '2025-08-11 22:24:16', '2025-08-11 22:24:16'),
(6, 6, 'dokumentasi/4XIA7aXCGdwX9Ggy3BvYatImn7tMl8FnYDmHWD82.jpg', NULL, '2025-10-20 21:09:13', '2025-10-20 21:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `logbooks`
--

CREATE TABLE `logbooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logbooks`
--

INSERT INTO `logbooks` (`id`, `user_id`, `tanggal`, `kegiatan`, `created_at`, `updated_at`) VALUES
(14, 22, '2025-08-10', 'pengembangan web marimagang', '2025-08-10 08:27:12', '2025-08-10 08:27:12');

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
(88, 23, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":39}', 0, '2025-08-06 12:21:48', '2025-08-06 12:21:48'),
(89, 24, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 1, '2025-08-11 23:05:41', '2025-08-12 19:50:05'),
(90, 24, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: mhbn', 'skill_added', '{\"skill_name\":\"mhbn\"}', 1, '2025-08-11 23:06:11', '2025-08-12 19:50:05'),
(91, 24, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":43}', 1, '2025-08-11 23:07:20', '2025-08-12 19:50:05'),
(94, 24, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":46}', 1, '2025-08-12 20:26:27', '2025-08-20 18:44:37'),
(95, 24, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 1, '2025-08-12 20:36:47', '2025-08-20 18:44:37'),
(96, 24, 'Pengajuan Magang Terkirim', 'Pengajuan magang Anda telah berhasil dikirim dan sedang menunggu persetujuan Admin 1.', 'internship_submitted', '{\"internship_id\":47}', 0, '2025-08-20 19:46:20', '2025-08-20 19:46:20'),
(97, 24, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-10-14 09:56:24', '2025-10-14 09:56:24'),
(98, 22, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: data analisis', 'skill_added', '{\"skill_name\":\"data analisis\"}', 0, '2025-10-20 20:20:34', '2025-10-20 20:20:34'),
(99, 22, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: Pemrograman Python', 'skill_added', '{\"skill_name\":\"Pemrograman Python\"}', 0, '2025-10-20 20:22:37', '2025-10-20 20:22:37'),
(100, 22, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: Version Control System', 'skill_added', '{\"skill_name\":\"Version Control System\"}', 0, '2025-10-20 20:23:11', '2025-10-20 20:23:11'),
(101, 26, 'Profil dasar sudah lengkap', 'Profil dasar sudah lengkap. Sekarang tambahkan keahlian Anda untuk melengkapi profil.', 'profile_update', '[]', 0, '2025-10-20 20:29:44', '2025-10-20 20:29:44'),
(102, 26, 'Skill Ditambahkan', 'Skill baru telah ditambahkan ke profil Anda: pemorgraman java', 'skill_added', '{\"skill_name\":\"pemorgraman java\"}', 0, '2025-10-20 20:29:57', '2025-10-20 20:29:57');

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
  `admin_read_at` timestamp NULL DEFAULT NULL,
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

INSERT INTO `pengajuan` (`id`, `user_id`, `databidang_id`, `kode_pengajuan`, `deskripsi`, `tanggal_mulai`, `tanggal_selesai`, `status`, `admin_read_at`, `surat_pdf`, `form_kesediaan_magang`, `komentar_admin`, `nilai_akhir`, `created_at`, `updated_at`) VALUES
(34, 22, 3, 'MGG-2025-13AUX0', NULL, '2025-08-07', '2025-09-06', 'dibatalkan', NULL, 'surat_pengajuan/surat_MGG-2025-13AUX0.pdf', NULL, NULL, NULL, '2025-08-06 01:04:44', '2025-08-06 08:33:01'),
(35, 22, 4, 'MGG-2025-RSBII6', NULL, '2025-08-15', '2025-08-30', 'dibatalkan', NULL, NULL, NULL, NULL, NULL, '2025-08-06 08:40:43', '2025-08-06 08:40:58'),
(36, 22, 3, 'MGG-2025-XBEXIV', NULL, '2025-08-15', '2025-09-06', 'dibatalkan', NULL, NULL, NULL, NULL, NULL, '2025-08-06 10:11:53', '2025-08-06 10:38:18'),
(37, 22, 5, 'MGG-2025-HPYEBK', NULL, '2025-08-15', '2025-09-06', 'selesai', '2025-08-12 16:37:54', 'surat_pengajuan/surat_MGG-2025-HPYEBK.pdf', NULL, NULL, NULL, '2025-08-06 10:58:29', '2025-10-21 17:00:00'),
(38, 22, 5, 'MGG-2025-9H8UP9', NULL, '2025-08-09', '2025-09-06', 'selesai', NULL, 'surat_pengajuan/surat_MGG-2025-9H8UP9.pdf', NULL, NULL, NULL, '2025-08-06 11:00:39', '2025-10-21 17:00:00'),
(39, 23, 4, 'MGG-2025-YYHSUD', NULL, '2025-08-15', '2025-09-20', 'ditolak', '2025-08-12 16:37:54', NULL, NULL, NULL, NULL, '2025-08-06 12:21:48', '2025-08-12 16:37:54'),
(40, 23, 5, 'MGG-2025-AWQPQI', NULL, '2025-08-14', '2025-08-30', 'dibatalkan', NULL, 'surat_pengajuan/surat_MGG-2025-AWQPQI.pdf', NULL, NULL, NULL, '2025-08-06 21:03:43', '2025-08-12 03:52:24'),
(41, 23, 2, 'MGG-2025-ZHLXK8', NULL, '2025-08-07', '2025-09-05', 'ditolak', '2025-08-12 16:37:54', 'surat_pengajuan/surat_MGG-2025-ZHLXK8.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-ZHLXK8.pdf', NULL, NULL, '2025-08-06 21:06:31', '2025-08-12 16:37:54'),
(42, 23, 2, 'MGG-2025-EAIDZC', NULL, '2025-08-07', '2025-08-31', 'selesai', '2025-08-12 16:37:54', 'surat_pengajuan/surat_MGG-2025-EAIDZC.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-EAIDZC.pdf', NULL, NULL, '2025-08-06 21:15:11', '2025-10-21 17:00:00'),
(43, 24, 3, 'MGG-2025-DQZRRZ', NULL, '2025-08-13', '2025-08-30', 'dibatalkan', '2025-08-12 16:41:29', 'surat_pengajuan/surat_MGG-2025-DQZRRZ.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-DQZRRZ.pdf', 'ada beberapa hal yang perlu perhatikan', NULL, '2025-08-11 23:07:20', '2025-08-12 19:42:45'),
(44, 24, 2, 'MGG-2025-PZAGZY', NULL, '2025-08-14', '2025-09-06', 'dibatalkan', NULL, 'surat_pengajuan/surat_MGG-2025-PZAGZY.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-PZAGZY.pdf', NULL, NULL, '2025-08-12 19:12:01', '2025-08-13 01:07:53'),
(45, 24, 3, 'MGG-2025-Y0UKWX', NULL, '2025-08-14', '2025-08-15', 'ditolak', '2025-08-13 00:54:09', NULL, NULL, NULL, NULL, '2025-08-12 19:43:44', '2025-08-13 00:54:09'),
(46, 24, 4, 'MGG-2025-SBN1WI', 'saya ingin magang', '2025-09-06', '2025-11-08', 'ditolak', NULL, 'surat_pengajuan/surat_MGG-2025-SBN1WI.pdf', 'surat_pengajuan/form_kesediaan_MGG-2025-SBN1WI.pdf', NULL, NULL, '2025-08-12 20:26:27', '2025-08-12 23:11:47'),
(47, 24, 3, 'MGG-2025-JVWGDC', 'nmn', '2025-08-22', '2025-09-06', 'selesai', NULL, NULL, NULL, NULL, NULL, '2025-08-20 19:46:20', '2025-10-21 17:00:00');

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
(93, 42, 'proposal', 'Coursera 38JGETZ23FTQ.pdf', 'dokumen_pengajuan/VlAXcnoq5METJ4DmOiWrL542M3VzZCvsdmIE5FQh.pdf', 296856, '2025-08-06 21:15:12'),
(94, 43, 'surat_pengantar', 'Buku Log Harian PKL.pdf', 'dokumen_pengajuan/BA0qBRra3e2U8jiWtE9CyHhtJN7kNQx1ydLgYXfc.pdf', 28094, '2025-08-11 23:07:20'),
(95, 43, 'proposal', 'Buku Log Harian PKL.pdf', 'dokumen_pengajuan/h5UKHVmD4e6RP41yhkfytuy8MI8vSdfm7foYuZAJ.pdf', 28094, '2025-08-11 23:07:20'),
(96, 44, 'surat_pengantar', 'IDENTIFIKASI PEMASALAHAN DALAM PROSES PEMBAYARAN SANTRI UTS_METOPEN_KEL 8 A1A2 (1)_corrected-6.pdf', 'dokumen_pengajuan/9p52lTKLHVoMYAEyjf3s0J4HbSVoPhi9e74W7tOa.pdf', 656428, '2025-08-12 19:12:01'),
(97, 44, 'proposal', 'analysis_report_3-1.pdf', 'dokumen_pengajuan/3dS31cCrYh2qYh9NqGqcKJC3LSQ7CsQdxBKURxRK.pdf', 2321, '2025-08-12 19:12:02'),
(98, 45, 'surat_pengantar', 'IDENTIFIKASI PEMASALAHAN DALAM PROSES PEMBAYARAN SANTRI UTS_METOPEN_KEL 8 A1A2 (1)_corrected-8.pdf', 'dokumen_pengajuan/64sEL25TQ6QL6dQ1Pk8taUVEbma4YM5Avz3NPETX.pdf', 656428, '2025-08-12 19:43:44'),
(99, 45, 'proposal', 'IDENTIFIKASI PEMASALAHAN DALAM PROSES PEMBAYARAN SANTRI UTS_METOPEN_KEL 8 A1A2 (1)_corrected-1.pdf', 'dokumen_pengajuan/JaR8wrUcIXirPjsGVufhZpiyFIi3zhtYYeZn2H8o.pdf', 702510, '2025-08-12 19:43:44'),
(100, 46, 'surat_pengantar', 'IDENTIFIKASI PEMASALAHAN DALAM PROSES PEMBAYARAN SANTRI UTS_METOPEN_KEL 8 A1A2 (1)_corrected.pdf', 'dokumen_pengajuan/5SkLqPm71JKoqOs5UDU4O110YS0ESU2UQOmPJF5H.pdf', 655214, '2025-08-12 20:26:27'),
(101, 46, 'proposal', 'IDENTIFIKASI PEMASALAHAN DALAM PROSES PEMBAYARAN SANTRI UTS_METOPEN_KEL 8 A1A2 (1)_corrected-9.pdf', 'dokumen_pengajuan/NWH4K3db9Kkk6ed0kEquHqikdg8hmoRp9PrxNrs0.pdf', 656428, '2025-08-12 20:26:27'),
(102, 47, 'surat_pengantar', 'Penghargaan - arfannurivandi-5145 1_ Microsoft Learn.pdf', 'dokumen_pengajuan/9u51In29k12e2X8VYkBxHlemMHdcSBf3BW2pxzZY.pdf', 372538, '2025-08-20 19:46:20'),
(103, 47, 'proposal', 'Penghargaan - arfannurivandi-5145 1_ Microsoft Learn.pdf', 'dokumen_pengajuan/SRZF6VgHuVeMdNblNaQJQigwdskD32cJeR7nWCjx.pdf', 372538, '2025-08-20 19:46:20');

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
('bzMnvbKVGv1FsWjdUHHSOJ3NMh1khlxsX50URAFk', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVU4yWGliSWZDOVBGVGNMT0pscU1hVHA1NjBaSzNkMmViUWp3a2JXViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wZW5nYWp1YW4vYmlkYW5nLzQ3Ijt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1761220559);

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
(45, NULL, 'vbvn', NULL, NULL, NULL, NULL, 0, '2025-08-06 12:21:10', '2025-08-06 12:21:10'),
(46, NULL, 'mhbn', NULL, NULL, NULL, NULL, 0, '2025-08-11 23:06:11', '2025-08-11 23:06:11'),
(47, NULL, 'data analisis', NULL, NULL, NULL, NULL, 0, '2025-10-20 20:20:34', '2025-10-20 20:20:34'),
(48, NULL, 'Pemrograman Python', NULL, NULL, NULL, NULL, 0, '2025-10-20 20:22:37', '2025-10-20 20:22:37'),
(49, NULL, 'Version Control System', NULL, NULL, NULL, NULL, 0, '2025-10-20 20:23:11', '2025-10-20 20:23:11'),
(50, NULL, 'pemorgraman java', NULL, NULL, NULL, NULL, 0, '2025-10-20 20:29:57', '2025-10-20 20:29:57');

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
(43, 'Universitas Islam Raden Rahmat Malang', 'Fakultas Sains dan Teknologi', 'Teknik Informatika', '2025-08-06 12:20:58', '2025-08-06 12:20:58'),
(44, 'Universitas Islam Negeri Maulana Malik Ibrahim Malang', 'Fakultas Teknik', 'Ilmu Komputer', '2025-08-11 23:05:41', '2025-08-11 23:05:41');

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
(22, 'Arfan Nur Ivandi', 42, '22552021032', '085171015681', 'arfanvn@gmail.com', '2025-08-06 00:17:41', '$2y$12$mMbtBjDoIs2whilY1CFyx.QznsTM.sQGP9U1UxeLa4c5VRbvKh19K', 'foto_user/9dI4SewfLUN0fRgaDJNz0V7Q1Rq0X2yQb2Xpmku8.png', 'active', NULL, '2025-08-06 00:17:07', '2025-08-13 00:33:00', 'Saya adalah seorang mahasiswa yang berfokus untuk mengembangkan kemampuan di bidang informatikan dan komputer', 'Jl Sumbersari Panggungrejo Kepanjen Malang'),
(23, 'arfannn', 43, 'sdfdfdg', '08813303251', 'ivanarfan57@gmail.com', '2025-08-06 12:15:50', '$2y$12$R5a8Gp24vVGzZXWEZq2q4.ED9Z.RSCeP4hVRgctk041FGTtXI6jvC', 'foto_user/NitFUueuZyPloXbDB1TXta4PRnw6amWdJsJZHhmE.jpg', 'active', NULL, '2025-08-06 12:15:19', '2025-08-06 12:20:58', 'dsdfsdgfghtyh', 'asdf'),
(24, 'arfan nur ivandi', 43, '22552021034', '0851710165681', 'ivanandi775@gmail.com', '2025-08-11 23:05:03', '$2y$12$7HOeMfD.LetC04sJ3h9sI.IcWkb8p2JqfRKTtQh1lwv9vzLeLSI4a', 'foto_user/cKErkJttM8WM2FoAFPidSZ3vbzHYrpqkiFn3nnok.jpg', 'active', NULL, '2025-08-11 22:58:04', '2025-10-14 09:57:08', NULL, 'Jl Sumbersari Panggungrejo Kepanjen Malang'),
(25, 'ivan andi', NULL, NULL, '087575733', 'andiauri51@gmail.com', NULL, '$2y$12$CoKFxVRfo5HA53NBOV7YHOZrGpBCaprMbeIhKmAh3ggipWwC1URjy', NULL, 'active', NULL, '2025-10-20 20:15:55', '2025-10-20 20:15:55', NULL, NULL),
(26, 'arfan testing', 43, '123456789', '987654321', 'andiaurii51@gmail.com', '2025-10-20 20:28:49', '$2y$12$eqLIVYQ6p33pzdUQZZZuEeGpK4XFfvcKFnqtReG06tmMKCiG4Wa7a', 'foto_user/UNudfdAoC5LCikm7HRnVbGuoBaOBh2Y4QC6ce1DX.jpg', 'active', NULL, '2025-10-20 20:26:31', '2025-10-20 20:29:44', '123456789', NULL);

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
(34, 23, NULL, 45, 'Menengah', NULL, '2025-08-06 12:21:10', '2025-08-06 12:21:10'),
(35, 24, NULL, 46, 'Pemula', NULL, '2025-08-11 23:06:11', '2025-08-11 23:06:11'),
(36, 22, NULL, 47, 'Mahir', 'sertifikat/fsOhRqUzA6fyKQEPIttdalUTI4h6tFuvSdwaHwJI.pdf', '2025-10-20 20:20:34', '2025-10-20 20:20:34'),
(37, 22, NULL, 48, 'Menengah', 'sertifikat/HHgFHkxWbKZV1r6D4mbm369YDm4nWFohmr6M4Wct.pdf', '2025-10-20 20:22:37', '2025-10-20 20:22:37'),
(38, 22, NULL, 49, 'Pemula', NULL, '2025-10-20 20:23:11', '2025-10-20 20:23:11'),
(39, 26, NULL, 50, 'Menengah', NULL, '2025-10-20 20:29:57', '2025-10-20 20:29:57');

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
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `databidang`
--
ALTER TABLE `databidang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `documentation_images`
--
ALTER TABLE `documentation_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logbooks`
--
ALTER TABLE `logbooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pengajuan_documents`
--
ALTER TABLE `pengajuan_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `pengajuan_status_history`
--
ALTER TABLE `pengajuan_status_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  ADD CONSTRAINT `logbooks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

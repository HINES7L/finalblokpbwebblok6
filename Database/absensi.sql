-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 12:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_guru`
--

CREATE TABLE `absensi_guru` (
  `id_absenguru` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `jam_absen` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_guru`
--

INSERT INTO `absensi_guru` (`id_absenguru`, `id_guru`, `jam_absen`, `status`, `tanggal`) VALUES
(1, 1, '07:15:00', 'Hadir', '2025-02-24'),
(2, 8, '22:07:41', 'Hadir', '2025-03-03'),
(4, 1, '06:35:08', 'Hadir', '2025-03-04'),
(5, 9, '03:06:32', 'Hadir', '2025-03-09'),
(6, 9, '12:49:51', 'Hadir', '2025-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id_absensiswa` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `jam_absen` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id_absensiswa`, `id_siswa`, `jam_absen`, `status`, `tanggal`) VALUES
(1, 1, '10:00:00', 'Hadir', '2025-02-24'),
(2, 5, '07:59:00', 'Hadir', '2025-02-24'),
(3, 6, '07:58:00', 'Hadir', '2025-02-23'),
(4, 13, '03:35:44', 'Hadir', '2025-03-03'),
(5, 12, '03:44:56', 'Hadir', '2025-03-03'),
(6, 5, '06:57:37', 'Hadir', '2025-03-03'),
(35, 1, '20:53:32', 'Hadir', '2025-03-03'),
(39, 16, '07:31:19', 'Hadir', '2025-03-04'),
(40, 17, '12:48:13', 'Hadir', '2025-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_guru` varchar(255) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_user`, `nama_guru`, `nik`, `alamat`, `no_hp`, `code`, `created_at`, `created_by`, `updated_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 2, 'Karina', 27492912, 'Batu Batam', 2147483647, 'qrcode_27492912.png', '2025-04-01 16:25:05', NULL, '2025-04-07 21:02:46', 40, NULL, NULL),
(8, 25, 'Kalila', 2957536, 'istana', 8567424, 'qrcode_2957536.png', '2025-04-01 16:25:05', NULL, NULL, NULL, NULL, NULL),
(9, 26, 'Viviane', 4789854, 'istana', 8567424, 'qrcode_4789854.png', '2025-04-01 16:25:05', NULL, NULL, NULL, NULL, NULL),
(10, 27, 'Nayera', 2586354, 'istana', 858395, NULL, '2025-04-01 16:25:05', NULL, NULL, NULL, NULL, NULL),
(11, 30, 'Yera', 482732, 'istana', 8837520, NULL, '2025-04-01 16:25:05', NULL, NULL, NULL, NULL, NULL),
(17, 39, 'Adrian', 31731321, 'istana', 8567424, 'qrcode_31731321.png', '2025-04-01 16:25:05', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `sesi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_mapel`, `id_guru`, `hari`, `jam_mulai`, `jam_selesai`, `sesi`) VALUES
(1, 2, 1, 1, 'Selasa', '08:15:00', '09:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_guru`) VALUES
(2, 'RPL XI B', 8),
(8, 'RPL XI B', NULL),
(9, 'RPL XI Bc', NULL),
(11, 'RPL Xl A', 1),
(12, 'AKL Xl', 17);

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `what_happens` text NOT NULL,
  `happens_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id_log`, `id_user`, `what_happens`, `happens_at`, `ip_address`) VALUES
(1, 1, 'User Accessed Listing Page', '2025-04-01 14:02:48', '182.2.6.184'),
(2, 1, 'User Accessed Listing Page', '2025-04-01 14:03:29', '182.2.7.164'),
(3, 1, 'User Akses Dashboard', '2025-04-01 14:17:58', '182.2.7.188'),
(4, 1, 'User Akses Dashboard', '2025-04-01 14:18:28', '182.2.6.160'),
(5, 1, 'User Akses Dashboard', '2025-04-01 14:22:11', '182.2.6.160'),
(6, 1, 'User Akses Dashboard', '2025-04-01 14:50:46', '182.2.6.172'),
(7, 1, 'User Akses Dashboard', '2025-04-01 14:52:05', '182.2.7.176'),
(8, 1, 'User Akses Dashboard', '2025-04-01 14:54:29', '182.2.6.172'),
(9, 1, 'User Akses Dashboard', '2025-04-01 15:28:59', '182.2.6.160'),
(10, 1, 'User Akses Dashboard', '2025-04-01 15:33:07', '182.2.7.176'),
(11, 1, 'User Akses Dashboard', '2025-04-01 16:02:39', '180.252.59.214'),
(12, 1, 'User Akses User', '2025-04-01 16:03:07', '180.252.59.214'),
(13, 1, 'User Akses Tabel Guru', '2025-04-01 16:04:16', '180.252.59.214'),
(14, 1, 'User Akses Tabel Guru', '2025-04-01 16:18:41', '180.252.59.214'),
(15, 1, 'User Akses Dashboard', '2025-04-01 16:19:08', '180.252.59.214'),
(16, 1, 'User Akses User', '2025-04-01 16:21:03', '180.252.59.214'),
(17, 1, 'User Akses Tabel Guru', '2025-04-01 16:21:26', '180.252.59.214'),
(18, 1, 'User Akses Tabel Guru', '2025-04-01 16:46:38', '180.252.59.214'),
(19, 1, 'User Akses Tabel Guru', '2025-04-01 16:47:33', '180.252.59.214'),
(20, 1, 'User Akses Tabel Guru', '2025-04-01 16:47:39', '180.252.59.214'),
(21, 1, 'User Akses Dashboard', '2025-04-01 16:48:04', '180.252.59.214'),
(22, 1, 'User Akses Tabel Guru', '2025-04-01 16:48:11', '180.252.59.214'),
(23, 1, 'User Akses Dashboard', '2025-04-01 16:48:33', '180.252.59.214'),
(24, 1, 'User Akses Dashboard', '2025-04-01 16:49:02', '180.252.59.214'),
(25, 1, 'User Akses Tabel Guru', '2025-04-01 16:49:12', '180.252.59.214'),
(26, 1, 'User Akses Dashboard', '2025-04-02 12:00:49', '103.160.15.14'),
(27, 1, 'User Akses Tabel Guru', '2025-04-02 12:01:46', '103.160.15.14'),
(28, 1, 'User Akses Tabel Guru', '2025-04-02 12:05:55', '103.160.15.14'),
(29, 1, 'User Akses Tabel Guru', '2025-04-02 12:06:16', '103.160.15.14'),
(30, 1, 'User Akses Tabel Guru', '2025-04-02 12:06:49', '103.160.15.14'),
(31, 1, 'User Akses Dashboard', '2025-04-02 12:10:49', '103.160.15.14'),
(32, 1, 'User Akses Tabel Guru', '2025-04-02 12:10:59', '103.160.15.14'),
(33, 1, 'User Akses Tabel Guru', '2025-04-02 12:11:48', '103.160.15.14'),
(34, 1, 'User Akses Tabel Guru', '2025-04-02 12:12:07', '103.160.15.14'),
(35, 1, 'User Akses Tabel Guru', '2025-04-02 12:12:51', '103.160.15.14'),
(36, 1, 'User Akses Tabel Guru', '2025-04-02 12:13:43', '103.160.15.14'),
(37, 1, 'User Akses Tabel Guru', '2025-04-02 12:17:15', '103.160.15.14'),
(38, 1, 'User Akses Siswa', '2025-04-02 12:17:24', '103.160.15.14'),
(39, 1, 'User Akses Siswa', '2025-04-02 12:22:06', '103.160.15.14'),
(40, 1, 'User Akses Siswa', '2025-04-02 12:25:07', '103.160.15.14'),
(41, 1, 'User Akses Siswa', '2025-04-02 12:25:47', '103.160.15.14'),
(42, 1, 'User Akses Siswa', '2025-04-02 12:28:37', '103.160.15.14'),
(43, 1, 'User Akses Tabel Guru', '2025-04-02 12:29:29', '103.160.15.14'),
(44, 1, 'User Akses Siswa', '2025-04-02 12:30:37', '103.160.15.14'),
(45, 1, 'User Akses Siswa', '2025-04-02 12:31:24', '103.160.15.14'),
(46, 1, 'User Akses Siswa', '2025-04-02 12:32:15', '103.160.15.14'),
(47, 1, 'User Akses Siswa', '2025-04-02 12:37:35', '103.160.15.14'),
(48, 1, 'User Akses Siswa', '2025-04-02 12:37:40', '103.160.15.14'),
(49, 1, 'User Akses Siswa', '2025-04-02 12:43:24', '103.160.15.14'),
(50, 1, 'User Akses Siswa', '2025-04-02 12:43:41', '103.160.15.14'),
(51, 1, 'User Akses kelas', '2025-04-02 12:47:12', '103.160.15.14'),
(52, 1, 'User Akses Dashboard', '2025-04-02 12:48:30', '103.160.15.14'),
(53, 1, 'User Akses User', '2025-04-02 12:49:06', '103.160.15.14'),
(54, 1, 'User Akses Dashboard', '2025-04-02 12:49:55', '103.160.15.14'),
(55, 1, 'User Akses User', '2025-04-02 12:50:26', '103.160.15.14'),
(56, 1, 'User Akses Dashboard', '2025-04-02 12:50:45', '103.160.15.14'),
(57, 1, 'User Akses Dashboard', '2025-04-02 12:51:24', '103.160.15.14'),
(58, 1, 'User Akses Dashboard', '2025-04-02 13:01:15', '103.160.15.14'),
(59, 1, 'User Akses Dashboard', '2025-04-02 13:04:32', '103.160.15.14'),
(60, 1, 'User Akses Dashboard', '2025-04-02 13:04:48', '103.160.15.14'),
(61, 1, 'User Akses Dashboard', '2025-04-02 13:06:18', '103.160.15.14'),
(62, 1, 'User Akses Dashboard', '2025-04-02 13:07:14', '103.160.15.14'),
(63, 1, 'User Akses Dashboard', '2025-04-02 13:08:23', '103.160.15.14'),
(64, 1, 'User Akses Dashboard', '2025-04-02 13:08:49', '103.160.15.14'),
(65, 1, 'User Akses Dashboard', '2025-04-02 13:09:39', '103.160.15.14'),
(66, 1, 'User Akses Dashboard', '2025-04-02 13:11:08', '103.160.15.14'),
(67, 1, 'User Akses Dashboard', '2025-04-02 13:11:33', '103.160.15.14'),
(68, 1, 'User Akses Dashboard', '2025-04-02 13:12:56', '103.160.15.14'),
(69, 1, 'User Akses Dashboard', '2025-04-02 13:13:09', '103.160.15.14'),
(70, 1, 'User Akses Dashboard', '2025-04-02 13:18:15', '103.160.15.14'),
(71, 1, 'User Akses User', '2025-04-02 13:19:41', '103.160.15.14'),
(72, 1, 'User Akses User', '2025-04-02 13:22:01', '103.160.15.14'),
(73, 1, 'User Akses User', '2025-04-02 13:45:33', '103.160.15.14'),
(74, 1, 'User Akses Tabel Guru', '2025-04-02 13:46:45', '103.160.15.14'),
(75, 1, 'User Akses Siswa', '2025-04-02 13:48:46', '103.160.15.14'),
(76, 1, 'User Akses Siswa', '2025-04-02 13:49:21', '103.160.15.14'),
(77, 1, 'User Akses kelas', '2025-04-02 13:49:22', '103.160.15.14'),
(78, 1, 'User Akses User', '2025-04-02 13:49:48', '103.160.15.14'),
(79, 1, 'User Akses User', '2025-04-02 13:50:38', '103.160.15.14'),
(80, 1, 'User Akses User', '2025-04-02 13:51:38', '103.160.15.14'),
(81, 1, 'User Akses User', '2025-04-02 13:51:53', '103.160.15.14'),
(82, 1, 'User Akses User', '2025-04-02 13:52:04', '103.160.15.14'),
(83, 1, 'User Akses User', '2025-04-02 13:53:07', '103.160.15.14'),
(84, 1, 'User Akses User', '2025-04-02 13:53:43', '103.160.15.14'),
(85, 1, 'User Akses laporan', '2025-04-02 13:54:09', '103.160.15.14'),
(86, 1, 'User Akses Dashboard', '2025-04-02 13:54:20', '103.160.15.14'),
(87, 1, 'User Akses User', '2025-04-02 14:00:00', '103.160.15.14'),
(88, 1, 'User Akses User', '2025-04-02 14:01:14', '103.160.15.14'),
(89, 1, 'User Akses Absensi Siswa', '2025-04-02 14:01:39', '103.160.15.14'),
(90, 1, 'User Akses Absensi Guru', '2025-04-02 14:01:49', '103.160.15.14'),
(91, 1, 'User Akses Absensi Siswa', '2025-04-02 14:01:59', '103.160.15.14'),
(92, 1, 'User Akses Absensi Log Activity', '2025-04-02 14:03:15', '103.160.15.14'),
(93, 1, 'User Akses Absensi Log Activity', '2025-04-02 14:03:28', '103.160.15.14'),
(94, 2, 'User Akses Dashboard', '2025-04-02 14:04:56', '103.160.15.14'),
(95, 2, 'User Akses Dashboard', '2025-04-02 14:05:53', '103.160.15.14'),
(96, 2, 'User Akses Dashboard', '2025-04-02 14:09:29', '103.160.15.14'),
(97, 2, 'User Akses Dashboard', '2025-04-02 14:10:55', '103.160.15.14'),
(98, 2, 'User Akses Dashboard', '2025-04-02 14:12:22', '103.160.15.14'),
(99, 3, 'User Akses Dashboard', '2025-04-02 14:17:46', '103.160.15.14'),
(100, 3, 'User Akses Dashboard', '2025-04-02 14:21:11', '103.160.15.14'),
(101, 3, 'User Akses Dashboard', '2025-04-02 14:21:18', '103.160.15.14'),
(102, 2, 'User Akses Dashboard', '2025-04-02 14:24:44', '103.160.15.14'),
(103, 2, 'User Akses Dashboard', '2025-04-02 14:25:10', '103.160.15.14'),
(104, 2, 'User Akses Dashboard', '2025-04-02 14:26:05', '103.160.15.14'),
(105, 2, 'User Akses Dashboard', '2025-04-02 14:29:00', '103.160.15.14'),
(106, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:40:26', '103.160.15.14'),
(107, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:42:18', '103.160.15.14'),
(108, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:43:29', '103.160.15.14'),
(109, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:43:52', '103.160.15.14'),
(110, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:45:16', '103.160.15.14'),
(111, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:47:33', '103.160.15.14'),
(112, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:48:11', '103.160.15.14'),
(113, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:50:03', '103.160.15.14'),
(114, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:50:50', '103.160.15.14'),
(115, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:55:20', '103.160.15.14'),
(116, 2, 'User Akses Absensi Log Activity', '2025-04-02 14:55:47', '103.160.15.14'),
(117, 2, 'User Akses Absensi Log Activity', '2025-04-02 15:00:28', '103.160.15.14'),
(118, 2, 'User Akses Absensi Log Activity', '2025-04-02 15:00:35', '103.160.15.14'),
(119, 2, 'User Akses Absensi Log Activity', '2025-04-02 15:11:30', '103.160.15.14'),
(120, 2, 'User Akses Absensi Log Activity', '2025-04-02 15:11:34', '103.160.15.14'),
(121, 2, 'User Akses Absensi Log Activity', '2025-04-02 15:16:04', '103.160.15.14'),
(122, 2, 'User Akses Dashboard', '2025-04-02 15:16:13', '103.160.15.14'),
(123, 2, 'User Akses Dashboard', '2025-04-02 15:18:33', '103.160.15.14'),
(124, 3, 'User Akses Dashboard', '2025-04-02 15:19:40', '103.160.15.14'),
(125, 3, 'User Akses Absensi Log Activity', '2025-04-02 15:20:23', '103.160.15.14'),
(126, 3, 'User Akses Absensi Log Activity', '2025-04-02 15:20:41', '103.160.15.14'),
(127, 3, 'User Akses Absensi Log Activity', '2025-04-02 15:27:44', '103.160.15.14'),
(128, 2, 'User Akses Dashboard', '2025-04-02 15:28:54', '103.160.15.14'),
(129, 2, 'User Akses Dashboard', '2025-04-02 15:38:20', '103.160.15.14'),
(130, 1, 'User Akses Dashboard', '2025-04-04 19:39:38', '180.242.194.168'),
(131, 1, 'User Akses Siswa', '2025-04-04 19:39:52', '180.242.194.168'),
(132, 40, 'User Akses Dashboard', '2025-04-06 14:16:20', '110.137.68.228'),
(133, 1, 'User Akses Dashboard', '2025-04-06 14:17:01', '110.137.68.228'),
(134, 40, 'User Akses Dashboard', '2025-04-06 14:20:14', '110.137.68.228'),
(135, 40, 'User Akses Dashboard', '2025-04-06 14:23:57', '110.137.68.228'),
(136, 40, 'User Akses User', '2025-04-06 14:24:12', '110.137.68.228'),
(137, 40, 'User Akses User', '2025-04-06 14:24:54', '110.137.68.228'),
(138, 40, 'User Akses User', '2025-04-06 14:27:00', '110.137.68.228'),
(139, 40, 'User Akses User', '2025-04-06 14:27:54', '110.137.68.228'),
(140, 40, 'User Akses Dashboard', '2025-04-06 14:28:58', '110.137.68.228'),
(141, 1, 'User Akses Dashboard', '2025-04-06 14:29:23', '110.137.68.228'),
(142, 1, 'User Akses Dashboard', '2025-04-06 15:07:55', '110.137.68.228'),
(143, 40, 'User Akses Dashboard', '2025-04-06 15:08:32', '110.137.68.228'),
(144, 40, 'User Akses Dashboard', '2025-04-06 15:24:36', '110.137.68.228'),
(145, 1, 'User Akses Dashboard', '2025-04-06 15:24:52', '110.137.68.228'),
(146, 1, 'User Akses Dashboard', '2025-04-06 15:25:35', '110.137.68.228'),
(147, 1, 'User Akses User', '2025-04-06 15:25:57', '110.137.68.228'),
(148, 1, 'User Akses Dashboard', '2025-04-06 15:30:09', '110.137.68.228'),
(149, 40, 'User Akses Dashboard', '2025-04-06 15:30:39', '110.137.68.228'),
(150, 40, 'User Akses Dashboard', '2025-04-06 16:41:53', '110.137.68.228'),
(151, 40, 'User Akses User', '2025-04-06 16:42:03', '110.137.68.228'),
(152, 40, 'User Akses User', '2025-04-06 16:51:00', '110.137.68.228'),
(153, 40, 'User Akses User', '2025-04-06 17:01:15', '110.137.68.228'),
(154, 40, 'User Akses Tabel Guru', '2025-04-06 17:01:24', '110.137.68.228'),
(155, 40, 'User Akses Tabel Guru', '2025-04-06 17:12:04', '110.137.68.228'),
(156, 40, 'User Akses Tabel Guru', '2025-04-06 17:18:13', '110.137.68.228'),
(157, 40, 'User Akses Tabel Guru', '2025-04-06 17:28:51', '110.137.68.228'),
(158, 40, 'User Akses Tabel Guru', '2025-04-06 17:41:14', '110.137.68.228'),
(159, 40, 'User Akses Siswa', '2025-04-06 17:42:16', '110.137.68.228'),
(160, 40, 'User Akses Siswa', '2025-04-06 17:52:09', '110.137.68.228'),
(161, 40, 'User Akses Siswa', '2025-04-06 17:57:37', '110.137.68.228'),
(162, 40, 'User Akses Siswa', '2025-04-06 17:59:03', '110.137.68.228'),
(163, 40, 'User Akses kelas', '2025-04-06 17:59:12', '110.137.68.228'),
(164, 40, 'User Akses kelas', '2025-04-06 17:59:42', '110.137.68.228'),
(165, 40, 'User Akses Absensi Guru', '2025-04-06 18:03:43', '110.137.68.228'),
(166, 40, 'User Akses Absensi Guru', '2025-04-06 18:04:28', '110.137.68.228'),
(167, 40, 'User Akses Absensi Siswa', '2025-04-06 18:08:16', '110.137.68.228'),
(168, 40, 'User Akses Absensi Siswa', '2025-04-06 18:27:03', '110.137.68.228'),
(169, 40, 'User Akses Absensi Siswa', '2025-04-06 19:25:07', '110.137.68.228'),
(170, 40, 'User Akses Absensi Siswa', '2025-04-06 19:26:02', '110.137.68.228'),
(171, 40, 'User Akses Tabel Guru', '2025-04-06 19:27:55', '110.137.68.228'),
(172, 40, 'User Akses Siswa', '2025-04-06 19:28:04', '110.137.68.228'),
(173, 40, 'User Akses Absensi Siswa', '2025-04-06 19:29:24', '110.137.68.228'),
(174, 40, 'User Akses Absensi Siswa', '2025-04-06 19:30:10', '110.137.68.228'),
(175, 40, 'User Akses Absensi Siswa', '2025-04-06 19:30:23', '110.137.68.228'),
(176, 40, 'User Akses Absensi Siswa', '2025-04-06 19:33:14', '110.137.68.228'),
(177, 40, 'User Akses Absensi Siswa', '2025-04-06 19:37:13', '110.137.68.228'),
(178, 40, 'User Akses Absensi Siswa', '2025-04-06 19:39:45', '110.137.68.228'),
(179, 40, 'User Akses Tabel Guru', '2025-04-06 19:39:51', '110.137.68.228'),
(180, 40, 'User Akses Absensi Guru', '2025-04-06 19:40:01', '110.137.68.228'),
(181, 40, 'User Akses Absensi Siswa', '2025-04-06 19:40:07', '110.137.68.228'),
(182, 40, 'User Akses Absensi Guru', '2025-04-06 19:40:25', '110.137.68.228'),
(183, 40, 'User Akses laporan', '2025-04-06 19:43:09', '110.137.68.228'),
(184, 40, 'User Akses laporan', '2025-04-06 19:43:39', '110.137.68.228'),
(185, 40, 'User Akses laporan', '2025-04-06 19:44:24', '110.137.68.228'),
(186, 40, 'User Akses Dashboard', '2025-04-06 20:02:27', '110.137.68.228'),
(187, 40, 'User Akses Absensi Log Activity', '2025-04-06 20:03:46', '110.137.68.228'),
(188, 40, 'User Akses Dashboard', '2025-04-06 20:21:29', '110.137.68.228'),
(189, 1, 'User Akses Dashboard', '2025-04-06 21:17:26', '110.137.68.228'),
(190, 1, 'User Akses Dashboard', '2025-04-07 00:12:02', '110.137.68.228'),
(191, 1, 'User Akses User', '2025-04-07 00:14:26', '110.137.68.228'),
(192, 1, 'User Akses Tabel Guru', '2025-04-07 00:17:55', '110.137.68.228'),
(193, 1, 'User Akses Absensi Guru', '2025-04-07 00:34:33', '110.137.68.228'),
(194, 1, 'User Akses kelas', '2025-04-07 00:35:10', '110.137.68.228'),
(195, 1, 'User Akses kelas', '2025-04-07 00:35:19', '110.137.68.228'),
(196, 1, 'User Akses kelas', '2025-04-07 00:35:50', '110.137.68.228'),
(197, 1, 'User Akses Absensi Guru', '2025-04-07 00:41:48', '110.137.68.228'),
(198, 1, 'User Akses Absensi Siswa', '2025-04-07 00:45:01', '110.137.68.228'),
(199, 1, 'User Akses Absensi Log Activity', '2025-04-07 00:49:34', '110.137.68.228'),
(200, 2, 'User Akses Dashboard', '2025-04-07 00:54:22', '110.137.68.228'),
(201, 2, 'User Akses Dashboard', '2025-04-07 01:17:09', '110.137.68.228'),
(202, 2, 'User Akses Dashboard', '2025-04-07 01:36:04', '110.137.68.228'),
(203, 2, 'User Akses Dashboard', '2025-04-07 01:36:17', '110.137.68.228'),
(204, 2, 'User Akses Dashboard', '2025-04-07 01:44:30', '110.137.68.228'),
(205, 2, 'User Akses Dashboard', '2025-04-07 01:55:57', '110.137.68.228'),
(206, 2, 'User Akses Dashboard', '2025-04-07 02:01:25', '110.137.68.228'),
(207, 2, 'User Akses Absensi Log Activity', '2025-04-07 02:05:44', '110.137.68.228'),
(208, 2, 'User Akses Absensi Log Activity', '2025-04-07 02:05:49', '110.137.68.228'),
(209, 3, 'User Akses Dashboard', '2025-04-07 02:07:37', '110.137.68.228'),
(210, 3, 'User Akses Absensi Log Activity', '2025-04-07 02:15:01', '110.137.68.228'),
(211, 3, 'User Akses Absensi Log Activity', '2025-04-07 02:15:31', '110.137.68.228'),
(212, 2, 'User Akses Dashboard', '2025-04-07 02:16:47', '110.137.68.228'),
(213, 2, 'User Akses kelas', '2025-04-07 02:16:57', '110.137.68.228'),
(214, 40, 'User Akses Dashboard', '2025-04-07 02:20:48', '110.137.68.228'),
(215, 40, 'User Akses User', '2025-04-07 02:23:16', '110.137.68.228'),
(216, 40, 'User Akses User', '2025-04-07 02:26:41', '110.137.68.228'),
(217, 40, 'User Akses Dashboard', '2025-04-07 20:48:34', '180.242.195.66'),
(218, 40, 'User Akses Dashboard', '2025-04-07 20:48:54', '180.242.195.66'),
(219, 40, 'User Akses User', '2025-04-07 20:49:17', '180.242.195.66'),
(220, 40, 'User Akses User', '2025-04-07 20:51:55', '180.242.195.66'),
(221, 40, 'User Akses User', '2025-04-07 20:52:07', '180.242.195.66'),
(222, 40, 'User Akses User', '2025-04-07 20:52:26', '180.242.195.66'),
(223, 40, 'User Akses User', '2025-04-07 20:52:38', '180.242.195.66'),
(224, 40, 'User Akses Tabel Guru', '2025-04-07 20:52:55', '180.242.195.66'),
(225, 40, 'User Akses Siswa', '2025-04-07 20:53:29', '180.242.195.66'),
(226, 40, 'User Akses Absensi Guru', '2025-04-07 20:53:48', '180.242.195.66'),
(227, 40, 'User Akses Absensi Log Activity', '2025-04-07 20:54:11', '180.242.195.66'),
(228, 1, 'User Akses Dashboard', '2025-04-07 20:54:48', '180.242.195.66'),
(229, 1, 'User Akses User', '2025-04-07 20:55:04', '180.242.195.66'),
(230, 2, 'User Akses Dashboard', '2025-04-07 20:55:45', '180.242.195.66'),
(231, 2, 'User Akses Absensi Log Activity', '2025-04-07 20:56:08', '180.242.195.66'),
(232, 2, 'User Akses Dashboard', '2025-04-07 20:56:26', '180.242.195.66'),
(233, 40, 'User Akses Dashboard', '2025-04-07 20:59:29', '180.242.195.66'),
(234, 40, 'User Akses Absensi Siswa', '2025-04-07 21:00:20', '180.242.195.66'),
(235, 40, 'User Akses Dashboard', '2025-04-07 21:00:32', '180.242.195.66'),
(236, 40, 'User Akses User', '2025-04-07 21:00:45', '180.242.195.66'),
(237, 40, 'User Akses User', '2025-04-07 21:01:24', '180.242.195.66'),
(238, 40, 'User Akses User', '2025-04-07 21:01:43', '180.242.195.66'),
(239, 40, 'User Akses Tabel Guru', '2025-04-07 21:01:53', '180.242.195.66'),
(240, 40, 'User Akses Tabel Guru', '2025-04-07 21:02:48', '180.242.195.66'),
(241, 40, 'User Akses Siswa', '2025-04-07 21:03:34', '180.242.195.66'),
(242, 40, 'User Akses kelas', '2025-04-07 21:03:48', '180.242.195.66'),
(243, 40, 'User Akses kelas', '2025-04-07 21:04:16', '180.242.195.66'),
(244, 40, 'User Akses laporan', '2025-04-07 21:04:31', '180.242.195.66'),
(245, 40, 'User Akses Dashboard', '2025-04-07 21:05:52', '180.242.195.66'),
(246, 40, 'User Akses Absensi Log Activity', '2025-04-07 21:06:02', '180.242.195.66'),
(247, 1, 'User Akses Dashboard', '2025-04-07 21:06:34', '180.242.195.66'),
(248, 1, 'User Akses User', '2025-04-07 21:06:47', '180.242.195.66'),
(249, 2, 'User Akses Dashboard', '2025-04-07 21:07:22', '180.242.195.66'),
(250, 2, 'User Akses kelas', '2025-04-07 21:07:41', '180.242.195.66'),
(251, 3, 'User Akses Dashboard', '2025-04-07 21:08:23', '180.242.195.66'),
(252, 3, 'User Akses Absensi Log Activity', '2025-04-07 21:08:39', '180.242.195.66'),
(253, 1, 'User Akses Dashboard', '2025-04-13 22:56:23', '180.242.195.66'),
(254, 1, 'User Akses Dashboard', '2025-04-14 09:36:12', '182.2.4.182'),
(255, 1, 'User Akses Dashboard', '2025-04-14 09:42:13', '182.2.4.182'),
(256, 1, 'User Akses Dashboard', '2025-04-14 09:43:03', '182.2.4.182'),
(257, 1, 'User Akses Dashboard', '2025-04-14 09:44:49', '182.2.4.182'),
(258, 1, 'User Akses Dashboard', '2025-04-14 10:10:23', '182.2.4.182'),
(259, 1, 'User Akses Dashboard', '2025-04-14 14:11:16', '182.2.4.182'),
(260, 1, 'User Akses Dashboard', '2025-04-14 14:26:04', '182.2.4.182'),
(261, 1, 'User Akses Dashboard', '2025-04-14 14:26:32', '182.2.4.182'),
(262, 1, 'User Akses Dashboard', '2025-04-14 19:58:07', '180.242.195.66'),
(263, 1, 'User Akses Absensi Log Activity', '2025-04-14 19:58:16', '180.242.195.66'),
(264, 1, 'User Akses Dashboard', '2025-04-14 19:59:31', '180.242.195.66'),
(265, 1, 'User Akses Absensi Log Activity', '2025-04-14 19:59:42', '180.242.195.66'),
(266, 1, 'User Akses Dashboard', '2025-04-14 20:00:14', '180.242.195.66'),
(267, 1, 'User Akses Absensi Log Activity', '2025-04-14 20:00:28', '180.242.195.66'),
(268, 1, 'User Akses Dashboard', '2025-04-14 20:00:35', '180.242.195.66'),
(269, 1, 'User Akses Dashboard', '2025-04-14 20:04:36', '180.242.195.66'),
(270, 1, 'User Akses Dashboard', '2025-04-14 20:04:50', '180.242.195.66'),
(271, 1, 'User Akses Dashboard', '2025-04-14 20:05:05', '180.242.195.66'),
(272, 1, 'User Akses Dashboard', '2025-04-14 20:05:20', '180.242.195.66'),
(273, 1, 'User Akses Dashboard', '2025-04-14 20:05:39', '180.242.195.66'),
(274, 1, 'User Akses Dashboard', '2025-04-14 20:08:13', '180.242.195.66'),
(275, 1, 'User Akses Dashboard', '2025-04-14 20:08:32', '180.242.195.66'),
(276, 1, 'User Akses Dashboard', '2025-04-14 20:08:44', '180.242.195.66'),
(277, 1, 'User Akses Dashboard', '2025-04-14 20:10:44', '180.242.195.66'),
(278, 1, 'User Akses Dashboard', '2025-04-14 20:11:37', '180.242.195.66'),
(279, 1, 'User Akses Dashboard', '2025-04-16 09:10:18', '36.68.182.54'),
(280, 1, 'User Akses User', '2025-04-16 09:10:59', '36.68.182.54'),
(281, 1, 'User Akses Dashboard', '2025-04-17 21:33:59', '180.242.196.113'),
(282, 1, 'User Akses Dashboard', '2025-04-17 21:35:49', '180.242.196.113'),
(283, 1, 'User Akses Dashboard', '2025-04-17 22:13:16', '180.242.196.113'),
(284, 1, 'User Akses Dashboard', '2025-04-17 22:13:30', '180.242.196.113'),
(285, 1, 'User Akses Dashboard', '2025-04-17 22:14:42', '180.242.196.113'),
(286, 1, 'User Akses Dashboard', '2025-04-17 22:18:55', '180.242.196.113'),
(287, 1, 'User Akses Dashboard', '2025-04-17 22:19:22', '180.242.196.113'),
(288, 1, 'User Akses User', '2025-04-17 22:19:43', '180.242.196.113'),
(289, 1, 'User Akses Dashboard', '2025-04-17 22:25:54', '180.242.196.113'),
(290, 1, 'User Akses Menu Catering', '2025-04-17 22:26:07', '180.242.196.113'),
(291, 1, 'User Akses Menu Catering', '2025-04-17 22:28:07', '180.242.196.113'),
(292, 1, 'User Akses Dashboard', '2025-04-17 22:35:26', '180.242.196.113'),
(293, 1, 'User Akses Dashboard', '2025-04-18 19:26:51', '180.242.195.126'),
(294, 1, 'User Akses Menu Catering', '2025-04-18 19:28:33', '180.242.195.126'),
(295, 1, 'User Akses Menu Catering', '2025-04-18 19:49:11', '180.242.195.126'),
(296, 1, 'User Akses Dashboard', '2025-04-20 13:24:23', '180.242.195.126'),
(297, 1, 'User Akses Dashboard', '2025-04-20 13:34:08', '180.242.195.126'),
(298, 1, 'User Akses Dashboard', '2025-04-20 13:36:11', '180.242.195.126'),
(299, 1, 'User Akses Dashboard', '2025-04-20 13:37:48', '180.242.195.126'),
(300, 1, 'User Akses Dashboard', '2025-04-20 13:43:28', '180.242.195.126'),
(301, 1, 'User Akses Dashboard', '2025-04-20 13:46:21', '180.242.195.126'),
(302, 1, 'User Akses Menu Catering', '2025-04-20 13:46:31', '180.242.195.126'),
(303, 1, 'User Akses Menu Catering', '2025-04-20 13:57:39', '180.242.195.126'),
(304, 1, 'User Akses Dashboard', '2025-04-20 14:17:56', '180.242.195.126'),
(305, 1, 'User Akses Dashboard', '2025-04-20 14:18:54', '180.242.195.126'),
(306, 1, 'User Akses Dashboard', '2025-04-20 14:24:19', '180.242.195.126'),
(307, 1, 'User Akses Dashboard', '2025-04-20 14:25:14', '180.242.195.126'),
(308, 1, 'User Akses Dashboard', '2025-04-20 14:26:43', '180.242.195.126');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Pemrograman Web'),
(3, 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nis` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `nama_siswa`, `nis`, `id_kelas`, `alamat`, `no_hp`, `code`, `created_at`, `created_by`, `updated_at`, `update_by`, `deleted_at`, `deleted_by`) VALUES
(1, 3, 'Lala', 19374224, 2, 'Batu Batam', 856294249, 'qrcode_19374224.png', '2025-04-02 12:42:50', NULL, NULL, NULL, NULL, NULL),
(16, 29, 'Winter', 4759232, 2, 'istana', 9486048, 'qrcode_4759232.png', '2025-04-02 12:42:50', NULL, NULL, NULL, NULL, NULL),
(17, 31, 'Ningnings', 24739412, 2, 'istana', 8258721, 'qrcode_2473941.png', '2025-04-02 12:42:50', NULL, NULL, NULL, NULL, NULL),
(18, 32, 'Gisellee', 57302311, 1, 'istana', 8258721, 'qrcode_57302311.png', '2025-04-02 12:42:50', NULL, '2025-04-02 12:43:39', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `status` enum('Admin','Guru','Siswa','Kepala Sekolah','Super Admin') DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `kondisi` tinyint(1) DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`, `status`, `nama_user`, `kondisi`, `token`, `expiry`) VALUES
(1, 'mey', '1020', '1', 'foto.jpg', 'Admin', 'Meyliana', 0, NULL, NULL),
(2, 'karina', '1020', '2', 'user.jpg', 'Guru', 'Karina', 0, NULL, NULL),
(3, 'lala', '1020', '3', 'pict.jpg', 'Siswa', 'Lala', 0, NULL, NULL),
(25, 'kalila', '1111', '2', '1740981377_424102088f7c8298fe178b8e66e4f70f.jpg', 'Guru', 'Kalila', 0, NULL, NULL),
(26, 'viviane', '1020', '2', '1740981436_424102088f7c8298fe178b8e66e4f70f.jpg', 'Guru', 'Viviane', 0, NULL, NULL),
(27, 'nayera', '1111', '2', '1741057911_pp.jpg', 'Guru', 'Nayera', 0, NULL, NULL),
(29, 'winter', '1111', '3', '1741085591_95609088d58c351d743ccbcc0ec6a3c0.jpg', 'Siswa', 'Winter', 0, NULL, NULL),
(30, 'yera', '1020', '2', '1741086215_d85e30974c3a404b1ea177cdec9f1884.jpg', 'Guru', 'Yera', 1, NULL, NULL),
(31, 'ningning', '1020', '3', '1741086461_69fcd6417383eb5fbd8612667d825a4f.jpg', 'Siswa', 'Ningning', 1, NULL, NULL),
(32, 'giselle', '1020', '3', '1741086733_b86b175329770ce28e4c91af3838de3b.jpg', 'Siswa', 'Giselle', 1, NULL, NULL),
(39, 'adrian', '1111', '2', '1741172547_95609088d58c351d743ccbcc0ec6a3c0.jpg', 'Guru', 'Adrian', 1, NULL, NULL),
(40, 'S7EVEN', '1508', '4', 'sc.JPG', 'Super Admin', 'steven', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
  ADD PRIMARY KEY (`id_absenguru`);

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id_absensiswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `id_guru` (`id_guru`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
  MODIFY `id_absenguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id_absensiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

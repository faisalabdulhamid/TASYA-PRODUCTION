-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 02:43 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasya_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_daerah_pemasaran`
--

CREATE TABLE `calon_daerah_pemasaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `kota_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calon_distributor`
--

CREATE TABLE `calon_distributor` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_distributor`
--

INSERT INTO `calon_distributor` (`id`, `status`, `created_at`, `updated_at`, `pegawai_id`, `pelanggan_id`) VALUES
(2, 1, '2017-12-29 17:59:26', '2017-12-29 17:59:26', 1, 1),
(3, 1, '2017-12-29 18:00:03', '2017-12-29 18:00:03', 1, 3),
(4, 1, '2017-12-29 18:01:51', '2017-12-29 18:01:51', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_calon_daerah_pemasaran`
--

CREATE TABLE `detail_calon_daerah_pemasaran` (
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `calon_daerah_pemasaran_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_calon_distributor`
--

CREATE TABLE `detail_calon_distributor` (
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `calon_distributor_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_calon_distributor`
--

INSERT INTO `detail_calon_distributor` (`kriteria_id`, `calon_distributor_id`, `nilai`) VALUES
(1, 2, 3),
(2, 2, 3),
(3, 2, 3),
(4, 2, 3),
(5, 2, 3),
(1, 3, 4),
(2, 3, 3),
(3, 3, 5),
(4, 3, 2),
(5, 3, 2),
(1, 4, 3),
(2, 4, 2),
(3, 4, 5),
(4, 4, 2),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `jumlah` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `pesanan_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`jumlah`, `sub_total`, `pesanan_id`, `produk_id`) VALUES
(1, 116000, 6, 12),
(2, 144000, 6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `pelanggan_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`url`, `nama`, `created_at`, `updated_at`) VALUES
('baju', 'Baju', '2017-12-30 18:41:39', '2017-12-30 18:41:39'),
('celana', 'Celana', '2017-12-30 18:41:39', '2017-12-30 18:41:39'),
('popok', 'Popok', '2017-12-30 18:41:39', '2017-12-30 18:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(10) UNSIGNED NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `kota`, `provinsi_id`, `created_at`, `updated_at`) VALUES
(1, 'Bandung', 12, '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(2, 'Kota Tasikmalaya', 12, '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(3, 'Kab Tasikmalaya', 12, '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(4, 'Bekasi', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(5, 'Depok', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(6, 'Bogor', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(7, 'Kuningan', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(8, 'Majalengka', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(9, 'Cirebon', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(10, 'Indramayu', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(11, 'Garut', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(12, 'Pangandaran', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(13, 'Ciamis', 12, '2017-11-23 12:47:05', '2017-11-23 12:47:05'),
(14, 'NAD', 1, NULL, NULL),
(15, 'Kabupaten Pidie', 1, NULL, NULL),
(16, 'Kabupaten Simeulue', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` decimal(3,2) NOT NULL,
  `benefit` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kriteria`, `bobot`, `benefit`, `created_at`, `updated_at`) VALUES
(1, 'Usia 0 Tahun', '0.40', 1, '2017-11-23 12:47:02', '2017-11-23 12:47:02'),
(2, 'Wanita Usia Subur', '0.20', 1, '2017-11-23 12:47:02', '2017-11-23 12:47:02'),
(3, 'Rata – rata anak yang dilahirkan per wanita', '0.20', 1, '2017-11-23 12:47:02', '2017-11-23 12:47:02'),
(4, 'Peserta KB', '0.20', 0, '2017-11-23 12:47:02', '2017-11-23 12:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_distributor`
--

CREATE TABLE `kriteria_distributor` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` decimal(3,2) NOT NULL,
  `benefit` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_distributor`
--

INSERT INTO `kriteria_distributor` (`id`, `kriteria`, `bobot`, `benefit`, `created_at`, `updated_at`) VALUES
(1, 'Kapasitas Parkir', '0.50', 1, NULL, '2017-12-10 07:35:51'),
(2, 'Jarak dengan pusat kota', '0.00', 1, NULL, NULL),
(3, 'Jumlah Pesaing dalam radius 5 km', '0.00', 1, NULL, NULL),
(4, 'Jumlah Rata-rata transaksi 3 bulan Terakhir', '0.00', 1, NULL, NULL),
(5, 'Jenis Toko', '0.00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(76, '2014_10_12_100000_create_password_resets_table', 1),
(77, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(78, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(79, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(80, '2016_06_01_000004_create_oauth_clients_table', 1),
(81, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(82, '2017_11_23_154333_create_pegawais_table', 1),
(83, '2017_11_23_154440_create_provinsis_table', 1),
(84, '2017_11_23_154505_create_kotas_table', 1),
(85, '2017_11_23_154535_create_produks_table', 1),
(86, '2017_11_23_154939_create_kriterias_table', 1),
(87, '2017_11_23_155003_create_calon_daerah_pemasarans_table', 1),
(88, '2017_11_23_155054_create_pelanggans_table', 1),
(89, '2017_11_23_155116_create_pesanans_table', 1),
(90, '2017_11_23_155159_buat_table_detail_pesanan', 1),
(91, '2017_12_10_095032_buat_table_detail_calon_daerah_pemasaran', 2),
(92, '2017_12_10_141911_buat_table_kriteria_distributor', 3),
(93, '2017_12_10_161315_create_distributors_table', 4),
(96, '2017_12_30_000744_create_calon_distributors_table', 5),
(97, '2017_12_30_001528_buat_table_detail_calon_distributor', 5),
(98, '2017_12_31_012338_BuatTableKategori', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Paige Von', 'tasya@gmail.com', '$2y$10$lMo9URpGzysfyfuhO4XT6urHgk.NRxzVtwJfxtae.4L.HAUnp1LoW', 'admin', 'EJvgdrJQYBJY0ixzkIu3VfBwux6ZU8SfT7djLVAkfabcN0QeW5uAwQBAXgJ2', '2017-11-23 12:47:03', '2017-12-10 13:06:10'),
(2, 'Houston Schultz', 'nathen.botsford@example.org', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'marketing', 'aUP2WcvETu', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(3, 'Marilou Goodwin PhD', 'raynor.juston@example.com', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'admin', 'YAZfIrAhwB', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(4, 'Yadira Turner', 'yhirthe@example.net', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'marketing', 'MVBMEHqgGH', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(5, 'Antonina Olson', 'freddy12@example.org', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'marketing', 'wEwrUKXNXz', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(6, 'Prof. Heath Heaney Sr.', 'yswift@example.org', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'marketing', 'AEHSFeNKt1', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(7, 'Emmy Torp IV', 'marjory93@example.org', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'admin', '68X2iMJ2oA', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(8, 'Adeline Fisher', 'pascale.braun@example.net', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'admin', 'BC4reAVcNY', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(10, 'Odie Donnelly', 'xkoch@example.org', '$2y$10$OUOuCKqVn3hW4cXC5HNrZO7eTXue330Q/Le0IqlfEjm7x1PO9WiMi', 'admin', 'vAuEtwKnAw', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(11, 'a', '', '', '', NULL, NULL, NULL),
(12, 'Hamid', 'hamid@gmail.com', '$2y$10$XT/e60ChGqawDfD.mjdigObcxmm7CTk/EuolObiDUZURvPgHKki4O', 'marketing', NULL, '2017-12-10 00:23:47', '2017-12-10 00:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_telepon`, `alamat`, `kota_id`, `created_at`, `updated_at`) VALUES
(1, 'KLA/Sinar Abadi', '021-31902929', 'Kampung Bali 4 no. 5 Tn. Abang  Jakarta Pusat', 1, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(2, 'Cabaru', '021-5307645', 'Jl. Umbut Blok 1 no. 25 Perum Kelapa Dua Pos pengumben Jakarta Barat ', 2, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(3, 'City Ramayana', '021-8580947', 'jl. Slamet Riyadi IV No.5A Matraman Jakarta Timur', 3, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(4, 'Baby Post', '0817-9116-811', 'Jln. Sentosa Raya No. 94 Depan Kantor Pos Depok 2', 4, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(5, 'Kayana', '021-77207274', 'Jl. H. Asmawi No.107 A Beji, Depok  16421', 2, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(6, ' GOLDEN FAMILY', '021-6631383', 'DHI Blok LL No.9 Kapuk Muara Jakut', 3, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(7, 'Giat Jaya', '021-6913718', 'Pengukiran Raya 40 A Jakarta Utara ', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(8, 'Hawaii', '081-322787028', 'Jl. Gajah Mada No.120, Dauh Puri Kaja, Denpasar Utara, Kota Denpasar, Bali 80231', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(9, 'Melati Baby Needs', '021-6013082', 'Pusat Grosir pasar pagi Mangga Dua Lantai DSR / A-059', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(11, 'Julian Global', '0816-1814-568', 'Blok A LT. 1 Los E No. 112, Blok A Lt. 2 Los F No. 66, Office Jl. Pluit Timur Blok Barat No.23 Jakut', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(12, 'Favorit', '021-39845149', 'Jembatan Hijau Blok A Lantai 2 Los C No 45-47-49 Pasar regional Tanah abang Jakpus', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(13, 'Cayang Coll.', '021-56966866', 'Blok B Lantai SLG Los C No. 160-161 Pasar tanah Abang Jakpus', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(14, 'Ade Rudi', '0821-1533-5958', ' Jl. Paseh Gg. Gn.Ceuri 1 rt04/09 no.158 Kel. TuguRaja Kec.Cihideung Kota tasikmalaya 46125 ', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(15, 'PRO BABY', '(0542) 413394', 'JL. JEND. A YANI NO. 8B RT 33 GUNUNG SARI ULU KEL , MEKAR SARI BALIKPAPAN 76122  KALIMANTAN TIMUR', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(16, 'PRIMA UTAMA', '(061) 4532986', 'JL. PUSAT PASAR NO . 6 - P MEDAN  20212', NULL, '2017-11-23 12:47:07', '2017-11-23 12:47:07'),
(17, 'MUJUR GIRI JAYA', '0813.6223.7658', 'JL. SUTOMO NO. 650  MEDAN', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(18, 'JERICO', '8', 'JL. KUMALA NO 80 MAKASAR', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(19, 'BOBO ', '(0452) 422204', 'GUNUNG SARI NO. 78 BALIKPAPAN', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(20, 'BOBO ', '0852.7226.8080', 'JL. S PARMAN RUKO SIMPANG NO. 5 SAMARINDA ', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(21, 'AURELIA', '(0542) 732240', 'JL. JEND SUDIRMAN N. 5 ( KLANDASAN ) BALIKPAPAN', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(22, 'BABY STAR', '(0541) 4121689', 'JL. KH ABDUL MARISIE NO . 84 - 85 KEL , PASAR PAGI  SAMPING MASJID RAYA SMARINDA', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(23, 'RAHMAT', '8', 'JL . A . YANI NO 6 BUKIT TINGGI SUMATRA BARAT', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(24, 'DEWI ', '(0741) 23967', 'JL. SUPRATMAN NO. 71 JAMBI', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(25, 'ZAHRA', '0812.8262.8061', 'JL. AR HAKIM / BAKTI NO. 98D ', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(26, 'CITRA', '( 0711 ) 358685', 'JL. TENGKURUK PERMAI BLOK C NO. 161 / 938', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(27, 'JORDANS', '( 0721) 240222', 'JL. PANGKAL PINANG NO. 3 TANJUNG KARANG BANDAR LAMPUNG', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(28, 'TUNAS BARU / DUNIA BARU', '0812.7516.421', 'JL. IMAM BONJOL PLAZA SUKARAME BLOK UD 01 PEKANBARU', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(29, 'HAWAII', '( 0361 ) 434676', 'JL. GAJAH MADA NO. 120 DENPASAR , BALI', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(30, 'TOPS BABY', '0858.1759.0699', 'JL. JEND . SUDIRMAN NO. 34 TOBO ALI BANGKA SELATAN , BABEL', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(31, 'YAHYA BABY SHOP', '0853.6139.9935', 'JL. LETDA SUDJONO NO. 6  TITI SEWA ( DEPAN AYAM PENYET AKBAR )', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(32, 'ADE RUDI', '0821.1533.5958', 'JL. PASEH Gg GN CEURI I  NO. 158 RT 04 / 09 KEL : TUGU RAJA KEC  :  CIHIDEUNG  TSK  46125', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(33, 'JELITA BABY', '0878.5140.0288', 'PGS LT 1 BLOK 1 - 3  NO.  5 - 6 SURABAYA , JATIM', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(34, 'SUMBER MAS', '0813.3298.8898', 'ITC LT UG B15  1 - 2 SURABAYA  ,  JATIM', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(35, 'ANGELYNE', '0812.3564.057', 'PS KAPASAN LANTAI 1 BLOK NB - 175 SURABAYA', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(36, 'AMANAH', '0819.1133.4437', 'JL. RAYA PALIMANAN NO. 150 CIREBON 45161', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(37, 'SUMBER MAJU', '2', 'JL. PENGUKIRAN II NO. 36 RT 08 / 03 JAKARTA BARAT 11240', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(38, 'CINTA', '-21,2591785', 'PALEM PARADISE BLOK KK 1 NO. 10 ( DEKAT PASAR LARIS ) JAKARTA BARAT', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(39, 'YUSUF', '0813.2235.7843', 'JL. SUDIRMAN NO. 13  BUKIT TINGGI', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(40, 'JODO', '0822.4200.9600', 'JL PEMUDA NO. 149 MAGELANG , JATENG', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(41, 'AGUNG', '( 024. 3515694 )', 'JL. ALUN ALUN SELATAN NO. 8 SEMARANG , JATENG', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(42, 'KIDDY LAND', '( 031. 7347878 )', 'PERUM DARMA HILL BLOK A NO. 27 ( DEPAN HOTEL SANGRILA ) SURABAYA , JATIM', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(43, 'YESTOYA', '0838.4969.5333', 'MANYAR KERTOADI NO. 75 SURABAYA', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08'),
(44, 'KLA / SINAR ABADI', '( 021. 30902929 )', 'KAMPUNG BALI 4 NO. 5 JAKARTA', NULL, '2017-11-23 12:47:08', '2017-11-23 12:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `created_at`, `updated_at`, `pelanggan_id`, `pegawai_id`) VALUES
(6, '2017-12-10', '2017-12-10 02:28:26', '2017-12-10 02:28:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `kategori_id`) VALUES
(1, 'DKP S', 'DK Celana Panjang Putih S', 108000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', 'baju'),
(2, 'DKP M', 'DK Celana Panjang Putih M', 113000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', 'celana'),
(3, 'DKP L', 'DK Celana Panjang Putih L', 118000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', 'popok'),
(4, 'DKP XL', 'DK Celana Panjang Putih XL', 123000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', 'baju'),
(5, 'DKP Tks', 'DK Celana Panjang Putih Tks', 108000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', 'baju'),
(6, 'DKP POP', 'DK Celana Pop Putih', 69000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', 'celana'),
(7, 'DKP PDK', 'DK Celana Pendek Putih', 73000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', NULL),
(8, 'DKP BNKG', 'DK Baju Neci Putih Kutung', 71000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', NULL),
(9, 'DKP BNPDK', 'DK Baju Neci Putih Pendek', 74000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', NULL),
(11, 'DKW S', 'DK Celana Panjang Warna S', 111000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', NULL),
(12, 'DKW M', 'DK Celana Panjang Warna M', 116000, NULL, 'images/produk/product.png', '2017-11-23 12:47:05', '2017-11-23 12:47:05', NULL),
(13, 'DKW L', 'DK Celana Panjang Warna L', 121000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(14, 'DKW XL', 'DK Celana Panjang Warna XL', 126000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(15, 'DKW Tks', 'DK Celana Panjang Warna Tks', 111000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(16, 'DKW POP', 'DK Celana Pop  Warna ', 72000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(17, 'DKW PDK', 'DK Celana Pendek Warna ', 77000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(18, 'DKW BNKG', 'DK Baju Neci Warna Kutung', 73000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(19, 'DKW BNPDK', 'DK Baju Neci Warna Pendek', 76000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(20, 'DKW BNPJG', 'DK Baju Neci  Warna  Panjang', 79000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(21, 'TCP S', 'Celana Panjang Putih S', 101000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(22, 'TCP M', 'Celana Panjang Putih M', 106000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(23, 'TCP L', 'Celana Panjang Putih L', 111000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(24, 'TCP XL', 'Celana Panjang Putih XL', 116000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(25, 'TCP Tks', 'Celana Panjang Putih Tks', 101000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(26, 'TCP POP', 'Celana Pop Putih', 62000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(27, 'TCP PDK', 'Celana Pendek Putih', 68000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(28, 'TCP BNKTG', 'Baju Neci Putih Kutung', 66000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(29, 'TCP BNPDK', 'Baju Neci Putih Pendek', 69000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(30, 'TCP BNPJG', 'Baju Neci Putih Panjang', 72000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(31, 'TCP BOS', 'Baju Oblong Putih S', 103000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(32, 'TCP BOM', 'Baju Oblong Putih M', 108000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(33, 'TCP BOL', 'Baju Oblong Putih L', 113000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(34, 'TCP BOXL', 'Baju Oblong Putih XL', 118000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(35, 'TCP BBKTG', 'Baju Bis Putih Kutung', 69000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(36, 'TCP BBPDK', 'Baju Bis Putih Pendek', 73000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(37, 'TCP BBPJG', 'Baju Bis Putih Panjang', 77000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(38, 'TCP PL', 'Popok Lapis Putih', 54000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(39, 'TCP BDG', 'Bedongan putih', 250000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(40, 'TCW S', 'Celana Panjang Warna S', 106000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(41, 'TCW M', 'Celana Panjang Warna M', 111000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(42, 'TCW L', 'Celana Panjang Warna L', 116000, NULL, 'images/produk/product.png', '2017-11-23 12:47:06', '2017-11-23 12:47:06', NULL),
(43, 'TCW XL', 'Celana Panjang Warna XL', 121000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(44, 'TCW Tks', 'Celana Panjang Warna Tks', 106000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(45, 'TCW POP', 'Celana Pop Warna', 66000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(46, 'TCW PDK', 'Celana Pendek Warna', 70000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(47, 'TCW BNKTG', 'Baju Neci Warna Kutung', 68000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(48, 'TCW BNPDK', 'Baju Neci Warna Pendek', 71000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(49, 'TCW BNPJG', 'Baju Neci Warna Panjang', 74000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(50, 'TCW BOS', 'Baju Oblong Warna S', 103000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(51, 'TCW BOM', 'Baju Oblong Warna M', 108000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(52, 'TCW BOL', 'Baju Oblong Warna L', 113000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(53, 'TCW BOXL', 'Baju Oblong Warna XL', 118000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(54, 'LJ S', 'LJ Celana Panjang Warna S', 106000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(55, 'LJ M', 'LJ Celana Panjang Warna M', 111000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(56, 'LJ L', 'LJ Celana Panjang Warna L', 116000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(57, 'LJ XL', 'LJ Celana Panjang Warna XL', 121000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(58, 'LJ Tks', 'LJ Celana Panjang Warna Tks', 106000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(59, 'LJ POP', 'LJ Celana Pop Warna', 66000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(60, 'LJ PDK', 'LJ Celana Pendek Warna', 70000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(61, 'LJ BNKTG', 'LJ Baju Neci Warna Kutung', 68000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(62, 'LJ BNPDK', 'LJ Baju Neci Warna Pendek', 71000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL),
(63, 'LJ BNPJG', 'LJ Baju Neci Warna Panjang', 74000, NULL, 'images/produk/product.png', '2017-11-23 12:47:07', '2017-11-23 12:47:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(10) UNSIGNED NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Aceh / Nangroe Aceh Darussalam', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(2, 'Sumatera Utara', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(3, 'Sumatera Barat', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(4, 'Riau (Daratan)', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(5, 'Kepulauan Riau', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(6, 'Jambi', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(7, 'Sumatera Selatan', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(8, 'Bangka Belitung', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(9, 'Bengkulu yang', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(10, 'Lampung', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(11, 'DKI Jakarta', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(12, 'Jawa Barat', '2017-11-23 12:47:03', '2017-11-23 12:47:03'),
(13, 'Banten', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(14, 'Jawa Tengah', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(15, 'DI Yogyakarta', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(16, 'Jawa Timur', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(17, 'Bali', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(18, 'Nusa Tenggara Barat', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(19, 'Nusa Tenggara Timur', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(20, 'Kalimantan Barat', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(21, 'Kalimantan Tengah', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(22, 'Kalimantan Selatan', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(23, 'Kalimantan Timur', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(24, 'Kalimantan Utara', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(25, 'Sulawesi Utara', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(26, 'Sulawesi Barat', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(27, 'Sulawesi Tengah', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(28, 'Sulawesi Tenggara', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(29, 'Sulawesi Selatan', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(30, 'Gorontalo', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(31, 'Maluku', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(32, 'Maluku Utara', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(33, 'Papua Barat', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(34, 'Papua', '2017-11-23 12:47:04', '2017-11-23 12:47:04'),
(35, 'Teluk Cendrawasih', '2017-11-23 12:47:04', '2017-11-23 12:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_daerah_pemasaran`
--
ALTER TABLE `calon_daerah_pemasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calon_daerah_pemasaran_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `calon_daerah_pemasaran_kota_id_foreign` (`kota_id`);

--
-- Indexes for table `calon_distributor`
--
ALTER TABLE `calon_distributor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `calon_distributor_pelanggan_id_unique` (`pelanggan_id`),
  ADD KEY `calon_distributor_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `detail_calon_daerah_pemasaran`
--
ALTER TABLE `detail_calon_daerah_pemasaran`
  ADD KEY `detail_calon_daerah_pemasaran_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `detail_calon_daerah_pemasaran_calon_daerah_pemasaran_id_foreign` (`calon_daerah_pemasaran_id`);

--
-- Indexes for table `detail_calon_distributor`
--
ALTER TABLE `detail_calon_distributor`
  ADD KEY `detail_calon_distributor_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `detail_calon_distributor_calon_distributor_id_foreign` (`calon_distributor_id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `detail_pesanan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanan_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributor_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`url`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_provinsi_id_foreign` (`provinsi_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_distributor`
--
ALTER TABLE `kriteria_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_email_unique` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_kota_id_foreign` (`kota_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `pesanan_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produk_kode_unique` (`kode`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_daerah_pemasaran`
--
ALTER TABLE `calon_daerah_pemasaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calon_distributor`
--
ALTER TABLE `calon_distributor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kriteria_distributor`
--
ALTER TABLE `kriteria_distributor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_daerah_pemasaran`
--
ALTER TABLE `calon_daerah_pemasaran`
  ADD CONSTRAINT `calon_daerah_pemasaran_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calon_daerah_pemasaran_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `calon_distributor`
--
ALTER TABLE `calon_distributor`
  ADD CONSTRAINT `calon_distributor_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calon_distributor_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_calon_daerah_pemasaran`
--
ALTER TABLE `detail_calon_daerah_pemasaran`
  ADD CONSTRAINT `detail_calon_daerah_pemasaran_calon_daerah_pemasaran_id_foreign` FOREIGN KEY (`calon_daerah_pemasaran_id`) REFERENCES `calon_daerah_pemasaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_calon_daerah_pemasaran_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_calon_distributor`
--
ALTER TABLE `detail_calon_distributor`
  ADD CONSTRAINT `detail_calon_distributor_calon_distributor_id_foreign` FOREIGN KEY (`calon_distributor_id`) REFERENCES `calon_distributor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_calon_distributor_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria_distributor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`url`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

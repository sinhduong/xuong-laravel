-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2024 at 12:04 PM
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
-- Database: `xuong-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `don_hang_id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `don_gia` double NOT NULL,
  `so_luong` int UNSIGNED NOT NULL,
  `thanh_tien` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4324, 6, 25944, '2024-08-03 04:24:10', '2024-08-03 04:24:10'),
(2, 1, 1, 2323, 3, 6969, '2024-08-03 04:24:10', '2024-08-03 04:24:10'),
(3, 2, 1, 2323, 3, 6969, '2024-08-03 08:14:49', '2024-08-03 08:14:49'),
(4, 3, 1, 2323, 4, 9292, '2024-08-03 08:16:26', '2024-08-03 08:16:26'),
(5, 4, 1, 2323, 4, 9292, '2024-08-03 08:16:51', '2024-08-03 08:16:51'),
(6, 5, 1, 2323, 4, 9292, '2024-08-03 08:24:10', '2024-08-03 08:24:10'),
(9, 7, 1, 2323, 1, 2323, '2024-08-04 16:51:30', '2024-08-04 16:51:30'),
(10, 8, 2, 4324, 3, 12972, '2024-08-05 04:31:50', '2024-08-05 04:31:50'),
(11, 9, 1, 2323, 3, 6969, '2024-08-05 04:44:04', '2024-08-05 04:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `hinh_anh`, `ten_danh_muc`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'uploads/danhmucs/3c2BhvhRU0n8pFH0LLzS88fHLWTAiq2WXkHDmKpP.webp', 'Áo Croptop Nữ', 1, '2024-08-01 12:55:39', '2024-08-01 12:55:39'),
(2, 'uploads/danhmucs/g5gAzmm6f5Q62aS2iuPDFuEMGUB2wiryk0suiALJ.jpg', 'Áo Polo nam', 1, '2024-08-01 12:55:58', '2024-08-01 12:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_don_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai_nguoi_nhan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghhi_chu` text COLLATE utf8mb4_unicode_ci,
  `trang_thai_don_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cho_xac_nhan',
  `trang_thai_thanh_toan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'chua_thanh_toan',
  `tien_hang` double NOT NULL,
  `tien_ship` double NOT NULL,
  `tong_tien` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `user_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ghhi_chu`, `trang_thai_don_hang`, `trang_thai_thanh_toan`, `tien_hang`, `tien_ship`, `tong_tien`, `created_at`, `updated_at`) VALUES
(1, 'ORD-1-1722684250', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', NULL, 'huy_don_hang', 'chua_thanh_toan', 32913, 30000, 62913, '2024-08-03 04:24:10', '2024-08-04 00:55:48'),
(2, 'ORD-1-1722698089', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', 'hehe', 'da_giao_hang', 'chua_thanh_toan', 6969, 30000, 36969, '2024-08-03 08:14:49', '2024-08-04 00:56:58'),
(3, 'ORD-1-1722698186', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', 'hehe', 'dang_chuan_bi', 'chua_thanh_toan', 9292, 30000, 39292, '2024-08-03 08:16:26', '2024-08-03 08:16:26'),
(4, 'ORD-1-1722698211', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', 'hihi', 'da_xac_nhan', 'chua_thanh_toan', 9292, 30000, 39292, '2024-08-03 08:16:51', '2024-08-04 16:53:42'),
(5, 'ORD-1-1722698650', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', 'anh sinh bg', 'da_giao_hang', 'chua_thanh_toan', 9292, 30000, 39292, '2024-08-03 08:24:10', '2024-08-04 16:54:46'),
(7, 'ORD-1-1722815490', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', 'ngon bổ dẻ', 'huy_don_hang', 'chua_thanh_toan', 2323, 30000, 32323, '2024-08-04 16:51:30', '2024-08-04 16:51:45'),
(8, 'ORD-1-1722857510', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', NULL, 'cho_xac_nhan', 'chua_thanh_toan', 12972, 30000, 42972, '2024-08-05 04:31:50', '2024-08-05 04:31:50'),
(9, 'ORD-1-1722858244', 1, 'cụ sinh bg', 'sinhduong1508@gmail.com', '0865642497', 'bắc giang', NULL, 'cho_xac_nhan', 'chua_thanh_toan', 6969, 30000, 36969, '2024-08-05 04:44:04', '2024-08-05 04:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `san_pham_id` bigint UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `hinh_anh`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/hinhanhsanpham/id_1/F1ZhccBdLd8LPEMoInbPRbV4BGGU98L7FggRJMIn.webp', '2024-08-01 12:59:46', '2024-08-01 12:59:46'),
(2, 1, 'uploads/hinhanhsanpham/id_1/XiPPKNd3r4MGExiUKOK2unJnVh8RCCJVnAONqiyU.webp', '2024-08-01 12:59:46', '2024-08-01 12:59:46'),
(3, 1, 'uploads/hinhanhsanpham/id_1/vb7bacchqRjJWLBVgQZbwrPPJ2JN9bP0Z2Bv6t38.webp', '2024-08-01 12:59:46', '2024-08-01 12:59:46'),
(4, 2, 'uploads/hinhanhsanpham/id_2/pLKZRTafsjODaZQXsMCuAW0U6BdbQn7NaTQZR9rb.webp', '2024-08-01 13:01:55', '2024-08-01 13:01:55'),
(5, 2, 'uploads/hinhanhsanpham/id_2/otN9FXCfuDK4R8ddxHmbwFST6uqh9JgDMJEYGiGG.webp', '2024-08-01 13:01:55', '2024-08-01 13:01:55'),
(6, 2, 'uploads/hinhanhsanpham/id_2/ZhpHw48T4nBqmRJvLWGpBRWmQq8dSMRMQxXmkC6E.webp', '2024-08-01 13:01:55', '2024-08-01 13:01:55'),
(7, 3, 'uploads/hinhanhsanpham/id_3/JGcd9ilqD1DHiWRG8KNe8L7HWF0oU68pgB2koQ6W.webp', '2024-08-04 17:03:59', '2024-08-04 17:03:59'),
(8, 3, 'uploads/hinhanhsanpham/id_3/f37A0F6hJg4wgHaMP546M2gLI260kMDaOC3fr01g.webp', '2024-08-04 17:04:00', '2024-08-04 17:04:00'),
(9, 3, 'uploads/hinhanhsanpham/id_3/LFsmanAlFLOArDCEo8hGN7M4RZQHtATwDeIGKI1R.webp', '2024-08-04 17:04:00', '2024-08-04 17:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(58, '2014_10_12_000000_create_users_table', 1),
(59, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(60, '2014_10_12_100000_create_password_resets_table', 1),
(61, '2019_08_19_000000_create_failed_jobs_table', 1),
(62, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(63, '2024_07_18_210758_update_user_table', 1),
(64, '2024_07_19_181734_create_danh_mucs_table', 1),
(65, '2024_07_19_181916_create_san_phams_table', 1),
(66, '2024_07_19_181954_create_hinh_anh_san_phams_table', 1),
(67, '2024_08_01_172955_create_don_hangs_table', 1),
(68, '2024_08_01_173112_create_chi_tiet_don_hangs_table', 2),
(69, '2024_08_01_173422_update_users_table', 2),
(70, '2024_08_03_110623_drop_chi_tiet_don_hangs_table', 3),
(71, '2024_08_03_111120_chi_tiet_don_hangs_table', 4),
(72, '2024_08_03_145236_create_jobs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_san_pham` double NOT NULL,
  `gia_khuyen_mai` double DEFAULT NULL,
  `mo_ta_ngan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci,
  `so_luong` int UNSIGNED NOT NULL,
  `luot_xem` bigint UNSIGNED NOT NULL DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `danh_muc_id` bigint UNSIGNED NOT NULL,
  `is_type` tinyint(1) NOT NULL DEFAULT '1',
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_hot` tinyint(1) NOT NULL DEFAULT '1',
  `is_hot_deal` tinyint(1) NOT NULL DEFAULT '1',
  `is_show_home` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `hinh_anh`, `gia_san_pham`, `gia_khuyen_mai`, `mo_ta_ngan`, `noi_dung`, `so_luong`, `luot_xem`, `ngay_nhap`, `danh_muc_id`, `is_type`, `is_new`, `is_hot`, `is_hot_deal`, `is_show_home`, `created_at`, `updated_at`) VALUES
(1, '98BG000001', 'Áo Croptop Nữ 2 Dây Bản To Cổ Vuông ACTFM7', 'uploads/sanpham/hmSUCTEwh9QytnLaHzdwarbiLNlpCkeCmQsvR1Qe.webp', 2900000, 269000, 'hàng mới về đẹp hết nước chấm', '<p>hehe</p>', 100, 0, '2024-09-02', 1, 1, 1, 1, 1, 1, '2024-08-01 12:59:12', '2024-08-05 04:46:50'),
(2, '98BG000002', 'Áo Polo Nam Pique Cotton', 'uploads/sanpham/xhXJVXwPalWBksh8Bbr5Lo3wDjXPUfRB0riCWfhD.webp', 259000, 240000, 'haha', '<p>hihi</p>', 1999, 0, '2024-08-17', 2, 1, 1, 1, 1, 1, '2024-08-01 13:01:08', '2024-08-05 04:47:25'),
(3, '98BG000003', 'Áo tăm lạnh cổ trụ', 'uploads/sanpham/K1YD1pDkfAi3fvxLwoHqOiwT9eIE1Sgifb7TrRU8.jpg', 250000, 239000, 'Mua áo tăm lạnh Cardina mềm mát, thiết kế dáng sát nách cổ cúc trụ trẻ trung, hợp thời trang. Đa dạng màu sắc, nàng thoải mái chọn lựa. Giao hàng toàn quốc.', '<p class=\"ql-align-center\">Mua áo tăm lạnh Cardina mềm mát, thiết kế dáng sát nách cổ cúc trụ trẻ trung, hợp thời trang. Đa dạng màu sắc, nàng thoải mái chọn lựa. Giao hàng toàn quốc.</p><p class=\"ql-align-center\"><br></p><iframe class=\"ql-video ql-align-center\" frameborder=\"0\" allowfullscreen=\"true\" src=\"https://www.youtube.com/embed/Kak7fhApU08\" height=\"801\" width=\"451\"></iframe><p class=\"ql-align-center\"><br></p><p class=\"ql-align-center\"><img src=\"https://file.hstatic.net/200000503583/file/ao-tam-lanh__6__ea22c9d808304401b63ca541b1204c9a.jpg\" alt=\"áo tăm lạnh\"></p><p><br></p>', 1000, 0, '2024-08-05', 1, 1, 1, 1, 1, 1, '2024-08-04 17:03:38', '2024-08-04 17:03:38'),
(4, '98BG000004', 'Áo tăm lạnh cổ trụ uuu', 'uploads/sanpham/1xUU0dIKVABgbLM0lNHMvNIArbAnzAUK7QSvgRor.webp', 650000, 486000, 'llll', '<p>kkk</p>', 10, 0, '2024-08-05', 1, 1, 1, 1, 1, 1, '2024-08-05 05:01:55', '2024-08-05 05:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `address`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cụ sinh bg', '0865642497', 'sinhduong1508@gmail.com', 'bắc giang', NULL, '$2y$12$X3gMbTqluZ6Ww/An.zxeXO9hW7OOOsZj4pftqIhlRzekUMN/1vjKu', 'admin', NULL, '2024-08-01 12:48:10', '2024-08-01 12:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  ADD KEY `chi_tiet_don_hangs_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `don_hangs_ma_don_hang_unique` (`ma_don_hang`),
  ADD KEY `don_hangs_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinh_anh_san_phams_san_pham_id_foreign` (`san_pham_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `san_phams_ma_san_pham_unique` (`ma_san_pham`),
  ADD KEY `san_phams_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

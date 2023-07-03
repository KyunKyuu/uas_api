-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 11:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `produk_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-06-11 20:47:04', '2023-06-11 20:47:04'),
(2, 1, 1, '2023-06-11 20:49:09', '2023-06-11 20:49:09'),
(3, 1, 1, '2023-06-11 20:50:33', '2023-06-11 20:50:33'),
(4, 1, 1, '2023-06-11 20:50:52', '2023-06-11 20:50:52'),
(5, 1, 1, '2023-06-11 21:10:15', '2023-06-11 21:10:15'),
(6, 11, 1, '2023-06-11 21:10:30', '2023-06-11 21:10:30');

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
(13, '2014_10_12_000000_create_produk_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_06_10_135504_create_keranjangs_table', 1),
(17, '2023_06_12_022700_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Antangin', 'Masuk angin bos ??? minum antangin', '4500000000', 'Obat', 'produk/DyjlX0kAwVViA6cW9njXrXcq0MtjirCaubKIf7jt.jpg', '2023-06-11 20:20:13', '2023-06-11 20:20:13'),
(2, 'Mie Indomie', 'Indomiee Seleraku', '3000000', 'Makanan', 'produk/662VbZWEP1C2F3rPBBgyZXSD8euki3ryBG0k1P1L.jpg', '2023-06-11 20:41:13', '2023-06-11 20:41:13'),
(3, 'Kecap Bangoo', 'Hitamntya malika ? hitam banget', '2400000', 'makanan', 'produk/PQO0IsSTxzGL7Paui305AgXXvY8sh1wNySpG5HTF.png', '2023-06-11 20:43:03', '2023-06-11 20:43:03'),
(4, 'Saos ABC', 'Lada sekali', '234000', 'makanan', 'produk/qDkZ7GaYnq8PXnq3FFtxZB1gWwURdp2ixh7DU2NO.jpg', '2023-06-11 20:43:45', '2023-06-11 20:43:45'),
(5, 'Vitamin C', 'Kuning Kuning Kuning', '3000000', 'obat', 'produk/zeWWktgs5natFMIACuEI91LlevunSo1BGOQGSIPO.jpg', '2023-06-11 20:44:47', '2023-06-11 20:44:47'),
(6, 'Gitar Jadul', 'Merdu suaranya, aduhaiii', '56000000', 'Musik', 'produk/vduDefBTRMFcuBbEA7vrlu1tJX3wzB0fmQrKLO08.jpg', '2023-06-11 20:55:07', '2023-06-11 20:55:07'),
(7, 'Suling', 'TUTUTUTUTUUUUUU TUTUUUUU TUUUU', '805000000', 'Musik', 'produk/acSyAcTsEs39iaOwww6I5VXvs1w3Bn9vadtl49vx.jpg', '2023-06-11 20:56:14', '2023-06-11 20:56:14'),
(8, 'Drum', 'Dem bass dem dem bas', '9500000', 'Musik', 'produk/57SzN5DXYusB6gqoa43wAvBOmdJO5bNFomUwai7L.jpg', '2023-06-11 20:57:44', '2023-06-11 20:57:44'),
(9, 'Jamu', 'Jamu mas ?', '6500000', 'Obat', 'produk/0X8ezdvXNFt2d566z35ooNCZv9TiWYh0BoB4zX5p.jpg', '2023-06-11 21:00:01', '2023-06-11 21:00:01'),
(10, 'Meja', 'iini meja cincai laa', '42000000', 'Alat', NULL, '2023-06-11 21:03:18', '2023-06-11 21:03:18'),
(11, 'Gundam nih coy', 'nanti tante ganti', '46500000', 'Mainan', 'produk/oIgAJ1KYH3OoX2gO4guIXKqSHJAwNK2R2ry4uz9s.jpg', '2023-06-11 21:10:05', '2023-06-11 21:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `produk_id`, `nama`, `review`, `created_at`, `updated_at`) VALUES
(2, 9, 'Teguh', 'Jamu nya mbok', '2023-06-11 21:13:08', '2023-06-11 21:13:08'),
(3, 4, 'Iqbal', 'Wahhh baguss', '2023-06-18 05:37:04', '2023-06-18 05:37:04'),
(4, 1, 'Prayoga Iqbal', 'wahhh bejo angine', '2023-06-18 20:39:16', '2023-06-18 20:39:27'),
(6, 1, 'Lahhh', 'jadii banyakk', '2023-06-25 19:26:56', '2023-06-25 19:32:29'),
(7, 1, 'Lahhh', 'jadii banyakk', '2023-06-25 19:27:03', '2023-06-25 19:32:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_produk_id_foreign` (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

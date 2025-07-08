-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2025 at 02:35 AM
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
-- Database: `repository_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Miftakhul Rahman', 'admin@admin.com', '$2y$12$RpwOpGLaKjbU98DcUQfxVuu4DbFPplgJXxAtTtsWBb3evoMn/63By', 'profile-photos/tNBI7aM4FMkBmFp1gehO3AlZ9cVTTlAg43Ek73du.jpg', '2025-06-24 19:02:20', '2025-06-24 19:05:28');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`kategori_id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Animasi', 'animasi', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(2, 'Video', 'video', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(3, 'E-Book', 'e-book', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(4, 'Flibook', 'flibook', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(5, 'Media Pembelajaran Interaktif', 'media-pembelajaran-interaktif', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(6, 'Aplikasi Pendidikan', 'aplikasi-pendidikan', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(7, 'Podcast Edukasi', 'podcast-edukasi', '2025-06-24 19:02:19', '2025-06-24 19:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`mahasiswa_id`, `nim`, `nama_lengkap`, `slug`, `prodi_id`, `created_at`, `updated_at`) VALUES
(1, '22255202045', 'Ahmad Budi Santoso', 'ahmad-budi-santoso', 1, '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(2, '22255202046', 'Siti Nurhaliza', 'siti-nurhaliza', 1, '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(3, '22255202047', 'Rendi Pratama', 'rendi-pratama', 2, '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(6, '22255202050', 'Lestari Indah', 'lestari-indah', 4, '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(7, '22255202051', 'Bayu Setiawan', 'bayu-setiawan', 5, '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(8, '22255202052', 'Anisa Rahmawati', 'anisa-rahmawati', 6, '2025-06-24 19:02:19', '2025-06-24 19:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year NOT NULL,
  `link_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `mahasiswa_id`, `kategori_id`, `judul`, `gambar_cover`, `slug`, `deskripsi`, `judul_penelitian`, `tahun_terbit`, `link_media`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Video Pembelajaran Menulis Teks Prosedur', 'media_covers/IZMXwUPBsBOpoVfruumuJyeJD6VJ2KVYpXVucL7n.jpg', 'video-pembelajaran-menulis-teks-prosedur', 'Video animasi edukatif untuk siswa SMP kelas 7 yang menjelaskan langkah-langkah menulis teks prosedur secara efektif dan menyenangkan.', 'Pengembangan Media Video Edukasi untuk Meningkatkan Keterampilan Menulis Teks Prosedur Siswa SMP', 2024, 'https://www.youtube.com/watch?v=OGAqzvV6jCk&ab_channel=TangkasDigitalEducation', '2025-06-24 19:02:19', '2025-06-24 19:14:30'),
(2, 2, 4, 'E-Modul Apresiasi Puisi Berbasis Flipbook', 'media_covers/EcJMTTucQxYeMdVfG1GnARbgcYELBiPSJPdy9hwu.jpg', 'e-modul-apresiasi-puisi-berbasis-flipbook', 'Modul ajar digital interaktif untuk SMA yang membahas teori dan praktik dalam mengapresiasi karya sastra puisi.', 'Efektivitas Penggunaan E-Modul Berbasis Flipbook dalam Pembelajaran Apresiasi Puisi', 2024, 'https://anyflip.com/myakr/mdpy/basic/101-124', '2025-06-24 19:02:19', '2025-06-24 19:18:30'),
(6, 6, 3, 'E-Book Siklus Akuntansi Perusahaan Jasa', 'media_covers/ng25qMEAhYu0LvBQSax0dcnaPgFtw1uzC4NLAwDb.png', 'e-book-siklus-akuntansi-perusahaan-jasa', 'Sebuah E-Book yang memvisualisasikan alur siklus akuntansi pada perusahaan jasa agar mudah dipahami.', 'Pengaruh Media E-Book terhadap Pemahaman Konsep Siklus Akuntansi Mahasiswa Pendidikan Ekonomi', 2024, 'https://online.fliphtml5.com/jmsmao/opxp/#p=1', '2025-06-24 19:02:20', '2025-06-24 19:26:49'),
(7, 7, 1, 'Animasi Pembangkit Listrik Sederhana', 'media_covers/nji621qcd7TxPwifbbUir3edyapMYAbThm4VgFsq.jpg', 'animasi-pembangkit-listrik-sederhana', 'Video animasi untuk mendemonstrasikan prinsip kerja pembangkit listrik tenaga air skala kecil.', 'Implementasi Animasi Pembangkit Listrik Sederhana untuk Menumbuhkan Minat Belajar Fisika Siswa SMA', 2023, 'https://www.youtube.com/watch?v=FB_unX1TzPI&ab_channel=IreksaEngineer', '2025-06-24 19:02:20', '2025-06-24 19:24:08'),
(8, 8, 1, 'Animasi Kisah Teladan 25 Nabi dan Rasul', 'media_covers/TjbhMfvqEk1GBKvOi5pqDBujlQv6DeGMGRXwb0Qb.jpg', 'animasi-kisah-teladan-25-nabi-dan-rasul', 'Video animasi singkat yang menceritakan kisah-kisah teladan para nabi dan rasul untuk anak-anak TPA/SD.', 'Pengembangan Video Edukasi Kisah Nabi untuk Pendidikan Karakter Anak Usia Dini', 2024, 'https://www.youtube.com/watch?v=Dkz8EJHP6Es&ab_channel=Mahasantri', '2025-06-24 19:02:20', '2025-06-24 19:23:24'),
(9, 1, 5, 'Analisis Unsur Intrinsik Cerpen Interaktif', 'media_covers/acoAdC0CfcHkCthMYXibATFUOhD09Ny28KgRqz3R.jpg', 'analisis-unsur-intrinsik-cerpen-interaktif', 'Sebuah media berbasis web yang memungkinkan siswa untuk menganalisis unsur intrinsik sebuah cerpen secara interaktif.', 'Pengembangan Media Interaktif Analisis Cerpen untuk Meningkatkan Kemampuan Literasi Kritis Siswa', 2024, 'https://www.youtube.com/watch?v=WHgkTci0E7U&ab_channel=ILMCIINDONESIA', '2025-06-24 19:02:20', '2025-06-24 19:22:27'),
(10, 3, 3, 'Modul Praktikum Desain Grafis dengan Canva', 'media_covers/oFTB21YFfPjFSte2kLuW6GIcUJJJShRoyKqPGgIv.png', 'modul-praktikum-desain-grafis-dengan-canva', 'Modul PDF berisi tutorial dan latihan praktik desain grafis dasar menggunakan platform Canva untuk pemula.', 'Penyusunan Modul Ajar Digital Desain Grafis untuk Menunjang Kreativitas Siswa di Era Digital', 2025, 'https://id.scribd.com/document/736622059/Modul-Canva', '2025-06-24 19:02:20', '2025-06-24 19:27:22');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_10_172143_create_kategoris_table', 1),
(6, '2025_06_10_172143_create_prodis_table', 1),
(7, '2025_06_10_172144_create_mahasiswas_table', 1),
(8, '2025_06_10_172144_create_media_table', 1),
(9, '2025_06_10_172145_create_admins_table', 1);

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
-- Table structure for table `prodis`
--

CREATE TABLE `prodis` (
  `prodi_id` bigint UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodis`
--

INSERT INTO `prodis` (`prodi_id`, `nama_prodi`, `slug`, `singkatan`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan Bahasa dan Sastra Indonesia', 'pendidikan-bahasa-dan-sastra-indonesia', 'PBSI', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(2, 'Pendidikan Teknologi Informasi', 'pendidikan-teknologi-informasi', 'PTI', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(3, 'Pendidikan Bahasa Inggris', 'pendidikan-bahasa-inggris', 'PBI', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(4, 'Pendidikan Ekonomi', 'pendidikan-ekonomi', 'PE', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(5, 'Pendidikan Fisika', 'pendidikan-fisika', 'PS', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(6, 'Pendidikan Agama Islam', 'pendidikan-agama-islam', 'PAI', '2025-06-24 19:02:19', '2025-06-24 19:02:19'),
(7, 'Pendidikan Guru Madrasah Ibtidaiyah', 'pendidikan-guru-madrasah-ibtidaiyah', 'PGMI', '2025-06-24 19:02:19', '2025-06-24 19:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `kategoris_slug_unique` (`slug`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD UNIQUE KEY `mahasiswas_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswas_slug_unique` (`slug`),
  ADD KEY `mahasiswas_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD UNIQUE KEY `media_slug_unique` (`slug`),
  ADD KEY `media_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `media_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`prodi_id`),
  ADD UNIQUE KEY `prodis_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `mahasiswa_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `prodi_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`prodi_id`) ON DELETE RESTRICT;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`kategori_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `media_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`mahasiswa_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

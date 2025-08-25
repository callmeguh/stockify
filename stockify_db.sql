-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2025 pada 12.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockify_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Menambahkan kategori Laptop', '2025-08-25 01:29:18', '2025-08-25 01:29:18'),
(2, 1, 'Menambahkan kategori Handphone', '2025-08-25 01:29:34', '2025-08-25 01:29:34'),
(3, 1, 'Menambahkan kategori Kompor', '2025-08-25 01:30:25', '2025-08-25 01:30:25'),
(4, 1, 'Menambahkan kategori TV', '2025-08-25 01:30:37', '2025-08-25 01:30:37'),
(5, 1, 'Menambahkan kategori Kipas Angin', '2025-08-25 01:30:58', '2025-08-25 01:30:58'),
(6, 1, 'Menambahkan kategori Kulkas', '2025-08-25 01:31:25', '2025-08-25 01:31:25'),
(7, 1, 'Menghapus kategori Laptop', '2025-08-25 01:31:40', '2025-08-25 01:31:40'),
(8, 1, 'Menghapus kategori Handphone', '2025-08-25 01:31:48', '2025-08-25 01:31:48'),
(9, 1, 'Menghapus kategori Kompor', '2025-08-25 01:31:55', '2025-08-25 01:31:55'),
(10, 1, 'Menghapus kategori TV', '2025-08-25 01:32:03', '2025-08-25 01:32:03'),
(11, 1, 'Menghapus kategori Kipas Angin', '2025-08-25 01:32:12', '2025-08-25 01:32:12'),
(12, 1, 'Menghapus kategori Kulkas', '2025-08-25 01:32:20', '2025-08-25 01:32:20'),
(13, 1, 'Menambahkan kategori Lobster air tawar', '2025-08-25 01:32:39', '2025-08-25 01:32:39'),
(14, 1, 'Menghapus kategori Lobster air tawar', '2025-08-25 01:32:59', '2025-08-25 01:32:59'),
(15, 1, 'Menambahkan kategori Lobster air tawar', '2025-08-25 01:36:00', '2025-08-25 01:36:00'),
(16, 1, 'Menambahkan kategori Ikan nila', '2025-08-25 01:36:21', '2025-08-25 01:36:21'),
(17, 1, 'Menambahkan kategori Ikan gurame', '2025-08-25 01:36:39', '2025-08-25 01:36:39'),
(18, 1, 'Menambahkan kategori Ikan lele', '2025-08-25 01:36:56', '2025-08-25 01:36:56'),
(19, 1, 'Menambahkan kategori Belut', '2025-08-25 01:37:08', '2025-08-25 01:37:08'),
(20, 1, 'Memperbarui kategori Lobster', '2025-08-25 01:38:12', '2025-08-25 01:38:12'),
(21, 1, 'Memperbarui kategori Ikan', '2025-08-25 01:38:29', '2025-08-25 01:38:29'),
(22, 1, 'Menghapus kategori Ikan gurame', '2025-08-25 01:38:46', '2025-08-25 01:38:46'),
(23, 1, 'Menghapus kategori Ikan lele', '2025-08-25 01:38:54', '2025-08-25 01:38:54'),
(24, 1, 'Menghapus kategori Belut', '2025-08-25 01:39:04', '2025-08-25 01:39:04'),
(25, 1, 'Menambahkan kategori Belut', '2025-08-25 01:39:15', '2025-08-25 01:39:15'),
(26, 1, 'Menambahkan kategori Kerang', '2025-08-25 01:39:29', '2025-08-25 01:39:29'),
(27, 1, 'Menambahkan kategori Ayam', '2025-08-25 01:39:43', '2025-08-25 01:39:43'),
(28, 1, 'Menambahkan kategori Entog', '2025-08-25 01:39:56', '2025-08-25 01:39:56'),
(29, 1, 'Menambahkan supplier Agus', '2025-08-25 01:41:00', '2025-08-25 01:41:00'),
(30, 1, 'Menambahkan supplier jepri', '2025-08-25 01:41:33', '2025-08-25 01:41:33'),
(31, 1, 'Menambahkan supplier Ngatmen', '2025-08-25 01:42:09', '2025-08-25 01:42:09'),
(32, 1, 'Menambahkan produk Redclaw', '2025-08-25 01:45:39', '2025-08-25 01:45:39'),
(33, 1, 'Menambahkan produk Clarky', '2025-08-25 01:47:53', '2025-08-25 01:47:53'),
(34, 1, 'Mengupdate produk Redclaw', '2025-08-25 01:49:46', '2025-08-25 01:49:46'),
(35, 1, 'Mengupdate produk Clarky', '2025-08-25 01:52:39', '2025-08-25 01:52:39'),
(36, 1, 'Menambahkan produk Nila', '2025-08-25 01:55:07', '2025-08-25 01:55:07'),
(37, 1, 'Menambahkan produk Gurame', '2025-08-25 01:56:13', '2025-08-25 01:56:13'),
(38, 1, 'Menambahkan produk Gurame', '2025-08-25 01:56:16', '2025-08-25 01:56:16'),
(39, 1, 'Menghapus produk Gurame', '2025-08-25 01:56:27', '2025-08-25 01:56:27'),
(40, 1, 'Menambahkan produk Lele', '2025-08-25 01:57:23', '2025-08-25 01:57:23'),
(41, 1, 'Menambahkan produk belut konsumsi', '2025-08-25 01:58:50', '2025-08-25 01:58:50'),
(42, 1, 'Menambahkan produk Kijeng', '2025-08-25 02:00:15', '2025-08-25 02:00:15'),
(43, 1, 'Menambahkan produk Bangkok', '2025-08-25 02:02:16', '2025-08-25 02:02:16'),
(44, 1, 'Menambahkan produk Rambon', '2025-08-25 02:03:48', '2025-08-25 02:03:48'),
(45, 1, 'Mengupdate produk Bangkok', '2025-08-25 02:04:31', '2025-08-25 02:04:31'),
(46, 1, 'Mengupdate produk Rambon', '2025-08-25 02:04:58', '2025-08-25 02:04:58'),
(47, 2, 'Mengupdate produk Bangkok', '2025-08-25 03:33:34', '2025-08-25 03:33:34'),
(48, 2, 'Manager mencatat barang MASUK: Bangkok (jumlah: 2)', '2025-08-25 03:33:34', '2025-08-25 03:33:34'),
(49, 2, 'Mengupdate produk Gurame', '2025-08-25 03:33:53', '2025-08-25 03:33:53'),
(50, 2, 'Manager mencatat barang KELUAR: Gurame (jumlah: 100)', '2025-08-25 03:33:53', '2025-08-25 03:33:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluars`
--

CREATE TABLE `barang_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Lobster', '2025-08-25 01:36:00', '2025-08-25 01:38:12'),
(9, 'Ikan', '2025-08-25 01:36:21', '2025-08-25 01:38:29'),
(13, 'Belut', '2025-08-25 01:39:15', '2025-08-25 01:39:15'),
(14, 'Kerang', '2025-08-25 01:39:29', '2025-08-25 01:39:29'),
(15, 'Ayam', '2025-08-25 01:39:43', '2025-08-25 01:39:43'),
(16, 'Entog', '2025-08-25 01:39:56', '2025-08-25 01:39:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_16_123238_add_role_to_users_table', 1),
(6, '2025_08_18_005918_create_categories_table', 1),
(7, '2025_08_18_010242_create_attributes_table', 1),
(8, '2025_08_19_003234_create_suppliers_table', 1),
(9, '2025_08_19_005628_create_products_table', 1),
(10, '2025_08_19_005643_create_product_attributes_table', 1),
(11, '2025_08_19_024500_create_stock_transactions_table', 1),
(12, '2025_08_19_024556_create_stock_opnames_table', 1),
(13, '2025_08_19_024607_add_minimum_stock_to_products', 1),
(14, '2025_08_20_004444_create_settings_table', 1),
(15, '2025_08_22_181154_create_barang_masuks_table', 1),
(16, '2025_08_22_181326_create_barang_keluars_table', 1),
(17, '2025_08_22_235049_create_user_activities_table', 1),
(18, '2025_08_23_030132_add_status_to_stock_transactions_table', 1),
(19, '2025_08_24_230254_create_activity_logs_table', 1),
(20, '2025_08_25_081318_add_bg_color_to_settings_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `minimum_stock` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `supplier_id`, `price`, `stock`, `minimum_stock`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Redclaw', 8, 1, 65000.00, 35, 0, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 01:45:39', '2025-08-25 01:49:46'),
(2, 'Clarky', 8, 2, 5000.00, 150, 0, 'lobster air tawar jenis clarky hasil budidaya jadi mudah beradaptasi di kolam/akuarium anda. sangat cocok untuk menghiasi akuarium kalian karena warnanya yang cantik dan juga terlihat ekosistem yang lebih lengkap di akuarium', '2025-08-25 01:47:53', '2025-08-25 01:52:39'),
(3, 'Nila', 9, 3, 35000.00, 200, 0, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 01:55:07', '2025-08-25 01:55:07'),
(4, 'Gurame', 9, 1, 45000.00, 50, 0, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 01:56:13', '2025-08-25 03:33:53'),
(6, 'Lele', 9, 2, 25000.00, 250, 0, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 01:57:23', '2025-08-25 01:57:23'),
(7, 'belut konsumsi', 13, 3, 40000.00, 200, 0, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 01:58:50', '2025-08-25 01:58:50'),
(8, 'Kijeng', 14, 1, 15000.00, 150, 0, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 02:00:15', '2025-08-25 02:00:15'),
(9, 'Bangkok', 15, 2, 250.00, 22, 5, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 02:02:16', '2025-08-25 03:33:34'),
(10, 'Rambon', 16, 1, 180000.00, 25, 5, 'lobster air tawar jenis red claw hasil budidaya jadi terjamin kebersihannya. sangat cocok untuk menyuplai resto kalian karena kami perbulan siap menyuplai sesuai pesanan anda', '2025-08-25 02:03:48', '2025-08-25 02:04:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(9, 1, 'Habitat', 'Air tawar', '2025-08-25 01:49:46', '2025-08-25 01:49:46'),
(10, 1, 'Harga', 'Perkilo', '2025-08-25 01:49:46', '2025-08-25 01:49:46'),
(11, 1, 'Isi', '5-6 ekor', '2025-08-25 01:49:46', '2025-08-25 01:49:46'),
(12, 1, 'Jenis', 'Konsumsi', '2025-08-25 01:49:46', '2025-08-25 01:49:46'),
(13, 2, 'Habitat', 'Air tawar', '2025-08-25 01:52:39', '2025-08-25 01:52:39'),
(14, 2, 'Harga', 'Per ekor', '2025-08-25 01:52:39', '2025-08-25 01:52:39'),
(15, 2, 'Minim order', '10 ekor', '2025-08-25 01:52:39', '2025-08-25 01:52:39'),
(16, 2, 'Jenis', 'Lobster hias', '2025-08-25 01:52:39', '2025-08-25 01:52:39'),
(17, 3, 'Habitat', 'Air tawar', '2025-08-25 01:55:07', '2025-08-25 01:55:07'),
(18, 3, 'Harga', 'Per kg', '2025-08-25 01:55:07', '2025-08-25 01:55:07'),
(19, 3, 'Isi', '6 ekor', '2025-08-25 01:55:07', '2025-08-25 01:55:07'),
(20, 4, 'Habitat', 'Air tawar', '2025-08-25 01:56:13', '2025-08-25 01:56:13'),
(21, 4, 'Harga', 'Per kg', '2025-08-25 01:56:13', '2025-08-25 01:56:13'),
(22, 4, 'Isi', '6 ekor', '2025-08-25 01:56:13', '2025-08-25 01:56:13'),
(26, 6, 'Habitat', 'Air tawar', '2025-08-25 01:57:23', '2025-08-25 01:57:23'),
(27, 6, 'Harga', 'Per kg', '2025-08-25 01:57:23', '2025-08-25 01:57:23'),
(28, 6, 'Isi', '6 ekor', '2025-08-25 01:57:23', '2025-08-25 01:57:23'),
(29, 7, 'Habitat', 'Air tawar', '2025-08-25 01:58:50', '2025-08-25 01:58:50'),
(30, 7, 'Harga', 'Per kg', '2025-08-25 01:58:50', '2025-08-25 01:58:50'),
(31, 7, 'Isi', '10 ekor', '2025-08-25 01:58:50', '2025-08-25 01:58:50'),
(32, 7, 'Jenis', 'Konsumsi', '2025-08-25 01:58:50', '2025-08-25 01:58:50'),
(33, 8, 'Habitat', 'Air tawar', '2025-08-25 02:00:15', '2025-08-25 02:00:15'),
(34, 8, 'Harga', 'Per kg', '2025-08-25 02:00:15', '2025-08-25 02:00:15'),
(35, 8, 'Isi', '20-25 ekor', '2025-08-25 02:00:15', '2025-08-25 02:00:15'),
(36, 8, 'Jenis', 'Konsumsi', '2025-08-25 02:00:15', '2025-08-25 02:00:15'),
(37, 9, 'Jenis', 'Petarung & Konsumsi', '2025-08-25 02:02:16', '2025-08-25 02:02:16'),
(38, 9, 'Harga', 'Per ekor', '2025-08-25 02:02:16', '2025-08-25 02:02:16'),
(39, 9, 'Area kirim', 'Sepulau jawa', '2025-08-25 02:02:16', '2025-08-25 02:02:16'),
(40, 10, 'Jenis', 'Hias & Konsumsi', '2025-08-25 02:03:48', '2025-08-25 02:03:48'),
(41, 10, 'Harga', 'Per ekor', '2025-08-25 02:03:48', '2025-08-25 02:03:48'),
(42, 10, 'Area kirim', 'Sepulau jawa', '2025-08-25 02:03:48', '2025-08-25 02:03:48'),
(43, 10, 'Kelamin', 'Jantan', '2025-08-25 02:03:48', '2025-08-25 02:03:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) NOT NULL DEFAULT 'Nama Aplikasi',
  `logo` varchar(2048) DEFAULT NULL,
  `favicon` varchar(2048) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `bg_color` varchar(20) DEFAULT '#1e40af',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `logo`, `favicon`, `description`, `bg_color`, `created_at`, `updated_at`) VALUES
(1, 'Abiyoso farm', 'settings/sTksJnsOkJGqObn1xgCKrklgt4evAMXMjv2bXhrr.png', NULL, 'Kelola stok & gudang Anda lebih mudah, cepat, dan efisien.', '#1f5b63', '2025-08-25 01:21:55', '2025-08-25 01:27:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_opnames`
--

CREATE TABLE `stock_opnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `system_stock` int(11) NOT NULL,
  `actual_stock` int(11) NOT NULL,
  `checked_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_transactions`
--

CREATE TABLE `stock_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('in','out') NOT NULL,
  `quantity` int(11) NOT NULL,
  `confirmed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_transactions`
--

INSERT INTO `stock_transactions` (`id`, `product_id`, `type`, `quantity`, `confirmed_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 9, 'in', 2, NULL, '2025-08-25 03:33:34', '2025-08-25 03:33:34', 'pending'),
(2, 4, 'out', 100, NULL, '2025-08-25 03:33:53', '2025-08-25 03:33:53', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Agus', 'agus@gmail.com', '12345678', 'Surakarta', '2025-08-25 01:41:00', '2025-08-25 01:41:00'),
(2, 'jepri', 'jepri@gmail.com', '12345678', 'Kudus', '2025-08-25 01:41:33', '2025-08-25 01:41:33'),
(3, 'Ngatmen', 'ngatmencs@gmail.com', '987654334567', 'Jepara', '2025-08-25 01:42:09', '2025-08-25 01:42:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','manajer','staff') NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin Gudang', 'admin@gmail.com', NULL, '$2y$10$NA5ImeKFRezJUAnhGwYVfePCSuoRA7qLDcGuwf2lM6gKUg.TAreHG', NULL, '2025-08-25 01:19:56', '2025-08-25 01:19:56', 'admin'),
(2, 'Manajer Gudang', 'manager@gmail.com', NULL, '$2y$10$CEB5mN.aVsI3spxpKsHxmu/zlyHJXX9KW2EKhcCBfu38LKCOAHRYG', NULL, '2025-08-25 01:19:57', '2025-08-25 01:19:57', 'manajer'),
(3, 'Staff Gudang', 'staff@gmail.com', NULL, '$2y$10$gmhzK0.FP/leVyCX4d72bu7dQMtgIc1fo1uYmELPo7FhbyZDzJSPC', NULL, '2025-08-25 01:19:57', '2025-08-25 01:19:57', 'staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock_opnames`
--
ALTER TABLE `stock_opnames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_opnames_product_id_foreign` (`product_id`),
  ADD KEY `stock_opnames_checked_by_foreign` (`checked_by`);

--
-- Indeks untuk tabel `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_transactions_product_id_foreign` (`product_id`),
  ADD KEY `stock_transactions_confirmed_by_foreign` (`confirmed_by`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stock_opnames`
--
ALTER TABLE `stock_opnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stock_transactions`
--
ALTER TABLE `stock_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stock_opnames`
--
ALTER TABLE `stock_opnames`
  ADD CONSTRAINT `stock_opnames_checked_by_foreign` FOREIGN KEY (`checked_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_opnames_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD CONSTRAINT `stock_transactions_confirmed_by_foreign` FOREIGN KEY (`confirmed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `stock_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

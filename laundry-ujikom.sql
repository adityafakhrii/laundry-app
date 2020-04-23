-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2020 pada 10.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry-ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2020_02_06_010142_create_members_table', 1),
(9, '2020_02_06_012337_create_pakets_table', 1),
(10, '2020_02_06_012654_create_outlets_table', 1),
(11, '2020_02_06_012910_create_detail_transaksis_table', 1),
(12, '2020_02_06_013135_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_transaksi` int(10) UNSIGNED DEFAULT NULL,
  `id_paket` int(10) UNSIGNED NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('keranjang','transaksi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `status`, `id_user`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 2, 'Jangan pake parfum', 'transaksi', 20, '2020-04-12 14:11:11', '2020-04-12 14:12:16'),
(6, 4, 1, 4, NULL, 'transaksi', 20, '2020-04-12 21:02:24', '2020-04-13 02:06:13'),
(8, 5, 1, 6, NULL, 'transaksi', 20, '2020-04-13 03:14:01', '2020-04-13 03:28:29'),
(11, 7, 1, 4, 'pake tangan ya cucinya', 'transaksi', 20, '2020-04-13 19:35:41', '2020-04-13 19:37:03'),
(14, 8, 1, 1, 'terserah', 'transaksi', 20, '2020-04-13 20:15:36', '2020-04-13 20:17:52'),
(31, 9, 6, 1, NULL, 'transaksi', 1, '2020-04-14 09:04:45', '2020-04-14 09:10:31'),
(35, 9, 6, 9, 'Jangan dicuci', 'transaksi', 20, '2020-04-14 09:10:23', '2020-04-14 09:10:31'),
(38, 16, 7, 4, 'Jangan setrika', 'transaksi', 24, '2020-04-14 10:25:27', '2020-04-14 10:26:54'),
(39, 17, 8, 4, 'Jangan setrika', 'transaksi', 24, '2020-04-15 03:29:44', '2020-04-15 03:29:57'),
(40, 18, 7, 3, 'Jangan pake parfum', 'transaksi', 24, '2020-04-15 03:38:59', '2020-04-15 03:44:58'),
(41, 18, 8, 5, 'Jangan dicuci', 'transaksi', 24, '2020-04-15 03:39:06', '2020-04-15 03:44:58'),
(43, 19, 5, 1, NULL, 'transaksi', 1, '2020-04-20 09:26:09', '2020-04-20 09:26:21'),
(44, 19, 6, 3, NULL, 'transaksi', 1, '2020-04-20 09:26:13', '2020-04-20 09:26:21'),
(45, NULL, 1, 1, NULL, 'keranjang', 1, '2020-04-22 01:20:14', '2020-04-22 01:20:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_member` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama_member`, `alamat`, `jenis_kelamin`, `tlp`, `created_at`, `updated_at`) VALUES
(1, 'Aditya Fakhri', 'Villa Adiprima', 'L', '0895324105731', '2020-04-12 12:48:44', '2020-04-12 12:48:51'),
(2, 'John Doe', 'California', 'L', '088154472991', '2020-04-13 17:17:01', '2020-04-13 17:17:01'),
(3, 'Joso Mourinho', 'London', 'L', '088333888833', '2020-04-13 19:42:42', '2020-04-13 19:42:42'),
(4, 'Frank Lampard', 'North London', 'L', '089666711766', '2020-04-14 10:26:41', '2020-04-14 10:26:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_outlet` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `nama_outlet`, `alamat`, `tlp`, `created_at`, `updated_at`) VALUES
(9, 'Outlet 1', 'Bandung', '088154417889', '2020-04-12 13:53:53', '2020-04-12 13:53:53'),
(10, 'Outlet 2', 'Surabaya', '087721807183', '2020-04-13 21:32:12', '2020-04-13 21:32:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_paket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_outlet` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `nama_paket`, `jenis`, `harga`, `img`, `id_outlet`, `created_at`, `updated_at`) VALUES
(1, 'Selimut Bulu', 'selimut', 20000, '/img/7d1499f362e5aaa4c57dc0a8ab6563cd.jfif', 9, '2020-04-12 14:08:26', '2020-04-12 14:08:26'),
(5, 'Jaket', 'lainnya', 25000, '/img/10689523_19e7a0a5-abb7-4cc6-a3f8-102e10c4a510_700_700.jpg', 9, '2020-04-14 08:38:23', '2020-04-14 08:38:23'),
(6, 'Jersey Bola', 'kaos', 15000, '/img/real-madrid-20-21-home-kit-concept-2.jpg', 9, '2020-04-14 08:39:37', '2020-04-14 08:39:37'),
(7, 'Rompi', 'kiloan', 18000, '/img/Jaket-Rompi_Spyder_5159JE_160K_03.jpg', 10, '2020-04-14 10:12:11', '2020-04-14 10:12:11'),
(8, 'Jeans', 'kiloan', 25000, '/img/1113_5108_466_f.jfif', 10, '2020-04-15 03:29:35', '2020-04-15 03:29:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_outlet` int(10) UNSIGNED NOT NULL,
  `kode_invoice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_member` int(10) UNSIGNED NOT NULL,
  `tgl` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL,
  `tgl_bayar` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `status` enum('baru','proses','selesai','diambil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`, `created_at`, `updated_at`) VALUES
(3, 9, 'TRANS-W1IMsZ21Hd', 1, '12-04-2020', '2020-04-17', '13-04-2020', NULL, NULL, NULL, 'diambil', 'dibayar', 20, '2020-04-12 21:12:16', '2020-04-13 08:38:31'),
(4, 9, 'TRANS-sMWaBNXUom', 1, '13-04-2020', '2020-04-20', '14-04-2020', 2000, 9000, 1000, 'diambil', 'dibayar', 20, '2020-04-13 09:06:13', '2020-04-14 02:33:20'),
(5, 9, 'TRANS-SbP7CuHeyq', 1, '13-04-2020', '2020-04-21', '14-04-2020', 7000, 1000, 500, 'proses', 'dibayar', 20, '2020-04-13 10:28:29', '2020-04-14 00:31:28'),
(6, 9, 'TRANS-rHUcDTZdDB', 2, '14-04-2020', '2020-04-27', '14-04-2020', NULL, NULL, NULL, 'baru', 'dibayar', 1, '2020-04-14 00:17:22', '2020-04-14 15:27:29'),
(7, 9, 'TRANS-LHNuCYD5jZ', 2, '14-04-2020', '2020-04-23', '14-04-2020', 6000, 5000, 500, 'selesai', 'dibayar', 20, '2020-04-14 02:37:03', '2020-04-14 03:18:04'),
(8, 9, 'TRANS-xU0HCojYLz', 3, '14-04-2020', '2020-04-29', NULL, NULL, NULL, NULL, 'baru', 'belum_dibayar', 20, '2020-04-14 03:17:52', NULL),
(9, 9, 'TRANS-Iffn9A44gY', 3, '14-04-2020', '2020-04-28', '20-04-2020', NULL, NULL, NULL, 'diambil', 'dibayar', 20, '2020-04-14 16:10:31', '2020-04-20 16:27:08'),
(16, 10, 'TRANS-dJ6UZz88lB', 4, '14-04-2020', '2020-04-22', '15-04-2020', NULL, NULL, NULL, 'diambil', 'dibayar', 24, '2020-04-14 17:26:54', '2020-04-15 10:27:56'),
(17, 10, 'TRANS-NqfCVKGfIK', 3, '15-04-2020', '2020-04-20', '15-04-2020', 4000, NULL, NULL, 'diambil', 'dibayar', 24, '2020-04-15 10:29:57', '2020-04-15 11:04:49'),
(18, 10, 'TRANS-0paPDlcfKn', 1, '15-04-2020', '2020-04-24', NULL, 5000, 7000, 1000, 'baru', 'belum_dibayar', 24, '2020-04-15 10:44:58', '2020-04-15 10:58:05'),
(19, 9, 'TRANS-4jnRNMJInX', 3, '20-04-2020', '2020-04-23', NULL, NULL, NULL, NULL, 'baru', 'belum_dibayar', 1, '2020-04-20 16:26:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_outlet` int(10) UNSIGNED DEFAULT NULL,
  `role` enum('admin','kasir','owner','super_admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `id_outlet`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin Outlet 1', 'admin1', '$2y$10$JP3vzxVfbZbaihTHSY0q7u5m2yYPfSX8f5BjPp/QtCCcRKxQf6.k6', 9, 'admin', '2020-02-05 19:38:49', '2020-02-05 19:38:49'),
(17, 'Owner Outlet 1', 'owner1', '$2y$10$IDTVuR.3oEmcuKOAHYP9Z.3GI6VtGcZSJjFnbhJAfl1kE1TDWFv1K', 9, 'owner', '2020-02-25 18:06:13', '2020-02-25 18:06:13'),
(20, 'Kasir Outlet 1', 'kasir1', '$2y$10$9laGS45EQrz2.NDY9.h6Y.C2IAz7ZsMTEO3gkBu6AE5zHmVvOVpQC', 9, 'kasir', '2020-04-12 13:54:12', '2020-04-12 13:54:12'),
(22, 'Super Admin', 'super_admin', '$2y$10$ZfY/FsAQ1SxLOJrFKoK05uoJGOnvDUwrrLlYtFl6SR/nIwa.EYBHu', NULL, 'super_admin', '2020-04-14 03:29:16', '2020-04-14 03:29:16'),
(24, 'Admin Outlet 2', 'admin2', '$2y$10$EY2ivbx.yV3Es/DG4r3k7uQOEBu.nW7MusF7IaLvTEBQ0SB/IRElC', 10, 'admin', '2020-04-14 04:10:30', '2020-04-14 04:10:30'),
(26, 'Owner Outlet 2', 'owner2', '$2y$10$AKV/vEybJ5dXO5wKbPxtLOkzqXSA42iqJlrLyaLKV4PwVytv0bxrC', 10, 'owner', '2020-04-14 09:59:52', '2020-04-14 09:59:52'),
(27, 'Kasir Outlet 2', 'kasir2', '$2y$10$CXPUsSqkr76ptujLHdVOqOxNmYY//ITleeP3nD.vLu4p.zFYsD3zS', 10, 'kasir', '2020-04-15 04:11:23', '2020-04-15 04:11:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `tb_detail_transaksi_ibfk_3` (`id_user`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

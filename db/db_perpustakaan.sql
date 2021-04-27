-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.17-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table db_perpustakaan.anggota_tbl
CREATE TABLE IF NOT EXISTS `anggota_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(300) DEFAULT NULL,
  `jenis_kelamin` varchar(300) DEFAULT NULL,
  `kelas` varchar(300) DEFAULT NULL,
  `telepon` varchar(300) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `tanggal_buat` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_perpustakaan.anggota_tbl: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `anggota_tbl` DISABLE KEYS */;
INSERT INTO `anggota_tbl` (`id`, `nis`, `nama`, `jenis_kelamin`, `kelas`, `telepon`, `alamat`, `email`, `foto`, `tanggal_buat`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '1234567890', 'ADRI SAPUTRA', 'Laki-laki', '12IPA1', '082882', NULL, NULL, NULL, NULL, NULL, '2021-04-27 13:04:44', '2021-04-27 13:04:44'),
	(2, '1234567891', 'RAHMAT', 'Laki-laki', '12 IPA 2', '2333', NULL, NULL, NULL, NULL, NULL, '2021-04-27 13:09:07', '2021-04-27 13:09:07'),
	(3, '012345', 'MUHAMMAD ANDI', 'Laki-laki', '12IPA2', '05885', 'sasasasasa', NULL, NULL, '27-04-2021', 9, '2021-04-27 14:46:20', '2021-04-27 14:54:46');
/*!40000 ALTER TABLE `anggota_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.buku_tbl
CREATE TABLE IF NOT EXISTS `buku_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(300) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `judul` varchar(300) DEFAULT NULL,
  `nama_penulis` varchar(300) DEFAULT NULL,
  `nama_penerbit` varchar(300) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `rak_buku` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `cover` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_perpustakaan.buku_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `buku_tbl` DISABLE KEYS */;
INSERT INTO `buku_tbl` (`id`, `isbn`, `kategori_id`, `judul`, `nama_penulis`, `nama_penerbit`, `tahun_terbit`, `jumlah_buku`, `rak_buku`, `deskripsi`, `file`, `cover`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '978-602-030-112-9', 1, 'Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', 2014, NULL, NULL, 'Raib, seorang gadis berumur 15 tahun. Ia sama seperti remaja lainya. Kecuali satu hal, Sesuatu yang ia simpan sendiri sejak kecil. Sesuatu yang menakjubkan. Raib bisa menghilang. Cukup dengan menutup wajah dengan kedua tangan tubuhnya pun menghilang. Kekuatan aneh itu telah ada sejak ia masih kecil, bahkan sejak umur 2 tahun Raib suka sekali bermain petak umpat bersama orangtuanya. Raib meletakan kedua telapak tanganya di wajah, dan menghilang. Saat ulang tahunku yang kesembilan, aku mendapat hadiah 2 ekor kucing kembar entah dari siapa. Kedua kucing itu kuberi nama si Hitam dan si Putih.\r\n\r\nSeli merupakan sahabat sekaligus teman semeja Raib. Suatu hari, seli bertabrakan dengan Ali si Biang kerok, mereka bertengkar dan Raib dapat membereskan pertengkaran kecil itu. Saat pelajaran miss keriting alias miss selena, Raib dan Ali di hukum. Mereka tidak boleh mengikuti pelajaran matematika kala itu karena mereka tidak mengumpulkan tugas. Raib menutup wajahnya dan mengintip di sela jarinya, tiba-tiba seseorang dengan tubuh kurus tinggi entah datang darimana mengagetkanya. Sontak saja Ali melihat Raib yang tiba-tiba muncul dan menyudutkan Raib dengan segala pertanyaan. Ali juga memasang beberapa alat buatannya disekolah dan tasku untuk mengetahui suatu hal yang membuatnya penasaran itu.', '1615820524.pdf', '1615817498.jpg', 1, '2021-03-15 14:11:38', '2021-03-15 15:04:17'),
	(2, '978-979-225-780-9', 1, 'Daun Yang Jatuh Tak Pernah Membenci Angin', 'Tere Liye', 'Gramedia Pustaka Utama', 2010, NULL, NULL, 'Tania dan Dede adalah saudara yang tinggal bersama ibunya dalam kesederhanaan. Kemudian mereka bertemu dengan Danar, seorang karyawan dan juga penulis buku anak-anak. Danar begitu baik dan membantu keluarga Tania.\r\n\r\nSuatu ketika ibu Tania sakit-sakitan. Ternyata ibunya mederita kanker stadium 4 dan meninggal dunia. Lalu Tania dan Dede hidup bersama Danar di rumahnya. Mereka hidup bahagia. Sebelumnya Tania telah mengikuti tes beasiswa luar negeri di Singapura. Dan dia diterima. Setelah lulus sekolah dasar Tania langsung ke Singapura, dia tinggal di asrama. Dia menjadi anak yang berprestasi. Setelah SMP dia juga melanjutkan ke SMA.\r\n\r\nTernyata Tania dan Danar memyimpan rasa. Namun Danar sadar bahwa Tania terlalu muda untuk dirinya. Terus ia mencari wanita lain yang bernama Ratna dan menikahinya. Namun kehidupan mereka kurang bahagia. Dan Ratna menceritakan kejadian itu kepada Tania. Lalu Tania menanyakan hal itu pada Danar. Ternyata Danar mengakui kalau dia suka pada Tania. Namun Tania sadar bahwa Danar telah menikah dan istrinya telah mengandung 4 bulan. Tania meminta Danar untuk kembali pada istrinya sedangkan Tania kembali ke Singapura dan sepertinya tidak akan kembali.', NULL, '1616115521.jpeg', 1, '2021-03-19 08:58:41', '2021-03-19 08:58:41');
/*!40000 ALTER TABLE `buku_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.denda_tbl
CREATE TABLE IF NOT EXISTS `denda_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_hrs_kembali` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `denda` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_perpustakaan.denda_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `denda_tbl` DISABLE KEYS */;
INSERT INTO `denda_tbl` (`id`, `anggota_id`, `buku_id`, `tanggal_pinjam`, `tanggal_hrs_kembali`, `tanggal_kembali`, `hari`, `denda`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2021-03-08', '2021-03-15', '2021-03-23', 8, 16000, 1, '2021-03-23 19:28:44', '2021-03-23 19:28:44');
/*!40000 ALTER TABLE `denda_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_perpustakaan.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.kategori_tbl
CREATE TABLE IF NOT EXISTS `kategori_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_perpustakaan.kategori_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `kategori_tbl` DISABLE KEYS */;
INSERT INTO `kategori_tbl` (`id`, `nama_kategori`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Novel', NULL, '2021-03-15 22:14:41', NULL),
	(2, 'Publikasi Umum, informasi umum dan komputer', 1, '2021-03-15 14:46:17', '2021-03-15 14:47:11');
/*!40000 ALTER TABLE `kategori_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_perpustakaan.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(6, '2021_03_15_063727_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_perpustakaan.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.peminjaman_tbl
CREATE TABLE IF NOT EXISTS `peminjaman_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_perpustakaan.peminjaman_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `peminjaman_tbl` DISABLE KEYS */;
INSERT INTO `peminjaman_tbl` (`id`, `anggota_id`, `buku_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2021-04-22', '2021-04-25', 0, 1, '2021-04-27 13:06:25', '2021-04-27 13:06:25'),
	(2, 2, 2, '2021-04-20', '2021-04-23', 0, 1, '2021-04-27 13:10:02', '2021-04-27 13:10:02');
/*!40000 ALTER TABLE `peminjaman_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.pengaturan_tbl
CREATE TABLE IF NOT EXISTS `pengaturan_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(300) DEFAULT NULL,
  `jumlah` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_perpustakaan.pengaturan_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaturan_tbl` DISABLE KEYS */;
INSERT INTO `pengaturan_tbl` (`id`, `nama`, `jumlah`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'Denda', '1000', 1, '2021-03-15 22:14:41', '2021-03-23 19:47:36');
/*!40000 ALTER TABLE `pengaturan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_perpustakaan.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_perpustakaan.sessions: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('39mrNx29PCyiP5utKqqKwGleD2lNFDPAnuYMqVhh', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0lhcFM3dUdKNVN4cDV0eGxmNE1lRzNobHA0UjhBbnVVVU1KMEZvbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3QvcGVycHVzdGFrYWFuIjt9fQ==', 1619506615),
	('OiP5kJWTK32ukzt2GROte1CNnDZXie4msjt8baWw', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibjRYZEFHVkNmeGJMZGxkOUIzZ2lwTWk1Q2JFZnUwQWdsNzJQdGdjUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3QvcGVycHVzdGFrYWFuL2FuZ2dvdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaTlSOVFGRWJYNG03dlRIcUxVU2c5dWZQSy9lZ1BWZlUwbWFEL1BKZHFVbzFqd0NLOEdHbHEiO30=', 1619506513);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_perpustakaan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `nis` double DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_perpustakaan.users: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `group`, `nis`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'administrator@gmail.com', NULL, '$2y$10$i9R9QFEbX4m7vTHqLUSg9ufPK/egPVfU0maD/PJdqUo1jwCK8GGlq', NULL, NULL, NULL, 1, NULL, 1, '2021-03-15 06:42:06', '2021-03-15 06:42:06'),
	(2, 'operator', 'operator@gmail.com', NULL, '$2y$10$okDG5WSxhmuW5QBtL.lEGO5L//OCVfJ8BBoix98CuWarbDArcv13y', NULL, NULL, NULL, 2, NULL, 1, '2021-03-19 23:55:25', '2021-04-27 14:37:14'),
	(7, '1234567890', '1234567890@gmail.com', NULL, '$2y$10$CUaRWUcEtI8oas6L..Lhz.Mo9XKI/I/0TEauEQ83h.BBkZlJHemh2', NULL, NULL, NULL, 3, 1234567890, 1, '2021-04-27 13:04:44', '2021-04-27 13:04:44'),
	(8, '1234567891', '1234567891@gmail.com', NULL, '$2y$10$cgZUFa7u55xscJ4JMNXwKeZNZROF.gliLVvfMSKQJBfk/TbtFea4a', NULL, NULL, NULL, 3, 1234567891, 1, '2021-04-27 13:09:07', '2021-04-27 14:37:24'),
	(9, '012345', '012345@gmail.com', NULL, '$2y$10$C8YfPydwFPR5F4KY2MdT9elXQE4XOA1x2AIl4x.OCrv35NsEIZA4C', NULL, NULL, NULL, 3, 12345, 1, '2021-04-27 14:46:20', '2021-04-27 14:46:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

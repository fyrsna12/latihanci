-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2026 pada 13.13
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
-- Database: `latihanci_fix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `password` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT 2,
  `is_active` tinyint(1) DEFAULT 0,
  `date_created` bigint(20) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`, `last_login`) VALUES
(1, 'sina', 'leesina1920@gmail.com', 'default.jpg', '$2y$10$VvJ8H7YtqH6nLk5mN9pB5uKjMlPqRsT2wXyZ3aB4cD5eF6gH7iJ8k', 1, 1, 1764948362, NULL),
(2, 'jk', 'bunnykooky120@gmail.com', 'default.jpg', '$2y$10$vIUIfh1QudtBEm9hq8qL.uHfVh1d.mcmcKFsGgSunc8O/h12uGYO.', 2, 1, 1764948362, NULL),
(5, 'ryfana', 'firda.nursina11@admin.paud.belajar.id', 'default.jpg', '$2y$10$OARzk7wiFJi7y6LL/IhOq.Y0526tbAcFQrJK6FT1Z6E5nQkJK.Xh.', 2, 1, 1764983882, NULL),
(8, 'wicaks', 'wicaksono@sibermu.ac.id', 'default.jpg', '$2y$10$ga8pFX3aPQvuueHTB7s7VONiIX8FzeGd.JFHxS86cXSkRgd87WLrK', 1, 1, 1765006245, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `can_view` tinyint(1) DEFAULT 0,
  `can_create` tinyint(1) DEFAULT 0,
  `can_edit` tinyint(1) DEFAULT 0,
  `can_delete` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `id_role`, `id_menu`, `can_view`, `can_create`, `can_edit`, `can_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(2, 1, 2, 1, 1, 1, 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(3, 1, 3, 1, 1, 1, 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(4, 1, 4, 1, 1, 1, 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(5, 2, 1, 1, 0, 0, 0, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(6, 2, 4, 1, 0, 1, 0, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(7, 2, 5, 1, 0, 0, 0, '2025-12-06 01:55:06', '2025-12-06 01:55:06'),
(8, 2, 6, 1, 0, 1, 0, '2025-12-06 02:21:07', '2025-12-06 02:21:07'),
(9, 2, 7, 1, 0, 0, 0, '2025-12-06 02:21:07', '2025-12-06 02:21:07'),
(10, 2, 8, 1, 0, 0, 0, '2025-12-06 02:21:07', '2025-12-06 02:21:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL,
  `menu_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `menu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu_name`, `menu_url`, `menu_icon`, `menu_order`, `is_active`, `parent_id`, `created_at`, `updated_at`, `menu`) VALUES
(1, 'Dashboard', '/dashboard', 'fa-home', 1, 1, NULL, '2025-12-05 15:01:40', '2025-12-05 15:40:01', 'dashboard'),
(2, 'User Management', '#', 'fa-users', 2, 1, NULL, '2025-12-05 15:01:40', '2025-12-05 15:40:01', 'user management'),
(3, 'Menu', '/menu', 'fa-cog', 3, 1, NULL, '2025-12-05 15:01:40', '2025-12-20 14:14:43', 'menu'),
(4, 'Profile', '/profile', 'fa-user', 4, 1, NULL, '2025-12-05 15:01:40', '2025-12-05 15:40:01', 'profile'),
(5, 'Siswa', '/siswa', 'fa-user', 5, 1, NULL, '2025-12-05 15:40:02', '2025-12-05 15:40:02', 'siswa'),
(6, 'Edit Profile', '/siswa/edit', 'fa-edit', 6, 1, NULL, '2025-12-06 02:20:41', '2025-12-06 02:20:41', 'edit profile'),
(7, 'Change Password', '/siswa/changepassword', 'fa-key', 7, 1, NULL, '2025-12-06 02:20:41', '2025-12-06 02:20:41', 'change password'),
(8, 'Logout', '/user/logout', 'fa-sign-out-alt', 8, 1, NULL, '2025-12-06 02:20:41', '2025-12-06 02:20:41', 'logout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Super admin dengan akses penuh', '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(2, 'user', 'Pengguna biasa', '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(3, 'guest', 'Pengguna tamu', '2025-12-05 15:01:40', '2025-12-05 15:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 'Users', '/user', 'fa-user', 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(3, 4, 'My Profile', '/profile', 'fa-user-circle', 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(4, 4, 'Edit Profile', '/profile/edit', 'fa-edit', 1, '2025-12-05 15:01:40', '2025-12-05 15:01:40'),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1, '2025-12-21 07:35:18', '2025-12-21 07:38:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(1, 'firda.nursina11@admin.paud.belajar.id', '22eebc4e94dd9fa83f2b2ed2069ce98f', 1764983882),
(2, 'firda.nursina11@admin.paud.belajar.id', '3c582b43022437e8c4e75c257b9a7299', 1764983969),
(3, 'firda.nursina11@admin.paud.belajar.id', 'b29f91e5ecc0840dbaf484e91eb4321f', 1764983980),
(4, 'bunnykooky120@gmail.com', '111c9c5d11f79638c7a55fe4c9572820', 1764984859),
(7, 'wicaksono@sibermu.ac.id', '54d80e4a8675c3a5d26690e0f1525204', 1765006245);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD UNIQUE KEY `unique_role_menu` (`id_role`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

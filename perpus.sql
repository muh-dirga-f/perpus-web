-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jul 2021 pada 16.53
-- Versi server: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(5) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `ebook` varchar(100) NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `pengarang`, `image`, `ebook`, `kategori_buku`, `tahun_terbit`) VALUES
(7758, 'test', 'test', '1625017589.jpg', '1625017630.pdf', '1', 2021),
(7759, 'test2', 'pengarang 1', '1610523152.jpg', '1610523152.pdf', '1', 2009),
(7760, 'test 3', 'pengarang 3', '1625017912.jpg', '1625018015.pdf', '2', 2021),
(7761, 'test 3', 'tes', '1625063296.jpg', '1625063296.pdf', '1', 2013),
(7762, 'tes', 'pengarang 1', '1625064304.jpg', '1625064304.pdf', '1', 1996);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `nama_kategori_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `nama_kategori_buku`) VALUES
(1, 'kategori 1'),
(2, 'kategori 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_video`
--

CREATE TABLE `kategori_video` (
  `id_kategori_video` int(11) NOT NULL,
  `nama_kategori_video` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_video`
--

INSERT INTO `kategori_video` (`id_kategori_video`, `nama_kategori_video`) VALUES
(5, 'video 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_buku`
--

CREATE TABLE `log_buku` (
  `id_log_buku` int(11) NOT NULL,
  `id_user_log` varchar(8) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_buku`
--

INSERT INTO `log_buku` (`id_log_buku`, `id_user_log`, `id_buku`, `tanggal`) VALUES
(1, '', '7758', '2021-05-02 06:32:26'),
(2, '', '7759', '2021-05-02 06:32:31'),
(3, '', '7759', '2021-05-02 06:34:05'),
(4, '', '7758', '2021-05-02 06:35:09'),
(5, '', '7758', '2021-05-02 06:38:47'),
(6, '', '7759', '2021-05-02 06:40:23'),
(7, '', '7759', '2021-05-02 06:42:24'),
(8, '', '7759', '2021-05-02 06:43:11'),
(9, '', '7758', '2021-05-02 06:43:43'),
(10, '', '7758', '2021-06-28 00:47:49'),
(11, '', '7758', '2021-06-28 00:51:02'),
(12, '', '7759', '2021-06-28 00:52:32'),
(13, '', '7758', '2021-06-28 01:18:39'),
(14, '', '7759', '2021-06-28 01:20:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `full_name`, `password`) VALUES
(8, 'admin', 'Admin Perpus', '$2y$05$0RfFGKdD.I9/9SRZd9../.kIQg7pwgDxhICT0t1aPZh29Ia2oRA3u'),
(10, 'yuni', 'yuni yuni', '$2y$05$QT9JcPvuVjYv0T505rw6hOGRiGif.gQDBtCIfn6xH4bOPpSIJPm86');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `kode_video` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `kategori_video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`kode_video`, `judul`, `pembuat`, `image`, `file`, `kategori_video`) VALUES
(1, 'tes', 'test', '1625041990.jpg', '1625041990.mp4', '5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indeks untuk tabel `kategori_video`
--
ALTER TABLE `kategori_video`
  ADD PRIMARY KEY (`id_kategori_video`);

--
-- Indeks untuk tabel `log_buku`
--
ALTER TABLE `log_buku`
  ADD PRIMARY KEY (`id_log_buku`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`kode_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7763;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_video`
--
ALTER TABLE `kategori_video`
  MODIFY `id_kategori_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `log_buku`
--
ALTER TABLE `log_buku`
  MODIFY `id_log_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `kode_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

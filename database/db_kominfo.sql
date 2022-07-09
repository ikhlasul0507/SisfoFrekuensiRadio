-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2022 pada 14.25
-- Versi server: 5.7.21-log
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kominfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gangguan`
--

CREATE TABLE `gangguan` (
  `id_gangguan` int(11) NOT NULL,
  `nm_gangguan` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gangguan`
--

INSERT INTO `gangguan` (`id_gangguan`, `nm_gangguan`, `deleted`) VALUES
(1, 'Berisik', 0),
(2, 'Frekuensi Tinggi', 0),
(3, 'Suara Menghilang', 0),
(4, 'ok gan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nm_kabupaten` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nm_kabupaten`, `deleted`) VALUES
(1, 'Palembang', 0),
(2, 'Cirebon', 0),
(3, 'Bogore', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nm_kecamatan` varchar(60) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nm_kecamatan`, `id_kabupaten`, `deleted`) VALUES
(1, 'Indralaya', 1, 0),
(2, 'Plered', 2, 0),
(3, 'Ashiap gan', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `id_tiket` varchar(40) NOT NULL,
  `status_ticket` varchar(40) NOT NULL,
  `notif_to` varchar(40) NOT NULL,
  `is_read` int(11) NOT NULL,
  `notif_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pt`
--

CREATE TABLE `pt` (
  `id_pt` varchar(30) NOT NULL,
  `nm_pt` varchar(60) NOT NULL,
  `telp` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `pic_name` varchar(60) NOT NULL,
  `pic_email` varchar(60) NOT NULL,
  `pic_jabatan` varchar(60) NOT NULL,
  `register_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pt`
--

INSERT INTO `pt` (`id_pt`, `nm_pt`, `telp`, `alamat`, `pic_name`, `pic_email`, `pic_jabatan`, `register_at`) VALUES
('62c54206ee051', 'PT Paramadaksa Teknologi Nusantara', '003950834875', 'Gading Serpong - Tangerang', 'Kristianto', 'kristiantorpl@gmail.com', 'Programmer', '2022-07-06 08:04:23'),
('62c6882985b53', 'nexSOFT', '089397483297', 'Palembang', 'Ikhlasul Amal', 'amal@nexsoft.co.id', 'Programmer', '2022-07-07 07:15:53'),
('62c79993e9f92', 'nexSOFT', '089397483297', 'xxx', 'Ikhlasul Amal', 'amal@nexsoft.co.id', 'Programmer', '2022-07-08 02:42:28'),
('62c79e096558f', 'Universitas CIC', '089397483297', 'cirebon', 'Ikhlasul Amal Palembang', 'amal@nexsoft.co.id', 'Programmer', '2022-07-08 03:01:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nm_service` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id_service`, `nm_service`, `deleted`) VALUES
(1, 'Service AC', 0),
(2, 'Service Abc oke gan', 1),
(3, 'Full Service', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sifat`
--

CREATE TABLE `sifat` (
  `id_sifat` int(11) NOT NULL,
  `nm_sifat` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sifat`
--

INSERT INTO `sifat` (`id_sifat`, `nm_sifat`, `deleted`) VALUES
(1, 'Intermitten', 0),
(2, 'Continuous', 0),
(3, 'kwkw2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(40) NOT NULL,
  `perihal` varchar(120) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_upt` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `frekuensi` varchar(60) NOT NULL,
  `lokasi` varchar(60) NOT NULL,
  `id_gangguan` int(11) NOT NULL,
  `id_sifat` int(11) NOT NULL,
  `tgl_gangguan` date NOT NULL,
  `sektor` varchar(60) NOT NULL,
  `file_surat` varchar(60) NOT NULL,
  `file_lampiran` varchar(60) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_pt` varchar(60) NOT NULL,
  `gangguan_desc` text NOT NULL,
  `file_solusi` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `perihal`, `id_kecamatan`, `id_upt`, `id_service`, `frekuensi`, `lokasi`, `id_gangguan`, `id_sifat`, `tgl_gangguan`, `sektor`, `file_surat`, `file_lampiran`, `status`, `created_at`, `id_pt`, `gangguan_desc`, `file_solusi`) VALUES
('62c6f8d5456c2', 'Perihal Gangguan Radio', 1, 1, 1, '7634Ghz', 'Cirebon dong mas', 1, 1, '2022-07-07', 'Industri', 'default.png', '62c6f97974fbb.pdf', 'Verified', '2022-07-07 22:16:37', '62c6882985b53', '<p>gatau dah apaan hehe</p>', 'default.png'),
('62c6f97974fbb', 'Perihal Gangguan Radio $2', 2, 1, 3, '7634Ghz', 'Cirebon dong mas', 3, 2, '2022-07-14', 'okegan', '62c6f97974fbb.pdf', '62c6f97974fbb.pdf', 'Verified', '2022-07-07 22:19:21', '62c6882985b53', '<p>ujicoba aja dlu ya hehe</p>', 'default.png'),
('62c7898ed3579', 'Perihal Gangguan Frekuensi', 3, 1, 1, '7634Ghz', 'Cirebon dong mas', 2, 2, '2022-07-12', 'Industri', '62c6f97974fbb.pdf', '62c6f97974fbb.pdf', 'New', '2022-07-08 08:34:06', '62c6882985b53', '<p>bgihjbnikj mojnmjkn bhjuiljmlo;j<img src=\"../assets/plugins/tinymce/plugins/emoticons/img/smiley-cool.gif\" alt=\"cool\" />&nbsp;</p>', NULL),
('62c78c210edbf', 'zz', 2, 1, 1, '7634Ghz', 'Cirebon dong mas', 2, 2, '2022-07-08', 'Industri', '62c6f97974fbb.pdf', '62c6f97974fbb.pdf', 'New', '2022-07-08 08:45:05', '62c6882985b53', '<p>wkwkwk</p>', NULL),
('62c8ffbcc8a7e', 'Monitoring yang Ada dalam Sistem Radio Trunking', 1, 1, 1, 'Aku ', 'wkwk', 2, 1, '2022-07-22', 'Teknologi', 'default.png', 'default.png', 'Resolved', '2022-07-09 11:10:36', '62c54206ee051', '<p>wkwkwk</p>', 'default.png'),
('62c902ea588bc', 'Sistem Radio Trunking', 1, 1, 1, 'wkwk', 'kwkw', 1, 1, '2022-07-09', 'wkwk', '62c6f97974fbb.pdf', 'default.png', 'Verified', '2022-07-09 11:24:10', '62c54206ee051', '', 'default.png'),
('62c903659ecd2', 'Monitoring yang Ada dalam Sistem Radio Trunking', 1, 1, 1, 'wkwk', 'kwkw', 1, 2, '2022-07-22', 'wkwk', '62c6f97974fbb.pdf', 'default.png', 'Verified', '2022-07-09 11:26:13', '62c54206ee051', '', NULL),
('62c90429b78c5', 'Monitoring yang Ada dalam Sistem Radio Trunking', 1, 1, 1, 'wkwk', 'kwkwk', 1, 2, '2022-07-09', 'wkwk', '62c6f97974fbb.pdf', 'default.png', 'Closed', '2022-07-09 11:29:29', '62c54206ee051', '', '62c90429b78c5.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upt`
--

CREATE TABLE `upt` (
  `id_upt` int(11) NOT NULL,
  `nm_upt` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upt`
--

INSERT INTO `upt` (`id_upt`, `nm_upt`, `deleted`) VALUES
(1, 'UPT Majalengka II', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `id_pt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `level`, `foto`, `id_pt`) VALUES
('62b8556487642', 'manda', '$2y$10$Yu1ziUFIrjktqeBPpLtfiO5mWh9XXdhdwHIpYT8ThaGTXl13NJa1q', 'Manda Alamanda', 'Administrator', '1.jpg', '0'),
('62c54206ee051', 'kris', '$2y$10$yTIXKivTu9A1ypzlJ9B8UOOrtEcSFjReO0IFW1ZKPMLaSVtW16Zsq', 'Kristianto - nexSOFT', 'Pelanggan', '1.jpg', ''),
('62c6882985b53', 'amal', '$2y$10$XUV/cG8l5xsQ046A/tcwzOikqXIvPcRoCpNYaSdqgjqqFJYzOyhUW', 'Ikhlasul Amal - nexSOFT', 'Pelanggan', '1.jpg', ''),
('62c79993e9f92', 'silo', '$2y$10$aVgNXoX9cx34R950bHLdFe6xz0P4Q2x1QgiIGIPsqyIgg.KzchJB.', 'Silo - nexSOFT', 'Pelanggan', '1.jpg', ''),
('62c79e096558f', 'agus', '$2y$10$4M76WhXxjTmZpg9fZQkPyuHJLXZIqfvZD3WtF5MPHIfgFn.xMXu0G', 'Ikhlasul Amal Palembang - Universitas CIC', 'Pelanggan', '1.jpg', ''),
('62c8d9656d781', 'admin', '$2y$10$Ocfqo5rxAx2UTiJ3vKe5Qujy2n22vwwr4sdgRV3NarRYJzNd/z8Ga', 'Admin Kemkominfo', 'Administrator', '1.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gangguan`
--
ALTER TABLE `gangguan`
  ADD PRIMARY KEY (`id_gangguan`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `pt`
--
ALTER TABLE `pt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indeks untuk tabel `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`id_sifat`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `upt`
--
ALTER TABLE `upt`
  ADD PRIMARY KEY (`id_upt`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gangguan`
--
ALTER TABLE `gangguan`
  MODIFY `id_gangguan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sifat`
--
ALTER TABLE `sifat`
  MODIFY `id_sifat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `upt`
--
ALTER TABLE `upt`
  MODIFY `id_upt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

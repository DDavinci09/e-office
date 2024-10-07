-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2023 pada 14.46
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-office`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `signature`
--

CREATE TABLE `signature` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `img` varchar(125) NOT NULL,
  `rowno` varchar(125) NOT NULL,
  `append` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `pengirim` varchar(125) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `dikembalikan` text NOT NULL,
  `status_disposisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_jabatan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `id_unit`, `nama_jabatan`) VALUES
(1, 1, 'Rektor'),
(2, 1, 'Wakil Rektor I'),
(3, 1, 'Wakil Rektor II'),
(4, 1, 'Wakil Rektor III'),
(5, 2, 'Dekan FEBI'),
(6, 2, 'Wakil Dekan I FEBI'),
(7, 2, 'Wakil Dekan II FEBI'),
(8, 2, 'Wakil Dekan III FEBI'),
(10, 12, 'Resepsionis'),
(13, 4, 'Dekan FUAD'),
(14, 4, 'Wakil Dekan I FUAD'),
(15, 4, 'Wakil Dekan II FUAD'),
(16, 4, 'Wakil Dekan III FUAD'),
(17, 5, 'Direktur Pascasarjana'),
(18, 6, 'Kepala LPM'),
(19, 7, 'Kepala LP2M'),
(20, 8, 'Kepala Biro AUAK'),
(21, 9, 'KaBag Umum'),
(22, 10, 'KaBiro'),
(23, 2, 'Ka. Labor Febi'),
(27, 11, 'KaSubBag TUHRT'),
(28, 12, 'Resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `no_surat` varchar(125) NOT NULL,
  `tgl_surat` date NOT NULL,
  `lampiran` varchar(125) NOT NULL,
  `tgl_terima` date NOT NULL,
  `no_agenda` varchar(125) NOT NULL,
  `status_surat` varchar(125) NOT NULL,
  `prioritas_surat` varchar(125) NOT NULL,
  `sifat_surat` varchar(125) NOT NULL,
  `dari` text NOT NULL,
  `kepada` text NOT NULL,
  `perihal` text NOT NULL,
  `petunjuk` varchar(125) NOT NULL,
  `pengarsip` varchar(125) NOT NULL,
  `tgl_arsip` datetime NOT NULL,
  `statuskirim` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Rektorat'),
(2, 'Fakultas Ekonomi dan Bisnis Islam'),
(4, 'Fakultas Ushuluddin, Adab dan Dakwah'),
(5, 'Program Pascasarjana'),
(6, 'Lembaga Penjamin Mutu'),
(7, 'Lembaga Penelitian dan Pengabdian Masyarakat'),
(8, 'Biro Administrasi Umum, Akademik dan Kemahasiswaan'),
(9, 'Bagian Umum'),
(10, 'Biro AUAK'),
(11, 'Sub Bagian Tata Usaha, Humas dan Rumah Tangga'),
(12, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nama` text NOT NULL,
  `nip` text NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `nip`, `id_unit`, `id_jabatan`, `status`, `level`) VALUES
(4, 'resepsionis', '$2y$10$Ts6sLbSdD7CdD0DKZtyNOOMT3keaVwBYj0E8FqBTwElX/Iw54m93S', 'Derry Davinci', '1950401013', 0, 10, 1, 1),
(25, 'rektor', '$2y$10$r2Mf8J7fSScAx2yIyMvH1.bJBRyKIaUhSLgBhoFuu/k5HBTmU3cgK', '', '', 1, 1, 1, 2),
(26, 'warek1', '$2y$10$J6MTeYRuMfv5OjU4l4GHzO8BdqYoXBoF5yKL4VorbZ.AGms0AjwIi', '', '', 1, 2, 1, 2),
(27, 'warek2', '$2y$10$vr0Dk.bwqLLvj2kRgk9v0eo4jIZICZey.xNZvmYcFI9Ya2y2DsyJG', '', '', 1, 3, 1, 2),
(28, 'warek3', '$2y$10$u27fhmLkwWgLXAH6zzL6DOVI4M7.kH36lPMlSjGlfl7Q9Ogaqda0G', '', '', 1, 4, 1, 2),
(29, 'dekanfebi', '$2y$10$PxYPwypaaGcjEjLmSOyLkOkjjF3GU9ZzEkbtILJ0leFVFv4QyI2jO', '', '', 2, 5, 1, 2),
(30, 'wadek1febi', '$2y$10$XrMFVVLvv/6aHSZON67tIew77/D70zkU9CWjngKL6QKIWysA2c2ni', '', '', 2, 6, 1, 2),
(31, 'wadek2febi', '$2y$10$.A.FlW0luJEh5vWOcSPpcOR7egnWyB8QWW3bFI/pd8mR65/jm27hS', '', '', 2, 7, 1, 2),
(32, 'wadek3febi', '$2y$10$dLRRSfLk8tzCz5e51NAQqOvreUtsF5bhm57R4XJ9CcA1NHdLA6LL6', '', '', 2, 8, 1, 2),
(34, 'dekanfuad', '$2y$10$mJeGCIPo3plaOaFCBKyzcOikPegaYOkB0Pdj5zDAFks4AIhEigeTi', '', '', 5, 13, 1, 2),
(35, 'direkturpasca', '$2y$10$Y89Yy7lWsxYXrLPVDAasXeUimekeCzRqRvLlN9j9jEsvmZCubQNtO', '', '', 5, 17, 1, 2),
(36, 'Kabagumum', '$2y$10$1j.y9ctZdNatNqpBu0ptHeV/0fygva9Iy8db..lLY7tmBaPbtc1mi', '', '', 9, 21, 1, 2),
(37, 'kabiro', '$2y$10$kUeMD9WbT3Ja8AWNY7o10O3tDDbtKt1bdO8wC3rTSNf9pbI98fJBO', '', '', 10, 22, 1, 2),
(39, 'kasubagtu', '$2y$10$Cw.64qaaUHrBEYYtnvVEW.GX6RG/mywnE5E7Shj9IW.tBLqHZ9sJi', '', '', 11, 27, 1, 2),
(40, 'resepsionis3', '$2y$10$1gEdyUg8oWTF7ie0lKqpKuy7pqk1vm6fsMkb39ElREGTT6iNF7/Ie', 'Derry Davinci', '0000019', 12, 28, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indeks untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

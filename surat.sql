-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 08.23
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(25) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pengirim` int(11) NOT NULL,
  `penerima` int(11) NOT NULL,
  `lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `nomor_surat`, `perihal`, `tanggal`, `pengirim`, `penerima`, `lampiran`) VALUES
(5, 'tes', 'tes', '2020-06-01', 2, 1, '[\"Prau_mountain6.docx\",\"Prau_mountain7.docx\"]'),
(10, '123', 'tes', '2020-06-21', 3, 1, '[\"14190028.docx\"]'),
(11, '123', 'tes', '2020-06-21', 3, 1, '[\"141900281.docx\"]'),
(29, '321aa', 'asdsa', '2020-06-26', 1, 2, '[\"pert11_teknik_pengintegralan.docx\"]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', '6ad14ba9986e3615423dfca256d04e3f', 2),
(3, 'staff', '1253208465b1efa876f982d8a9e73eef', 2),
(6, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_surat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_surat` (
`id_surat` int(11)
,`nomor_surat` varchar(25)
,`perihal` varchar(50)
,`tanggal` date
,`id_pengirim` int(11)
,`pengirim` varchar(25)
,`id_penerima` int(11)
,`penerima` varchar(25)
,`lampiran` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_surat`
--
DROP TABLE IF EXISTS `view_surat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_surat`  AS  select `tb_surat`.`id_surat` AS `id_surat`,`tb_surat`.`nomor_surat` AS `nomor_surat`,`tb_surat`.`perihal` AS `perihal`,`tb_surat`.`tanggal` AS `tanggal`,`tb_surat`.`pengirim` AS `id_pengirim`,`a`.`username` AS `pengirim`,`tb_surat`.`penerima` AS `id_penerima`,`b`.`username` AS `penerima`,`tb_surat`.`lampiran` AS `lampiran` from ((`tb_surat` left join `tb_user` `a` on(`tb_surat`.`pengirim` = `a`.`id_user`)) left join `tb_user` `b` on(`tb_surat`.`penerima` = `b`.`id_user`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `pengirim` (`pengirim`,`penerima`),
  ADD KEY `penerima` (`penerima`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `tb_surat_ibfk_1` FOREIGN KEY (`pengirim`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_surat_ibfk_2` FOREIGN KEY (`penerima`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

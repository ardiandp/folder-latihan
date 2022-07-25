-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2020 pada 09.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` char(2) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('MI', 'Manajemen Informatika'),
('SI', 'Sistem Informasi'),
('TI', 'Teknik Informatika'),
('TK', 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nik` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) DEFAULT NULL,
  `tanggal_lhr` date DEFAULT NULL,
  `jurusan` char(2) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nik`, `nama`, `jk`, `tanggal_lhr`, `jurusan`, `umur`) VALUES
('135310150', 'Rian Hidayat', '1', '1997-08-05', 'TK', 20),
('135310156', 'Safitri Ayu', '2', '1995-09-01', 'TK', 22),
('135410156', 'Ahmad Riko', '1', '1995-02-23', 'TI', 22),
('135410189', 'Wawan Setiawan', '1', '1993-02-13', 'TI', 23),
('135510190', 'Marshel Saraun', '1', '1993-10-23', 'MI', 23),
('135510191', 'Nacha Saraun', '2', '1995-01-13', 'MI', 20),
('135510920', 'Dani Hermawan', '1', '1996-05-05', 'SI', 23),
('135518322', 'Nita Daniyatun', '2', '1994-09-05', 'TI', 23),
('135518900', 'Mili Wilian', '2', '1995-10-08', 'SI', 22),
('135558944', 'Bayu Mandalika', '1', '1997-01-15', 'SI', 19),
('135610157', 'Dahlan Iskan', '1', '1998-03-26', 'SI', 20),
('136349343', 'Kory Ubi', '2', '1992-10-29', 'MI', 25),
('147343998', 'Chika Lestari', '2', '1996-11-12', 'MI', 21),
('158549583', 'Candra Sidauruk', '1', '1994-10-22', 'TK', 23),
('158984545', 'Juan Burnama', '1', '1993-01-20', 'SI', 24);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `jurusan` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`kode_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

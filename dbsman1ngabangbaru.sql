-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 15.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsman1ngabangbaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `Kode` int(6) NOT NULL,
  `ID_Pelajaran` varchar(8) NOT NULL,
  `ID_Murid` varchar(8) NOT NULL,
  `ID_Guru` varchar(8) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Tidak Hadir',
  `Tanggal` date NOT NULL DEFAULT current_timestamp(),
  `ID_Kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`Kode`, `ID_Pelajaran`, `ID_Murid`, `ID_Guru`, `Status`, `Tanggal`, `ID_Kelas`) VALUES
(123, 'MTK001', 'MRD001', 'GRU001', 'Hadir', '2022-06-29', 9),
(124, 'MTK001', 'MRD002', 'GRU001', 'Hadir', '2022-06-29', 9),
(129, 'MTK001', 'MRD001', 'GRU001', 'Hadir', '2022-06-29', 9),
(130, 'MTK001', 'MRD002', 'GRU001', 'Hadir', '2022-06-29', 9),
(132, 'MTK001', 'MRD001', 'GRU001', 'Hadir', '2022-06-29', 9),
(133, 'MTK001', 'MRD002', 'GRU001', 'Hadir', '2022-06-29', 9),
(135, 'MTK001', 'MRD001', 'GRU001', 'Hadir', '2022-06-29', 9),
(136, 'MTK001', 'MRD002', 'GRU001', 'Hadir', '2022-06-29', 9),
(138, 'MTK001', 'MRD001', 'GRU002', 'Hadir', '2022-06-29', 9),
(139, 'MTK001', 'MRD002', 'GRU002', 'Hadir', '2022-06-29', 9),
(141, 'MTK001', 'MRD001', 'GRU002', 'Tidak Hadir', '2022-06-29', 9),
(142, 'MTK001', 'MRD002', 'GRU002', 'Tidak Hadir', '2022-06-29', 9),
(144, 'MTK001', 'MRD003', 'GRU002', 'Tidak Hadir', '2022-06-29', 9),
(145, 'MTK001', 'MRD004', 'GRU002', 'Tidak Hadir', '2022-06-29', 9),
(146, 'BI001', 'MRD001', 'GRU001', 'Hadir', '2022-07-04', 9),
(147, 'BI001', 'MRD002', 'GRU001', 'Hadir', '2022-07-04', 9),
(148, 'BI001', 'MRD013', 'GRU001', 'Hadir', '2022-07-04', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akademik`
--

CREATE TABLE `tbl_akademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_akademik`
--

INSERT INTO `tbl_akademik` (`id`, `tahun`, `semester`) VALUES
(1, '2022/2023', 'Genap'),
(3, '2023/2024', 'Ganjil'),
(4, '2021/2022', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `ID_Guru` varchar(6) NOT NULL,
  `Nama_Guru` varchar(50) NOT NULL,
  `Alamat_Guru` varchar(100) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `Telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`ID_Guru`, `Nama_Guru`, `Alamat_Guru`, `Gmail`, `Telp`) VALUES
('GRU001', 'Alfredo Pedo', 'Gajah Mada', 'alfredopedo@gmail.com', '08912321321'),
('GRU002', 'Aloysius Marko', 'Jalur 2', 'aloysiusmarko@gmail.com', '082131208381'),
('GRU003', 'Yoga Platrisa', 'Sepakat 2', 'yogaplatrisa74@gmail.com', '08123219831'),
('GRU004', 'Harry', 'Paris 2', 'Harry@gmail.com', '082131208381'),
('GRU005', 'Irfan', 'Serdam', 'irfan@gmail.com', '08958828128');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `ID_Jadwal` int(4) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `Nama_Pelajaran` varchar(30) NOT NULL,
  `Nama_Guru` varchar(30) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `Hari` varchar(6) NOT NULL,
  `Waktumulai` time NOT NULL,
  `Waktuselesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`ID_Jadwal`, `id_akademik`, `Nama_Pelajaran`, `Nama_Guru`, `Kelas`, `Hari`, `Waktumulai`, `Waktuselesai`) VALUES
(13, 4, 'Bahasa Inggris', 'Irfan', '', 'Senin', '09:16:00', '10:17:00'),
(14, 1, 'Ekonomi', 'Aloysius Marko', '', 'Selasa', '11:16:00', '12:16:00'),
(15, 1, 'Fisika', 'Yoga Platrisa', '', 'Rabu', '09:16:00', '10:16:00'),
(16, 1, 'Penjaskes', 'Harry', '', 'Kamis', '08:15:00', '09:15:00'),
(17, 1, 'Matematika', 'Alfredo Pedo', '', 'Jumat', '08:17:00', '09:17:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `ID_Jurusan` int(2) NOT NULL,
  `Nama_Jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`ID_Jurusan`, `Nama_Jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `ID_Kelas` int(4) NOT NULL,
  `Nama_Kelas` varchar(10) NOT NULL,
  `Jumlah_Murid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`ID_Kelas`, `Nama_Kelas`, `Jumlah_Murid`) VALUES
(9, 'X IPA A', 30),
(10, 'X IPA B', 30),
(12, 'X IPA C', 30),
(13, 'X IPS A', 30),
(14, 'X IPS B', 30),
(15, 'X IPS C', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_murid`
--

CREATE TABLE `tbl_murid` (
  `ID_Murid` varchar(6) NOT NULL,
  `Nama_Murid` varchar(50) NOT NULL,
  `Alamat_Murid` varchar(100) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `Telp` varchar(13) NOT NULL,
  `ID_Registrasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_murid`
--

INSERT INTO `tbl_murid` (`ID_Murid`, `Nama_Murid`, `Alamat_Murid`, `Gmail`, `Telp`, `ID_Registrasi`) VALUES
('MRD001', 'Ari', 'Kota Baru', 'arisetiawan82559@gmail.com', '082131208381', 1),
('MRD002', 'Bara', 'Jalur 2', 'bara@gmail.com', '08123219831', 3),
('MRD003', 'Aga', 'Kubu Raya', 'aga@gmail.com', '0823232131312', 4),
('MRD004', 'Angel', 'Ayani', 'Angel@gmail.com', '08123219831', 5),
('MRD005', 'Candra', 'Tanjung Raya', 'candra@gmail.com', '082131208381', 6),
('MRD006', 'Brandon', 'Tanjung Pura', 'Brandon@gmail.com', '08123281031', 7),
('MRD007', 'Cakkra', 'Jeruju', 'cakra@gmail.com', '082131208381', 8),
('MRD008', 'Damish', 'Tungkul', 'danish@gmail.com', '08123281031', 9),
('MRD009', 'Deon', 'Munggu', 'deon@gmail.com', '08957637281', 10),
('MRD010', 'Edwin', 'Raja', 'edwin@gmail.com', '08958828128', 11),
('MRD011', 'Farid', 'Jl ASH', 'farid@gmail.com', '0895737182361', 12),
('MRD012', 'Fahman', 'Gajah Mada', 'Fahman@gmail.com', '08958828128', 13),
('MRD013', 'nano', 'jln karet', 'nano@gmail.com', '0899999', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `ID_Nilai` int(4) NOT NULL,
  `ID_Pelajaran` varchar(7) NOT NULL,
  `ID_Murid` varchar(6) NOT NULL,
  `ID_Guru` varchar(6) NOT NULL,
  `pengetahuan` int(3) NOT NULL,
  `keterampilan` int(3) NOT NULL,
  `kkm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`ID_Nilai`, `ID_Pelajaran`, `ID_Murid`, `ID_Guru`, `pengetahuan`, `keterampilan`, `kkm`) VALUES
(17, 'MTK001', 'MRD001', 'GRU001', 72, 75, 70),
(18, 'MTK001', 'MRD002', 'GRU001', 77, 78, 70),
(19, 'MTK001', 'MRD003', 'GRU001', 80, 81, 70),
(20, 'MTK001', 'MRD006', 'GRU001', 77, 78, 70),
(21, 'EK001', 'MRD001', 'GRU002', 80, 88, 70),
(22, 'EK001', 'MRD002', 'GRU002', 88, 89, 70),
(23, 'FS001', 'MRD001', 'GRU003', 80, 81, 75),
(24, 'FS001', 'MRD002', 'GRU003', 80, 80, 75),
(25, 'PJK001', 'MRD001', 'GRU004', 90, 85, 70),
(26, 'PJK001', 'MRD002', 'GRU004', 85, 84, 70),
(27, 'BI001', 'MRD001', 'GRU005', 80, 81, 75),
(28, 'BI001', 'MRD002', 'GRU005', 88, 90, 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `ID_Pelajaran` varchar(7) NOT NULL,
  `Jurusan` varchar(20) NOT NULL,
  `ID_Guru` varchar(6) NOT NULL,
  `Tingkat` varchar(6) NOT NULL,
  `Nama_Pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelajaran`
--

INSERT INTO `tbl_pelajaran` (`ID_Pelajaran`, `Jurusan`, `ID_Guru`, `Tingkat`, `Nama_Pelajaran`) VALUES
('BI001', '', '', '', 'Bahasa Inggris'),
('EK001', '', '', '', 'Ekonomi'),
('FS001', '', '', '', 'Fisika'),
('MTK001', '', '', '', 'Matematika'),
('PJK001', '', '', '', 'Penjaskes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_registrasi`
--

CREATE TABLE `tbl_registrasi` (
  `ID_Registrasi` int(4) NOT NULL,
  `ID_Murid` varchar(6) NOT NULL,
  `ID_Tingkat` int(11) NOT NULL,
  `ID_Jurusan` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_registrasi`
--

INSERT INTO `tbl_registrasi` (`ID_Registrasi`, `ID_Murid`, `ID_Tingkat`, `ID_Jurusan`, `ID_Kelas`, `id_akademik`) VALUES
(1, 'MRD001', 1, 1, 9, 4),
(3, 'MRD002', 1, 1, 9, 4),
(4, 'MRD003', 1, 1, 10, 4),
(5, 'MRD004', 1, 1, 10, 4),
(6, 'MRD005', 1, 1, 12, 4),
(7, 'MRD006', 1, 1, 12, 4),
(8, 'MRD007', 1, 2, 13, 4),
(9, 'MRD008', 1, 2, 13, 4),
(10, 'MRD009', 1, 2, 14, 4),
(11, 'MRD010', 1, 2, 14, 4),
(12, 'MRD011', 1, 2, 15, 4),
(13, 'MRD012', 1, 2, 15, 4),
(16, 'MRD013', 1, 1, 9, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tingkat`
--

CREATE TABLE `tbl_tingkat` (
  `ID_Tingkat` int(3) NOT NULL,
  `ID_Registrasi` varchar(6) NOT NULL,
  `Tingkat_Kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tingkat`
--

INSERT INTO `tbl_tingkat` (`ID_Tingkat`, `ID_Registrasi`, `Tingkat_Kelas`) VALUES
(1, '1', 'X'),
(2, '2', 'XI'),
(6, '', 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID_User` int(3) NOT NULL,
  `ID` varchar(6) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `Password_User` varchar(50) NOT NULL,
  `Jenis_User` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`ID_User`, `ID`, `Nama_User`, `Gmail`, `Password_User`, `Jenis_User`) VALUES
(1, '', 'admin', 'admin@gmail.com', 'admin', 'Admin'),
(21, 'Kepala', 'Thomas', '', '123', 'Kepala Sekolah'),
(22, 'MRD001', 'ari.01@gmail.com', '', '123', 'Murid'),
(23, 'MRD001', 'bara.02@gmail.com', '', '123', 'Murid'),
(24, 'MRD007', 'cakra.07@gmail.com', '', '123', 'Murid'),
(25, 'MRD008', 'damish.08@gmail.com', '', '123', 'Murid'),
(26, 'GRU001', 'pedo.01@gmail.com', '', '123', 'Guru'),
(27, 'GRU002', 'marko.02@gmail.com', '', '123', 'Guru'),
(28, 'GRU003', 'yoga.03@gmail.com', '', '123', 'Guru'),
(29, 'GRU004', 'harry.04@gmail.com', '', '123', 'Guru'),
(30, 'GRU005', 'irfan.05@gmail.com', '', '123', 'Guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`Kode`);

--
-- Indeks untuk tabel `tbl_akademik`
--
ALTER TABLE `tbl_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`ID_Guru`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`ID_Jadwal`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`ID_Jurusan`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`ID_Kelas`);

--
-- Indeks untuk tabel `tbl_murid`
--
ALTER TABLE `tbl_murid`
  ADD PRIMARY KEY (`ID_Murid`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`ID_Nilai`);

--
-- Indeks untuk tabel `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`ID_Pelajaran`);

--
-- Indeks untuk tabel `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  ADD PRIMARY KEY (`ID_Registrasi`);

--
-- Indeks untuk tabel `tbl_tingkat`
--
ALTER TABLE `tbl_tingkat`
  ADD PRIMARY KEY (`ID_Tingkat`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `Kode` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `tbl_akademik`
--
ALTER TABLE `tbl_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `ID_Jadwal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `ID_Jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `ID_Kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `ID_Nilai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  MODIFY `ID_Registrasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_tingkat`
--
ALTER TABLE `tbl_tingkat`
  MODIFY `ID_Tingkat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID_User` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

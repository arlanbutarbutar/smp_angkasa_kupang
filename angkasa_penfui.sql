-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2022 pada 06.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkasa_penfui`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_guru` int(15) NOT NULL,
  `id_siswa` int(15) NOT NULL,
  `id_mapel` int(15) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `status` char(25) NOT NULL,
  `id_kelas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_guru`, `id_siswa`, `id_mapel`, `hari`, `tanggal`, `status`, `id_kelas`) VALUES
(28, 19, 27, 1, 'Kamis', '28 Apr 2022', 'Hadir', 2),
(29, 19, 28, 1, 'Kamis', '28 Apr 2022', 'Hadir', 2),
(30, 19, 29, 1, 'Kamis', '28 Apr 2022', 'Tidak Hadir', 2),
(31, 19, 28, 1, 'Jumat', '29 Apr 2022', 'Hadir', 2),
(32, 19, 27, 1, 'Jumat', '29 Apr 2022', 'Tidak Hadir', 2),
(33, 19, 29, 1, 'Jumat', '29 Apr 2022', 'Hadir', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(35) NOT NULL,
  `nama_guru` char(55) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(35) NOT NULL,
  `agama` varchar(35) NOT NULL,
  `status_aktif` varchar(35) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `foto` varchar(75) NOT NULL DEFAULT 'user.png',
  `id_kelas` int(15) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl_lahir`, `agama`, `status_aktif`, `id_mapel`, `foto`, `id_kelas`, `id_status`) VALUES
(19, 1234567891, 'Guru 1', 'Laki-Laki', 'Jln. Adisucipto', 'Kupang', '28 Apr 2022', 'katolik', 'Aktif', 1, 'user.png', 2, 1),
(20, 123456789, 'Guru 2', 'Perempuan', 'Jln. Adisucipto', 'Kupang', '29 Apr 2022', 'katolik', 'Aktif', 4, 'user.png', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `lama_mengajar` varchar(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mapel`, `id_kelas`, `ruang`, `id_guru`, `lama_mengajar`, `hari`, `jam`) VALUES
(22, 1, 2, '2', 19, '3', 'Senin', '07:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(2, 'VII A'),
(3, 'VII B'),
(5, 'VIII A'),
(6, 'VIII B'),
(7, 'IX A'),
(8, 'IX B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `kementerian` char(90) NOT NULL,
  `unitOrganisasi` char(90) NOT NULL,
  `provinsi` char(90) NOT NULL,
  `kabupaten` char(40) NOT NULL,
  `kota` char(40) NOT NULL,
  `nss` char(90) NOT NULL,
  `npsn` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` char(50) NOT NULL,
  `statussekolah` text NOT NULL,
  `daerah` text NOT NULL,
  `kodepos` text NOT NULL,
  `akreditasi` text NOT NULL,
  `tahunberdiri` year(4) NOT NULL,
  `luasgedung` text NOT NULL,
  `luastanah` text NOT NULL,
  `statustanah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `kementerian`, `unitOrganisasi`, `provinsi`, `kabupaten`, `kota`, `nss`, `npsn`, `alamat`, `telp`, `statussekolah`, `daerah`, `kodepos`, `akreditasi`, `tahunberdiri`, `luasgedung`, `luastanah`, `statustanah`) VALUES
(1, 'Dinas Pendidkan dan Kebudayan', 'AKADEMIK SMP ANGKASA PENFUI', 'Nusa Tenggara Timur', 'Kupang', 'Maulafa', '202246002010', '50305003', 'Jln.Adisucipto-penfui', '(0380) 882079', 'Swasta', 'Perkotaan', '85361', 'B', 1973, '503 M2', '3.350 M2', 'Milik TNI Angkatan Udara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` char(40) NOT NULL,
  `nama` char(50) NOT NULL,
  `id_kelas` int(12) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(35) NOT NULL,
  `informasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `id_kelas`, `tanggalLahir`, `alamat`, `jk`, `informasi`) VALUES
(27, '123451', 'Siswa 1', 2, '2022-04-28', 'Jln Adisucipto', 'Laki-Laki', ''),
(28, '123452', 'Siswa 2', 2, '2022-04-28', 'Jln Adisucipto', 'Perempuan', ''),
(29, '123453', 'Siswa 3', 2, '2022-04-28', 'Jln Adisucipto', 'Laki-Laki', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_guru`
--

CREATE TABLE `status_guru` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_guru`
--

INSERT INTO `status_guru` (`id_status`, `status`) VALUES
(1, 'Guru'),
(2, 'Wali Kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `email` char(90) NOT NULL,
  `password` char(90) NOT NULL,
  `level` enum('admin','siswa','guru','kepsek') NOT NULL,
  `nip` int(11) NOT NULL,
  `nisn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `email`, `password`, `level`, `nip`, `nisn`) VALUES
(1, 'admin@gmail.com', '$2y$10$9DLXt0ziZfx1I.RHHSaFY.9D8L.8Fa/TLYFIEfbPNZfdP9Wxx6/JC', 'admin', 0, 0),
(44, 'Guru 1', '$2y$10$u4YfL4Vj0YbD4CsgsjRrne9rCUSoQdryMCYeYF5MxN4KeDOczmv0S', 'guru', 1234567891, 0),
(45, 'Siswa 3', '$2y$10$gjsQSsgO4GRmJaRYROMCTOlWR5YKnrUFHHYWe1v6hwSZwB.CcfcUe', 'siswa', 0, 123453),
(46, 'Siswa 2', '$2y$10$lKKnnJocNu7pEk4tkakmr.KkbPfeJlgjrjlj1/g0D9NHJ7T.ixtZC', 'siswa', 0, 123452);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` char(50) NOT NULL,
  `gambar` char(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `pembuat` char(60) NOT NULL DEFAULT 'Admin',
  `kategori` char(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `gambar`, `deskripsi`, `pembuat`, `kategori`) VALUES
(21, 'bakti sosial', 'logo.jpeg', '<p>untuk semua siswa smp angkasa penfui</p>\r\n', 'Admin', 'Semua Siswa SMP Angkasa Penfui'),
(22, 'Pembersihan halaman sekolah', 'thumb_maupilihsekolahinternasionalinihalyangharusdiperhatikanjpg.jpg', 'di lakukan di halaman smp angkasa', 'Admin', 'Semua Siswa SMP Angkasa Penfui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` char(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Semua Siswa SMP Angkasa Penfui'),
(2, 'Untuk kelas VII'),
(3, 'Untuk Kelas VIII'),
(4, 'Untuk Kelas IX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` char(90) NOT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `mapel`, `id_kelas`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti', 2),
(2, 'PKN', 5),
(3, 'BAHASA INDONESIA', 2),
(4, 'MATEMATIKA', 3),
(5, 'Seni Budaya Dan Prakraya', 6),
(6, 'PJOK', 2),
(7, 'Bahasa Inggris', 3),
(8, 'TIK', 2),
(9, 'Prakarya', 2),
(10, 'Ilmu Pengetahuan Sosial', 8),
(11, 'Ilmu Pengetahuan Alam', 7),
(15, 'Bahasa Tetun', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` char(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jenisNilai` char(50) NOT NULL,
  `statusNilai` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_mapel`, `nilai`, `id_siswa`, `jenisNilai`, `statusNilai`) VALUES
(659, 8, '65', 29, 'Nilai Harian', 'Tidak Tuntas'),
(661, 6, '90', 29, 'Nilai Tugas 1', 'Tuntas'),
(662, 1, '56', 29, 'Nilai Tugas 3', 'Tidak Tuntas'),
(663, 1, '44', 29, 'Nilai Ulangan 1', 'Tidak Tuntas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `status_guru`
--
ALTER TABLE `status_guru`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `status_guru`
--
ALTER TABLE `status_guru`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absensi_ibfk_4` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_guru` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `guru_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD CONSTRAINT `tbl_mapel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

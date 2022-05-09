-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 04:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_guru` int(15) NOT NULL,
  `id_siswa` int(15) NOT NULL,
  `id_mapel` int(15) NOT NULL,
  `hari` char(15) NOT NULL,
  `tanggal` date NOT NULL,
  `status` char(25) NOT NULL,
  `id_kelas` int(15) NOT NULL,
  `bulan` int(15) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_guru`, `id_siswa`, `id_mapel`, `hari`, `tanggal`, `status`, `id_kelas`, `bulan`, `tahun`) VALUES
(20, 1, 20, 3, 'kamis', '2022-04-06', 'hadir', 2, 4, 2022),
(21, 1, 24, 15, 'Senin', '2022-04-18', 'hadir', 2, 4, 2022),
(22, 1, 24, 15, 'Senin', '2022-04-20', 'hadir', 2, 4, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(35) NOT NULL,
  `nama` char(55) NOT NULL,
  `id_kelas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `id_kelas`) VALUES
(1, 1213131, 'adel', 2),
(9, 987678, 'Reisa Haning', 11),
(10, 876545677, 'Adi Susanto', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `id_mapel` varchar(60) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `lama_mengajar` varchar(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mapel`, `id_kelas`, `ruang`, `id_guru`, `lama_mengajar`, `hari`, `jam`) VALUES
(16, '3', '2', '1', 1, '4', 'kamis', '08:30:00'),
(18, '15', '2', '7', 1, '2', 'senin', '08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` char(30) NOT NULL,
  `kelompok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `kelompok`) VALUES
(2, 'VII A', 1),
(3, 'VII B', 1),
(5, 'VIII A', 1),
(6, 'VIII B', 1),
(7, 'IX A', 2),
(10, 'IX B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
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
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `kementerian`, `unitOrganisasi`, `provinsi`, `kabupaten`, `kota`, `nss`, `npsn`, `alamat`, `telp`, `statussekolah`, `daerah`, `kodepos`, `akreditasi`, `tahunberdiri`, `luasgedung`, `luastanah`, `statustanah`) VALUES
(1, 'Dinas Pendidkan dan Kebudayan', 'AKADEMIK SMP ANGKASA PENFUI', 'Nusa Tenggara Timur', 'Kupang', 'Maulafa', '202246002010', '50305003', 'Jln.Adisucipto-penfui', '(0380) 882079', 'Swasta', 'Perkotaan', '85361', 'B', 1973, '503 M2', '3.350 M2', 'Milik TNI Angkatan Udara');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` char(40) NOT NULL,
  `nama` char(50) NOT NULL,
  `id_kelas` int(12) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kelompokKelas` int(15) NOT NULL,
  `jk` set('pria','wanita') NOT NULL,
  `informasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `id_kelas`, `tanggalLahir`, `alamat`, `kelompokKelas`, `jk`, `informasi`) VALUES
(20, '43234', 'Maria Emerenciana Naitili', 2, '2000-05-02', 'Kefamenanu', 1, 'wanita', ''),
(23, '1324256', 'Budi', 3, '2000-02-05', 'Kupang', 1, 'pria', ''),
(24, '2341561', 'maria', 2, '1999-02-07', 'kefa', 1, 'wanita', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `username` char(90) NOT NULL,
  `password` char(90) NOT NULL,
  `level` enum('admin','siswa','guru','kepsek') NOT NULL,
  `id_siswa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `password`, `level`, `id_siswa`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0),
(28, 'adel', '94c93d4f9686cfeae29e9cbc3230cbf9', 'guru', 1),
(31, 'meci', '23fff84baed742048627fa541c1543f4', 'admin', 20),
(33, 'reisa', '1cb99b836b019345204621ed5852bdce', 'guru', 9),
(34, 'Budi', 'd5cbed34fa4dd6975139eb6ca1e91457', 'siswa', 23),
(35, 'maria', '3a3eaf28b9e9c2df3540d5cd7aaf21dd', 'siswa', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` char(50) NOT NULL,
  `gambar` char(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `pembuat` char(60) NOT NULL,
  `kategori` char(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `gambar`, `deskripsi`, `pembuat`, `kategori`) VALUES
(21, 'bakti sosial', 'logo.jpeg', 'untuk semua siswa smp angkasa penfui', 'Admin', 'Untuk Kelas VIII'),
(22, 'Pembersihan halaman sekolah', 'thumb_maupilihsekolahinternasionalinihalyangharusdiperhatikanjpg.jpg', 'di lakukan di halaman smp angkasa', 'Admin', 'Semua Siswa SMP Angkasa Penfui');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` char(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Semua Siswa SMP Angkasa Penfui'),
(2, 'Untuk kelas VII'),
(3, 'Untuk Kelas VIII'),
(4, 'Untuk Kelas IX');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` char(90) NOT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `mapel`, `id_kelas`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti', 2),
(2, 'PKN', 2),
(3, 'BAHASA INDONESIA', 2),
(4, 'MATEMATIKA', 2),
(5, 'Seni Budaya Dan Prakraya', 2),
(6, 'PJOK', 2),
(7, 'Bahasa Inggris', 2),
(8, 'TIK', 2),
(9, 'Prakarya', 2),
(10, 'Ilmu Pengetahuan Sosial', 2),
(11, 'Ilmu Pengetahuan Alam', 2),
(15, 'Bahasa Tetun', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` char(40) NOT NULL,
  `jenis_kelompok` set('KL.3','KL.4') NOT NULL,
  `nilai` char(50) NOT NULL,
  `id_siswa` char(40) NOT NULL,
  `jenisNilai` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_mapel`, `jenis_kelompok`, `nilai`, `id_siswa`, `jenisNilai`) VALUES
(646, '1', '', '80', '20', 'Nilai Harian'),
(647, '1', '', '80', '20', 'Nilai Tugas 1'),
(648, '1', '', '80', '20', 'Nilai Tugas 2'),
(649, '1', '', '80', '20', 'Nilai Tugas 3'),
(650, '1', '', '80', '20', 'Nilai Ulangan 1'),
(651, '1', '', '80', '20', 'Nilai Ulangan 2'),
(652, '1', '', '80', '20', 'Nilai Ulangan 3'),
(653, '1', '', '80', '20', 'Nilai Mith'),
(654, '1', '', '80', '20', 'Nilai Semester'),
(658, '6', '', '85', '20', 'Nilai Harian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

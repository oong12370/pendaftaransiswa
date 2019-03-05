-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Feb 2019 pada 19.11
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sale_rembang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `role_user` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`Id`, `email`, `password`, `nama_admin`, `role_user`, `id_user`) VALUES
(2, 'admin@gmail.com', '$2y$10$QlcG1jHkn7uk2/7s0Vr/3.oEN4rMhXZoINVnIWY.ZLFypMXN8P3v2', 'oong', '0', 8),
(3, 'kapsek@gmail.com', '$2y$10$QlcG1jHkn7uk2/7s0Vr/3.oEN4rMhXZoINVnIWY.ZLFypMXN8P3v2', 'Sapto', '2', NULL),
(20, 'test@gmail.com', '$2y$10$GK/Vsz.N/wTbKijTQw31qOgTZFqeLNwZgofVP0Nst4zJ/XFmwKEoa', '', '1', 9),
(22, 'oong@gmail.com', '$2y$10$QlcG1jHkn7uk2/7s0Vr/3.oEN4rMhXZoINVnIWY.ZLFypMXN8P3v2', '', '1', 11),
(23, 'erisukaeri.mas@gmail.com', '$2y$10$l6tIub9Ng6j1K4lhHcnr8OGUyUwpfRnRgUQQdNqUVUOia9F2KV.hm', '', '1', 12),
(24, 'eri@gmail.com', '$2y$10$5DF.EOsprom2tixXe94KWeNV13fVRGcnjJjryMJ4UIKeV9eU1A9rC', '', '1', 13),
(26, 'julian@gmail.com', '$2y$10$tOfJv79tlK1mvG6gU80YleP1eiOIfA0iKmyZ9iLxL4OEJRRJgNjZi', '', '1', 15),
(27, 'diah@gmail.com', '$2y$10$.lN/eeQS6S3mytuiX7qCfO3UrWClrH14KzBYx.HbxqhfW5FiUxCt.', '', '1', 16),
(28, 'yuni@gmail.com', '$2y$10$1C7WUaPBsmNiVtiIcw6xpOTILimLlFsiDcK4mcyeaKFPPUotjyu8S', '', '1', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `detail_pendaftaran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `status_pendaftaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_user` (`id_user`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `detail_pendaftaran`
--

INSERT INTO `detail_pendaftaran` (`Id`, `id_user`, `id_admin`, `tanggal_daftar`, `status_pendaftaran`) VALUES
(7, 8, 2, '2018-12-21', '1'),
(10, 11, 2, '2019-01-02', '3'),
(14, 15, 2, '2019-01-20', '3'),
(15, 16, 2, '2019-01-28', '1'),
(16, 17, 2, '2019-02-16', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pemabayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_regist` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `bank` varchar(20) NOT NULL,
  `norek` varchar(50) NOT NULL,
  `biaya_pendaftaran` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_pemabayaran`),
  KEY `id_detail_pendaftaran` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pemabayaran`, `id_regist`, `id_user`, `bank`, `norek`, `biaya_pendaftaran`, `tanggal_pembayaran`, `status`) VALUES
(53, 1, 12, 'BNI', '8897979', 8000, '2019-02-03', 1),
(54, 2, 11, 'BNI', '88979798776', 8000, '2019-02-03', 1),
(55, 3, 17, 'BRI', '889797978', 9000, '2019-02-16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `di_jakarta_ikut` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `pendidikan_terakhir_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `agama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_terakhir_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `agama_ibu` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `upload_akte` varchar(255) DEFAULT NULL,
  `upload_kartu_keluarga` varchar(255) DEFAULT NULL,
  `foto_anak` varchar(255) DEFAULT NULL,
  `foto_keluarga` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`Id`, `nama`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `anak_ke`, `jumlah_saudara`, `di_jakarta_ikut`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pendidikan_terakhir_ayah`, `pekerjaan_ayah`, `agama_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pendidikan_terakhir_ibu`, `pekerjaan_ibu`, `agama_ibu`, `telp`, `upload_akte`, `upload_kartu_keluarga`, `foto_anak`, `foto_keluarga`) VALUES
(8, 'Anggit Prayogo', 'Anggit', 'tangerang', '2009-01-01', 'L', 1, 2, 'Orang tua', 'Ayah', 'Tangerang', '1980-01-01', 'SMA', 'Karyawan Swasta', 'Islam', 'Ibu', 'Gunung Kidul', '1980-01-01', 'SMA', 'Ibu Rumah Tangga', 'Islam', '+6287812035533', '09-12-34WhatsApp Image 2017-10-24 at 18.35.03.jpeg', '09-12-34WhatsApp Image 2017-11-24 at 16.42.39.jpeg', '09-12-43cropped-GGAD-LOGO-2.png', '09-12-43logo.jpeg'),
(9, 'test', 'test', 'test', '2009-01-01', 'L', 1, 2, 'test', 'test', 'test', '1980-01-01', 'SMA', 'test', 'test', 'test', 'test', '1980-01-01', 'test', 'test', 'test', '908080', '03-12-391. Berhasil signup.PNG', '03-12-392. Gagal signup (data kurang atau sudah terpakai).PNG', '03-12-502. Gagal signup (data kurang atau sudah terpakai).PNG', '03-12-501. Berhasil signup.PNG'),
(11, 'oong', 'julian', 'lampung', '2009-01-01', 'L', 1, 2, 'sodara', 'nama', 'bjjk', '1980-01-01', 'smp', 'apa aja', 'islam', 'hkjkj', 'jhjjgj', '1980-01-01', 'hkjhk', 'ibu', 'islam', '09889687768768', '06-01-372017-12-03 at 12-47-40.png', '06-01-372017-12-03 at 13-07-54.png', '06-01-57bdcebf38-33f5-46cc-9712-bd2c1f54e8d6.jpg', '06-01-57bukti.jpeg'),
(12, 'eri sukairi', 'ero', 'tangerang', '2009-01-01', 'L', 2, 2, 'sodara', 'asfa', 'tangerang', '1980-01-01', 'sma', 'guru', 'islam', 'iiuhkj', 'tangerang', '1980-01-01', 'sma', 'gutu', 'islam', '097897879879', '09-01-52laporan aset.JPG', '09-01-52laporan pinjaman.JPG', '09-01-34simpanan.JPG', '09-01-34Capture.JPG'),
(13, 'eri sukairi iiii', 'suakairi', 'tangerang', '2009-01-01', 'P', 1, 1, 'sodara', 'aa', 'tangerang', '1980-01-01', 'sma', 'guru', 'islam', 'bbb', 'tangerang', '1980-01-01', 'sma', 'ibu', 'islam', '0218315', '08-01-116.jpg', '08-01-111.jpg', '08-01-47Gambar-Kulkas.jpg', '08-01-47jakartabarat.jpg'),
(15, 'julian', 'julian', 'gjhgj', '2009-01-01', 'P', 1, 2, 'sodara', 'ouih', 'hkkj', '1980-01-01', 'kjgjk', 'kjhjk', 'hjkhkj', 'hkjhk', 'hjkhk', '1980-01-01', 'hkjhkj', 'hkjh', 'hkjh', '089879888878', '12-01-311.jpg', '12-01-316.jpg', '12-01-55harga-batu-alam.jpg', '12-01-55image_20180311-22211-1bvzbuq.jpg'),
(16, 'Diah Yuliansari', 'Diah', 'Tangerang', '2009-01-01', 'P', 2, 2, 'sodara', 'Ayah', 'tangerang', '1980-01-01', 'SMK', 'Pekerjaan', 'islam', 'Ibu ', 'tangerang', '1980-01-01', 'sma', 'ibu', 'islam', '098768556789', '07-01-39Koala.jpg', '07-01-39Tulips.jpg', '07-01-23Desert.jpg', '07-01-23Chrysanthemum.jpg'),
(17, 'yuni yana', 'yuni', 'jakarta', '2009-01-01', 'P', 1, 2, 'sodara', 'ayah saya', 'jakarta', '1980-01-01', 'SMA', 'Pegawai negeri', 'islam', 'ibu saya', 'jakarta', '1980-01-01', 'SMA', 'Ibu rumah tangga', 'islam', '088787687889789', '05-02-261.jpg', '05-02-264.jpg', '05-02-496.jpg', '05-02-49213.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskkripsi` text NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `id_user`, `tanggal`, `judul`, `deskkripsi`, `ket`) VALUES
(1, 9, '2019-01-05 21:07:13', 'Pengumunan terbaru', 'Pada perusahaan fungsi pendistribusian memegang peranan penting dalam proses bisnis. Untuk proses distribusi material di PT. Garuda Maintenance Facility Aero Asia belum memiliki sistem informasi yang terkomputerisasi untuk pendistribusian atau pengiriman material yang memudahkan proses pengolahan dan penginformasian pendistribusian material. Dalam pembuatan laporan masih menggunakan microsoft excel sehingga dalam pembuatan laporan masih kurang efektif dan efesien. Selain itu penyampaian informasi pendistribusian material belum bisa dipantau oleh produksi, produksi harus menggunakan media telepon untuk mengetahui keberadaan material yang mereka order sehingga informasi keberadaan material sulit tersampaikan. Hal ini yang menyebabkan seringnya terjadi kesalah pahaman antara produksi dan pihak gudang yang dapat mengakibat terlambat nya material sampai ke produksi. Dari permasalahan yang ada pada PT. Garuda ', 'kelas1'),
(4, 9, '2019-01-05 21:08:08', 'Jurnal teranyar', 'PT. Garuda Maintenance Facility Aero Asia sehingga dapat efektif dan efisien dalam proses pendistribusian material, mulai dari penerimaan material dari gudang ,pengiriman material ke produksi, pembuatan laporan dan penyampaian informasi pengiriman jadi lebih efektif dan efesien. Tujuan dari penelitian ini, untuk mempermudah pengolahan data dan informasi pendistribusian material dan mempermudah dalam pemantauan material sehingga dapat mendukung kelancaran produksi. Dan untuk mengatasi masalah tesebut, dilakukan beberapa metode pengumpulan data dengan cara observasi, wawancara dan studi pustaka kemudian membuat sebuah aplikasi sistem informasi pendistribusian material pesawat dengan menggunakan pemrograman PHP dan MySQL sebagai database dengan memanfaatkan jaringan lokal ataupun internet, untuk tahap pengembangan sistem ini peneliti ', 'smk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regist`
--

CREATE TABLE IF NOT EXISTS `regist` (
  `id_regist` int(11) NOT NULL AUTO_INCREMENT,
  `Id_test` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_regist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `regist`
--

INSERT INTO `regist` (`id_regist`, `Id_test`, `tgl`, `keterangan`) VALUES
(1, 1, '2019-02-03', 'Lakukan pemabayaran sebesar 8000'),
(2, 6, '2019-02-03', 'Segera lakukan pembayaran 8000'),
(3, 7, '2019-02-16', 'pembayaran 9000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` char(6) NOT NULL DEFAULT '0',
  `kelas` varchar(255) DEFAULT NULL,
  `id_detail_pendaftaran` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `kelas`, `id_detail_pendaftaran`, `nama`) VALUES
('170001', 'B', 7, 'Anggit Prayogo'),
('170002', 'B', 8, 'test'),
('170003', 'B', 8, 'test'),
('170004', 'B', 9, 'test2'),
('190005', 'A', 10, 'oong'),
('190006', '', 13, 'ririn juwita'),
('190007', '', 13, 'ririn juwita'),
('190008', '', 13, 'ririn juwita'),
('190009', '', 14, 'julian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_seleksi`
--

CREATE TABLE IF NOT EXISTS `tb_seleksi` (
  `Id_test` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`Id_test`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_seleksi`
--

INSERT INTO `tb_seleksi` (`Id_test`, `id_user`, `nilai`, `hasil`, `tgl`) VALUES
(1, 12, 80, 'Lulus', '2019-01-11'),
(4, 14, 60, 'Gagal', '2019-01-28'),
(5, 16, 60, 'Gagal', '2019-01-28'),
(6, 11, 90, 'Lulus', '2019-02-03'),
(7, 17, 80, 'Lulus', '2019-02-16');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  ADD CONSTRAINT `detail_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pendaftaran_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

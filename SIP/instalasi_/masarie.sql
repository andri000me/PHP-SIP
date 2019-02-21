-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2011 at 01:59 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `masarie`
--

-- --------------------------------------------------------

--
-- Table structure for table `sh_agenda`
--

CREATE TABLE IF NOT EXISTS `sh_agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `judul_agenda` varchar(50) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `tempat_agenda` varchar(50) NOT NULL,
  `keterangan_agenda` text NOT NULL,
  `s_username` varchar(30) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sh_agenda`
--

INSERT INTO `sh_agenda` (`id_agenda`, `judul_agenda`, `tanggal_agenda`, `tempat_agenda`, `keterangan_agenda`, `s_username`) VALUES
(8, 'Bakti Sosial Rutin', '2011-12-02', 'Lingkungan Sekolahan', 'Membawa alat kebersihan, bagi siswa atau siswi yang tidak membawa alat kebersihan akan dikenakan sanksi', 'masarie'),
(9, 'Gladi Bersih Lomba PBB', '2011-12-07', 'Lapangan Utama', 'Khusus bagi peserta lomba', 'masarie'),
(10, 'Rapat Wali Murid Kelas XII', '2011-12-31', 'Hall A', 'Membahas tentang pelepasan siswa kelas XII', 'masarie'),
(11, 'Dies Natalis Ke 22', '2012-01-01', 'Hall B', 'Perayaan dies natalis ke 22 dengan berbagai lomba dan hiburan', 'masarie');

-- --------------------------------------------------------

--
-- Table structure for table `sh_album`
--

CREATE TABLE IF NOT EXISTS `sh_album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(30) NOT NULL,
  `tanggal_album` date NOT NULL,
  `deskripsi_album` text NOT NULL,
  `foto_album` varchar(30) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sh_album`
--

INSERT INTO `sh_album` (`id_album`, `nama_album`, `tanggal_album`, `deskripsi_album`, `foto_album`) VALUES
(18, 'Alam Semesta', '2011-11-30', 'Foto-foto sampel dalam instalasi pertama', 'cool-planet-1280-1024-6200.jpg'),
(19, 'Album tanpa photo', '2011-11-30', 'album ini contoh album tanpa foto yang diupload', 'no_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sh_berita`
--

CREATE TABLE IF NOT EXISTS `sh_berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal_posting` date NOT NULL,
  `gambar_kecil` varchar(50) NOT NULL,
  `status_terbit` int(1) NOT NULL,
  `status_komentar` int(1) NOT NULL,
  `status_headline` int(1) NOT NULL,
  `s_username` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `sh_berita`
--

INSERT INTO `sh_berita` (`id_berita`, `judul_berita`, `isi_berita`, `tanggal_posting`, `gambar_kecil`, `status_terbit`, `status_komentar`, `status_headline`, `s_username`, `id_kategori`) VALUES
(68, 'Jangan Malas Untuk Belajar', '<p style="text-align: justify;"><strong><img style="float: left; margin: 5px;" src="/skripsi/images/mumet.jpg" alt="" width="300" height="123" />Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p style="text-align: justify;"><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'mumet.jpg', 1, 1, 1, 'masarie', 1),
(69, 'Buku dan pensil adalah peralatan sekolah', '<p style="text-align: justify;"><strong><img style="float: left; margin: 5px;" src="/skripsi/images/potlot.jpg" alt="" width="300" height="123" />Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p style="text-align: justify;"><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'potlot.jpg', 1, 1, 1, 'masarie', 1),
(70, 'Belajar Bersama di Perpustakaan', '<p style="text-align: justify;"><strong><img style="float: left; margin: 5px;" src="/skripsi/images/belajar.jpg" alt="" width="300" height="123" />Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p style="text-align: justify;"><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'belajar.jpg', 1, 1, 1, 'masarie', 1),
(71, 'Mengerjakan Tugas Rumah', '<p style="text-align: justify;"><strong>Lorem Ips</strong><img style="float: left; margin: 5px;" title="TEsting" src="/skripsi/images/menulis.jpg" alt="Testing" width="300" height="123" /><strong>um</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p style="text-align: justify;"><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'menulis.jpg', 1, 1, 1, 'masarie', 1),
(72, 'Membaca buku disaat jam istirahat sangat jarang dilakukan siswa', '<p style="text-align: justify;"><strong><img style="float: left; margin: 5px;" src="/skripsi/images/sinau.jpg" alt="" width="300" height="123" />Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p style="text-align: justify;"><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'sinau.jpg', 1, 1, 1, 'masarie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sh_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `sh_buku_tamu` (
  `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bukutamu` varchar(30) NOT NULL,
  `subjek` text NOT NULL,
  `isi_pesan` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_bukutamu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sh_buku_tamu`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_galeri`
--

CREATE TABLE IF NOT EXISTS `sh_galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `nama_galeri` varchar(100) NOT NULL,
  `id_album` int(11) NOT NULL,
  `tanggal_galeri` date NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `sh_galeri`
--

INSERT INTO `sh_galeri` (`id_galeri`, `nama_galeri`, `id_album`, `tanggal_galeri`) VALUES
(68, 'daisy-light-field-1280-1024-6221.jpg', 18, '2011-11-30'),
(63, 'amazing-winter-landscape-1280-1024-6267.jpg', 18, '2011-11-30'),
(64, 'a-misty-morning-1280-1024-6230.jpg', 18, '2011-11-30'),
(65, 'blur-hdr-beach-1280-1024-6282.jpg', 18, '2011-11-30'),
(66, 'burney-falls-1280-1024-6231.jpg', 18, '2011-11-30'),
(67, 'champ-de-niege-1280-1024-6259.jpg', 18, '2011-11-30'),
(69, 'dark-seascape-1280-1024-6172.jpg', 18, '2011-11-30'),
(70, 'fire-planet-1280-1024-6216.jpg', 18, '2011-11-30'),
(71, 'grass-view-1280-1024-6187.jpg', 18, '2011-11-30'),
(72, 'kissed-snowman-1280-1024-6228.jpg', 18, '2011-11-30'),
(73, 'long-shadows-1280-1024-6233.jpg', 18, '2011-11-30'),
(74, 'lunar-eclipse-1280-1024-6235.jpg', 18, '2011-11-30'),
(75, 'night-moves-1280-1024-6237.jpg', 18, '2011-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `sh_guru_staff`
--

CREATE TABLE IF NOT EXISTS `sh_guru_staff` (
  `id_gurustaff` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL,
  `posisi` varchar(5) NOT NULL,
  `nama_gurustaff` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`id_gurustaff`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `sh_guru_staff`
--

INSERT INTO `sh_guru_staff` (`id_gurustaff`, `nip`, `posisi`, `nama_gurustaff`, `password`, `foto`, `jenkel`, `id_mapel`, `id_jabatan`, `alamat`, `status_kawin`, `tahun_masuk`, `pendidikan_terakhir`, `email`, `telepon`, `tempat_lahir`, `tanggal_lahir`) VALUES
(23, '123456789', 'guru', 'Ari Rusmanto, S.Kom', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'arie.jpg', 'L', 1, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2008, 'Magister (S2)', 'mas@arirusmanto.com', '085741444348', 'Boyolali', '1990-01-01'),
(25, '987654321', 'guru', 'Tedy Ruswanta, S.Kom', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'tedy.jpg', 'L', 8, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Strata 1 (S1)', 'tedyruswanta@rocketmail.com', '087838992200', 'Gunung Kidul', '1986-11-11'),
(26, '123654789', 'guru', 'Suwarno, S.Pd', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 7, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2011, 'Strata 1 (S1)', 'lahar_jingga89@yahoo.com', '085865723740', 'Palembang', '1989-06-07'),
(27, '321456987', 'guru', 'Windi Febri Pratama', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'windi.jpg', 'L', 9, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2011, 'Strata 1 (S1)', 'windi.febri@gmail.com', '085643267147', 'Cilacap', '1989-02-04'),
(28, '147852369', 'guru', 'Tri Budiarto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'masbudi.jpg', 'L', 10, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Duda', 2001, 'Magister (S2)', 'tri_budiarto86@yahoo.com', '08994108066', 'Cilacap', '1985-11-07'),
(29, '147258369', 'guru', 'Riski Setia Aji Wibowo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'kebo.jpg', 'L', 2, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2010, 'Strata 1 (S1)', 'rizki@email.com', '081903296661', 'Cilacap', '1988-05-04'),
(30, '963258741', 'guru', 'Alfie Nur Rahmi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'alfi.jpg', 'P', 6, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2009, 'Magister (S2)', 'alfie.nyun@gmail.com', '085742343248', 'Brebes', '1988-03-21'),
(31, '741258963', 'guru', 'Tri Kurniawati', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'P', 5, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2009, 'Magister (S2)', 'trikurniyawati@rocketmail.com', '081329075750', 'Gunung Kudul', '1988-04-13'),
(32, '321654987', 'guru', 'Petrus Dwijoko Purnomo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 8, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2009, 'Strata 1 (S1)', 'petrus@email.com', '085643749548', 'Yogyakarta', '1988-01-21'),
(33, '321456789', 'guru', 'Oscar Anindita', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 5, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Strata 1 (S1)', 'oscar@email.com', '085624573959', 'Bantul', '1989-07-20'),
(34, '147852963', 'guru', 'Hana Sartika', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'P', 7, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2010, 'Diploma 3 (D3)', 'hana@email.com', '081802954314', 'Semarang', '1990-09-14'),
(35, '369258741', 'guru', 'Topan Heri Purwanto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 1, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Duda', 2011, 'Strata 1 (S1)', 'topan@email.com', '087838978857', 'Brebes', '1989-08-18'),
(36, '123695847', 'guru', 'Ahmad Fauzi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'fauji.jpg', 'L', 9, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Duda', 2008, 'Strata 1 (S1)', 'fauzi@email.com', '085647328868', 'Boyolali', '1989-12-13'),
(37, '789632541', 'guru', 'Prista Sahayadi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 2, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Diploma 3 (D3)', 'prista@email.com', '081808212829', 'Tangerang', '1989-05-09'),
(38, '123456987', 'guru', 'Novita Pamungkas', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 5, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Duda', 2009, 'Diploma 3 (D3)', 'novita@email.com', '085743349967', 'Klaten', '1988-11-16'),
(39, '748596321', 'guru', 'Muhammad Umar Dhani', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'umar.jpg', 'L', 10, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2011, 'Diploma 3 (D3)', 'umar@email.com', '085728185184', 'Sragen', '1989-07-19'),
(40, '362514789', 'guru', 'Zaini Akhsan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'L', 8, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2010, 'Magister (S2)', 'zaini@email.com', '085640363836', 'Jepara', '1989-04-04'),
(41, '125478963', 'guru', 'Ayu Aprilia', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'P', 6, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2011, 'Strata 1 (S1)', 'ayu@email.com', '087838242777', 'Cilacap', '1990-04-04'),
(42, '985632147', 'guru', 'Devita Purnamasari Agustine', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'P', 9, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Diploma 3 (D3)', 'devita@email.com', '08123456987', 'Boyolali', '1990-08-14'),
(43, '632541789', 'guru', 'Tutik Rahayu', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'P', 7, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2010, 'Diploma 3 (D3)', 'tutik@email.com', '085741332456', 'Boyolali', '1989-10-18'),
(44, '965874123', 'guru', 'Pratiwi Budi Amani', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'no_photo.jpg', 'P', 1, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2011, 'Strata 1 (S1)', 'pabuam@yahoo.com', '085640692331', 'Jakarta', '1988-08-22'),
(45, '785412369', 'guru', 'Vivi Verawati', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'pipi.jpg', 'P', 6, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2011, 'Diploma 3 (D3)', 'pipi@email.com', '08129658947', 'Jakarta', '1988-07-17'),
(46, '789652314', 'guru', 'Heri Siswanto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'heri.jpg', 'L', 8, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Diploma 3 (D3)', 'heri@email.com', '085647512989', 'Boyolali', '1989-11-15'),
(47, '321659874', 'guru', 'Dwi Widiyanto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'dwi.jpg', 'L', 9, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2010, 'Magister (S2)', 'dwi@email.com', '085643123654', 'Boyolali', '1987-12-27'),
(48, '986532147', 'guru', 'Dedik Pantoro', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'dedik.jpg', 'L', 1, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Diploma 3 (D3)', 'dedik@email.com', '085647148921', 'Boyolali', '1986-05-14'),
(49, '123645789', 'guru', 'M. Ardy Prabowo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'banjar.jpg', 'L', 2, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Menikah', 2010, 'Diploma 3 (D3)', 'banjar@email.com', '085867410653', 'Boyolali', '1988-02-25'),
(50, '986532741', 'guru', 'Ardi Nurdiyansah', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'ardy.jpg', 'L', 7, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2011, 'Diploma 3 (D3)', 'ardy@email.com', '081329086589', 'Boyolali', '1988-10-08'),
(51, '875421963', 'guru', 'Alex Murti', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'alex.jpg', 'L', 7, 0, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum Menikah', 2010, 'Strata 1 (S1)', 'alex@email.com', '087726710520', 'Boyolali', '1988-05-11'),
(52, '326598741', 'staff', 'Tri Wahyudi', '', 'no_photo.jpg', 'L', 0, 5, 'Manggis, RT2/7, Tambak, Mojosongo, Boyolali 57371', 'Menikah', 2010, 'Diploma 2 (D2)', 'wahyudi@email.com', '08741325478', 'Boyolali', '1988-02-03'),
(53, '124577412', 'staff', 'Arifin Setiawan', '', 'no_photo.jpg', 'L', 0, 6, 'Manggis, RT2/7, Tambak, Mojosongo, Boyolali 57371', 'Menikah', 2010, 'Diploma 1 (D1)', 'arifin@email.com', '-', 'Surakarta', '1988-06-09'),
(54, '123456321', 'staff', 'Wawan Finu Prasetyo Budianto', '', 'no_photo.jpg', 'L', 0, 3, 'Boyolali, Jawa Tengah', 'Menikah', 2010, 'Strata 1 (S1)', 'wawan@email.com', '08564215478', 'Surakarta', '2011-05-03'),
(55, '789653256', 'staff', 'Rina Kurniawati', '', 'no_photo.jpg', 'P', 0, 5, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum menikah', 2011, 'Diploma 3 (D3)', 'rina@email.com', '08564075750', 'Semarang', '1989-11-02'),
(56, '123659866', 'staff', 'Bambang Wicaksono', '', 'no_photo.jpg', 'L', 0, 5, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum menikah', 2010, 'Diploma 3 (D3)', 'bambang@email.com', '085782084567', 'Boyolali', '1990-06-04'),
(57, '123123654', 'staff', 'Ebit Setianto', '', 'no_photo.jpg', 'L', 0, 4, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Duda', 2010, 'Diploma 3 (D3)', 'ebit@email.com', '085647202278', 'Boyolali', '1990-02-13'),
(58, '213014524', 'staff', 'Melinda Sukmawati', '', 'no_photo.jpg', 'P', 0, 5, 'Tegal Tapanrejo, RT 10/33, Maguwoharjo, Depok, Sleman, Yogyakarta', 'Belum menikah', 2011, 'Diploma 3 (D3)', 'melinda@email.com', '085640326559', 'Jombang', '1989-03-09'),
(59, '124578963', 'guru', 'Rifan Gozali', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'rifan.jpg', 'L', 6, 0, 'Jogja Saja', 'Belum Menikah', 2010, 'Strata 1 (S1)', 'rifan@email.com', '085640650829', 'Salatiga', '1987-11-03'),
(60, '895623741', 'guru', 'Koliq Nurvida', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'kolik.jpg', 'L', 10, 0, 'Cilcacap Indonesia', 'Belum Menikah', 2009, 'Diploma 3 (D3)', 'koliq@email.com', '08122547845', 'Cilacap', '1986-11-27'),
(61, '321465987', 'guru', 'M. Yanuar NR', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'nunu.jpg', 'L', 11, 0, 'Jogja Indonesia', 'Menikah', 2010, 'Strata 1 (S1)', 'yanuar_blink@yahoo.co.id', '087838290010', 'Kebumen', '1989-01-31'),
(62, '986532123', 'guru', 'Sugiyono', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'sugi.jpg', 'L', 11, 0, 'Kebumen Indonesia', 'Belum Menikah', 2010, 'Diploma 3 (D3)', 'sugi@email.com', '087739111170', 'Kebumen', '1989-04-05'),
(63, '789865412', 'guru', 'Widodo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'widodo.jpg', 'L', 8, 0, 'Solo the spirit of Java', 'Belum Menikah', 2010, 'Strata 1 (S1)', 'widodo@email.com', '085725564376', 'Surakarta', '1988-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `sh_info_sekolah`
--

CREATE TABLE IF NOT EXISTS `sh_info_sekolah` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `nama_info` varchar(50) NOT NULL,
  `isi_info` text NOT NULL,
  `tanggal_info` date NOT NULL,
  `posisi_menu` int(1) NOT NULL,
  `status_terbit` int(1) NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sh_info_sekolah`
--

INSERT INTO `sh_info_sekolah` (`id_info`, `nama_info`, `isi_info`, `tanggal_info`, `posisi_menu`, `status_terbit`) VALUES
(1, 'Sambutan Kepala Sekolah', '<p style="text-align: justify;"><img style="float: left; margin-right: 10px; margin-top: 5px; margin-bottom: 5px;" src="/skripsi/images/no_photo.jpg" alt="" width="100" height="150" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-11-30', 2, 1),
(2, 'Sejarah', '<p style="text-align: justify;"><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p style="text-align: justify;"><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-11-09', 0, 1),
(3, 'Visi Misi', '', '2011-10-19', 0, 1),
(4, 'Sarana Prasarana', '', '2011-10-19', 0, 1),
(5, 'Struktur Organisasi', '', '2011-10-19', 0, 1),
(6, 'Prestasi', '', '2011-10-19', 0, 1),
(7, 'Ekstrakulikuler', '', '2011-10-19', 0, 1),
(8, 'OSIS', '', '2011-10-19', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sh_jabatan`
--

CREATE TABLE IF NOT EXISTS `sh_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(30) NOT NULL,
  `deskripsi_jabatan` text NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sh_jabatan`
--

INSERT INTO `sh_jabatan` (`id_jabatan`, `nama_jabatan`, `deskripsi_jabatan`) VALUES
(4, 'Guru Bantu', '-'),
(3, 'Kepala Tata Usaha', 'Lorem ipsum dolor sit amet amet'),
(5, 'Staff Perpus', '-'),
(6, 'Kepala Keamanan', '-'),
(7, 'Admin Keuangan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `sh_kategori`
--

CREATE TABLE IF NOT EXISTS `sh_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi_kategori` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sh_kategori`
--

INSERT INTO `sh_kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`) VALUES
(1, 'Tanpa Kategori', 'Ini adalah contoh kategori pada instalasi sistem untuk pertama kali');

-- --------------------------------------------------------

--
-- Table structure for table `sh_kelas`
--

CREATE TABLE IF NOT EXISTS `sh_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  `deskripsi_kelas` text NOT NULL,
  `nip` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `sh_kelas`
--

INSERT INTO `sh_kelas` (`id_kelas`, `nama_kelas`, `deskripsi_kelas`, `nip`) VALUES
(9, 'X B', '', ''),
(8, 'X A', '', ''),
(10, 'X C', '', ''),
(11, 'X D', '', ''),
(12, 'X E', '', ''),
(13, 'X F', '', ''),
(14, 'XI IPA 1', '', ''),
(15, 'XI IPA 2', '', ''),
(16, 'XI IPS 1', '', ''),
(17, 'XI IPS 2', '', ''),
(18, 'XI BAHASA 1', '', ''),
(19, 'XI BAHASA 2', '', ''),
(20, 'XII IPA 1', '', ''),
(21, 'XII IPA 2', '', ''),
(22, 'XII IPS 1', '', ''),
(23, 'XII IPS 2', '', ''),
(24, 'XII BAHASA 1', '', ''),
(25, 'XII BAHASA 2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sh_komentar`
--

CREATE TABLE IF NOT EXISTS `sh_komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_berita` int(11) NOT NULL,
  `nama_komentar` varchar(25) NOT NULL,
  `email_komentar` varchar(30) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `status_terima` int(1) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `sh_komentar`
--

INSERT INTO `sh_komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `email_komentar`, `isi_komentar`, `tanggal_komentar`, `status_terima`) VALUES
(31, 69, 'Tri Budiarto', 'tribudiarto@yahoo.com', 'masak sih? padahal dulu jaman saya sekolah ga pernah lho bawa buku sama pensil, saya sekolah cuma modal seragam doank...', '2011-11-30', 1),
(32, 70, 'Petrus Dwijoko', 'petruk@perang.com', 'Waduh, dulu disekolah saya ga ada perpustakaan mas', '2011-11-30', 1),
(33, 71, 'Suwarno', 'nanoe@yahoo.com', 'Mengerjakan tugas rumah memang sangat menyenangkan, apalagi tentang matematika', '2011-11-30', 1),
(34, 72, 'Tedy Ruswanta', 'tedy@yahoo.com', 'Iya, apalagi jaman sekarang, mereka malah lebih senang online social network lewat HP', '2011-11-30', 1),
(30, 68, 'Ari Rusmanto', 'ariecupu@gmail.com', 'Saya tidak pernah malas untuk belajar mas, saya selalu penasaran dengan sesuatu yang menambah pengetahuan saya.', '2011-11-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sh_mapel`
--

CREATE TABLE IF NOT EXISTS `sh_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(30) NOT NULL,
  `deskripsi_mapel` text NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sh_mapel`
--

INSERT INTO `sh_mapel` (`id_mapel`, `nama_mapel`, `deskripsi_mapel`) VALUES
(1, 'Bahasa Indonesia', 'belom ada deskripsi'),
(2, 'Matematika', ''),
(5, 'Penjaskes', ''),
(6, 'Pkn Sejarah', ''),
(7, 'Bahasa Inggris', ''),
(8, 'TIK', ''),
(9, 'Biologi', ''),
(10, 'Fisika', ''),
(11, 'Pendidikan Agama Islam', '');

-- --------------------------------------------------------

--
-- Table structure for table `sh_materi`
--

CREATE TABLE IF NOT EXISTS `sh_materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `file_materi` varchar(50) NOT NULL,
  `judul_materi` text NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `download` int(11) NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `sh_materi`
--

INSERT INTO `sh_materi` (`id_materi`, `file_materi`, `judul_materi`, `deskripsi_materi`, `id_mapel`, `nip`, `tanggal_upload`, `download`) VALUES
(38, 'ari.rar', 'Testing Materi Saya', 'hahahaha', 7, '986532741', '2011-11-29', 4),
(20, 'pemanasan.rar', 'Pemanasan yang benar', 'Tata cara pemanasan yang benar sebelum melakukan olah raga', 5, '741258963', '2011-11-29', 0),
(15, 'polakalimat.rar', 'Pola Kalimat', 'Pengenalan pola kamilamt dengan aktif dan pasif', 1, '369258741', '2011-11-29', 0),
(16, 'English1.rar', 'Introduce Your Self', 'How to introduce yourself to a stranger', 7, '123654789', '2011-11-29', 0),
(17, 'Alar Reproduksi.rar', 'Alat Reproduksi', 'Pengenalan alat reproduksi pada manusia beserta fungsi-fungsinya', 9, '321456987', '2011-11-29', 4),
(18, 'albert.rar', 'E=MC Kuadrat', 'Siapakah sebenarnya Albert Einsten? dan apa maksud dari e=mc kuadrat', 10, '147852369', '2011-11-29', 0),
(21, 'soekarno.rar', 'Soekarno', 'Mengenal sosok bung karno', 6, '963258741', '2011-11-29', 0),
(22, 'dos.rar', 'Ms DOS', 'Apakah yang dimaksud dengan DOS, dan fungsi DOS', 8, '987654321', '2011-11-29', 0),
(23, 'paragraf.rar', 'Paragraf', 'Menggunakan paragraf pada setiap artikel', 1, '965874123', '2011-11-29', 0),
(24, 'speaking.rar', 'Public speaking', 'Be an orator is easy', 7, '147852963', '2011-11-29', 0),
(25, 'kekebalantubuh.rar', 'Sistem Kekebalan Tubuh Manusia', 'mengenal sistem kekebalan tubh pada manusia', 9, '123695847', '2011-11-29', 1),
(26, 'masa jenis.rar', 'Masa Jenis', 'cara menghitung masa jenis suatu benda', 10, '748596321', '2011-11-29', 2),
(27, 'volume.rar', 'Volume Benda', 'menghitung volume benda', 2, '789632541', '2011-11-29', 0),
(28, 'sea games.rar', 'Jenis Olah Raga pada SEA games', 'jenis-jenis olah raga pada sea games 2011', 5, '321456789', '2011-11-29', 0),
(29, 'proklamator.rar', 'Proklamator Indonesia', 'mengenal bapak proklamator Indonesia', 6, '125478963', '2011-11-29', 0),
(30, 'office.rar', 'Ms Office', 'Pengenalan Office dan fungsi setiap aplikasi', 8, '321654987', '2011-11-29', 0),
(31, 'ulangan INDO.rar', 'Hasil Ulangan kelas XI IPA', '', 1, '986532147', '2011-11-29', 0),
(32, 'prepare.rar', 'Prepare for Exam', '', 7, '875421963', '2011-11-29', 1),
(33, 'cerita.rar', 'Jenis Cerita', 'membedakan alur setiap erita beserta jenisnya', 1, '123456789', '2011-11-29', 0),
(37, 'ari.png', 'Hasil Ulangan Harian 2', 'Kelas XI IPA 1 - XI IPA 3', 1, '123456789', '2011-11-29', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sh_pengaturan`
--

CREATE TABLE IF NOT EXISTS `sh_pengaturan` (
  `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengaturan` varchar(50) NOT NULL,
  `isi_pengaturan` text NOT NULL,
  `isi_pengaturan2` text NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sh_pengaturan`
--

INSERT INTO `sh_pengaturan` (`id_pengaturan`, `nama_pengaturan`, `isi_pengaturan`, `isi_pengaturan2`) VALUES
(1, 'url_website', 'localhost/skripsi', ''),
(2, 'tambah_admin', '1', ''),
(3, 'jumlah_data', '10', ''),
(4, 'data_siswa', '0', ''),
(5, 'data_alumni', '0', ''),
(6, 'data_guru', '0', ''),
(7, 'form_alumni', '1', ''),
(8, 'nama_sekolah', 'SMA SCHOOLHOS PERTAMA', ''),
(9, 'telepon', '0274-9631740', ''),
(10, 'email', 'mas@arirusmanto.com', ''),
(11, 'kepsek', 'Ari rusmanto', ''),
(12, 'alamat', 'Maguwoharjo, Depok, Sleman, Yogyakarta\r\n', ''),
(13, 'logo', 'home.png', ''),
(14, 'gmap', '<iframe width="588" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?vpsrc=1&ctz=-420&ie=UTF8&msa=0&msid=200644349068259319657.0004af2c2d4f4a1a7dc2a&t=h&ll=-7.70814,110.354297&spn=0.101641,0.155654&output=embed"></iframe><br /><small>View <a href="http://maps.google.com/maps/ms?vpsrc=1&ctz=-420&ie=UTF8&msa=0&msid=200644349068259319657.0004af2c2d4f4a1a7dc2a&t=h&ll=-7.70814,110.354297&spn=0.101641,0.155654&source=embed" style="color:#0000FF;text-align:left">Kontrakan Tresno Kambangan</a> in a larger map</small>', ''),
(16, 'tampil_pesan_tamu', '1', ''),
(15, '0', '<p style="text-align: center;"><span style="color: #800000;"><strong>Maaf, belum waktunya pendaftaran siswa baru</strong></span></p>', '<p><span style="font-size: large;">-<br /></span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `sh_pengumuman`
--

CREATE TABLE IF NOT EXISTS `sh_pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul_pengumuman` varchar(50) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `s_username` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sh_pengumuman`
--

INSERT INTO `sh_pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `tanggal_pengumuman`, `s_username`) VALUES
(10, 'Pengumuman website baru', '<p>Bahwasanya akan diresmikan website sekolah dengan platform <a href="http://schoolhos.arirusmanto.com/" target="_blank"><strong>SCHOOLHOS CMS</strong></a>, seluruh siswa dan guru akan mendapatkan password untuk melakukan login pada sistem e-learning.</p>\r\n<p>Pengambilan password dilayani pada tanggal <strong><em>16 Desember 2011</em></strong> di <strong><span style="text-decoration: underline;">Ruang IT</span></strong>, dan pengambilan password siswa dapat diwakilkan oleh ketua kelas.</p>', '2011-11-30', 'masarie');

-- --------------------------------------------------------

--
-- Table structure for table `sh_psb`
--

CREATE TABLE IF NOT EXISTS `sh_psb` (
  `id_psb` int(11) NOT NULL AUTO_INCREMENT,
  `nama_psb` varchar(30) NOT NULL,
  `nem` varchar(5) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `sekolah_asal` text NOT NULL,
  `no_sttb` varchar(15) NOT NULL,
  `tanggal_sttb` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `bb` int(3) NOT NULL,
  `tb` int(3) NOT NULL,
  `status_psb` int(1) NOT NULL,
  `tanggal_psb` date NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `pekerjaan_ortu` varchar(50) NOT NULL,
  `alamat_psb` text NOT NULL,
  `polling_psb` varchar(20) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id_psb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sh_psb`
--


-- --------------------------------------------------------

--
-- Table structure for table `sh_sidebar`
--

CREATE TABLE IF NOT EXISTS `sh_sidebar` (
  `id_sidebar` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL,
  PRIMARY KEY (`id_sidebar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sh_sidebar`
--

INSERT INTO `sh_sidebar` (`id_sidebar`, `jenis`, `status`, `nama`, `isi1`, `isi2`) VALUES
(6, 'ym', 1, 'Ari Rusmanto', 'ariecupu@ymail.com', ''),
(7, 'ym', 1, 'Mas Arie', 'arirusmanto@ymail.com', ''),
(8, 'polling', 1, 'Apa yang sedang anda pikirkan?', '', 'pertanyaan'),
(9, 'polling', 1, 'Tidak memikirkan apa-apa', '103', 'jawaban'),
(10, 'polling', 1, 'Kamu', '3', 'jawaban'),
(11, 'polling', 1, 'Sekolah', '3', 'jawaban'),
(12, 'polling', 1, 'Masa Depan', '10', 'jawaban'),
(16, 'link', 1, 'Ari Rusmanto', 'www.arirusmanto.com', ''),
(17, 'link', 1, 'Schoolhos', 'www.schoolhos.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `sh_siswa`
--

CREATE TABLE IF NOT EXISTS `sh_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tahun_registrasi` year(4) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `sekolah_asal` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status_siswa` int(1) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `pekerjaan_ortu` varchar(50) NOT NULL,
  `pekerjaan_sekarang` text NOT NULL,
  `info_tambahan` text NOT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sh_siswa`
--

INSERT INTO `sh_siswa` (`id_siswa`, `nis`, `nama_siswa`, `password`, `jenkel`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tahun_registrasi`, `tahun_lulus`, `sekolah_asal`, `email`, `telepon`, `status_siswa`, `id_kelas`, `nama_ortu`, `pekerjaan_ortu`, `pekerjaan_sekarang`, `info_tambahan`) VALUES
(16, 1234, 'David Beckam', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Jogja', '1997-11-05', 'Yogyakarta Indonesia', 2011, 0000, 'SMP N 1 Boyolali', 'david@beckham.com', '0274564584', 1, 9, 'LA Galaxy', 'Pelatih Sepak Bola', '', ''),
(17, 4321, 'Katty Perry', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Bantul', '1996-02-06', 'Bantul, Yogyakarta, Indonesia', 2011, 0000, 'SMP N 1 GK', '', '', 1, 8, 'Perry', 'Penyanyi', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sh_statistik`
--

CREATE TABLE IF NOT EXISTS `sh_statistik` (
  `ip_addres` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `mengunjungi` int(10) NOT NULL,
  `online` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sh_statistik`
--

INSERT INTO `sh_statistik` (`ip_addres`, `tanggal`, `mengunjungi`, `online`) VALUES
('::1', '2011-11-22', 382, 1321979947),
('::1', '2011-11-23', 559, 1322051970),
('::1', '2011-11-20', 3, 1321771549),
('::1', '2011-11-24', 14, 1322125739),
('::1', '2011-11-26', 2, 1322249648),
('::1', '2011-11-28', 6, 1322488015),
('::1', '2011-11-29', 33, 1322583663),
('::1', '2011-11-30', 63, 1322593005);

-- --------------------------------------------------------

--
-- Table structure for table `sh_tema`
--

CREATE TABLE IF NOT EXISTS `sh_tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tema` varchar(30) NOT NULL,
  `pembuat` varchar(30) NOT NULL,
  `url_pembuat` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_tema`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sh_tema`
--

INSERT INTO `sh_tema` (`id_tema`, `nama_tema`, `pembuat`, `url_pembuat`, `deskripsi`, `tahun`, `status`) VALUES
(1, 'tema_sekolah_biru', 'Ari Rusmanto', 'http://arirusmanto.com', 'biru, bersih, cerah', 2011, 1),
(2, 'tema_sekolah_bersih', 'Ari Rusmanto', 'http://arirusmanto.com', 'putih, elegen, bersih', 2011, 0),
(3, 'tema_3_kolom', 'Ari Rusmanto', 'http://arirusmanto.com', '3 kolom, lebar, standart', 2011, 0),
(4, 'tema_standart', 'Ari Rusmanto', 'http://arirusmanto.com', 'simpel, no-jquery', 2011, 0),
(5, 'edisi_spesial', 'Ari Rusmanto', 'http://arirusmanto.com', 'cool, jquery, spesial', 2011, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sh_users`
--

CREATE TABLE IF NOT EXISTS `sh_users` (
  `id_users` varchar(50) NOT NULL,
  `namausers` varchar(30) NOT NULL,
  `sandiusers` varchar(50) NOT NULL,
  `nama_lengkap_users` varchar(30) NOT NULL,
  `level_users` varchar(30) NOT NULL,
  `s_username` varchar(30) NOT NULL,
  `login_terakhir` datetime NOT NULL,
  `email_users` varchar(50) NOT NULL,
  PRIMARY KEY (`s_username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sh_users`
--

INSERT INTO `sh_users` (`id_users`, `namausers`, `sandiusers`, `nama_lengkap_users`, `level_users`, `s_username`, `login_terakhir`, `email_users`) VALUES
('2p2u49e4pc1o6855hauviif0b5', 'admin', '87cdd38beeeb3a16337bef333e1c8d63', 'Ari Rusmanto', 'Super Admin', 'masarie', '2011-11-29 23:53:50', 'ariecupu@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

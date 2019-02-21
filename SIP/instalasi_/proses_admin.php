<?php
include "../konfigurasi/koneksi.php";

mysql_query ("CREATE TABLE IF NOT EXISTS sh_agenda (
  id_agenda int(11) NOT NULL AUTO_INCREMENT,
  judul_agenda varchar(50) NOT NULL,
  tanggal_agenda date NOT NULL,
  tempat_agenda varchar(50) NOT NULL,
  keterangan_agenda text NOT NULL,
  s_username varchar(30) NOT NULL,
  PRIMARY KEY (id_agenda)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_album (
  id_album int(11) NOT NULL AUTO_INCREMENT,
  nama_album varchar(30) NOT NULL,
  tanggal_album date NOT NULL,
  deskripsi_album text NOT NULL,
  foto_album varchar(50) NOT NULL,
  PRIMARY KEY (id_album)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_berita (
  id_berita int(11) NOT NULL AUTO_INCREMENT,
  judul_berita varchar(100) NOT NULL,
  isi_berita text NOT NULL,
  tanggal_posting date NOT NULL,
  gambar_kecil varchar(50) NOT NULL,
  status_terbit int(1) NOT NULL,
  status_komentar int(1) NOT NULL,
  status_headline int(1) NOT NULL,
  s_username varchar(30) NOT NULL,
  id_kategori int(11) NOT NULL,
  PRIMARY KEY (id_berita)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_buku_tamu (
  id_bukutamu int(11) NOT NULL AUTO_INCREMENT,
  nama_bukutamu varchar(30) NOT NULL,
  subjek text NOT NULL,
  isi_pesan text NOT NULL,
  email varchar(30) NOT NULL,
  tanggal_kirim date NOT NULL,
  status int(1) NOT NULL,
  PRIMARY KEY (id_bukutamu)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_galeri (
  id_galeri int(11) NOT NULL AUTO_INCREMENT,
  nama_galeri varchar(100) NOT NULL,
  id_album int(11) NOT NULL,
  tanggal_galeri date NOT NULL,
  PRIMARY KEY (id_galeri)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_guru_staff (
  id_gurustaff int(11) NOT NULL AUTO_INCREMENT,
  nip varchar(30) NOT NULL,
  posisi varchar(5) NOT NULL,
  nama_gurustaff varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  foto varchar(50) NOT NULL,
  jenkel varchar(1) NOT NULL,
  id_mapel int(11) NOT NULL,
  id_jabatan int(11) NOT NULL,
  alamat text NOT NULL,
  status_kawin varchar(20) NOT NULL,
  tahun_masuk year(4) NOT NULL,
  pendidikan_terakhir varchar(20) NOT NULL,
  email varchar(30) NOT NULL,
  telepon varchar(15) NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  PRIMARY KEY (id_gurustaff)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_info_sekolah (
  id_info int(11) NOT NULL AUTO_INCREMENT,
  nama_info varchar(50) NOT NULL,
  isi_info text NOT NULL,
  tanggal_info date NOT NULL,
  posisi_menu int(1) NOT NULL,
  status_terbit int(1) NOT NULL,
  PRIMARY KEY (id_info)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_jabatan (
  id_jabatan int(11) NOT NULL AUTO_INCREMENT,
  nama_jabatan varchar(30) NOT NULL,
  deskripsi_jabatan text NOT NULL,
  PRIMARY KEY (id_jabatan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_kategori (
  id_kategori int(11) NOT NULL AUTO_INCREMENT,
  nama_kategori varchar(50) NOT NULL,
  deskripsi_kategori text NOT NULL,
  PRIMARY KEY (id_kategori)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_kelas (
  id_kelas int(11) NOT NULL AUTO_INCREMENT,
  nama_kelas varchar(30) NOT NULL,
  deskripsi_kelas text NOT NULL,
  PRIMARY KEY (id_kelas)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_komentar (
  id_komentar int(11) NOT NULL AUTO_INCREMENT,
  id_berita int(11) NOT NULL,
  nama_komentar varchar(25) NOT NULL,
  email_komentar varchar(30) NOT NULL,
  isi_komentar text NOT NULL,
  tanggal_komentar date NOT NULL,
  status_terima int(1) NOT NULL,
  PRIMARY KEY (id_komentar)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_mapel (
  id_mapel int(11) NOT NULL AUTO_INCREMENT,
  nama_mapel varchar(30) NOT NULL,
  deskripsi_mapel text NOT NULL,
  PRIMARY KEY (id_mapel)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_materi (
  id_materi int(11) NOT NULL AUTO_INCREMENT,
  file_materi varchar(50) NOT NULL,
  judul_materi text NOT NULL,
  deskripsi_materi text NOT NULL,
  id_mapel int(11) NOT NULL,
  nip varchar(30) NOT NULL,
  tanggal_upload date NOT NULL,
  download int(11) NOT NULL,
  PRIMARY KEY (id_materi)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_pengaturan (
  id_pengaturan int(11) NOT NULL AUTO_INCREMENT,
  nama_pengaturan varchar(50) NOT NULL,
  isi_pengaturan text NOT NULL,
  isi_pengaturan2 text NOT NULL,
  PRIMARY KEY (id_pengaturan)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_pengumuman (
  id_pengumuman int(11) NOT NULL AUTO_INCREMENT,
  judul_pengumuman varchar(50) NOT NULL,
  isi_pengumuman text NOT NULL,
  tanggal_pengumuman date NOT NULL,
  s_username varchar(30) NOT NULL,
  PRIMARY KEY (id_pengumuman)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_psb (
  id_psb int(11) NOT NULL AUTO_INCREMENT,
  nama_psb varchar(30) NOT NULL,
  nem varchar(5) NOT NULL,
  jenkel varchar(1) NOT NULL,
  sekolah_asal text NOT NULL,
  no_sttb varchar(15) NOT NULL,
  tanggal_sttb date NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  bb int(3) NOT NULL,
  tb int(3) NOT NULL,
  status_psb int(1) NOT NULL,
  tanggal_psb date NOT NULL,
  nama_ortu varchar(30) NOT NULL,
  pekerjaan_ortu varchar(50) NOT NULL,
  alamat_psb text NOT NULL,
  polling_psb varchar(20) NOT NULL,
  telepon varchar(15) NOT NULL,
  email varchar(30) NOT NULL,
  PRIMARY KEY (id_psb)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_sidebar (
  id_sidebar int(11) NOT NULL AUTO_INCREMENT,
  jenis varchar(20) NOT NULL,
  status int(1) NOT NULL,
  nama varchar(50) NOT NULL,
  isi1 text NOT NULL,
  isi2 text NOT NULL,
  PRIMARY KEY (id_sidebar)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_siswa (
  id_siswa int(11) NOT NULL AUTO_INCREMENT,
  nis int(10) NOT NULL,
  nama_siswa varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  jenkel varchar(1) NOT NULL,
  tempat_lahir varchar(30) NOT NULL,
  tanggal_lahir date NOT NULL,
  alamat text NOT NULL,
  tahun_registrasi year(4) NOT NULL,
  tahun_lulus year(4) NOT NULL,
  sekolah_asal text NOT NULL,
  email varchar(30) NOT NULL,
  telepon varchar(15) NOT NULL,
  status_siswa int(1) NOT NULL,
  status_oke int(1) NOT NULL,
  id_kelas int(11) NOT NULL,
  nama_ortu varchar(30) NOT NULL,
  pekerjaan_ortu varchar(50) NOT NULL,
  pekerjaan_sekarang text NOT NULL,
  info_tambahan text NOT NULL,
  PRIMARY KEY (id_siswa),
  KEY id_siswa (id_siswa)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_statistik (
  ip_addres varchar(20) NOT NULL,
  tanggal date NOT NULL,
  mengunjungi int(10) NOT NULL,
  online int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_tema (
  id_tema int(11) NOT NULL AUTO_INCREMENT,
  nama_tema varchar(30) NOT NULL,
  pembuat varchar(30) NOT NULL,
  url_pembuat varchar(30) NOT NULL,
  deskripsi text NOT NULL,
  tahun year(4) NOT NULL,
  status int(1) NOT NULL,
  PRIMARY KEY (id_tema)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;");


mysql_query ("CREATE TABLE IF NOT EXISTS sh_users (
  id_users varchar(50) NOT NULL,
  namausers varchar(30) NOT NULL,
  sandiusers varchar(50) NOT NULL,
  nama_lengkap_users varchar(30) NOT NULL,
  level_users varchar(30) NOT NULL,
  s_username varchar(30) NOT NULL,
  login_terakhir datetime NOT NULL,
  email_users varchar(50) NOT NULL,
  PRIMARY KEY (s_username)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");


//Bagian untuk memasukkan data kedalam tabel database

//Memasukkan Data Admin
$sandi=MD5($_POST[password]);
$tanggal=date("Ymd");
$waktu=date("Y-m-d H:i:s");
mysql_query ("INSERT INTO sh_users (id_users, namausers, sandiusers, nama_lengkap_users, level_users, s_username, login_terakhir, email_users) VALUES
('$sandi',
 '$_POST[username]',
 '$sandi',
 '$_POST[nama]',
 'Super Admin',
 '$_POST[username]$tanggal',
 '$waktu',
 '$_POST[email]'
)
");

//Memasukkan data agenda
mysql_query ("INSERT INTO sh_agenda (id_agenda, judul_agenda, tanggal_agenda, tempat_agenda, keterangan_agenda, s_username) VALUES
(13, 'Uji Coba UN Kabupaten 1', '2012-02-01', 'SMK Negeri 1 Boyolali', 'Uji Coba UN Kabupaten 1 wajib diikuti oleh seluruh siswa kelas 3', '$_POST[username]$tanggal'),
(14, 'UPK Sekolah', '2012-02-07', 'SMK Negeri 1 Boyolali', 'UPK Sekolah dilaksanakan mulai tanggal 7 sampai dengan 11 Februari 2012', '$_POST[username]$tanggal'),
(15, 'UTK Sekolah', '2012-02-20', 'SMK Negeri 1 Boyolali', '-', '$_POST[username]$tanggal'),
(16, 'Uji Coba UN Sekolah 1', '2012-02-21', 'SMK Negeri 1 Boyolali', 'Uji Coba UN Sekolah 1 dilaksanakan pada tanggal 21 Februari dan 22 Februari 2012', '$_POST[username]$tanggal'),
(17, 'UPK Nasional', '2012-03-05', 'SMK Negeri 1 Boyolali', 'UPK Nasional dilaksanakan pada tanggal 5 Maret samapi 9 Maret 2012 dan wajib diikuti oleh seluruh sioswa kelas 3', '$_POST[username]$tanggal'),
(18, 'Ujian Praktik Sekolah tertulis ( BSI dan KWU ) ', '2012-03-10', 'SMK Negeri 1 Boyolali', 'Ujian Praktik Sekolah tertulis ( BSI dan KWU )', '$_POST[username]$tanggal'),
(19, 'UPS Normada', '2012-03-12', 'SMK Negeri 1 Boyolali', '-', '$_POST[username]$tanggal'),
(20, 'Ujian Teori Kejuruan ( UTK ) Utama', '2012-03-22', 'SMK Negeri 1 Boyolali', '-', '$_POST[username]$tanggal'),
(21, 'Ujian Sekolah Utama', '2012-03-24', 'SMK Negeri 1 Boyolali', 'Ujian Sekolah Utama dilaksanakan mulai tanggal 24 Maret sampai dengan 31 Maret 2012', '$_POST[username]$tanggal'),
(22, 'Uji Coba UN Kabupaten 2', '2012-04-02', 'SMK Negeri 1 Boyolali', 'Uji Coba UN Kabupaten 2 dilaksanakan mulai tanggal 2 April 2012 sampai dengan tanggal 3 April 2012', 'hanna20120213');");




//Memasukkan data berita
mysql_query ("INSERT INTO sh_berita (id_berita, judul_berita, isi_berita, tanggal_posting, gambar_kecil, status_terbit, status_komentar, status_headline, s_username, id_kategori) VALUES
(68, 'Jangan Malas Untuk Belajar', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'mumet.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(69, 'Buku dan pensil adalah peralatan sekolah', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'potlot.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(70, 'Belajar Bersama di Perpustakaan', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'belajar.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(71, 'Mengerjakan Tugas Rumah', '<p><strong>Lorem Ips</strong><strong>um</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'menulis.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1),
(72, 'Membaca buku disaat jam istirahat sangat jarang dilakukan siswa', '<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> adalah contoh teks atau dummy dalam  industri  percetakan dan penataan huruf atau typesetting. Lorem Ipsum  telah menjadi standar contoh teks sejak tahun 1500an, saat seorang  tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan  mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya  bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf  elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun  1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan  kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak  Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem  Ipsum.</p>', '2011-11-30', 'sinau.jpg', 1, 1, 1, '$_POST[username]$tanggal', 1);
");



//Memasukkan data guru dan staff
mysql_query ("
INSERT INTO sh_guru_staff (id_gurustaff, nip, posisi, nama_gurustaff, password, foto, jenkel, id_mapel, id_jabatan, alamat, status_kawin, tahun_masuk, pendidikan_terakhir, email, telepon, tempat_lahir, tanggal_lahir) VALUES
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
");


//Memasukkan data info sekolah
mysql_query ("INSERT INTO sh_info_sekolah (id_info, nama_info, isi_info, tanggal_info, posisi_menu, status_terbit) VALUES
(1, 'Sambutan Kepala Sekolah', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-11-30', 2, 1),
(2, 'Sejarah', '<p><strong>Lorem ipsum dolor sit amet, c</strong>onsectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat    volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.    Duis autem vel eumLorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam   nonummy nibh euismod tincidunt ut laoreet dolore magna  aliquam erat   volutpat. Ut wisi enim ad minim veniam, quis nostrud  exerci tation   ullamcorper suscipit lobortis nisl ut aliquip ex ea  commodo consequat.   Duis autem vel eumLorem ipsum dolor sit amet,  consectetuer adipiscing elit, sed diam   nonummy nibh euismod tincidunt  ut laoreet dolore magna aliquam erat   volutpat. Ut wisi enim ad minim  veniam, quis nostrud exerci tation   ullamcorper suscipit lobortis nisl  ut aliquip ex ea commodo consequat.   Duis autem vel eum</p>', '2011-11-30', 0, 1),
(3, 'Visi Misi', '', '2011-10-19', 0, 1),
(4, 'Sarana Prasarana', '', '2011-10-19', 0, 1),
(5, 'Struktur Organisasi', '', '2011-10-19', 0, 1),
(6, 'Prestasi', '', '2011-10-19', 0, 1),
(7, 'Ekstrakulikuler', '', '2011-10-19', 0, 1),
(8, 'OSIS', '', '2011-10-19', 0, 1);");


//Memasukkan data jabatan
mysql_query ("INSERT INTO sh_jabatan (id_jabatan, nama_jabatan, deskripsi_jabatan) VALUES
(4, 'Guru Bantu', '-'),
(1, 'Belum Ada', '-'),
(3, 'Kepala Tata Usaha', 'Lorem ipsum dolor sit amet amet'),
(5, 'Staff Perpus', '-'),
(6, 'Kepala Keamanan', '-'),
(7, 'Admin Keuangan', '-');");

//Memasukkan data kategori
mysql_query ("INSERT INTO sh_kategori (id_kategori, nama_kategori, deskripsi_kategori) VALUES
(1, 'Tanpa Kategori', 'Ini adalah contoh kategori pada instalasi sistem untuk pertama kali'),
(11, 'Pembangunan Sekolah', ''),
(12, 'Informasi Sekolah', ''),
(13, 'Agenda Sekolah', ''),
(14, 'Kegiatan Siswa', '');");

//Memasukkan data kelas
mysql_query ("INSERT INTO sh_kelas (id_kelas, nama_kelas, deskripsi_kelas) VALUES
(1, 'XI TKJ 1', ''),
(28, 'XI AKUNTANSI 1', ''),
(30, 'XI ADM.PERK 1', ''),
(31, 'XI ADM.PERK 2', ''),
(32, 'XI PENJUALAN 1', ''),
(33, 'XI PENJUALAN 2', ''),
(34, 'XI TKJ 2', '');");

//MEmasukkan data komentar
mysql_query ("
INSERT INTO sh_komentar (id_komentar, id_berita, nama_komentar, email_komentar, isi_komentar, tanggal_komentar, status_terima) VALUES
(31, 69, 'Tri Budiarto', 'tribudiarto@yahoo.com', 'masak sih? padahal dulu jaman saya sekolah ga pernah lho bawa buku sama pensil, saya sekolah cuma modal seragam doank...', '2011-11-30', 1),
(32, 70, 'Petrus Dwijoko', 'petruk@perang.com', 'Waduh, dulu disekolah saya ga ada perpustakaan mas', '2011-11-30', 1),
(33, 71, 'Suwarno', 'nanoe@yahoo.com', 'Mengerjakan tugas rumah memang sangat menyenangkan, apalagi tentang matematika', '2011-11-30', 1),
(34, 72, 'Tedy Ruswanta', 'tedy@yahoo.com', 'Iya, apalagi jaman sekarang, mereka malah lebih senang online social network lewat HP', '2011-11-30', 1),
(30, 68, 'Ari Rusmanto', 'ariecupu@gmail.com', 'Saya tidak pernah malas untuk belajar mas, saya selalu penasaran dengan sesuatu yang menambah pengetahuan saya.', '2011-11-30', 1);
");


//Memasukkan data mapel
mysql_query ("INSERT INTO sh_mapel (id_mapel, nama_mapel, deskripsi_mapel) VALUES
(1, 'Bahasa Indonesia', 'belom ada deskripsi'),
(2, 'Matematika', ''),
(5, 'Penjaskes', ''),
(6, 'Pkn Sejarah', ''),
(7, 'Bahasa Inggris', ''),
(8, 'TIK', ''),
(9, 'Biologi', ''),
(10, 'Fisika', ''),
(11, 'Pendidikan Agama Islam', '');");

//Memasukkan data materi
mysql_query ("INSERT INTO sh_materi (id_materi, file_materi, judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload, download) VALUES
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
(37, 'ari.png', 'Hasil Ulangan Harian 2', 'Kelas XI IPA 1 - XI IPA 3', 1, '123456789', '2011-11-29', 12);");

//Memasukkan data pengaturan
mysql_query ("INSERT INTO sh_pengaturan (id_pengaturan, nama_pengaturan, isi_pengaturan, isi_pengaturan2) VALUES
(1, 'url_website', 'localhost/skripsi', ''),
(2, 'tambah_admin', '1', ''),
(3, 'jumlah_data', '10', ''),
(4, 'data_siswa', '0', ''),
(5, 'data_alumni', '0', ''),
(6, 'data_guru', '0', ''),
(7, 'form_alumni', '1', ''),
(8, 'nama_sekolah', 'SMA SCHOOLHOS PERTAMA', ''),
(9, 'telepon', '0274-123456', ''),
(10, 'email', 'hello@arirusmanto.com', ''),
(11, 'kepsek', 'Ari rusmanto', ''),
(12, 'alamat', 'Minomartani, Yogyakarta\r\n', ''),
(13, 'logo', 'home.png', ''),
(14, 'gmap', '', ''),
(16, 'tampil_pesan_tamu', '1', ''),
(15, '1', '<p><strong>Maaf, belum waktunya pendaftaran siswa baru</strong></span></p>', '<p><span style=font-size: large;>-<br /></p>');
");

//Memasukkan data pengumuman
mysql_query ("INSERT INTO sh_pengumuman (id_pengumuman, judul_pengumuman, isi_pengumuman, tanggal_pengumuman, s_username) VALUES
(10, 'Pengumuman website baru', '<p>Bahwasanya akan diresmikan website sekolah dengan platform <a href=http://schoolhos.arirusmanto.com/ target=_blank><strong>SCHOOLHOS CMS</strong></a>, seluruh siswa dan guru akan mendapatkan password untuk melakukan login pada sistem e-learning.</p>\r\n<p>Pengambilan password dilayani pada tanggal <strong><em>16 Desember 2011</em></strong> di <strong><span style=text-decoration: underline;>Ruang IT</span></strong>, dan pengambilan password siswa dapat diwakilkan oleh ketua kelas.</p>', '2011-11-30', '$_POST[username]$tanggal');
");

//Memasukkan data sidebar
mysql_query ("INSERT INTO sh_sidebar (id_sidebar, jenis, status, nama, isi1, isi2) VALUES
(6, 'ym', 1, 'Ari Rusmanto', 'ariecupu@ymail.com', ''),
(7, 'ym', 1, 'Mas Arie', 'arirusmanto@ymail.com', ''),
(8, 'polling', 1, 'Apa yang sedang anda pikirkan?', '', 'pertanyaan'),
(9, 'polling', 1, 'Tidak memikirkan apa-apa', '103', 'jawaban'),
(10, 'polling', 1, 'Kamu', '3', 'jawaban'),
(11, 'polling', 1, 'Sekolah', '3', 'jawaban'),
(12, 'polling', 1, 'Masa Depan', '10', 'jawaban'),
(16, 'link', 1, 'Ari Rusmanto', 'www.arirusmanto.com', ''),
(17, 'link', 1, 'Schoolhos', 'www.schoolhos.com', '');");

//Memasukkan data siswa
mysql_query ("INSERT INTO sh_siswa (id_siswa, nis, nama_siswa, password, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, tahun_lulus, sekolah_asal, email, telepon, status_siswa, status_oke, id_kelas, nama_ortu, pekerjaan_ortu, pekerjaan_sekarang, info_tambahan) VALUES
(22, 1237, 'Nur Anisa Rahmawati', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-06-13', '', 2011, 0000, 'SMP N 1 WONOSARI', '', '', 1, 0, 1, 'Tarjo', '', '', ''),
(21, 1236, 'Anggar Budi Astuti', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-01-11', '', 2011, 0000, 'SMP N 2 WONOSARI', '', '', 1, 0, 1, 'Budianto', '', '', ''),
(19, 1234, 'Tedy Ruswanta', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Jogja', '1996-11-16', 'Mojosongo,Boyolali', 2011, 0000, 'SMP N 2 WONOSARI', 'tedy@yahoo.com', '085741111111', 1, 0, 1, 'Tukino', '', '', ''),
(20, 1235, 'Tri Kurniyawati', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-02-20', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 1, 'Rakimin', '', '', ''),
(23, 1238, 'Budianto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-05-03', '', 2011, 0000, 'SMP N 1 WONOSARI', '', '', 1, 0, 1, 'Paino', '', '', ''),
(24, 1239, 'Ika Kartiwi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-02-06', '', 2011, 0000, 'Mts N 1 WONOSARI', '', '', 1, 0, 1, 'Asmuni', '', '', ''),
(25, 1241, 'Nicky Ilana', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-08-01', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 1, 'Jumali', '', '', ''),
(26, 1242, 'Anang Maruf Perdana', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-09-06', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 1, 'Paino', '', '', ''),
(27, 1243, 'Nofianto Andri Wibowo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-11-13', '', 2011, 0000, 'Mts N 1 WONOSARI', '', '', 1, 0, 1, 'Sarindi', '', '', ''),
(28, 1244, 'Eko Widianto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-04-03', '', 2011, 0000, 'Mts N 1 WONOSARI', '', '', 1, 0, 1, 'Widianto', '', '', ''),
(29, 1245, 'Tyas Dwi Pratistaningsih', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-10-03', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 28, 'Suwarno', '', '', ''),
(30, 1246, 'Anes Ardianto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-03-07', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 34, 'Paijan', '', '', ''),
(31, 1247, 'Mawar Rahmawati', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1995-06-08', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 34, 'Sumpeno', '', '', ''),
(32, 1248, 'Anifah Nur Hidayanti', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-08-15', '', 2011, 0000, 'Mts N 1 WONOSARI', '', '', 1, 0, 34, 'Sumanto', '', '', ''),
(33, 1249, 'Oscar Anindita', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-06-13', '', 2011, 0000, 'SMP N 3 WONOSARI', '', '', 1, 0, 34, 'Darkun', '', '', ''),
(34, 1250, 'Melani Putri', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-04-16', '', 2011, 0000, 'SMP N 2 WONOSARI', '', '', 1, 0, 34, 'Giyarto', '', '', ''),
(35, 1251, 'Dwi Rohmawati', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-07-13', '', 2011, 0000, 'Mts N 1 WONOSARI', '', '', 1, 0, 34, 'Sularso', '', '', ''),
(36, 1252, 'David Ridwan Hanafi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-05-14', '', 2011, 0000, 'SMP N 1 WONOSARI', '', '', 1, 0, 34, 'Supardi', '', '', ''),
(37, 1253, 'Siti Hindarwanti', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-07-01', '', 2011, 0000, 'SMP N 2 WONOSARI', '', '', 1, 0, 34, 'Pardi', '', '', ''),
(38, 1254, 'Reno Hanafi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1996-10-02', '', 2011, 0000, 'SMP N 2 WONOSARI', '', '', 1, 0, 34, 'Giyono', '', '', ''),
(39, 1255, 'Giyarti', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Boyolali', '1996-03-13', '', 2011, 0000, 'SMP N 1 WONOSARI', '', '', 1, 0, 34, 'Sudiyono', '', '', ''),
(40, 1256, 'Dwi Joko ', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Boyolali', '1987-02-11', 'Jl. Empat puluhan, Yogyakarta', 2011, 0000, 'SMP N 8 YOGYAKARTA', 'dwi.joko@yahoo.co.id', '085741444348', 1, 0, 28, 'Purnomo', 'PNS', '', ''),
(41, 1257, 'Sandy Tyas Cinde', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Yogyakarta', '1987-02-12', 'Jl. Endok puluhan, Yogyakarta', 2011, 0000, 'SMP N 3 YOGYAKARTA', 'hello@yahoo.com', '085741444345', 1, 0, 28, 'Kentarso', 'PNS', '', ''),
(42, 1258, 'Kelas Abidin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Yogyakarta', '1987-02-12', 'Jl. Tigapuluhan, Yogyakarta', 2011, 0000, 'SMP N 2 YOGYAKARTA', 'hello@gmail.com', '085741444355', 1, 0, 28, 'Pentarso', 'Swasta', '', ''),
(43, 1258, 'Sonny Maylendra', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Yogyakarta', '1996-05-20', 'Jl. Empat Kaki, Yogyakarta', 2011, 0000, 'SMP N 1 YOGYAKARTA', 'sony.em@gmail.com', '085741444666', 1, 0, 28, 'Kuntarso', 'PNS', '', ''),
(44, 1259, 'Febri Alfiriza', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Yogyakarta', '1996-07-20', 'Jl. Puluhan, Yogyakarta', 2011, 0000, 'SMP N 7 YOGYAKARTA', 'febrize@yahoo.co.id', '085741444777', 1, 0, 28, 'Piyarto Gk', 'PNS', '', ''),
(45, 1260, 'Fatima Tuzahro', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Kalimantan', '1996-01-20', 'Jl. Empat Dua Satu, Yogyakarta', 2011, 0000, 'SMP N 8 YOGYAKARTA', 'zahrozahrozahro@yahoo.co.id', '085741444111', 1, 0, 28, 'Pantarso', 'Swasta', '', ''),
(46, 1261, 'Tri Munfaikoh', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Surakarta', '1996-06-21', 'Jl. Murez, Yogyakarta', 2011, 0000, 'SMP N 2 YOGYAKARTA', 'tritigatelu@yahoo.co.id', '085741111348', 1, 0, 28, 'Diyarto', 'PNS', '', ''),
(47, 1261, 'Ganang Hendra', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Surakarta', '1996-05-16', 'Jl. Empat Kuda Liar, Yogyakarta', 2011, 0000, 'SMP N 1 YOGYAKARTA', 'ganang@gmail.com', '085741111111', 1, 0, 28, 'Gaino', 'PNS', '', ''),
(48, 1262, 'Fakar Nurhalim', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Klaten', '1996-09-16', 'Jl. Empat Ribu, Yogyakarta', 2011, 0000, 'SMP N 10 YOGYAKARTA', 'fakar@gmail.com', '085741124348', 1, 0, 28, 'Gurnomo', 'Swasta', '', ''),
(49, 1262, 'Dwi Widianto', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Surakarta', '1996-09-05', 'Jl. Empat Gajah, Yogyakarta', 2011, 0000, 'SMP N 6 YOGYAKARTA', 'dwidwi@ymail.com', '085741112222', 1, 0, 28, 'Darkun S', 'Swasta', '', ''),
(50, 1264, 'Riskaha Isnan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Surakarta', '1996-02-22', 'Jl. Euluhan, Yogyakarta', 2011, 0000, 'SMP N 12 YOGYAKARTA', 'isnan@gmail.com', '085741133333', 1, 0, 1, 'Kurnomo', 'PNS', '', ''),
(51, 1265, 'Alfi Nur Rahmi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Jombang', '1996-04-18', 'Jl. Empat Kaki Tiga, Yogyakarta', 2011, 0000, 'SMP N 11 YOGYAKARTA', 'alfi@yahoo.co.id', '085741113311', 1, 0, 1, 'Sakimin', 'Swasta', '', ''),
(52, 1266, 'Windi Febri', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Cilacap', '1996-12-16', 'Jl. Janti, Yogyakarta', 2011, 0000, 'SMP N 11 YOGYAKARTA', 'windi@gmail.com', '08574111232', 1, 0, 1, 'Kaino', 'PNS', '', ''),
(53, 1267, 'Rizky Setia', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Klaten', '0000-00-00', 'Jl. Empat Dua Satu, Yogyakarta', 2011, 0000, 'SMP N 12 YOGYAKARTA', 'tinta.merah@ymail.com', '085741133311', 1, 0, 1, 'Giyoni', 'Swasta', '', ''),
(54, 1267, 'Budi Doremi', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Surakarta', '0000-00-00', 'Jl. Empat Satu, Yogyakarta', 2011, 0000, 'SMP N 1 YOGYAKARTA', 'budibudi@yahoo.co.id', '085741113333', 1, 0, 1, 'Daino', 'PNS', '', ''),
(55, 1267, 'Ririn Dwi Ariani', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'P', 'Klaten', '1996-12-20', '', 2011, 0000, 'SMP N 4 YOGYAKARTA', 'ririncantik@gmail.com', '08574113333', 1, 0, 1, 'Surnomo', 'Swasta', '', ''),
(56, 1268, 'Muhamad Reza', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Tangerang', '1996-10-20', 'Jl. Empat Dara, Yogyakarta', 2011, 0000, 'Mts N 2 Wonosari', 'murez@gmail.com', '085741113311', 1, 0, 1, 'Durnomo', 'Swasta', '', ''),
(57, 1269, 'Budi Anduk', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Yogyakarta', '1996-06-20', 'Jl. Empat Lima, Yogyakarta', 2011, 0000, 'SMP N 5 WONOSARI', 'budibudianduk@yahoo.co.id', '', 1, 0, 30, 'Saino', 'Swasta', '', ''),
(58, 1270, 'Jerink Setiawan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'L', 'Surakarta', '1996-02-12', 'Jl. Dua Puluhan, Yogyakarta', 2011, 0000, 'SMP N 6 WONOSARI', 'jerink@gmail.com', '08574115551', 1, 0, 1, 'Faino', 'PNS', '', '');");


//Memasukkan data tema
mysql_query ("INSERT INTO sh_tema (id_tema, nama_tema, pembuat, url_pembuat, deskripsi, tahun, status) VALUES
(1, 'edisi_spesial_gambar', 'Ari Rusmanto', 'http://arirusmanto.com', 'glossy, simpel', 2012, 1),
(2, 'edisi_spesial_hijau', 'Ari Rusmanto', 'http://arirusmanto.com', 'jquery, simpel, hijau', 2012, 0),
(3, 'edisi_spesial', 'Ari Rusmanto', 'http://arirusmanto.com', 'cool, jquery, spesial', 2011, 0);");

//Memasukkan data album
mysql_query ("INSERT INTO sh_album (id_album, nama_album, tanggal_album, deskripsi_album, foto_album) VALUES
(29, 'Kegiatan Siswa', '2012-02-16', '', 'dadasfsafasr32wr34545.jpg'),
(28, 'Foto Alam Ciptaan Tuhan', '2012-02-17', ' ', 'a-misty-morning-1280-1024-6230.jpg');");

//Memasukkan data galeri
mysql_query ("INSERT INTO sh_galeri (id_galeri, nama_galeri, id_album, tanggal_galeri) VALUES
(89, 'pengajian_anak-anak.jpg', 29, '2012-02-17'),
(90, 'u454f64u55764765.jpg', 29, '2012-02-17'),
(91, 'lomba-pramuka-menang.jpg', 29, '2012-02-17'),
(88, 'dadasfsafasr32wr34545.jpg', 29, '2012-02-17'),
(87, 'DSC00603.JPG', 28, '2012-02-17'),
(86, 'DSC00596.JPG', 28, '2012-02-17'),
(83, 'DSC00503.JPG', 28, '2012-02-17'),
(84, 'DSC00527.JPG', 28, '2012-02-17'),
(85, 'DSC00587.JPG', 28, '2012-02-17'),
(82, 'suyatnadotcom.jpg', 29, '2012-02-16'),
(81, 'fgfdgdfgdfgdgdf.jpg', 29, '2012-02-17');");

session_start();
unset($_SESSION['pertama']);
$_SESSION['kedua'] = kedua;
header('location:info.php');
?>
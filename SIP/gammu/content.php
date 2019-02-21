<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<?php
/* Home U/ Preview Inbox */
if($_GET['module']=="home"){
include "module/sms-gateway/pesanterima.php"; // Bisa di tentukan Kemudian
}
/* Home U/ Preview Inbox */

/* Pesan Masuk */
if($_GET['module']=="pesanmasuk"){
include "module/sms-gateway/pesanterima.php";
}
/* Pesan Masuk */

/* Pesan Balas */
if($_GET['module']=="balas"){
include "module/sms-gateway/pesanbalas.php";
}
/* Pesan Balas */

/* Pesan Keluar */
if($_GET['module']=="kotakkeluar"){
include "module/sms-gateway/kotakkeluar.php";
}
/* Pesan Keluar */

/* Pesan Terkirim */
if($_GET['module']=="pesanterkirim"){
include "module/sms-gateway/pesanterkirim.php";
}
/* Pesan Terkirim */

/* Pesan Teruskan */
if($_GET['module']=="teruskan"){
include "module/sms-gateway/pesanteruskan.php";
}
/* Pesan Teruskan */

/* Pesan Instant */
if($_GET['module']=="pesaninstant"){
include "module/sms-gateway/pesaninstant.php";
}
/* Pesan Instant */

/* Pesan BroadCast */
if($_GET['module']=="broadcast"){
include "module/sms-gateway/broadcast.php";
}
/* Pesan BroadCast */

/* Pesan Group Kontak */
if($_GET['module']=="groupkontak"){
include "module/sms-gateway/groupkontak.php";
}
/* Pesan Group Kontak */

/* Pesan All Kontak */
if($_GET['module']=="allkontak"){
include "module/sms-gateway/allkontak.php";
}
/* Pesan All Kontak */

/* Setting Modem */
if($_GET['module']=="settingmodem"){
include "module/modem/setting.php";
}
/* Setting Modem */

/* Cek Pulsa */
if($_GET['module']=="cekpulsa"){
include "module/modem/cekpulsa.php";
}
/* Cek Pulsa */

/* Setting FTM */
if($_GET['module']=="ftm"){
include "module/ftm/index.php";
}
/* Setting FTM */


/* To Be Continue Tommorow */


if($_GET['module']=="input_siswa"){
include "module/siswa/input_siswa.php";
}
if($_GET['module']=="siswa_det"){
include "module/siswa/siswa_det.php";
}
if($_GET['module']=="detail_siswa"){
include "module/siswa/detail_siswa.php";
}

if($_GET['module']=="pilih"){
include "module/absen/pilih.php";
}
if($_GET['module']=="pilih_view"){
include "module/absen/pilih_view.php";
}

if($_GET['module']=="input_absen"){
include "module/absen/input_absen.php";
}
if($_GET['module']=="absen"){
include "module/absen/absen.php";
}
if($_GET['module']=="pilih_laporan"){
include "module/laporan/pilih_laporan.php";
}
if($_GET['module']=="laporan"){
include "module/laporan/laporan.php";
}
if($_GET['module']=="user"){
include "module/user/user.php";
}
if($_GET['module']=="input_user"){
include "module/user/input_user.php";
}

if($_GET['module']=="input_guru"){
include "module/guru/input_guru.php";
}
if($_GET['module']=="detail_guru"){
include "module/guru/detail_guru.php";
}
if($_GET['module']=="guru_det"){
include "module/guru/guru_det.php";
}

if($_GET['module']=="guru"){
include "module/guru/guru.php";
}
if($_GET['module']=="tampil_guru"){
include "module/guru/tampil_guru.php";
}
if($_GET['module']=="input_kelas"){
include "module/kelas/input_kelas.php";
}
if($_GET['module']=="kelas"){
include "module/kelas/kelas.php";
}
if($_GET['module']=="input_sekolah"){
include "module/sekolah/input_sekolah.php";
}
if($_GET['module']=="sekolah"){
include "module/sekolah/sekolah.php";
}
?>
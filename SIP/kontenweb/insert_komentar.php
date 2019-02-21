<?php
include "../konfigurasi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

session_start();
if(md5($_POST['kode']) == $_SESSION['image_random_value']){
mysql_query("INSERT INTO sh_komentar (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_berita)
			VALUES ('$_POST[nama]','$_POST[email]','$_POST[komentar]','$tanggal','$_POST[id]')");

echo "<script>window.alert('Terimakasih telah memeberi komentar pada berita kami. Komentar anda segera dimoderasi oleh Admin');window.location=('../index.php?p=detberita&id=$_POST[id]')</script>";
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.location=('../index.php?p=detberita&id=$_POST[id]')</script>";
}
?>
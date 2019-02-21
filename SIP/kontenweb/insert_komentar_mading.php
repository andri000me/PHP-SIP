<?php
include "../konfigurasi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

session_start();
if ($_SESSION[siswa])
	{mysql_query("INSERT INTO sh_komentar_mading (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_mading,status)
			VALUES ('$_POST[nama]','$_POST[email]','$_POST[komentar]','$tanggal','$_POST[id]','siswa')");

	echo "<script>window.alert('Terimakasih telah memberi komentar pada mading kami. Komentar anda segera dimoderasi oleh Admin');window.location=('../index.php?p=detmading&id=$_POST[id]')</script>";
	}
elseif ($_SESSION[guru])
	{mysql_query("INSERT INTO sh_komentar_mading (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_mading,status)
			VALUES ('$_POST[nama]','$_POST[email]','$_POST[komentar]','$tanggal','$_POST[id]','guru')");

	echo "<script>window.alert('Terimakasih telah memberi komentar pada mading kami. Komentar anda segera dimoderasi oleh Admin');window.location=('../index.php?p=detmading&id=$_POST[id]')</script>";
	}
elseif ($_SESSION[orangtua])
	{mysql_query("INSERT INTO sh_komentar_mading (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_mading,status)
			VALUES ('$_POST[nama]','$_POST[email]','$_POST[komentar]','$tanggal','$_POST[id]','ortu')");

	echo "<script>window.alert('Terimakasih telah memberi komentar pada mading kami. Komentar anda segera dimoderasi oleh Admin');window.location=('../index.php?p=detmading&id=$_POST[id]')</script>";
	}
else{
if(md5($_POST['kode']) == $_SESSION['image_random_value']){
mysql_query("INSERT INTO sh_komentar_mading (nama_komentar, email_komentar, isi_komentar, tanggal_komentar, id_mading,status)
			VALUES ('$_POST[nama]','$_POST[email]','$_POST[komentar]','$tanggal','$_POST[id]','visitor')");

echo "<script>window.alert('Terimakasih telah memeberi komentar pada mading kami. Komentar anda segera dimoderasi oleh Admin');window.location=('../index.php?p=detmading&id=$_POST[id]')</script>";
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.location=('../index.php?p=detmading&id=$_POST[id]')</script>";
}}
?>
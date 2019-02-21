<?php
include "../konfigurasi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
session_start();
if(md5($_POST['kode']) == $_SESSION['image_random_value']){
mysql_query("INSERT INTO sh_psb
				(nama_psb, jenkel, nem, sekolah_asal, no_sttb, tanggal_sttb, tempat_lahir, tanggal_lahir, bb, tb, status_psb, tanggal_psb, nama_ortu, pekerjaan_ortu, alamat_psb, polling_psb, telepon, email)
				VALUES
				(	'$_POST[nama]',
					'$_POST[jk]',
					'$_POST[nem]',
					'$_POST[sekolah_asal]',
					'$_POST[no_sttb]',
					'$_POST[tanggal_sttb]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[bb]',
					'$_POST[tb]',
					'0',
					'$tanggal',
					'$_POST[nama_ortu]',
					'$_POST[pekerjaan_ortu]',
					'$_POST[alamat]',
					'$_POST[polling]',
					'$_POST[telepon]',
					'$_POST[email]')");
					
header ('location:../index.php?p=selesaipsb');
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.location=('../index.php?p=formpsb')</script>";
}
?>
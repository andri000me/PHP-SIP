<?php
include "../konfigurasi/koneksi.php";

session_start();
if(md5($_POST['kode']) == $_SESSION['image_random_value']){
	mysql_query("INSERT INTO sh_siswa
				(nama_siswa, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_lulus, email, telepon, status_siswa, pekerjaan_sekarang, info_tambahan)
				VALUES
				(	'$_POST[nama_alumni]',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_lulus]',
					'$_POST[email]',
					'$_POST[telepon]',
					'0',
					'$_POST[pekerjaan_sekarang]',
					'$_POST[info_tambahan]')");
					
header ('location:../index.php?p=alumni');
}
else {
echo "<script>window.alert('Kode verifikasi yang anda masukkan salah. Silahkan ulangi kembali');window.location=('../index.php?p=formalumni')</script>";
}
?>
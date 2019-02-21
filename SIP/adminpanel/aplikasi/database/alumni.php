<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
if ($pilih=='alumni' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_siswa
				(nama_siswa, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_lulus, email, telepon, status_siswa, pekerjaan_sekarang, info_tambahan, status_oke)
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
					'$_POST[info_tambahan]',
					'1')");
					
	header('location:../../alumni.php');
}

elseif ($pilih=='alumni' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_siswa SET 		nama_siswa ='$_POST[nama_alumni]',
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_lulus='$_POST[tahun_lulus]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											pekerjaan_sekarang='$_POST[pekerjaan_sekarang]',
											info_tambahan='$_POST[info_tambahan]',
											status_oke='$_POST[status_oke]'
											WHERE id_siswa ='$_POST[id]'");
	header('location:../../alumni.php');
}


elseif ($pilih=='alumni' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_siswa WHERE id_siswa ='$_GET[id]'");					
	header('location:../../alumni.php');}
	

elseif ($pilih=='alumni' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_siswa WHERE id_siswa='$cek[$i]'");
	}
	header('location:../../alumni.php');
}


?>
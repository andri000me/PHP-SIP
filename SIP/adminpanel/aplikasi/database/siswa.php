<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$no_file 	 = "no_photo.jpg";
$direktori	 = "C:/xampp/htdocs/websch-demo/images/foto/siswa/";
$lokasi_file = $_FILES['fupload']['tmp_name'];
if (!empty($lokasi_file)){
$nama_file   = $_FILES['fupload']['name'];
$filter		 = "foto='$direktori$nama_file',";}
else{$nama_file="no_photo.jpg";$filter="";}
$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
$password = MD5($_POST[password]);
if ($pilih=='siswa' AND $untukdi=='tambah'){
	UploadSiswa($nama_file);
	mysql_query("INSERT INTO sh_siswa
				(nama_siswa,nis, password,foto, jenkel, tempat_lahir, tanggal_lahir, alamat, tahun_registrasi, sekolah_asal, email, telepon, status_siswa, id_kelas, nama_ortu, pekerjaan_ortu)
				VALUES
				(	'$_POST[nama_siswa]',
					'$_POST[nis]',
					'$password',
					'$direktori$nama_file',
					'$_POST[jk]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[tahun_reg]',
					'$_POST[sekolah_asal]',
					'$_POST[email]',
					'$_POST[telepon]',
					'1',
					'$_POST[kelas]',
					'$_POST[nama_ortu]',
					'$_POST[pekerjaan_ortu]')");
					
	header('location:../../siswa.php');
}

elseif ($pilih=='siswa' AND $untukdi=='edit'){
	UploadSiswa($nama_file);
	if (!empty($_POST[password])){
	mysql_query("UPDATE sh_siswa SET 		nama_siswa ='$_POST[nama_siswa]',
											nis='$_POST[nis]',
											password='$password',
											$filter
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_registrasi='$_POST[tahun_reg]',
											sekolah_asal='$_POST[sekolah_asal]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											id_kelas='$_POST[kelas]',
											status_siswa='$_POST[status_siswa]',
											nama_ortu='$_POST[nama_ortu]',
											pekerjaan_ortu='$_POST[pekerjaan_ortu]'
											WHERE id_siswa ='$_POST[id]'");}
	else {
	mysql_query("UPDATE sh_siswa SET 		nama_siswa ='$_POST[nama_siswa]',
											nis='$_POST[nis]',
											$filter
											jenkel='$_POST[jk]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											tahun_registrasi='$_POST[tahun_reg]',
											sekolah_asal='$_POST[sekolah_asal]',
											email='$_POST[email]',
											telepon='$_POST[telepon]',
											id_kelas='$_POST[kelas]',
											nama_ortu='$_POST[nama_ortu]',
											status_siswa='$_POST[status_siswa]',
											pekerjaan_ortu='$_POST[pekerjaan_ortu]'
											WHERE id_siswa ='$_POST[id]'");
	}
	header('location:../../siswa.php');
}

elseif ($pilih=='siswa' AND $untukdi=='hapusgambar'){
	$hapusfoto=mysql_query("SELECT * FROM sh_siswa WHERE id_siswa='$_GET[id]'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= '$direktori$no_file'){
	unlink("$hf[foto]");
	mysql_query("UPDATE sh_siswa SET foto='$direktori$no_file' WHERE id_siswa='$_GET[id]'");}
	header('location:../../siswa.php?pilih=edit&id='.$_GET[id]);
}

//Dibawah ini digunakan pada saat posisi tampil semua data buku tamu
elseif ($pilih=='siswa' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_siswa WHERE id_siswa ='$_GET[id]'");					
	header('location:../../siswa.php');}

elseif ($pilih=='siswa' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_siswa WHERE id_siswa='$cek[$i]'");
	}
	header('location:../../siswa.php');
}


?>
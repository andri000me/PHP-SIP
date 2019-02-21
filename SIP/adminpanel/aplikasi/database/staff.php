<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$password= md5($_POST[password]);
if ($pilih=='staff' AND $untukdi=='tambah'){
	if (!empty($lokasi_file)){
	UploadImage($nama_file);	
	mysql_query("INSERT INTO sh_guru_staff
				(nama_gurustaff,nip, foto, jenkel, id_jabatan, tempat_lahir, tanggal_lahir, alamat,status_kawin, tahun_masuk, pendidikan_terakhir, email, telepon, posisi)
				VALUES
				(	'$_POST[nama_staff]',
					'$_POST[nip]',
					'$nama_file',
					'$_POST[jk]',
					'$_POST[jabatan]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[status_kawin]',
					'$_POST[tahun_masuk]',
					'$_POST[pendidikan]',
					'$_POST[email]',
					'$_POST[telepon]',
					'staff')");
					}
	else {
	mysql_query("INSERT INTO sh_guru_staff
				(nama_gurustaff,nip, foto, jenkel, id_jabatan, tempat_lahir, tanggal_lahir, alamat,status_kawin, tahun_masuk, pendidikan_terakhir, email, telepon, posisi)
				VALUES
				(	'$_POST[nama_staff]',
					'$_POST[nip]',
					'no_photo.jpg',
					'$_POST[jk]',
					'$_POST[jabatan]',
					'$_POST[tempat_lahir]',
					'$_POST[tanggal_lahir]',
					'$_POST[alamat]',
					'$_POST[status_kawin]',
					'$_POST[tahun_masuk]',
					'$_POST[pendidikan]',
					'$_POST[email]',
					'$_POST[telepon]',
					'staff')");
					}
	
	header('location:../../staff.php');
}

elseif ($pilih=='staff' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadImage($nama_file);
	mysql_query("UPDATE sh_guru_staff SET 	nama_gurustaff='$_POST[nama_staff]',
											nip='$_POST[nip]',
											foto='$nama_file',
											jenkel='$_POST[jk]',
											id_jabatan='$_POST[jabatan]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											status_kawin='$_POST[status_kawin]',
											tahun_masuk='$_POST[tahun_masuk]',
											pendidikan_terakhir='$_POST[pendidikan]',
											email='$_POST[email]',
											telepon='$_POST[telepon]'
											WHERE id_gurustaff ='$_POST[id]'");}
	else{
	mysql_query("UPDATE sh_guru_staff SET 	nama_gurustaff='$_POST[nama_staff]',
											nip='$_POST[nip]',
											jenkel='$_POST[jk]',
											id_jabatan='$_POST[jabatan]',
											tempat_lahir='$_POST[tempat_lahir]',
											tanggal_lahir='$_POST[tanggal_lahir]',
											alamat='$_POST[alamat]',
											status_kawin='$_POST[status_kawin]',
											tahun_masuk='$_POST[tahun_masuk]',
											pendidikan_terakhir='$_POST[pendidikan]',
											email='$_POST[email]',
											telepon='$_POST[telepon]'
											WHERE id_gurustaff ='$_POST[id]'");}
	
	header('location:../../staff.php');
}



elseif ($pilih=='staff' AND $untukdi=='hapusgambar'){
	$hapusfoto=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$_GET[id]'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	unlink("../../../images/foto/guru/$hf[foto]");
	mysql_query("UPDATE sh_guru_staff SET 	foto='no_photo.jpg' WHERE id_gurustaff='$_GET[id]'");}
	header('location:../../staff.php?pilih=edit&id='.$_GET[id]);
}

//Dibawah ini digunakan pada saat posisi tampil semua data staff
elseif ($pilih=='staff' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$_GET[id]'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff ='$_GET[id]'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff ='$_GET[id]'");
	}
	header('location:../../staff.php');} 

elseif ($pilih=='staff' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff='$cek[$i]'");
	
	}
	header('location:../../staff.php');
}

//Dibawah ini digunakan pada saat posisi tampil data guru laki laki
elseif ($pilih=='laki' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$_GET[id]'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff ='$_GET[id]'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff ='$_GET[id]'");
	}
	header('location:../../staff.php?pilih=jenkel&kode=L');} 

elseif ($pilih=='laki' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff='$cek[$i]'");
	
	}
	header('location:../../staff.php?pilih=jenkel&kode=L');
}

//Dibawah ini digunakan pada saat posisi tampil data guru perempuan
elseif ($pilih=='perempuan' AND $untukdi=='hapus'){
	$hapusfoto=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$_GET[id]'");
	$hf=mysql_fetch_array($hapusfoto);
	if ($hf[foto]!= 'no_photo.jpg'){
	mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff ='$_GET[id]'");
	unlink("../../../images/foto/guru/$hf[foto]");}
	else {
	mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff ='$_GET[id]'");
	}
	header('location:../../staff.php?pilih=jenkel&kode=P');} 

elseif ($pilih=='perempuan' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM sh_guru_staff WHERE id_gurustaff='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM sh_guru_staff WHERE id_gurustaff='$cek[$i]'");
	
	}
	header('location:../../staff.php?pilih=jenkel&kode=P');
}


?>
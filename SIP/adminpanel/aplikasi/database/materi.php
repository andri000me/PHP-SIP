<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/file_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($pilih=='materi' AND $untukdi=='tambah'){
	UploadFile($nama_file);	
	mysql_query("INSERT INTO sh_materi
				(file_materi,judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload)
				VALUES
				(	'$nama_file',
					'$_POST[judul_materi]',
					'$_POST[deskripsi]',
					'$_POST[mapel]',
					'$_POST[guru]',
					'$tanggal')");
					
	header('location:../../materi.php');
}

elseif ($pilih=='materi' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadFile($nama_file);
	mysql_query("UPDATE sh_materi SET 		file_materi='$nama_file',
											judul_materi='$_POST[judul]',
											deskripsi_materi='$_POST[deskripsi]',
											tanggal_upload='$tanggal'
											WHERE id_materi ='$_POST[id]'");}
	else{
	mysql_query("UPDATE sh_materi SET 		judul_materi='$_POST[judul]',
											deskripsi_materi='$_POST[deskripsi]',
											tanggal_upload='$tanggal'
											WHERE id_materi ='$_POST[id]'");}
	
	header('location:../../materi.php');
}

//Dibawah ini digunakan pada saat posisi tampil semua data materi
elseif ($pilih=='materi' AND $untukdi=='hapus'){
	$hapusfile=mysql_query("SELECT * FROM sh_materi WHERE id_materi='$_GET[id]'");
	$hf=mysql_fetch_array($hapusfile);
	
	mysql_query("DELETE FROM sh_materi WHERE id_materi='$_GET[id]'");
	unlink("../../../file/materi/$hf[file_materi]");
	
	header('location:../../materi.php');} 

elseif ($pilih=='materi' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 $hapuskabeh=mysql_query("SELECT * FROM sh_materi WHERE id_materi='$cek[$i]'");
	 $hk=mysql_fetch_array($hapuskabeh);
	 mysql_query("DELETE FROM sh_materi WHERE id_materi='$cek[$i]'");
	
	 unlink("../../../file/materi/$hk[file_materi]");
	}
	header('location:../../materi.php');
}



?>
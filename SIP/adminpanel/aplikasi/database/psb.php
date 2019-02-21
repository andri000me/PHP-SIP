<?php
include "../../../konfigurasi/koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
if ($pilih=='psb' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_psb
				(nama_psb, jenkel, nem, sekolah_asal, no_sttb, tanggal_sttb, tempat_lahir, tanggal_lahir, bb, tb, status_psb, tanggal_psb, nama_ortu, pekerjaan_ortu, alamat_psb, polling_psb, telepon, email)
				VALUES
				(	'$_POST[nama_pendaftar]',
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
					
	header('location:../../psb_online.php');
}

elseif ($pilih=='psb' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_psb SET 		nama_psb='$_POST[nama_pendaftar]',
										jenkel='$_POST[jk]',
										nem='$_POST[nem]',
										sekolah_asal='$_POST[sekolah_asal]',
										no_sttb='$_POST[no_sttb]',
										tanggal_sttb='$_POST[tanggal_sttb]',
										tempat_lahir='$_POST[tempat_lahir]',
										tanggal_lahir='$_POST[tanggal_lahir]',
										bb='$_POST[bb]',
										tb='$_POST[tb]',
										tanggal_psb='$tanggal',
										nama_ortu='$_POST[nama_ortu]',
										pekerjaan_ortu='$_POST[pekerjaan_ortu]',
										alamat_psb='$_POST[alamat]',
										polling_psb='$_POST[polling]',
										telepon='$_POST[telepon]',
										email='$_POST[email]'
										WHERE id_psb ='$_POST[id]'");
	header('location:../../psb_online.php');
}

//Dibawah ini digunakan pada saat posisi tampil semua data psb
elseif ($pilih=='psb' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php');}
	
elseif ($pilih=='psb' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php');}
	
elseif ($pilih=='psb' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php');}

elseif ($pilih=='psb' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_psb='$cek[$i]'");
	}
	header('location:../../psb_online.php');
}

//Dibawah ini digunakan pada saat posisi tampil data psb laki laki
elseif ($pilih=='laki' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jenkel&kode=L');}
	
elseif ($pilih=='laki' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jenkel&kode=L');}
	
elseif ($pilih=='laki' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jenkel&kode=L');}

elseif ($pilih=='laki' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_psb='$cek[$i]'");
	}
	header('location:../../psb_online.php?pilih=jenkel&kode=L');
}

//Dibawah ini digunakan pada saat posisi tampil data psb perempuan
elseif ($pilih=='perempuan' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jenkel&kode=P');}
	
elseif ($pilih=='perempuan' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jenkel&kode=P');}
	
elseif ($pilih=='perempuan' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_online.php?pilih=jenkel&kode=P');}

elseif ($pilih=='perempuan' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_psb='$cek[$i]'");
	}
	header('location:../../psb_online.php?pilih=jenkel&kode=P');
}


//Dibawah ini digunakan pada saat posisi tampil data psb diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_psb WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_diterima.php');}
	
elseif ($pilih=='terima' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_psb SET status_psb='1' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_diterima.php');}
	
elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_psb SET status_psb='0' WHERE id_psb ='$_GET[id]'");					
	header('location:../../psb_diterima.php');}

elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_psb WHERE id_psb='$cek[$i]'");
	}
	header('location:../../psb_diterima.php');
}


?>
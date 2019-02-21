<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
if ($pilih=='agenda' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_agenda
				(judul_agenda, keterangan_agenda, tempat_agenda,tanggal_agenda, s_username)
				VALUES
				(	'$_POST[judul]',
					'$_POST[keterangan]',
					'$_POST[tempat]',
					'$_POST[tanggal]',
					'$_POST[s_username]')");
					
	header('location:../../agenda.php');
}

elseif ($pilih=='agenda' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_agenda SET 	judul_agenda='$_POST[judul]',
										keterangan_agenda='$_POST[keterangan]',
										tempat_agenda='$_POST[tempat]',
										tanggal_agenda='$_POST[tanggal]',
										s_username='masarie'
										WHERE id_agenda ='$_POST[id]'");						
	header('location:../../agenda.php');
}


elseif ($pilih=='agenda' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_agenda WHERE id_agenda ='$_GET[id]'");					
	header('location:../../agenda.php');
}

elseif ($pilih=='agenda' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_agenda WHERE id_agenda='$cek[$i]'");
	}
	header('location:../../agenda.php');
}
?>
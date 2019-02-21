<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
if ($pilih=='pengumuman' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_pengumuman
				(judul_pengumuman, isi_pengumuman, tanggal_pengumuman,ditujukan, s_username)
				VALUES
				(	'$_POST[judul_pengumuman]',
					'$_POST[isi_pengumuman]',
					'$tanggal',
					'$_POST[ditujukan]',
					'$_POST[s_username]')");
					
	header('location:../../pengumuman.php');
}

elseif ($pilih=='pengumuman' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_pengumuman SET 	judul_pengumuman='$_POST[judul_pengumuman]',
											isi_pengumuman='$_POST[isi_pengumuman]',
											ditujukan='$_POST[ditujukan]'
										WHERE id_pengumuman ='$_POST[id]'");						
	header('location:../../pengumuman.php');
}


elseif ($pilih=='pengumuman' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_pengumuman WHERE id_pengumuman ='$_GET[id]'");					
	header('location:../../pengumuman.php');
}

elseif ($pilih=='pengumuman' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_pengumuman WHERE id_pengumuman='$cek[$i]'");
	}
	header('location:../../pengumuman.php');
}
?>
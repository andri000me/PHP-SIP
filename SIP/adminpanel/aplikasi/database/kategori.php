<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='kategori' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_kategori
				(nama_kategori, deskripsi_kategori)
				VALUES
				('$_POST[nama_kat]','$_POST[deskripsi_kat]')");
				
	header('location:../../kategori.php');
}

elseif ($pilih=='kategori' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_kategori SET nama_kategori ='$_POST[nama_kat]',
										deskripsi_kategori ='$_POST[deskripsi_kat]'
										WHERE id_kategori ='$_POST[id]'");
							
	header('location:../../kategori.php');
}
elseif ($pilih=='kategori' AND $untukdi=='hapus'){
	$kategori=mysql_query("SELECT * FROM sh_kategori WHERE id_kategori='$_GET[id]'");
	$r=mysql_fetch_array($kategori);
	
	if ($r[id_kategori]==1){
	header('location:../../kategori.php');
	}
	else {
	mysql_query("DELETE FROM sh_kategori WHERE id_kategori ='$_GET[id]'");
	mysql_query("UPDATE sh_berita SET id_kategori='1' WHERE id_kategori='$_GET[id]'");				
	header('location:../../kategori.php');}
}

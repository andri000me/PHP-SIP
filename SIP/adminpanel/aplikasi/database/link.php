<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='link' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_sidebar
				(jenis, status, nama, isi1)
				VALUES
				(	'link',
					'1',
					'$_POST[nama_link]',
					'$_POST[url_link]')");
					
	header('location:../../link.php');
}

elseif ($pilih=='link' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_sidebar SET 	nama ='$_POST[nama_link]',
										isi1 ='$_POST[url_link]'
										WHERE id_sidebar ='$_POST[id]'");						
	header('location:../../link.php');
}


elseif ($pilih=='link' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_sidebar WHERE id_sidebar ='$_GET[id]'");					
	header('location:../../link.php');
}

?>
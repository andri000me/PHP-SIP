<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='ym' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_sidebar
				(jenis, status, nama, isi1)
				VALUES
				(	'ym',
					'1',
					'$_POST[nama_lengkap]',
					'$_POST[email]')");
					
	header('location:../../ym.php');
}

elseif ($pilih=='ym' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_sidebar SET 	nama ='$_POST[nama_lengkap]',
										isi1 ='$_POST[email]'
										WHERE id_sidebar ='$_POST[id]'");						
	header('location:../../ym.php');
}


elseif ($pilih=='ym' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_sidebar WHERE id_sidebar ='$_GET[id]'");					
	header('location:../../ym.php');
}

?>
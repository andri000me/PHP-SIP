<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='polling' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_sidebar
				(jenis, status, nama, isi1, isi2)
				VALUES
				(	'polling',
					'1',
					'$_POST[isi_polling]',
					'$_POST[jml_poll]',
					'$_POST[status]')");
					
	header('location:../../polling.php');
}

elseif ($pilih=='polling' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_sidebar SET 	nama ='$_POST[isi_polling]',
										isi1 ='$_POST[jml_poll]'
										WHERE id_sidebar ='$_POST[id]'");						
	header('location:../../polling.php');
}


elseif ($pilih=='polling' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_sidebar WHERE id_sidebar ='$_GET[id]'");					
	header('location:../../polling.php');
}

?>
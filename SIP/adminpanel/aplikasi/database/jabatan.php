<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='jabatan' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_jabatan
				(nama_jabatan,deskripsi_jabatan )
				VALUES
				(	'$_POST[nama_jabatan]',
					'$_POST[deskripsi_jabatan]')");
					
	header('location:../../jabatan.php');
}

elseif ($pilih=='jabatan' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_jabatan SET 	nama_jabatan ='$_POST[nama_jabatan]',
										deskripsi_jabatan ='$_POST[deskripsi_jabatan]'
										WHERE id_jabatan ='$_POST[id]'");						
	header('location:../../jabatan.php');
}


elseif ($pilih=='jabatan' AND $untukdi=='hapus'){
	if ($_GET[id]== 1){					
	header('location:../../jabatan.php');
	}
	else {
	mysql_query("UPDATE sh_guru_staff SET id_jabatan=1 WHERE id_jabatan ='$_GET[id]'");
	mysql_query("DELETE FROM sh_jabatan WHERE id_jabatan ='$_GET[id]'");					
	header('location:../../jabatan.php');
	}
}

?>
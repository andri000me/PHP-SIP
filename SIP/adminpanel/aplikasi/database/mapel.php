<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='mapel' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_mapel
				(tingkat,nama_mapel,kode_mapel,KKM,deskripsi_mapel )
				VALUES
				(	'$_POST[tingkat]',
					'$_POST[nama_mapel]',
					'$_POST[kode_mapel]',
					'$_POST[KKM]',
					'$_POST[deskripsi_mapel]')");
					
	header('location:../../mata_pelajaran.php');
}

elseif ($pilih=='mapel' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_mapel SET 	tingkat ='$_POST[tingkat]',
										nama_mapel ='$_POST[nama_mapel]',
										kode_mapel ='$_POST[kode_mapel]',
										deskripsi_mapel ='$_POST[deskripsi_mapel]' ,
										KKM = '$_POST[KKM]'
										WHERE id_mapel ='$_POST[id]'");						
	header('location:../../mata_pelajaran.php');
}


elseif ($pilih=='mapel' AND $untukdi=='hapus'){
	if ($_GET[id]== 1){					
	header('location:../../mata_pelajaran.php');
	}
	else {
	mysql_query("UPDATE sh_materi SET id_mapel=1 WHERE id_mapel='$_GET[id]'");
	mysql_query("UPDATE sh_guru_staff SET id_mapel=1 WHERE id_mapel='$_GET[id]'");
	mysql_query("DELETE FROM sh_mapel WHERE id_mapel ='$_GET[id]'");					
	header('location:../../mata_pelajaran.php');
	}
}

?>
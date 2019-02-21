<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
if ($pilih=='profil' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_info_sekolah
				(nama_info,isi_info, tanggal_info, posisi_menu, status_terbit )
				VALUES
				(	'$_POST[nama_info]',
					'$_POST[isi_info]',
					'$tanggal',
					'$_POST[posisi_menu]',
					'1')");
					
	header('location:../../profil.php');
}

elseif ($pilih=='profil' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_info_sekolah SET 	nama_info ='$_POST[nama_info]',
												isi_info ='$_POST[isi_info]',
												tanggal_info ='$tanggal',
												posisi_menu ='$_POST[posisi_menu]'
												WHERE id_info ='$_POST[id]'");
							
	header('location:../../profil.php');
}


elseif ($pilih=='profil' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_info_sekolah WHERE id_info ='$_GET[id]'");					
	header('location:../../profil.php');
}

elseif ($pilih=='profil' AND $untukdi=='batalkan'){
	mysql_query("UPDATE sh_info_sekolah SET status_terbit=0 WHERE id_info ='$_GET[id]'");					
	header('location:../../profil.php');
}

elseif ($pilih=='profil' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE sh_info_sekolah SET status_terbit=1 WHERE id_info ='$_GET[id]'");					
	header('location:../../profil.php');
}

?>
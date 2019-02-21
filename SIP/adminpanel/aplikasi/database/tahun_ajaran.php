<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='tahun_ajaran' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_tahun_ajaran
				(tahun_ajaran, semester, waktu_awal_semester, waktu_akhir_semester, aktif)
				VALUES
				(	'$_POST[tahun_ajaran]',
					'$_POST[sm]',
					'$_POST[tanggal_mulai]',
					'$_POST[tanggal_akhir]',
					'$_POST[status]')");
					
	header('location:../../tahun_ajaran.php');
}

elseif ($pilih=='tahun_ajaran' AND $untukdi=='edit'){
	
	
	mysql_query("UPDATE sh_tahun_ajaran SET 	tahun_ajaran ='$_POST[tahun_ajaran]',
							semester ='$_POST[sm]',
							waktu_awal_semester ='$_POST[tanggal_mulai]',
							waktu_akhir_semester ='$_POST[tanggal_akhir]',
							aktif ='$_POST[status]'
							WHERE id_tahun_ajaran ='$_POST[id]'");	
	if($_POST['status']==1) {
	mysql_query("UPDATE sh_tahun_ajaran SET 	aktif ='0' WHERE id_tahun_ajaran <> '$_POST[id]'");	
	}
	
	header('location:../../tahun_ajaran.php');
}


elseif ($pilih=='tahun_ajaran' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_tahun_ajaran WHERE id_tahun_ajaran ='$_GET[id]'");					
	header('location:../../tahun_ajaran.php');
}

?>
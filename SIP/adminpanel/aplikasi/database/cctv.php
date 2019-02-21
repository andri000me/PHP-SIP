<?php
//Mengambil File koneksi.php
include "../../../konfigurasi/koneksi.php";

// Menagmbil Data Dari Method GET
$pilih=$_GET['pilih'];
$untukdi=$_GET['untukdi'];

//Jika GET Pilih sudah sesuai maka Proses Insert Data Dilakukan
if ($pilih=='cctv' AND $untukdi=='tambah'){

	$query = mysql_query("INSERT INTO sh_cctv
				(alamat_cctv, id_kelas, status , aktif_ortu)
				VALUES
				('$_POST[cctv]',
				 '$_POST[kelas]',
				 '$_POST[status]',
				 '$_POST[aktif_ortu]')");
	if($query) {
		
		echo "<script> alert('Data CCTV Berhasil di tambahkan !');window.location.href = '../../cctv.php';</script>";
	
	} else {
		
		echo "<script> alert('Data CCTV Gagal di tambahkan !');javascript: history.go(-1);</script>";	
	}
}

//Jika GET Pilih sudah sesuai maka Proses Update Data Dilakukan
else if ($pilih=='cctv' AND $untukdi=='edit'){

	$query = mysql_query("UPDATE sh_cctv SET alamat_cctv ='$_POST[cctv]',
											 id_kelas ='$_POST[kelas]',
											 status ='$_POST[status]',
											 aktif_ortu ='$_POST[aktif_ortu]'
									WHERE id_cctv = '$_POST[id]'");

	if($query) {
		
		echo "<script> alert('Data CCTV Berhasil di Update !');window.location.href = '../../cctv.php';</script>";
	
	} else {
		
		echo "<script> alert('Data CCTV Gagal di Update !');javascript: history.go(-1);</script>";	
	}
}

//Jika GET Pilih sudah sesuai maka Proses Delete Data Dilakukan
else if ($pilih=='cctv' AND $untukdi=='hapus'){
	
	$query = mysql_query("DELETE FROM sh_cctv WHERE id_cctv = '$_GET[id]'");
	
	if($query) {
		
		echo "<script> alert('Data CCTV Berhasil di Hapus !');window.location.href = '../../cctv.php';</script>";
	
	} else {
		
		echo "<script> alert('Data CCTV Gagal di Hapus !');javascript: history.go(-1);</script>";	
	}
}

?>
<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";
$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

if ($pilih=='mading' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadMading2($nama_file);
	mysql_query("UPDATE sh_mading SET 	judul_mading ='$_POST[judul_mading]',
										isi_mading ='$_POST[isi_mading]',
										gambar_mading ='$nama_file',
										status_terbit ='1',
										id_kategori ='$_POST[kategori]'
										WHERE id_mading ='$_POST[id]'");
							}
	else {
	mysql_query("UPDATE sh_mading SET 	judul_mading ='$_POST[judul_mading]',
										isi_mading ='$_POST[isi_mading]',
										status_terbit ='1',
										id_kategori ='$_POST[kategori]'
										WHERE id_mading ='$_POST[id]'");
	
	}					
	header('location:../../mading.php');
}

//Dibawah ini digunakan pada saat posisi tampil semua data buku tamu
elseif ($pilih=='mading' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_mading WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php');}

elseif ($pilih=='mading' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_mading SET status_terbit='0' WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php');}

elseif ($pilih=='mading' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_mading SET status_terbit='1' WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php');
}

elseif ($pilih=='mading' AND $untukdi=='hapusgambar'){
	$madingdata=mysql_query("SELECT * FROM sh_mading WHERE id_mading='$_GET[id]'");
	$r=mysql_fetch_array($madingdata);
	if ($r[gambar_mading]!='no_image.jpg'){
	unlink("../../../images/$r[gambar_mading]");
	mysql_query("UPDATE sh_mading SET gambar_mading='no_image.jpg' WHERE id_mading='$_GET[id]'");
	}
	header('location:../../mading.php?pilih=edit&id='.$_GET[id]);
}

elseif ($pilih=='mading' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_mading WHERE id_mading='$cek[$i]'");
	}
	header('location:../../mading.php');
}





//Dibawah ini digunakan pada saat posisi tampil data buku yang diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_mading WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php?pilih=terima');}

elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_mading SET status_terbit='0' WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php?pilih=terima');}

elseif ($pilih=='terima' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_mading SET status_terbit='1' WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php?pilih=terima');
}

elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_mading WHERE id_mading='$cek[$i]'");
	}
	header('location:../../mading.php?pilih=terima');
}

//Dibawah ini digunakan pada saat posisi tampil data buku yang ditolak
elseif ($pilih=='tolak' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_mading WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php?pilih=tolak');}

elseif ($pilih=='tolak' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_mading SET status_terbit='0' WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php?pilih=tolak');}

elseif ($pilih=='tolak' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_mading SET status_terbit='1' WHERE id_mading ='$_GET[id]'");					
	header('location:../../mading.php?pilih=tolak');
}

elseif ($pilih=='tolak' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_mading WHERE id_mading='$cek[$i]'");
	}
	header('location:../../mading.php?pilih=tolak');
}

//Dibawah ini digunakan pada saat posisi di halaman berita konsep
elseif ($pilih=='konsep' AND $untukdi=='hapus'){
	$madingdata=mysql_query("SELECT * FROM sh_mading WHERE id_mading='$_GET[id]'");
	$r=mysql_fetch_array($madingdata);
	if ($r[gambar_mading]!='no_image.jpg'){
	mysql_query("DELETE FROM sh_mading WHERE id_mading='$_GET[id]'");
	unlink("../../../images/$r[gambar_mading]");
	}
	else {
	mysql_query("DELETE FROM sh_mading WHERE id_mading='$_GET[id]'");
	}
	header('location:../../mading.php?pilih=konsep');
}

elseif ($pilih=='konsep' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE sh_mading SET status_terbit='1' WHERE id_mading='$_GET[id]'");
	header('location:../../mading.php?pilih=konsep');
}

elseif ($pilih=='konsep' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_mading WHERE id_mading='$cek[$i]'");

	}
	header('location:../../mading.php?pilih=konsep');
}

?>
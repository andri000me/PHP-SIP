<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($pilih=='galeri' AND $untukdi=='tambah'){
	if (!empty($lokasi_file)){
	UploadGaleri($nama_file);
	mysql_query("INSERT INTO sh_galeri
				(nama_galeri,tanggal_galeri, id_album)
				VALUES
				(	'$nama_file',
					'$tanggal',
					'$_POST[album_galeri]')");
					
	}
	header('location:../../galeri_foto.php');
}

elseif ($pilih=='galeri' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadGaleri($nama_file);
	mysql_query("UPDATE sh_galeri SET 	nama_galeri ='$nama_file',
										tanggal_galeri ='$tanggal',
										id_album ='$_POST[album]'
										WHERE id_galeri ='$_POST[id]'");
							}
	else {
	mysql_query("UPDATE sh_galeri SET 	tanggal_galeri ='$tanggal',
										id_album ='$_POST[album]'
										WHERE id_galeri ='$_POST[id]'");
	
	}
	header('location:../../galeri_foto.php');
}

//Dibawah ini digunakan pada saat posisi di halaman semua data galeri
elseif ($pilih=='galeri' AND $untukdi=='hapus'){
	$galeridata=mysql_query("SELECT * FROM sh_galeri WHERE id_galeri='$_GET[id]'");
	$r=mysql_fetch_array($galeridata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM sh_galeri WHERE id_galeri='$_GET[id]'");
	unlink("../../../images/foto/galeri/$r[nama_galeri]");
	}
	else {
	mysql_query("DELETE FROM sh_galeri WHERE id_galeri='$_GET[id]'");
	}
	header('location:../../galeri_foto.php');
}

elseif ($pilih=='galeri' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_galeri WHERE id_galeri='$cek[$i]'");
	}
	header('location:../../galeri_foto.php');
}


?>
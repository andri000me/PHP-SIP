<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($pilih=='album' AND $untukdi=='tambah'){
	if (!empty($lokasi_file)){
	UploadAlbum($nama_file);
	mysql_query("INSERT INTO sh_album
				(nama_album,tanggal_album, deskripsi_album, foto_album)
				VALUES
				(	'$_POST[nama_album]',
					'$tanggal',
					'$_POST[deskripsi]',
					'$nama_file')");
					}
	else {
	mysql_query("INSERT INTO sh_album
				(nama_album,tanggal_album, deskripsi_album, foto_album)
				VALUES
				(	'$_POST[nama_album]',
					'$tanggal',
					'$_POST[deskripsi]',
					'no_image.jpg')");
	}
	
	header('location:../../album_galeri.php');
}

elseif ($pilih=='album' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadAlbum($nama_file);
	mysql_query("UPDATE sh_album SET 	nama_album ='$_POST[nama_album]',
										tanggal_album ='$tanggal',
										deskripsi_album ='$_POST[deskripsi]',
										foto_album ='$nama_file'
										WHERE id_album ='$_POST[id]'");
							}
	else {
	mysql_query("UPDATE sh_album SET 	nama_album ='$_POST[nama_album]',
										tanggal_album ='$tanggal',
										deskripsi_album ='$_POST[deskripsi]'
										WHERE id_album ='$_POST[id]'");
	
	}
	header('location:../../album_galeri.php');
}


elseif ($pilih=='album' AND $untukdi=='hapus'){
	$albumdata=mysql_query("SELECT * FROM sh_album WHERE id_album='$_GET[id]'");
	$r=mysql_fetch_array($albumdata);
	if ($r[foto_album]!='no_image.jpg'){
	mysql_query("DELETE FROM sh_album WHERE id_album='$_GET[id]'");
	mysql_query("DELETE FROM sh_galeri WHERE id_album='$_GET[id]'");
	unlink("../../../images/foto/galeri/album/$r[foto_album]");
	
	$galeridata=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
	while ($gd=mysql_fetch_array($galeridata)){
	unlink("../../../images/foto/galeri/$gd[nama_galeri]");}
	}
	else {
	mysql_query("DELETE FROM sh_album WHERE id_album='$_GET[id]'");
	mysql_query("DELETE FROM sh_galeri WHERE id_album='$_GET[id]'");
	$galeridata=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]' AND nama_galeri !='no_image.jpg'");
	while ($gd=mysql_fetch_array($galeridata)){
	unlink("../../../images/foto/galeri/$r[nama_galeri]");}
	}
	header('location:../../album_galeri.php');
}

?>
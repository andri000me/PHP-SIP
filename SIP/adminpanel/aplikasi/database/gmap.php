<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

	if (!empty($lokasi_file)){
	
	UploadGambar($nama_file);
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan2 ='$nama_file' WHERE id_pengaturan='14'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan='' WHERE id_pengaturan='14'");
	
					}
	else {
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[embed_code]' WHERE id_pengaturan='14'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan2='' WHERE id_pengaturan='14'");
	}
	
	header('location:../../gmap.php');
?>

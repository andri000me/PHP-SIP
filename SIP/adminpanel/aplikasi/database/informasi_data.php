<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

	if (!empty($lokasi_file)){
	$hapusgambar=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='13'");
	$hg=mysql_fetch_array($hapusgambar);
	unlink("../../../images/$hg[isi_pengaturan]");
	
	UploadGambar($nama_file);
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[nama_sekolah]' WHERE id_pengaturan='8'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[telp_sekolah]' WHERE id_pengaturan='9'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[email_sekolah]' WHERE id_pengaturan='10'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[kepala_sekolah]' WHERE id_pengaturan='11'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[alamat_sekolah]' WHERE id_pengaturan='12'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$nama_file' WHERE id_pengaturan='13'");
	
	
					}
	else {
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[nama_sekolah]' WHERE id_pengaturan='8'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[telp_sekolah]' WHERE id_pengaturan='9'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[email_sekolah]' WHERE id_pengaturan='10'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[kepala_sekolah]' WHERE id_pengaturan='11'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[alamat_sekolah]' WHERE id_pengaturan='12'");
	}
	
	header('location:../../informasi_sekolah.php');

?>
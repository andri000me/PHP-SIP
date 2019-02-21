<?php
include "../../../konfigurasi/koneksi.php";

	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[url]' WHERE id_pengaturan='1'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[status_tambah_admin]' WHERE id_pengaturan='2'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[jml_data]' WHERE id_pengaturan='3'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[data_siswa_status]' WHERE id_pengaturan='4'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[data_alumni_status]' WHERE id_pengaturan='5'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[data_guru_status]' WHERE id_pengaturan='6'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[form_alumni_status]' WHERE id_pengaturan='7'");
	mysql_query("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[buku_tamu]' WHERE id_pengaturan='16'");
	
	header('location:../../pengaturan.php');

?>
<?php
include "../../../konfigurasi/koneksi.php";

	mysql_query("UPDATE sh_pengaturan	SET nama_pengaturan ='$_POST[status_psb]',
										isi_pengaturan ='$_POST[tatacara1]',
										isi_pengaturan2 ='$_POST[tatacara2]'
										WHERE id_pengaturan ='15'");						
	header('location:../../psb_setting.php');

?>
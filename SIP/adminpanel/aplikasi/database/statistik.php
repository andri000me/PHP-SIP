<?php
include "../../../konfigurasi/koneksi.php";
	mysql_query("DELETE FROM sh_statistik");					
	header('location:../../statistik.php');
?>
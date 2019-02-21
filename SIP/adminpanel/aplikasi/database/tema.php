<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

	mysql_query("UPDATE sh_tema SET status='1' WHERE id_tema='$_GET[id]'");
	mysql_query("UPDATE sh_tema SET status='0' WHERE id_tema!='$_GET[id]'");
					
	header('location:../../tema.php');


?>
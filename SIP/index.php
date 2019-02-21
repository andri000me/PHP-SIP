<?php

// Test On Github

    if (file_exists("instalasi/index.php")) {
	session_start();
	$_SESSION['pertama'] = pertama;
	header ('location: instalasi/index.php');
	}
	
	else {
	include "konfigurasi/koneksi.php";
	$tema=mysql_query("SELECT * FROM sh_tema WHERE status='1'");
	$r=mysql_fetch_array($tema);

	if (file_exists("file/tema/$r[nama_tema]/index.php")) {
	include "file/tema/$r[nama_tema]/index.php";
	}
	
	else {
	echo "<h2>Tema belum tersedia</h2>";
	}
}

?>
<?php
include "../konfigurasi/koneksi.php";

mysql_query ("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[nama]' WHERE id_pengaturan='8'");
mysql_query ("UPDATE sh_pengaturan SET isi_pengaturan ='$_POST[url]' WHERE id_pengaturan='1'");

session_start();
unset($_SESSION['kedua']);
header('location:akhir.php');
?>
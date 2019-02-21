<?php
include "../konfigurasi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");

session_start();

mysql_query("INSERT INTO sh_reply (nama, isi_reply, tanggal_komentar, id_komentar_mading)
			VALUES ('$_POST[nama]','$_POST[komentar]',NOW(),'$_POST[id]')");

	echo "<script>window.alert('Terimakasih telah memberi balasan komentar');window.location=('../index.php?p=detmading&id=$_POST[idm]')</script>";
?>
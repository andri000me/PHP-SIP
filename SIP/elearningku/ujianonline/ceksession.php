<?php
session_start();

if (!isset($_SESSION['siswa']))
{
	echo "Anda belum login<br>";
	echo "Silakan Login terlebih dahulu";
	exit;
	
}
 
?>
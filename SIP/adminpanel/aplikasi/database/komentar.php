<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='komentar' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_komentar
				(id_berita, nama_komentar, email_komentar, isi_komentar, tanggal_komentar, status_terima)
				VALUES
				('$_POST[judul_berita]','$_POST[nama_kom]','$_POST[email_kom]','$_POST[isi_kom]','$_POST[tgl_kom]','$_POST[status_terima]')");
				
	header('location:../../komentar.php');
}

elseif ($pilih=='komentar' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_komentar SET nama_komentar ='$_POST[nama_kom]',
										email_komentar ='$_POST[email_kom]',
										isi_komentar ='$_POST[isi_kom]',
										tanggal_komentar ='$_POST[tgl_kom]',
										status_terima ='$_POST[status_terima]',
										id_berita ='$_POST[judul_berita]'
										WHERE id_komentar ='$_POST[id]'");
							
	header('location:../../komentar.php');
}

//Dibawah ini digunakan pada saat posisi di halaman semua data komentar
elseif ($pilih=='komentar' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_komentar WHERE id_komentar ='$_GET[id]'");			
	header('location:../../komentar.php');
}
elseif ($pilih=='komentar' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_komentar SET status_terima='1' WHERE id_komentar='$_GET[id]'");
	header('location:../../komentar.php');
}
elseif ($pilih=='komentar' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_komentar SET status_terima='0' WHERE id_komentar='$_GET[id]'");
	header('location:../../komentar.php');
}
elseif ($pilih=='komentar' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_komentar WHERE id_komentar='$cek[$i]'");
	}
	header('location:../../komentar.php');
}

//Dibawah ini digunakan pada saat posisi di halaman komentar diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_komentar WHERE id_komentar ='$_GET[id]'");			
	header('location:../../komentar.php?pilih=diterima');
}
elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_komentar SET status_terima='0' WHERE id_komentar='$_GET[id]'");
	header('location:../../komentar.php?pilih=diterima');
}
elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_komentar WHERE id_komentar='$cek[$i]'");
	}
	header('location:../../komentar.php?pilih=diterima');
}

//Dibawah ini digunakan pada saat posisi di halaman komentar ditolak
elseif ($pilih=='tolak' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_komentar WHERE id_komentar ='$_GET[id]'");			
	header('location:../../komentar.php?pilih=ditolak');
}
elseif ($pilih=='tolak' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_komentar SET status_terima='1' WHERE id_komentar='$_GET[id]'");
	header('location:../../komentar.php?pilih=ditolak');
}
elseif ($pilih=='tolak' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_komentar WHERE id_komentar='$cek[$i]'");
	}
	header('location:../../komentar.php?pilih=ditolak');
}

<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

if ($pilih=='bukutamu' AND $untukdi=='tambah'){
	mysql_query("INSERT INTO sh_buku_tamu
				(nama_bukutamu, subjek, isi_pesan, email, tanggal_kirim, status)
				VALUES
				(	'$_POST[nama_pengirim]',
					'$_POST[subjek]',
					'$_POST[isi_pesan]',
					'$_POST[email]',
					'$_POST[tanggal_kirim]',
					'$_POST[status_buku]')");
					
	header('location:../../buku_tamu.php');
}

elseif ($pilih=='bukutamu' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_buku_tamu SET 	nama_bukutamu ='$_POST[nama_pengirim]',
											subjek ='$_POST[subjek]',
											isi_pesan ='$_POST[isi_pesan]',
											email ='$_POST[email]',
											tanggal_kirim ='$_POST[tanggal_kirim]',
											status ='$_POST[status_buku]'
											WHERE id_bukutamu ='$_POST[id]'");						
	header('location:../../buku_tamu.php');
}

//Dibawah ini digunakan pada saat posisi tampil semua data buku tamu
elseif ($pilih=='bukutamu' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_buku_tamu WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php');}

elseif ($pilih=='bukutamu' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_buku_tamu SET status='0' WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php');}

elseif ($pilih=='bukutamu' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_buku_tamu SET status='1' WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php');
}

elseif ($pilih=='bukutamu' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_buku_tamu WHERE id_bukutamu='$cek[$i]'");
	}
	header('location:../../buku_tamu.php');
}

//Dibawah ini digunakan pada saat posisi tampil data buku yang diterima
elseif ($pilih=='terima' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_buku_tamu WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php?pilih=terima');}

elseif ($pilih=='terima' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_buku_tamu SET status='0' WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php?pilih=terima');}

elseif ($pilih=='terima' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_buku_tamu SET status='1' WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php?pilih=terima');
}

elseif ($pilih=='terima' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_buku_tamu WHERE id_bukutamu='$cek[$i]'");
	}
	header('location:../../buku_tamu.php?pilih=terima');
}

//Dibawah ini digunakan pada saat posisi tampil data buku yang ditolak
elseif ($pilih=='tolak' AND $untukdi=='hapus'){
	mysql_query("DELETE FROM sh_buku_tamu WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php?pilih=tolak');}

elseif ($pilih=='tolak' AND $untukdi=='tolak'){
	mysql_query("UPDATE sh_buku_tamu SET status='0' WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php?pilih=tolak');}

elseif ($pilih=='tolak' AND $untukdi=='terima'){
	mysql_query("UPDATE sh_buku_tamu SET status='1' WHERE id_bukutamu ='$_GET[id]'");					
	header('location:../../buku_tamu.php?pilih=tolak');
}

elseif ($pilih=='tolak' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_buku_tamu WHERE id_bukutamu='$cek[$i]'");
	}
	header('location:../../buku_tamu.php?pilih=tolak');
}

?>
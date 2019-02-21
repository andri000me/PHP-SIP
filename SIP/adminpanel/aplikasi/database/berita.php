<?php
include "../../../konfigurasi/koneksi.php";
include "../../../konfigurasi/image_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($pilih=='berita' AND $untukdi=='tambah'){
	if (!empty($lokasi_file)){
	UploadGambar($nama_file);
	mysql_query("INSERT INTO sh_berita
				(judul_berita,isi_berita, tanggal_posting, gambar_kecil, status_terbit,status_komentar, status_headline, s_username, id_kategori)
				VALUES
				(	'$_POST[judul_berita]',
					'$_POST[isi_berita]',
					'$tanggal',
					'$nama_file',
					'1',
					'$_POST[status_komentar]',
					'$_POST[status_headline]',
					'$_POST[s_username]',
					'$_POST[kategori]')");
					}
	else {
	mysql_query("INSERT INTO sh_berita
				(judul_berita,isi_berita, tanggal_posting, gambar_kecil, status_terbit,status_komentar, status_headline, s_username, id_kategori)
				VALUES
				(	'$_POST[judul_berita]',
					'$_POST[isi_berita]',
					'$tanggal',
					'no_image.jpg',
					'1',
					'$_POST[status_komentar]',
					'$_POST[status_headline]',
					'$_POST[s_username]',
					'$_POST[kategori]')");
	}
	
	header('location:../../berita.php');
}

elseif ($pilih=='berita' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadGambar($nama_file);
	mysql_query("UPDATE sh_berita SET 	judul_berita ='$_POST[judul_berita]',
										isi_berita ='$_POST[isi_berita]',
										tanggal_posting ='$tanggal',
										gambar_kecil ='$nama_file',
										status_terbit ='1',
										status_komentar ='$_POST[status_komentar]',
										status_headline ='$_POST[status_headline]',
										id_kategori ='$_POST[kategori]'
										WHERE id_berita ='$_POST[id]'");
							}
	else {
	mysql_query("UPDATE sh_berita SET 	judul_berita ='$_POST[judul_berita]',
										isi_berita ='$_POST[isi_berita]',
										tanggal_posting ='$tanggal',
										status_terbit ='1',
										status_komentar ='$_POST[status_komentar]',
										status_headline ='$_POST[status_headline]',
										id_kategori ='$_POST[kategori]'
										WHERE id_berita ='$_POST[id]'");
	
	}
	header('location:../../berita.php');
}

//Dibawah ini digunakan pada saat posisi di halaman semua data berita
elseif ($pilih=='berita' AND $untukdi=='hapus'){
	$beritadata=mysql_query("SELECT * FROM sh_berita WHERE id_berita='$_GET[id]'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM sh_berita WHERE id_berita='$_GET[id]'");
	mysql_query("DELETE FROM sh_komentar WHERE id_berita='$_GET[id]'");
	unlink("../../../images/$r[gambar_kecil]");
	}
	else {
	mysql_query("DELETE FROM sh_berita WHERE id_berita='$_GET[id]'");
	mysql_query("DELETE FROM sh_komentar WHERE id_berita='$_GET[id]'");
	}
	header('location:../../berita.php');
}

elseif ($pilih=='berita' AND $untukdi=='hapusgambar'){
	$beritadata=mysql_query("SELECT * FROM sh_berita WHERE id_berita='$_GET[id]'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	unlink("../../../images/$r[gambar_kecil]");
	mysql_query("UPDATE sh_berita SET gambar_kecil='no_image.jpg' WHERE id_berita='$_GET[id]'");
	}
	header('location:../../berita.php?pilih=edit&id='.$_GET[id]);
}

elseif ($pilih=='berita' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE sh_berita SET status_terbit='1' WHERE id_berita='$_GET[id]'");
	header('location:../../berita.php');
}

elseif ($pilih=='berita' AND $untukdi=='batalkan'){
	mysql_query("UPDATE sh_berita SET status_terbit='0' WHERE id_berita='$_GET[id]'");
	header('location:../../berita.php');
}

elseif ($pilih=='berita' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_berita WHERE id_berita='$cek[$i]'");
	 mysql_query("DELETE FROM sh_komentar WHERE id_berita='$cek[$i]'");
	}
	header('location:../../berita.php');
}


//Dibawah ini digunakan pada saat posisi di halaman berita terbit
elseif ($pilih=='terbit' AND $untukdi=='hapus'){
	$beritadata=mysql_query("SELECT * FROM sh_berita WHERE id_berita='$_GET[id]'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM sh_berita WHERE id_berita='$_GET[id]'");
	mysql_query("DELETE FROM sh_komentar WHERE id_berita='$_GET[id]'");
	unlink("../../../images/$r[gambar_kecil]");
	}
	else {
	mysql_query("DELETE FROM sh_berita WHERE id_berita='$_GET[id]'");
	mysql_query("DELETE FROM sh_komentar WHERE id_berita='$_GET[id]'");
	}
	header('location:../../berita.php?pilih=terbit');
}

elseif ($pilih=='terbit' AND $untukdi=='batalkan'){
	mysql_query("UPDATE sh_berita SET status_terbit='0' WHERE id_berita='$_GET[id]'");
	header('location:../../berita.php?pilih=terbit');
}

elseif ($pilih=='terbit' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_berita WHERE id_berita='$cek[$i]'");
	 mysql_query("DELETE FROM sh_komentar WHERE id_berita='$cek[$i]'");
	}
	header('location:../../berita.php?pilih=terbit');
}

//Dibawah ini digunakan pada saat posisi di halaman berita konsep
elseif ($pilih=='konsep' AND $untukdi=='hapus'){
	$beritadata=mysql_query("SELECT * FROM sh_berita WHERE id_berita='$_GET[id]'");
	$r=mysql_fetch_array($beritadata);
	if ($r[gambar_kecil]!='no_image.jpg'){
	mysql_query("DELETE FROM sh_berita WHERE id_berita='$_GET[id]'");
	mysql_query("DELETE FROM sh_komentar WHERE id_berita='$_GET[id]'");
	unlink("../../../images/$r[gambar_kecil]");
	}
	else {
	mysql_query("DELETE FROM sh_berita WHERE id_berita='$_GET[id]'");
	mysql_query("DELETE FROM sh_komentar WHERE id_berita='$_GET[id]'");
	}
	header('location:../../berita.php?pilih=konsep');
}

elseif ($pilih=='konsep' AND $untukdi=='terbitkan'){
	mysql_query("UPDATE sh_berita SET status_terbit='1' WHERE id_berita='$_GET[id]'");
	header('location:../../berita.php?pilih=konsep');
}

elseif ($pilih=='konsep' AND $untukdi=='hapusbanyak'){
	$cek=$_POST[cek];
	$jumlah=count($cek);
	for($i=0;$i<$jumlah;$i++){
	 mysql_query("DELETE FROM sh_berita WHERE id_berita='$cek[$i]'");
	 mysql_query("DELETE FROM sh_komentar WHERE id_berita='$cek[$i]'");
	}
	header('location:../../berita.php?pilih=konsep');
}

?>
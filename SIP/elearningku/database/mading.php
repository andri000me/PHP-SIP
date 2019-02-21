<?php
include "../../konfigurasi/koneksi.php";
include "../../konfigurasi/image_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];

date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
if ($pilih=='mading' AND $untukdi=='tambah'){
	if (!empty($lokasi_file)){
	UploadMading($nama_file);
	mysql_query("INSERT INTO sh_mading
				(judul_mading,isi_mading, tanggal_posting, gambar_mading, status_terbit,status_komentar, status_headline, nama_siswa, id_kategori)
				VALUES
				(	'$_POST[judul_mading]',
					'$_POST[isi_mading]',
					'$tanggal',
					'$nama_file',
					'0',
					'$_POST[status_komentar]',
					'$_POST[status_headline]',
					'$_POST[nama_siswa]',
					'$_POST[kategori]')");
					}
	else {
	mysql_query("INSERT INTO sh_mading
				(judul_mading,isi_mading, tanggal_posting, gambar_mading, status_terbit,status_komentar, status_headline, nama_siswa, id_kategori)
				VALUES
				(	'$_POST[judul_mading]',
					'$_POST[isi_mading]',
					'$tanggal',
					'no_image.jpg',
					'0',
					'$_POST[status_komentar]',
					'$_POST[status_headline]',
					'$_POST[nama_siswa]',
					'$_POST[kategori]')");
	}
	
	header('location:../index.php?p=mading');
}
if ($pilih=='mading' AND $untukdi=='edit'){
	if (!empty($lokasi_file)){
	UploadMading($nama_file);
	mysql_query("UPDATE sh_mading SET 	judul_mading ='$_POST[judul_mading]',
										isi_mading ='$_POST[isi_mading]',
										gambar_mading ='$nama_file',
										status_terbit ='1',
										id_kategori ='$_POST[kategori]'
										WHERE id_mading ='$_POST[id]'");
							}
	else {
	mysql_query("UPDATE sh_mading SET 	judul_mading ='$_POST[judul_mading]',
										isi_mading ='$_POST[isi_mading]',
										status_terbit ='1',
										id_kategori ='$_POST[kategori]'
										WHERE id_mading ='$_POST[id]'");
	
	}					
	header('location:../index.php?p=mading');
}

elseif ($pilih=='mading' AND $untukdi=='hapusgambar'){
	$madingdata=mysql_query("SELECT * FROM sh_mading WHERE id_mading='$_GET[id]'");
	$r=mysql_fetch_array($madingdata);
	if ($r[gambar_mading]!='no_image.jpg'){
	unlink("../../images/$r[gambar_mading]");
	mysql_query("UPDATE sh_mading SET gambar_mading='no_image.jpg' WHERE id_mading='$_GET[id]'");
	}
	header('location:../index.php?p=mading&pilih=edit&id='.$_GET[id]);
}





?>
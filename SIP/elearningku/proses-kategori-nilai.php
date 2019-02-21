<?php
	// Koneksi ke DB
	include "../konfigurasi/koneksi.php";
	$pilih = $_GET['pilih'];
	
// Insert Data Kategori Nilai
if($pilih == "tambah") {
		//VARIABLE DARI POST
	   $ta = $_POST['ta'];
	   $kat = $_POST['nama_kat'];
	   $mpl = $_POST['mapel'];
	   $kls = $_POST['kelas'];
	
	   $query = "insert into sh_kategori_nilai (nama_kategori_nilai , id_tahun_ajaran , id_mapel_guru , id_kelas) 
				 values('$kat','$ta','$mpl','$kls')";
	   $hasil = mysql_query($query);

	if($hasil){
		?><script language="javascript">document.location.href="index.php?p=kategorinilai";</script><?php
	}else{
		?><script language="javascript">document.location.href="index.php?p=tambahkategorinilai";</script><?php
	}
}

// Ubah Data Kategori Nilai	
if($pilih == "ubah") {
		//VARIABLE DARI POST
	   $ta = $_POST['tahun'];
	   $kat = $_POST['nama_kat'];
	   $mpl = $_POST['mapel'];
	   $kls = $_POST['kelas'];
	
	   $query = "Update sh_kategori_nilai SET nama_kategori_nilai= '$kat', id_tahun_ajaran = '$ta', id_mapel_guru = '$mpl' , id_kelas = '$kls' where id_kategori_nilai = '$_POST[id]'";
	   $hasil = mysql_query($query);
	
if($hasil){
		?><script language="javascript">document.location.href="index.php?p=kategorinilai";</script><?php
	} else {
		?><script language="javascript">document.location.href="index.php?p=tambahkategorinilai";</script><?php
	}
  }

// Hapus Data Kategori Nilai	
if(isset($_GET['id'])) {
	$query_hapus = mysql_query("Delete FROM sh_kategori_nilai where id_kategori_nilai = '$_GET[id]'");
	// Hapus Nilai Sesuai KATEGORI
	$query_hapus_nilai = mysql_query("Delete FROM sh_nilai where id_kategori_nilai = '$_GET[id]'");
if($query_hapus OR $query_hapus_nilai){
		?><script language="javascript">document.location.href="index.php?p=kategorinilai";</script><?php
	} else {
		?><script language="javascript">document.location.href="index.php?p=tambahkategorinilai";</script><?php
	}
  }
  
?>
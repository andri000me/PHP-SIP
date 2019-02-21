<?php
include "../konfigurasi/koneksi.php";
include "../konfigurasi/file_upload.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Y-m-d");
$sandi=MD5($_POST[password]);
$sandi_ortu=$_POST[password];

if ($pilih=='siswa' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_siswa SET 	alamat='$_POST[alamat]',
										email='$_POST[email]',
										telepon='$_POST[telepon]'
										WHERE nis ='$_POST[nis]'");						
	echo "<script>window.alert('Profil anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='guru' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_guru_staff SET 	alamat='$_POST[alamat]',
											email='$_POST[email]',
											telepon='$_POST[telepon]'
											WHERE nip ='$_POST[nip]'");						
	echo "<script>window.alert('Profil anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='ortu' AND $untukdi=='edit'){
	$fileName = $_FILES['foto']['name'];
	move_uploaded_file($_FILES['foto']['tmp_name'], "../images/foto/ortu/".$_FILES['foto']['name']);
	
	mysql_query("UPDATE sh_ortu SET 		pekerjaan_ortu='$_POST[pekerjaan]',
											alamat='$_POST[alamat]',
											nama_ortu='$_POST[nama_ortu]',
											no_hp='$_POST[no_hp]',
											foto_ortu='$fileName'
											WHERE id_ortu ='$_POST[id_ortu]'");						
	echo "<script>window.alert('Profil anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='ortu' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE sh_ortu SET 	password='$sandi_ortu'
										WHERE id_ortu ='$_POST[idortu]'");						
	echo "<script>window.alert('Password anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}


elseif ($pilih=='guru' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE sh_guru_staff	 SET 	password='$sandi'
										 WHERE 	nip ='$_POST[nip]'");						
	echo "<script>window.alert('Password anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}

elseif ($pilih=='guru' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE sh_guru_staff	 SET 	password='$sandi'
										 WHERE 	nip ='$_POST[nip]'");						
	echo "<script>window.alert('Password anda berhasil di update.');window.location=('index.php?p=profil')</script>";
}



elseif ($pilih=='guru' AND $untukdi=='upload'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
	UploadMateri($nama_file);	
	mysql_query("INSERT INTO sh_materi
				(file_materi,judul_materi, deskripsi_materi, id_mapel, nip, tanggal_upload, kelas)
				VALUES
				(	'$nama_file',
					'$_POST[judul_materi]',
					'$_POST[deskripsi]',
					'$_POST[mapel]',
					'$_POST[guru]',
					'$tanggal',
                    '$_POST[kelas]')");
	header('location:index.php?p=upload');
}

elseif ($pilih=='guru' AND $untukdi=='hapus'){
	$dat =mysql_query("SELECT * FROM sh_materi WHERE id_materi='$_GET[id]'");
	$data=mysql_fetch_array($dat);
	unlink("../file/materi/$data[file_materi]");
	mysql_query("DELETE FROM sh_materi WHERE id_materi='$_GET[id]'");
	header('location:index.php?p=upload');
}

?>
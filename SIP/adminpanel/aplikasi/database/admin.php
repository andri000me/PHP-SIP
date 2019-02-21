<?php
include "../../../konfigurasi/koneksi.php";

$pilih=$_GET[pilih];
$untukdi=$_GET[untukdi];
date_default_timezone_set('Asia/Jakarta');
$tanggal=date ("Ymd");
$sandi=MD5($_POST[password]);

if ($pilih=='admin' AND $untukdi=='tambah'){
	$cekusername=mysql_query("SELECT * FROM sh_users WHERE namausers='$_POST[username]'");
	$cek=mysql_num_rows($cekusername);
	
	if ($cek== 0){
	mysql_query("INSERT INTO sh_users
				(id_users, namausers, sandiusers, nama_lengkap_users, level_users, s_username, email_users)
				VALUES
				(	'$sandi',
					'$_POST[username]',
					'$sandi',
					'$_POST[nama_admin]',
					'Admin',
					'$_POST[username]$tanggal',
					'$_POST[email]')");
	}

	else {
	echo "<script>window.alert('Maaf, username tersebut sudah digunakan.');window.location=('../../admin.php')</script>";
	}
	header('location:../../admin.php');
}

elseif ($pilih=='admin' AND $untukdi=='edit'){
	mysql_query("UPDATE sh_users SET 	namausers='$_POST[username]',
										nama_lengkap_users='$_POST[nama_admin]',
										email_users='$_POST[email]'
										WHERE s_username ='$_POST[s_username]'");						
	header('location:../../admin.php');
}

elseif ($pilih=='admin' AND $untukdi=='editadmin'){
	mysql_query("UPDATE sh_users SET 	namausers='$_POST[username]',
										nama_lengkap_users='$_POST[nama_admin]',
										email_users='$_POST[email]'
										WHERE id_users ='$_POST[id]'");						
	header('location:../../admin.php');
}

elseif ($pilih=='admin' AND $untukdi=='gantipassword'){
	mysql_query("UPDATE sh_users SET 	sandiusers='$sandi'
										WHERE id_users ='$_POST[id]'");						
	header('location:../close_window.html');
}


elseif ($pilih=='admin' AND $untukdi=='hapus'){
	$admincurrent=mysql_query("SELECT * FROM sh_users WHERE id_users='$_GET[id]'");
	$ac=mysql_fetch_array($admincurrent);
	
	$adminsuper=mysql_query("SELECT * FROM sh_users WHERE level_users='Super Admin'");
	$r=mysql_fetch_array($adminsuper);
	
	mysql_query ("UPDATE sh_berita SET s_username = '$r[s_username]' WHERE s_username='$ac[s_username]'");
	mysql_query ("UPDATE sh_pengumuman SET s_username = '$r[s_username]' WHERE s_username='$ac[s_username]'");
	mysql_query ("UPDATE sh_agenda SET s_username = '$r[s_username]' WHERE s_username='$ac[s_username]'");
	if ($ac[level_users]=='Super Admin'){
	header('location:../../admin.php');
	}
	else {
	mysql_query("DELETE FROM sh_users WHERE id_users ='$_GET[id]'");
	header('location:../../admin.php');}
}

?>
<?php
include"koneksi.php";

$pass=md5($_POST['password']);
$user=$_POST['username'];

	$sql=mysql_query("select * from user where nama='$user' and pass='$pass'");
	$count=mysql_num_rows($sql);
	$rs=mysql_fetch_array($sql);
		if($count>0){
			session_start();
				$_SESSION['adminsh']      = $rs['idu'];
				$_SESSION['namalengkap']  = $rs['nama'];
				$_SESSION['leveluser']    = $rs['level'];
				
			
			header('location:index.php?module=home');
		} else {
	
			echo"<script>window.alert('Maaf Username atau Password Anda Salah !');
				 window.history.go(-1);</script>";	
}

?>

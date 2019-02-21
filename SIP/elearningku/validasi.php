<?php
include "../konfigurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
$passortu = anti_injection($_POST['password']);
$status	  = $_POST['status'];
if ($status=='guru'){
$login=mysql_query("SELECT * FROM sh_guru_staff WHERE nip='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}
else if ($status=='siswa'){
$login=mysql_query("SELECT * FROM sh_siswa WHERE nis='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}
else if ($status=='ortu'){
$login=mysql_query("SELECT * FROM sh_ortu WHERE username='$username' AND password='$passortu'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}
else if ($status=='admin'){
$login=mysql_query("SELECT * FROM sh_users WHERE namausers='$username' AND sandiusers='$pass'")or die("ERROR SINTAX".mysql_error());
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
}
else {
header ('location: ../index.php?p=login#popup');
}


	if ($ketemu > 0){
	  session_start();
	  if($status=='guru'){
	  $_SESSION['guru']      		= $r[nip];
	  $_SESSION['idguru']      		= $r[id_gurustaff];
	  $_SESSION['namaguru']	  		= $r[nama_gurustaff];
	  header('location:index.php');
	  }
	  else if($status=='ortu'){
	  $_SESSION['username']      	= $r[username];
	  $_SESSION['orangtua']      	= $r[id_ortu];
	  $_SESSION['namaortu']	  		= $r[nama_ortu];
	  header('location:index.php');
	  }
	  else if($status=='siswa'){
	  $_SESSION['siswa']      		= $r[nis];
	  $_SESSION['namasiswa']	  	= $r[nama_siswa];
	  header('location:index.php');
	  }
	  else if($status=='admin'){
	  $_SESSION['adminsh']      = $r[s_username];
	  $_SESSION['namalengkap']  = $r[nama_lengkap_users];
	  $_SESSION['leveluser']    = $r[level_users];
	  header('location:../adminpanel/index.php');
	  }
	}
	else{
	echo "<script>window.alert('Kesalahan kombinasi username dan password, silahkan ulangi lagi.');window.location=('../index.php?p=login#popup')</script>";	  
}

?>

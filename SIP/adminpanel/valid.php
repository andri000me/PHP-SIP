<?php
include "../konfigurasi/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

$login=mysql_query("SELECT * FROM sh_users WHERE namausers='$username' AND sandiusers='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);


if ($ketemu > 0){
  session_start();
  $_SESSION['adminsh']      = $r[s_username];
  $_SESSION['namalengkap']  = $r[nama_lengkap_users];
  $_SESSION['leveluser']    = $r[level_users];


	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE sh_users SET id_users='$sid_baru' WHERE namausers='$username'");
  date_default_timezone_set('Asia/Jakarta');
  $loginterakhir=date("Y-m-d H:i:s");
  mysql_query("UPDATE sh_users SET login_terakhir ='$loginterakhir' WHERE namausers='$username'");
  header('location:index.php');
}
else{

echo "<script>window.alert('Kesalahan kombinasi username dan password, silahkan ulangi lagi.');window.location=('login.php')</script>";
  
}

?>

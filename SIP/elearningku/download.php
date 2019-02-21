<?php
include "../konfigurasi/koneksi.php";

$dir= "../file/materi/";
mysql_query("UPDATE sh_materi SET download=download+1 WHERE id_materi='$_GET[id]'");
$file=mysql_query("SELECT * FROM sh_materi WHERE id_materi='$_GET[id]'");
$r=mysql_fetch_array($file);
$filename=$r[file_materi];

  header("Content-Type: octet/stream");
  header("Pragma: private"); 
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: private",false); 
  header("Content-Type: $ctype");
  header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: ".filesize($dir.$filename));
  readfile("$dir$filename");
  
    exit();   
?>
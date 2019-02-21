<?php
include "../konfigurasi/koneksi.php";

mysql_query("UPDATE sh_sidebar SET isi1 =isi1+1 WHERE id_sidebar='$_POST[poll]'");
echo "<script>window.alert('Terimakasih telah mengikuti polling kami');window.location=('../index.php?p=polling')</script>";

?>
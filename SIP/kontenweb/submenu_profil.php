<?php
$menuprofil=mysql_query("SELECT * FROM sh_info_sekolah WHERE posisi_menu ='0'");
while($mp=mysql_fetch_array($menuprofil)){

	echo "<li><a href="">$mp[nama_info]</a></li>";}
?>
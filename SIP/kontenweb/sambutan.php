<?php
$sambutankepsek=mysql_query("SELECT * FROM sh_info_sekolah WHERE id_info='1'");
$sk=mysql_fetch_array($sambutankepsek);

echo "<h3>$sk[nama_info]</h3>
		<p>$sk[isi_info]</p>";
?>
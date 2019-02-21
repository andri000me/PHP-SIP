<div class="panel panel-primary">
<div class="panel-heading">Detail CCTV</div>
<div class="panel-body">
<?php
		$tv = mysql_query("SELECT * FROM sh_cctv WHERE id_cctv='$_GET[id]'")or die("ERROR".mysql_error());
		$cek_tv=mysql_fetch_array($tv);
		echo "<img src=".$cek_tv['alamat_cctv']." class='img-responsive'/>";
?>
</div>
</div>
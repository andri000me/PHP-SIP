<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-primary">
      <div class="panel-heading">
       <h3 class="panel-title">Lokasi <a href=""><?php echo "$ns[isi_pengaturan]";?> Kami</a></h3>
      </div>
<div class="panel-body">
<center>
<div class="table-responsive">
<table>
<?php
$gmap=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='14'");
$r=mysql_fetch_array($gmap);
			if (!empty($r[isi_pengaturan])){
			echo "$r[isi_pengaturan]";}
			else {
				echo "<tr><td><img src='images/$r[isi_pengaturan2]'></td></tr>";
			}
?>
</table>
</div>
</center>
</div>
</div>
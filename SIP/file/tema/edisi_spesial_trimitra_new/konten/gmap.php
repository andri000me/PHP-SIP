<div class="row">
	<div class="col-md-12">
		<?php
		$gmap=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='14'");
		$r=mysql_fetch_array($gmap);
					if (!empty($r[isi_pengaturan])){
					echo "$r[isi_pengaturan]";}
					else {
						echo "<tr><td><img src='images/$r[isi_pengaturan2]' width='960'></td></tr>";
					}
		?>
	</div>
</div>
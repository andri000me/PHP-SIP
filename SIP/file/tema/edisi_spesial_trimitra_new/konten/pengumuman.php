<div class="row">
	<div class="col-md-12"><h3 class="heading">Pengumuman Sekolah</h3></div>
</div>
<div class="row">
<?php
	$pengumuman=mysql_query("SELECT * FROM sh_pengumuman WHERE ditujukan='all' ORDER BY id_pengumuman LIMIT 6")or die("ERROR".mysql_error());
	$row=mysql_num_rows($pengumuman);
	if($row>0){
	while($datapengumuman=mysql_fetch_array($pengumuman)){?>
		<div class="col-md-6">
		<div class="alert alert-info">
			<h4 style="color:#000;"><?php echo $datapengumuman['judul_pengumuman']?></h4>
			<p><i><?php echo $datapengumuman['isi_pengumuman']?></i></p>
			<p><i><?php echo $datapengumuman['tanggal_pengumuman']?></i></p>
		</div>
		</div>
	<?php }
	}else{
		echo"Belum ada pengumuman..";
	}?>
</div>
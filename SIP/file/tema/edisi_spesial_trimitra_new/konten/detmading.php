<?php
	$detmading=mysql_query("SELECT * FROM sh_mading WHERE status_terbit='1' AND id_mading = '$_GET[id]'");
	$datamading=mysql_fetch_array($detmading)or die("ERROR DB MADING..".mysql_error());
	$tgl=date("d-m-Y", strtotime($datamading['tanggal_posting']));
	
	if($datamading['id_kategori']=="1"){
?>
<div class="row">
	<div class="col-md-12">
		<div class="text-left">
			<img src="images/<?php echo $datamading['gambar_mading']?>" class="img-thumbnail" width="300" style="float:left; margin-right:10px;"/>
			<p><?php echo $datamading['isi_mading']?></p>
			<p class="text-info">Diposting pada : <?php echo $tgl?> Oleh : <?php echo $datamading['nama_siswa']?></p>
		</div>
	</div>
</div><br/>
<?php }else{?>
<div class="row">
	<div class="col-md-8">
		<div class="text-left">
			<p><?php echo $datamading['isi_mading']?></p>
			<p class="text-info">Diposting pada : <?php echo $datamading[tanggal_posting]?> Oleh : <?php echo $datamading['nama_siswa']?></p>
		</div>
	</div>
</div><br/>
<?php }?>

<div class="row">
	<div class="col-sm-12 col-md-12">
		<h3>Mading Terkait Lainnya :</h3>
	</div>
</div>
<div class="row">
<?php 
	$madingterkait=mysql_query("SELECT * FROM sh_mading WHERE id_kategori='$datamading[id_kategori]' AND  status_terbit='1' ORDER BY RAND() LIMIT 3");
	while($md=mysql_fetch_array($madingterkait)){
		echo"<div class=col-md-4>";
		if($datamading['id_kategori']=="1"){
		echo"<img class=img-thumbnail src=images/$md[gambar_mading] width=200/><br/>
			 <a href=?p=detmading&id=$md[id_mading]>$md[judul_mading]</a>";
		}else{
		echo"<a href=?p=detmading&id=$md[id_mading]>$md[judul_mading]</a>";
		}
		echo"</div>";
	}
?>
</div>
<br/>
<div class="row">
<div class="col-md-12"><p class="text-success">Komentar </p></div>
	<?php 
	$s=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$_GET[id]' AND status_terima=1");
	$rmading=mysql_num_rows($s);
	if($rmading>0){
	while($datakomentar=mysql_fetch_array($s)){
	?>
	<div class="col-md-12">
		<div class="text-left thumbnail">
			<p class="text-danger">Dari <?php echo $datakomentar['nama_komentar']?></p><p class="text-info"><small>Tanggal: <?php echo $datakomentar['tanggal_komentar']?></small></p>
			<i><?php echo $datakomentar['isi_komentar']?></i>
		</div>
	</div>
	<?php }
	}else{

		echo"<div class=col-md-12> <p class=text-info><small>Belum ada komentar...</small></p></div>";
	}?>
	<div class="col-md-12"><a href="?p=komentar_mading&id=<?php echo $datamading['id_mading']?>">Berikan Komentar anda..</a></div>
</div>
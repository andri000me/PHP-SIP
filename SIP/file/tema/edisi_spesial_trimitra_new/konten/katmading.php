<div class="row">
<?php
	$katmad=mysql_query("SELECT * FROM sh_mading  WHERE id_kategori='$_GET[id]' AND status_terbit='1'");
	$rowmading=mysql_num_rows($katmad);
	if($rowmading>0){
		while($datamading=mysql_fetch_array($katmad)){
		$tgl=date("d-m-Y", strtotime($datamading['tanggal_posting']));
						$isi_mading = strip_tags($datamading['isi_mading']); 
						$isi = substr($isi_mading,0,300);
?>
		<div class="col-sm-8 col-md-4">
			<div class="text-left">
			<?php if($datamading['id_kategori']=="1"){?>
				<img src="images/<?php echo $datamading['gambar_mading']?>" class="img-thumbnail" width="300" style="float:left;"/>
				<?php
					$komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$datamading[id_mading]' AND status_terima='1'");
					$r=mysql_num_rows($komen);
				?>
				<small><p class="text-info">Diposting pada : <?php echo $tgl?>, Oleh : <?php echo $datamading['nama_siswa']?>, Komentar : <?php echo $r?></p></small>
				<p><?php echo $isi?>..<a href='?p=detmading&id=<?php echo $datamading['id_mading']?>'>Baca selengkapnya...</a></p>
			<?php }else{?>
			<?php
					$komen=mysql_query("SELECT * FROM sh_komentar_mading WHERE id_mading='$datamading[id_mading]' AND status_terima='1'");
					$r=mysql_num_rows($komen);
				?>
				<small><p class="text-info">Diposting pada : <?php echo $tgl?>, Oleh : <?php echo $datamading['nama_siswa']?>, Komentar : <?php echo $r?></p></small>
				<h4><?php echo $datamading['judul_mading']?></h4>
				<p><?php echo $isi?>..<a href='?p=detmading&id=<?php echo $datamading['id_mading']?>'>Baca selengkapnya...</a></p>
			<?php }?>
			</div>
		</div>
<?php }
	}else{?>
		<div class="col-sm-8 col-md-4">
			<div class="text-left">Data Kosong</div>
		</div>
	<?php }?>
</div>
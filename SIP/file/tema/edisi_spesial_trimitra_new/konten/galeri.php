<h3 class="heading">Album Galeri</h3>
<?php
	$album=mysql_query("SELECT * FROM sh_album ORDER BY id_album DESC");
	$cek_album=mysql_num_rows($album);
	if($cek_album > 0){
	while($r=mysql_fetch_array($album)){
	$tgl=date("d M Y", strtotime($r['tanggal_album']));

	$jmlfoto=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$r[id_album]'");
	$hitung=mysql_num_rows($jmlfoto);

		if($hitung > 0 ){
		?>
		<div class="row">
		<div class="col-md-3"><a href="<?php echo "?p=foto&id=$r[id_album]";?>"><img class="img-thumbnail" src="images/foto/galeri/album/<?php echo "$r[foto_album]";?>" width="200"></a>
		<p><b>Album <?php echo "$r[nama_album]</b>";?><br/>
		<?php echo "<small>$tgl</small>";?><br/>
		<?php echo "Jumlah Foto ($hitung)";?></p>
		</div>
		<?php }
		}
	}else { ?>
		<b>Data album galeri belum tersedia</b>
	<?php } ?>
	</div>
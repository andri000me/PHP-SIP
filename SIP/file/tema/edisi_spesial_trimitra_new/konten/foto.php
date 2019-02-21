<?php
$nama_album=mysql_query("SELECT * FROM sh_album WHERE id_album='$_GET[id]'");
$tampilnama=mysql_fetch_array($nama_album);

$jmlfoto=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
$hitung=mysql_num_rows($jmlfoto);
if ($hitung != 0){
?>
<h3 class="heading">Foto Album <?php echo "$tampilnama[nama_album]";?></h3>
<p><?php echo "$tampilnama[deskripsi_album]";?></p>
<div class="row">
<?php
$galeri=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
while ($r=mysql_fetch_array($galeri)){
?>
<div class="col-xs-6 col-md-3">
	<a href="?p=detfoto&id=<?php echo $r['id_galeri']?>#popup">
		<img class="img-thumbnail" src="images/foto/galeri/<?php echo "$r[nama_galeri]";?>" alt="Highslide JS" title="Klik untuk memperbesar" width="200px" height="250px"/>
	</a>
</div>
<?php } ?>
<?php }

else { ?>
<h3>Tidak ada foto dalam album "&nbsp;<?php echo "$tampilnama[nama_album]";?>&nbsp;"</h3>
<?php } ?>
</div>
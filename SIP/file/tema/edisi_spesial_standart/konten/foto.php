<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-default">
<div class="panel-heading"><h3>Data Alumni <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">

<?php
$nama_album=mysql_query("SELECT * FROM sh_album WHERE id_album='$_GET[id]'");
$tampilnama=mysql_fetch_array($nama_album);

$jmlfoto=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
$hitung=mysql_num_rows($jmlfoto);
if ($hitung != 0){
?>
<h3>Foto Album <a href="">"&nbsp;<?php echo "$tampilnama[nama_album]";?>&nbsp;"</a></h3>
<small><?php echo "$tampilnama[tanggal_album]";?></small>
<p><?php echo "$tampilnama[deskripsi_album]";?></p>
<div class="galeriDepan">
<?php
$galeri=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$_GET[id]'");
while ($r=mysql_fetch_array($galeri)){
?>
<p class="thumb"><a id="thumb1" href="images/foto/galeri/<?php echo "$r[nama_galeri]";?>" class="highslide" onclick="return hs.expand(this)">
			<img class="img-responsive" src="images/foto/galeri/<?php echo "$r[nama_galeri]";?>" alt="Highslide JS" title="Klik untuk memperbesar" width="350px"/></a>
</p><?php } ?>
</div>
<?php }

else { ?>
<h3>Tidak ada foto dalam album "&nbsp;<?php echo "$tampilnama[nama_album]";?>&nbsp;"</h3>
<?php } ?>

</div> <!--panel-body -->
</div> <!--panel panel-default-->
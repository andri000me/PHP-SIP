<div class="panel panel-default">
<div class="panel-heading"><h3>Album Galeri <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">

<?php
$album=mysql_query("SELECT * FROM sh_album ORDER BY id_album DESC");
$cek_album=mysql_num_rows($album);
if($cek_album > 0){
while($r=mysql_fetch_array($album)){

$jmlfoto=mysql_query("SELECT * FROM sh_galeri WHERE id_album='$r[id_album]'");
$hitung=mysql_num_rows($jmlfoto);

if($hitung > 0 ){
?>
<div class="albumgaleri">
<p class="thumb"><a href="<?php echo "?p=foto&id=$r[id_album]";?>"><img src="images/foto/galeri/album/<?php echo "$r[foto_album]";?>" width="200px"></a></p><br>
<p><?php echo "<b>$r[nama_album]</b>";?><br>
<?php echo "<small>$r[tanggal_album]</small>";?><br>
<?php
echo "Jumlah Foto ($hitung)";
?></p>
</div>
<?php } } }

else { ?>
<b>Data album galeri belum tersedia</b>
<?php } ?>
</div> <!--panel-body -->
</div> <!--panel panel-default-->
<h3 class="heading">Pendaftaran Siswa Baru Online <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
<?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
?>
<?php echo "$r[isi_pengaturan]";?>
<?php
if ($r[nama_pengaturan]==1){
?>
<div class="table-responsive">
<p class="text-primary">Sekilas Informasi PSB Online</p>
<table class="table">
<?php
$pendaftar=mysql_query("SELECT * FROM sh_psb");
$totalpendaftar=mysql_num_rows($pendaftar);

$laki=mysql_query("SELECT * FROM sh_psb WHERE jenkel='L'");
$pendaftarlaki=mysql_num_rows($laki);

$perempuan=mysql_query("SELECT * FROM sh_psb WHERE jenkel='P'");
$pendaftarperempuan=mysql_num_rows($perempuan);

$nem=mysql_query("SELECT * FROM sh_psb ORDER BY nem DESC");
$nemtertinggi=mysql_fetch_array($nem);
?>
	<tr><td><b>Total Pendaftar</b></td><td><b><a href=""><?php echo "$totalpendaftar"?></a></b></td></tr>
	<tr><td><b>Pendaftar Laki-laki</b></td><td><b><a href=""><?php echo "$pendaftarlaki"?></a></b></td></tr>
	<tr><td><b>Pendaftar Perempuan</b></td><td><b><a href=""><?php echo "$pendaftarperempuan"?></a></b></td></tr>
	<tr><td><b>NEM Tertinggi</b></td><td><b><a href=""><?php echo "$nemtertinggi[nem]"?></a></b></td></tr>
</table>
<p>Silahkan Klik <a href="?p=formpsb"><b>&raquo;disini&laquo;</b></a> untuk melakukan pendaftaran secara online, atau klik
<a href="?p=datapsb"><b>&raquo;disini&laquo;</b></a> untuk melihat data pendaftar.</p>
<?php } ?>
</div><!-- table Responsive -->
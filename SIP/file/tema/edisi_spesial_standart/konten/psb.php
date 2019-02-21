
<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-primary">
<div class="panel-heading"><h3>Pendaftaran Siswa Baru Online <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">

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
<div class="hver">
<a style="float:left;" href="?p=formpsb"><img width="30" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSu8kkYkMpIse45TyDEbSURW-hxTJm_GrH2hEcD7km13v0FXoSxIQ"/> ISI FORM PSB</a>

<p style="float:right;">
<a href="?p=datapsb"><b>LIHAT DAFTAR PESERTA PSB</b></a></p>
</div>
<?php } ?>
</div><!-- table Responsive -->
</div> <!--panel-body -->
</div> <!--panel panel-default-->
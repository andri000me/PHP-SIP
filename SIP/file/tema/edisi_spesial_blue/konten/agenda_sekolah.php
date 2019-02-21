<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-primary">
<div class="panel-heading"><h3 style='font-family:Bree Serif'>Agenda <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">
<?php
	$batas= 5;
	$halaman=$_GET['halaman'];
		If (empty($halaman)){
		$posisi=0;
		$halaman=1;
		}

		else { $posisi=($halaman-1) * $batas;
		}
		$tampil2 = mysql_query ("SELECT * FROM sh_agenda");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$agenda=mysql_query("SELECT * FROM sh_agenda, sh_users WHERE sh_agenda.s_username=sh_users.s_username ORDER BY id_agenda DESC LIMIT $posisi, $batas");
$cek_agenda=mysql_num_rows($agenda);

if($cek_agenda > 0){
while($r=mysql_fetch_array($agenda)){
?>
<div class="panel panel-default">
<table class="table">
	<tr><th class="info hver" colspan="3"><a href=""><?php echo "$r[judul_agenda]";?></a></th></tr>
	<tr><td width="200px"><b>Tanggal Agenda</b></td><td width="3px">:</td><td><?php echo tgl_indo($r[tanggal_agenda]);?></td></tr>
	<tr><td><b>Tempat Pelaksanaan</b></td><td width="3px">:</td><td><?php echo "$r[tempat_agenda]";?></td></tr>
	<tr><td><b>Keterangan</b></td><td>:</td width="3px"><td><?php echo "$r[keterangan_agenda]";?></td></tr>
	<tr><td><b>Ditulis Oleh</b></td><td>:</td width="3px"><td><?php echo "$r[nama_lengkap_users]";?></td></tr>
</table>
</div>
<?php } 
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=agenda&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=agenda&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
}
else { ?>
<b>Data Agenda Belum Tersedia</b>
<?php } ?>
</div>
</div>
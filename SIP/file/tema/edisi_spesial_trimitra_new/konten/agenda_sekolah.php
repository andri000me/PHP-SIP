<div class="row">
	<div class="col-md-12"><h3 class="heading">Agenda Sekolah</h3></div>
</div>
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
	$tgl=date("d-m-Y", strtotime($r['tanggal_agenda']));
?>
<div class="table-responsive">
<table class="table">
	<tr><th colspan="3"><h4	class="text-danger"><?php echo "$r[judul_agenda]";?></h4></th></tr>
	<tr><td><b>Tanggal Agenda</b></td><td width="3px">:</td><td><?php echo "$tgl";?></td></tr>
	<tr><td><b>Tempat Pelaksanaan</b></td><td width="3px">:</td><td><?php echo "$r[tempat_agenda]";?></td></tr>
	<tr><td><b>Keterangan</b></td><td>:</td width="3px"><td><?php echo "$r[keterangan_agenda]";?></td></tr>
	<tr><td><b>Ditulis Oleh</b></td><td>:</td width="3px"><td><?php echo "$r[nama_lengkap_users]";?></td></tr>
</table>
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
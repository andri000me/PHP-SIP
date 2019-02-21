<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 style="font-family:Bree Serif;">Pengumuman <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
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
		$tampil2 = mysql_query ("SELECT * FROM sh_pengumuman");
		$jmldata = mysql_num_rows($tampil2);
		$jmlhal = ceil($jmldata/$batas);
$pengumuman=mysql_query("SELECT * FROM sh_pengumuman, sh_users WHERE sh_pengumuman.s_username=sh_users.s_username ORDER BY id_pengumuman DESC LIMIT $posisi, $batas");
$cek_pengumuman=mysql_num_rows($pengumuman);

if($cek_pengumuman > 0){
while($r=mysql_fetch_array($pengumuman)){
?>
<table class="table">
	<tr><th colspan="3"><a href=""><?php echo "$r[judul_pengumuman]";?></a></th></tr>
	<tr><td><b>Tanggal Posting</b></td><td width="3px">:</td><td><?php echo "$r[tanggal_pengumuman]";?></td></tr>
	<tr><td><b>Diterbitkan oleh</b></td><td width="3px">:</td><td><?php echo "$r[nama_lengkap_users]";?></td></tr>
	<tr><td colspan="3"><?php echo "$r[isi_pengumuman]";?></td></tr>
</table>
<?php } 
		if ($halaman > 1){
		$prev=$halaman-1;
		echo 	"	<div class='hal' style='float: left'><a href='?p=pengumuman&halaman=$prev' title='Halaman Sebelumnya'>&laquo; Sebelumnya</a></div>";
		}
		if ($halaman < $jmlhal) {
		$next=$halaman+1;
		echo "	<div class='hal' style='float: right'><a href='?p=pengumuman&halaman=$next' title='halaman Berikutnya'>Berikutnya &raquo;</a></div>"; }
		}
		else {?>
		<b>Data Pengumuman Belum Tersedia</b>
		<?php } ?>
</div>
</div>
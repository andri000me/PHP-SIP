<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Download Materi</h3></div>
<div class="panel-body">

<?php
$detailmateri= mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff WHERE sh_materi.id_mapel=sh_mapel.id_mapel
                            AND sh_materi.nip=sh_guru_staff.nip AND id_materi='$_GET[id]'") or die("ERROR BOSS".mysql_error());
$data=mysql_fetch_array($detailmateri);
?>
		<table class="table">
			<tr class="form"><th class="garis" colspan="2" style="text-align: center">Detail Materi</th></tr>
			<tr class="form"><td width="150px"><b>Judul Materi</b></td><td><input type="text" class="form-control" value="<?php echo $data[judul_materi]?>" disabled=""/></td></tr>
			<tr class="form"><td><b>Guru Pengampu</b></td><td><input type="text" class="panjang" value="<?php echo $data[nama_gurustaff]?>" disabled></td></tr>
			<tr class="form"><td><b>Tanggal Upload</b></td><td><input type="text" class="panjang" value="<?php echo $data[tanggal_upload]?>" disabled></td></tr>
			<tr class="form"><td><b>Mata Pelajaran</b></td><td><input type="text" class="panjang" value="<?php echo $data[nama_mapel]?>" disabled></td></tr>
			<tr class="form"><td><b>Deskripsi</b></td><td><textarea disabled><?php echo $data[deskripsi_materi]?></textarea></td></tr>
			<tr class="form"><td><b>Jumlah Download</b></td><td><b><u><a href=""><?php echo $data[download]?></a></u></b>
			</td></tr>
			<tr class="form"><td><b>Download</b></td><td><a href="<?php echo "download.php?id=$data[id_materi]";?>"><b>[DOWNLOAD]</b></a></td></tr>
		</table>
</div>
</div>
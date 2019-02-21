<?php
$namamapel=mysql_query("SELECT * FROM sh_mapel WHERE id_mapel='$_GET[id]'");
$namajudul=mysql_fetch_array($namamapel);
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Data Materi Pelajaran <?php echo $namajudul[nama_mapel]?></h3></div>
<div class="panel-body">

 <div class="tabel-resposive">
		<table class="table" id="results"  style="font-size:13px; ">
			<tr>
                <td class="hidden-xs"><strong>No</strong></td>
				<td><strong>Judul Materi</strong></td>
				<td class="hidden-xs"><strong>Mata Pelajaran</strong></td>
				<td><strong>Guru Pengampu</strong></td>
				<td class="hidden-xs"><strong>Tgl. Upload</strong></td>
				<td class="hidden-xs form"><b>Deskripsi</b></td>
				<td></td>
			</tr>
			<?php
			$no=1;
			$semua=mysql_query("SELECT * FROM sh_materi, sh_mapel, sh_guru_staff 
			WHERE sh_materi.id_mapel=sh_mapel.id_mapel AND sh_materi.nip=sh_guru_staff.nip AND sh_materi.id_mapel='$_GET[id]' ORDER BY id_materi DESC");
			$hitung=mysql_num_rows($semua);
			if ($hitung > 0){
			while($sm=mysql_fetch_array($semua)){
			?>
			<tr>
				<td class="hidden-xs"><?php echo $no?></td>
				<td><?php echo $sm[judul_materi]?></td>
				<td class="hidden-xs"><?php echo $sm[nama_mapel]?></td>
				<td><i><a href="<?php echo "?p=pguru&nip=$sm[nip]";?>"><?php echo $sm[nama_gurustaff]?></a></i></td>
				<td class="hidden-xs"><?php echo $sm[tanggal_upload]?></td>
				<td class="hidden-xs"><?php echo $sm[deskripsi_materi]?></td>
				<td><a href="<?php echo "download.php?id=$sm[id_materi]";?>"><img src="http://icons.iconarchive.com/icons/dtafalonso/android-lollipop/512/Downloads-icon.png" width="30px" title="Download"/></a></td>
				
			</tr>
			<?php $no++; }}
			else  {?>
			<tr><td colspan="5"><b>Belum ada materi yang diupload</b></td></tr>
			<?php } ?>
		</table>
  </div>
  </div>
  </div>
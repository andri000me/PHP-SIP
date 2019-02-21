<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<?php
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>

<div id="siswa" class="panel panel-primary">
<div class="panel-heading"><h3 style="font-family:Bree Serif;">Hasil Pencarian Siswa <a href=""><?php echo "$ns[isi_pengaturan]";?></a> dengan kata kunci "<?php echo "$cari";?>"</h3></div>
<div class="panel-body">

<div class="table-responsive">




<form method="POST" action="?p=siswapencarian#siswa" style="float:right">
<input type="text" placeholder="Nama atau NIS" required class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="table" id="results">
<tr>
<th class="garis" width="20px">No</th>
<th class="garis">Nama Siswa</th>
<th class="garis"><form method="POST" action="?p=siswajk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form></th>
<th class="garis"><form method="POST" action="?p=siswakelas" style="float:left; margin-left: 5px">
<select name="kelas" onChange="this.form.submit()">
	<option selected>Kelas</option>
	<?php
	$kelas=mysql_query("SELECT * FROM sh_kelas ORDER BY id_kelas");
	while($k=mysql_fetch_array($kelas)){
	?>
	<option value="<?php echo "$k[id_kelas]";?>"><?php echo "$k[nama_kelas]";?></option>
	<?php } ?>
</select>
</form></th>
</tr>
<?php
$no=1;
$siswa=mysql_query("SELECT * FROM sh_siswa, sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas  AND status_siswa='1' AND nama_siswa LIKE '%$cari%' OR sh_siswa.id_kelas=sh_kelas.id_kelas  AND status_siswa='1' AND nis LIKE '%$cari%' ORDER BY nama_siswa ASC");
$hitung=mysql_num_rows($siswa);
if ($hitung > 0){
while($r=mysql_fetch_array($siswa)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='4'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_siswa]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailsiswa&nis=$r[nis]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_siswa]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php if($r['jenkel']=="L"){
	   echo"Laki-laki";
	}elseif($r['jenkel']=="P"){
	   echo"Perempuan";
	}?></td>
	<td class="garis"><?php echo "$r[nama_kelas]";?></td>
</tr>
<?php $no++; }}
else {
echo "<tr class='garis'><td colspan='4'>Data tidak ditemukan</td></tr>";
}
?>
</table>
				
</div> <!--table-responsive-->
</div> <!--panel-body -->
</div> <!--panel panel-default-->
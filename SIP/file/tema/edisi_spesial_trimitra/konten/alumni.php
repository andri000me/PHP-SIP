<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 style="font-family:Bree Serif;">Data Alumni <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">

<div class="table-responsive">
<?php
$formalumni=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='7'");
$f=mysql_fetch_array($formalumni);

if ($f[isi_pengaturan] != 0){
?>
<div class="hver">
<a style="float:left;" href="?p=formalumni"><img width="30" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSu8kkYkMpIse45TyDEbSURW-hxTJm_GrH2hEcD7km13v0FXoSxIQ"/> ISI FORM ALUMNI</a>
</div>
<?php } ?>

<form method="POST" action="?p=alumnipencarian" style="float:right">
<input type="text" placeholder="Nama" class="cari" name="cari" required><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="table" id="results">
<tr><th class="garis" width="20px">No</th>
<th class="garis">Nama Alumni</th>
<th class="garis"><form method="POST" action="?p=alumnijk">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form></th>
<th class="garis">Tahun Lulus</th></tr>
<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 30;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM sh_siswa WHERE status_siswa='0' ORDER BY nama_siswa ASC";
$pageQry 	= mysql_query($pageSql) or die ("Error: ".mysql_error());
$jmlData 	= mysql_num_rows($pageQry);
$maksData	= ceil($jmlData/$baris);

$no=$halaman+1;
$alumni=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' ORDER BY nama_siswa ASC LIMIT $halaman, $baris");
$hitungalumni=mysql_num_rows($alumni);

if($hitungalumni > 0){
while($r=mysql_fetch_array($alumni)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='5'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_siswa]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailalumni&id=$r[id_siswa]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_siswa]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php if($r['jenkel']=="L"){
	   echo"Laki-laki";
	}elseif($r['jenkel']=="P"){
	   echo"Perempuan";
	}?></td>
	<td class="garis"><?php echo "$r[tahun_lulus]";?></td>
</tr>
<?php $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data alumni belum ada</b></td></tr>
<?php } ?>
<tr>
    <td class="garis" colspan="2"><strong>Jumlah Data :</strong> <?php echo $jmlData; ?> </td>
    <td class="garis" colspan="2" align="right"><strong>Halaman ke :</strong>
    <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?p=alumni&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>
</table>
				
	

</div> <!--table-responsive-->
</div> <!--panel-body -->
</div> <!--panel panel-default-->
<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>


<div class="panel panel-primary">
<div class="panel-heading"><h3 style="font-family:Bree Serif;">Data Guru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div><!--panel-heading-->
<div class="panel-body">

<div class="table-responsive">


<form method="POST" action="?p=gurupencarian" style="float:right">
<input type="text" placeholder="Nama atau NIP" class="cari" name="cari" required><input type="submit" class="tombol"  style="margin-bottom: 20px" value="Cari">
</form>

<table class="table table-responsive" id="results">
<tr>
	<th style="font-size:15px;">No</th>
	<th style="font-size:15px;">Nama Staff Pengajar</th>
	<th style="font-size:15px;"><form method="POST" action="?p=gurujk">
		<select class="form" name="jk" onChange="this.form.submit()">
			<option selected>Jenis Kelamin</option>
			<option value="L">Laki laki</option>
			<option value="P">Perempuan</option>
		</select>
		</form></th>
	<th style="font-size:15px;">Mengajar</th>
</tr>
<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 30;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM sh_guru_staff WHERE posisi='guru' ORDER BY nama_gurustaff ASC";
$pageQry 	= mysql_query($pageSql) or die ("Error: ".mysql_error());
$jmlData 	= mysql_num_rows($pageQry);
$maksData	= ceil($jmlData/$baris);

$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru' ORDER BY nama_gurustaff ASC LIMIT $halaman, $baris ");
$hitungguru=mysql_num_rows($gurustaff);

if($hitungguru > 0){
while($r=mysql_fetch_array($gurustaff)){
?>
<tr class="garis"><td class="garis"><?php echo "$no";?></td>
	<?php
	$detaildata=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='6'");
	$dd=mysql_fetch_array($detaildata);
		if ($dd[isi_pengaturan]== 0){
	?>
	<td class="garis"><b><?php echo "$r[nama_gurustaff]";?></b></td>
	<?php }
	else { ?>
	
	<td class="garis"><a href="<?php echo "?p=detailguru&nip=$r[nip]";?>" title="Klik untuk melihat detail data"><b><?php echo "$r[nama_gurustaff]";?></b></a></td>
	<?php } ?>
	<td class="garis"><?php if($r['jenkel']=="L"){
	   echo"Laki-laki";
	}elseif($r['jenkel']=="P"){
	   echo"Perempuan";
	}?></td>
	<td class="garis"><?php
				$profilsay=mysql_query("SELECT * FROM  sh_mapel_guru WHERE id_gurustaff='$r[id_gurustaff]'");
				while($p=mysql_fetch_array($profilsay)){ echo "$p[nama_mapel],&nbsp;";} ?></td>
</tr>
<?php $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data guru belum ada</b></td></tr>
<?php } ?>
<tr>
    <td class="garis" colspan="2"><strong>Jumlah Data :</strong> <?php echo $jmlData; ?> </td>
    <td class="garis" colspan="2" align="right"><strong>Halaman ke :</strong>
    <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?p=guru&hal=$list[$h]'>$h</a> ";
	}
	?></td>
  </tr>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
</div> <!--table-responsive-->
</div> <!--panel-body -->
</div> <!--panel panel-default-->
<div class="row">
	<div class="col-md-12"><h3 class="heading">Data Guru</h3></div>
</div>
<div class="row">
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=gurujk" class="form-horizontal">
			<select name="jk" onChange="this.form.submit()" class="form-control">
				<option selected>Jenis Kelamin</option>
				<option value="L">Laki laki</option>
				<option value="P">Perempuan</option>
			</select>
		</form>
	</div>
	<div class="col-sm-8 col-md-4"></div>
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=gurupencarian" class="form-group">
			<div class="input-group">
				<input type="text"  class="form-control" name="cari">
				<span class="input-group-btn">
					<button class="btn btn-default">Cari</button>
				</span>
			</div>
		</form>
	</div>
</div>


<div class="table-responsive">
<table class="table" id="results" width="100%">
<tr><th class="garis" width="5%">No</th><th class="garis" width="30%">Nama Staff Pengajar</th><th class="garis" width="15%">Jenis Kelamin</th><th class="garis">Mengajar</th></tr>
<?php
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 20;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM sh_guru_staff WHERE posisi='guru' ORDER BY nama_gurustaff ASC";
$pageQry 	= mysql_query($pageSql) or die ("Error: ".mysql_error());
$jmlData 	= mysql_num_rows($pageQry);
$maks	= ceil($jmlData/$baris);

$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru' ORDER BY nama_gurustaff DESC LIMIT $halaman, $baris ");
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
	<td class="garis">
	<?php $profilsay=mysql_query("SELECT * FROM  sh_mapel_guru WHERE id_gurustaff='$r[id_gurustaff]'");
		  while($p=mysql_fetch_array($profilsay)){ echo "$p[nama_mapel],&nbsp;";} ?>
	</td>
</tr>
<?php $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data guru belum ada</b></td></tr>
<?php } ?>
<tr>
    <td class="garis" colspan="2">
		<nav aria-label="Page navigation">
		  <ul class="pagination">
			<li>
			  <a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			  </a>
			</li>
			<?php
			for ($h = 1; $h <= $maks; $h++) {
				$list[$h] = $baris * $h - $baris;
				echo " <li><a href='?p=guru&hal=$list[$h]'>$h</a></li>";
			}
			?> 
			<li>
			  <a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
		  </ul>
		</nav>
	</td>
	<td class="garis" colspan="2" align="right"><strong>Jumlah Data :</strong> <?php echo $jmlData; ?> </td>
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
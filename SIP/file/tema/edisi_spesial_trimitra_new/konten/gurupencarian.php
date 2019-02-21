<?php
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>

<div class="row">
	<div class="col-md-12">
		<h3 class="heading">Data Guru Pengajar</h3>
		<p>Hasil Pencarian Guru Pengajar dengan kata kunci <b><i><?php echo "$cari";?></i></b></p>
	</div>
</div>


<div class="row">
	<div class="col-md-4">
		<form method="POST" action="?p=gurujk" class="form-horizontal">
			<select name="jk" onChange="this.form.submit()" class="form-control">
				<option selected>Jenis Kelamin</option>
				<option value="L">Laki laki</option>
				<option value="P">Perempuan</option>
			</select>
		</form>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
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
<table class="table" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff Pengajar</th><th class="garis">Jenis Kelamin</th><th class="garis">Mengajar</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff WHERE posisi='guru' AND nama_gurustaff LIKE '%$cari%' ORDER BY nama_gurustaff ASC");
$hitung=mysql_num_rows($gurustaff);

if ($hitung > 0){
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
<?php $no++; } }
else {
echo "<tr class='garis'><td colspan='4'>Data tidak ditemukan</td></tr>";
}
?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

</div> <!--table-responsive-->
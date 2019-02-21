<div class="row">
	<div class="col-md-12"><h3 class="heading">Data Siswa</h3></div>
</div>

<div class="row">
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=siswajk" class="form-horizontal">
			<select name="jk" onChange="this.form.submit()" class="form-control">
				<option selected>Jenis Kelamin</option>
				<option value="L">Laki laki</option>
				<option value="P">Perempuan</option>
			</select>
		</form>
	</div>
	<div class="col-sm-8 col-md-4"></div>
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=siswapencarian" class="form-group">
			<div class="input-group">
				<input type="text"  class="form-control" name="cari">
				<span class="input-group-btn">
					<button class="btn btn-default">Cari</button>
				</span>
			</div>
		</form>
	</div>
</div>
<div class="row">	
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=siswakelas" class="form-horizontal">
			<select name="kelas" onChange="this.form.submit()" class="form-control">
				<option selected>Kelas</option>
				<?php
				$kelas=mysql_query("SELECT * FROM sh_kelas ORDER BY id_kelas");
				while($k=mysql_fetch_array($kelas)){
				?>
				<option value="<?php echo "$k[id_kelas]";?>"><?php echo "$k[nama_kelas]";?></option>
				<?php } ?>
			</select>
		</form>
	</div>
</div><br/>
<div class="table-responsive">
<table class="table" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Siswa</th><th class="garis">Jenis Kelamin</th><th class="garis">Kelas</th></tr>
<?php
$baris=20;
$hal=isset($_GET['hal']) ? $_GET['hal']:0;
$s_siswa=mysql_query("SELECT * FROM sh_siswa");
$r_siswa=mysql_num_rows($s_siswa);
$maks=ceil($r_siswa/$baris);

$no=1;
$siswa=mysql_query("SELECT * FROM sh_siswa, sh_kelas 
					WHERE sh_siswa.id_kelas=sh_kelas.id_kelas  AND 
					status_siswa='1' ORDER BY nama_siswa DESC LIMIT $hal, $baris");
					
$hitungsiswa=mysql_num_rows($siswa);

if($hitungsiswa > 0){
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
else { ?>
<tr class="garis"><td colspan="4"><b>Data siswa belum ada</b></td></tr>
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
		echo " <li><a href='?p=siswa&hal=$list[$h]'>$h</a></li>";
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
    <td class="garis" colspan="2" align="right"><strong>Jumlah Data :</strong> <?php echo $r_siswa; ?></td>
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
<div class="row">
	<div class="col-md-12"><h3 class="heading">Data Alumni</h3></div>
</div>

<div class="row">
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=alumnijk" class="form-horizontal">
			<select name="jk" onChange="this.form.submit()" class="form-control">
				<option selected>Jenis Kelamin</option>
				<option value="L">Laki laki</option>
				<option value="P">Perempuan</option>
			</select>
		</form>
	</div>
	<div class="col-sm-8 col-md-4"></div>
	<div class="col-sm-8 col-md-4">
		<form method="POST" action="?p=alumnipencarian" class="form-group">
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
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Alumni</th><th class="garis">Jenis Kelamin</th><th class="garis">Tahun Lulus</th></tr>
<?php
$no=1;
$alumni=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' AND jenkel='$_POST[jk]' ORDER BY nama_siswa ASC");
$cek_alumni=mysql_num_rows($alumni);
if($cek_alumni > 0){
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
<?php $no++; } }

else {?>
<tr class="garis"><td class="garis" colspan="4">
Data alumni <?php
if($_POST[jk]=='L'){ echo "Laki-laki"; }
else { echo "Perempuan"; }
?> belum tersedia
</td></tr>
<?php } ?>
</table>
				<div id="pageNavPosition"></div>
		
		
			    <script type="text/javascript"><!--
        var pager = new Pager('results', 30); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
	
	
<?php
$formalumni=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='7'");
$f=mysql_fetch_array($formalumni);

if ($f[isi_pengaturan] != 0){
?>
<p style="margin-top: 30px">
Klik <a href="?p=formalumni"><b>&raquo;disini&laquo;</b></a> untuk mengisi form data alumni
</p>
<?php } ?>
</div> <!--table-responsive-->
</div> <!--panel-body -->
</div> <!--panel panel-default-->
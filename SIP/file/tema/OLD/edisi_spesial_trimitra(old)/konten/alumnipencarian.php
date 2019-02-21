<?php
$cari = trim($_POST['cari']);
$cari = htmlentities(htmlspecialchars($cari), ENT_QUOTES);
?>

<div class="panel panel-default">
<div class="panel-heading"><h3>Hasil Pencarian Alumni <a href=""><?php echo "$ns[isi_pengaturan]";?></a> dengan kata kunci <a href="">"<?php echo "$cari";?>"</a></h3></div>
<div class="panel-body">

<div class="table-responsive">
<form method="POST" action="?p=alumnijk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=alumnipencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol" style="margin-bottom: 20px" value="Cari">
</form>

<table class="table" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Alumni</th><th class="garis">Jenis Kelamin</th><th class="garis">Tahun Lulus</th></tr>
<?php
$no=1;
$alumni=mysql_query("SELECT * FROM sh_siswa WHERE status_siswa='0' AND nama_siswa LIKE '%$cari%' ORDER BY nama_siswa ASC");
$hitung =mysql_num_rows($alumni);

if ($hitung > 0){
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
else  {
echo "<tr class='garis'><td colspan='4'>Data tidak ditemukan</td></tr>";
}?>
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
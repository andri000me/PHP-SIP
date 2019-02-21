<div class="panel panel-default">
<div class="panel-heading"><h3>Data Guru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div><!--panel-heading-->
<div class="panel-body">

<div class="table-responsive">
<form method="POST" action="?p=gurujk" style="float:left">
<select name="jk" onChange="this.form.submit()">
	<option selected>Jenis Kelamin</option>
	<option value="L">Laki laki</option>
	<option value="P">Perempuan</option>
</select>
</form>

<form method="POST" action="?p=gurupencarian" style="float:right">
<input type="text" class="cari" name="cari"><input type="submit" class="tombol"  style="margin-bottom: 20px" value="Cari">
</form>

<table class="table" id="results">
<tr><th class="garis" width="20px">No</th><th class="garis">Nama Staff Pengajar</th><th class="garis">Jenis Kelamin</th><th class="garis">Mengajar</th></tr>
<?php
$no=1;
$gurustaff=mysql_query("SELECT * FROM sh_guru_staff, sh_mapel WHERE sh_guru_staff.id_mapel=sh_mapel.id_mapel AND posisi='guru' ORDER BY nama_gurustaff ASC");
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
	<td class="garis"><?php echo "$r[nama_mapel]";?></td>
</tr>
<?php $no++; }}

else { ?>
<tr class="garis"><td colspan="4"><b>Data guru belum ada</b></td></tr>
<?php } ?>
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
<div class="row">
	<div class="col-md-12"><h3 class="heading">Buku Tamu</h3></div>
</div>
<div class="row">
<div class="col-md-12">
<p class="text-info">
Silahkan mengisi buku tamu pada form dibawah ini untuk memberikan kritik maupun saran kepada kamu. Setiap buku tamu yang masuk, kami akan sangat menghargainya.
</p><br />
<form class="form-horizontal" role="form" method="POST" action="kontenweb/insert_bukutamu.php" name="formbuku" id="formbuku">
<div class="row">
	<div class="col-sm-3"><label class="control-label"><b>Nama *</b></label></div>
    <div class="col-sm-9"><input type="text" class="form-control" name="nama">&nbsp;<small><i>Harus diisi</i></small></div>
</div><!--Row Nama-->
<div class="row">
	<div class="col-sm-3"><label class="control-label"><b>Email *</b></label></div>
    <div class="col-sm-9"><input type="text" class="form-control" name="email">&nbsp;<small><i>Harus diisi (Tidak akan diterbitkan)</i></small></div>
</div><!--Row Email-->
<div class="row">
    <div class="col-sm-3"><label class="control-label"><b>Subjek *</b></label></div>
    <div class="col-sm-9"><input type="text" class="form-control" name="subjek"/><br /></div>
</div><!--Row Subjek-->
<div class="row">
    <div class="col-sm-3"><label class="control-label"><b>Pesan *</b></label></div>
    <div class="col-sm-9"><textarea name="pesan" class="form-control" rows="5"></textarea><br /></div>
</div><!--Row Pesan-->
<div class="row">
    <div class="col-sm-3"><label class="control-label"></label></div>
    <div class="col-sm-9">
    <input type="submit" class="btn-primary btn-sm" value="Kirim">&nbsp;<input type="reset" class="btn-danger btn-sm" value="Reset">
    </div>
</div>	
</form>
<?php include "file/tema/edisi_spesial_trimitra/form_bukutamu.php";?>

<?php
$tampilpesan=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='16'");
$tp=mysql_fetch_array($tampilpesan);
if ($tp[isi_pengaturan]== 1){
?>

<ul style="list-style: none; padding-left: 5px;">
	<?php $bukutamu=mysql_query("SELECT * FROM sh_buku_tamu WHERE status='1' ORDER BY id_bukutamu DESC");
			while($b=mysql_fetch_array($bukutamu)){ 
	$tgl=date("d-m-Y", strtotime($b['tanggal_kirim']));?>
	<li style="padding: 5px 0 5px 0; border-bottom: 1px solid #dcdcdc">
	<p><b><?php echo "Pesan dari : <a href=''>$b[nama_bukutamu]</a>";?></b><br><small><?php echo "Tanggal : $tgl";?></small></p>
	<p><?php echo "<b>Komentar :</b><br />$b[isi_pesan]"?></p>
	<?php } ?>
	</li>
		
</ul>
<?php } ?>
</div> <!--panel-body -->
</div> <!--panel panel-default-->
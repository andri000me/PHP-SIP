<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<?php
$formalumni=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='7'");
$f=mysql_fetch_array($formalumni);

if ($f[isi_pengaturan] != 0){
?>
<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
<!-- Date Time Picker -->
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
	   $(document).ready(function(){
        $("#tanggal1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>
<div class="panel panel-primary">
<div class="panel-heading"><h3>Form Alumni <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3></div>
<div class="panel-body">
<p class="text-info">
Silahkan mengisi data alumni pada form dibawah ini, diharapkan data yang anda masukkan adalah data yang valid.
</p><br />

<form class="form-horizontal" role="form" method="POST" action="kontenweb/insert_alumni.php" name="tambahalumni" id="tambahalumni">
<div class="row">
	<div class="col-sm-3"><label class="control-label"><b>Nama Alumni *</b></label></div>
    <div class="col-sm-9"><input type="text" name="nama_alumni" class="form-control"></div>
</div>
<div class="row">    
	<div class="col-sm-3"><label class="control-label"><b>Jenis Kelamin *</b></label></div>
	<div class="col-sm-9">
      <div class="radio">
      <label><input type="radio" name="jk" value="L" class="radio"/>Laki-laki</label>
      </div>
      <div class="radio">
 	  <label><input type="radio" name="jk" value="P" class="radio"/>Perempuan</label>
      </div><br />
    </div>
</div>
<div class="row">    
 	<div class="col-sm-3"><label class="control-label"><b>Tempat Lahir *</b></label></div>
	<div class="col-sm-3"><input type="text" name="tempat_lahir" class="form-control">,</div> 
    <div class="col-sm-2"><label class="control-label"><b>Tanggal Lahir *</b></label></div>
	<div class="col-sm-4"><input placeholder="YYYY-MM-DD" type="text" id="tanggal" name="tanggal_lahir" class="form-control"><br /></div>
</div>
<div class="row"> 
	<div class="col-sm-3"><label class="control-label"><b>Alamat</b></label></div>
    <div class="col-sm-9"><textarea name="alamat" rows="5" class="form-control"></textarea><br /></div>
</div>
<div class="row">			
    <div class="col-sm-3"><label class="control-label"><b>Tahun Lulus *</b></label></div>
	<div class="col-sm-4">
                 <?php $thn_skrg=date("Y");
				  echo "<select name=tahun_lulus class='form-control'>
				  <option value='' selected>Pilih Tahun</option>";
				  for ($thn=1990;$thn<=$thn_skrg;$thn++){
				  echo "<option value=$thn>$thn</option>";
				  }
				  echo "</select><br />"; ?>
	</div>
    <div class="col-sm-5"></div>
</div>
<div class="row">			
	<div class="col-sm-3"><label class="control-label"><b>Email</b></label></div>
    <div class="col-sm-9"><input type="text" name="email" class="form-control"/><br /></div>
</div>
<div class="row">
    <div class="col-sm-3"><label class="control-label"><b>Telepon/ HP</b></label></div>
    <div class="col-sm-9"><input type="text" name="telepon" class="form-control"/><br /></div>
</div><!--row Telepon/ HP-->
<div class="row">			
	<div class="col-sm-3"><label class="control-label"><b>Pekerjaan Sekarang</b></label></div>
    <div class="col-sm-9"><input type="text" name="pekerjaan_sekarang" class="form-control"><br /></div>
</div><!--row Pekerjaan Sekarang-->
<div class="row">
    <div class="col-sm-3"><label class="control-label"><b>Informasi Tambahan</b></label></div>
    <div class="col-sm-9"><textarea name="info_tambahan" class="form-control"></textarea><br /></div>
</div><!--row Informasi Tambahan-->
<div class="row">
<div class="col-sm-3"><label class="control-label"></label></div>
<div class="col-sm-9">
  <img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" />
  <br /><br /><input type="text" name="kode" class="form-control">&nbsp;<small><i>Masukkan kode diatas</i><br /><br />
</div>
</div><!--row Captcha-->
<div class="row">
<div class="col-sm-3"></div>						
<div class="col-sm-9">
   <input type="submit" class="btn-primary btn-sm" value="Simpan">
   <input type="reset" class="btn-warning btn-sm" value="Reset">
</div>
</div><!--row tombol-->
</form>
<?php include "file/tema/edisi_spesial_trimitra/form_alumni.php"; } ?>

</div> <!--panel-body -->
</div> <!--panel panel-default-->
<?php // Menghilangkan Error Notice
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 style="font-family:Bree Serif;">Form Pendaftaran Siswa Baru <a href=""><?php echo "$ns[isi_pengaturan]";?></a></h3>
      </div>
    <div class="panel-body">
    <?php
$statuspsb=mysql_query("SELECT *FROM sh_pengaturan WHERE id_pengaturan ='15'");
$r=mysql_fetch_array($statuspsb);
?>
<?php
if ($r[nama_pengaturan]==1){
?>

<form method ="POST" action="kontenweb/insert_psb.php" name="formpsb" id="formpsb" class="form-horizontal" role="form">
<table class="table">
	
    <div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Nama Lengkap *</b></label></div>
    <div class="col-sm-6"><input type="text" class="form-control" name="nama"/><br /></div>
    </div>
    
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Rata-rata NEM *</b></label></div>
    <div class="col-sm-3"><input type="text" class="form-control" name="nem"/></div>
    <div class="col-sm-6"><label class="control-label">Jika ada tanda koma (,) maka diganti dengan tanda titik (.)</label><br /><br /></div>
    </div>
    <br/>
	
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Jenis Kelamin *</b></label></div>
	<div class="col-sm-3"><input type="radio" name="jk" id="jk" value="L"/>&nbsp;Laki-laki</div>
	<div class="col-sm-3"><input type="radio" name="jk" id="jk" value="P"/>&nbsp;Perempuan<br /></div>
    </div>
    <br/>

	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Sekolah Asal *</b></label></div>
    <div class="col-sm-6"><input type="text" class="form-control" name="sekolah_asal"/><br /></div>
    </div>
    
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>No. STTB *</b></label></div>
    <div class="col-sm-3"><input type="text" class="form-control" name="no_sttb"/><br /></div>
    </div>
    
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Tanggal STTB *</b></label></div>
    <div class="col-sm-3"><input type="text" id="tanggal1" name="tanggal_sttb" class="form-control"/><br /></div>
    </div>
    
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Tempat Lahir *</b></label></div>
    <div class="col-sm-3"><input type="text" class="form-control" name="tempat_lahir"></div>
    <div class="col-sm-2"><label class="control-label"><b>Tanggal Lahir *</b></label></div>
    <div class="col-sm-3"><input type="text" class="form-control" name="tanggal_lahir" id="tanggal"><br /></div>
    </div>
    
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Berat Badan</b></label></div>
    <div class="col-sm-2"><input type="text" class="form-control" name="bb"/></div>
    <div class="col-sm-1"><label class="control-label">&nbsp;&nbsp;<b>KG</b></label><br /><br /></div>
    </div>
    
    <div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Tinggi Badan</b></label></div>
    <div class="col-sm-2"><input type="text" class="form-control" name="tb"/></div>
	<div class="col-sm-1"><label class="control-label">&nbsp;&nbsp;<b>CM</b></label><br /><br /></div>
    </div>
    
   <div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Alamat Lengkap *</b></label></div>
    <div class="col-sm-6"><textarea rows="5" name="alamat" class="form-control"></textarea><br /></div>
   </div>
   
   
   
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Telepon*</b></label></div>
    <div class="col-sm-3"><input type="text" class="form-control" name="telepon"/><br /></div>
    </div>
    
    
    
	<div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Email</b></label></div>
    <div class="col-sm-4"><input type="text" class="form-control" name="email"/><br /></div>
	</div>
    
    <div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Nama Orang Tua *</b></label></div>
    <div class="col-sm-4"><input type="text" class="form-control" name="nama_ortu"><br /></div>
    </div>
    
    <div class="row">
	<div class="col-sm-3"><label class="control-label">&nbsp;&nbsp;<b>Pekerjaan Orang Tua *</b></label></div>
    <div class="col-sm-4">
            <select name="pekerjaan_ortu" class='form-control'>
				<option value="" selected>Pilih pekerjaan orang tua</option>
				<option value="Petani">Petani</option>
				<option value="Wiraswasta">Wiraswasta</option>
				<option value="PNS">PNS</option>
				<option value="Buruh">Buruh</option>
				<option value="Supir">Supir</option>
				<option value="TNI/ POLRI">TNI/ POLRI</option>
			</select>
    <br />
    </div>
    </div>
    
    <br/>
	<div class="row">
	  <div class="col-sm-9">&nbsp;&nbsp;<b>Darimanakah anda mengetahui PSB ONLINE? <a href=""><?php echo "$ns[isi_pengaturan]"?></a></b></div> <br/> <br/>
      <div class="col-sm-3"></div>
	</div>
    <div class="row"><div class="col-sm-3"></div><div class="col-sm-6"><input type="radio" name="polling" id="polling" value="Media Cetak"> Media Cetak</div></div>
	<div class="row"><div class="col-sm-3"></div><div class="col-sm-6"><input type="radio" name="polling" id="polling" value="Internet"> Internet</div></div>
	<div class="row"><div class="col-sm-3"></div><div class="col-sm-6"><input type="radio" name="polling" id="polling" value="Teman"> Teman</div></div>
	<div class="row"><div class="col-sm-3"></div><div class="col-sm-6"><input type="radio" name="polling" id="polling" value="Kerabat"> Kerabat<br /><br /></div></div>
    
    <div class="row">
      <div class="col-sm-3"></div>
	  <div class="col-sm-3"><div class="alert alert-defaultSkin"><img src="kontenweb/captcha.php?date=<?php echo date('YmdHis');?>" alt="security image" class="img-responsive" width="100" /></div><br /></div>
	</div>
    
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-3"><input type="text" name="kode" class="form-control"/></div>
      <div class="col-sm-3"><label class="control-label"><i>Masukkan kode diatas</i></label><br/><br/><br/></div>
    </div>
    
	<div class="row">
      <div class="col-sm-3"></div>
	  <div class="col-sm-3">
        <input type="submit" class="btn-sm btn-primary" value="Daftar">
        <input type="reset" class="btn-sm btn-warning" value="Reset">
	  </div>
	</div>
</table>
</form>
<?php include "file/tema/edisi_spesial_trimitra/form.php";?>
<?php } ?>
</div>
</div>
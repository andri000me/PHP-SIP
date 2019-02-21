<!-- Combo Cari Guru -->
<script type="text/javascript" src="js/jquery-combo.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=mapel>
  $("#mapel").change(function(){
    var mapel = $("#mapel").val();
    $.ajax({
        url: "carikelas.php",
        data: "mapel="+mapel,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=guru>
            $("#kelas").html(msg);
        }
    });
  });
  $("#kelas").change(function(){
    var guru = $("#kelas").val();
    $.ajax({
        url: "",
        data: "kelas="+guru,
        cache: false,
        success: function(msg){
            $("#ggg").html(msg);
        }
    });
  });
});
</script>
<div class="panel panel-primary">
<div class="panel-heading"> <h3 align="center"> Tambah Kategori Nilai </h3> </div>
<div class="panel-body"> <br/>
<a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/>
	  <br/>
		<table class="table">
		<form method='POST' action="proses-kategori-nilai.php?pilih=tambah" name='tambahkategorinilai' id='tambahkategorinilai' >
			<!-- Pilih Tahun Ajaran -->
			<tr><td class="isiankanan">Tahun Ajaran</td>
			<td class="isiankanan">
			<select name="ta" class="form-control" id="ta">
			<option value="" selected>Pilih Tahun Ajaran</option> 
					<?php
					$tha=mysql_query("SELECT * FROM sh_tahun_ajaran");
					while($ta=mysql_fetch_array($tha)){
					echo "<option value='$ta[id_tahun_ajaran]'>$ta[tahun_ajaran]";
					if($ta['semester']==0) {
					$sms = "Genap";
					} Else {
					$sms = "Ganjil";
					}
					echo " - $sms</option>";
					}
					?>
			</select>
			</td></tr>
			<!-- Nama kategori -->
			<tr><td class="isiankanan">Nama Kategori Nilai</td><td class="isian"><input type="text" name="nama_kat" class="form-control"></td></tr>
			<!-- Pilih Mapel -->
			<tr><td class="isiankanan">Mata Pelajaran</td>
			<td class="isiankanan">
			<select name="mapel" class="form-control" id="mapel">
					<option value="" selected>Pilih Mata Pelajaran</option> 
					<?php
					$mpl=mysql_query("SELECT * FROM sh_mapel_guru where id_gurustaff = '$_SESSION[idguru]'");
					while($mp=mysql_fetch_array($mpl)){
					?>
					<option value="<?php echo "$mp[id_mapel_guru]";?>"><?php echo "$mp[nama_mapel]";?></option>
					<?php } ?>
			</select>
			</td></tr>
			<!-- Pilih Kelas -->
			<tr><td class="isiankanan">Kelas</td><td class="isian"> 
			<select name="kelas" id="kelas" class="form-control">
				<option value="" selected>-- Pilih Kelas --</option>
		    </select>
			</td></tr>
			<!-- Button Tambahkan -->
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<!-- Validasi Form -->
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahkategorinilai");
			frmvalidator.addValidation("nama_kat","req","Nama Kategori Nilai harus diisi");
			frmvalidator.addValidation("nama_kat","maxlen=30","Nama Kategori Nilai maksimal 30 karakter");
			//]]>
		</script>
		</table>
	</div>
  </div>
 </div>
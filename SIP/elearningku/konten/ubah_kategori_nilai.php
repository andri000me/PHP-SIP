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
<?php 
$id = $_GET['id'];
$view=mysql_query("SELECT * FROM sh_kategori_nilai , sh_tahun_ajaran ,sh_mapel_guru, sh_kelas  WHERE sh_kategori_nilai.id_tahun_ajaran = sh_tahun_ajaran.id_tahun_ajaran
				AND sh_kategori_nilai.id_mapel_guru = sh_mapel_guru.id_mapel_guru 
				AND sh_kategori_nilai.id_kelas = sh_kelas.id_kelas AND sh_kategori_nilai.id_kategori_nilai = '$id' order by sh_kategori_nilai.id_kategori_nilai asc");
while($row=mysql_fetch_array($view)){

?>
<div class="panel panel-primary">
<div class="panel-heading"> <h3 align="center"> Tambah Kategori Nilai </h3> </div>
<div class="panel-body"> <br/>
<a href ="index.php?p=nilai"> << Kembali ke NILAI </a> <br/>
	  <br/>
		<table class="table">
		<form method='POST' action="proses-kategori-nilai.php?pilih=ubah" name='tambahkategorinilai' id='tambahkategorinilai' >
			<!-- Input Hidden ID -->
			<input type="text" hidden ="hidden" value ="<?php echo $id; ?>" name="id" >
			<!-- Pilih Tahun Ajaran -->
			<tr class="form"><td> Tahun Ajaran</td><td>
				<select name="tahun" id="tahun" class="form-control">
						<?php if (isset($_GET['tahun'])) {
								$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran = '$_GET[tahun]'");
								while($ta=mysql_fetch_array($tampilta)){
								echo "<option value='$ta[id_tahun_ajaran]' selected>$ta[tahun_ajaran]";
									if($ta['semester']==0) {
									$sms = "Genap";
									} Else {
									$sms = "Ganjil";
									}
									echo " - $sms(Aktif)</option>";
									}
								$tampilta2=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran <> '$_GET[tahun]'");
								while($ta2=mysql_fetch_array($tampilta2)){
								echo "<option value='$ta2[id_tahun_ajaran]'>$ta2[tahun_ajaran]";
									if($ta2['semester']==0) {
									$sms = "Genap";
									} Else {
									$sms = "Ganjil";
									}
									echo " - $sms(Aktif)</option>";
									}
								}
							?>
						</select>
					</td></tr>
			<!-- Nama kategori -->
			<tr><td class="isiankanan">Nama Kategori Nilai</td><td class="isian"><input type="text" name="nama_kat" class="form-control" value="<?php echo $row['nama_kategori_nilai']; ?>"></td></tr>
			<!-- Pilih Mapel -->
			<tr><td class="isiankanan">Mata Pelajaran</td>
			<td class="isiankanan">
			<select name="mapel" class="form-control" id="mapel">
					<option value="<?php echo $row['id_mapel_guru']?>" selected><?php echo $row['nama_mapel']; ?></option> 
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
				<option value="<?php echo $row['id_kelas']?>" selected> <?php echo $row['nama_kelas']?> </option>
		    </select>
			</td></tr>
			<!-- Button Tambahkan -->
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Ubah">
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
	<?php } ?>
 </div>
 </div>
 </div>
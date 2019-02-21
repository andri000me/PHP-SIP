<!-- Combo Cari Guru -->
<script type="text/javascript" src="jquery-combo.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=mapel>
  $("#mapel").change(function(){
    var mapel = $("#mapel").val();
    $.ajax({
        url: "cariguru.php",
        data: "mapel="+mapel,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=guru>
            $("#guru").html(msg);
        }
    });
  });
  $("#guru").change(function(){
    var guru = $("#guru").val();
    $.ajax({
        url: "",
        data: "guru="+guru,
        cache: false,
        success: function(msg){
            $("#ggg").html(msg);
        }
    });
  });
});

</script>
<h3>Edit Jadwal Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="jadwal_pelajaran.php">Jadwal Pelajaran</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=jadwal&untukdi=edit'";?> name='editmapel' id='editmapel' enctype="multipart/form-data">
		<?php
		// Menampilkan data dari tabel sh_jadwal
		$edit=mysql_query("SELECT * from sh_jadwal Where id_jadwal = '$_GET[id]'");
		$r=mysql_fetch_array($edit);
		$jam = explode(" - ",$r['jadwal_waktu']);
		echo "<input type='hidden' name='id' value='$r[id_jadwal]'>";
		?>
		
		
		<tr class="form"><td class="isiankanan" width="175px"> Tahun Ajaran</td><td>
				<select name="ta" id="ta" class="form-control">
						<?php 
								$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran = '$r[id_tahun_ajaran]'");
								while($ta=mysql_fetch_array($tampilta)){
								echo "<option value='$ta[id_tahun_ajaran]' selected>$ta[tahun_ajaran]";
									if($ta['semester']==0) {
									$sms = "Genap";
									} Else {
									$sms = "Ganjil";
									}
									echo " - $sms(Aktif)</option>";
									}
								$tampilta2=mysql_query("SELECT * FROM sh_tahun_ajaran Where id_tahun_ajaran <> '$r[id_tahun_ajaran]'");
								while($ta2=mysql_fetch_array($tampilta2)){
								echo "<option value='$ta2[id_tahun_ajaran]'>$ta2[tahun_ajaran]";
									if($ta2['semester']==0) {
									$sms = "Genap";
									} Else {
									$sms = "Ganjil";
									}
									echo " - $sms(Aktif)</option>";
									}
							
							?>
						</select>
					</td></tr>
			
			<tr><td class="isiankanan" width="175px">Kelas</td><td class="isian"> 
			<select name="kelas" id="kelas">
				<?php 
				// Menampilkan data dari tabel sh_kelas selected untuk isi Combobox
				$kls=mysql_query("SELECT sh_kelas.id_kelas as idkelas , sh_kelas.nama_kelas as namakelas FROM sh_kelas WHERE sh_kelas.id_kelas = '$r[id_kelas]'");
				while($kls2=mysql_fetch_array($kls)){
				?>
				<option value="<?php echo $kls2['idkelas']; ?>" selected> <?php echo $kls2['namakelas']; ?> </option>
				<?php } ?>
					<?php
					// Menampilkan data dari tabel sh_kelas option untuk isi Combobox
					$kelas=mysql_query("SELECT * FROM sh_kelas where tingkat <> ''");
					while($k=mysql_fetch_array($kelas)){
					echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>"; }
					?>
					</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Mata Pelajaran</td><td class="isian"> 
			<select name="mapel" id="mapel">
				<?php 
				// Menampilkan data dari tabel sh_mapel selected untuk isi Combobox
				$mpl=mysql_query("SELECT sh_mapel.id_mapel as idmapel , sh_mapel.nama_mapel as namamapel FROM sh_mapel , sh_jadwal WHERE sh_mapel.id_mapel = sh_jadwal.id_mapel and sh_jadwal.id_jadwal = '$_GET[id]'");
				while($mpl2=mysql_fetch_array($mpl)){
				?>
				<option value="<?php echo $mpl2['idmapel']; ?>" selected> - <?php echo $mpl2['namamapel']; ?> - </option>
				<?php } ?>
					<?php
					// Menampilkan data dari tabel sh_mapel option untuk isi Combobox
					$mapel=mysql_query("SELECT id_mapel , nama_mapel FROM sh_mapel");
					while($m=mysql_fetch_array($mapel)){
					echo "<option value='$m[id_mapel]'>$m[nama_mapel]</option>";}
					?>
					</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px"> Hari </td><td class="isian"> 
			<select name="hari" id="hari">
			<option selected="selected"><?php echo $r['jadwal_hari']; ?></option>
			<option>Senin</option>
			<option>Selasa</option>
			<option>Rabu</option>
			<option>Kamis</option>
			<option>Jumat</option>
			<option>Sabtu</option>
			</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px"> Waktu Belajar : </td>
				<td class="isian"><select name="jammulai" id="jammulai">
			<?php
			$f = explode(":",$jam[0]);
			$e = explode(":",$jam[1]);
			for($i=7;$i<=17;$i++){
			if($i<=9){$i="0$i";}
			if($i==$f[0]){
			echo "<option selected=\"selected\">$i</option>";
			}else{
			echo "<option>$i</option>";
			}}?>
			</select>
			<select name="menitmulai" id="menitmulai">
			<?php for($i=0;$i<=59;$i++){
			if($i<=9){
			$i="0$i";
			}
			if($i==$f[1]){
			echo "<option selected=\"selected\">$i</option>";
			}else{
			echo "<option>$i</option>";
			}}?>
			</select>
			&nbsp;s/d&nbsp;
			<select name="jamakhir" id="jamakhir">
			<?php for($i=7;$i<=17;$i++){
			if($i<=9){$i="0$i";}
			if($i==$e[0]){
			echo "<option selected=\"selected\">$i</option>";
			}else{
			echo "<option>$i</option>";
			}}?>
			</select>
			<select name="menitakhir" id="menitakhir">
			<?php for($i=0;$i<=59;$i++){
			if($i<=9){
			$i="0$i";
			}
			if($i==$e[1]){
			echo "<option selected=\"selected\">$i</option>";
			}else{
			echo "<option>$i</option>";
			}}?>
			</select>
			  </td>
			 </tr>
			
			<tr><td class="isiankanan" width="175px">Guru Pengajar</td><td class="isian"> 
			<select name="guru" id="guru">
				<?php 
				// Menampilkan data dari tabel sh_guru_staff selected untuk isi Combobox
				$gur=mysql_query("SELECT sh_guru_staff.id_gurustaff as gurustaff , sh_guru_staff.nama_gurustaff as namaguru , sh_jadwal.id_gurustaff FROM sh_guru_staff , sh_jadwal WHERE sh_guru_staff.id_gurustaff = sh_jadwal.id_gurustaff AND sh_jadwal.id_jadwal = '$_GET[id]'");
				while($gur2=mysql_fetch_array($gur)){
				?>
				<option value="<?php echo $gur2['gurustaff']; ?>" selected> <?php echo $gur2['namaguru']; ?> </option>
				<?php } ?>
		    </select>
			</td></tr>
						
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editmapel");
			frmvalidator.addValidation("nama_mapel","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("nama_mapel","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
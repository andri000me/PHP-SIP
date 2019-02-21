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
<h3>Tambah Jadwal Mata Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
				
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="jadwal_pelajaran.php">Jadwal Mata Pelajaran</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=jadwal&untukdi=tambah'"; ?> name='tambahjadwal' id='tambahjadwal' >
			
			<!--Tahun Ajaran -->
			<tr> <td class="isiankanan" width="175px"> Tahun Ajaran </td><td class="isian"> 
			<select name="ta" id="ta">
					<option value="" selected>--Pilih Tahun Ajaran--</option>
					<?php
					$tampilta=mysql_query("SELECT * FROM sh_tahun_ajaran");
					while($ta=mysql_fetch_array($tampilta)){
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
			 </td>
			</tr>
			
			<tr><td class="isiankanan" width="175px">Kelas</td><td class="isian"> 
			<select name="kelas" id="kelas">
				<option value="" selected>--Pilih Kelas--</option>
					<?php
					$kelas=mysql_query("SELECT * FROM sh_kelas where tingkat <> ''");
					while($k=mysql_fetch_array($kelas)){
					echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>"; }
					?>
					</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Mata Pelajaran</td><td class="isian"> 
			<select name="mapel" id="mapel">
				<option value="" selected>--Pilih Mata Pelajaran--</option>
					<?php
					$mapel=mysql_query("SELECT id_mapel , nama_mapel FROM sh_mapel");
					while($m=mysql_fetch_array($mapel)){
					echo "<option value='$m[id_mapel]'>$m[nama_mapel]</option>";}
					?>
					</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px"> Hari </td><td class="isian"> 
			<select name="hari" id="hari">
			<option value="" selected>--Pilih Hari Pelajaran--</option>
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
				<?php for($i=7;$i<=17;$i++){
				if($i<=9){$i="0$i";}
				echo "<option>$i</option>";
				}?>
				</select>
				<select name="menitmulai" id="menitmulai">
				<?php for($i=0;$i<=59;$i++){
				if($i<=9){
				$i="0$i";
				}
				echo "<option>$i</option>";
				}?>
				</select>
				&nbsp;s/d&nbsp;
				<select name="jamakhir" id="jamakhir">
				<?php for($i=7;$i<=17;$i++){
				if($i<=9){$i="0$i";}
				echo "<option>$i</option>";
				}?>
				</select>
				<select name="menitakhir" id="menitakhir">
				<?php for($i=0;$i<=59;$i++){
				if($i<=9){
				$i="0$i";
				}
				echo "<option>$i</option>";
				}?>
				</select>
			  </td>
			 </tr>
			
			<tr><td class="isiankanan" width="175px">Guru Pengajar</td><td class="isian"> 
			<select name="guru" id="guru">
				<option value="" selected>--Pilih Guru Pengajar--</option>
		    </select>
			</td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>		
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahjadwal");
			frmvalidator.addValidation("kelas","req","Kelas Harus Di Pilih !");
			frmvalidator.addValidation("mapel","req","Mata Pelajaran Harus Di Pilih !");
			frmvalidator.addValidation("guru","req","Guru Harus Di Pilih !");
			frmvalidator.addValidation("nama_mapel","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("nama_mapel","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
			//]]>
		</script>
		</table>
	</div><!--Akhir class isi kanan-->
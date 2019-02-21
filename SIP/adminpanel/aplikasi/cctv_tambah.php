<h3>Tambah Kamera CCTV</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="cctv.php">Daftar CCTV</a></div>
			<div class="menuhorisontal"><a href="monitor_cctv.php">Monitor CCTV</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=cctv&untukdi=tambah'";?> name='tambahcctv' id='tambahcctv' enctype="multipart/form-data">
			
			<tr><td class="isiankanan" width="175px">Link Generate CCTV</td><td class="isian"><input type="text" name="cctv" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Ruang / Kelas di Pasang</td><td class="isian">
			<select name="kelas" id="kelas">
				<option value="" selected>--Pilih Kelas--</option>
					<?php
					$kelas=mysql_query("SELECT * FROM sh_kelas");
					while($k=mysql_fetch_array($kelas)){
					echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>"; }
					?>
			</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Status CCTV</td><td class="isian">
			<select name="status" id="status">
			<option value="1">Kelas</option>
			<option value="0">Ruang</option>
			</select>			
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Dapat di Akses Orang Tua</td><td class="isian">
			<select name="aktif_ortu" id="aktif_ortu">
			<option value="1">Boleh</option>
			<option value="0">Tidak</option>
			</select>			
			</td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		
		<!-- Validasi -->
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahcctv");
			frmvalidator.addValidation("cctv","req","Link Generate CCTV harus diisi ! ");
			frmvalidator.addValidation("kelas","req","Kelas harus dipilih ! ");
			frmvalidator.addValidation("status","req","Status harus dipilih ! ");
			frmvalidator.addValidation("aktif_ortu","req","Akses Orang Tua harus dipilih ! ");
			//]]>
		</script>
		
		</table>
	</div><!--Akhir class isi kanan-->
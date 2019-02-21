<h3>Tambah Mata Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="mata_pelajaran.php">Mata Pelajaran</a></div>
			<div class="menuhorisontal"><a href="materi.php">Materi Pelajaran</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=mapel&untukdi=tambah'"; ?> name='tambahmapel' id='tambahmapel' >
			<tr><td class="isiankanan" width="175px">Tingkat</td>
			<td class="isian">
			<select name="tingkat">
					<option value="" selected>- Pilih Tingkat -</option>
					<?php
					$kls=mysql_query("SELECT DISTINCT tingkat FROM sh_kelas");
					while($kl=mysql_fetch_array($kls)){
					?>
					<option value="<?php echo "$kl[tingkat]";?>"><?php echo "$kl[tingkat]";?></option>
					<?php } ?>
			</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Nama Mata Pelajaran</td><td class="isian"><input type="text" name="nama_mapel" class="maksimal"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Kode Mata Pelajaran</td><td class="isian"><input type="text" name="kode_mapel" class="maksimal"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi_mapel" style="height: 100px"></textarea></td></tr>
			
			<tr><td class="isiankanan" width="175px">KKM</td><td class="isian"><input type="text" name="KKM" class="maksimal"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			frmvalidator.addValidation("nama_mapel","req","Nama mata pelajaran harus diisi");
			frmvalidator.addValidation("nama_mapel","maxlen=30","Nama mata pelajaran maksimal 30 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
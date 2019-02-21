<h3>Tambah Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="mata_pelajaran.php">Mata Pelajaran</a></div>
			<div class="menuhorisontalaktif"><a href="materi.php">Materi Pelajaran</a></div>
		</div>

		<table class="isian">
		<form method='POST' action="?pilih=tambah2" name='tambahmapel' id='tambahmapel' enctype="multipart/form-data">
			<tr><td class="isiankanan" width="175px">Mata Pelajaran</td><td class="isian">
												<select name="mapel">
												<option value="" selected>Pilih Mata Pelajaran...</option>
												<?php $mapel=mysql_query("SELECT * FROM sh_mapel ORDER BY nama_mapel");
														while($mp=mysql_fetch_array($mapel)){
														echo "<option value='$mp[id_mapel]'>$mp[nama_mapel]</option>"; } ?>
												</select>
			</td></tr>
			<tr><td class="isian" colspan="2">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			<input type="submit" class="pencet" value="Lanjut&nbsp;&raquo;">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			frmvalidator.addValidation("mapel","req","Anda harus memilih mata pelajaran");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
<h3>Edit Mata Pelajaran</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="mata_pelajaran.php">Mata Pelajaran</a></div>
			<div class="menuhorisontal"><a href="materi.php">Materi Pelajaran</a></div>
		</div>

		<table class="isian">
		<?php $edit=mysql_query("SELECT * FROM sh_mapel WHERE id_mapel='$_GET[id]'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST' <?php echo "action='$database?pilih=mapel&untukdi=edit'"; ?> name='editmapel' id='editmapel' >
			<?php echo "<input type='hidden' name='id' value='$r[id_mapel]'";?>
			<tr><td class="isiankanan" width="175px">Tingkat</td>
			<td class="isian">
			<select name="tingkat">
					<?php
					$tkt=mysql_query("SELECT DISTINCT tingkat FROM sh_kelas where tingkat = '$r[tingkat]'");
					while($tk=mysql_fetch_array($tkt)){
					?>
					<option value="<?php echo "$tk[tingkat]";?>" selected><?php echo "$tk[tingkat]";?></option>
					<?php } ?>
					
					<?php
					$tkt2=mysql_query("SELECT DISTINCT tingkat FROM sh_kelas where tingkat <> '$r[tingkat]'");
					while($tk2=mysql_fetch_array($tkt2)){
					?>
					<option value="<?php echo "$tk2[tingkat]";?>"><?php echo "$tk2[tingkat]";?></option>
					<?php } ?>
			</select>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Nama Mata Pelajaran</td><td class="isian"><input type="text" name="nama_mapel" class="maksimal" <?php echo "value='$r[nama_mapel]'"; ?>></td></tr>
			
			<tr><td class="isiankanan" width="175px">Kode Mata Pelajaran</td><td class="isian"><input type="text" name="kode_mapel" class="maksimal" <?php echo "value='$r[kode_mapel]'"; ?>></td></tr>
			
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi_mapel" style="height: 100px"><?php echo "$r[deskripsi_mapel]";?></textarea></td></tr>
			
			<tr><td class="isiankanan" width="175px">KKM</td><td class="isian"><input type="text" name="KKM" class="maksimal" <?php echo "value='$r[KKM]'"; ?>></td></tr>
		
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
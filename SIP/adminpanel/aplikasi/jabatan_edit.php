<h3>Edit Jabatan</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="guru_staff.php">Guru</a></div>
			<div class="menuhorisontal"><a href="staff.php">Staff</a></div>
			<div class="menuhorisontalaktif"><a href="jabatan.php">Jabatan</a></div>
		</div>

		<table class="isian">
		<?php $edit=mysql_query("SELECT * FROM sh_jabatan WHERE id_jabatan='$_GET[id]'");
				$r=mysql_fetch_array($edit);?>
		<form method='POST' <?php echo "action='$database?pilih=jabatan&untukdi=edit'";?>  name='editjabatan' id='editjabatan' >
			<?php echo "<input type='hidden' name='id' value='$r[id_jabatan]'>";?>
			<tr><td class="isiankanan" width="175px">Nama Jabatan</td><td class="isian"><input type="text" name="nama_jabatan" class="maksimal" value="<?php echo "$r[nama_jabatan]";?>"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi_jabatan" style="height: 100px"><?php echo "$r[deskripsi_jabatan]";?></textarea></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editjabatan");
			frmvalidator.addValidation("nama_jabatan","req","Nama jabatan harus diisi");
			frmvalidator.addValidation("nama_jabatan","maxlen=30","Nama jabatan maksimal 20 karakter");
			frmvalidator.addValidation("nama_jabatan","minlen=3","Nama jabatan minimal 4 karakter");
	  
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
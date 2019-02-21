<h3>Tambah Jabatan</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="guru_staff.php">Guru</a></div>
			<div class="menuhorisontal"><a href="staff.php">Staff</a></div>
			<div class="menuhorisontalaktif"><a href="jabatan.php">Jabatan</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=jabatan&untukdi=tambah'";?> name='tambahjabatan' id='tambahjabatan' >
			
			<tr><td class="isiankanan" width="175px">Nama Jabatan</td><td class="isian"><input type="text" name="nama_jabatan" class="maksimal"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi_jabatan" style="height: 100px"></textarea></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahjabatan");
			frmvalidator.addValidation("nama_jabatan","req","Nama jabatan harus diisi");
			frmvalidator.addValidation("nama_jabatan","maxlen=30","Nama jabatan maksimal 20 karakter");
			frmvalidator.addValidation("nama_jabatan","minlen=3","Nama jabatan minimal 4 karakter");
	  
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
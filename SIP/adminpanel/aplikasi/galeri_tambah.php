<h3>Tambah Foto</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontalaktif"><a href="galeri_foto.php">Galeri Foto</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=galeri&untukdi=tambah'";?> name='tambahfoto' id='tambahfoto'   enctype="multipart/form-data" >
			
			<tr><td class="isiankanan" width="175px">Nama Album</td><td class="isian">
					<select name="album_galeri">
						<option value="" selected>Pilih Album</option>
						<?php $album=mysql_query("SELECT * FROM sh_album");
								while($a=mysql_fetch_array($album)) {
								echo "<option value='$a[id_album]'>$a[nama_album]</option>"; }
								?>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Upload">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahfoto");
			frmvalidator.addValidation("album_galeri","req","Anda harus memilih album dahulu sebelum upload foto");
			
			frmvalidator.addValidation("fupload","file_extn=jpg","Jenis file yang diterima untuk foto adalah : jpg");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
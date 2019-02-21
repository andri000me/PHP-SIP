<h3>Edit Album Galeri</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="album_galeri.php">Album Galeri</a></div>
			<div class="menuhorisontal"><a href="galeri_foto.php">Galeri Foto</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=album&untukdi=edit'";?> name='editalbum' id='editalbum' enctype="multipart/form-data">
			<?php
			$edit=mysql_query("SELECT * FROM sh_album WHERE id_album='$_GET[id]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_album]'";
			?>
			<tr><td class="isiankanan" width="175px">Nama Album</td><td class="isian"><input type="text" name="nama_album" class="maksimal" value="<?php echo "$r[nama_album]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Foto Sampul</td><td class="isian"><img src="../images/foto/galeri/album/<?php echo "$r[foto_album]";?>" width="200px"></td></tr>
			<tr><td class="isiankanan" width="175px">Ganti Foto Sampul</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"> <?php echo "$r[deskripsi_album]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editalbum");
			frmvalidator.addValidation("nama_album","req","Nama album harus diisi");
			frmvalidator.addValidation("nama_album","maxlen=30","Nama album maksimal 50 karakter");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk foto sampul adalah : jpg, gif, png");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
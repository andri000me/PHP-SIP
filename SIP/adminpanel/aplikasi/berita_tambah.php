<h3>Tambah Berita</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="berita.php">Berita</a></div>
			<div class="menuhorisontal"><a href="kategori.php">Kategori</a></div>
			<div class="menuhorisontal"><a href="komentar.php">Komentar</a></div>
		</div>
		
		<table class="isian">
		<form method="POST" <?php echo "action='$database?pilih=berita&untukdi=tambah'";?> name='formtambahberita' id='formtambahberita' enctype="multipart/form-data">
			<?php
			echo "<input type='hidden' name='s_username' value='$_SESSION[adminsh]'>";
			?>
			
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_berita"
			value="Judul berita disini..." onblur="if(this.value=='') this.value='Judul berita disini...';" onfocus="if(this.value=='Judul berita disini...') this.value='';"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_berita"></textarea></td></tr>
			
			<tr><td class="isiankanan" width="100px">Gambar Kecil</td>
				<td class="isian"><input type="file" name="fupload"></td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Kategori</td>
				<td class="isian">
					<select name="kategori">
						<option value="1" selected>Pilih Kategori..</option>
						<?php
						$kategori=mysql_query("SELECT * FROM sh_kategori");
						while ($r=mysql_fetch_array($kategori)){
						echo " <option value=$r[id_kategori]>$r[nama_kategori]</option>";} ?>
					</select>
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Pilih kategori untuk berita, jika anda tidak memilih kategori maka secara otomatis diinputkan "Tanpa Kategori"</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Terima Komentar</td>
				<td class="isian">
					<input type="radio" name="status_komentar" value="1" checked/>Ya&nbsp;
					<input type="radio" name="status_komentar" value="0">Tidak
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Anda bisa menonaktifkan form komentar pada berita dengan memilih "Tidak"</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Headline</td>
				<td class="isian">
					<input type="radio" name="status_headline" value="1">Ya&nbsp;
					<input type="radio" name="status_headline" value="0" checked/>Tidak
				</td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Setiap berita yang anda tulis dapat dijadikan sebagai headline pada halaman utama website. Dengan catatan berita harus mempuntai gambar kecil, jika tidak ada gambar kecil maka akan diinputkan gambar default</i><br><hr></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Terbitkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("formtambahberita");
			frmvalidator.addValidation("judul_berita","req","Judul berita harus diisi");
			frmvalidator.addValidation("judul_berita","maxlen=100","Judul berita maksimal 100 karakter");
			frmvalidator.addValidation("judul_berita","minlen=5",	"Judul berita minimal 5 karakter");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			//]]>
		</script>
		
		</table>

</div><!--Akhir class isi kanan-->
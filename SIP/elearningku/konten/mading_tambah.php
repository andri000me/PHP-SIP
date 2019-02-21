<?php include '../../konfigurasi/koneksi.php';?>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

<h3>Mading Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->		
		<table class="isian">
		<form method="POST" <?php echo "action='../database/berita.php?pilih=berita&untukdi=tambah'";?> name='formtambahberita' id='formtambahberita' enctype="multipart/form-data">
			<?php
			echo "<input type='hidden' name='s_username' value='$_SESSION[adminsh]'>";
			?>
			
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_mading"
			value="Judul mading disini..." onblur="if(this.value=='') this.value='Judul mading disini...';" onfocus="if(this.value=='Judul mading disini...') this.value='';"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_mading"></textarea></td></tr>
			
			<tr><td class="isiankanan" width="100px">Gambar</td>
				<td class="isian"><input type="file" name="fupload"></td>
			</tr>
			<tr><td class="isian" colspan="2" style="color:#7f7f7f;"><i>Gambar kecil digunakan untuk headline halaman depan website dan summary pada halaman arsip</i><br><hr></td></tr>
			
			<tr><td class="isiankanan" width="100px">Kategori</td>
				<td class="isian">
					<select name="kategori">
						<option value="1" selected>Pilih Kategori..</option>
						<?php
						$kategori=mysql_query("SELECT * FROM sh_mading_kategori");
						while ($r=mysql_fetch_array($kategori)){
						echo " <option value=$r[id_mading_kategori]>$r[nama_mading_kategori]</option>";} ?>
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
			frmvalidator.addValidation("judul_mading","req","Judul berita harus diisi");
			frmvalidator.addValidation("judul_mading","maxlen=100","Judul berita maksimal 100 karakter");
			frmvalidator.addValidation("judul_mading","minlen=5",	"Judul berita minimal 5 karakter");
	  
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			//]]>
		</script>
		
		
		</table>

</div><!--Akhir class isi kanan-->
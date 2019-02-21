<h3>Tambah Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontal"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontal"><a href="kelas.php">Kelas</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=siswa&untukdi=tambah'";?> name='tambahsiswa' id='tambahsiswa' enctype="multipart/form-data">
			
			<tr><td class="isiankanan" width="175px">Nama Siswa</td><td class="isian"><input type="text" name="nama_siswa" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">NIS</td><td class="isian"><input type="text" name="nis" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Password</td><td class="isian"><input type="password" name="password" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<input type="radio" name="jk" value="Laki-laki"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="Perempuan"/>Perempuan
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Kelas</td>
			<td class="isian">
					<select name="kelas">
						<option value="" selected>Pilih kelas</option>
						<?php
							$kelas=mysql_query("SELECT * FROM sh_kelas");
							while($k=mysql_fetch_array($kelas)){
							echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>";}
						?>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tahun Registrasi</td><td class="isian">
			<?php
				$thn_skrg=date("Y");
				echo "<select name=tahun_reg>
				<option value='' selected>Pilih Tahun</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Sekolah Asal</td><td class="isian"><input type="text" name="sekolah_asal" class="pendek"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Status Siswa</td>
			<td class="isian">
					<input type="radio" name="status_siswa" value="Aktif" checked/>Aktif&nbsp;
					<input type="radio" name="status_siswa" value="Aktif"/>Alumni
			</td></tr>
			<tr><td class="isiankanan" width="175px">Nama Orang Tua</td><td class="isian"><input type="text" name="nama_ortu" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Pekerjaan Orang Tua</td><td class="isian"><input type="text" name="pekerjaan_ortu" class="maksimal"></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahsiswa");
			frmvalidator.addValidation("nama_siswa","req","Nama siswa harus diisi");
			frmvalidator.addValidation("nama_siswa","maxlen=30","Nama siswa maksimal 30 karakter");
			frmvalidator.addValidation("nama_siswa","minlen=3","Nama siswa minimal 3 karakter");
	  
			frmvalidator.addValidation("nis","req","NIS harus diisi");
			frmvalidator.addValidation("nis","maxlen=10","NIS maksimal 10 karakter");
			frmvalidator.addValidation("nis","minlen=4","NIS guru minimal 4 karakter");
			frmvalidator.addValidation("nis","numeric","NIS ditulis dengan angka");
			
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=6","Password terlalu pendek, minimal 6 karakter");
			
			frmvalidator.addValidation("kelas","req","Anda belum memilih kelas");
			
			frmvalidator.addValidation("tahun_reg","req","Tahun registrasi harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("sekolah_asal","req","Sekolah asal harus diisi");
			frmvalidator.addValidation("sekolah_asal","minlen=6","Sekolah asal minimal 6 karakter");
			frmvalidator.addValidation("nama_ortu","req","nama orang tua harus diisi dengan benar");
			frmvalidator.addValidation("nama_ortu","minlen=4","Nama orang tua minimal 4 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
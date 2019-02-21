<h3>Tambah Staff</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="guru_staff.php">Guru</a></div>
			<div class="menuhorisontalaktif"><a href="staff.php">Staff</a></div>
			<div class="menuhorisontal"><a href="jabatan.php">Jabatan</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=staff&untukdi=tambah'";?> name='tambahstaff' id='tambahstaff'  enctype="multipart/form-data" >
			
			<tr><td class="isiankanan" width="175px">Nama Staff</td><td class="isian"><input type="text" name="nama_staff" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">NIP</td><td class="isian"><input type="text" name="nip" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%"></td></tr>
			<tr><td class="isiankanan" width="175px">Jabatan</td>
			<td class="isian">
					<select name="jabatan">
						<option value="" selected>Pilih Jabatan</option>
						<?php
						$jabatan=mysql_query("SELECT * FROM sh_jabatan");
						while ($j=mysql_fetch_array($jabatan)){
						echo "<option value='$j[id_jabatan]'>$j[nama_jabatan]</option>";}
						?>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Pendidikan Terakhir</td>
			<td class="isian">
					<select name="pendidikan">
						<option value="" selected>Pilih pendidikan</option>
						<option value="SMA sederajat">SMA sederajat</option>
						<option value="Diploma 1 (D1)">Diploma 1 (D1)</option>
						<option value="Diploma 2 (D2)">Diploma 2 (D2)</option>
						<option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
						<option value="Strata 1 (S1)">Strata 1 (S1)</option>
						<option value="Magister (S2)">Magister (S2)</option>
						<option value="Doktor (S3)">Doktor (S3)</option>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tahun Masuk</td><td class="isian">
			<?php
				$thn_skrg=date("Y");
				echo "<select name=tahun_masuk>
				<option value='' selected>Pilih Tahun</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Status Perkawinan</td>
			<td class="isian">
					<select name="status_kawin">
						<option value="" selected>Pilih status</option>
						<option value="Menikah">Menikah</option>
						<option value="Belum menikah">Belum menikah</option>
						<option value="Duda">Duda</option>
						<option value="Janda">Janda</option>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek"></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahstaff");
			frmvalidator.addValidation("nama_staff","req","Nama staff harus diisi");
			frmvalidator.addValidation("nama_staff","maxlen=30","Nama staff maksimal 30 karakter");
			frmvalidator.addValidation("nama_staff","minlen=3","Nama staff minimal 3 karakter");
	  
			frmvalidator.addValidation("nip","req","NIP staff harus diisi");
			frmvalidator.addValidation("nip","maxlen=18","NIP staff maksimal 18 karakter");
			frmvalidator.addValidation("nip","minlen=9","NIP staff minimal 9 karakter");
			frmvalidator.addValidation("nip","numeric","NIP ditulis dengan angka");
			
			frmvalidator.addValidation("fupload","file_extn=jpg;gif;png","Jenis file yang diterima untuk gambar adalah : jpg, gif, png");
			
			frmvalidator.addValidation("jabatan","req","Anda belum memilih jabatan");
			frmvalidator.addValidation("pendidikan","req","Anda belum memilih pendidikan terakhir");
			frmvalidator.addValidation("status_kawin","req","Anda belum memilih status perkawinan");
			
			frmvalidator.addValidation("tahun_masuk","req","Tahun masuk harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
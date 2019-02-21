<h3>Edit Siswa</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontal"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontal"><a href="kelas.php">Kelas</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=siswa&untukdi=edit'";?>  name='editsiswa' id='editsiswa' enctype="multipart/form-data">
			<?php
			$edit=mysql_query("SELECT * FROM sh_siswa,sh_kelas WHERE sh_siswa.id_kelas=sh_kelas.id_kelas AND id_siswa='$_GET[id]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_siswa]'>";
			?>
			<tr><td class="isiankanan" width="175px">Nama Siswa</td><td class="isian"><input type="text" name="nama_siswa" class="maksimal" value="<?php echo "$r[nama_siswa]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">NIS</td><td class="isian"><input type="text" name="nis" class="pendek"value="<?php echo "$r[nis]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Password</td><td class="isian"><input type="password" name="password" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Foto</td><td class="isian"><img src="<?php $path = $r[foto]; $ambilpath = substr($path,27); echo "..".$ambilpath; ?>" width="200px">
				<?php $ambilpat=substr($path,46);
				if ($ambilpat !='no_photo.jpg'){?>
				<br><br>
				<a href="<?php echo "$database?pilih=siswa&untukdi=hapusgambar&id=$_GET[id]";?>"><b><u>Hapus gambar</u></b></a>
				<?php }?>
				</td></tr>
			<tr><td class="isiankanan" width="175px">Ganti Foto</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<?php if ($r[jenkel]=='L'){ ?>
					<input type="radio" name="jk" value="L" checked/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
					<?php }
					else {?>
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P" checked/>Perempuan
					<?php } ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek" value="<?php echo "$r[tempat_lahir]";?>">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%" value="<?php echo "$r[tanggal_lahir]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"><?php echo "$r[alamat]";?></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Kelas</td>
			<td class="isian">
					<select name="kelas">
						<option value="<?php echo"$r[id_kelas]";?>" selected><?php echo"$r[nama_kelas]";?></option>
						<?php
							$kelas=mysql_query("SELECT * FROM sh_kelas WHERE id_kelas !=$r[id_kelas]");
							while($k=mysql_fetch_array($kelas)){
							echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>";}
						?>
					</select>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tahun Registrasi</td><td class="isian">
			<?php
				$thn_skrg=date("Y");
				echo "<select name=tahun_reg>
				<option value='$r[tahun_registrasi]' selected>$r[tahun_registrasi]</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Sekolah Asal</td><td class="isian"><input type="text" name="sekolah_asal" class="pendek" value="<?php echo "$r[sekolah_asal]";?>"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek" value="<?php echo "$r[email]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek" value="<?php echo "$r[telepon]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Status Siswa</td>
			<td class="isian">
					<?php if ($r[status_siswa]== 1){ ?>
					<input type="radio" name="status_siswa" value="1" checked/>Aktif&nbsp;
					<input type="radio" name="status_siswa" value="0"/>Alumni
					<?php }
					else { ?>
					<input type="radio" name="status_siswa" value="1"/>Aktif&nbsp;
					<input type="radio" name="status_siswa" value="0" checked/>Alumni
					<?php } ?>
			</td></tr>
			<tr><td class="isiankanan" width="175px">Nama Orang Tua</td><td class="isian"><input type="text" name="nama_ortu" class="maksimal" value="<?php echo "$r[nama_ortu]";?>"></td></tr>
			<tr><td class="isiankanan" width="175px">Pekerjaan Orang Tua</td><td class="isian"><input type="text" name="pekerjaan_ortu" class="maksimal" value="<?php echo "$r[pekerjaan_ortu]";?>"></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editsiswa");
			frmvalidator.addValidation("nama_siswa","req","Nama siswa harus diisi");
			frmvalidator.addValidation("nama_siswa","maxlen=30","Nama siswa maksimal 30 karakter");
			frmvalidator.addValidation("nama_siswa","minlen=3","Nama siswa minimal 3 karakter");
	  
			frmvalidator.addValidation("nis","req","NIS harus diisi");
			frmvalidator.addValidation("nis","maxlen=10","NIS maksimal 10 karakter");
			frmvalidator.addValidation("nis","minlen=4","NIS guru minimal 4 karakter");
			frmvalidator.addValidation("nis","numeric","NIS ditulis dengan angka");
			
			frmvalidator.addValidation("kelas","req","Anda belum memilih kelas");
			
			frmvalidator.addValidation("tahun_reg","req","Tahun registrasi harus diisi");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("sekolah_asal","req","Sekolah asal harus diisi");
			frmvalidator.addValidation("sekolah_asal","minlen=6","Sekolah asal minimal 6 karakter");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
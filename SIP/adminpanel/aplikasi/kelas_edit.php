<h3>Edit Kelas</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontal"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontalaktif"><a href="kelas.php">Kelas</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo"action='$database?pilih=kelas&untukdi=edit'";?> name='editkelas' id='editkelas' >
		<?php
			$edit=mysql_query("SELECT * FROM sh_kelas WHERE id_kelas='$_GET[id]'");
			$r=mysql_fetch_array($edit);
			
			echo "<input type='hidden' name='id' value='$r[id_kelas]'>";
		?>
			
			<tr><td class="isiankanan" width="175px">Nama Kelas</td><td class="isian"><input type="text" name="nama_kelas" class="maksimal" value="<?php echo "$r[nama_kelas]";?>"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Tingkat</td><td class="isian"><input type="text" name="tingkat" class="maksimal" value="<?php echo "$r[tingkat]";?>"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Wali Kelas</td><td class="isian"> 
			<select name="guru" id="guru">
				<?php 
				// Menampilkan data dari tabel sh_guru_staff selected untuk isi Combobox
				$gur=mysql_query("SELECT sh_guru_staff.id_gurustaff as idguru , sh_guru_staff.nama_gurustaff as namaguru , sh_kelas.id_gurustaff FROM sh_guru_staff , sh_kelas WHERE sh_guru_staff.id_gurustaff = sh_kelas.id_gurustaff AND sh_kelas.id_kelas='$_GET[id]'");
				while($gur2=mysql_fetch_array($gur)){
				?>
				<option value="<?php echo $gur2['idguru']; ?>" selected> <?php echo $gur2['namaguru']; ?> </option>
				<?php } ?>
				<option value="<?php echo $gur2tampil['id_gurustaff']; ?>"> -- Pilih Pengganti Wali Kelas -- </option>
				<?php 
				// Menampilkan data dari tabel sh_guru_staff selected untuk isi Combobox
				$gurtampil=mysql_query("SELECT * FROM sh_guru_staff");
				while($gur2tampil=mysql_fetch_array($gurtampil)){
				?>
				<option value="<?php echo $gur2tampil['id_gurustaff']; ?>"> <?php echo $gur2tampil['nama_gurustaff']; ?> </option>
				<?php } ?>
		    </select>
			</td></tr>
			
					<?php
					$jum_siswa=mysql_query("SELECT * FROM `sh_siswa` WHERE id_kelas = '$_GET[id]'");
					$jumlah_siswa=mysql_num_rows($jum_siswa);
					?>
			
			<tr><td class="isiankanan" width="175px">Jumlah Siswa</td><td class="isian"><input type="text" name="jumlah_siswa" class="maksimal" value="<?php echo "$jumlah_siswa Murid"; ?>" Readonly></td></tr>
			
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"><?php echo "$r[deskripsi_kelas]";?></textarea></td></tr>
		
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Update">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editkelas");
			frmvalidator.addValidation("nama_kelas","req","Nama kelas harus diisi");
			frmvalidator.addValidation("nama_kelas","maxlen=15","Nama kelas maksimal 15 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
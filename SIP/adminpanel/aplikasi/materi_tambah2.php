<h3>Tambah Materi Pelajaran (E-learning)</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="mata_pelajaran.php">Mata Pelajaran</a></div>
			<div class="menuhorisontalaktif"><a href="materi.php">Materi Pelajaran</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=materi&untukdi=tambah'";?> name='tambahmapel' id='tambahmapel' enctype="multipart/form-data">
			<?php
			echo "<input type='hidden' name='mapel' value='$_POST[mapel]'>";
			?>
			<tr><td class="isiankanan" width="175px">Judul Materi</td><td class="isian"><input type="text" name="judul_materi" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">File Materi</td><td class="isian"><input type="file" name="fupload"></td></tr>
			<tr><td class="isiankanan" width="175px">Deskripsi</td><td class="isian"><textarea name="deskripsi" style="height: 100px"></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Guru Pengajar</td><td class="isian">
									<select name="guru">
									<option value="" selected>Pilih Guru Pengajar</option>
									<?php
										$guru=mysql_query("SELECT sh_guru_staff.nip as nip , sh_guru_staff.id_gurustaff as id_guru , sh_guru_staff.nama_gurustaff FROM sh_mapel_guru , sh_guru_staff where sh_mapel_guru.id_gurustaff = sh_guru_staff.id_gurustaff AND sh_mapel_guru.id_mapel = '$_POST[mapel]'");
										while($g=mysql_fetch_array($guru)){
										echo "<option value='$g[nip]'>$g[nama_gurustaff]</option>";} ?>
									</select>
			</td></tr>
			<tr><td class="isian" colspan="2">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			<input type="submit" class="pencet" value="Tambah">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahmapel");
			frmvalidator.addValidation("guru","req","Anda harus memilih guru pengajar");
			
			frmvalidator.addValidation("fupload","req","Anda belum memilih file");
			
			frmvalidator.addValidation("judul_materi","req","Judul Materi harus diisi");
			frmvalidator.addValidation("judul_materi","maxlen=30","Judul Materi maksimal 30 karakter");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
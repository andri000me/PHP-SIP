<h3>Tambah Pengumuman</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontal"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontalaktif"><a href="pengumuman.php">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php echo " <form method='POST' action='$database?pilih=pengumuman&untukdi=tambah' name='pengumuman_tambah' id='pengumuman_tambah'>"; ?>
		<?php
			echo "<input type='hidden' name='s_username' value='$_SESSION[adminsh]'>";
			?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="judul_pengumuman"
			value="Judul pengumuman disini..." onblur="if(this.value=='') this.value='Judul pengumuman disini...';" onfocus="if(this.value=='Judul pengumuman disini...') this.value='';"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_pengumuman"></textarea></td></tr>
			<tr>
			<td class="isiankanan" width="100px">Ditujukan Untuk</td>
			<td class="isian">
			<input type="radio" name="ditujukan" id="tujukan" value="all">Semua
			<input type="radio" name="ditujukan" id="tujukan" value="guru">Guru
			<input type="radio" name="ditujukan" id="tujukan" value="orangtua">Orang Tua
			<input type="radio" name="ditujukan" id="tujukan" value="siswa">Siswa
			</td>
			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("pengumuman_tambah");
				frmvalidator.addValidation("judul_pengumuman","req","Judul Pengumuman harus diisi");
				frmvalidator.addValidation("judul_pengumuman","maxlen=30","Maksimal karakter untuk Judul Pengumuman adalah 30");
				frmvalidator.addValidation("judul_pengumuman","minlen=3","Minimal karakter untuk Judul Pengumuman adalah 3");
				
			//]]>
		</script>
		</table>

</div><!--Akhir class isi kanan-->
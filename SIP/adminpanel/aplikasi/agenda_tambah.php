<h3>Tambah Agenda</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontal"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontal"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontalaktif"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php echo " <form method='POST' action='$database?pilih=agenda&untukdi=tambah'name='tambahagenda' id='tambahagenda'>"; ?>
		<?php
			echo "<input type='hidden' name='s_username' value='$_SESSION[adminsh]'>";
			?>
			<tr><td class="isiankanan" width="175px">Judul Agenda</td><td class="isian"><input type="text" name="judul" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Tanggal Agenda</td><td class="isian"><input type="text" name="tanggal" class="pendek" id="tanggal"></td></tr>
			<tr><td class="isiankanan" width="175px">Tempat</td><td class="isian"><input type="text" name="tempat" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Keterangan</td><td class="isian"><textarea name="keterangan" style="height: 100px"></textarea></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahagenda");
			frmvalidator.addValidation("judul","req","Judul agenda harus diisi");
			frmvalidator.addValidation("tanggal","req","Tanggal agenda harus diisi");
			frmvalidator.addValidation("tempat","req","Tempat agenda harus diisi");
		</script>
		</table>

</div><!--Akhir class isi kanan-->
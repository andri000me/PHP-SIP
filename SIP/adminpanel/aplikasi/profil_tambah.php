<h3>Tambah Informasi Profil</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="informasi_sekolah.php">Informasi Sekolah</a></div>
			<div class="menuhorisontal"><a href="gmap.php">Lokasi Gmap</a></div>
			<div class="menuhorisontalaktif"><a href="profil.php">Profil</a></div>
			<div class="menuhorisontal"><a href="agenda.php">Agenda</a></div>
			<div class="menuhorisontal"><a href="pengumuman.php">Pengumuman</a></div>
		</div>
		
		<table class="isian">
		<?php echo " <form method='POST' action='$database?pilih=profil&untukdi=tambah' name='profil_tambah' id='profil_tambah' >"; ?>
			<tr><td class="isian" colspan="2"><input type="text" class="maksimal" name="nama_info"
			value="Judul informasi disini..." onblur="if(this.value=='') this.value='Judul informasi disini...';" onfocus="if(this.value=='Judul informasi disini...') this.value='';"></td></tr>
			
			<tr><td class="isian" colspan="2"><textarea class="tini" name="isi_info"></textarea></td></tr>
			<tr><td class="isiankanan" width="100px">Posisi</td>
				<td class="isian">
					<input type="radio" name="posisi_menu" value="Menu">Menu&nbsp;
					<input type="radio" name="posisi_menu" value="Submenu" checked>Submenu
				</td>
			</tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("profil_tambah");
				frmvalidator.addValidation("nama_info","req","Judul informasi harus diisi");
				frmvalidator.addValidation("nama_info","maxlen=30","Maksimal karakter untuk Judul informasi adalah 30");
				frmvalidator.addValidation("nama_info","minlen=3","Minimal karakter untuk Judul informasi adalah 3");
				
			//]]>
		</script>
		</table>

</div><!--Akhir class isi kanan-->
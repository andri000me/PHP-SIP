<h3>Tambah Kalendar Akademik</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif"><a href="kalendar_akademik.php">Kalendar Akademik</a></div>
		</div>

		<table class="isian">
		<form method='POST' <?php echo "action='$database?pilih=kalendar&untukdi=tambah'";?> name='tambahkalendar' id='tambahkalendar' >
			
			<tr><td class="isiankanan" width="175px">Tanggal</td><td class="isian"><input type="text" name="tgl_kalendar" class="pendek" id="tanggal"></td></tr>
			<tr><td class="isiankanan" width="175px">Subjek</td><td class="isian"><input type="text" name="subjek_kalendar" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Keterangan</td><td class="isian"><textarea name="keterangan_kalendar" style="height: 100px"></textarea></td></tr>
			
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahkalendar");
			frmvalidator.addValidation("tgl_kalendar","req","Tanggal Kalendar harus diisi");
			frmvalidator.addValidation("subjek_kalendar","req","Subjek Kalendar harus diisi");
			frmvalidator.addValidation("keterangan_kalendar","req","Keterangan Kalendar harus diisi");
	  
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->
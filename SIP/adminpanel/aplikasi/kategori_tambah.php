		<div class="judulbox">Tambah Kategori</div>
		<table class="isian" style="margin-top: 10px;">
		<form method="POST"  <?php echo "action='$database?pilih=kategori&untukdi=tambah'"; ?>name="tambahkategori" id="tambahkategori">
			<tr><td class="isiankanan" style="width: 40px;">Nama</td><td class="isian"><input type="text" class="maksimal" name="nama_kat"></td></tr>
			<tr><td class="isiankanan" style="width: 40px;">Deskripsi</td><td class="isian"><textarea style="height: 165px;" name="deskripsi_kat"></textarea></td></tr>
			<tr><td class="isiankanan" style="width: 40px;"></td><td class="isian">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="reset" class="hapus" value="Reset">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahkategori");
			frmvalidator.addValidation("nama_kat","req","Nama kategori harus diisi");
	  
			//]]>
		</script>
		</table>
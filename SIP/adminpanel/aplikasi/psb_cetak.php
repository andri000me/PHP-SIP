
<h3>Cetak Laporan PSB</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontalaktif-ujung"><a href="psb_online.php">Pendaftar</a></div>
			<div class="menuhorisontal"><a href="psb_diterima.php">Diterima</a></div>
			<div class="menuhorisontal"><a href="psb_setting.php">Pengaturan</a></div>
		</div>

		<table class="isian">
		<form method="POST" action="konten/laporan-psb3.php" name="cetak" id="cetak">
		<tr><td class="isiankanan" width="250px">Berdasarkan Tanggal</td><td class="isian"><input type="text" class="pencarian" name="awal" id="tanggal">s/d <input type="text" class="pencarian" name="akhir" id="tanggal1">
		<input type="submit" class="batal" value="Cetak xls">
		</td></tr>
		</form>
		<tr><td class="isiankanan" width="250px">Berdasarkan Status Daftar Ulang</td><td class="isian"><input type="button" class="batal" value="Cetak xls &raquo;" onclick="window.location.href='konten/laporan-psb2.php';"></td></tr>
		<tr><td class="isiankanan" width="250px">Semua Data PSB</td><td class="isian"><input type="button" class="batal" value="Cetak xls &raquo;" onclick="window.location.href='konten/laporan-psb.php';"></td></tr>
		<tr><td class="isiankanan" width="250px"><input type="button" class="hapus" value="Batal" onclick="self.history.back()"></td><td class="isian"></td></tr>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("cetak");
			frmvalidator.addValidation("awal","req","Tanggal Mulai harus diisi");
			frmvalidator.addValidation("akhir","req","Tanggal Akhir harus diisi");
			//]]>
		</script>
		</table>
</div><!--Akhir class isi kanan-->
<h3>Tambah Alumni</h3>
<div class="isikanan"><!--Awal class isi kanan-->
								
		<div class="judulisikanan">
			<div class="menuhorisontal"><a href="siswa.php">Siswa</a></div>
			<div class="menuhorisontalaktif"><a href="alumni.php">Alumni</a></div>
			<div class="menuhorisontal"><a href="kelas.php">Kelas</a></div>
		</div>

		<table class="isian">
		<form method='POST'  <?php echo "action='$database?pilih=alumni&untukdi=tambah'";?>  name='tambahalumni' id='tambahalumni' >
			
			<tr><td class="isiankanan" width="175px">Nama Alumni</td><td class="isian"><input type="text" name="nama_alumni" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Jenis Kelamin</td>
			<td class="isian">
					<input type="radio" name="jk" value="L"/>Laki-laki&nbsp;
					<input type="radio" name="jk" value="P"/>Perempuan
			</td></tr>
			<tr><td class="isiankanan" width="175px">Tempat, Tanggal Lahir</td><td class="isian">
			<input type="text" name="tempat_lahir" class="pendek">, 
			<input type="text" id="tanggal" name="tanggal_lahir" class="pendek" style="width:20%"></td></tr>
			<tr><td class="isiankanan" width="175px">Alamat</td><td class="isian"><textarea name="alamat" style="height: 100px"></textarea></td></tr>
			<tr><td class="isiankanan" width="175px">Tahun Lulus</td><td class="isian">
			<?php
				$thn_skrg=date("Y");
				echo "<select name=tahun_lulus>
				<option value='' selected>Pilih Tahun</option>";
				for ($thn=1990;$thn<=$thn_skrg;$thn++){
				echo "<option value=$thn>$thn</option>";
				}
				echo "</select>"; ?>
			</td></tr>
			
			<tr><td class="isiankanan" width="175px">Email</td><td class="isian"><input type="text" name="email" class="pendek"></td></tr>
			<tr><td class="isiankanan" width="175px">Telepon/ HP</td><td class="isian"><input type="text" name="telepon" class="pendek"></td></tr>
			
			<tr><td class="isiankanan" width="175px">Pekerjaan Sekarang</td><td class="isian"><input type="text" name="pekerjaan_sekarang" class="maksimal"></td></tr>
			<tr><td class="isiankanan" width="175px">Informasi Tambahan</td><td class="isian"><textarea name="info_tambahan" style="height: 100px"></textarea></td></tr>
			<tr><td class="isian" colspan="2">
			<input type="submit" class="pencet" value="Tambahkan">
			<input type="button" class="hapus" value="Batal" onclick="self.history.back()">
			</td></tr>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("tambahalumni");
			frmvalidator.addValidation("nama_alumni","req","Nama alumni harus diisi");
			frmvalidator.addValidation("nama_alumni","maxlen=30","Nama alumni maksimal 30 karakter");
			frmvalidator.addValidation("nama_alumni","minlen=3","Nama alumni minimal 3 karakter");
	  
			frmvalidator.addValidation("tahun_lulus","req","Tahun lulus harus diisi");
			frmvalidator.addValidation("tahun_lulus","maxlen=4","Tahun lulus diisi 4 angka");
			frmvalidator.addValidation("tahun_lulus","minlen=4","Tahun lulus diisi 4 angka");
			frmvalidator.addValidation("tahun_lulus","numeric","Tahun lulus hanya boleh ditulis dengan angka");
			
			frmvalidator.addValidation("tempat_lahir","req","Tempat lahir harus diisi");
			frmvalidator.addValidation("tanggal_lahir","req","Tanggal lahir harus diisi");
			
			frmvalidator.addValidation("email","email","Format email salah");
			//]]>
		</script>
		
		</table>
</div><!--Akhir class isi kanan-->